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
<div class="row nv">
<div class="container">
  <h1>Lista estándares</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active"><a href="#">Lista estándares</a></li>
    </ol>
  </nav>
</div>
    <div class="col-6 col-md-6">
        <a class="btn btn-success" href="{{url('admin/estandar/from')}}">Agregar</a>
    </div>
    <!--div class="col-6 col-md-6">
        
        <div class="input-group">
            <input type="text" name="standard" id="standard">
            <div class="input-group-append">
                <a href="" id="dateLink" class="btn btn-outline-success btn-success" >Buscar</a>
            </div>
            <div class="input-group-append">
                <a href="{{url('admin/estandar/lista')}}" class="btn btn-outline-success btn-success" >Todos</a>
            </div>
        </div>
        
    </div-->
</div>
<div class="row ">
  <div class="col-md-12">
      <table id="standars" class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th scope="col" class=""># Estándar</th>
                  <th scope="col">Nombre de estándar</th>
                  <th scope="col">Enlace del CONOCER</th>
                  <th scope="col">Editar</th>
              </tr>
          </thead>
          <tbody>
              @foreach($standards as $standard)
              <tr>
                  <td>{{$standard->name}}</td>
                  <td>{{$standard->shortname}}</td>
                  <td><a href="{{ url('/registro/estandar')}}/{{$standard->name}}/grupo/000001" target="_blank">{{ url('/registro/estandar')}}/{{$standard->name}}/grupo/000001</a></td>
                  <td><a href="{{url('admin/estandar/edit')}}/{{$standard->id}}">Editar</a></td>
              </tr>
              @endforeach
          </tbody>
      </table>

  </div>

</div>

<script type="text/javascript">
  const dataTable = new simpleDatatables.DataTable("#standars", {
  searchable: true,
  fixedHeight: true,
  })
</script>

@endsection
