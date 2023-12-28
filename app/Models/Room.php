<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    //beds
    public function beds()
    {
        return $this->hasMany(Bed::class);
    }
    //available beds
    public function availableBeds()
    {
        return $this->hasMany(Bed::class)->where('is_occupied', 0);
    }
    //patients
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

}
