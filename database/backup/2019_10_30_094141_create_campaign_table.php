<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaign', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 500)->nullable();
			$table->integer('active')->nullable()->default(0);
			$table->timestamp('dt_added')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('group_name', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campaign');
	}

}
