<?php

namespace App\Services;

use App\Repositories\Eloquent\ProductRepository;
use App\Services\Base\BaseModelService;
use Illuminate\Database\Eloquent\Collection;

class ProductService extends BaseModelService
{

    /**
    * @var ProductRepository $repository
    */
    private ProductRepository $repository;

    protected function getModelRepository(): string
    {
        $this->repository = resolve(ProductRepository::class);
        return ProductRepository::class;
    }

    public function activeProducts(): Collection
    {
        return $this->repository->loadActive();
    }
}
