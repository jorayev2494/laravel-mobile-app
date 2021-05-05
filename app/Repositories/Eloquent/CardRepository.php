<?php

namespace App\Repositories\Eloquent;

use App\Models\Card;
use App\Repositories\Eloquent\Base\BaseModelRepository;

class CardRepository extends BaseModelRepository
{
    protected function getModel(): string
    {
        return Card::class;
    }
}
