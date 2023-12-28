<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bed;
use App\Models\DailyWork;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Room;

class ChatController extends Controller
{
    public function chat(){
        $patients = Patient::all();
        $doctors = Doctor::all();
        $rooms = Room::all();
        $beds=Bed::all();
        $nurses=Nurse::all();
        $dailyWork=DailyWork::all();
        return view('chat', compact('patients',
            'doctors',
            'rooms',
            'beds',
            'nurses',
            'dailyWork'
    ));

    }

    public function chatsend(Request $request)
    {
       dd($request->all());


    }
}
