<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class ValidateController extends Controller
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
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $response = AuthService::authenticatedUser();

        if ($response['message']) {
            return response()->json($response, 500);
        }

        return response()->json($response, 200);
    }
}
