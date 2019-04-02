<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursePeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_period', function (Blueprint $table) {
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
        Schema::dropIfExists('course_period');
    }
}

/* 
CREATE TABLE IF NOT EXISTS `mydb`.`course_period` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `course_id` INT NOT NULL,
  `period_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_courses_has_periods_periods1_idx` (`period_id` ASC) VISIBLE,
  INDEX `fk_courses_has_periods_courses1_idx` (`course_id` ASC) VISIBLE,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  CONSTRAINT `fk_courses_has_periods_courses1`
    FOREIGN KEY (`course_id`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_courses_has_periods_periods1`
    FOREIGN KEY (`period_id`)
    REFERENCES `mydb`.`periods` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
√*/