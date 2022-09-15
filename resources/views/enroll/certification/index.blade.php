@extends('base')
@section('content')
<div class="row">

</div>
<div class="col-md-12">
 <table class="table table-striped">
    <thead>
        <tr>
            <th>Estatus</th>
            <th>Estándar</th>
            <th>Grupo</th>
            <th>Nombre</th>
            <th>Curp</th>
            <th>Diagnóstico</th>
            <th>Pago</th>
            <th>Cita</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($enrolls as $enroll)
        <tr>
            <td>{{$enroll->estatus}}</td>
            <td>{{$enroll->estandar}}</td>
            <td>{{$enroll->grupo}}</td>
            <td><a href="{{url('candidatos/edit')}}/{{$enroll->id}}">candidato</a></td>
            <td>{{$enroll->curp}}</td>
            <td>{{$enroll->diagnostico_status}}</td>
            <td>{{$enroll->pago}}</td>
            <td></td>
        </tr>
        @endforeach
        {!! $enrolls->render() !!}
    </tbody>
 </table>

</div>
@endsection
