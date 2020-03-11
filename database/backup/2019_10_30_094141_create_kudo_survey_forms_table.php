<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoSurveyFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_survey_forms', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->boolean('require_otp')->default(0);
			$table->char('kudo_voucher_code', 200)->nullable();
			$table->string('kudo_phone_number', 20);
			$table->string('name', 200);
			$table->text('logo', 65535)->nullable();
			$table->string('background', 200)->nullable();
			$table->text('description', 65535);
			$table->text('form_html', 65535);
			$table->text('background_success', 65535);
			$table->text('background_failed', 65535);
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
		Schema::drop('kudo_survey_forms');
	}

}
