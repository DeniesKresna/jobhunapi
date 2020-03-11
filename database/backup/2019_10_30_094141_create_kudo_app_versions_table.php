<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoAppVersionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_app_versions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('name', 65535)->nullable();
			$table->text('url', 65535)->nullable();
			$table->text('detail', 65535)->nullable();
			$table->integer('status');
			$table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_app_versions');
	}

}
