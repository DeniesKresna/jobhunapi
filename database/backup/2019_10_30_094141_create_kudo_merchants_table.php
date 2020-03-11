<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoMerchantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_merchants', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('kudo_id');
			$table->text('name', 65535)->nullable();
			$table->text('description', 65535)->nullable();
			$table->integer('last_kudo_id');
			$table->integer('merchant_group_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_merchants');
	}

}
