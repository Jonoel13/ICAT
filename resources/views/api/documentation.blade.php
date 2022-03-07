@extends('base')
@section('content')
<div class="container">
    <div class="col-md-12 offset-md-1 info">
        <h2>Introducción</h2>
        <p class="text-justify">
            Esta documentación lo ayudará a familiarizarse con ciertos recursos de la API del Icat CDMX para compartir información referente al proceso de certificación del estándar de competencia <span class="bold">EC1331 Conducción del vehículo motocicleta para su uso en la vialidad, nivel básico.</span> Es Importante mencionar que todas las solicitudes son a través de método GET y devolverán una respuesta de datos en formato json.


        </p>
        <p class="text-justify">Con el siguiente ejemplo puedes obtener la información del estatus de certificación de un candidatos de prueba agregando la CURP como parámetro:<span class="text-success">/curpdeprueba</span>
        </p>

        <div class="">
            <div class="bg-code">
                <p class="url-code">
                    <a href="{{url()}}/api/curp/curpdeprueba" target="_blank">
                      <span class="method">GET</span> {{url()}}/api/curp/<span class="params">curpdeprueba</span>
                    </a>
                </p>
                <hr>

                <pre class="code bg-code">
                [
                    {
                        curp: "curpdeprueba",
                        estatus: "Competente",
                        fecha: "07-07-2021"
                    }
                ]
                </pre>
            </div>
            <span class="bg-danger params">Nota: el uso de variables para la identificación de parámetros no es necesarios en las solicitudes, por lo que se recomienda no utilizar la nomenclatura "{{url()}}/api/curp/?variable=valor".</span>
            <div class="schema-info">
                <h4>Esquema de certificación</h4>
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
                            <td>curp</td>
                            <td>string</td>
                            <td>Clave Única de Registro de Población del candidatos</td>
                        </tr>
                        <tr>
                            <td>estatus</td>
                            <td>string</td>
                            <td>Estatus del resultado de la evaluación</td>
                        </tr>
                        <tr>
                            <td>fecha</td>
                            <td>string</td>
                            <td>Fecha de obtención de resultados de la evaluación de competencias</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="status-info">
                <h4>El campo "estatus" puede contener dos posibles resultados:</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Estatus</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Competente</td>
                            <td>El candidatos obtuvo un resultado mayor o igual al mínimo requerido en la evaluación y se considera como "Competente" en el estándar en el que fue evaluado</td>
                        </tr>
                        <tr>
                            <td>No competente</td>
                            <td>El candidatos obtuvo un resultado menor al mínimo requerido en la evaluación y se considera como "No competente" en el estándar en el que fue evaluado</td>
                        </tr>
                    </tbody>
                </table>
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

