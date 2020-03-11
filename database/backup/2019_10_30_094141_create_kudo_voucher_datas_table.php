<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoVoucherDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_voucher_datas', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('form_id');
			$table->string('name', 200);
			$table->string('voucher_code', 200);
			$table->boolean('status')->default(0);
			$table->dateTime('used_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_voucher_datas');
	}

}
