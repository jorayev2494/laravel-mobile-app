<?php

namespace App\Repositories\Eloquent;

use App\Models\Address;
use App\Repositories\Eloquent\Base\BaseModelRepository;

class AddressRepository extends BaseModelRepository
{
    protected function getModel(): string
    {
        return Address::class;
    }
}
