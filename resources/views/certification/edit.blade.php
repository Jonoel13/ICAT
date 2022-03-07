@extends('base')
@section('content')
<div class="row col-md-11 offset-md-1">
    <form method="POST" action="{{url('certificaciones/edit')}}/{{$certification->id}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="estandar"><strong>Estándar:</strong></label>
                <input type="text" class="form-control" id="estandar" name="estandar" placeholder="" required="required" value="{{ $certification->estandar }}" readonly>
                <span class="alert-danger">{{$errors->first('estandar')}}</span>
            </div>
            <div class="form-group col-md-6">
                <label for="curp"><strong>CURP:</strong></label>
                <input type="text" class="form-control" id="curp" name="curp" placeholder="" value="{{ $certification->curp }}" readonly>
                <span class="alert-danger">{{$errors->first('curp')}}</span>
            </div>
            <div class="form-group col-md-4">
                <label for="estatus"><strong>Estatus:</strong></label>
                <select class="form-control" id="estatus" name="estatus">
                    <option value="Candidato">Seleccionar</option>
                    <option {{ $certification->estatus == 'Competente' ? 'selected' : '' }} value="Competente">Competente</option>
                    <option {{ $certification->estatus == 'No competente' ? 'selected' : '' }} value="No competente">No competente</option>
                </select>
                <span class="alert-danger">{{$errors->first('estatus')}}</span>
            </div>
            <div class="form-group col-md-4">
                <label for="calificacion"><strong>Calificación:</strong></label>
                <input type="text" class="form-control" id="calificacion" name="calificacion" placeholder="" value="{{ $certification->calificacion }}" >
                <span class="alert-danger">{{$errors->first('calificacion')}}</span>
            </div>
            <div class="form-group col-md-4">
                <label for="fecha"><strong>Fecha de evaluación:</strong></label>
                <input type="date" class="form-control" id="fecha" name="fecha"  value="{{ $certification->fecha }}" >
                <span class="alert-danger">{{$errors->first('fecha')}}</span>
            </div>

        </div>

        <a href="{{url('certificaciones')}}" type="button" class="btn btn-default">Cancelar</a>
        <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
    </form>
</div>
@endsection
