<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $array = ['error' => ''];

        $request->validate($this->validationRules());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'password' => bcrypt($request->password),
        ]);

        return $array;
    }

    /**
     * Get the validation rules for user.
     *
     * @return array
     */
    private function validationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'cpf' => 'required|numeric|exact:11|unique:users,cpf',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
}
