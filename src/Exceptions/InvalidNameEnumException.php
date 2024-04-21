<?php

namespace DNT\Enum\Exceptions;

use Throwable;

class InvalidNameEnumException extends InvalidEnumException
{
    public function __construct(string $message = "Invalid enum name", int $code = 500, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
