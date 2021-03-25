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
        return $this->repository->paginateOrGet();
    }

    public function storeProduct(array $data): Model
    {
        $images = $this->uploadImages($data, "images");
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
        
        $images = $this->updateImages($foundProduct, $data);
        $foundProduct->update($data);
        $foundProduct->images()->createMany($images);

        return $foundProduct->refresh()->loadMissing("images");
    }

    public function deleteProduct(int $id): void
    {
        $foundProduct = $this->repository->find($id);
        $this->deleteImages($foundProduct);
        $foundProduct->delete();
    }

    private function uploadImages(array $data, string $key): array
    {
        $images = [];

        if (array_key_exists($key, $data)) {
            foreach ($data[$key] as $img) {
                $images[] = $this->uploadFile(Product::IMAGE_PATH, $img);
            }
        }

        return $images;
    }

    private function updateImages(Product $product, array $data): array
    {
        $images = [];
        if (array_key_exists("images", $data)) {
            $this->deleteImages($product);
            $images = $this->uploadImages($data, "images");
        }

        return $images;
    }


    private function deleteImages(Product $product): void
    {
        if ($productImages = $product->images) {
            /** @var File $img */
            foreach ($productImages as $img) {
                $this->deleteFile($img->path, $img->name);
                $img->delete();
            }
        }
    }
}
