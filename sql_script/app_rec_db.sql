/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MariaDB
 Source Server Version : 100413 (10.4.13-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : app_rec_db

 Target Server Type    : MariaDB
 Target Server Version : 100413 (10.4.13-MariaDB)
 File Encoding         : 65001

 Date: 12/06/2024 08:20:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cost_reductions
-- ----------------------------
DROP TABLE IF EXISTS `cost_reductions`;
CREATE TABLE `cost_reductions`  (
  `reduction_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reduction_type` enum('STUDENT','LECTURE') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `reduction_val` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`reduction_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cost_reductions
-- ----------------------------
INSERT INTO `cost_reductions` VALUES (1, 'STUDENT', 10, NULL, NULL);
INSERT INTO `cost_reductions` VALUES (2, '', 10, NULL, NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for lab_facilities
-- ----------------------------
DROP TABLE IF EXISTS `lab_facilities`;
CREATE TABLE `lab_facilities`  (
  `lsf_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lsf_submission` bigint(20) NULL DEFAULT NULL,
  `lsf_facility_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint(20) NULL DEFAULT NULL,
  `updated_by` bigint(20) NULL DEFAULT NULL,
  PRIMARY KEY (`lsf_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 68 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_facilities
-- ----------------------------
INSERT INTO `lab_facilities` VALUES (58, 1, 1, '2024-05-31 09:54:07', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (59, 2, 1, '2024-05-31 15:56:56', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (60, 3, 1, '2024-06-03 16:45:20', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (61, 4, 1, '2024-06-03 16:49:23', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (62, 5, 1, '2024-06-07 14:49:43', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (63, 6, 1, '2024-06-08 22:51:23', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (64, 7, 1, '2024-06-11 09:08:28', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (65, 8, 1, '2024-06-11 09:13:13', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (66, 9, 1, '2024-06-11 09:14:30', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (67, 10, 1, '2024-06-11 13:47:12', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for lab_labtests
-- ----------------------------
DROP TABLE IF EXISTS `lab_labtests`;
CREATE TABLE `lab_labtests`  (
  `ltd_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ltd_submission` bigint(20) NULL DEFAULT NULL,
  `ltd_labtest` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ltd_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_labtests
-- ----------------------------

-- ----------------------------
-- Table structure for lab_sch_dates
-- ----------------------------
DROP TABLE IF EXISTS `lab_sch_dates`;
CREATE TABLE `lab_sch_dates`  (
  `lscd_id` int(11) NOT NULL,
  `lscd_sch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lscd_day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lscd_date` date NULL DEFAULT NULL,
  `lscd_status` enum('active','nonactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`lscd_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sch_dates
-- ----------------------------
INSERT INTO `lab_sch_dates` VALUES (1, '3', 'Friday', '2024-06-21', 'active', NULL, NULL);
INSERT INTO `lab_sch_dates` VALUES (2, '3', 'Saturday', '2024-06-22', 'active', NULL, NULL);
INSERT INTO `lab_sch_dates` VALUES (3, '1', 'Monday', NULL, 'active', '2024-06-10 11:26:03', NULL);
INSERT INTO `lab_sch_dates` VALUES (4, '4', 'Monday', NULL, 'active', '2024-06-10 11:48:24', NULL);
INSERT INTO `lab_sch_dates` VALUES (5, '5', 'Wednesday', '2024-06-12', 'active', '2024-06-11 13:54:35', NULL);

-- ----------------------------
-- Table structure for lab_sch_exclude
-- ----------------------------
DROP TABLE IF EXISTS `lab_sch_exclude`;
CREATE TABLE `lab_sch_exclude`  (
  `lex_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lex_lab` int(11) NULL DEFAULT NULL,
  `lex_date` int(11) NULL DEFAULT NULL,
  `lex_time_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lex_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sch_exclude
-- ----------------------------

-- ----------------------------
-- Table structure for lab_sch_times
-- ----------------------------
DROP TABLE IF EXISTS `lab_sch_times`;
CREATE TABLE `lab_sch_times`  (
  `lsct_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lsct_date_id` int(11) NULL DEFAULT NULL,
  `lsct_time_id` int(11) NULL DEFAULT NULL,
  `lsct_status` enum('active','nonactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lsct_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sch_times
-- ----------------------------
INSERT INTO `lab_sch_times` VALUES (8, 1, 0, 'active', '2024-06-10 09:07:58', NULL);
INSERT INTO `lab_sch_times` VALUES (9, 1, 1, 'active', '2024-06-10 09:07:58', NULL);
INSERT INTO `lab_sch_times` VALUES (10, 1, 2, 'active', '2024-06-10 09:07:58', NULL);
INSERT INTO `lab_sch_times` VALUES (11, 2, 0, 'active', '2024-06-10 09:07:58', NULL);
INSERT INTO `lab_sch_times` VALUES (12, 2, 1, 'active', '2024-06-10 09:07:58', NULL);
INSERT INTO `lab_sch_times` VALUES (13, 2, 2, 'active', '2024-06-10 09:07:58', NULL);
INSERT INTO `lab_sch_times` VALUES (14, 2, 3, 'active', '2024-06-10 09:07:58', NULL);
INSERT INTO `lab_sch_times` VALUES (15, 3, 0, 'active', '2024-06-10 11:27:01', '2024-06-10 12:55:04');
INSERT INTO `lab_sch_times` VALUES (16, 3, 1, 'active', '2024-06-10 11:27:06', '2024-06-10 11:27:15');
INSERT INTO `lab_sch_times` VALUES (17, 4, 0, 'active', '2024-06-10 11:48:24', NULL);
INSERT INTO `lab_sch_times` VALUES (18, 4, 2, 'active', '2024-06-10 11:48:24', NULL);
INSERT INTO `lab_sch_times` VALUES (19, 4, 4, 'active', '2024-06-10 11:48:24', NULL);
INSERT INTO `lab_sch_times` VALUES (20, 10, 0, 'active', '2024-06-11 13:54:35', NULL);
INSERT INTO `lab_sch_times` VALUES (21, 10, 1, 'active', '2024-06-11 13:54:35', NULL);

-- ----------------------------
-- Table structure for lab_schedules
-- ----------------------------
DROP TABLE IF EXISTS `lab_schedules`;
CREATE TABLE `lab_schedules`  (
  `lbs_id` int(11) NOT NULL,
  `lbs_lab` int(11) NULL DEFAULT NULL,
  `lbs_submission` bigint(20) NULL DEFAULT NULL,
  `lbs_type` enum('reguler','non_reguler') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_tenant_init` bigint(20) NULL DEFAULT NULL,
  `lbs_res_person` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_tenant_name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_matkul` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_day` enum('sunday','monday','tuesday','wednesday','thursday','friday','saturday') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_date_start` date NULL DEFAULT NULL,
  `lbs_time_start` time NULL DEFAULT NULL,
  `lbs_date_end` date NULL DEFAULT NULL,
  `lbs_time_end` time NULL DEFAULT NULL,
  `lbs_dates_period` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_sch_dates_excluded` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`lbs_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_schedules
-- ----------------------------
INSERT INTO `lab_schedules` VALUES (1, 58, NULL, 'reguler', NULL, '51', 'Kelas Mhs', 'Mata Kuliah', 'monday', NULL, '07:00:00', NULL, '07:45:00', NULL, NULL, '2024-06-10 11:29:55', 3, '2024-05-29 14:39:18');
INSERT INTO `lab_schedules` VALUES (2, 58, NULL, 'reguler', NULL, '35', 'Kelas Mhs', 'Mata Kuliah', 'monday', NULL, '07:00:00', NULL, '07:45:00', NULL, NULL, '2024-05-29 14:40:26', 3, '2024-05-29 14:40:26');
INSERT INTO `lab_schedules` VALUES (3, 58, 6, 'non_reguler', 218, NULL, 'ALIF AKBAR HIDAYATULLAH', 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 09:32:38', NULL, '2024-06-10 09:07:58');
INSERT INTO `lab_schedules` VALUES (4, 58, NULL, 'reguler', NULL, '7', 'test', 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 11:48:24', 3, '2024-06-10 11:48:24');
INSERT INTO `lab_schedules` VALUES (5, 58, 10, 'non_reguler', 219, NULL, 'Joney', 'Penelitian', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-11 13:54:35', NULL, '2024-06-11 13:54:35');

-- ----------------------------
-- Table structure for lab_sub_dates
-- ----------------------------
DROP TABLE IF EXISTS `lab_sub_dates`;
CREATE TABLE `lab_sub_dates`  (
  `lsd_id` int(11) NOT NULL,
  `lsd_lsb_id` int(11) NULL DEFAULT NULL,
  `lsd_date` date NULL DEFAULT NULL,
  `lsd_lab` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updates_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lsd_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_dates
-- ----------------------------
INSERT INTO `lab_sub_dates` VALUES (1, 6, '2024-06-21', 58, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_dates` VALUES (2, 6, '2024-06-22', 58, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_dates` VALUES (3, 5, '2024-06-07', 58, '2024-06-10 13:49:14', '2024-06-10 13:51:59');
INSERT INTO `lab_sub_dates` VALUES (4, 5, '2024-06-08', 58, '2024-06-10 13:49:41', '2024-06-10 13:52:06');
INSERT INTO `lab_sub_dates` VALUES (5, 4, '2024-06-28', 58, '2024-06-10 13:50:52', '2024-06-10 13:52:32');
INSERT INTO `lab_sub_dates` VALUES (6, 4, '2024-06-29', 58, '2024-06-10 13:50:55', '2024-06-10 13:52:32');
INSERT INTO `lab_sub_dates` VALUES (7, 7, '2024-06-14', 58, '2024-06-11 09:08:28', NULL);
INSERT INTO `lab_sub_dates` VALUES (8, 8, '2024-07-01', 58, '2024-06-11 09:13:13', NULL);
INSERT INTO `lab_sub_dates` VALUES (9, 9, '2024-06-24', 58, '2024-06-11 09:14:30', NULL);
INSERT INTO `lab_sub_dates` VALUES (10, 10, '2024-06-12', 58, '2024-06-11 13:47:12', NULL);

-- ----------------------------
-- Table structure for lab_sub_order_details
-- ----------------------------
DROP TABLE IF EXISTS `lab_sub_order_details`;
CREATE TABLE `lab_sub_order_details`  (
  `lod_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lod_los_id` int(11) NULL DEFAULT NULL,
  `lod_item_id` int(11) NULL DEFAULT NULL,
  `lod_item_type` enum('tool','lab','reduction') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lod_item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lod_cost` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lod_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 98 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_order_details
-- ----------------------------
INSERT INTO `lab_sub_order_details` VALUES (78, 4, 34, 'lab', 'Lab. Beton', 100000.00, '2024-06-03 16:49:23', NULL);
INSERT INTO `lab_sub_order_details` VALUES (79, 4, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-06-03 16:49:23', NULL);
INSERT INTO `lab_sub_order_details` VALUES (80, 4, 0, 'reduction', 'Potongan biaya 10 %', 20000.00, '2024-06-03 16:49:23', NULL);
INSERT INTO `lab_sub_order_details` VALUES (81, 5, 34, 'lab', 'Lab. Beton', 100000.00, '2024-06-07 14:49:43', NULL);
INSERT INTO `lab_sub_order_details` VALUES (82, 5, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-06-07 14:49:43', NULL);
INSERT INTO `lab_sub_order_details` VALUES (83, 5, 0, 'reduction', 'Potongan biaya 10 %', 20000.00, '2024-06-07 14:49:43', NULL);
INSERT INTO `lab_sub_order_details` VALUES (84, 6, 34, 'lab', 'Lab. Beton', 100000.00, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_order_details` VALUES (85, 6, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_order_details` VALUES (86, 6, 0, 'reduction', 'Potongan biaya 10 %', 20000.00, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_order_details` VALUES (87, 7, 34, 'lab', 'Lab. Beton', 100000.00, '2024-06-11 09:08:28', NULL);
INSERT INTO `lab_sub_order_details` VALUES (88, 7, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-06-11 09:08:28', NULL);
INSERT INTO `lab_sub_order_details` VALUES (89, 7, 0, 'reduction', 'Potongan biaya 10 %', 20000.00, '2024-06-11 09:08:28', NULL);
INSERT INTO `lab_sub_order_details` VALUES (90, 8, 34, 'lab', 'Lab. Beton', 100000.00, '2024-06-11 09:13:13', NULL);
INSERT INTO `lab_sub_order_details` VALUES (91, 8, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-06-11 09:13:13', NULL);
INSERT INTO `lab_sub_order_details` VALUES (92, 8, 0, 'reduction', 'Potongan biaya 10 %', 20000.00, '2024-06-11 09:13:13', NULL);
INSERT INTO `lab_sub_order_details` VALUES (93, 9, 34, 'lab', 'Lab. Beton', 100000.00, '2024-06-11 09:14:30', NULL);
INSERT INTO `lab_sub_order_details` VALUES (94, 9, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-06-11 09:14:30', NULL);
INSERT INTO `lab_sub_order_details` VALUES (95, 9, 0, 'reduction', 'Potongan biaya 10 %', 20000.00, '2024-06-11 09:14:30', NULL);
INSERT INTO `lab_sub_order_details` VALUES (96, 10, 34, 'lab', 'Lab. Beton', 100000.00, '2024-06-11 13:47:12', NULL);
INSERT INTO `lab_sub_order_details` VALUES (97, 10, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-06-11 13:47:12', NULL);

-- ----------------------------
-- Table structure for lab_sub_orders
-- ----------------------------
DROP TABLE IF EXISTS `lab_sub_orders`;
CREATE TABLE `lab_sub_orders`  (
  `los_id` int(11) NOT NULL,
  `los_lsb_id` int(11) NULL DEFAULT NULL,
  `los_invoice_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `los_date_order` datetime NULL DEFAULT NULL,
  `los_cost_total` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`los_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_orders
-- ----------------------------
INSERT INTO `lab_sub_orders` VALUES (4, 4, NULL, '2024-06-03 16:49:23', 180000.00, '2024-06-03 16:49:23', NULL);
INSERT INTO `lab_sub_orders` VALUES (5, 5, NULL, '2024-06-07 14:49:43', 180000.00, '2024-06-07 14:49:43', NULL);
INSERT INTO `lab_sub_orders` VALUES (6, 6, NULL, '2024-06-08 22:51:23', 180000.00, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_orders` VALUES (7, 7, NULL, '2024-06-11 09:08:28', 180000.00, '2024-06-11 09:08:28', NULL);
INSERT INTO `lab_sub_orders` VALUES (8, 8, NULL, '2024-06-11 09:13:13', 180000.00, '2024-06-11 09:13:13', NULL);
INSERT INTO `lab_sub_orders` VALUES (9, 9, NULL, '2024-06-11 09:14:30', 180000.00, '2024-06-11 09:14:30', NULL);
INSERT INTO `lab_sub_orders` VALUES (10, 10, NULL, '2024-06-11 13:47:12', 100000.00, '2024-06-11 13:47:12', NULL);

-- ----------------------------
-- Table structure for lab_sub_times
-- ----------------------------
DROP TABLE IF EXISTS `lab_sub_times`;
CREATE TABLE `lab_sub_times`  (
  `lstt_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lstt_date_subs_id` int(11) NULL DEFAULT NULL,
  `lstt_time_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lstt_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_times
-- ----------------------------
INSERT INTO `lab_sub_times` VALUES (1, 1, 0, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_times` VALUES (2, 1, 1, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_times` VALUES (3, 1, 2, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_times` VALUES (4, 2, 0, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_times` VALUES (5, 2, 1, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_times` VALUES (6, 2, 2, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_times` VALUES (7, 2, 3, '2024-06-08 22:51:23', NULL);
INSERT INTO `lab_sub_times` VALUES (8, 7, 0, '2024-06-11 09:08:28', NULL);
INSERT INTO `lab_sub_times` VALUES (9, 7, 1, '2024-06-11 09:08:28', NULL);
INSERT INTO `lab_sub_times` VALUES (10, 8, 0, '2024-06-11 09:13:13', NULL);
INSERT INTO `lab_sub_times` VALUES (11, 9, 1, '2024-06-11 09:14:30', NULL);
INSERT INTO `lab_sub_times` VALUES (12, 9, 2, '2024-06-11 09:14:30', NULL);
INSERT INTO `lab_sub_times` VALUES (13, 10, 0, '2024-06-11 13:47:12', NULL);
INSERT INTO `lab_sub_times` VALUES (14, 10, 1, '2024-06-11 13:47:12', NULL);

-- ----------------------------
-- Table structure for lab_submission_accs
-- ----------------------------
DROP TABLE IF EXISTS `lab_submission_accs`;
CREATE TABLE `lab_submission_accs`  (
  `lsa_id` bigint(16) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lsa_submission` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsa_rule` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsa_user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'tp_lain_lain',
  `las_username` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `las_note` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `las_date_acc` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`lsa_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 175 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_accs
-- ----------------------------
INSERT INTO `lab_submission_accs` VALUES (168, '4', 'LAB_HEAD', '3', 'Kalab', NULL, '2024-06-03 16:57:26', '2024-06-03 16:57:26', NULL);
INSERT INTO `lab_submission_accs` VALUES (169, '4', 'LECTURE', NULL, 'Meity Wulandari, S.T., M.T.', NULL, '2024-06-03 16:57:26', '2024-06-03 16:57:26', NULL);
INSERT INTO `lab_submission_accs` VALUES (170, '5', 'LAB_HEAD', '3', 'Kalab', NULL, '2024-06-07 14:51:35', '2024-06-07 14:51:35', NULL);
INSERT INTO `lab_submission_accs` VALUES (171, '5', 'LECTURE', NULL, 'Meity Wulandari, S.T., M.T.', NULL, '2024-06-07 14:51:35', '2024-06-07 14:51:35', NULL);
INSERT INTO `lab_submission_accs` VALUES (172, '6', 'LAB_HEAD', '3', 'Kalab', 'Disetujuia', '2024-06-10 09:07:57', '2024-06-10 09:07:57', NULL);
INSERT INTO `lab_submission_accs` VALUES (173, '6', 'LECTURE', NULL, 'Meity Wulandari, S.T., M.T.', NULL, '2024-06-10 09:07:57', '2024-06-10 09:07:57', NULL);
INSERT INTO `lab_submission_accs` VALUES (174, '10', 'LAB_HEAD', '3', 'Kalab', NULL, '2024-06-11 13:54:35', '2024-06-11 13:54:35', NULL);

-- ----------------------------
-- Table structure for lab_submission_advisers
-- ----------------------------
DROP TABLE IF EXISTS `lab_submission_advisers`;
CREATE TABLE `lab_submission_advisers`  (
  `las_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `las_lbs_id` int(11) NULL DEFAULT NULL,
  `las_user_id` int(11) NULL DEFAULT NULL,
  `las_nip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `las_byname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `las_fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `las_user_no_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`las_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_advisers
-- ----------------------------
INSERT INTO `lab_submission_advisers` VALUES (26, 4, NULL, '199105282019032019', 'Pembimbing', 'Meity Wulandari, S.T., M.T.', '2024-06-03 16:49:23', NULL, 28059106);
INSERT INTO `lab_submission_advisers` VALUES (27, 5, NULL, '199105282019032019', 'Pembimbing', 'Meity Wulandari, S.T., M.T.', '2024-06-07 14:49:43', NULL, 28059106);
INSERT INTO `lab_submission_advisers` VALUES (28, 6, NULL, '199105282019032019', 'Pembimbing', 'Meity Wulandari, S.T., M.T.', '2024-06-08 22:51:23', NULL, 28059106);
INSERT INTO `lab_submission_advisers` VALUES (29, 7, NULL, '199105282019032019', 'Pembimbing', 'Meity Wulandari, S.T., M.T.', '2024-06-11 09:08:28', NULL, 28059106);
INSERT INTO `lab_submission_advisers` VALUES (30, 8, NULL, '199105282019032019', 'Pembimbing', 'Meity Wulandari, S.T., M.T.', '2024-06-11 09:13:13', NULL, 28059106);
INSERT INTO `lab_submission_advisers` VALUES (31, 9, NULL, '199105282019032019', 'Pembimbing', 'Meity Wulandari, S.T., M.T.', '2024-06-11 09:14:30', NULL, 28059106);

-- ----------------------------
-- Table structure for lab_submission_results
-- ----------------------------
DROP TABLE IF EXISTS `lab_submission_results`;
CREATE TABLE `lab_submission_results`  (
  `lsr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lsr_lsb_id` int(11) NULL DEFAULT NULL,
  `lsr_status` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'false',
  `lsr_filename` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsr_user_validator` int(11) NULL DEFAULT NULL,
  `lsr_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lsr_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_results
-- ----------------------------
INSERT INTO `lab_submission_results` VALUES (2, 4, 'true', '20050724036_alif_akbar_hidayatullah_03_06_2024_170630.pdf', 34, NULL, '2024-06-03 17:06:30', '2024-06-03 17:14:25');
INSERT INTO `lab_submission_results` VALUES (3, 5, 'false', '20050724036_alif_akbar_hidayatullah_07_06_2024_152652.pdf', NULL, NULL, '2024-06-07 15:26:52', NULL);
INSERT INTO `lab_submission_results` VALUES (4, 6, 'false', '20050724036_alif_akbar_hidayatullah_11_06_2024_092425.pdf', NULL, NULL, '2024-06-11 09:24:26', NULL);
INSERT INTO `lab_submission_results` VALUES (5, 10, 'false', '1233_joney_11_06_2024_135905.pdf', NULL, NULL, '2024-06-11 13:59:05', NULL);

-- ----------------------------
-- Table structure for lab_submissions
-- ----------------------------
DROP TABLE IF EXISTS `lab_submissions`;
CREATE TABLE `lab_submissions`  (
  `lsb_id` bigint(16) NOT NULL,
  `lsb_lab_id` int(11) NULL DEFAULT NULL,
  `lsb_title` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_type` enum('uji_lab','pinjam_lab') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_activity` enum('tp_penelitian','tp_pelatihan','tp_pengabdian_masyarakat','tp_magang','tp_lain_lain','tp_penelitian_skripsi') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'tp_lain_lain',
  `lsb_date_start` datetime NULL DEFAULT NULL,
  `lsb_date_end` datetime NULL DEFAULT NULL,
  `lsb_period` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_user_id` int(11) NULL DEFAULT NULL,
  `lsb_user_head` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_user_lecture` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_user_subhead` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_user_tech` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_file_1` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_file_2` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_notes` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_status` enum('menunggu','disetujui','ditolak','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'menunggu',
  `lsb_report_url` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_report_filename` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`lsb_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submissions
-- ----------------------------
INSERT INTO `lab_submissions` VALUES (4, 58, 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', 'pinjam_lab', 'tp_penelitian_skripsi', '2024-06-28 07:00:00', '2024-06-29 18:00:00', '2024-06-28$2024-06-29', 218, '3', NULL, '34', '73', '20240603_164923_trustopenmail@gmail.com.pdf', NULL, NULL, 'selesai', NULL, NULL, '2024-06-03 17:14:25', '2024-06-03 17:14:25');
INSERT INTO `lab_submissions` VALUES (5, 58, 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', 'pinjam_lab', 'tp_penelitian_skripsi', '2024-06-07 07:00:00', '2024-06-08 18:00:00', '2024-06-07$2024-06-08', 218, '3', NULL, '34', '73', '20240607_144943_trustopenmail@gmail.com.pdf', NULL, NULL, 'disetujui', NULL, NULL, '2024-06-07 15:24:49', '2024-06-07 15:24:49');
INSERT INTO `lab_submissions` VALUES (6, 58, 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', 'pinjam_lab', 'tp_penelitian_skripsi', NULL, NULL, NULL, 218, '3', NULL, '34', NULL, NULL, NULL, NULL, 'disetujui', NULL, NULL, '2024-06-10 09:07:57', '2024-06-10 09:07:57');
INSERT INTO `lab_submissions` VALUES (7, 58, 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', 'pinjam_lab', 'tp_penelitian_skripsi', NULL, NULL, NULL, 218, '3', NULL, '34', NULL, NULL, NULL, NULL, 'menunggu', NULL, NULL, '2024-06-11 09:08:28', NULL);
INSERT INTO `lab_submissions` VALUES (8, 58, 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', 'pinjam_lab', 'tp_penelitian_skripsi', NULL, NULL, NULL, 218, '3', NULL, '34', NULL, NULL, NULL, NULL, 'menunggu', NULL, NULL, '2024-06-11 09:13:13', NULL);
INSERT INTO `lab_submissions` VALUES (9, 58, 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', 'pinjam_lab', 'tp_penelitian_skripsi', NULL, NULL, NULL, 218, '3', NULL, '34', NULL, NULL, NULL, NULL, 'menunggu', NULL, NULL, '2024-06-11 09:14:30', NULL);
INSERT INTO `lab_submissions` VALUES (10, 58, 'Penelitian', 'pinjam_lab', 'tp_penelitian', NULL, NULL, NULL, 219, '3', NULL, '34', '73', NULL, NULL, NULL, 'disetujui', NULL, NULL, '2024-06-11 13:59:42', '2024-06-11 13:59:42');

-- ----------------------------
-- Table structure for lab_use_results
-- ----------------------------
DROP TABLE IF EXISTS `lab_use_results`;
CREATE TABLE `lab_use_results`  (
  `rep_id` int(10) UNSIGNED NOT NULL,
  `res_lsb_id` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `res_note_result` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `res_files` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `res_acc_technical` varchar(23) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `res_acc_kasublab` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`rep_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_use_results
-- ----------------------------

-- ----------------------------
-- Table structure for laboratories
-- ----------------------------
DROP TABLE IF EXISTS `laboratories`;
CREATE TABLE `laboratories`  (
  `lab_id` int(10) UNSIGNED NOT NULL,
  `lab_group` int(11) NULL DEFAULT NULL,
  `lab_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lab_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lab_status` enum('tersedia','tidak_tersedia') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lab_head` int(11) NULL DEFAULT NULL,
  `lab_note_short` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lab_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lab_location` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lab_timestart` time NULL DEFAULT NULL,
  `lab_timeend` time NULL DEFAULT NULL,
  `lab_rent_cost` decimal(10, 2) NULL DEFAULT NULL,
  `lab_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lab_id`) USING BTREE,
  UNIQUE INDEX `unq_laboratories`(`lab_code`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratories
-- ----------------------------
INSERT INTO `laboratories` VALUES (1, 2, 'Lab. konversi energy listrik', NULL, 'tersedia', 11, 'Sarana penunjang pratikum teknik elektro', NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 40000.00, NULL, NULL, '2024-05-17 12:53:05');
INSERT INTO `laboratories` VALUES (2, 2, 'Lab. Bengkel listrik', NULL, 'tersedia', 11, 'Sarana penunjang pratikum teknik elektro', NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-05-03 09:42:57');
INSERT INTO `laboratories` VALUES (3, 2, 'Lab. pengukuran listrik ', NULL, 'tersedia', 12, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (4, 2, 'Lab. elektronika analog dan digital', NULL, 'tersedia', 12, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (5, 2, 'Lab. Intelligent  system', NULL, 'tersedia', 13, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (6, 2, 'Lab. Komputer dan pembelajaran', NULL, 'tersedia', 13, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (7, 2, 'Lab. Transmisi dan distribusi', NULL, 'tersedia', 14, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (8, 2, 'Ruang Baca', NULL, 'tersedia', 14, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (9, 2, 'Lab. Telematika', NULL, 'tersedia', 15, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (10, 2, 'Lab. Telekomunikasi', NULL, 'tersedia', 15, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (11, 2, 'Lab. fisika teknik', NULL, 'tersedia', 16, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (12, 2, 'Lab. Sistem kendali', NULL, 'tersedia', 16, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (13, 2, 'Lab. Mikroprosesor ', NULL, 'tersedia', 17, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (14, 2, 'Lab. Robotika  ', NULL, 'tersedia', 17, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (15, 2, 'Lab. Kubikel ', NULL, 'tersedia', 18, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (16, 2, 'Lab. Instalasi penerangan dan tenaga listrik', NULL, 'tersedia', 18, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (17, 2, 'Lab. Microteaching FT UNESA', NULL, 'tersedia', 19, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (18, 2, 'Lab. Pendingin', NULL, 'tersedia', 19, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:44');
INSERT INTO `laboratories` VALUES (19, 4, 'Lab. Bahan Bakar Alternatif dan Pelumas', NULL, 'tersedia', 20, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:51');
INSERT INTO `laboratories` VALUES (20, 4, 'Lab. Pengujian Performa Mesin', NULL, 'tersedia', 20, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (21, 4, 'Lab. Perpindahan Panas', NULL, 'tersedia', 21, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (22, 4, 'Lab. Air Conditioner (AC)', NULL, 'tersedia', 21, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (23, 4, 'Lab. Kelistrikan Otomotif', NULL, 'tersedia', 22, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (24, 4, 'Lab. Aerodinamika', NULL, 'tersedia', 22, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (25, 4, 'Lab. Mekanika Fluida', NULL, 'tersedia', 22, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (26, 4, 'Lab. Komputer', NULL, 'tersedia', 23, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (27, 4, 'Lab. Gambar', NULL, 'tersedia', 23, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (28, 4, 'Lab. CAD', NULL, 'tersedia', 23, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (29, 4, 'Lab. Plat Dan Tempa', NULL, 'tersedia', 24, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (30, 4, 'Lab. Pembelajaran PTM', NULL, 'tersedia', 24, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (31, 4, 'Lab. Pengukuran', NULL, 'tersedia', 24, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (32, 4, 'Lab. Pengelasan', NULL, 'tersedia', 25, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (33, 4, 'Lab. Pengecoran Logam', NULL, 'tersedia', 25, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (34, 4, 'Lab. Permesinan', NULL, 'tersedia', 25, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (35, 4, 'Lab. Motor Bensin / Motor Bakar ', NULL, 'tersedia', 26, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (36, 4, 'Lab. Motor Diesel / Motor Bakar ', NULL, 'tersedia', 26, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (37, 4, 'Lab. Motor Kecil Dan Sepeda Motor', NULL, 'tersedia', 26, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:55');
INSERT INTO `laboratories` VALUES (38, 4, 'Thermodinamika', NULL, 'tersedia', 27, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:49:05');
INSERT INTO `laboratories` VALUES (39, 4, 'Fenomena Dasar Mesin', NULL, 'tersedia', 27, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:49:05');
INSERT INTO `laboratories` VALUES (40, 4, 'Teknik Tenaga Listrik', NULL, 'tersedia', 28, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:49:05');
INSERT INTO `laboratories` VALUES (41, 4, 'Chasis', NULL, 'tersedia', 28, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:49:05');
INSERT INTO `laboratories` VALUES (42, 4, 'Fisika', NULL, 'tersedia', 28, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:49:05');
INSERT INTO `laboratories` VALUES (43, 4, 'Pengecatan', NULL, 'tersedia', 29, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:49:05');
INSERT INTO `laboratories` VALUES (44, 4, 'Mekatronika', NULL, 'tersedia', 29, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:49:05');
INSERT INTO `laboratories` VALUES (45, 4, 'Lab. CNC', NULL, 'tersedia', 29, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:49:05');
INSERT INTO `laboratories` VALUES (46, 4, 'Pengujian Bahan', NULL, 'tersedia', 30, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:49:05');
INSERT INTO `laboratories` VALUES (47, 4, 'Pelapisan', NULL, 'tersedia', 30, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:49:05');
INSERT INTO `laboratories` VALUES (48, 4, 'Koordinator Ruang Baca', NULL, 'tersedia', 30, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:49:05');
INSERT INTO `laboratories` VALUES (49, 5, 'Lab. Sistem Informasi & Geografis', NULL, 'tersedia', 31, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:10');
INSERT INTO `laboratories` VALUES (50, 5, 'Lab. Studio Gambar Komputer', NULL, 'tersedia', 31, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (51, 5, 'Lab. Pembelajaran', NULL, 'tersedia', 32, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (52, 5, 'Lab. Bengkel Kayu Tangan ', NULL, 'tersedia', 32, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (53, 5, 'Lab. Bengkel kayu Mesin', NULL, 'tersedia', 32, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (54, 5, 'Ruang Baca', NULL, 'tersedia', 33, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (55, 5, 'Lab. Keairan', NULL, 'tersedia', 33, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (56, 5, 'Lab. Bahan ', NULL, 'tersedia', 34, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (57, 5, 'Lab. Transportasi', NULL, 'tersedia', 34, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (58, 5, 'Lab. Beton', NULL, 'tersedia', 34, '<p>\r\n\r\nDilengkapi dengan peralatan uji beton dan bahan\r\n\r\n<br></p>', '<p>\r\n\r\n</p><p>Dilengkapi dengan peralatan uji beton dan bahan, antara lain :</p><p></p><ul><li>universal testing machine (utm) 1000 ton, 200 ton, dan 50 ton.</li><li>Analisa gradasi material</li><li>Konsistensi beton,</li><li>Berat jenis bahan.</li></ul><p></p>\r\n\r\n<br><p></p>', 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 100000.00, '20240516_081704_lab_beton.jpg', NULL, '2024-05-17 12:58:37');
INSERT INTO `laboratories` VALUES (59, 5, 'Lab. Mekanika Tanah', NULL, 'tersedia', 34, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (60, 5, 'Lab. Studio Gambar Manual', NULL, 'tersedia', 35, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (61, 5, 'Lab. Komputer', NULL, 'tersedia', 35, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (62, 5, 'Lab. Ilmu Ukur Tanah', NULL, 'tersedia', 36, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (63, 5, 'Bengkel batu & Beton', NULL, 'tersedia', 36, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (64, 5, 'Bengkel Plambing', NULL, 'tersedia', 36, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:50:19');
INSERT INTO `laboratories` VALUES (65, 1, 'Lab. Fashion Enterpreneur ', NULL, 'tersedia', 37, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:53');
INSERT INTO `laboratories` VALUES (66, 1, 'Lab. Manajemen Busana', NULL, 'tersedia', 37, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (67, 1, 'Lab. Solus Per-Aqua (SPA)', NULL, 'tersedia', 38, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (68, 1, 'Ruang Baca', NULL, 'tersedia', 38, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (69, 1, 'Lab. Pengelolaan Usaha Busana', NULL, 'tersedia', 39, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (70, 1, 'Lab. Bordir', NULL, 'tersedia', 39, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (71, 1, 'Lab. Desain', NULL, 'tersedia', 40, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (72, 1, 'Lab. Draping', NULL, 'tersedia', 40, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (73, 1, 'Lab. Konstruksi Pola Busana', NULL, 'tersedia', 41, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (74, 1, 'Lab. Tekstil', NULL, 'tersedia', 41, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (75, 1, 'Lab. Tata Rias', NULL, 'tersedia', 42, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (76, 1, 'Lab. Perawatan Rambut ', NULL, 'tersedia', 42, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (77, 1, 'Lab. Perawatan Kulit', NULL, 'tersedia', 43, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (78, 1, 'Lab. Tata Rias Wajah', NULL, 'tersedia', 43, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (79, 1, 'Lab. Pengelolaan Usaha / Salon', NULL, 'tersedia', 44, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (80, 1, 'Lab. Pengantin ', NULL, 'tersedia', 44, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:46:59');
INSERT INTO `laboratories` VALUES (81, 1, 'Lab. Pengolahan Makanan Kontinental (PM-3)', NULL, 'tersedia', 45, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:00');
INSERT INTO `laboratories` VALUES (82, 1, 'Lab. Restoran', NULL, 'tersedia', 45, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:00');
INSERT INTO `laboratories` VALUES (83, 1, 'Lab. Coklat', NULL, 'tersedia', 45, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:47:00');
INSERT INTO `laboratories` VALUES (84, 1, 'Lab. Pengolahan Makanan-2', NULL, 'tersedia', 46, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:51:05');
INSERT INTO `laboratories` VALUES (85, 1, 'Lab. Bakery Pastry', NULL, 'tersedia', 46, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:51:05');
INSERT INTO `laboratories` VALUES (86, 1, 'Lab. Kafetaria', NULL, 'tersedia', 46, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:51:05');
INSERT INTO `laboratories` VALUES (87, 1, 'Lab. Pengolahan Makanan-1', NULL, 'tersedia', 47, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:51:05');
INSERT INTO `laboratories` VALUES (88, 1, 'Lab. Komputer/Multimedia ', NULL, 'tersedia', 47, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:51:05');
INSERT INTO `laboratories` VALUES (89, 1, 'Lab. Teknologi Pangan', NULL, 'tersedia', 47, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:51:05');
INSERT INTO `laboratories` VALUES (90, 1, 'Lab. IPA', NULL, 'tersedia', 47, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:51:05');
INSERT INTO `laboratories` VALUES (91, 3, 'Lab. Multimedia', NULL, 'tersedia', 48, NULL, NULL, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:10');
INSERT INTO `laboratories` VALUES (92, 3, 'Lab. Pengembangan Media', NULL, 'tersedia', 48, NULL, NULL, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:14');
INSERT INTO `laboratories` VALUES (93, 3, 'Lab. Sistem Informasi', NULL, 'tersedia', 49, NULL, NULL, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:14');
INSERT INTO `laboratories` VALUES (94, 3, 'Lab. Jaringan Komputer Dasar', NULL, 'tersedia', 49, NULL, NULL, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:14');
INSERT INTO `laboratories` VALUES (95, 3, 'Lab. Rekayasa Perangkat Lunak', NULL, 'tersedia', 50, NULL, NULL, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:14');
INSERT INTO `laboratories` VALUES (96, 3, 'Ruang Baca', NULL, 'tersedia', 50, NULL, NULL, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL, NULL, NULL, NULL, '2024-04-24 11:48:14');
INSERT INTO `laboratories` VALUES (97, 1, 'lab test 123', NULL, 'tersedia', 4, '<p>12</p>', '<p>12</p>', 'gedung C', NULL, NULL, 100000.00, NULL, '2024-05-13 08:56:42', '2024-05-13 14:15:23');

-- ----------------------------
-- Table structure for laboratory_facilities
-- ----------------------------
DROP TABLE IF EXISTS `laboratory_facilities`;
CREATE TABLE `laboratory_facilities`  (
  `laf_id` int(11) NOT NULL,
  `laf_laboratorium` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `laf_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `laf_utility` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `laf_brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `laf_value` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`laf_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_facilities
-- ----------------------------
INSERT INTO `laboratory_facilities` VALUES (1, '58', 'Elle ADR 3000', 'Alat untuk test tekan beton', 'Elle ADR 3000', 100000.00, '2024-05-16 08:34:04', '2024-05-16 09:17:27', NULL, NULL);

-- ----------------------------
-- Table structure for laboratory_facility_count_statuses
-- ----------------------------
DROP TABLE IF EXISTS `laboratory_facility_count_statuses`;
CREATE TABLE `laboratory_facility_count_statuses`  (
  `lcs_id` int(11) NOT NULL,
  `lcs_facility` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lcs_count` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lcs_ready` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lcs_used` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lcs_condition_good` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lcs_condition_poor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lcs_condition_unwearable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`lcs_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_facility_count_statuses
-- ----------------------------
INSERT INTO `laboratory_facility_count_statuses` VALUES (1, '1', '11', '10', '0', '10', '0', '0', '2024-03-15 10:55:58', '2024-02-27 10:22:17');
INSERT INTO `laboratory_facility_count_statuses` VALUES (2, '2', '10', '10', '0', '10', '0', '0', NULL, '2024-03-14 13:58:14');
INSERT INTO `laboratory_facility_count_statuses` VALUES (3, '3', '10', '10', '0', '10', '0', '0', '2024-03-14 14:11:13', '2024-03-14 14:01:11');
INSERT INTO `laboratory_facility_count_statuses` VALUES (4, '4', '10', '10', '0', '10', '0', '0', NULL, '2024-03-14 14:01:32');
INSERT INTO `laboratory_facility_count_statuses` VALUES (5, '5', '10', '10', '0', '10', '0', '0', NULL, '2024-03-14 14:02:13');
INSERT INTO `laboratory_facility_count_statuses` VALUES (6, '6', '10', '10', '0', '10', '0', '0', NULL, '2024-03-14 14:02:34');
INSERT INTO `laboratory_facility_count_statuses` VALUES (7, '5', '10', '10', '0', '10', '0', '0', NULL, '2024-03-15 10:55:24');
INSERT INTO `laboratory_facility_count_statuses` VALUES (8, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-06 14:55:07');
INSERT INTO `laboratory_facility_count_statuses` VALUES (9, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-06 14:55:30');
INSERT INTO `laboratory_facility_count_statuses` VALUES (10, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-06 16:46:11');
INSERT INTO `laboratory_facility_count_statuses` VALUES (11, '8', NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-16 09:17:27', '2024-05-16 08:34:04');

-- ----------------------------
-- Table structure for laboratory_groups
-- ----------------------------
DROP TABLE IF EXISTS `laboratory_groups`;
CREATE TABLE `laboratory_groups`  (
  `lag_id` int(11) NOT NULL,
  `lag_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`lag_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_groups
-- ----------------------------
INSERT INTO `laboratory_groups` VALUES (1, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias');
INSERT INTO `laboratory_groups` VALUES (2, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro');
INSERT INTO `laboratory_groups` VALUES (3, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi');
INSERT INTO `laboratory_groups` VALUES (4, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin');
INSERT INTO `laboratory_groups` VALUES (5, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan');

-- ----------------------------
-- Table structure for laboratory_labtest_facilities
-- ----------------------------
DROP TABLE IF EXISTS `laboratory_labtest_facilities`;
CREATE TABLE `laboratory_labtest_facilities`  (
  `lst_id` int(11) NOT NULL,
  `lst_lsv_id` int(11) NULL DEFAULT NULL,
  `lst_facility` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`lst_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_labtest_facilities
-- ----------------------------
INSERT INTO `laboratory_labtest_facilities` VALUES (1, 1, '1');

-- ----------------------------
-- Table structure for laboratory_labtests
-- ----------------------------
DROP TABLE IF EXISTS `laboratory_labtests`;
CREATE TABLE `laboratory_labtests`  (
  `lsv_id` int(11) NOT NULL,
  `lsv_lab_id` int(11) NULL DEFAULT NULL,
  `lsv_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsv_price` decimal(10, 2) NULL DEFAULT NULL,
  `lsv_notes_short` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsv_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsv_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`lsv_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_labtests
-- ----------------------------
INSERT INTO `laboratory_labtests` VALUES (1, 58, 'Menguji kekuatan beton', 150000.00, 'Sarana untuk menguji listrik', 'Sarana untuk menguji listrik', '', '2024-05-06 15:09:13');

-- ----------------------------
-- Table structure for laboratory_technicians
-- ----------------------------
DROP TABLE IF EXISTS `laboratory_technicians`;
CREATE TABLE `laboratory_technicians`  (
  `lat_id` int(11) NOT NULL,
  `lat_laboratory` int(11) NULL DEFAULT NULL,
  `lat_tech_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lat_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_technicians
-- ----------------------------
INSERT INTO `laboratory_technicians` VALUES (1, 1, 51, '2024-05-27 17:10:37', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (2, 2, 51, '2024-05-27 17:10:37', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (3, 3, 51, '2024-05-27 17:10:37', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (4, 4, 52, '2024-05-27 17:10:37', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (5, 5, 53, '2024-05-27 17:10:37', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (6, 6, 52, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (7, 7, 52, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (8, 8, 54, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (9, 9, 55, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (10, 10, 55, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (11, 11, 53, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (12, 12, 53, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (13, 13, 55, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (14, 15, 56, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (15, 16, 56, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (16, 18, 56, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (17, 19, 57, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (18, 20, 57, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (19, 21, 58, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (20, 22, 59, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (21, 23, 59, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (22, 24, 59, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (23, 25, 60, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (24, 26, 61, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (25, 27, 62, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (26, 28, 61, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (27, 29, 63, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (28, 31, 64, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (29, 32, 65, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (30, 33, 65, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (31, 34, 66, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (32, 35, 57, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (33, 36, 60, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (34, 37, 60, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (35, 39, 60, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (36, 40, 62, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (37, 41, 62, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (38, 42, 63, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (39, 43, 58, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (40, 44, 67, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (41, 45, 66, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (42, 46, 67, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (43, 47, 67, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (44, 49, 68, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (45, 50, 68, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (46, 51, 69, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (47, 52, 70, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (48, 53, 70, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (49, 54, 71, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (50, 55, 72, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (51, 56, 73, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (52, 57, 72, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (53, 58, 73, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (54, 59, 74, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (55, 60, 75, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (56, 61, 68, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (57, 62, 75, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (58, 63, 76, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (59, 64, 69, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (60, 65, 77, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (61, 66, 78, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (62, 67, 79, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (63, 68, 80, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (64, 69, 77, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (65, 70, 78, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (66, 71, 81, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (67, 72, 81, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (68, 73, 78, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (69, 74, 78, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (70, 75, 79, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (71, 76, 79, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (72, 77, 79, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (73, 78, 79, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (74, 79, 79, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (75, 80, 79, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (76, 81, 82, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (77, 82, 83, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (78, 83, 84, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (79, 84, 83, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (80, 85, 83, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (81, 86, 82, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (82, 87, 84, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (83, 88, 85, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (84, 89, 82, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (85, 90, 84, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (86, 91, 86, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (87, 92, 86, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (88, 93, 86, '2024-05-27 17:10:41', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (89, 94, 86, '2024-05-27 17:10:41', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (90, 95, 86, '2024-05-27 17:10:41', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (91, 96, 87, '2024-05-27 17:10:41', '2024-05-27 17:14:28');

-- ----------------------------
-- Table structure for laboratory_time_options
-- ----------------------------
DROP TABLE IF EXISTS `laboratory_time_options`;
CREATE TABLE `laboratory_time_options`  (
  `lti_id` int(11) NOT NULL,
  `lti_start` time NULL DEFAULT NULL,
  `lti_end` time NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lti_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_time_options
-- ----------------------------
INSERT INTO `laboratory_time_options` VALUES (0, '07:00:00', '07:45:00', '2024-06-07 16:43:36', '2024-06-08 22:21:26');
INSERT INTO `laboratory_time_options` VALUES (1, '07:45:00', '08:30:00', '2024-06-07 16:44:44', '2024-06-08 22:21:22');
INSERT INTO `laboratory_time_options` VALUES (2, '08:30:00', '09:15:00', '2024-06-07 16:45:38', '2024-06-08 22:34:24');
INSERT INTO `laboratory_time_options` VALUES (3, '09:15:00', '10:00:00', '2024-06-07 16:46:19', '2024-06-08 22:34:27');
INSERT INTO `laboratory_time_options` VALUES (4, '10:00:00', '10:45:00', '2024-06-07 16:46:22', '2024-06-08 22:34:28');
INSERT INTO `laboratory_time_options` VALUES (5, '10:45:00', '11:30:00', '2024-06-07 16:46:35', '2024-06-08 22:34:30');
INSERT INTO `laboratory_time_options` VALUES (6, '11:30:00', '12:15:00', '2024-06-07 16:46:52', '2024-06-08 22:34:31');
INSERT INTO `laboratory_time_options` VALUES (7, '12:15:00', '13:00:00', '2024-06-07 16:47:20', '2024-06-08 22:34:32');
INSERT INTO `laboratory_time_options` VALUES (8, '13:00:00', '13:45:00', '2024-06-07 16:47:25', '2024-06-08 22:34:34');
INSERT INTO `laboratory_time_options` VALUES (9, '13:45:00', '14:30:00', '2024-06-07 16:48:33', '2024-06-08 22:34:35');
INSERT INTO `laboratory_time_options` VALUES (10, '14:30:00', '15:15:00', '2024-06-07 16:48:52', '2024-06-08 22:34:37');
INSERT INTO `laboratory_time_options` VALUES (11, '15:15:00', '16:00:00', '2024-06-07 16:50:36', '2024-06-08 22:34:39');
INSERT INTO `laboratory_time_options` VALUES (12, '16:00:00', '16:45:00', '2024-06-07 16:51:29', '2024-06-08 22:34:42');
INSERT INTO `laboratory_time_options` VALUES (13, '16:45:00', '17:30:00', '2024-06-07 16:51:47', '2024-06-08 22:34:46');
INSERT INTO `laboratory_time_options` VALUES (14, '17:30:00', '18:15:00', '2024-06-07 16:52:27', '2024-06-08 22:34:48');

-- ----------------------------
-- Table structure for laboratory_working_times
-- ----------------------------
DROP TABLE IF EXISTS `laboratory_working_times`;
CREATE TABLE `laboratory_working_times`  (
  `ltw_id` int(11) NOT NULL,
  `ltw_lab_id` int(11) NULL DEFAULT NULL,
  `ltw_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ltw_time_start` datetime NULL DEFAULT NULL,
  `ltw_time_end` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`ltw_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_working_times
-- ----------------------------
INSERT INTO `laboratory_working_times` VALUES (1, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id_menu` int(10) NULL DEFAULT NULL,
  `mn_level_user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mn_parent_id` int(11) NULL DEFAULT NULL,
  `mn_icon_code` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mn_title` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mn_slug` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'ADMIN_SYSTEM', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (2, 'ADMIN_SYSTEM', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (3, 'ADMIN_SYSTEM', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (4, 'ADMIN_SYSTEM', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (5, 'ADMIN_SYSTEM', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (6, 'ADMIN_SYSTEM', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (7, 'ADMIN_SYSTEM', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (8, 'ADMIN_SYSTEM', 7, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (9, 'ADMIN_SYSTEM', 7, 'ri-subtract-fill', 'SMTP Mail', 'pengaturan/email');
INSERT INTO `menus` VALUES (10, 'ADMIN_SYSTEM', 7, 'ri-subtract-fill', 'Data Semua User', 'pengaturan/user');
INSERT INTO `menus` VALUES (11, 'ADMIN_MASTER', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (12, 'ADMIN_MASTER', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (13, 'ADMIN_MASTER', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (14, 'ADMIN_MASTER', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (15, 'ADMIN_MASTER', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (16, 'ADMIN_MASTER', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (17, 'ADMIN_MASTER', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (18, 'ADMIN_MASTER', 17, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (19, 'ADMIN_MASTER', 17, 'ri-subtract-fill', 'Data Semua User', 'pengaturan/user');
INSERT INTO `menus` VALUES (20, 'LAB_HEAD', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (21, 'LAB_HEAD', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (22, 'LAB_HEAD', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (23, 'LAB_HEAD', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (24, 'LAB_HEAD', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (25, 'LAB_HEAD', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (26, 'LAB_HEAD', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (27, 'LAB_HEAD', 26, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (28, 'LAB_SUBHEAD', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (29, 'LAB_SUBHEAD', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (30, 'LAB_SUBHEAD', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (31, 'LAB_SUBHEAD', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (32, 'LAB_SUBHEAD', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (33, 'LAB_SUBHEAD', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (34, 'LAB_SUBHEAD', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (35, 'LAB_SUBHEAD', 34, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (36, 'LAB_TECHNICIAN', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (37, 'LAB_TECHNICIAN', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (38, 'LAB_TECHNICIAN', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (39, 'LAB_TECHNICIAN', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (40, 'LAB_TECHNICIAN', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (41, 'LAB_TECHNICIAN', 40, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (42, 'ADMIN_PRODI', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (43, 'ADMIN_PRODI', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (44, 'ADMIN_PRODI', 43, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (45, 'LECTURE', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (46, 'LECTURE', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (47, 'LECTURE', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (48, 'LECTURE', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (49, 'LECTURE', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (50, 'LECTURE', 49, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (51, 'STUDENT', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (52, 'STUDENT', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (53, 'STUDENT', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (54, 'STUDENT', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (55, 'STUDENT', 54, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (56, 'PUBLIC_MEMBER', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (57, 'PUBLIC_MEMBER', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (58, 'PUBLIC_MEMBER', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (59, 'PUBLIC_MEMBER', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (60, 'PUBLIC_MEMBER', 59, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (61, 'PUBLIC_NON_MEMBER', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (62, 'PUBLIC_NON_MEMBER', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (63, 'PUBLIC_NON_MEMBER', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (64, 'PUBLIC_NON_MEMBER', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (65, 'PUBLIC_NON_MEMBER', 64, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (5, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (6, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (8, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
INSERT INTO `personal_access_tokens` VALUES (8, 'App\\Models\\User', 1, 'auth_token', 'f963d02729a158f302a5472151f166638f5c075853f2417a316676fd991bda44', '[\"*\"]', NULL, '2024-01-18 09:35:31', '2024-01-18 09:35:31');

-- ----------------------------
-- Table structure for user_details
-- ----------------------------
DROP TABLE IF EXISTS `user_details`;
CREATE TABLE `user_details`  (
  `usd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usd_user` bigint(20) NULL DEFAULT NULL,
  `usd_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usd_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usd_prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usd_fakultas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `usd_universitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint(20) NULL DEFAULT NULL,
  `updated_by` bigint(20) NULL DEFAULT NULL,
  PRIMARY KEY (`usd_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 151 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_details
-- ----------------------------
INSERT INTO `user_details` VALUES (1, 5, NULL, 'ewr', 'SI', 'Teknik', 'UK', '2024-03-15 15:16:59', '2024-04-17 16:04:44', NULL, NULL);
INSERT INTO `user_details` VALUES (2, 6, '123', 'ewr', 'SI', 'Teknik', 'UK', '2024-03-15 15:42:42', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (3, 7, '1234', 'menteng jakarta timur', 'SI', 'TEknik', 'UNESA', '2024-03-19 12:42:44', '2024-04-04 08:50:30', NULL, NULL);
INSERT INTO `user_details` VALUES (14, 88, '08113118002', 'SIMOREJO SARI B-8/22-A Kota Surabaya Prov. Jawa Timur 60181 RT. 4 RW. 7', 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-28 08:32:03', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (15, 90, '089580311199', 'Jl. Banyu Urip No 187 RT. 6 RW. 2', 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-28 14:49:28', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (16, 88, '08113118002', 'SIMOREJO SARI B-8/22-A Kota Surabaya Prov. Jawa Timur 60181 RT. 4 RW. 7', 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-29 08:21:56', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (18, 91, '081232463696', 'Perum. Bukit Permata Sukodono Blok H/20 RW 08 RT03 RT. 3 RW. 8', 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 08:20:26', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (19, 88, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (20, 89, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (21, 90, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (22, 91, NULL, NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (23, 92, NULL, NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (24, 93, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (25, 94, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (26, 95, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (27, 96, NULL, NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (28, 97, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (29, 98, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (30, 99, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (31, 100, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (32, 101, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (33, 102, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (34, 103, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (35, 104, NULL, NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (36, 105, NULL, NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (37, 106, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (38, 107, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (39, 108, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (40, 109, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (41, 110, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (42, 111, NULL, NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (43, 112, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (44, 113, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (45, 114, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (46, 115, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (47, 116, NULL, NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (48, 117, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (49, 118, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (50, 119, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (51, 120, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (52, 121, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (53, 122, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (54, 123, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (55, 124, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (56, 125, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (57, 126, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (58, 127, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (59, 128, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (60, 129, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (61, 130, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (62, 131, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (63, 132, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (64, 133, NULL, NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (65, 134, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (66, 135, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (67, 136, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (68, 137, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (69, 138, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (70, 139, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (71, 140, NULL, NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (72, 141, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (73, 142, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (74, 143, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (75, 144, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (76, 145, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (77, 146, NULL, NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (78, 147, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (79, 148, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (80, 149, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (81, 150, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (82, 151, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (83, 152, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (84, 153, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (85, 154, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (86, 155, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (87, 156, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (88, 157, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (89, 158, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (90, 159, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (91, 160, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (92, 161, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (93, 162, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (94, 163, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (95, 164, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (96, 165, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (97, 166, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (98, 167, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (99, 168, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (100, 169, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (101, 170, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (102, 171, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (103, 172, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (104, 173, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (105, 174, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (106, 175, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (107, 176, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (108, 177, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (109, 178, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (110, 179, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (111, 180, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (112, 181, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (113, 182, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (114, 183, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (115, 184, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (116, 185, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (117, 186, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (118, 187, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (119, 188, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (120, 189, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (121, 190, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (122, 191, NULL, NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (123, 192, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (124, 193, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (125, 194, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (126, 195, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (127, 196, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (128, 197, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (129, 198, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (130, 199, NULL, NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (131, 200, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (132, 201, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (133, 202, NULL, NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (134, 203, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (135, 204, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (136, 205, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (137, 206, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (138, 207, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (139, 208, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (140, 209, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (141, 210, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (142, 211, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (143, 212, NULL, NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (144, 213, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (145, 214, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (146, 215, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (147, 216, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (148, 217, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 13:59:25', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (149, 218, '08113118002', 'SIMOREJO SARI B-8/22-A Kota Surabaya Prov. Jawa Timur 60181 RT. 4 RW. 7', 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-31 15:54:13', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (150, 219, '-', 'Keputih', '-', '-', 'PT TRUST', '2024-06-11 13:47:12', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) NOT NULL,
  `no_id` bigint(20) NOT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` enum('active','block') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `level` enum('UNSET','LECTURE','STUDENT','PUBLIC_MEMBER','PUBLIC_NON_MEMBER','LAB_HEAD','LAB_SUBHEAD','LAB_TECHNICIAN','ADMIN_PRODI','ADMIN_MASTER','ADMIN_SYSTEM') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNSET',
  `password` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_no_id_unique`(`no_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (0, 0, '', '0', 'block', 'UNSET', '0', '0', '0000-00-00 00:00:00', '0', '2024-05-29 08:24:59', '2024-05-29 08:25:29', 0);
INSERT INTO `users` VALUES (1, 111, 'System', 'agus123', 'active', 'ADMIN_SYSTEM', '$2y$10$HS8EWaWAgNiho1AyetSIGeWKqQE63FrInMbc859BsAQwGJ4oKwqpy', 'master@webmaster.com', '2022-12-01 15:03:18', NULL, '2022-12-01 15:04:29', '2024-05-29 08:11:16', NULL);
INSERT INTO `users` VALUES (2, 112, 'Admin', NULL, 'active', 'ADMIN_MASTER', '$2y$10$HS8EWaWAgNiho1AyetSIGeWKqQE63FrInMbc859BsAQwGJ4oKwqpy', 'admin@webmaster.com', NULL, NULL, '2022-12-23 15:33:58', '2024-05-29 08:11:18', NULL);
INSERT INTO `users` VALUES (3, 113, 'Kalab', NULL, 'active', 'LAB_HEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'arizluck@gmail.com', NULL, NULL, '2024-01-25 15:25:02', '2024-05-31 14:10:09', NULL);
INSERT INTO `users` VALUES (4, 114, 'Kasublab', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-01-25 15:25:02', '2024-05-29 08:16:25', NULL);
INSERT INTO `users` VALUES (5, 115, 'Teknisi', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-03-15 15:16:59', '2024-05-29 08:15:53', NULL);
INSERT INTO `users` VALUES (6, 116, 'Admin Prodi', NULL, 'active', 'ADMIN_PRODI', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-03-15 15:42:42', '2024-05-29 08:14:48', NULL);
INSERT INTO `users` VALUES (7, 117, 'Dosen', NULL, 'active', 'LECTURE', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-03-19 12:42:44', '2024-05-29 08:15:36', NULL);
INSERT INTO `users` VALUES (11, 196502171990021001, 'Prof. Dr. Joko, M.Pd., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:03', NULL);
INSERT INTO `users` VALUES (12, 196103251987011001, 'Prof. Dr. Bambang Suprianto, M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:03', NULL);
INSERT INTO `users` VALUES (13, 197107061999031001, 'Prof. Dr. IGP. Asto Buditjahjanto, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:03', NULL);
INSERT INTO `users` VALUES (14, 199007032019032023, 'L. Endah Cahya Ningrum, S.Pd., M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:03', NULL);
INSERT INTO `users` VALUES (15, 198605232014041001, 'Farid Baskoro, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:03', NULL);
INSERT INTO `users` VALUES (16, 196403311990031001, 'Endryansyah, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:03', NULL);
INSERT INTO `users` VALUES (17, 197706252006041003, 'M. Syariffuddien Zuhrie, S.Pd., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:03', NULL);
INSERT INTO `users` VALUES (18, 199012262019031016, 'Fendi Achmad, S.Pd., M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:03', NULL);
INSERT INTO `users` VALUES (19, 202103045, 'Roswina Dianawati, S.Pd., M.Ed.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (20, 196109131992031001, 'Prof. Dr.  Muhaji, ST., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (21, 196712281994031003, 'Prof. Dr. I Made Arsana, S.Pd., MT.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (22, 196208231986011001, 'Dr. A. Grummy Wailanduw, M.Pd., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (23, 198803202014041001, 'Akhmad Hafizh Ainur Rasyid, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (24, 196408091992021001, 'Dr. Dewanto, M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (25, 196504231992031001, 'Dr. Yunus, M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (26, 198712062019031013, 'Rachmad Syarifudin Hidayatullah, S.Pd., M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (27, 197109072005011002, 'Indra Herlambang  Siregar, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (28, 197803302008121002, 'Aris Ansori, S.Pd., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (29, 198904202019031017, 'Ali Hasbi Ramadani, S.Pd., M.Pd', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (30, 197803272008012016, 'Novi Sukma Drastiawati, S.T., M.Eng.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (31, 197012041999031003, 'Prof. Dr. Agus Wiyono, S.Pd., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (32, 196206291998021001, 'Drs. Djoni Irianto, M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (33, 198905102018032001, 'Danayanti Azmi Dewi Nusantara, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (34, 201405003, 'Muhammad Imaduddin, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'zacebox01@gmail.com', NULL, NULL, NULL, '2024-06-07 15:04:17', NULL);
INSERT INTO `users` VALUES (35, 197110072005012001, 'Krisna Dwi Handayani, S.T., M.MT., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (36, 196003201999032001, 'Ir. Nurhayati Aritonang, M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (37, 195707311987122001, 'Prof. Dr. Marniati, S.E., M.M.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (38, 197405142005012002, 'Prof. Dr. Mutimmatul Faidah, S.Ag., M.Ag.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (39, 196705071993021001, 'Drs. Ec. Mein Kharnolis, M.SM.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (40, 197111141997022001, 'Dr. Sn. Inty Nahari, S.Pd., M.Ds.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (41, 197807052005012001, 'Dr. Deny Arifiana, S.Pd., M.A.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (42, 198008022008122002, 'Octaverina Kecvara Pritasari, S.Pd., M.Farm.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (43, 198801262023211007, 'Apt. M.A.Hanny Ferry Fernanda, S.Farm., M.Farm.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (44, 198709252015042004, 'Dindy Sinta Megasari, S.Pd., M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (45, 196709281993032002, 'Dr. Lucia Tri Pangesti, M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (46, 196803221994032001, 'Nugrahani Astuti, S.Pd., M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (47, 199107022020121012, 'Andika Kuncoro Widagdo, M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (48, 196004041987011001, 'Prof. Dr. Ekohariadi, M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (49, 198702092015041003, 'Rahadian Bisma, S.Kom., M.Kom.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:05', NULL);
INSERT INTO `users` VALUES (50, 198411242015041003, 'I Made Suartana, S.Kom., M.Kom.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:05', NULL);
INSERT INTO `users` VALUES (51, 196701151992031000, 'Sugiono, ST', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:23', NULL);
INSERT INTO `users` VALUES (52, 202203047, 'Rokhis Rosyidi, S.Kom', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:23', NULL);
INSERT INTO `users` VALUES (53, 197104232002121001, 'Gitud Sudarto, ST', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:23', NULL);
INSERT INTO `users` VALUES (54, 1201311204, 'Hening Ary Widhowati, S.Sos', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:23', NULL);
INSERT INTO `users` VALUES (55, 1201707251, 'Hikmat Oka, S.T', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:23', NULL);
INSERT INTO `users` VALUES (56, 1200302001, 'Jamiin', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:23', NULL);
INSERT INTO `users` VALUES (57, 197505182001121002, 'Sumardi', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:23', NULL);
INSERT INTO `users` VALUES (58, 197401222005011002, 'Anton Hartanto', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:23', NULL);
INSERT INTO `users` VALUES (59, 196609062001121001, 'Suhadi', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:23', NULL);
INSERT INTO `users` VALUES (60, 197610292005011002, 'Okky Ardiansyah', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (61, 197608072000031002, 'Slamet Riyanto', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (62, 198003032008011015, 'Margo Nurcahyo', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (63, 198507032014041001, 'Hendra Saputra P', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (64, 197209141999031002, 'Hendra Saputra S', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (65, 196707081989021001, 'Djarwo', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (66, 197209141999031002, 'Ronny Tuhumena', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (67, 201507057, 'Kusetyono L.S', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (68, 1200405004, 'Eko Heru Santoso, A.Md', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (69, 196809131993031002, 'Langgeng, ST.', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (70, 196812091994031003, 'Tohir Widada, S.Pd, ST, MM', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (71, 2200804121, 'Novi Camelia', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (72, 2200803120, 'Ali Mustain, ST', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (73, 197311172001121002, 'Sunyata, S.E', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'ariston45@gmail.com', NULL, NULL, '2024-05-27 16:59:09', '2024-06-03 08:12:49', NULL);
INSERT INTO `users` VALUES (74, 2201401236, 'Agus Faudin, S.Pd', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (75, 202204060, 'Tuesday Tri Wardani, S.Pd', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (76, 197507021999031002, 'Rifky.S.T', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (77, 196705132000122001, 'Dra nusriningyati', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (78, 2201111147, 'Laylatul Al Bariyah, S.Pd.', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (79, 2201001132, 'Swandini Endar Damayanti, S.Pd.', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (80, 197211032001122001, 'Kusuma Ayu NI, S.H.', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (81, 202204061, 'Alful laili.,S.Pd', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (82, 199105262015042001, 'Minnar Titis Santoso, S.Pd', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (83, 201507052, 'Patni, S.Pd.', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (84, 202204062, 'Siti Yuliana, S.Pd.,M. Pd.', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (85, 1201506102, 'Sugianto, A.Md.', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (86, 0, 'Afrizal Ibnu Ervianto.ST', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (87, 197506082009101003, 'Zainul Abidin', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-31 14:01:24', NULL);
INSERT INTO `users` VALUES (88, 1116506, 'Dr. Ir. H. Soeparno, M.T.', NULL, NULL, 'LECTURE', '$2y$10$1FQ2LP.PmHSKCg72.yi.O.pmCewv8pnCzxoxcMsaQ2RsG8kuoNEzy', 'soeparno@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:24', NULL);
INSERT INTO `users` VALUES (89, 16039502, 'Ratna Palupi Nurfatimah, S.TP., M.T.P.', NULL, NULL, 'LECTURE', '$2y$10$MfgHnArizqNkB8YvRx7XZuW4ik4ly4PuMQcQezCgBlNHlQ6H3nQ/.', 'ratnanurfatimah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:43', NULL);
INSERT INTO `users` VALUES (90, 5077803, 'Dr. Deny Arifiana, S.Pd., M.A.', NULL, NULL, 'LECTURE', '$2y$10$p.sHxLoTSctue2LKaHlij.jgiQ7KfZseVkrOXEnScPGHN6voFYrMC', 'denyarifiana@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:43', NULL);
INSERT INTO `users` VALUES (91, 23048803, 'Dr.rer.nat. Sammy Alidrus, M.Sc.', NULL, NULL, 'LECTURE', '$2y$10$uSSqcSHkhV07Xb8fyzcla.ev5lmLN4y5k9CfJeTSKFz6K7GwTwVIS', 'sammyalidrus@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:43', NULL);
INSERT INTO `users` VALUES (92, 6077107, 'Prof. Dr. I Gusti Putu Asto Buditjahjanto, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$8qzNtzFibSirHE43Zd6WdO5JdbQtkB.ZviCclHI81Al22cgjicaGy', 'asto@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:43', NULL);
INSERT INTO `users` VALUES (93, 22036801, 'Nugrahani Astuti, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$eHDAfM32XoSvFE5jp6PYl.Qd9irCZlLMdKpoxKTNZsIkMVksB/N/K', 'nugrahaniastuti@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:43', NULL);
INSERT INTO `users` VALUES (94, 9086409, 'Dr. Dewanto, M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$UIAb8L/PkJIADwBRB.ps/Ohi4GQf0j3123gFkB7U86RrjRS6kWwre', 'dewanto@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:43', NULL);
INSERT INTO `users` VALUES (95, 20036004, 'Ir. Nurhayati Aritonang, M.T.', NULL, NULL, 'LECTURE', '$2y$10$hYao4uczWd2NsCk6N1xxfuWTqu.oNa99e5A9l1vbSdYqZII1fsYJS', 'nurhayatiaritonang@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:43', NULL);
INSERT INTO `users` VALUES (96, 25036102, 'Prof. Dr. Bambang Suprianto, M.T.', NULL, NULL, 'LECTURE', '$2y$10$ChnhnOQ8ViR91zyplt01Yemk.00G/i2bG6BfA.S0K93jnIrCAwUvK', 'bambangsuprianto@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:43', NULL);
INSERT INTO `users` VALUES (97, 9028702, 'Rahadian Bisma, S.Kom., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$DHkalUfzaL.dWqj99DviSOkQEDqk3eHhWDfLSnzVHj1F0dbEKaDvC', 'rahadianbisma@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (98, 20038801, 'Akhmad Hafizh Ainur Rasyid, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$AbqxUzxibORRduTAfNyBoutCYZU.TYzJc.r8zsNZhSM9pH8fz6t86', 'akhmadrasyid@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (99, 13046304, 'Dr. Ir. Bambang Sabariman, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$0CmYAD0GjlnOjlzhxHTGJea2sxxcP45AONa0Q9O1p8/312Djh/rES', 'bambangsabariman@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (100, 4117104, 'Muhammad Imaduddin, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$6nWpNTQqWgvZ.fMyEQRt0uLkQOX15WqPMBbZn6M.rXIBTOLhFRzlC', 'muhammadimaduddin@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (101, 7028102, 'Mochamad Arif Irfa\'i, S.Pd., M.T.', NULL, NULL, 'LECTURE', '$2y$10$z3d6bPvnKTWMgZg3Ohi3nOWAzNiEsdM811YfL.slkMSL/qILpwDfO', 'arifirfai@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (102, 715128303, 'Ir.  Wahyu Dwi Kurniawan, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$fIvA/FoOEbJFSYmj.uKSzO6nGcJpl2M7WqErQDoKrTXeQnJ34kxMa', 'wahyukurniawan@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (103, 21028109, 'Ardhini Warih Utami, S.Kom., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$HF4uJQeT7gmu7iz7vqTW5.2EhiwBE6WuZigxR5P85u6dA6GtPbfWK', 'ardhiniwarih@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (104, 4127004, 'Prof. Dr. Agus Wiyono, S.Pd., M.T.', NULL, NULL, 'LECTURE', '$2y$10$zrnaww4wjRjZzVzwHGOSoueb93hV62F7W29KajvNQODOdG5MDjhyC', 'aguswiyono@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (105, 19056503, 'Drs. Bambang Sujatmiko, M.T.', NULL, NULL, 'LECTURE', '$2y$10$u6EUMDxCjyybAeQU08msQ.cuhkWyYgZhvCZ7U0L4jUhoVGH5R.IiK', 'bambangsujatmiko@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (106, 24118405, 'I Made Suartana, S.Kom., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$OFkfEQI2CKCWCIUZX2GSF.OPjRwuWPe0ytoktIHRbVfN2KkBqDOtO', 'madesuartana@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (107, 17127706, 'Nia Kusstianti, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$Hjti2qvcADv8jz0yulE3eOpQoBrHDKir2nty.4DhOghBAUP0a53Ki', 'niakusstianti@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (108, 22097302, 'Dr. Lutfiyah Hidayati, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$ktZuz1uJuCu3bC8Ma2TrqecSLv5ab0Ii45i/V.gw5.bHVJAtKXKJS', 'lutfiyahhidayati@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (109, 6047303, 'Arie Wardhono, S.T., M.MT., M.T., Ph.D.', NULL, NULL, 'LECTURE', '$2y$10$NusEg9SUAVC2xJswfsyv7e8un93HXHgXzXcszI/Y2VWcnTi2a/LWu', 'ariewardhono@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (110, 24046006, 'Dr. Mochamad Cholik, M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$4NhnZZYWx9niNQcx4yMfV.ivaXEPTrV1WcLT6T5ieaSzymkkrWIKW', 'mochamadcholik@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (111, 21027602, 'Unit Three Kartini, S.T., M.T., Ph.D.', NULL, NULL, 'LECTURE', '$2y$10$ccCcl3FZvzt5LRCNpPq38uQS.iVrz4P6ftNCaEWgFmuIgNSehYkES', 'unitthree@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (112, 716018704, 'Dr. Ricky Eka Putra, S.Kom., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$hUqEi/u9ZtXo0u7EuPeiyOLES2Zi2InN.wTNp3Vr.4Fw21gW.0ByW', 'rickyeka@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (113, 10027105, 'Dr. Hj. Sri Handajani, S.Pd., M.Kes.', NULL, NULL, 'LECTURE', '$2y$10$Vk1XfT6MFQY3HsKzOrbhiuH1jrsGfPNj8.sBsvoQdKkiQUZV29R5u', 'srihandajani@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (114, 24118403, 'Biyan Yesi Wilujeng, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$UJvL/9J2/WM1b16r.AjsOevwe52arzegrzRtyjhA3FPw9rdOeJlR6', 'biyanyesi@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (115, 30098402, 'Tri Hartutuk Ningsih, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$hfuJfyXejmWl2VQw8bmNmOsEsmw9F.QwGEow1ajFwGRgunrG5BR26', 'triningsih@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (116, 25038013, 'I Gusti Lanang Putra Eka Prismana, S.Kom., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$eoEkys8EH9rGW.Seri5MGu1VTn4uSNaTW.FZ0P5nI8Volth7lcGHu', 'lanangprismana@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (117, 25016903, 'Anita Qoiriah, S.Kom., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$88b6sOEQBv47yWvS8RCmNuGKkJ61otP43MsR.YSBTVgKkdabpLyhW', 'anitaqoiriah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (118, 23058603, 'Farid Baskoro, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$JY2Cfe8t6x/M8UkR9I4hROqGpTaAUBC4GhOmSGaiciW0CKYv0.WL6', 'faridbaskoro@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (119, 3098901, 'Hanna Zakiyya, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$Tw.hxKqMCyD.aSVmuZxihO8YZ0MGaaMJONGuSxw88arced0MgMgZK', 'hannazakiyya@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (120, 23086203, 'Dr. A. Grummy Wailanduw, M.Pd., M.T.', NULL, NULL, 'LECTURE', '$2y$10$WyIhlwBUMaIofJl6mPMc7e9JpbEe63VFDocKtCAnmM1YDRl.k1xLS', 'grummywailanduw@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (121, 12108004, 'Dr. Lusia Rakhmawati, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$KK7l.6vX9L5lGGI81YomqOQ833vSjmyRvRlDBFH.pzoBBPYpdQN56', 'lusiarakhmawati@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (122, 7056703, 'Drs. Ec. Mein Kharnolis, M.SM.', NULL, NULL, 'LECTURE', '$2y$10$63rxOra.HZvaiHU.9eG0Nu8LRPhcep7Gv9rW12T7i/Xhl2SArfxHC', 'meinkharnolis@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (123, 20127904, 'Dwi Fatrianto Suyatno, S.Kom., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$W6.efuzHzzZF8E7D5uoK7OnvRWMcJEuKDwrpUiRBIsQI5pIJWS6rK', 'dwifatrianto@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (124, 1117905, 'Nur Aini Susanti, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$vi99Ev.DwSWUxQ8s0xGx3Onzh.VmdtwLwsHi9G43wY3UQEUvb9G9O', 'nursusanti@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (125, 18046005, 'Dr. Soeryanto, M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$CDv39QjHaD7mAG5IFxV4weAawf94f03Z7J9F8bOqoA0OlNNexEola', 'soeryanto@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (126, 712078801, 'Diastian Vinaya Wijanarko, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$qJywto/k8Ft9d8/0oDhJ1e7GXC7bb9hhRmnRRjyb7SQXC26ChUqD2', 'diastianwijanarko@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (127, 6027901, 'Sri Dwiyanti, S.Pd., M.PSDM.', NULL, NULL, 'LECTURE', '$2y$10$R6Fzl6WdyDj4AU0Y/XYX1OR1Nhrr4HBWFRb1cW0i.ufLZNcM7VxPC', 'sridwiyanti@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (128, 18116102, 'Dra. Dewi Lutfiati, M.Kes.', NULL, NULL, 'LECTURE', '$2y$10$1oSy8uJln3STLfEjdumnTOOAwekYUll37z93nmAqPh3I0KQm.43S2', 'dewilutfiati@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (129, 21057204, 'Dr.  Nur Kholis, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$ySRn.tSsQs5qY5Zj9f3PLOTkDuPbAJrjJ.B5Y3XoEMzjvs3HiLcse', 'nurkholis@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (130, 24118402, 'Novi Sukma Drastiawati, S.T., M.Eng.', NULL, NULL, 'LECTURE', '$2y$10$BzwirG4dcUN4ZFUxTZX95uEBvphU6.8Jrxjx6amhkAVCfBLHyNoMC', 'novidrastiawati@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (131, 13087905, 'Prof. Dr.  Erina Rahmadyanti, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$FEBcMe9AaDI3kM57UvpO0.HAewJsikc.cAqqWozs9sF/PA.NXLC7S', 'erinarahmadyanti@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (132, 14117105, 'Dr.Sn. Inty Nahari, S.Pd., M.Ds.', NULL, NULL, 'LECTURE', '$2y$10$2T1vSUU2Fpm8W.9wj88Qcuk0d/Wuk0kEQEeGDWWxxI0/lhgZTofOO', 'intynahari@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (133, 4127803, 'Dr. Nurhayati, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$.F32F1IC78oHxoPE9RRIFe27oQtDdoixC0rsGAsLHN5beGPh3Y.Ie', 'nurhayati@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:44', NULL);
INSERT INTO `users` VALUES (134, 19077503, 'Yogie Risdianto, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$firK6ZAIfwJLO9GaL6V9Huu73VniR2.cIcCKFvT6wJvLfumChFysG', 'yogierisdianto@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (135, 29078704, 'Mochamad Firmansyah Sofianto, S.T., M.Sc., M.T.', NULL, NULL, 'LECTURE', '$2y$10$pep7Xb4PQrMvn5Tn5b4Sy.7BCIeGmbC3lQLy/E99oXCLxPot0BTem', 'mochamadfirmansyah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (136, 2126207, 'Dra. Nur Andajani, M.T.', NULL, NULL, 'LECTURE', '$2y$10$BMX60BB.bT5DphzxYZ0DU.VvIvo9m8DhCdy1opvG5XNm5UAqxBAFG', 'nurandajani@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (137, 16078502, 'Yulia Fransisca, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$wl9jnB5W/8vPBr/1RBnS5uFa0tsnuNfGNRTygZb2o0s2cVjkW8eWy', 'yuliafransisca@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (138, 20087506, 'Dr. Subuh Isnur Haryudo, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$PMeEtvvqmtLv3aYwrFIT4.ptzLLF0tHhaw45X8elVGAovtnCgMoOq', 'subuhisnur@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (139, 17087505, 'Dr. Raden Roro Hapsari Peni Agustin Tjahyaningtijas, S.Si., M.T.', NULL, NULL, 'LECTURE', '$2y$10$/2UOmEqKfWpNn.laV5bVLul/oqVql0vI7zWuR2oXakbS3Lzy5q/r.', 'hapsaripeni@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (140, 27108403, 'Dr. Yeni Anistyasari, S.Pd., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$O0qqLprA61rWRyk27jFRVOqjZI3HOwmHN3q/NawyZRftvny5ZvNYi', 'yenian@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (141, 7026904, 'Ibrohim, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$k9V5ymkiororqsJ2c1ddO.3IuxHsmP3wJsUSnT1YY1HU.TkW4hZbK', 'ibrohim@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (142, 701128101, 'Imami Arum Tri Rahayu, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$/EdoKdt/L3l33k7O6flzteUlfO6uzjB0DhMtb8OlppxuNplErmFI.', 'imamirahayu@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (143, 13058110, 'Dr. Gde Agus Yudha Prawira Adistana, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$fNl.8XUnB.RqnfN5DjnBLeX1UX8UNbPiM14citUPz.pJzNMhEpzG.', 'gdeadistana@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (144, 30037800, 'Dr. Aris Ansori, S.Pd., M.T.', NULL, NULL, 'LECTURE', '$2y$10$XaOyKnYf6mfuO4sgSkPqJe1tKywrcSRReTWpsT5GDPNvipD9xiMhK', 'arisansori@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (145, 2088004, 'Octaverina Kecvara Pritasari, S.Pd., M.Farm.', NULL, NULL, 'LECTURE', '$2y$10$AA0KpVpx3330azxovF.le.MbsZkSqOyluVOC3fk.uzF/PfahqqKze', 'octaverinakecvara@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (146, 2097901, 'Dr. Lilik Anifah, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$gHglkNmzECnoS8sdWPn5HOATCjWkeQfFooTw80ckXl1fBinIGz/ca', 'lilikanifah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (147, 13096103, 'Prof. Dr. Muhaji, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$BdvBxPDJwpWO2pRtLpO0rOCWpaDbpzB9lWdzpTUErxrpOuyDae0x2', 'muhaji61@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (148, 25067709, 'Muhamad Syariffuddien Zuhrie, S.Pd., M.T.', NULL, NULL, 'LECTURE', '$2y$10$Bwr.71Gv7yniwF8vO6ryJemFxcly/VPkCMUBILD4VTNtzVJyFb4Va', 'zuhrie@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (149, 7097103, 'Indra Herlamba Siregar, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$6j1p9UZGlCFCPwzb28kILO6SHJqxSU8QJfQoLSxiNS77oLmKTZNZO', 'indrasiregar@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (150, 29066201, 'Drs. Djoni Irianto, M.T.', NULL, NULL, 'LECTURE', '$2y$10$oEkdG872/w.smjYj.xLJ3umAIAmIVLebxNIsYhLJzwn0udXr.PgG6', 'djoniirianto@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (151, 5036509, 'Dr. Djoko Suwito, M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$kLaOSUvmCjf3gW/D2PUKh.wze1pGV3vcyOfHJFmmZm2koIYaig96W', 'djokosuwito@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (152, 2047602, 'Ir. Priyo Heru Adiwibowo, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$1Yjp2Ar6c8ml8e5vQ7ke0uzO4ltpuCHnd7NvDBfDBpNETuEU8YpX2', 'priyoheruadiwibowo@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (153, 17126805, 'Dr. Rina Harimurti, S.Pd., M.T.', NULL, NULL, 'LECTURE', '$2y$10$R9kqMq/gRlDflxPZ7v3tmeqRPVcEPR3fXTTh2.QthuMe1CpZ0TkOu', 'rinaharimurti@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (154, 2067504, 'Dr. Yuni Yamasari, S.Kom., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$9Aouzsz7di2Ryt9mR0Ikye9Ve98fKv/P.PpfFHji5K1TRjK5NBp.y', 'yuniyamasari@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (155, 2117005, 'Iskandar, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$.UgNPuSszB/xmB88z0YLz.oNKDLgYRz1sXYuETlS5F0R29mNw3jsy', 'iskandar@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (156, 29068803, 'Pradini Puspitaningayu, S.T., M.T., Ph.D.', NULL, NULL, 'LECTURE', '$2y$10$/1VPIbukyV7.GdK3LFzqWuS7Q8c7bBlg3r6mY7/hEqdo6QKumR2vG', 'pradinip@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (157, 24068703, 'Bellina Yunitasari, S.Si., M.Si.', NULL, NULL, 'LECTURE', '$2y$10$ak7YK.GYE0QJW0uiLFG.9uOhfONQAMFXbWSE3EhlFvvLwI5QpVzky', 'bellinayunitasari@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (158, 12048006, 'Aries Dwi Indriyanti, S.Kom., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$qUqsl2ml96tSuA1JpCFPdefVETbNvGkEFmjE4enS/ekI8wRTsni8O', 'ariesdwi@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (159, 7086006, 'Dr. Ir. Asrul Bahar, M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$5xqYDt7AfrsClAdXJ2RiIesG27KDmqnR5BiusWww4ZiEbj1kB7e2y', 'asrulbahar@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (160, 19056502, 'Drs. Andang Widjaja, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$FSLBo8uREwqMKAgq48Z6dOFm.aRjUS..2l2U4tO2kIHNlkvNC1v6q', 'andangwidjaja@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (161, 1046411, 'Dr. Maspiyah, M.Kes.', NULL, NULL, 'LECTURE', '$2y$10$.RMoiayq2Xyg061U7d2.iuAH0TfbjlDOQuZr2tpLVKa1WRd6ej6zS', 'maspiyah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:45', NULL);
INSERT INTO `users` VALUES (162, 20046403, 'Dr. Edy Sulistiyo, M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$ZWrwT/55lcjFx6Sne9CiMeoBB7fgQuVGHgrb9j0mLmAysNxVnwQiC', 'edysulistiyo@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (163, 31075702, 'Prof. Dr. Marniati, S.E., M.M.', NULL, NULL, 'LECTURE', '$2y$10$f6QEic7CePEUw2nXVXlEsOraccOlOTnvCZqs8UAUDFwLCN.xuYNrG', 'marniati@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (164, 16127101, 'Ninik Wahju Hidajati, S.Si., M.Si.', NULL, NULL, 'LECTURE', '$2y$10$ZiNRlC3.fH.9xrRVQmEoPuKDH/E3/QkHYI6PChSplXFF5VO05WuVC', 'ninikwahju@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (165, 11037706, 'Dr. Mohammad Effendy, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$S6xQqkgNqH9FxH6r6VJK6ORLa.o5ZjYz8loQrGyc4wLXs/d.hd3Bm', 'mohammadeffendy@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (166, 3027708, 'Wiyli Yustanti, S.Si., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$qA.5AWquhUxN/OwGZl2/He4JSeJBzeKIewD2rtzNymJ.xL.iZTpmm', 'wiyliyustanti@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (167, 704038901, 'Rifqi Firmansyah, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$D8/f5FXNlS/jb0g7tHOScuADfPsGM6Fm/YpcavcHEcCLo.tDY4hJW', 'rifqifirmansyah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (168, 28096702, 'Dra. Lucia Tri Pangesthi, M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$FewqUiAW2xkLkZ4DhtG73.MBiZh4VycJk3gTSCir2bjZJEzxXcNGq', 'luciapangesthi@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (169, 6087903, 'Agus Prihanto, S.T., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$ZqEu1Zgzo532/AIVqAnF8OBozjDd.vlNKXh.nb.pplUF4DmwLEsue', 'agusprihanto@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (170, 7107105, 'Krisna Dwi Handayani, S.T., M.MT., M.T.', NULL, NULL, 'LECTURE', '$2y$10$p0cJSAfeHUaRdtpBPGYCa.63abQ19x7.Wv3OL/IQVkFwJuEiEYDP2', 'krisnahandayani@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (171, 22067003, 'Dr. Puput Wanarti Rusimamto, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$bk2KMWBauLiBif2iLKVRweHskkPKE87o0IHHLtP6sV/cqg/nQ8zv.', 'puputwanarti@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (172, 20096903, 'Agung Prijo Budijono, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$XRGFX7Zq.NGLfSXUGtcHqOyJsvQ18hWnfk8OYE1YJUixwWjZBcSB.', 'agungbudijono@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (173, 12038901, 'Mauren Gita Miranti, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$3jfkv.ABQEQ1Wsx4Kg4UGeHxYxyjT40RxuNUI0JyVEgjzhO6ipDZO', 'maurenmiranti@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (174, 18066802, 'Dr. Ir. Achmad Imam Agung, M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$SER7qohRQtCJUfBlohJf..N7QZBv5gqCW4zpqH2T3ELJU5021c.5m', 'achmadimam@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (175, 28126704, 'Prof. Dr. I Made Arsana, S.Pd., M.T.', NULL, NULL, 'LECTURE', '$2y$10$Yh8YqixrkjlSrbaqkS5pYe77mVG.4/s9iEjVVkiDx9SEjOM.ifjIO', 'madearsana@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (176, 4036708, 'Hendra Wahyu Cahyaka, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$kknOOuUF9Ht2g.U21DUUp.T57jQ3QGGJtUYD3V5kNm0de8eHmYTna', 'hendracahyaka@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (177, 25126605, 'Saiful Anwar, S.Pd., M.T.', NULL, NULL, 'LECTURE', '$2y$10$3CRWlyIXYMjKDJGlfFzdUuNcxvtqjFk63IVOpq0RkL3aAOkVpi36W', 'saifulanwar@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (178, 31036406, 'Endryansyah, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$35BI3Dcw0NvaQjl7qyqoLeoGnbZeTfiUL60GKcNzpKOTgg8jWu.k6', 'endryansyah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (179, 23046502, 'Dr. Yunus, M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$iJh5CQw2la11R/yJgQhZmOrZjRLX6dK/LiK.ZWHDPTVxK7s.4NYp2', 'yunus@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (180, 1117406, 'Aditya Prapanca, S.T., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$NFZrgxdc4ThZi1Y7TtiMW.dQhGtKHQOG4WQrzYU9wd4mkQJLAode.', 'adityaprapanca@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:46', NULL);
INSERT INTO `users` VALUES (181, 1047307, 'Ir.  Mas Suryanto H.S., S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$KMVgNTYzg1BlGMNlCsZwtu2tSToO6FA2pH.IOVUOiHxHsQBXUen.S', 'massuryantohs@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (182, 10058904, 'Danayanti Azmi Dewi Nusantara, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$CaPIuPH7GdYGedV/0jq5juA6v11tAH/PY6HSmEE6fRx4IgAMoZR4q', 'danayantinusantara@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (183, 20099101, 'Ma\'rifatun Nashikhah, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$Bq0n/6c4OOlR53E19j6OZOf6A7ZDL.4koq32KUO1Hn8RbnOB7eBnq', 'marifatunnashikhah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (184, 7028704, 'Peppy Mayasari, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$BYLOoOPcrx.a62xyHjG52ep7pC8h9.5hmQEHffp7EPtkXg7uAYw1y', 'peppymayasari@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (185, 701129003, 'Fendi Achmad, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$tmP9I5yeXMuewGYXfctx5.33knjv0lbK01hP8PrAnB3NoJrCai5f2', 'fendiachmad@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (186, 703079005, 'L. Endah Cahya Ningrum, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$bhny/HltO9r7eFIFoL1psuh7M4GGqgGFbdIUDOwnn2tkZGTu.TWiu', 'endahningrum@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (187, 7078705, 'Miftahur Rohman, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$UE0tGoCdv4wTgKyEzoyP8elXZQnrleAYRFZKF/671vXfGQO11B/Dy', 'miftahurrohman@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (188, 26078508, 'Heru Arizal,  S.Pd., M.M., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$Rq0QX2.TOIbjiK04kOXpoujCtbghVL65SJn48k84fSO797FlTxnkK', 'heruarizal@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (189, 729058902, 'Paramitha Nerisafitra, S.ST., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$YWcHlmEcFG9z4vTXgSIvB.YPhAVWU/YOgwsGVMdXFgdtloGG7jRbW', 'paramithanerisafitra@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (190, 9039301, 'Ghea Sekar Palupi, S.Kom., M.I.M.', NULL, NULL, 'LECTURE', '$2y$10$BZPMRcqUouXk8IbkY.cHuOLUyXKeaHTdXpQpgjnbB.z/LTJcmqxNO', 'gheapalupi@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (191, 5099302, 'Rindu Puspita Wibawa, S.Kom., M.Kom.', NULL, NULL, 'LECTURE', '$2y$10$KIIpDTtk7lxFUKcIHmRLUeULiMJkhEflZyWy6ltnTDSCiT90L7C5K', 'rinduwibawa@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (192, 27088504, 'Muamar Zainul Arif, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$qXroKUkfwijktw9deTjjXe1q8mLTe5EM10v23GexeIuN8VIL7qUMC', 'muamararif@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (193, 720048904, 'Ali Hasbi Ramadani, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$Zyyvp98NWZu2DLLQNLtwtuCcE7uDFEus864rdXgAJ90GgZCpzMZP2', 'aliramadani@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (194, 6128708, 'Rachmad Syarifudin Hidayatullah, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$4bJyS2ADz5BpcauvEO9yj.usxhvaRyq26u1NpwFf8mFlRSQyEOQfG', 'rachmadhidayatullah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (195, 4049013, 'Ika Nurjannah, S.Pd., M.T.', NULL, NULL, 'LECTURE', '$2y$10$Jd5CRmSdjo8g5lrenLQ1b.ZaBxu/9U2nACkCC57MzcnYeT4MvF/Ma', 'ikajannah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (196, 2068907, 'Wahyu Dwi Mulyono, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$Kk6ts1kIWsRepGxS0.Npj.pnGJgRzkDlJgkvk2LYspqJKrA8o4I46', 'wahyumulyono@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (197, 26128701, 'Heri Suryaman, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$H32ISKUoUo1w04yeXG2UcuaozwO2Z6xI1H38vidrgAow3IIklUtf6', 'herisuryaman@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:47', NULL);
INSERT INTO `users` VALUES (198, 28059106, 'Meity Wulandari, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$Q/G98GYF7ulQkt5gFKUFk.c49otgYXEWd8pevGZUymIjWtKza5KQi', 'ariston@windowslive.com', NULL, NULL, '2024-05-31 13:59:25', '2024-06-10 13:00:52', NULL);
INSERT INTO `users` VALUES (199, 730078601, 'Abdiyah Amudi, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$rTuST4HHNjyf8UTNHQ1RO.XdQhKup1GFrmhjNtq6o1LpTxVFBIk6O', 'abdiyahamudi@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (200, 9029108, 'Mita Yuniati, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$PfqrtL7TQ7ueTFzYK9ynl.wNdKJZXuDm9g9vLR5lO.DovYlpSshuK', 'mitayuniati@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (201, 2079104, 'Andika Kuncoro Widagdo, M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$8knX7y9pq.Js.uRbPTN1z.vDp0xfNKoptdAQSjAbwuIJosTaCD8dm', 'andikawidagdo@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (202, 26079205, 'Lynda Refnitasari, S.Si., M.URP', NULL, NULL, 'LECTURE', '$2y$10$cqBnwO9rM0Rczvi3qe/zVO57UloxDQz.lE.Hgv8xuAJ2vd599CAK2', 'lyndarefnitasari@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (203, 729119001, 'Handini Novita Sari, S.Pd., M.T.', NULL, NULL, 'LECTURE', '$2y$10$p22s6kfCQxWUIcBz23HuCuIXjHVbIXdb9nytGZBf1aye54RhKIwwa', 'handinisari@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (204, 714019401, 'Parama Diptya Widayaka, S.ST., M.T.', NULL, NULL, 'LECTURE', '$2y$10$jR/vniSPk8HuQ9DvzcMzH.NuZfq3dzLxgtvBLeEKzIKUBmaReMcFG', 'paramawidayaka@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (205, 30119301, 'Roswina Dianawati, S.Pd., M.Ed.', NULL, NULL, 'LECTURE', '$2y$10$qRTcbIXJEZd82hAL1Hd7jetckVeMJac8InnHW56RisGocJregsZNS', 'roswinadianawati@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (206, 26029701, 'Alwan Gangsar Brilian Putra, S.Tr.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$lfS89qUPttzgd3r0niEll.vMSZqLAM88tUIEX45k5aVAzWIcnv8tW', 'alwanputra@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (207, 9079802, 'Sayyidul Aulia Alamsyah, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$M4rO4oL/c7fjexRUIpGhfO./yhO5kWDHCFlm1iY9r73S8AAN/F1wi', 'sayyidulalamsyah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (208, 1019312, 'Bima Anggana Widhiarta Putra, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$SwxfQkmlyCPmr./xf4n0h.SXGYjHqgvFCmqRYZrM8PGnIJ6eCuIZS', 'bimaputra@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (209, 1079106, 'Ervin Yohannes, S.Kom., M.Kom., M.Sc., Ph.D.', NULL, NULL, 'LECTURE', '$2y$10$ZGuMHdahR3SzE8kL.rSePuXta24ZhL/Rv0Sqi1xD8ofj.aLP6fv46', 'ervinyohannes@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (210, 706038903, 'Ahmad Saepuddin, S.T., M.Sc.', NULL, NULL, 'LECTURE', '$2y$10$AKBhHIyI0Wknic8uYFed9elmlzlbFs8eAEHt.8Jph1/MYpYnj.Wy2', 'ahmadsaepuddin@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:48', NULL);
INSERT INTO `users` VALUES (211, 3819129301, 'Nurul Farikhatir Rizkiyah, M.Pd', NULL, NULL, 'LECTURE', '$2y$10$nXLaMgFVz9RBtQZzYoKVmeC85YQXuQZ7A7F32yEyw1H3dcZkSfP8.', 'nurulrizkiyah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:49', NULL);
INSERT INTO `users` VALUES (212, 705018402, 'Nurul Makhmudiyah, S.Si., M.T.', NULL, NULL, 'LECTURE', '$2y$10$5oZQPpVyn.g1expe..J7TOAgoJfNl3L6bWm4K6rU8/tEyM9JG1x8G', 'nurulmakhmudiyah@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:49', NULL);
INSERT INTO `users` VALUES (213, 608129105, 'Desy Ratna Arthaningtyas, S.T., M.T.', NULL, NULL, 'LECTURE', '$2y$10$n14byXxNltHRl15Hhu1/t.V.jsHbOOnUt4WHlDnC0EoGrAZ016eJC', 'desyarthaningtyas@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:49', NULL);
INSERT INTO `users` VALUES (214, 726018802, 'apt.  M.A. Hanny Ferry Fernanda, S.Farm., M.Farm.', NULL, NULL, 'LECTURE', '$2y$10$w84p9oxkvKTODGR73q1xu.eJOgliuXXv70mef3W54aockP3JGgiv6', 'apt.fernanda@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:49', NULL);
INSERT INTO `users` VALUES (215, 12029306, 'Febriani Lukitasari, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$nnaiv2AnJQJv9uSPRpjHxeW9L/8GrXA7EuVCRG8cwrXQNVXJH17xK', 'febrianilukitasari@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:49', NULL);
INSERT INTO `users` VALUES (216, 23129601, 'Annisa Nur\'aini, S.Pd., M.Pd.', NULL, NULL, 'LECTURE', '$2y$10$cz1ykbhm/1lL9NSTGdfdROjmupJVKIR4.8MXsTX369DJljuNOVhIu', 'annisanuraini@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:49', NULL);
INSERT INTO `users` VALUES (217, 5069801, 'Rendra Lebdoyono, S.T.P., M.Sc.', NULL, NULL, 'LECTURE', '$2y$10$JDPIqqs2rN5.2KO/5jQSfuyFJk4L75.RHb1wWE7vE0Q8xd.nY9gxi', 'rendralebdoyono@unesa.ac.id', NULL, NULL, '2024-05-31 13:59:25', '2024-05-31 14:00:49', NULL);
INSERT INTO `users` VALUES (218, 20050724036, 'ALIF AKBAR HIDAYATULLAH', NULL, 'active', 'STUDENT', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'trustopenmail@gmail.com', NULL, NULL, '2024-05-31 15:54:13', '2024-06-03 10:33:27', NULL);
INSERT INTO `users` VALUES (219, 1233, 'Joney', NULL, 'active', 'PUBLIC_MEMBER', '$2y$10$tfe35Zz/A9mcztmrZ2oonOJFGeGjRLIKRp9NdpW2wKX.8TEa2oSoG', 'zacebox02@gmail.com', NULL, NULL, '2024-06-11 13:35:47', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
