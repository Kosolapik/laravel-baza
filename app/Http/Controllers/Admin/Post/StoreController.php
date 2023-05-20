<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Post\Service;

class StoreController extends Controller
{
    use Service;

    public function __invoke($request)
    {
        $data = $request->validated();
        $this->store($data);
        return redirect()->route('admin.posts.index');
    }
}
