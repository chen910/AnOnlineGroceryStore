/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50705
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50705
File Encoding         : 65001

Date: 2016-12-10 21:31:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for warehouses
-- ----------------------------
DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE `warehouses` (
  `WarehouseId` int(11) NOT NULL,
  `WarehouseName` varchar(20) DEFAULT NULL,
  `WarehouseState` varchar(2) DEFAULT NULL,
  `WarehouseCity` varchar(15) DEFAULT NULL,
  `WarehouseAddress` varchar(50) DEFAULT NULL,
  `Zipcode` varchar(12) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `CurrentStore` int(11) DEFAULT '0',
  PRIMARY KEY (`WarehouseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of warehouses
-- ----------------------------
INSERT INTO `warehouses` VALUES ('1', 'NY Warehouse', '1', 'NewYork', 'NewYork', null, null, '14');
INSERT INTO `warehouses` VALUES ('2', 'LA Warehouse', '1', 'NewYork', 'NewYork', null, null, '1');
INSERT INTO `warehouses` VALUES ('3', 'China Warehouse', '1', 'NJ', '', '', null, '59');
