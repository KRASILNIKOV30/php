-- MySQL Workbench Forward Engineering

DROP TABLE user;

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema user
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema user
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `user` CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `user` ;

-- -----------------------------------------------------
-- Table `user`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `middle_name` VARCHAR(255) NULL,
  `gender` VARCHAR(255) NOT NULL,
  `birth_date` VARCHAR(255) NOT NULL,
  `email` VARCHAR(320) NOT NULL,
  `phone` VARCHAR(255) NULL,
  `avatar_path` VARCHAR(255) NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  UNIQUE INDEX `phone_UNIQUE` (`phone` ASC) VISIBLE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
