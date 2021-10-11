<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodBankOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_bank_order', function (Blueprint $table) {
            $table->increments('id');
            $table->date('order_date');
            $table->smallInteger('request_amount');
            $table->integer('blood_group_id');//FK
            //required blood test report
            $table->string('order_status',10);
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
        Schema::dropIfExists('blood_bank_order');
    }
}
