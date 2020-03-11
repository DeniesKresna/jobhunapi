<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceSummariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('device_summaries', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('dt');
			$table->char('imei', 100);
			$table->dateTime('last_on');
			$table->dateTime('last_off');
			$table->float('dst', 30);
			$table->integer('total_air_time');
			$table->float('avg_speed', 30);
			$table->unique(['dt','imei'], 'dt');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('device_summaries');
	}

}
