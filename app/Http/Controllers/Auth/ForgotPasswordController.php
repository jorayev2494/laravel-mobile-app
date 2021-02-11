<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPassword\ForgotPasswordEmailRequest;
use App\Http\Requests\Auth\ForgotPassword\ForgotPasswordResetRequest;
use App\Services\Base\AppGuardInterface;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ForgotPasswordController extends Controller
{
    /**
    * @var UserService $userService
    */
    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->middleware('guest:' . AppGuardInterface::USER_GUARD);
        $this->userService = $userService;
    }

    public function __invoke(ForgotPasswordEmailRequest $request): JsonResponse
    {
        $result = $this->userService->sendResetToken($request->get('email'));
        return response()->json($result);
    }

    public function reset(ForgotPasswordResetRequest $request): Response
    {
        $this->userService->resetPassword($request->get('token'), $request->get('password'));
        return response()->noContent();
    }
}
