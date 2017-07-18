-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: EZS
-- ------------------------------------------------------
-- Server version	5.7.16

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `realphone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `address_phone` (`phone`),
  CONSTRAINT `address_phone` FOREIGN KEY (`phone`) REFERENCES `userinfo` (`phone`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (2,'12345678901','12346678','1234','12345678902'),(3,'12345678901','1235','123','12345'),(4,'12345678901','1236','123','12345');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aks`
--

DROP TABLE IF EXISTS `aks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aks` (
  `aksid` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `goodsid` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `addressid` int(11) NOT NULL,
  `cardid` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`aksid`),
  KEY `aks_userinfo` (`phone`),
  KEY `aks_goods` (`goodsid`),
  KEY `aks_address` (`addressid`),
  KEY `aks_creditCard` (`cardid`),
  CONSTRAINT `aks_address` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `aks_creditCard` FOREIGN KEY (`cardid`) REFERENCES `creditCard` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `aks_goods` FOREIGN KEY (`goodsid`) REFERENCES `goods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `aks_userinfo` FOREIGN KEY (`phone`) REFERENCES `userinfo` (`phone`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aks`
--

LOCK TABLES `aks` WRITE;
/*!40000 ALTER TABLE `aks` DISABLE KEYS */;
INSERT INTO `aks` VALUES ('123','12345678901','1234567890123',2,1,1);
/*!40000 ALTER TABLE `aks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bank` (
  `creditCard` char(19) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `account` int(11) NOT NULL,
  PRIMARY KEY (`creditCard`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bank`
--

LOCK TABLES `bank` WRITE;
/*!40000 ALTER TABLE `bank` DISABLE KEYS */;
INSERT INTO `bank` VALUES ('6217001540011360001','123456','工商银行',1000),('6217001540011360002','123456','建设银行',1000),('6217001540011360003','123456','招商银行',1000),('6217001540011360004','123456','中国银行',1000),('6217001540011360005','123456','工商银行',1000),('6217001540011360006','123456','工商银行',1000);
/*!40000 ALTER TABLE `bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creditCard`
--

DROP TABLE IF EXISTS `creditCard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creditCard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `cardID` char(19) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cardID_UNIQUE` (`cardID`),
  KEY `creditcard_userinfo` (`phone`),
  CONSTRAINT `creditcard_userinfo` FOREIGN KEY (`phone`) REFERENCES `userinfo` (`phone`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creditCard`
--

LOCK TABLES `creditCard` WRITE;
/*!40000 ALTER TABLE `creditCard` DISABLE KEYS */;
INSERT INTO `creditCard` VALUES (1,'12345678901','6217001540011360001','工商银行'),(3,'12345678901','621700154001136002','建设银行'),(4,'12345678901','621700154001136003','招商银行'),(5,'12345678901','621700154001136004','中国银行');
/*!40000 ALTER TABLE `creditCard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES ('1234567890123','123',9,3.00,'image/p.png',0),('1234567890234','234',10,4.00,'image/p.png',0),('1234567890345','235',10,5.00,'image/p.png',0),('1234567890567','236',10,6.00,'image/p.png',0);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `goodsid` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `condition` int(11) NOT NULL,
  `date` date NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`orderid`),
  KEY `order_goodsid_goods_idx` (`goodsid`),
  KEY `order_phone_userinfo_idx` (`phone`),
  CONSTRAINT `order_goodsid_goods` FOREIGN KEY (`goodsid`) REFERENCES `goods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `order_phone_userinfo` FOREIGN KEY (`phone`) REFERENCES `userinfo` (`phone`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (22,'1234567890123','12345678901','12346678',2,'2017-07-14',1),(23,'1234567890123','12345678901','12346678',0,'2017-07-14',1),(24,'1234567890123','12345678901','12346678',0,'2017-07-14',1),(25,'1234567890123','12345678901','12346678',0,'2017-07-14',1),(26,'1234567890123','12345678901','12346678',0,'2017-07-14',1),(27,'1234567890123','12345678901','12346678',0,'2017-07-14',1),(28,'1234567890123','12345678901','12346678',0,'2017-07-14',1),(29,'1234567890123','12345678901','12346678',0,'2017-07-14',1),(30,'1234567890123','12345678901','12346678',0,'2017-07-14',1);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seller` (
  `phone` char(11) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller`
--

LOCK TABLES `seller` WRITE;
/*!40000 ALTER TABLE `seller` DISABLE KEYS */;
INSERT INTO `seller` VALUES ('12345678901','123456');
/*!40000 ALTER TABLE `seller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userinfo` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `creditCard` char(19) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`phone`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userinfo`
--

LOCK TABLES `userinfo` WRITE;
/*!40000 ALTER TABLE `userinfo` DISABLE KEYS */;
INSERT INTO `userinfo` VALUES ('1','1','1','1',NULL),('123','123456','343620969@qqcom','1111',NULL),('123','123456','343620969qqcom','11111',NULL),('3123','123','12313qqcom123','123',NULL),('1231','12313','123','12313',NULL),('蔡跃区','123456','123@qq.com','12345678901','1234567890123456789'),('123','123','343620969@qq.com','12345678902',NULL),('123','123','12313@qq.com','12345678903',NULL),('123','123456','12313','12345678906',NULL),('123','123','12313qqcom','12345678907',NULL),('234','123','24324','12345678908',NULL),('234','123','24324@qq.com','12345678909',NULL),('234','123','24324fsfsd@qq.com','12345678911',NULL),('123','123456','1234@qq.com','12345678915',NULL),('131','111','21','131231',NULL),('123','123456','343620969qq.com','777',NULL);
/*!40000 ALTER TABLE `userinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-14 20:46:23
