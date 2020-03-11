<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoPlaySummariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_play_summaries', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('boxno');
			$table->string('hour', 2);
			$table->integer('kudo_id');
			$table->integer('merchant_id');
			$table->integer('merchant_group_id');
			$table->string('media_id', 200);
			$table->text('provider', 65535);
			$table->text('filename', 65535);
			$table->text('others', 65535);
			$table->integer('display_count');
			$table->integer('display_time');
			$table->date('dt');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_play_summaries');
	}

}
