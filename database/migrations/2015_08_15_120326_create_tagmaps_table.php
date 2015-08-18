<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagmapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagmap',function (Blueprint $table){
            $table->integer('insuggid')->unsigned();
            $table->integer('tagid')->unsigned();
            $table->foreign('insuggid')->references('insuggid')->on('insugg');
            $table->foreign('tagid')->references('tagid')->on('tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tagmap');
    }
}
