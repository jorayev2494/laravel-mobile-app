<?php

namespace App\Http\Middleware;

use App\Exceptions\BadRequestException;
use App\Exceptions\ErrorMessages;
use App\Exceptions\UnauthorizedException;
use App\Traits\FormatErrorResponse;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\JWTAuth;

class JWTTokenRefresh extends BaseMiddleware
{
    use FormatErrorResponse;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     * @throws BadRequestException
     * @throws UnauthorizedException
     */
    public function handle($request, Closure $next): mixed
    {
        if (!$token = $this->auth->setRequest($request)->getToken()) {
            throw new BadRequestException(ErrorMessages::TOKEN_NOT_PROVIDED);
        }
        try {
            $this->auth->authenticate();
        } catch (TokenExpiredException $e) {
            try {
                $newToken = $this->auth->setRequest($request)->parseToken()->refresh();
                $this->checkPayload($newToken, $user);
                if ($user && $user->active) {
                    $response = $next($request);
                    $response->headers->set('Authorization', $newToken);

                    return $response;
                }
                throw new UnauthorizedException(ErrorMessages::TOKEN_EXPIRED);
            } catch (JWTException $ex) {
                throw new UnauthorizedException(ErrorMessages::UNAUTHORIZED);
            }
        }

        return $next($request);
    }

    protected function checkPayload(string $newToken, &$user): void
    {
        $payload = \JWTAuth::setToken($newToken)->getPayload()->toArray();
        if (array_key_exists('for', $payload)) {
            Auth::shouldUse($payload['for']);
        }

        $user = Auth::setToken($newToken)->authenticate();

        // Invalidate all tokens after change password
        if (array_key_exists('pdw_set', $payload) && !is_null($payload['pdw_set'])) {
            if ($payload['pdw_set'] < $user->password_change_time) {
                throw new UnauthorizedException(ErrorMessages::UNAUTHORIZED);
            }
        }
    }

    public function terminate(Request $request, Response|JsonResponse $response): void {
        Log::info(__METHOD__, [__METHOD__ . ' ' . __LINE__]);
    }
}
