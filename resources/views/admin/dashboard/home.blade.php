@extends('layouts.adminapp')
@section('content')

<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Servicios</h5>

      <!-- Bar Chart -->
      <canvas id="barChart" style="max-height: 400px;"></canvas>
      <script>
        document.addEventListener("DOMContentLoaded", () => {
          new Chart(document.querySelector('#barChart'), {
            type: 'bar',
            data: {
              labels: ['Certificación', 'Capacitacitación'],
              datasets: [{
                label: 'Total',
                data: [ <?php $countCer;?>, 59],
                backgroundColor: [
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                  'rgb(75, 192, 192)',
                  'rgb(54, 162, 235)'
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
        });
      </script>
      <!-- End Bar CHart -->

    </div>
  </div>
</div>

@endsection


