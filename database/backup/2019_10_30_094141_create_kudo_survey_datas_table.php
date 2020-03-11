<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoSurveyDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_survey_datas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('kudo_form_id');
			$table->string('voucher_code', 200)->nullable();
			$table->integer('promo_qty')->nullable();
			$table->integer('price')->default(0);
			$table->string('phone', 20)->nullable();
			$table->string('imei', 200);
			$table->enum('status', array('verified','expired','',''));
			$table->text('data', 65535);
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
		Schema::drop('kudo_survey_datas');
	}

}
