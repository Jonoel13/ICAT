@extends('base')
@section('content')
<div class="row col-md-12">

  <form method="POST" action="{{url('usuario/actualizar')}}/{{$profile->id}}" autocomplete="off" enctype="multipart/form-data">
     <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <h4 style="font-weight: 600 !important;">Ficha de Registro de Personas para Proceso de Evaluación con fines a la Certificación</h4>
    <hr>

    <br>
    <h4 class="text-b">Datos personales</h4>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="user_nombre">Nombre/s:</label>
        <input type="text" class="form-control" id="user_nombre" name="user_nombre" required="required" value="{{ $profile->user_nombre }}">
        <span class="alert-danger">{{$errors->first('user_nombre')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="user_app">Apellido paterno:</label>
        <input type="text" class="form-control" id="user_app" name="user_app" required="required" value="{{ $profile->user_app }}">
        <span class="alert-danger">{{$errors->first('user_app')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="user_apm">Apellido materno:</label>
        <input type="text" class="form-control" id="user_apm" name="user_apm" required="required" value="{{ $profile->user_apm }}">
        <span class="alert-danger">{{$errors->first('user_apm')}}</span>
      </div>
    </div>

    <div class="form-row">
      @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
      <div class="form-group col-md-4">
        <label for="user_curp">CURP:</label>
        <input type="text" class="form-control" id="user_curp" name="user_curp" required="required" value="{{ $profile->user_curp }}">
        <span class="alert-danger">{{$errors->first('user_curp')}}</span>
      </div>
      @else
      <div class="form-group col-md-4">
        <label for="user_curp">CURP:</label>
        <input type="text" class="form-control" id="user_curp" name="user_curp" required="required" value="{{ $profile->user_curp }}" readonly>
        <span class="alert-danger">{{$errors->first('user_curp')}}</span>
      </div>
      @endif

      <div class="form-group col-md-4">
        <label for="user_edad">Edad:</label>
        <input type="number" class="form-control" id="user_edad" name="user_edad" required="required" value="{{ $profile->user_edad }}">
        <span class="alert-danger">{{$errors->first('user_edad')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="user_sexo">Sexo: </label>
        <select id="user_sexo" class="form-control" name="user_sexo" required="required" value="{{ old('user_sexo') }}">
          <option value="">Seleccionar</option>
          <option value="Mujer"    {{ $profile->user_sexo  == 'Mujer' ? 'selected' : '' }}>Mujer</option>
          <option value="Hombre"  {{ $profile->user_sexo  == 'Hombre' ? 'selected' : '' }}>Hombre</option>
        </select>
        <span class="alert-danger">{{$errors->first('user_sexo')}}</span>
      </div>
    </div>

    <!-- Datos de domicilio -->
    <br>
    <h4 class="text-b">Domicilio particular</h4>
    <hr>
    <div class="form-row">

      <div class="form-group col-md-4">
        <label for="user_cp">Código postal:</label>
        <input type="text" class="form-control" id="user_cp" name="user_cp" required="required" value="{{ $profile->user_cp }}">
        <span class="alert-danger">{{$errors->first('user_cp')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="user_calle">Calle y número:</label>
        <input type="text" class="form-control" id="user_calle" name="user_calle" required="required" value="{{ $profile->user_calle }}">
        <span class="alert-danger">{{$errors->first('user_calle')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="user_colonia">Colonia o localidad:</label>
        <input type="text" class="form-control" id="user_colonia" name="user_colonia" required="required" value="{{ $profile->user_colonia }}">
        <span class="alert-danger">{{$errors->first('user_colonia')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="user_alcaldia">Alcaldía o municipio:</label>
        <input type="text" class="form-control" id="user_alcaldia" name="user_alcaldia" required="required" value="{{ $profile->user_alcaldia }}">
        <span class="alert-danger">{{$errors->first('user_alcaldia')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="user_estado">Estado:</label>
        <input type="text" class="form-control" id="user_estado" name="user_estado" required="required" value="{{ $profile->user_estado }}">
        <span class="alert-danger">{{$errors->first('user_estado')}}</span>
      </div>

    </div>

    <!-- Datos de contacto -->
    <br>
    <h4 class="text-b">Datos de contacto</h4>
    <hr>
    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="user_telefono">Teléfono móvil / Particular :</label>
        <input type="tel" class="form-control" id="user_telefono" name="user_telefono" required="required" value="{{ $profile->user_telefono }}">
        <span class="alert-danger">{{$errors->first('user_telefono')}}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="user_email">Correo electrónico:</label>
        
        @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
        <input type="email" class="form-control" id="user_email" name="user_email" required="required" value="{{ $profile->user_email }}">
        @else
        <input type="email" class="form-control" id="user_email" name="user_email"  value="{{ $profile->user_email }}" readonly>
        @endif
        <span class="alert-danger">{{$errors->first('user_email')}}</span>
      </div>
    </div>
    <!-- Datos Formación Académica -->
    <br>
    <h4 class="text-b">Formación académica</h4>
    <hr>
    <div class="form-row">
        <table class="table table-striped col-lg-6 col-md-12 col-sm-12">
          <thead>
              <tr>
                  <th>
                      Último grado de estudios
                  </th>
                  <th >
                      Concluida
                  </th>
                  <th>
                      Trunca
                  </th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>
                      Primaria
                  </td>
                  <td >
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Pimaria Concluida" {{$profile->user_academico == "Pimaria Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td >
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Pimaria Trunca" {{$profile->user_academico == "Pimaria Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Secundaria
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Secundaria Concluida" {{$profile->user_academico == "Secundaria Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Secundaria Trunca" {{$profile->user_academico == "Secundaria Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Estudios Técnicos
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Estudios Técnicos Concluida" {{ $profile->user_academico == "Estudios Técnicos Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Estudios Técnicos Trunca" {{$profile->user_academico== "Estudios Técnicos Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Bachillerato
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Bachillerato Concluida" {{$profile->user_academico == "Bachillerato Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Bachillerato Trunca" {{$profile->user_academico == "Bachillerato Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Licenciatura
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Licenciatura Concluida" {{$profile->user_academico== "Licenciatura Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Licenciatura Trunca" {{$profile->user_academico == "Licenciatura Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Maestría
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Maestría Concluida" {{$profile->user_academico == "Maestría Concluida" ? "checked" : ""}} >
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Maestría Trunca" {{ $profile->user_academico == "Maestría Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Doctorado
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Doctorado Concluida" {{$profile->user_academico == "Doctorado Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Doctorado Trunca" {{$profile->user_academico == "Doctorado Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Posgrado
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Posgrado Concluida" {{$profile->user_academico == "Posgrado Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_academico" value="Posgrado Trunca" {{$profile->user_academico == "Posgrado Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>

          </tbody>
        </table>
        <span class="alert-danger">{{$errors->first('user_academico')}}</span>
    </div>

    <br><br>
    <h4 class="text-b">Información laboral</h4>
    <hr>
    <div class="form-row">
            <p>Favor de marcar de acuerdo a su experiencia o en el ámbito en el que se desempeña</p>

      <div class="form-group col-md-12">
        <label for="user_laboral">Sector Productivo de Trabajo: </label>
        <select id="user_laboral" class="form-control" name="user_productivo" required="required" value="{{$profile->user_productivo}}">

          <option value="">Seleccionar</option>
          <option {{ $profile->user_productivo == 'Indefinido' ? 'selected' : '' }} value="Indefinido">Indefinido</option>
          <option {{ $profile->user_productivo == 'Tecnologías de la Información' ? 'selected' : '' }} value="Tecnologías de la Información">Tecnologías de la Información</option>
          <option {{ $profile->user_productivo == 'Servicios Profesionales y Técnicos' ? 'selected' : '' }} value="Servicios Profesionales y Técnicos">Servicios Profesionales y Técnicos</option>
          <option {{ $profile->user_productivo == 'Agrícola y Pecuario' ? 'selected' : '' }} value="Agrícola y Pecuario">Agrícola y Pecuario</option>
          <option {{ $profile->user_productivo == 'Financiero' ? 'selected' : '' }} value="Financiero">Financiero</option>
          <option {{ $profile->user_productivo == 'Transporte' ? 'selected' : '' }} value="Transporte">Transporte</option>
          <option {{ $profile->user_productivo == 'Deportivo' ? 'selected' : '' }} value="Deportivo">Deportivo</option>
          <option {{ $profile->user_productivo == 'Laboral' ? 'selected' : '' }} value="Laboral">Laboral</option>
          <option {{ $profile->user_productivo == 'Sociedades Cooperativas' ? 'selected' : '' }} value="Sociedades Cooperativas">Sociedades Cooperativas</option>
          <option {{ $profile->user_productivo == 'Construcción' ? 'selected' : '' }} value="Construcción">Construcción</option>
          <option {{ $profile->user_productivo == 'Turismo' ? 'selected' : '' }} value="Turismo">Turismo</option>
          <option {{ $profile->user_productivo == 'Comercio' ? 'selected' : '' }} value="Comercio">Comercio</option>
          <option {{ $profile->user_productivo == 'Logística' ? 'selected' : '' }} value="Logística">Logística</option>
          <option {{ $profile->user_productivo == 'Energía Eléctrica' ? 'selected' : '' }} value="Energía Eléctrica">Energía Eléctrica</option>
          <option {{ $profile->user_productivo == 'Automotriz' ? 'selected' : '' }} value="Automotriz">Automotriz</option>
          <option {{ $profile->user_productivo == 'Procesamiento de Alimentos' ? 'selected' : '' }} value="Procesamiento de Alimentos">Procesamiento de Alimentos</option>
          <option {{ $profile->user_productivo == 'Telecomunicaciones' ? 'selected' : '' }} value="Telecomunicaciones">Telecomunicaciones</option>
          <option {{ $profile->user_productivo == 'Administración Pública' ? 'selected' : '' }} value="Administración Pública">Administración Pública</option>
          <option {{ $profile->user_productivo == 'Educación y Formación de Personas' ? 'selected' : '' }} value="Educación y Formación de Personas">Educación y Formación de Personas</option>
          <option {{ $profile->user_productivo == 'Social' ? 'selected' : '' }} value="Social">Social</option>
          <option {{ $profile->user_productivo == 'Funciones del Sistema Nacional de Competencias' ? 'selected' : '' }} value="Funciones del Sistema Nacional de Competencias">Funciones del Sistema Nacional de Competencias</option>
          <option {{ $profile->user_productivo == 'Agua' ? 'selected' : '' }} value="Agua">Agua</option>
          <option {{ $profile->user_productivo == 'Seguridad Pública' ? 'selected' : '' }} value="Seguridad Pública">Seguridad Pública</option>
          <option {{ $profile->user_productivo == 'Petróleo y Gas' ? 'selected' : '' }} value="Petróleo y Gas">Petróleo y Gas</option>
          <option {{ $profile->user_productivo == 'Cultural' ? 'selected' : '' }} value="Cultural">Cultural</option>
          <option {{ $profile->user_productivo == 'Minería' ? 'selected' : '' }} value="Minería">Minería</option>
          <option {{ $profile->user_productivo == 'Comercio Exterior' ? 'selected' : '' }} value="Comercio Exterior">Comercio Exterior</option>
          <option {{ $profile->user_productivo == 'Maquilas y Manufactura' ? 'selected' : '' }} value="Maquilas y Manufactura">Maquilas y Manufactura</option>
          <option {{ $profile->user_productivo == 'Químico' ? 'selected' : '' }} value="Químico">Químico</option>
          <option {{ $profile->user_productivo == 'Prendas de Vestir, Textil, Cuero y Calzado' ? 'selected' : '' }} value="Prendas de Vestir, Textil, Cuero y Calzado">Prendas de Vestir, Textil, Cuero y Calzado</option>
          <option {{ $profile->user_productivo == 'Seguridad Nacional' ? 'selected' : '' }} value="Seguridad Nacional">Seguridad Nacional</option>
        </select>
        <span class="alert-danger">{{$errors->first('user_productivo')}}</span>
      </div>

    </div>

    <!-- Datos de acuerdo con su cultura -->
    <br>
    <h4 class="text-b">Datos de inclusión</h4>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="user_indigena">De acuerdo con su cultura. ¿Se considera indígena? </label>
        <select id="user_indigena" class="form-control" name="user_indigena" required="required" value="{{ $profile->user_indigena }}">
          <option value="">Seleccionar</option>
          <option {{ $profile->user_indigena == 'Sí' ? 'selected' : '' }} value="Sí">Sí</option>
          <option {{ $profile->user_indigena == 'Sí en parte' ? 'selected' : '' }} value="Sí en parte">Sí en parte</option>
          <option {{ $profile->user_indigena == 'No' ? 'selected' : '' }} value="No">No</option>
          <option {{ $profile->user_indigena == 'No se' ? 'selected' : '' }} value="No se">No se</option>
        </select>
        <span class="alert-danger">{{$errors->first('user_indigena')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="user_lengua">¿Habla lengua indígena? </label>
        <select id="user_lengua" class="form-control" name="user_lengua" required="required" value="{{ $profile->user_lengua }}">
          <option value="">Seleccionar</option>
          <option {{ $profile->user_lengua == 'Sí' ? 'selected' : '' }} value="Sí">Sí</option>
          <option {{ $profile->user_lengua == 'No' ? 'selected' : '' }} value="No">No</option>
        </select>
        <span class="alert-danger">{{$errors->first('user_lengua')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="user_leng_indigena">¿Habla lengua indígena?(Puede utilizar la respuesta: No Aplica)  </label>
        <input type="text" class="form-control" id="user_leng_indigena" name="user_leng_indigena" value="{{ $profile->user_leng_indigena }}">
        <span class="alert-danger">{{$errors->first('user_leng_indigena')}}</span>
      </div>

    </div>

    <!-- Datos Documentos-->
    <br>
    <h4 class="text-b">Documentos</h4>
    <hr>
    <div class="form-row">
        <div class="col-md-12">
            <label>CURP:</label>
            <a href="{{url('public/file/curp')}}/{{$profile->user_doc_curp}}" target="_blank">{{$profile->user_doc_curp}}</a>
        </div>
        <div class="col-md-12">
            <label for="user_doc_curp">Actualizar CURP:</label>
            <input type="file" class="form-control" id="user_doc_curp" name="user_doc_curp" placeholder="" value="{{ $profile->user_doc_curp }}">
            <span class="alert-danger">{{$errors->first('user_doc_curp')}}</span>
        </div>
    </div>
    <hr>
    <br><br>
    <div class="form-row">
        <div class="col-md-12">
            <label>Identificación oficial con fotografía:</label> <a href="{{url('public/file/id')}}/{{$profile->user_doc_id}}" target="_blank">{{$profile->user_doc_id}}</a>
        </div>
        <div class="col-md-12">
            <label for="user_doc_id">Actualizar identificación oficial con fotografía (INE, Cédula Profesional o Pasaporte)</label>
            <input type="file" class="form-control" id="user_doc_id" name="user_doc_id" placeholder="" value="">
            <span class="alert-danger">{{$errors->first('user_doc_id')}}</span>
        </div>
            
    </div>
    <hr><br><br>
    <div class="form-row">
        <div class="col-md-2"> 
            <img class="img-responsive" src="{{url('public/file/photo')}}/{{$profile->user_doc_foto}}" height="120" width="120">
        </div>
        <div class="form-group col-md-10">
            <label for="user_doc_foto">Actualizar Fotografía:</label>
            <input type="file" class="form-control" id="user_doc_foto" name="user_doc_foto" placeholder="" value="">
            <span class="alert-danger">{{$errors->first('user_doc_foto')}}</span>

            <p>
              <br>
              El Certificado del CONOCER, es un documento oficial expedido por la autoridad educativa del gobierno federal, que reconoce las competencias de las personas. Cuenta con un formato institucional y diversas medidas de seguridad, cuidando que la calidad del documento se cumpla en todos sus aspectos; por ello es de suma importancia que la fotografía cuente con las siguientes especificaciones para evitar rechazos.
            </p>
            <p class="text-center">
              <img class="img-responsive col-md-6" src="https://drive.google.com/uc?export=view&id=1sTmDrkDOAxoU0H5JVtqWSt2_t18gDpYX">
            </p>
        </div>
    </div>
    <hr>
    <a href="{{url('usuario/perfil')}}/{{$profile->user_curp}}" type="button" class="btn btn-default btn-lg">Cancelar</a>
    <button type="submit" class="btn btn-success btn-lg" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Enviar</button>

  </form>
</div>

<style type="text/css">
  label{
    font-weight: 600;
  }
  form{
    margin-bottom: 60px;
  }
</style>

@endsection
