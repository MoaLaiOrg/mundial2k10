-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt


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
  `idApuesta` int(10) unsigned NOT NULL auto_increment,
  `fecha` datetime NOT NULL default '0000-00-00 00:00:00',
  `idUsuario` int(10) unsigned NOT NULL default '0',
  `tbEstado` char(1) NOT NULL default 'P',
  PRIMARY KEY  (`idApuesta`),
  KEY `usuario` (`idUsuario`),
  CONSTRAINT `usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apuesta`
--

/*!40000 ALTER TABLE `apuesta` DISABLE KEYS */;
INSERT INTO `apuesta` (`idApuesta`,`fecha`,`idUsuario`,`tbEstado`) VALUES 
 (16,'0000-00-00 00:00:00',20,'P'),
 (17,'0000-00-00 00:00:00',21,'P'),
 (18,'0000-00-00 00:00:00',22,'P'),
 (19,'0000-00-00 00:00:00',23,'P');
/*!40000 ALTER TABLE `apuesta` ENABLE KEYS */;


--
-- Definition of table `apuestadetalle`
--

DROP TABLE IF EXISTS `apuestadetalle`;
CREATE TABLE `apuestadetalle` (
  `idApuesta` int(10) unsigned NOT NULL,
  `idPartido` int(10) unsigned NOT NULL default '0',
  `golesEquipo1` int(10) unsigned default NULL,
  `golesEquipo2` int(10) unsigned default NULL,
  PRIMARY KEY  (`idApuesta`,`idPartido`),
  KEY `FK_apuestaDetalle_2` (`idPartido`),
  CONSTRAINT `FK_apuestadetalle_1` FOREIGN KEY (`idApuesta`) REFERENCES `apuesta` (`idApuesta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apuestadetalle`
--

/*!40000 ALTER TABLE `apuestadetalle` DISABLE KEYS */;
INSERT INTO `apuestadetalle` (`idApuesta`,`idPartido`,`golesEquipo1`,`golesEquipo2`) VALUES 
 (16,1,NULL,NULL),
 (16,2,NULL,NULL),
 (16,3,NULL,NULL),
 (16,4,NULL,NULL),
 (16,5,NULL,NULL),
 (16,6,NULL,NULL),
 (16,7,NULL,NULL),
 (16,8,NULL,NULL),
 (16,9,NULL,NULL),
 (16,10,NULL,NULL),
 (16,11,NULL,NULL),
 (16,12,NULL,NULL),
 (16,13,NULL,NULL),
 (16,14,NULL,NULL),
 (16,15,NULL,NULL),
 (16,16,NULL,NULL),
 (16,17,NULL,NULL),
 (16,18,NULL,NULL),
 (16,19,NULL,NULL),
 (16,20,NULL,NULL),
 (16,21,NULL,NULL),
 (16,22,NULL,NULL),
 (16,23,NULL,NULL),
 (16,24,NULL,NULL),
 (16,25,NULL,NULL),
 (16,26,NULL,NULL),
 (16,27,NULL,NULL),
 (16,28,NULL,NULL),
 (16,29,NULL,NULL),
 (16,30,NULL,NULL),
 (16,31,NULL,NULL),
 (16,32,NULL,NULL),
 (16,33,NULL,NULL),
 (16,34,NULL,NULL),
 (16,35,NULL,NULL),
 (16,36,NULL,NULL),
 (16,37,NULL,NULL),
 (16,38,NULL,NULL),
 (16,39,NULL,NULL),
 (16,40,NULL,NULL),
 (16,41,NULL,NULL),
 (16,42,NULL,NULL),
 (16,43,NULL,NULL),
 (16,44,NULL,NULL),
 (16,45,NULL,NULL),
 (16,46,NULL,NULL),
 (16,47,NULL,NULL),
 (16,48,NULL,NULL),
 (17,1,NULL,NULL),
 (17,2,NULL,NULL),
 (17,3,NULL,NULL),
 (17,4,NULL,NULL),
 (17,5,NULL,NULL),
 (17,6,NULL,NULL),
 (17,7,NULL,NULL),
 (17,8,NULL,NULL),
 (17,9,NULL,NULL),
 (17,10,NULL,NULL),
 (17,11,NULL,NULL),
 (17,12,NULL,NULL),
 (17,13,NULL,NULL),
 (17,14,NULL,NULL),
 (17,15,NULL,NULL),
 (17,16,NULL,NULL),
 (17,17,NULL,NULL),
 (17,18,NULL,NULL),
 (17,19,NULL,NULL),
 (17,20,NULL,NULL),
 (17,21,NULL,NULL),
 (17,22,NULL,NULL),
 (17,23,NULL,NULL),
 (17,24,NULL,NULL),
 (17,25,NULL,NULL),
 (17,26,NULL,NULL),
 (17,27,NULL,NULL),
 (17,28,NULL,NULL),
 (17,29,NULL,NULL),
 (17,30,NULL,NULL),
 (17,31,NULL,NULL),
 (17,32,NULL,NULL),
 (17,33,NULL,NULL),
 (17,34,NULL,NULL),
 (17,35,NULL,NULL),
 (17,36,NULL,NULL),
 (17,37,NULL,NULL),
 (17,38,NULL,NULL),
 (17,39,NULL,NULL),
 (17,40,NULL,NULL),
 (17,41,NULL,NULL),
 (17,42,NULL,NULL),
 (17,43,NULL,NULL),
 (17,44,NULL,NULL),
 (17,45,NULL,NULL),
 (17,46,NULL,NULL),
 (17,47,NULL,NULL),
 (17,48,NULL,NULL),
 (18,1,NULL,NULL),
 (18,2,NULL,NULL),
 (18,3,NULL,NULL),
 (18,4,NULL,NULL),
 (18,5,NULL,NULL),
 (18,6,NULL,NULL),
 (18,7,NULL,NULL),
 (18,8,NULL,NULL),
 (18,9,NULL,NULL),
 (18,10,NULL,NULL),
 (18,11,NULL,NULL),
 (18,12,NULL,NULL),
 (18,13,NULL,NULL),
 (18,14,NULL,NULL),
 (18,15,NULL,NULL),
 (18,16,NULL,NULL),
 (18,17,NULL,NULL),
 (18,18,NULL,NULL),
 (18,19,NULL,NULL),
 (18,20,NULL,NULL),
 (18,21,NULL,NULL),
 (18,22,NULL,NULL),
 (18,23,NULL,NULL),
 (18,24,NULL,NULL),
 (18,25,NULL,NULL),
 (18,26,NULL,NULL),
 (18,27,NULL,NULL),
 (18,28,NULL,NULL),
 (18,29,NULL,NULL),
 (18,30,NULL,NULL),
 (18,31,NULL,NULL),
 (18,32,NULL,NULL),
 (18,33,NULL,NULL),
 (18,34,NULL,NULL),
 (18,35,NULL,NULL),
 (18,36,NULL,NULL),
 (18,37,NULL,NULL),
 (18,38,NULL,NULL),
 (18,39,NULL,NULL),
 (18,40,NULL,NULL),
 (18,41,NULL,NULL),
 (18,42,NULL,NULL),
 (18,43,NULL,NULL),
 (18,44,NULL,NULL),
 (18,45,NULL,NULL),
 (18,46,NULL,NULL),
 (18,47,NULL,NULL),
 (18,48,NULL,NULL),
 (19,1,NULL,NULL),
 (19,2,NULL,NULL),
 (19,3,NULL,NULL),
 (19,4,NULL,NULL),
 (19,5,NULL,NULL),
 (19,6,NULL,NULL),
 (19,7,NULL,NULL),
 (19,8,NULL,NULL),
 (19,9,NULL,NULL),
 (19,10,NULL,NULL),
 (19,11,NULL,NULL),
 (19,12,NULL,NULL),
 (19,13,NULL,NULL),
 (19,14,NULL,NULL),
 (19,15,NULL,NULL),
 (19,16,NULL,NULL),
 (19,17,NULL,NULL),
 (19,18,NULL,NULL),
 (19,19,NULL,NULL),
 (19,20,NULL,NULL),
 (19,21,NULL,NULL),
 (19,22,NULL,NULL),
 (19,23,NULL,NULL),
 (19,24,NULL,NULL),
 (19,25,NULL,NULL),
 (19,26,NULL,NULL),
 (19,27,NULL,NULL),
 (19,28,NULL,NULL),
 (19,29,NULL,NULL),
 (19,30,NULL,NULL),
 (19,31,NULL,NULL),
 (19,32,NULL,NULL),
 (19,33,NULL,NULL),
 (19,34,NULL,NULL),
 (19,35,NULL,NULL),
 (19,36,NULL,NULL),
 (19,37,NULL,NULL),
 (19,38,NULL,NULL),
 (19,39,NULL,NULL),
 (19,40,NULL,NULL),
 (19,41,NULL,NULL),
 (19,42,NULL,NULL),
 (19,43,NULL,NULL),
 (19,44,NULL,NULL),
 (19,45,NULL,NULL),
 (19,46,NULL,NULL),
 (19,47,NULL,NULL),
 (19,48,NULL,NULL);
/*!40000 ALTER TABLE `apuestadetalle` ENABLE KEYS */;


--
-- Definition of table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE `equipo` (
  `nombre` varchar(145) NOT NULL,
  `idEquipo` varchar(2) NOT NULL default 'x',
  PRIMARY KEY  (`idEquipo`)
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
  `fecha` datetime default NULL,
  `tbEvento` varchar(1) default NULL,
  `idEquipo1` varchar(2) default NULL,
  `idEquipo2` varchar(2) default NULL,
  `golesEquipo1` int(10) unsigned default NULL,
  `golesEquipo2` int(10) unsigned default NULL,
  `mkBazan` int(10) unsigned default NULL,
  `mkCoke` int(10) unsigned default NULL,
  `mkVieja` int(10) unsigned default NULL,
  `mkMotoraton` int(10) unsigned default NULL,
  `mkExcellent` int(10) unsigned default NULL,
  `mkAmargo` int(11) default NULL,
  `mkUsa` int(10) unsigned default NULL,
  `mkHyena` int(11) default NULL,
  `idGrupo` varchar(1) default NULL,
  `idPartido` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`idPartido`)
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
  `idPartido` int(10) unsigned NOT NULL default '0',
  `lugar` varchar(45) NOT NULL,
  `teamA` varchar(2) default NULL,
  `teamB` varchar(2) default NULL,
  `fechaHora` datetime NOT NULL,
  PRIMARY KEY  (`idPartido`)
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
  `idUsuario` int(10) unsigned NOT NULL auto_increment,
  `nombre` varchar(45) NOT NULL default '',
  `fechaIngreso` datetime NOT NULL default '0000-00-00 00:00:00',
  `password` varchar(45) NOT NULL default '',
  `idEgel` int(11) default NULL,
  `idEquipo` int(10) unsigned NOT NULL default '0',
  `apodoEquipo` varchar(45) NOT NULL default '',
  `hash` varchar(45) NOT NULL,
  PRIMARY KEY  (`idUsuario`),
  UNIQUE KEY `nombreUsuario` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idUsuario`,`nombre`,`fechaIngreso`,`password`,`idEgel`,`idEquipo`,`apodoEquipo`,`hash`) VALUES 
 (20,'mporto','0000-00-00 00:00:00','',NULL,0,'','e50135d39a2a6cf5'),
 (21,'vdilena','0000-00-00 00:00:00','',NULL,0,'','ef8de9afa721baef'),
 (22,'dramos','0000-00-00 00:00:00','',NULL,0,'','e9b81f6b8d0042b5'),
 (23,'mbonavita','0000-00-00 00:00:00','',NULL,0,'','1c58dd47abcd6740');
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
  select substring(MD5(RAND()) FROM 1 FOR 16) into @hash;

  insert into usuario(nombre, hash)
  values (userName, @hash);

  select max(idUsuario) into @maxIdUsuario from usuario;

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
