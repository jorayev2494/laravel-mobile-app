<?php

namespace App\Services\Base;

use App\Exceptions\BadRequestException;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AccountService
{
    use FileTrait;

    public function account(BaseModelService $baseModelService, Model $authAdmin, ?int $id): Model
    {
        if ($id) {
            $result = $baseModelService->getCloneModelRepository()->find($id);
        } else {
            $result = $authAdmin;
        }

        return $result;
    }

    public function updateAccount(Model $account, array $data): Model
    {
        $this->updateAvatar($account, $data);
        $account->update($data);
        return $account->refresh();
    }

    public function deleteAccount(Model $account): void
    {
        $this->deleteAvatar($account);
        $account->delete();
    }

    public function passwordChange(Model $account, array $data): void
    {
        if (Hash::check($data['current_password'], $account->password)) {
            $account->setAttribute('password', $data['password']);
            $account->save();
            return;
        }

        throw new BadRequestException('your current password not correct', Response::HTTP_BAD_REQUEST);
    }

    #region Account Avatar
    private function updateAvatar(Model $forAccount, array &$data): void
    {
        if (array_key_exists('avatar', $data)) {
            ['name' => $data['avatar']] = $this->updateFile($forAccount->getAvatarPath(), $forAccount->avatar, $data['avatar']);
        }
    }
    
    private function deleteAvatar(Model $forAccount): void
    {
        $this->deleteFile($forAccount->getAvatarPath(), $forAccount->avatar);
    }
    #endregion    
}
