<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Requests\Post\FilterRequest;

class AdminPostController extends Controller
{

    public function index(FilterRequest $request)
    {
        $controller = new IndexController();
        return $controller($request);
    }

    public function create()
    {
        $controller = new CreateController();
        return $controller();
    }

    public function store(StoreRequest $request)
    {
        $controller = new StoreController();
        return $controller($request);
    }

    public function show(Post $post)
    {
        $controller = new ShowController();
        return $controller($post);
    }

    public function edit(Post $post)
    {
        $controller = new EditController();
        return $controller($post);
    }

    public function update(UpdateRequest $request ,Post $post)
    {
        $controller = new UpdateController();
        return $controller($request, $post);
    }

    public function destroy(Post $post)
    {
        $controller = new DestroyController();
        return $controller($post);
    }

}
