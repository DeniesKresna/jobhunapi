<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverGpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_gps', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id');
			$table->dateTime('dt_added');
			$table->float('lat', 12, 6);
			$table->float('lng', 12, 6);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_gps');
	}

}
