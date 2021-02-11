<?php

namespace App\Services\Admin\Managements;

use App\Services\UserService;
use Illuminate\Database\Eloquent\Model;

class UserManagementService extends UserService
{
    public function userUpdate(int $id, array $data): Model
    {
        $foundUser = $this->getCloneModelRepository()->find($id);
        return $this->updateAccount($foundUser, $data);
    }

    public function userDelete(int $id): void
    {
        $foundUser = $this->getCloneModelRepository()->find($id);
        $this->deleteAccount($foundUser);
    }

    public function userBlock(int $id, string $value): Model
    {
        /** @var Model $foundUser */
        $foundUser = $this->getCloneModelRepository()->find($id);
        $foundUser->setAttribute('is_blocked', $value == $this->getCloneModelRepository()->model::BLOCK_STATUS)->save();
        return $foundUser->refresh();        
    }
}
