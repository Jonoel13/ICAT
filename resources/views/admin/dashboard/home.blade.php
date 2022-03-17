@extends('layouts.adminapp')
@section('content')

<form method="POST" action="{{url('pruebas')}}" autocomplete="off" enctype="multipart/form-data">
  {{csrf_field() }}
  <input type="file" name="image">

  <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.value='Enviando, espere ...'; this.form.submit();">Aceptar</button>

</form>


@foreach($files as $file)
  <img src="{{ asset ('storage/'. $file->path)}}" alt="" class="img-responsive">
  <a href="{{url('pruebas/delete')}}/1Dtnm60h8uCb3pa3PBCURUKNyYEEzWyENb0VVgf1.png">delete</a>
  <br>
@endforeach


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


