<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliverableToStandardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('standard', function (Blueprint $table) {
            $table->longText('deliverables')->after('documentation');
            $table->longText('p_evaluation')->after('documentation');
            $table->longText('description')->change();
            $table->longText('documentation')->change();
            $table->longText('cert_material')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('standard', function (Blueprint $table) {
            $table->dropColumn('deliverables');
            $table->dropColumn('p_evaluation');
        });
    }
}
