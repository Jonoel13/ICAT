<style type="text/css">
	.text-b{
		font-weight: 700;
	}
</style>
Hola <span class="text-b">{{ $name }}</span>,

<div id="capture" class="row container citas canvas_div_pdf">
    <div class="row col-md-12 mb-5"> 
        <div class="col-md-6">
          <span>
          	Tu <span class="text-b">cita es el {{ $date }} a las {{ $hour }} hrs</span> en <span class="text-b">ICAT Unidad de Capacitación GAM</span> ubicada en<br>
            Cuauhtémoc 30, La Pastora, Gustavo A. Madero, 07290 Ciudad de México, CDMX
          </span>
          <br><br>
          <p>
            <span class="text-b">
              Es importante que acudas PUNTUAL, solo tendrás <span class="text-b">10 min</span> de tolerancia <span class="text-b">como máximo</span>, de no llegar a tiempo o no presentarte deberás re agendar tu cita.
            </span> 
          </p>
         <p class="mt-4">
              <span class="text-red text-b sub-title-info">Para realizar tu proceso de evaluación es indispensable presentar los siguientes documentos:</span>
            </p>
            <p class="text-gray">
            <ul class="text-gray">
              <li><span class="text-b">Identificación oficial con fotografía</span>(INE, pasaporte, cédula profesional)</li>
              <li><span class="text-b">Comprobante de pago original</span></li>
              <li><span class="text-b">Tríptico de Obligaciones y Derechos</span>
                <a href="https://drive.google.com/file/d/19EDbgfD1R_BWE6MqC8lm1Y5p9wHgnTa_/view?usp=sharing" target="_blank">(descargar e imprimir)</a>
              </li>
              <li><span class="text-b">Plan de Evaluación</span>
                <a  href="https://drive.google.com/file/d/15Dil-LdYmB9By3Z8V63PoQe6W9QsR2Ur/view?usp=sharing" target="_blank">(descargar e imprimir)</a>
              </li>
              <li><span class="text-b">Anexo 3. Hoja de inspección</span>
                <a href="https://drive.google.com/file/d/1hWPo4-NPfwemuWQpdPFqlM-YDTsDm4RT/view?usp=sharing" target="_blank">(descargar e imprimir)</a>
              </li>
            </ul>
            <p>
            <span class="text-red text-b mt-4 sub-title-info">Deberás de acudir con el siguiente equipo:</span>
            <br>
            
                <span>{{ $material }}</span>
            </p>
              <p class="footer-q">
                <span class="text-b text-green">¡Te esperamos!</span>
              </p>
          </p>
        </div>
    </div>
    <br>
</div>

<style>
    .title {
        font-size: 84px;
        font-family: 'Source Sans Pro', sans-serif;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    
    .btn-success {
        background: #fff !important;
        color: #691C32 !important;
        border-color: #691C32 !important;
    }

    .btn-success:hover{
        background: #691C32 !important;
        color: #ffffff !important;
    }
    .text-success{
        color: #691C32 !important;
    }
    .text-b{
        font-weight: 800;
    }
    .btn-scs {
        color: #fff;
        border-color: #BC955C;
        background: #BC955C;
    }

    .btn-scs:hover{
        background: #DDc9A3;
        color: #ffffff;
    }
    
</style>
