<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_tokens', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamp('dt_added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->char('token', 20)->index('token');
			$table->integer('driver_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_tokens');
	}

}
