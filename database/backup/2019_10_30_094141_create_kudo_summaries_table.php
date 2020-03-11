<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoSummariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_summaries', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('dt');
			$table->string('imei', 200)->nullable();
			$table->integer('kudo_id')->nullable();
			$table->integer('device_id')->nullable();
			$table->dateTime('last_on');
			$table->dateTime('last_off');
			$table->integer('total_air_time');
			$table->text('total_bandwidth', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_summaries');
	}

}
