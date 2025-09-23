<?php

namespace App\Enums;

enum InstallmentStateEnum: string
{
    case WAITING = 'WAITING';
    case ACTIVE = 'ACTIVE';
    case DEFAULT = 'DEFAULT';

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
