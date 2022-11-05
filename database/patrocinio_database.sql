#database NAME AN CREATION
CREATE DATABASE IF NOT EXISTS patrocinio_db;
#select in the database
USE patrocinio_db;
#activa el uso de eventos
SET GLOBAL event_scheduler = ON;
#creation of tables

CREATE TABLE IF NOT EXISTS `beneficiario_externo` (
  `CLIENT_ID` int(11) NOT NULL,
  `CLIENT_NAME` varchar(70) DEFAULT NULL,
  `PENDDING_YN` varchar(15) DEFAULT NULL,
  `CLIENT_GENDER_DESC` varchar(50) DEFAULT NULL,
  `ENROLLMENT_STATUS` varchar(15) DEFAULT NULL,
  `CLIENT_DOB` varchar(50) DEFAULT NULL,
  `SPONSOR_ID` varchar(20) DEFAULT NULL,
  `PGM_ID` int(20) DEFAULT NULL,
  PRIMARY KEY (`CLIENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `beneficiario_interno` (
  `CLIENT_ID` int(11) NOT NULL,
  `nomap` varchar(50) DEFAULT NULL,
  `docn` int(15) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `tipodoc` varchar(50) DEFAULT NULL,
  `fecnac` date DEFAULT NULL,
  `grado` varchar(20) DEFAULT NULL,
  `escuela` varchar(50) DEFAULT NULL,
  `familia` varchar(50) DEFAULT NULL,
  `barrio` varchar(50) DEFAULT NULL,
  `zona` varchar(50) DEFAULT NULL,
  `contacto1` varchar(20) DEFAULT NULL,
  `nombre_paren1` varchar(50) DEFAULT NULL,
  `contacto2` varchar(20) DEFAULT NULL,
  `nombre_paren2` varchar(50) DEFAULT NULL,
  `contacto3` varchar(20) DEFAULT NULL,
  `nombre_paren3` varchar(50) DEFAULT NULL,
  `contacto4` varchar(20) DEFAULT NULL,
  `nombre_paren4` varchar(50) DEFAULT NULL,
  `referdom` varchar(50) DEFAULT NULL,
  `obs` varchar(50) DEFAULT NULL,
  `insc` int(10) DEFAULT NULL,
  `programa` int(11) DEFAULT NULL,
  index(CLIENT_ID),
  PRIMARY KEY (`CLIENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `facilitador` (
  `id_facilitador` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `barrio` varchar(200) DEFAULT NULL,
  `celular` int(20) DEFAULT NULL,
  nombre_apellido  varchar(80) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `obs` varchar(50) DEFAULT NULL,
  `observacion` varchar(50) DEFAULT NULL,
  index(id_facilitador),
  PRIMARY KEY (`id_facilitador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tarea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecped` date DEFAULT NULL,
  `fecvisita` date DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `tipo_tarea` varchar(50) DEFAULT NULL,
  `obs` varchar(50) DEFAULT NULL,
  `CLIENT_ID` int  DEFAULT NULL,
  index(id),
  PRIMARY KEY (`id`),
  `id_facilitador` int,

  constraint fac_tarea
  foreign key (id_facilitador)
  references facilitador (`id_facilitador`) on delete no action on update cascade
 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
