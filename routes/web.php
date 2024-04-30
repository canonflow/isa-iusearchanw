<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Doctor;
use App\Http\Controllers\Patient;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

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


Route::group(
    ['middleware' => 'guest'],
    function () {
        Route::view('/login/id-card', 'auth.login-id')->name('login.id');
        Route::post('/login/id-card', [LoginController::class, 'login_id_card'])->name('login.id-post');

    }
);


// ===== Admin =====
Route::group(
    ['middleware' => 'admin','prefix' => 'admin', 'as' => 'admin.'],
    function () {
        // ===== Index =====
        Route::get('/', [Admin\AdminController::class, 'index'])->name('index');

        // ===== Nota =====
        Route::post('/{janjiTemu}/nota', [Admin\AdminController::class, 'createNota']);
        Route::get('/{janjiTemu}/nota/print', [Admin\AdminController::class, 'printNota'])->name('nota.print');

        // ===== Add =====
        Route::view('/add/user','admin.dashboard.add.user')->name('add.user.index');
        Route::post('/add/user', [Admin\AdminController::class, 'addUser'])->name("add.user.store");
        Route::get('/add/idcard', [Admin\AdminController::class, 'idcardIndex'])->name('add.idcard.index');
        Route::post('/add/idcard', [Admin\AdminController::class, 'createIdCard'])->name('add.idcard.store');


//        Route::post('/input/nota', [Admin\AdminController::class, 'createNota'])->name('create-nota');
//        Route::view("/input/nota", "admin.dashboard.insertNota")->name("insertNota");
        Route::view('/display/janjiTemu', 'admin.dashboard.janjitemu')->name('admin.janjiTemu');
        Route::view('/display/service', 'admin.dashboard.service')->name('admin.service');
        Route::view('/display/recipe', 'admin.dashboard.listrecipe')->name('admin.listrecipe.blade.php');
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
        Route::get('/', [Doctor\DoctorController::class, 'index'])->name('index');
//        Route::view("/recipe", "doctor.dashboard.recipe.blade.php")->name("recipe");
//        Route::post('/{idrecipe}/recipe', [Doctor\DoctorController::class, 'createRecipe']);
//        Route::get('/{idrecipe}/recipe/print', [Doctor\DoctorController::class, 'printRecipe'])->name('recipe.print');

//        Route::view("/praktik", "doctor.dashboard.practicSchedule")->name("praktik");
        // ===== Janji Temu =====
        Route::get('/janjiTemu', [Doctor\DoctorController::class, 'janjiTemu'])->name('janjiTemu');
        Route::post("/janjiTemu/{janjiTemu}",[Doctor\DoctorController::class, 'acceptJanjiTemu'])->name('terima-janjiTemu');

        // ===== Riwayat =====
        Route::get('/janjiTemu/{janjiTemu}/riwayat', [Doctor\DoctorController::class, 'riwayat'])->name('riwayat');
        Route::post('/janjiTemu/{janjiTemu}/riwayat', [Doctor\DoctorController::class, 'storeRiwayat'])->name('riwayat');
        Route::get('/janjiTemu/{janjiTemu}/riwayat/print', [Doctor\DoctorController::class, 'printRiwayat'])->name('riwayat.print');

        // ===== Recipe =====
        Route::get('/janjiTemu/{janjiTemu}/recipe', [Doctor\DoctorController::class, 'recipe'])->name('recipe.index');
        Route::post('/janjiTemu/{janjiTemu}/recipe', [Doctor\DoctorController::class, 'createRecipe'])->name('recipe.store');
        Route::get('/janjiTemu/{janjiTemu}/recipe/print', [Doctor\DoctorController::class, 'printRecipe'])->name('recipe.print');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
