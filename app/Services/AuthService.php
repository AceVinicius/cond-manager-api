<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Login current user.
     *
     * @param  string  $cpf
     * @param  string  $password
     * @return array
     */
    public static function login($cpf, $password)
    {
        $credentials = [
            'cpf' => $cpf,
            'password' => $password,
        ];

        if (! Auth::attempt($credentials)) {
            return ['message' => 'Invalid credentials.'];
        }

        return AuthService::authenticatedUser();
    }

    /**
     * Logout current user.
     *
     * @param  App\Models\User  $user
     * @return array
     */
    public static function logout($user)
    {
        $user->tokens()->delete();

        return ['message' => ''];
    }

    /**
     * Get authenticated user.
     *
     * @return array
     */
    public static function authenticatedUser()
    {
        $user = Auth::user();

        if (! $user) {
            return ['message' => 'User not found.'];
        }

        return [
            'message' => '',
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
    }
}
