<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $i = 0;
        $username = ["Nathan", "Putri", "Anton", "Fanny", "Amelia", "Deby"];
        $role = ["dokter", "pasien", "admin", "admin", "dokter", "pasien"];
        

        foreach ($username as $user) {
            # code...
            User::create([
                'username' => $user, 
                'role'=> $role[$i], 
                'password' => Hash::make("123456789")]);
            $i++;
        }

        

    }
}
