/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50705
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50705
File Encoding         : 65001

Date: 2016-12-10 21:31:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for stuffs
-- ----------------------------
DROP TABLE IF EXISTS `stuffs`;
CREATE TABLE `stuffs` (
  `StuffId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) NOT NULL,
  `Passort` varchar(20) NOT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `MiddleName` varchar(10) DEFAULT NULL,
  `LastName` varchar(10) DEFAULT NULL,
  `State` varchar(2) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `Zipcode` varchar(12) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  `JobTitle` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`StuffId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stuffs
-- ----------------------------
INSERT INTO `stuffs` VALUES ('1', 'zz', '12345678', 'zz', 'zz', 'zz', '5', 'zz', 'zzz', '13123', '1111', 'cs');
