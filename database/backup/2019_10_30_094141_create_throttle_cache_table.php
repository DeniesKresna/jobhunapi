<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateThrottleCacheTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('throttle_cache', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('user_id');
			$table->timestamp('start')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('count')->default(1);
			$table->text('data', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('throttle_cache');
	}

}
