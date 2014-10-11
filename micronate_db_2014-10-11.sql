# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.20)
# Database: micronate_db
# Generation Time: 2014-10-11 18:11:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table application
# ------------------------------------------------------------

DROP TABLE IF EXISTS `application`;

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `secret_key` text COLLATE utf32_unicode_ci NOT NULL,
  `publishable_key` text COLLATE utf32_unicode_ci NOT NULL,
  `developer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;



# Dump of table campaign
# ------------------------------------------------------------

DROP TABLE IF EXISTS `campaign`;

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf32_unicode_ci NOT NULL,
  `description` text COLLATE utf32_unicode_ci NOT NULL,
  `location` text COLLATE utf32_unicode_ci NOT NULL,
  `goal` int(11) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `creator_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;



# Dump of table donation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `donation`;

CREATE TABLE `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;



# Dump of table message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf32_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;



# Dump of table micro_transaction
# ------------------------------------------------------------

DROP TABLE IF EXISTS `micro_transaction`;

CREATE TABLE `micro_transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf32_unicode_ci NOT NULL,
  `username` text COLLATE utf32_unicode_ci NOT NULL,
  `password` text COLLATE utf32_unicode_ci NOT NULL,
  `first_name` text COLLATE utf32_unicode_ci NOT NULL,
  `last_name` text COLLATE utf32_unicode_ci NOT NULL,
  `location` text COLLATE utf32_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL,
  `stripe_card_token` text COLLATE utf32_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `email`, `username`, `password`, `first_name`, `last_name`, `location`, `balance`, `stripe_card_token`)
VALUES
	(3,'email@example.com','usernam','f22bc61b34c17910e58d2ba85545008f42a48847','name','surname','zurich',0,NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_app_link
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_app_link`;

CREATE TABLE `user_app_link` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `monthly_limit` int(11) NOT NULL,
  `user_token` text COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `user_id` (`user_id`,`application_id`),
  UNIQUE KEY `user_id_2` (`user_id`,`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
