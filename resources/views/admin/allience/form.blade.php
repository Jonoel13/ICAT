@extends('layouts.adminapp')
@section('content')



<div class="row">
  <form method="POST" action="{{url('admin/alianzas/add')}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
     <div class="form-row">
      <div class="form-group col-md-12">
        <label for="alianza_proyecto">Nombre de proyecto:</label>
        <input type="text" class="form-control" id="alianza_proyecto" name="alianza_proyecto" placeholder="Nombre del proyecto de alianza o convenio" required="required" value="{{ old('alianza_proyecto') }}">
        <span class="alert-danger">{{$errors->first('alianza_proyecto')}}</span>
      </div>
      <div class="form-group col-md-12">
        <label for="alianza_dependencia">Nombre de la dependecia, institución o empreza:</label>
        <input type="text" class="form-control" id="alianza_dependencia" name="alianza_dependencia" placeholder="" required="required" value="{{ old('alianza_dependencia') }}">
        <span class="alert-danger">{{$errors->first('alianza_dependencia')}}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="alianza_nom_convenio">Numero de convenio:</label>
        <input type="text" class="form-control" id="alianza_nom_convenio" name="alianza_nom_convenio" placeholder="" required="required" value="{{ old('alianza_nom_convenio') }}">
        <span class="alert-danger">{{$errors->first('alianza_nom_convenio')}}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="alianza_tipo">Tipo de alianza:</label>
        <input type="text" class="form-control" id="alianza_tipo" name="alianza_tipo" placeholder="" value="{{ old('alianza_tipo') }}">
        <span class="alert-danger">{{$errors->first('alianza_tipo')}}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="alianza_fecha_inicio">Fecha de inicio:</label>
        <input type="date" class="form-control" id="alianza_fecha_inicio" name="alianza_fecha_inicio" placeholder="" required="required" value="{{ old('alianza_fecha_inicio') }}">
        <span class="alert-danger">{{$errors->first('alianza_fecha_inicio')}}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="alianza_fecha_termino">Fecha de termino:</label>
        <input type="date" class="form-control" id="alianza_fecha_termino" name="alianza_fecha_termino" placeholder="" required="required" value="{{ old('alianza_fecha_termino') }}">
        <span class="alert-danger">{{$errors->first('alianza_fecha_termino')}}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="alianza_urlpdf">Documento:</label>
        <input type="file" class="form-control" id="alianza_urlpdf" name="alianza_urlpdf" placeholder="" value="{{ old('alianza_urlpdf') }}">
        <span class="alert-danger">{{$errors->first('alianza_urlpdf')}}</span>

      </div>
    </div>
    <a href="/alianzas" type="button" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
  </form>
</div>

@endsection
