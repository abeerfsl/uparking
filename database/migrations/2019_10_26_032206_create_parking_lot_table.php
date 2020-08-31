<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingLotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_lot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parking_name');
            $table->string('parking_location')->unique();
            $table->longtext('description');
            $table->string('number_of_section');
            $table->unsignedBigInteger('users_id');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parking_lot');
    }
}
