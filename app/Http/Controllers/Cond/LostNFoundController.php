<?php

namespace App\Http\Controllers\Cond;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLostNFoundRequest;
use App\Http\Requests\UpdateLostNFoundRequest;
use App\Models\LostNFound;

class LostNFoundController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lost = LostNFound::where('status', 'LOST')
            ->orderBy('created_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->get();

        $found = LostNFound::where('status', 'FOUND')
            ->orderBy('created_at', 'DESC')
            ->orderBy('id', 'DESC')
            ->get();

        foreach ($lost as $key => $value) {
            $lost[$key]['created_at'] = date('D, d M Y', strtotime($value['created_at']));
            $lost[$key]['photo'] = asset('storage/'.$value['photo']);
        }

        foreach ($found as $key => $value) {
            $found[$key]['created_at'] = date('D, d M Y', strtotime($value['created_at']));
            $found[$key]['photo'] = asset('storage/'.$value['photo']);
        }

        $response = [
            'message' => '',
            'lost' => $lost,
            'found'=> $found,
        ];

        return response()->json($response, 200);
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
        $validated = $request->validated();

        $file = $validated()->file('photo')->store('public');
        $file = explode('public/', $file);
        $photo = $file[1];

        $lost = LostNFound::create([
            'status' => 'LOST',
            'photo' => $photo,
            'description' => $validated->input('description'),
            'where' => $validated->input('where'),
        ]);

        $response = [
            'message' => '',
            'lost' => $lost,
        ];

        return response()->json($response, 201);
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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLostNFoundRequest  $request
     * @param  \App\Models\LostNFound  $lostNFound
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLostNFoundRequest $request, LostNFound $lostNFound)
    {
        $validated = $request->validated();

        if (!$validated->input('status') || !in_array($validated->input('status'), ['LOST', 'FOUND'])) {
            $response = ['message' => 'Status não existe.'];
            return response()->json($response, 400);
        }

        $lostNFound['status'] = $validated->input('status');
        $lostNFound->save();

        $response = [
            'message' => '',
            'item' => $lostNFound,
        ];

        return response()->json($response, 200);
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
