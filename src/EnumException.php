<?php

namespace TekVN\Enum;

use TekVN\Enum\Exceptions\InvalidNameEnumException;
use TekVN\Enum\Exceptions\InvalidValueEnumException;
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
