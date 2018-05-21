-- MySQL dump 10.16  Distrib 10.1.32-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u864991580_pma
-- ------------------------------------------------------
-- Server version	10.1.32-MariaDB

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
-- Table structure for table `daily_logs`
--

DROP TABLE IF EXISTS `daily_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daily_logs` (
  `daily_logs_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `building` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `floors` varchar(50) DEFAULT NULL,
  `issues` varchar(100) DEFAULT NULL,
  `days_left` varchar(20) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`daily_logs_id`),
  KEY `fk_person_daily_logs` (`person_id`),
  CONSTRAINT `fk_person_daily_ogs` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_logs`
--

/*!40000 ALTER TABLE `daily_logs` DISABLE KEYS */;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_type_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`email_id`),
  KEY `fk_email_type_id_email` (`email_type_id`),
  KEY `fk_person_id_email` (`person_id`),
  CONSTRAINT `fk_email_type_id_email` FOREIGN KEY (`email_type_id`) REFERENCES `email_type` (`email_type_id`),
  CONSTRAINT `fk_person_id_email` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

/*!40000 ALTER TABLE `email` DISABLE KEYS */;
;

--
-- Table structure for table `email_type`
--

DROP TABLE IF EXISTS `email_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_type` (
  `email_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_type_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_type`
--

/*!40000 ALTER TABLE `email_type` DISABLE KEYS */;
INSERT INTO `email_type` VALUES (5,'Business'),(6,'personal');
/*!40000 ALTER TABLE `email_type` ENABLE KEYS */;

--
-- Table structure for table `historical`
--

DROP TABLE IF EXISTS `historical`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historical` (
  `historical_id` int(11) NOT NULL AUTO_INCREMENT,
  `pma_name` varchar(200) DEFAULT NULL,
  `date_completed` varchar(100) DEFAULT NULL,
  `building_contact` varchar(100) DEFAULT NULL,
  `inspector1` varchar(50) DEFAULT NULL,
  `inspector2` varchar(50) DEFAULT NULL,
  `time_to_complete` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`historical_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historical`
--

/*!40000 ALTER TABLE `historical` DISABLE KEYS */;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

/*!40000 ALTER TABLE `login` DISABLE KEYS */;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_type_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`person_id`),
  KEY `fk_person_type_id_person` (`person_type_id`),
  CONSTRAINT `fk_person_type_id_person` FOREIGN KEY (`person_type_id`) REFERENCES `person_type` (`person_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

/*!40000 ALTER TABLE `person` DISABLE KEYS */;
 */;

--
-- Table structure for table `person_type`
--

DROP TABLE IF EXISTS `person_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person_type` (
  `person_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_type_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`person_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person_type`
--

/*!40000 ALTER TABLE `person_type` DISABLE KEYS */;
INSERT INTO `person_type` VALUES (3,'Building contact person'),(4,'Technician');
/*!40000 ALTER TABLE `person_type` ENABLE KEYS */;

--
-- Table structure for table `phone`
--

DROP TABLE IF EXISTS `phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone` (
  `phone_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_type_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`phone_id`),
  KEY `fk_phone_type_id_phone` (`phone_type_id`),
  KEY `fk_person_id_phone` (`person_id`),
  CONSTRAINT `fk_person_id_phone` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`),
  CONSTRAINT `fk_phone_type_id_phone` FOREIGN KEY (`phone_type_id`) REFERENCES `phone_type` (`phone_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone`
--

/*!40000 ALTER TABLE `phone` DISABLE KEYS */;

--
-- Table structure for table `phone_type`
--

DROP TABLE IF EXISTS `phone_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone_type` (
  `phone_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_type_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`phone_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone_type`
--

/*!40000 ALTER TABLE `phone_type` DISABLE KEYS */;
INSERT INTO `phone_type` VALUES (3,'Office'),(4,'cell');
/*!40000 ALTER TABLE `phone_type` ENABLE KEYS */;

--
-- Table structure for table `pma`
--

DROP TABLE IF EXISTS `pma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma` (
  `pma_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `days` varchar(30) NOT NULL,
  `in_prog` tinyint(1) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  PRIMARY KEY (`pma_id`),
  UNIQUE KEY `uc_pma` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=268 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma`
--

/*!40000 ALTER TABLE `pma` DISABLE KEYS */;

--
-- Table structure for table `pma_person`
--

DROP TABLE IF EXISTS `pma_person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pma_person` (
  `pma_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`pma_id`,`person_id`),
  KEY `fk_person_id_pma_person` (`person_id`),
  CONSTRAINT `fk_person_id_pma_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`),
  CONSTRAINT `fk_pma_id_pma_person` FOREIGN KEY (`pma_id`) REFERENCES `pma` (`pma_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pma_person`
--

/*!40000 ALTER TABLE `pma_person` DISABLE KEYS */;
INSERT INTO `pma_person` VALUES (135,70),(135,71),(135,94),(174,69),(174,72),(174,91),(180,70),(180,71),(180,93),(182,69),(182,72),(182,89),(194,69),(194,72),(194,84),(219,69),(219,72),(219,83),(222,69),(222,72),(222,86),(227,69),(227,71),(227,97),(229,70),(229,71),(229,96),(230,70),(230,71),(230,100),(231,70),(231,71),(231,88),(233,70),(233,71),(233,87),(234,70),(234,71),(234,90),(236,70),(236,71),(236,101),(241,69),(241,72),(241,85),(242,70),(242,71),(242,98),(243,69),(243,70),(243,106),(244,70),(244,71),(244,103),(245,70),(245,71),(245,99),(247,70),(247,71),(247,95),(248,70),(248,71),(248,92),(266,69),(266,72),(266,81),(267,69),(267,70),(267,107);
/*!40000 ALTER TABLE `pma_person` ENABLE KEYS */;

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reminders` (
  `reminder_id` int(11) NOT NULL AUTO_INCREMENT,
  `reminder` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reminder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reminders`
--

/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;


--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `job_number` varchar(50) DEFAULT NULL,
  `job_name` varchar(100) DEFAULT NULL,
  `date_char` varchar(50) DEFAULT NULL,
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`schedule_id`),
  KEY `fk_schedule_person` (`person_id`),
  CONSTRAINT `fk_schedule_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;

--
-- Dumping routines for database 'u864991580_pma'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-19  0:34:49
