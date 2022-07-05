<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * Get the area that owns the reservation.
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Get the unit that owns the reservation.
     */
    public function user()
    {
        return $this->belongsTo(Unit::class);
    }
}
