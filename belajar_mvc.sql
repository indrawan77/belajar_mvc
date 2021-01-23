/*
 Navicat Premium Data Transfer

 Source Server         : DB_LOCAL_7.4
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : belajar_mvc

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 24/01/2021 06:16:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_deleted` int(1) NOT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', 'Indrawan', 'risangaji7@gmail.com', '082217006438', '123123', 0);
INSERT INTO `admin` VALUES (2, 'user1', 'user1', 'user1@gmail.com', '081234567890', '123123', 0);
INSERT INTO `admin` VALUES (3, 'user2', 'user2', 'user2@gmail.com', '081234567890', '123123', 0);
INSERT INTO `admin` VALUES (4, 'user3', 'user3', 'user2@gmail.com', '081234567890', '123123', 0);

SET FOREIGN_KEY_CHECKS = 1;
