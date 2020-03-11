<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceDatasAllTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('device_datas_all', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->char('imei', 50);
			$table->timestamp('dt_added')->default(DB::raw('CURRENT_TIMESTAMP'))->index('dt_added');
			$table->char('data_type', 30)->index('data_type');
			$table->float('lat', 12, 6);
			$table->float('lng', 12, 6);
			$table->float('speed', 6)->index('speed');
			$table->enum('screen', array('ON','OFF'))->nullable();
			$table->integer('device_id')->nullable();
			$table->integer('box_id')->nullable();
			$table->integer('car_id')->nullable();
			$table->integer('driver_id')->nullable();
			$table->integer('merchant_id')->nullable();
			$table->text('other', 65535)->nullable();
			$table->string('power', 200);
			$table->string('status', 200);
			$table->index(['imei','dt_added'], 'imei');
			$table->index(['imei','dt_added','speed'], 'imei_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('device_datas_all');
	}

}
