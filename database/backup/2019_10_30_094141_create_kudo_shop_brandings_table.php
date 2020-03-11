<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoShopBrandingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_shop_brandings', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('dealer_id');
			$table->text('customer_code', 65535);
			$table->text('merchant', 65535);
			$table->text('city', 65535);
			$table->text('address', 65535);
			$table->text('activity_reference', 65535);
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
		Schema::drop('kudo_shop_brandings');
	}

}
