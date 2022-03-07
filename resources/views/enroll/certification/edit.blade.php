@extends('base')
@section('content')
<div class="row col-md-12">

  <form method="POST" action="{{url('registro/guardar')}}" autocomplete="off">
     <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <h4 style="font-weight: 600 !important;">Ficha de Registro de Personas para Proceso de Evaluación con fines a la Certificación</h4>
    <hr>
    <div class="form-row">
      <!--div class="form-group col-md-6">
        <label for="">Nombre de curso:</label>
        <select id="user_estudios" class="form-control" name="user_estudios" required="required">
          <option >Seleccionar</option>

        </select>
      </div-->
    </div>

    <br>
    <h4 class="text-b">Datos personales</h4>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="enrol_user_nombre">Nombre/s:</label>
        <input type="text" class="form-control" id="enrol_user_nombre" name="enrol_user_nombre" required="required" value="{{ $enroll->enrol_user_nombre }}">
        <span class="alert-danger">{{$errors->first('enrol_user_nombre')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_app">Apellido paterno:</label>
        <input type="text" class="form-control" id="enrol_user_app" name="enrol_user_app" required="required" value="{{ $enroll->enrol_user_app }}">
        <span class="alert-danger">{{$errors->first('enrol_user_app')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_apm">Apellido materno:</label>
        <input type="text" class="form-control" id="enrol_user_apm" name="enrol_user_apm" required="required" value="{{ $enroll->enrol_user_apm }}">
        <span class="alert-danger">{{$errors->first('enrol_user_apm')}}</span>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="enrol_user_curp">CURP:</label>
        <input type="text" class="form-control" id="enrol_user_curp" name="enrol_user_curp" required="required" value="{{ $enroll->enrol_user_curp }}">
        <span class="alert-danger">{{$errors->first('enrol_user_curp')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_edad">Edad:</label>
        <input type="number" class="form-control" id="enrol_user_edad" name="enrol_user_edad" required="required" value="{{ $enroll->enrol_user_edad }}">
        <span class="alert-danger">{{$errors->first('enrol_user_edad')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_sexo">Sexo: </label>
        <select id="enrol_user_sexo" class="form-control" name="enrol_user_sexo" required="required" value="{{ old('enrol_user_sexo') }}">
          <option value="">Seleccionar</option>
          <option value="Mujer"    {{ $enroll->enrol_user_sexo  == 'Mujer' ? 'selected' : '' }}>Mujer</option>
          <option value="Hombre"  {{ $enroll->enrol_user_sexo  == 'Hombre' ? 'selected' : '' }}>Hombre</option>
        </select>
        <span class="alert-danger">{{$errors->first('enrol_user_sexo')}}</span>
      </div>
    </div>

    <!-- Datos de domicilio -->
    <br>
    <h4 class="text-b">Domicilio particular</h4>
    <hr>
    <div class="form-row">

      <div class="form-group col-md-4">
        <label for="enrol_user_cp">Código postal:</label>
        <input type="text" class="form-control" id="enrol_user_cp" name="enrol_user_cp" required="required" value="{{ $enroll->enrol_user_cp }}">
        <span class="alert-danger">{{$errors->first('enrol_user_cp')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_calle">Calle y número:</label>
        <input type="text" class="form-control" id="enrol_user_calle" name="enrol_user_calle" required="required" value="{{ $enroll->enrol_user_calle }}">
        <span class="alert-danger">{{$errors->first('enrol_user_calle')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_colonia">Colonia o localidad:</label>
        <input type="text" class="form-control" id="enrol_user_colonia" name="enrol_user_colonia" required="required" value="{{ $enroll->enrol_user_colonia }}">
        <span class="alert-danger">{{$errors->first('enrol_user_colonia')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_alcaldia">Alcaldía o municipio:</label>
        <input type="text" class="form-control" id="enrol_user_alcaldia" name="enrol_user_alcaldia" required="required" value="{{ $enroll->enrol_user_alcaldia }}">
        <span class="alert-danger">{{$errors->first('enrol_user_alcaldia')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_estado">Estado:</label>
        <input type="text" class="form-control" id="enrol_user_estado" name="enrol_user_estado" required="required" value="{{ $enroll->enrol_user_estado }}">
        <span class="alert-danger">{{$errors->first('enrol_user_estado')}}</span>
      </div>

    </div>

    <!-- Datos de contacto -->
    <br>
    <h4 class="text-b">Datos de contacto</h4>
    <hr>
    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="enrol_user_telefono">Teléfono móvil / Particular :</label>
        <input type="tel" class="form-control" id="enrol_user_telefono" name="enrol_user_telefono" required="required" value="{{ $enroll->enrol_user_telefono }}">
        <span class="alert-danger">{{$errors->first('enrol_user_telefono')}}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="enrol_user_email">Correo electrónico:</label>
        <input type="email" class="form-control" id="enrol_user_email" name="enrol_user_email" required="required" value="{{ $enroll->enrol_user_email }}">
        <span class="alert-danger">{{$errors->first('enrol_user_email')}}</span>
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
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Pimaria Concluida" {{$enroll->enrol_user_academico == "Pimaria Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td >
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Pimaria Trunca" {{$enroll->enrol_user_academico == "Pimaria Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Secundaria
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Secundaria Concluida" {{$enroll->enrol_user_academico == "Secundaria Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Secundaria Trunca" {{$enroll->enrol_user_academico == "Secundaria Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Estudios Técnicos
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Estudios Técnicos Concluida" {{ $enroll->enrol_user_academico == "Estudios Técnicos Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Estudios Técnicos Trunca" {{$enroll->enrol_user_academico== "Estudios Técnicos Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Bachillerato
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Bachillerato Concluida" {{$enroll->enrol_user_academico == "Bachillerato Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Bachillerato Trunca" {{$enroll->enrol_user_academico == "Bachillerato Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Licenciatura
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Licenciatura Concluida" {{$enroll->enrol_user_academico== "Licenciatura Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Licenciatura Trunca" {{$enroll->enrol_user_academico == "Licenciatura Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Maestría
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Maestría Concluida" {{$enroll->enrol_user_academico == "Maestría Concluida" ? "checked" : ""}} >
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Maestría Trunca" {{ $enroll->enrol_user_academico == "Maestría Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Doctorado
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Doctorado Concluida" {{$enroll->enrol_user_academico == "Doctorado Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Doctorado Trunca" {{$enroll->enrol_user_academico == "Doctorado Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Posgrado
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Posgrado Concluida" {{$enroll->enrol_user_academico == "Posgrado Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Posgrado Trunca" {{$enroll->enrol_user_academico == "Posgrado Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>

          </tbody>
        </table>
        <span class="alert-danger">{{$errors->first('enrol_user_academico')}}</span>
    </div>

    <br><br>
    <h4 class="text-b">Información laboral</h4>
    <hr>
    <div class="form-row">
            <p>Favor de marcar de acuerdo a su experiencia o en el ámbito en el que se desempeña</p>

      <div class="form-group col-md-12">
        <label for="user_laboral">Sector Productivo de Trabajo: </label>
        <select id="user_laboral" class="form-control" name="enrol_user_productivo" required="required" value="{{$enroll->enrol_user_productivo}}">

          <option value="">Seleccionar</option>
          <option {{ $enroll->enrol_user_productivo == 'Indefinido' ? 'selected' : '' }} value="Indefinido">Indefinido</option>
          <option {{ $enroll->enrol_user_productivo == 'Tecnologías de la Información' ? 'selected' : '' }} value="Tecnologías de la Información">Tecnologías de la Información</option>
          <option {{ $enroll->enrol_user_productivo == 'Servicios Profesionales y Técnicos' ? 'selected' : '' }} value="Servicios Profesionales y Técnicos">Servicios Profesionales y Técnicos</option>
          <option {{ $enroll->enrol_user_productivo == 'Agrícola y Pecuario' ? 'selected' : '' }} value="Agrícola y Pecuario">Agrícola y Pecuario</option>
          <option {{ $enroll->enrol_user_productivo == 'Financiero' ? 'selected' : '' }} value="Financiero">Financiero</option>
          <option {{ $enroll->enrol_user_productivo == 'Transporte' ? 'selected' : '' }} value="Transporte">Transporte</option>
          <option {{ $enroll->enrol_user_productivo == 'Deportivo' ? 'selected' : '' }} value="Deportivo">Deportivo</option>
          <option {{ $enroll->enrol_user_productivo == 'Laboral' ? 'selected' : '' }} value="Laboral">Laboral</option>
          <option {{ $enroll->enrol_user_productivo == 'Sociedades Cooperativas' ? 'selected' : '' }} value="Sociedades Cooperativas">Sociedades Cooperativas</option>
          <option {{ $enroll->enrol_user_productivo == 'Construcción' ? 'selected' : '' }} value="Construcción">Construcción</option>
          <option {{ $enroll->enrol_user_productivo == 'Turismo' ? 'selected' : '' }} value="Turismo">Turismo</option>
          <option {{ $enroll->enrol_user_productivo == 'Comercio' ? 'selected' : '' }} value="Comercio">Comercio</option>
          <option {{ $enroll->enrol_user_productivo == 'Logística' ? 'selected' : '' }} value="Logística">Logística</option>
          <option {{ $enroll->enrol_user_productivo == 'Energía Eléctrica' ? 'selected' : '' }} value="Energía Eléctrica">Energía Eléctrica</option>
          <option {{ $enroll->enrol_user_productivo == 'Automotriz' ? 'selected' : '' }} value="Automotriz">Automotriz</option>
          <option {{ $enroll->enrol_user_productivo == 'Procesamiento de Alimentos' ? 'selected' : '' }} value="Procesamiento de Alimentos">Procesamiento de Alimentos</option>
          <option {{ $enroll->enrol_user_productivo == 'Telecomunicaciones' ? 'selected' : '' }} value="Telecomunicaciones">Telecomunicaciones</option>
          <option {{ $enroll->enrol_user_productivo == 'Administración Pública' ? 'selected' : '' }} value="Administración Pública">Administración Pública</option>
          <option {{ $enroll->enrol_user_productivo == 'Educación y Formación de Personas' ? 'selected' : '' }} value="Educación y Formación de Personas">Educación y Formación de Personas</option>
          <option {{ $enroll->enrol_user_productivo == 'Social' ? 'selected' : '' }} value="Social">Social</option>
          <option {{ $enroll->enrol_user_productivo == 'Funciones del Sistema Nacional de Competencias' ? 'selected' : '' }} value="Funciones del Sistema Nacional de Competencias">Funciones del Sistema Nacional de Competencias</option>
          <option {{ $enroll->enrol_user_productivo == 'Agua' ? 'selected' : '' }} value="Agua">Agua</option>
          <option {{ $enroll->enrol_user_productivo == 'Seguridad Pública' ? 'selected' : '' }} value="Seguridad Pública">Seguridad Pública</option>
          <option {{ $enroll->enrol_user_productivo == 'Petróleo y Gas' ? 'selected' : '' }} value="Petróleo y Gas">Petróleo y Gas</option>
          <option {{ $enroll->enrol_user_productivo == 'Cultural' ? 'selected' : '' }} value="Cultural">Cultural</option>
          <option {{ $enroll->enrol_user_productivo == 'Minería' ? 'selected' : '' }} value="Minería">Minería</option>
          <option {{ $enroll->enrol_user_productivo == 'Comercio Exterior' ? 'selected' : '' }} value="Comercio Exterior">Comercio Exterior</option>
          <option {{ $enroll->enrol_user_productivo == 'Maquilas y Manufactura' ? 'selected' : '' }} value="Maquilas y Manufactura">Maquilas y Manufactura</option>
          <option {{ $enroll->enrol_user_productivo == 'Químico' ? 'selected' : '' }} value="Químico">Químico</option>
          <option {{ $enroll->enrol_user_productivo == 'Prendas de Vestir, Textil, Cuero y Calzado' ? 'selected' : '' }} value="Prendas de Vestir, Textil, Cuero y Calzado">Prendas de Vestir, Textil, Cuero y Calzado</option>
          <option {{ $enroll->enrol_user_productivo == 'Seguridad Nacional' ? 'selected' : '' }} value="Seguridad Nacional">Seguridad Nacional</option>
        </select>
        <span class="alert-danger">{{$errors->first('enrol_user_productivo')}}</span>
      </div>

    </div>

    <!-- Datos de acuerdo con su cultura -->
    <br>
    <h4 class="text-b">Datos de inclusión</h4>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="enrol_user_indigena">De acuerdo con su cultura. ¿Se considera indígena? </label>
        <select id="enrol_user_indigena" class="form-control" name="enrol_user_indigena" required="required" value="{{ $enroll->enrol_user_indigena }}">
          <option value="">Seleccionar</option>
          <option {{ $enroll->enrol_user_indigena == 'Sí' ? 'selected' : '' }} value="Sí">Sí</option>
          <option {{ $enroll->enrol_user_indigena == 'Sí en parte' ? 'selected' : '' }} value="Sí en parte">Sí en parte</option>
          <option {{ $enroll->enrol_user_indigena == 'No' ? 'selected' : '' }} value="No">No</option>
          <option {{ $enroll->enrol_user_indigena == 'No se' ? 'selected' : '' }} value="No se">No se</option>
        </select>
        <span class="alert-danger">{{$errors->first('enrol_user_indigena')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_lengua">¿Habla lengua indígena? </label>
        <select id="enrol_user_lengua" class="form-control" name="enrol_user_lengua" required="required" value="{{ $enroll->enrol_user_lengua }}">
          <option value="">Seleccionar</option>
          <option {{ $enroll->enrol_user_lengua == 'Sí' ? 'selected' : '' }} value="Sí">Sí</option>
          <option {{ $enroll->enrol_user_lengua == 'No' ? 'selected' : '' }} value="No">No</option>
        </select>
        <span class="alert-danger">{{$errors->first('enrol_user_lengua')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_leng_indigena">¿Qué lengua indígena habla? (Puede utilizar la respuesta: No Aplica)</label>
        <input type="text" class="form-control" id="enrol_user_leng_indigena" name="enrol_user_leng_indigena" value="{{ $enroll->enrol_user_leng_indigena }}">
        <span class="alert-danger">{{$errors->first('enrol_user_leng_indigena')}}</span>
      </div>

    </div>

    <!-- Datos Documentos-->
    <br>
    <h4 class="text-b">Documentos</h4>
    <hr>
    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="enrol_user_doc_curp">Carga de CURP</label>
        <input type="file" class="form-control" id="enrol_user_doc_curp" name="enrol_user_doc_curp" placeholder="" value="{{ $enroll->enrol_user_doc_curp }}">
        <span class="alert-danger">{{$errors->first('enrol_user_doc_curp')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="enrol_user_doc_id">Carga de Identificación Oficial con fotografía (INE, Cédula Profesional o Pasaporte)</label>
        <input type="file" class="form-control" id="enrol_user_doc_id" name="enrol_user_doc_id" placeholder="" value="{{ $enroll->enrol_user_doc_id }}">
        <span class="alert-danger">{{$errors->first('enrol_user_doc_id')}}</span>
      </div>

    </div>

    <div class="form-group">
      <br>
      <h4>Fotografía</h4>
      <hr>
      <div class="form-group col-md-12">
        <label for="enrol_user_doc_foto">Carga de Fotografía</label>
        <input type="file" class="form-control" id="enrol_user_doc_foto" name="enrol_user_doc_foto" placeholder="" value="{{ $enroll->enrol_user_doc_foto }}">
        <span class="alert-danger">{{$errors->first('enrol_user_doc_foto')}}</span>
      </div>

    </div>

    <hr>
    <a href="{{url('candidatos')}}" type="button" class="btn btn-default btn-lg">Cancelar</a>
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
