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
use MaikSchneider\Steganography\Processor;
use Spatie\LaravelPdf\Facades\Pdf;
use function Spatie\LaravelPdf\Support\pdf;

class AdminController extends Controller
{
    public function index() {
        $janjiTemu = JanjiTemu::whereNotNull('doctor_id')->whereNotNull('service_id')->get();
        return view('admin.dashboard.index',compact('janjiTemu'));
    }

    public function addUser(Request $request){
        $request->validate([
            'username' => ['required', 'unique:users,username'],
            'name' => ['required'],
            'password' => ['required', 'min:8', 'max:20'],
            'role' => ['required']
        ]);

        $roles = ['admin', 'dokter'];
        if (!in_array($request->get('role'), $roles)) {
            return back()->with('failed', 'Role yang dimasukkan tidak valid!');
        }
//
        $user = User::create([
            'username'=>$request->get('username'),
            'password'=> Crypt::encryptString($request->get('password')),
            'role' => $request->get('role'),
        ]);

        if ($request->get('role') == 'dokter') {
            $doctor = Doctor::create([
                'name' => $request->get('name'),
                'user_id' => $user->id
            ]);
        } else {
            $admin = Admin::create([
                'name' => $request->get('name'),
                'user_id' => $user->id
            ]);
        }

        return redirect()->back()->with('success', "Berhasil Menambahkan User baru dengan username " . $user->username);
    }

    public function idcardIndex() {
        $users = User::all();
        return view('admin.dashboard.Add.idcard', compact('users'));
    }
    public function createIdCard(Request $request) {
        $request->validate([
            'username' => ['required']
        ]);

        try {
            $user = User::where('username', $request->get('username'))->first();
            // Make Stegano
            $processor = new Processor();
            $img = $processor->encode(public_path("images/card/" . $user->role .".png"), $user->username . "~" . Crypt::decryptString($user->password));
            if (!is_dir(storage_path("app/public/encode"))) {
                mkdir(storage_path("app/public/encode"), 0777, true);
            }

            $img->write(storage_path("app/public/encode/" . $user->username . ".png"));

            return response()->download(storage_path("app/public/encode/" . $user->username . ".png"))->deleteFileAfterSend(true);
        } catch (\Exception $exception) {
            return redirect()->back()->with('failed', "Gagal Membuat ID Card");
        }


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

    public function listDoctorHome(){
        $doctors = Doctor::all();
        return view('home', compact('doctors'));
    }

    public function displayPatient(){
        $patients = Patient::all();
        return view('admin.dashboard.listpatient', compact('patients'));
    }

    public function destroyDoctor(Doctor $doctor) {
        $name = $doctor->name;
        $doctor->delete();

        return back()->with('success', "Berhasil menghapus Dr. " . $name);
    }

    public function destroyPatient(Patient $patient) {
        $name = $patient->name;
        $patient->delete();

        return back()->with('success', "Berhasil menghapus Pasien " . $name);
    }
}
