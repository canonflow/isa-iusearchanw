<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialist extends Model
{
    use HasFactory;

    protected $fillable = [
      'name'
    ];

    public function doctors() : HasMany {
        return $this->hasMany(Doctor::class, 'specialist_id');
    }
}
