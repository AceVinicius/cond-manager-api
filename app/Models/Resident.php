<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    /**
     * Get the unit that owns the resident.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
