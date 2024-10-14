<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddToInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infos', function (Blueprint $table) {
          
            $table->string('duration')->nullable();
            $table->string('arrival_time')->nullable(); 
            $table->string('departure_time')->nullable(); 
            $table->bigInteger('flight_no')->nullable();  
            $table->bigInteger('aircraft')->nullable(); 
            $table->string('class')->nullable(); 
            $table->string('f_name')->nullable();  
            $table->string('l_name')->nullable();  
            $table->string('baggage')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_to_infos');
    }
}
