<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoUnknownTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_unknown', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('imei', 200);
			$table->string('ip_address', 20)->nullable();
			$table->dateTime('dt');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_unknown');
	}

}
