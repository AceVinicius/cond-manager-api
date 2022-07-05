<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    /**
     * Get the billets for the unit.
     */
    public function billets()
    {
        return $this->hasMany(Billet::class);
    }
    
    /**
     * Get the pets for the unit.
     */
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    /**
     * Get the reservations for the unit.
     */
    public function reservations()
    {
        return $this->hasMany(RReservation::class);
    }
    
    /**
     * Get the residents for the unit.
     */
    public function residents()
    {
        return $this->hasMany(Resident::class);
    }

    /**
     * Get the user that owns the unit.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the vehicles for the unit.
     */
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    /**
     * Get the warnings for the unit.
     */
    public function warnings()
    {
        return $this->hasMany(Warning::class);
    }
}
