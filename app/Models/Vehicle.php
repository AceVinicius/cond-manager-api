<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'unit_id',
    ];

    /**
     * Get the unit that owns the vehicle.
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
