<?php

namespace DNT\Enum;

trait EnumArrayable
{
    use EnumValueResolver;

    public static function toArray(): array
    {
        return array_reduce(
            static::cases(),
            static function (array $result, mixed $enum): array {
                $result[$enum->name] = static::getValue($enum, throw: false);
                return $result;
            },
            []);
    }
}
