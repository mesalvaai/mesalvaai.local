<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_course', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institution_course');
    }
}
/* 
CREATE TABLE IF NOT EXISTS `mydb`.`institution_course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `institution_id` INT NOT NULL,
  `course_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_institution_has_courses_courses1_idx` (`course_id` ASC) VISIBLE,
  INDEX `fk_institution_has_courses_institution1_idx` (`institution_id` ASC) VISIBLE,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  CONSTRAINT `fk_institution_has_courses_institution1`
    FOREIGN KEY (`institution_id`)
    REFERENCES `mydb`.`institutions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_institution_has_courses_courses1`
    FOREIGN KEY (`course_id`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
*/