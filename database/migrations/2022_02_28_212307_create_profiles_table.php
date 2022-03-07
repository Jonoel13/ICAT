<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_nombre');
            $table->string('user_app');
            $table->string('user_apm');
            $table->string('user_curp');
            $table->string('user_edad');
            $table->string('user_sexo');
            $table->string('user_calle');
            $table->string('user_colonia');
            $table->string('user_alcaldia');
            $table->string('user_estado');
            $table->string('user_cp');
            $table->string('user_telefono');
            $table->string('user_email');
            $table->string('user_academico');
            $table->string('user_productivo');
            $table->string('user_indigena');
            $table->string('user_lengua');
            $table->string('user_leng_indigena');
            $table->string('user_doc_curp');
            $table->string('user_doc_id');
            $table->string('user_doc_foto');
            $table->string('user_uso_dato');
            $table->string('user_check_curp');
            $table->string('user_check_id');
            $table->string('user_check_foto');
            $table->string('user_check_ok');
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
        Schema::dropIfExists('profiles');
    }
}
