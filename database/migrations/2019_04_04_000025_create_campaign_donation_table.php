<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignDonationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'campaign_donation';

    /**
     * Run the migrations.
     * @table campaign_donation
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('campaign_id')->unsigned();
            $table->integer('donation_id')->unsigned();
            $table->float('donation_amount')->nullable();
            $table->string('details')->nullable();

            $table->index(["donation_id"], 'fk_campaigns_has_donations_donations1_idx');

            $table->index(["campaign_id"], 'fk_campaigns_has_donations_campaigns1_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('campaign_id', 'fk_campaigns_has_donations_campaigns1_idx')
                ->references('id')->on('campaigns')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('donation_id', 'fk_campaigns_has_donations_donations1_idx')
                ->references('id')->on('donations')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
