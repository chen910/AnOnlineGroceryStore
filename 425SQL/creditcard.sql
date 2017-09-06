/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50705
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50705
File Encoding         : 65001

Date: 2016-12-10 21:30:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for creditcard
-- ----------------------------
DROP TABLE IF EXISTS `creditcard`;
CREATE TABLE `creditcard` (
  `CreditId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(10) NOT NULL,
  `MiddleName` varchar(10) DEFAULT NULL,
  `LastName` varchar(10) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `StateId` tinyint(3) unsigned NOT NULL,
  `City` varchar(15) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Zipcode` varchar(12) NOT NULL,
  `DueTime` varchar(50) DEFAULT NULL,
  `SecureNumber` decimal(3,0) NOT NULL,
  PRIMARY KEY (`CreditId`),
  KEY `CustomerId` (`CustomerId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of creditcard
-- ----------------------------
INSERT INTO `creditcard` VALUES ('1', 'zz', 'zz', 'zz', '1', '1', 'sadas', 'asdasd', '11111', '11/21', '111');
