<?php

namespace App\Services;

use App\Repositories\Eloquent\UserRepository;
use App\Services\Base\AuthorizeService;
use App\Services\Base\AppGuardInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Traits\Macroable;

class UserService extends AuthorizeService
{
    public function getModelRepository(): string
    {
        return UserRepository::class;
    }

    protected function getAuthorizeRepository(): string
    {
        return $this->getModelRepository();
    }

    public function getGuard(): string
    {
        return AppGuardInterface::USER_GUARD;
    }

    public function order(): Collection
    {
        return $this->getCloneModelRepository()->getModelClone()->newQuery()->requestOrderBy()->get();
    }
}
