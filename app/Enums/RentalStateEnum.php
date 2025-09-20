<?php

namespace App\Enums;

enum RentalStateEnum: int
{
    case RESERVED = 1; # User reserved the car that is already rented currently.
    case WAITING = 2; # The user didn't take their car yet.
    case ACTIVE = 3; # Active rent. the car is with the customer.

    public static function fromName($name)
    {
        return constant("self::$name");
    }
}
