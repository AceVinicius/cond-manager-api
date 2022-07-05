<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    /**
     * Get the unit that owns the pet.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
