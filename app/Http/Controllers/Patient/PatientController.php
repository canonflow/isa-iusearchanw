<?php

namespace App\Http\Controllers\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\JanjiTemu;
use App\Models\Nota;
use Illuminate\Http\Request;
use function Spatie\LaravelPdf\Support\pdf;

class PatientController extends Controller
{
    public function index() {
        $janjiTemu = JanjiTemu::where('patient_id', Auth::user()->patient->id)->get();
        return view('patient.index', compact('janjiTemu'));
    }

    public function createJanjiTemu(Request $request){
        $request->validate([
            'tgl_temu' => ['required'],
            'keluhan' => ['required'],
        ]);

        JanjiTemu::create([
            'patient_id'=>Auth::user()->patient->id,
            'tgl_temu'=>$request->get('tgl_temu'),
            'keluhan'=>$request->get('keluhan'),
            'status'=>'Menunggu',
        ]);
        return back()->with('success', 'Berhasil tambahkan Janji Temu');
    }

    public function printRiwayat(JanjiTemu $janjiTemu) {
        if ($janjiTemu->service_id == null) abort(403);
        if ($janjiTemu->patient_id != Auth::user()->patient->id) abort(403);

        $name = "riwayat-pemeriksaan-" . $janjiTemu->patient->name ."-" . date('Y-m-d', strtotime(Carbon::now())) . ".pdf";
        return pdf()
            ->view('doctor.pdf.riwayat', compact('janjiTemu'))
            ->format("A4")
            ->name($name);
    }

    public function getRecipe(JanjiTemu $janjiTemu){
        $recipe = $janjiTemu->recipe()->get()[0];
        return view('patient.recipe', compact('recipe'));

    }
    public function getNota(Nota $nota){
        return view('patient.nota', compact('nota'));

    }


}
