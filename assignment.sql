/*
 Navicat Premium Data Transfer

 Source Server         : DnSoft
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : assignment

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 05/10/2016 20:54:40 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `cauthen`
-- ----------------------------
DROP TABLE IF EXISTS `cauthen`;
CREATE TABLE `cauthen` (
  `id_cauthen` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_mpst` int(10) unsigned DEFAULT NULL COMMENT 'ID ประเภทพนักงาน',
  `id_mmenu` int(10) unsigned DEFAULT NULL COMMENT 'ID Menu',
  `can_view` int(2) DEFAULT '1',
  `can_create` int(2) DEFAULT '1',
  `can_edit` int(2) DEFAULT '1',
  `can_print` int(2) DEFAULT '1',
  `can_approve` int(2) DEFAULT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_cauthen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `choliday`
-- ----------------------------
DROP TABLE IF EXISTS `choliday`;
CREATE TABLE `choliday` (
  `id_choliday` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_mcmp` int(10) NOT NULL,
  `holiday_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อแผนก ภาษาอังกฤษ',
  `holiday_end` datetime DEFAULT NULL,
  `holiday_start` datetime NOT NULL,
  `comment` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_choliday`),
  KEY `idx_mdept_name_en` (`holiday_name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `cnfl_of_day`
-- ----------------------------
DROP TABLE IF EXISTS `cnfl_of_day`;
CREATE TABLE `cnfl_of_day` (
  `id_cnfl_of_day` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_mpst` int(10) NOT NULL COMMENT 'ตำแหน่งงาน',
  `id_mnfl_type` int(10) DEFAULT NULL COMMENT 'ID  ประเภทการลา',
  `num_of_day` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'จำนวนวันที่ลาได้',
  `comment` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_cnfl_of_day`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `mcmp`
-- ----------------------------
DROP TABLE IF EXISTS `mcmp`;
CREATE TABLE `mcmp` (
  `id_mcmp` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_mcmp_main` int(10) DEFAULT NULL,
  `mcmp_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสบริษัท',
  `mcmp_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อบริษัท ภาษาอังกฤษ',
  `adr_line` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ที่อยู่ แบบบรรทัด#1',
  `tax_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เลขประจำตัวผู้เสียภาษีอากร',
  `website` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เว็บไซท์',
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อีเมลล์',
  `contact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้ติดต่อ',
  `telephone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์มือถือ',
  `fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์แฟกซ์',
  `is_owner` tinyint(4) DEFAULT '0' COMMENT 'เป็นองค์กรณ์เจ้าของระบบหรือไม่',
  `is_main` tinyint(4) DEFAULT NULL,
  `is_supplier` tinyint(4) DEFAULT '0' COMMENT 'เป็น Supplier หรือไม่',
  `is_dealer` tinyint(4) DEFAULT '0' COMMENT 'เป็น Dealer หรือไม่',
  `is_customer` tinyint(4) DEFAULT '0' COMMENT 'เป็นลูกค้าหรือไม่',
  `comment` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_mcmp`),
  KEY `idx_mcmp_code` (`mcmp_code`) USING BTREE,
  KEY `idx_mcmp_name_en` (`mcmp_name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `mdept`
-- ----------------------------
DROP TABLE IF EXISTS `mdept`;
CREATE TABLE `mdept` (
  `id_mdept` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_mcmp` int(10) NOT NULL,
  `mdept_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสแผนก',
  `mdept_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อแผนก ภาษาอังกฤษ',
  `comment` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_mdept`),
  KEY `idx_mdept_code` (`mdept_code`) USING BTREE,
  KEY `idx_mdept_name_en` (`mdept_name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `memp`
-- ----------------------------
DROP TABLE IF EXISTS `memp`;
CREATE TABLE `memp` (
  `id_memp` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_mpst` int(10) unsigned NOT NULL COMMENT 'ID ประเภทพนักงาน',
  `memp_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสพนักงาน',
  `sex` tinyint(4) DEFAULT NULL COMMENT 'เพศ (1= ชาย,2 = หญิง)',
  `status_marriaged` tinyint(4) DEFAULT NULL COMMENT 'สถานะภาพการแต่งงาน (0 = โสด, 1 = แต่ง และอยู่ด้วยกัน, 2 = แต่ง แต่แยกกันอยู่, 3= หย่าร้าง)',
  `is_tit` int(10) unsigned DEFAULT NULL COMMENT 'ID คำนำหน้า',
  `firstname` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อพนักงาน ภาษาไทย',
  `lastname` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'นามสกุลพนักงาน ภาษาไทย',
  `birthdate` date DEFAULT NULL COMMENT 'วันเกิด',
  `regisdate` date DEFAULT NULL COMMENT 'วันที่เริ่มทำงาน',
  `resigndate` date DEFAULT NULL COMMENT 'วันที่สิ้นสุดการเป็นพนักงาน',
  `adr_line1` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ที่อยู่ตามสำเนาทะเบียนบ้าน',
  `adr_line2` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ที่อยู่ปัจจุบัน',
  `idcard_num` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ID Card Number',
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อีเมลล์',
  `telephone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์มือถือ',
  `fax` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์แฟกซ์',
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ Login Name',
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Password',
  `comment` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_memp`),
  KEY `idx_memp_code` (`memp_code`) USING BTREE,
  KEY `idx_memp_name_th` (`firstname`,`lastname`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `mmenu`
-- ----------------------------
DROP TABLE IF EXISTS `mmenu`;
CREATE TABLE `mmenu` (
  `id_mmenu` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `mmenu_name` varchar(255) NOT NULL COMMENT 'ชื่อเมนูภาษาอังกฤษ',
  `id_parent` int(10) unsigned NOT NULL COMMENT 'ID รายการแม่',
  `id_order` int(10) unsigned NOT NULL COMMENT 'ลำดับที่',
  `location` varchar(255) NOT NULL COMMENT 'Class Name / Function',
  `is_list` int(1) NOT NULL DEFAULT '1',
  `is_add` int(1) NOT NULL DEFAULT '1',
  `is_edit` int(1) NOT NULL DEFAULT '1',
  `is_print` int(1) NOT NULL DEFAULT '1',
  `is_approve` int(1) NOT NULL DEFAULT '1',
  `level` int(10) NOT NULL COMMENT 'ลำดับ Level',
  `comment` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_mmenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `mnfl_type`
-- ----------------------------
DROP TABLE IF EXISTS `mnfl_type`;
CREATE TABLE `mnfl_type` (
  `id_mnfl_type` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `mnfl_type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัส ตำแหน่งพนักงาน',
  `comment` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_mnfl_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `mpst`
-- ----------------------------
DROP TABLE IF EXISTS `mpst`;
CREATE TABLE `mpst` (
  `id_mpst` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_mdept` int(10) NOT NULL,
  `mpst_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัส ตำแหน่งพนักงาน',
  `mpst_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อประเภทพนักงาน ภาษาอังกฤษ',
  `comment` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_mpst`),
  KEY `idx_mpst_code` (`mpst_code`) USING BTREE,
  KEY `idx_mpst_name_en` (`mpst_name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `mtask_type`
-- ----------------------------
DROP TABLE IF EXISTS `mtask_type`;
CREATE TABLE `mtask_type` (
  `id_mtask_type` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `mtask_type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อประเภทพนักงาน ภาษาอังกฤษ',
  `comment` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_mtask_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `tnfl`
-- ----------------------------
DROP TABLE IF EXISTS `tnfl`;
CREATE TABLE `tnfl` (
  `id_tnfl` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_memp` int(10) NOT NULL,
  `tnfl_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัส ตำแหน่งพนักงาน',
  `at` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เขียนที่',
  `subject` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เรื่อง',
  `id_memp_approve` int(10) DEFAULT NULL COMMENT 'ผู้บังคับบัญชา',
  `status_approve` int(4) DEFAULT NULL COMMENT 'สถานะการอนุมัติ',
  `desc_approve` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ความเห็นของผู้บังคับบัญชา',
  `id_mnfl_type` int(10) DEFAULT NULL COMMENT 'ประเภทการลา',
  `attach_medical_certificate` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เอกสารอ้างอิง ใบรับรองแพทย์',
  `is_wages` int(4) DEFAULT NULL COMMENT '1= ลาแบบรับค่าจ้าง, 2= ลาแบบไม่รับค่าจ้าง',
  `wages_of_day` int(10) DEFAULT NULL COMMENT 'จำนวนวันที่ รับหรือ ไม่รับค่าจ้าง ',
  `tnfl_dt_start` datetime DEFAULT NULL COMMENT 'วันลาเริ่มต้น',
  `tnfl_dt_finish` datetime DEFAULT NULL COMMENT 'วันลาสิ้นสุด',
  `num_of_day` int(10) DEFAULT NULL COMMENT 'จำนวนวันที่ลาครั้งนี้',
  `cause` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สาเหตุการลา เนื่องจาก',
  `contact` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ระหว่างการลา สามารถติดต่อได้ที่',
  `attach_file` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เอกสารอ้างอิ้งที่ทำการลงนาม',
  `comment` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_tnfl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `tplan_dtl`
-- ----------------------------
DROP TABLE IF EXISTS `tplan_dtl`;
CREATE TABLE `tplan_dtl` (
  `id_tplan_dtl` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_tplan_hdr` int(10) NOT NULL COMMENT 'บริษัทเจ้าของโครงการ',
  `task_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `task_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `percent` int(10) NOT NULL DEFAULT '0' COMMENT '% การดำเนินการ ',
  `duration` int(10) NOT NULL DEFAULT '0' COMMENT 'จำนวนวันดำเนินการ',
  `id_memp_resource` int(10) NOT NULL COMMENT 'ผู้รับผิดชอบ ',
  `plan_dt_start` datetime NOT NULL COMMENT 'วันที่เริ่มต้น',
  `plan_dt_finish` datetime NOT NULL COMMENT 'วันที่เสร็จ',
  `is_level` int(4) NOT NULL DEFAULT '1',
  `id_parent` int(10) NOT NULL COMMENT 'ID รายการแม่ ที่รายการนั้นๆ เป็น Sub อยู่',
  `id_predecessor` int(10) DEFAULT NULL COMMENT 'Task no  รายการที่ต้องเสร็จก่อนทำรายการนี้  (pdc = predecessor)',
  `comment` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_tplan_dtl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `tplan_hdr`
-- ----------------------------
DROP TABLE IF EXISTS `tplan_hdr`;
CREATE TABLE `tplan_hdr` (
  `id_tplan_hdr` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_tproject` int(10) NOT NULL COMMENT 'บริษัทเจ้าของโครงการ',
  `description` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plan_dt_start` datetime NOT NULL,
  `plan_dt_end` datetime NOT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_tplan_hdr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `tproject`
-- ----------------------------
DROP TABLE IF EXISTS `tproject`;
CREATE TABLE `tproject` (
  `id_tproject` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_mcmp_owner` int(10) NOT NULL COMMENT 'บริษัทเจ้าของโครงการ',
  `id_mcmp` int(10) NOT NULL COMMENT 'บริษัท ผู้ดำเนินโครงการ',
  `tproject_code` int(10) NOT NULL,
  `tproject_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อแผนก ภาษาอังกฤษ',
  `description` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_dt_start` datetime NOT NULL,
  `ptoject_dt_end` datetime NOT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_tproject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ttatd`
-- ----------------------------
DROP TABLE IF EXISTS `ttatd`;
CREATE TABLE `ttatd` (
  `id_ttatd` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `is_type` int(4) DEFAULT NULL COMMENT '1 = เข้างาน , 2= ออกงาน ',
  `ttatd_date` datetime NOT NULL COMMENT 'ชื่อประเภทพนักงาน ภาษาอังกฤษ',
  `id_memp` int(10) DEFAULT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_log` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_log` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  PRIMARY KEY (`id_ttatd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `tteam_dtl`
-- ----------------------------
DROP TABLE IF EXISTS `tteam_dtl`;
CREATE TABLE `tteam_dtl` (
  `id_tteam_dtl` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_tteam_hdr` int(10) NOT NULL,
  `id_memp` int(10) NOT NULL,
  `duty` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หน้าที่ในทีม',
  `comment` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_tteam_dtl`),
  KEY `idx_mdept_name_en` (`duty`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `tteam_hdr`
-- ----------------------------
DROP TABLE IF EXISTS `tteam_hdr`;
CREATE TABLE `tteam_hdr` (
  `id_tteam_hdr` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `tteam_code` int(10) NOT NULL,
  `tteam_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อแผนก ภาษาอังกฤษ',
  `tteam_date` datetime DEFAULT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_tteam_hdr`),
  KEY `idx_mdept_name_en` (`tteam_name`(255)) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ttimesheet`
-- ----------------------------
DROP TABLE IF EXISTS `ttimesheet`;
CREATE TABLE `ttimesheet` (
  `id_ttimesheet` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_ttodolist` int(10) NOT NULL,
  `sheet_no` bigint(20) NOT NULL,
  `ttodolist_date` datetime NOT NULL,
  `id_mtask_type` int(4) NOT NULL COMMENT 'เป็นงานที่เปิดมาจากงานใด  1 = todo, 2=โอนมา  , 3= plan, 4=issue',
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(10) NOT NULL DEFAULT '0' COMMENT 'จำนวนชั่วโมงทำงาน',
  `is_progress` int(10) NOT NULL COMMENT '1=Inprogress - ontime, 2=Inprogress - ontime, 3=Finished, 4=Cancelled,',
  `id_memp_resource` int(10) NOT NULL COMMENT 'พนักงานที่ได้รับมอบหมาย',
  `comment` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_ttimesheet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `ttodolist`
-- ----------------------------
DROP TABLE IF EXISTS `ttodolist`;
CREATE TABLE `ttodolist` (
  `id_ttodolist` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'running number',
  `id_tproject` int(10) NOT NULL,
  `ttodolist_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ttodolist_date` datetime NOT NULL,
  `is_reference` int(4) NOT NULL COMMENT 'เป็นงานที่เปิดมาจากงานใด  1 = todo, 2=โอนมา  , 3= plan, 4=issue',
  `id_reference` int(10) DEFAULT NULL,
  `task_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_priority` int(10) NOT NULL DEFAULT '0' COMMENT 'จำนวนวันดำเนินการ',
  `id_memp_assigned` int(10) NOT NULL COMMENT 'ผู้มอบหมายงาน',
  `id_memp_approve` int(11) DEFAULT NULL COMMENT 'ผู้ตรวจสอบ หรือ อนุมัติ ผลการดำเนินงาน',
  `id_memp_resource` int(10) NOT NULL COMMENT 'พนักงานที่ได้รับมอบหมาย',
  `assign_start_date` datetime NOT NULL COMMENT 'วันที่เริ่มต้น',
  `resource_start_date` datetime DEFAULT NULL COMMENT 'มอบหมายให้ วันที่เริ่มทำ',
  `resource_finish_date` datetime DEFAULT NULL COMMENT 'มอบหมายวันที่ต้องเสร็จ',
  `approve_date` datetime DEFAULT NULL,
  `assign_finish_date` datetime NOT NULL COMMENT 'วันที่เสร็จ',
  `comment` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หมายเหตุ',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'สถานะรายการ',
  `id_create` int(10) unsigned NOT NULL COMMENT 'ID ผู้สร้าง',
  `dt_create` datetime NOT NULL COMMENT 'datetime สร้างครั้งแรก',
  `id_update` int(10) unsigned NOT NULL COMMENT 'ID ผู้แก้ไขล่าสุด',
  `dt_update` datetime NOT NULL COMMENT 'datetime แก้ไขล่าสุด',
  PRIMARY KEY (`id_ttodolist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

SET FOREIGN_KEY_CHECKS = 1;
