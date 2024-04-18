<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class specialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $name = ["Dokter Umum", "Dokter Gigi", "Sp. THT", "Sp. Kulit"];
        for($i=0; $i<count($name); $i++){
            Service::create([
                'name' => $name[$i]
            ]);
        }
    }
}
