<?php

namespace DNT\Enum\Exceptions;

use Throwable;

class InvalidValueEnumException extends InvalidEnumException
{
    public function __construct(string $message = "Invalid enum value", int $code = 500, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
