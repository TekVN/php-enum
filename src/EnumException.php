<?php

namespace DNT\Enum;

use DNT\Enum\Exceptions\InvalidNameEnumException;
use DNT\Enum\Exceptions\InvalidValueEnumException;
use Throwable;

trait EnumException
{
    protected static function invalidValueException(mixed $name): Throwable
    {
        return new InvalidValueEnumException();
    }

    protected static function invalidNameException(mixed $name): Throwable
    {
        return new InvalidNameEnumException();
    }
}
