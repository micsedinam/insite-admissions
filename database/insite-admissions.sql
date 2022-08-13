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

 Date: 13/08/2022 20:29:39
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
-- Table structure for course_registrations
-- ----------------------------
DROP TABLE IF EXISTS `course_registrations`;
CREATE TABLE `course_registrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `level` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_registrations_user_id_foreign` (`user_id`),
  CONSTRAINT `course_registrations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of course_registrations
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for courses
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_code` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `course_title` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `credit_hours` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dept_id` int(10) unsigned NOT NULL,
  `level` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_dept_id_foreign` (`dept_id`),
  CONSTRAINT `courses_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of courses
-- ----------------------------
BEGIN;
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (1, 'ENP101', 'Entrepreneurship    ', '2', 1, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (2, 'EM107 ', 'First Aid', '2', 1, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (3, 'IR108', 'Information Research (IR)', '2', 1, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (4, 'COM1001', 'Academic Writing and Communication Skills 1', '2', 1, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (5, 'IMCRC10', 'Critical Thinking and Logical Reasoning', '2', 1, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (6, 'ICT1002', 'Computer Studies ', '2', 1, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (7, 'LIT004', 'Introduction to Literature', '2', 1, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (8, 'TS100', 'Television News Writing (Eng)', '2', 1, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (9, 'TP106', 'Introduction to Television presentation (Eng)', '2', 1, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (10, 'RP103', 'Introduction to Radio Presentation Skills (Eng)', '2', 1, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (11, 'RD108', 'Radio News Writing Skills I (Eng)', '2', 1, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (12, 'ENP101', 'Entrepreneurship    ', '2', 2, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (13, 'EM107 ', 'First Aid', '2', 2, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (14, 'IR108', 'Information Research (IR)', '2', 2, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (15, 'COM1001', 'Academic Writing and Communication Skills 1', '2', 2, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (16, 'IMCRC10', 'Critical Thinking and Logical Reasoning', '2', 2, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (17, 'ICT1002', 'Computer Studies ', '2', 2, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (18, 'LIT004', 'Introduction to Literature', '2', 2, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (19, 'TS101', 'Television News Writing (Akan)', '2', 2, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (20, 'TP105', 'Introduction to Television presentation (Akan)', '2', 2, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (21, 'RP104', 'Introduction to Radio Presentation Skills (Akan)', '2', 2, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (22, 'RD109', 'Radio News Writing skills I (Akan)', '2', 2, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (23, 'ENP101', 'Entrepreneurship    ', '2', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (24, 'EM107 ', 'First Aid', '2', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (25, 'IR108', 'Information Research (IR)', '2', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (26, 'COM1001', 'Academic Writing and Communication Skills 1', '2', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (27, 'IMCRC10', 'Critical Thinking and Logical Reasoning', '2', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (28, 'ICT1002', 'Computer Studies ', '2', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (29, 'LIT004', 'Introduction to Literature', '2', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (30, 'TN107', 'Introduction to Video Editing    ', '4', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (31, 'CH102 ', 'Introduction to Videography', '4', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (32, 'FD108', 'Film Directing', '2', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (33, 'GD101', 'Graphic Designing', '2', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (34, 'SR104', 'Script Writing', '2', 3, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (35, 'ENP101', 'Entrepreneurship    ', '2', 4, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (36, 'EM107 ', 'First Aid', '2', 4, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (37, 'IR108', 'Information Research (IR)', '2', 4, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (38, 'COM1001', 'Academic Writing and Communication Skills 1', '2', 4, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (39, 'IMCRC10', 'Critical Thinking and Logical Reasoning', '2', 4, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (40, 'ICT1002', 'Computer Studies ', '2', 4, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (41, 'LIT004', 'Introduction to Literature', '2', 4, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (42, 'SE101', 'Introduction to Sound Engineering', '2', 4, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (43, 'SE102', 'Music Production and Recording', '2', 4, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (44, 'BF102', 'Cosmetology: Bridal fan, Hats & Fascinators I', '4', 5, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (45, 'MK1022', 'Cosmetology: Make up Artistry I', '2', 5, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (46, 'MA102', 'Nail Technology: Manicure I', '2', 5, '100', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (47, 'BM2121', 'Documentary Studies ', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (48, 'VP201', 'Research Methods     ', '4', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (49, 'MB2123', 'Media Marketing and Advertising ', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (50, 'PE221 ', 'Political Economy                               2', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (51, 'TS212', 'Television News Writing (Eng)', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (52, 'RPN2142', 'Radio News Writing (Eng) ', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (53, 'VRW2102', 'Television presentation (Eng)', '4', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (54, 'NW21121', 'Radio news casting (Eng)', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (55, 'RNW2122', 'Television News Casting (Eng)', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (56, 'MLE2101', 'Media Law & Ethics', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (57, 'BM2121', 'Documentary Studies ', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (58, 'VP201', 'Research Methods     ', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (59, 'MB2123', 'Media Marketing and Advertising   ', '4', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (60, 'PE221 ', 'Political Economy                               2', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (61, 'RNW2123 ', 'Radio news writing (Akan) ', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (62, 'VRW2122', 'Radio presentation (Akan)', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (63, 'NW21122 ', 'Television presentation (Akan)', '4', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (64, 'RPN2141  ', 'Radio news casting (Akan)', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (65, 'VRW2103  ', 'Television news casting (Akan)', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (66, 'MLE2101', 'Media Law & Ethics', '2', 3, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (67, 'BM2121', 'Documentary Studies ', '2', 3, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (68, 'VP201', 'Research Methods     ', '4', 3, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (69, 'MB2123', 'Media Marketing and Advertising ', '2', 3, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (70, 'CH212 ', 'Advance Videography I ', '4', 3, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (71, 'TN217 ', 'Advance Video Editing I ', '4', 3, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (72, 'ANM210', 'Animation (2D & 3D)', '4', 3, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (73, 'MLE2101', 'Media Law & Ethics', '2', 4, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (74, 'VP201', 'Research Methods     ', '2', 4, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (75, 'MB2123', 'Media Marketing and Advertising ', '2', 4, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (76, 'SE117', 'Voice  Dubbing ', '2', 4, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (77, 'SE116  ', 'Sound Mixing and Mastering ', '4', 4, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
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
-- Table structure for fee_payments
-- ----------------------------
DROP TABLE IF EXISTS `fee_payments`;
CREATE TABLE `fee_payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `index_number` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of fee_payments
-- ----------------------------
BEGIN;
INSERT INTO `fee_payments` (`id`, `index_number`, `code`, `created_at`, `updated_at`) VALUES (1, 'ghgh123', '35607125', '2022-08-11 06:13:29', '2022-08-11 06:13:29');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (15, '2022_08_08_151856_create_profiles_table', 2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17, '2022_08_11_053502_create_fee_payments_table', 3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (18, '2022_08_12_115307_create_course_registrations_table', 4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (19, '2022_08_12_121333_create_courses_table', 4);
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
-- Table structure for profiles
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `index_number` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `dept_id` int(10) unsigned NOT NULL,
  `prog_id` int(10) unsigned NOT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profiles_index_number_unique` (`index_number`),
  KEY `profiles_dept_id_foreign` (`dept_id`),
  KEY `profiles_prog_id_foreign` (`prog_id`),
  KEY `profiles_user_id_foreign` (`user_id`),
  CONSTRAINT `profiles_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`),
  CONSTRAINT `profiles_prog_id_foreign` FOREIGN KEY (`prog_id`) REFERENCES `programmes` (`id`),
  CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of profiles
-- ----------------------------
BEGIN;
INSERT INTO `profiles` (`id`, `index_number`, `level`, `user_id`, `dept_id`, `prog_id`, `profile_photo`, `created_at`, `updated_at`) VALUES (1, 'ghgh123', '100', 3, 1, 1, '1660202200-Continuing Student-Profile.png', '2022-08-10 03:45:41', '2022-08-11 07:16:40');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'Admin', 'admin@admin.com', NULL, 1, '$2y$10$z9BPNjdXI68/3iM7AnRshOSOii0b30IEQCj.YyG.JyJUC6KZxxr0u', NULL, '2022-08-07 05:53:53', '2022-08-07 05:53:53');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (2, 'User', 'user@user.com', NULL, 0, '$2y$10$Zg4sMJVPOb4Bm3A.vL2TXuLpUuQNXQp.DWS31i2smdVYY6eLCpERu', NULL, '2022-08-07 05:53:53', '2022-08-07 05:53:53');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (3, 'Continuing Student', 'student@user.com', NULL, 2, '$2y$10$45sIeOXb.nT9T6Ujpk/KTueDnHs2TWJ0oKzBJRmqUf7fIos98F14i', NULL, '2022-08-07 05:53:53', '2022-08-07 05:53:53');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (4, 'Andrew Efah Papiloh', 'andy@user.com', NULL, 2, '$2y$10$HEwZm0oi8noJsHYAIKmZguLm/YPSBcSBGC7dIhrLx.Uw3wSbF3zqS', NULL, '2022-08-13 19:03:48', '2022-08-13 19:03:48');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (5, 'Ben Attaks', 'ben@user.com', NULL, 2, '$2y$10$m3rUmSmAhewL0vU4zh.6nes2SzoVC9Ecq2wRAMxk5tXjGSN8xaxT6', NULL, '2022-08-13 19:09:46', '2022-08-13 19:09:46');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (6, 'Mansa Agyeman', 'mansa@user.com', NULL, 2, '$2y$10$/LNK8eE0ERHjXDsakH0UNu2.W/u2aYbYeWnP4qfhVmOcz6wNMFsKi', NULL, '2022-08-13 19:11:51', '2022-08-13 19:11:51');
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (7, 'Abigail Simeh', 'abigail@user.com', NULL, 2, '$2y$10$QI.FborgfheRFPVol7RoIuuq0w0W7w3YSCBXs1NMdRBhZnGzWEBLG', NULL, '2022-08-13 19:15:47', '2022-08-13 19:15:47');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
