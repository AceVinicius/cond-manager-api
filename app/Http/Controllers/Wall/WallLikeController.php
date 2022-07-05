<?php

namespace App\Http\Controllers\Wall;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWallLikeRequest;
use App\Http\Requests\UpdateWallLikeRequest;
use App\Models\WallLike;

class WallLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWallLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWallLikeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WallLike  $wallLike
     * @return \Illuminate\Http\Response
     */
    public function show(WallLike $wallLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WallLike  $wallLike
     * @return \Illuminate\Http\Response
     */
    public function edit(WallLike $wallLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWallLikeRequest  $request
     * @param  \App\Models\WallLike  $wallLike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWallLikeRequest $request, WallLike $wallLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WallLike  $wallLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(WallLike $wallLike)
    {
        //
    }
}
