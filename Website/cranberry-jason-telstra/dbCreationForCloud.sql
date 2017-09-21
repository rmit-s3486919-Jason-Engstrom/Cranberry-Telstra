-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema predator
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema predator
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `predator` DEFAULT CHARACTER SET utf8 ;
USE `predator` ;

-- -----------------------------------------------------
-- Table `predator`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `predator`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `predator`.`devices`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `predator`.`devices` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `longitude` DECIMAL(12,9) NOT NULL,
  `lattitude` DECIMAL(12,9) NOT NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_id` (`users_id` ASC),
  CONSTRAINT `users_id`
    FOREIGN KEY (`users_id`)
    REFERENCES `predator`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `predator`.`detections`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `predator`.`detections` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `time` TIMESTAMP NOT NULL,
  `vision_accepted` VARCHAR(45) NULL,
  `vision_label` VARCHAR(45) NULL,
  `vision_extra` VARCHAR(45) NULL,
  `devices_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_devices_id` (`devices_id` ASC),
  CONSTRAINT `devices_id`
    FOREIGN KEY (`devices_id`)
    REFERENCES `predator`.`devices` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
