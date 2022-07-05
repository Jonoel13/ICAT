@extends('layouts.adminapp')
@section('content')

<div class="row mb-5">
  <h1>Nuevo grupo</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('admin/groups/lista') }}">Lista Grupos</a></li>
      <li class="breadcrumb-item active">Nuevo grupo</li>
    </ol>
  </nav>
  <form method="POST" action="{{url('admin/groups/guardar')}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
     <div class="form-row">

      <div class="form-group col-md-12">
        <label for="id_standard"><strong>Nombre del estándar:</strong></label>
        <select class="form-control" id="id_standard" name="id_standard">
            <option value="">Selecionar</option>
            @foreach($standards as $standard)
            <option value="{{$standard->id}}">{{$standard->name}}</option>
            @endforeach

        </select>
        <span class="alert-danger">{{$errors->first('id_standard')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="group_name"><strong>Id del grupo:</strong></label>
        <input type="text" class="form-control" id="group_name" name="group_name" value="{{ old('group_name') }}" placeholder="Una vez asignado este id no podrá modificarse">
        <span class="alert-danger">{{$errors->first('group_name')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="group_shortname"><strong>Nombre publico del grupo:</strong></label>
        <input type="text" class="form-control" id="group_shortname" name="group_shortname"  value="{{ old('group_shortname') }}" >
        <span class="alert-danger">{{$errors->first('group_shortname')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="id_allience"><strong>Convenio:</strong></label>
        <select class="form-control" id="id_allience" name="id_allience">
            <option value="">Selecionar</option>
            @foreach($alliences as $allience)
            <option value="{{$allience->id}}">{{$allience->alianza_proyecto}}</option>
            @endforeach
            <option value="N/A">N/A</option>

        </select>
        <span class="alert-danger">{{$errors->first('id_allience')}}</span>
      </div>
      <div class="form-group col-md-12">
        <label for="group_service_type"><strong>Servicio:</strong></label>
        <select class="form-control" id="group_service_type" name="group_service_type">
            <option value="">Selecionar</option>
            <option value="1">Capacitación</option>
            <option value="2">Certificación</option>
        </select>
        <span class="alert-danger">{{$errors->first('group_service_type')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="id_instructor"><strong>Instructor:</strong></label>

        <select class="form-control" id="id_instructor" name="id_instructor" value="{{ old('id_instructor') }}">
            <option value="">Seleccionar</option>
            @foreach($instructors as $instructor)
                <option value="{{$instructor->id}}">{{$instructor->instructor_name}} {{$instructor->instructor_app}} {{$instructor->instructor_app}}</option>
            @endforeach
            <option value="N/A">N/A</option>
        </select>

        <span class="alert-danger">{{$errors->first('id_instructor')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="id_place"><strong>Sede:</strong></label>
        <input type="text" class="form-control" id="id_place" name="id_place"  value="{{ old('id_place') }}" min="0">
        <span class="alert-danger">{{$errors->first('id_place')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="group_mode"><strong>Modalidad:</strong></label>
        <select class="form-control" id="group_mode" name="group_mode">
            <option value="">Selecionar</option>
            <option value="Presencial">Presencial</option>
            <option value="A distancia">A distancia</option>
        </select>
        <span class="alert-danger">{{$errors->first('group_mode')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="group_level"><strong>Nivel:</strong></label>
        <input type="number" class="form-control" id="group_level" name="group_level"  value="{{ old('group_level') }}" min="0">
        <span class="alert-danger">{{$errors->first('group_level')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="group_price"><strong>Costo:</strong></label>
        <input type="number" class="form-control" id="group_price" name="group_price"  value="{{ old('group_price') }}" min="0">
        <span class="alert-danger">{{$errors->first('group_price')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="group_type"><strong>Formato de período de publicación:</strong></label>
        <select class="form-control" id="group_type" name="group_type">
            <option value="">Selecionar</option>
            <option value="Fijo">Fijo</option>
            <option value="Rango">Fecha de inicio - Fecha de termino</option>
        </select>
        <span class="alert-danger">{{$errors->first('group_mode')}}</span>
      </div>

      <div class="form-group col-md-6 rango" >
        <label for="group_date_init"><strong>Fecha de inicio:</strong></label>
        <input type="date" class="form-control" id="group_date_init" name="group_date_init" value="{{ old('group_date_init') }}">
        <span class="alert-danger">{{$errors->first('group_date_init')}}</span>
      </div>

      <div class="form-group col-md-6 rango" >
        <label for="group_date_end"><strong>Fecha de termino:</strong></label>
        <input type="date" class="form-control" id="group_date_end" name="group_date_end"  value="{{ old('group_date_end') }}">
        <span class="alert-danger">{{$errors->first('group_date_end')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="group_hours"><strong>Horas:</strong></label>
        <input type="number" class="form-control" id="group_hours" name="group_hours"  value="{{ old('group_hours') }}" min="0">
        <span class="alert-danger">{{$errors->first('group_hours')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="group_capacity"><strong>Capacidad máxima:</strong></label>
        <input type="number" class="form-control" id="group_capacity" name="group_capacity"  value="{{ old('group_capacity') }}" min="0">
        <span class="alert-danger">{{$errors->first('group_capacity')}}</span>
      </div>


      <div class="form-group col-md-6">
        <label for="group_min_grade"><strong>Calificación mínima:</strong></label>
        <input type="number" class="form-control" id="group_min_grade" name="group_min_grade" value="{{ old('group_min_grade') }}" min="0">
        <span class="alert-danger">{{$errors->first('group_min_grade')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="group_min_asistencia"><strong>Asistencia mínima:</strong></label>
        <input type="number" class="form-control" id="group_min_asistencia" name="group_min_asistencia" value="{{ old('group_min_asistencia') }}">
        <span class="alert-danger">{{$errors->first('group_min_asistencia')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="group_documentation"><strong>Enlace de la documentación:</strong></label>
        <input type="text" class="form-control" id="group_documentation" name="group_documentation" value="{{ old('group_documentation') }}">
        <span class="alert-danger">{{$errors->first('group_documentation')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="group_private"><strong>Grupo Privado:</strong></label>
        <select class="form-control" id="group_private" name="group_private">
            <option value="">Selecionar</option>
            <option value="Privado">Privado</option>
            <option value="Público">Público</option>
        </select>
        <span class="alert-danger">{{$errors->first('group_private')}}</span>
      </div>
    </div>

    <a href="{{url('admin/estandar/lista')}}" type="button" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
  </form>
</div>


<style type="text/css">
  label{
    font-weight: 800;
  }
</style>

<script type="text/javascript">
  $(document).ready(function () {

        $('.rango').hide();

        $('#group_type').change(function() {
                if($('#group_type').val() == 'Rango'){
                  $('.rango').show();
                }else{
                  $('.rango').hide();
                }
            });
    });
</script>


@endsection
