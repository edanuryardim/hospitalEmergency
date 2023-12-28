<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\DailyWork;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Room;
use Carbon\Carbon;


use Illuminate\Http\Request;

class DailyWorkController extends Controller
{
    public function dailyworkIndex()
    {
        $now = Carbon::now();
        $year = $now->year;
        $month = $now->format('Y-m');

        $patients = Patient::all();

        $rooms = Room::all();
        $beds=Bed::all();

        $dailyWork=DailyWork::all();






        $thismonth = DailyWork::where('date', 'LIKE', "%$month%")
            ->get();

        $nurses = Nurse::all();
        $doctors = Doctor::all();
        $patients = Patient::all();


        $today = DailyWork::where('date', date('Y-m-d'))->first();
        return view('dailyWork', compact('thismonth','today', 'nurses','doctors','rooms','beds','patients'));
    }




    public function dailyAddorUpdate(Request $request)
    {
        $dailywork = new DailyWork();



        $dailywork->doctor_id = $request->input('doctor_id');
        $dailywork->nurse1_id = $request->input('nurse1_id');
        $dailywork->nurse2_id = $request->input('nurse2_id');
        $dailywork->nurse3_id = $request->input('nurse3_id');
        $dailywork->date= now();
        if($dailywork->patient_count !=null){
            $dailywork->patient_count = $request->input('patient_count');
        }
        else{
            $dailywork->patient_count = 0;
        }


        $dailywork->save();

        return redirect()->back()->with('success', 'Daily Work Added Successfully');

    }
}
