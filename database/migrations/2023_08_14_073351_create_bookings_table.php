<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
			$table->integer('workshop_id')->index('fk_bookings_workshops_idx');
			$table->integer('motorcycle_id')->index('fk_bookings_motorcycles_idx');
			$table->integer('user_id')->index('fk_bookings_users_idx');
            $table->bigInteger('booking_number');
            $table->date('book_date');
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
        Schema::dropIfExists('bookings');
    }
}
