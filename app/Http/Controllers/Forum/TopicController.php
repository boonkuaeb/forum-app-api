<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Forum\CreateTopicFormRequest;
use App\Models\Section;
use App\Models\Topic;
use App\Transformers\TopicTransformer;


class TopicController extends Controller
{
    public function index(Requests\Forum\GetTopicsFormRequest $request, Section $section)
    {
        $topics = $section->find($request->get('section_id'))->topics()->latestFirst()->get();

        return fractal()
            ->collection($topics)
            ->includeUser()
            ->transformWith(new TopicTransformer())
            ->toArray();
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

       // for ($i = 0; $i <= 50; $i++) {
            $topic = $request->user()->topics()->create([
                'title' => $request->json('title'),
                'section_id' => $request->json('section_id'),
                'slug' => str_slug($request->json('title')),
                'body' => $request->json('body'),
            ]);
        //};

        return fractal()
            ->item($topic)
            ->includeUser()
            #    ->includeSection()
            ->transformWith(new TopicTransformer())
            ->toArray();
    }
}
