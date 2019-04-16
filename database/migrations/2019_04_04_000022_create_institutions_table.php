<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'institutions';

    /**
     * Run the migrations.
     * @table institutions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 150)->nullable();
            $table->string('slug', 150)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('cpnj', 18)->nullable();
            $table->string('cpe', 9)->nullable();
            $table->string('street', 45)->nullable();
            $table->string('number', 5)->nullable();
            $table->string('neighborhood', 45)->nullable();
            $table->string('complement', 45)->nullable();
            $table->integer('handbag')->nullable();
            $table->string('logo', 45)->nullable();
            $table->string('evaluation', 45)->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->nullable();
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();

            $table->index(["state_id"], 'fk_institutions_states1_idx');

            $table->index(["city_id"], 'fk_institution_city1_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('city_id', 'fk_institution_city1_idx')
                ->references('id')->on('cities')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('state_id', 'fk_institutions_states1_idx')
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
