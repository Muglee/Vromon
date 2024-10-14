<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Branch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name');
            $table->string('hotel_type');
            $table->string('number_of_stars');
            $table->string('branch_country');
            $table->string('branch_city');
            $table->string('branch_location');
            $table->string('near_by_places')->nullable();
            $table->longText('branch_description');
            $table->longText('branch_house_rules');
            $table->longText('branch_policy');
            $table->string('branch_logo');
            $table->string('branch_cover_image');
            // $table->string('branch_slider_images');
            $table->longText('branch_facilities')->nullable();
            $table->integer('vendor_id');
            $table->integer('is_status_active');
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
        Schema::dropIfExists('branches');
    }
}
