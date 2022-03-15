@extends('layouts.adminapp')
@section('content')
<div class=" position-ref full-height">        
    <div class="container">
        <section class="row">
           
            <div class="bg-success section1">
                <p class="text-">
                    <span class="title text-b">Certifica tus</span>
                    <br>
                    <span class="subtitle">competencias laborales</span>
                </p>
                
                <div class="mt-4 mb-4">
                    <p >
                        En el Icat CDMX contamos con más de 18 estándares de competencia.
                        <span class="text-b"> Comprueba tus conocimientos obteniendo tu certificado avalado por la SEP</span>
                    </p>
                    
                </div>
                <div>
                    <p>
                        <span class="text-b text-footer">¡Empieza ahora!</span>
                        <br>
                        <a href="{{url('registro')}}" class="btn btn-md btn-scs text-b mt-3">Registrarme</a>
                    </p>
                </div>
            </div>
            
            <div class="section2">
                <img  class="" src="https://drive.google.com/uc?export=view&amp;id=1AZwbTU-fu_1bhsVyLSia7v8pfrlxzoPn" width="100%" height="100%">
                
            </div>
        </section>

        <section class="mt-5 text-center">
            <div class="">
                <p>
                    <span class="text-b text-gray text-footer-2">Conoce los 7 pasos para certificarse</span>
                </p>
                
                <img  class="col-md-6" src="https://drive.google.com/uc?export=view&amp;id=1ABR4CGI4_8sVM7kno8Ydw4SV8Kk1IMkz" >
                <br><br>

            </div>            
        </section>
    </div>
</div>
@endsection
