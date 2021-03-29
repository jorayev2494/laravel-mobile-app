<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait FileTrait 
{
    private int $lengthRandomName = 32;

    /**
     * Upload File
     *
     * @param string $path
     * @param UploadedFile $file
     * @param string $disc
     * @return array
     */
    protected function uploadFile(string $path, UploadedFile $uploadedFile, string $disc = 'public'): array
    {
        $fileData['path'] = $path;
        $fileData['mime_type'] = $uploadedFile->getClientMimeType();
        $fileData['type'] = $uploadedFile->getClientOriginalExtension();
        $fileData['extension'] = $uploadedFile->getClientOriginalExtension();
        $fileData['size'] = $uploadedFile->getSize();
        $fileData['user_file_name'] = $uploadedFile->getClientOriginalName();
        $fileData['name'] = Str::random($this->lengthRandomName) . '.' . $fileData['type'];
        $fileData['full_path'] = $uploadedFile->storeAs($path, $fileData['name'], ['disk' => $disc]);
        return $fileData;
    }

    /**
     * Update File
     *
     * @param string $path
     * @param string $deleteFileName
     * @param UploadedFile $file
     * @param string $disc
     * @return array
     */
    protected function updateFile(string $path, ?string $deleteFileName, UploadedFile $uploadedFile, string $disc = 'public'): array
    {
        // dd($deleteFileName, Str::contains($deleteFileName, $path));
        // if ($deleteFileName && Str::contains($deleteFileName, $path)) {
        //     dd('start');
        //     $deleteFileName = str_replace($path, null, $deleteFileName);
        //     $this->deleteFile($path, $deleteFileName, $disc);
        // }

        $this->deleteFile($path, $deleteFileName, $disc);
        return $this->uploadFile($path, $uploadedFile, $disc);
    }

    /**
     * Delete File
     *
     * @param string $path
     * @param string $fileName
     * @param string $disc
     * @return boolean
     */
    protected function deleteFile(string $path, string $deleteFileName, string $disc = 'public'): bool
    {
        if (!Str::contains($deleteFileName, 'default.') && Storage::disk($disc)->exists($path) && !filter_var($deleteFileName, FILTER_VALIDATE_URL)) {
            return Storage::disk($disc)->delete($path . '/' . $deleteFileName);
        }

        return true;
    }

    /**
     * Delete Directory
     *
     * @param string $path
     * @return boolean
     */
    protected function deleteDir(string $path, string $disk = 'public'): bool
    {
        if (Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->deleteDirectory($path);
            return true;
        }

        return false;
    }
}