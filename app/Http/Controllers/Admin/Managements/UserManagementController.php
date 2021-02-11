<?php

namespace App\Http\Controllers\Admin\Managements;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Admin;
use App\Models\User;
use App\Services\Admin\Managements\UserManagementService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
    * @var Admin $authAdmin
    */
    private Admin $authAdmin;

    /**
    * @var UserManagementService $userManagementService
    */
    private UserManagementService $userManagementService;

    public function __construct(UserManagementService $userManagementService) {
        $this->userManagementService = $userManagementService;
    }

    public function block(Request $request, int $id): JsonResponse
    {
        $request->merge($request->route()->parameters);
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:users,id', 
            'value' => 'required|string|in:' . implode(',', User::BLOCK_STATUSES)
        ]);

        $result = $this->userManagementService->userBlock($id, $validatedData['value']);
        return response()->json(UserResource::make($result));
    }
}
