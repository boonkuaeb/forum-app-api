<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Section;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\Forum\CreateTopicFormRequest;


class TopicController extends Controller
{
    public function index(Request $request, Section $section)
    {
        dd('index');
    }

    public function show(Topic $topic)
    {
        dd('show');
    }

    public function store(CreateTopicFormRequest $request)
    {
        $request->user()->topics()->create([
            'title'=>$request->json('title'),
            'section_id'=>$request->json('section_id'),
            'slug' => str_slug($request->json('title')),
            'body'=>$request->json('body'),
        ]);
    }
}