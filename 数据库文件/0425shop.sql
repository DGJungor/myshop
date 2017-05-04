/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-04-25 19:17:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for detail
-- ----------------------------
DROP TABLE IF EXISTS `detail`;
CREATE TABLE `detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `goodsid` char(64) CHARACTER SET utf8 DEFAULT NULL,
  `name` char(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=360 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail
-- ----------------------------
INSERT INTO `detail` VALUES ('355', '2017041722942', '29', '2017 春装新款连衣裙', '999.00', '3');
INSERT INTO `detail` VALUES ('356', '2017041722942', '32', '复古相机', '1999.00', '3');
INSERT INTO `detail` VALUES ('357', '2017041869428', '32', '复古相机', '1999.00', '3');
INSERT INTO `detail` VALUES ('358', '2017041813661', '6', 'Nike 耐克官方 NIKE KAISHI 2.0 男子运动鞋', '432.00', '7');
INSERT INTO `detail` VALUES ('359', '2017041813661', '29', '2017 春装新款连衣裙', '999.00', '4');
INSERT INTO `detail` VALUES ('353', '2017041714780', '27', 'ADIDAS阿迪达斯2017春季新款运动休闲跑步男鞋', '699.00', '211');
INSERT INTO `detail` VALUES ('354', '2017041758824', '29', '2017 春装新款连衣裙', '999.00', '3');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of friendlink
-- ----------------------------
INSERT INTO `friendlink` VALUES ('1', '百度', 'http://www.baidu.com', '1');
INSERT INTO `friendlink` VALUES ('3', '新浪', 'http://www.sina. com', '1');
INSERT INTO `friendlink` VALUES ('4', '腾讯', 'http://www.qq.com', '1');
INSERT INTO `friendlink` VALUES ('5', '好123', 'http://www.hao123.com', '1');
INSERT INTO `friendlink` VALUES ('6', '淘宝', 'http://www.taobao.com', '1');
INSERT INTO `friendlink` VALUES ('8', '网易', 'http://www.163.com', '1');
INSERT INTO `friendlink` VALUES ('9', '腾讯', 'http://www.qq.com', '1');

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
  `price` decimal(8,2) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  `state` tinyint(1) DEFAULT '1' COMMENT '1:新添加\r\n2:在售\r\n3:下架',
  `store` int(11) unsigned DEFAULT NULL,
  `num` int(11) unsigned DEFAULT NULL,
  `clicknum` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('6', '4', 'Nike 耐克官方 NIKE KAISHI 2.0 男子运动鞋', '耐克厂', '好东西', '432.00', '201704172208149417.jpg', '1', '950', '7', null, '1491882700');
INSERT INTO `goods` VALUES ('29', '4', '2017 春装新款连衣裙', '厂', '连衣裙', '999.00', '201704172208348533.jpg', '1', '961', '4', null, '1491978168');
INSERT INTO `goods` VALUES ('33', '4', 'adidas阿迪达斯 三叶草 贝壳头 男子运动鞋', '阿迪达斯', '三叶草贝壳头', '799.00', '201704172211552250.jpg', '1', '3000', '0', null, '1492438315');
INSERT INTO `goods` VALUES ('34', '7', '佳能 单反相机 1100D', '佳能', '相机', '29999.00', '201704180916373955.jpg', '1', '500', '0', null, '1492477994');
INSERT INTO `goods` VALUES ('32', '31', '复古相机', '佳能', '很好的一台相机', '1999.00', '201704181309547122.jpg', '3', '4994', '3', null, '1492438165');
INSERT INTO `goods` VALUES ('36', '10', '1231', '41234', '3213', '321.00', '201704251858269268.jpg', '1', '2312', '0', null, '1493117907');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `linkman` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `code` char(6) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `addtime` int(255) DEFAULT NULL,
  `total` double(10,2) unsigned DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0:新订单；1：已发货；2：已收货，3 无效订单。',
  `orderid` char(32) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=302 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('299', '25', '临时账号', '广东省广州市天河区东圃  兄弟连', '58000', '13800138000', '1492441392', '8994.00', '0', '2017041722942');
INSERT INTO `orders` VALUES ('300', '25', '临时账号', '广东省广州市天河区东圃  兄弟连', '58000', '13800138000', '1492479892', '5997.00', '0', '2017041869428');
INSERT INTO `orders` VALUES ('297', '25', '临时账号', '广东省广州市天河区东圃  兄弟连', '58000', '13800138000', '1492424336', '147489.00', '0', '2017041714780');
INSERT INTO `orders` VALUES ('298', '25', '临时账号', '广东省广州市天河区东圃  兄弟连', '58000', '13800138000', '1492424546', '2997.00', '0', '2017041758824');

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

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
INSERT INTO `type` VALUES ('28', '充气娃娃', '21', '0,21,');
INSERT INTO `type` VALUES ('29', '图书', '0', ',');

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
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '超级管理员', '123', '1', '', '', '15812816866', '', '0', '1492067401');
INSERT INTO `users` VALUES ('11', 'z568171152', '张俊', 'zhangjun', '1', '东莞', '58000', '15812816866', '568171152@qq.com', '0', '1491542113');
INSERT INTO `users` VALUES ('10', '123', '邓志聪', '123', '1', '虎门', '52300', '13800138000', '68769@qq.com', '1', '1491543332');
INSERT INTO `users` VALUES ('20', 'abcabc', '张三', 'dengrongrong', '2', '广州', '53000', '', '', '1', '1492059364');
INSERT INTO `users` VALUES ('19', '22222', '吴仲铭', '123', '1', '番禺', '123', '123', '4', '1', '1491792838');
INSERT INTO `users` VALUES ('25', '111', '临时账号', '111', '1', '广东省广州市天河区东圃  兄弟连', '58000', '13800138000', '15812816866@qq.com', '0', '1491992266');
INSERT INTO `users` VALUES ('26', '764657', '23421', '21231', '1', '1', '1', '1', '1', '1', '1491961565');
INSERT INTO `users` VALUES ('27', '4321', '', '', null, '', '', '', '', '1', '1491961631');
INSERT INTO `users` VALUES ('29', '34321', '', '123', '1', '', '', '', '', '1', '1491962161');
INSERT INTO `users` VALUES ('30', '4312', '', '1234', '1', '', '', '', '', '1', '1491962823');
INSERT INTO `users` VALUES ('31', '12345', '', '12345', '1', '', '', '', '', '1', '1491963735');
INSERT INTO `users` VALUES ('32', '1235435', '', '1352542', '1', '', '', '', '', '1', '1492007489');
INSERT INTO `users` VALUES ('33', '12354355436', '', '565436', '1', '', '', '', '', '1', '1492007692');
INSERT INTO `users` VALUES ('34', '999', '', '999', '1', '', '', '', '', '1', '1492440826');
INSERT INTO `users` VALUES ('35', '666', '66666', '666', '1', '666', '666', '666', '666', '0', '1492482043');
INSERT INTO `users` VALUES ('37', '555', '123', '555', '1', '123', '123', '123', '123@qq.com', '1', '1492482430');
