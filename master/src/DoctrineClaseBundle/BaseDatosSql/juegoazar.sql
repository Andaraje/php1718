-- MySQL Script generated by MySQL Workbench
-- Wed Jan 17 09:40:34 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema juegoazar
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema juegoazar
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `juegoazar` DEFAULT CHARACTER SET utf8 ;
USE `juegoazar` ;

-- -----------------------------------------------------
-- Table `juegoazar`.`jugador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juegoazar`.`jugador` (
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `juegoazar`.`partida`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juegoazar`.`partida` (
  `idPartida` INT(11) NOT NULL AUTO_INCREMENT,
  `Fecha` DATE NOT NULL,
  `Puntos` INT(11) NOT NULL,
  `jugador_email` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idPartida`),
  INDEX `fk_partida_jugador_idx` (`jugador_email` ASC),
  CONSTRAINT `fk_partida_jugador`
    FOREIGN KEY (`jugador_email`)
    REFERENCES `juegoazar`.`jugador` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `juegoazar`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juegoazar`.`producto` (
  `idProducto` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(250) NOT NULL,
  `Imagen` LONGBLOB NULL DEFAULT NULL,
  PRIMARY KEY (`idProducto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `juegoazar`.`jugador_has_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juegoazar`.`jugador_has_producto` (
  `jugador_email` VARCHAR(50) NOT NULL,
  `producto_idProducto` INT(11) NOT NULL,
  INDEX `fk_jugador_has_producto_jugador1_idx` (`jugador_email` ASC),
  INDEX `fk_jugador_has_producto_producto1_idx` (`producto_idProducto` ASC),
  PRIMARY KEY (`jugador_email`, `producto_idProducto`),
  CONSTRAINT `fk_jugador_has_producto_jugador1`
    FOREIGN KEY (`jugador_email`)
    REFERENCES `juegoazar`.`jugador` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jugador_has_producto_producto1`
    FOREIGN KEY (`producto_idProducto`)
    REFERENCES `juegoazar`.`producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;