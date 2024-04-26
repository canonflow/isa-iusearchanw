<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'janji_temu_id',
        'grand_total'
    ];
    public function janji_temu(){
        return $this->belongsTo(JanjiTemu::class, 'janji_temu_id');
    }
    public function patient(){
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
