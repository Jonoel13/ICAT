@extends('layouts.adminapp')
@section('content')
<div class="row nv">

    <div class="offset-8 col-md-4 mb-3">

        <div class="input-group">
            <input type="text" name="curp" id="curp" placeholder="Buscar por CURP" >
            <div class="input-group-append">
                <a href="" id="curpLink" class="btn btn-outline-success btn-success" >Buscar</a>
            </div>
            <div class="input-group-append">
                <a href="{{ url('pagos') }}"  class="btn btn-outline-success btn-success" >Todos</a>
            </div>

        </div>

    </div>
</div>
<div class="row">
  <h4>Pagos recibidos</h4>
  <table class="table table-striped">
    <tr>
        <th>CURP</th>
        <th>Estándar</th>
        <th>Servició</th>
        <th>Estatus</th>
        <th>Documento</th>
        <th></th>
    </tr>
    @foreach($payments as $pay)
    <tr>  
        <td><a href="{{url('usuario/perfil')}}/{{$pay->pay_curp}}">{{$pay->pay_curp}}</a></td>
        <td>{{$pay->pay_standar}}</td>
        <td>{{$pay->pay_type_service}}</td>
        <td><span class="{{$pay->pay_status}}">{{$pay->pay_status}}</span></td>
        <td><a href="{{ asset ('storage/pay/'. $pay->pay_documento)}}" target="_blank">Descargar documento</a></td>
        <td><a href="{{ url('pago') }}/{{$pay->id}}">Verificar</a></td>
    </tr>
    @endforeach
  </table>
  {!! $payments->render() !!}
</div>

<script type="text/javascript">
  $(document).ready(function () {

      $('#curp').change(function() {
          $('#curpLink').attr('href', '');
          var curp = $('#curp').val();
          var url      = window.location.origin+'/sii/pagos/buscar/'+curp;
          $('#curpLink').attr('href', url);
      });
  });
</script>

@endsection
