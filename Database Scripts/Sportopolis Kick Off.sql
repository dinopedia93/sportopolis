SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sportopolis` DEFAULT CHARACTER SET utf8 ;
USE `sportopolis` ;

-- -----------------------------------------------------
-- Table `sportopolis`.`admin_contacts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`admin_contacts` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`admin_contacts` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Mobile` DECIMAL(11,0) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Facebook Account` VARCHAR(100) NOT NULL,
  `Brief` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sportopolis`.`sponsors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`sponsors` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`sponsors` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `brief` TEXT NOT NULL,
  `Tel` DECIMAL(10,0) NULL DEFAULT NULL,
  `Mobile` DECIMAL(10,0) NULL DEFAULT NULL,
  `Email` VARCHAR(45) NULL DEFAULT NULL,
  `Facebook` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sportopolis`.`advertisements`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`advertisements` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`advertisements` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Sponsor` VARCHAR(45) NOT NULL,
  `From` DATE NOT NULL,
  `To` DATE NOT NULL,
  `sponsors_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_advertisements_sponsors1_idx` (`sponsors_ID` ASC),
  CONSTRAINT `fk_advertisements_sponsors1`
    FOREIGN KEY (`sponsors_ID`)
    REFERENCES `sportopolis`.`sponsors` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sportopolis`.`events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`events` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`events` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Sport` VARCHAR(45) NOT NULL,
  `Description` TEXT NOT NULL,
  `Owner` VARCHAR(45) NOT NULL,
  `From` DATETIME NOT NULL,
  `To` DATETIME NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sportopolis`.`locations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`locations` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`locations` (
  `ID` INT(11) NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  `Country` VARCHAR(45) NOT NULL,
  `City` VARCHAR(45) NOT NULL,
  `District` VARCHAR(45) NOT NULL,
  `Address` VARCHAR(50) NOT NULL,
  `Google_map` TEXT NOT NULL,
  `Likes count` INT NOT NULL,
  `Rank` FLOAT NOT NULL,
  `Facebook` TEXT NULL DEFAULT NULL,
  `Tel` DECIMAL NULL DEFAULT NULL,
  `Mobile` DECIMAL NULL DEFAULT NULL,
  `Email` VARCHAR(45) NULL DEFAULT NULL,
  `Website` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC),
  UNIQUE INDEX `Address_UNIQUE` (`Address` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sportopolis`.`members`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`members` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`members` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sportopolis`.`messages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`messages` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`messages` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `From` VARCHAR(45) NOT NULL,
  `Date` DATE NOT NULL,
  `Time` TIME NOT NULL,
  `Message` TEXT NOT NULL,
  `Reply` TEXT NULL DEFAULT NULL,
  `members_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_messages_members_idx` (`members_ID` ASC),
  CONSTRAINT `fk_messages_members`
    FOREIGN KEY (`members_ID`)
    REFERENCES `sportopolis`.`members` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sportopolis`.`sports`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`sports` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`sports` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Type` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sportopolis`.`stores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`stores` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`stores` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Country` VARCHAR(45) NOT NULL,
  `City` VARCHAR(45) NOT NULL,
  `District` VARCHAR(45) NOT NULL,
  `Address` VARCHAR(100) NOT NULL,
  `Google_map` TEXT NOT NULL,
  `Likes count` INT ZEROFILL NOT NULL,
  `Rank` FLOAT ZEROFILL NOT NULL,
  `Facebook_fanpage` TEXT NULL,
  `Tel` DECIMAL(11) NULL,
  `Mobile` DECIMAL(11) NULL,
  `Email` VARCHAR(45) NULL,
  `Website` TEXT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC),
  UNIQUE INDEX `Address_UNIQUE` (`Address` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sportopolis`.`trainers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`trainers` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`trainers` (
  `ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NOT NULL,
  `Mobile` DECIMAL(11,0) NOT NULL,
  `Country` VARCHAR(45) NOT NULL,
  `City` VARCHAR(45) NOT NULL,
  `District` VARCHAR(45) NOT NULL,
  `Location` VARCHAR(45) NOT NULL,
  `Sport` VARCHAR(45) NOT NULL,
  `Training days` VARCHAR(45) NOT NULL,
  `Time` TIME NULL,
  `Likes count` INT ZEROFILL NOT NULL,
  `Rank` FLOAT ZEROFILL NOT NULL,
  `Facebook_fanpage` TEXT NULL,
  `Tel` DECIMAL(11) NULL,
  `Mobile` DECIMAL(11) NOT NULL,
  `Email` VARCHAR(45) NULL,
  `Website` TEXT NULL,
  `sports_ID` INT(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `idtrainer_UNIQUE` (`ID` ASC),
  UNIQUE INDEX `mobile_UNIQUE` (`Mobile` ASC),
  INDEX `fk_trainers_sports1_idx` (`sports_ID` ASC),
  CONSTRAINT `fk_trainers_sports1`
    FOREIGN KEY (`sports_ID`)
    REFERENCES `sportopolis`.`sports` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sportopolis`.`reviews`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`reviews` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`reviews` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Date` DATE NOT NULL,
  `Review` TEXT NOT NULL,
  `locations_ID` INT(11) NULL,
  `trainers_ID` INT(10) NULL,
  `stores_ID` INT(11) NULL,
  `members_ID` INT(11) NOT NULL,
  `events_ID` INT(11) NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_reviews_locations1_idx` (`locations_ID` ASC),
  INDEX `fk_reviews_trainers1_idx` (`trainers_ID` ASC),
  INDEX `fk_reviews_stores1_idx` (`stores_ID` ASC),
  INDEX `fk_reviews_members1_idx` (`members_ID` ASC),
  INDEX `fk_reviews_events1_idx` (`events_ID` ASC),
  CONSTRAINT `fk_reviews_locations1`
    FOREIGN KEY (`locations_ID`)
    REFERENCES `sportopolis`.`locations` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_trainers1`
    FOREIGN KEY (`trainers_ID`)
    REFERENCES `sportopolis`.`trainers` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_stores1`
    FOREIGN KEY (`stores_ID`)
    REFERENCES `sportopolis`.`stores` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_members1`
    FOREIGN KEY (`members_ID`)
    REFERENCES `sportopolis`.`members` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_events1`
    FOREIGN KEY (`events_ID`)
    REFERENCES `sportopolis`.`events` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sportopolis`.`Likes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`Likes` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`Likes` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Flag` BIT NOT NULL,
  `members_ID` INT(11) NOT NULL,
  `locations_ID` INT(11) NULL,
  `events_ID` INT(11) NULL,
  `trainers_ID` INT(10) NULL,
  `stores_ID` INT(11) NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_Likes_members1_idx` (`members_ID` ASC),
  INDEX `fk_Likes_locations1_idx` (`locations_ID` ASC),
  INDEX `fk_Likes_events1_idx` (`events_ID` ASC),
  INDEX `fk_Likes_trainers1_idx` (`trainers_ID` ASC),
  INDEX `fk_Likes_stores1_idx` (`stores_ID` ASC),
  CONSTRAINT `fk_Likes_members1`
    FOREIGN KEY (`members_ID`)
    REFERENCES `sportopolis`.`members` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Likes_locations1`
    FOREIGN KEY (`locations_ID`)
    REFERENCES `sportopolis`.`locations` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Likes_events1`
    FOREIGN KEY (`events_ID`)
    REFERENCES `sportopolis`.`events` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Likes_trainers1`
    FOREIGN KEY (`trainers_ID`)
    REFERENCES `sportopolis`.`trainers` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Likes_stores1`
    FOREIGN KEY (`stores_ID`)
    REFERENCES `sportopolis`.`stores` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sportopolis`.`photos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`photos` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`photos` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Photo_Link` TEXT NOT NULL,
  `locations_ID` INT(11) NULL,
  `trainers_ID` INT(10) NULL,
  `stores_ID` INT(11) NULL,
  `events_ID` INT(11) NULL,
  PRIMARY KEY (`ID`),
  UNIQUE INDEX `ID_UNIQUE` (`ID` ASC),
  INDEX `fk_photos_locations1_idx` (`locations_ID` ASC),
  INDEX `fk_photos_trainers1_idx` (`trainers_ID` ASC),
  INDEX `fk_photos_stores1_idx` (`stores_ID` ASC),
  INDEX `fk_photos_events1_idx` (`events_ID` ASC),
  CONSTRAINT `fk_photos_locations1`
    FOREIGN KEY (`locations_ID`)
    REFERENCES `sportopolis`.`locations` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_photos_trainers1`
    FOREIGN KEY (`trainers_ID`)
    REFERENCES `sportopolis`.`trainers` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_photos_stores1`
    FOREIGN KEY (`stores_ID`)
    REFERENCES `sportopolis`.`stores` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_photos_events1`
    FOREIGN KEY (`events_ID`)
    REFERENCES `sportopolis`.`events` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sportopolis`.`trainers_has_locations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`trainers_has_locations` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`trainers_has_locations` (
  `trainers_ID` INT(10) UNSIGNED NOT NULL,
  `locations_ID` INT(11) NOT NULL,
  PRIMARY KEY (`trainers_ID`, `locations_ID`),
  INDEX `fk_trainers_has_locations_locations1_idx` (`locations_ID` ASC),
  INDEX `fk_trainers_has_locations_trainers1_idx` (`trainers_ID` ASC),
  CONSTRAINT `fk_trainers_has_locations_trainers1`
    FOREIGN KEY (`trainers_ID`)
    REFERENCES `sportopolis`.`trainers` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trainers_has_locations_locations1`
    FOREIGN KEY (`locations_ID`)
    REFERENCES `sportopolis`.`locations` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sportopolis`.`sponsors_has_events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`sponsors_has_events` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`sponsors_has_events` (
  `sponsors_ID` INT(11) NOT NULL,
  `events_ID` INT(11) NOT NULL,
  PRIMARY KEY (`sponsors_ID`, `events_ID`),
  INDEX `fk_sponsors_has_events_events1_idx` (`events_ID` ASC),
  INDEX `fk_sponsors_has_events_sponsors1_idx` (`sponsors_ID` ASC),
  CONSTRAINT `fk_sponsors_has_events_sponsors1`
    FOREIGN KEY (`sponsors_ID`)
    REFERENCES `sportopolis`.`sponsors` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sponsors_has_events_events1`
    FOREIGN KEY (`events_ID`)
    REFERENCES `sportopolis`.`events` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sportopolis`.`sports_has_stores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`sports_has_stores` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`sports_has_stores` (
  `sports_ID` INT(11) NOT NULL,
  `stores_ID` INT(11) NOT NULL,
  PRIMARY KEY (`sports_ID`, `stores_ID`),
  INDEX `fk_sports_has_stores_stores1_idx` (`stores_ID` ASC),
  INDEX `fk_sports_has_stores_sports1_idx` (`sports_ID` ASC),
  CONSTRAINT `fk_sports_has_stores_sports1`
    FOREIGN KEY (`sports_ID`)
    REFERENCES `sportopolis`.`sports` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sports_has_stores_stores1`
    FOREIGN KEY (`stores_ID`)
    REFERENCES `sportopolis`.`stores` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sportopolis`.`locations_has_sports`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sportopolis`.`locations_has_sports` ;

CREATE TABLE IF NOT EXISTS `sportopolis`.`locations_has_sports` (
  `locations_ID` INT(11) NOT NULL,
  `sports_ID` INT(11) NOT NULL,
  PRIMARY KEY (`locations_ID`, `sports_ID`),
  INDEX `fk_locations_has_sports_sports1_idx` (`sports_ID` ASC),
  INDEX `fk_locations_has_sports_locations1_idx` (`locations_ID` ASC),
  CONSTRAINT `fk_locations_has_sports_locations1`
    FOREIGN KEY (`locations_ID`)
    REFERENCES `sportopolis`.`locations` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_locations_has_sports_sports1`
    FOREIGN KEY (`sports_ID`)
    REFERENCES `sportopolis`.`sports` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
