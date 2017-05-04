/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-04-12 15:22:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for detail
-- ----------------------------
DROP TABLE IF EXISTS `detail`;
CREATE TABLE `detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) DEFAULT NULL,
  `goodsid` int(11) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `price` double(6,2) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail
-- ----------------------------
INSERT INTO `detail` VALUES ('1', '1232', '1', '1', '1.00', '1');
INSERT INTO `detail` VALUES ('2', '1', '4', '5', '6.00', '7');

-- ----------------------------
-- Table structure for friendlink
-- ----------------------------
DROP TABLE IF EXISTS `friendlink`;
CREATE TABLE `friendlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linkname` varchar(32) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:启用  2:关闭',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of friendlink
-- ----------------------------
INSERT INTO `friendlink` VALUES ('1', '百度', 'http://www.baidu.com', '1');
INSERT INTO `friendlink` VALUES ('3', '新浪', 'http://www.sina. com', '1');
INSERT INTO `friendlink` VALUES ('4', '腾讯', 'http://www.qq.com', '1');
INSERT INTO `friendlink` VALUES ('5', '好123', 'http://www.hao123.com', '1');
INSERT INTO `friendlink` VALUES ('6', '淘宝', 'http://www.taobao.com', '1');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeid` int(11) DEFAULT NULL,
  `goods` varchar(32) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `descr` text,
  `price` decimal(6,2) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  `state` tinyint(1) DEFAULT '1' COMMENT '1:新添加\r\n2:在售\r\n3:下架',
  `store` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `clicknum` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('28', '4', 'NIke', '耐克厂', '好东西', '432.00', '201704121353579171.jpg', '1', '10', '0', null, '1491882700');
INSERT INTO `goods` VALUES ('29', '5', '连衣裙', '厂', '连衣裙', '999.00', '201704121422484394.jpg', '1', '10', '0', null, '1491978168');
INSERT INTO `goods` VALUES ('27', '4', 'adidas', '阿迪达斯', '三叶草', '699.00', '201704121355198709.jpg', '1', '20', '0', null, '1491794381');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `linkman` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `code` char(6) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `addtime` int(255) DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0:新订单；1：已发货；2：已收货，3 无效订单。',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', null, '1', '张三', '13111', '131', '131', '1491828542', '987.00', '2');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `pid` int(11) DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', '服装', '0', '0,');
INSERT INTO `type` VALUES ('2', '数码', '0', '0,');
INSERT INTO `type` VALUES ('3', '食品', '0', '0,');
INSERT INTO `type` VALUES ('4', '男装', '1', '0,1,');
INSERT INTO `type` VALUES ('5', '女装', '1', '0,1,');
INSERT INTO `type` VALUES ('6', '童装', '1', '0,1,');
INSERT INTO `type` VALUES ('7', '相机', '2', '0,2,');
INSERT INTO `type` VALUES ('8', '手机', '2', '0,2,');
INSERT INTO `type` VALUES ('9', '电脑', '2', '0,2,');
INSERT INTO `type` VALUES ('10', '西装', '4', '0,1,4,');
INSERT INTO `type` VALUES ('11', '连衣裙', '5', '0,1,5,');
INSERT INTO `type` VALUES ('12', '数码相机', '7', '0,2,7,');
INSERT INTO `type` VALUES ('13', '单反相机', '7', '0,2,7,');
INSERT INTO `type` VALUES ('19', '苹果', '8', '0,2,8,');
INSERT INTO `type` VALUES ('20', '小米', '8', '0,2,8,');
INSERT INTO `type` VALUES ('21', '成人用品', '0', '0,');
INSERT INTO `type` VALUES ('22', '汽车/汽车用品', '0', '0,');
INSERT INTO `type` VALUES ('23', '美妆个护', '0', '0,');
INSERT INTO `type` VALUES ('24', '图书/音像', '0', '0,');
INSERT INTO `type` VALUES ('25', '母婴/玩具', '0', '0,');
INSERT INTO `type` VALUES ('26', '钟表/珠宝', '0', '0,');
INSERT INTO `type` VALUES ('27', '家具', '0', '0,');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `pass` char(32) CHARACTER SET latin1 NOT NULL,
  `sex` tinyint(1) DEFAULT NULL COMMENT '男:1\r\n女:2 ',
  `address` varchar(255) DEFAULT NULL,
  `code` char(6) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `state` tinyint(1) DEFAULT '1' COMMENT '1：启用，2：禁用 0:后台管理员',
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '管理员', '123', '1', '', '', '15812816866', '123123@qq.com', '0', '1491542175');
INSERT INTO `users` VALUES ('11', 'z568171152', '张俊', 'zhangjun', '1', '东莞', '58000', '15812816866', '568171152@qq.com', '0', '1491542113');
INSERT INTO `users` VALUES ('10', '123', '邓志聪', '123', '1', '虎门', '52300', '13800138000', '68769@qq.com', '1', '1491543332');
INSERT INTO `users` VALUES ('20', 'dengrongrong', '邓榕蓉', 'dengrongrong', '2', '虎门', '53000', '', '', '1', '1491543311');
INSERT INTO `users` VALUES ('19', '22222', '吴仲铭', '123', '1', '番禺', '123', '123', '123', '1', '1491792838');
INSERT INTO `users` VALUES ('28', '42353425', '', '342523', '1', '', '', '', '', '1', '1491961744');
INSERT INTO `users` VALUES ('25', '1234', '23421', '1234', '1', '1', '15423', '1', '112321@qq.com', '1', '1491961541');
INSERT INTO `users` VALUES ('26', '764657', '23421', '21231', '1', '1', '1', '1', '1', '1', '1491961565');
INSERT INTO `users` VALUES ('27', '4321', '', '', null, '', '', '', '', '1', '1491961631');
INSERT INTO `users` VALUES ('29', '34321', '', '123', '1', '', '', '', '', '1', '1491962161');
INSERT INTO `users` VALUES ('30', '4312', '', '1234', '1', '', '', '', '', '1', '1491962823');
INSERT INTO `users` VALUES ('31', '12345', '', '12345', '1', '', '', '', '', '1', '1491963735');
