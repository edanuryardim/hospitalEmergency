<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginpost(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }


        return redirect()->route('login')->with('error', 'Email or password is wrong!');

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
