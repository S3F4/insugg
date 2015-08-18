<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('userid');
            $table->string('userprofilephotourl')->nullable();
            $table->string('username');
            $table->string('useremail')->unique();
            $table->string('usertype');
            $table->string('password', 60);
            $table->boolean('is_active');
            $table->boolean('is_private');
            $table->string('usertimezone')->nullable();
            $table->string('usercountry')->nullable();
            $table->string('usercity')->nullable();
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
        Schema::drop('user');
    }
}
