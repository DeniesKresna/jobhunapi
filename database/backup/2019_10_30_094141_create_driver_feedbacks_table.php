<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverFeedbacksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_feedbacks', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamp('dt_added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('driver_id');
			$table->char('subject', 200);
			$table->text('content', 65535);
			$table->enum('status', array('pending','acknowledged'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_feedbacks');
	}

}
