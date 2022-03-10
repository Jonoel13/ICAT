@extends('layouts.adminapp')
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

<table id="citas" class="table table-striped table-bordered display">
  <thead>
      <tr>
          <th>Fecha</th>
          <th>Hora</th>
          <th>Nombre</th>
          <th>CURP</th>
          <th>Correo Electrónico</th>
          <th></th>
      </tr>
  </thead>
  <tbody>
      @foreach($quotes as $quote)
      <tr>
        <td>{{$quote->date_date}}</td>
        <td>{{$quote->date_hour}}</td>
        <td>{{$quote->quote_user_name}} {{$quote->quote_user_ap_p}} {{$quote->quote_user_ap_m}}</td>
        <td>{{$quote->quote_user_curp}}</td>
        <td>{{$quote->quote_user_email}}</td>
        <td><a href="{{url('citas')}}/{{$quote->id}}"><i class="fa fa-eye text-success" title="Consultar"></i></a></td>
      </tr>
      @endforeach
  </tbody>
</table>

<!--script type="text/javascript">
  $(document).ready( function () {
      $('#citas').DataTable();
  } );
</script-->
<script type="text/javascript">
  const dataTable = new simpleDatatables.DataTable("#citas", {
  searchable: true,
  fixedHeight: true,
  })
</script>
@endsection
