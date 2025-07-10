<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spacialty extends Model
{
     protected $table = 'specialties';
    protected $fillable = ['name' ];
    public $translatable = ['name'];
   public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
