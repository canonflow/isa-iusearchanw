<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\JanjiTemu;
use App\Models\Nota;
use App\Models\Patient;
use App\Models\User;
// use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function index() {
        return view('admin.layouts.index');
    }

    public function createDoctor(Request $request){
        $request->validate([
            'username' => ['required', 'unique:users,username'],
            'name' => ['required'],
            'password' => ['required']
        ]);

        $user = User::create([
            'username'=>$request->get('username'),
            'password'=> Crypt::encryptString($request->get('password')),
            'role' => 'dokter'
        ]);

        $doctor = Doctor::query()->create([
            'name' => $request->get('name'),
            'user_id' => $user->id
        ]);

        return redirect()->back()->with('success', "Berhasil membuat user " . $doctor->name);
    }

    public function makeStegano(Doctor $doctor) {

        $path = "";
        // return response()->download();
    }

    public function createNota(Request $request, JanjiTemu $janjiTemu){
        Nota::query()->create([
            'patient_id'=>$janjiTemu->patient_id,
            'janji_temu_id'=>$janjiTemu->id,
            'grand_total'=>$request->get('total')
        ]);
    }

    public function displayDoctor(){
        $doctors = Doctor::all();
        return view('admin.dashboard.listdoctor', compact('doctors'));
    }

    public function displayPatient(){
        $patients = Patient::all();
        return view('admin.dashboard.listpatient', compact('patients'));
    }


}
