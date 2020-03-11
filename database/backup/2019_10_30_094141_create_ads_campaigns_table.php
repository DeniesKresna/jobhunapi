<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsCampaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ads_campaigns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('user_id')->nullable();
			$table->char('name', 200);
			$table->date('start_date');
            $table->date('end_date');
            $table->char('status', 200);
            $table->timestamps();
            $table->index(["user_id","id","status"]);

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ads_campaigns');
	}

}
