<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaptchaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('captcha', function(Blueprint $table)
		{
			$table->bigInteger('captcha_id', true)->unsigned();
			$table->integer('captcha_time')->unsigned();
			$table->string('ip_address', 16)->default('0');
			$table->string('word', 20)->index('word');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('captcha');
	}

}
