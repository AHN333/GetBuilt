-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema forum
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema forum
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `forum` DEFAULT CHARACTER SET utf8 ;
USE `forum` ;

-- -----------------------------------------------------
-- Table `forum`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forum`.`categories` (
  `category_id` INT NOT NULL,
  `category_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

INSERT INTO categories VALUES (1, "Questions");
INSERT INTO categories VALUES (2, "Reviews");
INSERT INTO categories VALUES (3, "General Discussion");

-- -----------------------------------------------------
-- Table `forum`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forum`.`users` (
  `user_email` VARCHAR(255) NOT NULL,
  `user_name` VARCHAR(255) NOT NULL,
  `user_password` VARCHAR(255) NOT NULL,
  `date_created` DATETIME NOT NULL,
  PRIMARY KEY (`user_email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `forum`.`topics`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forum`.`topics` (
  `topic_id` INT NOT NULL,
  `topic_subject` VARCHAR(255) NOT NULL,
  `topic_date` DATETIME NOT NULL,
  `category_id` INT NOT NULL,
  `user_email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`topic_id`),
  INDEX `category_id_idx` (`category_id` ASC) VISIBLE,
  INDEX `user_email_idx` (`user_email` ASC) VISIBLE,
  CONSTRAINT `category_id`
    FOREIGN KEY (`category_id`)
    REFERENCES `forum`.`categories` (`category_id`),
  CONSTRAINT `user_email`
    FOREIGN KEY (`user_email`)
    REFERENCES `forum`.`users` (`user_email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `forum`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forum`.`posts` (
  `post_id` INT NOT NULL,
  `post_content` LONGTEXT NOT NULL,
  `post_date` DATETIME NOT NULL,
  `topic_id` INT NOT NULL,
  `user_email` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`post_id`),
  INDEX `topic_id_idx` (`topic_id` ASC) VISIBLE,
  CONSTRAINT `topic_id`
    FOREIGN KEY (`topic_id`)
    REFERENCES `forum`.`topics` (`topic_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
