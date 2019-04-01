<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalities', function (Blueprint $table) {
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
        Schema::dropIfExists('modalities');
    }
}

/* 
CREATE TABLE IF NOT EXISTS `mydb`.`course_modality` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `course_id` INT NOT NULL,
  `modality_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_courses_has_modalities_modalities1_idx` (`modality_id` ASC) VISIBLE,
  INDEX `fk_courses_has_modalities_courses1_idx` (`course_id` ASC) VISIBLE,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  CONSTRAINT `fk_courses_has_modalities_courses1`
    FOREIGN KEY (`course_id`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_courses_has_modalities_modalities1`
    FOREIGN KEY (`modality_id`)
    REFERENCES `mydb`.`modalities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
*/
