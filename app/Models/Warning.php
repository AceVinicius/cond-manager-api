<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    use HasFactory;

    /**
     * Get the unit that owns the warning.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
