<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWarningRequest;
use App\Http\Requests\UpdateWarningRequest;
use App\Models\Unit;
use App\Models\Warning;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class WarningController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        // $this->authorizeResource(Warning::class, 'unit,warning');
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

        $warnings = $unit->warnings()->orderBy('created_at', 'DESC')->get();

        foreach ($warnings as $key => $value) {
            $photos = explode(',', $value['photos']);
            $photoList = [];

            foreach($photos as $photo) {
                if (empty($photo)) {
                    continue;
                }

                $$photoList[] = asset('storage/'.$photo);
            }

            $warnings[$key]['photos'] = $photoList;
        }

        $response = [
            'message' => '',
            'warnings' => $warnings,
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWarningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Unit $unit, StoreWarningRequest $request)
    {
        if (Auth::id() !== $unit->user_id) {
            $response = [
                'message' => 'Unauthorized',
            ];

            return response()->json($response, 403);
        }

        $validated = $request->validated();

        $photos = [];

        foreach ($validated['photos'] as $photo) {
            $photos = end(explode('/', $photo));
        }

        $warning = Warning::create([
            'unit_id' => $unit->id,
            'status' => 'IN_REVIEW',
            'title' => $validated['title'],
            'description' => $validated['description'],
            'photos' => implode(',', $photos),
        ]);

        if (! $warning) {
            $response = ['message' => 'Warning could not be created.'];
            return response()->json($response, 500);
        }

        $response = [];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit, Warning $warning)
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
    public function update(UpdateWarningRequest $request, Unit $unit, Warning $warning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit, Warning $warning)
    {
        //
    }

    public function file(Request $request) {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            $response = [
                'message' => $validator->errors()->first(),
            ];

            return response()->json($response, 400);
        }

        $file = $request->file('photo')->store('public');

        $response = [
            'photo'=> asset(Storage::url($file)),
        ];


        return response()->json($response, 201);
    }
}
