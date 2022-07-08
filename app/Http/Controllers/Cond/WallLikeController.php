<?php

namespace App\Http\Controllers\Cond;

use App\Http\Controllers\Controller;
use App\Models\Wall;
use App\Models\WallLike;
use Illuminate\Http\Request;

class WallLikeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Wall $wall)
    {
        $user = $request->user();
        $userLiked = $wall->likesFrom($user->id);

        if ($userLiked) {
            $userLiked->delete();
        } else {
            WallLike::create([
                'user_id' => $user->id,
                'wall_id' => $wall->id,
            ]);
        }

        $userNotLiked = $userLiked;

        $response = [
            'message' => '',
            'wall_likes_count' => $wall->wallLikes()->count(),
            'user_liked' => ( $userNotLiked ? false : true ),
        ];

        return response()->json($response, 200);
    }
}
