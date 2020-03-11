<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faqs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamp('dt_added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('question', 65535);
			$table->text('answer', 65535);
			$table->integer('ordering')->index('ordering');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('faqs');
	}

}
