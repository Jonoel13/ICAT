@extends('layouts.adminapp')
@section('content')
<div class="row nv">
    
    <div class="offset-8 col-md-4 mb-3">

        <form method="POST" action="{{url('certificaciones/search/filter')}}" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field() }}

            <div class="input-group">
                <input type="text" name="curp" id="curp" placeholder="Buscar por CURP" required>
                <input type="hidden" name="standard" id="standard" value="EC1331">

                <div class="input-group-append">
                    <button id="curpLink" class="btn btn-outline-success btn-success" >Buscar</button>
                    <a href="{{url('certificaciones')}}" class="btn btn-outline-success btn-success" >Todos</a>
                </div>

            </div>
        </form>

    </div>
</div>
<div class="col-md-12">
 <table class="table table-striped">
    <thead>
        <tr>
            <th>Estándar</th>
            <th>CURP del candidato</th>
            <th>Estatus</th>
            <th>Calificación</th>
            <th>Fecha de evaluación</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($certifications as $certification)
        <tr>
            <td>{{$certification->estandar}}</td>
            <td><a href="{{url('usuario/perfil')}}/{{$certification->curp}}">{{$certification->curp}}</a></td>
            <td><span class="{{$certification->estatus}}">{{$certification->estatus}}</span></td>
            <td>{{$certification->calificacion}}</td>
            <td>{{$certification->fecha}}</td>
            <td><a href="{{url('certificaciones')}}/{{$certification->id}}"><i class="fa fa-edit"></i> Calificar </a></td>
        </tr>
        @endforeach

    </tbody>
 </table>
 {!! $certifications->render() !!}
</div>
<script type="text/javascript">
  $(document).ready(function () {

        $('#curp').change(function() {
                $('#curpLink').attr('href', '');
                var curp = $('#curp').val();
                var url      = window.location.origin+'/certificaciones/'+curp;
                $('#curpLink').attr('href', url);
            });
    });
</script>
@endsection
