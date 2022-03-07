@extends('base')
@section('content')
<div >
    
    <div class="row col-md-10">
        <h4>Documentos</h4>
        <div class="col-md-12">
            <h4>Fotografía</h4>
            <embed src="{{url('public/file/photo')}}/{{$pay->pay_documento}}" type="application/pdf" width="100%" height="600px" />
        </div>
        <div class="col-md-12">
            <h4>CURP</h4>
            <embed src="{{url('public/file/curp')}}/{{$pay->pay_documento}}" type="application/pdf" width="100%" height="600px" />
        </div>
        <div class="col-md-12">
            <h4>Idenficación oficial</h4>
            <embed src="{{url('public/file/id')}}/{{$pay->pay_documento}}" type="application/pdf" width="100%" height="600px" />
        </div>
    </div>
    <div class="col-md-2">
        <form>
            <select>
                <option value="">Seleccionar</option>
                <option value="Aceptado">Aceptado</option>
                <option value="Rechazado">Rechazado</option>
            </select>
        </form>
    </div>

</div>
@endsection