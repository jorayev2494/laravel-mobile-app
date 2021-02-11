<?php

declare(strict_types=1);

namespace App\Exceptions;

/**
 * Class UnauthorizedException
 * @package App\Exceptions
 */
class UnauthorizedException extends \Exception
{
    protected $message = "User can't authorized in system";
}
