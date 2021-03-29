<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Eloquent\Base\BaseModelRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryRepository extends BaseModelRepository
{
    protected function getModel(): string
    {
        return Category::class;
    }

    public function loadActive(): Collection
    {
        return $this->getModelClone()->where('is_active', true)->get();
    }

    public function loadForManagement(string $sortBy = "ASC"): mixed
    {
        return $this->getModelClone()->newQuery()->withCount("products")->orderBy("id", $sortBy)->get();    //->dd();   // ->dd(); // orderBy("id", $sortBy)->requestPaginate();
    }
}
