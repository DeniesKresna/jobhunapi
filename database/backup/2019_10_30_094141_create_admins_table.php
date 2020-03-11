<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admins', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamp('dt_added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->char('username', 100)->index('username');
			$table->char('password', 100)->index('password');
			$table->enum('role', array('superadmin','employee','kudoadmin'))->index('role');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admins');
	}

}
