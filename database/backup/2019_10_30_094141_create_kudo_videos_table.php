<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoVideosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_videos', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('name', 200);
			$table->dateTime('dt_added');
			$table->integer('ordering');
			$table->text('video_file_url', 65535);
			$table->text('photo_file_url', 65535)->nullable();
			$table->boolean('active');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_videos');
	}

}
