<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoAlertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_alerts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('kudo_id')->nullable();
			$table->timestamp('dt')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('type', 50);
			$table->string('subject', 200);
			$table->text('content', 65535);
			$table->integer('admin_id');
			$table->boolean('read')->default(0);
			$table->integer('interval_time');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_alerts');
	}

}
