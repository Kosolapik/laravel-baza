<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\Service;

class UpdateController extends Controller
{
    use Service;
    
    public function __invoke($request, $post)
    {
        $data = $request->validated();
        $this->update($post, $data);
        return redirect()->route('admin.posts.show', $post->id);
    }
}
