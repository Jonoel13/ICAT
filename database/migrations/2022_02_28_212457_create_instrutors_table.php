<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('instructor_name');
            $table->string('instructor_app');
            $table->string('instructor_apm');
            $table->integer('instructor_age');
            $table->string('instructor_phone');
            $table->string('instructor_email');
            $table->string('instructor_curp');
            $table->string('instructor_rfc');
            $table->longText('instructor_direc_factura');
            $table->string('instructor_cv');
            $table->string('instructor_consultoria');
            $table->string('instructor_estudios');
            $table->string('instructor_estudios_doc');
            $table->string('instructor_sector');
            $table->longText('instructor_courses');
            $table->longText('instructor_certifications');
            $table->string('instructor_summary');
            $table->integer('instructor_operation_year');
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
        Schema::dropIfExists('instructors');
    }
}
