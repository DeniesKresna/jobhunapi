<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriverDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('driver_documents', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamp('dt_added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('added_by')->index('added_by');
			$table->char('name', 100);
			$table->text('description', 65535);
			$table->char('photo', 200);
			$table->integer('driver_id')->index('driver_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('driver_documents');
	}

}
