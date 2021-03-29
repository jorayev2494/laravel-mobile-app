<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Eloquent\CategoryRepository;
use App\Services\Base\BaseModelService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends BaseModelService
{

    /**
    * @var CategoryRepository $repository
    */
    private CategoryRepository $repository;

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
        $this->repository = resolve(CategoryRepository::class);
        return CategoryRepository::class;
    }

    public function loadActiveCategories(): Collection
    {
        return $this->repository->loadActive();
    }

    public function getForManagement(): mixed
    {
        return $this->repository->loadForManagement("DESC");
    }

    public function storeCategory(array $data): Model
    {
        ["name" => $data["image"]] = $this->fileService->upload($data, Category::IMAGE_PATH, "image");
        return $this->create($data);
    }

    public function showCategory(int $id): Model
    {
        return $this->repository->find($id);
    }

    public function updateCategory(int $id, array $data): Model
    {
        $foundCategory = $this->repository->find($id);
        $image = $this->fileService->updateFile($foundCategory, $data, Category::IMAGE_PATH, "image");
        
        if ($image) $data["image"] = $image["name"];
        
        $foundCategory->update($data);
        return $foundCategory->refresh();
    }

    public function deleteCategory(int $id): void
    {
        $foundCategory = $this->repository->find($id);
        $this->fileService->remove($foundCategory, Category::IMAGE_PATH, "image");
        $foundCategory->delete();
    }
}
