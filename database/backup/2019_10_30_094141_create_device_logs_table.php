<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('device_logs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('device_id')->nullable();
			$table->integer('box_id')->nullable();
			$table->integer('car_id')->nullable();
			$table->integer('driver_id')->nullable();
			$table->string('plate_number', 100);
			$table->char('led_number', 200);
			$table->string('imei', 200);
			$table->string('phone', 100);
			$table->string('status', 100)->nullable();
			$table->dateTime('dt');
			$table->string('activity', 100);
			$table->text('keterangan', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('device_logs');
	}

}
