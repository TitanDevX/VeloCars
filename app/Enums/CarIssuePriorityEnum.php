<?php

namespace App\Enums;

enum CarIssuePriorityEnum: int
{
    case LOW = 1;
    case NORMAL = 2;
    case HIGH = 3;
    case CRITICAL = 4;

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
