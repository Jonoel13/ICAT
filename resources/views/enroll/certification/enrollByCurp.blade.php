@extends('base')
@section('content')
<div class="col-md-11">


{{$profile->user_email}}

	<form method="POST" action="{{url('registro/guardar')}}" autocomplete="off" enctype="multipart/form-data">
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
