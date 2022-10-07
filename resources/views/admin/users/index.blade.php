@extends('base')
@section('content')
<div class="row">
  <div class="col-sm-8">
    <h4>Usuarios</h4>
  </div>
  <div class="col-sm-4">
    <a href="{{url('admin/usuarios/nuevo')}}" class="btn btn-success pull-right">Nuevo usuario</a>
  </div>
</div>

<hr class="my-4">

<table id="lista" class="table table-striped table-bordered display">
  <thead>
      <tr>
          <th>CURP</th>
          <th>Correo Electrónico</th>
          <th></th>
          <th></th>
      </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
        @if(Auth::user()->id_rol == 1)
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td><a class="btn btn-success" href="{{url('usuarios')}}/{{$user->id}}">Cambiar contraseña</a></td>
          <td>
            <a class="btn btn-success" href="{{url('admin/usuarios/eliminar')}}/{{$user->id}}">Eliminar</a>
          </td>
        </tr>
        @endif
        @if(Auth::user()->id_rol == 2)
          @if($user->id_rol!= 1)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td><a class="btn btn-success" href="{{url('usuarios')}}/{{$user->id}}">Cambiar contraseña</a></td>
              <td>
           
              </td>
            </tr>
          @endif
        @endif
      @endforeach
  </tbody>
</table>

<script type="text/javascript">
  $(document).ready( function () {
      $('#lista').DataTable();
  } );
</script>
@endsection
