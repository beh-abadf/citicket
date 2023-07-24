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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->mediumText('body');
            $table->unsignedBigInteger('film_id')->index();
            $table->string('date_created');
            $table->string('day_created');
            $table->string('time_created');
           // $table->unsignedBigInteger('who_created');
           // $table->unsignedBigInteger('who_updated');
            $table->string('date_updated')->nullable();
            $table->string('day_updated')->nullable();
            $table->string('time_updated')->nullable();
            $table->timestamps();

            $table->foreign('film_id')
            ->references('id')
            ->on('films')
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
        Schema::dropIfExists('comments');
    }
};
