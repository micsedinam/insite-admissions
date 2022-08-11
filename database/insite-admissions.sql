/*
 Navicat Premium Data Transfer

 Source Server         : Dev
 Source Server Type    : MySQL
 Source Server Version : 100703
 Source Host           : localhost:3306
 Source Schema         : insite-admissions

 Target Server Type    : MySQL
 Target Server Version : 100703
 File Encoding         : 65001

 Date: 08/08/2022 15:14:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admission_payments
-- ----------------------------
DROP TABLE IF EXISTS `admission_payments`;
CREATE TABLE `admission_payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admission_payments_reference_unique` (`reference`),
  KEY `admission_payments_user_id_foreign` (`user_id`),
  CONSTRAINT `admission_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of admission_payments
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for applicants
-- ----------------------------
DROP TABLE IF EXISTS `applicants`;
CREATE TABLE `applicants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pin` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '1000',
  `serial` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'insite',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `applicants_pin_unique` (`pin`),
  UNIQUE KEY `applicants_serial_unique` (`serial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of applicants
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of departments
-- ----------------------------
BEGIN;
INSERT INTO `departments` (`id`, `dept_name`, `created_at`, `updated_at`) VALUES (1, 'Journalism and Media Studies - English', '2022-08-07 06:30:45', '2022-08-07 06:30:45');
INSERT INTO `departments` (`id`, `dept_name`, `created_at`, `updated_at`) VALUES (2, 'Journalism and Media Studies - Akan', '2022-08-07 06:30:57', '2022-08-07 06:30:57');
INSERT INTO `departments` (`id`, `dept_name`, `created_at`, `updated_at`) VALUES (3, 'TV & Film Production', '2022-08-07 06:31:15', '2022-08-07 06:31:15');
INSERT INTO `departments` (`id`, `dept_name`, `created_at`, `updated_at`) VALUES (4, 'Sound Engineering', '2022-08-07 06:31:30', '2022-08-07 06:31:30');
INSERT INTO `departments` (`id`, `dept_name`, `created_at`, `updated_at`) VALUES (5, 'Cosmetology', '2022-08-07 06:31:39', '2022-08-07 06:31:39');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for forms
-- ----------------------------
DROP TABLE IF EXISTS `forms`;
CREATE TABLE `forms` (
  `form_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `othername` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `post_address` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `children` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `residence` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `physical_challenge` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `challenge` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `passport_photo` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dept_id` int(10) unsigned NOT NULL,
  `prog_id` int(10) unsigned NOT NULL,
  `duration` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `prog_choice` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hostel` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `instruction_language` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `lecture_period` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `school_attended` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `year_started` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `year_completed` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `certificate_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `certificate_upload` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `one_referee_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `one_referee_phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `one_referee_email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `one_referee_occupation` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `one_referee_address` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `two_referee_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `two_referee_phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `two_referee_email` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `two_referee_occupation` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `two_referee_address` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `form_complete` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `review_status` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`form_id`),
  KEY `forms_user_id_foreign` (`user_id`),
  KEY `forms_dept_id_foreign` (`dept_id`),
  KEY `forms_prog_id_foreign` (`prog_id`),
  CONSTRAINT `forms_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`),
  CONSTRAINT `forms_prog_id_foreign` FOREIGN KEY (`prog_id`) REFERENCES `programmes` (`id`),
  CONSTRAINT `forms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of forms
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2021_03_26_061556_create_applicants_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2021_04_27_080652_create_admission_payments_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2021_05_17_072600_create_departments_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2021_05_17_072601_create_programmes_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2021_05_19_172836_create_forms_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2021_06_02_091805_create_review_forms_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2021_07_03_191130_add_status_to_forms', 1);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for programmes
-- ----------------------------
DROP TABLE IF EXISTS `programmes`;
CREATE TABLE `programmes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dept_id` int(10) unsigned NOT NULL,
  `prog_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programmes_dept_id_foreign` (`dept_id`),
  CONSTRAINT `programmes_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of programmes
-- ----------------------------
BEGIN;
INSERT INTO `programmes` (`id`, `dept_id`, `prog_name`, `created_at`, `updated_at`) VALUES (1, 1, 'Radio Presenting', '2022-08-07 06:32:03', '2022-08-07 06:32:03');
INSERT INTO `programmes` (`id`, `dept_id`, `prog_name`, `created_at`, `updated_at`) VALUES (2, 2, 'TV Presenting', '2022-08-07 06:36:49', '2022-08-07 06:36:49');
COMMIT;

-- ----------------------------
-- Table structure for review_forms
-- ----------------------------
DROP TABLE IF EXISTS `review_forms`;
CREATE TABLE `review_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `form_id` int(10) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `review_forms_user_id_foreign` (`user_id`),
  KEY `review_forms_form_id_foreign` (`form_id`),
  CONSTRAINT `review_forms_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`form_id`),
  CONSTRAINT `review_forms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of review_forms
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'Admin', 'admin@admin.com', NULL, 1, '$2y$10$z9BPNjdXI68/3iM7AnRshOSOii0b30IEQCj.YyG.JyJUC6KZxxr0u', NULL, '2022-08-07 05:53:53', '2022-08-07 05:53:53');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (2, 'User', 'user@user.com', NULL, 0, '$2y$10$Zg4sMJVPOb4Bm3A.vL2TXuLpUuQNXQp.DWS31i2smdVYY6eLCpERu', NULL, '2022-08-07 05:53:53', '2022-08-07 05:53:53');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (3, 'Continuing Student', 'student@user.com', NULL, 2, '$2y$10$45sIeOXb.nT9T6Ujpk/KTueDnHs2TWJ0oKzBJRmqUf7fIos98F14i', NULL, '2022-08-07 05:53:53', '2022-08-07 05:53:53');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
