<?php

namespace App\Enums;

enum UserNotifSubEnum: int
{
    case RENTAL = 1;
    case ALL = 2;
    case SELL = 3;
    case DISCOUNT = 4;

    case NEW_BRANCH = 5;


    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
