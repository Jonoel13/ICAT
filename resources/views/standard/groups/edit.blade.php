@extends('layouts.adminapp')
@section('content')

<div class="row mb-5">
  <h2>Actualizar grupo</h2>
  <form method="POST" action="{{url('admin/groups/update')}}/{{$group->id}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
     <div class="form-row">

      <div class="form-group col-md-12">
        <label for="id_standard"><strong>Nombre del estándar:</strong></label>
        <select class="form-control" id="id_standard" name="id_standard">
            <option>Selecionar</option>
            @foreach($standards as $standard)
            <option {{ $standard->id == $group->id_standard ? 'selected' : '' }} value="{{$standard->id}}">{{$standard->name}}</option>
            @endforeach

        </select>
        <span class="alert-danger">{{$errors->first('id_standard')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="group_name"><strong>Id del grupo:</strong></label>
        <input type="text" class="form-control" id="group_name" name="group_name" value="{{ $group->group_name }}">
        <span class="alert-danger">{{$errors->first('group_name')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="group_shortname"><strong>Nombre publico del grupo:</strong></label>
        <input type="text" class="form-control" id="group_shortname" name="group_shortname"  value="{{ $group->group_shortname }}" >
        <span class="alert-danger">{{$errors->first('group_shortname')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="id_convenio"><strong>Convenio:</strong></label>
        <select class="form-control" id="id_convenio" name="id_convenio">
            <option>Selecionar</option>
            <option value="N/A">N/A</option>
        </select>
        <span class="alert-danger">{{$errors->first('id_convenio')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="id_instructor"><strong>Instructor:</strong></label>
        <select class="form-control" id="id_instructor" name="id_instructor">
            <option value="">Seleccionar</option>
            @foreach($instructors as $instructor)
                <option {{ $instructor->id == $group->id_instructor ? 'selected' : '' }} value="{{$instructor->id}}" >
                  {{$instructor->instructor_name}} {{$instructor->instructor_app}} {{$instructor->instructor_app}}
                </option>
            @endforeach
        </select>
        <span class="alert-danger">{{$errors->first('id_instructor')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="id_place"><strong>Sede:</strong></label>
        <input type="text" class="form-control" id="id_place" name="id_place"  value="{{ $group->id_place }}" min="0">
        <span class="alert-danger">{{$errors->first('id_place')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="group_mode"><strong>Modalidad:</strong></label>
        <select class="form-control" id="group_mode" name="group_mode">
            <option>Selecionar</option>
            <option value="Presencial">Presencial</option>
            <option value="A distancia">A distancia</option>
        </select>
        <span class="alert-danger">{{$errors->first('group_mode')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="group_level"><strong>Nivel:</strong></label>
        <input type="number" class="form-control" id="group_level" name="group_level"  value="{{ $group->group_level }}" min="0">
        <span class="alert-danger">{{$errors->first('group_level')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="group_date_init"><strong>Fecha de inicio:</strong></label>
        <input type="date" class="form-control" id="group_date_init" name="group_date_init" value="{{ $group->group_date_init }}">
        <span class="alert-danger">{{$errors->first('group_date_init')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="group_date_end"><strong>Fecha de termino:</strong></label>
        <input type="date" class="form-control" id="group_date_end" name="group_date_end"  value="{{ $group->group_date_end }}">
        <span class="alert-danger">{{$errors->first('group_date_end')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="group_hours"><strong>Horas:</strong></label>
        <input type="number" class="form-control" id="group_hours" name="group_hours"  value="{{ $group->group_hours }}" min="0">
        <span class="alert-danger">{{$errors->first('group_hours')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="group_capacity"><strong>Capacidad máxima:</strong></label>
        <input type="number" class="form-control" id="group_capacity" name="group_capacity"  value="{{ $group->group_capacity }}" min="0">
        <span class="alert-danger">{{$errors->first('group_capacity')}}</span>
      </div>


      <div class="form-group col-md-6">
        <label for="group_min_grade"><strong>Calificación mínima:</strong></label>
        <input type="number" class="form-control" id="group_min_grade" name="group_min_grade" value="{{ $group->group_min_grade }}" min="0">
        <span class="alert-danger">{{$errors->first('group_min_grade')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="group_min_asistencia"><strong>Asistencia mínima:</strong></label>
        <input type="number" class="form-control" id="group_min_asistencia" name="group_min_asistencia" value="{{ $group->group_min_asistencia }}">
        <span class="alert-danger">{{$errors->first('group_min_asistencia')}}</span>
      </div>



      <div class="form-group col-md-12">
        <label for="group_documentation"><strong>Enlace de la documentación:</strong></label>
        <input type="text" class="form-control" id="group_documentation" name="group_documentation" value="{{ $group->group_documentation }}">
        <span class="alert-danger">{{$errors->first('group_documentation')}}</span>
      </div>

    </div>

    <a href="{{url('admin/groups/lista')}}" type="button" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
  </form>
</div>


<style type="text/css">
  label{
    font-weight: 800;
  }
</style>
@endsection
