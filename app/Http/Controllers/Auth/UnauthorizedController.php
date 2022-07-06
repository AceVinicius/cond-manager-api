<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class UnauthorizedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $response = [
            'message' => 'Unauthorized.',
        ];

        return response()->json($response, 401);
    }
}
