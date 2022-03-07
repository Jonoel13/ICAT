@extends('base')
@section('content')

<div class="row col-md-11 offset-md-1">
  <form method="POST" action="{{url('agenda/edit')}}/{{$date->id}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
     <div class="form-row">

      <div class="form-group col-md-12">
        <label for="date_standar"><strong>Estándar:</strong></label>
        <input type="text" class="form-control" id="date_standar" name="date_standar" placeholder="" required="required" value="{{ $date->date_standar }}">
        <span class="alert-danger">{{$errors->first('date_standar')}}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="date_place"><strong>Sede:</strong></label>
        <input type="text" class="form-control" id="date_place" name="date_place" placeholder="" value="UC-GAM" disabled="true">
        <span class="alert-danger">{{$errors->first('date_place')}}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="date_date"><strong>Fecha:</strong></label>
        <input type="date" class="form-control" id="date_date" name="date_date" required="required" value="{{ $date->date_date }}">
        <span class="alert-danger">{{$errors->first('date_date')}}</span>
      </div>
      <div class="form-group col-md-4">
        <label for="date_hour"><strong>Hora:</strong></label>
        <input type="time" class="form-control" id="date_hour" name="date_hour" placeholder="" required="required" value="{{ $date->date_hour }}">
        <span class="alert-danger">{{$errors->first('date_hour')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="date_status"><strong>Estatus:</strong></label>
        <input type="text" class="form-control" id="date_status" name="date_status" placeholder="" required="required" value="{{ $date->date_status }}" readonly>
        <span class="alert-danger">{{$errors->first('date_status')}}</span>
      </div>
    </div>
    
    <a href="{{url('agenda')}}" type="button" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
  </form>
</div>

@endsection
