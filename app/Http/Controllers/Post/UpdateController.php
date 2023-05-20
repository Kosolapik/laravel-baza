<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\Service;

class UpdateController extends Controller
{
    use Service;
    
    public function __invoke($request, $post)
    {
        $data = $request->validated();
        $data['category'] = [
            'id' => $data['category']
        ];
        $post = $this->update($post, $data);
        return redirect()->route('posts.show', $post->id);
    }
}
