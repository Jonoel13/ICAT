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
      <table id="lista" class="table table-striped table-bordered" >
          <thead>
              <tr>
                  <th scope="col" class="">Estándar</th>
                  <th scope="col" >curp</th>
                  <th scope="col">Estatus</th>
                  <th scope="col">Pago</th>
                  <th scope="col">Eliminar</th>
              </tr>
          </thead>
          <tbody>
              @foreach($certifications as $certification)
              <tr>
                  <td>{{$certification->estandar}}</td>
                  <td>{{$certification->curp}}</td>
                  <td>{{$certification->estatus}}</td>
                  <td>{{$certification->pago}}</td>
                  <td><a href="{{url('admin/certificaciones/edit')}}/{{$certification->id}}">Candidato</a></td>
                  <td><a href="{{url('admin/certificaciones/delete')}}/{{$certification->id}}">Eliminar</a></td>
              </tr>
              @endforeach
          </tbody>
      </table>
      <nav aria-label=" navigation ">
      </nav>
  </div>

</div>

<script type="text/javascript">
  const dataTable = new simpleDatatables.DataTable("#lista", {
  searchable: true,
  fixedHeight: true,
  })
</script>

@endsection
