<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\Auth\RegisterFormRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function signUp(RegisterFormRequest $request)
    {
        User::create(
            [
                'username' => $request->json('username'),
                'email' => $request->json('email'),
                'password' => bcrypt( $request->json('password'))
            ]
        );
    }
}
