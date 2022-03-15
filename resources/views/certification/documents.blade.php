@extends('layouts.adminapp')
@section('content')
<div >
    <div class="row">
        <div class="col-md-9" style="border-right: 1px rgba(0,0,0,.1) solid;">
            <h4>Documentos</h4>
            <hr class="my-4">
            <div class="col-md-12">
                <h4>Fotografía</h4>
                <embed src="{{url('public/file/photo')}}/{{$profile->user_doc_foto}}" type="application/pdf" width="100%" height="600px" />
            </div>
            <hr class="my-4">
            <div class="col-md-12">
                <h4>CURP</h4>
                <embed src="{{url('public/file/curp')}}/{{$profile->user_doc_curp}}" type="application/pdf" width="100%" height="600px" />
            </div>
            <hr class="my-4">
            <div class="col-md-12">
                <h4>Idenficación oficial</h4>
                <embed src="{{url('public/file/id')}}/{{$profile->user_doc_id}}" type="application/pdf" width="100%" height="600px" />
            </div>
        </div>

        <div class="col-md-3">
            <form method="POST" action="{{url('documentos/actualizar')}}/{{$profile->id}}" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <span style="font-weight:600;">Validar documentos</span>

                <div class="form-group">
                    <label for="formGroupExampleInput " class="">
                        @if($profile->user_check_foto == 'Aceptado')
                        <span class="text-success">Fotografía <i class="fa fa-check "></i></span>
                        @else
                        <span class="">Fotografía</span>
                        @endif 

                    </label>
                    <select class="form-control" name="user_check_foto">
                                <option value="">Seleccionar</option>
                                <option 
                                {{ $profile->user_check_foto == 'Aceptado' ? 'selected' : '' }} value="Aceptado"
                                >Aceptado</option>
                                <option
                                {{ $profile->user_check_foto == 'Rechazado' ? 'selected' : '' }}
                                value="Rechazado">Rechazado</option>
                            </select>
                    
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">
                        @if($profile->user_check_curp == 'Aceptado')
                        <span class="text-success">CURP <i class="fa fa-check "></i></span>
                        @else
                        <span class="">CURP</span>
                        @endif
                    </label>
                    <select class="form-control" name="user_check_curp">
                        <option value="">Seleccionar</option>
                        <option 
                        {{ $profile->user_check_curp == 'Aceptado' ? 'selected' : '' }} value="Aceptado"
                        >Aceptado</option>
                        <option
                        {{ $profile->user_check_curp == 'Rechazado' ? 'selected' : '' }}
                        value="Rechazado">Rechazado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">
                        @if($profile->user_check_id == 'Aceptado')
                        <span class="text-success">Identificación oficial<i class="fa fa-check "></i></span>
                        @else
                        <span class="">Identificación oficial</span>
                        @endif
                    </label>
                    <select class="form-control" name="user_check_id">
                        <option value="">Seleccionar</option>
                        <option 
                        {{ $profile->user_check_id == 'Aceptado' ? 'selected' : '' }} value="Aceptado"
                        >Aceptado</option>
                        <option
                        {{ $profile->user_check_id == 'Rechazado' ? 'selected' : '' }}
                        value="Rechazado">Rechazado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">
                        Observaciones
                    </label>
                    <textarea class="form-control" name="details"></textarea>
                </div>
                
                <hr class="my-4">
                <div class="">
                    <button type="submit" class="btn btn-success btn-sm" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Enviar </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
