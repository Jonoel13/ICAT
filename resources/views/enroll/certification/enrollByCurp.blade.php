@extends('base')
@section('content')
<div class="container-fluid">




<div class="row-fluid">
	<p>
		<h2>Tus datos coinciden con el siguiente perfil:</h2>
		Correo electrónio: {{$profile->user_email}}
		<br>
		Nombre: {{$profile->user_nombre}} {{$profile->user_app}} {{$profile->user_apm}}
		<br>
		<span>Sí, son mis datos.</span>
	</p>

</div>


	<form method="POST" action="{{url('registro/guardar')}}" autocomplete="off" enctype="multipart/form-data">
		Inscribirme a:
		<div class="form-row">
	      <div class="form-group col-md-4">
	        <label for="enrol_user_nombre">:</label>
	        <input type="text" class="form-control" id="enrol_user_nombre" name="enrol_user_nombre" required="required" value="{{ old('enrol_user_nombre') }}">
	        <span class="alert-danger">{{$errors->first('enrol_user_nombre')}}</span>
	      </div>
	  </div>
	</form>

</div>
@endsection
