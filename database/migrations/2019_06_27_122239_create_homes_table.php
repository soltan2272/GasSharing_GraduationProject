<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('admin');

            $table->string('main_logo')->nullable();
            $table->string('small_logo')->nullable();

            $table->string('welcome_title')->nullable();
            $table->text('welcome_text')->nullable();
            $table->string('welcome_image')->nullable();

            $table->string('Animation_title1')->nullable();
            $table->string('Animation_text1')->nullable();
            $table->string('Animation_image1')->nullable();
            $table->string('Animation_title2')->nullable();
            $table->string('Animation_text2')->nullable();
            $table->string('Animation_image2')->nullable();
            $table->string('Animation_title3')->nullable();
            $table->string('Animation_text3')->nullable();
            $table->string('Animation_image3')->nullable();
            $table->string('Animation_title4')->nullable();
            $table->string('Animation_text4')->nullable();
            $table->string('Animation_image4')->nullable();

            $table->string('gallary_title1')->nullable();
            $table->string('gallary_text1')->nullable();
            $table->string('gallary_image1')->nullable();
            $table->string('gallary_title2')->nullable();
            $table->string('gallary_text2')->nullable();
            $table->string('gallary_image2')->nullable();
            $table->string('gallary_title3')->nullable();
            $table->string('gallary_text3')->nullable();
            $table->string('gallary_image3')->nullable();

            $table->string('about_phone')->nullable();
            $table->string('about_email')->nullable();
            $table->string('about_facebook')->nullable();
            $table->string('about_twiteer')->nullable();
            $table->string('about_linkedin')->nullable();
            $table->string('about_youtube')->nullable();
            $table->text('who_us')->nullable();
            $table->text('mission')->nullable();
            $table->text('Vision')->nullable();

            $table->string('about_title1')->nullable();
            $table->string('about_text1')->nullable();
            $table->string('about_image1')->nullable();
            $table->string('about_title2')->nullable();
            $table->string('about_text2')->nullable();
            $table->string('about_image2')->nullable();
            $table->string('about_title3')->nullable();
            $table->string('about_text3')->nullable();
            $table->string('about_image3')->nullable();
            $table->string('about_title4')->nullable();
            $table->string('about_text4')->nullable();
            $table->string('about_image4')->nullable();
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
        Schema::dropIfExists('homes');
    }
}
