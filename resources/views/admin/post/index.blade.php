@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все посты</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Все посты</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row gx-5">
                <div class="col-lg-6 col-sm-12 ">
                    @foreach ($posts as $post)
                        <div class="col">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="clearfix">
                                        <h4 class="card-title">
                                            <a href="{{ route('admin.posts.show', $post->id) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h4>
                                        <div class="row float-right">
                                            @foreach ($tags as $tag)
                                                @foreach ($post->tags as $postTag)
                                                    @if ($tag->id == $postTag->id)
                                                        <div class="text-warning mr-3"><strong>#{{ $tag->title }}
                                                            </strong>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{ $post->content }}
                                </div>
                                <div class="card-footer">
                                    <div class="clearfix">
                                        <a href="#" class="link-black text-sm">
                                            <i class="far fa-thumbs-up mr-1"></i>{{ $post->likes }}
                                        </a>

                                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                                            class="btn btn-outline-warning btn-sm ml-4 float-right">
                                            <i class="fas fa-pen"></i> Редактировать
                                        </a>
                                        <form class="float-right" action="{{ route('admin.posts.destroy', $post->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger btn-sm ml-4"><i class="fas fa-times"></i>
                                                Удалить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="container-fluid mt-3  ml-1">
                    {{ $posts->withQueryString()->links() }}
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
