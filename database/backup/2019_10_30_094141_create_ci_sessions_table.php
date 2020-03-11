<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCiSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ci_sessions', function(Blueprint $table)
		{
			$table->string('id', 128)->primary();
			$table->string('ip_address', 45);
			$table->integer('timestamp')->unsigned()->default(0)->index('ci_sessions_timestamp');
			$table->binary('data', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ci_sessions');
	}

}
