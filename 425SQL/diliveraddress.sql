/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50705
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50705
File Encoding         : 65001

Date: 2016-12-10 21:30:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for diliveraddress
-- ----------------------------
DROP TABLE IF EXISTS `diliveraddress`;
CREATE TABLE `diliveraddress` (
  `DiliverAddressId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) unsigned NOT NULL,
  `StateId` tinyint(3) unsigned NOT NULL,
  `City` varchar(15) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Zipcode` varchar(12) NOT NULL,
  PRIMARY KEY (`DiliverAddressId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of diliveraddress
-- ----------------------------
INSERT INTO `diliveraddress` VALUES ('1', '1', '1', 'zzzz', '1111', '11111');
INSERT INTO `diliveraddress` VALUES ('2', '1', '1', '111', '111', '111');
