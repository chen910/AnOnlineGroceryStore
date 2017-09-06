/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50705
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50705
File Encoding         : 65001

Date: 2016-12-10 21:31:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for taxs
-- ----------------------------
DROP TABLE IF EXISTS `taxs`;
CREATE TABLE `taxs` (
  `StateId` tinyint(3) unsigned NOT NULL,
  `Tax` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of taxs
-- ----------------------------
INSERT INTO `taxs` VALUES ('1', '1000');
INSERT INTO `taxs` VALUES ('2', '700');
INSERT INTO `taxs` VALUES ('3', '1060');
INSERT INTO `taxs` VALUES ('4', '600');
INSERT INTO `taxs` VALUES ('5', '1025');
INSERT INTO `taxs` VALUES ('6', '0');
INSERT INTO `taxs` VALUES ('7', '600');
INSERT INTO `taxs` VALUES ('8', '0');
INSERT INTO `taxs` VALUES ('9', '750');
INSERT INTO `taxs` VALUES ('10', '800');
INSERT INTO `taxs` VALUES ('11', '0');
INSERT INTO `taxs` VALUES ('12', '0');
INSERT INTO `taxs` VALUES ('13', '1150');
INSERT INTO `taxs` VALUES ('14', '900');
INSERT INTO `taxs` VALUES ('15', '700');
INSERT INTO `taxs` VALUES ('16', '0');
INSERT INTO `taxs` VALUES ('17', '600');
INSERT INTO `taxs` VALUES ('18', '900');
INSERT INTO `taxs` VALUES ('19', '500');
INSERT INTO `taxs` VALUES ('20', '600');
INSERT INTO `taxs` VALUES ('21', '0');
INSERT INTO `taxs` VALUES ('22', '600');
INSERT INTO `taxs` VALUES ('23', '750');
INSERT INTO `taxs` VALUES ('24', '900');
INSERT INTO `taxs` VALUES ('25', '0');
INSERT INTO `taxs` VALUES ('26', '300');
INSERT INTO `taxs` VALUES ('27', '700');
INSERT INTO `taxs` VALUES ('28', '0');
INSERT INTO `taxs` VALUES ('29', '0');
INSERT INTO `taxs` VALUES ('30', '700');
INSERT INTO `taxs` VALUES ('31', '0');
INSERT INTO `taxs` VALUES ('32', '875');
INSERT INTO `taxs` VALUES ('33', '725');
INSERT INTO `taxs` VALUES ('34', '0');
INSERT INTO `taxs` VALUES ('35', '775');
INSERT INTO `taxs` VALUES ('36', '5');
INSERT INTO `taxs` VALUES ('37', '0');
INSERT INTO `taxs` VALUES ('38', '700');
INSERT INTO `taxs` VALUES ('39', '700');
INSERT INTO `taxs` VALUES ('40', '700');
INSERT INTO `taxs` VALUES ('41', '0');
INSERT INTO `taxs` VALUES ('42', '0');
INSERT INTO `taxs` VALUES ('43', '975');
INSERT INTO `taxs` VALUES ('44', '825');
INSERT INTO `taxs` VALUES ('45', '0');
INSERT INTO `taxs` VALUES ('46', '700');
INSERT INTO `taxs` VALUES ('47', '500');
INSERT INTO `taxs` VALUES ('48', '950');
INSERT INTO `taxs` VALUES ('49', '600');
INSERT INTO `taxs` VALUES ('50', '560');
