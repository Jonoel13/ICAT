@extends('base')
@section('content')

<div class="row col-md-11 offset-md-1 mb-5">
  <h2>Estándar de competencias</h2>
  <form method="POST" action="{{url('admin/estandar/guardar')}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
     <div class="form-row">

      <div class="form-group col-md-12">
        <label for="name"><strong>Nombre del estándar:</strong></label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        <span class="alert-danger">{{$errors->first('name')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="shortname"><strong>Nombre corto del estándar:</strong></label>
        <input type="text" class="form-control" id="shortname" name="shortname" value="{{ old('shortname') }}">
        <span class="alert-danger">{{$errors->first('shortname')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="type"><strong>Tipo:</strong></label>
        <select class="form-control" id="type" name="type" value="{{ old('type') }}">
            <option>Seleccionar</option>
            <option value="Curso y Certificación">Curso y Certificación</option>
            <option value="Certificación">Certificación</option>
            <option value="Curso sin estándar">Curso sin estándar</option>
        </select>
        <span class="alert-danger">{{$errors->first('type')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="description"><strong>Descripción:</strong></label>
        <textarea type="text" class="form-control" id="description" name="description" value="{{ old('description') }}"></textarea>
        <span class="alert-danger">{{$errors->first('description')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="cert_place"><strong>Sede de evaluación:</strong></label>
        <input type="text" class="form-control" id="cert_place" name="cert_place" value="{{ old('cert_place') }}">
        <span class="alert-danger">{{$errors->first('cert_place')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="image"><strong>Imagen:</strong></label>
        <input type="file" class="form-control" id="image" name="image"  value="{{ old('image') }}">
        <span class="alert-danger">{{$errors->first('image')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="cert_material"><strong>Material requerido para evaluación:</strong></label>
        <textarea type="text" class="form-control" id="cert_material" name="cert_material" value="{{ old('cert_material') }}"></textarea>
        <span class="alert-danger">{{$errors->first('cert_material')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="cert_grade"><strong>Requisitos de acreditación mínima:</strong></label>
        <input type="text" class="form-control" id="cert_grade" name="cert_grade" value="{{ old('cert_grade') }}">
        <span class="alert-danger">{{$errors->first('cert_grade')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="documentation"><strong>Documentación del estadar:</strong></label>
        <input type="text" class="form-control" id="documentation" name="documentation" value="{{ old('documentation') }}">
        <span class="alert-danger">{{$errors->first('documentation')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="link"><strong>Enlace de información completa del estadar:</strong></label>
        <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}">
        <span class="alert-danger">{{$errors->first('link')}}</span>
      </div>

    </div>
    
    <a href="{{url('admin/estandar/lista')}}" type="button" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
  </form>
</div>

@endsection
