<?php

namespace App\Enums;

enum UserNotifSubEnum: string
{
    case RENTAL = 'RENTAL';
    case ALL = 'ALL';
    case SELL = 'SELL';
    case DISCOUNT = 'DISCOUNT';

    case NEW_BRANCH = 'NEW_BRANCH';


    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
