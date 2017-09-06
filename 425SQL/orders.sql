/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50705
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50705
File Encoding         : 65001

Date: 2016-12-10 21:30:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NOT NULL,
  `TotalPrice` int(11) unsigned NOT NULL DEFAULT '0',
  `IssueTime` int(10) unsigned DEFAULT NULL,
  `Status` tinyint(3) NOT NULL DEFAULT '0',
  `CreditId` int(11) DEFAULT NULL,
  `DiliverId` int(11) DEFAULT NULL,
  PRIMARY KEY (`OrderId`),
  KEY `CreditId` (`CreditId`),
  KEY `DiliverId` (`DiliverId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '1', '109989', '1481373305', '1', '1', '1');
INSERT INTO `orders` VALUES ('2', '1', '109989', '1481373479', '1', '1', '1');
INSERT INTO `orders` VALUES ('3', '1', '109989', '1481373523', '1', '1', '1');
INSERT INTO `orders` VALUES ('4', '1', '415514', '1481373562', '1', '1', '1');
