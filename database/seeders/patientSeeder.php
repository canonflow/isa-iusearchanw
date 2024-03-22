<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Iluminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Iluminate\Support\Str;


class patientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $id = 2;
        $nama = "Anastasya Putri Mulyani";

        Patient::create([
            'user_id'=> $id,
            'name' => $nama,
        ]);

    }
}
