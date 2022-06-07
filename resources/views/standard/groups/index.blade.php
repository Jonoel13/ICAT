@extends('layouts.adminapp')
@section('content')
<style type="text/css">
  .Disponible{
    color: #28a745 !important;
  }
  .nv{
    margin-bottom: 15px;
  }
  .count{
    text-align: right;
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
          <!--div class="col-6 col-md-6">

              <div class="input-group">
                  <input type="text" name="group" id="group">
                  <div class="input-group-append">
                      <a href="" id="groupLink" class="btn btn-outline-success btn-success" >Buscar</a>
                  </div>
                  <div class="input-group-append">
                      <a href="{{url('admin/groups/lista')}}" class="btn btn-outline-success btn-success" >Todos</a>
                  </div>
              </div>

          </div-->
      </div>
      <div class="row ">
        <div class="col-md-12">
            <table id="groups" class="table table-striped table-bordered">
                <thead>
                    <tr>

                        <th scope="col" class="">Grupo</th>
                        <th scope="col" >Estándar</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Matriculaciones</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group)
                    <tr>
                        <td><a href="{{ url('admin/groups/enrolments/')}}/{{$group->id }}">{{$group->group_name}}</a></dd>
                        <td>{!! Helper::standarName($group->id_standard) !!}</td>
                        <td>{{$group->group_shortname}}</td>
                        <td>{{$group->group_price}}</td>
                        <td class="count col-1">{!! Helper::groupEnrolments($group->group_name) !!}</td>
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

<script type="text/javascript">
  const dataTable = new simpleDatatables.DataTable("#groups", {
  searchable: true,
  fixedHeight: true,
  })
</script>

@endsection
