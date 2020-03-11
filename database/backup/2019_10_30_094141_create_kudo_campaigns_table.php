<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoCampaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_campaigns', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id');
			$table->text('name', 65535)->nullable();
			$table->text('description', 65535)->nullable();
			$table->dateTime('created_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_campaigns');
	}

}
