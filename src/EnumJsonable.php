<?php

namespace TekVN\Enum;

trait EnumJsonable
{
    use EnumArrayable;

    public static function toJson(int $flags = JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR): string
    {
        return json_encode(static::toArray(), $flags);
    }
}
