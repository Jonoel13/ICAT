@extends('layouts.adminapp')
@section('content')
<div class="row">
  <div class="">
    <h4>HomeBuilder</h4>
  </div>
</div>
<div>
    <form method="POST" action="{{url('admin/home/config/update')}}" autocomplete="off" enctype="multipart/form-data">
      {{csrf_field() }}

        <div class="form-row">
          <div class="col-md-12">
              <label>Banner certificaciones:</label><br>
              <img class="img-responsive" src="{{ asset ('storage/banner/'.$home->banner)}}" type="application/pdf" width="450px" height="100%" />
          </div>
          <div class="col-md-12">
              <label for="banner">Actualizar Imagen:</label>
              <input type="file" class="form-control" id="banner" name="banner"  value="">
              <span class="alert-danger">{{$errors->first('banner')}}</span>
          </div>
        </div>
        <hr>
        <a href="{{url('admin/estandar/lista')}}" type="button" class="btn btn-default">Cancelar</a>
        <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
    </form>
</div>
@endsection
