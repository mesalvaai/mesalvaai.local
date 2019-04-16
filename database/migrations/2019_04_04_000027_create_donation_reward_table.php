<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationRewardTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'donation_reward';

    /**
     * Run the migrations.
     * @table donation_reward
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('donation_id')->unsigned();
            $table->integer('reward_id')->unsigned();

            $table->index(["donation_id"], 'fk_donations_has_reward_donations1_idx');

            $table->index(["reward_id"], 'fk_donations_has_reward_reward1_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('donation_id', 'fk_donations_has_reward_donations1_idx')
                ->references('id')->on('donations')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('reward_id', 'fk_donations_has_reward_reward1_idx')
                ->references('id')->on('rewards')
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
