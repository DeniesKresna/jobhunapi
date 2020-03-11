<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDriversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('drivers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->char('name', 100);
			$table->enum('gender', array('male','female','none'))->default('none');
			$table->char('plate_number', 20);
			$table->char('handphone', 30);
			$table->char('jenis_kendaraan', 100);
			$table->char('ktp', 100);
			$table->char('stnk', 100);
			$table->text('address', 65535);
			$table->boolean('active');
			$table->timestamp('dt_added')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('last_login');
			$table->char('one_signal_user_id', 200);
			$table->char('one_signal_push_token', 200);
			$table->char('led', 100);
			$table->boolean('registered')->default(0);
			$table->char('group', 20);
			$table->char('car_color', 100);
			$table->date('dt_pemasangan');
			$table->boolean('foto_stnk');
			$table->boolean('foto_mobil_depan');
			$table->boolean('foto_mobil_samping');
			$table->text('foto_driver', 65535);
			$table->text('foto_ktp', 65535)->nullable();
			$table->char('pajak', 100);
			$table->text('notes', 65535);
			$table->float('last_lat', 12, 6)->nullable();
			$table->float('last_lng', 12, 6)->nullable();
			$table->dateTime('last_gps_time')->nullable();
			$table->float('total_km', 20)->nullable();
			$table->integer('total_times')->nullable();
			$table->integer('total_points')->nullable();
			$table->boolean('system_connected');
			$table->boolean('driver_connected');
			$table->text('customer_code', 65535);
			$table->index(['plate_number','handphone'], 'plate_number');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('drivers');
	}

}
