<?php

declare(strict_types=1);

namespace App\Exceptions;

/**
 * Class AccessDenyException
 * @package App\Exceptions
 */
class AccessDenyException extends \Exception
{
    protected $message = "User doe's not have permissions";
}
