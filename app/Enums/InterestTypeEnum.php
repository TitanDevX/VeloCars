<?php

namespace App\Enums;

enum InterestTypeEnum: string
{
    case PER_YEAR_AMOUNT = 'PER_YEAR_AMOUNT';
    case PER_YEAR_PERCENT = 'PER_YEAR_PERCENT';
    case FIXED_PERCENT = 'FIXED_PERCENT';
    case FIXED_AMOUNT = 'FIXED_AMOUNT';

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
