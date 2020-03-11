<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFieldmateSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fieldmate_schedules', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('due_dt');
			$table->integer('dealer_id');
			$table->text('description', 65535);
			$table->text('json_task', 65535);
			$table->integer('total_tasks');
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
		Schema::drop('fieldmate_schedules');
	}

}
