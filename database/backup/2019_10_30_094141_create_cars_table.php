<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('box');
			$table->integer('roller_id')->nullable();
			$table->integer('driver_id');
			$table->string('stnk', 200);
			$table->char('plate_number', 20);
			$table->char('jenis_kendaraan', 100);
			$table->char('car_color', 100);
			$table->date('dt_pemasangan');
			$table->text('foto_stnk', 65535);
			$table->text('foto_mobil_depan', 65535);
			$table->text('foto_mobil_samping', 65535);
			$table->text('foto_driver', 65535);
			$table->enum('vehicle_types', array('car','motorcycle'))->default('car');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cars');
	}

}
