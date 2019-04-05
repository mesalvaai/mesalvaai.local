<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursePeriodTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'course_period';

    /**
     * Run the migrations.
     * @table course_period
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('period_id')->unsigned();

            $table->index(["course_id"], 'fk_courses_has_periods_courses1_idx');

            $table->index(["period_id"], 'fk_courses_has_periods_periods1_idx');

            $table->unique(["id"], 'id_UNIQUE');


            $table->foreign('course_id', 'fk_courses_has_periods_courses1_idx')
                ->references('id')->on('courses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('period_id', 'fk_courses_has_periods_periods1_idx')
                ->references('id')->on('periods')
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
