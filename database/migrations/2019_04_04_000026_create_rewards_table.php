<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'rewards';

    /**
     * Run the migrations.
     * @table rewards
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('campaign_id')->unsigned();
            $table->string('title');
            $table->float('donation');
            $table->string('description', 255)->nullable();
            $table->integer('quantity');
            $table->char('unlimited', 3);
            $table->date('delivery_date')->nullable();
            $table->string('delivery_mode', 45)->nullable();
            $table->char('variations', 1)->nullable();
            $table->string('thanks', 45)->nullable();
            $table->integer('status')->nullable();
            $table->nullableTimestamps();

            $table->index(["user_id"], 'fk_reward_users1_idx');

            $table->index(["campaign_id", "description", "quantity"], 'fk_reward_campaigns1_idx');

            $table->unique(["id"], 'id_UNIQUE');

            $table->foreign('user_id', 'fk_reward_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('campaign_id', 'fk_reward_campaigns1_idx')
                ->references('id')->on('campaigns')
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
