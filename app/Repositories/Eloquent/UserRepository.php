<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\Base\BaseModelRepository;

class UserRepository extends BaseModelRepository
{
    protected function getModel(): string
    {
        return User::class;
    }
}
