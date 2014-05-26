SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sistema_nomina` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci ;
USE `sistema_nomina` ;

-- -----------------------------------------------------
-- Table `sistema_nomina`.`Departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_nomina`.`Departamento` (
  `idDepartamento` INT NOT NULL,
  `Nombre_Depto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idDepartamento`),
  UNIQUE INDEX `idDepartamento_UNIQUE` (`idDepartamento` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_nomina`.`Empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_nomina`.`Empresa` (
  `idEmpresa` INT NOT NULL,
  `Nombre_Empresa` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEmpresa`),
  UNIQUE INDEX `idEmpresa_UNIQUE` (`idEmpresa` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_nomina`.`TipoPeriodo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_nomina`.`TipoPeriodo` (
  `idTipoPeriodo` INT NOT NULL AUTO_INCREMENT,
  `TipoPeriodo` VARCHAR(45) NOT NULL,
  UNIQUE INDEX `idTipoPeriodo_UNIQUE` (`idTipoPeriodo` ASC),
  PRIMARY KEY (`idTipoPeriodo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_nomina`.`Empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_nomina`.`Empleado` (
  `idEmpleado` INT NOT NULL,
  `emp_idDeparameto_FK` INT NOT NULL COMMENT '					',
  `emp_idEmpresa_FK` INT NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Direccion` VARCHAR(100) NOT NULL,
  `Puesto` VARCHAR(45) NOT NULL,
  `Telefono` INT NOT NULL,
  `Celular` INT NOT NULL,
  `Extension` INT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `Banco` VARCHAR(45) NOT NULL,
  `Cta_Bancaria` VARCHAR(45) NOT NULL,
  `CLABE_Bancaria` VARCHAR(45) NOT NULL,
  `SueldoBase` INT NOT NULL COMMENT 'Sueldo de Semana o Quincena',
  `emp_idTipoPeriodo_FK` INT NOT NULL,
  PRIMARY KEY (`idEmpleado`),
  UNIQUE INDEX `idEmpleado_UNIQUE` (`idEmpleado` ASC, `emp_idDeparameto_FK` ASC),
  INDEX `idDepartamento_FK_idx` (`emp_idDeparameto_FK` ASC),
  INDEX `idEmpresa_FK_idx` (`emp_idEmpresa_FK` ASC),
  INDEX `idTipoPeriodo_FK_idx` (`emp_idTipoPeriodo_FK` ASC),
  CONSTRAINT `emp_idDepartamento_FK`
    FOREIGN KEY (`emp_idDeparameto_FK`)
    REFERENCES `sistema_nomina`.`Departamento` (`idDepartamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `emp_idEmpresa_FK`
    FOREIGN KEY (`emp_idEmpresa_FK`)
    REFERENCES `sistema_nomina`.`Empresa` (`idEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `emp_idTipoPeriodo_FK`
    FOREIGN KEY (`emp_idTipoPeriodo_FK`)
    REFERENCES `sistema_nomina`.`TipoPeriodo` (`idTipoPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_nomina`.`Periodo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_nomina`.`Periodo` (
  `idPeriodo` INT NOT NULL AUTO_INCREMENT,
  `Periodo` VARCHAR(45) NOT NULL,
  `per_idTipoPeriodo_FK` INT NOT NULL,
  PRIMARY KEY (`idPeriodo`),
  INDEX `idTipoPeriodo_FK_idx` (`per_idTipoPeriodo_FK` ASC),
  UNIQUE INDEX `idPeriodo_UNIQUE` (`idPeriodo` ASC),
  CONSTRAINT `per_idTipoPeriodo_FK`
    FOREIGN KEY (`per_idTipoPeriodo_FK`)
    REFERENCES `sistema_nomina`.`TipoPeriodo` (`idTipoPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_nomina`.`Recibos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_nomina`.`Recibos` (
  `idRecibos` INT NOT NULL AUTO_INCREMENT,
  `Saldo` VARCHAR(45) NOT NULL,
  `Dia` VARCHAR(45) NOT NULL,
  `Mes` VARCHAR(45) NOT NULL,
  `Año` VARCHAR(45) NOT NULL,
  `rec_idPeriodo_FK` INT NOT NULL,
  `rec_idpagos_FK` INT NOT NULL,
  PRIMARY KEY (`idRecibos`),
  UNIQUE INDEX `idRecibos_UNIQUE` (`idRecibos` ASC),
  INDEX `idPeriodo_FK_idx` (`rec_idPeriodo_FK` ASC),
  INDEX `idEmpleado_FK_idx` (`rec_idpagos_FK` ASC),
  CONSTRAINT `rec_idPeriodo_FK`
    FOREIGN KEY (`rec_idPeriodo_FK`)
    REFERENCES `sistema_nomina`.`Periodo` (`idPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `rec_idEmpleado_FK`
    FOREIGN KEY (`rec_idpagos_FK`)
    REFERENCES `sistema_nomina`.`Empleado` (`idEmpleado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_nomina`.`Pagos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_nomina`.`Pagos` (
  `idPagos` INT NOT NULL,
  `Pago` DOUBLE NOT NULL,
  `Dia` INT NOT NULL,
  `Mes` INT NOT NULL,
  `Año` INT NOT NULL,
  `pag_idEmpleado_FK` INT NOT NULL,
  `pag_idEmpresa_FK` INT NOT NULL,
  `pag_idDepartamento_FK` INT NOT NULL,
  `idSueldo` INT NOT NULL,
  `pag_idPeriodo_FK` INT NOT NULL,
  `PagoEspecial` TINYINT(1) NOT NULL DEFAULT 0,
  `pag_idRecibos_FK` INT NOT NULL,
  PRIMARY KEY (`idPagos`),
  UNIQUE INDEX `idPagos_UNIQUE` (`idPagos` ASC),
  INDEX `idEmpleado_FK_idx` (`pag_idEmpleado_FK` ASC),
  INDEX `idEmpresa_FK_idx` (`pag_idEmpresa_FK` ASC),
  INDEX `idDepartamento_Fk_idx` (`pag_idDepartamento_FK` ASC),
  INDEX `idPeriodo_FK_idx` (`pag_idPeriodo_FK` ASC),
  INDEX `idRecibos_FK_idx` (`pag_idRecibos_FK` ASC),
  CONSTRAINT `pag_idEmpleado_FK`
    FOREIGN KEY (`pag_idEmpleado_FK`)
    REFERENCES `sistema_nomina`.`Empleado` (`idEmpleado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `pag_idEmpresa_FK`
    FOREIGN KEY (`pag_idEmpresa_FK`)
    REFERENCES `sistema_nomina`.`Empresa` (`idEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `pag_idDepartamento_FK`
    FOREIGN KEY (`pag_idDepartamento_FK`)
    REFERENCES `sistema_nomina`.`Departamento` (`idDepartamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `pag_idPeriodo_FK`
    FOREIGN KEY (`pag_idPeriodo_FK`)
    REFERENCES `sistema_nomina`.`Periodo` (`idPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `pag_idRecibos_FK`
    FOREIGN KEY (`pag_idRecibos_FK`)
    REFERENCES `sistema_nomina`.`Recibos` (`idRecibos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_nomina`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_nomina`.`Usuarios` (
  `idUsuarios` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Usuario` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Admin` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  UNIQUE INDEX `idUsuarios_UNIQUE` (`idUsuarios` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
