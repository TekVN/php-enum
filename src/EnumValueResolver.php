<?php

namespace TekVN\Enum;

use BackedEnum;
use Throwable;

trait EnumValueResolver
{
    use EnumNameResolver;
    use EnumException;

    public static function hasValue(self $enum): bool
    {
        return $enum instanceof BackedEnum || property_exists($enum, 'value');
    }

    /**
     * @throws Throwable
     */
    public static function getValue(string|self $name, bool $throw = false): int|string|null
    {
        $enum = static::tryFromName($name);
        if (! $enum) {
            if ($throw) {
                throw static::invalidValueException($name);
            }
            return null;
        }
        if (static::hasValue($enum)) {
            return $enum->value;
        }
        return $enum->name;
    }

    public function toString(): string
    {
        return (string) static::getValue($this, throw: false);
    }
}
