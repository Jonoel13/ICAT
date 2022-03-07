@extends('base')
@section('content')
<div class="col-md-12">
		<a id="search" class="search btn btn-warning" style="color:#FFF !important;">Consultar todos</a>
</div>
<div class="">

<nav>
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		<a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Perfiles con certificación</a>
		<a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
		<a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
	</div>
</nav>
<div class="tab-content" id="nav-tabContent">
  	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  		<div id='IcatCer' class="row row-cols-1 row-cols-lg-3 row-cols-md-3 g-4">
			@foreach( $userCer['data'] as $cer)
				<div class="col">
				    <div class="card mb-3">
						<img src="..." class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title"> <span class="text-uppercase">{{$cer['user_nombre']}} {{$cer['user_app']}} {{$cer['user_apm']}}</span></h5>
							<p class="card-text">
								<h5>Datos de contacto</h5>
								<ul class="list-group ">
								    <li class="list-group-item">Correo electrónico: {{$cer['user_email']}}</li>
								    <li class="list-group-item">Teléfono: {{$cer['user_telefono']}}</li>
								</ul>
								<h5>Competencias</h5>
								<ul class="list-group ">
								    <li class="list-group-item">Sector: {{$cer['sector']}}</li>
								    <li class="list-group-item">Certificación: {{$cer['estandar']}}</li>
								    <li class="list-group-item">Conprobante de ceretificación: <a href="{{$cer['constancia']}}" target="_blank">Documento</a></li>
								</ul>

							</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
  	</div>
  	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

  		<?php 	print_r($userLinea) ?>
  		<h1>Infinite Scroll v4 - button, vanilla JS</h1>

<div class="container">
  <article class="post">
    <h1>1a - Lorem ipsum dolor sit amet</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tristique mauris nec sapien efficitur, sit amet varius est interdum. Curabitur quis sem felis. Curabitur at quam sit amet mi tempor tristique quis in lorem. Cras id felis sit amet erat accumsan ornare.</p>
    <p><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/orange-tree.jpg" alt="orange-tree" /></p>
    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
    <p>Nullam vel odio nec turpis consequat iaculis at ut nibh. Nulla interdum lacus vitae sapien porttitor congue sagittis ac felis.Curabitur in ligula porttitor, varius purus sed, elementum nibh. Nunc ut libero posuere.</p>
  </article>
  <article class="post">
    <h1>1b - Ullamcorper quam at</h1>
    <p>Ullamcorper quam at, hendrerit eros. Mauris quis vehicula enim.</p>
    <p><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/cat-nose.jpg" alt="cat nose"></p>
    <p>Duis elementum nisi tortor, ut elementum quam mattis condimentum. Aenean vitae massa sit amet ligula sollicitudin venenatis. Praesent ultrices laoreet hendrerit. Duis tempus ullamcorper enim, ac volutpat augue faucibus sit amet.</p>
    <p>Donec at consequat elit. Suspendisse dignissim ante vitae urna rutrum cursus. Morbi finibus semper facilisis. In varius sem ut turpis molestie volutpat. Duis ut posuere est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis malesuada placerat luctus. In eget feugiat sapien. Sed gravida ultrices accumsan.</p>
    <p>In nec ex at mi scelerisque malesuada.</p>
    <p>Nullam arcu diam, mollis sit amet condimentum et, finibus in ex. Morbi bibendum magna vel tortor fringilla efficitur. Aliquam sed lectus lacus.</p>
  </article>
  <article class="post">
    <h1>1c - Orci varius natoque penatibus et magnis dis parturient montes</h1>
    <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In varius turpis ipsum, et porta eros eleifend ullamcorper. Sed arcu nisl, rhoncus porta fermentum in, eleifend non dolor.</p>
    <p>Mauris sagittis a lectus eu fringilla. Maecenas varius cursus aliquam.</p>
    <p>Suspendisse maximus congue augue eu venenatis. Aliquam urna purus, suscipit ut purus vel, iaculis rhoncus nulla. Donec a velit elementum, pellentesque metus blandit, lacinia erat. Fusce pulvinar mattis erat ac efficitur. Pellentesque aliquam eleifend ligula, eu ullamcorper elit pretium sit amet.</p>
    <p>Praesent placerat eros sem, vel pretium libero pharetra nec. Morbi hendrerit eleifend commodo. Morbi sodales nunc purus, consequat eleifend nulla dignissim non.</p>
  </article>
  <article class="post">
    <h1>1d - Donec a urna in turpis maximus</h1>
    <p>Donec a urna in turpis maximus faucibus a nec mauris.</p>
    <p>Donec iaculis, justo a egestas venenatis, dui nisl faucibus urna, sit amet condimentum quam dui ut libero. Etiam aliquet urna quis nisi aliquam, vitae tincidunt est feugiat.</p>
    <p>Integer viverra at arcu quis faucibus. Praesent nec venenatis odio. Donec non mattis massa, quis vestibulum leo. Etiam eleifend diam ac magna egestas aliquam. Sed vulputate risus eget efficitur auctor. Mauris aliquam ac purus at semper. Praesent vulputate hendrerit eros, vitae semper turpis venenatis et. Proin et est felis. Etiam sem risus, elementum id cursus quis, laoreet quis orci. Cras eget fermentum lorem, vitae pharetra augue. Etiam tincidunt nulla faucibus, egestas lacus sed, semper metus.</p>
  </article>
  <article class="post">
    <h1>1e - Donec a urna in turpis maximus</h1>
    <p>Donec a urna in turpis maximus faucibus a nec mauris.</p>
    <p>Donec iaculis, justo a egestas venenatis, dui nisl faucibus urna, sit amet condimentum quam dui ut libero. Etiam aliquet urna quis nisi aliquam, vitae tincidunt est feugiat.</p>
    <p>Integer viverra at arcu quis faucibus. Praesent nec venenatis odio. Donec non mattis massa, quis vestibulum leo. Etiam eleifend diam ac magna egestas aliquam. Sed vulputate risus eget efficitur auctor. Mauris aliquam ac purus at semper. Praesent vulputate hendrerit eros, vitae semper turpis venenatis et. Proin et est felis. Etiam sem risus, elementum id cursus quis, laoreet quis orci. Cras eget fermentum lorem, vitae pharetra augue. Etiam tincidunt nulla faucibus, egestas lacus sed, semper metus.</p>
  </article>
  <article class="post">
    <h1>1f - Donec a urna in turpis maximus</h1>
    <p>Donec a urna in turpis maximus faucibus a nec mauris.</p>
    <p>Donec iaculis, justo a egestas venenatis, dui nisl faucibus urna, sit amet condimentum quam dui ut libero. Etiam aliquet urna quis nisi aliquam, vitae tincidunt est feugiat.</p>
    <p>Integer viverra at arcu quis faucibus. Praesent nec venenatis odio. Donec non mattis massa, quis vestibulum leo. Etiam eleifend diam ac magna egestas aliquam. Sed vulputate risus eget efficitur auctor. Mauris aliquam ac purus at semper. Praesent vulputate hendrerit eros, vitae semper turpis venenatis et. Proin et est felis. Etiam sem risus, elementum id cursus quis, laoreet quis orci. Cras eget fermentum lorem, vitae pharetra augue. Etiam tincidunt nulla faucibus, egestas lacus sed, semper metus.</p>
  </article>
  <article class="post">
    <h1>1g - Donec a urna in turpis maximus</h1>
    <p>Donec a urna in turpis maximus faucibus a nec mauris.</p>
    <p>Donec iaculis, justo a egestas venenatis, dui nisl faucibus urna, sit amet condimentum quam dui ut libero. Etiam aliquet urna quis nisi aliquam, vitae tincidunt est feugiat.</p>
    <p>Integer viverra at arcu quis faucibus. Praesent nec venenatis odio. Donec non mattis massa, quis vestibulum leo. Etiam eleifend diam ac magna egestas aliquam. Sed vulputate risus eget efficitur auctor. Mauris aliquam ac purus at semper. Praesent vulputate hendrerit eros, vitae semper turpis venenatis et. Proin et est felis. Etiam sem risus, elementum id cursus quis, laoreet quis orci. Cras eget fermentum lorem, vitae pharetra augue. Etiam tincidunt nulla faucibus, egestas lacus sed, semper metus.</p>
  </article>
  <article class="post">
    <h1>1h - Donec a urna in turpis maximus</h1>
    <p>Donec a urna in turpis maximus faucibus a nec mauris.</p>
    <p>Donec iaculis, justo a egestas venenatis, dui nisl faucibus urna, sit amet condimentum quam dui ut libero. Etiam aliquet urna quis nisi aliquam, vitae tincidunt est feugiat.</p>
    <p>Integer viverra at arcu quis faucibus. Praesent nec venenatis odio. Donec non mattis massa, quis vestibulum leo. Etiam eleifend diam ac magna egestas aliquam. Sed vulputate risus eget efficitur auctor. Mauris aliquam ac purus at semper. Praesent vulputate hendrerit eros, vitae semper turpis venenatis et. Proin et est felis. Etiam sem risus, elementum id cursus quis, laoreet quis orci. Cras eget fermentum lorem, vitae pharetra augue. Etiam tincidunt nulla faucibus, egestas lacus sed, semper metus.</p>
  </article>
  <article class="post">
    <h1>1i - Donec a urna in turpis maximus</h1>
    <p>Donec a urna in turpis maximus faucibus a nec mauris.</p>
    <p>Donec iaculis, justo a egestas venenatis, dui nisl faucibus urna, sit amet condimentum quam dui ut libero. Etiam aliquet urna quis nisi aliquam, vitae tincidunt est feugiat.</p>
    <p>Integer viverra at arcu quis faucibus. Praesent nec venenatis odio. Donec non mattis massa, quis vestibulum leo. Etiam eleifend diam ac magna egestas aliquam. Sed vulputate risus eget efficitur auctor. Mauris aliquam ac purus at semper. Praesent vulputate hendrerit eros, vitae semper turpis venenatis et. Proin et est felis. Etiam sem risus, elementum id cursus quis, laoreet quis orci. Cras eget fermentum lorem, vitae pharetra augue. Etiam tincidunt nulla faucibus, egestas lacus sed, semper metus.</p>
  </article>
  <article class="post">
    <h1>1j - Donec a urna in turpis maximus</h1>
    <p>Donec a urna in turpis maximus faucibus a nec mauris.</p>
    <p>Donec iaculis, justo a egestas venenatis, dui nisl faucibus urna, sit amet condimentum quam dui ut libero. Etiam aliquet urna quis nisi aliquam, vitae tincidunt est feugiat.</p>
    <p>Integer viverra at arcu quis faucibus. Praesent nec venenatis odio. Donec non mattis massa, quis vestibulum leo. Etiam eleifend diam ac magna egestas aliquam. Sed vulputate risus eget efficitur auctor. Mauris aliquam ac purus at semper. Praesent vulputate hendrerit eros, vitae semper turpis venenatis et. Proin et est felis. Etiam sem risus, elementum id cursus quis, laoreet quis orci. Cras eget fermentum lorem, vitae pharetra augue. Etiam tincidunt nulla faucibus, egestas lacus sed, semper metus.</p>
  </article>
  <article class="post">
    <h1>k - Donec a urna in turpis maximus</h1>
    <p>Donec a urna in turpis maximus faucibus a nec mauris.</p>
    <p>Donec iaculis, justo a egestas venenatis, dui nisl faucibus urna, sit amet condimentum quam dui ut libero. Etiam aliquet urna quis nisi aliquam, vitae tincidunt est feugiat.</p>
    <p>Integer viverra at arcu quis faucibus. Praesent nec venenatis odio. Donec non mattis massa, quis vestibulum leo. Etiam eleifend diam ac magna egestas aliquam. Sed vulputate risus eget efficitur auctor. Mauris aliquam ac purus at semper. Praesent vulputate hendrerit eros, vitae semper turpis venenatis et. Proin et est felis. Etiam sem risus, elementum id cursus quis, laoreet quis orci. Cras eget fermentum lorem, vitae pharetra augue. Etiam tincidunt nulla faucibus, egestas lacus sed, semper metus.</p>
  </article>
  <article class="post">
    <h1>1x - Donec a urna in turpis maximus</h1>
    <p>Donec a urna in turpis maximus faucibus a nec mauris.</p>
    <p>Donec iaculis, justo a egestas venenatis, dui nisl faucibus urna, sit amet condimentum quam dui ut libero. Etiam aliquet urna quis nisi aliquam, vitae tincidunt est feugiat.</p>
    <p>Integer viverra at arcu quis faucibus. Praesent nec venenatis odio. Donec non mattis massa, quis vestibulum leo. Etiam eleifend diam ac magna egestas aliquam. Sed vulputate risus eget efficitur auctor. Mauris aliquam ac purus at semper. Praesent vulputate hendrerit eros, vitae semper turpis venenatis et. Proin et est felis. Etiam sem risus, elementum id cursus quis, laoreet quis orci. Cras eget fermentum lorem, vitae pharetra augue. Etiam tincidunt nulla faucibus, egestas lacus sed, semper metus.</p>
  </article>
</div>

<div class="page-load-status">
  <div class="loader-ellips infinite-scroll-request">
    <span class="loader-ellips__dot"></span>
    <span class="loader-ellips__dot"></span>
    <span class="loader-ellips__dot"></span>
    <span class="loader-ellips__dot"></span>
  </div>
  <p class="infinite-scroll-last">End of content</p>
  <p class="infinite-scroll-error">No more pages to load</p>
</div>

<p><button class="view-more-button">View more</button></p>



  	</div>
  	<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">.3..</div>
</div>




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
