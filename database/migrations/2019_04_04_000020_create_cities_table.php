<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cities';

    /**
     * Run the migrations.
     * @table cities
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->integer('id')->unsigned();
            $table->string('name', 45)->nullable();
            $table->string('slug', 45)->nullable();
            $table->integer('status')->nullable();
            $table->integer('state_id')->unsigned();

            $table->index(["state_id"], 'fk_city_state1_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('state_id', 'fk_city_state1_idx')
                ->references('id')->on('states')
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
