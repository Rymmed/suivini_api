<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            if ($user instanceof \App\Models\User) {
                // Hinting here for $user will be specific to the User object
                //return $user->createToken($request->device_name)->plainTextToken;
                $token = $user->createToken('MyApp')->accessToken;
                return response()->json(['token' => $token], 200);
            } else {
                // Handle Error. Not logged in or guard did not return a User object.
            }
        } else {
            // Authentication failed
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
