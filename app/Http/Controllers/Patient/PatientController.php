<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\JanjiTemu;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index() {
        return view('admin.layouts.index');
    }

    public function createJanjiTemu(Request $request){
        JanjiTemu::created([
            'patient_id'=>Auth::user()->patient->id,
            'tgl_temu'=>$request->get('tgl_temu'),
            'keluhan'=>$request->get('keluhan'),
            'status'=>'Menunggu',
        ]);
    }

    public function getRecipe(JanjiTemu $janjiTemu){
        $recipe = $janjiTemu->recipe()->get()[0];
        return view('patient.recipe', compact('recipe'));

    }
    public function getNota(Nota $nota){
        return view('patient.nota', compact('nota'));

    }


}
