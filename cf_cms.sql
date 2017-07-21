/*
Navicat MySQL Data Transfer

Source Server         : upupw
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : cf_cms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-21 18:06:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cf_admin
-- ----------------------------
DROP TABLE IF EXISTS `cf_admin`;
CREATE TABLE `cf_admin` (
  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_account` varchar(20) NOT NULL DEFAULT '',
  `admin_password` varchar(20) NOT NULL DEFAULT '',
  `admin_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `admin_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cf_admin
-- ----------------------------

-- ----------------------------
-- Table structure for cf_company
-- ----------------------------
DROP TABLE IF EXISTS `cf_company`;
CREATE TABLE `cf_company` (
  `company_id` int(10) unsigned NOT NULL DEFAULT '0',
  `company_tkey` varchar(50) NOT NULL DEFAULT '',
  `company_code` varchar(20) NOT NULL DEFAULT '',
  `system_code` varchar(5) NOT NULL DEFAULT '',
  `company_name` varchar(50) NOT NULL DEFAULT '',
  `company_phone` varchar(20) NOT NULL DEFAULT '',
  `company_identity_info` varchar(50) NOT NULL DEFAULT '',
  `company_identity_photo` varchar(50) NOT NULL DEFAULT '',
  `company_area_sheng` int(10) unsigned NOT NULL DEFAULT '0',
  `company_area_shi` int(10) unsigned NOT NULL DEFAULT '0',
  `company_area_address` varchar(100) NOT NULL DEFAULT '',
  `company_link_name` varchar(20) NOT NULL DEFAULT '',
  `company_link_weixin` varchar(40) NOT NULL DEFAULT '',
  `company_info_xingzhi` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `company_info_guimo` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `company_info_ziben` int(10) unsigned NOT NULL DEFAULT '0',
  `company_info_chengli` int(10) unsigned NOT NULL DEFAULT '0',
  `company_sms_acount` int(10) unsigned NOT NULL DEFAULT '0',
  `company_sms_ycount` int(10) unsigned NOT NULL DEFAULT '0',
  `company_config_trade` varchar(1000) NOT NULL DEFAULT '',
  `company_config_weixin` varchar(1000) NOT NULL DEFAULT '',
  `company_memo` varchar(100) NOT NULL DEFAULT '',
  `company_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `company_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `company_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`company_id`),
  UNIQUE KEY `company_code` (`company_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cf_company
-- ----------------------------
INSERT INTO `cf_company` VALUES ('1', 'dad', 'abcd', 'fw', '我的家', '124', '', '', '0', '0', '', '', '', '0', '0', '0', '0', '0', '0', '', '', '', '0', '0', '0');

-- ----------------------------
-- Table structure for cf_session
-- ----------------------------
DROP TABLE IF EXISTS `cf_session`;
CREATE TABLE `cf_session` (
  `session_key` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_login_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `session_login_id` int(10) unsigned NOT NULL DEFAULT '0',
  `session_login_account` varchar(20) NOT NULL DEFAULT '',
  `session_login_code` varchar(5) NOT NULL DEFAULT '',
  `session_login_cid` int(10) unsigned NOT NULL DEFAULT '0',
  `session_login_sid` int(10) unsigned NOT NULL DEFAULT '0',
  `session_ip` char(15) NOT NULL DEFAULT '',
  `session_last` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`session_key`),
  KEY `session_last` (`session_last`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cf_session
-- ----------------------------
INSERT INTO `cf_session` VALUES ('a1ccc3174ffca2e66f31cf3b114741c2', '1', '1', 'admin', 'fw', '1', '10', '0.0.0.0', '1500628789');

-- ----------------------------
-- Table structure for cf_shop
-- ----------------------------
DROP TABLE IF EXISTS `cf_shop`;
CREATE TABLE `cf_shop` (
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `company_id` int(10) unsigned NOT NULL DEFAULT '0',
  `system_code` varchar(5) NOT NULL DEFAULT '',
  `shop_name` varchar(40) NOT NULL DEFAULT '',
  `shop_area_sheng` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_area_shi` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_area_jing` decimal(15,12) unsigned NOT NULL DEFAULT '0.000000000000',
  `shop_area_wei` decimal(15,12) unsigned NOT NULL DEFAULT '0.000000000000',
  `shop_area_address` varchar(100) NOT NULL DEFAULT '',
  `shop_phone` varchar(20) NOT NULL DEFAULT '',
  `shop_limit_user` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_config` varchar(1000) NOT NULL DEFAULT '',
  `shop_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `shop_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_edate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cf_shop
-- ----------------------------
INSERT INTO `cf_shop` VALUES ('1', '1', 'abcd', '店铺1', '0', '0', '0.000000000000', '0.000000000000', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `cf_shop` VALUES ('10', '1', 'abcd', '店铺2', '0', '0', '0.000000000000', '0.000000000000', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `cf_shop` VALUES ('11', '1', 'abcd', '新店铺', '0', '0', '0.000000000000', '0.000000000000', '', '', '0', '', '0', '0', '0', '0');
INSERT INTO `cf_shop` VALUES ('12', '1', 'abcd', '不可用店铺', '0', '0', '0.000000000000', '0.000000000000', '', '', '0', '', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_act
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_act`;
CREATE TABLE `fw_0001_act` (
  `act_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_discount_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_decrease_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_give_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_relate_aticket` int(10) unsigned NOT NULL DEFAULT '0',
  `act_relate_uticket` int(10) unsigned NOT NULL DEFAULT '0',
  `act_relate_hmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `act_relate_smoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `act_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`act_id`),
  KEY `act_atime` (`act_atime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_act
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_act_decrease
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_act_decrease`;
CREATE TABLE `fw_0001_act_decrease` (
  `act_decrease_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_decrease_name` varchar(50) NOT NULL DEFAULT '',
  `act_decrease_shop` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_decrease_client` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_decrease_man` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `act_decrease_jian` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `act_decrease_start` int(10) unsigned NOT NULL DEFAULT '0',
  `act_decrease_end` int(10) unsigned NOT NULL DEFAULT '0',
  `act_decrease_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_decrease_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `act_decrease_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`act_decrease_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_act_decrease
-- ----------------------------
INSERT INTO `fw_0001_act_decrease` VALUES ('1', '减10', '2', '1', '100.00', '10.00', '1483228800', '1513036800', '1', '0', '0');
INSERT INTO `fw_0001_act_decrease` VALUES ('2', '减5', '2', '1', '50.00', '5.00', '1483228800', '1513036800', '1', '0', '0');
INSERT INTO `fw_0001_act_decrease` VALUES ('3', '减30', '2', '2', '100.00', '30.00', '1483228800', '1513036800', '1', '0', '0');
INSERT INTO `fw_0001_act_decrease` VALUES ('4', '减200', '2', '1', '2000.00', '200.00', '1483228800', '1513036800', '1', '0', '0');
INSERT INTO `fw_0001_act_decrease` VALUES ('5', '减50', '2', '3', '500.00', '50.00', '1483228800', '1513036800', '1', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_act_decrease_shop
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_act_decrease_shop`;
CREATE TABLE `fw_0001_act_decrease_shop` (
  `act_decrease_shop_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_decrease_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`act_decrease_shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_act_decrease_shop
-- ----------------------------
INSERT INTO `fw_0001_act_decrease_shop` VALUES ('1', '1', '10');
INSERT INTO `fw_0001_act_decrease_shop` VALUES ('2', '2', '10');
INSERT INTO `fw_0001_act_decrease_shop` VALUES ('3', '1', '14');
INSERT INTO `fw_0001_act_decrease_shop` VALUES ('4', '1', '16');
INSERT INTO `fw_0001_act_decrease_shop` VALUES ('5', '2', '12');
INSERT INTO `fw_0001_act_decrease_shop` VALUES ('6', '3', '15');
INSERT INTO `fw_0001_act_decrease_shop` VALUES ('7', '4', '12');
INSERT INTO `fw_0001_act_decrease_shop` VALUES ('8', '3', '10');
INSERT INTO `fw_0001_act_decrease_shop` VALUES ('9', '5', '10');

-- ----------------------------
-- Table structure for fw_0001_act_discount
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_act_discount`;
CREATE TABLE `fw_0001_act_discount` (
  `act_discount_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_discount_name` varchar(50) NOT NULL DEFAULT '',
  `act_discount_shop` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_discount_client` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_discount_start` int(10) unsigned NOT NULL DEFAULT '0',
  `act_discount_end` int(10) unsigned NOT NULL DEFAULT '0',
  `act_discount_memo` varchar(100) NOT NULL DEFAULT '',
  `act_discount_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_discount_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `act_discount_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`act_discount_id`),
  KEY `act_discount_atime` (`act_discount_atime`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_act_discount
-- ----------------------------
INSERT INTO `fw_0001_act_discount` VALUES ('1', '7折优惠', '2', '1', '1483228800', '1513036800', '', '1', '0', '0');
INSERT INTO `fw_0001_act_discount` VALUES ('2', '跳楼', '2', '2', '1483228800', '1513036800', '', '1', '0', '0');
INSERT INTO `fw_0001_act_discount` VALUES ('3', '男默女泪', '2', '3', '1483228800', '1513036800', '', '1', '0', '0');
INSERT INTO `fw_0001_act_discount` VALUES ('4', '惊呆了', '2', '1', '1483228800', '1513036800', '', '1', '0', '0');
INSERT INTO `fw_0001_act_discount` VALUES ('5', '史上最强', '2', '1', '1483228800', '1513036800', '', '1', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_act_discount_goods
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_act_discount_goods`;
CREATE TABLE `fw_0001_act_discount_goods` (
  `act_discount_goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_discount_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_catalog_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mcombo_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_discount_goods_value` decimal(2,1) unsigned NOT NULL DEFAULT '0.0',
  `act_discount_goods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `act_discount_goods_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `act_discount_goods_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `c_mgoods_catalog_name` varchar(50) NOT NULL DEFAULT '',
  `c_mgoods_name` varchar(50) NOT NULL DEFAULT '',
  `c_mgoods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_mcombo_name` varchar(50) NOT NULL DEFAULT '',
  `c_mcombo_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`act_discount_goods_id`),
  KEY `act_discount_id` (`act_discount_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_act_discount_goods
-- ----------------------------
INSERT INTO `fw_0001_act_discount_goods` VALUES ('1', '1', '1', '1', '0', '7.5', '40.00', '0', '0', '', '', '0.00', '', '0.00');
INSERT INTO `fw_0001_act_discount_goods` VALUES ('2', '1', '2', '2', '0', '8.0', '20.00', '0', '0', '', '', '0.00', '', '0.00');
INSERT INTO `fw_0001_act_discount_goods` VALUES ('3', '1', '2', '3', '0', '8.0', '200.00', '0', '0', '', '', '0.00', '', '0.00');
INSERT INTO `fw_0001_act_discount_goods` VALUES ('4', '1', '4', '4', '0', '5.0', '30.00', '0', '0', '', '', '0.00', '', '0.00');
INSERT INTO `fw_0001_act_discount_goods` VALUES ('5', '1', '3', '5', '0', '0.0', '1.00', '0', '0', '', '', '0.00', '', '0.00');
INSERT INTO `fw_0001_act_discount_goods` VALUES ('6', '1', '3', '6', '0', '0.0', '800.00', '0', '0', '', '', '0.00', '', '0.00');
INSERT INTO `fw_0001_act_discount_goods` VALUES ('7', '1', '0', '0', '1', '0.0', '250.00', '0', '0', '', '', '0.00', '', '0.00');
INSERT INTO `fw_0001_act_discount_goods` VALUES ('8', '1', '0', '0', '2', '0.0', '550.00', '0', '0', '', '', '0.00', '', '0.00');
INSERT INTO `fw_0001_act_discount_goods` VALUES ('9', '2', '0', '0', '3', '0.0', '600.00', '0', '0', '', '', '0.00', '', '0.00');
INSERT INTO `fw_0001_act_discount_goods` VALUES ('10', '2', '0', '0', '4', '0.0', '120.00', '0', '0', '', '', '0.00', '', '0.00');
INSERT INTO `fw_0001_act_discount_goods` VALUES ('11', '1', '0', '0', '9', '0.0', '230.00', '0', '0', '', '', '0.00', '', '0.00');

-- ----------------------------
-- Table structure for fw_0001_act_discount_shop
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_act_discount_shop`;
CREATE TABLE `fw_0001_act_discount_shop` (
  `act_discount_shop_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_discount_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`act_discount_shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_act_discount_shop
-- ----------------------------
INSERT INTO `fw_0001_act_discount_shop` VALUES ('1', '1', '10');
INSERT INTO `fw_0001_act_discount_shop` VALUES ('2', '2', '15');
INSERT INTO `fw_0001_act_discount_shop` VALUES ('3', '2', '14');
INSERT INTO `fw_0001_act_discount_shop` VALUES ('4', '3', '12');
INSERT INTO `fw_0001_act_discount_shop` VALUES ('5', '2', '10');
INSERT INTO `fw_0001_act_discount_shop` VALUES ('6', '3', '10');

-- ----------------------------
-- Table structure for fw_0001_act_give
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_act_give`;
CREATE TABLE `fw_0001_act_give` (
  `act_give_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_give_name` varchar(50) NOT NULL DEFAULT '',
  `act_give_shop` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_give_client` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_give_man` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `act_give_ttype` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ticket_money_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ticket_goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_give_tdays` int(10) unsigned NOT NULL DEFAULT '0',
  `act_give_start` int(10) unsigned NOT NULL DEFAULT '0',
  `act_give_end` int(10) unsigned NOT NULL DEFAULT '0',
  `act_give_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_give_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `act_give_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `c_ticket_name` varchar(50) NOT NULL DEFAULT '',
  `c_ticket_value` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_ticket_limit` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_mgoods_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`act_give_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_act_give
-- ----------------------------
INSERT INTO `fw_0001_act_give` VALUES ('1', '满送1', '2', '1', '100.00', '1', '1', '0', '10', '1483228800', '1513036800', '1', '0', '0', '10元券', '10.00', '100.00', '0', '');
INSERT INTO `fw_0001_act_give` VALUES ('2', '满送2', '2', '1', '200.00', '2', '0', '1', '10', '1483228800', '1513036800', '1', '0', '0', '龙虾票', '20.00', '0.00', '2', '龙虾');
INSERT INTO `fw_0001_act_give` VALUES ('3', '满送3', '2', '1', '400.00', '1', '2', '0', '10', '1483228800', '1513036800', '1', '0', '0', '20元券', '200.00', '200.00', '0', '');
INSERT INTO `fw_0001_act_give` VALUES ('4', '满送4', '2', '1', '800.00', '1', '3', '0', '10', '1483228800', '1513036800', '1', '0', '0', '', '0.00', '0.00', '0', '');
INSERT INTO `fw_0001_act_give` VALUES ('5', '满送5', '2', '1', '2000.00', '1', '4', '0', '10', '1483228800', '1513036800', '1', '0', '0', '', '0.00', '0.00', '0', '');

-- ----------------------------
-- Table structure for fw_0001_act_give_shop
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_act_give_shop`;
CREATE TABLE `fw_0001_act_give_shop` (
  `act_give_shop_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_give_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`act_give_shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_act_give_shop
-- ----------------------------
INSERT INTO `fw_0001_act_give_shop` VALUES ('1', '1', '10');
INSERT INTO `fw_0001_act_give_shop` VALUES ('2', '1', '31');
INSERT INTO `fw_0001_act_give_shop` VALUES ('3', '1', '14');
INSERT INTO `fw_0001_act_give_shop` VALUES ('4', '2', '15');
INSERT INTO `fw_0001_act_give_shop` VALUES ('5', '2', '21');
INSERT INTO `fw_0001_act_give_shop` VALUES ('6', '3', '23');
INSERT INTO `fw_0001_act_give_shop` VALUES ('7', '4', '34');
INSERT INTO `fw_0001_act_give_shop` VALUES ('8', '2', '10');
INSERT INTO `fw_0001_act_give_shop` VALUES ('9', '3', '10');
INSERT INTO `fw_0001_act_give_shop` VALUES ('10', '4', '10');

-- ----------------------------
-- Table structure for fw_0001_act_ticket
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_act_ticket`;
CREATE TABLE `fw_0001_act_ticket` (
  `act_ticket_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_ticket_name` varchar(50) NOT NULL DEFAULT '',
  `act_ticket_search_shop` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_ticket_search_user` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_ticket_search_card` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_search_sex` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_ticket_search_fcreate` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_search_tcreate` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_search_fexpire` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_search_texpire` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_search_fbirthday` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_search_tbirthday` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_search_days` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_atype` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_ticket_ttype` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ticket_money_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ticket_goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_tdays` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_sms` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_ticket_info` varchar(1000) NOT NULL DEFAULT '',
  `act_ticket_weixin` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_ticket_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_ticket_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `c_ticket_name` varchar(50) NOT NULL DEFAULT '',
  `c_ticket_value` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_ticket_limit` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_mgoods_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`act_ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_act_ticket
-- ----------------------------
INSERT INTO `fw_0001_act_ticket` VALUES ('1', '开业大酬宾', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '', '0.00', '0.00', '0', '龙虾');

-- ----------------------------
-- Table structure for fw_0001_act_ticket_shop
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_act_ticket_shop`;
CREATE TABLE `fw_0001_act_ticket_shop` (
  `act_ticket_shop_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `act_ticket_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`act_ticket_shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_act_ticket_shop
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_card
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_card`;
CREATE TABLE `fw_0001_card` (
  `card_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_okey` varchar(50) NOT NULL DEFAULT '',
  `card_ikey` varchar(50) NOT NULL DEFAULT '',
  `card_code` varchar(50) NOT NULL DEFAULT '',
  `card_password` varchar(20) NOT NULL DEFAULT '',
  `card_password_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `card_name` varchar(20) NOT NULL DEFAULT '',
  `card_photo_file` varchar(50) NOT NULL DEFAULT '',
  `card_phone` varchar(20) NOT NULL DEFAULT '',
  `card_identity` varchar(20) NOT NULL DEFAULT '',
  `card_sex` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `card_birthday` int(10) unsigned NOT NULL DEFAULT '0',
  `card_birthday2` int(10) unsigned NOT NULL DEFAULT '0',
  `card_memo` varchar(100) NOT NULL DEFAULT '',
  `card_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `card_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `card_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `card_ltime` int(10) unsigned NOT NULL DEFAULT '0',
  `card_edate` int(10) unsigned NOT NULL DEFAULT '0',
  `c_card_type_name` varchar(20) NOT NULL DEFAULT '',
  `c_card_type_discount` decimal(3,1) unsigned NOT NULL DEFAULT '0.0',
  `s_card_smoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `s_card_ymoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `s_card_score` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`card_id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_card
-- ----------------------------
INSERT INTO `fw_0001_card` VALUES ('55', '0', '10', '', '', 'ssr0', '', '2', '青行灯', '', '110', '', '2', '1499788800', '1499788800', '', '1', '1499753467', '0', '0', '1514736000', '', '0.0', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('56', '0', '10', '', '', 'ssr1', '', '2', '妖刀姬', '', '112', '', '2', '1499961600', '1499961600', '', '1', '1499753486', '0', '0', '1514736000', '', '0.0', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('57', '0', '10', '', '', 'ssr2', '', '2', '大天狗', '', '120', '', '1', '1499529600', '1499529600', '', '1', '1499753516', '0', '0', '1514736000', '', '0.0', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('58', '0', '10', '', '', 'ssr4', '', '2', '酒吞童子', '', '532', '', '1', '0', '0', '', '1', '1499753540', '0', '0', '1514736000', '', '0.0', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('59', '0', '10', '', '', 'ssr5', '', '2', '小鹿男', '', '43', '', '1', '0', '0', '', '1', '1499753559', '0', '0', '1514736000', '', '0.0', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('60', '0', '10', '', '', 'ssr6', '', '2', '荒川之主', '', '433', '', '1', '0', '0', '', '3', '1499753576', '0', '0', '1514736000', '', '0.0', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('61', '5', '10', '', '', 'ssr7', '', '2', '荒', '', '542', '', '1', '0', '0', '', '1', '1499753593', '1499766415', '0', '1514736000', '青铜圣斗士', '9.9', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('62', '3', '10', '', '', 'ssr8', '', '2', '非洲佛', '', '55', '', '1', '0', '0', '', '3', '1499753624', '1499766395', '0', '1514736000', 'vip至尊卡', '1.0', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('63', '5', '10', '', '', 'ssr9', '', '2', '辉夜姬', '', '432', '', '2', '0', '1483200000', '', '1', '1499753645', '1500618005', '0', '1514736000', '青铜圣斗士', '9.9', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('64', '1', '10', '', '', 'ssr10', '', '2', '一目连', '', '554', '', '1', '0', '0', '', '1', '1499753664', '1499766385', '0', '1514736000', '黄金卡', '9.0', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('52', '2', '10', '', '', 'ssr11', '', '2', '彼岸花', '', '123', '', '2', '1500480000', '1500480000', '', '1', '1499753775', '1500628291', '0', '1514736000', '白金卡', '7.0', '0.00', '2044.00', '30548');
INSERT INTO `fw_0001_card` VALUES ('12', '0', '10', '', '', 'ssr12', '', '2', '阎魔', '', '4334', '', '2', '0', '0', '', '1', '1499753900', '0', '0', '1514736000', '', '0.0', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('67', '1', '10', '', '', 'ssr14', '', '2', '茨木童子', '', '321', '', '1', '0', '1483200000', '', '1', '1499753939', '1500379534', '0', '1514736000', '黄金卡', '9.0', '0.00', '0.00', '1960');
INSERT INTO `fw_0001_card` VALUES ('74', '7', '10', '', '', 'd', '', '2', 'dad', '', '12', 'd', '1', '0', '0', '', '1', '1500429728', '1500430846', '0', '0', '测试折扣', '3.0', '0.00', '0.00', '0');
INSERT INTO `fw_0001_card` VALUES ('75', '2', '10', '', '', 'd', '', '2', 'aaa', '', '222', '', '1', '0', '1483200000', '', '1', '1500431021', '1500459219', '0', '0', '白金卡', '7.0', '0.00', '0.00', '2834');

-- ----------------------------
-- Table structure for fw_0001_card_mcombo
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_card_mcombo`;
CREATE TABLE `fw_0001_card_mcombo` (
  `card_mcombo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_mcombo_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mcombo_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_mcombo_ccount` int(10) unsigned NOT NULL DEFAULT '0',
  `card_mcombo_cedate` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_mcombo_gcount` int(10) unsigned NOT NULL DEFAULT '0',
  `card_mcombo_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `card_mcombo_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`card_mcombo_id`),
  KEY `card_id` (`card_id`)
) ENGINE=MyISAM AUTO_INCREMENT=496 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_card_mcombo
-- ----------------------------
INSERT INTO `fw_0001_card_mcombo` VALUES ('495', '52', '2', '4', '0', '1503223648', '4', '2131', '1500545248', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('494', '52', '1', '4', '1', '1503223648', '0', '0', '1500545248', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('493', '52', '2', '7', '0', '1500977248', '3', '99', '1500545248', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('492', '52', '1', '7', '2', '1500977248', '0', '0', '1500545248', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('491', '52', '2', '9', '0', '1500718048', '3', '10', '1500545248', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('490', '52', '2', '9', '0', '1500718048', '2', '5', '1500545248', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('489', '52', '1', '9', '1', '1500718048', '0', '0', '1500545248', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('488', '75', '2', '8', '0', '1508406554', '4', '16', '1500457754', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('487', '75', '1', '8', '1', '1508406554', '0', '0', '1500457754', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('486', '75', '2', '9', '0', '1500630554', '3', '20', '1500457754', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('485', '75', '2', '9', '0', '1500630554', '2', '10', '1500457754', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('484', '75', '1', '9', '2', '1500630554', '0', '0', '1500457754', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('468', '52', '2', '6', '0', '1500027175', '2', '23', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('467', '52', '2', '6', '0', '1500027175', '6', '22', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('466', '52', '2', '6', '0', '1500027175', '4', '58', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('465', '52', '2', '6', '0', '1500027175', '1', '46', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('464', '52', '1', '6', '1', '1500027175', '0', '0', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('463', '52', '2', '5', '0', '1505383975', '4', '15', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('462', '52', '2', '5', '0', '1505383975', '7', '2', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('461', '52', '1', '5', '1', '1505383975', '0', '0', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('460', '52', '2', '4', '0', '1502705575', '4', '6393', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('459', '52', '1', '4', '3', '1502705575', '0', '0', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('458', '52', '2', '9', '0', '1500199975', '3', '12', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('457', '52', '2', '9', '0', '1500199975', '2', '46', '1500027175', '0');
INSERT INTO `fw_0001_card_mcombo` VALUES ('456', '52', '1', '9', '1', '1500199975', '0', '0', '1500027175', '0');

-- ----------------------------
-- Table structure for fw_0001_card_record
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_card_record`;
CREATE TABLE `fw_0001_card_record` (
  `card_record_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record_code` varchar(50) NOT NULL DEFAULT '',
  `card_record_type` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record_cmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `card_record_hmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `card_record_ymoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `card_record_jmoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `card_record_smoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `card_record_emoney` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `card_record_pay` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `card_record_xianjin` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `card_record_yinhang` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `card_record_weixin` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `card_record_zhifubao` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `card_record_score` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `card_record_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `c_card_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_card_type_name` varchar(20) NOT NULL DEFAULT '',
  `c_card_type_discount` decimal(2,1) unsigned NOT NULL DEFAULT '0.0',
  `c_card_code` varchar(20) NOT NULL DEFAULT '',
  `c_card_name` varchar(20) NOT NULL DEFAULT '',
  `c_card_phone` varchar(20) NOT NULL DEFAULT '',
  `c_card_sex` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `c_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_user_name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`card_record_id`),
  KEY `shop_id` (`shop_id`),
  KEY `card_record_atime` (`card_record_atime`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_card_record
-- ----------------------------
INSERT INTO `fw_0001_card_record` VALUES ('110', '52', '10', '1500545153', '1', '1000.00', '0.00', '0.00', '0.00', '800.00', '1000.00', '2', '0.00', '800.00', '0.00', '0.00', '800', '1', '1500545153', '0', '2', '白金卡', '7.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('109', '52', '10', '1500541587', '3', '0.00', '2078.00', '857.35', '0.00', '857.35', '0.00', '1', '857.35', '0.00', '0.00', '0.00', '857', '1', '1500541587', '0', '6', '钻石卡', '8.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('108', '52', '10', '1500541454', '3', '0.00', '9379.00', '352.40', '0.00', '352.40', '0.00', '1', '352.40', '0.00', '0.00', '0.00', '352', '1', '1500541454', '0', '6', '钻石卡', '8.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('107', '52', '10', '1500540694', '3', '0.00', '8918.00', '83.00', '0.00', '83.00', '0.00', '1', '83.00', '0.00', '0.00', '0.00', '83', '1', '1500540694', '0', '6', '钻石卡', '8.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('106', '52', '10', '1500539847', '3', '0.00', '35702.00', '358.65', '0.00', '358.65', '0.00', '1', '358.65', '0.00', '0.00', '0.00', '358', '1', '1500539847', '0', '6', '钻石卡', '8.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('105', '52', '10', '1500539554', '3', '0.00', '9030.00', '152.75', '0.00', '152.75', '0.00', '1', '152.75', '0.00', '0.00', '0.00', '152', '1', '1500539554', '0', '6', '钻石卡', '8.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('111', '52', '10', '1500545248', '2', '0.00', '623.00', '406.10', '6.10', '400.00', '1000.00', '3', '0.00', '0.00', '400.00', '0.00', '400', '1', '1500545248', '0', '2', '白金卡', '7.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('112', '52', '10', '1500618017', '1', '1200.00', '0.00', '0.00', '0.00', '500.00', '2200.00', '4', '0.00', '0.00', '0.00', '500.00', '500', '1', '1500618017', '0', '2', '白金卡', '7.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('113', '52', '10', '1500618867', '1', '300.00', '0.00', '0.00', '0.00', '300.00', '2500.00', '3', '0.00', '0.00', '300.00', '0.00', '300', '1', '1500618867', '0', '2', '白金卡', '7.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('114', '52', '10', '1500624416', '3', '0.00', '9128.00', '105.75', '0.00', '95.00', '2394.25', '5', '0.00', '0.00', '0.00', '0.00', '0', '1', '1500624416', '0', '2', '白金卡', '7.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('115', '52', '10', '1500625320', '3', '0.00', '9308.00', '283.55', '183.55', '100.00', '2294.25', '5', '0.00', '0.00', '0.00', '0.00', '0', '1', '1500625320', '0', '2', '白金卡', '7.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('116', '52', '10', '1500628075', '3', '0.00', '640.00', '283.65', '33.40', '250.25', '2044.00', '5', '0.00', '0.00', '0.00', '0.00', '0', '1', '1500628075', '0', '2', '白金卡', '7.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');
INSERT INTO `fw_0001_card_record` VALUES ('117', '52', '10', '1500628291', '3', '0.00', '9751.00', '476.90', '0.00', '476.90', '2044.00', '1', '476.90', '0.00', '0.00', '0.00', '476', '1', '1500628291', '0', '2', '白金卡', '7.0', 'ssr11', '彼岸花', '123', '2', '1', 'admin');

-- ----------------------------
-- Table structure for fw_0001_card_record2_mcombo
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_card_record2_mcombo`;
CREATE TABLE `fw_0001_card_record2_mcombo` (
  `card_record2_mcombo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_record_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record2_mcombo_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mcombo_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record2_mcombo_ccount` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record2_mcombo_cedate` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record2_mcombo_gcount` int(10) unsigned NOT NULL DEFAULT '0',
  `c_mcombo_name` varchar(50) NOT NULL DEFAULT '',
  `c_mcombo_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_mcombo_cprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_mgoods_name` varchar(50) NOT NULL DEFAULT '',
  `c_mgoods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_mgoods_cprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`card_record2_mcombo_id`),
  KEY `card_record_id` (`card_record_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_card_record2_mcombo
-- ----------------------------
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('245', '111', '52', '10', '2', '4', '0', '1503223648', '4', '2131', '', '0.00', '0.00', '橘子', '60.00', '0.00');
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('244', '111', '52', '10', '1', '4', '1', '1503223648', '0', '0', '群英荟萃', '123.00', '100.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('243', '111', '52', '10', '2', '7', '0', '1500977248', '3', '100', '', '0.00', '0.00', '大米', '300.00', '0.00');
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('242', '111', '52', '10', '1', '7', '2', '1500977248', '0', '0', '最长的电影最长的电影最长的电影最长的电影最长的电影最长的电影最长的电影最长的电影最长的电影最长的电影', '100.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('241', '111', '52', '10', '2', '9', '0', '1500718048', '3', '10', '', '0.00', '0.00', '大米', '300.00', '0.00');
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('240', '111', '52', '10', '2', '9', '0', '1500718048', '2', '5', '', '0.00', '0.00', '龙虾', '30.00', '5.55');
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('239', '111', '52', '10', '1', '9', '1', '1500718048', '0', '0', '全家桶', '300.00', '280.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('238', '79', '75', '10', '2', '8', '0', '1508406554', '4', '16', '', '0.00', '0.00', '橘子', '60.00', '0.00');
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('237', '79', '75', '10', '1', '8', '1', '1508406554', '0', '0', '2块钱', '20.00', '20.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('236', '79', '75', '10', '2', '9', '0', '1500630554', '3', '20', '', '0.00', '0.00', '大米', '300.00', '0.00');
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('235', '79', '75', '10', '2', '9', '0', '1500630554', '2', '10', '', '0.00', '0.00', '龙虾', '30.00', '5.55');
INSERT INTO `fw_0001_card_record2_mcombo` VALUES ('234', '79', '75', '10', '1', '9', '2', '1500630554', '0', '0', '全家桶', '300.00', '280.00', '', '0.00', '0.00');

-- ----------------------------
-- Table structure for fw_0001_card_record2_ygoods
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_card_record2_ygoods`;
CREATE TABLE `fw_0001_card_record2_ygoods` (
  `card_record2_ygoods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_record_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record2_ygoods_count` int(10) unsigned NOT NULL DEFAULT '0',
  `c_mgoods_name` varchar(50) NOT NULL DEFAULT '',
  `c_mgoods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_mgoods_cprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_sgoods_name` varchar(50) NOT NULL DEFAULT '',
  `c_sgoods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_sgoods_cprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`card_record2_ygoods_id`),
  KEY `card_record_id` (`card_record_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_card_record2_ygoods
-- ----------------------------
INSERT INTO `fw_0001_card_record2_ygoods` VALUES ('73', '111', '52', '10', '6', '0', '22', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_ygoods` VALUES ('72', '111', '52', '10', '4', '0', '8597', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_ygoods` VALUES ('71', '111', '52', '10', '3', '0', '122', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_ygoods` VALUES ('70', '111', '52', '10', '2', '0', '74', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_ygoods` VALUES ('69', '111', '52', '10', '1', '0', '46', '鲸鱼', '50.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_ygoods` VALUES ('66', '79', '75', '10', '2', '0', '10', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_ygoods` VALUES ('67', '79', '75', '10', '3', '0', '20', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_ygoods` VALUES ('68', '79', '75', '10', '4', '0', '16', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record2_ygoods` VALUES ('74', '111', '52', '10', '7', '0', '2', '河豚', '10.00', '10.00', '', '0.00', '0.00');

-- ----------------------------
-- Table structure for fw_0001_card_record3_goods
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_card_record3_goods`;
CREATE TABLE `fw_0001_card_record3_goods` (
  `card_record3_goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_record_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record3_goods_count` int(10) unsigned NOT NULL DEFAULT '0',
  `c_mgoods_name` varchar(50) NOT NULL DEFAULT '',
  `c_mgoods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_mgoods_cprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_sgoods_name` varchar(50) NOT NULL DEFAULT '',
  `c_sgoods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_sgoods_cprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`card_record3_goods_id`),
  KEY `card_record_id` (`card_record_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_card_record3_goods
-- ----------------------------
INSERT INTO `fw_0001_card_record3_goods` VALUES ('101', '114', '52', '10', '4', '0', '1', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('100', '114', '52', '10', '6', '0', '1', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('99', '114', '52', '10', '2', '0', '6', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('79', '105', '52', '10', '0', '6', '1', '', '0.00', '0.00', '提拉米苏', '99.00', '88.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('80', '105', '52', '10', '0', '5', '1', '', '0.00', '0.00', '永和豆浆', '3.00', '2.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('81', '105', '52', '10', '0', '4', '1', '', '0.00', '0.00', 'rio鸡尾酒', '10.00', '8.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('82', '105', '52', '10', '2', '0', '1', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('83', '105', '52', '10', '6', '0', '1', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('84', '106', '52', '10', '2', '0', '3', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('85', '106', '52', '10', '6', '0', '4', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('86', '106', '52', '10', '4', '0', '1', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('87', '107', '52', '10', '2', '0', '1', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('88', '107', '52', '10', '6', '0', '1', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('89', '108', '52', '10', '6', '0', '1', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('90', '108', '52', '10', '3', '0', '1', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('91', '108', '52', '10', '0', '6', '1', '', '0.00', '0.00', '提拉米苏', '99.00', '88.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('92', '108', '52', '10', '0', '3', '1', '', '0.00', '0.00', '农夫三拳', '88.00', '22.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('93', '108', '52', '10', '0', '2', '1', '', '0.00', '0.00', '恒大冰泉', '4.00', '3.50');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('94', '109', '52', '10', '2', '0', '5', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('95', '109', '52', '10', '0', '8', '1', '', '0.00', '0.00', '星冰乐', '33.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('96', '109', '52', '10', '0', '7', '7', '', '0.00', '0.00', '法式布丁', '128.00', '22.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('97', '109', '52', '10', '0', '6', '1', '', '0.00', '0.00', '提拉米苏', '99.00', '88.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('98', '109', '52', '10', '3', '0', '3', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('102', '115', '52', '10', '2', '0', '2', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('103', '115', '52', '10', '6', '0', '1', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('104', '115', '52', '10', '4', '0', '1', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('105', '115', '52', '10', '3', '0', '1', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('106', '116', '52', '10', '0', '4', '1', '', '0.00', '0.00', 'rio鸡尾酒', '10.00', '8.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('107', '116', '52', '10', '2', '0', '3', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('108', '116', '52', '10', '4', '0', '4', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('109', '116', '52', '10', '3', '0', '1', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('110', '117', '52', '10', '6', '0', '1', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('111', '117', '52', '10', '4', '0', '1', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('112', '117', '52', '10', '0', '8', '9', '', '0.00', '0.00', '星冰乐', '33.00', '0.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('113', '117', '52', '10', '0', '7', '2', '', '0.00', '0.00', '法式布丁', '128.00', '22.00');
INSERT INTO `fw_0001_card_record3_goods` VALUES ('114', '117', '52', '10', '1', '0', '5', '鲸鱼', '50.00', '0.00', '', '0.00', '0.00');

-- ----------------------------
-- Table structure for fw_0001_card_record3_ygoods
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_card_record3_ygoods`;
CREATE TABLE `fw_0001_card_record3_ygoods` (
  `card_record3_ygoods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_record_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record3_ygoods_count` int(10) unsigned NOT NULL DEFAULT '0',
  `c_mgoods_name` varchar(50) NOT NULL DEFAULT '',
  `c_mgoods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_mgoods_cprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_sgoods_name` varchar(50) NOT NULL DEFAULT '',
  `c_sgoods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_sgoods_cprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`card_record3_ygoods_id`),
  KEY `card_record_id` (`card_record_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_card_record3_ygoods
-- ----------------------------
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('29', '105', '52', '10', '3', '0', '13', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('28', '105', '52', '10', '2', '0', '48', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('30', '106', '52', '10', '3', '0', '12', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('31', '106', '52', '10', '4', '0', '58', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('32', '108', '52', '10', '1', '0', '46', '鲸鱼', '50.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('33', '108', '52', '10', '2', '0', '70', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('34', '108', '52', '10', '3', '0', '12', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('35', '108', '52', '10', '4', '0', '6472', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('36', '108', '52', '10', '6', '0', '22', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('37', '108', '52', '10', '7', '0', '2', '河豚', '10.00', '10.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('38', '109', '52', '10', '1', '0', '46', '鲸鱼', '50.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('39', '109', '52', '10', '2', '0', '69', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('40', '109', '52', '10', '3', '0', '12', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('41', '109', '52', '10', '4', '0', '6466', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('42', '109', '52', '10', '6', '0', '22', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('43', '109', '52', '10', '7', '0', '2', '河豚', '10.00', '10.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('44', '114', '52', '10', '1', '0', '46', '鲸鱼', '50.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('45', '114', '52', '10', '2', '0', '74', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('46', '114', '52', '10', '3', '0', '121', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('47', '114', '52', '10', '4', '0', '8597', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('48', '114', '52', '10', '6', '0', '22', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('49', '114', '52', '10', '7', '0', '2', '河豚', '10.00', '10.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('50', '115', '52', '10', '1', '0', '46', '鲸鱼', '50.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('51', '115', '52', '10', '2', '0', '74', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('52', '115', '52', '10', '3', '0', '121', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('53', '115', '52', '10', '4', '0', '8597', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('54', '115', '52', '10', '6', '0', '22', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('55', '115', '52', '10', '7', '0', '2', '河豚', '10.00', '10.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('56', '116', '52', '10', '1', '0', '46', '鲸鱼', '50.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('57', '116', '52', '10', '2', '0', '74', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('58', '116', '52', '10', '3', '0', '121', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('59', '116', '52', '10', '4', '0', '8597', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('60', '116', '52', '10', '6', '0', '22', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('61', '116', '52', '10', '7', '0', '2', '河豚', '10.00', '10.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('62', '117', '52', '10', '1', '0', '46', '鲸鱼', '50.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('63', '117', '52', '10', '2', '0', '74', '龙虾', '30.00', '5.55', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('64', '117', '52', '10', '3', '0', '121', '大米', '300.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('65', '117', '52', '10', '4', '0', '8597', '橘子', '60.00', '0.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('66', '117', '52', '10', '6', '0', '22', '辣条', '8888.00', '88.00', '', '0.00', '0.00');
INSERT INTO `fw_0001_card_record3_ygoods` VALUES ('67', '117', '52', '10', '7', '0', '2', '河豚', '10.00', '10.00', '', '0.00', '0.00');

-- ----------------------------
-- Table structure for fw_0001_card_ticket
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_card_ticket`;
CREATE TABLE `fw_0001_card_ticket` (
  `card_ticket_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_give_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ticket_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ticket_money_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ticket_goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_ticket_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `card_ticket_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `card_ticket_edate` int(10) unsigned NOT NULL DEFAULT '0',
  `c_mgoods_name` varchar(50) NOT NULL DEFAULT '',
  `c_mgoods_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`card_ticket_id`),
  KEY `card_id` (`card_id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_card_ticket
-- ----------------------------
INSERT INTO `fw_0001_card_ticket` VALUES ('70', '52', '3', '0', '3', '0', '1', '2', '0', '0', '1', '1500628291', '1501492291', '', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('69', '52', '3', '0', '2', '0', '2', '0', '1', '2', '1', '1500628291', '1501492291', '龙虾', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('68', '52', '3', '0', '1', '0', '1', '1', '0', '0', '1', '1500628291', '1501492291', '', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('67', '52', '3', '0', '3', '0', '1', '2', '0', '0', '2', '1500545248', '1501409248', '', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('66', '52', '3', '0', '2', '0', '2', '0', '1', '2', '2', '1500545248', '1501409248', '龙虾', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('65', '52', '3', '0', '1', '0', '1', '1', '0', '0', '2', '1500545248', '1501409248', '', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('64', '52', '3', '0', '4', '0', '1', '3', '0', '0', '2', '1500541587', '1501405587', '', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('62', '52', '3', '0', '2', '0', '2', '0', '1', '2', '2', '1500541587', '1501405587', '龙虾', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('63', '52', '3', '0', '3', '0', '1', '2', '0', '0', '2', '1500541587', '1501405587', '', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('61', '52', '3', '0', '1', '0', '1', '1', '0', '0', '2', '1500541587', '1501405587', '', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('60', '52', '3', '0', '2', '0', '2', '0', '1', '2', '1', '1500541454', '1501405454', '龙虾', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('59', '52', '3', '0', '1', '0', '1', '1', '0', '0', '2', '1500541454', '1501405454', '', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('56', '52', '3', '0', '1', '0', '1', '1', '0', '0', '2', '1500539554', '1501403554', '', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('57', '52', '3', '0', '1', '0', '1', '1', '0', '0', '2', '1500539847', '1501403847', '', '0.00');
INSERT INTO `fw_0001_card_ticket` VALUES ('58', '52', '3', '0', '2', '0', '2', '0', '1', '2', '2', '1500539847', '1501403847', '龙虾', '0.00');

-- ----------------------------
-- Table structure for fw_0001_card_ticket_record
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_card_ticket_record`;
CREATE TABLE `fw_0001_card_ticket_record` (
  `card_ticket_record_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_ticket_record_atype` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `act_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_give_id` int(10) unsigned NOT NULL DEFAULT '0',
  `act_ticket_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_ticket_record_ttype` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ticket_money_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ticket_goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_ticket_record_utype` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `card_ticket_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_record_id` int(10) unsigned NOT NULL DEFAULT '0',
  `card_ticket_record_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `c_ticket_name` varchar(50) NOT NULL DEFAULT '',
  `c_ticket_value` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_ticket_limit` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `c_mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_mgoods_name` varchar(50) NOT NULL DEFAULT '',
  `c_ticket_edate` int(10) unsigned NOT NULL DEFAULT '0',
  `c_act_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`card_ticket_record_id`),
  KEY `card_id` (`card_id`),
  KEY `card_ticket_record_atime` (`card_ticket_record_atime`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_card_ticket_record
-- ----------------------------
INSERT INTO `fw_0001_card_ticket_record` VALUES ('53', '52', '3', '0', '1', '0', '1', '1', '0', '1', '57', '106', '1500539847', '10元券', '10.00', '100.00', '0', '', '1501403847', '满送1');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('52', '52', '3', '0', '1', '0', '1', '1', '0', '1', '56', '105', '1500539554', '10元券', '10.00', '100.00', '0', '', '1501403554', '满送1');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('54', '52', '3', '0', '2', '0', '2', '0', '1', '1', '58', '106', '1500539847', '龙虾票', '20.00', '0.00', '2', '龙虾', '1501403847', '满送2');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('55', '52', '3', '0', '1', '0', '1', '1', '0', '2', '56', '106', '1500539847', '10元券', '10.00', '100.00', '0', '', '1501403554', '');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('56', '52', '3', '0', '2', '0', '2', '0', '1', '2', '58', '107', '1500540694', '龙虾票', '40.00', '0.00', '2', '龙虾', '1501403847', '');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('57', '52', '3', '0', '1', '0', '1', '1', '0', '1', '59', '108', '1500541454', '10元券', '10.00', '100.00', '0', '', '1501405454', '满送1');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('58', '52', '3', '0', '2', '0', '2', '0', '1', '1', '60', '108', '1500541454', '龙虾票', '20.00', '0.00', '2', '龙虾', '1501405454', '满送2');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('59', '52', '3', '0', '1', '0', '1', '1', '0', '2', '57', '108', '1500541454', '10元券', '10.00', '100.00', '0', '', '1501403847', '');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('60', '52', '3', '0', '1', '0', '1', '1', '0', '1', '61', '109', '1500541587', '10元券', '10.00', '100.00', '0', '', '1501405587', '满送1');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('61', '52', '3', '0', '2', '0', '2', '0', '1', '1', '62', '109', '1500541587', '龙虾票', '20.00', '0.00', '2', '龙虾', '1501405587', '满送2');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('62', '52', '3', '0', '3', '0', '1', '2', '0', '1', '63', '109', '1500541587', '20元券', '200.00', '200.00', '0', '', '1501405587', '满送3');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('63', '52', '3', '0', '4', '0', '1', '3', '0', '1', '64', '109', '1500541587', '', '0.00', '0.00', '0', '', '1501405587', '满送4');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('64', '52', '3', '0', '1', '0', '1', '1', '0', '1', '65', '111', '1500545248', '10元券', '10.00', '100.00', '0', '', '1501409248', '满送1');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('65', '52', '3', '0', '2', '0', '2', '0', '1', '1', '66', '111', '1500545248', '龙虾票', '20.00', '0.00', '2', '龙虾', '1501409248', '满送2');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('66', '52', '3', '0', '3', '0', '1', '2', '0', '1', '67', '111', '1500545248', '20元券', '200.00', '200.00', '0', '', '1501409248', '满送3');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('67', '52', '3', '0', '2', '0', '2', '0', '1', '2', '66', '114', '1500624416', '龙虾票', '40.00', '0.00', '2', '龙虾', '1501409248', '');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('68', '52', '3', '0', '1', '0', '1', '1', '0', '2', '59', '114', '1500624416', '10元券', '10.00', '100.00', '0', '', '1501405454', '');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('69', '52', '3', '0', '1', '0', '1', '1', '0', '2', '61', '115', '1500625320', '10元券', '10.00', '100.00', '0', '', '1501405587', '');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('70', '52', '3', '0', '2', '0', '2', '0', '1', '2', '62', '115', '1500625320', '龙虾票', '40.00', '0.00', '2', '龙虾', '1501405587', '');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('71', '52', '3', '0', '1', '0', '1', '1', '0', '2', '65', '116', '1500628075', '10元券', '10.00', '100.00', '0', '', '1501409248', '');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('72', '52', '3', '0', '3', '0', '1', '2', '0', '2', '67', '116', '1500628075', '20元券', '20.00', '200.00', '0', '', '1501409248', '');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('73', '52', '3', '0', '1', '0', '1', '1', '0', '1', '68', '117', '1500628291', '10元券', '10.00', '100.00', '0', '', '1501492291', '满送1');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('74', '52', '3', '0', '2', '0', '2', '0', '1', '1', '69', '117', '1500628291', '龙虾票', '20.00', '0.00', '2', '龙虾', '1501492291', '满送2');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('75', '52', '3', '0', '3', '0', '1', '2', '0', '1', '70', '117', '1500628291', '20元券', '200.00', '200.00', '0', '', '1501492291', '满送3');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('76', '52', '3', '0', '3', '0', '1', '2', '0', '2', '63', '117', '1500628291', '20元券', '20.00', '200.00', '0', '', '1501405587', '');
INSERT INTO `fw_0001_card_ticket_record` VALUES ('77', '52', '3', '0', '4', '0', '1', '3', '0', '2', '64', '117', '1500628291', '30元券', '30.00', '300.00', '0', '', '1501405587', '');

-- ----------------------------
-- Table structure for fw_0001_card_type
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_card_type`;
CREATE TABLE `fw_0001_card_type` (
  `card_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_type_name` varchar(20) NOT NULL DEFAULT '',
  `card_type_discount` decimal(2,1) unsigned NOT NULL DEFAULT '0.0',
  `card_type_info` varchar(100) NOT NULL DEFAULT '',
  `card_type_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `card_type_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`card_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_card_type
-- ----------------------------
INSERT INTO `fw_0001_card_type` VALUES ('6', '钻石卡', '8.0', '一颗永流传', '0', '0');
INSERT INTO `fw_0001_card_type` VALUES ('1', '黄金卡', '9.0', '通用货币', '0', '0');
INSERT INTO `fw_0001_card_type` VALUES ('2', '白金卡', '7.0', '', '0', '0');
INSERT INTO `fw_0001_card_type` VALUES ('3', 'vip至尊卡', '1.0', '', '0', '0');
INSERT INTO `fw_0001_card_type` VALUES ('4', '白银卡', '9.5', '', '0', '0');
INSERT INTO `fw_0001_card_type` VALUES ('5', '青铜圣斗士', '9.9', '', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_group_reward
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_group_reward`;
CREATE TABLE `fw_0001_group_reward` (
  `group_reward_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `worker_group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `group_reward_create` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `group_reward_fill` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `group_reward_pfill` int(10) unsigned NOT NULL DEFAULT '0',
  `group_reward_guide` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `group_reward_pguide` int(10) unsigned NOT NULL DEFAULT '0',
  `group_reward_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `group_reward_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_reward_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_group_reward
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_group_reward2
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_group_reward2`;
CREATE TABLE `fw_0001_group_reward2` (
  `group_reward2_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `worker_group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_catalog_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sgoods_catalog_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mcombo_id` int(10) unsigned NOT NULL DEFAULT '0',
  `group_reward2_goods` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `group_reward2_pgoods` int(10) unsigned NOT NULL DEFAULT '0',
  `group_reward2_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `group_reward2_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_reward2_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_group_reward2
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_mcombo
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_mcombo`;
CREATE TABLE `fw_0001_mcombo` (
  `mcombo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mcombo_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mcombo_code` varchar(50) NOT NULL DEFAULT '',
  `mcombo_name` varchar(50) NOT NULL DEFAULT '',
  `mcombo_jianpin` varchar(50) NOT NULL DEFAULT '',
  `mcombo_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `mcombo_cprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `mcombo_limit_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mcombo_limit_days` int(10) unsigned NOT NULL DEFAULT '0',
  `mcombo_limit_months` int(10) unsigned NOT NULL DEFAULT '0',
  `mcombo_act` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mcombo_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mcombo_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `mcombo_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`mcombo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_mcombo
-- ----------------------------
INSERT INTO `fw_0001_mcombo` VALUES ('9', '1', '大幅度', '全家桶', '', '300.00', '280.00', '2', '2', '0', '0', '1', '0', '0');
INSERT INTO `fw_0001_mcombo` VALUES ('1', '1', 'ddada', 'vip全套', '大大', '888.00', '600.00', '2', '2', '0', '0', '1', '0', '0');
INSERT INTO `fw_0001_mcombo` VALUES ('2', '1', '大大', '套餐22', '大大', '200.00', '0.00', '2', '2', '0', '0', '1', '0', '0');
INSERT INTO `fw_0001_mcombo` VALUES ('3', '2', '大大', '包治百病', '大', '1000.00', '500.00', '3', '0', '1', '0', '1', '0', '0');
INSERT INTO `fw_0001_mcombo` VALUES ('4', '2', '短信', '群英荟萃', '大', '123.00', '100.00', '3', '0', '1', '0', '1', '0', '0');
INSERT INTO `fw_0001_mcombo` VALUES ('5', '2', '大大大', '宫廷玉液酒', '180', '180.00', '170.00', '3', '0', '2', '0', '1', '0', '0');
INSERT INTO `fw_0001_mcombo` VALUES ('6', '2', '电池', '针灸', '', '120.00', '0.00', '3', '0', '0', '0', '1', '0', '0');
INSERT INTO `fw_0001_mcombo` VALUES ('7', '2', 'd1', '最长的电影最长的电影最长的电影最长的电影最长的电影最长的电影最长的电影最长的电影最长的电影最长的电影', '12', '100.00', '0.00', '2', '5', '0', '0', '1', '0', '0');
INSERT INTO `fw_0001_mcombo` VALUES ('8', '1', '2', '2块钱', '', '20.00', '20.00', '3', '0', '3', '0', '1', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_mcombo_goods
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_mcombo_goods`;
CREATE TABLE `fw_0001_mcombo_goods` (
  `mcombo_goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mcombo_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mcombo_goods_count` int(10) unsigned NOT NULL DEFAULT '0',
  `mcombo_goods_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `mcombo_goods_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`mcombo_goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_mcombo_goods
-- ----------------------------
INSERT INTO `fw_0001_mcombo_goods` VALUES ('1', '9', '2', '5', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('2', '9', '3', '10', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('3', '1', '2', '6', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('4', '1', '5', '4', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('5', '2', '6', '2', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('6', '2', '3', '22', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('7', '2', '4', '123', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('8', '3', '4', '123', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('9', '3', '3', '145', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('10', '3', '5', '1231', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('11', '4', '4', '2131', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('12', '5', '7', '2', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('13', '5', '4', '21', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('14', '6', '1', '4', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('15', '6', '4', '67', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('16', '6', '6', '22', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('17', '6', '2', '23', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('18', '7', '3', '50', '0', '0');
INSERT INTO `fw_0001_mcombo_goods` VALUES ('19', '8', '4', '16', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_mgoods
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_mgoods`;
CREATE TABLE `fw_0001_mgoods` (
  `mgoods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mgoods_catalog_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mgoods_code` varchar(50) NOT NULL DEFAULT '',
  `mgoods_name` varchar(50) NOT NULL DEFAULT '',
  `mgoods_jianpin` varchar(50) NOT NULL DEFAULT '',
  `mgoods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `mgoods_cprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `mgoods_act` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mgoods_reserve` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mgoods_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mgoods_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`mgoods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_mgoods
-- ----------------------------
INSERT INTO `fw_0001_mgoods` VALUES ('7', '1', '1', '12', '河豚', '', '10.00', '10.00', '0', '0', '0', '0', '0');
INSERT INTO `fw_0001_mgoods` VALUES ('1', '1', '1', '大', '鲸鱼', '', '50.00', '0.00', '0', '0', '0', '0', '0');
INSERT INTO `fw_0001_mgoods` VALUES ('2', '5', '1', '2', '龙虾', '', '30.00', '5.55', '0', '0', '0', '0', '0');
INSERT INTO `fw_0001_mgoods` VALUES ('3', '2', '1', '22', '大米', '', '300.00', '0.00', '0', '0', '0', '0', '0');
INSERT INTO `fw_0001_mgoods` VALUES ('4', '3', '1', '大的', '橘子', '', '60.00', '0.00', '0', '0', '0', '0', '0');
INSERT INTO `fw_0001_mgoods` VALUES ('5', '1', '1', '大', '哈密瓜', '', '5.00', '0.00', '0', '0', '0', '0', '0');
INSERT INTO `fw_0001_mgoods` VALUES ('6', '4', '2', '大大', '辣条', '', '8888.00', '88.00', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_mgoods_catalog
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_mgoods_catalog`;
CREATE TABLE `fw_0001_mgoods_catalog` (
  `mgoods_catalog_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mgoods_catalog_name` varchar(50) NOT NULL DEFAULT '',
  `mgoods_catalog_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_catalog_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`mgoods_catalog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_mgoods_catalog
-- ----------------------------
INSERT INTO `fw_0001_mgoods_catalog` VALUES ('0', '肉类', '0', '0');
INSERT INTO `fw_0001_mgoods_catalog` VALUES ('1', '鱼类', '0', '0');
INSERT INTO `fw_0001_mgoods_catalog` VALUES ('2', '海鲜', '0', '0');
INSERT INTO `fw_0001_mgoods_catalog` VALUES ('3', '蔬菜', '0', '0');
INSERT INTO `fw_0001_mgoods_catalog` VALUES ('4', '水果', '0', '0');
INSERT INTO `fw_0001_mgoods_catalog` VALUES ('5', '五谷杂粮', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_room
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_room`;
CREATE TABLE `fw_0001_room` (
  `room_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_catalog_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `room_name` varchar(50) NOT NULL DEFAULT '',
  `room_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `room_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`room_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_room
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_room_catalog
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_room_catalog`;
CREATE TABLE `fw_0001_room_catalog` (
  `room_catalog_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `room_catalog_name` varchar(50) NOT NULL DEFAULT '',
  `room_catalog_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `room_catalog_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`room_catalog_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_room_catalog
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_sgoods
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_sgoods`;
CREATE TABLE `fw_0001_sgoods` (
  `sgoods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sgoods_catalog_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sgoods_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `sgoods_code` varchar(50) NOT NULL DEFAULT '',
  `sgoods_name` varchar(50) NOT NULL DEFAULT '',
  `sgoods_jianpin` varchar(50) NOT NULL DEFAULT '',
  `sgoods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `sgoods_cprice` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `sgoods_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `sgoods_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `sgoods_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sgoods_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_sgoods
-- ----------------------------
INSERT INTO `fw_0001_sgoods` VALUES ('1', '1', '10', '1', 'dd', '矿泉水', '水', '1.00', '1.00', '0', '0', '0');
INSERT INTO `fw_0001_sgoods` VALUES ('2', '1', '10', '1', 'ddg', '恒大冰泉', 'hdbq', '4.00', '3.50', '0', '0', '0');
INSERT INTO `fw_0001_sgoods` VALUES ('3', '1', '10', '1', 'd', '农夫三拳', 'nfsq', '88.00', '22.00', '0', '0', '0');
INSERT INTO `fw_0001_sgoods` VALUES ('4', '3', '10', '1', '大', 'rio鸡尾酒', 'dd', '10.00', '8.00', '0', '0', '0');
INSERT INTO `fw_0001_sgoods` VALUES ('5', '3', '10', '1', 'jh', '永和豆浆', 'fhs', '3.00', '2.00', '0', '0', '0');
INSERT INTO `fw_0001_sgoods` VALUES ('6', '4', '10', '1', '去', '提拉米苏', '大大', '99.00', '88.00', '0', '0', '0');
INSERT INTO `fw_0001_sgoods` VALUES ('7', '4', '10', '2', 'lk', '法式布丁', 'dadh', '128.00', '22.00', '0', '0', '0');
INSERT INTO `fw_0001_sgoods` VALUES ('8', '4', '10', '2', '大改动', '星冰乐', 'dxd', '33.00', '0.00', '0', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_sgoods_catalog
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_sgoods_catalog`;
CREATE TABLE `fw_0001_sgoods_catalog` (
  `sgoods_catalog_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sgoods_catalog_name` varchar(50) NOT NULL DEFAULT '',
  `sgoods_catalog_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `sgoods_catalog_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sgoods_catalog_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_sgoods_catalog
-- ----------------------------
INSERT INTO `fw_0001_sgoods_catalog` VALUES ('1', '10', '私有1', '0', '0');
INSERT INTO `fw_0001_sgoods_catalog` VALUES ('2', '10', '独家拥有', '0', '0');
INSERT INTO `fw_0001_sgoods_catalog` VALUES ('3', '10', 'onlyone', '0', '0');
INSERT INTO `fw_0001_sgoods_catalog` VALUES ('4', '10', 'lonely', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_store
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_store`;
CREATE TABLE `fw_0001_store` (
  `store_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `store_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `store_operator` varchar(50) NOT NULL DEFAULT '',
  `store_memo` varchar(100) NOT NULL DEFAULT '',
  `store_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `store_time` int(10) unsigned NOT NULL DEFAULT '0',
  `store_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `store_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`store_id`),
  KEY `shop_id` (`shop_id`),
  KEY `store_time` (`store_time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_store
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_store_goods
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_store_goods`;
CREATE TABLE `fw_0001_store_goods` (
  `store_goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_goods_count` int(10) NOT NULL DEFAULT '0',
  `store_goods_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `store_goods_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  `c_goods_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`store_goods_id`),
  KEY `store_id` (`store_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_store_goods
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_store_info
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_store_info`;
CREATE TABLE `fw_0001_store_info` (
  `store_info_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_info_count` int(10) NOT NULL DEFAULT '0',
  `store_info_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `store_info_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`store_info_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_store_info
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_ticket_goods
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_ticket_goods`;
CREATE TABLE `fw_0001_ticket_goods` (
  `ticket_goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_goods_name` varchar(50) NOT NULL DEFAULT '',
  `ticket_goods_value` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ticket_goods_memo` varchar(100) NOT NULL DEFAULT '',
  `ticket_goods_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `ticket_goods_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ticket_goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_ticket_goods
-- ----------------------------
INSERT INTO `fw_0001_ticket_goods` VALUES ('1', '龙虾票', '40.00', '2', '', '0', '0');
INSERT INTO `fw_0001_ticket_goods` VALUES ('2', '橘子票', '66.00', '4', '', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_ticket_money
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_ticket_money`;
CREATE TABLE `fw_0001_ticket_money` (
  `ticket_money_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_money_name` varchar(50) NOT NULL DEFAULT '',
  `ticket_money_value` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `ticket_money_limit` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `ticket_money_memo` varchar(100) NOT NULL DEFAULT '',
  `ticket_money_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `ticket_money_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ticket_money_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_ticket_money
-- ----------------------------
INSERT INTO `fw_0001_ticket_money` VALUES ('1', '10元券', '10.00', '100.00', '', '0', '0');
INSERT INTO `fw_0001_ticket_money` VALUES ('2', '20元券', '20.00', '200.00', '', '0', '0');
INSERT INTO `fw_0001_ticket_money` VALUES ('3', '30元券', '30.00', '300.00', '', '0', '0');
INSERT INTO `fw_0001_ticket_money` VALUES ('4', '40元券', '40.00', '500.00', '', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_user
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_user`;
CREATE TABLE `fw_0001_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `user_account` varchar(20) NOT NULL DEFAULT '',
  `user_password` varchar(20) NOT NULL DEFAULT '',
  `worker_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `user_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_user
-- ----------------------------
INSERT INTO `fw_0001_user` VALUES ('1', '10', '1', 'admin', 'admin', '0', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_weixin
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_weixin`;
CREATE TABLE `fw_0001_weixin` (
  `weixin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weixin_okey` varchar(50) NOT NULL DEFAULT '',
  `weixin_nicheng` varchar(50) NOT NULL DEFAULT '',
  `weixin_atime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`weixin_id`),
  KEY `weixin_atime` (`weixin_atime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_weixin
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_worker
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_worker`;
CREATE TABLE `fw_0001_worker` (
  `worker_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `worker_group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `worker_code` varchar(20) NOT NULL DEFAULT '',
  `worker_name` varchar(20) NOT NULL DEFAULT '',
  `worker_photo_file` varchar(50) NOT NULL DEFAULT '',
  `worker_phone` varchar(20) NOT NULL DEFAULT '',
  `worker_identity` varchar(20) NOT NULL DEFAULT '',
  `worker_identity_file` varchar(50) NOT NULL DEFAULT '',
  `worker_sex` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `worker_birthday` int(10) unsigned NOT NULL DEFAULT '0',
  `worker_birthday2` int(10) unsigned NOT NULL DEFAULT '0',
  `worker_address` varchar(100) NOT NULL DEFAULT '',
  `worker_education` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `worker_join` int(10) unsigned NOT NULL DEFAULT '0',
  `worker_wage` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `worker_config_guide` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `worker_config_reserve` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `worker_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `worker_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`worker_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_worker
-- ----------------------------
INSERT INTO `fw_0001_worker` VALUES ('0', '1', '10', '510', '张三', '', '123', '', '', '0', '0', '0', '', '0', '0', '0.00', '0', '0', '0', '0');
INSERT INTO `fw_0001_worker` VALUES ('1', '1', '10', '110', '李四', '', '423', '', '', '0', '0', '0', '', '0', '0', '0.00', '0', '0', '0', '0');
INSERT INTO `fw_0001_worker` VALUES ('2', '1', '10', '120', '王五', '', '', '', '', '0', '0', '0', '', '0', '0', '0.00', '0', '0', '0', '0');
INSERT INTO `fw_0001_worker` VALUES ('3', '1', '10', '119', '小明', '', '', '', '', '0', '0', '0', '', '0', '0', '0.00', '0', '0', '0', '0');
INSERT INTO `fw_0001_worker` VALUES ('4', '1', '10', '315', '消费者协会', '', '', '', '', '0', '0', '0', '', '0', '0', '0.00', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for fw_0001_worker_goods
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_worker_goods`;
CREATE TABLE `fw_0001_worker_goods` (
  `worker_goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `worker_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`worker_goods_id`),
  KEY `worker_id` (`worker_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_worker_goods
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_worker_group
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_worker_group`;
CREATE TABLE `fw_0001_worker_group` (
  `worker_group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `worker_group_name` varchar(20) NOT NULL DEFAULT '',
  `worker_group_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `worker_group_ctime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`worker_group_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_worker_group
-- ----------------------------

-- ----------------------------
-- Table structure for fw_0001_worker_reward
-- ----------------------------
DROP TABLE IF EXISTS `fw_0001_worker_reward`;
CREATE TABLE `fw_0001_worker_reward` (
  `worker_reward_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `worker_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_id` int(10) unsigned NOT NULL DEFAULT '0',
  `worker_reward_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `worker_reward_money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `worker_reward_state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `worker_reward_atime` int(10) unsigned NOT NULL DEFAULT '0',
  `c_worker_group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_worker_group_name` varchar(20) NOT NULL DEFAULT '',
  `c_worker_name` varchar(20) NOT NULL DEFAULT '',
  `c_card_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_card_type_name` varchar(20) NOT NULL DEFAULT '',
  `c_card_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_card_code` varchar(50) NOT NULL DEFAULT '',
  `c_card_name` varchar(20) NOT NULL DEFAULT '',
  `c_card_phone` varchar(20) NOT NULL DEFAULT '',
  `c_mgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_sgoods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_mcombo_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_goods_name` varchar(50) NOT NULL DEFAULT '',
  `c_card_record_id` int(10) unsigned NOT NULL DEFAULT '0',
  `c_card_reocord_code` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`worker_reward_id`),
  KEY `shop_id` (`shop_id`),
  KEY `worker_reward_atime` (`worker_reward_atime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fw_0001_worker_reward
-- ----------------------------
