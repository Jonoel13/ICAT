@extends('base')
@section('content')
<div >
    <h4>Documentos</h4>
    <div class="row">
        <table id="documets" class="table table-striped span12">
            <thead>
                <tr>
                    <th>Perfil</th>
                    <th>CURP</th>
                    <th>Identificación oficial</th>
                    <th>Fotografía</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($profiles as $profile)
                <tr>
                    <td><a href="{{url('usuario/perfil')}}/{{$profile->user_curp}}"><pan>{{$profile->user_curp}}</span></a></td>
                    <td><span class="{{$profile->user_check_curp}}">{{$profile->user_check_curp}}</span></td>
                    <td><span class="{{$profile->user_check_id}}">{{$profile->user_check_id}}</span></td>
                    <td><span class="{{$profile->user_check_foto}}">{{$profile->user_check_foto}}</span></td>
                    <td><a href="{{url('documentos/editar')}}/{{$profile->id}}">Revisar Documentos</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
  $(document).ready( function () {
      $('#documets').DataTable();
  } );
</script>
<style type="text/css">
    #documets_wrapper{
        width: 95% !important;
    }
</style>
@endsection
