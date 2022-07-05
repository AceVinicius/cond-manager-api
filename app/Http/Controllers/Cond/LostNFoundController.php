<?php

namespace App\Http\Controllers\Cond;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLostNFoundRequest;
use App\Http\Requests\UpdateLostNFoundRequest;
use App\Models\LostNFound;

class LostNFoundController extends Controller
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
     * @param  \App\Http\Requests\StoreLostNFoundRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLostNFoundRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LostNFound  $lostNFound
     * @return \Illuminate\Http\Response
     */
    public function show(LostNFound $lostNFound)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LostNFound  $lostNFound
     * @return \Illuminate\Http\Response
     */
    public function edit(LostNFound $lostNFound)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLostNFoundRequest  $request
     * @param  \App\Models\LostNFound  $lostNFound
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLostNFoundRequest $request, LostNFound $lostNFound)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LostNFound  $lostNFound
     * @return \Illuminate\Http\Response
     */
    public function destroy(LostNFound $lostNFound)
    {
        //
    }
}
