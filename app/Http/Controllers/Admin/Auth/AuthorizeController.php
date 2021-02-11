<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\AdminEmailConfirmationRequest;
use App\Http\Requests\Admin\Auth\AdminLoginRequest;
use App\Http\Requests\Admin\Auth\AdminRegisterRequest;
use App\Services\Admin\AdminService;
use App\Services\Base\AppGuardInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class AuthorizeController extends Controller
{
    /**
    * @var AdminService $adminService
    */
    private AdminService $adminService;

    public function __construct(AdminService $adminService) {
        $this->middleware('auth:' . AppGuardInterface::ADMIN_GUARD, ['only' => ['logout', ['refreshToken']]]);
        $this->adminService = $adminService;
    }

    public function register(AdminRegisterRequest $request): JsonResponse
    {
        $result = $this->adminService->register($request->validated());
        return response()->json($result);
    }

    public function login(AdminLoginRequest $request): JsonResponse
    {
        $result = $this->adminService->auth($request->get('email'), $request->get('password'));
        return response()->json($result);
    }

    public function emailConfirmation(AdminEmailConfirmationRequest $request): Response
    {
        $this->adminService->getCallingMethodName($request->get('token'));
        return response()->noContent(Response::HTTP_ACCEPTED);
    }

    public function logout(): Response
    {
        $this->adminService->getCallingMethodName();
        return response()->noContent(Response::HTTP_ACCEPTED);
    }

    public function refreshToken(Request $request): JsonResponse
    {
        $result = $this->adminService->getCallingMethodName($request);
        return response()->json($result);
    }
}