<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRawDriverDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('raw_driver_data', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->char('led', 100);
			$table->char('sn', 100);
			$table->char('simcard', 100);
			$table->char('simcard_sn', 100);
			$table->char('plate_number', 100);
			$table->char('name', 100);
			$table->char('handphone', 100);
			$table->char('ktp', 100);
			$table->char('stnk', 100);
			$table->text('address', 65535);
			$table->char('type', 100);
			$table->char('color', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('raw_driver_data');
	}

}
