<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Doctor;
use App\Http\Controllers\Patient;
use GuzzleHttp\Middleware;
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
    ['middleware' => 'admin','prefix' => 'admin', 'as' => 'admin.'],
    function () {
        Route::get('/', [Admin\AdminController::class, 'index'])->name('index');
        Route::view("/input/nota", "admin.tambahNota")->name("tambahNota");
        Route::view('/display/janjiTemu', 'admin.dashboard.janjitemu')->name('admin.janjiTemu');
        Route::view('/display/service', 'admin.dashboard.service')->name('admin.service');
        Route::view('/display/recipe', 'admin.dashboard.recipe.blade.php')->name('admin.recipe.blade.php');
//        Route::view('/listdokter', 'admin.dashboard.listdoctor')->name('admin.listdoctor');
        Route::get('/listdokter', [Admin\AdminController::class, 'displayDoctor']);
        Route::get('/listpasien', [Admin\AdminController::class, 'displayPatient']);
        // Route::view('/listpasien', 'admin.dashboard.listpatient')->name('admin.listpatient');

    }
);

// // ===== Patient =====
Route::group(
    ['middleware' => 'patient', 'prefix' => 'patient', 'as' => 'patient.'],
    function () {
        Route::get('/', [Patient\PatientController::class, 'index'])->name('index');
        Route::view('/janjiTemu', 'patient.janjitemu')->name('janjitemu');
        Route::post('/janjiTemu', [Patient\PatientController::class, 'createJanjiTemu'])->name('create-janjitemu');
    }
);

// ===== Doctor =====
Route::group(
    ['middleware' => 'doctor', 'prefix' => 'doctor', 'as' => 'doctor.'],
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
        Route::get('/', [Doctor\DoctorController::class, 'index'])->name('index');
        Route::view("/resep", "doctor.dashboard.recipe.blade.php")->name("resep");
        Route::view("/praktik", "doctor.dashboard.practicSchedule")->name("praktik");
        Route::get('/janjiTemu', [Doctor\DoctorController::class, 'janjiTemu'])->name('janjiTemu');
        Route::post("/janjiTemu/{janjiTemu}",[Doctor\DoctorController::class, 'acceptJanjiTemu'])->name('janjiTemu');
        Route::view('/tambahRecipe', 'doctor.dashboard.insertRecipe')->name('insertRecipe');
        Route::view('/listdokter', 'doctor.patient.listdoctor')->name('admin.listdoctor');
        Route::get('/janjiTemu/{janjiTemu}/riwayat', [Doctor\DoctorController::class, 'riwayat'])->name('riwayat');
        Route::post('/janjiTemu/{janjiTemu}/riwayat', [Doctor\DoctorController::class, 'storeRiwayat'])->name('riwayat');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
