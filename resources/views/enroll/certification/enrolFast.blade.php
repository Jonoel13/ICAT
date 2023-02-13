@extends('base')
@section('content')
<div class="container-fluid">

	<div class="row-fluid">
		<p>
			<h2>Tus datos coinciden con el siguiente perfil:</h2>
			Correo electrónio: {{$profile->user_email}}
			<br>
			Nombre: {{$profile->user_nombre}} {{$profile->user_app}} {{$profile->user_apm}}
		</p>

	</div>


	<div>

			<h4 style="font-weight: 600 !important;">Registro a Proceso de Evaluación con fines de Certificación</h4>
		    <hr>
		    <h4>Inscribirme a estándard {!! Helper::standarName($group->id_standard) !!}</h4>
		    <div class="form-row">

		      <div class="form-group col-md-6">
		        <label for="enrol_course_id"></label>
		       
		        <input type="hidden" id="enrol_course_id" name="enrol_course_id" value="{!! Helper::standarName($group->id_standard) !!}">
		      </div>
		    </div>
		    <!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  Continuar
			</button>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">comprobar datos</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Confirmo mi incripcion al proceso del certificacion del estandard: <span class="standard"></span>
	      </div>
	      <form method="POST" action="{{url('registro/rapido')}}" autocomplete="off" enctype="multipart/form-data">
	      	{{csrf_field() }}
		      <div class="modal-footer">

		      	<input type="hidden" id="enrol_user_curp" name="enrol_user_curp" value="{{$profile->user_curp}}">
		      	<input type="hidden" id="enrol_user_email" name="enrol_user_email" value="{{$profile->user_email}}">
		      	<input type="hidden" id="enrol_course_name" name="enrol_course_name" value="{{$profile->user_email}}">

		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

		        <button type="submit" class="btn btn-success btn-lg btnt" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Confirmar</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

</div>

<script type="text/javascript">
  $(document).ready(function () {
      var standard = $('#enrol_course_id').val();
      $('.standard').text(standard);
      $('#enrol_course_name').val(standard);
  });
</script>
@endsection
