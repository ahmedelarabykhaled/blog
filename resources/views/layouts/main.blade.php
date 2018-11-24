<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 600;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .my-home
            {
                text-decoration: none!important;
                color: #333;
                font-weight: 400;
            }
            nav
            {
                background-color: #ccc!important;
            }
            .category a
            {
                display: block;
            }
            .category
            {
                /*height: 100%!important;*/
            }
            .title-link
            {
                color: #333;
                text-decoration: underline;
                font-size: 18px;
            }
            .footer
            {
                color: white;
                background-color: #333;
                height: 60px;
                text-align: center;
            }
            .image
            {
                height: 300px;
            }
            .elem
            {
                min-height: 600px;
            }
        </style>
    </head>
    <body>

     <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/post') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>


                 @if (Route::has('login'))
                
                    @auth
                        <a class="my-home" href="{{ url('/post/create') }}">Add Post</a>

                        @if(Auth::user()->user_role <= 2)
                        <a class="my-home mx-3" href="{{ url('/posts') }}">Dashboard</a>
                        @endif
                        @if(Auth::user()->user_role == 1)
                            <a class="my-home mx-3" href="{{ url('/control') }}">Control</a>
                        @endif
                    @endauth
                
                @endif



                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



<div class="container-fluid mt-4">
    <div class="row justify-content-center elem">
        <div class="col-md-3">
            <div class="card category ">
                <div class="card-header">categories</div>
                <div class="card-body container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <a href="#">category</a>
                            <a href="#">category</a>
                            <a href="#">category</a>
                            <a href="#">category</a>
                            <a href="#">category</a>
                            <a href="#">category</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
               

               


        @yield('content')

        
        </div>
    </div>
</div>
        </div>

        <div class="footer text-cenrer mt-5">
            <p class="pt-3">{{ date('Y-m-d ') }}</p>
        </div>
    </body>
</html>

