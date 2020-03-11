<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneSignalNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('one_signal_notifications', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->timestamp('dt_added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('player_ids', 65535);
			$table->integer('alert_id');
			$table->text('msg', 65535);
			$table->text('fields', 65535);
			$table->text('response', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('one_signal_notifications');
	}

}
