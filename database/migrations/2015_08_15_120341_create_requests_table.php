<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request',function(Blueprint $table){
            $table->increments('requestid');
            $table->string('request');
            $table->string('requestip');
            $table->string('requestcountry');
            $table->string('requestcity');
            $table->string('requesttimezone');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('request');
    }
}
