# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.29)
# Database: NakedMoleFlats
# Generation Time: 2020-05-06 08:33:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table dwellings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dwellings`;

CREATE TABLE `dwellings` (
  `dwellingId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agentRef` varchar(30) DEFAULT '',
  `address1` varchar(500) DEFAULT '',
  `address2` varchar(500) DEFAULT NULL,
  `town` varchar(500) DEFAULT '',
  `postcode` varchar(10) DEFAULT '',
  `description` varchar(20000) DEFAULT '',
  `bedrooms` int(11) DEFAULT NULL,
  `price` bigint(12) DEFAULT NULL,
  `image` varchar(40) DEFAULT '',
  `typeId` int(11) DEFAULT NULL,
  `statusId` int(11) DEFAULT NULL,
  PRIMARY KEY (`dwellingId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table statuses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `statuses`;

CREATE TABLE `statuses` (
  `statusId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`statusId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `typeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
