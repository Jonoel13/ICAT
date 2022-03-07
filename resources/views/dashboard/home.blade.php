@extends('base')
@section('content')
<!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title-home {
                font-size: 84px;
                font-family: 'Source Sans Pro', sans-serif;
            }

            .links {
                color: #636b6f;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                
            }

            .m-b-md {
                font-weight: 600;
                margin-bottom: 30px;
            }
        </style>
<div class="col-md-12 form-info">
    <p class="form-text-info">
      Para iniciar da clic en perfil
    </p>
</div>
<div class="flex-center  ">
    <div class="content"> 
        <div>
            <img  class="col-md-6" src="https://drive.google.com/uc?export=view&amp;id=1AZwbTU-fu_1bhsVyLSia7v8pfrlxzoPn">
        </div>
        <div class="">
            <img class="img-responsive" src="https://drive.google.com/uc?export=view&amp;id=1wTmMiq4NYH-IW3caSq6tlAM-EfQiqpG4" id="yui_3_17_2_1_1628641436187_71" style="width:100%;">
        </div>
        <div class="m-b-md flex-center">
            <p class="col-md-8">
                Somos una institución avalada por la Secretaría de Educación Pública como centro de
            capacitación para y en el trabajo, así como una entidad de certificación y evaluación de
            competencias laborales.
            </p>
            
        </div>
    </div>
</div>
@endsection
