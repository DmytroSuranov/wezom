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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if(isset($category))
                                Редактировать Категорию
                            @else
                                Добавить новую категорию
                            @endif
                        </div>
                        <div class="panel-body">
                            <form method="post" action="" class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" @if(isset($category))value="{{$category->id}}"@endif>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="name">Имя категории</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="name" id="name" type="text"  @if(isset($category))value="{{$category->name}}"@endif>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="url">URL категории</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="url" id="url" type="text" @if(isset($category))value="{{$category->url}}"@endif>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="description">Описание</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="description" id="description">@if(isset($category)){{$category->description}}@endif</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="public">Публикация</label>
                                    <div class="col-sm-1">
                                        @if(isset($category))
                                            @if($category->publication == 'yes')
                                                <input  name="public"  type="radio" value="Yes" checked>
                                                <label>Yes</label>
                                                <input  name="public" type="radio" value="No">
                                                <label>No</label>
                                            @else
                                                <input  name="public"  type="radio" value="Yes">
                                                <label>Yes</label>
                                                <input  name="public" type="radio" value="No" checked>
                                                <label>No</label>
                                            @endif
                                        @else
                                            <input  name="public"  type="radio" value="Yes">
                                            <label>Yes</label>
                                            <input  name="public" type="radio" value="No">
                                            <label>No</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group submit_button">
                                    <input type="submit" name="submit" value="Сохранить" class="btn btn-primary pull-right">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
