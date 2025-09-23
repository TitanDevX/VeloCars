<?php

namespace App\Enums;

enum InvoiceStateEnum: string
{
    case WAITING = 'WAITING';
    case OVERDUE = 'OVERDUE';
    case PAID = 'PAID';

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
