@extends('base')
@section('title')
<a href="{{ url('/home') }}">SISTEMA DE CITAS EN LINEA</a>
@endsection
@section('content')

<div class="row col-md-12 offset-md-1 citas">
  <div class="row">
    <h4>Agenda tu cita <hr></h4>

  </div>

  <form method="POST" action="{{url('citas/guardar')}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
     <div class="form-row">
      <div class="form-group col-md-4">
        <label for="quote_user_name"><strong>Nombre/s:</strong></label>
        <input type="text" class="form-control" id="quote_user_name" name="quote_user_name" placeholder="" required="required" value="{{ old('quote_user_name') }}">
        <span class="alert-danger">{{$errors->first('quote_user_name')}}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="quote_user_ap_p"><strong>Apellido Paterno:</strong></label>
        <input type="text" class="form-control" id="quote_user_ap_p" name="quote_user_ap_p" placeholder="" required="required" value="{{ old('quote_user_ap_p') }}">
        <span class="alert-danger">{{$errors->first('quote_user_ap_p')}}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="quote_user_ap_m"><strong>Apellido Materno:</strong></label>
        <input type="text" class="form-control" id="quote_user_ap_m" name="quote_user_ap_m" placeholder="" required="required" value="{{ old('quote_user_ap_m') }}">
        <span class="alert-danger">{{$errors->first('quote_user_ap_m')}}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="quote_user_curp"><strong>CURP:</strong></label>
        @if(Auth::check())
        <input type="text" class="form-control" id="quote_user_curp" name="quote_user_curp"  value="{{Auth::user()->name}}" oninput="validarInput(this)">
        @else
        <input type="text" class="form-control" id="quote_user_curp" name="quote_user_curp"  value="{{ old('quote_user_curp') }}" oninput="validarInput(this)">
        @endif
        <span class="alert-danger">{{$errors->first('quote_user_curp')}}</span>
        <pre id="resultado"></pre>
      </div>

      <div class="form-group col-md-6">
        <label for="quote_user_email"><strong>Correo electrónico:</strong></label>
        <input type="email" class="form-control" id="quote_user_email" name="quote_user_email" placeholder="" required="required" value="{{ old('quote_user_email') }}">
        <span class="alert-danger">{{$errors->first('quote_user_email')}}</span>
      </div>
      <!--div class="form-group col-md-12">
        <label for="quote_user_pago"><strong>Comprobante de pago:</strong></label>
        <input type="file" class="form-control" id="quote_user_pago"  name="quote_user_pago" placeholder="" required="required" value="{{ old('quote_user_pago') }}">
        <span class="alert-info">Cargar comprobante de pago del proceso de certificación</span>
        <span class="alert-danger">{{$errors->first('quote_user_pago')}}</span>
      </div-->

      <div class="form-group col-md-6">
        <label for="quote_date"><strong>Consultar fecha:</strong></label>
        <input type="date" class="form-control" id="quote_date" name="quote_date" placeholder="" required="" value="{{ old('quote_date') }}">
        <!-- span>Fechas disponibles del 2 al 6 de Agosto.</span-->
        <span class="alert-danger">{{$errors->first('quote_date')}}</span>
        
      </div>
      <div class=" col-md-6">
        <div class="row">
            <div class="col-md-2">
              <a id="search" class="search btn btn-warning" style="color:#FFF !important;">Consultar</a>
            </div>
            <div class="col-md-10">
              <span>Fechas disponibles</span><br>
                @foreach($dates as $date)
                  {{date("d-m-Y ", strtotime($date)) }} <br>

                @endforeach
            </div>
        </div>

      </div>

      <div class="col-md-6">
        <label for="quote_id"><strong>Seleccionar horario disponible:</strong></label>
        <div class="form-check" id="form-check">
        </div>
        <span class="alert-danger">{{$errors->first('quote_date_id')}}</span>
      </div>

      
    </div>
    <br>
    <hr>

    <a href="https://icatcdmx.mx/" type="button" class="btn btn-default btn-lg">Cancelar</a>
    <button type="submit" class="btn btn-lg btn-scs" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<style type="text/css">
  label{
    font-weight: 600 !important;
  }
  #resultado {
    color: #dc3545!important;
    font-weight: bold;
  }
  #resultado.ok {
    color:  #28a745 !important;
    font-weight: bold;
  }
  .Disponible{
    color: #28a745 !important;
  }
  .citas{
    margin-bottom: 40px;
  }
  .search{
    margin-top: 32px;
  }
  .btn-scs {
    color: #38c172;
    border-color: #38c172;
  }

  .btn-scs:hover{
    background: #38c172;
    color: #ffffff;
  }
</style>
<script type="text/javascript">

  function validarInput(input) {
        var curp = input.value.toUpperCase(),
            resultado = document.getElementById("resultado"),
              valido = "No válido";
              
          if (curpValida(curp)) {
            valido = "Válido";
              resultado.classList.add("ok");
          } else {
            resultado.classList.remove("ok");
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
<script type="text/javascript">
  $(document).ready(function () {

        $(document).on('click', '.search', function (e) {
            e.preventDefault();

            $('.form-check-input').remove();
            $('.form-check-label').remove();
            
            var fecha = $('#quote_date').val();
            var url = "{{url('fechas')}}";
            $.ajax({
                'url': url,
                'type': 'GET',
                'data': {'data':fecha},

                success: function(data){ // What to do if we succeed

                    if(data == ''){
                      $('#form-check').append('<span class="text-danger form-check-label"><strong>Sin resultados</strong></span>');
                    }
                    $.each(data, function(i, item) {
                        $('#form-check').append('<input id="item'+item.id+'" class="form-check-input" type="radio" name="quote_date_id" value="'+item.id+'">'
                          
                        +'<label class="form-check-label" for="item'+item.id+'">'+item.date_hour+' '+item.date_place+'<span class="text-success"><strong>  '+item.date_status+'</strong></span></label><br class="form-check-label">');
                    });
                    console.log(data);

                },
                error: function(data){
                    console.log('Error'+data);
                }



            });
        });

    });
</script>

@endsection
