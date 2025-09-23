<?php

namespace App\Enums;

enum RentalStateEnum: string
{
    case RESERVED = 'RESERVED'; # User reserved the car that is already rented currently.
    case WAITING = 'WAITING'; # The user didn't take their car yet.
    case ACTIVE = 'ACTIVE'; # Active rent. the car is with the customer.

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
