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
        <a class="btn btn-success" href="{{url('admin/instructor/form')}}">Agregar</a>
    </div>
    <div class="col-6 col-md-6">

        <div class="input-group">
            <input type="text" name="group" id="group">
            <div class="input-group-append">
                <a href="" id="groupLink" class="btn btn-outline-success btn-success" >Buscar</a>
            </div>
            <div class="input-group-append">
                <a href="{{url('admin/instructor/lista')}}" class="btn btn-outline-success btn-success" >Todos</a>
            </div>
        </div>

    </div>
</div>
<div class="row ">
  <div class="col-md-12">
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th scope="col" class="">Nombre</th>
                  <th scope="col">RFC</th>
                  <th scope="col">Sector</th>
                  <th scope="col">Correo electrónico</th>
                  <th scope="col">Editar</th>
              </tr>
          </thead>
          <tbody>
              @foreach($instructors as $instructor)
              <tr>
                  <td>{{$instructor->instructor_name}} {{$instructor->instructor_app}} {{$instructor->instructor_apm}}</dt>
                  <td>{{$instructor->instructor_rfc}}</td>
                  <td>{{$instructor->instructor_sector}}</td>
                  <td>{{$instructor->instructor_email}}</td>
                  <td><a href="{{url('admin/instructor/edit')}}/{{$instructor->id}}"><span class="text-success"><i class="fa fa-edit"></i> Editar</span></a></td>
              </tr>
              @endforeach
          </tbody>
      </table>
      <nav aria-label=" navigation ">
      {!! $instructors->render() !!}
      </nav>
  </div>

</div>

@endsection
