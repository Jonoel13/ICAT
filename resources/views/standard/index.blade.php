@extends('base')
@section('content')
<style type="text/css">
  .Disponible{
    color: #28a745 !important;
  }
  .nv{
    margin-bottom: 15px;
  }
</style>
<div class="row nv">
    <div class="col-6 col-md-6">
        <a class="btn btn-success" href="{{url('admin/estandar/from')}}">Agregar</a>
    </div>
    <div class="col-6 col-md-6">
        
        <div class="input-group">
            <input type="text" name="standard" id="standard">
            <div class="input-group-append">
                <a href="" id="dateLink" class="btn btn-outline-success btn-success" >Buscar</a>
            </div>
            <div class="input-group-append">
                <a href="{{url('admin/estandar/lista')}}" class="btn btn-outline-success btn-success" >Todos</a>
            </div>
        </div>
        
    </div>
</div>
<div class="row ">
  <div class="col-md-12">
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th scope="col" class="">Estándar</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Enlace del CONOCER</th>
                  <th scope="col">Editar</th>
              </tr>
          </thead>
          <tbody>
              @foreach($standards as $standard)
              <tr>
                  <td>{{$standard->name}}</td>
                  <td>{{$standard->description}}</td>
                  <td>{{$standard->link}}</td>
                  <td><a href="{{url('admin/estandar/edit')}}/{{$standard->id}}">Editar</a></td>
              </tr>
              @endforeach
          </tbody>
      </table>
      <nav aria-label=" navigation ">
      {!! $standards->render() !!}
      </nav>
  </div>

</div>

@endsection
