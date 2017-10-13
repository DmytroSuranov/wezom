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
                        <div class="panel-heading">Теги</div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <td>ID тега</td>
                                    <td>Имя тега</td>
                                    <td>URL тега</td>
                                    <td>Публикация (Yes/No)</td>
                                    <td class="add_button_cell">
                                        <button class="btn btn-primary" onclick="location.href='/admin/tags/add'">Добавить</button>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->name}}</td>
                                        <td><a target="_blank" href="/tags/{{$tag->url}}">/tags/{{$tag->url}}</a></td>
                                        <td>{{$tag->publication}}</td>
                                        <td>
                                            <button class="btn-xs btn-default" onclick="location.href='/admin/tags/edit/{{$tag->id}}'">Редактировать</button>
                                            <button class="btn-xs btn-default" onclick="location.href='/admin/tags/delete/{{$tag->id}}'">Удалить</button>
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
