<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'courses';

    /**
     * Run the migrations.
     * @table courses
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('duration', 2)->nullable();
            $table->string('evaluation', 1)->nullable();
            $table->text('abstract')->nullable();
            $table->text('content')->nullable();
            $table->string('benefits', 45)->nullable();
            $table->string('status', 45)->nullable();
            $table->integer('area_id')->unsigned();
            $table->integer('level_id')->unsigned();

            $table->index(["level_id"], 'fk_courses_levels1_idx');

            $table->index(["area_id"], 'fk_courses_areas1_idx');
            $table->nullableTimestamps();


            $table->foreign('area_id', 'fk_courses_areas1_idx')
                ->references('id')->on('areas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('level_id', 'fk_courses_levels1_idx')
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
