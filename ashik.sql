/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100110
 Source Host           : localhost:3306
 Source Schema         : ashik

 Target Server Type    : MySQL
 Target Server Version : 100110
 File Encoding         : 65001

 Date: 30/10/2018 01:02:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking`  (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `movie` int(11) NULL DEFAULT NULL,
  `price` int(10) NULL DEFAULT NULL,
  `cid` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`bid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES (1, '2018-10-03', 3, 500, 7);
INSERT INTO `booking` VALUES (2, '2018-10-03', 4, 700, 4);
INSERT INTO `booking` VALUES (3, '2018-10-17', 3, 500, 9);
INSERT INTO `booking` VALUES (4, '10/30/2018', 6, 500, 4);

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (4, 'Sajid', 'Rayhan', 'sajid@gmail.com', '01687901120', 'Mugdha, Dhaka', '123');
INSERT INTO `customer` VALUES (6, 'tt', 'tt', 'f@ib.com', '5103247049', '2884 Wayside Lane', '123');
INSERT INTO `customer` VALUES (7, 'customer', '1', 'test@gmail.com', '0596', 'Panthapat', '123');
INSERT INTO `customer` VALUES (8, 'Mahmudur', 'Rahman', 'm@gmail.com', '5548845', 'Dhaka', '123');
INSERT INTO `customer` VALUES (9, 'as', 'f', 'asf@gmail.com', '32165464', 'sdfsfsg', '123456');

-- ----------------------------
-- Table structure for customer_membership
-- ----------------------------
DROP TABLE IF EXISTS `customer_membership`;
CREATE TABLE `customer_membership`  (
  `cum_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mem_id` int(11) NULL DEFAULT NULL,
  `customer_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cum_id`) USING BTREE,
  INDEX `cmem_fk_1`(`mem_id`) USING BTREE,
  INDEX `cmem_fk_2`(`customer_id`) USING BTREE,
  CONSTRAINT `cmem_fk_1` FOREIGN KEY (`mem_id`) REFERENCES `membership` (`mem_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cmem_fk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for customer_movie
-- ----------------------------
DROP TABLE IF EXISTS `customer_movie`;
CREATE TABLE `customer_movie`  (
  `cm_id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) NULL DEFAULT NULL,
  `movie_id` int(11) NULL DEFAULT NULL,
  `date` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `time` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `payment_status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `amount` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`cm_id`) USING BTREE,
  INDEX `cm_fk_2`(`movie_id`) USING BTREE,
  INDEX `cm_fk_1`(`cus_id`) USING BTREE,
  CONSTRAINT `cm_fk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cid`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `cm_fk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`mid`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for hall
-- ----------------------------
DROP TABLE IF EXISTS `hall`;
CREATE TABLE `hall`  (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `seat` int(10) NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`h_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of hall
-- ----------------------------
INSERT INTO `hall` VALUES (1, 'Hall No. 1', 60, 'Testing');

-- ----------------------------
-- Table structure for membership
-- ----------------------------
DROP TABLE IF EXISTS `membership`;
CREATE TABLE `membership`  (
  `mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `mem_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `discount` int(5) NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mem_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for movie
-- ----------------------------
DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie`  (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `genre` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `release` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `director` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `stars` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `price` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`mid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of movie
-- ----------------------------
INSERT INTO `movie` VALUES (3, 'Avater2', 'Adventure', '2010-12-10', 'James Cameron', 'Sam Worthington', 'Avatar, marketed as James Cameron\'s Avatar, is a 2009 American epic science fiction film.', 'Continue', 500);
INSERT INTO `movie` VALUES (4, 'Manikarnika', 'War', '2019-01-25', 'Mr x', 'Kangana Ranaut', 'Manikarnika Official Teaser | Kangana Ranaut | Releasing 25th January', 'Continue', 700);
INSERT INTO `movie` VALUES (6, 'Iniana', 'Thriller', '2018-10-19', 'James Cameron', 'Iliana', 'dfs', 'Continue', 500);

-- ----------------------------
-- Table structure for movie_hall
-- ----------------------------
DROP TABLE IF EXISTS `movie_hall`;
CREATE TABLE `movie_hall`  (
  `ma_id` int(10) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NULL DEFAULT NULL,
  `hall_id` int(11) NULL DEFAULT NULL,
  `date` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ma_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of movie_hall
-- ----------------------------
INSERT INTO `movie_hall` VALUES (1, 6, 1, '10/30/2018');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`u_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Foysal Ahammad', 'foysal35@diit.info', '123', '01852595966', 'Panthapath', '1', 'Active');

SET FOREIGN_KEY_CHECKS = 1;
