<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('book_id')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->string('airline')->nullable();
            $table->string('pnr')->nullable();
            $table->string('api_book_id')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('amount')->nullable();
            $table->string('refundable')->nullable();
            $table->string('status')->nullable();
            $table->string('date')->nullable();
            $table->string('lead_pax')->nullable();
            $table->string('booked_on')->nullable();
            $table->string('lti')->nullable();
            $table->string('booked_by')->nullable();
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
        Schema::dropIfExists('infos');
    }
}
