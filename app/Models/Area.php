<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    /**
     * Get the reservations for the area.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Get the area disabled days for the area.
     */
    public function residents()
    {
        return $this->hasMany(AreaDisabledDay::class);
    }
}
