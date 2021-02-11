<?php

namespace App\Services\Base;

use App\Exceptions\AccessDenyException;
use App\Exceptions\AlreadyCreatedException;
use App\Exceptions\ApplicationException;
use App\Exceptions\BadRequestException;
use App\Exceptions\ErrorMessages;
use App\Exceptions\NotFoundException;
use App\Http\Resources\Admin\AdminResource;
use App\Http\Resources\UserResource;
use App\Mail\Auth\PasswordResetEmailMail;
use App\Mail\Auth\RegistrationMail;
use App\Models\Contracts\AuthorizeModelInterface;
use App\Models\Contracts\JWTAuthModel;
use App\Models\EmailConfirmation;
use App\Models\PasswordReset;
use App\Repositories\Eloquent\Base\BaseModelRepository;
use App\Traits\FileTrait;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\MailManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class AuthorizeService extends BaseModelService
{

    /**
    * @var BaseModelRepository $authorizeModelRepository
    */
    private BaseModelRepository $authorizeModelRepository;

    /**
    * @var Model|JWTAuthModel $authModel
    */
    private JWTAuthModel $authModel;

    /**
    * @var MailManager $mailer
    */
    private MailManager $mailer;

    /**
    * @var array $classes
    */
    private array $classes = [
        AccountService::class
    ];

    /**
    * @var array $objects
    */
    private array $objects = [];

    public function __construct() {
        $this->authorizeModelRepository = app()->make($this->getAuthorizeRepository());
        $this->mailer = app('mail.manager');

        foreach ($this->classes as $className) {
            $this->objects[] = resolve($className);
        }

        parent::__construct(app());
    }

    protected abstract function getAuthorizeRepository(): string;    
    public abstract function getGuard(): string;

    public function getModelRepository(): string
    {
        return $this->getAuthorizeRepository();
    }

    public function register(array $data): ?array
    {
        /**
         * @var EmailConfirmation $emailConfirmation
         */
        $emailConfirmation = null;

        if ($this->authorizeModelRepository->getModelClone()->newQuery()->where('email', $data['email'])->exists()) {
            throw new AlreadyCreatedException('User already exist');
        }

        DB::beginTransaction();
        try {
            if ($this->authorizeModelRepository->model instanceof JWTAuthModel) {
                $this->authModel = $this->authorizeModelRepository->getModelClone()->newInstance($data);
                $this->authModel->save();

                if (!empty($this->authModel->email) && filter_var($this->authModel->email, FILTER_VALIDATE_EMAIL)) {
                    $emailConfirmation = EmailConfirmation::firstWhere('email', $data['email']);

                    if ($emailConfirmation) {
                        $emailConfirmation->delete();
                    }

                    $confirmToken = Str::random($this->authorizeModelRepository->model::CONFIRM_TOKEN);
                    $emailConfirmation = EmailConfirmation::query()->create([
                                                                                'email' => $this->authModel->email,
                                                                                'token' => $confirmToken
                                                                            ]);
                    $this->sendEmail($emailConfirmation, $this->authModel);
                    DB::commit();
                } else {
                    throw new ApplicationException(ErrorMessages::SOMETHING_WENT_WRONG);
                }
            } else {
                throw new ApplicationException('Base model must be implement ' . JWTAuthModel::class);
            }
        } catch (\Throwable $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            throw new BadRequestException($ex->getMessage());
        }

        return config('app.debug') ? ['email_confirm_token' => $emailConfirmation->token] : null;
    }

    public function auth(string $fieldValue, string $password, $searchField = 'email', ?bool $remember = false): array
    {
        $this->authModel = $this->authorizeModelRepository->getModelClone()->newQuery()->firstWhere($searchField, $fieldValue);

        if (!$this->authModel)
            throw new NotFoundException(ErrorMessages::USER_NOT_EXIST);

        if (!Hash::check($password, $this->authModel->password))
            throw new BadRequestException(ErrorMessages::INVALID_CREDENTIALS);

        if (!$this->authModel->hasVerifiedEmail())
            throw new AccessDenyException(ErrorMessages::EMAIL_NOT_CONFIRMED, Response::HTTP_FORBIDDEN);
        
        if (isset($this->authModel->is_blocked) && $this->authModel->is_blocked)
            throw new AccessDenyException(ErrorMessages::USER_BLOCKED);

        return $this->generateTokenAndLogin([$searchField => $fieldValue, 'password' => $password], $this->getGuard(), $remember);
    }

    public function logout(): bool
    {
        $this->authModel = Auth::guard($this->getGuard())->user();
        $this->authModel->setLastActivity()->save();

        Auth::guard($this->getGuard())->logout();
        unset($this->authModel);
        return true;
    }

    public function emailConfirmation(string $token): bool
    {
        // dd($token, func_get_args());
        /**
         * @var EmailConfirmation $emailConfirmation
         */
        $emailConfirmation = EmailConfirmation::where('token', $token)->first();

        if (!$emailConfirmation) {
            throw new BadRequestException(ErrorMessages::INVALID_TOKEN);
        }

        $this->authModel = $this->authorizeModelRepository->getModelClone()->newQuery()->where('email', $emailConfirmation->email)->first();

        if (!$this->authModel) {
            throw new NotFoundException(ErrorMessages::USER_NOT_EXIST);
        }
        
        $this->authModel->setEmailConfirmed();
        return $emailConfirmation->delete();
    }

    public function sendResetToken(string $email): ?array
    {
        $foundAuthModel = $this->authorizeModelRepository->getModelClone()->newQuery()->where('email', $email)->first();

        if (!$foundAuthModel) {
            throw new NotFoundException(ErrorMessages::USER_NOT_EXIST);
        }

        $token = md5(uniqid('', true));
        PasswordReset::query()->where('email', $foundAuthModel->email)->delete();
        PasswordReset::query()->insert(['email' => $foundAuthModel->email, 'token' => $token]);

        if ($this->authorizeModelRepository->model instanceof AuthorizeModelInterface) {
            $this->mailer->to($foundAuthModel->email)->locale('en')->queue(new PasswordResetEmailMail($foundAuthModel->email, $token, $this->getGuard()));
        }

        return config('app.debug') ? ['password_reset_token' => $token] : null;
    }

    public function resetPassword(string $token, string $newPassword)
    {
        $resetPassword = PasswordReset::query()->where('token', $token)->first();

        if (!$resetPassword) {
            throw new NotFoundException(ErrorMessages::INVALID_TOKEN);
        }

        $this->authModel = $this->authorizeModelRepository->getModelClone()->newQuery()->firstWhere('email', $resetPassword->email);

        if (!$this->authModel) { 
            throw new NotFoundException(ErrorMessages::USER_NOT_EXIST);
        }        
        
        $this->authModel->setAttribute('password', $newPassword)->save();
        $this->authModel->invalidateToken();
        return $resetPassword->delete();
    }

    public function refreshToken(Request $request): array
    {
        if (!$token = JWTAuth::setRequest($request)->getToken()) {
            throw new BadRequestException(ErrorMessages::TOKEN_NOT_PROVIDED);
        }

        try {
            $user = JWTAuth::authenticate();
        } catch (TokenExpiredException $ex) {
            try {
                $newToken = JWTAuth::setRequest($request)->parseToken()->refresh();
                $user = JWTAuth::setToken($newToken)->authenticate();
                if ($user && $user->active) {
                    return ['token' => $newToken];
                } else {
                    throw new AccessDenyException(ErrorMessages::TOKEN_EXPIRED);
                }
            } catch (JWTException $ex) {
                throw new BadRequestException(ErrorMessages::TOKEN_INVALID);
            }
        }

        return ['token' => JWTAuth::getToken()->get()];
    }

    private function generateTokenAndLogin(array $credentials, string $getGuard = null, bool $remember = false): array
    {
        if (!$token = Auth::guard($getGuard)->attempt($credentials)) {              // $remember
            throw new BadRequestException(ErrorMessages::INVALID_CREDENTIALS);
        }

        $this->authModel->setLastLogin()->save();
        return [
            'access_token' => $token,
            'auth_data' => $this->authModelResource($this->authModel, $getGuard)
        ];
    }

    private function sendEmail(EmailConfirmation $emailConfirmation, Model $authModel): void
    {
        if ($this->authorizeModelRepository->model instanceof JWTAuthModel) {
            Mail::to($authModel->email)->locale('en')->queue(new RegistrationMail($emailConfirmation, $authModel, $this->getGuard()));
        } else {
            throw new ApplicationException('Base model must be implement ' . JWTAuthModel::class);
        }
    }

    private function authModelResource(Model $authModel, string $guard): JsonResource
    {
        switch ($guard) {
            case AppGuardInterface::ADMIN_GUARD:
                return AdminResource::make($authModel);
                break;

            case AppGuardInterface::USER_GUARD:
                return UserResource::make($authModel);
                break;
            
            default:
                throw new Exception($guard);
                break;
        }
    }

    public function __call($method, $args)
    {
        foreach($this->objects as $object) {
            if (method_exists($object, $method)) {
                $callback = array($object, $method);
                if (is_callable($callback)) {
                    return call_user_func($callback, ...$args);
                }
            }
        }
    }
    
}


