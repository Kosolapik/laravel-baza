<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Filters\PostFilter;

class IndexController extends Controller
{
    public function __invoke($request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->orderBy('id', 'desc')->paginate(10);
        return view('post.index', compact('posts'));
    }
}
