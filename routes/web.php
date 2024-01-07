<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\DailyWorkController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NursesController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'loginpost'])->name('login');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/rooms', [RoomsController::class, 'rooms'])->name('rooms');

    Route::get('/doctors', [DoctorController::class, 'doctorsIndex'])->name('doctors');
    Route::get('/doctors/{id}/edit', [DoctorController::class, 'editIndex'])->name('doctorEditIndex');
    Route::post('/editdoctor', [DoctorController::class, 'editDoctor'])->name('editdoctor');
    Route::post('/doctors/exit', [DoctorController::class, 'exitDoctor'])->name('exitDoctor');
    Route::post('/addDoctor', [DoctorController::class, 'addDoctor'])->name('addDoctor');



    Route::get('/nurses', [NursesController::class, 'nursesIndex'])->name('nurses');
    Route::get('/nurses/{id}/edit', [NursesController::class, 'editIndex'])->name('nurseEditIndex');
    Route::post('/editnurse', [NursesController::class, 'editnurse'])->name('editnurse');
    Route::post('/nurses/exit', [NursesController::class, 'exitnurse'])->name('exitnurse');
    Route::post('/addNurse', [NursesController::class, 'addNurse'])->name('addNurse');

    Route::get('/patients', [PatientController::class, 'patientsIndex'])->name('patients');
    Route::get('/addpatient', [PatientController::class, 'addPatientIndex'])->name('addpatientIndex');
    Route::post('/addpatient', [PatientController::class, 'add'])->name('addpatient');
    Route::get('/patients/{id}/edit', [PatientController::class, 'editIndex'])->name('editpatientIndex');
    Route::post('/patients/edit', [PatientController::class, 'editPatient'])->name('editpatient');

    Route::get('/api/available-beds/{roomId}', [RoomsController::class, 'getAvailableBeds']);

    Route::get('/chat', [ChatController::class, 'chat'])->name('chat');
    Route::post('/chat', [ChatController::class, 'chatsend'])->name('chat');

    //users
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::get('/users/{id}/edit', [UserController::class, 'editIndex'])->name('editUserIndex');
    Route::post('/new-user', [UserController::class, 'createNewUser'])->name('createNewUser');

    //edituser
    Route::post('/edituser', [UserController::class, 'edituser'])->name('edituser');
    Route::delete('//delete-user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');



    Route::get('/dailywork', [DailyWorkController::class, 'dailyworkIndex'])->name('dailywork');
    Route::post('/addDailyForm', [DailyWorkController::class, 'dailyAddorUpdate'])->name('dailyAdd');


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::fallback(function () {
    return view('404');
});
