<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowBookingSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_booking_seats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('show_booking_id');
            $table->unsignedInteger('seat_maser_id');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('show_booking_id')->references('id')->on('show_bookings')->onDelete('cascade');
            $table->foreign('seat_maser_id')->references('id')->on('seat_masers')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('show_booking_seats');
    }
}
