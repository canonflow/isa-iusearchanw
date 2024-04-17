<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dose',
        'note',
        'doctor_id',
        'patient_id',
    ];

    public function doctor() : BelongsTo{
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function patient() : BelongsTo {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function janjiTemu() : HasOne {
        return $this->hasOne(JanjiTemu::class, 'recipe_id');
    }
}
