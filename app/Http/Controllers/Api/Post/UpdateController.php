<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\Service;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

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
        return ($post instanceof Post) ? new PostResource($post) : $post;
    }
}
