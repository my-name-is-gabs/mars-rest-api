<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(StoreUserRequest $request)
    {

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'fullname' => $request->fullname,
            'dob' => $request->dob,
            'password' => Hash::make($request->password, ['rounds' => 12])
        ]);

        
        $token = $user->createToken($user->username . "_access_token")->plainTextToken;
        
        return response()->json([
            "data" => [
                'username' => $user->username,
                'token' => $token
            ],
            "message" => "Account created successfully"
        ], 201);
    }

    public function login(LoginUserRequest $request) 
    {
        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response([
            "data" => [
                "user" => $user,
                "access_token" => $user->createToken($user->username.' token')->plainTextToken
            ],
            "message" => "Log in success"
        ], 200);
    }
}