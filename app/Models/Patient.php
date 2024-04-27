<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'birth_date',
        'address'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function janjiTemu() : HasMany {
        return $this->hasMany(JanjiTemu::class, 'patient_id');
    }

    public function recipe() : HasMany {
        return $this->hasMany(Recipe::class, 'patient_id');
    }
    public function notas(): HasMany{
        return $this->hasMany(Nota::class, 'patient_id');
    }
}
