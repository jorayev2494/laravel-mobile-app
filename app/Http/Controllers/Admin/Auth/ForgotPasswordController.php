<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\ForgotPassword\ForgotPasswordEmailRequest;
use App\Http\Requests\Admin\Auth\ForgotPassword\ForgotPasswordResetRequest;
use App\Services\Admin\AdminService;
use App\Services\Base\AppGuardInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ForgotPasswordController extends Controller
{
    /**
    * @var AdminService $adminService
    */
    private AdminService $adminService;

    public function __construct(AdminService $adminService) {
        $this->middleware('guest:' . AppGuardInterface::ADMIN_GUARD);
        $this->adminService = $adminService;
    }

    public function __invoke(ForgotPasswordEmailRequest $request): JsonResponse
    {
        $result = $this->adminService->sendResetToken($request->get('email'));
        return response()->json($result);
    }

    public function reset(ForgotPasswordResetRequest $request): Response
    {
        $this->adminService->resetPassword($request->get('token'), $request->get('password'));
        return response()->noContent();
    }
}
