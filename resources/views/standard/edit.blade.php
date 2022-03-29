@extends('layouts.adminapp')
@section('content')

<div class="container">
  <h1>Estándar de competencias</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('admin/estandar/lista') }}">Lista estándares</a></li>
      <li class="breadcrumb-item active">{{ $standard->name }}</li>
    </ol>
  </nav>
  <form method="POST" action="{{url('admin/estandar/update')}}/{{$standard->id}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
     <div class="form-row">

      <div class="form-row">
        <div class="col-md-12">
            <label>Imagen:</label><br>
            <!--img class="img-responsive" src="{{url('public/file/standard')}}/{{$standard->image}}" height="120" width="120"-->
            <img class="img-responsive" src="{{ asset ('storage/standard/'. $standard->image)}}" type="application/pdf" width="300px" height="100%" />
        </div>
        <div class="col-md-12">
            <label for="image">Actualizar Imagen:</label>
            <input type="file" class="form-control" id="image" name="image"  value="">
            <span class="alert-danger">{{$errors->first('image')}}</span>
        </div>
    </div>

      <div class="form-group col-md-12">
        <label for="name"><strong>Nombre del estándar:</strong></label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $standard->name }}">
        <span class="alert-danger">{{$errors->first('name')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="shortname"><strong>Nombre corto del estándar:</strong></label>
        <input type="text" class="form-control" id="shortname" name="shortname" value="{{ $standard->shortname }}">
        <span class="alert-danger">{{$errors->first('shortname')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="type"><strong>Tipo:</strong></label>
        <select class="form-control" id="type" name="type" value="{{ $standard->type }}">
            <option>Seleccionar</option>
            <option value="Curso y Certificación" {{ $standard->type  == 'Curso y Certificación' ? 'selected' : '' }}>Curso y Certificación</option>
            <option value="Certificación" {{ $standard->type  == 'Certificación' ? 'selected' : '' }}>Certificación</option>
            <option value="Curso sin estándar" {{ $standard->type  == 'Curso sin estándar' ? 'selected' : '' }}>Curso sin estándar</option>
        </select>
        <span class="alert-danger">{{$errors->first('type')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="description"><strong>Descripción:</strong></label>
        <textarea type="text" class="form-control" id="description" name="description">{{ $standard->description }}</textarea>
        <span class="alert-danger">{{$errors->first('description')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="cert_place"><strong>Sede de evaluación:</strong></label>
        <input type="text" class="form-control" id="cert_place" name="cert_place" value="{{ $standard->cert_place }}">
        <span class="alert-danger">{{$errors->first('cert_place')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="cert_material"><strong>Material requerido para evaluación:</strong></label>
        <textarea type="text" class="form-control" id="cert_material" name="cert_material">{{ $standard->cert_material }}</textarea>
        <span class="alert-danger">{{$errors->first('cert_material')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="cert_grade"><strong>Requisitos de acreditación:</strong></label>
        <input type="text" class="form-control" id="cert_grade" name="cert_grade" value="{{ $standard->cert_grade }}">
        <span class="alert-danger">{{$errors->first('cert_grade')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="documentation"><strong>Documentación del estadar:</strong></label>
        <input type="text" class="form-control" id="documentation" name="documentation" value="{{ $standard->documentation }}">
        <span class="alert-danger">{{$errors->first('documentation')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="link"><strong>Enlace de información completa del estadar:</strong></label>
        <input type="text" class="form-control" id="link" name="link" value="{{ $standard->link }}">
        <span class="alert-danger">{{$errors->first('link')}}</span>
      </div>

    </div>
    
    <a href="{{url('admin/estandar/lista')}}" type="button" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
  </form>
</div>

@endsection
