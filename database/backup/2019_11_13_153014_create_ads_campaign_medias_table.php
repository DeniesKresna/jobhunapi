<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsCampaignMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_campaign_medias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ads_campaign_id');
            $table->unsignedInteger('ads_campaign_file_id');
            $table->tinyInteger('order');
            $table->index(['ads_campaign_file_id','ads_campaign_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads_campaign_medias');
    }
}
