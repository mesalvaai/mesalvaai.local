<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'costs';

    /**
     * Run the migrations.
     * @table costs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->float('monthly_payment')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('scholarship')->nullable();
            $table->float('economy')->nullable();
            $table->integer('vacancy')->nullable();
            $table->integer('status')->nullable();
            $table->integer('course_id')->unsigned();
            $table->integer('period_id')->unsigned();
            $table->integer('level_id')->unsigned();

            $table->index(["period_id"], 'fk_costs_periods1_idx');

            $table->index(["level_id"], 'fk_costs_levels1_idx');

            $table->index(["course_id"], 'fk_costs_courses1_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('course_id', 'fk_costs_courses1_idx')
                ->references('id')->on('courses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('period_id', 'fk_costs_periods1_idx')
                ->references('id')->on('periods')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('level_id', 'fk_costs_levels1_idx')
                ->references('id')->on('levels')
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
