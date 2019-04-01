<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTurnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_turn', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turn_id')->unsigned();
            $table->integer('course_id')->unsigned();  
            
            $table->foreign('turn_id')->references('id')->on('turns');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_turn');
    }
}

/* 
CREATE TABLE IF NOT EXISTS `mydb`.`course_turn` (
  `course_id` INT NOT NULL,
  `turn_id` INT NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  INDEX `fk_courses_has_turns_turns1_idx` (`turn_id` ASC) VISIBLE,
  INDEX `fk_courses_has_turns_courses1_idx` (`course_id` ASC) VISIBLE,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  CONSTRAINT `fk_courses_has_turns_courses1`
    FOREIGN KEY (`course_id`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_courses_has_turns_turns1`
    FOREIGN KEY (`turn_id`)
    REFERENCES `mydb`.`turns` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
 */
