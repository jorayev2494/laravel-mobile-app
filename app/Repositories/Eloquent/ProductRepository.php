<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Eloquent\Base\BaseModelRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository extends BaseModelRepository
{
    protected function getModel(): string
    {
        return Product::class;
    }

    public function loadActive(): Collection
    {
        return $this->getModelClone()->newQuery()->where('is_active', true)->get();
    }
}
