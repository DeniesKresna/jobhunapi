<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_devices', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('user_id')->index('user_id');
			$table->integer('device_id')->index('device_id');
			$table->dateTime('dt_start');
			$table->dateTime('dt_end');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_devices');
	}

}
