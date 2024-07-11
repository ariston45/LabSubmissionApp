/*
 Navicat Premium Data Transfer

 Source Server         : LocalDb
 Source Server Type    : MariaDB
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : app_rec_db

 Target Server Type    : MariaDB
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 11/07/2024 14:33:01
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
INSERT INTO `cost_reductions` VALUES (2, 'LECTURE', 10, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 85 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_facilities
-- ----------------------------
INSERT INTO `lab_facilities` VALUES (81, 1, 1, '2024-07-10 23:01:26', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (82, 2, 1, '2024-07-11 08:56:32', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (83, 3, 1, '2024-07-11 09:38:24', NULL, NULL, NULL);
INSERT INTO `lab_facilities` VALUES (84, 4, 1, '2024-07-11 10:23:17', NULL, NULL, NULL);

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
INSERT INTO `lab_sch_dates` VALUES (1, '1', 'Thursday', '2024-07-11', 'active', '2024-07-10 23:52:59', NULL);
INSERT INTO `lab_sch_dates` VALUES (2, '2', 'Monday', NULL, 'active', '2024-07-11 08:41:43', NULL);
INSERT INTO `lab_sch_dates` VALUES (3, '3', 'Tuesday', '2024-07-23', 'active', '2024-07-11 09:05:45', NULL);
INSERT INTO `lab_sch_dates` VALUES (4, '4', 'Thursday', '2024-08-01', 'active', '2024-07-11 09:41:20', NULL);
INSERT INTO `lab_sch_dates` VALUES (5, '5', 'Thursday', '2024-08-01', 'active', '2024-07-11 10:25:03', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 68 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sch_times
-- ----------------------------
INSERT INTO `lab_sch_times` VALUES (58, 1, 0, 'active', '2024-07-10 23:52:59', NULL);
INSERT INTO `lab_sch_times` VALUES (59, 1, 1, 'active', '2024-07-10 23:52:59', NULL);
INSERT INTO `lab_sch_times` VALUES (60, 1, 2, 'active', '2024-07-10 23:52:59', NULL);
INSERT INTO `lab_sch_times` VALUES (61, 2, 0, 'active', '2024-07-11 08:41:43', NULL);
INSERT INTO `lab_sch_times` VALUES (62, 2, 1, 'active', '2024-07-11 08:41:43', NULL);
INSERT INTO `lab_sch_times` VALUES (63, 2, 0, 'active', '2024-07-11 09:05:45', NULL);
INSERT INTO `lab_sch_times` VALUES (64, 2, 1, 'active', '2024-07-11 09:05:45', NULL);
INSERT INTO `lab_sch_times` VALUES (65, 3, 0, 'active', '2024-07-11 09:41:20', NULL);
INSERT INTO `lab_sch_times` VALUES (66, 3, 1, 'active', '2024-07-11 09:41:20', NULL);
INSERT INTO `lab_sch_times` VALUES (67, 4, 0, 'active', '2024-07-11 10:25:04', NULL);

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
INSERT INTO `lab_schedules` VALUES (1, 58, 1, 'non_reguler', 184, NULL, 'ALIF AKBAR HIDAYATULLAH', 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-10 23:52:59', NULL, '2024-07-10 23:52:59');
INSERT INTO `lab_schedules` VALUES (2, 58, NULL, 'reguler', NULL, '34', 'IXA', 'Mata Kuliah 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-11 08:41:43', 2, '2024-07-11 08:41:43');
INSERT INTO `lab_schedules` VALUES (3, 58, 2, 'non_reguler', 184, NULL, 'ALIF AKBAR HIDAYATULLAH', 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-11 09:05:45', NULL, '2024-07-11 09:05:45');
INSERT INTO `lab_schedules` VALUES (4, 58, 3, 'non_reguler', 169, NULL, 'Meity Wulandari, S.T., M.T.', 'Penelitian Kekuatan Beton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-11 09:41:20', NULL, '2024-07-11 09:41:20');
INSERT INTO `lab_schedules` VALUES (5, 58, 4, 'non_reguler', 185, NULL, 'Marti', 'Penelitian beton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-11 10:25:03', NULL, '2024-07-11 10:25:03');

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
INSERT INTO `lab_sub_dates` VALUES (1, 1, '2024-07-11', 58, '2024-07-10 23:01:26', NULL);
INSERT INTO `lab_sub_dates` VALUES (2, 2, '2024-07-23', 58, '2024-07-11 08:56:32', NULL);
INSERT INTO `lab_sub_dates` VALUES (3, 3, '2024-08-01', 58, '2024-07-11 09:38:24', NULL);
INSERT INTO `lab_sub_dates` VALUES (4, 4, '2024-08-01', 58, '2024-07-11 10:23:17', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 140 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_order_details
-- ----------------------------
INSERT INTO `lab_sub_order_details` VALUES (132, 1, 34, 'lab', 'Lab. Beton', 100000.00, '2024-07-10 23:01:26', NULL);
INSERT INTO `lab_sub_order_details` VALUES (133, 1, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-07-10 23:01:26', NULL);
INSERT INTO `lab_sub_order_details` VALUES (134, 2, 34, 'lab', 'Lab. Beton', 100000.00, '2024-07-11 08:56:32', NULL);
INSERT INTO `lab_sub_order_details` VALUES (135, 2, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-07-11 08:56:32', NULL);
INSERT INTO `lab_sub_order_details` VALUES (136, 3, 34, 'lab', 'Lab. Beton', 100000.00, '2024-07-11 09:38:24', NULL);
INSERT INTO `lab_sub_order_details` VALUES (137, 3, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-07-11 09:38:24', NULL);
INSERT INTO `lab_sub_order_details` VALUES (138, 4, 34, 'lab', 'Lab. Beton', 100000.00, '2024-07-11 10:23:17', NULL);
INSERT INTO `lab_sub_order_details` VALUES (139, 4, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-07-11 10:23:17', NULL);

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
  `los_cost_reduction` decimal(10, 2) NULL DEFAULT NULL,
  `los_cost_after` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`los_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_orders
-- ----------------------------
INSERT INTO `lab_sub_orders` VALUES (1, 1, NULL, '2024-07-10 23:01:26', 200000.00, 20000.00, 180000.00, '2024-07-10 23:01:26', NULL);
INSERT INTO `lab_sub_orders` VALUES (2, 2, NULL, '2024-07-11 08:56:32', 200000.00, 20000.00, 180000.00, '2024-07-11 08:56:32', NULL);
INSERT INTO `lab_sub_orders` VALUES (3, 3, NULL, '2024-07-11 09:38:24', 200000.00, 20000.00, 180000.00, '2024-07-11 09:38:24', NULL);
INSERT INTO `lab_sub_orders` VALUES (4, 4, NULL, '2024-07-11 10:23:17', 200000.00, 0.00, 200000.00, '2024-07-11 10:23:17', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_times
-- ----------------------------
INSERT INTO `lab_sub_times` VALUES (49, 1, 0, '2024-07-10 23:01:26', NULL);
INSERT INTO `lab_sub_times` VALUES (50, 1, 1, '2024-07-10 23:01:26', NULL);
INSERT INTO `lab_sub_times` VALUES (51, 1, 2, '2024-07-10 23:01:26', NULL);
INSERT INTO `lab_sub_times` VALUES (52, 2, 0, '2024-07-11 08:56:32', NULL);
INSERT INTO `lab_sub_times` VALUES (53, 2, 1, '2024-07-11 08:56:32', NULL);
INSERT INTO `lab_sub_times` VALUES (54, 3, 0, '2024-07-11 09:38:24', NULL);
INSERT INTO `lab_sub_times` VALUES (55, 3, 1, '2024-07-11 09:38:24', NULL);
INSERT INTO `lab_sub_times` VALUES (56, 4, 0, '2024-07-11 10:23:17', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 192 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_accs
-- ----------------------------
INSERT INTO `lab_submission_accs` VALUES (186, '1', 'LAB_HEAD', '3', 'Dr. Ir. H. Soeparno, M.T.', NULL, '2024-07-10 23:52:59', '2024-07-10 23:52:59', NULL);
INSERT INTO `lab_submission_accs` VALUES (187, '1', 'LECTURE', NULL, 'Meity Wulandari, S.T., M.T.', NULL, '2024-07-10 23:52:59', '2024-07-10 23:52:59', NULL);
INSERT INTO `lab_submission_accs` VALUES (188, '2', 'LAB_HEAD', '3', 'Dr. Ir. H. Soeparno, M.T.', NULL, '2024-07-11 09:05:45', '2024-07-11 09:05:45', NULL);
INSERT INTO `lab_submission_accs` VALUES (189, '2', 'LECTURE', NULL, 'Meity Wulandari, S.T., M.T.', NULL, '2024-07-11 09:05:45', '2024-07-11 09:05:45', NULL);
INSERT INTO `lab_submission_accs` VALUES (190, '3', 'LAB_HEAD', '3', 'Dr. Ir. H. Soeparno, M.T.', 'Disetujui', '2024-07-11 09:41:20', '2024-07-11 09:41:20', NULL);
INSERT INTO `lab_submission_accs` VALUES (191, '4', 'LAB_HEAD', '3', 'Dr. Ir. H. Soeparno, M.T.', NULL, '2024-07-11 10:25:03', '2024-07-11 10:25:03', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_advisers
-- ----------------------------
INSERT INTO `lab_submission_advisers` VALUES (39, 1, NULL, '199105282019032019', 'Pembimbing', 'Meity Wulandari, S.T., M.T.', '2024-07-10 23:01:26', NULL, 28059106);
INSERT INTO `lab_submission_advisers` VALUES (40, 2, NULL, '199105282019032019', 'Pembimbing', 'Meity Wulandari, S.T., M.T.', '2024-07-11 08:56:32', NULL, 28059106);

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_results
-- ----------------------------
INSERT INTO `lab_submission_results` VALUES (9, 2, 'false', '20050724036_alif_akbar_hidayatullah_11_07_2024_091619.pdf', NULL, NULL, '2024-07-11 09:16:19', NULL);
INSERT INTO `lab_submission_results` VALUES (10, 1, 'false', '20050724036_alif_akbar_hidayatullah_11_07_2024_091701.pdf', NULL, NULL, '2024-07-11 09:17:01', NULL);

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
INSERT INTO `lab_submissions` VALUES (1, 58, 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', 'pinjam_lab', 'tp_penelitian_skripsi', NULL, NULL, NULL, 184, '3', NULL, '34', '73', NULL, NULL, NULL, 'disetujui', NULL, NULL, '2024-07-11 09:42:51', '2024-07-11 09:42:51');
INSERT INTO `lab_submissions` VALUES (2, 58, 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', 'pinjam_lab', 'tp_penelitian_skripsi', NULL, NULL, NULL, 184, '3', NULL, '34', NULL, NULL, NULL, NULL, 'disetujui', NULL, NULL, '2024-07-11 09:05:45', '2024-07-11 09:05:45');
INSERT INTO `lab_submissions` VALUES (3, 58, 'Penelitian Kekuatan Beton', 'pinjam_lab', 'tp_penelitian', NULL, NULL, NULL, 169, '3', NULL, '34', NULL, '20240711_093823_zacebox01@gmail.com.pdf', NULL, NULL, 'disetujui', NULL, NULL, '2024-07-11 09:41:20', '2024-07-11 09:41:20');
INSERT INTO `lab_submissions` VALUES (4, 58, 'Penelitian beton', 'pinjam_lab', 'tp_penelitian', NULL, NULL, NULL, 185, '3', NULL, '34', NULL, '20240711_102317_ari2torage@gmail.com.pdf', NULL, NULL, 'disetujui', NULL, NULL, '2024-07-11 10:25:03', '2024-07-11 10:25:03');

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('trustopenmail@gmail.com', '64c50963-761c-4b43-b070-80e4de3dda93', NULL);
INSERT INTO `password_resets` VALUES ('trustopenmail@gmail.com', '5dfb4272-d8fb-44cf-9772-594072c27e3f', NULL);
INSERT INTO `password_resets` VALUES ('trustopenmail@gmail.com', '5293bef5-2702-4e80-a526-51e745a2bf37', NULL);
INSERT INTO `password_resets` VALUES ('trustopenmail@gmail.com', '1720442e-ba0c-4c66-b33a-22d959bf697a', NULL);
INSERT INTO `password_resets` VALUES ('trustopenmail@gmail.com', '22679626-587b-4359-8c7f-05de6fb91fc5', '2024-06-13 16:43:10');

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
) ENGINE = InnoDB AUTO_INCREMENT = 136 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_details
-- ----------------------------
INSERT INTO `user_details` VALUES (1, 31, '085799004533', NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (2, 3, '085799004533', NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (3, 46, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (4, 24, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (5, 36, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (6, 41, '085799004533', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (7, 49, '085799004533', NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (8, 23, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (9, 12, '085799004533', NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (10, 18, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (11, 14, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (12, 29, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (13, 34, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (14, 50, '085799004533', NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (15, 15, '085799004533', NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (16, 22, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (17, 39, '085799004533', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (18, 40, '085799004533', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (19, 28, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (20, 42, '085799004533', NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (21, 20, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (22, 27, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (23, 32, '085799004533', NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (24, 37, '085799004533', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (25, 45, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (26, 35, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (27, 21, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (28, 16, '085799004533', NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (29, 25, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (30, 33, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (31, 26, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (32, 47, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (33, 19, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (34, 43, '085799004533', NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (35, 88, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (36, 89, '085799004533', NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (37, 90, '085799004533', NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (38, 91, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (39, 92, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (40, 93, '085799004533', NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (41, 94, '085799004533', NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (42, 95, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (43, 96, '085799004533', NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (44, 97, '085799004533', NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (45, 98, '085799004533', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (46, 99, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (47, 100, '085799004533', NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (48, 101, '085799004533', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (49, 102, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (50, 103, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (51, 104, '085799004533', NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (52, 105, '085799004533', NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (53, 106, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (54, 107, '085799004533', NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (55, 108, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (56, 109, '085799004533', NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (57, 110, '085799004533', NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (58, 111, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (59, 112, '085799004533', NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (60, 113, '085799004533', NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (61, 114, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (62, 115, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (63, 116, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (64, 117, '085799004533', NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (65, 118, '085799004533', NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (66, 119, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (67, 120, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (68, 121, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (69, 122, '085799004533', NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (70, 123, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (71, 124, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (72, 125, '085799004533', NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (73, 126, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:21:31', NULL, NULL);
INSERT INTO `user_details` VALUES (74, 127, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (75, 128, '085799004533', NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (76, 129, '085799004533', NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (77, 130, '085799004533', NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (78, 131, '085799004533', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (79, 132, '085799004533', NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (80, 133, '085799004533', NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (81, 134, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (82, 135, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (83, 136, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (84, 137, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (85, 138, '085799004533', NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (86, 139, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (87, 140, '085799004533', NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (88, 141, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (89, 142, '085799004533', NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (90, 143, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (91, 144, '085799004533', NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (92, 145, '085799004533', NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (93, 146, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (94, 147, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (95, 148, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (96, 149, '085799004533', NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (97, 150, '085799004533', NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (98, 151, '085799004533', NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (99, 152, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (100, 153, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (101, 154, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (102, 155, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (103, 156, '085799004533', NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (104, 157, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (105, 158, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (106, 159, '085799004533', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (107, 160, '085799004533', NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (108, 161, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (109, 162, '085799004533', NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (110, 163, '085799004533', NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (111, 164, '085799004533', NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (112, 165, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (113, 166, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (114, 167, '085799004533', NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (115, 168, '085799004533', NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (116, 169, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-11 09:38:24', NULL, NULL);
INSERT INTO `user_details` VALUES (117, 170, '085799004533', NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (118, 171, '085799004533', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (119, 172, '085799004533', NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (120, 173, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (121, 174, '085799004533', NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (122, 175, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (123, 176, '085799004533', NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (124, 177, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (125, 178, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (126, 179, '085799004533', NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (127, 180, '085799004533', NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (128, 181, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (129, 182, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (130, 183, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (131, 184, '085799004533', 'SIMOREJO SARI B-8/22-A Kota Surabaya Prov. Jawa Timur 60181 RT. 4 RW. 7', 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 13:03:19', '2024-07-11 08:56:32', NULL, NULL);
INSERT INTO `user_details` VALUES (132, 185, '085799004533', 'Sukolilo', NULL, NULL, 'PT TRUST', '2024-06-13 16:19:11', '2024-07-11 10:23:17', NULL, NULL);
INSERT INTO `user_details` VALUES (133, 186, '085799004533', NULL, NULL, NULL, NULL, '2024-06-13 16:22:44', '2024-07-10 09:24:32', NULL, NULL);
INSERT INTO `user_details` VALUES (134, 185, '085799004533', 'Sukolilo', NULL, NULL, 'PT TRUST', '2024-07-09 10:45:40', '2024-07-11 10:23:17', NULL, NULL);
INSERT INTO `user_details` VALUES (135, 73, '085399004433', NULL, NULL, NULL, NULL, '2024-07-10 09:50:39', NULL, NULL, NULL);

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
INSERT INTO `users` VALUES (3, 113, 'Dr. Ir. H. Soeparno, M.T.', NULL, 'active', 'LAB_HEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'arizluck@gmail.com', NULL, NULL, '2024-01-25 15:25:02', '2024-06-12 12:44:40', NULL);
INSERT INTO `users` VALUES (4, 114, 'Kasublab', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-01-25 15:25:02', '2024-05-29 08:16:25', NULL);
INSERT INTO `users` VALUES (5, 115, 'Teknisi', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-03-15 15:16:59', '2024-05-29 08:15:53', NULL);
INSERT INTO `users` VALUES (6, 116, 'Admin Prodi', NULL, 'active', 'ADMIN_PRODI', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-03-15 15:42:42', '2024-07-11 10:12:53', NULL);
INSERT INTO `users` VALUES (7, 117, 'Dosen', NULL, 'active', 'LECTURE', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-03-19 12:42:44', '2024-05-29 08:15:36', NULL);
INSERT INTO `users` VALUES (11, 196502171990021001, 'Prof. Dr. Joko, M.Pd., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:03', NULL);
INSERT INTO `users` VALUES (12, 196103251987011001, 'Prof. Dr. Bambang Suprianto, M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'bambangsuprianto@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 09:56:36', NULL);
INSERT INTO `users` VALUES (13, 197107061999031001, 'Prof. Dr. IGP. Asto Buditjahjanto, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:03', NULL);
INSERT INTO `users` VALUES (14, 199007032019032023, 'L. Endah Cahya Ningrum, S.Pd., M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'endahningrum@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 09:58:02', NULL);
INSERT INTO `users` VALUES (15, 198605232014041001, 'Farid Baskoro, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'faridbaskoro@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:02:59', NULL);
INSERT INTO `users` VALUES (16, 196403311990031001, 'Endryansyah, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'endryansyah@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:38:20', NULL);
INSERT INTO `users` VALUES (17, 197706252006041003, 'M. Syariffuddien Zuhrie, S.Pd., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:03', NULL);
INSERT INTO `users` VALUES (18, 199012262019031016, 'Fendi Achmad, S.Pd., M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'fendiachmad@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 09:57:37', NULL);
INSERT INTO `users` VALUES (19, 202103045, 'Roswina Dianawati, S.Pd., M.Ed.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'roswinadianawati@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:42:37', NULL);
INSERT INTO `users` VALUES (20, 196109131992031001, 'Prof. Dr.  Muhaji, ST., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'muhaji61@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:18:42', NULL);
INSERT INTO `users` VALUES (21, 196712281994031003, 'Prof. Dr. I Made Arsana, S.Pd., MT.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'madearsana@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:36:58', NULL);
INSERT INTO `users` VALUES (22, 196208231986011001, 'Dr. A. Grummy Wailanduw, M.Pd., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'grummywailanduw@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:03:51', NULL);
INSERT INTO `users` VALUES (23, 198803202014041001, 'Akhmad Hafizh Ainur Rasyid, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'akhmadrasyid@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 09:55:58', NULL);
INSERT INTO `users` VALUES (24, 196408091992021001, 'Dr. Dewanto, M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'dewanto@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 09:53:50', NULL);
INSERT INTO `users` VALUES (25, 196504231992031001, 'Dr. Yunus, M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'yunus@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:38:44', NULL);
INSERT INTO `users` VALUES (26, 198712062019031013, 'Rachmad Syarifudin Hidayatullah, S.Pd., M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'rachmadhidayatullah@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:40:53', NULL);
INSERT INTO `users` VALUES (27, 197109072005011002, 'Indra Herlambang  Siregar, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'indrasiregar@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:19:15', NULL);
INSERT INTO `users` VALUES (28, 197803302008121002, 'Aris Ansori, S.Pd., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'arisansori@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:17:44', NULL);
INSERT INTO `users` VALUES (29, 198904202019031017, 'Ali Hasbi Ramadani, S.Pd., M.Pd', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'aliramadani@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 09:58:19', NULL);
INSERT INTO `users` VALUES (30, 197803272008012016, 'Novi Sukma Drastiawati, S.T., M.Eng.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (31, 197012041999031003, 'Prof. Dr. Agus Wiyono, S.Pd., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'aguswiyono@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 09:52:04', NULL);
INSERT INTO `users` VALUES (32, 196206291998021001, 'Drs. Djoni Irianto, M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'djoniirianto@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:19:40', NULL);
INSERT INTO `users` VALUES (33, 198905102018032001, 'Danayanti Azmi Dewi Nusantara, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'danayantinusantara@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:39:14', NULL);
INSERT INTO `users` VALUES (34, 201405003, 'Muhammad Imaduddin, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'splashtrick@gmail.com', NULL, NULL, NULL, '2024-06-12 12:46:57', NULL);
INSERT INTO `users` VALUES (35, 197110072005012001, 'Krisna Dwi Handayani, S.T., M.MT., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'krisnahandayani@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:35:48', NULL);
INSERT INTO `users` VALUES (36, 196003201999032001, 'Ir. Nurhayati Aritonang, M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'nurhayatiaritonang@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 09:54:04', NULL);
INSERT INTO `users` VALUES (37, 195707311987122001, 'Prof. Dr. Marniati, S.E., M.M.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'marniati@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:21:37', NULL);
INSERT INTO `users` VALUES (38, 197405142005012002, 'Prof. Dr. Mutimmatul Faidah, S.Ag., M.Ag.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (39, 196705071993021001, 'Drs. Ec. Mein Kharnolis, M.SM.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'meinkharnolis@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:04:18', NULL);
INSERT INTO `users` VALUES (40, 197111141997022001, 'Dr. Sn. Inty Nahari, S.Pd., M.Ds.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'intynahari@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:10:06', NULL);
INSERT INTO `users` VALUES (41, 197807052005012001, 'Dr. Deny Arifiana, S.Pd., M.A.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'denyarifiana@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 09:55:21', NULL);
INSERT INTO `users` VALUES (42, 198008022008122002, 'Octaverina Kecvara Pritasari, S.Pd., M.Farm.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'octaverinakecvara@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:17:59', NULL);
INSERT INTO `users` VALUES (43, 198801262023211007, 'Apt. M.A.Hanny Ferry Fernanda, S.Farm., M.Farm.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'apt.fernanda@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:44:23', NULL);
INSERT INTO `users` VALUES (44, 198709252015042004, 'Dindy Sinta Megasari, S.Pd., M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (45, 196709281993032002, 'Dr. Lucia Tri Pangesti, M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'luciapangesthi@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:34:47', NULL);
INSERT INTO `users` VALUES (46, 196803221994032001, 'Nugrahani Astuti, S.Pd., M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'nugrahaniastuti@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 09:53:34', NULL);
INSERT INTO `users` VALUES (47, 199107022020121012, 'Andika Kuncoro Widagdo, M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'andikawidagdo@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:42:09', NULL);
INSERT INTO `users` VALUES (48, 196004041987011001, 'Prof. Dr. Ekohariadi, M.Pd.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, NULL, '2024-05-28 09:06:04', NULL);
INSERT INTO `users` VALUES (49, 198702092015041003, 'Rahadian Bisma, S.Kom., M.Kom.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'rahadianbisma@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 09:55:36', NULL);
INSERT INTO `users` VALUES (50, 198411242015041003, 'I Made Suartana, S.Kom., M.Kom.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'madesuartana@unesa.ac.id', NULL, NULL, NULL, '2024-06-12 10:00:27', NULL);
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
INSERT INTO `users` VALUES (73, 197311172001121002, 'Sunyata, S.E', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'ariston45@gmail.com', NULL, NULL, '2024-05-27 16:59:09', '2024-07-10 09:50:39', NULL);
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
INSERT INTO `users` VALUES (88, 16039502, 'Ratna Palupi Nurfatimah, S.TP., M.T.P.', NULL, 'active', 'LECTURE', '$2y$10$g8llLfI.RHIHKfgaUghWxeh5xsHDh/LBnNuP7fGhMN.LwR5bBxDB.', 'ratnanurfatimah@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (89, 23048803, 'Dr.rer.nat. Sammy Alidrus, M.Sc.', NULL, 'active', 'LECTURE', '$2y$10$r0bkDzIBttdkdhDWHt5yt.RAtOmNtZGBK02jGw2.nd3sJAtjFTQKC', 'sammyalidrus@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (90, 6077107, 'Prof. Dr. I Gusti Putu Asto Buditjahjanto, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$H2pr.0L4RIR39vljGuWqL.VIVnUqzsm.7syddglwWQu1MTjn7Xmd.', 'asto@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (91, 7028102, 'Mochamad Arif Irfa\'i, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$o/V1KnUWDoMvhK6suxB2Qu9DRwxApu6rL3X9RrDpyo/pvLUiQpIdq', 'arifirfai@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (92, 13046304, 'Dr. Ir. Bambang Sabariman, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$UGOULxvejWJ3CQvyJOwTKuwSRmvoFXnHxdSPg8ZWO91tRLR.otK6S', 'bambangsabariman@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (93, 17127706, 'Nia Kusstianti, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$WD..UqxwYs7r7witScvzYO7F9wfw.FQsZZ1LAIH4p5.wZsy6wr4dm', 'niakusstianti@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (94, 1117406, 'Aditya Prapanca, S.T., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$8avp0fOrmPuIw/XP8clyBuPy4toCCmr2NPPuwkyOD.6fFTEBQqspi', 'adityaprapanca@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (95, 715128303, 'Ir.  Wahyu Dwi Kurniawan, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$YThCB4lCinZOs3ZvuWovieJynjYY1Dyrbh0l.eYYdQaZN.l9lCJWC', 'wahyukurniawan@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (96, 21028109, 'Ardhini Warih Utami, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$iAa8P5IWTwLdAjtMA0wdfuNnyZcg4oUr.e4S32h0w8X.kEkuWiNHe', 'ardhiniwarih@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (97, 19056503, 'Drs. Bambang Sujatmiko, M.T.', NULL, 'active', 'LECTURE', '$2y$10$xSC6mhNJrNMmaA4O4x12GO9uouw3AyjizDaRIbNs5Rin76iVO5X56', 'bambangsujatmiko@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (98, 7028704, 'Peppy Mayasari, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$o9fDPEOj1qflu.P6wlZNLOo.YauxjjZPisqsAe4vQ1T3gXRO27N7a', 'peppymayasari@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (99, 729119001, 'Handini Novita Sari, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$4kz3S893V7NXkP1c9gu1luVQ6vdqzeFgeyjM8s0RwY.BipETsgOm2', 'handinisari@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (100, 714019401, 'Parama Diptya Widayaka, S.ST., M.T.', NULL, 'active', 'LECTURE', '$2y$10$4KCKWBcQxNY1SOBF1b/IDeiNp/yjuJV/DUTznGWXAhkz0iRotRUkC', 'paramawidayaka@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (101, 22097302, 'Dr. Lutfiyah Hidayati, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$UQn6UJcv.h4UkuWMakiv3uMZvdIPz3mnhLEu4XS1QHNteLWH.5T36', 'lutfiyahhidayati@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (102, 6047303, 'Arie Wardhono, S.T., M.MT., M.T., Ph.D.', NULL, 'active', 'LECTURE', '$2y$10$G9quEIjQXtJaPhuAaNWAmeWsY88d2DLeZ4NetUVq9p5ixqAHrh2Qy', 'ariewardhono@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (103, 24046006, 'Dr. Mochamad Cholik, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$P9QZiZhrcT2Fx6ziXet2XuPNEDQXhxJohJdEiTr21IagWlyUmLiRa', 'mochamadcholik@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (104, 21027602, 'Unit Three Kartini, S.T., M.T., Ph.D.', NULL, 'active', 'LECTURE', '$2y$10$eop2a711GKDfsNEzZwDo.OvLoyjqtgnz.FzGldp5msh0pytR2kw2q', 'unitthree@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (105, 716018704, 'Dr. Ricky Eka Putra, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$ZIBSf8/jUvCoP3TNjXPmc.Ie4sdqI0J/UzecXttfuZzSjZ5imhjsO', 'rickyeka@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (106, 10027105, 'Dr. Hj. Sri Handajani, S.Pd., M.Kes.', NULL, 'active', 'LECTURE', '$2y$10$h7UgrQqsStu4U3807iPI7.YeX.Et.kVYis9csY1G1AL/2fg5JRhFK', 'srihandajani@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (107, 24118403, 'Biyan Yesi Wilujeng, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$6vYpc/pq8i/luTdK/nu6XeisGaGTYc7/mgK3YacH.91Wwk2m1LFD6', 'biyanyesi@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (108, 30098402, 'Tri Hartutuk Ningsih, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$l8jH3yDJvS3NBlnBf7QWwuRIkej1cl7ki9sLVUKngVSDd8K.hwZ/q', 'triningsih@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (109, 25038013, 'I Gusti Lanang Putra Eka Prismana, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$BhiEqLmsIyFKsnTePSSM1OCoq6rDlHlJSEybEa0U1lCU7gDlcuW3G', 'lanangprismana@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (110, 25016903, 'Anita Qoiriah, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$UP5ETEnnvi9qxpj8.16Rv.bom075zRDlBB97gmZkDzFnAgfBFodWG', 'anitaqoiriah@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (111, 3098901, 'Hanna Zakiyya, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$iEZtWgz1QKwN68uZdfUmIecl/f.I3SX8sVY9YWlUJyQf7a3AndPEC', 'hannazakiyya@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (112, 12108004, 'Dr. Lusia Rakhmawati, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$8Zv0ujAl15Qz6AFxHVQoiun3XdrD7Z7p0zWmeuDOR69f00cPYWeni', 'lusiarakhmawati@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (113, 20127904, 'Dwi Fatrianto Suyatno, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$HsSVCEIbnkPQ4VneCgBwE.1RtzpSYXaXMLMdNwZFNFgyn5hlYdpOW', 'dwifatrianto@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (114, 1117905, 'Nur Aini Susanti, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$2Fb/DRbBtwztCoAYsDCoj./UX.bwq5TMYcgP4TqYb5YTDJoTnJURe', 'nursusanti@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (115, 18046005, 'Dr. Soeryanto, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$vKdtL8Q5gZFFMbIyyaowz.tr1agQFJtZvlhYeqjJAhTfeqGMLcq/.', 'soeryanto@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (116, 712078801, 'Diastian Vinaya Wijanarko, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$6HgENndcQ8./aEWIuF72tull3fzYRVotzFd3SU39iP322BByTrH/q', 'diastianwijanarko@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:53', NULL);
INSERT INTO `users` VALUES (117, 6027901, 'Sri Dwiyanti, S.Pd., M.PSDM.', NULL, 'active', 'LECTURE', '$2y$10$iOUnZdGp4Dav37tPSlZLGuYGcx2HXtT8C5TApLMAi3tQgiPX07qlC', 'sridwiyanti@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (118, 18116102, 'Dra. Dewi Lutfiati, M.Kes.', NULL, 'active', 'LECTURE', '$2y$10$klpNm2oN6/J.3Q/evfXYv.2Ud78Au5/.VB5MbiRr7tPggr5qhxl4q', 'dewilutfiati@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (119, 21057204, 'Dr.  Nur Kholis, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$u6NpKguwpHWwv5rVIEU9iO2XqD1ItP8gp/ReqD8Qb4cQDESJJ3K0a', 'nurkholis@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (120, 24118402, 'Novi Sukma Drastiawati, S.T., M.Eng.', NULL, 'active', 'LECTURE', '$2y$10$l44SFuHRd0TWWh6DgjAGhO40XZwQbN/pgh/arCg4a3pm/BRQNB50S', 'novidrastiawati@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (121, 13087905, 'Prof. Dr.  Erina Rahmadyanti, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$lxHNfrR.jDXd0PsIDQtYy.uAoTqioTghtdrhzP8LJIvZ//fbN/uZm', 'erinarahmadyanti@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (122, 4127803, 'Dr. Nurhayati, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$YGLQD6IMlP3wSsLjoH/NvO4bhBA9qwPictmBKGbZttZntG.O52.3C', 'nurhayati@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (123, 19077503, 'Yogie Risdianto, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$V9MSRxL/Mb2TJPGFfjw9iOVsWy2Q9UpRk3UAmkMPJD1Yp7L04L3fW', 'yogierisdianto@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (124, 29078704, 'Mochamad Firmansyah Sofianto, S.T., M.Sc., M.T.', NULL, 'active', 'LECTURE', '$2y$10$qtAbAXvu1tRhWSibuooH4uqJ4FdbtCwB3HCm292lNS1iHT4NvINR6', 'mochamadfirmansyah@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (125, 2126207, 'Dra. Nur Andajani, M.T.', NULL, 'active', 'LECTURE', '$2y$10$ct6xkQRfkScv2HGMDa9d8.9SWULeBIHW8b3KdetQEUBqQwmCThnoC', 'nurandajani@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (126, 16078502, 'Yulia Fransisca, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$0PYRjNGD.1I2Lc9RnzO2muob4hMKyIXGMFaH39bFs2v3XzkJQ68Oa', 'yuliafransisca@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (127, 20087506, 'Dr. Subuh Isnur Haryudo, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$2gEIDnCjIdwFUxk1m48Yv.3J7cibY87mI4ZL8AOv3DMp/Jo48a/3y', 'subuhisnur@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (128, 17087505, 'Dr. Raden Roro Hapsari Peni Agustin Tjahyaningtijas, S.Si., M.T.', NULL, 'active', 'LECTURE', '$2y$10$iKpspAwJOSSkMeGeCsGFx.JuuTk.QBEq4uypftW4euX5hyuWNk7y2', 'hapsaripeni@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (129, 27108403, 'Dr. Yeni Anistyasari, S.Pd., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$3xJFrf2F/qPUsTFfxVmPz.p9L5KrtDGbaZ2El3j.1o0Q.Q/GgzDlC', 'yenian@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (130, 7026904, 'Ibrohim, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$rIdr..umqComEnzpCfGMFuSjEOubtep0qqgY6GYNwUxWcGnHFmZp.', 'ibrohim@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (131, 701128101, 'Imami Arum Tri Rahayu, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$D58vekaM3jnlkvk8H2ppluVeOIjFnD4pqhbFCIN/zCNpNDtPOWXrG', 'imamirahayu@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (132, 13058110, 'Dr. Gde Agus Yudha Prawira Adistana, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$HvCvYLWgAFw5nNQpSNcpOOl83nZqqZGHHQjJGTamvKebhBP/0K8oi', 'gdeadistana@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (133, 2097901, 'Dr. Lilik Anifah, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$iPzLApEXW2sDRFxxFI6G0ukFGx3pyMMggTF2csTW7i9Jvbfy0NqQC', 'lilikanifah@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (134, 25067709, 'Muhamad Syariffuddien Zuhrie, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$ecntzOXuB1H.RVbeVOzOduj9wnq8p.XHFg/aNJnoZX5l9PkIKdvUO', 'zuhrie@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (135, 5036509, 'Dr. Djoko Suwito, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$BrzuUoZFkg4u5D3qzLZcPuEkXQgdb7ZbmghasQ.9J7IdiuS3d./K6', 'djokosuwito@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (136, 2047602, 'Ir. Priyo Heru Adiwibowo, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$LfrUrDIA.JIzfbZEZYm7XOb8ABxbpKlm22br3tuf47tHUUkTNIQAK', 'priyoheruadiwibowo@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (137, 17126805, 'Dr. Rina Harimurti, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$P6ahCz1g/KV0frOSMySHzeFp8NaLPCKZ1Tlq6ezSGy2I5XdUIAXD2', 'rinaharimurti@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (138, 2067504, 'Dr. Yuni Yamasari, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$qFlXfStWxChh7zA.LyLu6.XuAGhtVHDe.fgcrmJC8cS4Kx1tPcx0W', 'yuniyamasari@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (139, 2117005, 'Iskandar, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$WGFNfwDkHGHcBRpYE3PVguKLfUqvJ6DzJKWoPSkBI3pY7eKXu8MPW', 'iskandar@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (140, 29068803, 'Pradini Puspitaningayu, S.T., M.T., Ph.D.', NULL, 'active', 'LECTURE', '$2y$10$DrSMTv.LvUpUBFxp.Fsl.ufzAsj1i.X1tRKSqN0o2ON.7nM7n8tB.', 'pradinip@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (141, 24068703, 'Bellina Yunitasari, S.Si., M.Si.', NULL, 'active', 'LECTURE', '$2y$10$wvaNXy8lV4r7oWnzxNnWTOfFXn.arLtDV1hGAVh5iOtvRlYMwiCBS', 'bellinayunitasari@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (142, 12048006, 'Aries Dwi Indriyanti, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$bcJtF9MtbjmWsePyQzdvR.A.iZu41.y/dlDxPs5jqDDOlwIzd5Ona', 'ariesdwi@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (143, 7086006, 'Dr. Ir. Asrul Bahar, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$/GanwQjMBEDbMuGECNGj2.HoCefRkHwImvGyo5U7bCHpYiLM.MC2O', 'asrulbahar@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (144, 19056502, 'Drs. Andang Widjaja, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$QUqFjm2AwaXZBbP3mybM0.FJJqAkh6pPXMZBF5SZLzRGASHskLJdq', 'andangwidjaja@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (145, 1046411, 'Dr. Maspiyah, M.Kes.', NULL, 'active', 'LECTURE', '$2y$10$HZ49/Cg9JsCMO7JHP57ZDeiFibTtOF7BvOMQj0wkFZs45egYavqvy', 'maspiyah@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:54', NULL);
INSERT INTO `users` VALUES (146, 20046403, 'Dr. Edy Sulistiyo, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$XIZsZoa5BaVY.Ky3ShaZsuF9Lp7xmR5hDbfkdDg6mfyPli/xgkxXu', 'edysulistiyo@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (147, 16127101, 'Ninik Wahju Hidajati, S.Si., M.Si.', NULL, 'active', 'LECTURE', '$2y$10$IdsTXwbX7z056/i1/GxXIew2VhzuAxGedmUf5R2YpvGgk76LDM/Om', 'ninikwahju@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (148, 11037706, 'Dr. Mohammad Effendy, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$ZCNs0hNuRAdZ4kUc9pyL7uOc9YIkbeE0wfY7Q3vFSViioeX087dIa', 'mohammadeffendy@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (149, 3027708, 'Dr.  Wiyli Yustanti, S.Si., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$/l6cdRSq53.FWxlLcZN6zO9podCxd3y4uitrNTkMPoxYKbfCKNs7m', 'wiyliyustanti@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (150, 704038901, 'Rifqi Firmansyah, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$9AcwyRRihxV2l03hRxYoM.yXju8SbB5cVlTF2ZeUpBRfBYoSkGn2i', 'rifqifirmansyah@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (151, 6087903, 'Agus Prihanto, S.T., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$gaz3cNK/Wxxcj4ab3CsIYOak1G9o/vSWc0YesmLjId4oUITQVVDum', 'agusprihanto@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (152, 22067003, 'Dr. Puput Wanarti Rusimamto, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$/RZO26.2ppgGgdt5F4UkteT4apqnYd59Fkxfw5J42PnBMdkCwkvQC', 'puputwanarti@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (153, 20096903, 'Agung Prijo Budijono, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$UaJwsVA.S7Ais7vcnSoCVeodiAhYGz78/fsYTn28pAlQyFqA//2D.', 'agungbudijono@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (154, 12038901, 'Mauren Gita Miranti, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$/e1LIQVk98T3OvPkDDPxC.Y6Gaj2BjoQlxMwVCyChZpD.OKfxQdIC', 'maurenmiranti@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (155, 18066802, 'Dr. Ir. Achmad Imam Agung, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$c4VRbkjhHVFAMsV3c6BXFer/fAOcQIPojWMP55dm3CR2I0Pa1xbn6', 'achmadimam@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (156, 4036708, 'Hendra Wahyu Cahyaka, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$VlXWzbSuQlPP8F5FsXAIS.byiD3SV6MkkXCLprDQAUwFM31PqWdu.', 'hendracahyaka@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (157, 25126605, 'Saiful Anwar, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$00En/ObJurzijtdPQ71nn.d6MGgMbcDDmnyOS7VRKLL8JG2TrTCE2', 'saifulanwar@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (158, 1047307, 'Ir.  Mas Suryanto H.S., S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$FjinUHMXxLv/t60Br1OmqOQViWnNy1yeqMtUyMA5ZsZv3pMXdqBEe', 'massuryantohs@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (159, 20099101, 'Ma\'rifatun Nashikhah, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$RVAapJ084Q3Aai0CR0zA.eX8D6g6g5PEg96iCuW7T5SSAS7cWBx/a', 'marifatunnashikhah@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (160, 7078705, 'Miftahur Rohman, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$F81zRi.M0jr0sa4Ls8.n4eUpY.s5Fm9Nws75kUobnVLwuxchRnBvS', 'miftahurrohman@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (161, 26078508, 'Heru Arizal,  S.Pd., M.M., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$OGlrxS4wvbQM6Z9JiLkae.CuzG2JG3p/YuWg6JUQGWhceqHNcQExi', 'heruarizal@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (162, 729058902, 'Paramitha Nerisafitra, S.ST., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$tk3WuL4qR.ajDgzAxf0EkOOefauLWxdW2/1UBUn5PK09Mpg2eoH6.', 'paramithanerisafitra@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (163, 9039301, 'Ghea Sekar Palupi, S.Kom., M.I.M.', NULL, 'active', 'LECTURE', '$2y$10$26wcU5.TD.xevQT6zWXXMukjooDxg0MEPtP7FKZbidoejV80KV8w6', 'gheapalupi@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (164, 5099302, 'Rindu Puspita Wibawa, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$DqWYyIQeqwY19X7Vi1yFreGI9MID84sB5gNtUg1kO6u5Au5BLVFma', 'rinduwibawa@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (165, 27088504, 'Muamar Zainul Arif, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$jmm.l90Vx7zlogutEUqpTuKiIMhIK2byi1/s6.OQzh01SWfqdd5GC', 'muamararif@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (166, 4049013, 'Ika Nurjannah, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$ofSsl3.ocVUUs2Z3PUrqmuSQcQtWUY7/1PZz.pL1AekhPSknR480S', 'ikajannah@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (167, 2068907, 'Wahyu Dwi Mulyono, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$WlRhwC00MabV9/iWs4NCM.Qdo6EI4WNk7BILwbZ8vSfjOEFSQFXOC', 'wahyumulyono@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (168, 26128701, 'Heri Suryaman, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$dZIKwYtN.EhXKwtJpbRG9uRgkmAqEE.ASoLvt4A5Y9cy42Ld1mf1a', 'herisuryaman@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (169, 28059106, 'Meity Wulandari, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$bq1br8RMfROQUsfxecNeqOn1W1Lq7NTI.BK.tvV10v0OQhDycRPfq', 'zacebox01@gmail.com', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (170, 730078601, 'Abdiyah Amudi, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$LcgxQndwEsmT9QReRD6vh.6RXt0YTLHzgSKhC.HXBJ4ZHEokF1diK', 'abdiyahamudi@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (171, 9029108, 'Mita Yuniati, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$/yFr5Alo1JU.su0N/pMp7ekyhgY0R5deGSrMkfEkuOVTQv.aGAkHS', 'mitayuniati@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (172, 26079205, 'Lynda Refnitasari, S.Si., M.URP', NULL, 'active', 'LECTURE', '$2y$10$BCnOQRvJoXrNYs5i/Qx6AucIbSTNlms/MaF8dtH8XENwNu7IiZUEG', 'lyndarefnitasari@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (173, 26029701, 'Alwan Gangsar Brilian Putra, S.Tr.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$lB31fjVqBt97XYlFKVvgmOuqEIf1.V7mSxt2Uz1dc18Z3CAVbG4M2', 'alwanputra@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (174, 9079802, 'Sayyidul Aulia Alamsyah, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$kQrEa9N6ktxfzf923MGrgulc/qAIqEjENsvnTZzMHrqVQYOv5U5lm', 'sayyidulalamsyah@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:55', NULL);
INSERT INTO `users` VALUES (175, 1019312, 'Bima Anggana Widhiarta Putra, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$DI0Zh17Kq3uRJfLhTgjPlebelCL6BhtHYAddJtL.p5yu95TEtR4mu', 'bimaputra@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:56', NULL);
INSERT INTO `users` VALUES (176, 1079106, 'Ervin Yohannes, S.Kom., M.Kom., M.Sc., Ph.D.', NULL, 'active', 'LECTURE', '$2y$10$UBwpuLBSM8WNfIfDxX1VMuEzXFO7YzwU71AtMKFa3fSbyaeSFcia6', 'ervinyohannes@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:56', NULL);
INSERT INTO `users` VALUES (177, 706038903, 'Ahmad Saepuddin, S.T., M.Sc.', NULL, 'active', 'LECTURE', '$2y$10$WZlYP0Muy.KJiwFFqFtGD.LFCZD/W07EBp.nazUn0tfvhL2Lh9QRS', 'ahmadsaepuddin@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:56', NULL);
INSERT INTO `users` VALUES (178, 3819129301, 'Nurul Farikhatir Rizkiyah, M.Pd', NULL, 'active', 'LECTURE', '$2y$10$O1mQlDCTvO1p18Gq2yCWA.11Ubnhp7pMhRoVxFCWeEKzt1ZrkwC4O', 'nurulrizkiyah@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:56', NULL);
INSERT INTO `users` VALUES (179, 705018402, 'Nurul Makhmudiyah, S.Si., M.T.', NULL, 'active', 'LECTURE', '$2y$10$nHeTohE5TAcP9kGgw0MIoe64tyNJ/PcF/4OhJwdYibbXfJJwPqPKK', 'nurulmakhmudiyah@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:56', NULL);
INSERT INTO `users` VALUES (180, 608129105, 'Desy Ratna Arthaningtyas, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$34YUj3T0/NsUc.oXsZygOuNnk0Pb6HcdHViSijIYvGgA3OqyVGPlK', 'desyarthaningtyas@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:56', NULL);
INSERT INTO `users` VALUES (181, 12029306, 'Febriani Lukitasari, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$sFw.CwtBTHqqNho/Pm11H.w./eWi/W2/yUvOKHva4j3mRazW6p/s.', 'febrianilukitasari@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:56', NULL);
INSERT INTO `users` VALUES (182, 23129601, 'Annisa Nur\'aini, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$Tf.fPhlopCdJz1Fj1CBAzuym1kryDn9Tq4KUYejWOIk1Jym.c0SJq', 'annisanuraini@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:56', NULL);
INSERT INTO `users` VALUES (183, 5069801, 'Rendra Lebdoyono, S.T.P., M.Sc.', NULL, 'active', 'LECTURE', '$2y$10$Wg3twEU9YEArtaPvE.Opb.20B/0srT8OAgBIBtUZaRCQVDMtL5nHS', 'rendralebdoyono@unesa.ac.id', NULL, NULL, '2024-06-12 11:26:40', '2024-06-12 13:03:56', NULL);
INSERT INTO `users` VALUES (184, 20050724036, 'ALIF AKBAR HIDAYATULLAH', NULL, 'active', 'STUDENT', '$2y$10$ie32cWlMrrumNlEqGoFnpOWkmLxmZOvQBY2qHNlaG7cZeE/W8O4na', 'trustopenmail@gmail.com', NULL, NULL, '2024-06-12 13:03:19', '2024-06-13 16:43:51', NULL);
INSERT INTO `users` VALUES (185, 19234, 'Marti', NULL, 'active', 'PUBLIC_NON_MEMBER', '$2y$10$Oy.k6FtSSVdDijzhItIAbu.1c9S/.t.q0W3DrHcn8mcm2dpwzrE9O', 'ari2torage@gmail.com', NULL, NULL, '2024-07-09 10:45:40', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
