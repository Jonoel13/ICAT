<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Icat CDMX</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <!--script src="{{ asset('js/app.js') }}" defer></script-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- Styles -->
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Styles -->
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .bg-success{
            background: #691C32 !important;
        }
        .btn-success {
            background: #fff !important;
            color: #691C32 !important;
            border-color: #691C32 !important;
        }

        .btn-success:hover{
            background: #691C32 !important;
            color: #ffffff !important;
        }

        .btn-scs {
            color: #fff;
            border-color: #BC955C;
            background: #BC955C;
        }

        .btn-scs:hover{
            background: #DDc9A3;
            color: #ffffff;
        }

        .content {
            text-align: center;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
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

        .main{
            margin-top: 20px;
        }
        
        .position-ref {
            position: relative;
        }
        .section1{
            padding: 30px;
            color: #ffffff;
        }

        .subtitle {
            font-size: 40px;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .text-green{
            color: #235B4E;
        }

        .text-success{
            color: #691C32 !important;
        }
        .text-b{
            font-weight: 600;
        }

        .text-w{
            line-height: 1.2;
        }

        .title {
            font-size: 84px;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .top-right{
            padding-top: 15px;
        }

        .image{
            height: 100px !important;
        }
        
        
        
        
        .En{
            color: #4472C4;
        } 
        .Aceptado{
            color: #00B050;
        }
        .Rechazado{
            color: #FF0000;
        }
        .competente{
            color: #178266;
        }
        .nocompetente{
            color: #9F2241;
        }

        .Competente{
            color: #178266;
        }
        .No{
            color: #9F2241;
        }

        .profile{
    background: #fcfcfc;
    border-right: 1px rgba(0,0,0,.1) solid;
  }

  .form-info{
    background: #e3eefb;
    color: #0070C0;
    padding: 0px 10px 0px 15px;
  }
  .link-info{
    color: #0f4c42 !important;
  }
  .step-title{
    font-size: 20px;
  }
  
  .number-list{
    background: #691C32;
    border-radius: 50%; 
    padding: 1px 7px 1px 7px;
    color: #fff;    
    font-size: 14px;
    margin-right: 10px; 
  }
  .list-unstyled li{
    margin-bottom: 15px;
    font-size: 18px;
  }
  .title-steps{
    color: #691C32;
    font-size: 22px;
  }
  .steps{
    background: #eaeaea;
    padding: 25px;
  }
  .link-step{
    margin-right: 10px;
    padding-right: 10px;
    color: #999 !important;
  }
  .link-active{
    font-weight: 600;
    color: #606060;
  }
  .nav-pro{
    font-size: 25px;
  }
  .text-tg{
    font-size: 18px;
  }
  .step-active{
    color: #BC955C;
    font-weight: 600;
  }
  .text-notify{
    color: #235B4E;
  }
        
    </style>


</head>
<body>
    <div id="app">
        
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <a class="navbar-brand" href="{{ url('/home') }}">
                    <img class="img-responsive col-md-12 image" src="https://drive.google.com/uc?export=view&id=1-53ECQVm3N6OLvXwiqGpFNdTbFsnFcmx">
                </a>
            <div class="container">

                <div class="col-md-6">
                    
                    <!--button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                        <span class="navbar-toggler-icon"></span>
                    </button-->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->

                        </ul>
                    </div>
                </div>
                <div class=" links">
                    @yield('title')
                    @guest
                            @if (Route::has('login'))
                                
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                                
                            @endif

                            @if (Route::has('registro'))
                                    <a class="nav-link" href="{{ route('registro') }}">{{ __('Registarme') }}</a>
                            @endif
                        @else
                                <a  class="" href="#" role="button" >
                                    {{ Auth::user()->name }}
                                </a>

                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                
                        @endguest
                </div>

            </div>
        </nav>

        <main class="py-4 main">
            <div class="container-fluid">

                <div class="row">
                    @yield('menu')
                    @if (Route::has('login'))
                        @auth
                        <div class="col-md-10">
                        @else
                        @endauth
                    @endif
                        <div>
                            <h5 class="text-notify">{{ Session::get('message') }}</h5>
                            <h5 class="text-danger">{{ Session::get('messageNo') }}</h5>
                        </div>
                        <div class="">
                            @yield('content')
                        </div>
                        
                    </div>
                </div>
             
            </div>
        </main>
    </div>
</body>
</html>
