/*
 Navicat Premium Data Transfer

 Source Server         : LocalMariaDB
 Source Server Type    : MariaDB
 Source Server Version : 110502 (11.5.2-MariaDB)
 Source Host           : localhost:3307
 Source Schema         : lab_unesa

 Target Server Type    : MariaDB
 Target Server Version : 110502 (11.5.2-MariaDB)
 File Encoding         : 65001

 Date: 18/10/2024 08:48:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cost_reductions
-- ----------------------------
DROP TABLE IF EXISTS `cost_reductions`;
CREATE TABLE `cost_reductions`  (
  `reduction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reduction_usr_level` enum('STUDENT','LECTURE','PUBLIC_NON_MEMBER','PUBLIC_MEMBER') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `reduction_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `reduction_act_cat` enum('tp_penelitian','tp_pelatihan','tp_pengabdian_masyarakat','tp_magang','tp_lain_lain','tp_penelitian_skripsi') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `reduction_val` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`reduction_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cost_reductions
-- ----------------------------
INSERT INTO `cost_reductions` VALUES (1, 'STUDENT', 'Diskon Penelitian Skripsi', 'tp_penelitian_skripsi', 100, NULL, NULL);
INSERT INTO `cost_reductions` VALUES (2, 'STUDENT', 'Diskon Lainnya', 'tp_lain_lain', 10, NULL, NULL);

-- ----------------------------
-- Table structure for email_activations
-- ----------------------------
DROP TABLE IF EXISTS `email_activations`;
CREATE TABLE `email_activations`  (
  `id_act` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `used_token` enum('false','true') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'false',
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_act`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of email_activations
-- ----------------------------
INSERT INTO `email_activations` VALUES (1, 192, 'fac2c1ff-9873-4c0c-837f-5b0675957641', 'false', '2024-08-06 11:22:50', '2024-08-06 13:08:08');
INSERT INTO `email_activations` VALUES (2, 194, 'f12141f4-9e23-4ed7-ae74-d80f0506ad7e', 'true', '2024-08-06 14:09:12', '2024-08-06 14:11:00');
INSERT INTO `email_activations` VALUES (3, 195, '8c20c1b6-e81a-4c55-b558-cbf53dab1e3f', 'true', '2024-08-06 14:15:26', '2024-08-06 14:17:17');
INSERT INTO `email_activations` VALUES (4, 196, '4814b110-4d52-40bc-810a-c616c9a5b992', 'false', '2024-08-06 14:20:07', NULL);
INSERT INTO `email_activations` VALUES (5, 197, '2480aab4-de80-4747-8c0b-85f774ff9b97', 'true', '2024-08-08 10:02:48', '2024-08-08 10:03:46');
INSERT INTO `email_activations` VALUES (6, 185, 'cf26e174-7997-4b42-b85a-1727e57d8739', 'true', '2024-10-08 09:28:18', '2024-10-08 16:29:24');
INSERT INTO `email_activations` VALUES (7, 187, 'd3626d9a-77df-4ba7-afee-8275a3f0136e', 'true', '2024-10-14 02:56:31', '2024-10-14 09:57:08');
INSERT INTO `email_activations` VALUES (8, 188, 'a4884171-5f81-430d-bca6-23cf464f8c0c', 'true', '2024-10-15 02:11:18', '2024-10-15 09:11:49');
INSERT INTO `email_activations` VALUES (9, 189, '7aaaa13c-0a87-4fb3-8927-4748ece9736d', 'true', '2024-10-15 02:44:45', '2024-10-15 09:45:25');
INSERT INTO `email_activations` VALUES (10, 190, 'cb053c23-7e68-4ec6-a201-e6e7bfb34106', 'true', '2024-10-15 02:46:28', '2024-10-15 09:47:03');
INSERT INTO `email_activations` VALUES (11, 191, 'f6f1a98a-c917-4e76-89e5-6178b2108d93', 'true', '2024-10-15 02:50:21', '2024-10-15 09:50:55');
INSERT INTO `email_activations` VALUES (12, 192, '71ec586d-d081-4ce9-abfa-d6783c3e295d', 'true', '2024-10-15 02:52:13', '2024-10-15 09:52:54');
INSERT INTO `email_activations` VALUES (13, 193, '37d562fe-7619-4ac1-bd12-34c2cf43aa84', 'true', '2024-10-15 03:41:30', '2024-10-15 10:41:57');
INSERT INTO `email_activations` VALUES (14, 194, 'd547fe4c-42e8-4aa6-805f-fdd31f7edde4', 'true', '2024-10-15 04:42:28', '2024-10-15 11:44:53');
INSERT INTO `email_activations` VALUES (15, 197, '1fed883b-8013-4b2d-b750-f0c35f03dbdb', 'false', '2024-10-15 05:12:15', NULL);

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
-- Table structure for ft_groups
-- ----------------------------
DROP TABLE IF EXISTS `ft_groups`;
CREATE TABLE `ft_groups`  (
  `lag_id` int(11) NOT NULL,
  `lag_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`lag_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ft_groups
-- ----------------------------
INSERT INTO `ft_groups` VALUES (0, 'Semua Rumpun', NULL, NULL);
INSERT INTO `ft_groups` VALUES (2, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL);
INSERT INTO `ft_groups` VALUES (3, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL);
INSERT INTO `ft_groups` VALUES (4, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL);
INSERT INTO `ft_groups` VALUES (5, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL);
INSERT INTO `ft_groups` VALUES (6, 'Prodi S1 Pendidikan Tata Boga', NULL, NULL);
INSERT INTO `ft_groups` VALUES (7, 'Prodi S1 Pendidikan Tata Busana', NULL, NULL);
INSERT INTO `ft_groups` VALUES (8, 'Prodi S1 Pendidikan Tata Rias', NULL, NULL);

-- ----------------------------
-- Table structure for lab_facilities
-- ----------------------------
DROP TABLE IF EXISTS `lab_facilities`;
CREATE TABLE `lab_facilities`  (
  `lsf_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lsf_submission` bigint(20) NULL DEFAULT NULL,
  `lsf_lab` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsf_start_dt` date NULL DEFAULT NULL,
  `lsf_end_dt` date NULL DEFAULT NULL,
  `lsf_loan_status` enum('loaned','returned') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsf_facility_id` int(11) NULL DEFAULT NULL,
  `lsf_facility_status` enum('listed','unlisted') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsf_facility_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsf_cnt_unit` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint(20) NULL DEFAULT NULL,
  `updated_by` bigint(20) NULL DEFAULT NULL,
  `lsf_out_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsf_in_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsf_out_time` datetime NULL DEFAULT NULL,
  `lsf_in_time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`lsf_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_facilities
-- ----------------------------

-- ----------------------------
-- Table structure for lab_labtests
-- ----------------------------
DROP TABLE IF EXISTS `lab_labtests`;
CREATE TABLE `lab_labtests`  (
  `ltd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ltd_submission` bigint(20) NULL DEFAULT NULL,
  `ltd_labtest` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ltd_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `lab_sch_dates` VALUES (2, '2', 'Monday', NULL, 'active', '2024-10-16 08:10:46', NULL);
INSERT INTO `lab_sch_dates` VALUES (3, '3', 'Monday', NULL, 'active', '2024-10-16 08:11:40', NULL);
INSERT INTO `lab_sch_dates` VALUES (4, '4', 'Tuesday', NULL, 'active', '2024-10-16 08:37:38', NULL);
INSERT INTO `lab_sch_dates` VALUES (5, '5', 'Tuesday', NULL, 'active', '2024-10-16 08:38:28', NULL);
INSERT INTO `lab_sch_dates` VALUES (6, '6', 'Monday', NULL, 'active', '2024-10-16 08:41:07', NULL);
INSERT INTO `lab_sch_dates` VALUES (7, '7', 'Monday', NULL, 'active', '2024-10-16 08:41:47', NULL);
INSERT INTO `lab_sch_dates` VALUES (8, '8', 'Tuesday', NULL, 'active', '2024-10-16 08:42:57', NULL);
INSERT INTO `lab_sch_dates` VALUES (10, '10', NULL, NULL, 'active', '2024-10-17 02:22:47', '2024-10-17 09:52:10');
INSERT INTO `lab_sch_dates` VALUES (12, '12', NULL, NULL, 'active', '2024-10-17 02:25:23', NULL);
INSERT INTO `lab_sch_dates` VALUES (13, '13', NULL, NULL, 'active', '2024-10-17 02:28:28', '2024-10-17 09:38:42');
INSERT INTO `lab_sch_dates` VALUES (14, '14', NULL, NULL, 'active', '2024-10-17 02:33:45', NULL);
INSERT INTO `lab_sch_dates` VALUES (15, '15', NULL, NULL, 'active', '2024-10-17 02:34:15', '2024-10-17 10:01:08');
INSERT INTO `lab_sch_dates` VALUES (16, '16', NULL, NULL, 'active', '2024-10-17 02:40:28', NULL);
INSERT INTO `lab_sch_dates` VALUES (17, '17', NULL, NULL, 'active', '2024-10-17 02:54:02', NULL);
INSERT INTO `lab_sch_dates` VALUES (18, '18', NULL, NULL, 'active', '2024-10-17 02:55:54', NULL);
INSERT INTO `lab_sch_dates` VALUES (19, '19', NULL, NULL, 'active', '2024-10-17 03:18:14', '2024-10-17 10:19:55');
INSERT INTO `lab_sch_dates` VALUES (20, '20', NULL, NULL, 'active', '2024-10-17 03:28:20', '2024-10-17 21:16:32');
INSERT INTO `lab_sch_dates` VALUES (21, '21', NULL, NULL, 'active', '2024-10-17 03:31:25', NULL);
INSERT INTO `lab_sch_dates` VALUES (23, '23', NULL, NULL, 'active', '2024-10-17 21:50:37', NULL);

-- ----------------------------
-- Table structure for lab_sch_times
-- ----------------------------
DROP TABLE IF EXISTS `lab_sch_times`;
CREATE TABLE `lab_sch_times`  (
  `lsct_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lsct_date_id` int(11) NULL DEFAULT NULL,
  `lsct_time_id` int(11) NULL DEFAULT NULL,
  `lsct_status` enum('active','nonactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lsct_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 168 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sch_times
-- ----------------------------
INSERT INTO `lab_sch_times` VALUES (2, 2, 0, 'active', '2024-10-16 08:10:46', NULL);
INSERT INTO `lab_sch_times` VALUES (3, 2, 1, 'active', '2024-10-16 08:10:46', NULL);
INSERT INTO `lab_sch_times` VALUES (4, 2, 2, 'active', '2024-10-16 08:10:46', NULL);
INSERT INTO `lab_sch_times` VALUES (5, 2, 3, 'active', '2024-10-16 08:10:46', NULL);
INSERT INTO `lab_sch_times` VALUES (6, 3, 7, 'active', '2024-10-16 08:11:40', NULL);
INSERT INTO `lab_sch_times` VALUES (7, 3, 9, 'active', '2024-10-16 08:11:40', NULL);
INSERT INTO `lab_sch_times` VALUES (8, 3, 10, 'active', '2024-10-16 08:11:40', NULL);
INSERT INTO `lab_sch_times` VALUES (9, 4, 2, 'active', '2024-10-16 08:37:38', NULL);
INSERT INTO `lab_sch_times` VALUES (10, 4, 3, 'active', '2024-10-16 08:37:38', NULL);
INSERT INTO `lab_sch_times` VALUES (11, 4, 4, 'active', '2024-10-16 08:37:38', NULL);
INSERT INTO `lab_sch_times` VALUES (12, 4, 5, 'active', '2024-10-16 08:37:38', NULL);
INSERT INTO `lab_sch_times` VALUES (13, 5, 7, 'active', '2024-10-16 08:38:28', NULL);
INSERT INTO `lab_sch_times` VALUES (14, 5, 8, 'active', '2024-10-16 08:38:28', NULL);
INSERT INTO `lab_sch_times` VALUES (15, 5, 9, 'active', '2024-10-16 08:38:28', NULL);
INSERT INTO `lab_sch_times` VALUES (16, 5, 10, 'active', '2024-10-16 08:38:28', NULL);
INSERT INTO `lab_sch_times` VALUES (17, 6, 0, 'active', '2024-10-16 08:41:07', NULL);
INSERT INTO `lab_sch_times` VALUES (18, 6, 1, 'active', '2024-10-16 08:41:07', NULL);
INSERT INTO `lab_sch_times` VALUES (19, 6, 2, 'active', '2024-10-16 08:41:07', NULL);
INSERT INTO `lab_sch_times` VALUES (20, 6, 3, 'active', '2024-10-16 08:41:07', NULL);
INSERT INTO `lab_sch_times` VALUES (21, 6, 4, 'active', '2024-10-16 08:41:07', NULL);
INSERT INTO `lab_sch_times` VALUES (22, 6, 5, 'active', '2024-10-16 08:41:07', NULL);
INSERT INTO `lab_sch_times` VALUES (23, 6, 6, 'active', '2024-10-16 08:41:07', NULL);
INSERT INTO `lab_sch_times` VALUES (24, 7, 7, 'active', '2024-10-16 08:41:47', NULL);
INSERT INTO `lab_sch_times` VALUES (25, 7, 8, 'active', '2024-10-16 08:41:47', NULL);
INSERT INTO `lab_sch_times` VALUES (26, 7, 9, 'active', '2024-10-16 08:41:47', NULL);
INSERT INTO `lab_sch_times` VALUES (27, 7, 10, 'active', '2024-10-16 08:41:47', NULL);
INSERT INTO `lab_sch_times` VALUES (28, 7, 11, 'active', '2024-10-16 08:41:47', NULL);
INSERT INTO `lab_sch_times` VALUES (29, 8, 0, 'active', '2024-10-16 08:42:57', NULL);
INSERT INTO `lab_sch_times` VALUES (30, 8, 1, 'active', '2024-10-16 08:42:57', NULL);
INSERT INTO `lab_sch_times` VALUES (31, 8, 2, 'active', '2024-10-16 08:42:57', NULL);
INSERT INTO `lab_sch_times` VALUES (32, 8, 3, 'active', '2024-10-16 08:42:57', NULL);
INSERT INTO `lab_sch_times` VALUES (33, 8, 4, 'active', '2024-10-16 08:42:57', NULL);
INSERT INTO `lab_sch_times` VALUES (34, 8, 5, 'active', '2024-10-16 08:42:57', NULL);
INSERT INTO `lab_sch_times` VALUES (59, 12, 2, 'active', '2024-10-17 02:25:23', NULL);
INSERT INTO `lab_sch_times` VALUES (60, 12, 4, 'active', '2024-10-17 02:25:23', NULL);
INSERT INTO `lab_sch_times` VALUES (76, 14, 0, 'active', '2024-10-17 02:33:45', NULL);
INSERT INTO `lab_sch_times` VALUES (77, 14, 1, 'active', '2024-10-17 02:33:45', NULL);
INSERT INTO `lab_sch_times` VALUES (90, 13, 0, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (91, 13, 1, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (92, 13, 2, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (93, 13, 3, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (94, 13, 4, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (95, 13, 5, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (96, 13, 6, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (97, 13, 7, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (98, 13, 8, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (99, 13, 9, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (100, 13, 10, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (101, 13, 11, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (102, 13, 12, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (103, 13, 13, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (104, 13, 14, 'active', '2024-10-17 02:38:42', NULL);
INSERT INTO `lab_sch_times` VALUES (105, 16, 0, 'active', '2024-10-17 02:40:28', NULL);
INSERT INTO `lab_sch_times` VALUES (106, 16, 2, 'active', '2024-10-17 02:40:28', NULL);
INSERT INTO `lab_sch_times` VALUES (109, 10, 0, 'active', '2024-10-17 02:52:10', NULL);
INSERT INTO `lab_sch_times` VALUES (110, 17, 1, 'active', '2024-10-17 02:54:02', NULL);
INSERT INTO `lab_sch_times` VALUES (111, 18, 1, 'active', '2024-10-17 02:55:54', NULL);
INSERT INTO `lab_sch_times` VALUES (124, 15, 0, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (125, 15, 1, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (126, 15, 2, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (127, 15, 3, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (128, 15, 4, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (129, 15, 5, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (130, 15, 6, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (131, 15, 7, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (132, 15, 8, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (133, 15, 9, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (134, 15, 10, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (135, 15, 11, 'active', '2024-10-17 03:01:08', NULL);
INSERT INTO `lab_sch_times` VALUES (142, 19, 0, 'active', '2024-10-17 03:19:55', NULL);
INSERT INTO `lab_sch_times` VALUES (143, 19, 2, 'active', '2024-10-17 03:19:55', NULL);
INSERT INTO `lab_sch_times` VALUES (144, 19, 3, 'active', '2024-10-17 03:19:55', NULL);
INSERT INTO `lab_sch_times` VALUES (145, 19, 5, 'active', '2024-10-17 03:19:55', NULL);
INSERT INTO `lab_sch_times` VALUES (148, 21, 4, 'active', '2024-10-17 03:31:25', NULL);
INSERT INTO `lab_sch_times` VALUES (149, 21, 5, 'active', '2024-10-17 03:31:25', NULL);
INSERT INTO `lab_sch_times` VALUES (152, 20, 2, 'active', '2024-10-17 21:16:32', NULL);
INSERT INTO `lab_sch_times` VALUES (153, 20, 3, 'active', '2024-10-17 21:16:32', NULL);
INSERT INTO `lab_sch_times` VALUES (160, 23, 3, 'active', '2024-10-17 21:50:37', NULL);

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
INSERT INTO `lab_schedules` VALUES (2, 23, NULL, 'reguler', NULL, '22', 'Kelas S1 PTM 2023 Otomotif A', 'Praktek Kelistrikan Otomotif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-16 08:10:46', 208, '2024-10-16 08:10:46');
INSERT INTO `lab_schedules` VALUES (3, 23, NULL, 'reguler', NULL, '161', 'Kelas S1 PTM 2023 Otomotif B', 'Praktek Kelistrikan Otomotif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-16 08:11:40', 208, '2024-10-16 08:11:40');
INSERT INTO `lab_schedules` VALUES (4, 23, NULL, 'reguler', NULL, '161', 'Kelas S1 PTM 2023 Otomotif D', 'Praktek Kelistrikan Otomotif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-16 08:37:38', 208, '2024-10-16 08:37:38');
INSERT INTO `lab_schedules` VALUES (5, 23, NULL, 'reguler', NULL, '22', 'Kelas S1 PTM 2023 Otomotif C', 'Praktek Kelistrikan Otomotif', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-16 08:38:28', 208, '2024-10-16 08:38:28');
INSERT INTO `lab_schedules` VALUES (6, 37, NULL, 'reguler', NULL, '26', 'Kelas S1 PTM 2023 Otomotif B', 'Praktek Sepeda Motor dan Motor Kecil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-16 08:41:07', 208, '2024-10-16 08:41:07');
INSERT INTO `lab_schedules` VALUES (7, 37, NULL, 'reguler', NULL, '175', 'Kelas S1 PTM 2023 Otomotif D', 'Praktek Sepeda Motor dan Motor Kecil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-16 08:41:47', 208, '2024-10-16 08:41:47');
INSERT INTO `lab_schedules` VALUES (8, 37, NULL, 'reguler', NULL, '157', 'Kelas S1 PTM 2023 Otomotif A', 'Praktek Sepeda Motor dan Motor Kecil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-16 08:42:57', 208, '2024-10-16 08:42:57');
INSERT INTO `lab_schedules` VALUES (10, 57, NULL, 'reguler', NULL, '0', 's1 ts 2023', 'perkerasan jalan', NULL, '2024-05-10', NULL, NULL, NULL, '2024-05-10', NULL, '2024-10-17 09:52:10', 206, '2024-10-17 02:22:47');
INSERT INTO `lab_schedules` VALUES (12, 57, NULL, 'reguler', NULL, '34', 's1 ts 2023', 'perkersan jalan', NULL, '2023-04-16', NULL, NULL, NULL, '2023-04-16', NULL, '2024-10-17 02:25:23', 206, '2024-10-17 02:25:23');
INSERT INTO `lab_schedules` VALUES (13, 78, NULL, 'reguler', NULL, '44', '2023', 'Pengantin Nusantara', NULL, '2024-10-15', NULL, NULL, NULL, '2024-10-15', NULL, '2024-10-17 09:38:42', 204, '2024-10-17 02:28:28');
INSERT INTO `lab_schedules` VALUES (14, 57, NULL, 'reguler', NULL, '12', 's1 ts 2023', 'perkerasan jalan', NULL, '2024-10-18', NULL, NULL, NULL, '2024-10-18', NULL, '2024-10-17 02:33:45', 206, '2024-10-17 02:33:45');
INSERT INTO `lab_schedules` VALUES (15, 74, NULL, 'reguler', NULL, '37', 'S1 Tata Busana 2023', 'Kurikulum Sekolah', NULL, '2024-10-07', NULL, NULL, NULL, '2024-10-07', NULL, '2024-10-17 10:01:08', 202, '2024-10-17 02:34:15');
INSERT INTO `lab_schedules` VALUES (16, 57, NULL, 'reguler', NULL, '11', 's1 ts 2023', 'Skripsi', NULL, '2024-10-01', NULL, NULL, NULL, '2024-10-01', NULL, '2024-10-17 02:40:28', 206, '2024-10-17 02:40:28');
INSERT INTO `lab_schedules` VALUES (17, 57, NULL, 'reguler', NULL, '5', 's1 ts 2023', 'Pengkerasan jalan', NULL, '2024-10-05', NULL, NULL, NULL, '2024-10-05', NULL, '2024-10-17 02:54:02', 210, '2024-10-17 02:54:02');
INSERT INTO `lab_schedules` VALUES (18, 57, NULL, 'reguler', NULL, '4', 's1 ts 2023', 'perkerasan jalan', NULL, '2024-05-10', NULL, NULL, NULL, '2024-05-10', NULL, '2024-10-17 02:55:54', 210, '2024-10-17 02:55:54');
INSERT INTO `lab_schedules` VALUES (19, 81, NULL, 'reguler', NULL, '4', 'boga a', 'indonesia', NULL, '2024-10-17', NULL, NULL, NULL, '2024-10-17', NULL, '2024-10-17 10:19:55', 203, '2024-10-17 03:18:14');
INSERT INTO `lab_schedules` VALUES (20, 4, NULL, 'reguler', NULL, '119', '2023B', 'ELEKTRONIKA DIGITAL LANJUT', NULL, '2024-08-26', NULL, '2024-08-26', NULL, '2024-08-26', NULL, '2024-10-17 21:16:32', 209, '2024-10-17 03:28:20');
INSERT INTO `lab_schedules` VALUES (21, 4, NULL, 'reguler', NULL, '119', '2023A', 'ELEKTRONIKA DIGITAL LANJUT', NULL, '2024-09-30', NULL, NULL, NULL, '2024-09-30', NULL, '2024-10-17 03:31:25', 209, '2024-10-17 03:31:25');
INSERT INTO `lab_schedules` VALUES (23, 49, NULL, 'reguler', NULL, '0', 'wd', 'ghs', NULL, '2024-10-18', NULL, '2024-10-18', NULL, '2024-10-18', NULL, '2024-10-17 21:50:37', 206, '2024-10-17 21:50:37');

-- ----------------------------
-- Table structure for lab_sub_dates
-- ----------------------------
DROP TABLE IF EXISTS `lab_sub_dates`;
CREATE TABLE `lab_sub_dates`  (
  `lsd_id` bigint(20) NOT NULL,
  `lsd_lsb_id` int(11) NULL DEFAULT NULL,
  `lsd_date` date NULL DEFAULT NULL,
  `lsd_date_opsional` date NULL DEFAULT NULL,
  `lsd_lab` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lsd_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_dates
-- ----------------------------
INSERT INTO `lab_sub_dates` VALUES (1, 1, '2024-10-21', NULL, 1, '2024-10-16 04:11:33', NULL);

-- ----------------------------
-- Table structure for lab_sub_order_details
-- ----------------------------
DROP TABLE IF EXISTS `lab_sub_order_details`;
CREATE TABLE `lab_sub_order_details`  (
  `lod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lod_los_id` int(11) NULL DEFAULT NULL,
  `lod_item_id` int(11) NULL DEFAULT NULL,
  `lod_item_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lod_item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lod_cost` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `lod_note_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lod_note_return` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`lod_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_order_details
-- ----------------------------
INSERT INTO `lab_sub_order_details` VALUES (1, 1, 0, 'lab', 'Peminjaman tanggal 2024-10-21', 40000.00, '2024-10-16 04:11:33', NULL, NULL, NULL);

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
  `los_cost_reduction_percent` decimal(10, 2) NULL DEFAULT NULL,
  `los_confirm_payment` enum('false','true') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'false',
  `los_cost_reduction` decimal(10, 2) NULL DEFAULT NULL,
  `los_cost_after` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`los_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_orders
-- ----------------------------
INSERT INTO `lab_sub_orders` VALUES (1, 1, NULL, '2024-10-16 11:11:33', 40000.00, 100.00, 'false', 40000.00, 0.00, '2024-10-16 04:11:33', NULL);

-- ----------------------------
-- Table structure for lab_sub_times
-- ----------------------------
DROP TABLE IF EXISTS `lab_sub_times`;
CREATE TABLE `lab_sub_times`  (
  `lstt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lstt_date_subs_id` int(11) NULL DEFAULT NULL,
  `lstt_time_id` int(11) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lstt_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_sub_times
-- ----------------------------
INSERT INTO `lab_sub_times` VALUES (1, 1, 1, '2024-10-16 04:11:33', NULL);

-- ----------------------------
-- Table structure for lab_submission_accs
-- ----------------------------
DROP TABLE IF EXISTS `lab_submission_accs`;
CREATE TABLE `lab_submission_accs`  (
  `lsa_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lsa_submission` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsa_rule` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsa_user_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'tp_lain_lain',
  `las_username` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `las_note` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `las_date_acc` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`lsa_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_accs
-- ----------------------------

-- ----------------------------
-- Table structure for lab_submission_advisers
-- ----------------------------
DROP TABLE IF EXISTS `lab_submission_advisers`;
CREATE TABLE `lab_submission_advisers`  (
  `las_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `las_lbs_id` int(11) NULL DEFAULT NULL,
  `las_user_id` int(11) NULL DEFAULT NULL,
  `las_nip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `las_byname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `las_fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `las_user_no_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`las_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_advisers
-- ----------------------------
INSERT INTO `lab_submission_advisers` VALUES (1, 1, NULL, '199105282019032019', 'Pembimbing', 'Meity Wulandari, S.T., M.T.', '2024-10-16 04:11:33', NULL, 28059106);

-- ----------------------------
-- Table structure for lab_submission_results
-- ----------------------------
DROP TABLE IF EXISTS `lab_submission_results`;
CREATE TABLE `lab_submission_results`  (
  `lsr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lsr_lsb_id` int(11) NULL DEFAULT NULL,
  `lsr_file_attachment` varchar(450) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsr_file_result` varchar(450) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsr_file_legalization` varchar(450) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsr_status_validation` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'false',
  `lsr_user_validator` int(11) NULL DEFAULT NULL,
  `lsr_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lsr_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submission_results
-- ----------------------------

-- ----------------------------
-- Table structure for lab_submissions
-- ----------------------------
DROP TABLE IF EXISTS `lab_submissions`;
CREATE TABLE `lab_submissions`  (
  `lsb_id` bigint(20) NOT NULL,
  `lsb_lab_id` int(11) NULL DEFAULT NULL,
  `lsb_title` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_type` enum('borrowing','rental','testing') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_purpose` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_activity` enum('tp_penelitian','tp_pelatihan','tp_pengabdian_masyarakat','tp_magang','tp_lain_lain','tp_penelitian_skripsi') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'tp_lain_lain',
  `lsb_date_start` datetime NULL DEFAULT NULL,
  `lsb_date_end` datetime NULL DEFAULT NULL,
  `lsb_period` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_user_id` int(11) NULL DEFAULT NULL,
  `lsb_user_head` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_user_lecture` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_user_subhead` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_user_tech` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_file_1` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_file_2` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_notes` varchar(800) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_status` enum('menunggu','disetujui','ditolak','selesai','tidak_terpakai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'menunggu',
  `lsb_report_url` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsb_report_filename` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`lsb_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_submissions
-- ----------------------------
INSERT INTO `lab_submissions` VALUES (1, 1, 'MODIFIKASI STRUKTUR GEDUNG RUMAH SAKIT KENDANGSARI KOTA SURABAYA DENGAN BAJA-BETON KOMPOSIT MENGGUNAKAN SISTEM RANGKA PEMIKUL MOMEN', 'borrowing', NULL, 'tp_penelitian_skripsi', NULL, NULL, '2024-10-21', 184, '0', NULL, '11', NULL, NULL, NULL, NULL, 'menunggu', NULL, NULL, '2024-10-16 04:11:33', NULL);

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
  `lab_costbase` enum('by_day','by_tool','by_sample') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
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
INSERT INTO `laboratories` VALUES (1, 2, 'Lab. Konversi Energi Listric', NULL, 'tersedia', 11, 'Sarana penunjang pratikum teknik elektro', NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, 40000.00, NULL, NULL, '2024-10-14 15:23:04');
INSERT INTO `laboratories` VALUES (2, 2, 'Lab. Bengkel listrik', NULL, 'tersedia', 11, 'Sarana penunjang pratikum teknik elektro', NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, 0.00, NULL, NULL, '2024-10-14 14:23:40');
INSERT INTO `laboratories` VALUES (3, 2, 'Lab. pengukuran listrik', NULL, 'tidak_tersedia', 12, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', 500000.00, NULL, NULL, '2024-07-23 09:57:55');
INSERT INTO `laboratories` VALUES (4, 2, 'Lab. elektronika analog dan digital', NULL, 'tersedia', 12, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (5, 2, 'Lab. Intelligent  system', NULL, 'tersedia', 13, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_tool', NULL, NULL, NULL, '2024-07-23 09:52:03');
INSERT INTO `laboratories` VALUES (6, 2, 'Lab. Komputer dan pembelajaran', NULL, 'tersedia', 13, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (7, 2, 'Lab. Transmisi dan distribusi', NULL, 'tersedia', 14, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (9, 2, 'Lab. Telematika', NULL, 'tersedia', 15, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, 100000.00, NULL, NULL, '2024-10-14 15:24:06');
INSERT INTO `laboratories` VALUES (10, 2, 'Lab. Telekomunikasi', NULL, 'tersedia', 15, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (11, 2, 'Lab. fisika teknik', NULL, 'tersedia', 16, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (12, 2, 'Lab. Sistem kendali', NULL, 'tersedia', 16, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (13, 2, 'Lab. Mikroprosesor ', NULL, 'tersedia', 17, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (14, 2, 'Lab. Robotika  ', NULL, 'tersedia', 17, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (15, 2, 'Lab. Kubikel ', NULL, 'tersedia', 18, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (16, 2, 'Lab. Instalasi penerangan dan tenaga listrik', NULL, 'tersedia', 18, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (17, 2, 'Lab. Microteaching FT UNESA', NULL, 'tersedia', 19, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, NULL, 0.00, NULL, NULL, '2024-10-15 11:15:55');
INSERT INTO `laboratories` VALUES (18, 2, 'Lab. Pendingin', NULL, 'tersedia', 19, NULL, NULL, 'Prodi S1 Teknik Elektro dan Prodi S1 Pendidikan Teknik Elektro', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (19, 4, 'Lab. Bahan Bakar Alternatif dan Pelumas', NULL, 'tersedia', 20, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (20, 4, 'Lab. Pengujian Performa Mesin', NULL, 'tersedia', 20, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (21, 4, 'Lab. Perpindahan Panas', NULL, 'tersedia', 21, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (22, 4, 'Lab. Air Conditioner (AC)', NULL, 'tersedia', 21, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (23, 4, 'Lab. Kelistrikan Otomotif', NULL, 'tersedia', 22, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (24, 4, 'Lab. Aerodinamika', NULL, 'tersedia', 22, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (25, 4, 'Lab. Mekanika Fluida', NULL, 'tersedia', 22, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:22');
INSERT INTO `laboratories` VALUES (26, 4, 'Lab. Komputer', NULL, 'tersedia', 23, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, 0.00, NULL, NULL, '2024-10-15 09:52:57');
INSERT INTO `laboratories` VALUES (27, 4, 'Lab. Gambar', NULL, 'tersedia', 23, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, 0.00, NULL, NULL, '2024-10-15 09:53:40');
INSERT INTO `laboratories` VALUES (28, 4, 'Lab. CAD', NULL, 'tersedia', 23, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, 0.00, NULL, NULL, '2024-10-15 09:53:53');
INSERT INTO `laboratories` VALUES (29, 4, 'Lab. Fabrikasi', NULL, 'tersedia', 24, NULL, NULL, 'Gedung A7 Lantai 1', NULL, NULL, NULL, 0.00, NULL, NULL, '2024-10-17 08:51:16');
INSERT INTO `laboratories` VALUES (30, 4, 'Lab. Pembelajaran PTM', NULL, 'tersedia', 24, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (31, 4, 'Lab. Pengukuran', NULL, 'tersedia', 24, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (32, 4, 'Lab. Pengelasan', NULL, 'tersedia', 25, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (33, 4, 'Lab. Pengecoran Logam', NULL, 'tersedia', 25, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (34, 4, 'Lab. Permesinan', NULL, 'tersedia', 25, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (35, 4, 'Lab. Motor Bensin / Motor Bakar ', NULL, 'tersedia', 26, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (36, 4, 'Lab. Motor Diesel / Motor Bakar ', NULL, 'tersedia', 26, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (37, 4, 'Lab. Motor Kecil Dan Sepeda Motor', NULL, 'tersedia', 26, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (38, 4, 'Thermodinamika', NULL, 'tersedia', 27, 'Laboratorium yang ada di Teknik Mesin UNESA yang memiliki fokusan studi bidang pendingin dan pemanfaatannya yang meliputi pendidikan/praktikum, penelitian dan pengabdian masyarakat. Bidang energi yang menjadi fokusan diantaranya yaitu termodinamika, perpindahan panas, sistem pembangkit tenaga, energi surya, sistem pendingin dan pengkondisian udara, motor bakar dan bahan bakar serta penelitian lain seputar energi dan pemanfaatannya', '<p>\r\n\r\nLaboratorium yang ada di Teknik Mesin UNESA yang memiliki fokusan studi bidang pendingin dan pemanfaatannya yang meliputi pendidikan/praktikum, penelitian dan pengabdian masyarakat. Bidang energi yang menjadi fokusan diantaranya yaitu termodinamika, perpindahan panas, sistem pembangkit tenaga, energi surya, sistem pendingin dan pengkondisian udara, motor bakar dan bahan bakar serta penelitian lain seputar energi dan pemanfaatannya\r\n\r\n<br></p>', 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, 100000.00, NULL, NULL, '2024-10-17 09:13:13');
INSERT INTO `laboratories` VALUES (39, 4, 'Fenomena Dasar Mesin', NULL, 'tersedia', 27, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (40, 4, 'Teknik Tenaga Listrik', NULL, 'tersedia', 28, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (41, 4, 'Chasis', NULL, 'tersedia', 28, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, 0.00, NULL, NULL, '2024-10-15 11:41:52');
INSERT INTO `laboratories` VALUES (42, 4, 'Fisika Material', NULL, 'tersedia', 28, NULL, NULL, 'Gedung A9 Lantai 3', NULL, NULL, NULL, 0.00, NULL, NULL, '2024-10-15 11:27:00');
INSERT INTO `laboratories` VALUES (43, 4, 'Pengecatan dan Body Repair', NULL, 'tersedia', 29, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, NULL, 0.00, NULL, NULL, '2024-10-15 11:34:28');
INSERT INTO `laboratories` VALUES (44, 4, 'Mekatronika', NULL, 'tersedia', 29, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (45, 4, 'Lab. CNC', NULL, 'tersedia', 29, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (46, 4, 'Pengujian Bahan', NULL, 'tersedia', 30, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (47, 4, 'Pelapisan', NULL, 'tersedia', 30, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (48, 4, 'Koordinator Ruang Baca', NULL, 'tersedia', 30, NULL, NULL, 'Prodi S1 Teknik Mesin dan Prodi S1 Pendidikan Teknik Mesin', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (49, 5, 'Lab. Sistem Informasi & Geografis', NULL, 'tersedia', 31, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (50, 5, 'Lab. Studio Gambar Komputer', NULL, 'tersedia', 31, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (51, 5, 'Lab. Pembelajaran', NULL, 'tersedia', 32, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (52, 5, 'Lab. Bengkel Kayu Tangan ', NULL, 'tersedia', 32, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (53, 5, 'Lab. Bengkel kayu Mesin', NULL, 'tersedia', 32, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:23');
INSERT INTO `laboratories` VALUES (55, 5, 'Lab. Keairan', NULL, 'tersedia', 33, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:24');
INSERT INTO `laboratories` VALUES (56, 5, 'Lab. Bahan', NULL, 'tersedia', 34, '<p>lab bahan</p>', '<p>test keterangan</p>', 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', 300000.00, NULL, NULL, '2024-10-17 22:10:51');
INSERT INTO `laboratories` VALUES (57, 5, 'Lab. Transportasi', NULL, 'tersedia', 34, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:24');
INSERT INTO `laboratories` VALUES (58, 5, 'Lab. Beton', NULL, 'tersedia', 34, '<p>\r\n\r\nDilengkapi dengan peralatan uji beton dan bahan\r\n\r\n<br></p>', '<p>\r\n\r\n</p><p>Dilengkapi dengan peralatan uji beton dan bahan, antara lain :</p><p></p><ul><li>universal testing machine (utm) 1000 ton, 200 ton, dan 50 ton.</li><li>Analisa gradasi material</li><li>Konsistensi beton,</li><li>Berat jenis bahan.</li></ul><p></p>\r\n\r\n<br><p></p>', 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', 100000.00, '20240806_155831_lab_beton.jpg', NULL, '2024-10-17 20:22:47');
INSERT INTO `laboratories` VALUES (59, 5, 'Lab. Mekanika Tanah', NULL, 'tersedia', 34, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:24');
INSERT INTO `laboratories` VALUES (60, 5, 'Lab. Studio Gambar Manual', NULL, 'tersedia', 35, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:24');
INSERT INTO `laboratories` VALUES (61, 5, 'Lab. Komputer', NULL, 'tersedia', 35, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:24');
INSERT INTO `laboratories` VALUES (62, 5, 'Lab. Ilmu Ukur Tanah', NULL, 'tersedia', 36, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_tool', 100000.00, NULL, NULL, '2024-08-06 20:49:47');
INSERT INTO `laboratories` VALUES (63, 5, 'Bengkel batu & Beton', NULL, 'tersedia', 36, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:24');
INSERT INTO `laboratories` VALUES (64, 5, 'Bengkel Plambing', NULL, 'tersedia', 36, NULL, NULL, 'Prodi S1 Teknik Sipil dan Prodi S1 Pendidikan Teknik Bangunan', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:24');
INSERT INTO `laboratories` VALUES (65, 7, 'Lab. Fashion Enterpreneur', NULL, 'tersedia', 37, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, 0.00, NULL, NULL, '2024-10-17 07:09:15');
INSERT INTO `laboratories` VALUES (66, 7, 'Lab. Manajemen Busana', NULL, 'tersedia', 37, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:16');
INSERT INTO `laboratories` VALUES (67, 7, 'Lab. Solus Per-Aqua (SPA)', NULL, 'tersedia', 38, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:16');
INSERT INTO `laboratories` VALUES (69, 7, 'Lab. Pengelolaan Usaha Busana', NULL, 'tersedia', 39, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:16');
INSERT INTO `laboratories` VALUES (70, 7, 'Lab. Bordir', NULL, 'tersedia', 39, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:16');
INSERT INTO `laboratories` VALUES (71, 7, 'Lab. Desain', NULL, 'tersedia', 40, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:16');
INSERT INTO `laboratories` VALUES (72, 7, 'Lab. Draping', NULL, 'tersedia', 40, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_tool', 800000.00, NULL, NULL, '2024-10-17 07:09:16');
INSERT INTO `laboratories` VALUES (73, 7, 'Lab. Konstruksi Pola Busana', NULL, 'tersedia', 41, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:16');
INSERT INTO `laboratories` VALUES (74, 7, 'Lab. Tekstil', NULL, 'tersedia', 41, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:16');
INSERT INTO `laboratories` VALUES (75, 8, 'Lab. Tata Rias', NULL, 'tersedia', 42, '<p>Laboratorium Tata Rias</p>', '<p>Laboratorium yang diperuntukkan untuk kegiatan praktikum,pembelajaran, penelitian, serta pelatijhan dibidang tata rias</p>', 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, 100000.00, NULL, NULL, '2024-10-17 07:09:16');
INSERT INTO `laboratories` VALUES (76, 8, 'Lab. Perawatan Rambut', NULL, 'tersedia', 42, '<p>Laboratorium Perawatan Rambut</p>', '<p>Laboratorium yang diperuntukkan untuk kegiatan praktikum perawatan rambut seperti creambath, SPA, Hair mask, Dry treatment dan penataan rambut</p>', 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, NULL, 100000.00, NULL, NULL, '2024-10-17 07:09:16');
INSERT INTO `laboratories` VALUES (77, 8, 'Lab. Perawatan Kulit', NULL, 'tersedia', 43, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:16');
INSERT INTO `laboratories` VALUES (78, 8, 'Lab. Tata Rias Wajah', NULL, 'tersedia', 43, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:17');
INSERT INTO `laboratories` VALUES (79, 8, 'Lab. Pengelolaan Usaha / Salon', NULL, 'tersedia', 44, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:17');
INSERT INTO `laboratories` VALUES (80, 8, 'Lab. Pengantin ', NULL, 'tersedia', 44, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:17');
INSERT INTO `laboratories` VALUES (81, 6, 'Lab. Pengolahan Makanan Kontinental (PM-3)', NULL, 'tersedia', 45, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:17');
INSERT INTO `laboratories` VALUES (82, 6, 'Lab. Restoran', NULL, 'tersedia', 45, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:17');
INSERT INTO `laboratories` VALUES (83, 6, 'Lab. Coklat', NULL, 'tersedia', 45, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:17');
INSERT INTO `laboratories` VALUES (84, 6, 'Lab. Pengolahan Makanan-2', NULL, 'tersedia', 46, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:17');
INSERT INTO `laboratories` VALUES (85, 6, 'Lab. Bakery Pastry', NULL, 'tersedia', 46, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:17');
INSERT INTO `laboratories` VALUES (86, 6, 'Lab. Kafetaria', NULL, 'tersedia', 46, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:17');
INSERT INTO `laboratories` VALUES (87, 6, 'Lab. Pengolahan Makanan-1', NULL, 'tersedia', 47, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:17');
INSERT INTO `laboratories` VALUES (88, 6, 'Lab. Komputer/Multimedia', NULL, 'tersedia', 47, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', 5000000.00, NULL, NULL, '2024-10-17 07:09:17');
INSERT INTO `laboratories` VALUES (89, 6, 'Lab. Teknologi Pangan', NULL, 'tersedia', 47, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:18');
INSERT INTO `laboratories` VALUES (90, 6, 'Lab. IPA', NULL, 'tersedia', 47, NULL, NULL, 'Prodi S1 Pendidikan Tata Boga, Prodi S1 Pendidikan Tata Busana, dan Prodi S1 Pendidikan Tata Rias', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-10-17 07:09:18');
INSERT INTO `laboratories` VALUES (91, 3, 'Lab. Multimedia', NULL, 'tersedia', 48, NULL, NULL, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:25');
INSERT INTO `laboratories` VALUES (92, 3, 'Lab. Pengembangan Media', NULL, 'tersedia', 48, NULL, NULL, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:25');
INSERT INTO `laboratories` VALUES (93, 3, 'Lab. Sistem Informasi', NULL, 'tersedia', 49, NULL, NULL, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:25');
INSERT INTO `laboratories` VALUES (94, 3, 'Lab. Jaringan Komputer Dasar', NULL, 'tersedia', 49, NULL, NULL, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:25');
INSERT INTO `laboratories` VALUES (95, 3, 'Lab. Rekayasa Perangkat Lunak', NULL, 'tersedia', 50, NULL, NULL, 'Prodi S1 Teknik Informatika, Prodi S1 Pendidikan Teknologi Informasi dan Prodi S1 Sistem Informasi', NULL, NULL, 'by_day', NULL, NULL, NULL, '2024-07-15 09:35:25');
INSERT INTO `laboratories` VALUES (100, 4, 'Lab Chasiss - Pelatihan', NULL, 'tersedia', 28, '<p>Pelatihan spooring balancing</p>', NULL, 'Unesa', NULL, NULL, 'by_day', 15000000.00, NULL, '2024-07-24 12:20:01', '2024-07-24 12:20:01');
INSERT INTO `laboratories` VALUES (101, 2, 'Lab. Konversi Energi Listrik', NULL, 'tersedia', 4, '<p>Uji listrik</p>', '<p>Uji Listrik</p>', 'Unesa', NULL, NULL, 'by_day', 25000.00, NULL, '2024-08-08 11:10:34', '2024-08-08 11:10:34');
INSERT INTO `laboratories` VALUES (102, 0, 'Lab. Biologi', NULL, 'tersedia', 11, NULL, NULL, 'Unesa', NULL, NULL, NULL, 25000.00, '20240819_151131_lab_biologi.jpg', '2024-08-19 15:11:31', '2024-08-19 15:11:31');
INSERT INTO `laboratories` VALUES (104, 1, 'Lab komputer XX', NULL, 'tersedia', 4, '<p>12</p>', '<p>12</p>', 'Unesa', NULL, NULL, NULL, 25000.00, '20240819_154100_lab_komputer_xx.jpg', '2024-08-19 15:41:00', '2024-08-19 15:41:00');
INSERT INTO `laboratories` VALUES (105, 1, 'lab kimia', NULL, 'tersedia', 4, NULL, NULL, 'Unesa', NULL, NULL, NULL, 25000.00, NULL, '2024-08-19 15:48:57', '2024-08-19 15:53:34');
INSERT INTO `laboratories` VALUES (106, 1, 'Lab. Demo', NULL, 'tersedia', 4, '<p>Lab Uji Coba</p>', '<p>Uji Coba</p>', 'Gedung Uji', NULL, NULL, NULL, 500000.00, '20241008_150129_uji_coba.png', '2024-10-08 08:01:30', '2024-10-11 08:58:26');
INSERT INTO `laboratories` VALUES (107, NULL, 'Kendaraan Listrik', NULL, 'tersedia', 28, NULL, NULL, 'Gedung A7 Lantai 1', NULL, NULL, NULL, 0.00, NULL, '2024-10-15 04:23:58', '2024-10-15 11:25:16');

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
  `laf_base` enum('Hari','Minggu','Bulan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `laf_value` decimal(10, 2) NULL DEFAULT NULL,
  `laf_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `laf_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`laf_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_facilities
-- ----------------------------
INSERT INTO `laboratory_facilities` VALUES (1, '58', 'Elle ADR 3000', 'Alat untuk test tekan beton', 'Elle ADR 3000', 'Hari', 100000.00, 'ADR Touch Control PRO 3000 adalah mesin pengujian kompresi otomatis yang dilengkapi dengan sistem kontrol layar sentuh. Mesin ini dirancang untuk melakukan pengujian kompresi secara akurat dan efisien, serta mematuhi standar BS EN (British Standards and European Norms). Alat ini sering digunakan di laboratorium material, pabrik beton, dan situs konstruksi untuk memastikan kualitas dan kekuatan bahan bangunan.', NULL, '2024-05-16 08:34:04', '2024-05-16 09:17:27', NULL, NULL);
INSERT INTO `laboratory_facilities` VALUES (2, '62', 'Meter Laser', '-', '-', 'Bulan', 150000.00, NULL, NULL, '2024-07-15 11:19:43', '2024-07-22 16:15:08', 2, NULL);
INSERT INTO `laboratory_facilities` VALUES (3, '62', 'Total Station', '-', '-', 'Bulan', 7500000.00, NULL, NULL, '2024-07-15 13:40:16', '2024-07-17 21:03:09', NULL, NULL);
INSERT INTO `laboratory_facilities` VALUES (4, '62', 'Thermometer Digital', NULL, NULL, 'Bulan', 300000.00, NULL, NULL, '2024-07-15 13:41:06', '2024-07-17 21:03:34', NULL, NULL);
INSERT INTO `laboratory_facilities` VALUES (5, '62', 'Theodolit TO', '-', '-', 'Bulan', 650000.00, NULL, NULL, '2024-07-15 13:46:42', '2024-07-17 21:03:53', NULL, NULL);
INSERT INTO `laboratory_facilities` VALUES (6, '62', 'Waterpass', '-', '-', 'Bulan', 1100000.00, NULL, NULL, '2024-07-15 13:47:37', '2024-07-17 21:04:26', NULL, NULL);
INSERT INTO `laboratory_facilities` VALUES (7, '62', 'Hand GPS', '-', '-', 'Bulan', 900000.00, NULL, NULL, '2024-07-15 13:48:24', '2024-07-17 21:05:08', NULL, NULL);
INSERT INTO `laboratory_facilities` VALUES (8, '62', 'GPS RTK', '-', '-', 'Hari', 700000.00, NULL, NULL, '2024-07-15 13:49:05', '2024-07-17 21:05:26', NULL, NULL);
INSERT INTO `laboratory_facilities` VALUES (9, '62', 'ECO SOUNDER', '-', '-', 'Hari', 1500000.00, NULL, NULL, '2024-07-15 13:50:14', '2024-07-17 21:05:38', NULL, NULL);
INSERT INTO `laboratory_facilities` VALUES (10, '62', 'Drone Tanpa Driver', '-', '-', 'Hari', 700000.00, NULL, NULL, '2024-07-15 13:51:31', '2024-07-17 21:06:08', NULL, NULL);
INSERT INTO `laboratory_facilities` VALUES (11, '1', 'Amperemeter AC', 'mengukur tegangan listrick', 'TestTool', 'Hari', 10000.00, 'ini adalah test', '20241007_170242_amperemeter_ac.png', '2024-07-20 21:42:28', '2024-10-07 17:02:42', 0, NULL);
INSERT INTO `laboratory_facilities` VALUES (12, '5', 'Komputer', 'Komputasi', 'Dell', 'Minggu', 1000000.00, 'diskripsi test', NULL, '2024-07-22 16:11:00', '2024-07-23 09:53:25', 2, NULL);
INSERT INTO `laboratory_facilities` VALUES (13, '5', 'test alat', 'test alat', 'Test alat', 'Hari', 300000.00, 'diskripsi test', NULL, '2024-07-22 16:12:07', '2024-07-23 09:52:37', 2, NULL);
INSERT INTO `laboratory_facilities` VALUES (14, '9', 'Laptop Asus', 'Komputasi', 'Asus', 'Hari', 200000.00, NULL, NULL, '2024-07-23 09:23:36', NULL, 2, NULL);
INSERT INTO `laboratory_facilities` VALUES (15, '75', 'Washbak', 'Mencuci Rambut', 'Plastik, besi', 'Hari', 25000.00, 'Alat yang digunakan untuk mencuci rambut klien', NULL, '2024-07-24 12:02:22', '2024-10-15 11:28:12', 42, NULL);
INSERT INTO `laboratory_facilities` VALUES (16, '75', 'Hair Dryer', 'Mengeringkan Rambut', 'Wigo', 'Hari', 30000.00, 'Alat yang digunakan untuk mengeringkan rambut klien', NULL, '2024-07-24 12:03:42', NULL, 42, NULL);
INSERT INTO `laboratory_facilities` VALUES (17, '76', 'Washbak', 'Mencuci Rambut', 'Plastik, besi', 'Hari', 100000.00, 'Alat yang digunakan untuk mencuci rambut klien', NULL, '2024-07-24 12:04:53', NULL, 42, NULL);
INSERT INTO `laboratory_facilities` VALUES (18, '76', 'Hair Dryer', 'Mengeringkan Rambut', 'Wigo', 'Hari', 30000.00, 'Alat yang digunakan untuk mengeringkan rambut klien', NULL, '2024-07-24 12:05:24', NULL, 42, NULL);
INSERT INTO `laboratory_facilities` VALUES (19, '71', 'Alat Basic', 'Desain Basic', 'Alat Basic', 'Hari', 900000.00, 'Meja Desain, Meja Jiplak, Pensil Warna, Kuas, Palet, Cat Air, Copic', NULL, '2024-07-24 12:12:44', NULL, 40, NULL);
INSERT INTO `laboratory_facilities` VALUES (20, '57', '13saf', 'dvdsfv', 'sdbvfd', 'Hari', 13445.00, 'dsbh', NULL, '2024-07-24 12:14:00', NULL, 34, NULL);
INSERT INTO `laboratory_facilities` VALUES (21, '71', 'Alat Advance', 'Desain Advance', 'Alat Advance', 'Hari', 1000000.00, 'Meja Desain, Meja Jiplak, Pensil Warna, Kuas, Palet, Cat Air, Copic', NULL, '2024-07-24 12:14:22', NULL, 40, NULL);
INSERT INTO `laboratory_facilities` VALUES (22, '72', 'Dressfoam', 'Draping', 'Desaku', 'Hari', 50000.00, 'Dressfoam penyangga besi dan bisa ditusuk jarum', NULL, '2024-07-24 12:18:50', NULL, 40, NULL);
INSERT INTO `laboratory_facilities` VALUES (23, '72', 'Mesin Jahit Highspeed', 'Menjahit Busana', 'Juki', 'Hari', 50000.00, 'Dapat digunakan menjahit kain tipis, sedang dan tebal', NULL, '2024-07-24 12:20:29', NULL, 40, NULL);
INSERT INTO `laboratory_facilities` VALUES (24, '41', 'alat spooring dan balance roda', 'spooring dan balance roda', 'lounch', 'Hari', 250000.00, NULL, NULL, '2024-07-24 12:22:18', NULL, 28, NULL);
INSERT INTO `laboratory_facilities` VALUES (25, '100', 'alat spooring dan balance roda', 'pelatihan spooring dan balance roda', 'lounch', 'Hari', 0.00, NULL, NULL, '2024-07-24 12:25:54', '2024-07-24 12:26:51', 28, NULL);
INSERT INTO `laboratory_facilities` VALUES (26, '72', 'Pelatihan Basic Draping', 'Pembuatan Pola Draping', 'Pelatihan Basic Draping', 'Hari', 2600000.00, 'Dressfoam penyangga besi dan bisa ditusuk jarum, Mesin Jahit Highspeed', NULL, '2024-07-24 12:54:43', NULL, 40, NULL);
INSERT INTO `laboratory_facilities` VALUES (27, '72', 'Pelatihan Advance Draping', 'Draping Kain', 'Pelatihan Advance Draping', 'Hari', 3000000.00, 'Dressform penyangga besi dan bisa ditusuk jarum, Mesin Jahit Highspeed', NULL, '2024-07-24 12:56:22', NULL, 40, NULL);
INSERT INTO `laboratory_facilities` VALUES (28, '76', 'Hair Straightener (Catok)', 'Hair Styling', 'Plastik, besi', 'Hari', 30000.00, 'Alat yang digunakan untuk menata rambut klien', NULL, '2024-07-24 13:33:43', NULL, 42, NULL);
INSERT INTO `laboratory_facilities` VALUES (29, '75', 'Tripod', 'Standing Holder Manekin', 'Besi', 'Hari', 30000.00, 'Alat yang digunakan untuk meletakkan manekin', NULL, '2024-07-24 13:37:27', NULL, 42, NULL);
INSERT INTO `laboratory_facilities` VALUES (30, '1', 'Laptop', 'Komputasi', 'Asus', 'Hari', 25000.00, NULL, '20241007_170124_laptop.png', '2024-08-08 11:08:10', '2024-10-07 17:01:24', 0, NULL);
INSERT INTO `laboratory_facilities` VALUES (31, '1', 'Kalkulator Science', 'Menghitung', 'Seiko', 'Hari', 5000.00, NULL, NULL, '2024-10-14 08:49:52', NULL, 11, NULL);
INSERT INTO `laboratory_facilities` VALUES (32, '66', 'test alat 123', 'kegunaannya', 'Test alat', 'Hari', 1000000.00, NULL, NULL, '2024-10-14 09:01:59', NULL, 78, NULL);
INSERT INTO `laboratory_facilities` VALUES (33, '95', 'test alat', 'test', 'test ', 'Hari', 99999999.99, 'test', '20241015_111951_sddlajkasdlaskdksldkakdlakdlakdlakdlaskdlakdlkkakflkasldklaskdlaksdlaksdlakdkaldkaslkdalskdlasdkaslkdasldkalskdalskdlaksdlkaldkalkdlakdlsklakdlaksdlkasldkalskdalkdlakdlaksdlkasdkalkdlakdlkaslsdkalkdlakdlaskdlakslakdlakdlakdl.jpg', '2024-10-15 04:17:23', '2024-10-15 11:19:51', 50, NULL);
INSERT INTO `laboratory_facilities` VALUES (34, '95', 'TES', 'TES', 'TES', 'Hari', 1223.00, 'TES', NULL, '2024-10-15 04:20:22', NULL, 50, NULL);
INSERT INTO `laboratory_facilities` VALUES (35, '95', 'tes', 'tes', 'tes', 'Hari', 900000.00, 'tes', '20241015_112514_tes.jpg', '2024-10-15 04:25:14', NULL, 50, NULL);
INSERT INTO `laboratory_facilities` VALUES (36, '75', 'Catok Rambut', 'Meluruskan rambut. Styling', 'Baby liss', 'Hari', 50000.00, 'Alat yang digunakan untuk menata rambut klien', NULL, '2024-10-15 04:29:48', NULL, 42, NULL);
INSERT INTO `laboratory_facilities` VALUES (37, '75', 'Curling Iron', 'Hair Styling', 'Besi, Baby liss', 'Hari', 30000.00, 'Alat yang digunakan untuk menata rambut klien', NULL, '2024-10-15 04:31:04', NULL, 42, NULL);
INSERT INTO `laboratory_facilities` VALUES (38, '75', 'Trolley', 'Menata alat dan bahan', 'Plastik, Merk Mikata', 'Hari', 20000.00, 'Alat yang digunakan untuk menata alat dan bahan', NULL, '2024-10-15 04:49:39', NULL, 42, NULL);
INSERT INTO `laboratory_facilities` VALUES (39, '89', 'Vacuum Frying', 'Membuta Awetan Buah dan Sayur', 'Kapsistas 20 Liter', 'Hari', 1500000.00, NULL, NULL, '2024-10-15 04:53:46', NULL, 47, NULL);
INSERT INTO `laboratory_facilities` VALUES (40, '70', 'Mesin Bordir', 'Untuk membordir', 'JUKI', 'Hari', 200000.00, 'Mesin Highspeed', NULL, '2024-10-15 04:53:49', '2024-10-15 13:31:30', 78, NULL);
INSERT INTO `laboratory_facilities` VALUES (41, '75', 'Clipper', 'Memangkas Rambut', 'Whall', 'Hari', 50000.00, 'Alat yang digunakan untuk rambut klien', NULL, '2024-10-15 04:56:23', NULL, 42, NULL);
INSERT INTO `laboratory_facilities` VALUES (42, '95', 'tet alat', 'test kegunaan', 'merk test', 'Hari', 800000.00, 'tes', NULL, '2024-10-15 04:56:51', NULL, 50, NULL);
INSERT INTO `laboratory_facilities` VALUES (43, '24', 'Wind tunnel', 'Menguji karakteristik aliran fluida yang melintasi suatu obyek', 'Open sub sonic, 360 x 360 x 1220 (mm)', 'Hari', 150000.00, 'Wind tunnel ini digunakan untuk menguji karakteristik aliran udara yang melintasi suatu obyek, seperti body suatu kendaraan. Meliputi: distribusi tekanan, fenomena aliran yang terjadi disekeliling obyek. Fasilitas ini disewakan dalam jam pemakaian', '20241015_120854_wind_tunnel.jpg', '2024-10-15 05:08:54', NULL, 22, NULL);
INSERT INTO `laboratory_facilities` VALUES (44, '63', 'Cetok', 'Untuk mengolah semen', 'Cap Mata', 'Hari', 0.00, NULL, NULL, '2024-10-15 06:27:46', '2024-10-15 14:26:54', 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (45, '63', 'Molen', 'Membuat adukan atau luluh', 'Golden Start', 'Hari', 0.00, 'Campuran Beton', '20241015_141411_molen.jpg', '2024-10-15 07:06:13', '2024-10-15 14:27:01', 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (46, '63', 'Sekop', 'Mencampur Adukan', 'Cap Mata', 'Hari', 0.00, NULL, NULL, '2024-10-15 07:10:10', '2024-10-15 14:27:09', 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (47, '63', 'Bak Dorong', 'Angkut Material', 'Barata', 'Hari', 0.00, NULL, NULL, '2024-10-15 12:57:56', NULL, 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (48, '63', 'Bak Pengaduk Spesi', 'Tempat Spesi', 'Lokal', 'Hari', 0.00, NULL, NULL, '2024-10-15 12:58:38', NULL, 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (49, '63', 'Bodem', 'Pemukul Alat', 'Lokal', 'Hari', 0.00, NULL, NULL, '2024-10-15 12:59:16', NULL, 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (50, '63', 'Catut', 'Ram Besi', 'Cap Buaya', 'Hari', 0.00, NULL, NULL, '2024-10-15 12:59:45', NULL, 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (51, '63', 'Cetakan Batako', 'Alat Cetak', 'Lokal', 'Hari', 0.00, NULL, NULL, '2024-10-15 13:00:22', NULL, 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (52, '63', 'Gergaji Besi', 'Pemotong Besi', 'Lokal', 'Hari', 0.00, NULL, NULL, '2024-10-15 13:01:20', NULL, 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (53, '63', 'Helm Proyek', 'Pelindung Kepala', 'Maspion', 'Hari', 0.00, NULL, NULL, '2024-10-15 13:01:54', NULL, 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (54, '63', 'Line Bobine', 'Kolom', 'Cap Buaya', 'Hari', 0.00, NULL, NULL, '2024-10-15 13:02:36', NULL, 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (55, '63', 'Martil', 'Pemukul Alat', 'Cap Mata', 'Hari', 0.00, NULL, NULL, '2024-10-15 13:03:16', NULL, 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (56, '63', 'Sakapolding', 'Alat Dudukan', 'Lokal', 'Hari', 0.00, NULL, NULL, '2024-10-15 13:04:36', NULL, 190, NULL);
INSERT INTO `laboratory_facilities` VALUES (57, '81', 'Chiller', 'Menyimpan Bahan pada Suhu Rendah', 'Nayati', 'Hari', 0.00, 'Nayati 200-240 V Model NRG 4 2/1 Serial CC74138011AA', '20241016_082638_chiller.jpg', '2024-10-16 01:17:30', '2024-10-16 08:27:49', 82, NULL);
INSERT INTO `laboratory_facilities` VALUES (58, '81', 'Blixer', 'Menghaluskan Bahan Makanan', 'Robot Coupe', 'Hari', 0.00, 'Robot Coupe Blixer Type 3 Kapasitas 3.7L', '20241016_082810_blixer.jpg', '2024-10-16 01:19:47', '2024-10-16 08:28:10', 82, NULL);
INSERT INTO `laboratory_facilities` VALUES (59, '81', 'Freezer', 'Menyimpan Bahan pada Suhu Beku', 'Gea', 'Hari', 0.00, 'Gea 2019', '20241016_083306_freezer.jpg', '2024-10-16 01:31:40', '2024-10-16 08:33:06', 82, NULL);
INSERT INTO `laboratory_facilities` VALUES (60, '81', 'Oven', 'Memanggang, Membakar dan Mengeringkan Makanan Pada Suhu Tinggi 100-250 C', 'Isiper', 'Hari', 0.00, 'Oven Berbahan Bakar Gas, 2 Rak dengan 4 sumbu api', '20241016_084214_oven.jpg', '2024-10-16 01:42:14', NULL, 82, NULL);
INSERT INTO `laboratory_facilities` VALUES (61, '81', 'Gelas Ukur', 'Alat Ukur Volume Cairan, Tepung, Gula Beras', 'Lion Star', 'Hari', 0.00, 'Alat Berbahan Plastik Kapasitas 500 - 1000 ml', '20241016_085430_gelas_ukur.jpg', '2024-10-16 01:54:30', NULL, 82, NULL);
INSERT INTO `laboratory_facilities` VALUES (62, '81', 'Tray Bahan', 'Menyiapkan, Menyimpan Bahan Makanan', 'Lion Star', 'Hari', 0.00, 'Alat Plastik Ukuran 23 x 30 cm', '20241016_100054_tray_bahan.jpg', '2024-10-16 03:00:54', NULL, 82, NULL);
INSERT INTO `laboratory_facilities` VALUES (63, '81', 'Kompor Pornes', 'Memasak dan Memanaskan Bahan Makanan', 'Econa', 'Hari', 0.00, 'Kompor 2 tungku dengan bahan bakar gas elpiji', '20241016_103247_kompor_pornes.jpg', '2024-10-16 03:32:47', NULL, 82, NULL);
INSERT INTO `laboratory_facilities` VALUES (64, '81', 'Kompor Portable', 'Memasak dan Memanaskan Bahan Makanan', 'Rinnai', 'Hari', 0.00, 'Rinnai R1-602A', '20241016_104207_kompor_portable.jpg', '2024-10-16 03:42:07', NULL, 82, NULL);
INSERT INTO `laboratory_facilities` VALUES (65, '38', 'Pengujian Performa Pompa', 'menguji performa pompa rumah tangga skala < 100 w', 'buatan sendiri', 'Hari', 100000.00, 'sistem perpompaan dan pengukuran secaara manual', NULL, '2024-10-17 02:16:13', NULL, 27, NULL);
INSERT INTO `laboratory_facilities` VALUES (66, '38', 'infra red tachometer', 'mengukur kecepatan putaran poros', 'Krisbow', 'Hari', 100000.00, 'kecepatan 0-25 m/s', NULL, '2024-10-17 02:17:51', NULL, 27, NULL);
INSERT INTO `laboratory_facilities` VALUES (67, '39', 'Tererowongan angin jenis open', 'mensimulasikan kecepatan angin', 'Buatan Sendiri', 'Hari', 100000.00, 'kecepatan angin 0-7,5 m/s', NULL, '2024-10-17 02:20:59', '2024-10-17 09:21:27', 27, NULL);
INSERT INTO `laboratory_facilities` VALUES (68, '39', 'hot wire anemometer', 'mengukur kecepatan angin', 'Krisbow', 'Hari', 125000.00, 'mengukur kecepatan angin 0-25 m/s', NULL, '2024-10-17 02:29:37', NULL, 27, NULL);
INSERT INTO `laboratory_facilities` VALUES (69, '39', 'solarimeter', 'mengukur intensitas matahari', 'krisbow', 'Hari', 125000.00, 'intensitas hingga 1400 w/m2', NULL, '2024-10-17 02:30:30', NULL, 27, NULL);
INSERT INTO `laboratory_facilities` VALUES (70, '39', 'infra red tachometer', 'mengukur kecepatan putaran', 'lutron', 'Hari', 100000.00, 'mengukur kecepatan putar 0-25 m/s', NULL, '2024-10-17 02:31:34', NULL, 27, NULL);

-- ----------------------------
-- Table structure for laboratory_facility_count_statuses
-- ----------------------------
DROP TABLE IF EXISTS `laboratory_facility_count_statuses`;
CREATE TABLE `laboratory_facility_count_statuses`  (
  `lcs_id` int(11) NOT NULL,
  `lcs_facility` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lcs_count` int(11) NULL DEFAULT NULL,
  `lcs_ready` int(11) NULL DEFAULT NULL,
  `lcs_used` int(11) NULL DEFAULT NULL,
  `lcs_unwearable` int(11) NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`lcs_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_facility_count_statuses
-- ----------------------------
INSERT INTO `laboratory_facility_count_statuses` VALUES (1, '2', 3, 1, 3, 0, '2024-07-22 16:17:33', '2024-07-15 11:19:43');
INSERT INTO `laboratory_facility_count_statuses` VALUES (2, '3', 2, 2, 0, 0, '2024-07-21 23:26:46', '2024-07-15 13:40:16');
INSERT INTO `laboratory_facility_count_statuses` VALUES (3, '4', 2, 2, 0, 0, '2024-07-21 23:26:46', '2024-07-15 13:41:06');
INSERT INTO `laboratory_facility_count_statuses` VALUES (4, '5', 2, 2, 0, 0, '2024-07-21 23:26:46', '2024-07-15 13:46:42');
INSERT INTO `laboratory_facility_count_statuses` VALUES (5, '6', 2, 2, 0, 0, '2024-07-21 23:26:46', '2024-07-15 13:47:37');
INSERT INTO `laboratory_facility_count_statuses` VALUES (6, '7', 2, 1, 1, 0, '2024-07-23 10:19:10', '2024-07-15 13:48:24');
INSERT INTO `laboratory_facility_count_statuses` VALUES (7, '8', 2, 2, 0, 0, '2024-07-21 23:26:46', '2024-07-15 13:49:05');
INSERT INTO `laboratory_facility_count_statuses` VALUES (8, '9', 2, 1, 1, 0, '2024-07-30 16:03:53', '2024-07-15 13:50:14');
INSERT INTO `laboratory_facility_count_statuses` VALUES (9, '10', 2, 2, 0, 0, '2024-07-21 23:26:46', '2024-07-15 13:51:31');
INSERT INTO `laboratory_facility_count_statuses` VALUES (10, '11', 5, 0, 5, 0, '2024-10-07 17:02:42', '2024-07-20 21:42:28');
INSERT INTO `laboratory_facility_count_statuses` VALUES (11, '1', 1, 0, 1, 0, '2024-09-09 10:35:23', '2024-07-21 22:02:45');
INSERT INTO `laboratory_facility_count_statuses` VALUES (12, '12', 2, 2, 0, 0, '2024-07-23 09:53:25', '2024-07-22 16:11:00');
INSERT INTO `laboratory_facility_count_statuses` VALUES (13, '13', 2, 3, 0, 0, '2024-07-23 09:52:37', '2024-07-22 16:12:07');
INSERT INTO `laboratory_facility_count_statuses` VALUES (14, '14', 10, 8, 0, 2, '2024-07-23 09:43:44', '2024-07-23 09:23:36');
INSERT INTO `laboratory_facility_count_statuses` VALUES (15, '15', 1, 1, 0, 0, '2024-10-15 11:28:12', '2024-07-24 12:02:22');
INSERT INTO `laboratory_facility_count_statuses` VALUES (16, '16', 1, 1, 0, 0, NULL, '2024-07-24 12:03:42');
INSERT INTO `laboratory_facility_count_statuses` VALUES (17, '17', 1, 1, 0, 0, NULL, '2024-07-24 12:04:53');
INSERT INTO `laboratory_facility_count_statuses` VALUES (18, '18', 1, 1, 0, 0, NULL, '2024-07-24 12:05:24');
INSERT INTO `laboratory_facility_count_statuses` VALUES (19, '19', 25, 25, 0, 0, NULL, '2024-07-24 12:12:44');
INSERT INTO `laboratory_facility_count_statuses` VALUES (20, '20', 132, 132, 0, 0, NULL, '2024-07-24 12:14:00');
INSERT INTO `laboratory_facility_count_statuses` VALUES (21, '21', 30, 30, 0, 0, NULL, '2024-07-24 12:14:22');
INSERT INTO `laboratory_facility_count_statuses` VALUES (22, '22', 10, 10, 0, 0, NULL, '2024-07-24 12:18:50');
INSERT INTO `laboratory_facility_count_statuses` VALUES (23, '23', 5, 5, 0, 0, NULL, '2024-07-24 12:20:29');
INSERT INTO `laboratory_facility_count_statuses` VALUES (24, '24', 1, 1, 0, 0, NULL, '2024-07-24 12:22:18');
INSERT INTO `laboratory_facility_count_statuses` VALUES (25, '25', 1, 1, 0, 0, '2024-07-24 12:26:51', '2024-07-24 12:25:54');
INSERT INTO `laboratory_facility_count_statuses` VALUES (26, '26', 10, 9, 1, 0, '2024-07-24 13:54:02', '2024-07-24 12:54:43');
INSERT INTO `laboratory_facility_count_statuses` VALUES (27, '27', 10, 8, 2, 0, '2024-07-24 14:01:07', '2024-07-24 12:56:22');
INSERT INTO `laboratory_facility_count_statuses` VALUES (28, '28', 1, 1, 0, 0, NULL, '2024-07-24 13:33:43');
INSERT INTO `laboratory_facility_count_statuses` VALUES (29, '29', 1, 1, 0, 0, NULL, '2024-07-24 13:37:27');
INSERT INTO `laboratory_facility_count_statuses` VALUES (30, '30', 13, 3, 8, 2, '2024-10-16 10:29:46', '2024-08-08 11:08:10');
INSERT INTO `laboratory_facility_count_statuses` VALUES (31, '31', 10, 10, 0, 0, NULL, '2024-10-14 08:49:52');
INSERT INTO `laboratory_facility_count_statuses` VALUES (32, '32', 2, 0, 2, 0, '2024-10-14 16:12:30', '2024-10-14 09:01:59');
INSERT INTO `laboratory_facility_count_statuses` VALUES (33, '33', 90002, 90002, 0, 0, '2024-10-15 11:19:51', '2024-10-15 04:17:23');
INSERT INTO `laboratory_facility_count_statuses` VALUES (34, '34', 2147483647, 2147483647, 0, 0, NULL, '2024-10-15 04:20:22');
INSERT INTO `laboratory_facility_count_statuses` VALUES (35, '35', 10, 10, 0, 0, NULL, '2024-10-15 04:25:14');
INSERT INTO `laboratory_facility_count_statuses` VALUES (36, '36', 2, 2, 0, 0, NULL, '2024-10-15 04:29:48');
INSERT INTO `laboratory_facility_count_statuses` VALUES (37, '37', 2, 2, 0, 0, NULL, '2024-10-15 04:31:04');
INSERT INTO `laboratory_facility_count_statuses` VALUES (38, '38', 4, 4, 0, 0, NULL, '2024-10-15 04:49:39');
INSERT INTO `laboratory_facility_count_statuses` VALUES (39, '39', 1, 1, 0, 0, NULL, '2024-10-15 04:53:46');
INSERT INTO `laboratory_facility_count_statuses` VALUES (40, '40', 25, 10, 10, 15, '2024-10-15 13:31:30', '2024-10-15 04:53:49');
INSERT INTO `laboratory_facility_count_statuses` VALUES (41, '41', 3, 3, 0, 0, NULL, '2024-10-15 04:56:23');
INSERT INTO `laboratory_facility_count_statuses` VALUES (42, '42', 6, 6, 0, 0, NULL, '2024-10-15 04:56:51');
INSERT INTO `laboratory_facility_count_statuses` VALUES (43, '43', 1, 1, 0, 0, NULL, '2024-10-15 05:08:54');
INSERT INTO `laboratory_facility_count_statuses` VALUES (44, '44', 22, 10, 0, 12, '2024-10-15 14:26:54', '2024-10-15 06:27:46');
INSERT INTO `laboratory_facility_count_statuses` VALUES (45, '45', 2, 2, 0, 0, '2024-10-15 14:27:01', '2024-10-15 07:06:13');
INSERT INTO `laboratory_facility_count_statuses` VALUES (46, '46', 7, 2, 0, 5, '2024-10-15 14:27:09', '2024-10-15 07:10:10');
INSERT INTO `laboratory_facility_count_statuses` VALUES (47, '47', 4, 4, 0, 0, NULL, '2024-10-15 12:57:56');
INSERT INTO `laboratory_facility_count_statuses` VALUES (48, '48', 2, 2, 0, 0, NULL, '2024-10-15 12:58:38');
INSERT INTO `laboratory_facility_count_statuses` VALUES (49, '49', 1, 1, 0, 0, NULL, '2024-10-15 12:59:16');
INSERT INTO `laboratory_facility_count_statuses` VALUES (50, '50', 3, 3, 0, 0, NULL, '2024-10-15 12:59:45');
INSERT INTO `laboratory_facility_count_statuses` VALUES (51, '51', 1, 1, 0, 0, NULL, '2024-10-15 13:00:22');
INSERT INTO `laboratory_facility_count_statuses` VALUES (52, '52', 4, 4, 0, 0, NULL, '2024-10-15 13:01:20');
INSERT INTO `laboratory_facility_count_statuses` VALUES (53, '53', 19, 19, 0, 0, NULL, '2024-10-15 13:01:54');
INSERT INTO `laboratory_facility_count_statuses` VALUES (54, '54', 8, 8, 0, 0, NULL, '2024-10-15 13:02:36');
INSERT INTO `laboratory_facility_count_statuses` VALUES (55, '55', 1, 1, 0, 0, NULL, '2024-10-15 13:03:16');
INSERT INTO `laboratory_facility_count_statuses` VALUES (56, '56', 1, 1, 0, 0, NULL, '2024-10-15 13:04:36');
INSERT INTO `laboratory_facility_count_statuses` VALUES (57, '57', 1, 1, 0, 0, '2024-10-16 08:27:49', '2024-10-16 01:17:30');
INSERT INTO `laboratory_facility_count_statuses` VALUES (58, '58', 1, 1, 0, 0, '2024-10-16 08:28:11', '2024-10-16 01:19:47');
INSERT INTO `laboratory_facility_count_statuses` VALUES (59, '59', 1, 1, 0, 0, '2024-10-16 08:33:06', '2024-10-16 01:31:40');
INSERT INTO `laboratory_facility_count_statuses` VALUES (60, '60', 1, 1, 0, 0, NULL, '2024-10-16 01:42:14');
INSERT INTO `laboratory_facility_count_statuses` VALUES (61, '61', 20, 20, 0, 0, NULL, '2024-10-16 01:54:30');
INSERT INTO `laboratory_facility_count_statuses` VALUES (62, '62', 14, 14, 0, 0, NULL, '2024-10-16 03:00:54');
INSERT INTO `laboratory_facility_count_statuses` VALUES (63, '63', 6, 6, 0, 0, NULL, '2024-10-16 03:32:47');
INSERT INTO `laboratory_facility_count_statuses` VALUES (64, '64', 6, 6, 0, 0, NULL, '2024-10-16 03:42:07');
INSERT INTO `laboratory_facility_count_statuses` VALUES (65, '65', 1, 1, 0, 0, NULL, '2024-10-17 02:16:13');
INSERT INTO `laboratory_facility_count_statuses` VALUES (66, '66', 1, 1, 0, 0, NULL, '2024-10-17 02:17:51');
INSERT INTO `laboratory_facility_count_statuses` VALUES (67, '67', 1, 1, 0, 0, '2024-10-17 09:21:27', '2024-10-17 02:20:59');
INSERT INTO `laboratory_facility_count_statuses` VALUES (68, '68', 1, 1, 0, 0, NULL, '2024-10-17 02:29:37');
INSERT INTO `laboratory_facility_count_statuses` VALUES (69, '69', 1, 1, 0, 0, NULL, '2024-10-17 02:30:30');
INSERT INTO `laboratory_facility_count_statuses` VALUES (70, '70', 1, 1, 0, 0, NULL, '2024-10-17 02:31:34');

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
INSERT INTO `laboratory_labtest_facilities` VALUES (4, 3, '11');
INSERT INTO `laboratory_labtest_facilities` VALUES (5, 3, '30');
INSERT INTO `laboratory_labtest_facilities` VALUES (6, 2, '11');
INSERT INTO `laboratory_labtest_facilities` VALUES (7, 2, '30');
INSERT INTO `laboratory_labtest_facilities` VALUES (9, 1, '1');
INSERT INTO `laboratory_labtest_facilities` VALUES (10, 4, '35');

-- ----------------------------
-- Table structure for laboratory_labtests
-- ----------------------------
DROP TABLE IF EXISTS `laboratory_labtests`;
CREATE TABLE `laboratory_labtests`  (
  `lsv_id` int(11) NOT NULL,
  `lsv_lab_id` int(11) NULL DEFAULT NULL,
  `lsv_status` enum('tersedia','tidak_tersedia') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsv_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsv_price` decimal(10, 2) NULL DEFAULT NULL,
  `lsv_notes_short` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsv_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lsv_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`lsv_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_labtests
-- ----------------------------
INSERT INTO `laboratory_labtests` VALUES (1, 58, 'tersedia', 'Menguji listrik', 150000.00, 'Sarana untuk menguji listrik', 'Sarana untuk menguji listrik', NULL, '2024-10-11 14:28:53', NULL);
INSERT INTO `laboratory_labtests` VALUES (2, 1, NULL, 'Uji Kekuatan Listrik', 22324.00, NULL, NULL, NULL, '2024-08-08 22:11:42', NULL);
INSERT INTO `laboratory_labtests` VALUES (3, 1, NULL, 'Uji Kekuatan Listrik', 25000.00, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `laboratory_labtests` VALUES (4, 95, NULL, 'tes', 900000.00, '<p>tes</p>', '<p>tes</p>', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for laboratory_options
-- ----------------------------
DROP TABLE IF EXISTS `laboratory_options`;
CREATE TABLE `laboratory_options`  (
  `lop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lop_lab_id` int(10) UNSIGNED NOT NULL,
  `lop_pinjam_lab` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lop_sewa_alat_lab` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lop_uji_lab` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp(),
  `updated_at` datetime NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lop_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 204 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratory_options
-- ----------------------------
INSERT INTO `laboratory_options` VALUES (101, 1, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-10-14 15:23:04');
INSERT INTO `laboratory_options` VALUES (102, 2, 'true', 'true', 'false', '2024-07-25 13:03:34', '2024-10-14 14:23:40');
INSERT INTO `laboratory_options` VALUES (103, 3, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (104, 4, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (105, 5, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (106, 6, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (107, 7, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (108, 8, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (109, 9, 'true', 'true', 'false', '2024-07-25 13:03:34', '2024-10-14 15:24:06');
INSERT INTO `laboratory_options` VALUES (110, 10, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (111, 11, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (112, 12, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (113, 13, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (114, 14, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (115, 15, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (116, 16, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:18');
INSERT INTO `laboratory_options` VALUES (117, 17, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-10-15 11:15:55');
INSERT INTO `laboratory_options` VALUES (118, 18, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (119, 19, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (120, 20, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (121, 21, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (122, 22, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (123, 23, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (124, 24, 'true', 'true', 'true', '2024-07-25 13:03:34', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (125, 25, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (126, 26, 'true', 'true', 'false', '2024-07-25 13:03:35', '2024-10-15 09:52:57');
INSERT INTO `laboratory_options` VALUES (127, 27, 'true', 'true', 'false', '2024-07-25 13:03:35', '2024-10-15 09:53:40');
INSERT INTO `laboratory_options` VALUES (128, 28, 'true', 'true', 'false', '2024-07-25 13:03:35', '2024-10-15 09:53:53');
INSERT INTO `laboratory_options` VALUES (129, 29, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-10-17 08:51:16');
INSERT INTO `laboratory_options` VALUES (130, 30, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (131, 31, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (132, 32, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (133, 33, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (134, 34, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (135, 35, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (136, 36, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (137, 37, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (138, 38, 'true', 'true', 'false', '2024-07-25 13:03:35', '2024-10-17 09:13:13');
INSERT INTO `laboratory_options` VALUES (139, 39, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (140, 40, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (141, 41, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-10-15 11:41:52');
INSERT INTO `laboratory_options` VALUES (142, 42, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-10-15 11:27:00');
INSERT INTO `laboratory_options` VALUES (143, 43, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-10-15 11:34:28');
INSERT INTO `laboratory_options` VALUES (144, 44, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (145, 45, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (146, 46, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (147, 47, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (148, 48, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:19');
INSERT INTO `laboratory_options` VALUES (149, 49, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (150, 50, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (151, 51, 'true', 'true', 'true', '2024-07-25 13:03:35', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (152, 52, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (153, 53, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (154, 54, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (155, 55, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (156, 56, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-10-17 22:10:51');
INSERT INTO `laboratory_options` VALUES (157, 57, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (158, 58, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-10-17 20:22:47');
INSERT INTO `laboratory_options` VALUES (159, 59, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (160, 60, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (161, 61, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (162, 62, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (163, 63, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (164, 64, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (165, 65, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-10-17 13:49:47');
INSERT INTO `laboratory_options` VALUES (166, 66, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (167, 67, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (168, 68, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (169, 69, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (170, 70, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (171, 71, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (172, 72, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (173, 73, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:20');
INSERT INTO `laboratory_options` VALUES (174, 74, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (175, 75, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-10-15 12:30:56');
INSERT INTO `laboratory_options` VALUES (176, 76, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-10-15 12:38:35');
INSERT INTO `laboratory_options` VALUES (177, 77, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (178, 78, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (179, 79, 'true', 'true', 'true', '2024-07-25 13:03:36', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (180, 80, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (181, 81, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (182, 82, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (183, 83, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (184, 84, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (185, 85, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (186, 86, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (187, 87, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (188, 88, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (189, 89, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (190, 90, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (191, 91, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (192, 92, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (193, 93, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (194, 94, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (195, 95, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (196, 96, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (197, 97, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (198, 98, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (199, 99, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (200, 100, 'true', 'true', 'true', '2024-07-25 13:03:37', '2024-07-25 13:06:21');
INSERT INTO `laboratory_options` VALUES (201, 105, 'true', 'true', 'true', '2024-08-19 15:48:57', '2024-08-19 15:53:33');
INSERT INTO `laboratory_options` VALUES (202, 106, 'true', 'false', 'true', '2024-10-08 08:01:30', '2024-10-11 08:58:26');
INSERT INTO `laboratory_options` VALUES (203, 107, 'false', 'false', 'false', '2024-10-15 04:23:58', '2024-10-15 11:25:16');

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
INSERT INTO `laboratory_technicians` VALUES (4, 4, 52, '2024-05-27 17:10:37', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (5, 5, 53, '2024-05-27 17:10:37', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (6, 6, 52, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (7, 7, 52, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
INSERT INTO `laboratory_technicians` VALUES (8, 8, 54, '2024-05-27 17:10:38', '2024-05-27 17:14:25');
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
INSERT INTO `laboratory_technicians` VALUES (28, 31, 64, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (29, 32, 65, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (30, 33, 65, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (31, 34, 66, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (32, 35, 57, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (33, 36, 60, '2024-05-27 17:10:38', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (34, 37, 60, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (35, 39, 60, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
INSERT INTO `laboratory_technicians` VALUES (36, 40, 62, '2024-05-27 17:10:39', '2024-05-27 17:14:26');
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
INSERT INTO `laboratory_technicians` VALUES (52, 57, 72, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (54, 59, 74, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (55, 60, 75, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (56, 61, 68, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (57, 62, 75, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (59, 64, 69, '2024-05-27 17:10:39', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (61, 66, 78, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (62, 67, 79, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (63, 68, 80, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (64, 69, 77, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (65, 70, 78, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (66, 71, 81, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (68, 73, 78, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
INSERT INTO `laboratory_technicians` VALUES (69, 74, 78, '2024-05-27 17:10:40', '2024-05-27 17:14:27');
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
INSERT INTO `laboratory_technicians` VALUES (84, 89, 82, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (85, 90, 84, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (86, 91, 86, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (87, 92, 86, '2024-05-27 17:10:40', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (88, 93, 86, '2024-05-27 17:10:41', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (89, 94, 86, '2024-05-27 17:10:41', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (90, 95, 86, '2024-05-27 17:10:41', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (91, 96, 87, '2024-05-27 17:10:41', '2024-05-27 17:14:28');
INSERT INTO `laboratory_technicians` VALUES (92, 3, 51, '2024-07-23 09:57:55', NULL);
INSERT INTO `laboratory_technicians` VALUES (96, 98, 5, '2024-07-24 12:16:06', NULL);
INSERT INTO `laboratory_technicians` VALUES (97, 99, 5, '2024-07-24 12:16:40', NULL);
INSERT INTO `laboratory_technicians` VALUES (98, 100, 62, '2024-07-24 12:20:01', NULL);
INSERT INTO `laboratory_technicians` VALUES (100, 72, 81, '2024-07-24 13:56:28', NULL);
INSERT INTO `laboratory_technicians` VALUES (104, 88, 85, '2024-07-24 14:17:56', NULL);
INSERT INTO `laboratory_technicians` VALUES (109, 101, 51, '2024-08-08 11:10:34', NULL);
INSERT INTO `laboratory_technicians` VALUES (111, 102, 5, '2024-08-19 15:11:31', NULL);
INSERT INTO `laboratory_technicians` VALUES (112, 103, 5, '2024-08-19 15:35:31', NULL);
INSERT INTO `laboratory_technicians` VALUES (113, 103, 52, '2024-08-19 15:35:31', NULL);
INSERT INTO `laboratory_technicians` VALUES (114, 104, 5, '2024-08-19 15:41:00', NULL);
INSERT INTO `laboratory_technicians` VALUES (115, 105, 5, '2024-08-19 15:53:34', NULL);
INSERT INTO `laboratory_technicians` VALUES (116, 106, 5, '2024-10-11 01:58:26', NULL);
INSERT INTO `laboratory_technicians` VALUES (118, 2, 51, '2024-10-14 07:23:40', NULL);
INSERT INTO `laboratory_technicians` VALUES (119, 1, 51, '2024-10-14 08:23:04', NULL);
INSERT INTO `laboratory_technicians` VALUES (120, 9, 55, '2024-10-14 08:24:06', NULL);
INSERT INTO `laboratory_technicians` VALUES (121, 26, 61, '2024-10-15 02:52:57', NULL);
INSERT INTO `laboratory_technicians` VALUES (122, 27, 62, '2024-10-15 02:53:40', NULL);
INSERT INTO `laboratory_technicians` VALUES (123, 28, 61, '2024-10-15 02:53:53', NULL);
INSERT INTO `laboratory_technicians` VALUES (124, 17, 5, '2024-10-15 04:15:55', NULL);
INSERT INTO `laboratory_technicians` VALUES (125, 107, 62, '2024-10-15 04:25:16', NULL);
INSERT INTO `laboratory_technicians` VALUES (126, 42, 63, '2024-10-15 04:27:00', NULL);
INSERT INTO `laboratory_technicians` VALUES (128, 43, 58, '2024-10-15 04:34:28', NULL);
INSERT INTO `laboratory_technicians` VALUES (129, 41, 62, '2024-10-15 04:41:52', NULL);
INSERT INTO `laboratory_technicians` VALUES (130, 75, 79, '2024-10-15 05:30:56', NULL);
INSERT INTO `laboratory_technicians` VALUES (131, 76, 79, '2024-10-15 05:38:35', NULL);
INSERT INTO `laboratory_technicians` VALUES (132, 63, 190, '2024-10-15 06:16:43', NULL);
INSERT INTO `laboratory_technicians` VALUES (133, 29, 63, '2024-10-17 01:51:16', NULL);
INSERT INTO `laboratory_technicians` VALUES (134, 38, 60, '2024-10-17 02:13:13', NULL);
INSERT INTO `laboratory_technicians` VALUES (135, 65, 77, '2024-10-17 06:49:47', NULL);
INSERT INTO `laboratory_technicians` VALUES (138, 58, 73, '2024-10-17 20:22:47', NULL);
INSERT INTO `laboratory_technicians` VALUES (139, 56, 73, '2024-10-17 22:10:51', NULL);

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
INSERT INTO `laboratory_time_options` VALUES (0, '07:00:00', '07:50:00', '2024-06-07 16:43:36', '2024-10-15 09:26:18');
INSERT INTO `laboratory_time_options` VALUES (1, '07:50:00', '08:40:00', '2024-06-07 16:44:44', '2024-10-15 09:26:18');
INSERT INTO `laboratory_time_options` VALUES (2, '08:40:00', '09:30:00', '2024-06-07 16:45:38', '2024-10-15 09:26:18');
INSERT INTO `laboratory_time_options` VALUES (3, '09:30:00', '10:20:00', '2024-06-07 16:46:19', '2024-10-15 09:26:18');
INSERT INTO `laboratory_time_options` VALUES (4, '10:20:00', '11:10:00', '2024-06-07 16:46:22', '2024-10-15 09:26:19');
INSERT INTO `laboratory_time_options` VALUES (5, '11:10:00', '12:00:00', '2024-06-07 16:46:35', '2024-10-15 09:26:19');
INSERT INTO `laboratory_time_options` VALUES (6, '13:00:00', '13:50:00', '2024-06-07 16:46:52', '2024-10-17 04:32:24');
INSERT INTO `laboratory_time_options` VALUES (7, '13:50:00', '14:40:00', '2024-06-07 16:47:20', '2024-10-17 04:32:26');
INSERT INTO `laboratory_time_options` VALUES (8, '14:40:00', '15:30:00', '2024-06-07 16:47:25', '2024-10-17 04:32:26');
INSERT INTO `laboratory_time_options` VALUES (9, '15:30:00', '16:20:00', '2024-06-07 16:48:33', '2024-10-17 04:32:26');
INSERT INTO `laboratory_time_options` VALUES (10, '16:20:00', '17:10:00', '2024-06-07 16:48:52', '2024-10-17 04:32:26');
INSERT INTO `laboratory_time_options` VALUES (11, '17:10:00', '18:00:00', '2024-06-07 16:50:36', '2024-10-15 09:26:19');
INSERT INTO `laboratory_time_options` VALUES (12, '18:00:00', '18:50:00', '2024-06-07 16:51:29', '2024-10-15 09:26:19');
INSERT INTO `laboratory_time_options` VALUES (13, '18:50:00', '19:40:00', '2024-06-07 16:51:47', '2024-10-15 09:26:19');
INSERT INTO `laboratory_time_options` VALUES (14, '19:40:00', '20:30:00', '2024-06-07 16:52:27', '2024-10-15 09:26:19');

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
  `id_menu` int(11) NOT NULL,
  `mn_level_user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mn_parent_id` int(11) NULL DEFAULT NULL,
  `mn_icon_code` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mn_title` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mn_slug` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (101, 'ADMIN_SYSTEM', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (102, 'ADMIN_SYSTEM', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (103, 'ADMIN_SYSTEM', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (104, 'ADMIN_SYSTEM', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (105, 'ADMIN_SYSTEM', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (106, 'ADMIN_SYSTEM', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (107, 'ADMIN_SYSTEM', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (108, 'ADMIN_SYSTEM', 107, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (109, 'ADMIN_SYSTEM', 107, 'ri-subtract-fill', 'SMTP Mail', 'pengaturan/email');
INSERT INTO `menus` VALUES (110, 'ADMIN_SYSTEM', 107, 'ri-subtract-fill', 'Data Semua User', 'pengaturan/user');
INSERT INTO `menus` VALUES (201, 'ADMIN_MASTER', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (202, 'ADMIN_MASTER', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (203, 'ADMIN_MASTER', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (204, 'ADMIN_MASTER', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (205, 'ADMIN_MASTER', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (206, 'ADMIN_MASTER', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (207, 'ADMIN_MASTER', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (208, 'ADMIN_MASTER', 207, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (209, 'ADMIN_MASTER', 207, 'ri-subtract-fill', 'Data Semua User', 'pengaturan/user');
INSERT INTO `menus` VALUES (210, 'ADMIN_MASTER', 207, 'ri-subtract-fill', 'Data Source', 'pengaturan/form-datasource');
INSERT INTO `menus` VALUES (301, 'LAB_HEAD', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (302, 'LAB_HEAD', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (303, 'LAB_HEAD', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (304, 'LAB_HEAD', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (305, 'LAB_HEAD', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (306, 'LAB_HEAD', 0, 'ri-flask-fill', 'Uji Lab', 'uji_laboratorium');
INSERT INTO `menus` VALUES (307, 'LAB_HEAD', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (308, 'LAB_HEAD', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (309, 'LAB_HEAD', 308, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (310, 'LAB_HEAD', 308, 'ri-subtract-fill', 'Data User', 'pengaturan/user');
INSERT INTO `menus` VALUES (311, 'LAB_HEAD', 308, 'ri-subtract-fill', 'Data Rumpun', 'pengaturan/rumpun');
INSERT INTO `menus` VALUES (401, 'LAB_SUBHEAD', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (402, 'LAB_SUBHEAD', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (403, 'LAB_SUBHEAD', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (404, 'LAB_SUBHEAD', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (405, 'LAB_SUBHEAD', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (406, 'LAB_SUBHEAD', 0, 'ri-flask-fill', 'Uji Lab', 'uji_laboratorium');
INSERT INTO `menus` VALUES (407, 'LAB_SUBHEAD', 0, 'ri-survey-fill', 'Laporan', 'laporan');
INSERT INTO `menus` VALUES (408, 'LAB_SUBHEAD', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (409, 'LAB_SUBHEAD', 408, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (501, 'LAB_TECHNICIAN', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (502, 'LAB_TECHNICIAN', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (503, 'LAB_TECHNICIAN', 0, 'ri-building-4-fill', 'Laboratorium', 'laboratorium');
INSERT INTO `menus` VALUES (504, 'LAB_TECHNICIAN', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (505, 'LAB_TECHNICIAN', 0, 'ri-pencil-ruler-2-fill', 'Fasilitas Lab', 'fasilitas_lab');
INSERT INTO `menus` VALUES (506, 'LAB_TECHNICIAN', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (507, 'LAB_TECHNICIAN', 506, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (601, 'ADMIN_PRODI', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (602, 'ADMIN_PRODI', NULL, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (603, 'ADMIN_PRODI', NULL, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (701, 'LECTURE', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (702, 'LECTURE', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (703, 'LECTURE', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (704, 'LECTURE', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (705, 'LECTURE', 704, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (801, 'STUDENT', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (802, 'STUDENT', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (803, 'STUDENT', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (804, 'STUDENT', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (805, 'STUDENT', 804, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (901, 'PUBLIC_MEMBER', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (902, 'PUBLIC_MEMBER', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (903, 'PUBLIC_MEMBER', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (904, 'PUBLIC_MEMBER', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (905, 'PUBLIC_MEMBER', 904, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');
INSERT INTO `menus` VALUES (1001, 'PUBLIC_NON_MEMBER', 0, 'ri-home-fill', 'Beranda', 'beranda');
INSERT INTO `menus` VALUES (1002, 'PUBLIC_NON_MEMBER', 0, 'ri-article-line', 'Pengajuan', 'pengajuan');
INSERT INTO `menus` VALUES (1003, 'PUBLIC_NON_MEMBER', 0, 'ri-calendar-schedule-fill', 'Jadwal Lab', 'jadwal_lab');
INSERT INTO `menus` VALUES (1004, 'PUBLIC_NON_MEMBER', 0, 'ri-settings-2-fill', 'Pengaturan', 'pengaturan');
INSERT INTO `menus` VALUES (1005, 'PUBLIC_NON_MEMBER', 1004, 'ri-subtract-fill', 'Profil', 'pengaturan/profil');

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
INSERT INTO `password_resets` VALUES ('trustopenmail@gmail.com', '22679626-587b-4359-8c7f-05de6fb91fc5', '2024-06-13 09:43:10');
INSERT INTO `password_resets` VALUES ('arizluck@gmail.com', 'd31a4cbd-5552-47e8-b52f-5aff77ef1624', '2024-08-14 06:18:02');

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
INSERT INTO `personal_access_tokens` VALUES (8, 'App\\Models\\User', 1, 'auth_token', 'f963d02729a158f302a5472151f166638f5c075853f2417a316676fd991bda44', '[\"*\"]', NULL, '2024-01-18 02:35:31', '2024-01-18 02:35:31');

-- ----------------------------
-- Table structure for unesa_datas
-- ----------------------------
DROP TABLE IF EXISTS `unesa_datas`;
CREATE TABLE `unesa_datas`  (
  `api_id` int(11) NOT NULL,
  `api_code_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `api_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `api_url_status` enum('aktif','nonaktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `api_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `api_file_data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`api_id`) USING BTREE,
  INDEX `kode unik`(`api_code_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unesa_datas
-- ----------------------------
INSERT INTO `unesa_datas` VALUES (1, 'data_source_skripsi', 'skripsi', 'aktif', 'https://simontasiplus.unesa.ac.id/api_mhs_simontasi/36a169ac-4080-419e-a6c0-3538feb71089', 'data_source_skripsi.json', NULL, '2024-08-02 09:53:29');
INSERT INTO `unesa_datas` VALUES (2, 'data_source_mahasiswa_ft', 'mhs', 'aktif', 'https://simontasiplus.unesa.ac.id/api_mhs_unesa/36a169ac-4080-419e-a6c0-3538feb71089', 'data_source_mahasiswa_ft.json', NULL, '2024-08-02 09:53:29');
INSERT INTO `unesa_datas` VALUES (3, 'data_dosen', 'dosen', 'aktif', 'https://i-sdm.unesa.ac.id/api/dosen-ft-email', 'data_dosen.json', NULL, '2024-08-02 09:53:29');

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
) ENGINE = InnoDB AUTO_INCREMENT = 193 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_details
-- ----------------------------
INSERT INTO `user_details` VALUES (1, 31, '085799004533', NULL, 'S1 Perencanaan Wilayah dan Kota', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-10-17 20:36:06', NULL, NULL);
INSERT INTO `user_details` VALUES (2, 3, '085799004533', NULL, 'S1 Pendidikan Teknik Bangunan', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-08-12 08:33:44', NULL, NULL);
INSERT INTO `user_details` VALUES (3, 46, '085799004533', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (4, 24, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (5, 36, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (6, 41, '081357813377', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-10-17 20:04:34', NULL, NULL);
INSERT INTO `user_details` VALUES (7, 49, '085799004533', NULL, 'S1 Sistem Informasi', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (8, 23, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (9, 12, '085799004533', NULL, 'S2 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (10, 18, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (11, 14, '085799004533', NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (12, 29, '085799004533', NULL, 'S1 Pendidikan Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (13, 34, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (14, 50, '085799004533', NULL, 'S1 Teknik Informatika', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (15, 15, '085799004533', NULL, 'S1 Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (16, 22, '085730235172', 'Babatan Pratama XXVII-86, Surabaya', 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-10-17 20:05:00', NULL, NULL);
INSERT INTO `user_details` VALUES (17, 39, '085799004533', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (18, 40, '085799004533', NULL, 'S1 Pendidikan Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-07-10 09:22:27', NULL, NULL);
INSERT INTO `user_details` VALUES (19, 28, '085799004533', NULL, 'S1 Teknik Mesin', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-10-15 11:40:32', NULL, NULL);
INSERT INTO `user_details` VALUES (20, 42, '08113488338', 'Kampus Unesa Ketintang', 'S1 Pendidikan Tata Rias', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-10-15 11:23:37', NULL, NULL);
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
INSERT INTO `user_details` VALUES (32, 47, '081567678808', NULL, 'S1 Pendidikan Tata Boga', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-10-15 11:14:31', NULL, NULL);
INSERT INTO `user_details` VALUES (33, 19, NULL, NULL, 'S1 Pendidikan Teknik Elektro', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:35', '2024-10-15 11:12:41', NULL, NULL);
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
INSERT INTO `user_details` VALUES (116, 169, '085799004533', NULL, 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 11:26:41', '2024-08-19 13:10:08', NULL, NULL);
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
INSERT INTO `user_details` VALUES (131, 184, '085799004533', 'SIMOREJO SARI B-8/22-A Kota Surabaya Prov. Jawa Timur 60181 RT. 4 RW. 7', 'S1 Teknik Sipil', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-06-12 13:03:19', '2024-10-16 11:11:33', NULL, NULL);
INSERT INTO `user_details` VALUES (135, 73, '081232381184', 'KETINTANG BARU 13/49 SURABAYA', 'PRODI S1 TEKNIK SIPIL DAN PRODI S1 PENDIDIKAN TEKNIK BANGUNAN', 'FAKULTAS TEKNIK', 'UNUVERSITAS NEGERI SURABAYA', '2024-07-10 09:50:39', '2024-10-17 22:10:26', NULL, NULL);
INSERT INTO `user_details` VALUES (158, 185, '081959082331', 'jl. sukolilo', NULL, NULL, 'PT TRUST', '2024-10-08 09:28:18', '2024-10-08 16:33:47', NULL, NULL);
INSERT INTO `user_details` VALUES (159, 186, NULL, NULL, NULL, NULL, 'UNiversitas Negeri Surabaya', '2024-10-11 07:44:02', '2024-10-11 14:44:44', NULL, NULL);
INSERT INTO `user_details` VALUES (160, 4, NULL, NULL, NULL, NULL, 'UNiversitas Negeri Surabaya', '2024-10-11 07:55:54', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (161, 187, '08536789251', 'Surabaya', NULL, NULL, 'PT TRUST', '2024-10-14 02:56:31', '2024-10-14 09:58:53', NULL, NULL);
INSERT INTO `user_details` VALUES (163, 189, '0852354678', 'Keputih Surabya', NULL, NULL, 'PT TRUST', '2024-10-15 02:44:45', '2024-10-15 09:57:18', NULL, NULL);
INSERT INTO `user_details` VALUES (164, 190, '08113160336', 'Gayungsari X no.63', 'Teknik Sipil', 'Teknik', 'Universitas Negeri Surabaya', '2024-10-15 02:46:28', '2024-10-15 19:56:10', NULL, NULL);
INSERT INTO `user_details` VALUES (168, 7, NULL, NULL, NULL, NULL, 'Universitas Negeri Surabaya', '2024-10-15 04:22:03', '2024-10-15 11:22:18', NULL, NULL);
INSERT INTO `user_details` VALUES (169, 53, NULL, NULL, NULL, NULL, 'Universitas Negeri Surabaya', '2024-10-15 04:22:40', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (170, 79, NULL, 'Kampus Unesa Ketintang', 'Tata Rias', 'Teknik', 'Universitas Negeri Surabaya', '2024-10-15 04:24:25', '2024-10-15 13:39:22', NULL, NULL);
INSERT INTO `user_details` VALUES (171, 78, '085648819028', 'Ketintang Surabaya', 'Tata Busana', 'Fakultas Teknik', 'Universitas Negeri Surabaya', '2024-10-15 04:24:44', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (175, 197, NULL, NULL, 'S1 Teknik Informatika', 'Teknik', 'Universitas Negeri Surabaya', '2024-10-15 05:12:15', '2024-10-15 12:35:09', NULL, NULL);
INSERT INTO `user_details` VALUES (180, 202, NULL, 'Surabaya', 'Busana', 'Busana', 'Universitas Negeri Surabaya', '2024-10-15 06:57:54', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (181, 203, NULL, NULL, NULL, NULL, 'Unesa', '2024-10-15 07:14:47', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (182, 204, NULL, NULL, NULL, NULL, 'unesa', '2024-10-15 07:18:08', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (184, 206, NULL, NULL, NULL, NULL, 'Universitas Negeri Surabaya', '2024-10-15 07:28:49', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (186, 208, NULL, NULL, NULL, NULL, 'unesa', '2024-10-15 07:45:42', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (187, 209, NULL, NULL, NULL, NULL, 'unesa', '2024-10-15 07:49:09', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (189, 210, NULL, NULL, NULL, NULL, 'Universitas Negeri Surabaya', '2024-10-16 01:08:39', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (190, 86, '081913442617', 'Jl. Margo Utomo RT 01/RW 03,Keboan-Jombang', 'Teknik Informatika', 'Fakultas Teknik', 'UNESA', '2024-10-16 02:39:55', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (191, 87, '081333078989', 'Jl. Sidosermo IV/5 Rt. 002 RW. 003 Surabaya', 'Teknik Informatika', 'Teknik', 'Unesa', '2024-10-16 02:39:55', NULL, NULL, NULL);
INSERT INTO `user_details` VALUES (192, 68, '08122244034', 'KavLing Al-Risma JL. Randu Kepuh No.22 RT13A/RW.04, Dsn. Petal Kel. Domas Kec. Menganti Kab. Gresik 61174', 'S1 Teknik Sipil dan S1 Pendidikan Teknik Bangunan', 'Teknik', 'Universitas Negeri Surabaya', '2024-10-16 06:37:21', '2024-10-16 13:37:44', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) NOT NULL,
  `no_id` bigint(20) NOT NULL,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` enum('active','block') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'block',
  `level` enum('UNSET','LECTURE','STUDENT','PUBLIC_MEMBER','PUBLIC_NON_MEMBER','LAB_HEAD','LAB_SUBHEAD','LAB_TECHNICIAN','ADMIN_PRODI','ADMIN_MASTER','ADMIN_SYSTEM') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'UNSET',
  `password` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rumpun_id` int(11) NULL DEFAULT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (0, 0, 'Dr. Lutfiyah Hidayati, S.Pd., M.Pd.', 'lutfiyahhidayati@unesa.ac.id', NULL, 'active', 'LAB_HEAD', '$2y$10$iqZgZi8PazcO6HSI.DzcvOjzewn1Mzdqss7s.1mPtPe6JavNQsvRG', NULL, NULL, '2024-08-06 07:58:43', '0', '2024-05-29 01:24:59', '2024-10-10 03:52:20', 0);
INSERT INTO `users` VALUES (1, 111, 'System', 'master@webmaster.com', 'agus123', 'active', 'ADMIN_SYSTEM', '$2y$10$HS8EWaWAgNiho1AyetSIGeWKqQE63FrInMbc859BsAQwGJ4oKwqpy', NULL, NULL, '2022-12-01 08:03:18', NULL, '2022-12-01 08:04:29', '2024-08-09 06:43:56', NULL);
INSERT INTO `users` VALUES (2, 112, 'Admin', 'admin@webmaster.com', NULL, 'active', 'ADMIN_MASTER', '$2y$10$HS8EWaWAgNiho1AyetSIGeWKqQE63FrInMbc859BsAQwGJ4oKwqpy', 1, NULL, '2022-12-01 08:03:18', NULL, '2022-12-23 08:33:58', '2024-10-11 07:57:54', NULL);
INSERT INTO `users` VALUES (3, 113, 'Dr. Ir. H. Soeparno, M.T.', 'soeparno@unesa.ac.id', NULL, 'active', 'ADMIN_MASTER', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 1, NULL, '2022-12-01 08:03:18', NULL, '2024-01-25 08:25:02', '2024-10-11 07:57:54', NULL);
INSERT INTO `users` VALUES (4, 114, 'Kasublab', 'zacebox01@gmail.com', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$cEc7CDZGOSfS1ibB.oojZOj53KGbx.X6JnpAU2ArjXyWTn2Kli8Iy', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-01-25 08:25:02', '2024-10-11 07:57:54', NULL);
INSERT INTO `users` VALUES (5, 115, 'Teknisi', 'zacebox02@gmail.com', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 1, NULL, '2022-12-01 08:03:18', NULL, '2024-03-15 08:16:59', '2024-10-11 07:57:55', NULL);
INSERT INTO `users` VALUES (6, 116, 'Admina', 'ari2torage@gmail.com', NULL, 'active', 'ADMIN_PRODI', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 1, NULL, '2022-12-01 08:03:18', NULL, '2024-03-15 08:42:42', '2024-10-11 08:07:09', NULL);
INSERT INTO `users` VALUES (7, 117, 'Dosen 1', 'ariston45@gmail.com', NULL, 'active', 'LECTURE', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-03-19 05:42:44', '2024-10-15 11:22:18', NULL);
INSERT INTO `users` VALUES (11, 196502171990021001, 'Prof. Dr. Joko, M.Pd., M.T.', 'joko@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-11 07:57:56', NULL);
INSERT INTO `users` VALUES (12, 196103251987011001, 'Prof. Dr. Bambang Suprianto, M.T.', 'bambangsuprianto@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-11 07:57:56', NULL);
INSERT INTO `users` VALUES (13, 197107061999031001, 'Prof. Dr. IGP. Asto Buditjahjanto, S.T., M.T.', 'asto@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:34', NULL);
INSERT INTO `users` VALUES (14, 199007032019032023, 'L. Endah Cahya Ningrum, S.Pd., M.Pd.', 'endahningrum@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:34', NULL);
INSERT INTO `users` VALUES (15, 198605232014041001, 'Farid Baskoro, S.T., M.T.', 'faridbaskoro@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:34', NULL);
INSERT INTO `users` VALUES (16, 196403311990031001, 'Endryansyah, S.T., M.T.', 'endryansyah@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:35', NULL);
INSERT INTO `users` VALUES (17, 197706252006041003, 'M. Syariffuddien Zuhrie, S.Pd., M.T.', 'zuhrie@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:35', NULL);
INSERT INTO `users` VALUES (18, 199012262019031016, 'Fendi Achmad, S.Pd., M.Pd.', 'fendiachmad@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:35', NULL);
INSERT INTO `users` VALUES (19, 202103045, 'Roswina Dianawati, S.Pd., M.Ed.', 'roswinadianawati@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$lnzacy6cCjOkKJT4yzycvOoN7o.DI1x2iFp32ih7VtoOgNlYpyWhW', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-15 11:12:41', NULL);
INSERT INTO `users` VALUES (20, 196109131992031001, 'Prof. Dr.  Muhaji, ST., M.T.', 'muhaji61@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:36', NULL);
INSERT INTO `users` VALUES (21, 196712281994031003, 'Prof. Dr. I Made Arsana, S.Pd., MT.', 'madearsana@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:36', NULL);
INSERT INTO `users` VALUES (22, 196208231986011001, 'Dr. A. Grummy Wailanduw, M.Pd., M.T.', 'grummywailanduw@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 0, '196208231986011001', '2022-12-01 08:03:18', NULL, NULL, '2024-10-17 20:05:00', NULL);
INSERT INTO `users` VALUES (23, 198803202014041001, 'Akhmad Hafizh Ainur Rasyid, S.T., M.T.', 'akhmadrasyid@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:37', NULL);
INSERT INTO `users` VALUES (24, 196408091992021001, 'Dr. Dewanto, M.Pd.', 'dewanto@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:37', NULL);
INSERT INTO `users` VALUES (25, 196504231992031001, 'Dr. Yunus, M.Pd.', 'yunus@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:37', NULL);
INSERT INTO `users` VALUES (26, 198712062019031013, 'Rachmad Syarifudin Hidayatullah, S.Pd., M.Pd.', 'rachmadhidayatullah@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:38', NULL);
INSERT INTO `users` VALUES (27, 197109072005011002, 'Indra Herlambang  Siregar, S.T., M.T.', 'indrasiregar@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:38', NULL);
INSERT INTO `users` VALUES (28, 197803302008121002, 'Aris Ansori, S.Pd., M.T.', 'arisansori@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-15 11:40:32', NULL);
INSERT INTO `users` VALUES (29, 198904202019031017, 'Ali Hasbi Ramadani, S.Pd., M.Pd', 'aliramadani@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:39', NULL);
INSERT INTO `users` VALUES (30, 197803272008012016, 'Novi Sukma Drastiawati, S.T., M.Eng.', 'novidrastiawati@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:39', NULL);
INSERT INTO `users` VALUES (31, 197012041999031003, 'Prof. Dr. Agus Wiyono, S.Pd., M.T.', 'aguswiyono@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 5, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-17 20:36:06', NULL);
INSERT INTO `users` VALUES (32, 196206291998021001, 'Drs. Djoni Irianto, M.T.', 'djoniirianto@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:39', NULL);
INSERT INTO `users` VALUES (33, 198905102018032001, 'Danayanti Azmi Dewi Nusantara, S.T., M.T.', 'danayantinusantara@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:40', NULL);
INSERT INTO `users` VALUES (34, 201405003, 'Muhammad Imaduddin, S.T., M.T.', 'muhammadimaduddin@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-15 03:29:37', NULL);
INSERT INTO `users` VALUES (35, 197110072005012001, 'Krisna Dwi Handayani, S.T., M.MT., M.T.', 'krisnahandayani@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:40', NULL);
INSERT INTO `users` VALUES (36, 196003201999032001, 'Ir. Nurhayati Aritonang, M.T.', 'nurhayatiaritonang@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:40', NULL);
INSERT INTO `users` VALUES (37, 195707311987122001, 'Prof. Dr. Marniati, S.E., M.M.', 'marniati@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 16:07:33', NULL);
INSERT INTO `users` VALUES (38, 197405142005012002, 'Prof. Dr. Mutimmatul Faidah, S.Ag., M.Ag.', 'mutimmatulfaidah@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:41', NULL);
INSERT INTO `users` VALUES (39, 196705071993021001, 'Drs. Ec. Mein Kharnolis, M.SM.', 'meinkharnolis@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:41', NULL);
INSERT INTO `users` VALUES (40, 197111141997022001, 'Dr. Sn. Inty Nahari, S.Pd., M.Ds.', 'intynahari@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:42', NULL);
INSERT INTO `users` VALUES (41, 197807052005012001, 'Dr. Deny Arifiana, S.Pd., M.A.', 'denyarifiana@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 0, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-17 20:04:34', NULL);
INSERT INTO `users` VALUES (42, 198008022008122002, 'Octaverina Kecvara Pritasari, S.Pd., M.Farm.', 'octaverinakecvara@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, '198008022008122002', '2022-12-01 08:03:18', NULL, NULL, '2024-10-17 20:25:38', NULL);
INSERT INTO `users` VALUES (43, 198801262023211007, 'Apt. M.A.Hanny Ferry Fernanda, S.Farm., M.Farm.', 'apt.fernanda@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:08:59', NULL);
INSERT INTO `users` VALUES (44, 198709252015042004, 'Dindy Sinta Megasari, S.Pd., M.Pd.', 'dindymegasari@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:09:00', NULL);
INSERT INTO `users` VALUES (45, 196709281993032002, 'Dr. Lucia Tri Pangesti, M.Pd.', 'luciapangesthi@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:09:00', NULL);
INSERT INTO `users` VALUES (46, 196803221994032001, 'Nugrahani Astuti, S.Pd., M.Pd.', 'nugrahaniastuti@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:09:00', NULL);
INSERT INTO `users` VALUES (47, 199107022020121012, 'Andika Kuncoro Widagdo, M.Pd.', 'andikawidagdo@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-17 20:25:40', NULL);
INSERT INTO `users` VALUES (48, 196004041987011001, 'Prof. Dr. Ekohariadi, M.Pd.', 'ekohariadi@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:09:01', NULL);
INSERT INTO `users` VALUES (49, 198702092015041003, 'Rahadian Bisma, S.Kom., M.Kom.', 'rahadianbisma@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:09:01', NULL);
INSERT INTO `users` VALUES (50, 198411242015041003, 'I Made Suartana, S.Kom., M.Kom.', 'madesuartana@unesa.ac.id', NULL, 'active', 'LAB_SUBHEAD', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, NULL, '2024-10-14 20:09:01', NULL);
INSERT INTO `users` VALUES (51, 196701151992031000, 'Sugiono, ST', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 04:06:28', NULL);
INSERT INTO `users` VALUES (52, 202203047, 'Rokhis Rosyidi, S.Kom', 'rokhisrosyidi@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 13:38:04', NULL);
INSERT INTO `users` VALUES (53, 197104232002121001, 'Gitud Sudarto, ST', 'gitudsudarto@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 11:22:40', NULL);
INSERT INTO `users` VALUES (54, 1201311204, 'Hening Ary Widhowati, S.Sos', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-14 20:09:02', NULL);
INSERT INTO `users` VALUES (55, 1201707251, 'Hikmat Oka, S.T', 'hikmatkusuma@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 13:42:37', NULL);
INSERT INTO `users` VALUES (56, 1200302001, 'Jamiin', 'jamiinjamiin@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 13:43:59', NULL);
INSERT INTO `users` VALUES (57, 197505182001121002, 'Sumardi', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-14 20:09:03', NULL);
INSERT INTO `users` VALUES (58, 197401222005011002, 'Anton Hartanto', 'antonhartanto@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 13:33:24', NULL);
INSERT INTO `users` VALUES (59, 196609062001121001, 'Suhadi', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-14 20:09:04', NULL);
INSERT INTO `users` VALUES (60, 197610292005011002, 'Okky Ardiansyah', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-14 20:09:04', NULL);
INSERT INTO `users` VALUES (61, 197608072000031002, 'Slamet Riyanto', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-14 20:09:04', NULL);
INSERT INTO `users` VALUES (62, 198003032008011015, 'Margo Nurcahyo', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-14 20:09:05', NULL);
INSERT INTO `users` VALUES (63, 198507032014041001, 'Hendra Saputra P', 'hendrapratama@unesa.ac.id ', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 13:33:54', NULL);
INSERT INTO `users` VALUES (64, 197209141999031002, 'Hendra Saputra S', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-14 20:09:05', NULL);
INSERT INTO `users` VALUES (65, 196707081989021001, 'Djarwo', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-14 20:09:06', NULL);
INSERT INTO `users` VALUES (66, 197209141999031002, 'Ronny Tuhumena', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-14 20:09:06', NULL);
INSERT INTO `users` VALUES (67, 201507057, 'Kusetyono L.S', 'kusetyonosoediwiryo@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 13:52:15', NULL);
INSERT INTO `users` VALUES (68, 1200405004, 'Eko Heru Santoso, A.Md', 'ekosantoso@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, '1200405004', '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-16 13:37:44', NULL);
INSERT INTO `users` VALUES (69, 196809131993031002, 'Langgeng, ST.', 'langgenglanggeng@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 13:55:06', NULL);
INSERT INTO `users` VALUES (70, 196812091994031003, 'Tohir Widada, S.Pd, ST, MM', 'tohirwidada@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 13:31:37', NULL);
INSERT INTO `users` VALUES (71, 2200804121, 'Novi Camelia', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-14 20:09:07', NULL);
INSERT INTO `users` VALUES (72, 2200803120, 'Ali Mustain, ST', 'alimustain@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 04:51:54', NULL);
INSERT INTO `users` VALUES (73, 197311172001121002, 'Sunyata, S.E', 'sunyatasunyata@unesa.ac.id', NULL, NULL, 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', 7, '197311172001121002', '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-17 22:10:26', NULL);
INSERT INTO `users` VALUES (74, 2201401236, 'Agus Faudin, S.Pd', 'agusfaudin@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:09', '2024-10-15 04:32:23', NULL);
INSERT INTO `users` VALUES (75, 202204060, 'Tuesday Tri Wardani, S.Pd', 'tuesdaywardani@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-15 04:32:08', NULL);
INSERT INTO `users` VALUES (76, 197507021999031002, 'Rifky.S.T', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-14 20:09:22', NULL);
INSERT INTO `users` VALUES (77, 196705132000122001, 'Dra nusriningyati', 'nusriningyatinusriningyati@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-15 04:34:01', NULL);
INSERT INTO `users` VALUES (78, 2201111147, 'Laylatul Al Bariyah, S.Pd.', 'laylatulbariyah@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, '2201111147', '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-15 13:55:29', NULL);
INSERT INTO `users` VALUES (79, 2201001132, 'Swandini Endar Damayanti, S.Pd.', 'swandinidamayanti@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, '2201001132', '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-15 13:55:33', NULL);
INSERT INTO `users` VALUES (80, 197211032001122001, 'Kusuma Ayu NI, S.H.', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-11 07:58:15', NULL);
INSERT INTO `users` VALUES (81, 202204061, 'Alful laili.,S.Pd', 'alfullaili@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-15 04:11:27', NULL);
INSERT INTO `users` VALUES (82, 199105262015042001, 'Minnar Titis Santoso, S.Pd', 'minnarsantoso@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-15 13:45:35', NULL);
INSERT INTO `users` VALUES (83, 201507052, 'Patni, S.Pd.', NULL, NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-11 07:58:17', NULL);
INSERT INTO `users` VALUES (84, 202204062, 'Siti Yuliana, S.Pd.,M. Pd.', 'sitiyuliana@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-15 04:14:42', NULL);
INSERT INTO `users` VALUES (85, 1201506102, 'Sugianto, A.Md.', 'sugianto@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$qpHnMm3I0ePEu9p4kYcWLu6x.jJC1ZvyzgIQa3moj8H9PI9HuZQzO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-15 13:52:51', NULL);
INSERT INTO `users` VALUES (86, 20, 'Afrizal Ibnu Ervianto.ST', 'afrizalibnuervianto@gmail.com', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$5c0rP7LyhxW0BEINMPx2/eeYLZJ9b9id/9ybvSS3ADTAsBu2zceLa', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-16 09:39:55', NULL);
INSERT INTO `users` VALUES (87, 197506082009101003, 'Zainul Abidin', 'zainulabidin@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$Q8QeYncdEP5QvktVs9Mmpe5gJfMwbZ40B1eiw3wPJQ9Z846rug0R2', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-05-27 09:59:10', '2024-10-16 09:39:55', NULL);
INSERT INTO `users` VALUES (88, 16039502, 'Ratna Palupi Nurfatimah, S.TP., M.T.P.', 'ratnanurfatimah@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$g8llLfI.RHIHKfgaUghWxeh5xsHDh/LBnNuP7fGhMN.LwR5bBxDB.', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:18', NULL);
INSERT INTO `users` VALUES (89, 23048803, 'Dr.rer.nat. Sammy Alidrus, M.Sc.', 'sammyalidrus@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$r0bkDzIBttdkdhDWHt5yt.RAtOmNtZGBK02jGw2.nd3sJAtjFTQKC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:19', NULL);
INSERT INTO `users` VALUES (91, 7028102, 'Mochamad Arif Irfa\'i, S.Pd., M.T.', 'arifirfai@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$o/V1KnUWDoMvhK6suxB2Qu9DRwxApu6rL3X9RrDpyo/pvLUiQpIdq', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:19', NULL);
INSERT INTO `users` VALUES (92, 13046304, 'Dr. Ir. Bambang Sabariman, S.T., M.T.', 'bambangsabariman@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$UGOULxvejWJ3CQvyJOwTKuwSRmvoFXnHxdSPg8ZWO91tRLR.otK6S', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:19', NULL);
INSERT INTO `users` VALUES (93, 17127706, 'Nia Kusstianti, S.Pd., M.Pd.', 'niakusstianti@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$WD..UqxwYs7r7witScvzYO7F9wfw.FQsZZ1LAIH4p5.wZsy6wr4dm', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:19', NULL);
INSERT INTO `users` VALUES (94, 1117406, 'Aditya Prapanca, S.T., M.Kom.', 'adityaprapanca@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$8avp0fOrmPuIw/XP8clyBuPy4toCCmr2NPPuwkyOD.6fFTEBQqspi', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:20', NULL);
INSERT INTO `users` VALUES (95, 715128303, 'Ir.  Wahyu Dwi Kurniawan, S.Pd., M.Pd.', 'wahyukurniawan@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$YThCB4lCinZOs3ZvuWovieJynjYY1Dyrbh0l.eYYdQaZN.l9lCJWC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:20', NULL);
INSERT INTO `users` VALUES (96, 21028109, 'Ardhini Warih Utami, S.Kom., M.Kom.', 'ardhiniwarih@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$iAa8P5IWTwLdAjtMA0wdfuNnyZcg4oUr.e4S32h0w8X.kEkuWiNHe', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:20', NULL);
INSERT INTO `users` VALUES (97, 19056503, 'Drs. Bambang Sujatmiko, M.T.', 'bambangsujatmiko@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$xSC6mhNJrNMmaA4O4x12GO9uouw3AyjizDaRIbNs5Rin76iVO5X56', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:21', NULL);
INSERT INTO `users` VALUES (98, 7028704, 'Peppy Mayasari, S.Pd., M.Pd.', 'peppymayasari@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$o9fDPEOj1qflu.P6wlZNLOo.YauxjjZPisqsAe4vQ1T3gXRO27N7a', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:21', NULL);
INSERT INTO `users` VALUES (99, 729119001, 'Handini Novita Sari, S.Pd., M.T.', 'handinisari@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$4kz3S893V7NXkP1c9gu1luVQ6vdqzeFgeyjM8s0RwY.BipETsgOm2', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:21', NULL);
INSERT INTO `users` VALUES (100, 714019401, 'Parama Diptya Widayaka, S.ST., M.T.', 'paramawidayaka@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$4KCKWBcQxNY1SOBF1b/IDeiNp/yjuJV/DUTznGWXAhkz0iRotRUkC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:22', NULL);
INSERT INTO `users` VALUES (102, 6047303, 'Arie Wardhono, S.T., M.MT., M.T., Ph.D.', 'ariewardhono@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$G9quEIjQXtJaPhuAaNWAmeWsY88d2DLeZ4NetUVq9p5ixqAHrh2Qy', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:22', NULL);
INSERT INTO `users` VALUES (103, 24046006, 'Dr. Mochamad Cholik, M.Pd.', 'mochamadcholik@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$P9QZiZhrcT2Fx6ziXet2XuPNEDQXhxJohJdEiTr21IagWlyUmLiRa', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:22', NULL);
INSERT INTO `users` VALUES (104, 21027602, 'Unit Three Kartini, S.T., M.T., Ph.D.', 'unitthree@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$eop2a711GKDfsNEzZwDo.OvLoyjqtgnz.FzGldp5msh0pytR2kw2q', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:22', NULL);
INSERT INTO `users` VALUES (105, 716018704, 'Dr. Ricky Eka Putra, S.Kom., M.Kom.', 'rickyeka@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$ZIBSf8/jUvCoP3TNjXPmc.Ie4sdqI0J/UzecXttfuZzSjZ5imhjsO', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:23', NULL);
INSERT INTO `users` VALUES (106, 10027105, 'Dr. Hj. Sri Handajani, S.Pd., M.Kes.', 'srihandajani@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$h7UgrQqsStu4U3807iPI7.YeX.Et.kVYis9csY1G1AL/2fg5JRhFK', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:23', NULL);
INSERT INTO `users` VALUES (107, 24118403, 'Biyan Yesi Wilujeng, S.Pd., M.Pd.', 'biyanyesi@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$6vYpc/pq8i/luTdK/nu6XeisGaGTYc7/mgK3YacH.91Wwk2m1LFD6', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:23', NULL);
INSERT INTO `users` VALUES (108, 30098402, 'Tri Hartutuk Ningsih, S.T., M.T.', 'triningsih@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$l8jH3yDJvS3NBlnBf7QWwuRIkej1cl7ki9sLVUKngVSDd8K.hwZ/q', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:23', NULL);
INSERT INTO `users` VALUES (109, 25038013, 'I Gusti Lanang Putra Eka Prismana, S.Kom., M.Kom.', 'lanangprismana@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$BhiEqLmsIyFKsnTePSSM1OCoq6rDlHlJSEybEa0U1lCU7gDlcuW3G', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:24', NULL);
INSERT INTO `users` VALUES (110, 25016903, 'Anita Qoiriah, S.Kom., M.Kom.', 'anitaqoiriah@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$UP5ETEnnvi9qxpj8.16Rv.bom075zRDlBB97gmZkDzFnAgfBFodWG', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:24', NULL);
INSERT INTO `users` VALUES (111, 3098901, 'Hanna Zakiyya, S.T., M.T.', 'hannazakiyya@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$iEZtWgz1QKwN68uZdfUmIecl/f.I3SX8sVY9YWlUJyQf7a3AndPEC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:24', NULL);
INSERT INTO `users` VALUES (112, 12108004, 'Dr. Lusia Rakhmawati, S.T., M.T.', 'lusiarakhmawati@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$8Zv0ujAl15Qz6AFxHVQoiun3XdrD7Z7p0zWmeuDOR69f00cPYWeni', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:24', NULL);
INSERT INTO `users` VALUES (113, 20127904, 'Dwi Fatrianto Suyatno, S.Kom., M.Kom.', 'dwifatrianto@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$HsSVCEIbnkPQ4VneCgBwE.1RtzpSYXaXMLMdNwZFNFgyn5hlYdpOW', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:24', NULL);
INSERT INTO `users` VALUES (114, 1117905, 'Nur Aini Susanti, S.Pd., M.Pd.', 'nursusanti@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$2Fb/DRbBtwztCoAYsDCoj./UX.bwq5TMYcgP4TqYb5YTDJoTnJURe', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:24', NULL);
INSERT INTO `users` VALUES (115, 18046005, 'Dr. Soeryanto, M.Pd.', 'soeryanto@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$vKdtL8Q5gZFFMbIyyaowz.tr1agQFJtZvlhYeqjJAhTfeqGMLcq/.', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:25', NULL);
INSERT INTO `users` VALUES (116, 712078801, 'Diastian Vinaya Wijanarko, S.T., M.T.', 'diastianwijanarko@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$6HgENndcQ8./aEWIuF72tull3fzYRVotzFd3SU39iP322BByTrH/q', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:25', NULL);
INSERT INTO `users` VALUES (117, 6027901, 'Sri Dwiyanti, S.Pd., M.PSDM.', 'sridwiyanti@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$iOUnZdGp4Dav37tPSlZLGuYGcx2HXtT8C5TApLMAi3tQgiPX07qlC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:25', NULL);
INSERT INTO `users` VALUES (118, 18116102, 'Dra. Dewi Lutfiati, M.Kes.', 'dewilutfiati@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$klpNm2oN6/J.3Q/evfXYv.2Ud78Au5/.VB5MbiRr7tPggr5qhxl4q', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:25', NULL);
INSERT INTO `users` VALUES (119, 21057204, 'Dr.  Nur Kholis, S.T., M.T.', 'nurkholis@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$u6NpKguwpHWwv5rVIEU9iO2XqD1ItP8gp/ReqD8Qb4cQDESJJ3K0a', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:26', NULL);
INSERT INTO `users` VALUES (121, 13087905, 'Prof. Dr.  Erina Rahmadyanti, S.T., M.T.', 'erinarahmadyanti@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$lxHNfrR.jDXd0PsIDQtYy.uAoTqioTghtdrhzP8LJIvZ//fbN/uZm', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:26', NULL);
INSERT INTO `users` VALUES (122, 4127803, 'Dr. Nurhayati, S.T., M.T.', 'nurhayati@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$YGLQD6IMlP3wSsLjoH/NvO4bhBA9qwPictmBKGbZttZntG.O52.3C', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:26', NULL);
INSERT INTO `users` VALUES (123, 19077503, 'Yogie Risdianto, S.T., M.T.', 'yogierisdianto@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$V9MSRxL/Mb2TJPGFfjw9iOVsWy2Q9UpRk3UAmkMPJD1Yp7L04L3fW', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:26', NULL);
INSERT INTO `users` VALUES (124, 29078704, 'Mochamad Firmansyah Sofianto, S.T., M.Sc., M.T.', 'mochamadfirmansyah@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$qtAbAXvu1tRhWSibuooH4uqJ4FdbtCwB3HCm292lNS1iHT4NvINR6', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:27', NULL);
INSERT INTO `users` VALUES (125, 2126207, 'Dra. Nur Andajani, M.T.', 'nurandajani@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$ct6xkQRfkScv2HGMDa9d8.9SWULeBIHW8b3KdetQEUBqQwmCThnoC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:27', NULL);
INSERT INTO `users` VALUES (126, 16078502, 'Yulia Fransisca, S.Pd., M.Pd.', 'yuliafransisca@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$0PYRjNGD.1I2Lc9RnzO2muob4hMKyIXGMFaH39bFs2v3XzkJQ68Oa', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:27', NULL);
INSERT INTO `users` VALUES (127, 20087506, 'Dr. Subuh Isnur Haryudo, S.T., M.T.', 'subuhisnur@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$2gEIDnCjIdwFUxk1m48Yv.3J7cibY87mI4ZL8AOv3DMp/Jo48a/3y', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:27', NULL);
INSERT INTO `users` VALUES (128, 17087505, 'Dr. Raden Roro Hapsari Peni Agustin Tjahyaningtijas, S.Si., M.T.', 'hapsaripeni@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$iKpspAwJOSSkMeGeCsGFx.JuuTk.QBEq4uypftW4euX5hyuWNk7y2', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:28', NULL);
INSERT INTO `users` VALUES (129, 27108403, 'Dr. Yeni Anistyasari, S.Pd., M.Kom.', 'yenian@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$3xJFrf2F/qPUsTFfxVmPz.p9L5KrtDGbaZ2El3j.1o0Q.Q/GgzDlC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:28', NULL);
INSERT INTO `users` VALUES (130, 7026904, 'Ibrohim, S.T., M.T.', 'ibrohim@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$rIdr..umqComEnzpCfGMFuSjEOubtep0qqgY6GYNwUxWcGnHFmZp.', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:28', NULL);
INSERT INTO `users` VALUES (131, 701128101, 'Imami Arum Tri Rahayu, S.Pd., M.Pd.', 'imamirahayu@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$D58vekaM3jnlkvk8H2ppluVeOIjFnD4pqhbFCIN/zCNpNDtPOWXrG', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:28', NULL);
INSERT INTO `users` VALUES (132, 13058110, 'Dr. Gde Agus Yudha Prawira Adistana, S.T., M.T.', 'gdeadistana@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$HvCvYLWgAFw5nNQpSNcpOOl83nZqqZGHHQjJGTamvKebhBP/0K8oi', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:28', NULL);
INSERT INTO `users` VALUES (133, 2097901, 'Dr. Lilik Anifah, S.T., M.T.', 'lilikanifah@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$iPzLApEXW2sDRFxxFI6G0ukFGx3pyMMggTF2csTW7i9Jvbfy0NqQC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:28', NULL);
INSERT INTO `users` VALUES (135, 5036509, 'Dr. Djoko Suwito, M.Pd.', 'djokosuwito@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$BrzuUoZFkg4u5D3qzLZcPuEkXQgdb7ZbmghasQ.9J7IdiuS3d./K6', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:29', NULL);
INSERT INTO `users` VALUES (136, 2047602, 'Ir. Priyo Heru Adiwibowo, S.T., M.T.', 'priyoheruadiwibowo@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$LfrUrDIA.JIzfbZEZYm7XOb8ABxbpKlm22br3tuf47tHUUkTNIQAK', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:29', NULL);
INSERT INTO `users` VALUES (137, 17126805, 'Dr. Rina Harimurti, S.Pd., M.T.', 'rinaharimurti@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$P6ahCz1g/KV0frOSMySHzeFp8NaLPCKZ1Tlq6ezSGy2I5XdUIAXD2', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:29', NULL);
INSERT INTO `users` VALUES (138, 2067504, 'Dr. Yuni Yamasari, S.Kom., M.Kom.', 'yuniyamasari@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$qFlXfStWxChh7zA.LyLu6.XuAGhtVHDe.fgcrmJC8cS4Kx1tPcx0W', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:29', NULL);
INSERT INTO `users` VALUES (139, 2117005, 'Iskandar, S.T., M.T.', 'iskandar@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$WGFNfwDkHGHcBRpYE3PVguKLfUqvJ6DzJKWoPSkBI3pY7eKXu8MPW', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:30', NULL);
INSERT INTO `users` VALUES (140, 29068803, 'Pradini Puspitaningayu, S.T., M.T., Ph.D.', 'pradinip@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$DrSMTv.LvUpUBFxp.Fsl.ufzAsj1i.X1tRKSqN0o2ON.7nM7n8tB.', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:30', NULL);
INSERT INTO `users` VALUES (141, 24068703, 'Bellina Yunitasari, S.Si., M.Si.', 'bellinayunitasari@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$wvaNXy8lV4r7oWnzxNnWTOfFXn.arLtDV1hGAVh5iOtvRlYMwiCBS', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:30', NULL);
INSERT INTO `users` VALUES (142, 12048006, 'Aries Dwi Indriyanti, S.Kom., M.Kom.', 'ariesdwi@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$bcJtF9MtbjmWsePyQzdvR.A.iZu41.y/dlDxPs5jqDDOlwIzd5Ona', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:30', NULL);
INSERT INTO `users` VALUES (143, 7086006, 'Dr. Ir. Asrul Bahar, M.Pd.', 'asrulbahar@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$/GanwQjMBEDbMuGECNGj2.HoCefRkHwImvGyo5U7bCHpYiLM.MC2O', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:31', NULL);
INSERT INTO `users` VALUES (144, 19056502, 'Drs. Andang Widjaja, S.T., M.T.', 'andangwidjaja@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$QUqFjm2AwaXZBbP3mybM0.FJJqAkh6pPXMZBF5SZLzRGASHskLJdq', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:31', NULL);
INSERT INTO `users` VALUES (145, 1046411, 'Dr. Maspiyah, M.Kes.', 'maspiyah@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$HZ49/Cg9JsCMO7JHP57ZDeiFibTtOF7BvOMQj0wkFZs45egYavqvy', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:31', NULL);
INSERT INTO `users` VALUES (146, 20046403, 'Dr. Edy Sulistiyo, M.Pd.', 'edysulistiyo@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$XIZsZoa5BaVY.Ky3ShaZsuF9Lp7xmR5hDbfkdDg6mfyPli/xgkxXu', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:32', NULL);
INSERT INTO `users` VALUES (147, 16127101, 'Ninik Wahju Hidajati, S.Si., M.Si.', 'ninikwahju@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$IdsTXwbX7z056/i1/GxXIew2VhzuAxGedmUf5R2YpvGgk76LDM/Om', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:32', NULL);
INSERT INTO `users` VALUES (148, 11037706, 'Dr. Mohammad Effendy, S.T., M.T.', 'mohammadeffendy@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$ZCNs0hNuRAdZ4kUc9pyL7uOc9YIkbeE0wfY7Q3vFSViioeX087dIa', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:32', NULL);
INSERT INTO `users` VALUES (149, 3027708, 'Dr.  Wiyli Yustanti, S.Si., M.Kom.', 'wiyliyustanti@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$/l6cdRSq53.FWxlLcZN6zO9podCxd3y4uitrNTkMPoxYKbfCKNs7m', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:33', NULL);
INSERT INTO `users` VALUES (150, 704038901, 'Rifqi Firmansyah, S.T., M.T.', 'rifqifirmansyah@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$9AcwyRRihxV2l03hRxYoM.yXju8SbB5cVlTF2ZeUpBRfBYoSkGn2i', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:33', NULL);
INSERT INTO `users` VALUES (151, 6087903, 'Agus Prihanto, S.T., M.Kom.', 'agusprihanto@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$gaz3cNK/Wxxcj4ab3CsIYOak1G9o/vSWc0YesmLjId4oUITQVVDum', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:33', NULL);
INSERT INTO `users` VALUES (152, 22067003, 'Dr. Puput Wanarti Rusimamto, S.T., M.T.', 'puputwanarti@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$/RZO26.2ppgGgdt5F4UkteT4apqnYd59Fkxfw5J42PnBMdkCwkvQC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:34', NULL);
INSERT INTO `users` VALUES (153, 20096903, 'Agung Prijo Budijono, S.T., M.T.', 'agungbudijono@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$UaJwsVA.S7Ais7vcnSoCVeodiAhYGz78/fsYTn28pAlQyFqA//2D.', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:34', NULL);
INSERT INTO `users` VALUES (154, 12038901, 'Mauren Gita Miranti, S.Pd., M.Pd.', 'maurenmiranti@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$/e1LIQVk98T3OvPkDDPxC.Y6Gaj2BjoQlxMwVCyChZpD.OKfxQdIC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:34', NULL);
INSERT INTO `users` VALUES (155, 18066802, 'Dr. Ir. Achmad Imam Agung, M.Pd.', 'achmadimam@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$c4VRbkjhHVFAMsV3c6BXFer/fAOcQIPojWMP55dm3CR2I0Pa1xbn6', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:35', NULL);
INSERT INTO `users` VALUES (156, 4036708, 'Hendra Wahyu Cahyaka, S.T., M.T.', 'hendracahyaka@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$VlXWzbSuQlPP8F5FsXAIS.byiD3SV6MkkXCLprDQAUwFM31PqWdu.', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:35', NULL);
INSERT INTO `users` VALUES (157, 25126605, 'Saiful Anwar, S.Pd., M.T.', 'saifulanwar@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$00En/ObJurzijtdPQ71nn.d6MGgMbcDDmnyOS7VRKLL8JG2TrTCE2', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:35', NULL);
INSERT INTO `users` VALUES (158, 1047307, 'Ir.  Mas Suryanto H.S., S.T., M.T.', 'massuryantohs@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$FjinUHMXxLv/t60Br1OmqOQViWnNy1yeqMtUyMA5ZsZv3pMXdqBEe', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:35', NULL);
INSERT INTO `users` VALUES (159, 20099101, 'Ma\'rifatun Nashikhah, S.Pd., M.Pd.', 'marifatunnashikhah@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$RVAapJ084Q3Aai0CR0zA.eX8D6g6g5PEg96iCuW7T5SSAS7cWBx/a', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:36', NULL);
INSERT INTO `users` VALUES (160, 7078705, 'Miftahur Rohman, S.T., M.T.', 'miftahurrohman@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$F81zRi.M0jr0sa4Ls8.n4eUpY.s5Fm9Nws75kUobnVLwuxchRnBvS', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:36', NULL);
INSERT INTO `users` VALUES (161, 26078508, 'Heru Arizal,  S.Pd., M.M., M.Pd.', 'heruarizal@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$OGlrxS4wvbQM6Z9JiLkae.CuzG2JG3p/YuWg6JUQGWhceqHNcQExi', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:36', NULL);
INSERT INTO `users` VALUES (162, 729058902, 'Paramitha Nerisafitra, S.ST., M.Kom.', 'paramithanerisafitra@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$tk3WuL4qR.ajDgzAxf0EkOOefauLWxdW2/1UBUn5PK09Mpg2eoH6.', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:37', NULL);
INSERT INTO `users` VALUES (163, 9039301, 'Ghea Sekar Palupi, S.Kom., M.I.M.', 'gheapalupi@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$26wcU5.TD.xevQT6zWXXMukjooDxg0MEPtP7FKZbidoejV80KV8w6', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:37', NULL);
INSERT INTO `users` VALUES (164, 5099302, 'Rindu Puspita Wibawa, S.Kom., M.Kom.', 'rinduwibawa@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$DqWYyIQeqwY19X7Vi1yFreGI9MID84sB5gNtUg1kO6u5Au5BLVFma', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:37', NULL);
INSERT INTO `users` VALUES (165, 27088504, 'Muamar Zainul Arif, S.Pd., M.Pd.', 'muamararif@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$jmm.l90Vx7zlogutEUqpTuKiIMhIK2byi1/s6.OQzh01SWfqdd5GC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:37', NULL);
INSERT INTO `users` VALUES (166, 4049013, 'Ika Nurjannah, S.Pd., M.T.', 'ikajannah@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$ofSsl3.ocVUUs2Z3PUrqmuSQcQtWUY7/1PZz.pL1AekhPSknR480S', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:37', NULL);
INSERT INTO `users` VALUES (167, 2068907, 'Wahyu Dwi Mulyono, S.Pd., M.Pd.', 'wahyumulyono@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$WlRhwC00MabV9/iWs4NCM.Qdo6EI4WNk7BILwbZ8vSfjOEFSQFXOC', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:38', NULL);
INSERT INTO `users` VALUES (168, 26128701, 'Heri Suryaman, S.Pd., M.Pd.', 'herisuryaman@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$dZIKwYtN.EhXKwtJpbRG9uRgkmAqEE.ASoLvt4A5Y9cy42Ld1mf1a', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:38', NULL);
INSERT INTO `users` VALUES (169, 28059106, 'Meity Wulandari, S.T., M.T.', 'meitywulandari@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$bq1br8RMfROQUsfxecNeqOn1W1Lq7NTI.BK.tvV10v0OQhDycRPfq', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:38', NULL);
INSERT INTO `users` VALUES (170, 730078601, 'Abdiyah Amudi, S.T., M.T.', 'abdiyahamudi@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$LcgxQndwEsmT9QReRD6vh.6RXt0YTLHzgSKhC.HXBJ4ZHEokF1diK', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:38', NULL);
INSERT INTO `users` VALUES (171, 9029108, 'Mita Yuniati, S.Pd., M.Pd.', 'mitayuniati@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$/yFr5Alo1JU.su0N/pMp7ekyhgY0R5deGSrMkfEkuOVTQv.aGAkHS', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:38', NULL);
INSERT INTO `users` VALUES (172, 26079205, 'Lynda Refnitasari, S.Si., M.URP', 'lyndarefnitasari@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$BCnOQRvJoXrNYs5i/Qx6AucIbSTNlms/MaF8dtH8XENwNu7IiZUEG', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:39', NULL);
INSERT INTO `users` VALUES (173, 26029701, 'Alwan Gangsar Brilian Putra, S.Tr.T., M.T.', 'alwanputra@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$lB31fjVqBt97XYlFKVvgmOuqEIf1.V7mSxt2Uz1dc18Z3CAVbG4M2', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:39', NULL);
INSERT INTO `users` VALUES (174, 9079802, 'Sayyidul Aulia Alamsyah, S.T., M.T.', 'sayyidulalamsyah@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$kQrEa9N6ktxfzf923MGrgulc/qAIqEjENsvnTZzMHrqVQYOv5U5lm', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:39', NULL);
INSERT INTO `users` VALUES (175, 1019312, 'Bima Anggana Widhiarta Putra, S.Pd., M.Pd.', 'bimaputra@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$kQrEa9N6ktxfzf923MGrgulc/qAIqEjENsvnTZzMHrqVQYOv5U5lm', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-17 02:38:43', NULL);
INSERT INTO `users` VALUES (176, 1079106, 'Ervin Yohannes, S.Kom., M.Kom., M.Sc., Ph.D.', 'ervinyohannes@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$UBwpuLBSM8WNfIfDxX1VMuEzXFO7YzwU71AtMKFa3fSbyaeSFcia6', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:39', NULL);
INSERT INTO `users` VALUES (177, 706038903, 'Ahmad Saepuddin, S.T., M.Sc.', 'ahmadsaepuddin@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$WZlYP0Muy.KJiwFFqFtGD.LFCZD/W07EBp.nazUn0tfvhL2Lh9QRS', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:40', NULL);
INSERT INTO `users` VALUES (178, 3819129301, 'Nurul Farikhatir Rizkiyah, M.Pd', 'nurulrizkiyah@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$O1mQlDCTvO1p18Gq2yCWA.11Ubnhp7pMhRoVxFCWeEKzt1ZrkwC4O', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:40', NULL);
INSERT INTO `users` VALUES (179, 705018402, 'Nurul Makhmudiyah, S.Si., M.T.', 'nurulmakhmudiyah@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$nHeTohE5TAcP9kGgw0MIoe64tyNJ/PcF/4OhJwdYibbXfJJwPqPKK', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:40', NULL);
INSERT INTO `users` VALUES (180, 608129105, 'Desy Ratna Arthaningtyas, S.T., M.T.', 'desyarthaningtyas@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$34YUj3T0/NsUc.oXsZygOuNnk0Pb6HcdHViSijIYvGgA3OqyVGPlK', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:41', NULL);
INSERT INTO `users` VALUES (181, 12029306, 'Febriani Lukitasari, S.Pd., M.Pd.', 'febrianilukitasari@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$sFw.CwtBTHqqNho/Pm11H.w./eWi/W2/yUvOKHva4j3mRazW6p/s.', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:41', NULL);
INSERT INTO `users` VALUES (182, 23129601, 'Annisa Nur\'aini, S.Pd., M.Pd.', 'annisanuraini@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$Tf.fPhlopCdJz1Fj1CBAzuym1kryDn9Tq4KUYejWOIk1Jym.c0SJq', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:41', NULL);
INSERT INTO `users` VALUES (183, 5069801, 'Rendra Lebdoyono, S.T.P., M.Sc.', 'rendralebdoyono@unesa.ac.id', NULL, 'active', 'LECTURE', '$2y$10$Wg3twEU9YEArtaPvE.Opb.20B/0srT8OAgBIBtUZaRCQVDMtL5nHS', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 04:26:40', '2024-10-11 07:58:42', NULL);
INSERT INTO `users` VALUES (184, 20050724036, 'ALIF AKBAR HIDAYATULLAH', 'trustopenmail@gmail.com', NULL, 'active', 'STUDENT', '$2y$10$Wg3twEU9YEArtaPvE.Opb.20B/0srT8OAgBIBtUZaRCQVDMtL5nHS', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-06-12 06:03:19', '2024-10-11 07:58:42', NULL);
INSERT INTO `users` VALUES (185, 18040674037, 'Yesicha Pramudita', 'salessupport@trustunified.com', NULL, 'active', 'PUBLIC_NON_MEMBER', '$2y$10$6zt9zAl/uqp.LEhk8cViBerUAZFWxPWIi.xGI3ryO675UyHv3RaL2', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-10-08 09:28:18', '2024-10-11 07:58:42', NULL);
INSERT INTO `users` VALUES (186, 116, 'hoha', 'support1@trust', NULL, 'active', 'ADMIN_PRODI', '$2y$10$wSeq/lfH7zO2Gcx9/LKBzeSe.L3rfV03ofCWAyZxF3TpN46u8W4Va', NULL, NULL, '2022-12-01 08:03:18', NULL, '2024-10-11 07:44:02', '2024-10-11 07:58:43', NULL);
INSERT INTO `users` VALUES (187, 11222, 'Martono', 'support1@trustunified.com', NULL, 'active', 'PUBLIC_NON_MEMBER', '$2y$10$3ZE7UXyXQnedkjNXDj40nuUiKIv4ZIFHzZGrzY/hGdt.hifZY3rvO', NULL, NULL, '2024-10-14 09:57:08', NULL, '2024-10-14 02:56:31', '2024-10-14 09:58:53', NULL);
INSERT INTO `users` VALUES (189, 112233, 'Azis', 'tabeve2343@rowplant.com', NULL, 'active', 'PUBLIC_NON_MEMBER', '$2y$10$Um6f4TGpSs15jgYOgSoIjOc4BDdNXAGiq5zHcGQk/LwxTpY6tQltS', NULL, NULL, '2024-10-15 09:45:25', NULL, '2024-10-15 02:44:45', '2024-10-15 09:45:25', NULL);
INSERT INTO `users` VALUES (190, 3578220207750001, 'Rifky.,S.T', 'rifky@unesa.ac.id', NULL, 'active', 'LAB_TECHNICIAN', '$2y$10$1Q3uw8V7Ff8xVLn9r3py/ehlXabW..Xw.anVXRpqwxNvT6pB.JRwi', NULL, NULL, '2024-10-15 09:47:03', NULL, '2024-10-15 02:46:28', '2024-10-15 19:56:10', NULL);
INSERT INTO `users` VALUES (197, 20051204094, 'Firdaus Bagus Wicaksono', 'firdausbagus.20094@mhs.unesa.ac.id', NULL, NULL, 'PUBLIC_MEMBER', '$2y$10$SJmrR6hD06LIm0aPYgqN.ex/iMk3/xG5c56WjABKS/bTNAKSFu7s6', NULL, NULL, NULL, NULL, '2024-10-15 05:12:15', '2024-10-15 12:35:09', NULL);
INSERT INTO `users` VALUES (202, 6000, 'Admin Prodi Busana', 'adminprodi@busana.com', NULL, 'active', 'ADMIN_PRODI', '$2y$10$QUqFjm2AwaXZBbP3mybM0.FJJqAkh6pPXMZBF5SZLzRGASHskLJdq', 7, NULL, '2024-10-15 13:57:54', NULL, '2024-10-15 06:57:54', '2024-10-17 07:12:50', NULL);
INSERT INTO `users` VALUES (203, 7894, 'Admin Prodi Boga', 'adminprodi@boga.com', NULL, 'active', 'ADMIN_PRODI', '$2y$10$QUqFjm2AwaXZBbP3mybM0.FJJqAkh6pPXMZBF5SZLzRGASHskLJdq', 6, NULL, '2024-10-15 14:14:47', NULL, '2024-10-15 07:14:47', '2024-10-17 07:12:50', NULL);
INSERT INTO `users` VALUES (204, 61530532, 'Admin Prodi Rias', 'adminprodi@rias.com', NULL, 'active', 'ADMIN_PRODI', '$2y$10$QUqFjm2AwaXZBbP3mybM0.FJJqAkh6pPXMZBF5SZLzRGASHskLJdq', 8, NULL, '2024-10-15 14:18:08', NULL, '2024-10-15 07:18:08', '2024-10-17 07:12:50', NULL);
INSERT INTO `users` VALUES (206, 89898, 'Admin Rumpun Teknik Sipil', 'adminrumpun@sipil.com', NULL, 'active', 'ADMIN_PRODI', '$2y$10$QUqFjm2AwaXZBbP3mybM0.FJJqAkh6pPXMZBF5SZLzRGASHskLJdq', 5, NULL, '2024-10-15 14:28:49', NULL, '2024-10-15 07:28:49', '2024-10-17 07:12:50', NULL);
INSERT INTO `users` VALUES (208, 7042895, 'Admin Rumpun Teknik Mesin', 'adminrumpun@mesin.com', NULL, 'active', 'ADMIN_PRODI', '$2y$10$QUqFjm2AwaXZBbP3mybM0.FJJqAkh6pPXMZBF5SZLzRGASHskLJdq', 4, NULL, '2024-10-15 14:45:42', NULL, '2024-10-15 07:45:42', '2024-10-17 07:12:50', NULL);
INSERT INTO `users` VALUES (209, 84209541, 'Admin Rumpun Teknik Elektro', 'adminrumpun@elektro.com', NULL, 'active', 'ADMIN_PRODI', '$2y$10$QUqFjm2AwaXZBbP3mybM0.FJJqAkh6pPXMZBF5SZLzRGASHskLJdq', 2, NULL, '2024-10-15 14:49:09', NULL, '2024-10-15 07:49:09', '2024-10-17 07:12:50', NULL);
INSERT INTO `users` VALUES (210, 7756, 'Admin Rumpun Teknik Informatika', 'adminrumpun@informatika.com', NULL, 'active', 'ADMIN_PRODI', '$2y$10$QUqFjm2AwaXZBbP3mybM0.FJJqAkh6pPXMZBF5SZLzRGASHskLJdq', 3, NULL, '2024-10-16 08:08:39', NULL, '2024-10-16 01:08:39', '2024-10-17 07:12:50', NULL);

SET FOREIGN_KEY_CHECKS = 1;
