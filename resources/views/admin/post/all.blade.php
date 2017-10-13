@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('admin.menu')
        </div>
        <div class="col-md-9 container">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        @if (session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <div class="panel panel-default">
                            <div class="panel-heading">Посты</div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <td>ID поста</td>
                                        <td>Имя поста</td>
                                        <td>Публикация (Yes/No)</td>
                                        <td>Категория</td>
                                        <td>Теги</td>
                                        <td>Анонс поста</td>
                                        <td>Последнее редактирование</td>
                                        <td class="add_button_cell">
                                            <button class="btn btn-primary" onclick="location.href='/admin/posts/add'">Добавить</button>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->name}}</td>
                                            <td>{{$post->publication}}</td>
                                            <td>{{$post->category->name}}</td>
                                            <td>{{$post->tags}}</td>
                                            <td>{{$post->post_preview}}</td>
                                            <td>{{$post->date_of_publication}}</td>
                                            <td>
                                                <button class="btn-xs btn-default" onclick="location.href='/admin/posts/edit/{{$post->id}}'">Редактировать</button>
                                                <button class="btn-xs btn-default" onclick="location.href='/admin/posts/delete/{{$post->id}}'">Удалить</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
