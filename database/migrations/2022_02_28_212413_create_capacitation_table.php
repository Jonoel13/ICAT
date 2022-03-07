<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacitation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('curp');
            $table->string('estandar');
            $table->string('modalidad');
            $table->string('grupo');
            $table->string('sede');
            $table->string('estatus');
            $table->string('calificacion');
            $table->string('asistencia');
            $table->date('fecha');
            $table->string('pago');
            $table->longText('diagnostico');
            $table->string('diagnostico_status');
            $table->string('link_documentacion');
            $table->longText('documento');
            $table->longText('constancia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capacitation');
    }
}
