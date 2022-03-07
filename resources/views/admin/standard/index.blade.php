@extends('base')
@section('content')
<style type="text/css">
	.Disponible{
		color: #28a745 !important;
	}
	.nv{
		margin-bottom: 15px;
	}
</style>
<div class="row nv">
  	<div class="col-6 col-md-6">
  		  <a class="btn btn-success" href="">Agregar</a>
  	</div>
    <a href="{{url('admin/estandar/from')}}">erere</a>
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
<div class="container">
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
    @foreach($standards as $standard)
    <tr>

    </tr>
    @endforeach
  </tbody>
</table>
<nav aria-label=" navigation ">
{!! $standards->render() !!}
</nav>
</div>

@endsection