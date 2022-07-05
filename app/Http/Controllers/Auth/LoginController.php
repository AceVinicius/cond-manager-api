<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $credentials = [
            'cpf' => $request['cpf'],
            'password' => $request['password'],
        ];

        if (! Auth::attempt($credentials)) {
            $response = ['message' => 'Invalid credentials.'];
            return response()->json($response, 401);
        }

        $user = User::where('cpf', $request['cpf'])->first();

        if (! $user) {
            $response = ['message' => 'Error finding user.'];
            return response()->json($response, 500);
        }

        $response = [
            'message' => 'User logged in successfully.',
            'token' => $user->createToken(time().rand(0,9999))->plainTextToken,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'cpf' => $user->cpf,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
                'properties' => $user->units(),
            ],
        ];

        return response()->json($response, 200);
    }
}
