<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wall extends Model
{
    use HasFactory;

    /**
     * Get the wall likes for the wall.
     */
    public function wallLikes()
    {
        return $this->hasMany(wallLike::class);
    }
}
