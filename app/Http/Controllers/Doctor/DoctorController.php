<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\JanjiTemu;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Spatie\LaravelPdf\Support\pdf;

class DoctorController extends Controller
{
    public function index() {
        $janjiTemu = JanjiTemu::where('doctor_id', Auth::user()->doctor->id)->get();
        return view('doctor.dashboard.index', compact('janjiTemu'));
    }

    public function janjiTemu(){
        $janjitemu = JanjiTemu::where('status','Menunggu')->get();
        return view('doctor.dashboard.janjitemu',compact('janjitemu'));
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

    public function recipe(JanjiTemu $janjiTemu) {
        if ($janjiTemu->recipe_id != null) abort(403);
        return view('doctor.dashboard.recipe', compact('janjiTemu'));
    }

    public function createRecipe(JanjiTemu $janjiTemu, Request $request){
        if ($janjiTemu->recipe_id != null) abort(403);
        $request->validate([
            'name' => ['required'],
            'note' => ['required']
        ]);

        $recipe = Recipe::create([
            'doctor_id' => Auth::user()->doctor->id,
            'patient_id'=> $janjiTemu->patient_id,
            'name'=>$request->get('name'),
            'dose'=> 1,
            'note'=>$request->get('note'),
            'unit'=> 'tablet'
        ]);

        $janjiTemu->update([
            'recipe_id' => $recipe->id
        ]);

        return redirect()->back()->with('success', "Berhasil membuat resep untuk " . $janjiTemu->patient->name);
    }

    public function printRecipe(JanjiTemu $janjiTemu) {
        if ($janjiTemu->recipe_id == null) abort(403);

        $name = "resep-obat-" . $janjiTemu->patient->name ."-" . date('Y-m-d', strtotime(Carbon::now())) . ".pdf";
        return pdf()
            ->view('doctor.pdf.resep', compact('janjiTemu'))
            ->format("A4")
            ->name($name);
//        return view('doctor.pdf.resep', compact('janjiTemu'));
    }

    public function acceptJanjiTemu(JanjiTemu $janjiTemu){
        $janjiTemu->update([
            'doctor_id' => Auth::user()->doctor->id,
            'status'=>'Diterima'
        ]);
        return back()->with('success', 'Menerima Janji Temu');
    }

    public function riwayat(JanjiTemu $janjiTemu){
        $services = Service::all();
        return view('doctor.dashboard.riwayat', compact('janjiTemu', 'services'));
    }

    public function storeRiwayat(JanjiTemu $janjiTemu, Request $request){
        $request->validate([
            'riwayat' => ['required'],
            'service' => ['required'],
        ]);

        $janjiTemu->update([
            'riwayat_pemeriksaan'=>$request->get('riwayat'),
            'service_id'=>$request->get('service')
        ]);
        session()->flash('listRiwayat', 'Berhasil menyimpan riwayat');
        return redirect()->to(route('doctor.index'));
    }

    public function printRiwayat(JanjiTemu $janjiTemu) {
        if ($janjiTemu->service_id == null) abort(403);

        $name = "riwayat-pemeriksaan-" . $janjiTemu->patient->name ."-" . date('Y-m-d', strtotime(Carbon::now())) . ".pdf";
        return pdf()
            ->view('doctor.pdf.riwayat', compact('janjiTemu'))
            ->format("A4")
            ->name($name);
//        return view('doctor.pdf.riwayat', compact('janjiTemu'));
    }
}
