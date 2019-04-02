<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id')->unsigned();
            $table->integer('level_id')->unsigned();
            
            $table->string('name', 255)->nullable(true);
            $table->string('slug', 255)->nullable(true);
            $table->string('duration', 2)->nullable(true);
            $table->string('evaluation', 1)->nullable(true);
            $table->text('abstract')->nullable(true);
            $table->text('content')->nullable(true);
            $table->string('benefits', 45)->nullable(true);
            $table->string('status', 45)->nullable(true);
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('level_id')->references('id')->on('levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

/* 
CREATE TABLE IF NOT EXISTS `mydb`.`courses` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `slug` VARCHAR(255) NULL,
  `duration` VARCHAR(2) NULL,
  `evaluation` VARCHAR(1) NULL,
  `abstract` TEXT NULL,
  `content` TEXT NULL,
  `benefits` VARCHAR(45) NULL,
  `status` VARCHAR(45) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `area_id` INT NOT NULL,
  `level_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_courses_areas1_idx` (`area_id` ASC) VISIBLE,
  INDEX `fk_courses_levels1_idx` (`level_id` ASC) VISIBLE,
  CONSTRAINT `fk_courses_areas1`
    FOREIGN KEY (`area_id`)
    REFERENCES `mydb`.`areas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_courses_levels1`
    FOREIGN KEY (`level_id`)
    REFERENCES `mydb`.`levels` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
 */
