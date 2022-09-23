@extends('base')
@section('content')
<div>
  <div class="row">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('catalogo/certificaciones') }}">Oferte de certificaciones</a></li>
        <li class="breadcrumb-item active">{{$group->group_shortname}}</li>
      </ol>
    </nav>
  </div>

  <div class="row">

    <div class="col-md-8">
        <div class="">
            <img class="img-responsive col-md-6" src="{{ asset('storage/standard')}}/{!! Helper::standarImageId($group->id_standard) !!}">
        </div>

        <div class="standard-title">
          {{$group->group_shortname}}
        </div>

        <div class="">
            {!! Helper::standarDescriptionId($group->id_standard) !!}
        </div>
        <div class="">
            <a class="btn btn-success" href="{{$group->group_documentation}}" target="_blank">Documentación del estándar </a>

          @if (Route::has('login'))

                  @auth
                      <a type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Inscribirme
                      </a>

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

                            <input type="text" id="enrol_user_curp" name="enrol_user_curp" value="{{ Auth::user()->name }}">
                            <input type="text" id="enrol_user_email" name="enrol_user_email" value="{{ Auth::user()->email }}">
                            <input type="text" id="enrol_course_name" name="enrol_course_name" value="{!! Helper::standarName($group->id_standard) !!}">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                            <button type="submit" class="btn btn-success btn-lg btnt" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Confirmar</button>
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
      <p>
        Costo de evaluación: ${{$group->group_price}}.00
        <br>
        Costo de emisión de ceretificado: $200.00
        <br>
        Calificación minima: {{$group->group_min_grade}}%
        <br>
        Horas que puede tardad la evaluación: {{$group->group_hours}}
      </p>
    </div>

  </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
@endsection
