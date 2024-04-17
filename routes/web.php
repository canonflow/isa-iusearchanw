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
        Route::view("/input/nota", "admin.tambahNota")->name("tambahNota");
    }
);

// // ===== Patient =====
Route::group(
    ['prefix' => 'patient', 'as' => 'patient.'],
    function () {
        Route::get('/', [Patient\PatientController::class, 'index'])->name('index');
        Route::view('/janjiTemu', 'doctor.patient.janjitemu')->name('patient.janjitemu');
        Route::view('/', 'doctor.patient.index')->name('patient.index');
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
        Route::view("/resep", "doctor.recipe")->name("resep");
        Route::view("/praktik", "doctor.practicSchedule")->name("praktik");
        Route::view('/janjiTemu', 'doctor.dashboard.janjitemu')->name('janjiTemu');
        Route::view('/tambahRecipe', 'doctor.dashboard.insertRecipe')->name('insertRecipe');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
