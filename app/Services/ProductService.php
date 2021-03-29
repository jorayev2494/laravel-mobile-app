<?php

namespace App\Services;

use App\Models\File;
use App\Models\Product;
use App\Repositories\Eloquent\ProductRepository;
use App\Services\Base\BaseModelService;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductService extends BaseModelService
{
    
    use FileTrait;
    
    /**
    * @var ProductRepository $repository
    */
    private ProductRepository $repository;

    /**
    * @var FileService $fileService
    */
    private FileService $fileService;

    public function __construct(FileService $fileService) {
        $this->fileService = $fileService;
        parent::__construct(app());
    }

    protected function getModelRepository(): string
    {
        $this->repository = resolve(ProductRepository::class);
        return ProductRepository::class;
    }

    public function activeProducts(): Collection
    {
        return $this->repository->loadActive();
    }

    public function getProducts(): mixed
    {
        return $this->repository->loadForManagement("DESC");
    }

    public function storeProduct(array $data): Model
    {
        $data = $this->parseType($data);
        $images = $this->fileService->uploads($data, Product::IMAGE_PATH, "images");
        /** @var Product $storedProduct */
        $storedProduct = $this->create($data);
        $storedProduct->images()->createMany($images);
        return $storedProduct->loadMissing("images");
    }

    public function showProduct(int $id): Model
    {
        return $this->repository->find($id)->loadMissing("images");
    }

    public function updateProduct(int $id, array $data): Model
    {
        /** @var Product $foundProduct */
        $foundProduct = $this->repository->find($id);
        $data = $this->parseType($data);

        $images = $this->fileService->updateFiles($foundProduct, $data, Product::IMAGE_PATH);
        $foundProduct->update($data);
        $foundProduct->images()->createMany($images);

        return $foundProduct->refresh()->loadMissing("images");
    }

    public function deleteProduct(int $id): void
    {
        $foundProduct = $this->repository->find($id);
        $this->fileService->remove($foundProduct, "images");
        $foundProduct->delete();
    }

    private function parseType(array $data): array
    {
        foreach ($data as $key => $value) {
            switch ($value) {
                case "true": 
                    $data[$key] = true;
                    break;
                case "false": 
                    $data[$key] = false; 
                    break;
                default:
                    $data[$key] = $value; 
                    break;
            }
        }

        return $data;
    }
}
