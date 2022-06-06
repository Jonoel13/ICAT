@extends('layouts.adminapp')
@section('content')
<style type="text/css">
  .Disponible{
    color: #28a745 !important;
  }
  .nv{
    margin-bottom: 15px;
  }
</style>
<div class="">
    <div class="row">
      <h1>Grupos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="#">Lista Grupos</a></li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="row nv">
          <div class="col-6 col-md-6">
              <a class="btn btn-success" href="{{url('admin/groups/form')}}">Agregar</a>
          </div>
          <div class="col-6 col-md-6">

              <div class="input-group">
                  <input type="text" name="group" id="group">
                  <div class="input-group-append">
                      <a href="" id="groupLink" class="btn btn-outline-success btn-success" >Buscar</a>
                  </div>
                  <div class="input-group-append">
                      <a href="{{url('admin/groups/lista')}}" class="btn btn-outline-success btn-success" >Todos</a>
                  </div>
              </div>

          </div>
      </div>
      <div class="row ">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="">Grupo</th>
                        <th scope="col">Fecha de inicio</th>
                        <th scope="col">Fecha de termino</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group)
                    <tr>
                        <td>{{$group->group_name}}</dt>
                        <td>{{$group->group_date_init}}</td>
                        <td>{{$group->group_date_end}}</td>
                        <td><a href="{{url('admin/groups/edit')}}/{{$group->id}}"><span class="text-success"><i class="fa fa-edit"></i> Editar</span></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label=" navigation ">
            {!! $groups->render() !!}
            </nav>
        </div>

      </div>
    </div>
</div>

@endsection
