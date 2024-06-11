<?php

use TekVN\Enum\EnumUtilities;

enum EnumString: string
{
    use EnumUtilities;

    case USER_SUSPENDED = 'suspend';
    case ACTIVE = 'active';
}

enum EnumInt: int
{
    use EnumUtilities;

    case USER_SUSPENDED = 0;
    case ACTIVE = 1;
}

enum EnumUnit
{
    use EnumUtilities;

    case USER_SUSPENDED;
    case ACTIVE;
}
