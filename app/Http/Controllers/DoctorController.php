<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\DailyWork;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\Facades\Image;
use DateTime;

class DoctorController extends Controller
{

    public function doctorsIndex()
    {
        // exit_date sütunu null olmayan doktorları getir
        $doctors = Doctor::whereNull('exit_date')->get();
        //all models of all
        $patients = Patient::all();
        $rooms = Room::all();
        $beds=Bed::all();
        $nurses=Nurse::all();
        $dailyWork=DailyWork::all();

        return view('doctors', compact('doctors'
            ,'patients',
            'rooms',
            'beds',
            'nurses',
            'dailyWork'));
    }





    public function editIndex($id)
    {
        $doctor = Doctor::find($id);
        //all models of all
        $patients = Patient::all();
        $rooms = Room::all();
        $beds=Bed::all();
        $nurses=Nurse::all();
        $dailyWork=DailyWork::all();
        return view('editDoctor', compact('doctor'
            ,'patients',
            'rooms',
            'beds',
            'nurses',
            'dailyWork'));
    }






    public function editDoctor(Request $request)
    {
        $doctor = Doctor::find($request->id);

        if (!is_null($request->name)) {
            $doctor->name = $request->name;
        }

        if (!is_null($request->surname)) {
            $doctor->surname = $request->surname;
        }

        if (!is_null($request->phone)) {
            $doctor->phone = $request->phone;
        }

        if (!is_null($request->email)) {
            $doctor->email = $request->email;
        }

        if (!is_null($request->specialty)) {
            $doctor->specialty = $request->specialty;
        }

        if (!is_null($request->address)) {
            $doctor->address = $request->address;
        }

        if (!is_null($request->birth_date)) {
            $doctor->birth_date = $request->birth_date;
        }

        if ($request->hasFile('image')) {

            $resimDosyasi = $request->file('image');
            $resimAdi = time() . '.' . $resimDosyasi->extension();
            $resimDosyasi->move(public_path('uploads'), $resimAdi);
            $doctor->image = 'uploads/' . $resimAdi;

        }


        $doctor->save();


        return redirect()->route('doctors')->with('success', 'Doctor updated successfully');
    }





    public function exitDoctor(Request $request)
    {

        $doctor = Doctor::find($request->id);
        $doctor->exit_date = date('Y-m-d');
        $doctor->save();
        return redirect()->route('doctors')->with('success', "The doctor's exit was successfully completed.");
    }







    public function addDoctor(Request $request){
        // E-posta adresi kontrolü
        $existingDoctor = Doctor::where('email', $request->email)->first();

        if ($existingDoctor) {
            return redirect()->back()->with('error', "
                The email you are trying to add is already registered in the system. Try again");
        }

        // Yeni bir Doctor örneği oluştur
        $doctor = new Doctor();

        // İsim
        if ($request->filled('name')) {
            $doctor->name = $request->name;
        }

        // Soyisim
        if ($request->filled('surname')) {
            $doctor->surname = $request->surname;
        }

        // Telefon
        if ($request->filled('phone')) {
            $doctor->phone = $request->phone;
        }

        // E-posta
        if ($request->filled('email')) {
            $doctor->email = $request->email;
        }

        // Cinsiyet
        if ($request->filled('gender')) {
            $doctor->gender = $request->gender;
        }

        // Giriş Tarihi
        $doctor->entry_date = date('Y-m-d');

        // Uzmanlık Alanı
        if ($request->filled('specialty')) {
            $doctor->specialty = $request->specialty;
        }

        // Adres
        if ($request->filled('address')) {
            $doctor->address = $request->address;
        }

        // Doğum Tarihi
        if ($request->filled('birth_date')) {
            $date = DateTime::createFromFormat('m/d/Y', $request->birth_date);
            $doctor->birth_date = $date->format('Y-m-d');
        }

        // Resim
        if ($request->hasFile('image')) {
            $resimDosyasi = $request->file('image');
            $resimAdi = time() . '.' . $resimDosyasi->extension();
            $resimDosyasi->move(public_path('uploads'), $resimAdi);
            $doctor->image = 'uploads/' . $resimAdi;
        }

        // Kaydet
        $doctor->save();

        return redirect()->route('doctors')->with('success', 'Doctor added successfully');
    }


}
