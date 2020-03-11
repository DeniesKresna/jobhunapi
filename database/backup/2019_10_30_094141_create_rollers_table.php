<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRollersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rollers', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('imei', 200);
			$table->string('device', 200);
			$table->text('topic', 65535)->nullable();
			$table->string('commands');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rollers');
	}

}
