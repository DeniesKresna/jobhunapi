<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverAlertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_alerts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('driver_id')->nullable();
			$table->integer('kudo_id')->nullable();
			$table->dateTime('dt');
			$table->string('type', 50);
			$table->string('subject', 200);
			$table->text('content', 65535);
			$table->integer('admin_id');
			$table->boolean('read');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_alerts');
	}

}
