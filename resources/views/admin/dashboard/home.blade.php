@extends('base')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>


<input id="url-dash" type="hidden" value="{{url('/api/enrol/certifications/')}}" >
<div class="row">
    <div class="col-lg-12">
       <nav class="navbar navbar-light bg-light mb-3">
          <a class="navbar-brand">Certificaciones busqueda libre</a>
          <form class="form-inline col-lg-10" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field() }}
            <select class="form-control mr-sm-2" id="form1_field">
                <option value="">Seleccionar</option>
                <option value="user_alcaldia">Alcaldía</option>
                <option value="user_cp">Código postal</option>
                <option value="estandar">Estándar</option>
                <option value="user_academico">Nivel académico</option>
                <option value="user_academico">Sector productivo del usuario</option>
                <option value="user_sexo">Sexo</option>                
            </select>
            <input id="form1_value" name="value" class="form-control mr-sm-2" type="search" placeholder="valor" aria-label="Buscar">
            <button id="form1_search" class="btn btn-outline-success my-2 my-sm-0" type="button">Buscar</button>
          </form>
        </nav> 
    </div>
    
    <div class="col-lg-6">
        
        <h2>RESULTADO</h2>
        <table class="table table-striped table-bordered" id="table1">
            <thead>
                <th>Estandar</th>
                <th>Nombre</th>
                <th>Curp</th>
                <th>Correo</th>
            </thead>
            <tbody class="row-table1">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </tbody>
        </table>
    </div>


    <div class="col-lg-6">
        <h2>RESUMEN</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <th>Estátus</th>
                <th>Subtotal</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Competentes: 
                    </td>
                    <td>
                        <span class="competentes-table1"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        No competentes: 
                    </td>
                    <td>
                        <span class="nocompetentes-table1"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        Total : 
                    </td>
                    <td>
                        <span class="total-table1"></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
       <nav class="navbar navbar-light bg-light mb-3">
          <a class="navbar-brand">Busqueda por rango de edad</a>
          <form class="form-inline col-lg-10" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field() }}
            <select class="form-control mr-sm-2" id="form2_standard">
                <option value="">Seleccionar estándar</option>
                @foreach($standards as $standard)
                <option value="{{$standard->name}}">{{$standard->name}}</option>
                @endforeach            
            </select>
            <input id="form2_value" name="form2_value" class="form-control mr-sm-2" type="number" placeholder="Edad inicial" aria-label="Buscar">
            <span class="mr-3 ml-2"> A </span>
            <input id="form2_value2" name="form2_value2" class="form-control mr-sm-2" type="number" placeholder="Edad final" aria-label="Buscar">
            <button id="form2_search" class="btn btn-outline-success my-2 my-sm-0" type="button">Buscar</button>
          </form>
        </nav> 
    </div>
    
    <div class="col-lg-6">
        
        <h2>RESULTADO</h2>
        <table class="table table-striped table-bordered" id="table2">
            <thead>
                <th>Estandar</th>
                <th>Nombre</th>
                <th>Curp</th>
                <th>Correo</th>
            </thead>
            <tbody class="row-table2">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
            </tbody>
        </table>
    </div>


    <div class="col-lg-6">
        <h2>RESUMEN</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <th>Estátus</th>
                <th>Subtotal</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Competentes: 
                    </td>
                    <td>
                        <span class="competentes-table2"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        No competentes: 
                    </td>
                    <td>
                        <span class="nocompetentes-table2"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        Total : 
                    </td>
                    <td>
                        <span class="total-table2"></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>
<hr>
<div class="row">
    <!--div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Servicios</h5>
          <canvas id="myChart" width="400" height="400"></canvas>

        </div>
      </div>
    </div -->
    <div class="col-lg-6">
        <table class="table table-striped table-bordered">
            <thead>
                <th>Estandar</th>
                <th>Competentes</th>
                <th>No competentes</th>
            </thead>
            <tbody>
                @foreach($standards as $standard)
                <tr>
                    <td>
                        {{$standard->name}}
                    </td>
                    <td>
                        {!! Helper::cetificationStatusCount($standard->name, 'Competente') !!}
                    </td>
                    <td>
                        {!! Helper::cetificationStatusCount($standard->name, 'No competente') !!}
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">
$( "#form1_search" ).click(function() {
 

    var field = $('#form1_field').val();
    var value = $('#form1_value').val();
    var urldash = $('#url-dash').val();

    var url = urldash+'/'+field+'/'+value;

    $.ajax({
        url : url,
        dataType : 'json',
        success : function(data) {
            rowTable = "";
                $( ".row-table1" ).html( '' );

                $.each(data['list'], function(i, obj) {
                  rowTable = "<tr>"
                            +"<td>"+data['list'][i]['estandar']+"</td>"
                            +"<td>"+data['list'][i]['user_app']+" "+data['list'][i]['user_apm']+" "+data['list'][i]['user_nombre']+"</td>"
                            +"<td>"+data['list'][i]['curp']+"</td>"
                            +"<td>"+data['list'][i]['user_email']+"</td>"
                            +"</tr>";
                    $( ".row-table1" ).append( rowTable );
                });

                $( ".competentes-table1" ).html( data['competentes'] );
                $( ".nocompetentes-table1" ).html( data['nocompetentes'] );
                $( ".total-table1" ).html( data['total'] );
                
        },
        error : function(xhr, status) {
            console.log('Disculpe, existió un problema');
        },
    });
});

$( "#form2_search" ).click(function() {
 

    var standard = $('#form2_standard').val();
    var value1 = $('#form2_value').val();
    var value2 = $('#form2_value2').val();
    var urldash = $('#url-dash').val();
    var url = urldash+'/age/'+standard+'/'+value1+'/'+value2;

    $.ajax({
        url : url,
        dataType : 'json',
        success : function(data) {
            rowTable = "";
                $( ".row-table1" ).html( '' );

                $.each(data['list'], function(i, obj) {
                  rowTable = "<tr>"
                            +"<td>"+data['list'][i]['estandar']+"</td>"
                            +"<td>"+data['list'][i]['user_app']+" "+data['list'][i]['user_apm']+" "+data['list'][i]['user_nombre']+"</td>"
                            +"<td>"+data['list'][i]['curp']+"</td>"
                            +"<td>"+data['list'][i]['user_email']+"</td>"
                            +"</tr>";
                    $( ".row-table2" ).append( rowTable );
                });

                $( ".competentes-table2" ).html( data['competentes'] );
                $( ".nocompetentes-table2" ).html( data['nocompetentes'] );
                $( ".total-table2" ).html( data['total'] );
                
        },
        error : function(xhr, status) {
            console.log('Disculpe, existió un problema');
        },
    });
});
</script>


<!--script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Certificaciones'],
        datasets: [{
            label: 'servicios',
            data: [<?php echo $countCer;?>],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script-->



@endsection


