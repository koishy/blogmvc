-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `root` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `root`;

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(6) unsigned DEFAULT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `articles` (`id`, `user_id`, `title`, `content`) VALUES
(13,    6,  'ÐŸÑ€Ð¸Ð¼ÐµÑ€ Ð·Ð°Ð¿Ð¸ÑÐ¸ Ð½Ðµ Ð¾Ñ‚ Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€Ð°', 'Ð­Ñ‚Ð¾ Ð¿Ñ€Ð¸Ð¼ÐµÑ€ Ð·Ð°Ð¿Ð¸ÑÐ¸ Ð½Ðµ Ð¾Ñ‚ Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€Ð°\r\n\r\n\r\nEdited'),
(14,    1,  'Ð—Ð°Ð¿Ð¸ÑÑŒ Ð¾Ñ‚ Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€Ð°',   'Ð—Ð°Ð¿Ð¸ÑÑŒ Ð¾Ñ‚ Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€Ð°\r\n\r\n(edit) Ð—Ð°Ð¿Ð¸ÑÑŒ ÑÐ¾Ñ…Ñ€Ð°Ð½ÑÐµÑ‚ÑÑ Ð¿Ð¾ÑÐ»Ðµ Ñ€ÐµÐ´Ð°ÐºÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ñ'),
(15,    1,  '<script>alert(\'xss\')</script>',  '<script>alert(\'xss\')</script>');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(6) unsigned DEFAULT NULL,
  `user_id` int(6) unsigned DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`) VALUES
(32,    13, 6,  'ÐŸÑ€Ð¸Ð¼ÐµÑ€ ÐºÐ¾Ð¼Ð¼ÐµÐ½Ñ‚Ð°Ñ€Ð¸Ñ Ð½Ðµ Ð¾Ñ‚ Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€Ð°'),
(33,    15, 1,  '<script>alert(\'xss\')</script>\r\n'),
(34,    13, 1,  'ÐšÐ¾Ð¼Ð¼ÐµÐ½Ñ‚Ð°Ñ€Ð¸Ð¹ Ð¾Ñ‚ Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€Ð°\r\n');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `name`, `password`, `is_admin`) VALUES
(1, 'admin',    '21232f297a57a5a743894a0e4a801fc3', 1),
(6, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0);

-- 2019-03-18 17:57:06