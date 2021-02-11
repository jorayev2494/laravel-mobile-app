<?php

declare(strict_types=1);

namespace App\Exceptions;

/**
 * Class NotFoundException
 * @package App\Exceptions
 */
class NotFoundException extends \Exception
{
    protected $message = "model not found";
}
