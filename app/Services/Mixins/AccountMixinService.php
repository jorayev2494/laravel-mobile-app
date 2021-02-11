<?php

namespace App\Services\Mixins;

use App\Exceptions\BadRequestException;
use App\Services\Base\BaseModelService;
use App\Traits\FileTrait;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AccountMixinService
{
    // use FileTrait;

    public function account(): Closure
    {
        return function(BaseModelService $baseModelService, Model $authAdmin, ?int $id): Model {
            if ($id) {
                $result = $baseModelService->getCloneModelRepository()->find($id);
            } else {
                $result = $authAdmin;
            }

            return $result;
        };
    }

    public function updateAccount(): Closure
    {
        return function(Model $account, array $data): Model {
            $this->updateAvatar($account, $data);
            $account->update($data);
            return $account->refresh();
        };
    }

    public function deleteAccount(): Closure
    {
        return function(Model $account): void {
            $this->deleteAvatar($account);
            $account->delete();
        };
    }

    public function passwordChange(): Closure
    {
        return function(Model $account, array $data): void {
            if (Hash::check($data['current_password'], $account->password)) {
                $account->setAttribute('password', $data['password']);
                $account->save();
                return;
            }
    
            throw new BadRequestException('your current password not correct', Response::HTTP_BAD_REQUEST);
        };
    }

    #region Account Avatar
    private function updateAvatar(): Closure
    {
        return function(Model $forAccount, array &$data): void {
            if (array_key_exists('avatar', $data)) {
                ['name' => $data['avatar']] = $this->updateFile($forAccount->getAvatarPath(), $forAccount->avatar, $data['avatar']);
            }
        };
    }
    
    private function deleteAvatar(Model $forAccount): void
    {
        $this->deleteFile($forAccount->getAvatarPath(), $forAccount->avatar);
    }
    #endregion    
}
