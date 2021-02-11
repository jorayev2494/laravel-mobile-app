<?php

namespace App\Traits;

use Illuminate\Support\{Arr, Str};

/**
 * Base64Converter
 */
trait Base64ConverterTrait
{
    /**
     * Decode Base64
     *
     * @param string $encodedFile
     * @return array
     */
    public function decodeBase64(string $encodedFile): array
    {
        $file_parts = explode(";base64,", $encodedFile);
        $file_type_aux = explode("/", Arr::first($file_parts));

        $mime_type = str_replace('data:', '', Arr::first($file_parts));
        $file_type = Arr::last($file_type_aux);
        $file_base64 = base64_decode(Arr::last($file_parts));

        return compact('mime_type', 'file_type', 'file_base64');
    }

    /**
     * EncodeBase64
     *
     * @param string $filePath
     * @param string $mime_type
     * @return string
     */
    public function encodeBase64(string $filePath, string $mime_type): string
    {
        if (!file_exists($filePath)) {
            return null;
        }
        
        $fileBinary = fread(fopen($filePath, 'rb'), filesize($filePath));
        return 'data:' . $mime_type . ';base64,' . base64_encode($fileBinary);
    }

    /**
     * Calculate base64 file size
     *
     * @param string $value
     * @return int
     */
    protected function calculateBytesInStr(string &$value): int
    {
        $n = strlen($value); // size base64 string
        $y = 3;
        if (Str::endsWith($value, '==')) {
            $y = 2;
        } elseif (Str::endsWith($value, '=')) {
            $y = 1;
        }
        return (int) ($n * (3 / 4)) - $y; // Calculate file size in bytes
    }
}
