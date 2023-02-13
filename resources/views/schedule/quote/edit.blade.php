@extends('base')
@section('content')

<div class="row col-md-11 offset-md-1 citas">

    <form method="POST" action="{{url('citas/edit')}}/{{$quote->id}}" autocomplete="off" enctype="multipart/form-data">
      {{csrf_field() }}
       <div class="form-row">
        <div class="form-group col-md-4">
          <label for="quote_user_name"><strong>Nombre/s:</strong></label>
          <input type="text" class="form-control" id="quote_user_name" name="quote_user_name" placeholder="" required="required" value="{{ $quote->quote_user_name }}">
          <span class="alert-danger">{{$errors->first('quote_user_name')}}</span>
        </div>
        <div class="form-group col-md-4">
          <label for="quote_user_ap_p"><strong>Apellido Paterno:</strong></label>
          <input type="text" class="form-control" id="quote_user_ap_p" name="quote_user_ap_p" placeholder="" required="required" value="{{ $quote->quote_user_ap_p }}">
          <span class="alert-danger">{{$errors->first('quote_user_ap_p')}}</span>
        </div>
        <div class="form-group col-md-4">
          <label for="quote_user_ap_m"><strong>Apellido Materno:</strong></label>
          <input type="text" class="form-control" id="quote_user_ap_m" name="quote_user_ap_m" placeholder="" required="required" value="{{ $quote->quote_user_ap_m }}">
          <span class="alert-danger">{{$errors->first('quote_user_ap_m')}}</span>
        </div>
        <div class="form-group col-md-6">
          <label for="quote_user_curp"><strong>CURP:</strong></label>
          <input type="text" class="form-control" id="quote_user_curp" name="quote_user_curp"  value="{{ $quote->quote_user_curp }}" oninput="validarInput(this)">
          <span class="alert-danger">{{$errors->first('quote_user_curp')}}</span>
          <pre id="resultado"></pre>
        </div>

        <div class="form-group col-md-6">
          <label for="quote_user_email"><strong>Correo electrónico:</strong></label>
          <input type="email" class="form-control" id="quote_user_email" name="quote_user_email" placeholder="" required="required" value="{{ $quote->quote_user_email }}">
          <span class="alert-danger">{{$errors->first('quote_user_email')}}</span>
        </div>

        <div class="col-md-12">
          <div class="form-check" id="form-check">
          </div>
          <input type="hidden" name="quote_date_id" id="quote_date_id" value="{{$quote->quote_date_id}}">
          <span class="alert-danger">{{$errors->first('quote_date_id')}}</span>
        </div>

      </div>
      <br>
      <hr>

        <a href="{{url('citas/lista')}}" type="button" class="btn btn-lg  btn-default">Cancelar</a>
        <button type="submit" class="btn btn-lg  btn-scs" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
        <button type="button" class="btn btn-lg btn-dgr pull-right" data-toggle="modal" data-target="#modalCancelar">
          Cancelar cita
        </button>
    </form>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalCancelar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Confirma la cacelación de su cita?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-check" id="form-check">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
        <a href="{{url('citas/cancelar')}}/{{ $quote->id }}" type="button" class="btn btn-dgr">Confirmar</a>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<style type="text/css">
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

  .btn-dgr {
    color: #c82333;
    border-color: #c82333;
  }

  .btn-dgr:hover{
    background: #c82333;
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

            var id = $('#quote_date_id').val();
            var url = "{{url('fechas/id')}}";

            $.ajax({
                'url': url,
                'type': 'GET',
                'data': {'data':id},

                success: function(data){ // What to do if we succeed

                    if(data == ''){
                      $('.form-check').append('<span class="text-danger form-check-label"><strong>Sin resultados</strong></span>');
                    }
                    $.each(data, function(i, item) {
                        
                        $('.form-check').append('<label class="form-check-label"><h5>'
                          +'<span><strong>Horario: </strong>'+item.date_hour+'</span><br><br>'
                          +'<span><strong>Fecha: </strong>'+item.date_date+'</span><br><br>'
                          +'<span><strong>Sede: </strong>'+item.date_place+'</span></label></h5>');
                    });
                    console.log(data);

                },
                error: function(data){
                    console.log('Error'+data);
                }

            });

    });
</script>

@endsection
