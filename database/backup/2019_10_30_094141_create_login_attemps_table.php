<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoginAttempsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('login_attemps', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('modified_at');
			$table->char('ip_address', 20)->unique('ip_address');
			$table->dateTime('first_failed_login');
			$table->integer('failed_login_count')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('login_attemps');
	}

}
