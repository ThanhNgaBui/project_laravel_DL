<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hot')->nullable();
            $table->integer('star')->nullable();
            $table->string('title');
            $table->text('introduce')->nullable();
            $table->text('information')->nullable();
            $table->text('table_price')->nullable();
            $table->float('price',12,2)->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('hotel_service');
    }
}
