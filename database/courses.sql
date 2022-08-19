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

 Date: 16/08/2022 08:08:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (50, 'PE221 ', 'Political Economy', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (51, 'TS212', 'Television News Writing (Eng)', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (52, 'RPN2142', 'Radio News Writing (Eng) ', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (53, 'VRW2102', 'Television presentation (Eng)', '4', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (54, 'NW21121', 'Radio news casting (Eng)', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (55, 'RNW2122', 'Television News Casting (Eng)', '2', 1, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (56, 'MLE2101', 'Media Law & Ethics', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (57, 'BM2121', 'Documentary Studies ', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (58, 'VP201', 'Research Methods     ', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (59, 'MB2123', 'Media Marketing and Advertising   ', '4', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
INSERT INTO `courses` (`id`, `course_code`, `course_title`, `credit_hours`, `dept_id`, `level`, `semester`, `created_at`, `updated_at`) VALUES (60, 'PE221 ', 'Political Economy', '2', 2, '200', '1', '2022-08-13 15:37:01', '2022-08-13 15:37:01');
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

SET FOREIGN_KEY_CHECKS = 1;
