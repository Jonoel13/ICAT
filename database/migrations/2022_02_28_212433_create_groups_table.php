<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_standard');
            $table->string('id_allience');
            $table->string('id_place');
            $table->string('id_list_activities');
            $table->string('id_instructor');
            $table->string('group_service_type');
            $table->string('group_name');
            $table->string('group_level');
            $table->string('group_shortname');
            $table->string('group_mode');
            $table->string('group_hours');
            $table->date('group_date_init');
            $table->date('group_date_end');
            $table->string('group_min_grade');
            $table->string('group_min_asistencia');
            $table->integer('group_capacity');
            $table->string('group_documentation');
            $table->string('group_link');
            $table->string('group_private');
            $table->string('group_status');
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
        Schema::dropIfExists('groups');
    }
}
