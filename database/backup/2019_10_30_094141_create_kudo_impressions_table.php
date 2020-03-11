<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoImpressionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_impressions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('kudo_id')->nullable();
			$table->integer('merchant_id')->nullable();
			$table->integer('merchant_group_id');
			$table->text('provider', 65535)->nullable();
			$table->integer('file_id')->nullable();
			$table->timestamp('dt_added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('status', 65535)->nullable();
			$table->text('others', 65535)->nullable();
			$table->text('filename', 65535);
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
		Schema::drop('kudo_impressions');
	}

}
