<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'credential' => ['required', 'max:200'],
            'password' => 'required'
        ]);

        try {
            $fieldType = filter_var($request->input('credential'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            $user = User::with('profile')->where($fieldType, $request->input('credential'))->first();

            if (!$user || !\Illuminate\Support\Facades\Hash::check($request->input('password'), $user->password)) {
                return response()->json([
                    'errors' => [
                        'massage' => "password dan $fieldType yang dimasukan salah"
                    ]
                ], 400);
            }

            $user->token = $user->createToken('basic-token')->plainTextToken;

            Log::info('login success', [
                'user' => $user
            ]);

            return response()->json([
                'data' => new LoginResource($user)
            ]);
        } catch (\Throwable $th) {
            Log::error('login failed', [
                'class' => get_class(),
                'function' => __FUNCTION__,
                'message' => $th->getMessage()
            ]);

            return response()->json([
                'errors' => [
                    'message' => 'Server Error. Try again'
                ]
            ], 500);
        }
    }
}
