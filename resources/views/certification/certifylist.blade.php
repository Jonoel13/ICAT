@extends('base')
@section('content')
<div class="row">

</div>
<div class="col-md-12">
 <table class="table table-striped">
    <thead>
        <tr>
            <th>Estándar</th>
            <th>CURP</th>
            <th>Estatus</th>
            <th>Documento certificado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($certifications as $certification)
        <tr>
            <td>{{$certification->estandar}}</td>
            <td><a href="{{url('usuario/perfil')}}/{{$certification->curp}}">{{$certification->curp}}</a></td>
            <td><span class="{{$certification->estatus}}">{{$certification->estatus}}</span></td>
            @if($certification->documento == 'Pendiente')
            <td>{{$certification->documento}}</td>
            @else
            <td><a href="{{url('public/file/certify')}}/{{$certification->documento}}" target="_blank">Descargar documento</a></td>
            @endif
            <td><a href="{{url('certificado')}}/{{$certification->id}}"><i class="fa fa-upload"></i> Subir certificado </a></td>
        </tr>
        @endforeach

    </tbody>
 </table>
 {!! $certifications->render() !!}
</div>
@endsection
