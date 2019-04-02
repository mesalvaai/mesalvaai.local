<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
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
        Schema::dropIfExists('costs');
    }
}

/* 
CREATE TABLE IF NOT EXISTS `mydb`.`costs` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `monthly_payment` FLOAT NULL,
  `discount` INT(2) NULL,
  `scholarship` INT(2) NULL,
  `economy` FLOAT NULL,
  `vacancy` INT(2) NULL,
  `status` INT(1) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `course_id` INT NOT NULL,
  `period_id` INT NOT NULL,
  `level_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_costs_courses1_idx` (`course_id` ASC) VISIBLE,
  INDEX `fk_costs_periods1_idx` (`period_id` ASC) VISIBLE,
  INDEX `fk_costs_levels1_idx` (`level_id` ASC) VISIBLE,
  CONSTRAINT `fk_costs_courses1`
    FOREIGN KEY (`course_id`)
    REFERENCES `mydb`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_costs_periods1`
    FOREIGN KEY (`period_id`)
    REFERENCES `mydb`.`periods` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_costs_levels1`
    FOREIGN KEY (`level_id`)
    REFERENCES `mydb`.`levels` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
*/
