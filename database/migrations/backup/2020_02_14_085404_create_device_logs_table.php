<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('device_id')->nullable();
            $table->unsignedInteger('box_id')->nullable();
            $table->unsignedInteger('car_id')->nullable();
            $table->unsignedInteger('driver_id')->nullable();
            $table->string('plate_number')->nullable();
            $table->string('led_number')->nullable();
            $table->string('imei')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('dt');
            $table->text('description')->nullable();
            $table->unsignedInteger('admin_id')->nullable();
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
        Schema::dropIfExists('device_logs');
    }
}
