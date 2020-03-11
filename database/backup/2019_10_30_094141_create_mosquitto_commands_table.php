<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMosquittoCommandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mosquitto_commands', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('roller_id');
			$table->text('topic', 65535);
			$table->string('commands', 100);
			$table->dateTime('dt_added');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mosquitto_commands');
	}

}
