SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `hope` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `hope` ;

-- -----------------------------------------------------
-- Table `hope`.`projects`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hope`.`projects` (
  `project_id` INT NOT NULL AUTO_INCREMENT ,
  `owner_id` VARCHAR(22) NOT NULL ,
  `project_name` VARCHAR(200) NOT NULL ,
  `description` BLOB NULL ,
  `categories` TEXT NULL ,
  `location` TEXT NOT NULL ,
  `progress` INT NULL ,
  `suggestion` BLOB NULL ,
  `status` CHAR(1) NULL ,
  PRIMARY KEY (`project_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hope`.`objectives`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `hope`.`objectives` (
  `objective_id` INT NOT NULL ,
  `project_id` INT NOT NULL ,
  `description` VARCHAR(200) NOT NULL ,
  `progress` INT NOT NULL ,
  `status` CHAR(1) NOT NULL ,
  PRIMARY KEY (`objective_id`) ,
  INDEX `fk_objectives_projects` (`project_id` ASC) ,
  CONSTRAINT `fk_objectives_projects`
    FOREIGN KEY (`project_id` )
    REFERENCES `hope`.`projects` (`project_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
