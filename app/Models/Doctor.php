<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function janjiTemu() : HasMany {
        return $this->hasMany(JanjiTemu::class, 'doctor_id');
    }
    public function recipe() : HasMany{
        return $this->hasMany(Recipe::class, 'doctor_id');
    }

    public function specialist() : BelongsTo {
        return $this->belongsTo(Specialist::class, 'specialist_id');
    }
}
