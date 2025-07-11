<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Appointment;
use Spatie\Translatable\HasTranslations;

class Doctor extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\DoctorFactory> */
    use HasFactory ,HasRoles,HasApiTokens ,HasTranslations;  protected $guard_name = 'doctor';
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
      public function specialties()
{
    return $this->belongsToMany(Spacialty::class, 'doctor_specialties', 'doctor_id', 'specialty_id');
}
 public function bookedAppointments()
{
    return $this->hasMany(Appointment::class)->where('status', 'booked');
}
public function appointments()
{
    return $this->hasMany(Appointment::class);
}
}
