<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeofenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('geofence', function(Blueprint $table)
		{
			$table->text('lat', 65535);
			$table->text('lng', 65535);
			$table->dateTime('dt_added');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('geofence');
	}

}
