<?php

namespace App\Models;

use App\Enums\AppointmentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Doctor;

class Appointment extends Model
{
      use HasFactory;
    protected $fillable = [
        'user_id',
        'doctor_id',
        'date',
        'time',
        'status',
    ];
    protected $casts = [
    'status' => AppointmentStatus::class,
];
public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
