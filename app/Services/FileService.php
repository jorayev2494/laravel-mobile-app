<?php

namespace App\Services;

use App\Models\File;
use App\Repositories\Eloquent\FileRepository;
use App\Services\Base\BaseModelService;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class FileService extends BaseModelService
{

    use FileTrait;

    public function getModelRepository(): string
    {
        return FileRepository::class;
    }

    public function upload(array $data, string $path, string $key = "images", string $disc = "public"): ?array
    {
        $file = null;
        
        if (array_key_exists($key, $data)) {
            $file = $this->uploadFile($path, $data[$key], $disc);
        }

        return $file;
    }

    public function uploads(array $data, string $path, string $key = "images", string $disc = "public"): array
    {
        $files = [];

        if (array_key_exists($key, $data)) {
            foreach ($data[$key] as $uploadedImg) {
                $files[] = $this->uploadFile($path, $uploadedImg, $disc);
            }
        }

        return $files;
    }

    public function updateFile(Model $model, array &$data, string $path, string $key = "images", string $disc = "public"): ?array
    {
        $file = null;
        if (array_key_exists($key, $data)) {
            $this->deleteFile($path, $model->$key);
            $file = $this->upload($data, $path, $key, $disc);
        }

        return $file;
    }

    public function updateFiles(Model $model, array $data, string $path, string $key = "images", string $disc = "public"): array
    {
        $files = [];

        if (array_key_exists($key, $data)) {
            $this->removes($model, $key);
            $files = $this->uploads($data, $path, $key, $disc);
        }

        return $files;
    }

    public function removes(Model $model, $key = "images"): void
    {
        if ($modelFiles = $model->$key) {
            /** @var File $file */
            foreach ($modelFiles as $file) {
                $this->deleteFile($file->path, $file->name);
                $file->delete();
            }
        }
    }

    public function remove(Model $model, string $path, $key = "images"): void
    {
        if ($modelFile = $model->$key) {
            $this->deleteFile($path, $modelFile);
        }
    }

    
    // public function deleteFileS(File $file, $disc = 'public'): bool
    // {
    //     /**
    //      * @var File $foundFile
    //      */
    //     $foundFile = $this->getCloneModelRepository()->getModelClone()->newQuery()->findOrFail($file->id);
    //     $isDeleted = $this->deleteFile($foundFile->path, $foundFile->name, $disc);

    //     if ($isDeleted) return $foundFile->delete();
    //     return false;
    // }
    
}
