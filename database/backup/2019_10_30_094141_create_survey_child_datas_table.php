<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSurveyChildDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survey_child_datas', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('user_id');
			$table->text('name', 65535);
			$table->text('description', 65535);
			$table->text('background_left', 65535)->nullable();
			$table->text('background_right', 65535)->nullable();
			$table->text('html', 65535);
			$table->text('json_form', 65535);
			$table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('survey_child_datas');
	}

}
