@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить новый пост</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Добавить пост</li>
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
            <div class="row">
                <div class="col-lg-6 col-sm-12 ">
                    <div class="container">
                        <form action="{{ route('admin.posts.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="title">Заголовок</label>
                                <input class="form-control" type="text" id="title" name="title"
                                    placeholder="Заголовок" value="{{ old('title') }}">
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
                                <input class="form-control" type="text" id="image" name="image"
                                    placeholder="Изображение" value="{{ old('image') }}">
                                @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="category_id">Категория</label>
                                <select class="form-select" id="category_id" name="category_id">
                                    <option selected></option>
                                    @foreach ($categories as $category)
                                        <option {{ old('category_id') == $category->id ? ' selected' : '' }}
                                            value="{{ $category->id }}">
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
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
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
