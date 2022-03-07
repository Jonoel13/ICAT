@extends('base')
@section('content')
<div class="col-md-11">

	<form method="POST" action="{{url('registro/curp')}}" autocomplete="off" enctype="multipart/form-data">
		<div class="form-row">
	      <div class="form-group col-md-4">
	        <label for="enrol_user_curp">Buscar CURP:</label>
	        <input type="text" class="form-control" id="enrol_user_curp" name="enrol_user_curp" required="required" value="{{ old('enrol_user_curp') }}">
	        <span class="alert-danger">{{$errors->first('enrol_user_curp')}}</span>
	      </div>
	  </div>
	</form>

	<form method="POST" action="{{url('registro/email')}}" autocomplete="off" enctype="multipart/form-data">
		<div class="form-row">
	      <div class="form-group col-md-4">
	        <label for="enrol_user_email">Buscar correo:</label>
	        <input type="text" class="form-control" id="enrol_user_email" name="enrol_user_email" required="required" value="{{ old('enrol_user_email') }}">
	        <span class="alert-danger">{{$errors->first('enrol_user_email')}}</span>
	      </div>
	  </div>
	</form>

</div>
@endsection
