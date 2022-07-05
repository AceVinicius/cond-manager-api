<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBilletsRequest;
use App\Http\Requests\UpdateBilletsRequest;
use App\Models\Billets;

class BilletsController extends Controller
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
     * @param  \App\Http\Requests\StoreBilletsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBilletsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Billets  $billets
     * @return \Illuminate\Http\Response
     */
    public function show(Billets $billets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Billets  $billets
     * @return \Illuminate\Http\Response
     */
    public function edit(Billets $billets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBilletsRequest  $request
     * @param  \App\Models\Billets  $billets
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBilletsRequest $request, Billets $billets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Billets  $billets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billets $billets)
    {
        //
    }
}
