<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Icat CDMX</title>

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
            background: #91d400;
            border-radius: 10px;
            padding-right: 25px;
            padding-left: 25px;
            font-size: 23px;
        }

        .btn-scs:hover{
            background: #91d450;
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
            margin-bottom: 40px !important;
        }  

        .position-ref {
            position: relative;
        }
        .section1{
            padding: 30px;
            color: #ffffff;
            width: 50%;
            height: auto;
        }
        
        .section2{
            background-image: url('https://drive.google.com/uc?export=view&amp;id=1AZwbTU-fu_1bhsVyLSia7v8pfrlxzoPn');
            width: 50%;
            height: auto;
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

        .text-success{
            color: #691C32 !important;
        }
        .text-b{
            font-weight: 600;
        }
        .text-footer{
            font-size: 23px;
        }
        .text-footer-2{
            font-size: 30px;
        }

        .text-w{
            
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

    @media only screen and (max-width: 1200px) {
        .section1{
            width: 100%;
        }
        .section2{
            display: none;
        }
    }
        
    </style>
</head>
<body>
    <div id="app">
        <div class="container">
            @yield('img')
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="img-responsive col-md-12 image" src="https://drive.google.com/uc?export=view&amp;id=10iSjcjjnUfwJAuNcLwRsNsslacv7UW06">
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
                <div class=" ">
                    @yield('title')
                    @if (Route::has('login'))
                        <div class="links hidden  top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Inicio</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar sesion</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registro</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>
        <main class="main">
            <div class="">
                <div>
                    <h5 class="text-notify">{{ Session::get('message') }}</h5>
                    <h5 class="text-danger">{{ Session::get('messageNo') }}</h5>
                </div>
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
