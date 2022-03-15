@extends('layouts.adminapp')
@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Estándar</th>
                    <th>CURP</th>
                    <th>Estatus</th>
                    <th>Documento certificado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$certification->estandar}}</td>
                    <td>{{$certification->curp}}</td>
                    <td>{{$certification->estatus}}</td>
                    @if($certification->documento == 'Pendiente')
                    <td>{{$certification->documento}}</td>
                    @else
                    <td><a href="{{url('public/file/certify')}}/{{$certification->documento}}" target="_blank">Descargar documento</a></td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>

    
    <div class="col-md-12">
        <hr class="my-4">
        <form method="POST" action="{{url('certificado/guardar')}}/{{$certification->id}}" autocomplete="off" enctype="multipart/form-data">
        {{csrf_field() }}
            <label for="documento" style="font-weight:600;">Cargar certificado:</label><br>
            <div class="input-group">
                
                <div class="">
                <input type="file" class="form-control" id="documento" name="documento">
                </div>
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="submit" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Guardar</button>
                </div>
            </div>
        </form>
        <hr class="my-4"><br>
    </div>

    <div class="col-md-12">
        @if($certification->documento != 'Pendiente')
        <embed src="{{asset('file/certify')}}/{{$certification->documento}}" type="application/pdf" width="100%" height="600px" />
        @endif
    </div>
    
</div> 
@endsection   
