<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoInstallationReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_installation_report', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('kudo_id');
			$table->string('status', 200)->nullable();
			$table->text('notes', 65535)->nullable();
			$table->integer('created_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_installation_report');
	}

}
