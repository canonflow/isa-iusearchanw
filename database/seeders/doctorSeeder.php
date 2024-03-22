<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class doctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = [1,5];
        $nama = ["Nathan Garzya Santoso", "Amelia Griselda"];
        //
        for ($i=0 ; $i < count($id) ; $i++ ) { 
            # code...
            Doctor::create([
                'user_id' => $id[$i],
                'name' => $nama[$i]
            ]);
        }
    }
}
