<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverSummariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_summaries', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('dt');
			$table->integer('driver_id');
			$table->dateTime('last_on');
			$table->dateTime('last_off');
			$table->float('dst', 20);
			$table->integer('total_air_time');
			$table->float('avg_speed', 20);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_summaries');
	}

}
