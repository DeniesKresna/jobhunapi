<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSurveyRootDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survey_root_datas', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('user_id');
			$table->text('name', 65535);
			$table->text('description', 65535);
			$table->text('logo', 65535);
			$table->text('background_default', 65535)->nullable();
			$table->text('background_success', 65535)->nullable();
			$table->text('background_failed', 65535)->nullable();
			$table->text('other_data', 65535);
			$table->text('voucher_code', 65535);
			$table->integer('price')->default(0);
			$table->string('phone_number', 20);
			$table->integer('promo_phone_limitation');
			$table->text('html', 65535);
			$table->text('css', 65535);
			$table->text('javascript', 65535);
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
		Schema::drop('survey_root_datas');
	}

}
