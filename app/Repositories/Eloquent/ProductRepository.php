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

    public function loadForManagement(string $sortBy = "DESC"): Collection
    {
        return $this->getModelClone()->newQuery()->orderBy("id", $sortBy)->with("images")->requestPaginate();
    }

    public function loadActive(): Collection
    {
        return $this->getModelClone()->newQuery()->where('is_active', true)->with("images")->get();
    }

    public function foundProducts(array $ids, array $columns = ["*"]): Collection
    {
        return $this->getModelClone()->newQuery()->findMany($ids, $columns);
    }
}
