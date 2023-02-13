Hola <span class="text-b">{{ $name }}</span>,
<p>
Te comentamos que el estatus de tu documentación es la siguiente:
<br>
<ul>
	<li>CURP: <span class="{{$user_check_curp}}">{{$user_check_curp}}</span></li>
	<li>Identificación oficial : <span class="{{$user_check_id}}">{{$user_check_id}}</span></li>
	<li>Fotografía: <span class="{{$user_check_foto}}">{{$user_check_foto}}</span></li>
</ul>
<br>

{{ $details }}

<br><br>
Para continuar con tu proceso, de ser el caso es importante que los documentos que no cumplen con las características <span class="text-b">se vuelvan a subir desde tu perfil</span>.
</p>

<style>
	 
  .En{
    color: #4472C4;
  } 
  .Aceptado{
    color: #00B050;
  }
  .Rechazado{
    color: #FF0000;
  }
  .competente{
    color: #235B4E;
  }
  .nocompetente{
    color: #9F2241;
  }
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