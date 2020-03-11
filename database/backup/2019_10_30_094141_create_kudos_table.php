<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKudosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kudos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('campaign_id')->nullable();
			$table->integer('user_id');
			$table->string('imei', 100);
			$table->string('sim_card', 200)->nullable();
			$table->string('teamviewer_id', 200)->nullable();
			$table->string('unique_imei_device', 100)->nullable();
			$table->text('unique_mac_address', 65535);
			$table->string('name', 200);
			$table->string('address', 200);
			$table->string('others', 200);
			$table->float('lat', 12, 6)->nullable();
			$table->float('lng', 12, 6)->nullable();
			$table->integer('kudo_template_id');
			$table->dateTime('last_login')->nullable();
			$table->boolean('registered')->default(0);
			$table->char('one_signal_push_token', 200)->nullable();
			$table->char('one_signal_user_id', 200)->nullable();
			$table->boolean('status_download')->default(0);
			$table->boolean('status_template')->default(0);
			$table->boolean('status_restart')->default(0);
			$table->dateTime('status_download_start')->nullable();
			$table->dateTime('status_download_complete')->nullable();
			$table->integer('kudo_merchant_id');
			$table->integer('camera');
			$table->integer('lemma_publisher_id')->nullable();
			$table->integer('lemma_add_unit_id')->nullable();
			$table->text('sonoff_id', 65535);
			$table->string('sonoff_status', 200);
			$table->dateTime('sonoff_updated')->nullable();
			$table->text('fcm_token', 65535);
			$table->integer('version_status')->nullable();
			$table->integer('kudo_app_version_id')->nullable();
			$table->integer('battery_precentage');
			$table->text('screen_status', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kudos');
	}

}
