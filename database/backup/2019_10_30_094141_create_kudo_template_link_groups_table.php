<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoTemplateLinkGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_template_link_groups', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('kudo_template_id');
			$table->integer('kudo_template_group_id');
			$table->integer('ordering');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_template_link_groups');
	}

}
