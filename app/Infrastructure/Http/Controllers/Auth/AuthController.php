<?php

namespace App\Http\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function createToken(Request $request)
    {
        $token = $request->user()->createToken($request->token_name);

        return ['token' => $token->plainTextToken];
    }

    public function revokeToken(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Token revoked']);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token',)->plainTextToken;

        return response()->json(['message' => 'User registered successfully', 'access_token' => $token, 'token_type' => 'Bearer']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {

            $token = auth()->user()->createToken('auth_token')->plainTextToken;

            return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }

}
