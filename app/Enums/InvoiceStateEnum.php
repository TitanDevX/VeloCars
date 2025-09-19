<?php

namespace App\Enums;

enum InvoiceStateEnum: int
{
    case WAITING = 1;
    case OVERDUE = 2;
    case PAID = 3;

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
