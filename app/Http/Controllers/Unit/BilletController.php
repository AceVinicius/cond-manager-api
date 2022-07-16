<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBilletRequest;
use App\Http\Requests\UpdateBilletRequest;
use App\Models\Billet;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class BilletController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        // $this->authorizeResource(Billet::class, 'unit,billet');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Unit $unit)
    {
        if (Auth::id() !== $unit->user_id) {
            $response = [
                'message' => 'Unauthorized',
            ];

            return response()->json($response, 403);
        }

        $billets = $unit->billets()->get();

        foreach ($billets as $key => $value) {
            $billets[$key]['file_url'] = asset('files/'. $value['file_url']);
        }

        $response = [
            'message' => '',
            'billets' => $billets,
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBilletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBilletRequest $request, Unit $unit)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Billet  $billet
     * @return \Illuminate\Http\Response
     */
    public function show(Billet $billet, Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBilletRequest  $request
     * @param  \App\Models\Billet  $billet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBilletRequest $request, Unit $unit, Billet $billet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Billet  $billet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit, Billet $billet)
    {
        //
    }
}
