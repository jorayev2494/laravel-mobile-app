<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Repositories\Eloquent\Base\BaseModelRepository;

class OrderRepository extends BaseModelRepository
{
    protected function getModel(): string
    {
        return Order::class;
    }
}
