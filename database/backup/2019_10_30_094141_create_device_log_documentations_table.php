<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceLogDocumentationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('device_log_documentations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('device_log_id');
			$table->text('desc', 65535)->nullable();
			$table->text('photo', 65535);
			$table->dateTime('dt_added');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('device_log_documentations');
	}

}
