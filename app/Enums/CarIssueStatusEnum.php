<?php

namespace App\Enums;

enum CarIssueStatusEnum: int
{
    case UNTOUCHED = 1;
    case FIXING = 2;
    case FIXED = 3;

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
