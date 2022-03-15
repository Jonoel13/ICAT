@extends('layouts.adminapp')
@section('content')
<style type="text/css">
	.Disponible{
		color: #28a745 !important;
	}
	.nv{
		margin-bottom: 15px;
	}
</style>
<h1>Agenda</h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Agenda</a></li>
    </ol>
</nav>
<div class="row nv">
  	<div class="col-6 col-md-6">
  		  <a class="btn btn-success" href="nuevo">Agregar</a>
  	</div>
  	<div class="col-6 col-md-6">
        
    		<div class="input-group">
            <input type="date" name="date" id="date">
            <div class="input-group-append">
                <a href="" id="dateLink" class="btn btn-outline-success btn-success" >Buscar</a>
            </div>
            <div class="input-group-append">
                <a href="{{url('agenda')}}" class="btn btn-outline-success btn-success" >Todos</a>
            </div>
        </div>
        
  	</div>
</div>
<div class="row">
  <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <!--th scope="col">#</th-->
      <th scope="col" class="">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Estándar</th>
      <th scope="col">Sede</th>
      <th scope="col">Estatus</th>
    </tr>
  </thead>
  <tbody>
    @foreach($dates as $date)
    <tr>
      <td>{{date('d-m-Y', strtotime($date->date_date))}}</td>
      <td>{{$date->date_hour}}</td>
      <td>{{$date->date_standar}}</td>
      <td>{{$date->date_place}}</td>
      <td class="{{$date->date_status}}"><strong>{{$date->date_status}}</strong></td>
      <td><a href="{{url('agenda')}}/{{$date->id}}"><i class="fa fa-edit text-success"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<nav aria-label=" navigation ">
{!! $dates->render() !!}
</nav>
</div>
<script type="text/javascript">
  $(document).ready(function () {

        $('#date').change(function() {
                $('#dateLink').attr('href', '');
                var date = $('#date').val();
                var url      = window.location.origin+'/sii/agenda/buscar/'+date;
                $('#dateLink').attr('href', url);
            });
    });
</script>
@endsection
