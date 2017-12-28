<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player')->unsigned();
            $table->integer('pledge')->unsigned()->nullable();
            
            $table->timestamps();
        });

        Schema::table('plays', function ($table) {
            $table->foreign('player')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pledge')->references('id')->on('pledges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plays');
    }
}
