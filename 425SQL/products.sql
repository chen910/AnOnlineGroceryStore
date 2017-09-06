/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50705
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50705
File Encoding         : 65001

Date: 2016-12-10 21:30:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `ProductId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(50) NOT NULL,
  `ProductType` varchar(15) NOT NULL,
  `AdditionalInformation` varchar(200) DEFAULT NULL,
  `ProductSize` varchar(20) DEFAULT NULL,
  `ProductImagePath` varchar(250) DEFAULT NULL,
  `ProductPrice` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'apple', 'fruit', 'hot hot hot!', '10', 'http://b-i.forbesimg.com/spleverage/files/2013/04/silver-apple-logo-apple-picture.jpg', '9999');
INSERT INTO `products` VALUES ('2', 'nike', 'shoes', 'just do it', '44', 'http://uncrate.com/p/2013/04/nike-lunar-presto-xl.jpg', '1111');
