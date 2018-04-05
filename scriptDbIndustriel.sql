-- MySQL dump 10.16  Distrib 10.1.25-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: dbindustriel
-- ------------------------------------------------------
-- Server version	10.1.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `dbindustriel`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `dbindustriel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbindustriel`;

--
-- Table structure for table `tblclient`
--

DROP TABLE IF EXISTS `tblclient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblclient` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblclient`
--

LOCK TABLES `tblclient` WRITE;
/*!40000 ALTER TABLE `tblclient` DISABLE KEYS */;
INSERT INTO `tblclient` VALUES (1,'paul','tadi','2341 godaddy'),(2,'bob','robert','43 avecCheveux'),(3,'patate','Fole','802 Viebien');
/*!40000 ALTER TABLE `tblclient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblemploye`
--

DROP TABLE IF EXISTS `tblemploye`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblemploye` (
  `user` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblemploye`
--

LOCK TABLES `tblemploye` WRITE;
/*!40000 ALTER TABLE `tblemploye` DISABLE KEYS */;
INSERT INTO `tblemploye` VALUES ('user','user');
/*!40000 ALTER TABLE `tblemploye` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmelange`
--

DROP TABLE IF EXISTS `tblmelange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblmelange` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `temperature` double DEFAULT NULL,
  `niveau` double DEFAULT NULL,
  `dateProduction` date DEFAULT NULL,
  `idClient` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`),
  CONSTRAINT `tblmelange_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `tblclient` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmelange`
--

LOCK TABLES `tblmelange` WRITE;
/*!40000 ALTER TABLE `tblmelange` DISABLE KEYS */;
INSERT INTO `tblmelange` VALUES (1,22.3,12.1,'2018-04-05',1),(2,31.5,12.1,'2018-04-05',1),(3,6,6.56,'2018-04-01',3);
/*!40000 ALTER TABLE `tblmelange` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-05 13:46:35
