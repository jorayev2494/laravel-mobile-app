<?php

namespace App\Services;

use App\Repositories\Eloquent\CategoryRepository;
use App\Services\Base\BaseModelService;
use Illuminate\Database\Eloquent\Collection;

class CategoryService extends BaseModelService
{

    /**
    * @var CategoryRepository $repository
    */
    private CategoryRepository $repository;

    protected function getModelRepository(): string
    {
        $this->repository = resolve(CategoryRepository::class);
        return CategoryRepository::class;
    }

    public function loadActiveCategories(): Collection
    {
        return $this->repository->loadActive();
    }
}
