<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Room;
use App\Models\DailyWork;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PatientController extends Controller
{



    public function patientsIndex()
    {

        $patients = Patient::all();
        $doctors = Doctor::all();
        $nurses = Nurse::all();
        $rooms = Room::all();
        $beds = Bed::all();
        $dailyWork = DailyWork::all();
        return view('patients', compact(
            'patients',
            'doctors',
            'nurses',
            'rooms',
            'beds',
            'dailyWork'
        ));
    }


    //index
    public function addPatientIndex()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $nurses = Nurse::all();
        $allBeds = Bed::all();
        $beds = Bed::all();
        $availablerooms = Room::where('available_beds', '>', 0)->get();



        return view('addpatient', compact('patients', 'doctors', 'nurses', 'availablerooms', 'allBeds', 'beds'));
    }



    //add
    public function add(Request $request)
    {
        $patient = new Patient;
        $patient->name = $request->input('name');
        $patient->surname = $request->input('surname');
        $patient->phone = $request->input('phone');
        $patient->birth_date = Carbon::createFromFormat('Y-m-d', $request->input('birth_date'))->format('Y-m-d');
        $patient->gender = $request->input('gender');
        $patient->id_number = $request->input('id_number');
        $patient->doctor_id = $request->input('doctor');
        $patient->nurse_id = $request->input('nurse');
        $patient->entry_date = now();


        $dailywork = DailyWork::where('date', date('Y-m-d'))->first();
        if ($dailywork == null) {
            $dailywork = new DailyWork();
            $dailywork->date = date('Y-m-d');
            $dailywork->patient_count = 1;
            $dailywork->created_at = now();
            $dailywork->updated_at = now();
            $dailywork->save();
        } else {
            $dailywork->patient_count = $dailywork->patient_count + 1;
            $dailywork->save();
        }


        $roomId = $request->input('room');
        $bedId = $request->input('bed');

        $room = Room::find($roomId);
        $bed = Bed::find($bedId);


        $patient->room()->associate($room);

        $patient->bed()->associate($bed);





        $room->available_beds = $room->available_beds - 1;
        $room->save();

        $bed->is_occupied = 1;
        $bed->save();
        $patient->save();
        return redirect('/patients')->with('status', 'Patient Added Successfully');
    }


    public function editIndex($id)
    {
        $patient = Patient::findOrFail($id);
        $patients = Patient::all();
        $doctors = Doctor::all();
        $nurses = Nurse::all();
        $beds = Bed::all();
        $allBeds = Bed::all();
        $availablerooms = Room::where('available_beds', '>', 0)->get();

        return view('editPatient', compact('patient', 'doctors', 'nurses', 'availablerooms', 'allBeds', 'patients', 'beds'));
    }

    public function editPatient(Request $request)
    {
        // Find the patient
        $patient = Patient::findOrFail($request->id);

        // Store the current room and bed IDs
        $currentRoomId = $patient->room_id;
        $currentBedId = $patient->bed_id;

        // Update patient attributes based on the request
        $patient->name = $request->input('name') !== null ? $request->input('name') : $patient->name;
        $patient->surname = $request->input('surname') !== null ? $request->input('surname') : $patient->surname;
        $patient->phone = $request->input('phone') !== null ? $request->input('phone') : $patient->phone;
        $patient->birth_date = $request->input('birth_date') !== null ? Carbon::createFromFormat('Y-m-d', $request->input('birth_date'))->format('Y-m-d') : $patient->birth_date;
        $patient->gender = $request->input('gender') !== null ? $request->input('gender') : $patient->gender;
        $patient->id_number = $request->input('id_number') !== null ? $request->input('id_number') : $patient->id_number;
        $patient->doctor_id = $request->input('doctor_id') !== null ? $request->input('doctor_id') : $patient->doctor_id;
        $patient->nurse_id = $request->input('nurse_id') !== null ? $request->input('nurse_id') : $patient->nurse_id;
        $patient->room_id = $request->input('room') !== null ? $request->input('room') : $patient->room_id;
        $patient->bed_id = $request->input('bed') !== null ? $request->input('bed') : $patient->bed_id;
        $patient->entry_date = $request->input('entry_date') !== null ? Carbon::createFromFormat('Y-m-d', $request->input('entry_date'))->format('Y-m-d') : $patient->entry_date;
        $patient->exit_date = $request->input('exit_date') !== null ? Carbon::createFromFormat('Y-m-d', $request->input('exit_date'))->format('Y-m-d') : $patient->exit_date;
        $patient->diagnosis = $request->input('diagnosis') !== null ? $request->input('diagnosis') : $patient->diagnosis;
        $patient->intervention = $request->input('intervention') !== null ? $request->input('intervention') : $patient->intervention;

        // Find the new room and bed
        $roomId = $request->input('room');
        $bedId = $request->input('bed');
        $room = Room::find($roomId);
        $bed = Bed::find($bedId);

        // Associate the patient with the new room and bed
        $patient->room()->associate($room);
        $patient->bed()->associate($bed);

        // Save the patient changes
        $patient->save();

        // If the patient is assigned to a different bed, update the previous bed
        if ($bedId != $currentBedId) {
            $previousBed = Bed::find($currentBedId);
            $previousBed->is_occupied = 0;
            $previousBed->save();
        }

        // If the patient is assigned to a different room, update the previous room
        if ($roomId != $currentRoomId) {
            $previousRoom = Room::find($currentRoomId);
            $previousRoom->available_beds = $previousRoom->available_beds + 1;
            $previousRoom->save();
        }

        // Update the new room and bed occupancy status
        $room->available_beds = $room->available_beds - 1;
        $room->save();

        $bed->is_occupied = 1;
        $bed->save();

        // Redirect with success message
        return redirect('/patients')->with('success', 'Patient Updated Successfully');
    }
}
