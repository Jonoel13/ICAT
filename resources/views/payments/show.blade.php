@extends('layouts.adminapp')
@section('content')
<div class="row">
  <h4><a href="{{url('pagos')}}">Pagos</a> / Revisar pago</h4>
  <table class="table table-striped">
    <tr>
        <th>CURP</th>
        <th>Estándar</th>
        <th>Servició</th>
        <th>Estatus</th>
        <th>Documento</th>
        <th></th>
    </tr>
    <tr>  
        <td><a href="{{url('usuario/perfil')}}/{{$pay->pay_curp}}" target="_blank">{{$pay->pay_curp}}</a></td>
        <td>{{$pay->pay_standar}}</td>
        <td>{{$pay->pay_type_service}}</td>
        <td><span class="{{$pay->pay_status}}">{{$pay->pay_status}}</span></td>
        <td>
          <a href="{{asset('file/pay')}}/{{$pay->pay_documento}}" target="_blank">Descargar documento</a>
        </td>
        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            Evaluar
          </button>
        </td>
    </tr>
  </table>
</div>
<div class="container-fluid text-center">
  <embed src="{{asset('file/pay')}}/{{$pay->pay_documento}}" type="application/pdf" width="100%" height="600px" />
</div>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{url('pago/actualizar')}}/{{ $pay->id }}" autocomplete="off">
      <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <div class="form-group ">
             <label for="pay_status"><strong>Estatus del pago: {{ $pay->pay_status }}</strong></label>
          </div>

            <div class="form-group row">
              <label for="pay_status" class="col-sm-4 col-form-label">Actalizar estatus:</label>
              <div class="col-sm-8">
                  <select class="form-control" id="pay_status" name="pay_status" required="required">
                      <option value="">Seleccionar</option>
                      <option value="Aceptado">Aceptado</option>
                      <option value="Rechazado">Rechazado</option>
                  </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="pay_details" class="col-sm-4 col-form-label">Observaciones:</label>
              <textarea class="form-control col-sm-10 ml-3" name="pay_details" id="pay_details"></textarea>
            </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection
