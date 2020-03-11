<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_files', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->nullable()->default(25);
			$table->string('file_name', 200);
			$table->text('file_url', 65535);
			$table->string('data_type', 100);
			$table->text('label_text', 65535);
			$table->boolean('status');
			$table->timestamp('dt_added')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_files');
	}

}
