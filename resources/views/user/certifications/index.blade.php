@extends('base')
@section('content')
<h1>Mis Certificaciones</h1>


	@foreach($certifications as $certification)
		<div class="row">
			<div class="card mb-3 col-md-8" >
			  <div class="row no-gutters">
			    <div class="col-md-4 pt-3">
			      <img class="img-responsive" src="{{ asset ('storage/standard')}}/{!! Helper::standarImage($certification->estandar) !!}" width="300px">
			    </div>
			    <div class="col-md-6">
			      <div class="card-body">
			        <h5 class="card-title"><strong>Estándar: </strong>{{$certification->estandar}}</h5>
			        <p class="card-text"><h6><b>Serctor: </b>{{$certification->sector}}</h6></p>
			        <p class="card-text"><h6><b>Descripción: </b>{!! Helper::standarDescription($certification->estandar) !!}</h6></p>
			        <p class="card-text"><h6><b>Estatus: </b>{{$certification->estatus}}</h6></p>
			      </div>
			    </div>
			    <div class="col-md-2 d-flex align-items-center">
			    	<a href="{{url('usuario/certificaciones')}}/{{$certification->curp}}/{{$certification->id}}" class="btn btn-info">Ver</a>
			    </div>
			  </div>
			</div>
		</div>
	@endforeach


@endsection
