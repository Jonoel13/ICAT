@extends('layouts.adminapp')
@section('content')
<div class="row">
    <h2>Registrar usuario</h2>
    <div class="row">
        <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('usuarios')}}">Lista Usuarios</a></li>
                <li class="breadcrumb-item active">Registrar usuario</li>
              </ol>
        </nav>
    </div>
    
    <form method="POST" action="{{url('admin/usuarios/guardar')}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="user_name"><strong>Nombre:</strong></label>
                <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}" >
                <span class="alert-danger">{{$errors->first('user_name')}}</span>
            </div>
          
            <div class="form-group col-md-6">
                <label for="user_email"><strong>Correo electrónico:</strong></label>
                <input type="email" class="form-control" id="user_email" name="user_email" value="{{ old('user_email') }}" >
                <span class="alert-danger">{{$errors->first('user_email')}}</span>
            </div>

            <div class="form-group col-md-6">
                <label for="email"><strong>Rol del usuario:</strong></label>
                <select class="form-control" id="user_id_rol" name="user_id_rol">
                    <option value="">Selecionar</option>
                    <option value="1">Admin SII</option>
                    <option value="2">Admin DDC</option>
                    <option value="3">Admin DAF</option>
                    <option value="4">Admin DAE</option>
                    <option value="5">Admin DPCER</option>
                    <option value="6">Admin GAM</option>
                </select>
                <span class="alert-danger">{{$errors->first('user_id_rol')}}</span>
            </div>

            <div class="form-group col-md-6">
                <label for="user_password"><strong>Contraseña:</strong></label>
                <input type="text" class="form-control" id="user_password" name="user_password" value="{{ old('user_email') }}">
                <span class="alert-danger">{{$errors->first('user_email')}}</span>
            </div>


        </div>
        <hr>

        <a href="{{url('usuarios')}}" type="button" class="btn btn-default">Cancelar</a>
        <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Registrar</button>
    </form>
</div>
@endsection
