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
-- Definition of table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE `adm` (
  `idadm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(245) NOT NULL DEFAULT '',
  `nome` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(90) NOT NULL DEFAULT '',
  `senha` varchar(100) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` (`idadm`,`foto`,`nome`,`email`,`senha`,`cadastro`,`alteraçao`,`ativo`) VALUES 
 (1,'ademiro.jpg','Ademiro Silva','adeirosilva@betateste.com','$2y$12$jC/Sm3BAV2a6RQHn5AuMzOaNCTmG5Kyitdi4bKx3oGtygMkvfA9Fy','2024-02-08 15:25:01','2024-02-23 15:39:19','A'),
 (2,'luiz.jpg','Luiz Filipe','LuizFilipeSilva@Gov.com.br','$2y$12$0uoKYVGL9LypLun6vM3I4uC0IU7x92wXjd/S.gnUa8f.RFgoEJlS2','0000-00-00 00:00:00','2024-02-23 15:45:17','A'),
 (3,'Timoteo,jpg','Timóteo','amem@2timoteo.com.br','$2y$12$mZJJjCi.9t/.Xc.hLU2EXOkEUG6nab1juLX7/ZyxmZ7lBDjLfawgK',NULL,'2024-02-23 15:45:18','A');
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL DEFAULT '',
  `nascimento` date DEFAULT NULL,
  `telefone` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(90) NOT NULL DEFAULT '',
  `senha` varchar(30) NOT NULL DEFAULT '',
  `cpf` varchar(14) NOT NULL DEFAULT '',
  `userAlter` varchar(60) NOT NULL DEFAULT 'AdemirCorpSQLs',
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`idcliente`,`nome`,`nascimento`,`telefone`,`email`,`senha`,`cpf`,`userAlter`,`ativo`,`alteraçao`) VALUES 
 (1,'CELSO URSOMANCOS','1997-04-01','(33)9987-6451','CELSOURSOMANCO@PROCESSO.COM.BR','$2y$12$aOLtkJbrOyuFWjaCkd682ej','222.445.894-89','TIMÓTEO','A','2024-03-05 16:30:42'),
 (3,'Leandro Luiz ','1982-09-10','(45)9903-5431','leandroluiz@gmail.com','leandroluiz@gmail.com','645.125.765-53','AdemirCorpSQLs','A','2024-02-06 14:45:41'),
 (4,'MATHEUS UETA','2009-08-05','(22)9951-4123','CLEUBINDOMAL@HOTMAIL.COM','$2y$12$iYL8cLKB8bC31lohXfMyA.B','111.341.543-41','TIMÓTEO','A','2024-03-05 16:51:43'),
 (5,'GIULIA SODRÉ','1999-08-04','(51)9932-5431','GIULIASODRE@HOTMAIL.COM','$2y$12$cNw.UWRNizZJJrHK5iy0jeA','999.999.999-99','TIMÓTEO','A','2024-03-05 16:11:41'),
 (6,'Luiz Inacio Felipe da Silva','2004-10-06','(31)9851-7563','LuizFilipeSilva@Gov.com.br','senha','764.643.765-21','AdemirCorpSQLs','A','2024-02-06 14:45:54'),
 (7,'ISADORA AVELINO SILVA','2006-03-21','(33)7070-7070','ISADORAASILVA@SENAIMGALUNO.COM.BR','$2y$12$.IJkmtJcwnE9zYjyEk6g..M','707.070.707-07','TIMÓTEO','A','2024-03-05 16:08:12'),
 (8,'Daniel Rodrigues','1996-06-12','(77)3212-5923','DaniRod@gmail.com','DaniRod@gmail.com','123.543.652-53','AdemirCorpSQLs','A','2024-02-06 14:45:41'),
 (9,'Geraldo Chaves','1994-12-12','(44)8844-4552','GeraldoChaves@outlook.com','GeraldoChaves@outlook.com','000.000.001-00','AdemirCorpSQLs','A','2024-02-06 14:45:41'),
 (10,'Drogaria Mais','1970-05-20','(33)3212-5950','drogariamais@comprarDrogas.com.br','drogariamais@comprarDrogas.com','321.259.501-34','AdemirCorpSQLs','A','2024-02-06 19:57:02'),
 (12,'Ademira','2024-02-12','(33)9555-4223','Ademira@Ademira.com','123','444.444.444-44','AdemirCorpSQLs','A','2024-02-06 19:57:26');
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
 (6,7,'Sing','2022',25),
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
  `genero` varchar(100) NOT NULL DEFAULT '',
  `userAlter` varchar(60) NOT NULL DEFAULT 'AdemirCorpSQLs',
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteraçao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genero`
--

/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`idgenero`,`genero`,`userAlter`,`ativo`,`alteraçao`) VALUES 
 (1,'AGR VAI','ADEMIRO SILVA','A','2024-03-04 16:17:41'),
 (2,'TERROR','','A','2024-03-01 13:41:02'),
 (3,'SUSPENSE','','A','2024-03-01 13:41:02'),
 (4,'MUSICAL','','A','2024-03-01 13:41:02'),
 (5,'COMÉDIA','TIMÓTEO','A','2024-03-05 16:10:41'),
 (6,'ROMANCE','','A','2024-03-01 13:41:02'),
 (7,'ANIMAÇÃO','ADEMIRO SILVA','A','2024-03-04 16:17:53'),
 (8,'PICANHA','','A','2024-02-28 13:41:56'),
 (10,'CIENCIAS','LUIZ FILIPE','A','2024-03-05 13:15:42'),
 (11,'NEUTRE','','A','2024-02-29 15:54:12'),
 (12,'CIENTIFICOS','LUIZ FILIPE','A','2024-03-05 13:15:21'),
 (15,'DOCUMENTÁRIO','','A','2024-03-04 14:04:11'),
 (16,'PITANGAS','ADEMIRO SILVA','A','2024-03-04 15:13:31'),
 (17,'ROXO','TIMÓTEO','A','2024-03-04 16:38:03'),
 (18,'DRAMA','','A','2024-03-01 14:54:08'),
 (20,'ABACAT','ADEMIRO SILVA','A','2024-03-04 15:22:11'),
 (21,'TSTE','TIMÓTEO','A','2024-03-04 15:03:27'),
 (22,'AMEM','ADEMIRO SILVA','A','2024-03-04 15:51:09'),
 (32,'JGHJGH','ADEMIRO SILVA','A','2024-03-04 16:37:21'),
 (36,'FREES','TIMÓTEO','A','2024-03-05 16:30:11'),
 (37,'ASDF','TIMÓTEO','A','2024-03-05 16:30:29');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;


--
-- Definition of table `locar`
--

DROP TABLE IF EXISTS `locar`;
CREATE TABLE `locar` (
  `idlocar` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcliente` int(10) unsigned NOT NULL DEFAULT 0,
  `idfilme` int(10) unsigned NOT NULL DEFAULT 0,
  `dataAlugada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteraçao` datetime DEFAULT NULL,
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
INSERT INTO `locar` (`idlocar`,`idcliente`,`idfilme`,`dataAlugada`,`ativo`,`alteraçao`) VALUES 
 (1,1,2,'2024-02-19 16:21:42','A','2024-02-05 14:55:13'),
 (3,3,4,'2024-02-19 16:21:42','A','2024-02-05 14:55:13'),
 (4,5,6,'2024-02-19 16:21:42','A','2024-02-05 14:55:13'),
 (5,7,8,'2024-02-19 16:21:42','A','2024-02-05 14:55:13'),
 (6,9,10,'2024-02-19 16:21:42','A','2024-02-05 14:55:13'),
 (7,10,1,'2024-02-19 16:21:42','A','2024-02-05 14:55:13'),
 (8,6,11,'2024-02-19 16:21:42','A','2024-02-05 14:57:02'),
 (9,1,2,'2024-02-19 16:21:42','A','2024-02-05 14:55:26');
/*!40000 ALTER TABLE `locar` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
