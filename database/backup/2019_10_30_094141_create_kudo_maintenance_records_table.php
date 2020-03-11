<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoMaintenanceRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_maintenance_records', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('kudo_id');
			$table->integer('merchant_group_id');
			$table->integer('merchant_id');
			$table->text('status', 65535);
			$table->text('description', 65535);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_maintenance_records');
	}

}
