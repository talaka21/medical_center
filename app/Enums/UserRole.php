<?php

namespace App\Enums;

enum UserRole:string
{
  case ADMIN ='admin';

    case DOCTOR ='doctor';

    case USER = 'user';
    public function guard()
    {
        return match ($this) {
            self::ADMIN => 'admin',
            self::DOCTOR => 'doctor',

            self::USER=> 'user'


        };
    }
}
