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
                            @if(isset($tag))
                                Редактировать тег
                            @else
                                Добавить новый тег
                            @endif
                        </div>
                        <div class="panel-body">
                            <form method="post" action="" class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" @if(isset($tag))value="{{$tag->id}}"@endif>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="name">Имя тега</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="name" id="name" type="text" @if(isset($tag))value="{{$tag->name}}"@endif>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="url">URL тега</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="url" id="url" type="text" @if(isset($tag))value="{{$tag->url}}"@endif>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="public">Публикация</label>
                                    <div class="col-sm-1">
                                        @if(isset($tag))
                                            @if($tag->publication == 'yes')
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
