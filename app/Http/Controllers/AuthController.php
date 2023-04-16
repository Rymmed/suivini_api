<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            /*$role = Role::where('name', 'user')->first();

            if ($role) {
                $user->assignRole($role);
            }*/

            DB::commit();

            return response()->json(['user' => $user], 201);
        } catch (\Exception $e) {
            DB::rollback();

            Log::error($e);

            return response()->json(['error' => 'Error creating user'], 500);
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            if ($user instanceof User) {
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
