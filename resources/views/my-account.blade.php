@extends('layouts.front')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4">Мой аккаунт</h1>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-info">{{ session('message') }}</div>
                @endif
                <form action="/my-account" method="post" id="message_form">
                    {{ csrf_field() }}
                    <input name="id_user" type="hidden" value="{{$current_user->id}}">
                    <div class="input-group">
                        <span class="input-group-addon">Имя</span>
                        <input id="name" type="text" class="form-control" required name="name" placeholder="Имя" value="{{$current_user->name}}">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Email</span>
                        <input id="email" type="text" class="form-control" disabled name="email" value="{{$current_user->email}}">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Новый Пароль</span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="input-group  pull-right">
                        <input class="btn btn-default" type="submit" id="changeUserData" name="changeUserData" value="Изменить">
                    </div>

                    <div class="alert alert-danger contact_errors">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection