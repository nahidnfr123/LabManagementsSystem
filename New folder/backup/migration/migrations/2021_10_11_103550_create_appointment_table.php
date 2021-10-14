<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->integer('appointment_no')->nullable();//auto generated number
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->double('cost', 10, 2);
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); /// user
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
        Schema::dropIfExists('appointment');
    }
}
