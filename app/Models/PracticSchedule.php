<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'tgl_praktek',
        'jam_mulai',
        'jam_selesai',
    ];
    
    // public function janjiTemu() : HasMany {
    //     return $this->hasMany(PracticScheduleHasDoctor::class, 'practic_schedules_id');
    // }
}
