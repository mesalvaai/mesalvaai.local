<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseModalityTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'course_modality';

    /**
     * Run the migrations.
     * @table course_modality
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('modality_id')->unsigned();

            $table->index(["modality_id"], 'fk_courses_has_modalities_modalities1_idx');

            $table->index(["course_id"], 'fk_courses_has_modalities_courses1_idx');

            $table->unique(["id"], 'id_UNIQUE');


            $table->foreign('course_id', 'fk_courses_has_modalities_courses1_idx')
                ->references('id')->on('courses')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('modality_id', 'fk_courses_has_modalities_modalities1_idx')
                ->references('id')->on('modalities')
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
