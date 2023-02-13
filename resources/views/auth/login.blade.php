@extends('layouts.appnologin')
@section('img')
<style type="text/css">
.fondo {
    /*
    background-image: url("http://localhost:8000/image/fondo.png");
    background-repeat: no-repeat;
    */
    position: absolute;
    width: 89%;
    height: auto;
    z-index: 20;
}
.login{
    position: relative;
    z-index: 200;
}
.shadow-sm {
     box-shadow: 0 0rem 0rem !important; 
}

@media only screen and (max-width: 1200px) {
  .fondo {
    display: none;
  }
}
</style>
<div class="container">
    <img class="fondo" src="https://drive.google.com/uc?export=view&id=1EbkSEoY3EeAJuyE-zA4DpvZiyQQk4pQA">
</div>
@endsection
@section('content')
<style type="text/css">
    .title-lg{
        color: #10312B;
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 50px;
        font-weight: 400;
        line-height: 0.9;
        margin-bottom: 30px;
        margin-left: 15px;
    }
    .title-b{
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 85px;
        font-weight: 700;

    }
    .form-login{
        padding: 30px;
        background: #eaeaea;
        margin-bottom: 10px;
    }
    .form-text-lg{
        font-size: 18px;
        font-weight: 600;
        color: #10312B;
    }
    .link-rg{
        font-size: 22px;
        font-weight: 600;
        color: #606060;
    }
    .form-lg-btn{
        margin-top: 15px;
    }
    .form-btn-lg{
        padding-left: 35px;
        padding-right: 35px;
        border-radius: 15px;
        font-size: 18px;
    }  
</style>
<div class="">
    <div class="row ">
        <div class="col-md-12">
            <div class="col-md-7 title-lg">
                <p class="">
                    <span class="title-b">Certifica tus</span><br> competencias laborales
                </p>
            </div>
            <div class="col-md-5 mb-5 login">

                <!--div class="card-header">{{ __('Login') }}</div-->

                <div class="card-body form-login">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordar ') }}
                                    </label>
                                </div>
                            </div>
                        </div-->

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar sesión') }}
                                </button>
                                <!--
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                -->
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 text-center">
                    <!--a href="{{ url('catalogo/certificaciones') }}" class="link-rg">Oferta de certificación</a>
                    <div class="text-center text-gray">
                        <span>Conoce nuestra oferta de certificación</span> 
                    </div-->
                    <a href="https://sii.icatadistancia.cdmx.gob.mx/registro/estandar/EC1331/grupo/000001" class="link-rg">Registrarse</a>
                </div>
                <div class="text-center text-gray">
                    <span>Si aún no tienes una cuenta presiona <span class="text-b">"Registrarse"</span></span> 
                </div>
        
            </div>
        </div>
    </div>
</div>
@endsection
