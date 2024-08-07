<?php

namespace TekVN\Enum;

trait EnumComparable
{
    public function is(mixed $value, bool $strict = true): bool
    {
        $selfValue = self::getValue($this, strict: $strict);
        $targetValue = self::getValue($value, strict: $strict);
        if (is_null($selfValue) || is_null($targetValue)) {
            return false;
        }

        if (! $strict) {
            return $selfValue == $targetValue;
        }

        return $selfValue === $targetValue;
    }
}
