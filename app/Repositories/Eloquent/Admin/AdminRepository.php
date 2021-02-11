<?php

namespace App\Repositories\Eloquent\Admin;

use App\Models\Admin;
use App\Repositories\Eloquent\Base\BaseModelRepository;

class AdminRepository extends BaseModelRepository
{
    protected function getModel(): string
    {
        return Admin::class;
    }
}
