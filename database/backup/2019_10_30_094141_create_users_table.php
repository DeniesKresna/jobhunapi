<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->char('name', 200);
			$table->char('username', 100)->index('username');
            $table->char('email', 200)->index('email');
            $table->char('phone', 30);
            $table->char('address', 100);
			$table->char('password', 100)->index('password');
			$table->dateTime('prev_login');
			$table->dateTime('last_login');
			$table->enum('type', array('superuser','demouser','otheruser','grabuser','kudouser','customer'))->default('superuser');
			$table->boolean('active');
			$table->text('notification_emails', 65535);
			$table->dateTime('dt_start')->nullable();
			$table->dateTime('dt_end')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
