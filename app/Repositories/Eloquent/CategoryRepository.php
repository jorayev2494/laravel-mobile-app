<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Eloquent\Base\BaseModelRepository;
use Illuminate\Database\Eloquent\Collection;

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
}
