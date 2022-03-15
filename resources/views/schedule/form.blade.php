@extends('base')
@section('content')
<h1>Agenda</h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('agenda') }}">Agenda</a></li>
        <li class="breadcrumb-item active">Agregar fecha</li>
    </ol>
</nav>
<div class="container row">
  <form method="POST" action="{{url('nuevo/citas/crear')}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
     <div class="form-row">

      <div class="form-group col-md-4">
        <label for="date_standar"><strong>Estándar:</strong></label>
        <input type="text" class="form-control" id="date_standar" name="date_standar" placeholder="" required="required" value="EC1331" readonly>
        <span class="alert-danger">{{$errors->first('date_standar')}}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="date_place"><strong>Sede:</strong></label>
        <input type="text" class="form-control" id="date_place" name="date_place" placeholder="" value="UC-GAM" disabled="true">
        <span class="alert-danger">{{$errors->first('date_place')}}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="date_date"><strong>Fecha:</strong></label>
        <input type="date" class="form-control" id="date_date" name="date_date" required="required" value="{{ old('date_date') }}">
        <span class="alert-danger">{{$errors->first('date_date')}}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="date_hour"><strong>Hora:</strong></label>
        <input type="time" class="form-control" id="date_hour" name="date_hour" placeholder="" required="required" value="{{ old('date_hour') }}">
        <span class="alert-danger">{{$errors->first('date_hour')}}</span>
      </div>
      <br>

    </div>
    
    <a href="{{url('agenda')}}" type="button" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
  </form>
</div>

@endsection
