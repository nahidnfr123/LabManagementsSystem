<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            // $table->increments('id');
            // $table->integer('appointment_no');//FK
            //     $table->foreign('appointment_no')
            //         ->references('appointment_no')
            //         ->on('appointment')
            //         ->onDelete('cascade');
            // $table->integer('lab_test_id');//FK
            //     $table->foreign('lab_test_id')
            //         ->references('id')
            //         ->on('lab_test')
            //         ->onDelete('cascade');
            // //pdf report
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
