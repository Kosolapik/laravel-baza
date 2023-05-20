<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $category = Category::where('id', '=', $post->category_id)->first();
        $tags = $post->tags;
        return view('admin.post.show', compact('post', 'category', 'tags'));
    }
}
