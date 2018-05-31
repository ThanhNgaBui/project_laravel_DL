<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->integer('hot')->nullable();
            $table->string('time')->nullable();
            $table->string('place_of_departure')->nullable();
            $table->string('day_departure')->nullable();
            $table->integer('number_of_seats')->nullable();
            $table->float('price_old', 12, 2)->nullable();
            $table->float('price_new', 12, 2)->nullable();
            $table->string('sale')->nullable();
            $table->text('schedule')->nullable();
            $table->text('information')->nullable();
            $table->string('image')->nullable();
            $table->string('search_price')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
