<?php

namespace App\Http\Controllers;

use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return fractal()
                ->item($request->user())
                ->transformWith(new UserTransformer())
                ->toArray();
    }
}
