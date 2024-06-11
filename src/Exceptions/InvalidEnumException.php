<?php

namespace TekVN\Enum\Exceptions;

use InvalidArgumentException;
use Throwable;

class InvalidEnumException extends InvalidArgumentException
{
    public function __construct(string $message = "Invalid enum", int $code = 500, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
