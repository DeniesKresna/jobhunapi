<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceLogDocumentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_log_documentations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('device_log_id');
            $table->text('desc')->nullable();
            $table->text('photo')->nullable();
            $table->unsignedInteger('pic_id')->nullable();
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
        Schema::dropIfExists('device_log_documentations');
    }
}
