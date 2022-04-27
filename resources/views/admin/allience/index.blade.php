@extends('layouts.adminapp')
@section('content')
    <div class="row">
          
    </div>
    <a class="" href="{{ url('admin/alianzas') }}">Ver todos</a> / <a class="" href="{{ url('admin/alianza/form') }}">Registar nuevo</a>

    <form class="search-form d-flex align-items-center" method="POST" action="{{url('admin/alianzas/search/filter')}}" autocomplete="off" enctype="multipart/form-data">
      {{csrf_field() }}
      <div class="form-group  col-md-6">
        <select class="form-control" id="filter_type" name="filter_type" required="required">
          <option disabled selected value>Buscar por...</option>
              <option value="alianza_proyecto">Proyecto</option>
              <option value="alianza_dependencia">Dependecia, Institución o Empreza</option>
              <option value="alianza_nom_convenio">Numero de Convenio</option>
              <option value="alianza_tipo">Tipo de Convenio</option>
              <option value="alianza_fecha_inicio">Fecha de inicio</option>
              <option value="alianza_fecha_termino">Fecha de termino</option>

        </select>
        <span class="alert-danger">{{$errors->first('filter_type')}}</span>
      </div>
      <div class="form-group col-sm-3 ">
        <label for="filter_value" class="filter_value_2"><strong>De:&nbsp; </strong></label>
        <input type="text" class="form-control" id="filter_value" name="filter_value" placeholder="" required="required" >
        <span class="alert-danger">{{$errors->first('filter_value')}}</span>

      </div>
      <button type="submit" title="Search" class="btn btn-primary "><i class="bi bi-search"></i></button></form>
    </form>
<hr>
   <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <!--th scope="col">#</th-->
          <th scope="col">N. proyecto</th>
          <th scope="col">N. dependecia</th>
          <th scope="col">No de convenio</th>
          <th scope="col">Tipo</th>
          <th scope="col">Fecha de inicio</th>
          <th scope="col">Fecha de termino</th>
          <th scope="col">Documento</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($alliences as $allience)
        <tr>
          <td><a href="{{url('admin/alianzas')}}/{{$allience->id}}">{{$allience->alianza_proyecto}}</a></td>
          <td>{{$allience->alianza_dependencia}}</td>
          <td>{{$allience->alianza_nom_convenio}}</td>
          <td>{{$allience->alianza_tipo}}</td>
          <td>{{$allience->alianza_fecha_inicio}}</td>
          <td>{{$allience->alianza_fecha_termino}}</td>
          <td><a href="{{ asset ('storage/allience/'. $allience->alianza_urlpdf)}}" target="_blank">{{$allience->alianza_urlpdf}}</a></td>
          <td><a href="#{{$allience->id}}"><span class="fa fa-trash" data-toggle="modal" data-target="#modal-{{$allience->id}}"></span></a>
              <!-- Modal -->
              <div class="modal fade" id="modal-{{$allience->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Eliminar registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      Confirmar la eliminación: {{$allience->alianza_proyecto}}
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <a href="/alianzas/delete/{{$allience->id}}" class="btn btn-primary">Confirmar</a>
                    </div>
                  </div>
                </div>
              </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <nav aria-label="Page navigation">
      {{ $alliences->links('pagination::bootstrap-4') }}
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        $(".filter_value_2").hide();
        $(".filter_value_2").prop( "disabled", true );
        $( "#filter_type" ).change(function() {

          if($(this).val() == 'alianza_fecha_inicio' || $(this).val() == 'alianza_fecha_termino'){
            $(".filter_value_2").show();
            $(".filter_value_2").prop( "disabled", false );
            $("#filter_value").attr("type","date");
          }else{
            $(".filter_value_2").hide();
            $(".filter_value_2").prop( "disabled", true );
            $("#filter_value").attr("type","text");
          }
        });
      });
    </script>

@endsection
