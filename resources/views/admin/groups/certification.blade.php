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
  <h1>Lista de personas matriculadas</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item "><a href="{{url('admin/groups/lista')}}">Grupos </a></li>
      <li class="breadcrumb-item active"><a href="#">Lista de personas matriculadas </a></li>
    </ol>
  </nav>
</div>
    <!--div class="col-6 col-md-6">

        <div class="input-group">
            <input type="text" name="standard" id="standard">
            <div class="input-group-append">
                <a href="" id="dateLink" class="btn btn-outline-success btn-success" >Buscar</a>
            </div>
            <div class="input-group-append">
                <a href="" class="btn btn-outline-success btn-success" >Todos</a>
            </div>
        </div>

    </div-->
</div>
<div class="row ">
  <div class="col-md-12">
      <table id="enrolments" class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th scope="col" class="">CURP</th>
                  <th scope="col">Estándar</th>
                  <th scope="col">Grupo</th>
                  <th scope="col">Proceso</th>
                  <th scope="col">Estatus</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
              @foreach($enrolments as $enrolment)
              <tr>
                  <td><a href="{{url('usuario/perfil')}}/{{$enrolment->curp}}">{{$enrolment->curp}}</a></td>
                  <td>{{$enrolment->estandar}}</td>
                  <td>{{$enrolment->grupo}}</td>
                  <td>Certificación</td>
                  <td>{{$enrolment->estatus}}</td>
                  <td><a href="{{url('certificaciones')}}/{{$enrolment->id}}" class="btn btn-sm btn-success"><i class="bi bi-pen"></i> Evaluar</a></td>
              </tr>
              @endforeach
          </tbody>
      </table>
      <nav aria-label=" navigation ">
      </nav>
  </div>

</div>
<script type="text/javascript">
  const dataTable = new simpleDatatables.DataTable("#enrolments", {
  searchable: true,
  fixedHeight: true,
  })
</script>

@endsection
