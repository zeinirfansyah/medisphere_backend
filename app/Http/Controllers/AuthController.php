<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if (auth('sanctum')->check()) {
            return response(['message' => 'Already authenticated, please logout first.'], 403);
        }

        $defaultRole = Role::where('role_name', 'customer')->firstorFail();

        $fields = $request->validate([
            'fullname' => 'required|string',
            'username' => 'required|string|unique:users,username|max:24|min:3|regex:/^[a-z0-9_]+$/|',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'fullname' => $fields['fullname'],
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'role_id' => $defaultRole->id
        ]);


        $token = $user->createToken($request->username)->plainTextToken;

        $response = [
            'user' => "$user->username registered successfully",
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        if (auth('sanctum')->check()) {
            return response(['message' => 'Already authenticated, please logout first.'], 403);
        }

        $fields = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('username', $fields['username'])->first();

        if (!$user) {
            return response([
                'message' => 'Username is incorrect.'
            ], 401);
        }

        if (!Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Password is incorrect.'
            ], 401);
        }


        $token = $user->createToken($request->username)->plainTextToken;

        $response = [
            'user' => "$user->username already logged in",
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response([
            'message' => 'Logged out successfully'
        ], 200);
    }
}
