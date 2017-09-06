/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50705
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50705
File Encoding         : 65001

Date: 2016-12-10 21:30:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `CustomerId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) NOT NULL,
  `Passport` varchar(20) NOT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `MiddleName` varchar(10) DEFAULT NULL,
  `LastName` varchar(10) DEFAULT NULL,
  `BirthYear` decimal(4,0) DEFAULT NULL,
  `BirthMonth` decimal(2,0) DEFAULT NULL,
  `BirthDay` decimal(2,0) DEFAULT NULL,
  `Balance` int(11) unsigned DEFAULT '0',
  `defaultDiliverId` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`CustomerId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'zz', '123456', null, null, null, null, null, null, '0', '1');
INSERT INTO `customers` VALUES ('2', 'aaa', 'aaa', null, null, null, null, null, null, '0', '0');
