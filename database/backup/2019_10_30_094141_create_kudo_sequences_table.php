<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoSequencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_sequences', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('kudo_template_detail_id');
			$table->integer('kudo_file_id');
			$table->integer('sequence_no');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_sequences');
	}

}
