@extends('layouts.admin')

@section('content')
    <div class="container">
        <a class="btn btn-outline-info btn-sm mb-3" href="{{ route('admin.posts.index') }}">К списку постов</a>
        <div>ID: {{ $post->id }}</div>
        <div>Заголовок: {{ $post->title }}</div>
        <div>Содержание: {{ $post->content }}</div>
        <div>Изображение: {{ $post->image }}</div>
        <div>Категория: {{ $category->title }}</div>
        <div>Тэги: @foreach ($tags as $tag)
                [#{{ $tag->title }}]
            @endforeach
        </div>
        <div>Лайки: {{ $post->likes }}</div>
        <div>Публикация: {{ $post->is_published }}</div>
        <div>
            <a class="btn btn-outline-warning btn-sm mt-3" href="{{ route('admin.posts.edit', $post->id) }}">Редактировать</a>
        </div>
        <div>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                @csrf
                @method('delete')
                <input class="btn btn-outline-danger btn-sm mt-3" type="submit" value="Удалить">
            </form>
        </div>
    </div>
@endsection
