<?php

namespace App\Enums;

enum InterestTypeEnum: int
{
    case PER_YEAR_AMOUNT = 1;
    case PER_YEAR_PERCENT = 1;
    case FIXED_PERCENT = 2;
    case FIXED_AMOUNT = 3;

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
