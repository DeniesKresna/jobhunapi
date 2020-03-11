<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverTmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_tmp', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('plate_number', 200);
			$table->string('jenis_kendaraan', 200);
			$table->string('car_color', 200);
			$table->date('dt_pemasangan');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_tmp');
	}

}
