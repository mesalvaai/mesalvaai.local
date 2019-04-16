<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionCourseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'institution_course';

    /**
     * Run the migrations.
     * @table institution_course
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('institution_id')->unsigned();
            $table->integer('course_id')->unsigned();

            $table->index(["course_id"], 'fk_institution_has_courses_courses1_idx');

            $table->index(["institution_id"], 'fk_institution_has_courses_institution1_idx');

            $table->unique(["id"], 'id_UNIQUE');


            $table->foreign('institution_id', 'fk_institution_has_courses_institution1_idx')
                ->references('id')->on('institutions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('course_id', 'fk_institution_has_courses_courses1_idx')
                ->references('id')->on('courses')
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
