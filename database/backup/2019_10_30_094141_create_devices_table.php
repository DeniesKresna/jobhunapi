<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('devices', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->char('name', 200);
			$table->char('imei', 50)->index('imei');
			$table->string('sim_card_no', 200);
			$table->string('sim_card_serial', 200);
			$table->boolean('active')->index('active');
			$table->string('monitor', 200);
			$table->dateTime('last_gps_time')->index('last_gps_time');
			$table->dateTime('last_screen_time')->index('last_screen_time');
			$table->dateTime('last_screen_off_time')->index('last_screen_off_time');
			$table->float('total_distance', 20);
			$table->integer('total_screen_time');
			$table->float('total_park_time', 10, 0);
			$table->enum('screen_status', array('off','on'))->default('off');
			$table->float('last_lat', 12, 6);
			$table->float('last_lng', 12, 6);
			$table->boolean('troubled');
			$table->integer('driver_id')->index('driver_id');
			$table->integer('campaign_1')->default(0);
			$table->integer('campaign_2')->default(0);
			$table->integer('campaign_3')->default(0);
			$table->integer('campaign_4')->default(0);
			$table->integer('campaign_5')->default(0);
			$table->integer('campaign_6')->default(0);
			$table->integer('box_id')->nullable();
			$table->text('comment', 65535)->nullable();
			$table->enum('device_types', array('devices','rollers','kudos',''));
			$table->integer('device_type_value');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('devices');
	}

}
