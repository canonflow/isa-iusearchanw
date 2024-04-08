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

    public function services() : BelongsToMany {
        return $this->belongsToMany(
            Service::class,  // Many to Many mbek apa
            'detail_notas',  // Pivot table
            'nota_id',  // Foreign Key Model yg berelasi mnm di pivot table
            'service_id',  // Foreign Key Model saat ini di pivot table
        )
            ->withPivot(['price'])
            ->withTimestamps();
    }
}
