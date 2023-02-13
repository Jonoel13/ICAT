@extends('base')
@section('content')

<div class="row mb-5 col-md-11 offset-1">
  <h2>Registrar nuevo instructor</h2>
  <form method="POST" action="{{url('admin/instructor/guardar')}}" autocomplete="off" enctype="multipart/form-data">
    {{csrf_field() }}
     <div class="form-row">

      <div class="form-group col-md-6">
        <label for="instructor_curp"><strong>CURP:</strong></label>
        <input type="text" class="form-control" id="instructor_curp" name="instructor_curp"  value="{{ old('instructor_curp') }}" >
        <span class="alert-danger">{{$errors->first('instructor_curp')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="instructor_operation_year"><strong>Año de operación:</strong></label>
        <input class="form-control" type="number" min="2020" max="2099" step="1" id="instructor_operation_year" name="instructor_operation_year"  value="{{ old('instructor_operation_year') }}" >
        <span class="alert-danger">{{$errors->first('instructor_operation_year')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="instructor_name"><strong>Nombre(s):</strong></label>
        <input type="text" class="form-control" id="instructor_name" name="instructor_name" value="{{ old('instructor_name') }}">
        <span class="alert-danger">{{$errors->first('instructor_name')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="instructor_app"><strong>Apellido paterno:</strong></label>
        <input type="text" class="form-control" id="instructor_app" name="instructor_app"  value="{{ old('instructor_app') }}" >
        <span class="alert-danger">{{$errors->first('instructor_app')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="instructor_apm"><strong>Apellido materno:</strong></label>
        <input type="text" class="form-control" id="instructor_apm" name="instructor_apm" value="{{ old('instructor_apm') }}">
        <span class="alert-danger">{{$errors->first('instructor_apm')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="instructor_age"><strong>Edad:</strong></label>
        <input type="number" class="form-control" id="instructor_age" name="instructor_age"  value="{{ old('instructor_age') }}" min="0">
        <span class="alert-danger">{{$errors->first('instructor_age')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="instructor_phone"><strong>Teléfono:</strong></label>
        <input type="text" class="form-control" id="instructor_phone" name="instructor_phone" value="{{ old('instructor_phone') }}">
        <span class="alert-danger">{{$errors->first('instructor_phone')}}</span>
      </div>

      <div class="form-group col-md-4">
        <label for="instructor_email"><strong>Correo electrónico:</strong></label>
        <input type="email" class="form-control" id="instructor_email" name="instructor_email" value="{{ old('instructor_email') }}">
        <span class="alert-danger">{{$errors->first('instructor_email')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="instructor_rfc"><strong>RFC del instructor:</strong></label>
        <input type="text" class="form-control" id="instructor_rfc" name="instructor_rfc" value="{{ old('instructor_rfc') }}">
        <span class="alert-danger">{{$errors->first('instructor_rfc')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="instructor_direc_factura"><strong>Decrección de facturación:</strong></label>
        <input type="text" class="form-control" id="instructor_direc_factura" name="instructor_direc_factura" value="{{ old('instructor_direc_factura') }}">
        <span class="alert-danger">{{$errors->first('instructor_direc_factura')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="instructor_sector"><strong>Sector productivo:</strong></label>
        <input type="text" class="form-control" id="instructor_sector" name="instructor_sector" value="{{ old('instructor_sector') }}">
        <span class="alert-danger">{{$errors->first('instructor_sector')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="instructor_consultoria"><strong>Consultoria:</strong></label>
        <input type="text" class="form-control" id="instructor_consultoria" name="instructor_consultoria" value="{{ old('instructor_consultoria') }}">
        <span class="alert-danger">{{$errors->first('instructor_consultoria')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="instructor_estudios"><strong>Máximo grado de estudios:</strong></label>
        <input type="text" class="form-control" id="instructor_estudios" name="instructor_estudios"  value="{{ old('instructor_estudios') }}" >
        <span class="alert-danger">{{$errors->first('instructor_estudios')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="instructor_estudios_doc"><strong>Documento de comprobación de estudios:</strong></label>
        <input type="file" class="form-control" id="instructor_estudios_doc" name="instructor_estudios_doc" value="{{ old('instructor_estudios_doc') }}">
        <span class="alert-danger">{{$errors->first('instructor_estudios_doc')}}</span>
      </div>

      <div class="form-group col-md-12">
        <label for="instructor_coursesw"><strong>Cursos que imparte:</strong></label>
        <!--textarea  class="form-control" id="instructor_courses" name="instructor_courses" value="{{ old('instructor_courses') }}"></textarea-->

        @foreach($standards as $standard)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="defaultCheck{{$standard->id}}" value="{{$standard->id}}" name="instructor_courses">
                <label class="form-check-label" for="defaultCheck{{$standard->id}}">
                  {{$standard->name}}
                </label>
            </div>
        @endforeach

        <span class="alert-danger">{{$errors->first('instructor_courses')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="instructor_certifications"><strong>Certificaciones obtenidas:</strong></label>
        <textarea class="form-control" id="instructor_certifications" name="instructor_certifications" value="{{ old('instructor_certifications') }}"></textarea>
        <span class="alert-danger">{{$errors->first('instructor_certifications')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="instructor_cv"><strong>CV del instructor:</strong></label>
        <input type="file" class="form-control" id="instructor_cv" name="instructor_cv" value="{{ old('instructor_cv') }}">
        <span class="alert-danger">{{$errors->first('instructor_cv')}}</span>
      </div>

      <div class="form-group col-md-6">
        <label for="instructor_summary"><strong>Semblaza del instructor:</strong></label>
        <input type="file" class="form-control" id="instructor_summary" name="instructor_summary" value="{{ old('instructor_summary') }}">
        <span class="alert-danger">{{$errors->first('instructor_summary')}}</span>
      </div>



    </div>

    <hr>

    <a href="{{url('admin/instructor/lista')}}" type="button" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>
  </form>
</div>


<style type="text/css">
  label{
    font-weight: 800;
  }
</style>
@endsection
