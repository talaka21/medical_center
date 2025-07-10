<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Admin extends Authenticatable
{


    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory,HasRoles,HasApiTokens ;   protected $guard_name = 'admin';
    protected $fillable = [
    'name',
    'email',
    'password',
];
protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
