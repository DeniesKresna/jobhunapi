<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarisSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baris_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('baris_id')->nullable();
            $table->timestamp('dt');
            $table->string('imei',100)->nullable();
            $table->timestamp('last_on');
            $table->timestamp('last_off');
            $table->double('dst',30,2)->nullable();
            $table->bigInteger('total_air_time')->nullable();
            $table->double('avg_speed',30,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baris_summaries');
    }
}
