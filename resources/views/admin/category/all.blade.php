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
                            <div class="panel-heading">Категории</div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                   <thead>
                                       <tr>
                                           <td>ID Категории</td>
                                           <td>Имя Категории</td>
                                           <td>URL Категории</td>
                                           <td>Описание</td>
                                           <td>Публикация (Yes/No)</td>
                                           <td>Последнее редактирование</td>
                                           <td class="add_button_cell">
                                                <button class="btn btn-primary" onclick="location.href='/admin/categories/add'">Добавить</button>
                                           </td>
                                       </tr>
                                   </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td><a target="_blank" href="/{{$category->url}}">/{{$category->url}}</a></td>
                                                <td>{{$category->description}}</td>
                                                <td>{{$category->publication}}</td>
                                                <td>{{$category->date_of_publication}}</td>
                                                <td>
                                                    <button class="btn-xs btn-default" onclick="location.href='/admin/categories/edit/{{$category->id}}'">Редактировать</button>
                                                    <button class="btn-xs btn-default" onclick="location.href='/admin/categories/delete/{{$category->id}}'">Удалить</button>
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
