<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Http\Resources\Post\PostResource;

class ShowController extends Controller
{
    public function __invoke($post)
    {
        return new PostResource($post);
    }
}
