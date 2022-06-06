<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlianzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alianzas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alianza_proyecto');
            $table->string('alianza_dependencia');
            $table->string('alianza_nom_convenio');
            $table->string('alianza_tipo');
            $table->date('alianza_fecha_inicio');
            $table->date('alianza_fecha_termino');
            $table->string('alianza_urlpdf');
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
        Schema::dropIfExists('alianzas');
    }
}
