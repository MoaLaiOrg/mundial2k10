-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.36-community-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema mundial2k10
--

CREATE DATABASE IF NOT EXISTS mundial2k10;
USE mundial2k10;

--
-- Definition of table `apuesta`
--

DROP TABLE IF EXISTS `apuesta`;
CREATE TABLE `apuesta` (
  `idApuesta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idUsuario` int(10) unsigned NOT NULL DEFAULT '0',
  `tbEstado` char(1) NOT NULL DEFAULT 'P',
  PRIMARY KEY (`idApuesta`),
  KEY `usuario` (`idUsuario`),
  CONSTRAINT `usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apuesta`
--

/*!40000 ALTER TABLE `apuesta` DISABLE KEYS */;
INSERT INTO `apuesta` (`idApuesta`,`fecha`,`idUsuario`,`tbEstado`) VALUES 
 (1,'0000-00-00 00:00:00',0,'A'),
 (10,'0000-00-00 00:00:00',14,'P'),
 (11,'0000-00-00 00:00:00',15,'P');
/*!40000 ALTER TABLE `apuesta` ENABLE KEYS */;


--
-- Definition of table `apuestadetalle`
--

DROP TABLE IF EXISTS `apuestadetalle`;
CREATE TABLE `apuestadetalle` (
  `idApuesta` int(10) unsigned NOT NULL,
  `idPartido` int(10) unsigned NOT NULL DEFAULT '0',
  `golesEquipo1` int(10) unsigned DEFAULT NULL,
  `golesEquipo2` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idApuesta`,`idPartido`),
  KEY `FK_apuestaDetalle_2` (`idPartido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apuestadetalle`
--

/*!40000 ALTER TABLE `apuestadetalle` DISABLE KEYS */;
INSERT INTO `apuestadetalle` (`idApuesta`,`idPartido`,`golesEquipo1`,`golesEquipo2`) VALUES 
 (0,1,NULL,NULL),
 (0,2,NULL,NULL),
 (0,3,NULL,NULL),
 (0,4,NULL,NULL),
 (0,5,NULL,NULL),
 (0,6,NULL,NULL),
 (0,7,NULL,NULL),
 (0,8,NULL,NULL),
 (0,9,NULL,NULL),
 (0,10,NULL,NULL),
 (0,11,NULL,NULL),
 (0,12,NULL,NULL),
 (0,13,NULL,NULL),
 (0,14,NULL,NULL),
 (0,15,NULL,NULL),
 (0,16,NULL,NULL),
 (0,17,NULL,NULL),
 (0,18,NULL,NULL),
 (0,19,NULL,NULL),
 (0,20,NULL,NULL),
 (0,21,NULL,NULL),
 (0,22,NULL,NULL),
 (0,23,NULL,NULL),
 (0,24,NULL,NULL),
 (0,25,NULL,NULL),
 (0,26,NULL,NULL),
 (0,27,NULL,NULL),
 (0,28,NULL,NULL),
 (0,29,NULL,NULL),
 (0,30,NULL,NULL),
 (0,31,NULL,NULL),
 (0,32,NULL,NULL),
 (0,33,NULL,NULL),
 (0,34,NULL,NULL),
 (0,35,NULL,NULL),
 (0,36,NULL,NULL),
 (0,37,NULL,NULL),
 (0,38,NULL,NULL),
 (0,39,NULL,NULL),
 (0,40,NULL,NULL),
 (0,41,NULL,NULL),
 (0,42,NULL,NULL),
 (0,43,NULL,NULL),
 (0,44,NULL,NULL),
 (0,45,NULL,NULL),
 (0,46,NULL,NULL),
 (0,47,NULL,NULL),
 (0,48,NULL,NULL),
 (11,1,NULL,NULL),
 (11,2,NULL,NULL),
 (11,3,NULL,NULL),
 (11,4,NULL,NULL),
 (11,5,NULL,NULL),
 (11,6,NULL,NULL),
 (11,7,NULL,NULL),
 (11,8,NULL,NULL),
 (11,9,NULL,NULL),
 (11,10,NULL,NULL),
 (11,11,NULL,NULL),
 (11,12,NULL,NULL),
 (11,13,NULL,NULL),
 (11,14,NULL,NULL),
 (11,15,NULL,NULL),
 (11,16,NULL,NULL),
 (11,17,NULL,NULL),
 (11,18,NULL,NULL),
 (11,19,NULL,NULL),
 (11,20,NULL,NULL),
 (11,21,NULL,NULL),
 (11,22,NULL,NULL),
 (11,23,NULL,NULL),
 (11,24,NULL,NULL),
 (11,25,NULL,NULL),
 (11,26,NULL,NULL),
 (11,27,NULL,NULL),
 (11,28,NULL,NULL),
 (11,29,NULL,NULL),
 (11,30,NULL,NULL),
 (11,31,NULL,NULL),
 (11,32,NULL,NULL),
 (11,33,NULL,NULL),
 (11,34,NULL,NULL),
 (11,35,NULL,NULL),
 (11,36,NULL,NULL),
 (11,37,NULL,NULL),
 (11,38,NULL,NULL),
 (11,39,NULL,NULL),
 (11,40,NULL,NULL),
 (11,41,NULL,NULL),
 (11,42,NULL,NULL),
 (11,43,NULL,NULL),
 (11,44,NULL,NULL),
 (11,45,NULL,NULL),
 (11,46,NULL,NULL),
 (11,47,NULL,NULL),
 (11,48,NULL,NULL);
/*!40000 ALTER TABLE `apuestadetalle` ENABLE KEYS */;


--
-- Definition of table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE `equipo` (
  `nombre` varchar(145) NOT NULL,
  `idEquipo` varchar(2) NOT NULL DEFAULT 'x',
  PRIMARY KEY (`idEquipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipo`
--

/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` (`nombre`,`idEquipo`) VALUES 
 ('Argentina','ar'),
 ('Australia','au'),
 ('Brasil','br'),
 ('Suiza','ch'),
 ('CostadeMarfil','ci'),
 ('Chile','cl'),
 ('Camerun','cm'),
 ('Dinamarca','dk'),
 ('Argelia','dz'),
 ('Espania','es'),
 ('Francia','fr'),
 ('Alemania','ge'),
 ('Ghana','gh'),
 ('Grecia','gr'),
 ('Honduras','ho'),
 ('Italia','it'),
 ('Japon','jp'),
 ('CoreadelSur','ko'),
 ('CoreadelNorte','kp'),
 ('Mexico','mx'),
 ('Holanda','ne'),
 ('Nigeria','ng'),
 ('NuevaZelanda','nz'),
 ('Portugal','pt'),
 ('Paraguay','py'),
 ('Serbia','rs'),
 ('Eslovenia','si'),
 ('Eslovaquia','sk'),
 ('Inglaterra','uk'),
 ('EstadosUnidos','us'),
 ('Uruguay','uy'),
 ('Sudafrica','za');
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;


--
-- Definition of table `partido`
--

DROP TABLE IF EXISTS `partido`;
CREATE TABLE `partido` (
  `fecha` datetime DEFAULT NULL,
  `tbEvento` varchar(1) DEFAULT NULL,
  `idEquipo1` varchar(2) DEFAULT NULL,
  `idEquipo2` varchar(2) DEFAULT NULL,
  `golesEquipo1` int(10) unsigned DEFAULT NULL,
  `golesEquipo2` int(10) unsigned DEFAULT NULL,
  `mkBazan` int(10) unsigned DEFAULT NULL,
  `mkCoke` int(10) unsigned DEFAULT NULL,
  `mkVieja` int(10) unsigned DEFAULT NULL,
  `mkMotoraton` int(10) unsigned DEFAULT NULL,
  `mkExcellent` int(10) unsigned DEFAULT NULL,
  `mkAmargo` int(11) DEFAULT NULL,
  `mkUsa` int(10) unsigned DEFAULT NULL,
  `mkHyena` int(11) DEFAULT NULL,
  `idGrupo` varchar(1) DEFAULT NULL,
  `idPartido` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPartido`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partido`
--

/*!40000 ALTER TABLE `partido` DISABLE KEYS */;
INSERT INTO `partido` (`fecha`,`tbEvento`,`idEquipo1`,`idEquipo2`,`golesEquipo1`,`golesEquipo2`,`mkBazan`,`mkCoke`,`mkVieja`,`mkMotoraton`,`mkExcellent`,`mkAmargo`,`mkUsa`,`mkHyena`,`idGrupo`,`idPartido`) VALUES 
 ('2010-06-11 16:00:00',NULL,'za','mx',NULL,NULL,1,1,1,NULL,1,NULL,NULL,NULL,'A',1),
 ('2010-06-11 20:30:00',NULL,'uy','fr',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,'A',2),
 ('2010-06-12 16:00:00',NULL,'ar','ng',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,'B',3),
 ('2010-06-12 13:30:00',NULL,'ko','gr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B',4),
 ('2010-06-12 20:30:00',NULL,'uk','us',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'C',5),
 ('2010-06-13 13:30:00',NULL,'dz','si',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'C',6),
 ('2010-06-13 20:30:00',NULL,'ge','au',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',7),
 ('2010-06-13 16:00:00',NULL,'rs','gh',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,'D',8),
 ('2010-06-14 13:30:00',NULL,'ne','dk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'E',9),
 ('2010-06-14 16:00:00',NULL,'jp','cm',NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'E',10),
 ('2010-06-14 20:30:00',NULL,'it','py',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'F',11),
 ('2010-06-15 13:30:00',NULL,'nz','sk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'F',12),
 ('2010-06-15 16:00:00',NULL,'ci','pt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'G',13),
 ('2010-06-15 20:30:00',NULL,'br','kp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'G',14),
 ('2010-06-16 13:30:00',NULL,'ho','cl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'H',15),
 ('2010-06-16 16:00:00',NULL,'es','ch',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'H',16),
 ('2010-06-16 20:30:00',NULL,'za','uy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',17),
 ('2010-06-17 20:30:00',NULL,'fr','mx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',18),
 ('2010-06-17 16:00:00',NULL,'gr','ng',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B',19),
 ('2010-06-17 13:30:00',NULL,'ar','ko',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B',20),
 ('2010-06-18 13:30:00',NULL,'ge','rs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',21),
 ('2010-06-18 16:00:00',NULL,'si','us',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'C',22),
 ('2010-06-18 20:30:00',NULL,'uk','dz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'C',23),
 ('2010-06-19 16:00:00',NULL,'gh','au',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',24),
 ('2010-06-19 13:30:00',NULL,'ne','jp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'E',25),
 ('2010-06-19 20:30:00',NULL,'cm','dk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'E',26),
 ('2010-06-20 13:30:00',NULL,'sk','py',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'F',27),
 ('2010-06-20 16:00:00',NULL,'it','nz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'F',28),
 ('2010-06-20 20:30:00',NULL,'br','ci',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'G',29),
 ('2010-06-21 13:30:00',NULL,'pt','kp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'G',30),
 ('2010-06-21 16:00:00',NULL,'cl','ch',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'H',31),
 ('2010-06-21 20:30:00',NULL,'es','ho',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'H',32),
 ('2010-06-22 16:00:00',NULL,'mx','uy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',33),
 ('2010-06-22 16:00:00',NULL,'fr','za',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'A',34),
 ('2010-06-22 20:30:00',NULL,'ng','ko',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B',35),
 ('2010-06-22 20:30:00',NULL,'gr','ar',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'B',36),
 ('2010-06-23 16:00:00',NULL,'si','uk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'C',37),
 ('2010-06-23 16:00:00',NULL,'us','dz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'C',38),
 ('2010-06-23 20:30:00',NULL,'gh','ge',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',39),
 ('2010-06-23 20:30:00',NULL,'au','rs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'D',40),
 ('2010-06-24 16:00:00',NULL,'sk','it',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'F',41),
 ('2010-06-24 16:00:00',NULL,'py','nz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'F',42),
 ('2010-06-24 20:30:00',NULL,'dk','jp',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'E',43),
 ('2010-06-24 20:30:00',NULL,'cm','ne',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'E',44),
 ('2010-06-25 16:00:00',NULL,'pt','br',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'G',45),
 ('2010-06-25 16:00:00',NULL,'kp','ci',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'G',46),
 ('2010-06-25 20:30:00',NULL,'cl','es',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'H',47),
 ('2010-06-25 20:30:00',NULL,'ch','ho',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'H',48);
/*!40000 ALTER TABLE `partido` ENABLE KEYS */;


--
-- Definition of table `tmpequipo`
--

DROP TABLE IF EXISTS `tmpequipo`;
CREATE TABLE `tmpequipo` (
  `id` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmpequipo`
--

/*!40000 ALTER TABLE `tmpequipo` DISABLE KEYS */;
INSERT INTO `tmpequipo` (`id`,`nombre`) VALUES 
 ('ge','Alemania'),
 ('ko','CoreadelSur'),
 ('gh','Ghana'),
 ('nz','NuevaZelanda'),
 ('dz','Argelia'),
 ('ci','CostadeMarfil'),
 ('gr','Grecia'),
 ('ne','Holanda'),
 ('ar','Argentina'),
 ('dk','Dinamarca'),
 ('ho','Honduras'),
 ('py','Paraguay'),
 ('au','Australia'),
 ('sk','Eslovaquia'),
 ('uk','Inglaterra'),
 ('pt','Portugal'),
 ('br','Brasil'),
 ('si','Eslovenia'),
 ('it','Italia'),
 ('rs','Serbia'),
 ('cm','Camerun'),
 ('es','Espania'),
 ('jp','Japon'),
 ('za','Sudafrica'),
 ('cl','Chile'),
 ('us','EstadosUnidos'),
 ('mx','Mexico'),
 ('ch','Suiza'),
 ('kp','CoreadelNorte'),
 ('fr','Francia'),
 ('ng','Nigeria'),
 ('uy','Uruguay');
/*!40000 ALTER TABLE `tmpequipo` ENABLE KEYS */;


--
-- Definition of table `tmppartido`
--

DROP TABLE IF EXISTS `tmppartido`;
CREATE TABLE `tmppartido` (
  `idGrupo` varchar(1) NOT NULL,
  `idPartido` int(10) unsigned NOT NULL DEFAULT '0',
  `lugar` varchar(45) NOT NULL,
  `teamA` varchar(2) DEFAULT NULL,
  `teamB` varchar(2) DEFAULT NULL,
  `fechaHora` datetime NOT NULL,
  PRIMARY KEY (`idPartido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmppartido`
--

/*!40000 ALTER TABLE `tmppartido` DISABLE KEYS */;
INSERT INTO `tmppartido` (`idGrupo`,`idPartido`,`lugar`,`teamA`,`teamB`,`fechaHora`) VALUES 
 ('A',1,'Johannesburg-JSC','za','mx','2010-06-11 16:00:00'),
 ('A',2,'CapeTown','uy','fr','2010-06-11 20:30:00'),
 ('B',3,'Johannesburg-JEP','ar','ng','2010-06-12 16:00:00'),
 ('B',4,'NelsonMandelaBay/PortElizabeth','ko','gr','2010-06-12 13:30:00'),
 ('C',5,'Rustenburg','uk','us','2010-06-12 20:30:00'),
 ('C',6,'Polokwane','dz','si','2010-06-13 13:30:00'),
 ('D',7,'Durban','ge','au','2010-06-13 20:30:00'),
 ('D',8,'Tshwane/Pretoria','rs','gh','2010-06-13 16:00:00'),
 ('E',9,'Johannesburg-JSC','ne','dk','2010-06-14 13:30:00'),
 ('E',10,'Mangaung/Bloemfontein','jp','cm','2010-06-14 16:00:00'),
 ('F',11,'CapeTown','it','py','2010-06-14 20:30:00'),
 ('F',12,'Rustenburg','nz','sk','2010-06-15 13:30:00'),
 ('G',13,'NelsonMandelaBay/PortElizabeth','ci','pt','2010-06-15 16:00:00'),
 ('G',14,'Johannesburg-JEP','br','kp','2010-06-15 20:30:00'),
 ('H',15,'Nelspruit','ho','cl','2010-06-16 13:30:00'),
 ('H',16,'Durban','es','ch','2010-06-16 16:00:00'),
 ('A',17,'Tshwane/Pretoria','za','uy','2010-06-16 20:30:00'),
 ('A',18,'Polokwane','fr','mx','2010-06-17 20:30:00'),
 ('B',19,'Mangaung/Bloemfontein','gr','ng','2010-06-17 16:00:00'),
 ('B',20,'Johannesburg-JSC','ar','ko','2010-06-17 13:30:00'),
 ('D',21,'NelsonMandelaBay/PortElizabeth','ge','rs','2010-06-18 13:30:00'),
 ('C',22,'Johannesburg-JEP','si','us','2010-06-18 16:00:00'),
 ('C',23,'CapeTown','uk','dz','2010-06-18 20:30:00'),
 ('D',24,'Rustenburg','gh','au','2010-06-19 16:00:00'),
 ('E',25,'Durban','ne','jp','2010-06-19 13:30:00'),
 ('E',26,'Tshwane/Pretoria','cm','dk','2010-06-19 20:30:00'),
 ('F',27,'Mangaung/Bloemfontein','sk','py','2010-06-20 13:30:00'),
 ('F',28,'Nelspruit','it','nz','2010-06-20 16:00:00'),
 ('G',29,'Johannesburg-JSC','br','ci','2010-06-20 20:30:00'),
 ('G',30,'CapeTown','pt','kp','2010-06-21 13:30:00'),
 ('H',31,'NelsonMandelaBay/PortElizabeth','cl','ch','2010-06-21 16:00:00'),
 ('H',32,'Johannesburg-JEP','es','ho','2010-06-21 20:30:00'),
 ('A',33,'Rustenburg','mx','uy','2010-06-22 16:00:00'),
 ('A',34,'Mangaung/Bloemfontein','fr','za','2010-06-22 16:00:00'),
 ('B',35,'Durban','ng','ko','2010-06-22 20:30:00'),
 ('B',36,'Polokwane','gr','ar','2010-06-22 20:30:00'),
 ('C',37,'NelsonMandelaBay/PortElizabeth','si','uk','2010-06-23 16:00:00'),
 ('C',38,'Tshwane/Pretoria','us','dz','2010-06-23 16:00:00'),
 ('D',39,'Johannesburg-JSC','gh','ge','2010-06-23 20:30:00'),
 ('D',40,'Nelspruit','au','rs','2010-06-23 20:30:00'),
 ('F',41,'Johannesburg-JEP','sk','it','2010-06-24 16:00:00'),
 ('F',42,'Polokwane','py','nz','2010-06-24 16:00:00'),
 ('E',43,'Rustenburg','dk','jp','2010-06-24 20:30:00'),
 ('E',44,'CapeTown','cm','ne','2010-06-24 20:30:00'),
 ('G',45,'Durban','pt','br','2010-06-25 16:00:00'),
 ('G',46,'Nelspruit','kp','ci','2010-06-25 16:00:00'),
 ('H',47,'Tshwane/Pretoria','cl','es','2010-06-25 20:30:00'),
 ('H',48,'Mangaung/Bloemfontein','ch','ho','2010-06-25 20:30:00');
/*!40000 ALTER TABLE `tmppartido` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL DEFAULT '',
  `fechaIngreso` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `password` varchar(45) NOT NULL DEFAULT '',
  `idEgel` int(11) DEFAULT NULL,
  `idEquipo` int(10) unsigned NOT NULL DEFAULT '0',
  `apodoEquipo` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `nombreUsuario` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idUsuario`,`nombre`,`fechaIngreso`,`password`,`idEgel`,`idEquipo`,`apodoEquipo`) VALUES 
 (1,'admin','0000-00-00 00:00:00','',NULL,0,''),
 (2,'mporto','0000-00-00 00:00:00','',NULL,0,''),
 (3,'mportu','0000-00-00 00:00:00','',NULL,0,''),
 (4,'3','0000-00-00 00:00:00','',NULL,0,''),
 (5,'0','0000-00-00 00:00:00','',NULL,0,''),
 (10,'a1','0000-00-00 00:00:00','',NULL,0,''),
 (12,'a2','0000-00-00 00:00:00','',NULL,0,''),
 (13,'a3','0000-00-00 00:00:00','',NULL,0,''),
 (14,'a4','0000-00-00 00:00:00','',NULL,0,''),
 (15,'a5','0000-00-00 00:00:00','',NULL,0,'');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


--
-- Definition of procedure `addUser`
--

DROP PROCEDURE IF EXISTS `addUser`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addUser`(IN userName varchar(20))
begin

  -- usuario
  insert into usuario(nombre)
  values (userName);

  select max(idUsuario) into @maxIdUsuario from usuario;
  select @maxIdUsuario;

  -- apuesta
  insert into apuesta(idUsuario)
  values(@maxIdUsuario);

  select max(idApuesta) into @maxIdApuesta from apuesta;

  -- apuestadetalle
  insert into apuestadetalle(idPartido, idApuesta)
  select idPartido, @maxIdApuesta from partido;


END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
