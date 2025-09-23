<?php

namespace App\Enums;

enum CarIssuePriorityEnum: string
{
    case LOW = 'LOW';
    case NORMAL = 'NORMAL';
    case HIGH = 'HIGH';
    case CRITICAL = 'CRITICAL';

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
