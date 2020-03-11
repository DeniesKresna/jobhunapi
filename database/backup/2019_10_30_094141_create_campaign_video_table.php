<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignVideoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaign_video', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('campaign_id')->nullable();
			$table->integer('video_id')->nullable();
			$table->integer('ordering')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campaign_video');
	}

}
