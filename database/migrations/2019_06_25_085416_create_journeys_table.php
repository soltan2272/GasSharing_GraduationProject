<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('to');
            $table->string('from');
            $table->text('addressdetails');
            $table->time('time');
            $table->date('date');
            $table->text('moredetails');
            $table->double('price');
            $table->integer('carid');
            $table->integer('userid');
            $table->string('status');
            $table->string('message')->nullable();
            /* $table->foreign('userid')->references('id')->on('users');
             $table->foreign('carid')->references('id')->on('cars');*/
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
        Schema::dropIfExists('journeys');
    }
}
