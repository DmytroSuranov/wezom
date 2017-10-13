@extends('layouts.front')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Категория :
                <small>{{$category->name}}</small>
            </h1>
        </div>

    </div>
    @if (session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h3 class="my-4">{{$post->name}}
            </h3>

            <h4 class="my-4">
                <small>Теги : {{$post->tags}}</small>
            </h4>
        </div>
        <div class="col-md-12">
            {{$post->description}}
        </div>
    </div>
    <hr>
    @if(count($post->comments))
        <div class="row">
        @foreach($post->comments as $comment)
            <div class="col-md-12 comment_body">
                Комментарий от пользователя : {{$comment->user->name}} <br>
                {{$comment->body}}
            </div>
        @endforeach
        </div>
    @endif
    <div class="row">
        @if (Auth::guest())
         Оставлять комментарии могут только зарегистрированные пользователи
        @else
            <form action="/comment/add" method="post" id="comment_form">
                {{ csrf_field() }}
                <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                <input type="hidden" name="id_post" value="{{$post->id}}">
                <div class="input-group">
                    <span class="input-group-addon">Оставить комментарий</span>
                    <textarea id="comment" class="form-control" name="comment"></textarea>
                </div>
                <div class="input-group">
                    <input class="btn btn-default" type="submit" id="sendComment" name="sendComment" value="Оставить комментарий">
                </div>
            </form>
        @endif
    </div>
</div>
@endsection