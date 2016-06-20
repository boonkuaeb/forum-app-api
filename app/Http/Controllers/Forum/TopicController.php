<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Section;
use App\Models\Topic;
use Illuminate\Http\Request;


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

    public function store(Request $request)
    {
        dd('store');
    }
}
