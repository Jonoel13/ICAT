Hola <strong>{{ $name }}</strong>,
<p>Te informamos que tu comprobante de pago fue:  <span style="font-weight:600; text-transform: uppercase;">{{$pay}}</span><br>
	
<br>
@if($pay == 'Aceptado')
Ya puedes agendar tu cita para realizar el proceso de evaluación iniciando sesión en tu perfil <a href="https://sii.icatadistancia.cdmx.gob.mx/usuario/citas" target="_blank"><strong>iniciando sesión en tu perfil</strong></a>
@else
Por los siguientes motivos:<br>
<p>{{$details}}</p>
<br>
Favor de ponerte en contacto a través del correo <a href="mailto:arodriguez.icatcdmx@gmail.com" target="_blank"><strong>arodriguez.icatcdmx@gmail.com</strong></a>
@endif
</p>

<style>
    .title {
        font-size: 84px;
        font-family: 'Source Sans Pro', sans-serif;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    
    .btn-success {
        background: #fff !important;
        color: #691C32 !important;
        border-color: #691C32 !important;
    }

    .btn-success:hover{
        background: #691C32 !important;
        color: #ffffff !important;
    }
    .text-success{
        color: #691C32 !important;
    }
    .text-b{
        font-weight: 800;
    }
    .btn-scs {
        color: #fff;
        border-color: #BC955C;
        background: #BC955C;
    }

    .btn-scs:hover{
        background: #DDc9A3;
        color: #ffffff;
    }
    
</style>