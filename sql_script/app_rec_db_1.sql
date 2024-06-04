/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MariaDB
 Source Server Version : 100425 (10.4.25-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : app_rec_db

 Target Server Type    : MariaDB
 Target Server Version : 100425 (10.4.25-MariaDB)
 File Encoding         : 65001

 Date: 03/06/2024 07:52:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cost_reductions
-- ----------------------------
DROP TABLE IF EXISTS `cost_reductions`;
CREATE TABLE `cost_reductions`  (
  `reduction_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reduction_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `reduction_val` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`reduction_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cost_reductions
-- ----------------------------
INSERT INTO `cost_reductions` VALUES (1, 'STUDENT', 25, NULL, NULL);
INSERT INTO `cost_reductions` VALUES (2, '', 0, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_facilities
-- ----------------------------
INSERT INTO `lab_facilities` VALUES (34, 1, 1, '2024-06-02 20:58:36', NULL, NULL, NULL);

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
-- Table structure for lab_schedule_times
-- ----------------------------
DROP TABLE IF EXISTS `lab_schedule_times`;
CREATE TABLE `lab_schedule_times`  (
  `lbs_id` int(11) NOT NULL,
  `lbs_lab` int(11) NULL DEFAULT NULL,
  `lbs_day` enum('sunday','monday','tuesday','wednesday','thursday','friday','saturday') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_date_start` date NULL DEFAULT NULL,
  `lbs_time_start` time NULL DEFAULT NULL,
  `lbs_date_end` date NULL DEFAULT NULL,
  `lbs_time_end` time NULL DEFAULT NULL,
  `lbs_dates_period` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_sch_dates_excluded` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_type` enum('reguler','non_reguler') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_submission` bigint(20) NULL DEFAULT NULL,
  `lbs_tenant_init` bigint(20) NULL DEFAULT NULL,
  `lbs_tenant_name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_res_person` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_matkul` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`lbs_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_schedule_times
-- ----------------------------

-- ----------------------------
-- Table structure for lab_schedules
-- ----------------------------
DROP TABLE IF EXISTS `lab_schedules`;
CREATE TABLE `lab_schedules`  (
  `lbs_id` int(11) NOT NULL,
  `lbs_lab` int(11) NULL DEFAULT NULL,
  `lbs_day` enum('sunday','monday','tuesday','wednesday','thursday','friday','saturday') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_date_start` date NULL DEFAULT NULL,
  `lbs_time_start` time NULL DEFAULT NULL,
  `lbs_date_end` date NULL DEFAULT NULL,
  `lbs_time_end` time NULL DEFAULT NULL,
  `lbs_dates_period` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_sch_dates_excluded` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_type` enum('reguler','non_reguler') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_submission` bigint(20) NULL DEFAULT NULL,
  `lbs_tenant_init` bigint(20) NULL DEFAULT NULL,
  `lbs_tenant_name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_res_person` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lbs_matkul` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`lbs_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_schedules
-- ----------------------------
INSERT INTO `lab_schedules` VALUES (1, 58, NULL, '2024-06-21', '07:00:00', '2024-06-22', '18:00:00', '2024-06-21$2024-06-22', NULL, 'non_reguler', 1, 218, 'ALIF AKBAR HIDAYATULLAH', NULL, 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', '2024-06-02 21:00:12', NULL, '2024-06-02 21:00:12');

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
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_order_details
-- ----------------------------
INSERT INTO `lab_sub_order_details` VALUES (60, 1, 34, 'lab', 'Lab. Beton', 100000.00, '2024-06-02 20:58:36', NULL);
INSERT INTO `lab_sub_order_details` VALUES (61, 1, 1, 'tool', 'Elle ADR 3000', 100000.00, '2024-06-02 20:58:36', NULL);
INSERT INTO `lab_sub_order_details` VALUES (62, 1, 0, 'reduction', 'Potongan biaya 25 %', 50000.00, '2024-06-02 20:58:36', NULL);

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
INSERT INTO `lab_sub_orders` VALUES (1, 1, NULL, '2024-06-02 20:58:36', 150000.00, '2024-06-02 20:58:36', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 140 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_accs
-- ----------------------------
INSERT INTO `lab_submission_accs` VALUES (138, '1', 'LAB_HEAD', '3', 'Kalab', 'Pengajuan anda disetujui', '2024-06-02 21:00:12', '2024-06-02 21:00:12', NULL);
INSERT INTO `lab_submission_accs` VALUES (139, '1', 'LECTURE', NULL, 'Meity Wulandari, S.T., M.T.', NULL, '2024-06-02 21:00:12', '2024-06-02 21:00:12', NULL);

-- ----------------------------
-- Table structure for lab_submission_advisers
-- ----------------------------
DROP TABLE IF EXISTS `lab_submission_advisers`;
CREATE TABLE `lab_submission_advisers`  (
  `las_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `las_lbs_id` int(11) NULL DEFAULT NULL,
  `las_user_no_id` int(11) NULL DEFAULT NULL,
  `las_nip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `las_byname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `las_fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`las_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_advisers
-- ----------------------------
INSERT INTO `lab_submission_advisers` VALUES (24, 1, 28059106, '199105282019032019', 'Pembimbing', 'Meity Wulandari, S.T., M.T.', '2024-06-02 20:58:36', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_results
-- ----------------------------
INSERT INTO `lab_submission_results` VALUES (4, 1, 'true', '20050724036_alif_akbar_hidayatullah_02_06_2024_213923.pdf', 34, 'Laporan sudah divalidasi', '2024-06-02 21:39:23', '2024-06-02 21:40:06');

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
INSERT INTO `lab_submissions` VALUES (1, 58, 'PERENCANAAN ULANG STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', 'pinjam_lab', 'tp_penelitian_skripsi', '2024-06-21 07:00:00', '2024-06-22 18:00:00', '2024-06-21$2024-06-22', 218, '3', NULL, '34', '73', '20240602_205835_trustopenmail@gmail.com.pdf', NULL, NULL, 'selesai', NULL, NULL, '2024-06-02 21:40:06', '2024-06-02 21:40:06');

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
INSERT INTO `laboratory_labtest_facilities` VALUES (5, 1, '6');
INSERT INTO `laboratory_labtest_facilities` VALUES (8, 5, '1');

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
INSERT INTO `laboratory_labtests` VALUES (1, 58, 'Sarana untuk menguji listrik', 1000.00, 'Sarana untuk menguji listrik', 'Sarana untuk menguji listrik', '', '2024-05-06 15:09:13');
INSERT INTO `laboratory_labtests` VALUES (2, 59, 'Test uji struktur tanah', 50000.00, 'Sarana untuk menguji listrik', 'Sarana untuk menguji listrik', NULL, NULL);
INSERT INTO `laboratory_labtests` VALUES (3, 1, 'test', 12132.00, 'test', 'test', NULL, NULL);
INSERT INTO `laboratory_labtests` VALUES (4, 1, 'test', 123.00, 'test', 'test', NULL, NULL);
INSERT INTO `laboratory_labtests` VALUES (5, 1, 'Test ketahanan', 123.00, '<p>123</p>', '<p>123</p>', NULL, '2024-05-13 15:29:17');

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
INSERT INTO `menus` VALUES (19, 'ADMIN_MASTER', 17, 'ri-subtract-fill', 'SMTP Mail', 'pengaturan/email');
INSERT INTO `menus` VALUES (20, 'ADMIN_MASTER', 17, 'ri-subtract-fill', 'Data Semua User', 'pengaturan/user');
INSERT INTO `menus` VALUES (21, 'LAB_HEAD', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (22, 'LAB_HEAD', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (23, 'LAB_HEAD', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (24, 'LAB_HEAD', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (25, 'LAB_HEAD', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (26, 'LAB_HEAD', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (27, 'LAB_HEAD', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (28, 'LAB_HEAD', 27, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (29, 'LAB_SUBHEAD', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (30, 'LAB_SUBHEAD', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (31, 'LAB_SUBHEAD', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (32, 'LAB_SUBHEAD', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (33, 'LAB_SUBHEAD', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (34, 'LAB_SUBHEAD', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (35, 'LAB_SUBHEAD', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (36, 'LAB_SUBHEAD', 35, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (29, 'LAB_TECHNICIAN', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (30, 'LAB_TECHNICIAN', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (32, 'LAB_TECHNICIAN', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (35, 'LAB_TECHNICIAN', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (36, 'LAB_TECHNICIAN', 35, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (37, 'ADMIN_PRODI', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (39, 'ADMIN_PRODI', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (41, 'ADMIN_PRODI', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (42, 'ADMIN_PRODI', 41, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (43, 'LECTURE', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (44, 'LECTURE', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (45, 'LECTURE', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (46, 'LECTURE', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (47, 'LECTURE', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (48, 'LECTURE', 47, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (49, 'STUDENT', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (50, 'STUDENT', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (51, 'STUDENT', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (52, 'STUDENT', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (53, 'STUDENT', 52, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (54, 'PUBLIC_MEMBER', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (55, 'PUBLIC_MEMBER', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (56, 'PUBLIC_MEMBER', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (57, 'PUBLIC_MEMBER', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (58, 'PUBLIC_MEMBER', 57, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (59, 'PUBLIC_NON_MEMBER', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (60, 'PUBLIC_NON_MEMBER', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (61, 'PUBLIC_NON_MEMBER', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (62, 'PUBLIC_NON_MEMBER', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (63, 'PUBLIC_NON_MEMBER', 62, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');

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
) ENGINE = InnoDB AUTO_INCREMENT = 147 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_details
-- ----------------------------
INSERT INTO `user_details` VALUES (1, 5, NULL, 'ewr', 'SI', 'Teknik', 'UK', '2024-03-15 15:16:59', '2024-04-17 16:04:44', NULL, NULL);
INSERT INTO `user_details` VALUES (2, 6, '123', 'ewr', 'SI', 'Teknik', 'UK', '2024-03-15 15:42:42', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (3, 7, '1234', 'menteng jakarta timur', 'SI', 'TEknik', 'UNESA', '2024-03-19 12:42:44', '2024-04-04 08:50:30', NULL, NULL);
INSERT INTO `user_details` VALUES (14, 88, '08113118002', 'SIMOREJO SARI B-8/22-A Kota Surabaya Prov. Jawa Timur 60181 RT. 4 RW. 7', 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-28 08:32:03', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (15, 90, '089580311199', 'Jl. Banyu Urip No 187 RT. 6 RW. 2', 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-05-28 14:49:28', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (16, 88, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (17, 89, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (18, 90, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (19, 91, NULL, NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (20, 92, NULL, NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (21, 93, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (22, 94, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (23, 95, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (24, 96, NULL, NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (25, 97, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (26, 98, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (27, 99, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (28, 100, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (29, 101, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (30, 102, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (31, 103, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (32, 104, NULL, NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (33, 105, NULL, NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (34, 106, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (35, 107, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (36, 108, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (37, 109, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (38, 110, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (39, 111, NULL, NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (40, 112, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (41, 113, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (42, 114, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (43, 115, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (44, 116, NULL, NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (45, 117, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (46, 118, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (47, 119, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (48, 120, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (49, 121, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (50, 122, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (51, 123, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (52, 124, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (53, 125, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (54, 126, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (55, 127, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (56, 128, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (57, 129, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (58, 130, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (59, 131, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (60, 132, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (61, 133, NULL, NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (62, 134, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (63, 135, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (64, 136, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (65, 137, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (66, 138, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (67, 139, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (68, 140, NULL, NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (69, 141, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (70, 142, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (71, 143, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (72, 144, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (73, 145, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (74, 146, NULL, NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (75, 147, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (76, 148, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (77, 149, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (78, 150, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (79, 151, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (80, 152, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (81, 153, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (82, 154, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (83, 155, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (84, 156, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (85, 157, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (86, 158, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (87, 159, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (88, 160, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (89, 161, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (90, 162, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (91, 163, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (92, 164, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (93, 165, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (94, 166, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (95, 167, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (96, 168, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (97, 169, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (98, 170, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (99, 171, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (100, 172, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (101, 173, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (102, 174, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (103, 175, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (104, 176, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (105, 177, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (106, 178, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (107, 179, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (108, 180, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (109, 181, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (110, 182, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (111, 183, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (112, 184, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (113, 185, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (114, 186, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (115, 187, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (116, 188, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (117, 189, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (118, 190, NULL, NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (119, 191, NULL, NULL, 'S1 Pendidikan Teknologi Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (120, 192, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (121, 193, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (122, 194, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (123, 195, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (124, 196, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (125, 197, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (126, 198, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (127, 199, NULL, NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (128, 200, NULL, NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (129, 201, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (130, 202, NULL, NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (131, 203, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (132, 204, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (133, 205, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (134, 206, NULL, NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (135, 207, NULL, NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (136, 208, NULL, NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (137, 209, NULL, NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (138, 210, NULL, NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (139, 211, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (140, 212, NULL, NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (141, 213, NULL, NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (142, 214, NULL, NULL, 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (143, 215, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (144, 216, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (145, 217, NULL, NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:28:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (146, 218, '08113118002', 'SIMOREJO SARI B-8/22-A Kota Surabaya Prov. Jawa Timur 60181 RT. 4 RW. 7', 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-01 14:33:08', NULL, NULL, NULL);

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
INSERT INTO `users` VALUES (0, 0, 'Sugiono, ST', NULL, NULL, 'UNSET', '', NULL, NULL, NULL, '2024-05-27 16:57:38', NULL, NULL);
INSERT INTO `users` VALUES (1, 100, 'System', 'agus123', 'active', 'ADMIN_SYSTEM', '$2y$10$HS8EWaWAgNiho1AyetSIGeWKqQE63FrInMbc859BsAQwGJ4oKwqpy', 'master@webmaster.com', '2022-12-01 15:03:18', NULL, '2022-12-01 15:04:29', '2024-04-18 15:17:36', NULL);
INSERT INTO `users` VALUES (2, 200, 'Admin', NULL, 'active', 'ADMIN_MASTER', '$2y$10$HS8EWaWAgNiho1AyetSIGeWKqQE63FrInMbc859BsAQwGJ4oKwqpy', 'admin@webmaster.com', NULL, NULL, '2022-12-23 15:33:58', '2024-04-18 15:17:38', NULL);
INSERT INTO `users` VALUES (3, 3537, 'Kalab', NULL, 'active', 'LAB_HEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'arizluck@gmail.com', NULL, NULL, '2024-01-25 15:25:02', '2024-04-18 14:08:36', NULL);
INSERT INTO `users` VALUES (4, 310, 'Kasublab', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-01-25 15:25:02', '2024-06-01 22:47:34', NULL);
INSERT INTO `users` VALUES (5, 320, 'Teknisi', NULL, 'active', 'ADMIN_PRODI', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-03-15 15:16:59', '2024-06-01 22:47:15', NULL);
INSERT INTO `users` VALUES (6, 330, 'Dosen A', NULL, 'active', 'LECTURE', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-03-15 15:42:42', '2024-06-01 22:47:31', NULL);
INSERT INTO `users` VALUES (7, 340, 'Siswa A', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, NULL, '2024-03-19 12:42:44', '2024-06-01 22:47:27', NULL);
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
INSERT INTO `users` VALUES (34, 201405003, 'Muhammad Imaduddin, S.T., M.T.', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'ariston@windowslive.com', NULL, NULL, NULL, '2024-06-02 13:04:47', NULL);
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
INSERT INTO `users` VALUES (51, 196701151992031000, 'Sugiono, ST', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:08', NULL);
INSERT INTO `users` VALUES (52, 202203047, 'Rokhis Rosyidi, S.Kom', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:08', NULL);
INSERT INTO `users` VALUES (53, 197104232002121001, 'Gitud Sudarto, ST', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:08', NULL);
INSERT INTO `users` VALUES (54, 1201311204, 'Hening Ary Widhowati, S.Sos', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:08', NULL);
INSERT INTO `users` VALUES (55, 1201707251, 'Hikmat Oka, S.T', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:08', NULL);
INSERT INTO `users` VALUES (56, 1200302001, 'Jamiin', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:08', NULL);
INSERT INTO `users` VALUES (57, 197505182001121002, 'Sumardi', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:08', NULL);
INSERT INTO `users` VALUES (58, 197401222005011002, 'Anton Hartanto', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (59, 196609062001121001, 'Suhadi', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (60, 197610292005011002, 'Okky Ardiansyah', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (61, 197608072000031002, 'Slamet Riyanto', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (62, 198003032008011015, 'Margo Nurcahyo', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (63, 198507032014041001, 'Hendra Saputra P', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (64, 197209141999031002, 'Hendra Saputra S', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (65, 196707081989021001, 'Djarwo', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (66, 197209141999031002, 'Ronny Tuhumena', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (67, 201507057, 'Kusetyono L.S', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (68, 1200405004, 'Eko Heru Santoso, A.Md', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (69, 196809131993031002, 'Langgeng, ST.', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (70, 196812091994031003, 'Tohir Widada, S.Pd, ST, MM', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (71, 2200804121, 'Novi Camelia', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (72, 2200803120, 'Ali Mustain, ST', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (73, 197311172001121002, 'Sunyata, S.E', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'ariston45@gmail.com', NULL, NULL, '2024-05-27 16:59:09', '2024-06-02 21:19:14', NULL);
INSERT INTO `users` VALUES (74, 2201401236, 'Agus Faudin, S.Pd', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:09', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (75, 202204060, 'Tuesday Tri Wardani, S.Pd', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (76, 197507021999031002, 'Rifky.S.T', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (77, 196705132000122001, 'Dra nusriningyati', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (78, 2201111147, 'Laylatul Al Bariyah, S.Pd.', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (79, 2201001132, 'Swandini Endar Damayanti, S.Pd.', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:09', NULL);
INSERT INTO `users` VALUES (80, 197211032001122001, 'Kusuma Ayu NI, S.H.', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:10', NULL);
INSERT INTO `users` VALUES (81, 202204061, 'Alful laili.,S.Pd', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:10', NULL);
INSERT INTO `users` VALUES (82, 199105262015042001, 'Minnar Titis Santoso, S.Pd', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:10', NULL);
INSERT INTO `users` VALUES (83, 201507052, 'Patni, S.Pd.', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:10', NULL);
INSERT INTO `users` VALUES (84, 202204062, 'Siti Yuliana, S.Pd.,M. Pd.', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:10', NULL);
INSERT INTO `users` VALUES (85, 1201506102, 'Sugianto, A.Md.', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:10', NULL);
INSERT INTO `users` VALUES (86, 0, 'Afrizal Ibnu Ervianto.ST', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:10', NULL);
INSERT INTO `users` VALUES (87, 197506082009101003, 'Zainul Abidin', NULL, 'active', 'LAB_TECHNICIAN', '', NULL, NULL, NULL, '2024-05-27 16:59:10', '2024-05-27 17:03:10', NULL);
INSERT INTO `users` VALUES (88, 1116506, 'Dr. Ir. H. Soeparno, M.T.', NULL, 'active', 'LECTURE', '$2y$10$D2DNq1Yg6i7iH0HnCxwhk.NDE30RTXWnyhlVUafXQllY27PsGB5SG', 'soeparno@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (89, 16039502, 'Ratna Palupi Nurfatimah, S.TP., M.T.P.', NULL, 'active', 'LECTURE', '$2y$10$M.eXEnLObu7xCZQaPmQ7T.LdLGiql2iExB5lBXs9jtl276N69U14q', 'ratnanurfatimah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (90, 5077803, 'Dr. Deny Arifiana, S.Pd., M.A.', NULL, 'active', 'LECTURE', '$2y$10$EpjO2/kmWl9fX0e8RdBbMuG1oz7bQaWy66S7PjPHaW.cu9vu16g/C', 'denyarifiana@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (91, 23048803, 'Dr.rer.nat. Sammy Alidrus, M.Sc.', NULL, 'active', 'LECTURE', '$2y$10$wDhJAzTHVRwXPpFaVp9sTuor15Jff5cCUuAYcOR5VG1Cf7jhnJJK.', 'sammyalidrus@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (92, 6077107, 'Prof. Dr. I Gusti Putu Asto Buditjahjanto, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$crEFBP086NGTrJSIJ9oTjeZnaEqKXQMgWErGa8OzIBFxu94.dTTNe', 'asto@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (93, 22036801, 'Nugrahani Astuti, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$VxGlMWTpsRDuZ2dyA3FlR.Yg/xOTPntvTiuAXHrYjvSE446nttJAa', 'nugrahaniastuti@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (94, 9086409, 'Dr. Dewanto, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$MzYSIzOAM674S9ZteG/z4.Q5.PWf4ESqqlI/ORtNhm8PvZNDBM.V.', 'dewanto@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (95, 20036004, 'Ir. Nurhayati Aritonang, M.T.', NULL, 'active', 'LECTURE', '$2y$10$8m2M7YG4nBvZs0kHXEVJ6.5PhY0Oh1rVfcuNeJdBLBofzE1Do0f7a', 'nurhayatiaritonang@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (96, 25036102, 'Prof. Dr. Bambang Suprianto, M.T.', NULL, 'active', 'LECTURE', '$2y$10$ebhYOW7fTmKz8gA/rDhP/.d2xpN.C3LFjmEkMRAMI4ATZnTevJo4.', 'bambangsuprianto@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (97, 9028702, 'Rahadian Bisma, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$.c.EGE2PNcczI7zEho7uBe7croSTLdsR.fTaN3sbFLONrQrmSEaty', 'rahadianbisma@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (98, 20038801, 'Akhmad Hafizh Ainur Rasyid, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$YCHvCey4V.7Uu12VcCpw/u4dS2HtlS0NCTJL/HkaDGLYJPPmGr742', 'akhmadrasyid@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (99, 13046304, 'Dr. Ir. Bambang Sabariman, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$9YOCeWRMZiznQiwLYzXXeuM16ZkVgSIh6gsCB0E6dh5VfwNKklxNa', 'bambangsabariman@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (100, 4117104, 'Muhammad Imaduddin, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$wHC6tfHB4TZUFy.Op3vEfOs09GzQYNsRMfKF7lcamrNNP8ITayG8C', 'muhammadimaduddin@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (101, 7028102, 'Mochamad Arif Irfa\'i, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$eBi6B1TLqAzxC702Rd6zXeRyqpbygLDkcmyKfaLCrYmBxw3FZuRPy', 'arifirfai@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (102, 715128303, 'Ir.  Wahyu Dwi Kurniawan, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$bZq5EcXQBjo/MImziR7vMujbsEMhYdG6OA/IbU3K0KE/lEhnf3vN2', 'wahyukurniawan@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (103, 21028109, 'Ardhini Warih Utami, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$mgurY82XBuFfieOX7HLiaeGegDz0qQ3olyMpq4P.EvZTN1hTRI1AK', 'ardhiniwarih@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (104, 4127004, 'Prof. Dr. Agus Wiyono, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$qAfRxb06k.AcVXrAVToNdeK9eSil0gO3veO7mxcKLfGHLbqjnr7NK', 'aguswiyono@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (105, 19056503, 'Drs. Bambang Sujatmiko, M.T.', NULL, 'active', 'LECTURE', '$2y$10$v7Z0dZ34Ermh.QAyxgHxH.H5dCbGqhiqwN5DV78pLgUxDTXQ4U0iS', 'bambangsujatmiko@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (106, 24118405, 'I Made Suartana, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$CwOBkCJDlhrIwS.IHCnIC.hSjExvCHcWRIl7aqRs2pNJSgZHS1V5u', 'madesuartana@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (107, 17127706, 'Nia Kusstianti, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$ksAf3zije84tLzj8rPBdkOSRibR5cIhN8L9hfBiPuq4ajhtQWlFim', 'niakusstianti@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (108, 22097302, 'Dr. Lutfiyah Hidayati, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$oi0QK4QnlnzeNclJw4edguYY6ux95xwdjNiFuIFQJzsSQw6FY/Xh2', 'lutfiyahhidayati@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (109, 6047303, 'Arie Wardhono, S.T., M.MT., M.T., Ph.D.', NULL, 'active', 'LECTURE', '$2y$10$n1L2rbuHwtxHwqC5onMTk.emKFKbIxKP9VROKSxUQQVdSeMr4Eujm', 'ariewardhono@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (110, 24046006, 'Dr. Mochamad Cholik, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$59LMseSr1T.Gx4QO/SF2se8vkRmughGVHNX.rbjdhbUQMt1HlHhGm', 'mochamadcholik@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (111, 21027602, 'Unit Three Kartini, S.T., M.T., Ph.D.', NULL, 'active', 'LECTURE', '$2y$10$5CWyZG4.MKA/51MvWGs.WOGHR3ZvztiA.8e3KOSgx7xCiUipAnGF6', 'unitthree@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (112, 716018704, 'Dr. Ricky Eka Putra, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$EK9d.JOIDOtxLL/cPnZGquMRjgtbudeb0R3cq4mME2hJuczkBHnSW', 'rickyeka@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (113, 10027105, 'Dr. Hj. Sri Handajani, S.Pd., M.Kes.', NULL, 'active', 'LECTURE', '$2y$10$eZ2n45/1VAK0X0LaO0SFZ.JUX.MRBX9urbjV2dn94UmG8Na86CV2a', 'srihandajani@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (114, 24118403, 'Biyan Yesi Wilujeng, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$tFHdLsV1rZDqb88hEtCXnuA6I9HbUC1uxftPDbcDnPgYOTPPBHyQ.', 'biyanyesi@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (115, 30098402, 'Tri Hartutuk Ningsih, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$cffLO7T8kCyms5oaZqR/u.AKG6Z.LQwCkEtaE0GThRGZRy1g5Bd4e', 'triningsih@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (116, 25038013, 'I Gusti Lanang Putra Eka Prismana, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$CmFL.Ugr54HoO4ywn8pcjONj49y6Q.LaOa8jCVj2XPY8ML3matjdG', 'lanangprismana@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (117, 25016903, 'Anita Qoiriah, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$ORcY3l3EAD56m9zJwmsEWuMD8iR/LGKg8uQgxo4YFsWdLvk3JaW0S', 'anitaqoiriah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (118, 23058603, 'Farid Baskoro, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$xgEfOSDww/AiVNmYJNEUM.PNVaWbdUSAz8FO.Km.P2yzQBCbhk2MK', 'faridbaskoro@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (119, 3098901, 'Hanna Zakiyya, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$Nivdup820OjsywYU3Ibo4Ohrqasmr7Chy9yxuAlo58PEftDLXK7rS', 'hannazakiyya@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (120, 23086203, 'Dr. A. Grummy Wailanduw, M.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$tGD09nTBuNiBxMT6ezCTge30dwVquAFwaYfy.qaIcvdy7NwwdFth6', 'grummywailanduw@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (121, 12108004, 'Dr. Lusia Rakhmawati, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$onWjrmohRqFhOrXoDcl6r.u7iW37AJRUs5LB5H4lYGF0q0cbcYO66', 'lusiarakhmawati@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (122, 7056703, 'Drs. Ec. Mein Kharnolis, M.SM.', NULL, 'active', 'LECTURE', '$2y$10$bpPQcepJUNjHFYwR3RmXkewgfxyq48nmfn5rkp3DHiUtsUB7vahi2', 'meinkharnolis@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (123, 20127904, 'Dwi Fatrianto Suyatno, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$o55OxSE2GwcwLd90LX7aK.XXjxakSFtoY.erN7/5C0Tpgb/h9nGGK', 'dwifatrianto@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (124, 1117905, 'Nur Aini Susanti, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$wDkdpLTLTdkM/xJr3G/gR.4wxxb10VFVRPh/mCHqA80Od88CoKisO', 'nursusanti@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (125, 18046005, 'Dr. Soeryanto, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$8sWqiTHCGsAaPMEs3GGFNOTxACIl8E//WXAtMoRduCTT6hzBC3I/q', 'soeryanto@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (126, 712078801, 'Diastian Vinaya Wijanarko, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$UOw9KU.tG1MDJJjoapg9jO2VVMUWjvv6eGGAPpQVKgDhGkuQuAsSW', 'diastianwijanarko@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (127, 6027901, 'Sri Dwiyanti, S.Pd., M.PSDM.', NULL, 'active', 'LECTURE', '$2y$10$7tdNCqn8wvEo3FUieGzghuvxxZh/LcInw4R2X6XPeEies.zfPLF4C', 'sridwiyanti@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (128, 18116102, 'Dra. Dewi Lutfiati, M.Kes.', NULL, 'active', 'LECTURE', '$2y$10$4jGQmsnF.7OnuZTH07WQ8ObEr6hYdzG2xtPklWSvTc5hSE1dhzPCW', 'dewilutfiati@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (129, 21057204, 'Dr.  Nur Kholis, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$bZS7Rqr/xxttWZ9M9Dofeed2frwX4m2fwDmOkzyldimxVkUfUGfUK', 'nurkholis@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (130, 24118402, 'Novi Sukma Drastiawati, S.T., M.Eng.', NULL, 'active', 'LECTURE', '$2y$10$.PnRq62BUHujc9wUowjUFeUj6qP7ToyPLVBYAFiysYEeR3Uo3w.mO', 'novidrastiawati@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (131, 13087905, 'Prof. Dr.  Erina Rahmadyanti, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$yskcnDTw7fQ6c3xMtnKvLeQYWHJwUjR7IfULzJctjWaq1Wjgoua16', 'erinarahmadyanti@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (132, 14117105, 'Dr.Sn. Inty Nahari, S.Pd., M.Ds.', NULL, 'active', 'LECTURE', '$2y$10$OjsOqHwZ2jTl8eufRUVuCeLquAyH2BfddfxhCh2MTnH2xVSQEooZ2', 'intynahari@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (133, 4127803, 'Dr. Nurhayati, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$OdVbcm87.y/jKPR9ohdBLO2GG7hAv9mQzHZzrUpYDaVhWyEB0wEOK', 'nurhayati@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (134, 19077503, 'Yogie Risdianto, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$Lz7whBZQtwC5ZUysZEdhtOU1oJkicKx9vZA3JW6qMHfYtAWofbj2K', 'yogierisdianto@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (135, 29078704, 'Mochamad Firmansyah Sofianto, S.T., M.Sc., M.T.', NULL, 'active', 'LECTURE', '$2y$10$T9oQLbLdlhtmu6Id9BN9heStdX3CgTNgjrPDSH.MnfDX6fjZoY/JS', 'mochamadfirmansyah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (136, 2126207, 'Dra. Nur Andajani, M.T.', NULL, 'active', 'LECTURE', '$2y$10$wbYtXNJjVJEiJNwfSb8WK.RIUvm2PR.UYVs7reK2sMcrZpMlDKCk2', 'nurandajani@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (137, 16078502, 'Yulia Fransisca, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$OgQoN7qxPPgfXUYfESpgnOOX9FbF6J3i09tv0.VwA2DIl3KxQA9my', 'yuliafransisca@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (138, 20087506, 'Dr. Subuh Isnur Haryudo, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$i6H75p7rTpkOskPJl7cY5.T1jd0kQz9fso6BeaPjNuW5O2SuVxqgi', 'subuhisnur@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (139, 17087505, 'Dr. Raden Roro Hapsari Peni Agustin Tjahyaningtijas, S.Si., M.T.', NULL, 'active', 'LECTURE', '$2y$10$3ZECCjD/ywhjhjhbyRlgjun/eSipQ.kEN9mw8m2htCDkiGExXcEze', 'hapsaripeni@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (140, 27108403, 'Dr. Yeni Anistyasari, S.Pd., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$UgxLmDS2pnXPRoYus3Cud.IOYt/gFGckWA2TQDh/S6d0j6m6MvJl2', 'yenian@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (141, 7026904, 'Ibrohim, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$iPm9yYbagSSlu5GTK4lXke4sNUmGBY5V3H6aPTcQycuwI6etjidju', 'ibrohim@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (142, 701128101, 'Imami Arum Tri Rahayu, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$rayfN2pzJAZhePpiFWMwc.L6.j/EoKCiBhwL5M.lX0ENdk.T4MY8G', 'imamirahayu@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (143, 13058110, 'Dr. Gde Agus Yudha Prawira Adistana, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$iHg4cSMzKyA6732vMb6N1uiVJ36AE5PKHM64.pWXFohcsK2HNPO7q', 'gdeadistana@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (144, 30037800, 'Dr. Aris Ansori, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$u5J8wc4Cz7KvZAINNKD/4ON7P7YJ9rxeoqkxbcpzIKBtGKUbb6zhC', 'arisansori@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (145, 2088004, 'Octaverina Kecvara Pritasari, S.Pd., M.Farm.', NULL, 'active', 'LECTURE', '$2y$10$9gJ76AqqrUW8tLOPCvKGU./eavfZ/0FTCr.pdMG4AInW1PGFNpszO', 'octaverinakecvara@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (146, 2097901, 'Dr. Lilik Anifah, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$Yl/ujuwe5xzwAvoDJoTRCOxqPstACsizYwlzfEzj1jSyAArDebZHG', 'lilikanifah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (147, 13096103, 'Prof. Dr. Muhaji, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$Gta8BMNgJZLa6.GzKXkwz.tx5cezAzzRDErw2hdhcQ6IGvNNCsKcS', 'muhaji61@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (148, 25067709, 'Muhamad Syariffuddien Zuhrie, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$z6AiMCwiKKXF51puNzUwzOu8kmfadWpMX9W5auMMQXYEuGhnIqCfi', 'zuhrie@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (149, 7097103, 'Indra Herlamba Siregar, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$cHCgs2n2LW0sAELbGm1ydekK6xrU3Xa9hgIwH.P93uxXMVtnSB4aS', 'indrasiregar@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (150, 29066201, 'Drs. Djoni Irianto, M.T.', NULL, 'active', 'LECTURE', '$2y$10$MGrMsQTWa9iRIBR3UEebE.CabiLtPuEX.36knatVcmRkIjEIUOgn.', 'djoniirianto@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (151, 5036509, 'Dr. Djoko Suwito, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$NHWkmjpXDpmJYa7O3BuECu1JGKA8J/rsUr/OyBIjF33PORD5BO1JG', 'djokosuwito@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (152, 2047602, 'Ir. Priyo Heru Adiwibowo, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$JFt9HDRT1ix9Q8pQrzf3B.OOSFT/5UJqWeaJZ3b9gZPzIX7.DYSmW', 'priyoheruadiwibowo@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (153, 17126805, 'Dr. Rina Harimurti, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$Q8sIMbTTzrRuqS00x3O0b.jCKo9GVSMCepr.BiQOkPBzPwbff..Me', 'rinaharimurti@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (154, 2067504, 'Dr. Yuni Yamasari, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$M9nyqCkc0BH1JWnjUXSGo.gAeqYPNl4sZXZKglVhcHjdj.NNwvOs2', 'yuniyamasari@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (155, 2117005, 'Iskandar, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$gY.v2lipgUYZ4SFkVn6Ri.K4E5zHSGuu77KJNcX9I077vzCkObrRW', 'iskandar@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (156, 29068803, 'Pradini Puspitaningayu, S.T., M.T., Ph.D.', NULL, 'active', 'LECTURE', '$2y$10$Ifo6D2w7ZmYbqkoy/ogAjOIK12Fk6R16X96IuZ0C2bmELCl1qo5wq', 'pradinip@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (157, 24068703, 'Bellina Yunitasari, S.Si., M.Si.', NULL, 'active', 'LECTURE', '$2y$10$/RTUuldaIt0Q1UNgsyPAh.yS5r/FPkH5TJXfy3cBGWn4oIDuO89hy', 'bellinayunitasari@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (158, 12048006, 'Aries Dwi Indriyanti, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$9c.BDXvrC4.UbOgMhmwY1OJQ3yWk.uieTqy.QYxqCQ7Jb6u0SGC.W', 'ariesdwi@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (159, 7086006, 'Dr. Ir. Asrul Bahar, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$DWdReSt08lBufqScgacnuOjmoUYZQjy/FuNdll3XYJ60i5A526/ny', 'asrulbahar@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (160, 19056502, 'Drs. Andang Widjaja, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$RqW1q/aLGUFaNyZmutOome/n9x82SIezmPv/Vz.uFiFO9Y5.9CsjK', 'andangwidjaja@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (161, 1046411, 'Dr. Maspiyah, M.Kes.', NULL, 'active', 'LECTURE', '$2y$10$evpEZbLRwv727zbcvbkDT.a4ZHuo83rha86WgBRWyosJQecz5iFYa', 'maspiyah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (162, 20046403, 'Dr. Edy Sulistiyo, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$kxKiJKgTSYKCu.3AdeBsJOACt/SltwV9w8d9nwMst9gg7ujAuqkGm', 'edysulistiyo@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (163, 31075702, 'Prof. Dr. Marniati, S.E., M.M.', NULL, 'active', 'LECTURE', '$2y$10$qn.8Uo28qC1UWPZwDwxnk.CUwoTjCIrbj2x9LvFtyWQraOeJQGFXG', 'marniati@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (164, 16127101, 'Ninik Wahju Hidajati, S.Si., M.Si.', NULL, 'active', 'LECTURE', '$2y$10$7xbTEVME5zsFb/87IGh..uNHxEqemNPErrxlZJNvx7qpISXoAbsvi', 'ninikwahju@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (165, 11037706, 'Dr. Mohammad Effendy, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$cM0ipwChqU4SYIo/1SHXRua2pulcqZvhCYVYMLe.QHJIbFlIj1XPa', 'mohammadeffendy@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (166, 3027708, 'Wiyli Yustanti, S.Si., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$P9eJJkd3uG21sI2xwIAJxuoDutd1KbTwPyg0XuQFuZ/VU/bbmrrPy', 'wiyliyustanti@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (167, 704038901, 'Rifqi Firmansyah, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$ZorMGPShqBs0PVkXwLh2sudhhC/IuyyeS3xmw8ylfbKCzIG3YjKZS', 'rifqifirmansyah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (168, 28096702, 'Dra. Lucia Tri Pangesthi, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$jbolLVYeVZMrVuf3z8G/j.WdkAJHpPm0ARCQuvwHtCaGUClkmHzH2', 'luciapangesthi@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (169, 6087903, 'Agus Prihanto, S.T., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$AfQMW817OIOEZmP1sqf/bOuVVVX9aut2utkUF1Cf9d6gX3kA3hNaK', 'agusprihanto@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (170, 7107105, 'Krisna Dwi Handayani, S.T., M.MT., M.T.', NULL, 'active', 'LECTURE', '$2y$10$NhBUS8F1q912/tGNDHLobORNFT7VNwpY1Qecb.hhSKySQER5Bd9T6', 'krisnahandayani@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (171, 22067003, 'Dr. Puput Wanarti Rusimamto, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$T.tb7gqvdO804RVTmYDVbO7ducB32u8g.DY/DwIdVjHriYh2w7c1u', 'puputwanarti@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (172, 20096903, 'Agung Prijo Budijono, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$2RrSnn2CAp9SsQZmutGut.w0Zt0TjvrIsHwz.TGplGgb04pw1AU1u', 'agungbudijono@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (173, 12038901, 'Mauren Gita Miranti, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$eimMeJMZG19iUoNIlX007uXVX9r7NiKAh2eBD56Ur4lE//lJ5cujm', 'maurenmiranti@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (174, 18066802, 'Dr. Ir. Achmad Imam Agung, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$KsPCy1HDiPkB2jhgwNaiS.gRAP3bsRkWxqOBVENOmIl/CjNucdkHW', 'achmadimam@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (175, 28126704, 'Prof. Dr. I Made Arsana, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$cgisSwx5phGjtBGL3Gi3ueP72oR2KVOcHrIWmLuneJ8v17MYaWSZi', 'madearsana@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (176, 4036708, 'Hendra Wahyu Cahyaka, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$6tw../M7Hzycly0XY4XiMOjv6tSZbY57V3L.0UJ2GGvkDmi2JISSS', 'hendracahyaka@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (177, 25126605, 'Saiful Anwar, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$wxXoCd7H69CUIJhKdn1hxuicXkadGB.60OiLiY/vq7LnEF2IiqsmS', 'saifulanwar@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (178, 31036406, 'Endryansyah, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$4P4m6InBd746Fhkj2yQMsunwsqmJX/ihoUzdikhN6DQicK9/hbEh.', 'endryansyah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (179, 23046502, 'Dr. Yunus, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$4fvSsLOv8/DwfAfJR/QmKuzSW/2yXYOIYxH.kJPM3Os0ns88LBQKm', 'yunus@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (180, 1117406, 'Aditya Prapanca, S.T., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$xXjuca6J1d0q5bVrFQzhYOgUoQp1pIqfSltxmG/cdH.dkxpf2F0CO', 'adityaprapanca@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (181, 1047307, 'Ir.  Mas Suryanto H.S., S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$cJiUXleBMoyIB8o.LsrwLu/pVJLxkxhlU2aY6HQSiR8DcG.meSm9e', 'massuryantohs@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (182, 10058904, 'Danayanti Azmi Dewi Nusantara, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$r8T4.Zf5d0M98RJWbUGjcuivxHOp.bxgmRGPTShmKUbpapYdodX42', 'danayantinusantara@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (183, 20099101, 'Ma\'rifatun Nashikhah, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$63kjOsL6mjatyeDvBmgfSOJzDNcv2GWYSk6FJWjOG/m2QidQP7hPa', 'marifatunnashikhah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (184, 7028704, 'Peppy Mayasari, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$xYPEqrzZpeICnPmMxTY3s.b0jI1Rq/3sP5UJubiK4DTPRM9XzehGi', 'peppymayasari@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (185, 701129003, 'Fendi Achmad, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$nBIbvhZNWAvvFjRAs0l8kOMMluLlDCuT9ueW67sfQj/mMal29MU3a', 'fendiachmad@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (186, 703079005, 'L. Endah Cahya Ningrum, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$j/46aXKo6jbVJdbdG03XouCEq4BOC5dZQrDabz1whrIr0Ug7ttTDe', 'endahningrum@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (187, 7078705, 'Miftahur Rohman, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$Rgl3yFMDB4LhKCC1nm2sMuYipBLmmLKWi47eRVFvFycju03DkLUai', 'miftahurrohman@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (188, 26078508, 'Heru Arizal,  S.Pd., M.M., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$4Cbkzz7Af051ZnldcemPA.kU7RYh/LA6uUq8ygiUIknTqwiopaMtC', 'heruarizal@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (189, 729058902, 'Paramitha Nerisafitra, S.ST., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$Gk6bi77IUM/LXhRV3Dxcc.i5gvj0UrxhHnTN7yQnoYHahv0MQESl.', 'paramithanerisafitra@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (190, 9039301, 'Ghea Sekar Palupi, S.Kom., M.I.M.', NULL, 'active', 'LECTURE', '$2y$10$vbPH6xjGLbSJgknj6Apjjutl3h5PE0YeCZXcdyZ02tViK93dk2CSG', 'gheapalupi@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (191, 5099302, 'Rindu Puspita Wibawa, S.Kom., M.Kom.', NULL, 'active', 'LECTURE', '$2y$10$j66q1kLSucMUFUu20G9se.7Twp2w5rsMkuQi5PUTZkYVWSerack7q', 'rinduwibawa@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (192, 27088504, 'Muamar Zainul Arif, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$XraWkMprK34ICjIX5SEw4ORP1LKMwhEm6McMXUFldlteOJiXDJ6nG', 'muamararif@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (193, 720048904, 'Ali Hasbi Ramadani, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$8RABh92.9jaCPSx/KJXJnuBw3Mu4rZxajddCJApYcfXi0A7QAHgvO', 'aliramadani@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (194, 6128708, 'Rachmad Syarifudin Hidayatullah, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$g.BsqvTYb0yv2t5O2w1MC.SVcpD2yLhCvbP9565NanGoST5TaBME6', 'rachmadhidayatullah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (195, 4049013, 'Ika Nurjannah, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$iLwL007ucvARX.0/I904Xe.cRqIxCZniWu4idF1z1wTdr3PUo7O2y', 'ikajannah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (196, 2068907, 'Wahyu Dwi Mulyono, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$ShM145gP1wOwA24VEQEBO.o7RUBVFPXbQHZC8UbkRdmO/YVrmDJEC', 'wahyumulyono@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (197, 26128701, 'Heri Suryaman, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$qfzUjQkFis9IqknSVeU2GO2MLAUBvawwnoOz14OFboVInL/ONLT9S', 'herisuryaman@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (198, 28059106, 'Meity Wulandari, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$xt4hceMI5iX9fBxGIYgAY..7PCeXVFbfu6fh9MfCb70nTPshpwSjq', 'meitywulandari@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (199, 730078601, 'Abdiyah Amudi, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$.3AoBFerDkbGsXIWCgG0t.h5OoDhJYIGFLBlLN3oL2fGIYUFlT0j.', 'abdiyahamudi@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (200, 9029108, 'Mita Yuniati, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$YKrjAmaRDWwKD8as6yBGgeUHo4gWmz3y1DcKqIQYNcIsXUsf1C27y', 'mitayuniati@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (201, 2079104, 'Andika Kuncoro Widagdo, M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$iUU.02hGN4715./wZblHtOs1W0AAm9Ah5Gp5TUpodNa5b400LJ/8S', 'andikawidagdo@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (202, 26079205, 'Lynda Refnitasari, S.Si., M.URP', NULL, 'active', 'LECTURE', '$2y$10$jPzYrIOMZaKJaWCvCtY/0e2lxPsc5G4QSxlz6lT0YxF2y.2eyddEK', 'lyndarefnitasari@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (203, 729119001, 'Handini Novita Sari, S.Pd., M.T.', NULL, 'active', 'LECTURE', '$2y$10$JjEa5Y7vqBqBSI6aMFruKOToHM3Hgwci8Cr463DpGr6bcYRP/wGx6', 'handinisari@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (204, 714019401, 'Parama Diptya Widayaka, S.ST., M.T.', NULL, 'active', 'LECTURE', '$2y$10$PqN.rKAM1MTgo14jm7QOHuJbzFVWC960mCI8drehaVFfC4ArOEth2', 'paramawidayaka@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (205, 30119301, 'Roswina Dianawati, S.Pd., M.Ed.', NULL, 'active', 'LECTURE', '$2y$10$8BIVw891fkXMfiZuO1XSOeoLxly5WMsmDhdovsQaUhHS8fj8Us0We', 'roswinadianawati@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (206, 26029701, 'Alwan Gangsar Brilian Putra, S.Tr.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$Eze3Gs.7jhhQjmyCXueh6.6NOmihlobCb0IWdeFqQz2k1p0GI0xFK', 'alwanputra@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (207, 9079802, 'Sayyidul Aulia Alamsyah, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$zgsbEiF1PlicGPhfjXoTrOsDpPMCqj2hcnwPSaMeL9fmdAp0gMf6a', 'sayyidulalamsyah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (208, 1019312, 'Bima Anggana Widhiarta Putra, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$708bVtjtRnUATGTtANK4D.CaJxBq8ZdiN3p7O8GE.C/qdmdnqDCZK', 'bimaputra@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (209, 1079106, 'Ervin Yohannes, S.Kom., M.Kom., M.Sc., Ph.D.', NULL, 'active', 'LECTURE', '$2y$10$Ab9/VDmM57ioy0yc33tlvOstZr/8F.cAhHV9QD8RHjWzr29QaUGhe', 'ervinyohannes@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (210, 706038903, 'Ahmad Saepuddin, S.T., M.Sc.', NULL, 'active', 'LECTURE', '$2y$10$kPz82iyFAbWQRg0XFF8dXOsdQ3MeV6b0pGIU1DqvcAK3SWUbf.qU.', 'ahmadsaepuddin@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (211, 3819129301, 'Nurul Farikhatir Rizkiyah, M.Pd', NULL, 'active', 'LECTURE', '$2y$10$5aQxXO6KMMJdjp325uSUb.yqv4HhZGwYRjubwzt.AGEckA2xlFMu2', 'nurulrizkiyah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (212, 705018402, 'Nurul Makhmudiyah, S.Si., M.T.', NULL, 'active', 'LECTURE', '$2y$10$pcxzoBaAt6mp1sHKMC0LmuWYTeS8c1eztyrdg.Or45ra02Hxpme3S', 'nurulmakhmudiyah@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (213, 608129105, 'Desy Ratna Arthaningtyas, S.T., M.T.', NULL, 'active', 'LECTURE', '$2y$10$Tz3AHoPQVlRZJCExedBBSuaWxy9VniogkN5Vcc5NrzYp/3SYI.2By', 'desyarthaningtyas@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (214, 726018802, 'apt.  M.A. Hanny Ferry Fernanda, S.Farm., M.Farm.', NULL, 'active', 'LECTURE', '$2y$10$3gPN4Js.O/VoTNFOd/KeGezoZZrIli1Wv1KGyyQE0zlfnHYjSWfVi', 'apt.fernanda@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (215, 12029306, 'Febriani Lukitasari, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$tbRQpvdeWU9c8wUdOUI0auFfXV.2GBjza7LRb8RQrxuGB5kSQBpTG', 'febrianilukitasari@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (216, 23129601, 'Annisa Nur\'aini, S.Pd., M.Pd.', NULL, 'active', 'LECTURE', '$2y$10$1vCdaS4tohKInHrmFv6rZeE5O1F8t6y5ugI/VZ/NcrYc7POj.SBn.', 'annisanuraini@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (217, 5069801, 'Rendra Lebdoyono, S.T.P., M.Sc.', NULL, 'active', 'LECTURE', '$2y$10$BYdqXhE3f8kVgS1tKwuxXeENKvJ2wihWhTkodgBIT3Z2G8zYoJLy2', 'rendralebdoyono@unesa.ac.id', NULL, NULL, '2024-06-01 14:28:44', '2024-06-01 14:31:14', NULL);
INSERT INTO `users` VALUES (218, 20050724036, 'ALIF AKBAR HIDAYATULLAH', NULL, 'active', 'STUDENT', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 'trustopenmail@gmail.com', NULL, NULL, '2024-06-01 14:33:08', '2024-06-02 13:02:33', NULL);

SET FOREIGN_KEY_CHECKS = 1;
