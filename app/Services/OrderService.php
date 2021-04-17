<?php

namespace App\Services;

use App\Models\Order;
use App\Services\Base\BaseModelService;

class OrderService extends BaseModelService
{
    protected function getModelRepository(): string
    {
        return Order::class;
    }

    
}
