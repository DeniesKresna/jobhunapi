<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRawDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('raw_datas', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->timestamp('dt')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('content', 65535);
			$table->char('cardId', 100);
			$table->char('lat', 100);
			$table->char('lng', 100);
			$table->char('screen', 20);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('raw_datas');
	}

}
