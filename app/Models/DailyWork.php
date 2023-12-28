<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyWork extends Model
{
    use HasFactory;


    protected $table = 'daily_works';

    protected $fillable = [
        'doctor_id',
        'nurse1_id',
        'nurse2_id',
        'nurse3_id',
        'date',
        'patient_count',
    ];

    //doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    //patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function nurse1()
    {

        return $this->belongsTo(Nurse::class, 'nurse1_id');
    }
    public function nurse2()
    {

        return $this->belongsTo(Nurse::class, 'nurse2_id');
    }
    public function nurse3()
    {

        return $this->belongsTo(Nurse::class, 'nurse3_id');
    }






}
