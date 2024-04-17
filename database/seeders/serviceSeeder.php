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
        $id = [1,2];
        $name = ["Konsultasi Medis", "Pemeriksaan Laboratorium"];

        for ($i=0; $i < count($id) ; $i++) { 
            # code...
            Service::create([
                'id' => $id[$i],
                'name' => $name[$i]
            ]);
        }

    }
}

?>