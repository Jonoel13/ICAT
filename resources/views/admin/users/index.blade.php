@extends('base')
@section('content')
<div class="row">
  <div class="col-sm-8">
    <h4>Citas</h4>
  </div>
  <div class="col-sm-4">
    <a href="{{url('citas')}}" class="btn btn-success pull-right" target="_blank">Nueva cita</a>
  </div>
</div>

<hr class="my-4">

<table id="lista" class="table table-striped table-bordered display">
  <thead>
      <tr>
          <th>CURP</th>
          <th>Correo Electrónico</th>
          <th></th>
      </tr>
  </thead>
  <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><a class="btn btn-success" href="{{url('usuarios')}}/{{$user->id}}">Cambiar contraseña</a></td>
      </tr>
      @endforeach
  </tbody>
</table>

<script type="text/javascript">
  $(document).ready( function () {
      $('#lista').DataTable();
  } );
</script>
@endsection