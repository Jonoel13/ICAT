@extends('base')
@section('content')
<div class="row">
  <div class="col-sm-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Banco de Talento</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Capacitación en línea: <span>????</span></li>
            <li class="list-group-item">Capacitación  presenciales: <span>????</span></li>
            <li class="list-group-item">Certificaciones: <span>{{$countCer}}</span></li>
        </ul>
        <div class="card-body">
            <a href="{{url('banco/perfiles')}}" class="btn btn-success">Ver panel</a>
        </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-success">Go somewhere</a>
      </div>

    </div>
  </div>
</div>
@endsection
