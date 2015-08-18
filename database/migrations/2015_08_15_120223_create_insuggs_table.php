<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuggsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/**
		 * Blueprint $table
		 */
		Schema::create('insugg', function (Blueprint $table) {
			$table->increments('insuggid');
			$table->string('insuggtitle');
			$table->string('insuggcontent');
			$table->string('requestIp');
			$table->integer('userid')->nullable();
			$table->integer('whom_userid')->nullable();
			$table->boolean('is_active');
			$table->boolean('is_private');
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
		Schema::drop('insugg');
	}
}
