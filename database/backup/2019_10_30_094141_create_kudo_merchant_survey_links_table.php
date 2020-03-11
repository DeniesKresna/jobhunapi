<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoMerchantSurveyLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_merchant_survey_links', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('merchant_group_id');
			$table->integer('survey_root_id');
			$table->boolean('ordering')->default(0);
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_merchant_survey_links');
	}

}
