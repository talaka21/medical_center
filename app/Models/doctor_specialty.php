<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class doctor_specialty extends Model
{
   protected $table = 'doctor_specialties';
    protected $fillable = [
        'doctor_id',
        'specialty_id',

    ];
}
