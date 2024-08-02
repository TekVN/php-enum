<?php

namespace TekVN\Enum;

trait EnumComparable
{
    public function is(mixed $value, bool $strict = true): bool
    {
        $selfValue = self::getValue($this);
        $targetValue = self::getValue($value);
        if (is_null($selfValue) || is_null($targetValue)) {
            var_dump([$targetValue,$value]);
            return false;
        }

        if (! $strict) {
            return $selfValue == $targetValue;
        }

        return $selfValue === $targetValue;
    }
}
