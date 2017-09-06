/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50705
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50705
File Encoding         : 65001

Date: 2016-12-10 21:30:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ordering
-- ----------------------------
DROP TABLE IF EXISTS `ordering`;
CREATE TABLE `ordering` (
  `OrderId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `ProductId` int(11) unsigned NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`OrderId`,`CustomerId`,`ProductId`),
  KEY `CustomerId` (`CustomerId`),
  KEY `ProductId` (`ProductId`),
  CONSTRAINT `ordering_ibfk_3` FOREIGN KEY (`ProductId`) REFERENCES `products` (`ProductId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ordering
-- ----------------------------
INSERT INTO `ordering` VALUES ('1', '1', '1', '1');
INSERT INTO `ordering` VALUES ('2', '1', '1', '1');
INSERT INTO `ordering` VALUES ('3', '1', '1', '1');
INSERT INTO `ordering` VALUES ('4', '1', '1', '3');
INSERT INTO `ordering` VALUES ('4', '1', '2', '7');
