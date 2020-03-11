<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoTemplateMastersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_template_masters', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('user_id')->nullable();
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
		Schema::drop('kudo_template_masters');
	}

}
