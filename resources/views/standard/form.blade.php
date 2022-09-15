@extends('layouts.adminapp')
@section('content')

<div class="container">
   
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('admin/estandar/lista') }}">Lista estándares</a></li>
      <li class="breadcrumb-item active">Nuevo estándar</li>
    </ol>
  </nav>
  <form method="POST" action="{{url('admin/estandar/guardar')}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
     <div class="form-row">

      <div class="form-group col-md-12">
        <label for="name"><strong>Nombre del estándar:</strong></label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Ejemplo: EC1331">
        <span class="alert-danger">{{$errors->first('name')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="shortname"><strong>Nombre público del estándar:</strong></label>
        <input type="text" class="form-control" id="shortname" name="shortname" value="{{ old('shortname') }}" placeholder="Ejemplo: EC1331 Condución del vehículo para su uso en la vialida">
        <span class="alert-danger">{{$errors->first('shortname')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="sector"><strong>Sector:</strong></label>
        <select id="sector" class="form-control" name="sector" >

          <option value="">Seleccionar</option>
          <option {{ old('sector') == 'Indefinido' ? 'selected' : '' }} value="Indefinido">Indefinido</option>
          <option {{ old('sector') == 'Tecnologías de la Información' ? 'selected' : '' }} value="Tecnologías de la Información">Tecnologías de la Información</option>
          <option {{ old('sector') == 'Servicios Profesionales y Técnicos' ? 'selected' : '' }} value="Servicios Profesionales y Técnicos">Servicios Profesionales y Técnicos</option>
          <option {{ old('sector') == 'Agrícola y Pecuario' ? 'selected' : '' }} value="Agrícola y Pecuario">Agrícola y Pecuario</option>
          <option {{ old('sector') == 'Financiero' ? 'selected' : '' }} value="Financiero">Financiero</option>
          <option {{ old('sector') == 'Transporte' ? 'selected' : '' }} value="Transporte">Transporte</option>
          <option {{ old('sector') == 'Deportivo' ? 'selected' : '' }} value="Deportivo">Deportivo</option>
          <option {{ old('sector') == 'Laboral' ? 'selected' : '' }} value="Laboral">Laboral</option>
          <option {{ old('sector') == 'Sociedades Cooperativas' ? 'selected' : '' }} value="Sociedades Cooperativas">Sociedades Cooperativas</option>
          <option {{ old('sector') == 'Construcción' ? 'selected' : '' }} value="Construcción">Construcción</option>
          <option {{ old('sector') == 'Turismo' ? 'selected' : '' }} value="Turismo">Turismo</option>
          <option {{ old('sector') == 'Comercio' ? 'selected' : '' }} value="Comercio">Comercio</option>
          <option {{ old('sector') == 'Logística' ? 'selected' : '' }} value="Logística">Logística</option>
          <option {{ old('sector') == 'Energía Eléctrica'? 'selected' : '' }} value="Energía Eléctrica">Energía Eléctrica</option>
          <option {{ old('sector') == 'Automotriz' ? 'selected' : '' }} value="Automotriz">Automotriz</option>
          <option {{ old('sector') == 'Procesamiento de Alimentos' ? 'selected' : '' }} value="Procesamiento de Alimentos">Procesamiento de Alimentos</option>
          <option {{ old('sector') == 'Telecomunicaciones' ? 'selected' : '' }} value="Telecomunicaciones">Telecomunicaciones</option>
          <option {{ old('sector') == 'Administración Pública' ? 'selected' : '' }} value="Administración Pública">Administración Pública</option>
          <option {{ old('sector') == 'Educación y Formación de Personas' ? 'selected' : '' }} value="Educación y Formación de Personas">Educación y Formación de Personas</option>
          <option {{ old('sector') == 'Social' ? 'selected' : '' }} value="Social">Social</option>
          <option {{ old('sector') == 'Funciones del Sistema Nacional de Competencias' ? 'selected' : '' }} value="Funciones del Sistema Nacional de Competencias">Funciones del Sistema Nacional de Competencias</option>
          <option {{ old('sector') == 'Agua' ? 'selected' : '' }} value="Agua">Agua</option>
          <option {{ old('sector') == 'Seguridad Pública' ? 'selected' : '' }} value="Seguridad Pública">Seguridad Pública</option>
          <option {{ old('sector') == 'Petróleo y Gas' ? 'selected' : '' }} value="Petróleo y Gas">Petróleo y Gas</option>
          <option {{ old('sector') == 'Cultural' ? 'selected' : '' }} value="Cultural">Cultural</option>
          <option {{ old('sector') == 'Minería' ? 'selected' : '' }} value="Minería">Minería</option>
          <option {{ old('sector') == 'Comercio Exterior' ? 'selected' : '' }} value="Comercio Exterior">Comercio Exterior</option>
          <option {{ old('sector') == 'Maquilas y Manufactura' ? 'selected' : '' }} value="Maquilas y Manufactura">Maquilas y Manufactura</option>
          <option {{ old('sector') == 'Químico' ? 'selected' : '' }} value="Químico">Químico</option>
          <option {{ old('sector') == 'Prendas de Vestir, Textil, Cuero y Calzado' ? 'selected' : '' }} value="Prendas de Vestir, Textil, Cuero y Calzado">Prendas de Vestir, Textil, Cuero y Calzado</option>
          <option {{ old('sector') == 'Seguridad Nacional' ? 'selected' : '' }} value="Seguridad Nacional">Seguridad Nacional</option>
        </select>
        <span class="alert-danger">{{$errors->first('sector')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="type"><strong>Tipo:</strong></label>
        <select class="form-control" id="type" name="type" value="{{ old('type') }}">
            <option value="">Seleccionar</option>
            <option {{ old('type') == 'Curso y Certificación' ? 'selected' : '' }} value="Curso y Certificación">Curso y Certificación</option>
            <option {{ old('type') == 'Certificación' ? 'selected' : '' }} value="Certificación">Certificación</option>
            <option {{ old('type') == 'Curso sin estándar' ? 'selected' : '' }} value="Curso sin estándar">Curso sin estándar</option>
        </select>
        <span class="alert-danger">{{$errors->first('type')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="description"><strong>Descripción:</strong></label>
        <textarea type="text" class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        <span class="alert-danger">{{$errors->first('description')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="diagnostico"><strong>Enlace de examen diagnóstico:</strong></label>
        <input type="text" class="form-control" id="diagnostico" name="diagnostico"  value="{{ old('diagnostico') }}">
        <span class="alert-danger">{{$errors->first('diagnostico')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="image"><strong>Imagen:</strong></label>
        <input type="file" class="form-control" id="image" name="image"  value="{{ old('image') }}">
        <span class="alert-danger">{{$errors->first('image')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="cert_place"><strong>Sede de evaluación:</strong></label>
        <input type="text" class="form-control" id="cert_place" name="cert_place" value="{{ old('cert_place') }}">
        <span class="alert-danger">{{$errors->first('cert_place')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="link"><strong>Enlace de información completa del estadar:</strong></label>
        <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}">
        <span class="alert-danger">{{$errors->first('link')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="documentation"><strong>Documentación del estadar:</strong></label>
        <input type="text" class="form-control" id="documentation" name="documentation" value="{{ old('documentation') }}">
        <span class="alert-danger">{{$errors->first('documentation')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="p_evaluation"><strong>Plan de evaluación:</strong></label>
        <input type="text" class="form-control" id="p_evaluation" name="p_evaluation" value="{{ old('p_evaluation') }}" placeholder="Enlace del documento">
        <span class="alert-danger">{{$errors->first('p_evaluation')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="cert_material"><strong>Material requerido para evaluación:</strong></label>
        <textarea type="text" class="form-control" id="cert_material" name="cert_material">{{ old('cert_material') }}</textarea>
        <span class="alert-danger">{{$errors->first('cert_material')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="deliverables"><strong>Lista de entregables:</strong></label>
        <textarea type="text" class="form-control" id="deliverables" name="deliverables">{{ old('deliverables') }}</textarea>
        <span class="alert-danger">{{$errors->first('deliverables')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="cert_grade"><strong>Requisitos de acreditación mínima:</strong></label>
        <input type="text" class="form-control" id="cert_grade" name="cert_grade" value="{{ old('cert_grade') }}">
        <span class="alert-danger">{{$errors->first('cert_grade')}}</span>
      </div>

      

    </div>
    <hr>
    
    <a href="{{url('admin/estandar/lista')}}" type="button" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
  </form>
</div>

@endsection
