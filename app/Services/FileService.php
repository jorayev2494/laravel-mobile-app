<?php

namespace App\Services;

use App\Models\File;
use App\Repositories\Eloquent\FileRepository;
use App\Services\Base\BaseModelService;
use App\Traits\FileTrait;
use Illuminate\Http\UploadedFile;

class FileService extends BaseModelService
{

    use FileTrait;

    public function getModelRepository(): string
    {
        return FileRepository::class;
    }

    public function uploadFileS(string $path, UploadedFile $uploadedFile, string $disc = 'public'): File
    {
        return $this->create($this->uploadFile($path, $uploadedFile, $disc));
    }

    public function updateFileS(File $oldFile, UploadedFile $uploadedFile, string $disc = 'public'): File
    {
        $newFileData = $this->updateFile($oldFile->path, $oldFile->name, $uploadedFile, $disc);
        return $this->update($oldFile->id, $newFileData);
    }

    public function deleteFileS(File $file, $disc = 'public'): bool
    {
        /**
         * @var File $foundFile
         */
        $foundFile = $this->getCloneModelRepository()->getModelClone()->newQuery()->findOrFail($file->id);
        $isDeleted = $this->deleteFile($foundFile->path, $foundFile->name, $disc);

        if ($isDeleted) return $foundFile->delete();
        return false;
    }
    
}
