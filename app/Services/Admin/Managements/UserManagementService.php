<?php

namespace App\Services\Admin\Managements;

use App\Repositories\Eloquent\UserRepository;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserManagementService extends UserService
{

    /**
    * @var UserRepository $repository
    */
    private UserRepository $repository;

    public function __construct(UserRepository $userRepository) {
        $this->repository = $userRepository;
        parent::__construct(app());
    }

    public function userUpdate(int $id, array $data): Model
    {
        $foundUser = $this->repository->find($id);
        return $this->updateAccount($foundUser, $data);
    }

    public function loadForManagement(string $sortBy = "DESC"): Collection
    {
        return $this->repository->getModelClone()->newQuery()->orderBy("id", $sortBy)->requestPaginate();
    }

    public function userDelete(int $id): void
    {
        $foundUser = $this->repository->find($id);
        $this->deleteAccount($foundUser);
    }

    public function userBlock(int $id, string $value): Model
    {
        /** @var Model $foundUser */
        $foundUser = $this->repository->find($id);
        $foundUser->setAttribute('is_blocked', $value == $this->repository->model::BLOCK_STATUS)->save();
        return $foundUser->refresh();        
    }
}
