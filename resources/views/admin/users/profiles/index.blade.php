@extends('base')
@section('content')
<div class="row">
  <div class="col-sm-8">
    <h4>Perfiles</h4>
  </div>

</div>

<hr class="my-4">

<table id="lista" class="table table-striped table-bordered display">
  <thead>
      <tr>
          <th>Id</th>
          <th>Curp</th>
          <th>Correo Electrónico</th>
          <th>Documento Id</th>
          <th>Documento Curp</th>
          <th>Documentos estatus</th>
          <th></th>
      </tr>
  </thead>
  <tbody>
      @foreach($profiles as $profile)
      <tr>
        <td>{{$profile->id}}</td>
        <td><a href="{{url('usuario/perfil')}}/{{$profile->user_curp}}">{{$profile->user_curp}}</a></td>
        <td>{{$profile->user_email}}</td>
        <td>{{$profile->user_check_curp}}</td>
        <td>{{$profile->user_check_id}}</td>
        <td>{{$profile->user_check_ok}}</td>
        <td><a class="btn btn-success" href="{{url('admin/usuarios/perfiles/eliminar/')}}/{{$profile->id}}">Eliminar</a></td>
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
