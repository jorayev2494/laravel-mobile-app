<?php

namespace App\Exceptions;

class FileUploadException extends ServerException
{
    protected $message = 'Error during file upload';
}
