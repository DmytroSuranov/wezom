@extends('layouts.front')

@section('content')
        <!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

            <h1 class="my-4">Категория :
                <small>{{$category->name}}</small>
            </h1>
            @if(count($posts))
            @foreach($posts as $post)
                    <!-- Blog Post -->
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{$post->name}}</h2>
                    <p class="card-text">{{$post->post_preview}}</p>
                    <a href="/{{$post->category->url}}/{{$post->url}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{$post->date_of_publication}}
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@endsection