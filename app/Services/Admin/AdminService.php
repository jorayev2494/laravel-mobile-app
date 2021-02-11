<?php

namespace App\Services\Admin;

use App\Repositories\Eloquent\Admin\AdminRepository;
use App\Services\Base\AppGuardInterface;
use App\Services\Base\AuthorizeService;
use App\Services\Mixins\AccountMixinService;
use Illuminate\Support\Traits\Macroable;

class AdminService extends AuthorizeService
{
    protected function getAuthorizeRepository(): string
    {
        return AdminRepository::class;
    }

    public function getGuard(): string
    {
        return AppGuardInterface::ADMIN_GUARD;
    }
}
