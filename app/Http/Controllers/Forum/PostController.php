<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Http\Requests\Forum\CreatePostFormRequest;


class PostController extends Controller
{
    public function store(CreatePostFormRequest $request, Topic $topic)
    {
        $post = $topic->posts()->create([
            'body' => $request->json('body'),
            'user_id' => $request->user()->id
        ]);
    }
}
