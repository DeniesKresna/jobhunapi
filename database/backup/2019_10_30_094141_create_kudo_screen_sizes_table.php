<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoScreenSizesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_screen_sizes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('height')->default(1920);
			$table->integer('width')->default(1128);
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
		Schema::drop('kudo_screen_sizes');
	}

}
