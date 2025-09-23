<?php

namespace App\Enums;

enum CarIssueStatusEnum: string
{
    case UNTOUCHED = 'UNTOUCHED';
    case FIXING = 'FIXING';
    case FIXED = 'FIXED';

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
