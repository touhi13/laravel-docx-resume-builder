<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('description');
            $table->text('biography');
            $table->string('subDomainPrefix')->unique();
            $table->string('phoneNumber')->unique();
            $table->text('achievement');
            $table->string('bmDcNumber')->unique();
            $table->string('department');
            $table->text('specialityDescription');
            $table->string('facebookLink')->nullable();
            $table->string('LinkedInLink')->nullable();
            $table->string('youtubeLink')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
