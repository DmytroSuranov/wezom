@extends('layouts.front')

@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
        <!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">
                <small>{{$contact_page->name}}</small>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{$contact_page->description}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-info">{{ session('message') }}</div>
            @endif
            <form action="/contact" method="post" id="message_form">
                {{ csrf_field() }}
                <div class="input-group">
                    <span class="input-group-addon">ФИО*</span>
                    <input id="fio" type="text" class="form-control" name="fio" placeholder="ФИО">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Телефон*</span>
                    <input id="phone" type="text" class="form-control" name="phone" placeholder="Формат : +38(050)111-11-11">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Email*</span>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">Сообщение*</span>
                    <textarea id="msg" type="text" class="form-control" name="msg"></textarea>
                </div>
                <div class="input-group">
                    <div class="g-recaptcha" data-sitekey="6LcPMDQUAAAAAFtbhI2kx-gkQHq7GRZUAoUx8vq9"></div>
                </div>
                <div class="input-group  pull-right">
                    <input class="btn btn-default" type="submit" id="sendMessage" name="sendMessage" value="Отправить">
                </div>

                <div class="alert alert-danger contact_errors">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection