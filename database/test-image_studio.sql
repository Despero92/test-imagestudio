-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` int(11) DEFAULT NULL,
  `menu_type` int(11) NOT NULL DEFAULT '1',
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `menus` (`id`, `position`, `menu_type`, `icon`, `name`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1,	NULL,	0,	NULL,	'User',	'User',	NULL,	NULL,	NULL),
(2,	NULL,	0,	NULL,	'Role',	'Role',	NULL,	NULL,	NULL),
(6,	2,	2,	'fa-list',	'Information',	'Information',	NULL,	'2018-11-13 13:50:45',	'2018-11-13 13:53:23'),
(9,	0,	1,	'',	'Telephone',	'Telephone',	6,	'2018-11-13 14:38:18',	'2018-11-13 15:28:40'),
(10,	0,	3,	'fa-home',	'HomePage',	'Home Page',	NULL,	'2018-11-15 06:57:31',	'2018-11-15 06:57:31');

DROP TABLE IF EXISTS `menu_role`;
CREATE TABLE `menu_role` (
  `menu_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `menu_role_menu_id_role_id_unique` (`menu_id`,`role_id`),
  KEY `menu_role_menu_id_index` (`menu_id`),
  KEY `menu_role_role_id_index` (`role_id`),
  CONSTRAINT `menu_role_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `menu_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `menu_role` (`menu_id`, `role_id`) VALUES
(6,	1),
(9,	1),
(10,	1);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2015_10_10_000000_create_menus_table',	2),
(4,	'2015_10_10_000000_create_roles_table',	2),
(5,	'2015_10_10_000000_update_users_table',	2),
(6,	'2015_12_11_000000_create_users_logs_table',	2),
(7,	'2016_03_14_000000_update_menus_table',	2),
(8,	'2018_11_13_153556_create_contacts_table',	3),
(9,	'2018_11_13_163818_create_telephone_table',	4);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1,	'Administrator',	'2018-11-12 15:42:13',	'2018-11-12 15:42:13'),
(2,	'User',	'2018-11-12 15:42:13',	'2018-11-12 15:42:13');

DROP TABLE IF EXISTS `telephone`;
CREATE TABLE `telephone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `telephone` (`id`, `telephone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'067 389 41 41',	'2018-11-13 14:52:12',	'2018-11-13 14:52:12',	NULL),
(2,	'067 389 41 41',	'2018-11-13 14:53:43',	'2018-11-13 14:54:58',	'2018-11-13 14:54:58'),
(3,	'8-888-888-888',	'2018-11-13 15:14:24',	'2018-11-13 15:14:24',	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	1,	'admin',	'admin@email.com',	'$2y$10$KHfG0SDxbQo9OCiBnIG3juWf1nXgj3ZPJw/nlja9cYXbKBeUSyC1q',	'G02DhQ8oUNlnz3llO7GGjrKBWX2VOIgUpYuCQ8Y5uMmMrtzuMZj4S6TlXVcC',	'2018-11-12 15:42:54',	'2018-11-12 15:42:54');

DROP TABLE IF EXISTS `users_logs`;
CREATE TABLE `users_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action_model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users_logs` (`id`, `user_id`, `action`, `action_model`, `action_id`, `created_at`, `updated_at`) VALUES
(1,	1,	'updated',	'users',	1,	'2018-11-12 20:43:21',	'2018-11-12 20:43:21'),
(2,	1,	'created',	'contacts',	1,	'2018-11-13 13:37:35',	'2018-11-13 13:37:35'),
(3,	1,	'updated',	'contacts',	1,	'2018-11-13 13:37:47',	'2018-11-13 13:37:47'),
(4,	1,	'updated',	'contacts',	1,	'2018-11-13 13:38:55',	'2018-11-13 13:38:55'),
(5,	1,	'updated',	'contacts',	1,	'2018-11-13 13:41:37',	'2018-11-13 13:41:37'),
(6,	1,	'updated',	'contacts',	1,	'2018-11-13 13:42:23',	'2018-11-13 13:42:23'),
(7,	1,	'updated',	'contacts',	1,	'2018-11-13 14:02:48',	'2018-11-13 14:02:48'),
(8,	1,	'updated',	'contacts',	1,	'2018-11-13 14:03:14',	'2018-11-13 14:03:14'),
(9,	1,	'created',	'telephone',	1,	'2018-11-13 14:52:12',	'2018-11-13 14:52:12'),
(10,	1,	'created',	'telephone',	2,	'2018-11-13 14:53:43',	'2018-11-13 14:53:43'),
(11,	1,	'deleted',	'telephone',	2,	'2018-11-13 14:54:58',	'2018-11-13 14:54:58'),
(12,	1,	'updated',	'telephone',	1,	'2018-11-13 15:08:52',	'2018-11-13 15:08:52'),
(13,	1,	'updated',	'telephone',	1,	'2018-11-13 15:11:11',	'2018-11-13 15:11:11'),
(14,	1,	'updated',	'telephone',	1,	'2018-11-13 15:13:35',	'2018-11-13 15:13:35'),
(15,	1,	'created',	'telephone',	3,	'2018-11-13 15:14:24',	'2018-11-13 15:14:24');

-- 2018-11-15 11:54:22
