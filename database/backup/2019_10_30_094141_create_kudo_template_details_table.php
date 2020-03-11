<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoTemplateDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_template_details', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('kudo_template_id');
			$table->string('lemma_publisher_id', 20)->nullable();
			$table->string('lemma_add_unit_id', 200)->nullable();
			$table->integer('box_number');
			$table->integer('timeout');
			$table->string('data_type', 100);
			$table->integer('start')->nullable();
			$table->integer('size')->nullable();
			$table->integer('width')->nullable();
			$table->integer('height')->nullable();
			$table->string('align_parent_end', 10)->nullable();
			$table->string('align_parent_top', 10)->nullable();
			$table->string('align_parent_bottom', 10)->nullable();
			$table->integer('below')->nullable();
			$table->integer('right_of')->nullable();
			$table->integer('left_of')->nullable();
			$table->integer('font_size')->nullable();
			$table->timestamp('dt_added')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_template_details');
	}

}
