<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\JanjiTemu;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index() {
        return view('doctor.patient.index');
    }

    public function store(Request $request) {
        $tglTemu = $request->get('tgl_temu');
        $timeTemu = strtotime($tglTemu);
        $dateTemu = date("Y-m-d H:i:s", $timeTemu);

        $patient = Patient::find($request->get('patient_id'));

        JanjiTemu::create([
            'patient_id' => $patient->id,
            'doctor_id' => Auth::user()->doctor->id,
            'tgl_temu' => $dateTemu
        ]);

        return back()->with('success', 'Berhasil menambahkan Janji Temu dengan ' . $patient->name);
    }

    public function destroy(JanjiTemu $janjiTemu) {
        // Authorization
        if ($janjiTemu->doctor_id != Auth::user()->doctor->id) {
            return redirect()->back()->with('unauthorized', 'Anda tidak dapat menghapus Janji Temu milik dokter lain');
        }

        $patient = $janjiTemu->patient->name;
        $janjiTemu->delete();

        return redirect()->back()->with('succecss', 'Berhasil menghapus Janji Temu dengan ' . $patient);
    }
}
