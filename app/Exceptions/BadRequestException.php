<?php

declare(strict_types=1);

namespace App\Exceptions;

/**
 * Class BadRequestException
 * @package App\Exceptions
 */
class BadRequestException extends \Exception
{
    protected $message = "Invalid credentials";
}
