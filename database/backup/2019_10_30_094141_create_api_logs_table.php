<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApiLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('api_logs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamp('dt')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->char('ip_address', 100);
			$table->char('url', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('api_logs');
	}

}
