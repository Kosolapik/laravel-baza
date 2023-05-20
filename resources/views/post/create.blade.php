@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="title">Заголовок</label>
                <input class="form-control" type="text" id="title" name="title" placeholder="Заголовок"
                    value="{{ old('title') }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="content">Содержание</label>
                <textarea class="form-control" id="content" name="content" title="content" placeholder="Содержание"
                    value="{{ old('content') }}"></textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="image">Изображение</label>
                <input class="form-control" type="text" id="image" name="image" placeholder="Изображение"
                    value="{{ old('image') }}">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="category">Категория</label>
                <select class="form-select" id="category" name="category">
                    <option selected></option>
                    @foreach ($categories as $category)
                        <option {{ old('category_id') == $category->id ? ' selected' : '' }} value="{{ $category->id }}">
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
                        <option {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}
                            value="{{ $tag->id }}">
                            {{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Создать</button>
        </form>
    </div>
@endsection
