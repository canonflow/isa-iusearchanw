<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $name = ["Konsultasi Medis", "Pemeriksaan Laboratorium"];

        for ($i=0; $i < count($name) ; $i++) { 
            # code...
            Service::create([
                'name' => $name[$i]
            ]);
        }

    }
}

?>