<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDignosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dignosticos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_form');
            $table->string('curp');
            $table->string('estandar');
            $table->string('estatus');
            $table->string('calificacion');
            $table->string('n_intento');
            $table->string('link');
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
        Schema::dropIfExists('dignosticos');
    }
}
