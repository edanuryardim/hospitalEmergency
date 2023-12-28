<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\DailyWork;
use App\Models\Doctor;
use App\Models\Nurse;
use App\Models\Patient;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function users(){

        $users = User::all();
        $patients = Patient::all();
        $doctors = Doctor::all();
        $nurses = Nurse::all();
        $rooms = Room::all();
        $beds = Bed::all();
        $dailyWork = DailyWork::all();
        return view('users',compact('users',
        'patients',
        'doctors',
        'nurses',
        'rooms',
        'beds',
        'dailyWork'
    ));
    }




    public function editIndex($id){

            $user = User::findOrFail($id);
            $patients = Patient::all();
            $doctors = Doctor::all();
            $nurses = Nurse::all();
            $rooms = Room::all();
            $beds = Bed::all();
            $dailyWork = DailyWork::all();
            return view('editUser',compact('user',
            'patients',
            'doctors',
            'nurses',
            'rooms',
            'beds',
            'dailyWork'
        ));
        }


        public function edituser(Request $request)
        {
            $user = User::findOrFail($request->id);


            // Update name if not null
            if ($request->filled('name')) {
                $user->name = $request->name;
            }

            // Update email if not null
            if ($request->filled('email')) {
                $user->email = $request->email;
            }

            // Update role if not null
            if ($request->filled('role')) {
                $user->role = $request->role;
            }

            // Update password if not null
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return redirect()->route('users')->with('success', 'User Updated Successfully');
        }

        public function deleteUser($id)
        {
            // Kullanıcıyı bul
            $user = User::findOrFail($id);

            // Kullanıcıyı sil
            $user->delete();

            // Başarı mesajı veya başka bir şey döndürebilirsiniz
            return redirect()->route('users')->with('success', 'User deleted successfully');
        }

        public function showNewUserForm()
        {

            return view('addUser');
        }


        public function createNewUser(Request $request)
        {
            // Kullanıcıyı oluştur
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'), // veya varsayılan bir değer atayabilirsiniz
                'password' => bcrypt($request->input('password')),
            ]);

            // Başarı mesajı veya başka bir şey döndürebilirsiniz
            return redirect()->route('users')->with('success', 'New user created successfully');
        }

}
