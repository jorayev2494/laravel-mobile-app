<?php

namespace App\Http\Controllers\Admin\Managements;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountUpdateRequest;
use App\Http\Resources\Collections\UserCollection;
use App\Http\Resources\UserResource;
use App\Services\Admin\Managements\UserManagementService;
use App\Services\Base\AppGuardInterface;
use App\Traits\ResolvePagination;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    use ResolvePagination;

    /**
    * @var UserManagementService $userManagementService
    */
    private UserManagementService $userManagementService;

    public function __construct(UserManagementService $userManagementService) {
        $this->middleware('auth:' . AppGuardInterface::ADMIN_GUARD);
        $this->userManagementService = $userManagementService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $users = $this->userManagementService->getCloneModelRepository()->getModelClone()->where('is_blocked', true)->requestPaginate();
        return response()->json(UserCollection::make($users));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {
        $result = $this->userManagementService->getCloneModelRepository()->find($id);
        return response()->json(UserResource::make($result));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountUpdateRequest $request, int $id): JsonResponse
    {
        $result = $this->userManagementService->userUpdate($id, $request->validated());
        return response()->json(UserResource::make($result));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        $this->userManagementService->userDelete($id);
        return response()->noContent();
    }
}
