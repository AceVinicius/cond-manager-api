<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billets extends Model
{
    use HasFactory;

    /**
     * Get the unit that owns the billet.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
