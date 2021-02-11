<?php

namespace App\Exceptions;

use App\Traits\FormatErrorResponse;
use ErrorException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use ReflectionException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{

    use FormatErrorResponse;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            // dd('one');
        });
    }

    public function report(Throwable $exception): void
    {
        parent::report($exception);
    }


    public function render($request, Throwable $exception)
    {
        // dd($exception->getMessage());

        if ($exception instanceof AccessDeniedHttpException) {
            return response($this->errorResponse(ErrorMessages::ACCESS_DENIED), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            return response($this->errorResponse($exception->errors()), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        if ($exception instanceof \Illuminate\Http\Exceptions\ThrottleRequestsException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_TOO_MANY_REQUESTS);
        }
        if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
            return response($this->errorResponse(ErrorMessages::UNAUTHENTICATED), Response::HTTP_UNAUTHORIZED);
        }
        if ($exception instanceof \Tymon\JWTAuth\Exceptions\JWTException) {
            return response($this->errorResponse(ErrorMessages::UNAUTHENTICATED), Response::HTTP_UNAUTHORIZED);
        }
        if ($exception instanceof UnauthorizedException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_UNAUTHORIZED);
        }
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_NOT_FOUND);
        }
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            $modelName = Arr::last(explode('\\', $exception->getModel()));
            return response($this->errorResponse("${modelName} not found"), Response::HTTP_NOT_FOUND);
        }
        if ($exception instanceof \Illuminate\Auth\Access\AuthorizationException) {
            return response($this->errorResponse(ErrorMessages::UNAUTHORIZED), Response::HTTP_FORBIDDEN);
        }
        if ($exception instanceof BadRequestException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_BAD_REQUEST);
        }
        if ($exception instanceof AccessDenyException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_FORBIDDEN);
        }
        if ($exception instanceof NotFoundException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_NOT_FOUND);
        }
        if ($exception instanceof ServiceException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_FORBIDDEN);
        }
        if ($exception instanceof ReflectionException) {
            return response($this->errorResponse(ErrorMessages::MODEL_LOAD_ERROR), Response::HTTP_FORBIDDEN);
        }
        if ($exception instanceof NotCreatedException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_FORBIDDEN);
        }
        if ($exception instanceof NotUpdatedException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_FORBIDDEN);
        }
        if ($exception instanceof NotDeletedException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_FORBIDDEN);
        }
        if ($exception instanceof NotFoundHttpException) {
            return response($this->errorResponse(ErrorMessages::HTTP_NOT_FOUND), Response::HTTP_NOT_FOUND);
        }
        if ($exception instanceof AlreadyCreatedException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_FORBIDDEN);
        }
        if ($exception instanceof FileUploadException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_FORBIDDEN);
        }
        if ($exception instanceof InsufficientFundsException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_FORBIDDEN);
        }
        if ($exception instanceof ServerException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        if ($exception instanceof PostTooLargeException) {
            return response($this->errorResponse(ErrorMessages::POST_TOO_LARGE), Response::HTTP_BAD_REQUEST);
        }

        if ($exception instanceof BindingResolutionException) {
            logger($exception->getTraceAsString());

            return response($this->errorResponse(ErrorMessages::BINDING_ERROR), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        if ($exception instanceof ErrorException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        if ($exception instanceof ConnectionException) {
            logger($exception->getTraceAsString());

            return response($this->errorResponse($exception->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // if ($exception instanceof TwilioException) {
        //     logger($exception->getMessage());

        //     return response($this->errorResponse($exception->getMessage()), Response::HTTP_INTERNAL_SERVER_ERROR);
        // }

        if ($exception instanceof \Exception) {
            logger($exception->getTraceAsString());

            $HTTP_CODES = array_keys(Response::$statusTexts);
            $ERROR_CODE = in_array($exception->getCode(), $HTTP_CODES, true) ? $exception->getCode() :
                Response::HTTP_INTERNAL_SERVER_ERROR;

            return response($this->errorResponse($exception->getMessage()), $ERROR_CODE);
        }

        return parent::render($request, $exception);
    }
}
