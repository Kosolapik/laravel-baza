@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label class="form-label" for="title">Заголовок</label>
                <input class="form-control" type="text" id="title" name="title" placeholder="Заголовок"
                    value="{{ $post->title }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="content">Содержание</label>
                <textarea class="form-control" id="content" name="content" title="content" placeholder="Содержание"
                    value="{{ old('content') ? old('content') : $post->content }}"></textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="image">Изображение</label>
                <input class="form-control" type="text" id="image" name="image" placeholder="Изображение"
                    value="{{ $post->image }}">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="category">Категория</label>
                <select class="form-select" id="category" name="category">
                    <option selected></option>
                    @foreach ($categories as $category)
                        <option {{ $category->id == $post->category->id ? ' selected' : '' }} value="{{ $category->id }}">
                            {{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="tags">Тэги</label>
                <select class="form-select" multiple id="tags" name="tags[]">
                    @foreach ($tags as $tag)
                        <option
                            @foreach ($post->tags as $postTag)
                                {{ $tag->id == $postTag->id ? ' selected' : '' }} @endforeach
                            value="{{ $tag->id }}">
                            {{ $tag->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Изменить</button>
        </form>
    </div>
@endsection
