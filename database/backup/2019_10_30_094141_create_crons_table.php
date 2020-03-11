<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCronsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crons', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamp('dt')->default(DB::raw('CURRENT_TIMESTAMP'))->index('dt');
			$table->char('url', 100);
			$table->boolean('completed');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crons');
	}

}
