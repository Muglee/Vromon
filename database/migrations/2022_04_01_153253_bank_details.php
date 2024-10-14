<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BankDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_details', function (Blueprint $table)
        {
            $table->id();
            $table->string('banck_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_ac_name')->nullable();
            $table->string('bank_ac_no')->nullable();
            $table->string('bank_routing_number')->nullable();
            $table->string('account_type')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('bank_details');
    }
}
