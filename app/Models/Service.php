<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function notas() : BelongsToMany {
        return $this->belongsToMany(
            Nota::class,  // Many to Many mbek apa
            'detail_notas',  // Pivot table
            'service_id',  // Foreign Key Model saat ini di pivot table
            'nota_id',  // Foreign Key Model yg berelasi mnm di pivot table
        )
            ->withPivot(['price'])
            ->withTimestamps();
    }
}
