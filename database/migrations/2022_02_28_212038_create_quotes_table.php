<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quote_access');
            $table->longText('quote_qr_id');
            $table->string('quote_date_id');
            $table->string('quote_user_name');
            $table->string('quote_user_ap_p');
            $table->string('quote_user_ap_m');
            $table->string('quote_user_curp');
            $table->string('quote_user_email');
            $table->string('quote_user_pago');
            $table->string('quote_date');
            $table->string('quote_hour');
            $table->string('quote_status');
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
        Schema::dropIfExists('quotes');
    }
}
