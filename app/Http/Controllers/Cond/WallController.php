<?php

namespace App\Http\Controllers\Cond;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWallRequest;
use App\Http\Requests\UpdateWallRequest;
use App\Models\Wall;
use App\Models\WallLike;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WallController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Wall::class, 'wall');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walls = Wall::withCount('wallLikes')->get();

        foreach ($walls as $key => $value) {
            $userLiked = $value->wallLikes()->where('user_id', Auth::id())->first();

            if ($userLiked) {
                $walls[$key]->user_liked = true;
            } else {
                $walls[$key]->user_liked = false;
            }
        }

        $response = [
            'message' => '',
            'walls' => $walls,
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWallRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWallRequest $request)
    {
        $wall = Wall::create($request->validated());

        if (! $wall) {
            $response = ['message' => 'Wall could not be created.'];
            return response()->json($response, 500);
        }

        $response = [
            'message' => '',
            'wall' => $wall,
        ];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wall  $wall
     * @return \Illuminate\Http\Response
     */
    public function show(Wall $wall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWallRequest  $request
     * @param  \App\Models\Wall  $wall
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWallRequest $request, Wall $wall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wall  $wall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wall $wall)
    {
        //
    }
}
