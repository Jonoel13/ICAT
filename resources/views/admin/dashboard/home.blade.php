@extends('layouts.adminapp')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Servicios</h5>
          <canvas id="myChart" width="400" height="400"></canvas>

        </div>
      </div>
    </div>
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


<script>
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
</script>



@endsection


