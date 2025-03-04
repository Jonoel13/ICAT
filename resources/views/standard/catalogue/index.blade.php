@extends('base')
@section('content')
<style>
.bd-placeholder-img {
	font-size: 1.125rem;
	text-anchor: middle;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

@media (min-width: 768px) {
	.bd-placeholder-img-lg {
	  font-size: 3.5rem;
	}
}

.container {
  max-width: 960px;
}

/*
 * Custom translucent site header
 */

.site-header {
  background-color: rgba(0, 0, 0, .85);
  -webkit-backdrop-filter: saturate(180%) blur(20px);
  backdrop-filter: saturate(180%) blur(20px);
}
.site-header a {
  color: #999;
  transition: ease-in-out color .15s;
}
.site-header a:hover {
  color: #fff;
  text-decoration: none;
}

/*
 * Dummy devices (replace them with your own or something else entirely!)
 */

.product-device {
  position: absolute;
  right: 10%;
  bottom: -30%;
  width: 450px;
  height: 440px;
  background-image: url('http://drive.google.com/uc?export=view&id=1wtF_eXsPPiHBcY_0jjQgoi7ST6SGeRPh');
  border-radius: 21px;
  -webkit-transform: rotate(30deg);
  transform: rotate(30deg);
}

.product-device::before {
  position: absolute;
  top: 10%;
  right: 10px;
  bottom: 10%;
  left: 10px;
  content: "";
  background-image: url('http://drive.google.com/uc?export=view&id=1wtF_eXsPPiHBcY_0jjQgoi7ST6SGeRPh');
  border-radius: 5px;
}

.product-device-2 {
  top: -25%;
  right: auto;
  bottom: 0;
  left: 5%;
  background-color: #e5e5e5;
}


.overflow-hidden { overflow: hidden; }

.line-clamp {
  height: 70px;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.btn-outline-success{
    color: #691C32 !important;
    border-color: #691C32 !important;
}
.btn-outline-success:hover{
    background-color: #691C32 !important;
    color: #ffffff !important;
}
.navbar-brand {
  color: #691C32 !important;
  font-weight: 700;
  font-size: 30px;
}
footer{
  padding: 80px;
}

</style>
<div class="">

    <div class="row catalogue1">
      <img class="img-responsive col-md-12" src="{{ asset('storage/banner')}}/{!! Helper::homeBanner(1) !!}">
    </div>

    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="{{url('catalogo/certificaciones')}}">Certificaciones</a>
      <form class="form-inline" method="POST" action="{{url('catalogo/certificacion/buscar/curso')}}" autocomplete="off" enctype="multipart/form-data">
        {{csrf_field() }}
        <input name="filter" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </nav>

    <div class="album py-5 bg-light p-5 mt-3">
        <div class="">

          <div class="row">
            @foreach($groups as $group)
            <div class="col-md-3">
              <div class="card mb-3 shadow-sm">
                <img class="img-responsive" src="{{ asset('storage/standard')}}/{!! Helper::standarImageId($group->id_standard) !!}">
                <div class="card-body">
                  <p class="card-text">
                    <a class="text-success" href="{{url('catalogo/certificacion/')}}/{{$group->id}}">
                    <h5 class="line-clamp"><strong>{{$group->group_shortname}} </strong></h5>
                    </a>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{!! Helper::standarCONOCER($group->id_standard) !!}" class="btn btn-sm btn-outline-secondary" target="_blank">Perfil CONOCER</a>
                    </div>
                    <span class="text-muted"><a class="btn btn-sm btn-success" href="{{url('catalogo/certificacion/')}}/{{$group->id}}">Información de estándar</a></span>
                  </div> 
                </div>
              </div>
            </div>
            @endforeach
            
          </div>
          {!! $groups->render() !!}
        </div>
      </div>


    <footer class=" py-5">
      <div class="row">

      <div class="col-md-3">
          <h5>Capacitación</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="https://icatadistancia.cdmx.gob.mx/course/index.php?categoryid=2" target="_blank">Cursos en línea</a></li>
            <li><a class="text-muted" href="https://icatadistancia.cdmx.gob.mx/course/index.php?categoryid=3" target="_blank">Cursos en directo</a></li>
          </ul>
        </div>
        <div class="col-4 col-md">
          <h5>ICAT CDMX</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="https://icat.cdmx.gob.mx/" target="_blank">Instituto</a></li>
            <li><a class="text-muted" href="https://icat.cdmx.gob.mx/instituto/directorio" target="_blank">Directorio</a></li>
            <li><a class="text-muted" href="https://icat.cdmx.gob.mx/instituto/acerca-de" target="_blank">Acerca de</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          
          <h5>Redes</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="https://twitter.com/icat_cdmx" target="_blank"><i class="bi bi-twitter"></i> Twitter</a></li>
            <li><a class="text-muted" href="https://www.facebook.com/profile.php?id=100069157121461" target="_blank"><i class="bi bi-facebook"></i> Facebook</a></li>
          </ul>
          
        </div>

        <div class="col-md-3">
          <h5>Contacto</h5>
          <ul class="list-unstyled text-small">
            
            <li><span class="text-b">Correo electrónico: </span><a class="text-muted" href="mailto:ece.icatcdmx@gmail.com">ece.icatcdmx@gmail.com</a></li>
            <li>
              <span class="text-b">
                Dirección: 
              </span>
              Calzada San Antonio Abad 32, Piso 2, Colonia Tránsito, Alcaldía Cuauhtémoc C.P. 06820, Ciudad de México
            </li>
          </ul>

        </div>
        
      </div>
    </footer>

</div>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      

	


@endsection
