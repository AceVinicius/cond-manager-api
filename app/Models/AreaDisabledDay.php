<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaDisabledDay extends Model
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
     * Get the area that owns the Area disabled day.
     */
    public function unit()
    {
        return $this->belongsTo(Area::class);
    }
}
