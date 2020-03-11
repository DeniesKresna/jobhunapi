<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceSummaryInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('device_summary_info', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->char('imei', 50);
			$table->integer('device_id');
			$table->integer('box_id')->nullable();
			$table->integer('car_id')->nullable();
			$table->integer('driver_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('device_summary_info');
	}

}
