<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoLinkTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_link_templates', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('kudo_id');
			$table->integer('kudo_template_id');
			$table->string('status', 15);
			$table->integer('template_number');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_link_templates');
	}

}
