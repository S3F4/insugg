<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestion',function(Blueprint $table){
            $table->increments('suggestionid');
            $table->string('suggestion');
            $table->unsignedInteger('userid');
            $table->unsignedInteger('insuggid');
            $table->string('requestIp');
            $table->boolean('is_active');
            $table->boolean('is_private');
            $table->timestamps();

/*            $table->foreign('insuggid')->references('insuggid')->on('insugg');
            $table->foreign('userid')->references('userid')->on('user');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('suggestion');
    }
}
