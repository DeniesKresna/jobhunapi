<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_templates', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('user_id');
			$table->string('name', 200)->nullable();
			$table->integer('timeout')->nullable();
			$table->text('photo_file', 65535)->nullable();
			$table->string('type', 200)->default('normal');
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
		Schema::drop('kudo_templates');
	}

}
