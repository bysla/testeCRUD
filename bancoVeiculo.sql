CREATE TABLE `teste`.`CadastroVeiculos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `placa` VARCHAR(10) NOT NULL,
  `marca` VARCHAR(20) NOT NULL,
  `modelo` VARCHAR(35) NOT NULL,
  `cor` VARCHAR(20) NOT NULL,
  `porte` VARCHAR(20) NOT NULL,
  `tipo_de_carga` VARCHAR(20) NOT NULL,
  `chassis` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`));
