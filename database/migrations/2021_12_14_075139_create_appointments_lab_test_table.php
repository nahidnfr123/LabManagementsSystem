<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsLabTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments_lab_test', function (Blueprint $table) {
            // $table->id();
            $table->integer('app_no')->unsigned();

            $table->integer('lab_test_id')->unsigned();



            // $table->foreign('app_no')
            //     ->references('appointment_no')
            //     ->on('appointment')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // $table->foreign('lab_test_id')
            // ->references('id')
            // ->on('lab_test')
            // ->onDelete('cascade');

        });

        // Schema::create('appointments_lab_test', function (Blueprint $table) {

        //     $table->foreign('app_no')
        //         ->references('appointment_no')
        //         ->on('appointment')
        //         ->onUpdate('cascade')
        //         ->onDelete('cascade');
        //     $table->foreign('lab_test_id')
        //     ->references('id')
        //     ->on('lab_test')
        //     ->onDelete('cascade');

        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments_lab_test');
    }
}
