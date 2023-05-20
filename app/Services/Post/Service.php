<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

trait Service
{
    public function store($data)
    {

        try {
            DB::beginTransaction();

            $category = $data['category'];
            $tags = $data['tags'];
            unset($data['tags'], $data['category']);

            $catId = $this->createOrFindCategoryAndReturnCategoryId($category);
            $tagIds = $this->createOrFindTagAndReturnArrayOfTagIds($tags);

            $data['category_id'] = $catId;
            $post = Post::create($data);
            $post->tags()->sync($tagIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            // dd($exception->getMessage());
            return $exception->getMessage();
        }
        
        return $post;
    }

    public function update($post, $data)
    {
        try {
            DB::beginTransaction();

            $category = $data['category'];
            $tags = $data['tags'];
            unset($data['tags'], $data['category']);

            $catId = $this->createOrFindCategoryAndReturnCategoryId($category);
            $tagIds = $this->createOrFindTagAndReturnArrayOfTagIds($tags);

            $data['category_id'] = $catId;
            $post->update($data);
            $post->tags()->sync($tagIds);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            // dd($exception->getMessage());
            return $exception->getMessage();
        }
        return $post->fresh();
    }

    protected function createOrFindTagAndReturnArrayOfTagIds($tags) {
        $tagIds = [];
        foreach ($tags as $tag) {
            if (isset($tag['id'])) {
                $foundTag = Tag::find($tag['id']);
                if ($foundTag) {
                    if (isset($tag['title'])) {
                        $foundTag->update(['title' => $tag['title']]);
                    }
                    $tagIds[] = $foundTag->id;
                }
            } else {
                if (isset($tag['title'])) {
                    $foundTag = Tag::firstOrCreate(['title' => $tag['title']]);
                    $tagIds[] = $foundTag->id;
                }
            }
        }
        return $tagIds;
    }

    protected function createOrFindCategoryAndReturnCategoryId($category) {
        $catId = null;
        if (isset($category['id'])) {
            $foundCategory = Category::find($category['id']);
            if ($foundCategory) {
                if (isset($category['title'])) {
                    $foundCategory->update(['title' => $category['title']]);
                }
                $catId =  $foundCategory->id;
            }
        } else {
            if (isset($category['title'])) {
                $foundCategory = Category::firstOrCreate(['title' => $category['title']]);
                $catId =  $foundCategory->id;
            }
        }
        return $catId;
    }
}
