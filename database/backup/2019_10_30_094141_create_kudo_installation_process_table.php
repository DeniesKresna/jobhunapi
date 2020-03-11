<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudoInstallationProcessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudo_installation_process', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('kudo_id');
			$table->dateTime('date_survei')->nullable();
			$table->text('survei_notes', 65535)->nullable();
			$table->enum('status_survei', array('belum','sudah','siap','baru'))->default('baru');
			$table->text('installation_notes', 65535);
			$table->dateTime('date_install')->nullable();
			$table->enum('status_install', array('belum','sudah','siap','baru'))->default('baru');
			$table->text('foto_depan', 65535)->nullable();
			$table->text('foto_samping', 65535)->nullable();
			$table->text('foto_berjalan', 65535)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudo_installation_process');
	}

}
