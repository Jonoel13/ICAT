@extends('base')
@section('content')
<style type="text/css">


  .breadcrumb{
    background-color: #ffffff !important;
  }

  .header-standard{
    background-image: url("{{ asset('storage/standard')}}/{!! Helper::standarImageId($group->id_standard) !!}");
    background-repeat: no-repeat;
    width: 100%;
    height: 500px;
    background-size: cover;
  }
  .header-body{
    background-color:rgba(0, 0, 0, 0.5);
    width: 100%;
    height: 100%;

  }
  .header-body-text{
    color: #ffffff;
    font-weight: 400;
    font-size: 2.5rem;
  }
  .header-body-desc{
    text-align: center;
    padding-top: 200px;

  }
  .header-title{
    font-size: 1.5rem;
    color: #9f2241;
  }
  .standard-panel{
    
    padding: 40px;

  }
  .standard-fields{
    background: #f6f6f6;
    width: 97%;
    padding: 30px ;
  }
  .standard-description{
    margin-bottom: 40px;
  }
  .list-group-item{
    background:#f6f6f6 !important;
  }
  .standard-btn{
    background: #f6f6f6;
    height: 250px;
    width: 100%;
  }
  .standard-btn{
    padding-top: 40px;
  }

  
</style>
<div>
  <div class="">

    <div class="header-standard">
      <div class="header-body">
        <div class="header-body-desc">
          <p class=" text-b header-title">Estandar</p>
          <p class="header-body-text">{{$group->group_shortname}}</p>
        </div>
        
      </div>
    </div>
    

  </div>
  <hr>
  <div class="row">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-success" href="{{ url('catalogo/certificaciones') }}">Oferte de certificaciones</a></li>
        <li class="breadcrumb-item active">{{$group->group_shortname}}</li>
      </ol>
    </nav>
  </div>

  <div class="row">

    <div class="col-md-8 standard-panel">
  

        <div class="standard-title">
          <h2>{{$group->group_shortname}}</h2>
        </div>

        <div class="text-justify standard-description">
            {!! Helper::standarDescriptionId($group->id_standard) !!}
        </div>
        <div class="">
            @if (Route::has('login'))

                @auth
                <div class="standard-btn text-center">
                    <h3>Opciones de inscripción</h3>
                    <a class="btn btn-success" href="{{$group->group_documentation}}" target="_blank">Documentación del estándar </a>
                    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                      Inscribirme
                    </a>
                </div>
                    

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">comprobar datos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Confirmo mi incripcion al proceso del certificacion del estandard: <span class="standard">{!! Helper::standarName($group->id_standard) !!}</span>
                      </div>
                      <form method="POST" action="{{url('registro/rapido')}}" autocomplete="off" enctype="multipart/form-data">
                        {{csrf_field() }}
                        <div class="modal-footer">

                          <input type="hidden" id="enrol_user_curp" name="enrol_user_curp" value="{{ Auth::user()->name }}">
                          <input type="hidden" id="enrol_user_email" name="enrol_user_email" value="{{ Auth::user()->email }}">
                          <input type="hidden" id="enrol_course_name" name="enrol_course_name" value="{!! Helper::standarName($group->id_standard) !!}">

                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                          <button type="submit" class="btn btn-success  btnt" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Confirmar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar sesión para Inscribirme</a>
                @endauth
            @endif
        </div>

    </div>

    <div class="col-md-4">
      <div class="standard-fields">

          <ul class="list-group list-group-flush">
              <li class="list-group-item">
                  <span class="text-b">Costo de evaluación:</span> ${{$group->group_price}}.00
              </li>
              <li class="list-group-item">
                  <span class="text-b">Costo de emisión de ceretificado:</span> $200.00
              </li>
              <li class="list-group-item">
                  <span class="text-b">Calificación minima:</span> {{$group->group_min_grade}}%
              </li>
              <li class="list-group-item">
                  <span class="text-b">Horas que puede tardad la evaluación:</span> {{$group->group_hours}}
              </li>
          </ul>

      </div>
    </div>
  </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
@endsection
