<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Filters\PostFilter;
use App\Http\Resources\Post\PostResource;

class IndexController extends Controller
{
    public function __invoke($request)
    {
        $data = $request->validated();
        
        $page = $data['page'] ?? 1;
        $per_page = $data['per_page'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->orderBy('id', 'desc')->paginate($per_page, ['*'], 'page', $page);

        return PostResource::collection($posts);
    }
}
