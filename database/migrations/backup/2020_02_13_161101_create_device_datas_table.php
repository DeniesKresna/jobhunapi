<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('device_id')->nullable();
            $table->unsignedInteger('box_id')->nullable();
            $table->unsignedInteger('car_id')->nullable();
            $table->unsignedInteger('driver_id')->nullable();
            $table->unsignedInteger('merchant_id')->nullable();
            $table->string('imei',50);
            $table->timestamp('dt_added');
            $table->string('data_type',30)->nullable();
            $table->double('lat',12,6)->nullable();
            $table->double('lng',12,6)->nullable();
            $table->double('speed',6,2)->nullable();
            $table->string('screen',20)->default('ON');
            $table->unsignedInteger('campaign_1')->nullable();
            $table->unsignedInteger('campaign_2')->nullable();
            $table->unsignedInteger('campaign_3')->nullable();
            $table->unsignedInteger('campaign_4')->nullable();
            $table->unsignedInteger('campaign_5')->nullable();
            $table->unsignedInteger('line_id')->nullable();
            $table->string('power',20)->nullable();
            $table->string('status',20)->nullable();
            $table->text('other')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_datas');
    }
}
