<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaDisabledDay extends Model
{
    use HasFactory;

    /**
     * Get the area that owns the Area disabled day.
     */
    public function unit()
    {
        return $this->belongsTo(Area::class);
    }
}
