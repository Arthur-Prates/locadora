-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema locadora
--

CREATE DATABASE IF NOT EXISTS locadora;
USE locadora;

--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoUser` varchar(7) NOT NULL DEFAULT 'regular',
  `nome` varchar(60) NOT NULL DEFAULT '',
  `nascimento` date DEFAULT NULL,
  `telefone` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(90) NOT NULL DEFAULT '',
  `senha` varchar(30) NOT NULL DEFAULT '',
  `cpf` varchar(14) NOT NULL DEFAULT '',
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`idcliente`,`tipoUser`,`nome`,`nascimento`,`telefone`,`email`,`senha`,`cpf`,`ativo`,`alteraçao`) VALUES 
 (1,'adm','Celso Ursomanco','1997-04-01','(33)9987-6451','CelsoUrsomanco@processo.com.br','555','222.445.894-89','A','2024-02-06 16:38:28'),
 (3,'regular','Leandro Luiz ','1982-09-10','(45)9903-5431','leandroluiz@gmail.com','leandroluiz@gmail.com','645.125.765-53','A','2024-02-06 14:45:41'),
 (4,'adm','Matheus Ueta','2009-08-05','(22)9951-4123','cleubindomal@hotmail.com','123','111.341.543-41','A','2024-02-06 14:17:41'),
 (5,'adm','Giulia Sodré','1999-08-04','(51)9932-5431','giuliasodre@hotmail.com','4444','999.999.999-99','A','2024-02-06 14:45:41'),
 (6,'regular','Luiz Inacio Felipe da Silva','2004-10-06','(31)9851-7563','LuizFilipeSilva@Gov.com.br','senha','764.643.765-21','A','2024-02-06 14:45:54'),
 (7,'regular','Isadora Avelino Silva','2006-03-21','(33)7070-7070','IsadoraaSilva@senaimgaluno.com.br','IsadoraaSilva@senaimgaluno.com','707.070.707-07','A','2024-02-06 14:45:41'),
 (8,'regular','Daniel Rodrigues','1996-06-12','(77)3212-5923','DaniRod@gmail.com','DaniRod@gmail.com','123.543.652-53','A','2024-02-06 14:45:41'),
 (9,'regular','Geraldo Chaves','1994-12-12','(44)8844-4552','GeraldoChaves@outlook.com','GeraldoChaves@outlook.com','000.000.001-00','A','2024-02-06 14:45:41'),
 (10,'regular','Drogaria Mais','1970-05-20','(33)3212-5950','drogariamais@comprarDrogas.com.br','drogariamais@comprarDrogas.com','321.259.501-34','A','2024-02-06 19:57:02'),
 (12,'adm','Ademira','2024-02-12','(33)9555-4223','Ademira@Ademira.com','123','444.444.444-44','A','2024-02-06 19:57:26');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `filme`
--

DROP TABLE IF EXISTS `filme`;
CREATE TABLE `filme` (
  `idfilme` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idgenero` int(10) unsigned NOT NULL DEFAULT 0,
  `nomeFilme` varchar(60) NOT NULL DEFAULT '',
  `ano` varchar(4) NOT NULL DEFAULT '',
  `valor` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`idfilme`,`idgenero`),
  KEY `FK_filme_genero` (`idgenero`),
  CONSTRAINT `FK_filme_genero` FOREIGN KEY (`idgenero`) REFERENCES `genero` (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filme`
--

/*!40000 ALTER TABLE `filme` DISABLE KEYS */;
INSERT INTO `filme` (`idfilme`,`idgenero`,`nomeFilme`,`ano`,`valor`) VALUES 
 (1,4,'Ela Dança, Eu Danço','2010',15),
 (2,5,'Ta Dando Onda','2016',30),
 (4,3,'A Casa Vazia','2024',52),
 (5,5,'Os Trapalhões','1995',15),
 (6,4,'Sing','2022',25),
 (7,2,'Corra','2021',31),
 (8,2,'Bird-Box','2020',18.01),
 (9,1,'Missão Impossível','2010',33),
 (10,4,'Ela Dança, Eu Danço 25','2016',10),
 (11,4,'Sing 2','2023',19);
/*!40000 ALTER TABLE `filme` ENABLE KEYS */;


--
-- Definition of table `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE `genero` (
  `idgenero` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genero` varchar(40) NOT NULL DEFAULT '',
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genero`
--

/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`idgenero`,`genero`,`ativo`,`alteraçao`) VALUES 
 (1,'Ação','A','2024-02-06 18:14:23'),
 (2,'Terror','A','2024-02-05 14:31:37'),
 (3,'Suspense','A','2024-02-06 14:35:58'),
 (4,'Musical','A','2024-02-05 14:31:37'),
 (5,'Comédia','A','2024-02-05 14:31:38'),
 (6,'Romance','A','2024-02-06 19:40:40');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;


--
-- Definition of table `locar`
--

DROP TABLE IF EXISTS `locar`;
CREATE TABLE `locar` (
  `idlocar` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcliente` int(10) unsigned NOT NULL DEFAULT 0,
  `idfilme` int(10) unsigned NOT NULL DEFAULT 0,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idlocar`,`idfilme`,`idcliente`),
  KEY `FK_locar_cliente` (`idcliente`),
  KEY `FK_locar_filme` (`idfilme`,`ativo`) USING BTREE,
  CONSTRAINT `FK_locar_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `FK_locar_filme` FOREIGN KEY (`idfilme`) REFERENCES `filme` (`idfilme`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locar`
--

/*!40000 ALTER TABLE `locar` DISABLE KEYS */;
INSERT INTO `locar` (`idlocar`,`idcliente`,`idfilme`,`ativo`,`alteraçao`) VALUES 
 (1,1,2,'A','2024-02-05 14:55:13'),
 (3,3,4,'A','2024-02-05 14:55:13'),
 (4,5,6,'A','2024-02-05 14:55:13'),
 (5,7,8,'A','2024-02-05 14:55:13'),
 (6,9,10,'A','2024-02-05 14:55:13'),
 (7,10,1,'A','2024-02-05 14:55:13'),
 (8,6,11,'A','2024-02-05 14:57:02'),
 (9,1,2,'A','2024-02-05 14:55:26');
/*!40000 ALTER TABLE `locar` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
