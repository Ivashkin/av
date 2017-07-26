# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.7.19)
# Схема: avanta
# Время создания: 2017-07-26 17:28:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы catalog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `catalog`;

CREATE TABLE `catalog` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `catalog` WRITE;
/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;

INSERT INTO `catalog` (`id`, `title`, `alias`, `description`, `image`, `disabled`)
VALUES
	(9,'Mobilier de dormitor','mobile_dormitor','Mobila de dormitor Avanta – este o combinaţie îndrăzneaţă dintre spontaneitate şi comoditate. Nuanţele calde si armonioase crează comfort şi seninătate în dormitorul Dvs. Iar liniile fluente accentuează esteticitatea finisajelor.','storage/catalog/center_img.jpg',0),
	(10,'Mobilier pentru bucatarie','mobila-bucatarie','Avanta produce bucătării la preţuri accesibile pentru toate categoriile de consumatori. Scopul principal al companiei, este produ- cerea mobilierului calitativ, care creează comfort şi aduce în casele voastre bucurie şi satisfacţie.','storage/catalog/center_img2.jpg',0),
	(11,'Mobilier pentru baie','mobila-baie','Mobilierul pentru baie Avanta este creat după cele mai înalte standarte, după ultimele tendițe în materie de design şi materiale. Le punem clienţilor noştri la dispoziţie mobilier funcţional şi comfortabil la preţuri competitive, folosind cele mai noi tehnologii ale celor mai mai mari companii producătoare de mobilă de talie mondială.','storage/catalog/center_img3.jpg',0),
	(12,'Usi de interior','usi-interior','Orice încăpere necesită uşi care separă spaţiile în funcţie de predestinarea lor, oferind comfort, spaţiu privat şi mărind nivelul de izolare fonică.','storage/catalog/center_img4.jpg',0);

/*!40000 ALTER TABLE `catalog` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catalogId` smallint(5) unsigned NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort` smallint(5) unsigned DEFAULT NULL,
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;

INSERT INTO `gallery` (`id`, `catalogId`, `image`, `sort`, `disabled`)
VALUES
	(2,7,'storage/catalog/gallery/7/poster.jpg',1,0),
	(3,10,'storage/catalog/gallery/10/1.jpg',1,0),
	(4,10,'storage/catalog/gallery/10/2.jpg',1,0),
	(5,10,'storage/catalog/gallery/10/3.jpg',1,0),
	(6,10,'storage/catalog/gallery/10/4.jpg',1,0),
	(7,10,'storage/catalog/gallery/10/5.jpg',1,0),
	(8,10,'storage/catalog/gallery/10/6.jpg',1,0),
	(9,10,'storage/catalog/gallery/10/7.jpg',1,0),
	(10,10,'storage/catalog/gallery/10/8.jpg',1,0),
	(11,10,'storage/catalog/gallery/10/9.jpg',1,0),
	(12,10,'storage/catalog/gallery/10/11.jpg',1,0),
	(13,10,'storage/catalog/gallery/10/12.jpg',1,0),
	(14,10,'storage/catalog/gallery/10/13.jpg',1,0),
	(15,10,'storage/catalog/gallery/10/14.jpg',1,0),
	(16,10,'storage/catalog/gallery/10/15.jpg',1,0);

/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Дамп таблицы settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(64) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `key`, `name`, `value`)
VALUES
	(1,'title','Название','Avanta');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы slider
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort` smallint(5) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;

INSERT INTO `slider` (`id`, `title`, `image`, `sort`, `disabled`)
VALUES
	(3,'Home Slider','storage/slider/25.jpg',NULL,0),
	(4,'2','storage/slider/14.jpg',NULL,0),
	(5,'3','storage/slider/2.jpg',NULL,0);

/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Ivashkin','ivashkin@mailer.ag','$2y$10$Zu4d3KCQmmymlPg0OE6rLOq2OND/aX3XSSDkQDhoDMJ3vEeaBrHma','8uRkiQsMY1SGC75DcBsXyKQPUmyETasedhcq8DX1ypXGQxGII96ujIXcUpDi','2017-07-19 11:44:47','2017-07-19 11:44:47'),
	(2,'Андрей','jedybeavis@gmail.com','$2y$10$cdwrJXbT4lh5qc24o9gr0u.Ap8UMJLEmvmLgN49A0tkT212Np8G02',NULL,'2017-07-26 14:06:55','2017-07-26 14:06:55');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
