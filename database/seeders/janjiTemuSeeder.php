<?php

namespace Database\Seeders;

use App\Models\JanjiTemu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class janjiTemuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $idPatient = 1;
        $idDoctor = 1;
        $diagnosa = "GERD, Vertigo";
        $tgl = date("Y-m-d H:i:s", strtotime("+5 Days"));

        JanjiTemu::create([
            'patient_id' => $idPatient,
            'doctor_id' => $idDoctor,
            'riwayat_pemeriksaan' => $diagnosa,
            'tgl_temu' => $tgl
        ]);




    }
}
