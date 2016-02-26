Use jobbank;
-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: volma_moraspirit
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `project` int(11) NOT NULL,
  `task` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (49,72,'2015-05-08 19:20:59',0,96,'iuiubu'),(50,72,'2015-05-08 19:21:30',0,91,'oihoih'),(52,72,'2015-05-08 19:23:29',0,96,'ohoih');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `confirmation`
--

DROP TABLE IF EXISTS `confirmation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `confirmation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `verification` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `confirmation`
--

LOCK TABLES `confirmation` WRITE;
/*!40000 ALTER TABLE `confirmation` DISABLE KEYS */;
INSERT INTO `confirmation` VALUES (25,'nazuom@yahoo.com','c1b06e'),(33,'new@gmail.com','1d5f01b'),(34,'ok@ok.com','4af4817'),(36,'bgihan.gc@gmail.com','4402086');
/*!40000 ALTER TABLE `confirmation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `teamleader` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `goals` text COLLATE utf8_unicode_ci NOT NULL,
  `members` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `starttimestamp` text COLLATE utf8_unicode_ci NOT NULL,
  `endtimestamp` text COLLATE utf8_unicode_ci NOT NULL,
  `duetimestamp` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` text COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `task` int(11) NOT NULL,
  `seen` tinyint(4) DEFAULT '0',
  `type` smallint(6) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (108,'New Comment','Ridwan Shariffdeen commented in a project you are following.','2015-05-08',17,11,0,0,1),(109,'New Comment','Ridwan Shariffdeen commented in a project you are following.','2015-05-08',17,11,0,0,1),(110,'New Comment','Ridwan Shariffdeen commented in a project you are following.','2015-05-08',17,11,0,0,1),(111,'New Comment','Ridwan Shariffdeen commented in a project you are following.','2015-05-08',17,11,0,0,1),(112,'You have a new Project','Congratulations! You have been appointed as a Project Manager for a new Project','2015-05-08',72,18,0,1,2),(113,'You have a new Task','You have been assigned a new task to complete','2015-05-08',41,10,93,0,2),(114,'You have a new Task','You have been assigned a new task to complete','2015-05-08',76,10,96,0,2),(115,'You have a new Task','You have been assigned a new task to complete','2015-05-08',41,18,97,0,2),(116,'New Comment','Ridwan Shariffdeen commented in a project you are following.','2015-05-08',16,10,0,0,1),(117,'New Comment','Ridwan Shariffdeen commented in a project you are following.','2015-05-08',74,10,0,0,1),(118,'You have a new Task','You have been assigned a new task to complete','2015-05-10',41,10,98,0,2),(119,'Task Details Updated','Details of your task has been updated. Click the following link to get the latest details.','2015-05-10',16,10,98,0,1),(120,'Task Details Updated','Details of your task has been updated. Click the following link to get the latest details.','2015-05-10',41,10,98,0,1),(121,'Task Completed','Congratulations! You have completed your Task with a Rating of 6/10.','2015-05-15',41,10,98,0,3),(122,'Task Completed','Congratulations! You have completed your Task with a Rating of 6/10.','2015-05-15',41,10,98,0,3),(123,'Project Completed','Congratulations! You have completed your Project','2015-05-15',72,18,0,1,3),(124,'You have a new Project','Congratulations! You have been appointed as a Project Manager for a new Project','2015-05-17',72,19,0,1,2),(125,'You have a new Task','You have been assigned a new task to complete','2015-05-17',72,10,99,1,2);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `start` text COLLATE utf8_unicode_ci NOT NULL,
  `end` text COLLATE utf8_unicode_ci,
  `due` text COLLATE utf8_unicode_ci NOT NULL,
  `manager` int(11) NOT NULL,
  `members` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `objectives` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `subscribers` text COLLATE utf8_unicode_ci,
  `comments` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (10,'Testing','06/03/2014',NULL,'07/30/2014',16,'a:4:{i:0;i:64;i:1;i:41;i:2;i:76;i:3;i:72;}','You might wonder why I do not use an Apache wildcard/catchall configuration, here is the reason why: unfortunately the VirtualDocumentRoot directive requires that you modify your .htaccess in your Drupal installation (you have to enable the RewriteBase /). This is bad because then you always have local changes in that file if you are working with a Drupal core git checkout.','Create the domain entry for drupal-8.localhost in /etc/hosts. Add \"127.0.0.1 drupal-8.localhost\". You will have to add each new project name in this file (you could also install Bind to automatically resolve this, but seems like an overkill to me).',0,'a:3:{i:0;i:16;i:1;i:74;i:2;i:72;}','a:15:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;N;i:5;N;i:6;N;i:7;N;i:8;N;i:9;N;i:10;N;i:11;N;i:12;N;i:13;N;i:14;N;}'),(11,'SL VS ENG Coverage','06/04/2014',NULL,'06/04/2014',17,'N;','dasdasd','asdasdasdas',0,'a:2:{i:0;i:17;i:1;i:72;}','a:4:{i:0;N;i:1;N;i:2;N;i:3;N;}'),(15,'ion','05/08/2015',NULL,'05/08/2015',16,'N;','inon','nion',0,'a:1:{i:0;i:16;}','N;'),(16,'oin','05/08/2015',NULL,'05/08/2015',16,'N;','inoin','ion',0,'a:1:{i:0;i:16;}','N;'),(18,'uib','05/08/2015','2015-05-15','05/08/2015',72,'a:1:{i:0;i:41;}','buib','uib',1,'a:1:{i:0;i:72;}','N;'),(19,'hgcgh','05/17/2015',NULL,'05/17/2015',72,'N;','ghcgh','chcghc',0,'a:1:{i:0;i:72;}','N;');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `completed` tinyint(4) DEFAULT '0',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `leader` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `project` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `goals` text COLLATE utf8_unicode_ci NOT NULL,
  `starttimestamp` text COLLATE utf8_unicode_ci NOT NULL,
  `endtimestamp` text COLLATE utf8_unicode_ci,
  `duetimestamp` text COLLATE utf8_unicode_ci NOT NULL,
  `comments` longtext COLLATE utf8_unicode_ci,
  `pillar` text COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(4) NOT NULL DEFAULT '0',
  `subscribers` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (90,0,'sdxfg','1','16','16','10',2,'trxrx','trdrtdtd','05/08/2015',NULL,'05/08/2015','a:0:{}','CSO\r\n',0,'N;'),(91,0,'jbkjb','1','16','16','10',2,'kjbjkb','kjbjkb','05/08/2015',NULL,'05/08/2015','a:2:{i:0;N;i:1;N;}','CSO\r\n',0,'a:1:{i:0;i:72;}'),(93,0,'dxfgchbjkkl','1','41','16','10',2,'xtrctvhbujml,;','ivbibl','05/08/2015',NULL,'05/08/2015','a:0:{}','Technical Pillar',0,'N;'),(94,0,'iub','1','26','16','10',2,'iubuib','uib','05/08/2015',NULL,'05/08/2015','a:0:{}','Marketing Pillar',0,'N;'),(96,0,'oinoin','1','76','16','10',2,'oinion','nion','05/08/2015',NULL,'05/08/2015','a:2:{i:0;N;i:1;N;}','Technical Pillar',0,'a:1:{i:0;i:72;}'),(97,0,'zsxdcfgvbh','1','41','16','18',2,'zdxtcuvybimo','cytvybun','05/08/2015',NULL,'05/08/2015','a:1:{i:0;N;}','Technical Pillar',0,'a:1:{i:0;i:72;}'),(98,1,'xgfchvjbk','1','41','72','10',2,'xfchgvjbk','yuvu','05/10/2015','2015-05-15','05/10/2015','a:1:{i:0;N;}','Technical Pillar',6,'a:1:{i:0;i:72;}'),(99,0,'vjh','1','72','72','10',2,'jhcj','cjh','05/17/2015',NULL,'05/17/2015','a:0:{}','Technical Pillar',0,'N;');
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trackreport`
--

DROP TABLE IF EXISTS `trackreport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trackreport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User` int(11) NOT NULL,
  `OverallRating` double DEFAULT '0',
  `TotalWeight` int(11) NOT NULL,
  `Comments` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `Projects` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `User` (`User`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trackreport`
--

LOCK TABLES `trackreport` WRITE;
/*!40000 ALTER TABLE `trackreport` DISABLE KEYS */;
INSERT INTO `trackreport` VALUES (20,41,7,8,'a:4:{i:0;a:2:{i:0;s:2:\"16\";i:1;s:5:\"\r\n(y)\";}i:1;a:2:{i:0;s:2:\"16\";i:1;s:2:\"ok\";}i:2;a:2:{i:0;s:2:\"72\";i:1;s:13:\"Very Punctual\";}i:3;a:2:{i:0;s:2:\"72\";i:1;s:13:\"Very Punctual\";}}','a:15:{i:0;i:7;i:1;i:7;i:2;i:6;i:3;i:8;i:4;i:8;i:5;i:8;i:6;i:8;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:10;i:11;i:10;i:12;i:10;i:13;i:18;i:14;i:10;}'),(21,42,0,0,'N;','a:1:{i:0;i:6;}'),(22,43,0,0,'N;','N;'),(23,44,0,0,'N;','N;'),(24,45,0,0,'N;','N;'),(27,51,0,0,'N;','N;'),(28,52,0,0,'N;','N;'),(29,53,0,0,'N;','N;'),(30,56,0,0,'N;','N;'),(32,60,0,0,'N;','N;'),(33,62,0,0,'N;','N;'),(34,63,0,0,'N;','N;'),(35,64,7,8,'a:1:{i:0;a:2:{i:0;s:2:\"16\";i:1;s:65:\"He has done a marvelous job and I am pretty much happy about it. \";}}','a:2:{i:0;i:10;i:1;i:10;}'),(39,72,0,0,'N;','a:1:{i:0;i:10;}'),(40,73,0,0,'N;','N;'),(41,74,0,0,'N;','N;'),(42,75,0,0,'N;','N;'),(43,76,0,0,'N;','a:1:{i:0;i:10;}'),(44,77,0,0,'N;','N;'),(45,78,0,0,'N;','N;'),(46,79,0,0,'N;','N;'),(47,83,0,0,'N;','N;'),(48,85,0,0,'N;','N;'),(49,86,0,0,'N;','N;'),(50,87,0,0,'N;','N;'),(51,88,0,0,'N;','N;'),(52,89,0,0,'N;','N;'),(53,90,0,0,'N;','N;'),(54,91,0,0,'N;','N;'),(55,93,0,0,'N;','N;'),(56,94,0,0,'N;','N;'),(57,95,0,0,'N;','N;');
/*!40000 ALTER TABLE `trackreport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `nameWithInitials` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nic` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mobilenumber` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `accesslevel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Pillar` text COLLATE utf8_unicode_ci NOT NULL,
  `Department` text COLLATE utf8_unicode_ci NOT NULL,
  `Batch` tinyint(4) NOT NULL,
  `Skills` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(11) DEFAULT '-1',
  `path` text COLLATE utf8_unicode_ci,
  `lastlogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `nic` (`nic`),
  UNIQUE KEY `email` (`email`,`mobilenumber`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (16,'Nada','833305686400eee3f8f654679a47d538','Nidarshan','Nadaraja','nada@moraspirit.com','M','713459298','0000-00-00','Nidarshan Nadaraja','891940424V','713459298','Admin','98/24, Enasal watta, Madapatha, Piliyandala','Piliyandala','Srilanka','CSO\r\n','Mechanical Engineering',10,'s:15:\"Team Management\";',2,'/web/bundles/User/uploads/photo16/155799_10201413744617920_756492211_n.jpg','2014-06-05 21:45:59'),(17,'Naleendra','81dc9bdb52d04dc20036dbd8313ed055','Naleendra','Kularatne','naleendra@moraspirit.com','M','711513861','2014-05-01','','111111111','711513861','Admin','','','','Creative Pillar','Electrical Engineering',0,'N;',2,NULL,'2014-06-25 15:27:27'),(20,'Thisara','81dc9bdb52d04dc20036dbd8313ed055','Thisara','','thisara@moraspirit.com','M','713605010','0000-00-00','','','713605010','Head','','','','Special Project','Mechanical Engineering',0,'N;',2,NULL,NULL),(23,'Gagith','81dc9bdb52d04dc20036dbd8313ed055','Gagith','','gagith@moraspirit.com','M','716292224','0000-00-00','','2222','716292224','Head','','','','Special Project','Information Technology\r\n',0,'N;',2,NULL,NULL),(24,'Prabha','hash(123)','Prabhasara','Jayarathne','prabha@moraspirit.com','','717649404','0000-00-00','R.M.D.P Jayarathne','901450064V','717649404','Head','','','','News Operation','Mechanical Engineering',127,'N;',2,NULL,'2014-06-07 23:53:01'),(25,'Thanura','81dc9bdb52d04dc20036dbd8313ed055','Thanura','','thanura@moraspirit.com','M','717178486/77478','0000-00-00','','2541','717178486/77478','Head','','','','Fund Raising','Textile Engineering',0,'N;',2,NULL,NULL),(26,'Uditha','81dc9bdb52d04dc20036dbd8313ed055','Uditha','','uditha@moraspirit.com','M','718175341','0000-00-00','','124235432','718175341','Head','','','','Marketing Pillar','Transport and Logistics Management',0,'N;',2,NULL,NULL),(27,'Kasun','81dc9bdb52d04dc20036dbd8313ed055','Kasun','Munasinghe','kasun@moraspirit.com','M','715171584','0000-00-00','K.C.Munasinghe','892590362v','715171584','Head','Lindagahawatta,Nehinna,Dodamgoda','Kaluthara','Srilanka','Marketing Pillar','Mechanical Engineering',3,'N;',2,NULL,'2014-06-24 11:45:34'),(28,'Ruwanthi','81dc9bdb52d04dc20036dbd8313ed055','Ruwanthi','','ruwanthi@moraspirit.com','F','712910533','0000-00-00','','2142','712910533','Head','','','','Creative Pillar','intedrated design/media and communication design\r\n',0,'N;',2,NULL,NULL),(31,'Charith','920bf3fe93cef9350334b2f5643d4e1e','Charith','Arumapperuma','charith@moraspirit.com','M','711145128','0000-00-00','A.A.G.C.K.Arumapperuma','901113220V','718284104','Head','Lulbadduwa, Ittapana','Matugama','Sri Lanka','Creative Pillar','Computer Science & Engineering',127,'s:15:\"Team Management\";',2,'/web/bundles/User/uploads/photo31/1006251_4904484860988_730374234_n.jpg','2014-06-06 06:47:16'),(32,'Tiroshan','9a716b1b712ea1ca4e6fbe79502bd7ea','Tiroshan','Madushanka','tiroshan@moraspirit.com','M','771348319','0000-00-00','W.A','900421214V','771348319','Head','No 294\'1,14 th LAne, Filomina Estate, Dodangoda','Kalutara','Sri Lanka','Technical Pillar','Computer Science & Engineering',10,'s:15:\"Team Management\";',2,'/web/bundles/User/uploads/photo32/tiro.jpg','2014-06-23 08:45:31'),(33,'Sutharman','81dc9bdb52d04dc20036dbd8313ed055','Sutharman','Paskaran','sutharman@moraspirit.com','M','774096636','0000-00-00','P.Sutharman','920111912V','774096636','Head','4/7 A, Hotel Road','Mount Lavinia','Sri Lanka','Editorial','Civil Engineering',127,'N;',2,'/web/bundles/User/uploads/photo33/1907650_10204120095226888_6307072796464941742_n.jpg','2014-06-05 20:25:46'),(34,'Lalindra Sandeepa','81dc9bdb52d04dc20036dbd8313ed055','Lalindra','Sandeepa','lalindra@moraspirit.com','M','0711738089','0000-00-00','A.G.L.Sandeepa','123456789','0771824873','Head','\"Sepali\",Makumbura,Kottawagama','Galle','Sri Lanka','Fund Raising','Civil Engineering',11,'N;',2,'/web/bundles/User/uploads/photo34/WP_20131213_001.jpg','2014-06-04 22:54:20'),(35,'Pramodya','81dc9bdb52d04dc20036dbd8313ed055','Pramodya','','pramodya@moraspirit.com','M','718689836','0000-00-00','','78749287','718689836','Head','','','','Cooperate Development','Electronic & Telecommunication Engineering',0,'N;',2,NULL,NULL),(36,'Piumantha','81dc9bdb52d04dc20036dbd8313ed055','Piumantha','','piumantha@moraspirit.com','M','715824006','0000-00-00','','214323652','715824006','Head','','','','Organizational Development','Mechanical Engineering',0,'N;',2,NULL,'2014-06-20 17:02:55'),(37,'Ruchira','81dc9bdb52d04dc20036dbd8313ed055','Ruchira','','ruchira@moraspirit.com','M','716734289','0000-00-00','','4444444444','716734289','Head','','','','Human Resource','Chemical and Process Engineering',0,'N;',2,NULL,NULL),(38,'Chamara','81dc9bdb52d04dc20036dbd8313ed055','Chamara','','chamara@moraspirit.com','M','714486440','0000-00-00','','237481723964','714486440','Admin','','','','CCO\r\n','Chemical and Process Engineering',0,'N;',2,NULL,NULL),(41,'Nazick','bd0020c7f44fb0141efd47ec8b5e6bb8','Nazick','Ahamed','nazuom@gmail.com','M','774666631','0000-00-00','M.N.N.Ahamed','913401611V','774666631','Spiriter','No,77, Dole Road, Matale','Matale','Srilanka','Technical Pillar','Computer Science & Engineering',11,'s:15:\"Team Management\";',2,'/web/bundles/User/uploads/photo41/nazzzzz.jpg','2014-07-06 21:42:10'),(64,'farazath','2046e1bf6df3e436d3dbf9e531d0c92c','Farasath','Ahamed','mefarazath@gmail.com','M','771582622','0000-00-00','A.F.Ahamed','913061839v','777603866','Spiriter','07 Wajirawansa Mawatha Obeysekerapura','Rajagiriya','Sri Lanka','Editorial','Computer Science & Engineering',11,'s:15:\"Team Management\";',2,'/web/bundles/User/uploads/photo64/1424445_3753219284901_1595635344_n.jpg','2014-06-13 21:11:31'),(72,'naruto','202cb962ac59075b964b07152d234b70','Ridwan','Shariffdeen','rshariffdeen@gmail.com','M','772562002','0000-00-00','R.S. Shariffdeen','913344359V','772562002','Admin','25/3B, Gnanathilaka Mawatha','Mount Lavinia','Sri Lanka','Technical Pillar','Computer Science & Engineering',11,'N;',2,NULL,'2015-05-17 13:00:37'),(74,'Malakagl','81dc9bdb52d04dc20036dbd8313ed055','Malaka','Gunawardhana Lahiru','glmalaka@gmail.com','M','94779432484','0000-00-00','Malaka G.L.','911070588V','94779432484','Spiriter','Sri Purwarama Road','Galle','Sri Lanka','Technical Pillar','Computer Science & Engineering',3,'s:9:\"Marketing\";',2,'/web/bundles/User/uploads/photo74/hiru1.jpg','2014-06-09 14:14:42'),(75,'Upekshe Jay','3690c1440c9c15ea93a191c404cc2c05','Upekshe','Jayasekera','usmj000@gmail.com','M','715796290','0000-00-00','U S M Jayasekera','900900600v','715196290','Spiriter','18,Jayanthi Mawatha,Dadalla,Galle','Galle','Sri Lanka','Creative Pillar','Computer Science & Engineering',127,'s:14:\"Graphic Design\";',2,NULL,NULL),(76,'Prakhash','7e73aa061c5850b1db2f5d7e79ca0e0a','Prakhash','Sivakumar','prakhashsiva21@gmail.com','M','771510080','0000-00-00','S.Prakhash','902032053V','771510080','Spiriter','C11 Soysapura flats','Colombo','Sri Lanka','Technical Pillar','Computer Science & Engineering',11,'s:15:\"Team Management\";',2,'/web/bundles/User/uploads/photo76/1236900_506088399478310_1686693619_n.jpg','2014-06-05 16:06:55'),(77,'Itachi','e10adc3949ba59abbe56e057f20f883e','Uchiha','Itachi','lbsnaleendrakula@gmail.com','M','711513861','0000-00-00','U. Itachi','900883172V','711513861','Spiriter','hbihi','Galle','Sri Lanka','News Operation','Chemical and Process Engineering',2,'s:15:\"Team Management\";',2,NULL,NULL),(78,'gmAmaradasa','be534a9866e70ec5652a3fd2c40503e3','Gayan','Amaradasa','gmmamaradasa@gmail.com','M','917912900','0000-00-00','W.Gayan Amaradasa','912374076V','717519786','Spiriter','227/18, Morris Road, Ambalanwattha','Galle','Sri Lanka','Technical Pillar','Electrical Engineering',11,'s:15:\"Team Management\";',2,NULL,'2014-06-05 12:07:42'),(79,'udithshan','c4ff68dfef8a28f8fc3e72e27e91fec7','Udith','Shan','shanudith@gmail.com','M','713864667','0000-00-00','H.L. Udith Shan','911851903V','713864667','Spiriter','No.06 Yatiyana Rd, Kekanadura','Matara','SriLanka','Technical Pillar','Mechanical Engineering',12,'s:14:\"Graphic Design\";',2,NULL,'2014-06-05 12:08:39'),(85,'test','81dc9bdb52d04dc20036dbd8313ed055','new','newn','new@gmail.com','M','43252','0000-00-00','enw','wq2323','13413','Spiriter','kfsgjls','ljhsdjghl','gsflj','Technical Pillar','Chemical and Process Engineering',43,'s:14:\"Graphic Design\";',0,NULL,NULL),(86,'Neji','81dc9bdb52d04dc20036dbd8313ed055','Neji','Hyunga','ok@ok.com','M','456789','0000-00-00','N Hyunga','34567tyu8i','3456789','Spiriter','drftgyhuj','fcghjk','3456789','Cooperate Development','Chemical and Process Engineering',12,'s:14:\"Graphic Design\";',0,NULL,NULL),(87,'Arun','5716d86b868b2715e492fc192553220c','Ravendran','Arunothayan','arunothayan91@gmail.com','M','112589247','0000-00-00','R.Arunothayan','910521730v','774456628','Spiriter','H block, 2/1, Bambalapitiya Flats, Colombo 4.','Colombo','Sri Lanka','Editorial','Civil Engineering',127,'N;',1,NULL,NULL),(88,'bgihan.gc@gmail.com','3b644cbb2a62d29fb2f018f99bdfc54d','Bulathsinghalage','Gihan Chinthaka','bgihan.gc@gmail.com','M','711684410','0000-00-00','B.G Chinthaka','902281533V','782679260','Spiriter','3A, Kadana, Horana','Horana','Sri Lanka','Human Resource','Transport and Logistics Management',127,'s:15:\"Team Management\";',0,NULL,NULL),(89,'Mierunalan','5602ce9fd124d647901768601df5d277','Mierunalan','Seyon','smithunrc@live.com','M','112365893','0000-00-00','S.Mierunalan','920760350V','776053939','Spiriter','83/2A, Hampden Lane,Wellawatte','Colombo-06','Sri Lanka','Editorial','Civil Engineering',127,'s:15:\"Team Management\";',1,NULL,NULL),(90,'Chathurthi De Silva','740de564065c6432ea038a047ac5648d','Chathurthi','De Silva','chathurthidesilva@gmail.com','F','2898982','0000-00-00','C.S. De Silva','916380674V','774429310','Spiriter','94B, Mihindu Mawatha, Makumbura, Pannipitiya.','Homagama','Sri Lanka','Editorial','Faculty of Architecture',3,'s:15:\"Team Management\";',1,NULL,NULL),(91,'Sandarekha','a6dca4aaf5fb3d5b5a00afa874fbfb50','Sandarekha','Ramanayake','sandarekharamanayake@gmail.com','F','372282485','0000-00-00','R.M.T.S.Ramanayake','917533059V','712555421','Spiriter','80/81, Araliya Garden, W/Dandagamuwa, Kuliyapitiya','Kuliyapitiya','Sri Lanka','Editorial','Faculty of Information Technology',11,'N;',1,NULL,NULL),(93,'Shiham','6f23f511170a4ec957b4d1b9e822df38','Farook','Mohamed Shiham','shihamfm@gmail.com','M','779217211','0000-00-00','FM. Shiham','893550232v','779217211','Spiriter','278, RKM Road, Maligaikadu, Karathivu','Kalmunai','Sri Lanka','Editorial','Chemical and Process Engineering',3,'s:15:\"Team Management\";',1,NULL,NULL),(94,'savisathyani','bc58b46e1bb29d4376c05630737a0347','Savi','Wickramaarachchi','geniusgforce@gmail.com','F','332234150','0000-00-00','W.A.S.S. Wickramaarachchi','917502080','776866044','Spiriter','17, 1st Lane, Werellawatta, Yakkala','Gampaha','Sri Lanka','Editorial','Fashion Design',127,'N;',1,NULL,NULL),(95,'sapuni','79d6596c9315c81f69b4f918e34e6ab3','Sapuni','Hettiarachchi','sapuni27@gmail.com','F','112837317','0000-00-00','S. T. Hettiarachchi','928010201V','710177779','Spiriter','37A, Yahampath Mawatha, Godigamuwa, Maharagama','Maharagama','Sri Lanka','Editorial','Faculty of Architecture',127,'N;',1,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-23 10:59:05
