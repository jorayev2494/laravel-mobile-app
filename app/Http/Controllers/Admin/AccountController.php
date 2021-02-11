<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountPasswordChangeRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Http\Resources\Admin\AdminResource;
use App\Models\Admin;
use App\Services\Admin\AdminService;
use App\Services\Base\AppGuardInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountController extends Controller
{

    /**
    * @var Admin $authAdmin
    */
    private ?Admin $authAdmin;

    /**
    * @var AdminService $adminService
    */
    private AdminService $adminService;

    public function __construct(AdminService $adminService) {
        $this->middleware('auth:' . AppGuardInterface::ADMIN_GUARD);
        $this->authAdmin = auth()->guard(AppGuardInterface::ADMIN_GUARD)->user();
        $this->adminService = $adminService;
    }

    public function __invoke(int $id = null): JsonResponse
    {
        // if ($id) {
        //     $result = $this->adminService->getCloneModelRepository()->find($id);
        // } else {
        //     $result = $this->authAdmin;
        // }

        $result = $this->adminService->account($this->adminService, $this->authAdmin, $id);

        return response()->json(AdminResource::make($result));
    }

    public function update(AccountUpdateRequest $request): JsonResponse
    {
        $result = $this->adminService->updateAccount($this->authAdmin, $request->validated());
        return response()->json(AdminResource::make($result));
    }
    
    public function destroy(): Response
    {
        $this->adminService->deleteAccount($this->authAdmin);
        return response()->noContent();
    }

    public function passwordChange(AccountPasswordChangeRequest $request): Response
    {
        $this->adminService->getCallingMethodName($this->authAdmin, $request->validated());
        return response()->noContent(Response::HTTP_ACCEPTED);
    }
}