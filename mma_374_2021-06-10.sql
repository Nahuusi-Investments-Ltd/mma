# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.30)
# Database: mma_374
# Generation Time: 2021-06-12 09:48:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tbl_team
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_team`;

CREATE TABLE `tbl_team` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `title` text,
  `email` text,
  `phone` text,
  `address` text,
  `bio` text,
  `classes` text,
  `photo` text,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbl_team` WRITE;
/*!40000 ALTER TABLE `tbl_team` DISABLE KEYS */;

INSERT INTO `tbl_team` (`id`, `name`, `title`, `email`, `phone`, `address`, `bio`, `classes`, `photo`, `date_created`, `updated_on`)
VALUES
  (1,'Radafy Rad Ranaivo','Owner & Head Coach',NULL,NULL,NULL,NULL,NULL,'radafyRadRanaivo.jpg','2021-06-01 20:23:39','2021-06-10 09:57:19'),
  (2,'Josh Barkhouse','title coming soon',NULL,NULL,NULL,NULL,NULL,'joshBarkhouse.jpg','2021-06-01 20:25:44','2021-06-01 20:25:44'),
  (3,'Jonas Klippenstein','title coming soon',NULL,NULL,NULL,NULL,NULL,'b07a9359e82868988b9cf56c49c52aab.jpeg','2021-06-01 20:26:24','2021-06-10 08:49:34');

/*!40000 ALTER TABLE `tbl_team` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
