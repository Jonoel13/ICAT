@extends('base')
@section('content')
<div class="row col-md-11 offset-md-1">
    <form method="POST" action="{{url('usuarios/password')}}/{{$user->id}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="name"><strong>CURP:</strong></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="email"><strong>Correo electrónico:</strong></label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="user_password"><strong>Contraseña:</strong></label>
                <input type="text" class="form-control" id="user_password" name="user_password" required="">
                <span class="alert-danger">{{$errors->first('user_password')}}</span>
            </div>
            

        </div>

        <a href="{{url('usuarios')}}" type="button" class="btn btn-default">Cancelar</a>
        <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Actualizar contraseña</button>
    </form>
</div>
@endsection
