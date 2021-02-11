<?php

namespace App\Exceptions;

/**
 * Class ServiceException
 *
 * @package App\Exceptions
 */
class ServiceException extends \Exception
{
    protected $message = 'Service initializing error';
}
