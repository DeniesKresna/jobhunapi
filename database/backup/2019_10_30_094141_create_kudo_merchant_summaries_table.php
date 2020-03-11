<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoMerchantSummariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_merchant_summaries', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('dt');
			$table->integer('merchant_id');
			$table->timestamp('last_on')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('last_off')->default('0000-00-00 00:00:00');
			$table->string('total_air_time', 200);
			$table->string('total_plugged_time', 200);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_merchant_summaries');
	}

}
