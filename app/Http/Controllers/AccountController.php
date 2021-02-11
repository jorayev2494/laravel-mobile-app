<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountPasswordChangeRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\Base\AppGuardInterface;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountController extends Controller
{
    /**
    * @var User $authUser
    */
    private ?User $authUser;

    /**
    * @var UserService $userService
    */
    private UserService $userService;

    public function __construct(UserService $userService) {
        $this->middleware('auth:' . AppGuardInterface::USER_GUARD);
        $this->authUser = auth()->guard(AppGuardInterface::USER_GUARD)->user();
        $this->userService = $userService;
    }

    public function __invoke(int $id = null): JsonResponse
    {
        $result = $id 
                ? $this->userService->getCloneModelRepository()->find($id)
                : $this->authUser;

        return response()->json(UserResource::make($result));
    }

    public function update(AccountUpdateRequest $request): JsonResponse
    {
        $result = $this->userService->updateAccount($this->authUser, $request->validated());
        return response()->json(UserResource::make($result));
    }

    public function destroy(): Response
    {
        $this->userService->deleteAccount($this->authUser);
        return response()->noContent();
    }

    public function passwordChange(AccountPasswordChangeRequest $request): Response
    {
        $this->userService->getCallingMethodName($this->authUser, $request->validated());
        return response()->noContent(Response::HTTP_ACCEPTED);
    }
}
