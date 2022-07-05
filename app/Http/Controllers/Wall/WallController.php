<?php

namespace App\Http\Controllers\Wall;

use App\Http\Requests\StoreWallRequest;
use App\Http\Requests\UpdateWallRequest;
use App\Models\Wall;

class WallController extends Controller
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
     * @param  \App\Http\Requests\StoreWallRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWallRequest $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wall  $wall
     * @return \Illuminate\Http\Response
     */
    public function edit(Wall $wall)
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
