@extends('layouts.adminapp')
@section('content')
<div class="row">
  <form method="POST" action="{{url('admin/alianzas/edit')}}/{{$allience->id}}" autocomplete="off" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-md-12">
        <label for="alianza_proyecto">Nombre de proyecto:</label>
        <input type="text" class="form-control" id="alianza_proyecto" name="alianza_proyecto" value="{{$allience->alianza_proyecto}}" required="required">
      </div>
      <div class="form-group col-md-12">
        <label for="alianza_dependencia">Nombre de la dependecia, institución o empreza:</label>
        <input type="text" class="form-control" id="alianza_dependencia" name="alianza_dependencia" value="{{$allience->alianza_dependencia}}" required="required">
      </div>
      <div class="form-group col-md-6">
        <label for="alianza_nom_convenio">Numero de convenio:</label>
        <input type="text" class="form-control" id="alianza_nom_convenio" name="alianza_nom_convenio" value="{{$allience->alianza_nom_convenio}}" required="required">
      </div>
      <div class="form-group col-md-6">
        <label for="alianza_tipo">Tipo de alianza:</label>
        <input type="text" class="form-control" id="alianza_tipo" name="alianza_tipo" value="{{$allience->alianza_tipo}}" required="required">
      </div>
      <div class="form-group col-md-6">
        <label for="alianza_fecha_inicio">Fecha de inicio:</label>
        <input type="date" class="form-control" id="alianza_fecha_inicio" name="alianza_fecha_inicio" value="{{$allience->alianza_fecha_inicio}}" required="required">
      </div>
      <div class="form-group col-md-6">
        <label for="alianza_fecha_termino">Fecha de termino:</label>
        <input type="date" class="form-control" id="alianza_fecha_termino" name="alianza_fecha_termino" value="{{$allience->alianza_fecha_termino}}" required="required">
      </div>
      <div class="form-group col-md-6">
        <label for="alianza_urlpdf">Actualizar documento:</label>
        <input type="file" class="form-control" id="alianza_urlpdf" name="alianza_urlpdf" placeholder="">
      </div>
      <div class="form-group col-md-12">
        <label for="alianza_urlpdf_a">Documento actual: <a href="/pdf/alianzas/{{$allience->alianza_urlpdf}}" target="_blank">{{$allience->alianza_urlpdf}}</a></label>
        <input type="hidden" class="form-control" id="alianza_urlpdf_01" name="alianza_urlpdf_01" placeholder="" value="{{$allience->alianza_urlpdf}}">

        <hr>
      </div>
    </div>
    <input type="hidden" id="alianza_id" name="alianza_id" value="{{$allience->id}}">
    <a href="{{url('admin/alianzas')}}" type="button" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary">Aceptar</button>

  </form>
</div>
@endsection
