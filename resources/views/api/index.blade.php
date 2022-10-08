@extends('base')
@section('content')
<div class="container">
    <div class="col-md-12 offset-md-1 info">
        <h2>Introducción</h2>
        <p class="text-justify">
           
            Esta documentación lo ayudará a familiarizarse con ciertos recursos de la API del Icat CDMX para compartir información referente al proceso de certificación de nuestros usuarios con el objetivo de generar un listado de las personas competentes dentro de los diferentes sectores productivos registrados en nuestra plataforma.
            <br><br>
            Es Importante mencionar que todas las solicitudes son a través de método GET y devolverá una respuesta de datos en formato json.


        </p>
        <p class="text-justify">Con el siguiente ejemplo puedes obtener la colección de datos relacionada con el sector productivo consultado y la personas competentes dentro de este sector, esto lo puedes consultar utilizando el nombre del sector como parámetro:<span class="text-success">/Transporte</span>
        </p>

        <div class="">
            <div class="bg-code">
                <p class="url-code">
                    <a href="{{url('/')}}/api/perfiles/Transporte" target="_blank">
                      <span class="method">GET</span> {{url('/')}}/api/perfiles/<span class="params">Transporte</span>
                    </a>
                </p>
                <hr>
                <pre class="code bg-code">
                data [
                    0{
                        id:  27
                        curp:    "XXXXXXXXXXXXXXXXXX"
                        estandar:    "EC1331"
                        sector:  "Transporte"
                        estatus: "Competente"
                        constancia:  "https://icatcdmx.mx/sii/…ia/XXXXXXXXXXXXXXXXXX/27"
                        user_nombre: "Joe"
                        user_app:    "Doe"
                        user_apm:    "Doe"
                        user_edad:   "21"
                        user_sexo:   "Hombre"
                        user_telefono:   "5555555555"
                        user_email:  "Joe@hotmail.com"
                        user_academico:  "Bachillerato Concluida"
                        user_productivo: "Transporte"
                        user_cp: "07110"
                    }
                ]
                    
   

                </pre>
            </div>
            <span class="bg-danger params">Nota: el uso de variables para la identificación de parámetros no es necesarios en las solicitudes, por lo que se recomienda no utilizar la nomenclatura "{{url('/')}}/api/perfiles/?variable=valor".</span>
            <div class="schema-info">
                <h4>Esquema de registros</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Tipo</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>id</td>
                            <td>number</td>
                            <td>Identificador autoincrementable del proceso de certificación</td>
                        </tr>
                        <tr>
                            <td>curp</td>
                            <td>string</td>
                            <td>Clave Única de Registro de Población del candidatos</td>
                        </tr>
                        <tr>
                            <td>estandar</td>
                            <td>string</td>
                            <td>Identificador del estándar de competencias</td>
                        </tr>
                        <tr>
                            <td>sector</td>
                            <td>string</td>
                            <td>Sector productivo al que pertenece el estándar (relacionado directamente con la consulta)</td>
                        </tr>
                        <tr>
                            <td>estatus</td>
                            <td>string</td>
                            <td>Estatus del proceso de certificación</td>
                        </tr>
                        <tr>
                            <td>constancia</td>
                            <td>string</td>
                            <td>Documento que valida la como competente al usuario</td>
                        </tr>
                        <tr>
                            <td>user_nombre</td>
                            <td>string</td>
                            <td>Nombre o nombres del participante</td>
                        </tr>
                        <tr>
                            <td>user_app</td>
                            <td>string</td>
                            <td>Apellido paterno del participante</td>
                        </tr>
                        <tr>
                            <td>user_apm</td>
                            <td>string</td>
                            <td>Apellido materno del participante</td>
                        </tr>
                        <tr>
                            <td>user_edad</td>
                            <td>string</td>
                            <td>Edad del particiante</td>
                        </tr>
                        <tr>
                            <td>user_sexo</td>
                            <td>string</td>
                            <td>Sexo del particiante</td>
                        </tr>
                        <tr>
                            <td>user_telefono</td>
                            <td>number</td>
                            <td>Teléfono dato de contacto del participante</td>
                        </tr>
                        <tr>
                            <td>user_email</td>
                            <td>string</td>
                            <td>Correo electrónico dato de contacto del participante</td>
                        </tr>
                        <tr>
                            <td>user_academico</td>
                            <td>string</td>
                            <td>Nivel académico del paricipante</td>
                        </tr>
                        <tr>
                            <td>user_productivo</td>
                            <td>string</td>
                            <td>Sector productivo en el que normalmente labora el participante </td>
                        </tr>
                        <tr>
                            <td>user_cp</td>
                            <td>string</td>
                            <td>Código Postal del domicilio del participante</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="status-info">
                <h4>Sectores del catálogo de certificaciones que se pueden utilizar en la consulta :</h4>
                <ul>
                    <li>Agua</li>
                    <li>Automotriz</li>
                    <li>Comercio</li>
                    <li>Construcción</li>
                    <li>Cultural</li>
                    <li>Deportivo</li>
                    <li>Financiero</li>
                    <li>Minería</li>
                    <li>Laboral</li>
                    <li>Logística</li>
                    <li>Telecomunicaciones</li>
                    <li>Social</li>
                    <li>Transporte</li>
                    <li>Turismo</li>
                    <li>Químico</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .info{
        font-size: 18px;
        padding-bottom: 60px;
    }
    .schema-info{
      margin-top: 60px;
    }
    .status-info{
      margin-top: 60px;
    }
    .bg-code{
        background: #6c757d;
    }
    .code{
        font-size: 87.5%;
        color: #fff;
        word-wrap: break-word;
    }
    .url-code{
        padding-top:20px ;

    }
    .url-code a{
        color: #cbe0f5;
        font-size: 20px;
        padding-left: 40px;
    }
    .method{
      color: #4cff8f !important;
    }
    .params{
      color: #fff;
    }
    .bold{
        font-weight: 600;
    }

</style>
@endsection

