<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Doctor;
use App\Http\Controllers\Patient;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('home');
});


// ===== Admin =====
Route::group(
    ['prefix' => 'admin', 'as' => 'admin.'],
    function () {
        // Route::get('/', [Admin\AdminController::class, 'index'])->name('index');
    }
);

// ===== Patient =====
Route::group(
    ['prefix' => 'patient', 'as' => 'patient.'],
    function () {
        // Route::get('/', [Patient\PatientController::class, 'index'])->name('index');
        Route::view('/home', 'patient.index')->name('index');
    }
);

// ===== Doctor =====
Route::group(
    ['prefix' => 'doctor', 'as' => 'doctor.'],
    function () {
        // Dashboard
        // Route::get('/', [Doctor\DoctorController::class, 'index'])->name('index');

        // // Janji Temu
        // Route::get('/patient', [Doctor\PatientController::class, 'index'])
        //     ->name('patient.index');
        // Route::post('/patient', [Doctor\PatientController::class, 'store'])
        //     ->name('patient.store');
        // Route::post('/patient/{janjiTemu}/destroy', [Doctor\PatientController::class, 'destroy'])
        //     ->name('patient.destroy');
        Route::view('/janjiTemu', 'doctor.dashboard.janjitemu')->name('janjiTemu');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
