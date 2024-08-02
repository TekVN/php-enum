<?php

namespace TekVN\Enum;

use BackedEnum;
use ReflectionEnum;
use Throwable;
use UnitEnum;

trait EnumValueResolver
{
    use EnumNameResolver;
    use EnumException;

    public static function hasValue(self $enum): bool
    {
        return $enum instanceof BackedEnum || property_exists($enum, 'value');
    }

    public static function getValueFromInstance(UnitEnum|BackedEnum $enum): int|string|null
    {

        if ($enum instanceof BackedEnum) {
            return $enum->value;
        }
        return $enum->name;
    }

    protected static function throwOrNull(mixed $name, bool $throw = true): null
    {
        if ($throw) {
            throw static::invalidValueException($name);
        }
        return null;
    }

    /**
     * @throws Throwable
     */
    public static function getValue(int|string|self $name, bool $throw = false): int|string|null
    {
        if ($name instanceof UnitEnum) {
            return static::getValueFromInstance($name);
        }
        if (is_int($name)) {
            return static::tryFrom($name) ?? self::throwOrNull($name, $throw);
        }

        $enum = static::tryFromName($name);
        if (! $enum) {
            $backingType = (new ReflectionEnum(static::class))->getBackingType();
            if ($backingType?->getName() === 'int') {
                if (! is_numeric($name)) {
                    return self::throwOrNull($name, $throw);
                }
                return static::tryFrom((int) $name)?->value;
            }
            if ($backingType?->getName() === 'string') {
                return static::tryFrom($name)?->value;
            }
        }
        if (! $enum) {
            return self::throwOrNull($name, $throw);
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
