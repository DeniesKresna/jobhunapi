<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dt');
            $table->unsignedInteger('driver_id');
            $table->timestamp('last_on')->nullable();
            $table->timestamp('last_off')->nullable();
            $table->double('dst',20,2)->nullable();
            $table->bigInteger('total_air_time')->nullable();
            $table->double('avg_speed',20,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_summaries');
    }
}
