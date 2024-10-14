<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Room extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_name');
            $table->string('room_type');
            $table->string('bed_distribution')->nullable();
            $table->string('no_of_person')->nullable();
            $table->longText('room_facilities')->nullable();
            $table->string('room_image');
            $table->integer('room_price');
            $table->integer('branch_id');
            $table->integer('vendor_id');
            $table->integer('refund_policy')->nullable();
            $table->integer('is_status_active');
            $table->integer('is_room_booked');
            $table->timestamps();
            // $table->integer('vendor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
