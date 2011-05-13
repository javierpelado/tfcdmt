SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `myTFC` ;
CREATE SCHEMA IF NOT EXISTS `myTFC` ;
USE `myTFC` ;

-- -----------------------------------------------------
-- Table `myTFC`.`dmt_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `myTFC`.`dmt_category` ;

CREATE  TABLE IF NOT EXISTS `myTFC`.`dmt_category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `name` ON `myTFC`.`dmt_category` (`name` ASC) ;


-- -----------------------------------------------------
-- Table `myTFC`.`dmt_members`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `myTFC`.`dmt_members` ;

CREATE  TABLE IF NOT EXISTS `myTFC`.`dmt_members` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `usr` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '' ,
  `pass` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '' ,
  `nb` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '' ,
  `ap` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '' ,
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '' ,
  `regIP` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '' ,
  `dt` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE UNIQUE INDEX `usr` ON `myTFC`.`dmt_members` (`usr` ASC) ;


-- -----------------------------------------------------
-- Table `myTFC`.`dmt_sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `myTFC`.`dmt_sessions` ;

CREATE  TABLE IF NOT EXISTS `myTFC`.`dmt_sessions` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) NOT NULL ,
  `date` DATE NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `myTFC`.`dmt_opinions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `myTFC`.`dmt_opinions` ;

CREATE  TABLE IF NOT EXISTS `myTFC`.`dmt_opinions` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `text` VARCHAR(300) NULL ,
  `polarity` ENUM('POSITIVE','NEGATIVE','NEUTRAL') NOT NULL ,
  `id_session` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`, `id_session`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
