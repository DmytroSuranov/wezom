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
                        <div class="panel-heading">Ститические страницы</div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <td>ID страницы</td>
                                    <td>Имя страницы</td>
                                    <td>URL страницы</td>
                                    <td>Описание</td>
                                    <td>Публикация (Yes/No)</td>
                                    <td class="add_button_cell">
                                        <button class="btn btn-primary" onclick="location.href='/admin/staticpages/add'">Добавить</button>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td>{{$page->id}}</td>
                                        <td>{{$page->name}}</td>
                                        <td><a target="_blank" href="/{{$page->url}}">/{{$page->url}}</a></td>
                                        <td>{{$page->description}}</td>
                                        <td>{{$page->publication}}</td>
                                        <td>
                                            <button class="btn-xs btn-default" onclick="location.href='/admin/staticpages/edit/{{$page->id}}'">Редактировать</button>
                                            <button class="btn-xs btn-default" onclick="location.href='/admin/staticpages/delete/{{$page->id}}'">Удалить</button>
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
