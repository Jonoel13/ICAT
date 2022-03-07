@extends('base')
@section('content')

<style type="text/css">
  .profile{
    background: #fcfcfc;
    border-right: 1px rgba(0,0,0,.1) solid;
  }

  .form-info{
    background: #e3eefb;
    color: #0070C0;
    padding: 0px 10px 0px 15px;
  }
  .link-info{
    color: #0f4c42 !important;
  }
  .step-title{
    font-size: 20px;
  }
  
  .number-list{
    background: #691C32;
    border-radius: 50%; 
    padding: 1px 7px 1px 7px;
    color: #fff;    
    font-size: 14px;
    margin-right: 10px; 
  }
  .list-unstyled li{
    margin-bottom: 15px;
    font-size: 18px;
  }
  .title-steps{
    color: #691C32;
    font-size: 22px;
  }
  .steps{
    background: #eaeaea;
    padding: 25px;
  }
  .table td, .table th {
    border-top: 0px !important;
    background: #eaeaea;
    padding-left: 30px;
  }
  .link-step{
    margin-right: 10px;
    padding-right: 10px;
    color: #999 !important;
  }
  .link-active{
    font-weight: 600;
    color: #606060;
  }
  .nav-pro{
    font-size: 25px;
  }
  .text-tg{
    font-size: 18px;
  }
  .step-active{
    color: #BC955C;
    font-weight: 600;
  }
  
</style>
<div class="mb-4">
  <div class="nav-pro" ><a href="{{url('home')}}"><span class="border-right border-success link-step">Inicio</span></a><span class="link-active">Perfil</span></div>
</div>
<div class="row">

    <div class="col-md-7 profile">
        <div class="row">
            <div class="col-md-3">
                <img class="img-responsive" src="{{url('public/file/photo/')}}/{{$profile->user_doc_foto}}" height="120" width="120">
            </div>
            <div class="col-md-9">
                <h4 class="">{{$profile->user_nombre}} {{$profile->user_app}} {{$profile->user_apm}}</h4>
                 @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2 || Auth::user()->id_rol == 10)
                <a href="{{ url('usuario/editar') }}/{{$profile->id}}" class="btn btn-success ">Editar perfil</a>
                @endif
            </div>
        </div>
        
        <hr class="my-4">

        <h4 class="text-b">Datos Personales</h4>
        <hr class="my-4">
        <p class="">
          <span>CURP: {{ $profile->user_curp }}</span><br>
          <span>Edad: {{ $profile->user_edad }}</span><br>
          <span>Sexo: {{ $profile->user_sexo }}</span><br>
        </p>

        <h4 class="text-b">Domicilio particular</h4>
        <hr class="my-4">
        <p class="">
          <span>Dirección: {{$profile->user_calle}} {{$profile->user_colonia}} {{$profile->user_alcaldia}} {{$profile->user_estado}}</span><br>
          <span>Código postal: {{$profile->user_cp}}</span><br>
        </p>

        <h4 class="text-b">Datos de contacto</h4>
        <hr class="my-4">
        <p class="">
          <span>Teléfono: {{$profile->user_telefono}}</span><br>
          <span>Correo electrónico: {{$profile->user_email}}</span><br>
        </p>

        <h4 class="text-b">Formación académica</h4>
        <hr class="my-4">
        <p class="">
          <span>Último grado de estudios: {{$profile->user_academico}}</span><br>
        </p>

        <h4 class="text-b">Información laboral</h4>
        <hr class="my-4">
        <p class="">
          <span>Sector productivo de trabajo: {{$profile->user_productivo}}</span><br>
        </p>

        <h4 class="text-b">Documentos</h4>
        <hr class="my-4">
        <p class="">
          <span>CURP: <a href="{{url('public/file/curp')}}/{{$profile->user_doc_curp}}" target="_blank">{{$profile->user_doc_curp}}</a></span><br>

          <span>Identificación Oficial con fotografía: <a href="{{url('public/file/id')}}/{{$profile->user_doc_id}}" target="_blank">{{$profile->user_doc_id}}</a></span><br>

          <span>Fotografía: <a href="{{url('public/file/photo')}}/{{$profile->user_doc_foto}}" target="_blank">{{$profile->user_doc_foto}}</a></span><br>
        </p>
    </div>

     @if($profile->user_check_ok == 'No')
    <div class="col-md-5">   
      <p><span class="text-b">Validación de documentos</span> <span class="step-active">(paso 2 de 7)</span></p>
      <div class="col-md-12 form-info">
        <p class="form-text-info">
          El siguiente paso del proceso será visible en cuanto todos tus documentos se encuentren 
          <span class="text-b">aceptados</span>
        </p>
      </div>       
      <ul class="list-group col-md-9">
          <li class="list-group-item">
              <span class="text-b">CURP: </span><span class="{{$profile->user_check_curp}}">{{$profile->user_check_curp}}</span>
          </li>
          <li class="list-group-item">
              <span class="text-b">Identificación: </span> <span class="{{$profile->user_check_id}}">{{$profile->user_check_id}}</span>
          </li>
          <li class="list-group-item">
              <span class="text-b">Fotografía: </span> <span class="{{$profile->user_check_foto}}">{{$profile->user_check_foto}}</span>
          </li>
      </ul>

      <div class="steps mt-5">
          <p class="title-steps text-b">Conoce los 7 pasos para certificarte</p>
          <p class="">
            <ul class="list-unstyled">
              <li>
                <span class="number-list">1</span> <span class="text-b">Registro</span>
              </li>
              <li>
                <span class="number-list">2</span> <span class="text-b">Validación de documentos</span>
              </li>
              <li><span class="number-list">3</span> <span class="text-b">Evaluación diagnóstica</span></li>
              <li><span class="number-list">4</span> <span class="text-b">Pago</span></li>
              <li><span class="number-list">5</span> <span class="text-b">Cita</span></li>
              <li><span class="number-list">6</span> <span class="text-b">Resultado de la evaluación</span></li>
              <li><span class="number-list">7</span> <span class="text-b">Expedición de certificado</span></li>
            </ul>
          </p>  
      </div>

    </div>
  
    @endif
    @if($profile->user_check_ok == 'Si')
    <div class="col-md-5">

        <h4></h4>

        <h4 class="text-b">Mis certificaciones</h4>
        <hr class="my-4">
        
          @foreach($certifications as $certification)
              
            @if($certification->pago == 'Pendiente')

                @if($certification->diagnostico_status == 'Pendiente')
                <p><span class="step-title text-b">Evaluación diagnóstica</span> <span class="step-active">(paso 3 de 7)</span></p>
                <table class="table">
                    <tr>
                      <td>
                          <a class="text-success" href="https://docs.google.com/forms/d/e/1FAIpQLSegHzFH_DmYFbrG8t4bebt0nrrK-24vhO7DwQRBX9AthIj0lw/viewform?usp=sf_link" target="_blank" style="font-weight: 600;">Hacer prueba</a>
                      </td>
                      <td>
                          {{$certification->estandar}}
                      </td>
                    </tr>
                </table>
                <form method="POST" action="{{url('usuario/diagnostico/guardar')}}" autocomplete="off" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <ul class="list-group">
                      <li class="list-group-item">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="diagnostico_status" name="diagnostico_status">
                          <label class="custom-control-label" for="diagnostico_status">Realizada</label><span class="alert-danger"> {{$errors->first('diagnostico_status')}}</span>
                      </li>
                      <li class="list-group-item">
                          <div class="">
                              <input type="hidden" name="id_service" value="{{ $certification->id }}">
                              <button type="submit" class="btn btn-success btn-md" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Enviar</button>
                          </div>
                      </li>
                          
                  </ul>
                </form>
                @endif
                @if($certification->diagnostico_status == 'Realizado')

                <p><span class="step-title text-b">Pago</span> <span class="step-active">(paso 4 de 7)</span></p>
                <table class="table">
                    <tr>
                      <td>
                          {{$certification->estandar}}
                      </td>
                      <td>Pago: <span class="{{$certification->pago}}">{{$certification->pago}}</span></td>
                    </tr>
                </table>
                <div class="col-md-12 form-info">
                  <p class="form-text-info">
                      La información para realizar tu pago se envió a tu correo electrónico
                  </p>
                </div>
                          
                <form method="POST" action="{{url('pago/guardar')}}" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <ul class="list-group">
                        <li class="list-group-item">                    
                            <div class="form-row">
                                <div class="col-md-12">                     
                                    <label for="pay_documento">Subir comprobante de pago:</label>
                                    <input type="file" class="form-control" id="pay_documento" name="pay_documento" placeholder="" value="{{ old('pay_documento') }}" 
                                    title="Para continuar con el proceso es necesario haber realizado el pago previamente, para más información sobre el pago ir la sección preguntas frecuentes."
                                    >
                                    <input type="hidden" name="id_service" value="{{ $certification->id }}">
                                    <input type="hidden" name="pay_curp" value="{{ $certification->curp }}">
                                    <input type="hidden" name="pay_type_service" value="Certificación">
                                    <input type="hidden" name="pay_standar" value="{{ $certification->estandar }}">
                                    <span class="alert-danger">{{$errors->first('pay_documento')}}</span>
                                </div>
                                <div class="col-md-12" style="margin-top:32px;">
                                    <button type="submit" class="btn btn-success btn-md" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Enviar</button>
                                </div>
                            </div>                  
                        </li>
                    </ul>
                </form>
                
                @endif

              </td>
            @elseif($certification->pago == 'En revisión')
      
                <p><span class="step-title text-b">Pago</span> <span class="step-active">(paso 4 de 7)</span></p>
                <table class="table">
                    <tr>
                      <td>
                          {{$certification->estandar}}
                      </td>
                      <td>Pago: <span class="{{$certification->pago}}">{{$certification->pago}}</span></td>
                    </tr>
                </table>
                <div class="col-md-12 form-info mt-3">
                  <p class="form-text-info">
                    El siguiente paso del proceso será visible en cuanto tu pago se encuentre 
                    <span class="text-b">aceptado por el instituto</span>
                  </p>
                </div>
            @elseif($certification->pago == 'Aceptado')

                @if($certification->estatus == 'Candidato')
                    @if($certification->n_intento == '0')

                        <p><span class="step-title text-b">Cita</span> <span class="step-active">(paso 5 de 7)</span></p>
                        <table class="table">
                            <tr>
                              <td>
                                  {{$certification->estandar}}
                              </td>
                              <td>
                                <a href="{{ url('usuario/citas') }}" class="btn btn-success btn-sm"
                                title="Agendar cita para realizar el proceso de evaluación de forma presencial" 
                                >Agendar cita</a>
                              </td>
                            </tr>
                        </table> 
                    @else
                    <p><span class="step-title text-b">Cita</span> <span class="step-active">(paso 5 de 7)</span></p>
                        <table class="table">
                            <tr>
                              <td>
                                  {{$certification->estandar}}
                              </td>
                              <td>
                                  {{$certification->estatus}}
                              </td>
                            </tr>
                        </table>  
                        <div class="col-md-12 form-info mt-3">
                          <p class="form-text-info">
                            Al resultar <span class="text-b">competente</span> en tu prueba de evaluación podrás descargar <span class="text-b">tu constancia de conclusión</span> y <span class="text-b">tu certificado de competencia</span>
                          </p>
                        </div>

                    @endif
                @endif
                @if($certification->estatus == 'Competente')
                    @if($certification->documento != 'Pendiente')
                        <p><span class="step-title text-b">Expedición de certificado</span> <span class="step-active">(paso 7 de 7)</span></p>
                        <table class="table">
                            <tr>
                              <td>
                                  {{$certification->estandar}}
                              </td>
                              <td>
                                  <span class="competente">{{$certification->estatus}}</span>
                              </td>
                            </tr>
                        </table>
                        <table class="table">
                            <tr>
                              <td>
                                <a href="{{url('documentos/constancia/')}}/{{$certification->curp}}/{{$certification->id}}">Descargar constancia
                                </a>
                              </td>
                            </tr>
                        </table>
                        <table class="table">
                            <tr>
                              <td><a href="{{url('public/file/certify')}}/{{$certification->documento}}" target="_blank">Descargar certificado</a></td>
                            </tr>
                        </table>

                    @else
                        <p><span class="step-title text-b">Resultado de la evaluación</span> <span class="step-active">(paso 6 de 7)</span></p>
                        <table class="table">
                            <tr>
                              <td>
                                  {{$certification->estandar}}
                              </td>
                              <td>
                                  <span class="competente">{{$certification->estatus}}</span>
                              </td>
                            </tr>
                        </table>
                        <table class="table">
                            <tr>
                             <td>
                                <a href="{{url('documentos/constancia/')}}/{{$certification->curp}}/{{$certification->id}}" target="_blank">Descargar constancia
                                </a>
                              </td>
                            </tr>
                        </table>
                        <div class="col-md-12 form-info mt-3">
                          <p class="form-text-info">
                            Tu certificado de competencia estará disponible en un <span class="text-b">periodo de 15 días hábiles</span>
                          </p>
                        </div>
                    @endif
                @endif
                @if($certification->estatus == 'No competente')
                    <p><span class="step-title text-b">Resultado de la evaluación</span> <span class="step-active">(paso 6 de 7)</span></p>
                    <table class="table">
                        <tr>
                          <td>
                              {{$certification->estandar}}
                          </td>
                          <td><span class="nocompetente">{{$certification->estatus}}</span></td>
                        </tr>
                    </table>
                    <div class="col-md-12 form-info mt-3">
                      <p class="form-text-info">
                        Te informamos que de acuerdo al estándar de competencia <span class="text-b">“EC1331 Conducción del vehículo motocicleta para su uso en la vialidad, nivel básico”</span>, no cubres los criterios mínimos requeridos para ser declarado competente. Te invitamos a practicar con tu vehículo motocicleta y revisar el <a href="https://app.semovi.cdmx.gob.mx/motocicletas/" target="_blank">curso de la SEMOVI</a> que te ayudará a adquirir los conocimientos necesarios para comenzar nuevamente con tu proceso de evaluación cuando lo desees; cubriendo la cuota respectiva del proceso.
                      </p>
                    </div>
                    
                @endif
            @elseif($certification->pago == 'Rechazado')
                <p><span class="step-title text-b">Pago</span> <span class="step-active">(paso 4 de 7)</span></p>
                <table class="table">
                    <tr>
                      <td>
                          {{$certification->estandar}}
                      </td>
                      <td>Pago: <span class="{{$certification->pago}}">{{$certification->pago}}</span></td>
                    </tr>
                </table>
                <div class="col-md-12 form-info">
                  <p class="form-text-info">
                      La información para realizar tu pago se envió a tu correo electrónico
                  </p>
                </div>
              <form method="POST" action="{{url('usuario/pago/actualizar')}}" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <div class="form-row">
                      <div class="col-md-12">
                          
                          <label for="pay_documento"><span style="font-weight:600;">Actualizar pago:</span></label>
                          <input type="file" class="form-control" id="pay_documento" name="pay_documento" placeholder="Actualizar comprobante pago" value="{{ old('pay_documento') }}" 
                          title="Para continuar con el proceso es necesario haber realizado el pago previamente, para más información sobre el pago ir la sección preguntas frecuentes."
                          >
                          <input type="hidden" name="id_service" value="{{ $certification->id }}" >
                          <span class="alert-danger">{{$errors->first('pay_documento')}}</span>
                      </div>
                      <div class="col-md-12" style="margin-top:32px;">
                          <button type="submit" class="btn btn-success btn-md" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Enviar</button>
                      </div>
                  </div>
              </form>
            @endif
          @endforeach

        <div class="mt-5">
            <h4 class="text-b">Mis citas 
              <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i style="color:#BC955C;" class="fa fa-question-circle-o" 
              title="Si debes reagendar tu cita, ponte en contacto con ece.icatcdmx@gmail.com lo mas pronto posible."
              ></i>
              </a>
              
              <div class="collapse" id="collapseExample">
                <div class="card card-body">
                  <span class="text-tg">
                    Si debes reagendar tu cita, ponte en contacto con <a href="mailto:ece.icatcdmx@gmail.com" class="text-success">ece.icatcdmx@gmail.com</a> lo mas pronto posible.
                  </span>
                </div>
              </div>
              </h4>
            <hr class="my-4">
            <table class="table table-striped">
              @foreach($quotes as $quote)
              <tr>
                <td>{{date('d-m-Y', strtotime($quote->quote_date))}} {{$quote->quote_hour}} hrs</td>
                <td>
                  @if($quote->date_place == 'UC-GAM')
                  <a href="https://goo.gl/maps/3DAUw9qEcrYaowCc9" target="_blank">
                    {{$quote->date_place}}
                  </a>
                  @endif
                </td>
                <td><a href="{{url('citas/consulta')}}/{{$quote->quote_access}}" class="btn btn-success btn-sm" target="_blank">Imprimir</a></td>
              </tr>
              @endforeach
            </table>
        </div>
        
        <div class="steps mt-5">
            <p class="title-steps text-b">Conoce los 7 pasos para certificarte</p>
            <p class="">
                <ul class="list-unstyled">
                  <li>
                    <span class="number-list">1</span> <span class="text-b">Registro</span>
                  </li>
                  <li>
                    <span class="number-list">2</span> <span class="text-b">Validación de documentos</span>
                  </li>
                  <li><span class="number-list">3</span> <span class="text-b">Evaluación diagnóstica</span></li>
                  <li><span class="number-list">4</span> <span class="text-b">Pago</span></li>
                  <li><span class="number-list">5</span> <span class="text-b">Cita</span></li>
                  <li><span class="number-list">6</span> <span class="text-b">Resultado de la evaluación</span></li>
                  <li><span class="number-list">7</span> <span class="text-b">Expedición de certificado</span></li>
                </ul>
            </p>  
        </div>

    </div>
    @endif

</div>
@endsection
