
-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: localhost    Database: dbsystemcontrolleur
-- ------------------------------------------------------
-- Server version	5.6.24

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
-- Table structure for table `tblassoclientmelange`
--
drop database if exists dbsystemcontrolleur;
create database dbsystemcontrolleur;
use dbsystemcontrolleur;

DROP TABLE IF EXISTS `tblassoclientmelange`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblassoclientmelange` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idClient` int(10) unsigned NOT NULL,
  `idMelange` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`),
  KEY `idMelange` (`idMelange`),
  CONSTRAINT `tblassoclientmelange_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `tblclient` (`id`),
  CONSTRAINT `tblassoclientmelange_ibfk_2` FOREIGN KEY (`idMelange`) REFERENCES `tblmelange` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblassoclientmelange`
--

LOCK TABLES `tblassoclientmelange` WRITE;
/*!40000 ALTER TABLE `tblassoclientmelange` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblassoclientmelange` ENABLE KEYS */;
UNLOCK TABLES;

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
  `utilisateur` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblclient`
--

LOCK TABLES `tblclient` WRITE;
/*!40000 ALTER TABLE `tblclient` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblclient` ENABLE KEYS */;
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
  `quantite` double DEFAULT NULL,
  `niveau` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmelange`
--

LOCK TABLES `tblmelange` WRITE;
/*!40000 ALTER TABLE `tblmelange` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblmelange` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblproduit`
--

DROP TABLE IF EXISTS `tblproduit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblproduit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `idMelange` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMelange` (`idMelange`),
  CONSTRAINT `tblproduit_ibfk_1` FOREIGN KEY (`idMelange`) REFERENCES `tblmelange` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblproduit`
--

LOCK TABLES `tblproduit` WRITE;
/*!40000 ALTER TABLE `tblproduit` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblproduit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

