<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWarningRequest;
use App\Http\Requests\UpdateWarningRequest;
use App\Models\Warning;

class WarningController extends Controller
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
     * @param  \App\Http\Requests\StoreWarningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWarningRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function show(Warning $warning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function edit(Warning $warning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWarningRequest  $request
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWarningRequest $request, Warning $warning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warning $warning)
    {
        //
    }
}
