<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details',
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken($request->email)->plainTextToken;
        $user->token = $token;

        return new UserResource($user);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'name' => 'required|max:24',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $token = $user->createToken($request->email)->plainTextToken;
        $user->token = $token;

        return new UserResource($user);
    }
}
