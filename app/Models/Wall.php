<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wall extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
    ];

    /**
     * Get the wall likes for the wall.
     */
    public function wallLikes()
    {
        return $this->hasMany(wallLike::class);
    }

    /**
     * Get the wall likes for the user.
     */
    public function likesFrom($user_id)
    {
        return $this->wallLikes()->where('user_id', $user_id)->first();
    }
}
