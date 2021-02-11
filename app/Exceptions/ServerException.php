<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class ServerException extends Exception
{
    protected $code = Response::HTTP_INTERNAL_SERVER_ERROR;
}
