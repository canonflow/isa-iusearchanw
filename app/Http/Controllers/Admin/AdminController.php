<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\JanjiTemu;
use App\Models\Nota;
use App\Models\Patient;
use App\Models\User;
// use http\Client\Curl\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Spatie\LaravelPdf\Facades\Pdf;
use function Spatie\LaravelPdf\Support\pdf;

class AdminController extends Controller
{
    public function index() {
        $janjiTemu = JanjiTemu::whereNotNull('doctor_id')->whereNotNull('service_id')->get();
        return view('admin.dashboard.index',compact('janjiTemu'));
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

    public function createNota(JanjiTemu $janjiTemu, Request $request) {
        $request->validate([
            'grand_total' => ['required'],
        ]);

        if (count($janjiTemu->nota()->get()) != 0) return redirect()->back()->with('failed', "Nota sudah pernah dibuat");

        $nota = Nota::query()->create([
            'patient_id'=>$janjiTemu->patient_id,
            'janji_temu_id'=>$janjiTemu->id,
            'grand_total'=>$request->get('grand_total')
        ]);

        return redirect()->back()->with('success', "Berhasil membuat nota");
    }

    public function printNota(JanjiTemu $janjiTemu) {
        $name = "nota-" . date('Y-m-d', strtotime(Carbon::now())) . ".pdf";
        return pdf()
            ->view('admin.pdf.nota', compact('janjiTemu'))
            ->format("A4")
            ->name($name);
//        return view('admin.pdf.nota', compact('janjiTemu'));
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
