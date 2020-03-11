<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoVideoTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_video_templates', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('name', 200);
			$table->text('photo_file', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_video_templates');
	}

}
