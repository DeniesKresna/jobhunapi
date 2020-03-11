<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestUdpNewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_udp_new', function(Blueprint $table)
		{
			$table->integer('id')->unsigned();
			$table->timestamp('dt')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->char('udp_text');
			$table->string('device_sn', 20);
			$table->enum('data', array('login','command reply','location data','alarm packet','heartbeat','alarm','logout','checkin','checkout','clockin','clockout','wifi'));
			$table->dateTime('gps_date');
			$table->decimal('lat', 10, 5)->nullable();
			$table->decimal('lng', 10, 5)->nullable();
			$table->decimal('speed', 5);
			$table->decimal('course', 5);
			$table->boolean('signal');
			$table->string('status_oil', 5);
			$table->string('status_gps', 5);
			$table->string('status_charge', 5);
			$table->string('status_acc', 5);
			$table->string('status_activated', 5);
			$table->string('status_alarm', 20);
			$table->string('status_voltage', 2);
			$table->string('status_signal', 2);
			$table->boolean('satellite');
			$table->decimal('dst', 7);
			$table->decimal('odometer', 9);
			$table->string('poi', 200);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('test_udp_new');
	}

}
