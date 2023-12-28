<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\DailyWork;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Request;
use DateTime;

class NursesController extends Controller
{

    //nursesIndex
    public function nursesIndex()
    {

        $nurses = Nurse::whereNull('exit_date')->get();
        //fetch from all models
        $patients = Patient::all();
        $doctors = Doctor::all();
        $rooms = Room::all();
        $beds=Bed::all();
        $dailyWork=DailyWork::all();
        return view('nurses', compact('nurses'
            ,'patients',
            'doctors',
            'rooms',
            'beds',
            'dailyWork'));
    }


    //editIndex
    public function editIndex($id)
    {
        $nurse = Nurse::findOrFail($id);
        //fetch from all models
        $patients = Patient::all();
        $doctors = Doctor::all();
        $rooms = Room::all();
        $beds=Bed::all();
        $dailyWork=DailyWork::all();

        return view('editNurse', compact('nurse'
            ,'patients',
            'doctors',
            'rooms',
            'beds',
            'dailyWork'));
    }


    public function editnurse(Request $request)
    {
        $nurse = nurse::find($request->id);

        if (!is_null($request->name)) {
            $nurse->name = $request->name;
        }

        if (!is_null($request->surname)) {
            $nurse->surname = $request->surname;
        }

        if (!is_null($request->phone)) {
            $nurse->phone = $request->phone;
        }

        if (!is_null($request->email)) {
            $nurse->email = $request->email;
        }


        if (!is_null($request->address)) {
            $nurse->address = $request->address;
        }

        if (!is_null($request->birth_date)) {
            $nurse->birth_date = $request->birth_date;
        }

        if ($request->hasFile('image')) {

            $resimDosyasi = $request->file('image');
            $resimAdi = time() . '.' . $resimDosyasi->extension();
            $resimDosyasi->move(public_path('uploads'), $resimAdi);
            $nurse->image = 'uploads/' . $resimAdi;

        }


        $nurse->save();


        return redirect()->route('nurses')->with('success', 'nurse updated successfully');
    }


    public function exitnurse(Request $request)
    {

        $nurse = nurse::find($request->id);
        $nurse->exit_date = date('Y-m-d');
        $nurse->save();
        return redirect()->route('nurses')->with('success', "The nurse's exit was successfully completed.");
    }



    public function addNurse(Request $request){
        // E-posta adresi kontrolü
        $existingnurse = Nurse::where('email', $request->email)->first();

        if ($existingnurse) {
            return redirect()->back()->with('error', "
                The email you are trying to add is already registered in the system. Try again");
        }

        // Yeni bir nurse örneği oluştur
        $nurse = new Nurse();

        // İsim
        if ($request->filled('name')) {
            $nurse->name = $request->name;
        }

        // Soyisim
        if ($request->filled('surname')) {
            $nurse->surname = $request->surname;
        }

        // Telefon
        if ($request->filled('phone')) {
            $nurse->phone = $request->phone;
        }

        // E-posta
        if ($request->filled('email')) {
            $nurse->email = $request->email;
        }

        // Cinsiyet
        if ($request->filled('gender')) {
            $nurse->gender = $request->gender;
        }

        // Giriş Tarihi
        $nurse->entry_date = date('Y-m-d');


        // Adres
        if ($request->filled('address')) {
            $nurse->address = $request->address;
        }

        // Doğum Tarihi
        if ($request->filled('birth_date')) {
            $date = DateTime::createFromFormat('m/d/Y', $request->birth_date);
            $nurse->birth_date = $date->format('Y-m-d');
        }

        // Resim
        if ($request->hasFile('image')) {
            $resimDosyasi = $request->file('image');
            $resimAdi = time() . '.' . $resimDosyasi->extension();
            $resimDosyasi->move(public_path('uploads'), $resimAdi);
            $nurse->image = 'uploads/' . $resimAdi;
        }

        // Kaydet
        $nurse->save();

        return redirect()->route('nurses')->with('success', 'nurse added successfully');
    }


}
