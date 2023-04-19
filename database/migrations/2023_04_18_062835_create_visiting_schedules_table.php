<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visiting_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->string('organizationName');
            $table->string('orgPhone');
            $table->string('orgEmail');
            $table->text('orgAddress');
            $table->string('division');
            $table->string('district');
            $table->string('area');
            $table->string('position');
            $table->time('visitingTimeFrom')->nullable();
            $table->time('visitingTimeTo')->nullable();
            $table->string('appointmentPhoneNumber');
            $table->timestamps();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visiting_schedules');
    }
}
