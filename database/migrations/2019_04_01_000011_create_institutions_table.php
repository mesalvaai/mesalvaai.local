<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
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
        Schema::dropIfExists('institutions');
    }
}
/* 
CREATE TABLE IF NOT EXISTS `mydb`.`institutions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NULL,
  `slug` VARCHAR(150) NULL,
  `phone` VARCHAR(16) NULL,
  `cpnj` VARCHAR(18) NULL,
  `cpe` VARCHAR(9) NULL,
  `street` VARCHAR(45) NULL,
  `number` VARCHAR(5) NULL,
  `neighborhood` VARCHAR(45) NULL,
  `complement` VARCHAR(45) NULL,
  `handbag` INT(9) NULL,
  `logo` VARCHAR(45) NULL,
  `evaluation` VARCHAR(45) NULL,
  `description` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `status` INT(1) NULL,
  `state_id` INT(11) NOT NULL,
  `city_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_institution_city1_idx` (`city_id` ASC) VISIBLE,
  INDEX `fk_institutions_states1_idx` (`state_id` ASC) VISIBLE,
  CONSTRAINT `fk_institution_city1`
    FOREIGN KEY (`city_id`)
    REFERENCES `mydb`.`cities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_institutions_states1`
    FOREIGN KEY (`state_id`)
    REFERENCES `mydb`.`states` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
*/