<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Forum\CreateTopicFormRequest;
use App\Models\Section;
use App\Models\Topic;
use App\Transformers\TopicTransformer;
use Illuminate\Http\Request;


class TopicController extends Controller
{
    public function index(Request $request, Section $section)
    {
        dd('index');
    }

    public function show(Topic $topic)
    {
        return fractal()
            ->item($topic)
            ->includeUser()
            #    ->includeSection()
            ->transformWith(new TopicTransformer())
            ->toArray();
    }

    public function store(CreateTopicFormRequest $request)
    {
        $topic = $request->user()->topics()->create([
            'title' => $request->json('title'),
            'section_id' => $request->json('section_id'),
            'slug' => str_slug($request->json('title')),
            'body' => $request->json('body'),
        ]);

        return fractal()
            ->item($topic)
            ->includeUser()
        #    ->includeSection()
            ->transformWith(new TopicTransformer())
            ->toArray();
    }
}
