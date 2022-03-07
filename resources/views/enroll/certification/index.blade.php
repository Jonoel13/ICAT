@extends('base')
@section('content')
<div class="row">

</div>
<div class="col-md-12">
 <table class="table table-striped">
    <thead>
        <tr>
            <th>Estándar</th>
            <th>Nombre</th>
            <th>Curp</th>
            <th>Correo electrónico</th>
            <th>Grado académico</th>
            <th>Sector productivo</th>
            <th>Diagnóstico</th>
            <th>Certificación</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($enrolls as $enroll)
        <tr>
            <td>{{$enroll->enrol_course_id}}</td>
            <td><a href="{{url('candidatos/edit')}}/{{$enroll->id}}">{{$enroll->enrol_user_nombre}} {{$enroll->enrol_user_app}} {{$enroll->enrol_user_apm}}</a></td>
            <td>{{$enroll->enrol_user_curp}}</td>
            <td>{{$enroll->enrol_user_email}}</td>
            <td>{{$enroll->enrol_user_academico}}</td>
            <td>{{$enroll->enrol_user_productivo}}</td>
            <td>{{$enroll->enrol_user_diagnostico}}</td>
            <td>{{$enroll->enrol_user_certificado}}</td>
            <td><a href=""><i class="fa fa-edit"></i></a></td>
        </tr>
        @endforeach
        {!! $enrolls->render() !!}
    </tbody>
 </table>

</div>
@endsection
