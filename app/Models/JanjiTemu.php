<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JanjiTemu extends Model
{
    use HasFactory;

    protected $table = 'janji_temu';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'tgl_temu',
        'riwayat_pemeriksaan',
        'status'
    ];

    public function patient() : BelongsTo {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor() : BelongsTo {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function recipe() : BelongsTo{
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
