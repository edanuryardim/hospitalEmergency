<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    //doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

//nurse
    public function nurse()
    {
        return $this->belongsTo(Nurse::class);
    }
    //room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    //bed
    public function bed()
    {
        return $this->belongsTo(Bed::class);
    }
}
