<?php

namespace App\Exceptions;

use Exception;

class NotCreatedException extends Exception
{
    protected $message = "Model not created";
}
