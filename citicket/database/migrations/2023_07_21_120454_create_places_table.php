<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id();
            $table->string('name', '50');
            $table->mediumText('address');
            $table->longText('google_map_iframe')->nullable();
            $table->string('capacity', '50');
            $table->string('cinema_image_name', '50');
            $table->unsignedBigInteger('province_id')->index();
            $table->unsignedBigInteger('city_id')->index();
           // $table->unsignedBigInteger('who_created');
           // $table->unsignedBigInteger('who_updated');
            $table->string('date_created');
            $table->string('day_created');
            $table->string('time_created');
            $table->string('date_updated')->nullable();
            $table->string('day_updated')->nullable();
            $table->string('time_updated')->nullable();
            $table->timestamps();

            //Relations
            $table->foreign('city_id')
            ->references('id')
            ->on('cities')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table
            ->foreign('province_id')
            ->references('id')
            ->on('provinces')
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
        Schema::dropIfExists('cinemas');
    }
};
