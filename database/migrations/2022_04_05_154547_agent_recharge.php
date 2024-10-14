<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgentRecharge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_recharges', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('method');
            $table->string('amount');
            $table->string('account_name');
            $table->string('date_of_payment');
            $table->string('bank_ref_number');
            $table->string('message');
            $table->integer('agent_id');
            $table->integer('request_status');
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
        Schema::dropIfExists('agent_recharges');

    }
}
