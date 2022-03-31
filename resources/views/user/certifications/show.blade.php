@extends('base')
@section('content')
<h1>Certificaciones</h1>

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


@endsection
