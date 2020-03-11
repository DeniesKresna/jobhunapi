<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('code',30);
            $table->unsignedInteger('device_line_id')->nullable();
            $table->unsignedInteger('content_id')->nullable();
            $table->unsignedInteger('layout_box_id')->nullable();
            $table->unsignedInteger('campaign_id')->nullable();
            $table->unsignedInteger('box_id')->nullable();
            $table->unsignedInteger('car_id')->nullable();
            $table->unsignedInteger('driver_id')->nullable();
            $table->unsignedInteger('merchant_id')->nullable();
            $table->unsignedInteger('merchant_group_id')->nullable();
            $table->smallInteger('status')->default(0);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots');
    }
}
