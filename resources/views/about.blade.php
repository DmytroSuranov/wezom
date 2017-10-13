@extends('layouts.front')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">
                <small>{{$about_page->name}}</small>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{$about_page->description}}
        </div>
    </div>
</div>
@endsection