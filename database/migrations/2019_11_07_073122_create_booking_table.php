<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->bigIncrements('id');
                $table->Date('date');
                $table->time('start_time');
                $table->time('end_time');
                $table->string('plate_number');
                $table->set('booking_state', ['active', 'expired'])->default('active');
                $table->string('username');
                $table->foreign('username')->references('username')->on('user');
                $table->unsignedBigInteger('parking_id');
                $table->foreign('parking_id')->references('id')->on('parking_lot');
                $table->string('slot_number');
                $table->foreign('slot_number')->references('slot_number')->on('parking_slot');
              
                $table->set('history', [0, 1])->default(0);
                $table->unsignedBigInteger('payment_id');
                $table->foreign('payment_id')->references('id')->on('payment');
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
        Schema::dropIfExists('booking');
    }
}
