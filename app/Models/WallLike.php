<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WallLike extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the wall like.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the wall that owns the wall like.
     */
    public function wall()
    {
        return $this->belongsTo(Wall::class);
    }
}
