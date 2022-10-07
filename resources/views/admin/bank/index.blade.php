@extends('base')
@section('content')

<div class="card-columns">
@foreach( $userCer['data'] as $cer)
  <div class="card p-3">
    <blockquote class="blockquote mb-0 card-body">
      <p><span class="text-uppercase">{{$cer['user_nombre']}} {{$cer['user_app']}} {{$cer['user_apm']}}</span></p>
      <div class="blockquote-footer">
        <small class="text-muted">
          <b>Datos de contacto</b><cite title="Source Title"></cite>
          <br>Correo electrónico: {{$cer['user_email']}}
          <br>Teléfono: {{$cer['user_telefono']}}
        </small>
      </div>
      <div class="blockquote-footer">
        <small class="text-muted">
          <b>Competencias</b>
          <br>Sector: {{$cer['sector']}}
          <br>Certificación: {{$cer['estandar']}}
          <br>Conprobante de ceretificación: <a href="https://sii.icatadistancia.cdmx.gob.mx/documentos/constancia/{{$cer['curp']}}/{{$cer['id']}}" target="_blank">Documento</a>
        </small>
      </div>
    </blockquote>
  </div>
@endforeach 
</div>



<style type="text/css">


.post {
  border-top: 1px solid #DDD;
  margin: 60px 0;
}

.post img {
  display: block;
  max-width: 100%;
}

button {
  font-size: 20px;
  padding: 10px;
}

.page-load-status {
  display: none; /* hidden by default */
  padding-top: 20px;
  border-top: 1px solid #DDD;
  text-align: center;
  color: #777;
}

/* loader ellips in separate pen CSS */

</style>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js"></script>


<script type="text/javascript">
//-------------------------------------//
// init Infinte Scroll

let infScroll = new InfiniteScroll( '.container', {
  path: getPenPath,
  append: '.post',
  button: '.view-more-button',
  // using button, disable loading on scroll
  scrollThreshold: false,
  status: '.page-load-status',
});

//-------------------------------------//
// hack CodePen to load pens as pages

function getPenPath() {
  const nextPenSlugs = [
    '3d9a3b8092ebcf9bc4a72672b81df1ac',
    '2cde50c59ea73c47aec5bd26343ce287',
    'd83110c5f71ea23ba5800b6b1a4a95c4',
  ];

  let slug = nextPenSlugs[ this.loadCount ];
  if ( slug ) return `/desandro/debug/${slug}`;
}

</script>

<!--script type="text/javascript">

    $(document).ready(function () {

        $(document).on('click', '.search', function (e) {
            e.preventDefault();
            //var sector = $('#sector').val();
            $('#IcatLinea').html('');
            ajax1();
        });

        function ajax1() {
        	var url = "https://icatcdmx.mx/apiMoodle/profile/all";
		    $.ajax({
		        'url': url,
		        'type': 'GET',
		        //'data': {'data':sector},
		        success: function(data){ // What to do if we succeed

		            if(data == ''){
		              $('#IcatLinea').append('<span>Sin resultados</span>');
		            }
		            $.each(data, function(i, item) {
		               $('#IcatLinea').append('<div class="col">'
						+'<div class="card h-100">'
						+'<img src="..." class="card-img-top" alt="...">'
						+'<div class="card-body">'
						+'<h5 class="card-title">Card title</h5>'
						+'<p class="card-text">'
						+'<span>Nombre: '+item.firstname+' '+item.lastname+'</span><br>'
						+'<span>Correo electrónio: '+item.email+'</span><br>'
						+'<span>Teléfono: '+item.phone1+'</span><br>'
						+'<span>Curso completado: '+item.fullname+'</span><br>'
						+'</p>'
						+'</div></div></div>'
					  	);


		            });
		            //console.log(data);
		        },
		        error: function(data){
		            console.log('Error'+data);
		        }
		    });
        }

        //ajax1();


    });
</script-->

@endsection
