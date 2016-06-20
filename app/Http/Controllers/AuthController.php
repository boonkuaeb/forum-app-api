<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterFormRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function signup(RegisterFormRequest $request)
    {
        User::create(
            [
                'username' => $request->json('username'),
                'email' => $request->json('email'),
                'password' => bcrypt($request->json('password'))
            ]
        );
    }

    public function signin(Request $request)
    {
        try {
            $token = JWTAuth::attempt($request->only('email', 'password'),
                [
                    'exp' => Carbon::now()->addWeek()->timestamp
                ]);

        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Could not authenticate.'
            ], 500);
        }
        if (!$token) {
            return response()->json([
                'error' => 'Could not authenticate.'
            ], 401);
        }

        return response()->json(compact('token'));
    }

    public function user(Request $request)
    {
        return $request->user();
    }
}
