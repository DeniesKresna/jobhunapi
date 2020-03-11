<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoSurveyPhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_survey_phones', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('survey_root_id');
			$table->string('phone', 20);
			$table->integer('claimed');
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_survey_phones');
	}

}
