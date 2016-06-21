<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterFormRequest;
use App\Models\User;
use App\Transformers\UserTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function signup(RegisterFormRequest $request)
    {
        $user = User::create(
            [
                'username' => $request->json('username'),
                'email' => $request->json('email'),
                'password' => bcrypt($request->json('password'))
            ]
        );

        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer())
            ->toArray();
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

        #return response()->json(compact('token'));
        return fractal()
            ->item($request->user())
            ->transformWith(new UserTransformer())
            ->addMeta([
                'token' => $token
            ])
            ->toArray();
    }

    public function user(Request $request)
    {

        return fractal()
            ->item($request->user())
            ->transformWith(new UserTransformer())
            ->toArray();    }
}
