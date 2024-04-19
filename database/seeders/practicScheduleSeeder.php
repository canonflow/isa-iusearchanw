<?php

namespace Database\Seeders;

use App\Models\PracticSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PracticScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tgl_praktek = date("Y-m-d H:i:s");
        $jam_mulai = date("H:i:s",time());
        $jam_selesai = date("H:i:s", strtotime("+1 Hour +30 minutes"));

        PracticSchedule::create([
            'tgl_praktek' => $tgl_praktek,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
        ]);
    }
}
