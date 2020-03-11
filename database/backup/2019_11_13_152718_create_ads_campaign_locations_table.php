<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsCampaignLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_campaign_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ads_campaign_id')->nullable();
            $table->unsignedInteger('merchant_group_id')->nullable();
            $table->index(['merchant_group_id','ads_campaign_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads_campaign_locations');
    }
}
