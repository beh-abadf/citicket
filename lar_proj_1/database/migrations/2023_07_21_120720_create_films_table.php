<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('film_name', '50');
            $table->string('running_time', '50');
            $table->string('director_name', '50');
            $table->string('ex_producer', '50');
            $table->string('day', '50');
            $table->string('time', '50');
            $table->longText('more_about');
            $table->string('country', '50');
            $table->string('language', '50');
            $table->string('price_of_film', '50');
            $table->longText('film_iframe');
            $table->text('film_poster_name');
            $table->string('salon', '255');
            $table->string('film_of_ids', '255');
            $table->string('date_created');
            $table->string('day_created');
            $table->string('time_created');
           // $table->unsignedBigInteger('who_created');
           // $table->unsignedBigInteger('who_updated');
            $table->string('date_updated')->nullable();
            $table->string('day_updated')->nullable();
            $table->string('time_updated')->nullable();
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
        Schema::dropIfExists('films');
    }
};
