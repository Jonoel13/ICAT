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
        <label for="sector"><strong>Sector:</strong></label>
        <select id="sector" class="form-control" name="sector" required="required">

          <option value="">Seleccionar</option>
          <option {{ $standard->sector == 'Indefinido' ? 'selected' : '' }} value="Indefinido">Indefinido</option>
          <option {{ $standard->sector == 'Tecnologías de la Información' ? 'selected' : '' }} value="Tecnologías de la Información">Tecnologías de la Información</option>
          <option {{ $standard->sector == 'Servicios Profesionales y Técnicos' ? 'selected' : '' }} value="Servicios Profesionales y Técnicos">Servicios Profesionales y Técnicos</option>
          <option {{ $standard->sector == 'Agrícola y Pecuario' ? 'selected' : '' }} value="Agrícola y Pecuario">Agrícola y Pecuario</option>
          <option {{ $standard->sector == 'Financiero' ? 'selected' : '' }} value="Financiero">Financiero</option>
          <option {{ $standard->sector == 'Transporte' ? 'selected' : '' }} value="Transporte">Transporte</option>
          <option {{ $standard->sector == 'Deportivo' ? 'selected' : '' }} value="Deportivo">Deportivo</option>
          <option {{ $standard->sector == 'Laboral' ? 'selected' : '' }} value="Laboral">Laboral</option>
          <option {{ $standard->sector == 'Sociedades Cooperativas' ? 'selected' : '' }} value="Sociedades Cooperativas">Sociedades Cooperativas</option>
          <option {{ $standard->sector == 'Construcción' ? 'selected' : '' }} value="Construcción">Construcción</option>
          <option {{ $standard->sector == 'Turismo' ? 'selected' : '' }} value="Turismo">Turismo</option>
          <option {{ $standard->sector == 'Comercio' ? 'selected' : '' }} value="Comercio">Comercio</option>
          <option {{ $standard->sector == 'Logística' ? 'selected' : '' }} value="Logística">Logística</option>
          <option {{ $standard->sector == 'Energía Eléctrica' ? 'selected' : '' }} value="Energía Eléctrica">Energía Eléctrica</option>
          <option {{ $standard->sector == 'Automotriz' ? 'selected' : '' }} value="Automotriz">Automotriz</option>
          <option {{ $standard->sector == 'Procesamiento de Alimentos' ? 'selected' : '' }} value="Procesamiento de Alimentos">Procesamiento de Alimentos</option>
          <option {{ $standard->sector == 'Telecomunicaciones' ? 'selected' : '' }} value="Telecomunicaciones">Telecomunicaciones</option>
          <option {{ $standard->sector == 'Administración Pública' ? 'selected' : '' }} value="Administración Pública">Administración Pública</option>
          <option {{ $standard->sector == 'Educación y Formación de Personas' ? 'selected' : '' }} value="Educación y Formación de Personas">Educación y Formación de Personas</option>
          <option {{ $standard->sector == 'Social' ? 'selected' : '' }} value="Social">Social</option>
          <option {{ $standard->sector == 'Funciones del Sistema Nacional de Competencias' ? 'selected' : '' }} value="Funciones del Sistema Nacional de Competencias">Funciones del Sistema Nacional de Competencias</option>
          <option {{ $standard->sector == 'Agua' ? 'selected' : '' }} value="Agua">Agua</option>
          <option {{ $standard->sector == 'Seguridad Pública' ? 'selected' : '' }} value="Seguridad Pública">Seguridad Pública</option>
          <option {{ $standard->sector == 'Petróleo y Gas' ? 'selected' : '' }} value="Petróleo y Gas">Petróleo y Gas</option>
          <option {{ $standard->sector == 'Cultural' ? 'selected' : '' }} value="Cultural">Cultural</option>
          <option {{ $standard->sector == 'Minería' ? 'selected' : '' }} value="Minería">Minería</option>
          <option {{ $standard->sector == 'Comercio Exterior' ? 'selected' : '' }} value="Comercio Exterior">Comercio Exterior</option>
          <option {{ $standard->sector == 'Maquilas y Manufactura' ? 'selected' : '' }} value="Maquilas y Manufactura">Maquilas y Manufactura</option>
          <option {{ $standard->sector == 'Químico' ? 'selected' : '' }} value="Químico">Químico</option>
          <option {{ $standard->sector == 'Prendas de Vestir, Textil, Cuero y Calzado' ? 'selected' : '' }} value="Prendas de Vestir, Textil, Cuero y Calzado">Prendas de Vestir, Textil, Cuero y Calzado</option>
          <option {{ $standard->sector == 'Seguridad Nacional' ? 'selected' : '' }} value="Seguridad Nacional">Seguridad Nacional</option>
        </select>
        <span class="alert-danger">{{$errors->first('sector')}}</span>
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

      <div class="form-group col-md-12">
        <label for="diagnostico"><strong>Enlace de examen diagnóstico:</strong></label>
        <input type="text" class="form-control" id="diagnostico" name="diagnostico"  value="{{ $standard->diagnostico }}">
        <span class="alert-danger">{{$errors->first('diagnostico')}}</span>
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
