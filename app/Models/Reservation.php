<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'area_id',
        'unit_id',
    ];

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
