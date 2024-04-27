<?php

namespace App\Http\Controllers\Patient;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\JanjiTemu;
use App\Models\Nota;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index() {   
        $janjiTemu = JanjiTemu::where('patient_id', Auth::user()->patient->id)->get();
        return view('patient.index', compact('janjiTemu'));
    }

    public function createJanjiTemu(Request $request){
        JanjiTemu::create([
            'patient_id'=>Auth::user()->patient->id,
            'tgl_temu'=>date("y-m-d", strtotime($request->get('tgl_temu'))),
            'keluhan'=>$request->get('keluhan'),
            'status'=>'Menunggu',
        ]);
        return back()->with('success', 'Berhasil tambahkan Janji Temu');
    }

    public function getRecipe(JanjiTemu $janjiTemu){
        $recipe = $janjiTemu->recipe()->get()[0];
        return view('patient.recipe', compact('recipe'));

    }
    public function getNota(Nota $nota){
        return view('patient.nota', compact('nota'));

    }


}
