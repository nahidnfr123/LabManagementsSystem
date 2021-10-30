<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('appointment_no');//auto generated number
            $table->dateTime('appointment_date')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'reject']);
            $table->double('cost', 10, 2)->nullable();
            $table->unsignedInteger('order_id')->nullable(); //auto generated number
            $table->foreignId('users_id')->constrained(); //FK
            $table->softDeletes();
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
        Schema::dropIfExists('appointments');
    }
}
