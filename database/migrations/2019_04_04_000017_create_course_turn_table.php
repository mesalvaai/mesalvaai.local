<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTurnTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'course_turn';

    /**
     * Run the migrations.
     * @table course_turn
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->integer('course_id')->unsigned();
            $table->integer('turn_id')->unsigned();
            $table->increments('id');

            $table->index(["course_id"], 'fk_courses_has_turns_courses1_idx');

            $table->index(["turn_id"], 'fk_courses_has_turns_turns1_idx');

            $table->unique(["id"], 'id_UNIQUE');


            $table->foreign('course_id', 'fk_courses_has_turns_courses1_idx')
                ->references('id')->on('courses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('turn_id', 'fk_courses_has_turns_turns1_idx')
                ->references('id')->on('turns')
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
