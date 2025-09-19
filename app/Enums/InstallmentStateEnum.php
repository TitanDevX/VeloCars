<?php

namespace App\Enums;

enum InstallmentStateEnum: int
{
    case WAITING = 1;
    case ACTIVE = 2;
    case DEFAULT = 3;

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
