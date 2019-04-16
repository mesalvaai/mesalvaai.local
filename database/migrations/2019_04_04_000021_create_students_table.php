<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'students';

    /**
     * Run the migrations.
     * @table students
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('email')->nullable();
            $table->date('data_of_birth')->nullable();
            $table->string('phone', 14)->nullable();
            $table->string('cep', 10)->nullable();
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('street')->nullable();
            $table->string('number', 45)->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('complement', 45)->nullable();
            $table->string('status', 45)->nullable();
            $table->string('how_met_us', 45)->nullable();

            $table->index(["city_id"], 'fk_students_cities1_idx');

            $table->index(["state_id"], 'fk_students_states1_idx');

            $table->index(["user_id"], 'fk_students_users1_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_students_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('state_id', 'fk_students_states1_idx')
                ->references('id')->on('states')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('city_id', 'fk_students_cities1_idx')
                ->references('id')->on('cities')
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
