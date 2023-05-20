<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Post\Service;

class StoreController extends Controller
{
    use Service;

    public function __invoke($request)
    {
        $data = $request->validated();
        $data['category'] = [
            'id' => $data['category']
        ];
        $this->store($data);
        return redirect()->route('posts.index');
    }
}
