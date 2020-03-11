<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dt');
            $table->unsignedInteger('driver_id')->nullable();
            $table->timestamp('last_on')->nullable();
            $table->timestamp('last_off');
            $table->double('dst',20,2)->nullable();
            $table->integer('total_air_time')->nullable();
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
        Schema::dropIfExists('driver_summaries');
    }
}
