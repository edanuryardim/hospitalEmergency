<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\DailyWork;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Room;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function rooms()
    {

        $rooms = Room::all();
        $patients = Patient::all();
        $doctors = Doctor::all();
        $beds=Bed::all();
        $nurses=Nurse::all();
        $dailyWork=DailyWork::all();
        return view('rooms', compact('rooms'
            ,'patients',
            'doctors',
            'beds',
            'nurses',
            'dailyWork'));
    }


    public function getAvailableBeds($roomId)
    {
        $room = Room::find($roomId);
        $beds = $room->availableBeds;


        return response()->json($beds);
    }

}
