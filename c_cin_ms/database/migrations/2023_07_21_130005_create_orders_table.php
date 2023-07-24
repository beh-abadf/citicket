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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('who_ordered_id')->index();
            $table->string('who_ordered_name', '50');
            $table->unsignedBigInteger('film_id')->index();
            $table->string('order_name', '50');
            $table->string('time_of_film', '8');
            $table->string('date_created');
            $table->string('day_created');
            $table->string('time_created');
            //$table->unsignedBigInteger('who_created');
           // $table->unsignedBigInteger('who_updated');
            $table->string('date_updated')->nullable();
            $table->string('day_updated')->nullable();
            $table->string('time_updated')->nullable();
            $table->timestamps();

            //Relation
            $table->foreign('who_ordered_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // $table->foreign('film_id')
            //     ->references('id')
            //     ->on('films')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
