<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Post\Service;
use App\Http\Resources\Post\PostResource;

class StoreController extends Controller
{
    use Service;

    public function __invoke($request)
    {
        $data = $request->validated();
        $data['category'] = [
            'id' => $data['category']
        ];
        $post = $this->store($data);
        return ($post instanceof Post) ? new PostResource($post) : $post;
    }
}
