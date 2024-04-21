<?php

namespace DNT\Enum;

use BadMethodCallException;

trait EnumUtilities
{
    use EnumJsonable;

    public static function __callStatic(string $method, array $arguments): mixed
    {
        $name = static::resolveName($method);
        $class = static::class;
        if (method_exists($class, $name)) {
            return call_user_func_array([$class, $name], $arguments);
        }
        if (defined("static::{$name}")) {
            return constant("static::{$name}");
        }
        throw new BadMethodCallException("Call to undefined method {$class}::{$method}()");
    }
}
