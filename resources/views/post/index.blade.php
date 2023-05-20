@extends('layouts.app')

@section('content')
    @foreach ($posts as $post)
        <div class="container">
            <a href="{{ route('posts.show', $post->id) }}">
                {{ $post->id }}. {{ $post->title }}
            </a>
        </div>
    @endforeach
    <div class="container mt-3">
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection
