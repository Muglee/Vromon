<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BookedRecoeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('came_form');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('nid_number');
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->text('reason')->nullable();
            $table->integer('paid_amount');
            $table->integer('room_id');
            $table->integer('vendor_id');
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
        Schema::dropIfExists('booked_records');
    }
}
