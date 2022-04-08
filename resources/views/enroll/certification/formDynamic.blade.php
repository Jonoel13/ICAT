@extends('base')
@section('content')
<div class="col-md-11">
  <style type="text/css">
    .form-info{
      background: #e3eefb;
      color: #606060;
      padding: 0px 10px 0px 15px;
    }
    .link-info{
      color: #0f4c42 !important;
    }
  </style>

  <h2><a href="{{url('registro/buscar/usuario')}}">Ya tengo cuenta</a></h2>

  <form method="POST" action="{{url('registro/guardar/alt')}}" autocomplete="off" enctype="multipart/form-data">
     <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <h4 style="font-weight: 600 !important;">Ficha de Registro de Personas para Proceso de Evaluación con fines a la Certificación</h4>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="enrol_course_id">Nombre de estandar:</label>
        <input type="text" id="enrol_course_id" class="form-control" name="enrol_course_id" required="required" value="{{$standard->name}}" readonly>
        <span class="alert-danger">{{$errors->first('enrol_course_id')}}</span>
      </div>
    </div>

    <br>
    <h4>Datos personales</h4>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="enrol_user_nombre">Nombre/s:</label>
        <input type="text" class="form-control" id="enrol_user_nombre" name="enrol_user_nombre" required="required" value="{{ old('enrol_user_nombre') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_nombre')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_app">Apellido paterno:</label>
        <input type="text" class="form-control" id="enrol_user_app" name="enrol_user_app" required="required" value="{{ old('enrol_user_app') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_app')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_apm">Apellido materno:</label>
        <input type="text" class="form-control" id="enrol_user_apm" name="enrol_user_apm" required="required" value="{{ old('enrol_user_apm') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_apm')}}</span>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="enrol_user_curp">CURP:</label>
        <input type="text" class="form-control" id="enrol_user_curp" name="enrol_user_curp" required="required" value="{{ old('enrol_user_curp') }}" oninput="validarInput(this)">
        <span class="alert-danger">{{$errors->first('enrol_user_curp')}}</span>
        <pre id="resultado"></pre>

      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_edad">Edad:</label>
        <input type="number" class="form-control" id="enrol_user_edad" name="enrol_user_edad" required="required" value="{{ old('enrol_user_edad') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_edad')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_sexo">Sexo: </label>
        <select id="enrol_user_sexo" class="form-control" name="enrol_user_sexo" required="required" value="{{ old('enrol_user_sexo') }}">
          <option value="">Seleccionar</option>
          <option value="Mujer"    {{ old('enrol_user_sexo') == 'Mujer' ? 'selected' : '' }}>Mujer</option>
          <option value="Hombre"  {{ old('enrol_user_sexo') == 'Hombre' ? 'selected' : '' }}>Hombre</option>
        </select>
        <span class="alert-danger">{{$errors->first('enrol_user_sexo')}}</span>
      </div>
    </div>

    <!-- Datos de domicilio -->
    <br>
    <h4>Domicilio particular</h4>
    <hr>
    <div class="form-row">

      <div class="form-group col-md-4">
        <label for="enrol_user_cp">Código postal:</label>
        <input type="number" class="form-control" id="enrol_user_cp" name="enrol_user_cp" required="required" value="{{ old('enrol_user_cp') }}" maxlength="5" minlength="5">
        <span class="alert-danger">{{$errors->first('enrol_user_cp')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_calle">Calle y número:</label>
        <input type="text" class="form-control" id="enrol_user_calle" name="enrol_user_calle" required="required" value="{{ old('enrol_user_calle') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_calle')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_colonia">Colonia o localidad:</label>
        <input type="text" class="form-control" id="enrol_user_colonia" name="enrol_user_colonia" required="required" value="{{ old('enrol_user_colonia') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_colonia')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_alcaldia">Alcaldía o municipio:</label>
        <input type="text" class="form-control" id="enrol_user_alcaldia" name="enrol_user_alcaldia" required="required" value="{{ old('enrol_user_alcaldia') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_alcaldia')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_estado">Estado:</label>
        <input type="text" class="form-control" id="enrol_user_estado" name="enrol_user_estado" required="required" value="{{ old('enrol_user_estado') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_estado')}}</span>
      </div>

    </div>

    <!-- Datos de contacto -->
    <br>
    <h4>Datos de contacto</h4>
    <hr>
    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="enrol_user_telefono">Teléfono móvil / Particular :</label>
        <input type="tel" class="form-control" id="enrol_user_telefono" name="enrol_user_telefono" required="required" value="{{ old('enrol_user_telefono') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_telefono')}}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="enrol_user_email">Correo electrónico:</label>
        <input type="email" class="form-control" id="enrol_user_email" name="enrol_user_email" required="required" value="{{ old('enrol_user_email') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_email')}}</span>
      </div>
    </div>
    <!-- Datos Formación Académica -->
    <br>
    <h4>Formación académica</h4>
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
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Pimaria Concluida" {{old('enrol_user_academico') == "Pimaria Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td >
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Pimaria Trunca" {{old('enrol_user_academico') == "Pimaria Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Secundaria
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Secundaria Concluida" {{old('enrol_user_academico') == "Secundaria Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Secundaria Trunca" {{old('enrol_user_academico') == "Secundaria Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Estudios Técnicos
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Estudios Técnicos Concluida" {{old('enrol_user_academico') == "Estudios Técnicos Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Estudios Técnicos Trunca" {{old('enrol_user_academico') == "Estudios Técnicos Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Bachillerato
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Bachillerato Concluida" {{old('enrol_user_academico') == "Bachillerato Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Bachillerato Trunca" {{old('enrol_user_academico') == "Bachillerato Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Licenciatura
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Licenciatura Concluida" {{old('enrol_user_academico') == "Licenciatura Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Licenciatura Trunca" {{old('enrol_user_academico') == "Licenciatura Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Maestría
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Maestría Concluida" {{old('enrol_user_academico') == "Maestría Concluida" ? "checked" : ""}} >
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Maestría Trunca" {{old('enrol_user_academico') == "Maestría Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Doctorado
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Doctorado Concluida" {{old('enrol_user_academico') == "Doctorado Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Doctorado Trunca" {{old('enrol_user_academico') == "Doctorado Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      Posgrado
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Posgrado Concluida" {{old('enrol_user_academico') == "Posgrado Concluida" ? "checked" : ""}}>
                      </div>
                  </td>
                  <td>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enrol_user_academico" value="Posgrado Trunca" {{old('enrol_user_academico') == "Posgrado Trunca" ? "checked" : ""}}>
                      </div>
                  </td>
              </tr>

          </tbody>
        </table>
        <span class="alert-danger">{{$errors->first('enrol_user_academico')}}</span>
    </div>

    <br><br>
    <h4>Información laboral</h4>
    <hr>
    <div class="form-row">
            <p>Favor de marcar de acuerdo a su experiencia o en el ámbito en el que se desempeña</p>

      <div class="form-group col-md-12">
        <label for="user_laboral">Sector Productivo de Trabajo: </label>
        <select id="user_laboral" class="form-control" name="enrol_user_productivo" required="required" >

          <option value="">Seleccionar</option>
          <option {{ old('enrol_user_productivo') == 'Indefinido' ? 'selected' : '' }} value="Indefinido">Indefinido</option>
          <option {{ old('enrol_user_productivo') == 'Tecnologías de la Información' ? 'selected' : '' }} value="Tecnologías de la Información">Tecnologías de la Información</option>
          <option {{ old('enrol_user_productivo') == 'Servicios Profesionales y Técnicos' ? 'selected' : '' }} value="Servicios Profesionales y Técnicos">Servicios Profesionales y Técnicos</option>
          <option {{ old('enrol_user_productivo') == 'Agrícola y Pecuario' ? 'selected' : '' }} value="Agrícola y Pecuario">Agrícola y Pecuario</option>
          <option {{ old('enrol_user_productivo') == 'Financiero' ? 'selected' : '' }} value="Financiero">Financiero</option>
          <option {{ old('enrol_user_productivo') == 'Transporte' ? 'selected' : '' }} value="Transporte">Transporte</option>
          <option {{ old('enrol_user_productivo') == 'Deportivo' ? 'selected' : '' }} value="Deportivo">Deportivo</option>
          <option {{ old('enrol_user_productivo') == 'Laboral' ? 'selected' : '' }} value="Laboral">Laboral</option>
          <option {{ old('enrol_user_productivo') == 'Sociedades Cooperativas' ? 'selected' : '' }} value="Sociedades Cooperativas">Sociedades Cooperativas</option>
          <option {{ old('enrol_user_productivo') == 'Construcción' ? 'selected' : '' }} value="Construcción">Construcción</option>
          <option {{ old('enrol_user_productivo') == 'Turismo' ? 'selected' : '' }} value="Turismo">Turismo</option>
          <option {{ old('enrol_user_productivo') == 'Comercio' ? 'selected' : '' }} value="Comercio">Comercio</option>
          <option {{ old('enrol_user_productivo') == 'Logística' ? 'selected' : '' }} value="Logística">Logística</option>
          <option {{ old('enrol_user_productivo') == 'Energía Eléctrica'? 'selected' : '' }} value="Energía Eléctrica">Energía Eléctrica</option>
          <option {{ old('enrol_user_productivo') == 'Automotriz' ? 'selected' : '' }} value="Automotriz">Automotriz</option>
          <option {{ old('enrol_user_productivo') == 'Procesamiento de Alimentos' ? 'selected' : '' }} value="Procesamiento de Alimentos">Procesamiento de Alimentos</option>
          <option {{ old('enrol_user_productivo') == 'Telecomunicaciones' ? 'selected' : '' }} value="Telecomunicaciones">Telecomunicaciones</option>
          <option {{ old('enrol_user_productivo') == 'Administración Pública' ? 'selected' : '' }} value="Administración Pública">Administración Pública</option>
          <option {{ old('enrol_user_productivo') == 'Educación y Formación de Personas' ? 'selected' : '' }} value="Educación y Formación de Personas">Educación y Formación de Personas</option>
          <option {{ old('enrol_user_productivo') == 'Social' ? 'selected' : '' }} value="Social">Social</option>
          <option {{ old('enrol_user_productivo') == 'Funciones del Sistema Nacional de Competencias' ? 'selected' : '' }} value="Funciones del Sistema Nacional de Competencias">Funciones del Sistema Nacional de Competencias</option>
          <option {{ old('enrol_user_productivo') == 'Agua' ? 'selected' : '' }} value="Agua">Agua</option>
          <option {{ old('enrol_user_productivo') == 'Seguridad Pública' ? 'selected' : '' }} value="Seguridad Pública">Seguridad Pública</option>
          <option {{ old('enrol_user_productivo') == 'Petróleo y Gas' ? 'selected' : '' }} value="Petróleo y Gas">Petróleo y Gas</option>
          <option {{ old('enrol_user_productivo') == 'Cultural' ? 'selected' : '' }} value="Cultural">Cultural</option>
          <option {{ old('enrol_user_productivo') == 'Minería' ? 'selected' : '' }} value="Minería">Minería</option>
          <option {{ old('enrol_user_productivo') == 'Comercio Exterior' ? 'selected' : '' }} value="Comercio Exterior">Comercio Exterior</option>
          <option {{ old('enrol_user_productivo') == 'Maquilas y Manufactura' ? 'selected' : '' }} value="Maquilas y Manufactura">Maquilas y Manufactura</option>
          <option {{ old('enrol_user_productivo') == 'Químico' ? 'selected' : '' }} value="Químico">Químico</option>
          <option {{ old('enrol_user_productivo') == 'Prendas de Vestir, Textil, Cuero y Calzado' ? 'selected' : '' }} value="Prendas de Vestir, Textil, Cuero y Calzado">Prendas de Vestir, Textil, Cuero y Calzado</option>
          <option {{ old('enrol_user_productivo') == 'Seguridad Nacional' ? 'selected' : '' }} value="Seguridad Nacional">Seguridad Nacional</option>
        </select>
        <span class="alert-danger">{{$errors->first('enrol_user_productivo')}}</span>
      </div>

    </div>

    <!-- Datos de acuerdo con su cultura -->
    <br>
    <h4>Datos de inclusión</h4>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="enrol_user_indigena">De acuerdo con su cultura. ¿Se considera indígena? </label>
        <select id="enrol_user_indigena" class="form-control" name="enrol_user_indigena" required="required" value="{{ old('enrol_user_indigena') }}">
          <option value="">Seleccionar</option>
          <option {{ old('enrol_user_indigena') == 'Sí' ? 'selected' : '' }} value="Sí">Sí</option>
          <option {{ old('enrol_user_indigena') == 'Sí en parte' ? 'selected' : '' }} value="Sí en parte">Sí en parte</option>
          <option {{ old('enrol_user_indigena') == 'No' ? 'selected' : '' }} value="No">No</option>
          <option {{ old('enrol_user_indigena') == 'No se' ? 'selected' : '' }} value="No se">No se</option>
        </select>
        <span class="alert-danger">{{$errors->first('enrol_user_indigena')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_lengua">¿Habla lengua indígena? </label>
        <select id="enrol_user_lengua" class="form-control" name="enrol_user_lengua" required="required" value="{{ old('enrol_user_lengua') }}">
          <option value="">Seleccionar</option>
          <option {{ old('enrol_user_lengua') == 'Sí' ? 'selected' : '' }} value="Sí">Sí</option>
          <option {{ old('enrol_user_lengua') == 'No' ? 'selected' : '' }} value="No">No</option>
        </select>
        <span class="alert-danger">{{$errors->first('enrol_user_lengua')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="enrol_user_leng_indigena">¿Qué lengua indígena habla? (Puede utilizar la respuesta: No Aplica)</label>
        <input type="text" class="form-control" id="enrol_user_leng_indigena" name="enrol_user_leng_indigena" value="{{ old('enrol_user_leng_indigena') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_leng_indigena')}}</span>
      </div>

    </div>

    <!-- Datos Documentos-->
    <br>
    <h4>Documentos</h4>
    <hr>
    <div class="form-row">

      <div class="form-group col-md-6">
        <label for="enrol_user_doc_curp">Carga de CURP</label>
        <div class="form-info">
            <p>
              El documento debe ser en formato PDF.
              <br>
              Puede descargarlo aquí
              <a href="https://www.gob.mx/curp/" target="_blank" class="text-success">https://www.gob.mx/curp</a>
            </p>
        </div>
        <input type="file" class="form-control" id="enrol_user_doc_curp" name="enrol_user_doc_curp" required="required" value="{{ old('enrol_user_doc_curp') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_doc_curp')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="enrol_user_doc_id">Carga de Identificación Oficial con fotografía (INE, Cédula Profesional o Pasaporte)</label>
        <div class="form-info">
            <p>
              Debe ser un solo documento en formato PDF.
              <br>
              Es necesario que este escaneado por ambos lados.
              <a href=""></a>
            </p>
        </div>
        <input type="file" class="form-control" id="enrol_user_doc_id" name="enrol_user_doc_id" required="required" value="{{ old('enrol_user_doc_id') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_doc_id')}}</span>
      </div>

    </div>
    <div class="form-group">
      <br>
      <h4>Fotografía</h4>
      <hr>
      <!--p>
        El Certificado del CONOCER, es un documento oficial expedido por la autoridad educativa del gobierno federal, que reconoce las competencias de las personas. Cuenta con un formato institucional y diversas medidas de seguridad, cuidando que la calidad del documento se cumpla en todos sus aspectos; por ello es de suma importancia que la fotografía cuente con las siguientes especificaciones para evitar rechazos.
      </p>
      <p class="text-center">
        <img class="img-responsive col-md-6" src="https://drive.google.com/uc?export=view&id=1sTmDrkDOAxoU0H5JVtqWSt2_t18gDpYX">
      </p-->
      <div class="form-group col-md-12">
        <label for="enrol_user_doc_foto">Carga de Fotografía</label>
        <input type="file" class="form-control" id="enrol_user_doc_foto" name="enrol_user_doc_foto" placeholder="" value="{{ old('enrol_user_doc_foto') }}">
        <span class="alert-danger">{{$errors->first('enrol_user_doc_foto')}}</span>
      </div>

    </div>

    <div class="form-row">

        <br><br>
        <p class="text-justify">
        <b style="font-weight: 600 !important;">AVISO DE PRIVACIDAD INTEGRAL DEL SISTEMA DE DATOS PERSONALES PARA EL REGISTRO DE CANDIDATOS DE CERTIFICACIÓN</b><br>
        La Dirección de Desarrollo de Competencias del Instituto de Capacitación para el Trabajo de la Ciudad de México, es Responsable del tratamiento de los datos personales que nos proporcione, los cuales serán protegidos en el Sistema de Datos Personales para el Registro de Candidatos de Certificación. Los datos personales que recabemos serán utilizados con la finalidad de tener debidamente identificada, ordenada y clasificada la documentación e información proporcionada por las y los candidatos interesados en llevar a cabo un proceso de Evaluación con fines a la Certificación de alguno de los Estándares de Competencia Laboral acreditados por la Entidad, a fin de garantizar su debido tratamiento y transferencia, así como las reposiciones que surjan derivadas del proceso de evaluación. Son empleados para realizar el registro de distintos procedimientos que surgen derivados de un proceso de evaluación con fines a la Certificación, adicionalmente se empleará la información con fines estadísticos de uso Institucional, así mismo, para la reposición y reelaboración de certificados emitidos solicitados previamente por las y los candidatos. Usted podrá ejercer sus derechos de Acceso, Rectificación, Cancelación u Oposición, de sus datos personales (derechos ARCO), así como la revocación del consentimiento directamente ante la Unidad de Transparencia del Instituto de Capacitación para el Trabajo de la Ciudad de México, ubicada en Calzada San Antonio Abad 32, Planta Baja, Col. Tránsito, Alcaldía Cuauhtémoc, C. P. 06820, Ciudad de México, o bien, a través del Sistema INFOMEX (<a href="www.infomexdf.org.mx" target="_blank">www.infomexdf.org.mx</a>) o la Plataforma Nacional de Transparencia (<a href="www.plataformadetransparencia.org.mx" target="_blank">www.plataformadetransparencia.org.mx</a>), o en el correo electrónico <a href="mailto:icatcdmxut@gmail.com">icatcdmxut@gmail.com</a>. Si desea conocer el procedimiento para el ejercicio de estos derechos puede acudir a la Unidad de Transparencia o enviar un correo electrónico a la dirección antes señalada.
        </p>
    </div>

    <div class="form-group">
        <p class="text-justify">
          <label class="col-form-label">Autorizo al Instituto de Capacitación para el Trabajo de la Ciudad de México (Icat CDMX) para utilizar mi información con la finalidad de realizar el registro de distintos procedimientos que surjan derivados del proceso de evaluación con fines a la Certificación, así como para generar información con fines estadísticos de uso Institucional.
          Para más información revisa nuestro Aviso de Privacidad en:
          <a href="https://icat.cdmx.gob.mx/storage/app/media/aviso-de-privacidad-integral-certificacion.pdf" target="_blank">https://icat.cdmx.gob.mx/storage/app/media/aviso-de-privacidad-integral-certificacion.pdf</a></label>
        </p>

        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="enrol_user_uso_dato" name="enrol_user_uso_dato" required="required">
          <label class="custom-control-label" for="enrol_user_uso_dato">Acepto</label>
          <span class="alert-danger">{{$errors->first('enrol_user_uso_dato')}}</span>
        </div>


    </div>
    <hr>
    <a href="https://icatcdmx.mx/" type="button" class="btn btn-default btn-lg">Cancelar</a>
    <button type="button" class="btn btn-success btn-lg btnf" >Enviar</button>
    <button type="submit" class="btn btn-success btn-lg btnt" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Enviar</button>

  </form>

</div>

<style type="text/css">
  label{
    font-weight: 600;
  }
  form{
    margin-bottom: 60px;
  }
  #resultado {
    color: #FF0000!important;
    font-weight: bold;
  }
  #resultado.ok {
    color:  #00B050 !important;
    font-weight: bold;
  }
</style>
<script type="text/javascript">

  $('.btnt').show();
  $('.btnf').hide();
  function validarInput(input) {
        var curp = input.value.toUpperCase(),
            resultado = document.getElementById("resultado"),
              valido = "No válido";

          if (curpValida(curp)) {
            valido = "Válido";
              resultado.classList.add("ok");
              $('.btnf').hide();
              $('.btnt').show();
          } else {
            resultado.classList.remove("ok");
              $('.btnt').hide();
              $('.btnf').show();
          }

          resultado.innerText = "CURP: " + curp + "\nFormato: " + valido;
      }

      function curpValida(curp) {
        var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
            validado = curp.match(re);

          if (!validado)  //Coincide con el formato general?
            return false;

          //Validar que coincida el dígito verificador
          function digitoVerificador(curp17) {
              //Fuente https://consultas.curp.gob.mx/CurpSP/
              var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
                  lngSuma      = 0.0,
                  lngDigito    = 0.0;
              for(var i=0; i<17; i++)
                  lngSuma= lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
              lngDigito = 10 - lngSuma % 10;
              if(lngDigito == 10)
                  return 0;
              return lngDigito;
          }
          if (validado[2] != digitoVerificador(validado[1]))
            return false;

        return true; //Validado
      }
</script>

@endsection
