<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'states';

    /**
     * Run the migrations.
     * @table states
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->integer('id')->unsigned();
            $table->string('name', 45)->nullable();
            $table->string('sigla', 2)->nullable();
            $table->string('slug', 45)->nullable();
            $table->integer('status')->nullable();
            $table->integer('country_id')->unsigned();

            $table->index(["country_id"], 'fk_states_countries1_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('country_id', 'fk_states_countries1_idx')
                ->references('id')->on('countries')
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
