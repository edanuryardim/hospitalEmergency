<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;



    //patients
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function daysOnDuty()
    {
        return $this->hasMany(Dailywork::class);
    }




}
