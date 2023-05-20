<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Filters\PostFilter;

class IndexController extends Controller
{
    public function __invoke($request)
    {
        $data = $request->validated();

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->orderBy('id', 'desc')->paginate(10);

        $tags = Tag::all();

        return view('admin.post.index', compact('posts', 'tags'));
    }
}
