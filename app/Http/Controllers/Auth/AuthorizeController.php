<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserEmailConfirmationRequest;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Services\Base\AppGuardInterface;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorizeController extends Controller
{
    /**
    * @var UserService $userService
    */
    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->middleware('auth:' . AppGuardInterface::USER_GUARD, ['only' => ['logout', ['refreshToken']]]);
        $this->userService = $userService;
    }

    public function register(UserRegisterRequest $request): JsonResponse
    {
        $result = $this->userService->getCallingMethodName($request->validated());
        return response()->json($result);
    }

    public function login(UserLoginRequest $request): JsonResponse
    {
        $result = $this->userService->auth($request->get('email'), $request->get('password'));
        return response()->json($result);
    }

    public function emailConfirmation(UserEmailConfirmationRequest $request): Response
    {
        $this->userService->getCallingMethodName($request->get('token'));
        return response()->noContent(Response::HTTP_ACCEPTED);
    }

    public function logout(): Response
    {
        $this->userService->getCallingMethodName();
        return response()->noContent(Response::HTTP_ACCEPTED);
    }

    public function refreshToken(Request $request): JsonResponse
    {
        $result = $this->userService->getCallingMethodName($request);
        return response()->json($result);
    }
}
