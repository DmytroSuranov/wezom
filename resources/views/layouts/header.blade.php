<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->

    <link href="{{ asset('css/blog-home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
<div id="app">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">WEZOM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @if(isset($about_page))
                    <li class="nav-item">
                        <a class="nav-link" href="/about">{{$about_page->name}}</a>
                    </li>
                @endif
                @if(isset($culture))
                    <li class="nav-item">
                        <a class="nav-link" href="/{{$culture->url}}">{{$culture->name}}</a>
                    </li>
                @endif
                @if(isset($politic))
                    <li class="nav-item">
                        <a class="nav-link" href="/{{$politic->url}}">{{$politic->name}}</a>
                    </li>
                @endif
                @if(isset($sport))
                    <li class="nav-item">
                        <a class="nav-link" href="/{{$sport->url}}">{{$sport->name}}</a>
                    </li>
                @endif
                @if(isset($contact_page))
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">{{$contact_page->name}}</a>
                    </li>
                @endif
                @if(isset($football_tag))
                    <li class="nav-item">
                        <a class="nav-link" href="/tags/{{$football_tag->url}}">{{$football_tag->name}}</a>
                    </li>
                @endif
                <li class="nav-item auth_li">
                    <ul class="nav navbar-nav navbar-right nav-link">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                                    <ul class="nav navbar-nav navbar-right">
                                        <!-- Authentication Links -->
                                        @if (Auth::guest())
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        @else
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle menu-open" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    {{ Auth::user()->name }}
                                                </a>

                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="/my-account">My Account</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>