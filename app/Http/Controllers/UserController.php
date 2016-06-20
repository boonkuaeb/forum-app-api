<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Transformers\SectionTransformer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return fractal()
            ->item($request->user())
            ->transformWith(new SectionTransformer())
            ->toArray();
    }
}
