<?php

namespace TekVN\Enum;

use Throwable;

trait EnumNameResolver
{
    use EnumException;

    /**
     * @throws Throwable
     */
    public static function fromName(string|self $name): self
    {
        $enum = static::tryFromName($name);
        if ($enum) {
            return $enum;
        }
        throw static::invalidNameException($name);
    }

    public static function tryFromName(string|self $name): ?self
    {
        if ($name instanceof static) {
            return $name;
        }
        if (defined("static::{$name}")) {
            return constant("static::{$name}");
        }
        return null;
    }

    protected static function resolveName(string $name): string
    {
        return strtoupper(preg_replace('/(?<!^)([A-Z])/', '_$1', $name));
    }
}
