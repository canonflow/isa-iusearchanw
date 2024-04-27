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
        $id = [2,6];
        $nama = ["Anastasya Putri Mulyani", "Janet Deby Marlien Manoach"];
        $date = [date("y-m-d", strtotime("24 September 2004")), date("y-m-d", strtotime("20 March 2004"))];
        $address = ['Waru, Sidoarjo', 'Gubeng, Kertajaya'];


        for ($i=0; $i < count($id) ; $i++) { 
            # code...
            Patient::create([
                'user_id'=> $id[$i],
                'name' => $nama[$i],
                'birth_date'=> $date[$i],
                'address'=>$address[$i]
            ]);
        }
        

    }
}
