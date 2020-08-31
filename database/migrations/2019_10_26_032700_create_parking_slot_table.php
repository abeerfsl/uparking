<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingSlotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_slot', function (Blueprint $table) {
            $table->string('slot_number')->unique();
            $table->float('price')->default(0);
            $table->set('state', ['busy', 'expired'])->default('busy');
            $table->unsignedBigInteger('parking_id');
            $table->timestamps();
            $table->foreign('parking_id')->references('id')->on('parking_lot');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parking_slot');
    }
}
