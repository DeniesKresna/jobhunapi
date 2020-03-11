<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_points', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id');
			$table->dateTime('dt');
			$table->integer('add_minus');
			$table->string('subject', 200);
			$table->integer('admin_id');
			$table->integer('point');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_points');
	}

}
