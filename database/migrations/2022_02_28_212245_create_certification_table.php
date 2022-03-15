<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('curp');
            $table->string('estandar');
            $table->string('sector');
            $table->string('estatus');
            $table->string('calificacion');
            $table->string('fecha');
            $table->string('n_intento');
            $table->string('vigencia');
            $table->string('pago');
            $table->longText('diagnostico');
            $table->string('diagnostico_status');
            $table->string('link_documentacion');
            $table->string('documento');
            $table->string('constancia');
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
        Schema::dropIfExists('certification');
    }
}
