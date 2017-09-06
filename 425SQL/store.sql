/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50705
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50705
File Encoding         : 65001

Date: 2016-12-10 21:31:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for store
-- ----------------------------
DROP TABLE IF EXISTS `store`;
CREATE TABLE `store` (
  `ProductId` int(11) NOT NULL,
  `WarehouseId` int(11) NOT NULL,
  `Quantity` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`ProductId`,`WarehouseId`),
  KEY `WarehouseId` (`WarehouseId`),
  CONSTRAINT `store_ibfk_2` FOREIGN KEY (`WarehouseId`) REFERENCES `warehouses` (`WarehouseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of store
-- ----------------------------
INSERT INTO `store` VALUES ('1', '1', '107');
INSERT INTO `store` VALUES ('1', '2', '100');
INSERT INTO `store` VALUES ('1', '3', '13');
INSERT INTO `store` VALUES ('2', '3', '26');
