<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRollerImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roller_images', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('roller_id');
			$table->string('name');
			$table->string('photo');
			$table->boolean('position')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('roller_images');
	}

}
