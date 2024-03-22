<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user_id = [3,4];
        $name = ["Antonius Kustiono Putra", "Fanny Rorencia Ribowwo"];

        for ($i=0; $i < count($user_id) ; $i++) { 
            # code...
            Admin::create([
                'user_id' => $user_id[$i],
                'name' => $name[$i]
            ]);
        }

    }
}
