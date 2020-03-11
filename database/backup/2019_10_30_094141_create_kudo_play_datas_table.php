<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoPlayDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_play_datas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('boxno')->nullable();
			$table->integer('kudo_id')->nullable();
			$table->integer('merchant_id')->nullable();
			$table->integer('merchant_group_id')->nullable();
			$table->string('provider', 200)->nullable();
			$table->string('media_id', 200)->nullable();
			$table->dateTime('start_timestamp')->nullable();
			$table->dateTime('end_timestamp')->nullable();
			$table->text('filename', 65535)->nullable();
			$table->text('others', 65535)->nullable();
			$table->dateTime('created_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_play_datas');
	}

}
