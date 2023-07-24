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
        Schema::create('film_place', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id')->index();
            $table->unsignedBigInteger('place_id')->index();
            $table->string('salon','50');
            $table->date('date');
            $table->string('day');
            $table->time('time');
            $table->timestamps();

            $table->foreign('film_id')
            ->references('id')
            ->on('films')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('place_id')
            ->references('id')
            ->on('places')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('film_place');
    }
};
