<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\DailyWork;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Room;


class DashboardController extends Controller
{

    public function dashboard()
    {

        $patients = Patient::all();
        $doctors = Doctor::all();
        $rooms = Room::all();
        $beds=Bed::all();
        $nurses=Nurse::all();
        $dailyWork=DailyWork::all();
        return view('dashboard', compact('patients',
            'doctors',
            'rooms',
            'beds',
            'nurses',
            'dailyWork'
    ));
    }





}
