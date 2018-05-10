-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- 主机: 70q6h1k0.zzcdb.dnstoo.com:5506
-- 生成日期: 2016 年 06 月 09 日 02:43
-- 服务器版本: 5.5.35
-- PHP 版本: 5.2.17
-- 
-- 数据库: `wfxceshi`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_alipay`
-- 

CREATE TABLE `wfx_alipay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `switch` int(11) NOT NULL,
  `alipayname` varchar(100) DEFAULT NULL COMMENT '支付宝名称',
  `partner` varchar(100) DEFAULT NULL COMMENT '合作身份者id',
  `key` varchar(100) DEFAULT NULL COMMENT '安全检验码',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_alipay`
-- 

INSERT INTO `wfx_alipay` VALUES (1, 1, 'xiujida@163.com', '2088411818635564', 'q97lmadjh6rfmy3y94ngx7rx7iedulne', '2016-06-08 11:44:48');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_apply_config`
-- 

CREATE TABLE `wfx_apply_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `event` text NOT NULL,
  `time_range` text NOT NULL,
  `introduce` text NOT NULL,
  `visiter` int(11) NOT NULL,
  `apply` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_apply_config`
-- 

INSERT INTO `wfx_apply_config` VALUES (1, '报名系统', '1,2', '1111', '<p>2222哈喽你好<img src="http://img.baidu.com/hi/jx2/j_0028.gif"/></p>', 3264, 253, 1, '2015-09-15 10:02:14');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_apply_record`
-- 

CREATE TABLE `wfx_apply_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `event` text NOT NULL,
  `note` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- 导出表中的数据 `wfx_apply_record`
-- 

INSERT INTO `wfx_apply_record` VALUES (1, 162, 66, '1', '', '2015-09-14 15:50:08');
INSERT INTO `wfx_apply_record` VALUES (2, 162, 66, '1', '', '2015-09-14 15:50:15');
INSERT INTO `wfx_apply_record` VALUES (3, 162, 66, '1', '', '2015-09-14 17:35:11');
INSERT INTO `wfx_apply_record` VALUES (4, 162, 66, '1', '', '2015-09-14 17:35:16');
INSERT INTO `wfx_apply_record` VALUES (5, 162, 66, '1', '', '2015-09-14 17:36:38');
INSERT INTO `wfx_apply_record` VALUES (6, 162, 66, '1', '', '2015-09-14 17:37:00');
INSERT INTO `wfx_apply_record` VALUES (7, 162, 66, '1', '', '2015-09-15 09:08:28');
INSERT INTO `wfx_apply_record` VALUES (8, 162, 66, '1', '', '2015-09-15 09:11:45');
INSERT INTO `wfx_apply_record` VALUES (9, 162, 66, '1', '', '2015-09-15 09:12:22');
INSERT INTO `wfx_apply_record` VALUES (10, 162, 66, '1', '', '2015-09-15 09:12:54');
INSERT INTO `wfx_apply_record` VALUES (11, 162, 66, '1', '', '2015-09-15 09:55:10');
INSERT INTO `wfx_apply_record` VALUES (12, 162, 66, '2', '', '2015-09-15 09:55:34');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_artical`
-- 

CREATE TABLE `wfx_artical` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `sub` text NOT NULL,
  `content` text NOT NULL,
  `visiter` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `wfx_artical`
-- 

INSERT INTO `wfx_artical` VALUES (1, 20, '欢迎关注wemall商城', 'wemall', '欢迎关注wemall商城', '<p>欢迎关注wemall商城</p>', 1136, '2016-06-07 16:53:42');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_autoset`
-- 

CREATE TABLE `wfx_autoset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `wctime` int(11) DEFAULT NULL,
  `qrcode_background` varchar(255) DEFAULT 'QRcode/background/default.jpg',
  `qrcode_emp_background` varchar(255) DEFAULT 'QRcode/background/default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `wfx_autoset`
-- 

INSERT INTO `wfx_autoset` VALUES (1, 20, 'c969b336246b9de94b0694eeb3268c90', 0, 'QRcode/background/bg_1434618758.jpg', 'QRcode/background/bg_1465368253.jpg');
INSERT INTO `wfx_autoset` VALUES (2, 21, 'c969b336246b9de94b0694eeb3268c90', NULL, 'QRcode/background/bg_1434618758.jpg', 'QRcode/background/bg_1464942897.jpg');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_cashback`
-- 

CREATE TABLE `wfx_cashback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vip_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `money` float NOT NULL,
  `dayback` float NOT NULL,
  `lasttime` int(11) NOT NULL,
  `backday` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `wfx_cashback`
-- 

INSERT INTO `wfx_cashback` VALUES (1, 1, '20160510164316-4', 138, 13.8, 1464969600, 10, 1, '2016-06-04 11:38:13');
INSERT INTO `wfx_cashback` VALUES (2, 1, '20160516003026-5', 138, 13.8, 1464969600, 10, 1, '2016-06-04 11:38:13');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_cms_set`
-- 

CREATE TABLE `wfx_cms_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `copyright` text,
  `pagesize` int(11) DEFAULT '20',
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_cms_set`
-- 

INSERT INTO `wfx_cms_set` VALUES (1, 'WeMall分销系统', 'www.wemallshop.com', 'Powered by WeMall | Copyright © wemallshop.com All rights reserved.', 20, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_coupon`
-- 

CREATE TABLE `wfx_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `cardid` text NOT NULL,
  `cost` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_coupon`
-- 

INSERT INTO `wfx_coupon` VALUES (1, 12, 'asdfasdflhaj21', 300, '2015-07-17 13:53:57');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_coupon_id`
-- 

CREATE TABLE `wfx_coupon_id` (
  `id` int(10) unsigned NOT NULL,
  `cardid` text NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- 导出表中的数据 `wfx_coupon_id`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_employee`
-- 

CREATE TABLE `wfx_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `vipid` int(11) NOT NULL COMMENT '关联的VipId',
  `username` varchar(255) NOT NULL COMMENT '登陆账号',
  `userpass` varchar(255) NOT NULL COMMENT '登陆密码',
  `nickname` varchar(255) DEFAULT NULL COMMENT '员工',
  `oath` varchar(255) DEFAULT 'employee' COMMENT '权限管理',
  `qq` varchar(255) DEFAULT NULL COMMENT 'QQ',
  `mobile` varchar(255) DEFAULT NULL COMMENT '手机',
  `money` float DEFAULT NULL COMMENT '0.0',
  `lastip` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT '0',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL COMMENT '1超管员工0商家员工',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='独立于系统账户之外的账户（包括员工、经理、财务）' AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `wfx_employee`
-- 

INSERT INTO `wfx_employee` VALUES (1, 0, 7, '002', 'dc5c7986daef50c1e02ab09b442ee34f', '002', 'employee', NULL, '18538753627', NULL, NULL, 2, '2016-06-08 15:44:12', 1);
INSERT INTO `wfx_employee` VALUES (5, 20, 0, '666', 'fae0b27c451c728867a567e8c1bb4e53', '666', 'employee', NULL, '666', NULL, NULL, 2, '2016-06-08 15:44:26', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_fx_dslog`
-- 

CREATE TABLE `wfx_fx_dslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) DEFAULT NULL,
  `from` int(11) DEFAULT NULL,
  `fromname` varchar(255) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `toname` varchar(255) DEFAULT NULL,
  `fxprice` float DEFAULT NULL,
  `fxyj` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `ishg` tinyint(1) DEFAULT '0',
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `wfx_fx_dslog`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_fx_log_tj`
-- 

CREATE TABLE `wfx_fx_log_tj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vipid` int(11) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `xxnickname` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_fx_log_tj`
-- 

INSERT INTO `wfx_fx_log_tj` VALUES (1, 4, 'AI.何青.wemall', 'AI.何青.wemall', '获得新用户注册奖励:12个积分；12点经验；12元余额；', 1465368447);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_fx_syslog`
-- 

CREATE TABLE `wfx_fx_syslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) DEFAULT NULL,
  `from` int(11) DEFAULT NULL,
  `fromname` varchar(255) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `toname` varchar(255) DEFAULT NULL,
  `fxprice` float DEFAULT NULL,
  `fxyj` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `wfx_fx_syslog`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_location_area`
-- 

CREATE TABLE `wfx_location_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2998 ;

-- 
-- 导出表中的数据 `wfx_location_area`
-- 

INSERT INTO `wfx_location_area` VALUES (1, '1', '东城区', '100010');
INSERT INTO `wfx_location_area` VALUES (2, '1', '西城区', '100032');
INSERT INTO `wfx_location_area` VALUES (3, '1', '崇文区', '100061');
INSERT INTO `wfx_location_area` VALUES (4, '1', '宣武区', '100054');
INSERT INTO `wfx_location_area` VALUES (5, '1', '朝阳区', '100020');
INSERT INTO `wfx_location_area` VALUES (6, '1', '丰台区', '100071');
INSERT INTO `wfx_location_area` VALUES (7, '1', '石景山区', '100043');
INSERT INTO `wfx_location_area` VALUES (8, '1', '海淀区', '100089');
INSERT INTO `wfx_location_area` VALUES (9, '1', '门头沟区', '102300');
INSERT INTO `wfx_location_area` VALUES (10, '1', '房山区', '102488');
INSERT INTO `wfx_location_area` VALUES (11, '1', '通州区', '101100');
INSERT INTO `wfx_location_area` VALUES (12, '1', '顺义区', '101300');
INSERT INTO `wfx_location_area` VALUES (13, '1', '昌平区', '102200');
INSERT INTO `wfx_location_area` VALUES (14, '1', '大兴区', '102600');
INSERT INTO `wfx_location_area` VALUES (15, '1', '怀柔区', '101400');
INSERT INTO `wfx_location_area` VALUES (16, '1', '平谷区', '101200');
INSERT INTO `wfx_location_area` VALUES (17, '1', '密云县', '101500');
INSERT INTO `wfx_location_area` VALUES (18, '1', '延庆县', '102100');
INSERT INTO `wfx_location_area` VALUES (19, '2', '和平区', '300041');
INSERT INTO `wfx_location_area` VALUES (20, '2', '河东区', '300171');
INSERT INTO `wfx_location_area` VALUES (21, '2', '河西区', '300202');
INSERT INTO `wfx_location_area` VALUES (22, '2', '南开区', '300100');
INSERT INTO `wfx_location_area` VALUES (23, '2', '河北区', '300143');
INSERT INTO `wfx_location_area` VALUES (24, '2', '红桥区', '300131');
INSERT INTO `wfx_location_area` VALUES (25, '2', '塘沽区', '300450');
INSERT INTO `wfx_location_area` VALUES (26, '2', '汉沽区', '300480');
INSERT INTO `wfx_location_area` VALUES (27, '2', '大港区', '300270');
INSERT INTO `wfx_location_area` VALUES (28, '2', '东丽区', '300300');
INSERT INTO `wfx_location_area` VALUES (29, '2', '西青区', '300380');
INSERT INTO `wfx_location_area` VALUES (30, '2', '津南区', '300350');
INSERT INTO `wfx_location_area` VALUES (31, '2', '北辰区', '300400');
INSERT INTO `wfx_location_area` VALUES (32, '2', '武清区', '301700');
INSERT INTO `wfx_location_area` VALUES (33, '2', '宝坻区', '301800');
INSERT INTO `wfx_location_area` VALUES (34, '2', '宁河县', '301500');
INSERT INTO `wfx_location_area` VALUES (35, '2', '静海县', '301600');
INSERT INTO `wfx_location_area` VALUES (36, '2', '蓟县', '301900');
INSERT INTO `wfx_location_area` VALUES (37, '2', '保税区', '300308');
INSERT INTO `wfx_location_area` VALUES (38, '2', '经济技术开发区', '300457');
INSERT INTO `wfx_location_area` VALUES (39, '2', '高新区', '300384');
INSERT INTO `wfx_location_area` VALUES (40, '2', '滨海新区', '300457');
INSERT INTO `wfx_location_area` VALUES (41, '3', '长安区', '050011');
INSERT INTO `wfx_location_area` VALUES (42, '3', '桥东区', '050011');
INSERT INTO `wfx_location_area` VALUES (43, '3', '桥西区', '050051');
INSERT INTO `wfx_location_area` VALUES (44, '3', '新华区', '050051');
INSERT INTO `wfx_location_area` VALUES (45, '3', '井陉矿区', '050100');
INSERT INTO `wfx_location_area` VALUES (46, '3', '裕华区', '050081');
INSERT INTO `wfx_location_area` VALUES (47, '3', '井陉县', '050300');
INSERT INTO `wfx_location_area` VALUES (48, '3', '正定县', '050800');
INSERT INTO `wfx_location_area` VALUES (49, '3', '栾城县', '051430');
INSERT INTO `wfx_location_area` VALUES (50, '3', '行唐县', '050600');
INSERT INTO `wfx_location_area` VALUES (51, '3', '灵寿县', '050500');
INSERT INTO `wfx_location_area` VALUES (52, '3', '高邑县', '051330');
INSERT INTO `wfx_location_area` VALUES (53, '3', '深泽县', '052560');
INSERT INTO `wfx_location_area` VALUES (54, '3', '赞皇县', '051230');
INSERT INTO `wfx_location_area` VALUES (55, '3', '无极县', '052400');
INSERT INTO `wfx_location_area` VALUES (56, '3', '平山县', '050400');
INSERT INTO `wfx_location_area` VALUES (57, '3', '元氏县', '051130');
INSERT INTO `wfx_location_area` VALUES (58, '3', '赵县', '051530');
INSERT INTO `wfx_location_area` VALUES (59, '3', '辛集市', '052300');
INSERT INTO `wfx_location_area` VALUES (60, '3', '藁城市', '052160');
INSERT INTO `wfx_location_area` VALUES (61, '3', '晋州市', '052200');
INSERT INTO `wfx_location_area` VALUES (62, '3', '新乐市', '050700');
INSERT INTO `wfx_location_area` VALUES (63, '3', '鹿泉市', '050200');
INSERT INTO `wfx_location_area` VALUES (64, '3', '高新技术开发区', '050035');
INSERT INTO `wfx_location_area` VALUES (65, '4', '路南区', '063017');
INSERT INTO `wfx_location_area` VALUES (66, '4', '路北区', '063015');
INSERT INTO `wfx_location_area` VALUES (67, '4', '古冶区', '063104');
INSERT INTO `wfx_location_area` VALUES (68, '4', '开平区', '063021');
INSERT INTO `wfx_location_area` VALUES (69, '4', '丰南区', '063300');
INSERT INTO `wfx_location_area` VALUES (70, '4', '丰润区', '064000');
INSERT INTO `wfx_location_area` VALUES (71, '4', '滦县', '063700');
INSERT INTO `wfx_location_area` VALUES (72, '4', '滦南县', '063500');
INSERT INTO `wfx_location_area` VALUES (73, '4', '乐亭县', '063600');
INSERT INTO `wfx_location_area` VALUES (74, '4', '迁西县', '064300');
INSERT INTO `wfx_location_area` VALUES (75, '4', '玉田县', '064100');
INSERT INTO `wfx_location_area` VALUES (76, '4', '唐海县', '063200');
INSERT INTO `wfx_location_area` VALUES (77, '4', '遵化市', '064200');
INSERT INTO `wfx_location_area` VALUES (78, '4', '迁安市', '064400');
INSERT INTO `wfx_location_area` VALUES (79, '4', '高新区', '063020');
INSERT INTO `wfx_location_area` VALUES (80, '4', '汉沽管理区', '301501');
INSERT INTO `wfx_location_area` VALUES (81, '4', '海港开发区', '063600');
INSERT INTO `wfx_location_area` VALUES (82, '4', '芦台开发区', '301501');
INSERT INTO `wfx_location_area` VALUES (83, '4', '南堡开发区', '063305');
INSERT INTO `wfx_location_area` VALUES (84, '4', '曹妃甸工业区', '063200');
INSERT INTO `wfx_location_area` VALUES (85, '5', '海港区', '066000');
INSERT INTO `wfx_location_area` VALUES (86, '5', '山海关区', '066200');
INSERT INTO `wfx_location_area` VALUES (87, '5', '北戴河区', '066100');
INSERT INTO `wfx_location_area` VALUES (88, '5', '青龙满族自治县', '066500');
INSERT INTO `wfx_location_area` VALUES (89, '5', '昌黎县', '066600');
INSERT INTO `wfx_location_area` VALUES (90, '5', '抚宁县', '066300');
INSERT INTO `wfx_location_area` VALUES (91, '5', '卢龙县', '066400');
INSERT INTO `wfx_location_area` VALUES (92, '5', '经济技术开发区', '066004');
INSERT INTO `wfx_location_area` VALUES (93, '6', '邯山区', '056001');
INSERT INTO `wfx_location_area` VALUES (94, '6', '丛台区', '056004');
INSERT INTO `wfx_location_area` VALUES (95, '6', '复兴区', '056003');
INSERT INTO `wfx_location_area` VALUES (96, '6', '峰峰矿区', '056200');
INSERT INTO `wfx_location_area` VALUES (97, '6', '邯郸县', '056100');
INSERT INTO `wfx_location_area` VALUES (98, '6', '临漳县', '056600');
INSERT INTO `wfx_location_area` VALUES (99, '6', '成安县', '056700');
INSERT INTO `wfx_location_area` VALUES (100, '6', '大名县', '056900');
INSERT INTO `wfx_location_area` VALUES (101, '6', '涉县', '056400');
INSERT INTO `wfx_location_area` VALUES (102, '6', '磁县', '056500');
INSERT INTO `wfx_location_area` VALUES (103, '6', '肥乡县', '057550');
INSERT INTO `wfx_location_area` VALUES (104, '6', '永年县', '057150');
INSERT INTO `wfx_location_area` VALUES (105, '6', '邱县', '057450');
INSERT INTO `wfx_location_area` VALUES (106, '6', '鸡泽县', '057350');
INSERT INTO `wfx_location_area` VALUES (107, '6', '广平县', '057650');
INSERT INTO `wfx_location_area` VALUES (108, '6', '馆陶县', '057750');
INSERT INTO `wfx_location_area` VALUES (109, '6', '魏县', '056800');
INSERT INTO `wfx_location_area` VALUES (110, '6', '曲周县', '057250');
INSERT INTO `wfx_location_area` VALUES (111, '6', '武安市', '056300');
INSERT INTO `wfx_location_area` VALUES (112, '6', '经济开发区', '056002');
INSERT INTO `wfx_location_area` VALUES (113, '7', '桥东区', '054001');
INSERT INTO `wfx_location_area` VALUES (114, '7', '桥西区', '054000');
INSERT INTO `wfx_location_area` VALUES (115, '7', '邢台县', '054001');
INSERT INTO `wfx_location_area` VALUES (116, '7', '临城县', '054300');
INSERT INTO `wfx_location_area` VALUES (117, '7', '内丘县', '054200');
INSERT INTO `wfx_location_area` VALUES (118, '7', '柏乡县', '055450');
INSERT INTO `wfx_location_area` VALUES (119, '7', '隆尧县', '055350');
INSERT INTO `wfx_location_area` VALUES (120, '7', '任县', '055150');
INSERT INTO `wfx_location_area` VALUES (121, '7', '南和县', '054400');
INSERT INTO `wfx_location_area` VALUES (122, '7', '宁晋县', '055550');
INSERT INTO `wfx_location_area` VALUES (123, '7', '巨鹿县', '055250');
INSERT INTO `wfx_location_area` VALUES (124, '7', '新河县', '051730');
INSERT INTO `wfx_location_area` VALUES (125, '7', '广宗县', '054600');
INSERT INTO `wfx_location_area` VALUES (126, '7', '平乡县', '054500');
INSERT INTO `wfx_location_area` VALUES (127, '7', '威县', '054700');
INSERT INTO `wfx_location_area` VALUES (128, '7', '清河县', '054800');
INSERT INTO `wfx_location_area` VALUES (129, '7', '临西县', '054900');
INSERT INTO `wfx_location_area` VALUES (130, '7', '南宫市', '055750');
INSERT INTO `wfx_location_area` VALUES (131, '7', '沙河市', '054100');
INSERT INTO `wfx_location_area` VALUES (132, '8', '新市区', '071052');
INSERT INTO `wfx_location_area` VALUES (133, '8', '南市区', '071000');
INSERT INTO `wfx_location_area` VALUES (134, '8', '北市区', '071000');
INSERT INTO `wfx_location_area` VALUES (135, '8', '满城县', '072150');
INSERT INTO `wfx_location_area` VALUES (136, '8', '清苑县', '071100');
INSERT INTO `wfx_location_area` VALUES (137, '8', '涞水县', '074100');
INSERT INTO `wfx_location_area` VALUES (138, '8', '阜平县', '073200');
INSERT INTO `wfx_location_area` VALUES (139, '8', '徐水县', '072550');
INSERT INTO `wfx_location_area` VALUES (140, '8', '定兴县', '072650');
INSERT INTO `wfx_location_area` VALUES (141, '8', '唐县', '072350');
INSERT INTO `wfx_location_area` VALUES (142, '8', '高阳县', '071500');
INSERT INTO `wfx_location_area` VALUES (143, '8', '容城县', '071700');
INSERT INTO `wfx_location_area` VALUES (144, '8', '涞源县', '074300');
INSERT INTO `wfx_location_area` VALUES (145, '8', '望都县', '072450');
INSERT INTO `wfx_location_area` VALUES (146, '8', '安新县', '071600');
INSERT INTO `wfx_location_area` VALUES (147, '8', '易县', '074200');
INSERT INTO `wfx_location_area` VALUES (148, '8', '曲阳县', '073100');
INSERT INTO `wfx_location_area` VALUES (149, '8', '蠡县', '071400');
INSERT INTO `wfx_location_area` VALUES (150, '8', '顺平县', '072250');
INSERT INTO `wfx_location_area` VALUES (151, '8', '博野县', '071300');
INSERT INTO `wfx_location_area` VALUES (152, '8', '雄县', '071800');
INSERT INTO `wfx_location_area` VALUES (153, '8', '涿州市', '072750');
INSERT INTO `wfx_location_area` VALUES (154, '8', '定州市', '073000');
INSERT INTO `wfx_location_area` VALUES (155, '8', '安国市', '071200');
INSERT INTO `wfx_location_area` VALUES (156, '8', '高碑店市', '074000');
INSERT INTO `wfx_location_area` VALUES (157, '9', '桥东区', '075000');
INSERT INTO `wfx_location_area` VALUES (158, '9', '桥西区', '075061');
INSERT INTO `wfx_location_area` VALUES (159, '9', '宣化区', '075100');
INSERT INTO `wfx_location_area` VALUES (160, '9', '下花园区', '075300');
INSERT INTO `wfx_location_area` VALUES (161, '9', '宣化县', '075100');
INSERT INTO `wfx_location_area` VALUES (162, '9', '张北县', '076450');
INSERT INTO `wfx_location_area` VALUES (163, '9', '康保县', '076650');
INSERT INTO `wfx_location_area` VALUES (164, '9', '沽源县', '076550');
INSERT INTO `wfx_location_area` VALUES (165, '9', '尚义县', '076750');
INSERT INTO `wfx_location_area` VALUES (166, '9', '蔚县', '075700');
INSERT INTO `wfx_location_area` VALUES (167, '9', '阳原县', '075800');
INSERT INTO `wfx_location_area` VALUES (168, '9', '怀安县', '076150');
INSERT INTO `wfx_location_area` VALUES (169, '9', '万全县', '076250');
INSERT INTO `wfx_location_area` VALUES (170, '9', '怀来县', '075400');
INSERT INTO `wfx_location_area` VALUES (171, '9', '涿鹿县', '075600');
INSERT INTO `wfx_location_area` VALUES (172, '9', '赤城县', '075500');
INSERT INTO `wfx_location_area` VALUES (173, '9', '崇礼县', '076350');
INSERT INTO `wfx_location_area` VALUES (174, '10', '双桥区', '067000');
INSERT INTO `wfx_location_area` VALUES (175, '10', '双滦区', '067000');
INSERT INTO `wfx_location_area` VALUES (176, '10', '鹰手营子矿区', '067200');
INSERT INTO `wfx_location_area` VALUES (177, '10', '承德县', '067400');
INSERT INTO `wfx_location_area` VALUES (178, '10', '兴隆县', '067300');
INSERT INTO `wfx_location_area` VALUES (179, '10', '平泉县', '067500');
INSERT INTO `wfx_location_area` VALUES (180, '10', '滦平县', '068250');
INSERT INTO `wfx_location_area` VALUES (181, '10', '隆化县', '068150');
INSERT INTO `wfx_location_area` VALUES (182, '10', '丰宁满族自治县', '068350');
INSERT INTO `wfx_location_area` VALUES (183, '10', '宽城满族自治县', '067600');
INSERT INTO `wfx_location_area` VALUES (184, '10', '围场满族蒙古族自治县', '068450');
INSERT INTO `wfx_location_area` VALUES (185, '11', '新华区', '061000');
INSERT INTO `wfx_location_area` VALUES (186, '11', '运河区', '061000');
INSERT INTO `wfx_location_area` VALUES (187, '11', '沧县', '061000');
INSERT INTO `wfx_location_area` VALUES (188, '11', '青县', '062650');
INSERT INTO `wfx_location_area` VALUES (189, '11', '东光县', '061600');
INSERT INTO `wfx_location_area` VALUES (190, '11', '海兴县', '061200');
INSERT INTO `wfx_location_area` VALUES (191, '11', '盐山县', '061300');
INSERT INTO `wfx_location_area` VALUES (192, '11', '肃宁县', '062350');
INSERT INTO `wfx_location_area` VALUES (193, '11', '南皮县', '061500');
INSERT INTO `wfx_location_area` VALUES (194, '11', '吴桥县', '061800');
INSERT INTO `wfx_location_area` VALUES (195, '11', '献县', '062250');
INSERT INTO `wfx_location_area` VALUES (196, '11', '孟村回族自治县', '061400');
INSERT INTO `wfx_location_area` VALUES (197, '11', '泊头市', '062150');
INSERT INTO `wfx_location_area` VALUES (198, '11', '任丘市', '062550');
INSERT INTO `wfx_location_area` VALUES (199, '11', '黄骅市', '061100');
INSERT INTO `wfx_location_area` VALUES (200, '11', '河间市', '062450');
INSERT INTO `wfx_location_area` VALUES (201, '12', '安次区', '065000');
INSERT INTO `wfx_location_area` VALUES (202, '12', '广阳区', '065000');
INSERT INTO `wfx_location_area` VALUES (203, '12', '固安县', '065500');
INSERT INTO `wfx_location_area` VALUES (204, '12', '永清县', '065600');
INSERT INTO `wfx_location_area` VALUES (205, '12', '香河县', '065400');
INSERT INTO `wfx_location_area` VALUES (206, '12', '大城县', '065900');
INSERT INTO `wfx_location_area` VALUES (207, '12', '文安县', '065800');
INSERT INTO `wfx_location_area` VALUES (208, '12', '大厂回族自治县', '065300');
INSERT INTO `wfx_location_area` VALUES (209, '12', '霸州市', '065700');
INSERT INTO `wfx_location_area` VALUES (210, '12', '三河市', '065200');
INSERT INTO `wfx_location_area` VALUES (211, '12', '开发区', '065001');
INSERT INTO `wfx_location_area` VALUES (212, '13', '桃城区', '053000');
INSERT INTO `wfx_location_area` VALUES (213, '13', '枣强县', '053100');
INSERT INTO `wfx_location_area` VALUES (214, '13', '武邑县', '053400');
INSERT INTO `wfx_location_area` VALUES (215, '13', '武强县', '053300');
INSERT INTO `wfx_location_area` VALUES (216, '13', '饶阳县', '053900');
INSERT INTO `wfx_location_area` VALUES (217, '13', '安平县', '053600');
INSERT INTO `wfx_location_area` VALUES (218, '13', '故城县', '253800');
INSERT INTO `wfx_location_area` VALUES (219, '13', '景县', '053500');
INSERT INTO `wfx_location_area` VALUES (220, '13', '阜城县', '053700');
INSERT INTO `wfx_location_area` VALUES (221, '13', '冀州市', '053200');
INSERT INTO `wfx_location_area` VALUES (222, '13', '深州市', '053800');
INSERT INTO `wfx_location_area` VALUES (223, '14', '小店区', '030032');
INSERT INTO `wfx_location_area` VALUES (224, '14', '迎泽区', '030024');
INSERT INTO `wfx_location_area` VALUES (225, '14', '杏花岭区', '030001');
INSERT INTO `wfx_location_area` VALUES (226, '14', '尖草坪区', '030003');
INSERT INTO `wfx_location_area` VALUES (227, '14', '万柏林区', '030027');
INSERT INTO `wfx_location_area` VALUES (228, '14', '晋源区', '030025');
INSERT INTO `wfx_location_area` VALUES (229, '14', '清徐县', '030400');
INSERT INTO `wfx_location_area` VALUES (230, '14', '阳曲县', '030100');
INSERT INTO `wfx_location_area` VALUES (231, '14', '娄烦县', '030300');
INSERT INTO `wfx_location_area` VALUES (232, '14', '古交市', '030200');
INSERT INTO `wfx_location_area` VALUES (233, '15', '城区', '037008');
INSERT INTO `wfx_location_area` VALUES (234, '15', '矿区', '037001');
INSERT INTO `wfx_location_area` VALUES (235, '15', '南郊区', '037001');
INSERT INTO `wfx_location_area` VALUES (236, '15', '新荣区', '037002');
INSERT INTO `wfx_location_area` VALUES (237, '15', '阳高县', '038100');
INSERT INTO `wfx_location_area` VALUES (238, '15', '天镇县', '038200');
INSERT INTO `wfx_location_area` VALUES (239, '15', '广灵县', '037500');
INSERT INTO `wfx_location_area` VALUES (240, '15', '灵丘县', '034400');
INSERT INTO `wfx_location_area` VALUES (241, '15', '浑源县', '037400');
INSERT INTO `wfx_location_area` VALUES (242, '15', '左云县', '037100');
INSERT INTO `wfx_location_area` VALUES (243, '15', '大同县', '037300');
INSERT INTO `wfx_location_area` VALUES (244, '16', '城区', '045000');
INSERT INTO `wfx_location_area` VALUES (245, '16', '矿区', '045000');
INSERT INTO `wfx_location_area` VALUES (246, '16', '郊区', '045011');
INSERT INTO `wfx_location_area` VALUES (247, '16', '平定县', '045200');
INSERT INTO `wfx_location_area` VALUES (248, '16', '盂县', '045100');
INSERT INTO `wfx_location_area` VALUES (249, '17', '城区', '046011');
INSERT INTO `wfx_location_area` VALUES (250, '17', '郊区', '046011');
INSERT INTO `wfx_location_area` VALUES (251, '17', '长治县', '047100');
INSERT INTO `wfx_location_area` VALUES (252, '17', '襄垣县', '046200');
INSERT INTO `wfx_location_area` VALUES (253, '17', '屯留县', '046100');
INSERT INTO `wfx_location_area` VALUES (254, '17', '平顺县', '047400');
INSERT INTO `wfx_location_area` VALUES (255, '17', '黎城县', '047600');
INSERT INTO `wfx_location_area` VALUES (256, '17', '壶关县', '047300');
INSERT INTO `wfx_location_area` VALUES (257, '17', '长子县', '046600');
INSERT INTO `wfx_location_area` VALUES (258, '17', '武乡县', '046300');
INSERT INTO `wfx_location_area` VALUES (259, '17', '沁县', '046400');
INSERT INTO `wfx_location_area` VALUES (260, '17', '沁源县', '046500');
INSERT INTO `wfx_location_area` VALUES (261, '17', '潞城市', '047500');
INSERT INTO `wfx_location_area` VALUES (262, '18', '城区', '048000');
INSERT INTO `wfx_location_area` VALUES (263, '18', '沁水县', '048200');
INSERT INTO `wfx_location_area` VALUES (264, '18', '阳城县', '048100');
INSERT INTO `wfx_location_area` VALUES (265, '18', '陵川县', '048300');
INSERT INTO `wfx_location_area` VALUES (266, '18', '泽州县', '048012');
INSERT INTO `wfx_location_area` VALUES (267, '18', '高平市', '048400');
INSERT INTO `wfx_location_area` VALUES (268, '19', '朔城区', '038500');
INSERT INTO `wfx_location_area` VALUES (269, '19', '平鲁区', '038600');
INSERT INTO `wfx_location_area` VALUES (270, '19', '山阴县', '036900');
INSERT INTO `wfx_location_area` VALUES (271, '19', '应县', '037600');
INSERT INTO `wfx_location_area` VALUES (272, '19', '右玉县', '037200');
INSERT INTO `wfx_location_area` VALUES (273, '19', '怀仁县', '038300');
INSERT INTO `wfx_location_area` VALUES (274, '20', '榆次区', '030600');
INSERT INTO `wfx_location_area` VALUES (275, '20', '榆社县', '031800');
INSERT INTO `wfx_location_area` VALUES (276, '20', '左权县', '032600');
INSERT INTO `wfx_location_area` VALUES (277, '20', '和顺县', '032700');
INSERT INTO `wfx_location_area` VALUES (278, '20', '昔阳县', '045300');
INSERT INTO `wfx_location_area` VALUES (279, '20', '寿阳县', '045400');
INSERT INTO `wfx_location_area` VALUES (280, '20', '太谷县', '030800');
INSERT INTO `wfx_location_area` VALUES (281, '20', '祁县', '030900');
INSERT INTO `wfx_location_area` VALUES (282, '20', '平遥县', '031100');
INSERT INTO `wfx_location_area` VALUES (283, '20', '灵石县', '031300');
INSERT INTO `wfx_location_area` VALUES (284, '20', '介休市', '031200');
INSERT INTO `wfx_location_area` VALUES (285, '21', '盐湖区', '044000');
INSERT INTO `wfx_location_area` VALUES (286, '21', '临猗县', '044100');
INSERT INTO `wfx_location_area` VALUES (287, '21', '万荣县', '044200');
INSERT INTO `wfx_location_area` VALUES (288, '21', '闻喜县', '043800');
INSERT INTO `wfx_location_area` VALUES (289, '21', '稷山县', '043200');
INSERT INTO `wfx_location_area` VALUES (290, '21', '新绛县', '043100');
INSERT INTO `wfx_location_area` VALUES (291, '21', '绛县', '043600');
INSERT INTO `wfx_location_area` VALUES (292, '21', '垣曲县', '043700');
INSERT INTO `wfx_location_area` VALUES (293, '21', '夏县', '044400');
INSERT INTO `wfx_location_area` VALUES (294, '21', '平陆县', '044300');
INSERT INTO `wfx_location_area` VALUES (295, '21', '芮城县', '044600');
INSERT INTO `wfx_location_area` VALUES (296, '21', '永济市', '044500');
INSERT INTO `wfx_location_area` VALUES (297, '21', '河津市', '043300');
INSERT INTO `wfx_location_area` VALUES (298, '22', '忻府区', '034000');
INSERT INTO `wfx_location_area` VALUES (299, '22', '定襄县', '035400');
INSERT INTO `wfx_location_area` VALUES (300, '22', '五台县', '035500');
INSERT INTO `wfx_location_area` VALUES (301, '22', '代县', '034200');
INSERT INTO `wfx_location_area` VALUES (302, '22', '繁峙县', '034300');
INSERT INTO `wfx_location_area` VALUES (303, '22', '宁武县', '036700');
INSERT INTO `wfx_location_area` VALUES (304, '22', '静乐县', '035100');
INSERT INTO `wfx_location_area` VALUES (305, '22', '神池县', '036100');
INSERT INTO `wfx_location_area` VALUES (306, '22', '五寨县', '036200');
INSERT INTO `wfx_location_area` VALUES (307, '22', '岢岚县', '036300');
INSERT INTO `wfx_location_area` VALUES (308, '22', '河曲县', '036500');
INSERT INTO `wfx_location_area` VALUES (309, '22', '保德县', '036600');
INSERT INTO `wfx_location_area` VALUES (310, '22', '偏关县', '036400');
INSERT INTO `wfx_location_area` VALUES (311, '22', '原平市', '034100');
INSERT INTO `wfx_location_area` VALUES (312, '23', '尧都区', '041000');
INSERT INTO `wfx_location_area` VALUES (313, '23', '曲沃县', '043400');
INSERT INTO `wfx_location_area` VALUES (314, '23', '翼城县', '043500');
INSERT INTO `wfx_location_area` VALUES (315, '23', '襄汾县', '041500');
INSERT INTO `wfx_location_area` VALUES (316, '23', '洪洞县', '031600');
INSERT INTO `wfx_location_area` VALUES (317, '23', '古县', '042400');
INSERT INTO `wfx_location_area` VALUES (318, '23', '安泽县', '042500');
INSERT INTO `wfx_location_area` VALUES (319, '23', '浮山县', '042600');
INSERT INTO `wfx_location_area` VALUES (320, '23', '吉县', '042200');
INSERT INTO `wfx_location_area` VALUES (321, '23', '乡宁县', '042100');
INSERT INTO `wfx_location_area` VALUES (322, '23', '大宁县', '042300');
INSERT INTO `wfx_location_area` VALUES (323, '23', '隰县', '041300');
INSERT INTO `wfx_location_area` VALUES (324, '23', '永和县', '041400');
INSERT INTO `wfx_location_area` VALUES (325, '23', '蒲县', '041200');
INSERT INTO `wfx_location_area` VALUES (326, '23', '汾西县', '031500');
INSERT INTO `wfx_location_area` VALUES (327, '23', '侯马市', '043007');
INSERT INTO `wfx_location_area` VALUES (328, '23', '霍州市', '031400');
INSERT INTO `wfx_location_area` VALUES (329, '24', '离石区', '033000');
INSERT INTO `wfx_location_area` VALUES (330, '24', '文水县', '032100');
INSERT INTO `wfx_location_area` VALUES (331, '24', '交城县', '030500');
INSERT INTO `wfx_location_area` VALUES (332, '24', '兴县', '033600');
INSERT INTO `wfx_location_area` VALUES (333, '24', '临县', '033200');
INSERT INTO `wfx_location_area` VALUES (334, '24', '柳林县', '033300');
INSERT INTO `wfx_location_area` VALUES (335, '24', '石楼县', '032500');
INSERT INTO `wfx_location_area` VALUES (336, '24', '岚县', '033500');
INSERT INTO `wfx_location_area` VALUES (337, '24', '方山县', '033100');
INSERT INTO `wfx_location_area` VALUES (338, '24', '中阳县', '033400');
INSERT INTO `wfx_location_area` VALUES (339, '24', '交口县', '032400');
INSERT INTO `wfx_location_area` VALUES (340, '24', '孝义市', '032300');
INSERT INTO `wfx_location_area` VALUES (341, '24', '汾阳市', '032200');
INSERT INTO `wfx_location_area` VALUES (342, '25', '回民区', '010030');
INSERT INTO `wfx_location_area` VALUES (343, '25', '玉泉区', '010020');
INSERT INTO `wfx_location_area` VALUES (344, '25', '新城区', '010030');
INSERT INTO `wfx_location_area` VALUES (345, '25', '赛罕区', '010020');
INSERT INTO `wfx_location_area` VALUES (346, '25', '土默特左旗', '010100');
INSERT INTO `wfx_location_area` VALUES (347, '25', '托克托县', '010200');
INSERT INTO `wfx_location_area` VALUES (348, '25', '和林格尔县', '011500');
INSERT INTO `wfx_location_area` VALUES (349, '25', '清水河县', '011600');
INSERT INTO `wfx_location_area` VALUES (350, '25', '武川县', '011700');
INSERT INTO `wfx_location_area` VALUES (351, '26', '东河区', '014040');
INSERT INTO `wfx_location_area` VALUES (352, '26', '昆都仑区', '014010');
INSERT INTO `wfx_location_area` VALUES (353, '26', '青山区', '014030');
INSERT INTO `wfx_location_area` VALUES (354, '26', '石拐区', '014070');
INSERT INTO `wfx_location_area` VALUES (355, '26', '白云矿区', '014080');
INSERT INTO `wfx_location_area` VALUES (356, '26', '九原区', '014060');
INSERT INTO `wfx_location_area` VALUES (357, '26', '土默特右旗', '014100');
INSERT INTO `wfx_location_area` VALUES (358, '26', '固阳县', '014200');
INSERT INTO `wfx_location_area` VALUES (359, '26', '达尔罕茂明安联合旗', '014500');
INSERT INTO `wfx_location_area` VALUES (360, '27', '海勃湾区', '016000');
INSERT INTO `wfx_location_area` VALUES (361, '27', '海南区', '016030');
INSERT INTO `wfx_location_area` VALUES (362, '27', '乌达区', '016040');
INSERT INTO `wfx_location_area` VALUES (363, '28', '红山区', '024020');
INSERT INTO `wfx_location_area` VALUES (364, '28', '元宝山区', '024076');
INSERT INTO `wfx_location_area` VALUES (365, '28', '松山区', '024005');
INSERT INTO `wfx_location_area` VALUES (366, '28', '阿鲁科尔沁旗', '025550');
INSERT INTO `wfx_location_area` VALUES (367, '28', '巴林左旗', '025450');
INSERT INTO `wfx_location_area` VALUES (368, '28', '巴林右旗', '025150');
INSERT INTO `wfx_location_area` VALUES (369, '28', '林西县', '025250');
INSERT INTO `wfx_location_area` VALUES (370, '28', '克什克腾旗', '025350');
INSERT INTO `wfx_location_area` VALUES (371, '28', '翁牛特旗', '024500');
INSERT INTO `wfx_location_area` VALUES (372, '28', '喀喇沁旗', '024400');
INSERT INTO `wfx_location_area` VALUES (373, '28', '宁城县', '024200');
INSERT INTO `wfx_location_area` VALUES (374, '28', '敖汉旗', '024300');
INSERT INTO `wfx_location_area` VALUES (375, '28', '新城区', '025350');
INSERT INTO `wfx_location_area` VALUES (376, '29', '科尔沁区', '028000');
INSERT INTO `wfx_location_area` VALUES (377, '29', '科尔沁左翼中旗', '029300');
INSERT INTO `wfx_location_area` VALUES (378, '29', '科尔沁左翼后旗', '028100');
INSERT INTO `wfx_location_area` VALUES (379, '29', '开鲁县', '028400');
INSERT INTO `wfx_location_area` VALUES (380, '29', '库伦旗', '028200');
INSERT INTO `wfx_location_area` VALUES (381, '29', '奈曼旗', '028300');
INSERT INTO `wfx_location_area` VALUES (382, '29', '扎鲁特旗', '029100');
INSERT INTO `wfx_location_area` VALUES (383, '29', '霍林郭勒市', '029200');
INSERT INTO `wfx_location_area` VALUES (384, '30', '东胜区', '017000');
INSERT INTO `wfx_location_area` VALUES (385, '30', '达拉特旗', '014300');
INSERT INTO `wfx_location_area` VALUES (386, '30', '准格尔旗', '017100');
INSERT INTO `wfx_location_area` VALUES (387, '30', '鄂托克前旗', '016200');
INSERT INTO `wfx_location_area` VALUES (388, '30', '鄂托克旗', '016100');
INSERT INTO `wfx_location_area` VALUES (389, '30', '杭锦旗', '017400');
INSERT INTO `wfx_location_area` VALUES (390, '30', '乌审旗', '017300');
INSERT INTO `wfx_location_area` VALUES (391, '30', '伊金霍洛旗', '017200');
INSERT INTO `wfx_location_area` VALUES (392, '31', '海拉尔区', '021000');
INSERT INTO `wfx_location_area` VALUES (393, '31', '阿荣旗', '162750');
INSERT INTO `wfx_location_area` VALUES (394, '31', '莫力达瓦达斡尔族自治旗', '162850');
INSERT INTO `wfx_location_area` VALUES (395, '31', '鄂伦春自治旗', '165450');
INSERT INTO `wfx_location_area` VALUES (396, '31', '鄂温克族自治旗', '021100');
INSERT INTO `wfx_location_area` VALUES (397, '31', '陈巴尔虎旗', '021500');
INSERT INTO `wfx_location_area` VALUES (398, '31', '新巴尔虎左旗', '021200');
INSERT INTO `wfx_location_area` VALUES (399, '31', '新巴尔虎右旗', '021300');
INSERT INTO `wfx_location_area` VALUES (400, '31', '满洲里市', '021400');
INSERT INTO `wfx_location_area` VALUES (401, '31', '牙克石市', '022150');
INSERT INTO `wfx_location_area` VALUES (402, '31', '扎兰屯市', '162650');
INSERT INTO `wfx_location_area` VALUES (403, '31', '额尔古纳市', '022250');
INSERT INTO `wfx_location_area` VALUES (404, '31', '根河市', '022350');
INSERT INTO `wfx_location_area` VALUES (405, '32', '临河区', '015001');
INSERT INTO `wfx_location_area` VALUES (406, '32', '五原县', '015100');
INSERT INTO `wfx_location_area` VALUES (407, '32', '磴口县', '015200');
INSERT INTO `wfx_location_area` VALUES (408, '32', '乌拉特前旗', '014400');
INSERT INTO `wfx_location_area` VALUES (409, '32', '乌拉特中旗', '015300');
INSERT INTO `wfx_location_area` VALUES (410, '32', '乌拉特后旗', '015500');
INSERT INTO `wfx_location_area` VALUES (411, '32', '杭锦后旗', '015400');
INSERT INTO `wfx_location_area` VALUES (412, '33', '集宁区', '012000');
INSERT INTO `wfx_location_area` VALUES (413, '33', '卓资县', '012300');
INSERT INTO `wfx_location_area` VALUES (414, '33', '化德县', '013350');
INSERT INTO `wfx_location_area` VALUES (415, '33', '商都县', '013450');
INSERT INTO `wfx_location_area` VALUES (416, '33', '兴和县', '013650');
INSERT INTO `wfx_location_area` VALUES (417, '33', '凉城县', '013750');
INSERT INTO `wfx_location_area` VALUES (418, '33', '察哈尔右翼前旗', '012200');
INSERT INTO `wfx_location_area` VALUES (419, '33', '察哈尔右翼中旗', '013550');
INSERT INTO `wfx_location_area` VALUES (420, '33', '察哈尔右翼后旗', '012400');
INSERT INTO `wfx_location_area` VALUES (421, '33', '四子王旗', '011800');
INSERT INTO `wfx_location_area` VALUES (422, '33', '丰镇市', '012100');
INSERT INTO `wfx_location_area` VALUES (423, '34', '乌兰浩特市', '137401');
INSERT INTO `wfx_location_area` VALUES (424, '34', '阿尔山市', '137800');
INSERT INTO `wfx_location_area` VALUES (425, '34', '科尔沁右翼前旗', '137423');
INSERT INTO `wfx_location_area` VALUES (426, '34', '科尔沁右翼中旗', '029400');
INSERT INTO `wfx_location_area` VALUES (427, '34', '扎赉特旗', '137600');
INSERT INTO `wfx_location_area` VALUES (428, '34', '突泉县', '137500');
INSERT INTO `wfx_location_area` VALUES (429, '35', '二连浩特市', '011100');
INSERT INTO `wfx_location_area` VALUES (430, '35', '锡林浩特市', '026000');
INSERT INTO `wfx_location_area` VALUES (431, '35', '阿巴嘎旗', '011400');
INSERT INTO `wfx_location_area` VALUES (432, '35', '苏尼特左旗', '011300');
INSERT INTO `wfx_location_area` VALUES (433, '35', '苏尼特右旗', '011200');
INSERT INTO `wfx_location_area` VALUES (434, '35', '东乌珠穆沁旗', '026300');
INSERT INTO `wfx_location_area` VALUES (435, '35', '西乌珠穆沁旗', '026200');
INSERT INTO `wfx_location_area` VALUES (436, '35', '太仆寺旗', '027000');
INSERT INTO `wfx_location_area` VALUES (437, '35', '镶黄旗', '013250');
INSERT INTO `wfx_location_area` VALUES (438, '35', '正镶白旗', '013800');
INSERT INTO `wfx_location_area` VALUES (439, '35', '正蓝旗', '027200');
INSERT INTO `wfx_location_area` VALUES (440, '35', '多伦县', '027300');
INSERT INTO `wfx_location_area` VALUES (441, '36', '阿拉善左旗', '750306');
INSERT INTO `wfx_location_area` VALUES (442, '36', '阿拉善右旗', '737300');
INSERT INTO `wfx_location_area` VALUES (443, '36', '额济纳旗', '735400');
INSERT INTO `wfx_location_area` VALUES (444, '37', '和平区', '110001');
INSERT INTO `wfx_location_area` VALUES (445, '37', '沈河区', '110013');
INSERT INTO `wfx_location_area` VALUES (446, '37', '大东区', '110041');
INSERT INTO `wfx_location_area` VALUES (447, '37', '皇姑区', '110031');
INSERT INTO `wfx_location_area` VALUES (448, '37', '铁西区', '110021');
INSERT INTO `wfx_location_area` VALUES (449, '37', '苏家屯区', '110101');
INSERT INTO `wfx_location_area` VALUES (450, '37', '东陵区', '110015');
INSERT INTO `wfx_location_area` VALUES (451, '37', '沈北新区', '110121');
INSERT INTO `wfx_location_area` VALUES (452, '37', '于洪区', '110141');
INSERT INTO `wfx_location_area` VALUES (453, '37', '辽中县', '110200');
INSERT INTO `wfx_location_area` VALUES (454, '37', '康平县', '110500');
INSERT INTO `wfx_location_area` VALUES (455, '37', '法库县', '110400');
INSERT INTO `wfx_location_area` VALUES (456, '37', '新民市', '110300');
INSERT INTO `wfx_location_area` VALUES (457, '37', '经济技术开发区', '110141');
INSERT INTO `wfx_location_area` VALUES (458, '37', '浑南新区', '110179');
INSERT INTO `wfx_location_area` VALUES (459, '37', '新城子经济技术开发区', '110121');
INSERT INTO `wfx_location_area` VALUES (460, '38', '中山区', '116001');
INSERT INTO `wfx_location_area` VALUES (461, '38', '西岗区', '116011');
INSERT INTO `wfx_location_area` VALUES (462, '38', '沙河口区', '116021');
INSERT INTO `wfx_location_area` VALUES (463, '38', '甘井子区', '116033');
INSERT INTO `wfx_location_area` VALUES (464, '38', '旅顺口区', '116041');
INSERT INTO `wfx_location_area` VALUES (465, '38', '金州区', '116100');
INSERT INTO `wfx_location_area` VALUES (466, '38', '长海县', '116500');
INSERT INTO `wfx_location_area` VALUES (467, '38', '瓦房店市', '116300');
INSERT INTO `wfx_location_area` VALUES (468, '38', '普兰店市', '116200');
INSERT INTO `wfx_location_area` VALUES (469, '38', '庄河市', '116400');
INSERT INTO `wfx_location_area` VALUES (470, '38', '开发区', '116600');
INSERT INTO `wfx_location_area` VALUES (471, '38', '保税区', '116600');
INSERT INTO `wfx_location_area` VALUES (472, '39', '铁东区', '114001');
INSERT INTO `wfx_location_area` VALUES (473, '39', '铁西区', '114013');
INSERT INTO `wfx_location_area` VALUES (474, '39', '立山区', '114031');
INSERT INTO `wfx_location_area` VALUES (475, '39', '千山区', '114041');
INSERT INTO `wfx_location_area` VALUES (476, '39', '台安县', '114100');
INSERT INTO `wfx_location_area` VALUES (477, '39', '岫岩满族自治县', '114300');
INSERT INTO `wfx_location_area` VALUES (478, '39', '海城市', '114200');
INSERT INTO `wfx_location_area` VALUES (479, '40', '新抚区', '113008');
INSERT INTO `wfx_location_area` VALUES (480, '40', '东洲区', '113003');
INSERT INTO `wfx_location_area` VALUES (481, '40', '望花区', '113001');
INSERT INTO `wfx_location_area` VALUES (482, '40', '顺城区', '113006');
INSERT INTO `wfx_location_area` VALUES (483, '40', '抚顺县', '113006');
INSERT INTO `wfx_location_area` VALUES (484, '40', '新宾满族自治县', '113200');
INSERT INTO `wfx_location_area` VALUES (485, '40', '清原满族自治县', '113300');
INSERT INTO `wfx_location_area` VALUES (486, '41', '平山区', '117000');
INSERT INTO `wfx_location_area` VALUES (487, '41', '明山区', '117021');
INSERT INTO `wfx_location_area` VALUES (488, '41', '溪湖区', '117002');
INSERT INTO `wfx_location_area` VALUES (489, '41', '南芬区', '117014');
INSERT INTO `wfx_location_area` VALUES (490, '41', '本溪满族自治县', '117100');
INSERT INTO `wfx_location_area` VALUES (491, '41', '桓仁满族自治县', '117200');
INSERT INTO `wfx_location_area` VALUES (492, '42', '元宝区', '118000');
INSERT INTO `wfx_location_area` VALUES (493, '42', '振兴区', '118002');
INSERT INTO `wfx_location_area` VALUES (494, '42', '振安区', '118001');
INSERT INTO `wfx_location_area` VALUES (495, '42', '宽甸满族自治县', '118200');
INSERT INTO `wfx_location_area` VALUES (496, '42', '东港市', '118300');
INSERT INTO `wfx_location_area` VALUES (497, '42', '凤城市', '118100');
INSERT INTO `wfx_location_area` VALUES (498, '43', '古塔区', '121001');
INSERT INTO `wfx_location_area` VALUES (499, '43', '凌河区', '121000');
INSERT INTO `wfx_location_area` VALUES (500, '43', '太和区', '121011');
INSERT INTO `wfx_location_area` VALUES (501, '43', '黑山县', '121400');
INSERT INTO `wfx_location_area` VALUES (502, '43', '义县', '121100');
INSERT INTO `wfx_location_area` VALUES (503, '43', '凌海市', '121200');
INSERT INTO `wfx_location_area` VALUES (504, '43', '北宁市', '121300');
INSERT INTO `wfx_location_area` VALUES (505, '43', '松山新区', '121219');
INSERT INTO `wfx_location_area` VALUES (506, '43', '经济技术开发区', '121007');
INSERT INTO `wfx_location_area` VALUES (507, '44', '站前区', '115002');
INSERT INTO `wfx_location_area` VALUES (508, '44', '西市区', '115004');
INSERT INTO `wfx_location_area` VALUES (509, '44', '鲅鱼圈区', '115007');
INSERT INTO `wfx_location_area` VALUES (510, '44', '老边区', '115005');
INSERT INTO `wfx_location_area` VALUES (511, '44', '盖州市', '115200');
INSERT INTO `wfx_location_area` VALUES (512, '44', '大石桥市', '115100');
INSERT INTO `wfx_location_area` VALUES (513, '45', '海州区', '123000');
INSERT INTO `wfx_location_area` VALUES (514, '45', '新邱区', '123005');
INSERT INTO `wfx_location_area` VALUES (515, '45', '太平区', '123003');
INSERT INTO `wfx_location_area` VALUES (516, '45', '清河门区', '123006');
INSERT INTO `wfx_location_area` VALUES (517, '45', '细河区', '123000');
INSERT INTO `wfx_location_area` VALUES (518, '45', '阜新蒙古族自治县', '123100');
INSERT INTO `wfx_location_area` VALUES (519, '45', '彰武县', '123200');
INSERT INTO `wfx_location_area` VALUES (520, '46', '白塔区', '111000');
INSERT INTO `wfx_location_area` VALUES (521, '46', '文圣区', '111000');
INSERT INTO `wfx_location_area` VALUES (522, '46', '宏伟区', '111003');
INSERT INTO `wfx_location_area` VALUES (523, '46', '弓长岭区', '111008');
INSERT INTO `wfx_location_area` VALUES (524, '46', '太子河区', '111000');
INSERT INTO `wfx_location_area` VALUES (525, '46', '辽阳县', '111200');
INSERT INTO `wfx_location_area` VALUES (526, '46', '灯塔市', '111300');
INSERT INTO `wfx_location_area` VALUES (527, '47', '双台子区', '124000');
INSERT INTO `wfx_location_area` VALUES (528, '47', '兴隆台区', '124010');
INSERT INTO `wfx_location_area` VALUES (529, '47', '大洼县', '124200');
INSERT INTO `wfx_location_area` VALUES (530, '47', '盘山县', '124000');
INSERT INTO `wfx_location_area` VALUES (531, '48', '银州区', '112000');
INSERT INTO `wfx_location_area` VALUES (532, '48', '清河区', '112003');
INSERT INTO `wfx_location_area` VALUES (533, '48', '铁岭县', '112000');
INSERT INTO `wfx_location_area` VALUES (534, '48', '西丰县', '112400');
INSERT INTO `wfx_location_area` VALUES (535, '48', '昌图县', '112500');
INSERT INTO `wfx_location_area` VALUES (536, '48', '调兵山市', '112700');
INSERT INTO `wfx_location_area` VALUES (537, '48', '开原市', '112300');
INSERT INTO `wfx_location_area` VALUES (538, '49', '双塔区', '122000');
INSERT INTO `wfx_location_area` VALUES (539, '49', '龙城区', '122000');
INSERT INTO `wfx_location_area` VALUES (540, '49', '朝阳县', '122000');
INSERT INTO `wfx_location_area` VALUES (541, '49', '建平县', '122400');
INSERT INTO `wfx_location_area` VALUES (542, '49', '喀喇沁左翼蒙古族自治县', '122300');
INSERT INTO `wfx_location_area` VALUES (543, '49', '北票市', '122100');
INSERT INTO `wfx_location_area` VALUES (544, '49', '凌源市', '122500');
INSERT INTO `wfx_location_area` VALUES (545, '50', '连山区', '125001');
INSERT INTO `wfx_location_area` VALUES (546, '50', '龙港区', '125003');
INSERT INTO `wfx_location_area` VALUES (547, '50', '南票区', '125027');
INSERT INTO `wfx_location_area` VALUES (548, '50', '绥中县', '125200');
INSERT INTO `wfx_location_area` VALUES (549, '50', '建昌县', '125300');
INSERT INTO `wfx_location_area` VALUES (550, '50', '兴城市', '125100');
INSERT INTO `wfx_location_area` VALUES (551, '51', '南关区', '130022');
INSERT INTO `wfx_location_area` VALUES (552, '51', '宽城区', '130051');
INSERT INTO `wfx_location_area` VALUES (553, '51', '朝阳区', '130012');
INSERT INTO `wfx_location_area` VALUES (554, '51', '二道区', '130031');
INSERT INTO `wfx_location_area` VALUES (555, '51', '绿园区', '130062');
INSERT INTO `wfx_location_area` VALUES (556, '51', '双阳区', '130600');
INSERT INTO `wfx_location_area` VALUES (557, '51', '农安县', '130200');
INSERT INTO `wfx_location_area` VALUES (558, '51', '九台市', '130500');
INSERT INTO `wfx_location_area` VALUES (559, '51', '榆树市', '130400');
INSERT INTO `wfx_location_area` VALUES (560, '51', '德惠市', '130300');
INSERT INTO `wfx_location_area` VALUES (561, '51', '净月经济开发区', '130117');
INSERT INTO `wfx_location_area` VALUES (562, '51', '高新技术产业开发区', '130015');
INSERT INTO `wfx_location_area` VALUES (563, '51', '经济技术开发区', '130022');
INSERT INTO `wfx_location_area` VALUES (564, '52', '昌邑区', '132002');
INSERT INTO `wfx_location_area` VALUES (565, '52', '龙潭区', '132021');
INSERT INTO `wfx_location_area` VALUES (566, '52', '船营区', '132011');
INSERT INTO `wfx_location_area` VALUES (567, '52', '丰满区', '132013');
INSERT INTO `wfx_location_area` VALUES (568, '52', '永吉县', '132200');
INSERT INTO `wfx_location_area` VALUES (569, '52', '蛟河市', '132500');
INSERT INTO `wfx_location_area` VALUES (570, '52', '桦甸市', '132400');
INSERT INTO `wfx_location_area` VALUES (571, '52', '舒兰市', '132600');
INSERT INTO `wfx_location_area` VALUES (572, '52', '磐石市', '132300');
INSERT INTO `wfx_location_area` VALUES (573, '53', '铁西区', '136000');
INSERT INTO `wfx_location_area` VALUES (574, '53', '铁东区', '136001');
INSERT INTO `wfx_location_area` VALUES (575, '53', '梨树县', '136500');
INSERT INTO `wfx_location_area` VALUES (576, '53', '伊通满族自治县', '130700');
INSERT INTO `wfx_location_area` VALUES (577, '53', '公主岭市', '136100');
INSERT INTO `wfx_location_area` VALUES (578, '53', '双辽市', '136400');
INSERT INTO `wfx_location_area` VALUES (579, '54', '龙山区', '136200');
INSERT INTO `wfx_location_area` VALUES (580, '54', '西安区', '136201');
INSERT INTO `wfx_location_area` VALUES (581, '54', '东丰县', '136300');
INSERT INTO `wfx_location_area` VALUES (582, '54', '东辽县', '136600');
INSERT INTO `wfx_location_area` VALUES (583, '55', '东昌区', '134001');
INSERT INTO `wfx_location_area` VALUES (584, '55', '二道江区', '134003');
INSERT INTO `wfx_location_area` VALUES (585, '55', '通化县', '134100');
INSERT INTO `wfx_location_area` VALUES (586, '55', '辉南县', '135100');
INSERT INTO `wfx_location_area` VALUES (587, '55', '柳河县', '135300');
INSERT INTO `wfx_location_area` VALUES (588, '55', '梅河口市', '135000');
INSERT INTO `wfx_location_area` VALUES (589, '55', '集安市', '134200');
INSERT INTO `wfx_location_area` VALUES (590, '56', '八道江区', '134300');
INSERT INTO `wfx_location_area` VALUES (591, '56', '抚松县', '134500');
INSERT INTO `wfx_location_area` VALUES (592, '56', '靖宇县', '135200');
INSERT INTO `wfx_location_area` VALUES (593, '56', '长白朝鲜族自治县', '134400');
INSERT INTO `wfx_location_area` VALUES (594, '56', '江源县', '134700');
INSERT INTO `wfx_location_area` VALUES (595, '56', '临江市', '134600');
INSERT INTO `wfx_location_area` VALUES (596, '57', '宁江区', '138000');
INSERT INTO `wfx_location_area` VALUES (597, '57', '前郭尔罗斯蒙古族自治县', '138000');
INSERT INTO `wfx_location_area` VALUES (598, '57', '长岭县', '131500');
INSERT INTO `wfx_location_area` VALUES (599, '57', '乾安县', '131400');
INSERT INTO `wfx_location_area` VALUES (600, '57', '扶余县', '131200');
INSERT INTO `wfx_location_area` VALUES (601, '58', '洮北区', '137000');
INSERT INTO `wfx_location_area` VALUES (602, '58', '镇赉县', '137300');
INSERT INTO `wfx_location_area` VALUES (603, '58', '通榆县', '137200');
INSERT INTO `wfx_location_area` VALUES (604, '58', '洮南市', '137100');
INSERT INTO `wfx_location_area` VALUES (605, '58', '大安市', '131300');
INSERT INTO `wfx_location_area` VALUES (606, '59', '延吉市', '133000');
INSERT INTO `wfx_location_area` VALUES (607, '59', '图们市', '133100');
INSERT INTO `wfx_location_area` VALUES (608, '59', '敦化市', '133700');
INSERT INTO `wfx_location_area` VALUES (609, '59', '珲春市', '133300');
INSERT INTO `wfx_location_area` VALUES (610, '59', '龙井市', '133400');
INSERT INTO `wfx_location_area` VALUES (611, '59', '和龙市', '133500');
INSERT INTO `wfx_location_area` VALUES (612, '59', '汪清县', '133200');
INSERT INTO `wfx_location_area` VALUES (613, '59', '安图县', '133600');
INSERT INTO `wfx_location_area` VALUES (614, '60', '道里区', '150010');
INSERT INTO `wfx_location_area` VALUES (615, '60', '南岗区', '150006');
INSERT INTO `wfx_location_area` VALUES (616, '60', '道外区', '150020');
INSERT INTO `wfx_location_area` VALUES (617, '60', '香坊区', '150036');
INSERT INTO `wfx_location_area` VALUES (618, '60', '动力区', '150040');
INSERT INTO `wfx_location_area` VALUES (619, '60', '平房区', '150060');
INSERT INTO `wfx_location_area` VALUES (620, '60', '松北区', '150028');
INSERT INTO `wfx_location_area` VALUES (621, '60', '呼兰区', '150500');
INSERT INTO `wfx_location_area` VALUES (622, '60', '依兰县', '154800');
INSERT INTO `wfx_location_area` VALUES (623, '60', '方正县', '150800');
INSERT INTO `wfx_location_area` VALUES (624, '60', '宾县', '150400');
INSERT INTO `wfx_location_area` VALUES (625, '60', '巴彦县', '151800');
INSERT INTO `wfx_location_area` VALUES (626, '60', '木兰县', '151900');
INSERT INTO `wfx_location_area` VALUES (627, '60', '通河县', '150900');
INSERT INTO `wfx_location_area` VALUES (628, '60', '延寿县', '150700');
INSERT INTO `wfx_location_area` VALUES (629, '60', '阿城市', '150300');
INSERT INTO `wfx_location_area` VALUES (630, '60', '双城市', '150100');
INSERT INTO `wfx_location_area` VALUES (631, '60', '尚志市', '150600');
INSERT INTO `wfx_location_area` VALUES (632, '60', '五常市', '150200');
INSERT INTO `wfx_location_area` VALUES (633, '61', '龙沙区', '161000');
INSERT INTO `wfx_location_area` VALUES (634, '61', '建华区', '161006');
INSERT INTO `wfx_location_area` VALUES (635, '61', '铁锋区', '161000');
INSERT INTO `wfx_location_area` VALUES (636, '61', '昂昂溪区', '161031');
INSERT INTO `wfx_location_area` VALUES (637, '61', '富拉尔基区', '161041');
INSERT INTO `wfx_location_area` VALUES (638, '61', '碾子山区', '161046');
INSERT INTO `wfx_location_area` VALUES (639, '61', '梅里斯达斡尔族区', '161021');
INSERT INTO `wfx_location_area` VALUES (640, '61', '龙江县', '161100');
INSERT INTO `wfx_location_area` VALUES (641, '61', '依安县', '161500');
INSERT INTO `wfx_location_area` VALUES (642, '61', '泰来县', '162400');
INSERT INTO `wfx_location_area` VALUES (643, '61', '甘南县', '162100');
INSERT INTO `wfx_location_area` VALUES (644, '61', '富裕县', '161200');
INSERT INTO `wfx_location_area` VALUES (645, '61', '克山县', '161600');
INSERT INTO `wfx_location_area` VALUES (646, '61', '克东县', '164800');
INSERT INTO `wfx_location_area` VALUES (647, '61', '拜泉县', '164700');
INSERT INTO `wfx_location_area` VALUES (648, '61', '讷河市', '161300');
INSERT INTO `wfx_location_area` VALUES (649, '62', '鸡冠区', '158100');
INSERT INTO `wfx_location_area` VALUES (650, '62', '恒山区', '158130');
INSERT INTO `wfx_location_area` VALUES (651, '62', '滴道区', '158150');
INSERT INTO `wfx_location_area` VALUES (652, '62', '梨树区', '158160');
INSERT INTO `wfx_location_area` VALUES (653, '62', '城子河区', '158170');
INSERT INTO `wfx_location_area` VALUES (654, '62', '麻山区', '158180');
INSERT INTO `wfx_location_area` VALUES (655, '62', '鸡东县', '158200');
INSERT INTO `wfx_location_area` VALUES (656, '62', '虎林市', '158400');
INSERT INTO `wfx_location_area` VALUES (657, '62', '密山市', '158300');
INSERT INTO `wfx_location_area` VALUES (658, '63', '向阳区', '154100');
INSERT INTO `wfx_location_area` VALUES (659, '63', '工农区', '154101');
INSERT INTO `wfx_location_area` VALUES (660, '63', '南山区', '154104');
INSERT INTO `wfx_location_area` VALUES (661, '63', '兴安区', '154102');
INSERT INTO `wfx_location_area` VALUES (662, '63', '东山区', '154106');
INSERT INTO `wfx_location_area` VALUES (663, '63', '兴山区', '154105');
INSERT INTO `wfx_location_area` VALUES (664, '63', '萝北县', '154200');
INSERT INTO `wfx_location_area` VALUES (665, '63', '绥滨县', '156200');
INSERT INTO `wfx_location_area` VALUES (666, '64', '尖山区', '155100');
INSERT INTO `wfx_location_area` VALUES (667, '64', '岭东区', '155120');
INSERT INTO `wfx_location_area` VALUES (668, '64', '四方台区', '155130');
INSERT INTO `wfx_location_area` VALUES (669, '64', '宝山区', '155131');
INSERT INTO `wfx_location_area` VALUES (670, '64', '集贤县', '155900');
INSERT INTO `wfx_location_area` VALUES (671, '64', '友谊县', '155800');
INSERT INTO `wfx_location_area` VALUES (672, '64', '宝清县', '155600');
INSERT INTO `wfx_location_area` VALUES (673, '64', '饶河县', '155700');
INSERT INTO `wfx_location_area` VALUES (674, '65', '萨尔图区', '163001');
INSERT INTO `wfx_location_area` VALUES (675, '65', '龙凤区', '163711');
INSERT INTO `wfx_location_area` VALUES (676, '65', '让胡路区', '163712');
INSERT INTO `wfx_location_area` VALUES (677, '65', '红岗区', '163511');
INSERT INTO `wfx_location_area` VALUES (678, '65', '大同区', '163515');
INSERT INTO `wfx_location_area` VALUES (679, '65', '肇州县', '166400');
INSERT INTO `wfx_location_area` VALUES (680, '65', '肇源县', '166500');
INSERT INTO `wfx_location_area` VALUES (681, '65', '林甸县', '166300');
INSERT INTO `wfx_location_area` VALUES (682, '65', '杜尔伯特蒙古族自治县', '166200');
INSERT INTO `wfx_location_area` VALUES (683, '66', '伊春区', '153000');
INSERT INTO `wfx_location_area` VALUES (684, '66', '南岔区', '153100');
INSERT INTO `wfx_location_area` VALUES (685, '66', '友好区', '153031');
INSERT INTO `wfx_location_area` VALUES (686, '66', '西林区', '153025');
INSERT INTO `wfx_location_area` VALUES (687, '66', '翠峦区', '153013');
INSERT INTO `wfx_location_area` VALUES (688, '66', '新青区', '153036');
INSERT INTO `wfx_location_area` VALUES (689, '66', '美溪区', '153021');
INSERT INTO `wfx_location_area` VALUES (690, '66', '金山屯区', '153026');
INSERT INTO `wfx_location_area` VALUES (691, '66', '五营区', '153033');
INSERT INTO `wfx_location_area` VALUES (692, '66', '乌马河区', '153011');
INSERT INTO `wfx_location_area` VALUES (693, '66', '汤旺河区', '153037');
INSERT INTO `wfx_location_area` VALUES (694, '66', '带岭区', '153106');
INSERT INTO `wfx_location_area` VALUES (695, '66', '乌伊岭区', '153038');
INSERT INTO `wfx_location_area` VALUES (696, '66', '红星区', '153035');
INSERT INTO `wfx_location_area` VALUES (697, '66', '上甘岭区', '153032');
INSERT INTO `wfx_location_area` VALUES (698, '66', '嘉荫县', '153200');
INSERT INTO `wfx_location_area` VALUES (699, '66', '铁力市', '152500');
INSERT INTO `wfx_location_area` VALUES (700, '67', '向阳区', '154002');
INSERT INTO `wfx_location_area` VALUES (701, '67', '前进区', '154002');
INSERT INTO `wfx_location_area` VALUES (702, '67', '东风区', '154005');
INSERT INTO `wfx_location_area` VALUES (703, '67', '郊区', '154004');
INSERT INTO `wfx_location_area` VALUES (704, '67', '桦南县', '154400');
INSERT INTO `wfx_location_area` VALUES (705, '67', '桦川县', '154300');
INSERT INTO `wfx_location_area` VALUES (706, '67', '汤原县', '154700');
INSERT INTO `wfx_location_area` VALUES (707, '67', '抚远县', '156500');
INSERT INTO `wfx_location_area` VALUES (708, '67', '同江市', '156400');
INSERT INTO `wfx_location_area` VALUES (709, '67', '富锦市', '156100');
INSERT INTO `wfx_location_area` VALUES (710, '68', '新兴区', '154604');
INSERT INTO `wfx_location_area` VALUES (711, '68', '桃山区', '154600');
INSERT INTO `wfx_location_area` VALUES (712, '68', '茄子河区', '154622');
INSERT INTO `wfx_location_area` VALUES (713, '68', '勃利县', '154500');
INSERT INTO `wfx_location_area` VALUES (714, '69', '东安区', '157000');
INSERT INTO `wfx_location_area` VALUES (715, '69', '爱民区', '157009');
INSERT INTO `wfx_location_area` VALUES (716, '69', '阳明区', '157013');
INSERT INTO `wfx_location_area` VALUES (717, '69', '西安区', '157000');
INSERT INTO `wfx_location_area` VALUES (718, '69', '东宁县', '157200');
INSERT INTO `wfx_location_area` VALUES (719, '69', '林口县', '157600');
INSERT INTO `wfx_location_area` VALUES (720, '69', '绥芬河市', '157300');
INSERT INTO `wfx_location_area` VALUES (721, '69', '海林市', '157100');
INSERT INTO `wfx_location_area` VALUES (722, '69', '宁安市', '157400');
INSERT INTO `wfx_location_area` VALUES (723, '69', '穆棱市', '157500');
INSERT INTO `wfx_location_area` VALUES (724, '70', '爱辉区', '164300');
INSERT INTO `wfx_location_area` VALUES (725, '70', '嫩江县', '161400');
INSERT INTO `wfx_location_area` VALUES (726, '70', '逊克县', '164400');
INSERT INTO `wfx_location_area` VALUES (727, '70', '孙吴县', '164200');
INSERT INTO `wfx_location_area` VALUES (728, '70', '北安市', '164000');
INSERT INTO `wfx_location_area` VALUES (729, '70', '五大连池市', '164100');
INSERT INTO `wfx_location_area` VALUES (730, '71', '北林区', '152000');
INSERT INTO `wfx_location_area` VALUES (731, '71', '望奎县', '152100');
INSERT INTO `wfx_location_area` VALUES (732, '71', '兰西县', '151500');
INSERT INTO `wfx_location_area` VALUES (733, '71', '青冈县', '151600');
INSERT INTO `wfx_location_area` VALUES (734, '71', '庆安县', '152400');
INSERT INTO `wfx_location_area` VALUES (735, '71', '明水县', '151700');
INSERT INTO `wfx_location_area` VALUES (736, '71', '绥棱县', '152200');
INSERT INTO `wfx_location_area` VALUES (737, '71', '安达市', '151400');
INSERT INTO `wfx_location_area` VALUES (738, '71', '肇东市', '151100');
INSERT INTO `wfx_location_area` VALUES (739, '71', '海伦市', '152300');
INSERT INTO `wfx_location_area` VALUES (740, '72', '呼玛县', '165100');
INSERT INTO `wfx_location_area` VALUES (741, '72', '塔河县', '165200');
INSERT INTO `wfx_location_area` VALUES (742, '72', '漠河县', '165300');
INSERT INTO `wfx_location_area` VALUES (743, '72', '加格达奇区', '165000');
INSERT INTO `wfx_location_area` VALUES (744, '72', '松岭区', '165012');
INSERT INTO `wfx_location_area` VALUES (745, '72', '新林区', '165023');
INSERT INTO `wfx_location_area` VALUES (746, '72', '呼中区', '165036');
INSERT INTO `wfx_location_area` VALUES (747, '73', '黄浦区', '200001');
INSERT INTO `wfx_location_area` VALUES (748, '73', '卢湾区', '200020');
INSERT INTO `wfx_location_area` VALUES (749, '73', '徐汇区', '200030');
INSERT INTO `wfx_location_area` VALUES (750, '73', '长宁区', '200050');
INSERT INTO `wfx_location_area` VALUES (751, '73', '静安区', '200040');
INSERT INTO `wfx_location_area` VALUES (752, '73', '普陀区', '200333');
INSERT INTO `wfx_location_area` VALUES (753, '73', '闸北区', '200070');
INSERT INTO `wfx_location_area` VALUES (754, '73', '虹口区', '200080');
INSERT INTO `wfx_location_area` VALUES (755, '73', '杨浦区', '200082');
INSERT INTO `wfx_location_area` VALUES (756, '73', '闵行区', '201100');
INSERT INTO `wfx_location_area` VALUES (757, '73', '宝山区', '201900');
INSERT INTO `wfx_location_area` VALUES (758, '73', '嘉定区', '201800');
INSERT INTO `wfx_location_area` VALUES (759, '73', '浦东新区', '200135');
INSERT INTO `wfx_location_area` VALUES (760, '73', '金山区', '200540');
INSERT INTO `wfx_location_area` VALUES (761, '73', '松江区', '201600');
INSERT INTO `wfx_location_area` VALUES (762, '73', '青浦区', '201700');
INSERT INTO `wfx_location_area` VALUES (763, '73', '南汇区', '201300');
INSERT INTO `wfx_location_area` VALUES (764, '73', '奉贤区', '201400');
INSERT INTO `wfx_location_area` VALUES (765, '73', '崇明县', '202150');
INSERT INTO `wfx_location_area` VALUES (766, '74', '玄武区', '210018');
INSERT INTO `wfx_location_area` VALUES (767, '74', '白下区', '210002');
INSERT INTO `wfx_location_area` VALUES (768, '74', '秦淮区', '210001');
INSERT INTO `wfx_location_area` VALUES (769, '74', '建邺区', '210004');
INSERT INTO `wfx_location_area` VALUES (770, '74', '鼓楼区', '210009');
INSERT INTO `wfx_location_area` VALUES (771, '74', '下关区', '210011');
INSERT INTO `wfx_location_area` VALUES (772, '74', '浦口区', '211800');
INSERT INTO `wfx_location_area` VALUES (773, '74', '栖霞区', '210046');
INSERT INTO `wfx_location_area` VALUES (774, '74', '雨花台区', '210012');
INSERT INTO `wfx_location_area` VALUES (775, '74', '江宁区', '211100');
INSERT INTO `wfx_location_area` VALUES (776, '74', '六合区', '211500');
INSERT INTO `wfx_location_area` VALUES (777, '74', '溧水县', '211200');
INSERT INTO `wfx_location_area` VALUES (778, '74', '高淳县', '211300');
INSERT INTO `wfx_location_area` VALUES (779, '75', '崇安区', '214002');
INSERT INTO `wfx_location_area` VALUES (780, '75', '南长区', '214021');
INSERT INTO `wfx_location_area` VALUES (781, '75', '北塘区', '214044');
INSERT INTO `wfx_location_area` VALUES (782, '75', '锡山区', '214101');
INSERT INTO `wfx_location_area` VALUES (783, '75', '惠山区', '214174');
INSERT INTO `wfx_location_area` VALUES (784, '75', '滨湖区', '214062');
INSERT INTO `wfx_location_area` VALUES (785, '75', '江阴市', '214400');
INSERT INTO `wfx_location_area` VALUES (786, '75', '宜兴市', '214200');
INSERT INTO `wfx_location_area` VALUES (787, '75', '新区', '214028');
INSERT INTO `wfx_location_area` VALUES (788, '76', '云龙区', '221009');
INSERT INTO `wfx_location_area` VALUES (789, '76', '鼓楼区', '221005');
INSERT INTO `wfx_location_area` VALUES (790, '76', '九里区', '221140');
INSERT INTO `wfx_location_area` VALUES (791, '76', '泉山区', '221006');
INSERT INTO `wfx_location_area` VALUES (792, '76', '铜山县', '221116');
INSERT INTO `wfx_location_area` VALUES (793, '76', '贾汪区', '221011');
INSERT INTO `wfx_location_area` VALUES (794, '76', '丰县', '221700');
INSERT INTO `wfx_location_area` VALUES (795, '76', '沛县', '221600');
INSERT INTO `wfx_location_area` VALUES (796, '76', '睢宁县', '221200');
INSERT INTO `wfx_location_area` VALUES (797, '76', '新沂市', '221400');
INSERT INTO `wfx_location_area` VALUES (798, '76', '邳州市', '221300');
INSERT INTO `wfx_location_area` VALUES (799, '77', '天宁区', '213003');
INSERT INTO `wfx_location_area` VALUES (800, '77', '钟楼区', '213002');
INSERT INTO `wfx_location_area` VALUES (801, '77', '戚墅堰区', '213011');
INSERT INTO `wfx_location_area` VALUES (802, '77', '新北区', '213001');
INSERT INTO `wfx_location_area` VALUES (803, '77', '武进区', '213161');
INSERT INTO `wfx_location_area` VALUES (804, '77', '溧阳市', '213300');
INSERT INTO `wfx_location_area` VALUES (805, '77', '金坛市', '213200');
INSERT INTO `wfx_location_area` VALUES (806, '78', '沧浪区', '215006');
INSERT INTO `wfx_location_area` VALUES (807, '78', '平江区', '215005');
INSERT INTO `wfx_location_area` VALUES (808, '78', '金阊区', '215008');
INSERT INTO `wfx_location_area` VALUES (809, '78', '虎丘区', '215004');
INSERT INTO `wfx_location_area` VALUES (810, '78', '吴中区', '215128');
INSERT INTO `wfx_location_area` VALUES (811, '78', '相城区', '215131');
INSERT INTO `wfx_location_area` VALUES (812, '78', '常熟市', '215500');
INSERT INTO `wfx_location_area` VALUES (813, '78', '张家港市', '215600');
INSERT INTO `wfx_location_area` VALUES (814, '78', '昆山市', '215300');
INSERT INTO `wfx_location_area` VALUES (815, '78', '吴江市', '215200');
INSERT INTO `wfx_location_area` VALUES (816, '78', '太仓市', '215400');
INSERT INTO `wfx_location_area` VALUES (817, '78', '工业园区', '215028');
INSERT INTO `wfx_location_area` VALUES (818, '78', '高新区', '215011');
INSERT INTO `wfx_location_area` VALUES (819, '79', '崇川区', '226001');
INSERT INTO `wfx_location_area` VALUES (820, '79', '港闸区', '226001');
INSERT INTO `wfx_location_area` VALUES (821, '79', '海安县', '226600');
INSERT INTO `wfx_location_area` VALUES (822, '79', '如东县', '226400');
INSERT INTO `wfx_location_area` VALUES (823, '79', '启东市', '226200');
INSERT INTO `wfx_location_area` VALUES (824, '79', '如皋市', '226500');
INSERT INTO `wfx_location_area` VALUES (825, '79', '通州市', '226300');
INSERT INTO `wfx_location_area` VALUES (826, '79', '海门市', '226100');
INSERT INTO `wfx_location_area` VALUES (827, '79', '经济技术开发区', '226009');
INSERT INTO `wfx_location_area` VALUES (828, '80', '连云区', '222042');
INSERT INTO `wfx_location_area` VALUES (829, '80', '新浦区', '222003');
INSERT INTO `wfx_location_area` VALUES (830, '80', '海州区', '222023');
INSERT INTO `wfx_location_area` VALUES (831, '80', '赣榆县', '222100');
INSERT INTO `wfx_location_area` VALUES (832, '80', '东海县', '222300');
INSERT INTO `wfx_location_area` VALUES (833, '80', '灌云县', '222200');
INSERT INTO `wfx_location_area` VALUES (834, '80', '灌南县', '223500');
INSERT INTO `wfx_location_area` VALUES (835, '81', '清河区', '223001');
INSERT INTO `wfx_location_area` VALUES (836, '81', '楚州区', '223200');
INSERT INTO `wfx_location_area` VALUES (837, '81', '淮阴区', '223300');
INSERT INTO `wfx_location_area` VALUES (838, '81', '清浦区', '223002');
INSERT INTO `wfx_location_area` VALUES (839, '81', '涟水县', '223400');
INSERT INTO `wfx_location_area` VALUES (840, '81', '洪泽县', '223100');
INSERT INTO `wfx_location_area` VALUES (841, '81', '盱眙县', '211700');
INSERT INTO `wfx_location_area` VALUES (842, '81', '金湖县', '211600');
INSERT INTO `wfx_location_area` VALUES (843, '82', '亭湖区', '224005');
INSERT INTO `wfx_location_area` VALUES (844, '82', '盐都区', '224055');
INSERT INTO `wfx_location_area` VALUES (845, '82', '响水县', '224600');
INSERT INTO `wfx_location_area` VALUES (846, '82', '滨海县', '224500');
INSERT INTO `wfx_location_area` VALUES (847, '82', '阜宁县', '224400');
INSERT INTO `wfx_location_area` VALUES (848, '82', '射阳县', '224300');
INSERT INTO `wfx_location_area` VALUES (849, '82', '建湖县', '224700');
INSERT INTO `wfx_location_area` VALUES (850, '82', '东台市', '224200');
INSERT INTO `wfx_location_area` VALUES (851, '82', '大丰市', '224100');
INSERT INTO `wfx_location_area` VALUES (852, '83', '广陵区', '225002');
INSERT INTO `wfx_location_area` VALUES (853, '83', '邗江区', '225002');
INSERT INTO `wfx_location_area` VALUES (854, '83', '宝应县', '225800');
INSERT INTO `wfx_location_area` VALUES (855, '83', '仪征市', '211400');
INSERT INTO `wfx_location_area` VALUES (856, '83', '高邮市', '225600');
INSERT INTO `wfx_location_area` VALUES (857, '83', '江都市', '225200');
INSERT INTO `wfx_location_area` VALUES (858, '83', '维扬区', '225002');
INSERT INTO `wfx_location_area` VALUES (859, '83', '经济开发区', '225101');
INSERT INTO `wfx_location_area` VALUES (860, '84', '京口区', '212001');
INSERT INTO `wfx_location_area` VALUES (861, '84', '润州区', '212004');
INSERT INTO `wfx_location_area` VALUES (862, '84', '丹徒区', '212001');
INSERT INTO `wfx_location_area` VALUES (863, '84', '丹阳市', '212300');
INSERT INTO `wfx_location_area` VALUES (864, '84', '扬中市', '212200');
INSERT INTO `wfx_location_area` VALUES (865, '84', '句容市', '212400');
INSERT INTO `wfx_location_area` VALUES (866, '84', '新区', '212132');
INSERT INTO `wfx_location_area` VALUES (867, '85', '海陵区', '225300');
INSERT INTO `wfx_location_area` VALUES (868, '85', '高港区', '225321');
INSERT INTO `wfx_location_area` VALUES (869, '85', '兴化市', '225700');
INSERT INTO `wfx_location_area` VALUES (870, '85', '靖江市', '214500');
INSERT INTO `wfx_location_area` VALUES (871, '85', '泰兴市', '225400');
INSERT INTO `wfx_location_area` VALUES (872, '85', '姜堰市', '225500');
INSERT INTO `wfx_location_area` VALUES (873, '86', '宿城区', '223800');
INSERT INTO `wfx_location_area` VALUES (874, '86', '宿豫区', '223800');
INSERT INTO `wfx_location_area` VALUES (875, '86', '沭阳县', '223600');
INSERT INTO `wfx_location_area` VALUES (876, '86', '泗阳县', '223700');
INSERT INTO `wfx_location_area` VALUES (877, '86', '泗洪县', '223900');
INSERT INTO `wfx_location_area` VALUES (878, '87', '上城区', '310002');
INSERT INTO `wfx_location_area` VALUES (879, '87', '下城区', '310006');
INSERT INTO `wfx_location_area` VALUES (880, '87', '江干区', '310016');
INSERT INTO `wfx_location_area` VALUES (881, '87', '拱墅区', '310011');
INSERT INTO `wfx_location_area` VALUES (882, '87', '西湖区', '310013');
INSERT INTO `wfx_location_area` VALUES (883, '87', '滨江区', '310051');
INSERT INTO `wfx_location_area` VALUES (884, '87', '萧山区', '311200');
INSERT INTO `wfx_location_area` VALUES (885, '87', '余杭区', '311100');
INSERT INTO `wfx_location_area` VALUES (886, '87', '桐庐县', '311500');
INSERT INTO `wfx_location_area` VALUES (887, '87', '淳安县', '311700');
INSERT INTO `wfx_location_area` VALUES (888, '87', '建德市', '311600');
INSERT INTO `wfx_location_area` VALUES (889, '87', '富阳市', '311400');
INSERT INTO `wfx_location_area` VALUES (890, '87', '临安市', '311300');
INSERT INTO `wfx_location_area` VALUES (891, '88', '海曙区', '315000');
INSERT INTO `wfx_location_area` VALUES (892, '88', '江东区', '315040');
INSERT INTO `wfx_location_area` VALUES (893, '88', '江北区', '315040');
INSERT INTO `wfx_location_area` VALUES (894, '88', '北仑区', '315800');
INSERT INTO `wfx_location_area` VALUES (895, '88', '镇海区', '315200');
INSERT INTO `wfx_location_area` VALUES (896, '88', '鄞州区', '315100');
INSERT INTO `wfx_location_area` VALUES (897, '88', '象山县', '315700');
INSERT INTO `wfx_location_area` VALUES (898, '88', '宁海县', '315600');
INSERT INTO `wfx_location_area` VALUES (899, '88', '余姚市', '315400');
INSERT INTO `wfx_location_area` VALUES (900, '88', '慈溪市', '315300');
INSERT INTO `wfx_location_area` VALUES (901, '88', '奉化市', '315500');
INSERT INTO `wfx_location_area` VALUES (902, '89', '鹿城区', '325000');
INSERT INTO `wfx_location_area` VALUES (903, '89', '龙湾区', '325013');
INSERT INTO `wfx_location_area` VALUES (904, '89', '瓯海区', '325005');
INSERT INTO `wfx_location_area` VALUES (905, '89', '洞头县', '325700');
INSERT INTO `wfx_location_area` VALUES (906, '89', '永嘉县', '315100');
INSERT INTO `wfx_location_area` VALUES (907, '89', '平阳县', '325400');
INSERT INTO `wfx_location_area` VALUES (908, '89', '苍南县', '325800');
INSERT INTO `wfx_location_area` VALUES (909, '89', '文成县', '325300');
INSERT INTO `wfx_location_area` VALUES (910, '89', '泰顺县', '325500');
INSERT INTO `wfx_location_area` VALUES (911, '89', '瑞安市', '325200');
INSERT INTO `wfx_location_area` VALUES (912, '89', '乐清市', '325600');
INSERT INTO `wfx_location_area` VALUES (913, '90', '秀洲区', '314001');
INSERT INTO `wfx_location_area` VALUES (914, '90', '嘉善县', '314100');
INSERT INTO `wfx_location_area` VALUES (915, '90', '海盐县', '314300');
INSERT INTO `wfx_location_area` VALUES (916, '90', '海宁市', '314400');
INSERT INTO `wfx_location_area` VALUES (917, '90', '平湖市', '314200');
INSERT INTO `wfx_location_area` VALUES (918, '90', '桐乡市', '314500');
INSERT INTO `wfx_location_area` VALUES (919, '90', '南湖区', '314001');
INSERT INTO `wfx_location_area` VALUES (920, '91', '吴兴区', '313000');
INSERT INTO `wfx_location_area` VALUES (921, '91', '南浔区', '313009');
INSERT INTO `wfx_location_area` VALUES (922, '91', '德清县', '313200');
INSERT INTO `wfx_location_area` VALUES (923, '91', '长兴县', '313100');
INSERT INTO `wfx_location_area` VALUES (924, '91', '安吉县', '313300');
INSERT INTO `wfx_location_area` VALUES (925, '92', '越城区', '312000');
INSERT INTO `wfx_location_area` VALUES (926, '92', '绍兴县', '312000');
INSERT INTO `wfx_location_area` VALUES (927, '92', '新昌县', '312500');
INSERT INTO `wfx_location_area` VALUES (928, '92', '诸暨市', '311800');
INSERT INTO `wfx_location_area` VALUES (929, '92', '上虞市', '312300');
INSERT INTO `wfx_location_area` VALUES (930, '92', '嵊州市', '312400');
INSERT INTO `wfx_location_area` VALUES (931, '93', '婺城区', '321000');
INSERT INTO `wfx_location_area` VALUES (932, '93', '金东区', '321000');
INSERT INTO `wfx_location_area` VALUES (933, '93', '武义县', '321200');
INSERT INTO `wfx_location_area` VALUES (934, '93', '浦江县', '322200');
INSERT INTO `wfx_location_area` VALUES (935, '93', '磐安县', '322300');
INSERT INTO `wfx_location_area` VALUES (936, '93', '兰溪市', '321100');
INSERT INTO `wfx_location_area` VALUES (937, '93', '义乌市', '322000');
INSERT INTO `wfx_location_area` VALUES (938, '93', '东阳市', '322100');
INSERT INTO `wfx_location_area` VALUES (939, '93', '永康市', '321300');
INSERT INTO `wfx_location_area` VALUES (940, '94', '柯城区', '324100');
INSERT INTO `wfx_location_area` VALUES (941, '94', '衢江区', '324022');
INSERT INTO `wfx_location_area` VALUES (942, '94', '常山县', '324200');
INSERT INTO `wfx_location_area` VALUES (943, '94', '开化县', '324300');
INSERT INTO `wfx_location_area` VALUES (944, '94', '龙游县', '324400');
INSERT INTO `wfx_location_area` VALUES (945, '94', '江山市', '324100');
INSERT INTO `wfx_location_area` VALUES (946, '95', '定海区', '316000');
INSERT INTO `wfx_location_area` VALUES (947, '95', '普陀区', '316100');
INSERT INTO `wfx_location_area` VALUES (948, '95', '岱山县', '316200');
INSERT INTO `wfx_location_area` VALUES (949, '95', '嵊泗县', '202450');
INSERT INTO `wfx_location_area` VALUES (950, '96', '椒江区', '318000');
INSERT INTO `wfx_location_area` VALUES (951, '96', '路桥区', '318050');
INSERT INTO `wfx_location_area` VALUES (952, '96', '黄岩区', '318020');
INSERT INTO `wfx_location_area` VALUES (953, '96', '玉环县', '317600');
INSERT INTO `wfx_location_area` VALUES (954, '96', '三门县', '317100');
INSERT INTO `wfx_location_area` VALUES (955, '96', '天台县', '317200');
INSERT INTO `wfx_location_area` VALUES (956, '96', '仙居县', '317300');
INSERT INTO `wfx_location_area` VALUES (957, '96', '温岭市', '317500');
INSERT INTO `wfx_location_area` VALUES (958, '96', '临海市', '317000');
INSERT INTO `wfx_location_area` VALUES (959, '97', '莲都区', '323000');
INSERT INTO `wfx_location_area` VALUES (960, '97', '青田县', '323900');
INSERT INTO `wfx_location_area` VALUES (961, '97', '缙云县', '321400');
INSERT INTO `wfx_location_area` VALUES (962, '97', '遂昌县', '323300');
INSERT INTO `wfx_location_area` VALUES (963, '97', '松阳县', '323400');
INSERT INTO `wfx_location_area` VALUES (964, '97', '云和县', '323600');
INSERT INTO `wfx_location_area` VALUES (965, '97', '庆元县', '323800');
INSERT INTO `wfx_location_area` VALUES (966, '97', '景宁畲族自治县', '323500');
INSERT INTO `wfx_location_area` VALUES (967, '97', '龙泉市', '323700');
INSERT INTO `wfx_location_area` VALUES (968, '98', '瑶海区', '230011');
INSERT INTO `wfx_location_area` VALUES (969, '98', '庐阳区', '230001');
INSERT INTO `wfx_location_area` VALUES (970, '98', '蜀山区', '230031');
INSERT INTO `wfx_location_area` VALUES (971, '98', '包河区', '230041');
INSERT INTO `wfx_location_area` VALUES (972, '98', '长丰县', '231100');
INSERT INTO `wfx_location_area` VALUES (973, '98', '肥东县', '231600');
INSERT INTO `wfx_location_area` VALUES (974, '98', '肥西县', '231200');
INSERT INTO `wfx_location_area` VALUES (975, '98', '经济技术开发区', '230601');
INSERT INTO `wfx_location_area` VALUES (976, '98', '新站试验区', '230011');
INSERT INTO `wfx_location_area` VALUES (977, '98', '政务文化新区', '230066');
INSERT INTO `wfx_location_area` VALUES (978, '98', '高新技术产业开发区', '230088');
INSERT INTO `wfx_location_area` VALUES (979, '99', '镜湖区', '241000');
INSERT INTO `wfx_location_area` VALUES (980, '99', '鸠江区', '241000');
INSERT INTO `wfx_location_area` VALUES (981, '99', '芜湖县', '241100');
INSERT INTO `wfx_location_area` VALUES (982, '99', '繁昌县', '241200');
INSERT INTO `wfx_location_area` VALUES (983, '99', '南陵县', '242400');
INSERT INTO `wfx_location_area` VALUES (984, '99', '弋江区', '');
INSERT INTO `wfx_location_area` VALUES (985, '99', '三山区', '241000');
INSERT INTO `wfx_location_area` VALUES (986, '100', '龙子湖区', '233000');
INSERT INTO `wfx_location_area` VALUES (987, '100', '蚌山区', '233000');
INSERT INTO `wfx_location_area` VALUES (988, '100', '禹会区', '233000');
INSERT INTO `wfx_location_area` VALUES (989, '100', '淮上区', '233000');
INSERT INTO `wfx_location_area` VALUES (990, '100', '怀远县', '233400');
INSERT INTO `wfx_location_area` VALUES (991, '100', '五河县', '233300');
INSERT INTO `wfx_location_area` VALUES (992, '100', '固镇县', '233700');
INSERT INTO `wfx_location_area` VALUES (993, '101', '大通区', '232033');
INSERT INTO `wfx_location_area` VALUES (994, '101', '田家庵区', '232000');
INSERT INTO `wfx_location_area` VALUES (995, '101', '谢家集区', '232052');
INSERT INTO `wfx_location_area` VALUES (996, '101', '八公山区', '232072');
INSERT INTO `wfx_location_area` VALUES (997, '101', '潘集区', '232082');
INSERT INTO `wfx_location_area` VALUES (998, '101', '凤台县', '232100');
INSERT INTO `wfx_location_area` VALUES (999, '102', '雨山区', '243071');
INSERT INTO `wfx_location_area` VALUES (1000, '102', '花山区', '243000');
INSERT INTO `wfx_location_area` VALUES (1001, '102', '金家庄区', '243021');
INSERT INTO `wfx_location_area` VALUES (1002, '102', '当涂县', '243100');
INSERT INTO `wfx_location_area` VALUES (1003, '102', '经济技术开发区', '243041');
INSERT INTO `wfx_location_area` VALUES (1004, '103', '杜集区', '235000');
INSERT INTO `wfx_location_area` VALUES (1005, '103', '相山区', '235000');
INSERT INTO `wfx_location_area` VALUES (1006, '103', '烈山区', '235000');
INSERT INTO `wfx_location_area` VALUES (1007, '103', '濉溪县', '235100');
INSERT INTO `wfx_location_area` VALUES (1008, '104', '铜官山区', '244000');
INSERT INTO `wfx_location_area` VALUES (1009, '104', '狮子山区', '244000');
INSERT INTO `wfx_location_area` VALUES (1010, '104', '郊区', '244000');
INSERT INTO `wfx_location_area` VALUES (1011, '104', '铜陵县', '244100');
INSERT INTO `wfx_location_area` VALUES (1012, '105', '迎江区', '246001');
INSERT INTO `wfx_location_area` VALUES (1013, '105', '大观区', '246002');
INSERT INTO `wfx_location_area` VALUES (1014, '105', '怀宁县', '246100');
INSERT INTO `wfx_location_area` VALUES (1015, '105', '枞阳县', '246700');
INSERT INTO `wfx_location_area` VALUES (1016, '105', '潜山县', '246300');
INSERT INTO `wfx_location_area` VALUES (1017, '105', '太湖县', '246400');
INSERT INTO `wfx_location_area` VALUES (1018, '105', '宿松县', '246500');
INSERT INTO `wfx_location_area` VALUES (1019, '105', '望江县', '246200');
INSERT INTO `wfx_location_area` VALUES (1020, '105', '岳西县', '246600');
INSERT INTO `wfx_location_area` VALUES (1021, '105', '桐城市', '231400');
INSERT INTO `wfx_location_area` VALUES (1022, '105', '宜秀区', '246003');
INSERT INTO `wfx_location_area` VALUES (1023, '106', '屯溪区', '245000');
INSERT INTO `wfx_location_area` VALUES (1024, '106', '黄山区', '242700');
INSERT INTO `wfx_location_area` VALUES (1025, '106', '徽州区', '245061');
INSERT INTO `wfx_location_area` VALUES (1026, '106', '歙县', '245200');
INSERT INTO `wfx_location_area` VALUES (1027, '106', '休宁县', '245400');
INSERT INTO `wfx_location_area` VALUES (1028, '106', '黟县', '245500');
INSERT INTO `wfx_location_area` VALUES (1029, '106', '祁门县', '245600');
INSERT INTO `wfx_location_area` VALUES (1030, '107', '琅琊区', '239000');
INSERT INTO `wfx_location_area` VALUES (1031, '107', '南谯区', '239000');
INSERT INTO `wfx_location_area` VALUES (1032, '107', '来安县', '239200');
INSERT INTO `wfx_location_area` VALUES (1033, '107', '全椒县', '239500');
INSERT INTO `wfx_location_area` VALUES (1034, '107', '定远县', '233200');
INSERT INTO `wfx_location_area` VALUES (1035, '107', '凤阳县', '233100');
INSERT INTO `wfx_location_area` VALUES (1036, '107', '天长市', '239300');
INSERT INTO `wfx_location_area` VALUES (1037, '107', '明光市', '239400');
INSERT INTO `wfx_location_area` VALUES (1038, '108', '颍州区', '236001');
INSERT INTO `wfx_location_area` VALUES (1039, '108', '颍东区', '236058');
INSERT INTO `wfx_location_area` VALUES (1040, '108', '颍泉区', '236045');
INSERT INTO `wfx_location_area` VALUES (1041, '108', '临泉县', '236400');
INSERT INTO `wfx_location_area` VALUES (1042, '108', '太和县', '236600');
INSERT INTO `wfx_location_area` VALUES (1043, '108', '阜南县', '236300');
INSERT INTO `wfx_location_area` VALUES (1044, '108', '颍上县', '236200');
INSERT INTO `wfx_location_area` VALUES (1045, '108', '界首市', '236500');
INSERT INTO `wfx_location_area` VALUES (1046, '108', '经济开发区', '236112');
INSERT INTO `wfx_location_area` VALUES (1047, '109', '埇桥区', '234000');
INSERT INTO `wfx_location_area` VALUES (1048, '109', '砀山县', '235300');
INSERT INTO `wfx_location_area` VALUES (1049, '109', '萧县', '235200');
INSERT INTO `wfx_location_area` VALUES (1050, '109', '灵璧县', '234200');
INSERT INTO `wfx_location_area` VALUES (1051, '109', '泗县', '234300');
INSERT INTO `wfx_location_area` VALUES (1052, '110', '居巢区', '238000');
INSERT INTO `wfx_location_area` VALUES (1053, '110', '庐江县', '231500');
INSERT INTO `wfx_location_area` VALUES (1054, '110', '无为县', '238300');
INSERT INTO `wfx_location_area` VALUES (1055, '110', '含山县', '238100');
INSERT INTO `wfx_location_area` VALUES (1056, '110', '和县', '238200');
INSERT INTO `wfx_location_area` VALUES (1057, '111', '金安区', '237000');
INSERT INTO `wfx_location_area` VALUES (1058, '111', '裕安区', '237010');
INSERT INTO `wfx_location_area` VALUES (1059, '111', '寿县', '232200');
INSERT INTO `wfx_location_area` VALUES (1060, '111', '霍邱县', '237400');
INSERT INTO `wfx_location_area` VALUES (1061, '111', '舒城县', '231300');
INSERT INTO `wfx_location_area` VALUES (1062, '111', '金寨县', '237300');
INSERT INTO `wfx_location_area` VALUES (1063, '111', '霍山县', '237200');
INSERT INTO `wfx_location_area` VALUES (1064, '112', '谯城区', '236800');
INSERT INTO `wfx_location_area` VALUES (1065, '112', '涡阳县', '233600');
INSERT INTO `wfx_location_area` VALUES (1066, '112', '蒙城县', '233500');
INSERT INTO `wfx_location_area` VALUES (1067, '112', '利辛县', '236700');
INSERT INTO `wfx_location_area` VALUES (1068, '113', '贵池区', '247100');
INSERT INTO `wfx_location_area` VALUES (1069, '113', '东至县', '247200');
INSERT INTO `wfx_location_area` VALUES (1070, '113', '石台县', '245100');
INSERT INTO `wfx_location_area` VALUES (1071, '113', '青阳县', '242800');
INSERT INTO `wfx_location_area` VALUES (1072, '114', '宣州区', '242000');
INSERT INTO `wfx_location_area` VALUES (1073, '114', '郎溪县', '242100');
INSERT INTO `wfx_location_area` VALUES (1074, '114', '广德县', '242200');
INSERT INTO `wfx_location_area` VALUES (1075, '114', '泾县', '242500');
INSERT INTO `wfx_location_area` VALUES (1076, '114', '绩溪县', '245300');
INSERT INTO `wfx_location_area` VALUES (1077, '114', '旌德县', '242600');
INSERT INTO `wfx_location_area` VALUES (1078, '114', '宁国市', '242300');
INSERT INTO `wfx_location_area` VALUES (1079, '115', '鼓楼区', '350001');
INSERT INTO `wfx_location_area` VALUES (1080, '115', '台江区', '350004');
INSERT INTO `wfx_location_area` VALUES (1081, '115', '仓山区', '350007');
INSERT INTO `wfx_location_area` VALUES (1082, '115', '马尾区', '350015');
INSERT INTO `wfx_location_area` VALUES (1083, '115', '晋安区', '350011');
INSERT INTO `wfx_location_area` VALUES (1084, '115', '闽侯县', '350100');
INSERT INTO `wfx_location_area` VALUES (1085, '115', '连江县', '350500');
INSERT INTO `wfx_location_area` VALUES (1086, '115', '罗源县', '350600');
INSERT INTO `wfx_location_area` VALUES (1087, '115', '闽清县', '350800');
INSERT INTO `wfx_location_area` VALUES (1088, '115', '永泰县', '350700');
INSERT INTO `wfx_location_area` VALUES (1089, '115', '平潭县', '350400');
INSERT INTO `wfx_location_area` VALUES (1090, '115', '福清市', '350300');
INSERT INTO `wfx_location_area` VALUES (1091, '115', '长乐市', '350200');
INSERT INTO `wfx_location_area` VALUES (1092, '116', '思明区', '361001');
INSERT INTO `wfx_location_area` VALUES (1093, '116', '海沧区', '361026');
INSERT INTO `wfx_location_area` VALUES (1094, '116', '湖里区', '361006');
INSERT INTO `wfx_location_area` VALUES (1095, '116', '集美区', '361021');
INSERT INTO `wfx_location_area` VALUES (1096, '116', '同安区', '361100');
INSERT INTO `wfx_location_area` VALUES (1097, '116', '翔安区', '361101');
INSERT INTO `wfx_location_area` VALUES (1098, '116', '鼓浪屿区', '361002');
INSERT INTO `wfx_location_area` VALUES (1099, '116', '象屿保税区', '361006');
INSERT INTO `wfx_location_area` VALUES (1100, '116', '火炬高新区', '361006');
INSERT INTO `wfx_location_area` VALUES (1101, '117', '城厢区', '351100');
INSERT INTO `wfx_location_area` VALUES (1102, '117', '涵江区', '351111');
INSERT INTO `wfx_location_area` VALUES (1103, '117', '荔城区', '351100');
INSERT INTO `wfx_location_area` VALUES (1104, '117', '秀屿区', '351152');
INSERT INTO `wfx_location_area` VALUES (1105, '117', '仙游县', '351200');
INSERT INTO `wfx_location_area` VALUES (1106, '118', '梅列区', '365000');
INSERT INTO `wfx_location_area` VALUES (1107, '118', '三元区', '365001');
INSERT INTO `wfx_location_area` VALUES (1108, '118', '明溪县', '365200');
INSERT INTO `wfx_location_area` VALUES (1109, '118', '清流县', '365300');
INSERT INTO `wfx_location_area` VALUES (1110, '118', '宁化县', '365400');
INSERT INTO `wfx_location_area` VALUES (1111, '118', '大田县', '366100');
INSERT INTO `wfx_location_area` VALUES (1112, '118', '尤溪县', '365100');
INSERT INTO `wfx_location_area` VALUES (1113, '118', '沙县', '365500');
INSERT INTO `wfx_location_area` VALUES (1114, '118', '将乐县', '353300');
INSERT INTO `wfx_location_area` VALUES (1115, '118', '泰宁县', '354400');
INSERT INTO `wfx_location_area` VALUES (1116, '118', '建宁县', '354500');
INSERT INTO `wfx_location_area` VALUES (1117, '118', '永安市', '366000');
INSERT INTO `wfx_location_area` VALUES (1118, '119', '鲤城区', '362000');
INSERT INTO `wfx_location_area` VALUES (1119, '119', '丰泽区', '362000');
INSERT INTO `wfx_location_area` VALUES (1120, '119', '洛江区', '362011');
INSERT INTO `wfx_location_area` VALUES (1121, '119', '泉港区', '362114');
INSERT INTO `wfx_location_area` VALUES (1122, '119', '惠安县', '362100');
INSERT INTO `wfx_location_area` VALUES (1123, '119', '安溪县', '362400');
INSERT INTO `wfx_location_area` VALUES (1124, '119', '永春县', '362600');
INSERT INTO `wfx_location_area` VALUES (1125, '119', '德化县', '362500');
INSERT INTO `wfx_location_area` VALUES (1126, '119', '金门县', '362000');
INSERT INTO `wfx_location_area` VALUES (1127, '119', '石狮市', '362700');
INSERT INTO `wfx_location_area` VALUES (1128, '119', '晋江市', '362200');
INSERT INTO `wfx_location_area` VALUES (1129, '119', '南安市', '362300');
INSERT INTO `wfx_location_area` VALUES (1130, '119', '经济技术开发区', '362005');
INSERT INTO `wfx_location_area` VALUES (1131, '120', '芗城区', '363000');
INSERT INTO `wfx_location_area` VALUES (1132, '120', '龙文区', '363005');
INSERT INTO `wfx_location_area` VALUES (1133, '120', '云霄县', '363300');
INSERT INTO `wfx_location_area` VALUES (1134, '120', '漳浦县', '363200');
INSERT INTO `wfx_location_area` VALUES (1135, '120', '诏安县', '363500');
INSERT INTO `wfx_location_area` VALUES (1136, '120', '长泰县', '363900');
INSERT INTO `wfx_location_area` VALUES (1137, '120', '东山县', '363400');
INSERT INTO `wfx_location_area` VALUES (1138, '120', '南靖县', '363600');
INSERT INTO `wfx_location_area` VALUES (1139, '120', '平和县', '363700');
INSERT INTO `wfx_location_area` VALUES (1140, '120', '华安县', '363800');
INSERT INTO `wfx_location_area` VALUES (1141, '120', '龙海市', '363100');
INSERT INTO `wfx_location_area` VALUES (1142, '121', '延平区', '353000');
INSERT INTO `wfx_location_area` VALUES (1143, '121', '顺昌县', '353200');
INSERT INTO `wfx_location_area` VALUES (1144, '121', '浦城县', '353400');
INSERT INTO `wfx_location_area` VALUES (1145, '121', '光泽县', '354100');
INSERT INTO `wfx_location_area` VALUES (1146, '121', '松溪县', '353500');
INSERT INTO `wfx_location_area` VALUES (1147, '121', '政和县', '353600');
INSERT INTO `wfx_location_area` VALUES (1148, '121', '邵武市', '354000');
INSERT INTO `wfx_location_area` VALUES (1149, '121', '武夷山市', '354300');
INSERT INTO `wfx_location_area` VALUES (1150, '121', '建瓯市', '353100');
INSERT INTO `wfx_location_area` VALUES (1151, '121', '建阳市', '354200');
INSERT INTO `wfx_location_area` VALUES (1152, '122', '新罗区', '364000');
INSERT INTO `wfx_location_area` VALUES (1153, '122', '长汀县', '366300');
INSERT INTO `wfx_location_area` VALUES (1154, '122', '永定县', '364100');
INSERT INTO `wfx_location_area` VALUES (1155, '122', '上杭县', '364200');
INSERT INTO `wfx_location_area` VALUES (1156, '122', '武平县', '364300');
INSERT INTO `wfx_location_area` VALUES (1157, '122', '连城县', '366200');
INSERT INTO `wfx_location_area` VALUES (1158, '122', '漳平市', '364400');
INSERT INTO `wfx_location_area` VALUES (1159, '123', '蕉城区', '352100');
INSERT INTO `wfx_location_area` VALUES (1160, '123', '霞浦县', '355100');
INSERT INTO `wfx_location_area` VALUES (1161, '123', '古田县', '352200');
INSERT INTO `wfx_location_area` VALUES (1162, '123', '屏南县', '352300');
INSERT INTO `wfx_location_area` VALUES (1163, '123', '寿宁县', '355500');
INSERT INTO `wfx_location_area` VALUES (1164, '123', '周宁县', '355400');
INSERT INTO `wfx_location_area` VALUES (1165, '123', '柘荣县', '355300');
INSERT INTO `wfx_location_area` VALUES (1166, '123', '福安市', '355000');
INSERT INTO `wfx_location_area` VALUES (1167, '123', '福鼎市', '355200');
INSERT INTO `wfx_location_area` VALUES (1168, '124', '东湖区', '330006');
INSERT INTO `wfx_location_area` VALUES (1169, '124', '西湖区', '330009');
INSERT INTO `wfx_location_area` VALUES (1170, '124', '青云谱区', '330001');
INSERT INTO `wfx_location_area` VALUES (1171, '124', '湾里区', '330004');
INSERT INTO `wfx_location_area` VALUES (1172, '124', '青山湖区', '330029');
INSERT INTO `wfx_location_area` VALUES (1173, '124', '南昌县', '330200');
INSERT INTO `wfx_location_area` VALUES (1174, '124', '新建县', '330100');
INSERT INTO `wfx_location_area` VALUES (1175, '124', '安义县', '330500');
INSERT INTO `wfx_location_area` VALUES (1176, '124', '进贤县', '331700');
INSERT INTO `wfx_location_area` VALUES (1177, '124', '经济技术开发区', '330013');
INSERT INTO `wfx_location_area` VALUES (1178, '124', '红谷滩新区', '330038');
INSERT INTO `wfx_location_area` VALUES (1179, '124', '高新技术产业开发区', '330029');
INSERT INTO `wfx_location_area` VALUES (1180, '124', '桑海经济技术开发区', '330115');
INSERT INTO `wfx_location_area` VALUES (1181, '124', '英雄经济开发区', '330200');
INSERT INTO `wfx_location_area` VALUES (1182, '125', '昌江区', '333000');
INSERT INTO `wfx_location_area` VALUES (1183, '125', '珠山区', '333000');
INSERT INTO `wfx_location_area` VALUES (1184, '125', '浮梁县', '333400');
INSERT INTO `wfx_location_area` VALUES (1185, '125', '乐平市', '333300');
INSERT INTO `wfx_location_area` VALUES (1186, '126', '安源区', '337000');
INSERT INTO `wfx_location_area` VALUES (1187, '126', '湘东区', '337016');
INSERT INTO `wfx_location_area` VALUES (1188, '126', '莲花县', '337100');
INSERT INTO `wfx_location_area` VALUES (1189, '126', '上栗县', '337009');
INSERT INTO `wfx_location_area` VALUES (1190, '126', '芦溪县', '337053');
INSERT INTO `wfx_location_area` VALUES (1191, '127', '庐山区', '332005');
INSERT INTO `wfx_location_area` VALUES (1192, '127', '浔阳区', '332000');
INSERT INTO `wfx_location_area` VALUES (1193, '127', '九江县', '332100');
INSERT INTO `wfx_location_area` VALUES (1194, '127', '武宁县', '332300');
INSERT INTO `wfx_location_area` VALUES (1195, '127', '修水县', '332400');
INSERT INTO `wfx_location_area` VALUES (1196, '127', '永修县', '330300');
INSERT INTO `wfx_location_area` VALUES (1197, '127', '德安县', '330400');
INSERT INTO `wfx_location_area` VALUES (1198, '127', '星子县', '332800');
INSERT INTO `wfx_location_area` VALUES (1199, '127', '都昌县', '332600');
INSERT INTO `wfx_location_area` VALUES (1200, '127', '湖口县', '332500');
INSERT INTO `wfx_location_area` VALUES (1201, '127', '彭泽县', '332700');
INSERT INTO `wfx_location_area` VALUES (1202, '127', '瑞昌市', '332200');
INSERT INTO `wfx_location_area` VALUES (1203, '128', '渝水区', '338025');
INSERT INTO `wfx_location_area` VALUES (1204, '128', '分宜县', '336600');
INSERT INTO `wfx_location_area` VALUES (1205, '129', '月湖区', '335000');
INSERT INTO `wfx_location_area` VALUES (1206, '129', '余江县', '335200');
INSERT INTO `wfx_location_area` VALUES (1207, '129', '贵溪市', '335400');
INSERT INTO `wfx_location_area` VALUES (1208, '130', '章贡区', '341000');
INSERT INTO `wfx_location_area` VALUES (1209, '130', '赣县', '341100');
INSERT INTO `wfx_location_area` VALUES (1210, '130', '信丰县', '341600');
INSERT INTO `wfx_location_area` VALUES (1211, '130', '大余县', '341500');
INSERT INTO `wfx_location_area` VALUES (1212, '130', '上犹县', '341200');
INSERT INTO `wfx_location_area` VALUES (1213, '130', '崇义县', '341300');
INSERT INTO `wfx_location_area` VALUES (1214, '130', '安远县', '342100');
INSERT INTO `wfx_location_area` VALUES (1215, '130', '龙南县', '341700');
INSERT INTO `wfx_location_area` VALUES (1216, '130', '定南县', '341900');
INSERT INTO `wfx_location_area` VALUES (1217, '130', '全南县', '341800');
INSERT INTO `wfx_location_area` VALUES (1218, '130', '宁都县', '342800');
INSERT INTO `wfx_location_area` VALUES (1219, '130', '于都县', '342300');
INSERT INTO `wfx_location_area` VALUES (1220, '130', '兴国县', '342400');
INSERT INTO `wfx_location_area` VALUES (1221, '130', '会昌县', '342600');
INSERT INTO `wfx_location_area` VALUES (1222, '130', '寻乌县', '342200');
INSERT INTO `wfx_location_area` VALUES (1223, '130', '石城县', '342700');
INSERT INTO `wfx_location_area` VALUES (1224, '130', '瑞金市', '342500');
INSERT INTO `wfx_location_area` VALUES (1225, '130', '南康市', '341400');
INSERT INTO `wfx_location_area` VALUES (1226, '131', '吉州区', '343000');
INSERT INTO `wfx_location_area` VALUES (1227, '131', '青原区', '343009');
INSERT INTO `wfx_location_area` VALUES (1228, '131', '吉安县', '343100');
INSERT INTO `wfx_location_area` VALUES (1229, '131', '吉水县', '331600');
INSERT INTO `wfx_location_area` VALUES (1230, '131', '峡江县', '331400');
INSERT INTO `wfx_location_area` VALUES (1231, '131', '新干县', '331300');
INSERT INTO `wfx_location_area` VALUES (1232, '131', '永丰县', '331500');
INSERT INTO `wfx_location_area` VALUES (1233, '131', '泰和县', '343700');
INSERT INTO `wfx_location_area` VALUES (1234, '131', '遂川县', '343900');
INSERT INTO `wfx_location_area` VALUES (1235, '131', '万安县', '343800');
INSERT INTO `wfx_location_area` VALUES (1236, '131', '安福县', '343200');
INSERT INTO `wfx_location_area` VALUES (1237, '131', '永新县', '343400');
INSERT INTO `wfx_location_area` VALUES (1238, '131', '井冈山市', '343600');
INSERT INTO `wfx_location_area` VALUES (1239, '132', '袁州区', '336000');
INSERT INTO `wfx_location_area` VALUES (1240, '132', '奉新县', '330700');
INSERT INTO `wfx_location_area` VALUES (1241, '132', '万载县', '336100');
INSERT INTO `wfx_location_area` VALUES (1242, '132', '上高县', '336400');
INSERT INTO `wfx_location_area` VALUES (1243, '132', '宜丰县', '336300');
INSERT INTO `wfx_location_area` VALUES (1244, '132', '靖安县', '330600');
INSERT INTO `wfx_location_area` VALUES (1245, '132', '铜鼓县', '336200');
INSERT INTO `wfx_location_area` VALUES (1246, '132', '丰城市', '331100');
INSERT INTO `wfx_location_area` VALUES (1247, '132', '樟树市', '331200');
INSERT INTO `wfx_location_area` VALUES (1248, '132', '高安市', '330800');
INSERT INTO `wfx_location_area` VALUES (1249, '133', '临川区', '344100');
INSERT INTO `wfx_location_area` VALUES (1250, '133', '南城县', '344700');
INSERT INTO `wfx_location_area` VALUES (1251, '133', '黎川县', '344600');
INSERT INTO `wfx_location_area` VALUES (1252, '133', '南丰县', '344500');
INSERT INTO `wfx_location_area` VALUES (1253, '133', '崇仁县', '344200');
INSERT INTO `wfx_location_area` VALUES (1254, '133', '乐安县', '344300');
INSERT INTO `wfx_location_area` VALUES (1255, '133', '宜黄县', '344400');
INSERT INTO `wfx_location_area` VALUES (1256, '133', '金溪县', '344800');
INSERT INTO `wfx_location_area` VALUES (1257, '133', '资溪县', '335300');
INSERT INTO `wfx_location_area` VALUES (1258, '133', '东乡县', '331800');
INSERT INTO `wfx_location_area` VALUES (1259, '133', '广昌县', '344900');
INSERT INTO `wfx_location_area` VALUES (1260, '134', '信州区', '334000');
INSERT INTO `wfx_location_area` VALUES (1261, '134', '上饶县', '334100');
INSERT INTO `wfx_location_area` VALUES (1262, '134', '广丰县', '334600');
INSERT INTO `wfx_location_area` VALUES (1263, '134', '玉山县', '334700');
INSERT INTO `wfx_location_area` VALUES (1264, '134', '铅山县', '334500');
INSERT INTO `wfx_location_area` VALUES (1265, '134', '横峰县', '334300');
INSERT INTO `wfx_location_area` VALUES (1266, '134', '弋阳县', '334400');
INSERT INTO `wfx_location_area` VALUES (1267, '134', '余干县', '335100');
INSERT INTO `wfx_location_area` VALUES (1268, '134', '鄱阳县', '333100');
INSERT INTO `wfx_location_area` VALUES (1269, '134', '万年县', '335500');
INSERT INTO `wfx_location_area` VALUES (1270, '134', '婺源县', '333200');
INSERT INTO `wfx_location_area` VALUES (1271, '134', '德兴市', '334200');
INSERT INTO `wfx_location_area` VALUES (1272, '135', '历下区', '250014');
INSERT INTO `wfx_location_area` VALUES (1273, '135', '市中区', '250001');
INSERT INTO `wfx_location_area` VALUES (1274, '135', '槐荫区', '250022');
INSERT INTO `wfx_location_area` VALUES (1275, '135', '天桥区', '250031');
INSERT INTO `wfx_location_area` VALUES (1276, '135', '历城区', '250100');
INSERT INTO `wfx_location_area` VALUES (1277, '135', '长清区', '250300');
INSERT INTO `wfx_location_area` VALUES (1278, '135', '平阴县', '250400');
INSERT INTO `wfx_location_area` VALUES (1279, '135', '济阳县', '251400');
INSERT INTO `wfx_location_area` VALUES (1280, '135', '商河县', '251600');
INSERT INTO `wfx_location_area` VALUES (1281, '135', '章丘市', '250200');
INSERT INTO `wfx_location_area` VALUES (1282, '135', '高新区', '250101');
INSERT INTO `wfx_location_area` VALUES (1283, '135', '经济开发区', '250300');
INSERT INTO `wfx_location_area` VALUES (1284, '136', '市南区', '266001');
INSERT INTO `wfx_location_area` VALUES (1285, '136', '市北区', '266011');
INSERT INTO `wfx_location_area` VALUES (1286, '136', '四方区', '266031');
INSERT INTO `wfx_location_area` VALUES (1287, '136', '黄岛区', '266500');
INSERT INTO `wfx_location_area` VALUES (1288, '136', '崂山区', '266100');
INSERT INTO `wfx_location_area` VALUES (1289, '136', '李沧区', '266021');
INSERT INTO `wfx_location_area` VALUES (1290, '136', '城阳区', '266041');
INSERT INTO `wfx_location_area` VALUES (1291, '136', '胶州市', '266300');
INSERT INTO `wfx_location_area` VALUES (1292, '136', '即墨市', '266200');
INSERT INTO `wfx_location_area` VALUES (1293, '136', '平度市', '266700');
INSERT INTO `wfx_location_area` VALUES (1294, '136', '胶南市', '266400');
INSERT INTO `wfx_location_area` VALUES (1295, '136', '莱西市', '266600');
INSERT INTO `wfx_location_area` VALUES (1296, '137', '淄川区', '255100');
INSERT INTO `wfx_location_area` VALUES (1297, '137', '张店区', '255022');
INSERT INTO `wfx_location_area` VALUES (1298, '137', '博山区', '255200');
INSERT INTO `wfx_location_area` VALUES (1299, '137', '临淄区', '255400');
INSERT INTO `wfx_location_area` VALUES (1300, '137', '周村区', '255300');
INSERT INTO `wfx_location_area` VALUES (1301, '137', '桓台县', '256400');
INSERT INTO `wfx_location_area` VALUES (1302, '137', '高青县', '256300');
INSERT INTO `wfx_location_area` VALUES (1303, '137', '沂源县', '256100');
INSERT INTO `wfx_location_area` VALUES (1304, '137', '高新区', '255086');
INSERT INTO `wfx_location_area` VALUES (1305, '138', '市中区', '277101');
INSERT INTO `wfx_location_area` VALUES (1306, '138', '薛城区', '277000');
INSERT INTO `wfx_location_area` VALUES (1307, '138', '峄城区', '277300');
INSERT INTO `wfx_location_area` VALUES (1308, '138', '台儿庄区', '277400');
INSERT INTO `wfx_location_area` VALUES (1309, '138', '山亭区', '277200');
INSERT INTO `wfx_location_area` VALUES (1310, '138', '滕州市', '277500');
INSERT INTO `wfx_location_area` VALUES (1311, '139', '东营区', '257029');
INSERT INTO `wfx_location_area` VALUES (1312, '139', '河口区', '257200');
INSERT INTO `wfx_location_area` VALUES (1313, '139', '垦利县', '257500');
INSERT INTO `wfx_location_area` VALUES (1314, '139', '利津县', '257400');
INSERT INTO `wfx_location_area` VALUES (1315, '139', '广饶县', '257300');
INSERT INTO `wfx_location_area` VALUES (1316, '140', '芝罘区', '264001');
INSERT INTO `wfx_location_area` VALUES (1317, '140', '福山区', '265500');
INSERT INTO `wfx_location_area` VALUES (1318, '140', '牟平区', '264100');
INSERT INTO `wfx_location_area` VALUES (1319, '140', '莱山区', '264600');
INSERT INTO `wfx_location_area` VALUES (1320, '140', '长岛县', '265800');
INSERT INTO `wfx_location_area` VALUES (1321, '140', '龙口市', '265700');
INSERT INTO `wfx_location_area` VALUES (1322, '140', '莱阳市', '265200');
INSERT INTO `wfx_location_area` VALUES (1323, '140', '莱州市', '261400');
INSERT INTO `wfx_location_area` VALUES (1324, '140', '蓬莱市', '265600');
INSERT INTO `wfx_location_area` VALUES (1325, '140', '招远市', '265400');
INSERT INTO `wfx_location_area` VALUES (1326, '140', '栖霞市', '265300');
INSERT INTO `wfx_location_area` VALUES (1327, '140', '海阳市', '265100');
INSERT INTO `wfx_location_area` VALUES (1328, '140', '开发区', '264006');
INSERT INTO `wfx_location_area` VALUES (1329, '141', '潍城区', '261021');
INSERT INTO `wfx_location_area` VALUES (1330, '141', '寒亭区', '261100');
INSERT INTO `wfx_location_area` VALUES (1331, '141', '坊子区', '261200');
INSERT INTO `wfx_location_area` VALUES (1332, '141', '奎文区', '261031');
INSERT INTO `wfx_location_area` VALUES (1333, '141', '临朐县', '262600');
INSERT INTO `wfx_location_area` VALUES (1334, '141', '昌乐县', '262400');
INSERT INTO `wfx_location_area` VALUES (1335, '141', '青州市', '262500');
INSERT INTO `wfx_location_area` VALUES (1336, '141', '诸城市', '262200');
INSERT INTO `wfx_location_area` VALUES (1337, '141', '寿光市', '262700');
INSERT INTO `wfx_location_area` VALUES (1338, '141', '安丘市', '262100');
INSERT INTO `wfx_location_area` VALUES (1339, '141', '高密市', '261500');
INSERT INTO `wfx_location_area` VALUES (1340, '141', '昌邑市', '261300');
INSERT INTO `wfx_location_area` VALUES (1341, '141', '经济开发区', '261061');
INSERT INTO `wfx_location_area` VALUES (1342, '141', '滨海经济开发区', '262737');
INSERT INTO `wfx_location_area` VALUES (1343, '141', '高新技术开发区', '261061');
INSERT INTO `wfx_location_area` VALUES (1344, '141', '出口加工区', '261205');
INSERT INTO `wfx_location_area` VALUES (1345, '142', '市中区', '272133');
INSERT INTO `wfx_location_area` VALUES (1346, '142', '任城区', '272113');
INSERT INTO `wfx_location_area` VALUES (1347, '142', '微山县', '277600');
INSERT INTO `wfx_location_area` VALUES (1348, '142', '鱼台县', '272300');
INSERT INTO `wfx_location_area` VALUES (1349, '142', '金乡县', '272200');
INSERT INTO `wfx_location_area` VALUES (1350, '142', '嘉祥县', '272400');
INSERT INTO `wfx_location_area` VALUES (1351, '142', '汶上县', '272501');
INSERT INTO `wfx_location_area` VALUES (1352, '142', '泗水县', '273200');
INSERT INTO `wfx_location_area` VALUES (1353, '142', '梁山县', '272600');
INSERT INTO `wfx_location_area` VALUES (1354, '142', '曲阜市', '273100');
INSERT INTO `wfx_location_area` VALUES (1355, '142', '兖州市', '272000');
INSERT INTO `wfx_location_area` VALUES (1356, '142', '邹城市', '273500');
INSERT INTO `wfx_location_area` VALUES (1357, '143', '泰山区', '271000');
INSERT INTO `wfx_location_area` VALUES (1358, '143', '岱岳区', '271000');
INSERT INTO `wfx_location_area` VALUES (1359, '143', '宁阳县', '271400');
INSERT INTO `wfx_location_area` VALUES (1360, '143', '东平县', '271500');
INSERT INTO `wfx_location_area` VALUES (1361, '143', '新泰市', '271200');
INSERT INTO `wfx_location_area` VALUES (1362, '143', '肥城市', '271600');
INSERT INTO `wfx_location_area` VALUES (1363, '144', '环翠区', '264200');
INSERT INTO `wfx_location_area` VALUES (1364, '144', '文登市', '264400');
INSERT INTO `wfx_location_area` VALUES (1365, '144', '荣成市', '264300');
INSERT INTO `wfx_location_area` VALUES (1366, '144', '乳山市', '264500');
INSERT INTO `wfx_location_area` VALUES (1367, '144', '经济技术开发区', '264205');
INSERT INTO `wfx_location_area` VALUES (1368, '144', '高技术开发区', '264209');
INSERT INTO `wfx_location_area` VALUES (1369, '145', '东港区', '276800');
INSERT INTO `wfx_location_area` VALUES (1370, '145', '岚山区', '276808');
INSERT INTO `wfx_location_area` VALUES (1371, '145', '五莲县', '272300');
INSERT INTO `wfx_location_area` VALUES (1372, '145', '莒县', '266500');
INSERT INTO `wfx_location_area` VALUES (1373, '146', '莱城区', '271100');
INSERT INTO `wfx_location_area` VALUES (1374, '146', '钢城区', '271100');
INSERT INTO `wfx_location_area` VALUES (1375, '147', '兰山区', '276002');
INSERT INTO `wfx_location_area` VALUES (1376, '147', '罗庄区', '276022');
INSERT INTO `wfx_location_area` VALUES (1377, '147', '河东区', '276034');
INSERT INTO `wfx_location_area` VALUES (1378, '147', '沂南县', '276300');
INSERT INTO `wfx_location_area` VALUES (1379, '147', '郯城县', '276100');
INSERT INTO `wfx_location_area` VALUES (1380, '147', '沂水县', '276400');
INSERT INTO `wfx_location_area` VALUES (1381, '147', '苍山县', '277700');
INSERT INTO `wfx_location_area` VALUES (1382, '147', '费县', '273400');
INSERT INTO `wfx_location_area` VALUES (1383, '147', '平邑县', '273300');
INSERT INTO `wfx_location_area` VALUES (1384, '147', '莒南县', '276600');
INSERT INTO `wfx_location_area` VALUES (1385, '147', '蒙阴县', '276200');
INSERT INTO `wfx_location_area` VALUES (1386, '147', '临沭县', '276700');
INSERT INTO `wfx_location_area` VALUES (1387, '148', '德城区', '253011');
INSERT INTO `wfx_location_area` VALUES (1388, '148', '陵县', '253500');
INSERT INTO `wfx_location_area` VALUES (1389, '148', '宁津县', '253400');
INSERT INTO `wfx_location_area` VALUES (1390, '148', '庆云县', '253700');
INSERT INTO `wfx_location_area` VALUES (1391, '148', '临邑县', '251500');
INSERT INTO `wfx_location_area` VALUES (1392, '148', '齐河县', '251100');
INSERT INTO `wfx_location_area` VALUES (1393, '148', '平原县', '253100');
INSERT INTO `wfx_location_area` VALUES (1394, '148', '夏津县', '253200');
INSERT INTO `wfx_location_area` VALUES (1395, '148', '武城县', '253300');
INSERT INTO `wfx_location_area` VALUES (1396, '148', '乐陵市', '253600');
INSERT INTO `wfx_location_area` VALUES (1397, '148', '禹城市', '251200');
INSERT INTO `wfx_location_area` VALUES (1398, '149', '东昌府区', '252000');
INSERT INTO `wfx_location_area` VALUES (1399, '149', '阳谷县', '252300');
INSERT INTO `wfx_location_area` VALUES (1400, '149', '莘县', '252400');
INSERT INTO `wfx_location_area` VALUES (1401, '149', '茌平县', '252100');
INSERT INTO `wfx_location_area` VALUES (1402, '149', '东阿县', '252200');
INSERT INTO `wfx_location_area` VALUES (1403, '149', '冠县', '252500');
INSERT INTO `wfx_location_area` VALUES (1404, '149', '高唐县', '252800');
INSERT INTO `wfx_location_area` VALUES (1405, '149', '临清市', '252600');
INSERT INTO `wfx_location_area` VALUES (1406, '150', '滨城区', '256613');
INSERT INTO `wfx_location_area` VALUES (1407, '150', '惠民县', '251700');
INSERT INTO `wfx_location_area` VALUES (1408, '150', '阳信县', '251800');
INSERT INTO `wfx_location_area` VALUES (1409, '150', '无棣县', '251900');
INSERT INTO `wfx_location_area` VALUES (1410, '150', '沾化县', '256800');
INSERT INTO `wfx_location_area` VALUES (1411, '150', '博兴县', '256500');
INSERT INTO `wfx_location_area` VALUES (1412, '150', '邹平县', '256200');
INSERT INTO `wfx_location_area` VALUES (1413, '151', '牡丹区', '274009');
INSERT INTO `wfx_location_area` VALUES (1414, '151', '曹县', '274400');
INSERT INTO `wfx_location_area` VALUES (1415, '151', '单县', '274300');
INSERT INTO `wfx_location_area` VALUES (1416, '151', '成武县', '274200');
INSERT INTO `wfx_location_area` VALUES (1417, '151', '巨野县', '274900');
INSERT INTO `wfx_location_area` VALUES (1418, '151', '郓城县', '274700');
INSERT INTO `wfx_location_area` VALUES (1419, '151', '鄄城县', '274600');
INSERT INTO `wfx_location_area` VALUES (1420, '151', '定陶县', '274100');
INSERT INTO `wfx_location_area` VALUES (1421, '151', '东明县', '274500');
INSERT INTO `wfx_location_area` VALUES (1422, '152', '中原区', '450007');
INSERT INTO `wfx_location_area` VALUES (1423, '152', '二七区', '450052');
INSERT INTO `wfx_location_area` VALUES (1424, '152', '管城回族区', '450000');
INSERT INTO `wfx_location_area` VALUES (1425, '152', '金水区', '450003');
INSERT INTO `wfx_location_area` VALUES (1426, '152', '上街区', '450041');
INSERT INTO `wfx_location_area` VALUES (1427, '152', '中牟县', '451450');
INSERT INTO `wfx_location_area` VALUES (1428, '152', '巩义市', '451200');
INSERT INTO `wfx_location_area` VALUES (1429, '152', '荥阳市', '450100');
INSERT INTO `wfx_location_area` VALUES (1430, '152', '新密市', '452300');
INSERT INTO `wfx_location_area` VALUES (1431, '152', '新郑市', '451100');
INSERT INTO `wfx_location_area` VALUES (1432, '152', '登封市', '452470');
INSERT INTO `wfx_location_area` VALUES (1433, '152', '高新技术开发区', '450001');
INSERT INTO `wfx_location_area` VALUES (1434, '152', '惠济区', '450053');
INSERT INTO `wfx_location_area` VALUES (1435, '152', '经济技术开发区', '450016');
INSERT INTO `wfx_location_area` VALUES (1436, '152', '郑东新区', '450008');
INSERT INTO `wfx_location_area` VALUES (1437, '152', '出口加工区', '450016');
INSERT INTO `wfx_location_area` VALUES (1438, '153', '龙亭区', '475100');
INSERT INTO `wfx_location_area` VALUES (1439, '153', '顺河回族区', '475000');
INSERT INTO `wfx_location_area` VALUES (1440, '153', '鼓楼区', '475000');
INSERT INTO `wfx_location_area` VALUES (1441, '153', '杞县', '475200');
INSERT INTO `wfx_location_area` VALUES (1442, '153', '通许县', '475400');
INSERT INTO `wfx_location_area` VALUES (1443, '153', '尉氏县', '475500');
INSERT INTO `wfx_location_area` VALUES (1444, '153', '开封县', '475100');
INSERT INTO `wfx_location_area` VALUES (1445, '153', '兰考县', '475300');
INSERT INTO `wfx_location_area` VALUES (1446, '153', '金明区', '475003');
INSERT INTO `wfx_location_area` VALUES (1447, '153', '禹王台区', '475003');
INSERT INTO `wfx_location_area` VALUES (1448, '154', '老城区', '471002');
INSERT INTO `wfx_location_area` VALUES (1449, '154', '西工区', '471000');
INSERT INTO `wfx_location_area` VALUES (1450, '154', '瀍河回族区', '471002');
INSERT INTO `wfx_location_area` VALUES (1451, '154', '涧西区', '471003');
INSERT INTO `wfx_location_area` VALUES (1452, '154', '吉利区', '471012');
INSERT INTO `wfx_location_area` VALUES (1453, '154', '洛龙区', '471000');
INSERT INTO `wfx_location_area` VALUES (1454, '154', '孟津县', '471100');
INSERT INTO `wfx_location_area` VALUES (1455, '154', '新安县', '471800');
INSERT INTO `wfx_location_area` VALUES (1456, '154', '栾川县', '471500');
INSERT INTO `wfx_location_area` VALUES (1457, '154', '嵩县', '471400');
INSERT INTO `wfx_location_area` VALUES (1458, '154', '汝阳县', '471200');
INSERT INTO `wfx_location_area` VALUES (1459, '154', '宜阳县', '471600');
INSERT INTO `wfx_location_area` VALUES (1460, '154', '洛宁县', '471700');
INSERT INTO `wfx_location_area` VALUES (1461, '154', '伊川县', '471300');
INSERT INTO `wfx_location_area` VALUES (1462, '154', '偃师市', '471900');
INSERT INTO `wfx_location_area` VALUES (1463, '154', '高新技术开发区', '471003');
INSERT INTO `wfx_location_area` VALUES (1464, '154', '经济技术开发区', '471023');
INSERT INTO `wfx_location_area` VALUES (1465, '155', '新华区', '467002');
INSERT INTO `wfx_location_area` VALUES (1466, '155', '卫东区', '467021');
INSERT INTO `wfx_location_area` VALUES (1467, '155', '石龙区', '467045');
INSERT INTO `wfx_location_area` VALUES (1468, '155', '湛河区', '467000');
INSERT INTO `wfx_location_area` VALUES (1469, '155', '宝丰县', '467400');
INSERT INTO `wfx_location_area` VALUES (1470, '155', '叶县', '467200');
INSERT INTO `wfx_location_area` VALUES (1471, '155', '鲁山县', '467300');
INSERT INTO `wfx_location_area` VALUES (1472, '155', '郏县', '467100');
INSERT INTO `wfx_location_area` VALUES (1473, '155', '舞钢市', '462500');
INSERT INTO `wfx_location_area` VALUES (1474, '155', '汝州市', '467500');
INSERT INTO `wfx_location_area` VALUES (1475, '156', '文峰区', '455000');
INSERT INTO `wfx_location_area` VALUES (1476, '156', '北关区', '455001');
INSERT INTO `wfx_location_area` VALUES (1477, '156', '殷都区', '455004');
INSERT INTO `wfx_location_area` VALUES (1478, '156', '龙安区', '455001');
INSERT INTO `wfx_location_area` VALUES (1479, '156', '安阳县', '455000');
INSERT INTO `wfx_location_area` VALUES (1480, '156', '汤阴县', '456150');
INSERT INTO `wfx_location_area` VALUES (1481, '156', '滑县', '456400');
INSERT INTO `wfx_location_area` VALUES (1482, '156', '内黄县', '456350');
INSERT INTO `wfx_location_area` VALUES (1483, '156', '林州市', '456500');
INSERT INTO `wfx_location_area` VALUES (1484, '157', '鹤山区', '458010');
INSERT INTO `wfx_location_area` VALUES (1485, '157', '山城区', '458000');
INSERT INTO `wfx_location_area` VALUES (1486, '157', '淇滨区', '458000');
INSERT INTO `wfx_location_area` VALUES (1487, '157', '浚县', '456250');
INSERT INTO `wfx_location_area` VALUES (1488, '157', '淇县', '456750');
INSERT INTO `wfx_location_area` VALUES (1489, '158', '红旗区', '453000');
INSERT INTO `wfx_location_area` VALUES (1490, '158', '卫滨区', '453000');
INSERT INTO `wfx_location_area` VALUES (1491, '158', '凤泉区', '453011');
INSERT INTO `wfx_location_area` VALUES (1492, '158', '牧野区', '453002');
INSERT INTO `wfx_location_area` VALUES (1493, '158', '新乡县', '453700');
INSERT INTO `wfx_location_area` VALUES (1494, '158', '获嘉县', '453800');
INSERT INTO `wfx_location_area` VALUES (1495, '158', '原阳县', '453500');
INSERT INTO `wfx_location_area` VALUES (1496, '158', '延津县', '453200');
INSERT INTO `wfx_location_area` VALUES (1497, '158', '封丘县', '453300');
INSERT INTO `wfx_location_area` VALUES (1498, '158', '长垣县', '453400');
INSERT INTO `wfx_location_area` VALUES (1499, '158', '卫辉市', '453100');
INSERT INTO `wfx_location_area` VALUES (1500, '158', '辉县市', '453600');
INSERT INTO `wfx_location_area` VALUES (1501, '159', '解放区', '454000');
INSERT INTO `wfx_location_area` VALUES (1502, '159', '中站区', '454191');
INSERT INTO `wfx_location_area` VALUES (1503, '159', '马村区', '454171');
INSERT INTO `wfx_location_area` VALUES (1504, '159', '山阳区', '454002');
INSERT INTO `wfx_location_area` VALUES (1505, '159', '修武县', '454350');
INSERT INTO `wfx_location_area` VALUES (1506, '159', '博爱县', '454450');
INSERT INTO `wfx_location_area` VALUES (1507, '159', '武陟县', '454950');
INSERT INTO `wfx_location_area` VALUES (1508, '159', '温县', '454850');
INSERT INTO `wfx_location_area` VALUES (1509, '159', '沁阳市', '454550');
INSERT INTO `wfx_location_area` VALUES (1510, '159', '孟州市', '454750');
INSERT INTO `wfx_location_area` VALUES (1511, '160', '华龙区', '457001');
INSERT INTO `wfx_location_area` VALUES (1512, '160', '清丰县', '457300');
INSERT INTO `wfx_location_area` VALUES (1513, '160', '南乐县', '457400');
INSERT INTO `wfx_location_area` VALUES (1514, '160', '范县', '457500');
INSERT INTO `wfx_location_area` VALUES (1515, '160', '台前县', '457600');
INSERT INTO `wfx_location_area` VALUES (1516, '160', '濮阳县', '457100');
INSERT INTO `wfx_location_area` VALUES (1517, '161', '魏都区', '461000');
INSERT INTO `wfx_location_area` VALUES (1518, '161', '许昌县', '461100');
INSERT INTO `wfx_location_area` VALUES (1519, '161', '鄢陵县', '461200');
INSERT INTO `wfx_location_area` VALUES (1520, '161', '襄城县', '461700');
INSERT INTO `wfx_location_area` VALUES (1521, '161', '禹州市', '461670');
INSERT INTO `wfx_location_area` VALUES (1522, '161', '长葛市', '461500');
INSERT INTO `wfx_location_area` VALUES (1523, '162', '源汇区', '462000');
INSERT INTO `wfx_location_area` VALUES (1524, '162', '郾城区', '462300');
INSERT INTO `wfx_location_area` VALUES (1525, '162', '召陵区', '462300');
INSERT INTO `wfx_location_area` VALUES (1526, '162', '舞阳县', '462400');
INSERT INTO `wfx_location_area` VALUES (1527, '162', '临颍县', '462600');
INSERT INTO `wfx_location_area` VALUES (1528, '163', '湖滨区', '472000');
INSERT INTO `wfx_location_area` VALUES (1529, '163', '渑池县', '472400');
INSERT INTO `wfx_location_area` VALUES (1530, '163', '陕县', '472100');
INSERT INTO `wfx_location_area` VALUES (1531, '163', '卢氏县', '472200');
INSERT INTO `wfx_location_area` VALUES (1532, '163', '义马市', '472300');
INSERT INTO `wfx_location_area` VALUES (1533, '163', '灵宝市', '472500');
INSERT INTO `wfx_location_area` VALUES (1534, '164', '宛城区', '473001');
INSERT INTO `wfx_location_area` VALUES (1535, '164', '卧龙区', '473003');
INSERT INTO `wfx_location_area` VALUES (1536, '164', '南召县', '474650');
INSERT INTO `wfx_location_area` VALUES (1537, '164', '方城县', '473200');
INSERT INTO `wfx_location_area` VALUES (1538, '164', '西峡县', '474550');
INSERT INTO `wfx_location_area` VALUES (1539, '164', '镇平县', '474250');
INSERT INTO `wfx_location_area` VALUES (1540, '164', '内乡县', '474350');
INSERT INTO `wfx_location_area` VALUES (1541, '164', '淅川县', '474450');
INSERT INTO `wfx_location_area` VALUES (1542, '164', '社旗县', '473300');
INSERT INTO `wfx_location_area` VALUES (1543, '164', '唐河县', '473400');
INSERT INTO `wfx_location_area` VALUES (1544, '164', '新野县', '473500');
INSERT INTO `wfx_location_area` VALUES (1545, '164', '桐柏县', '474750');
INSERT INTO `wfx_location_area` VALUES (1546, '164', '邓州市', '474150');
INSERT INTO `wfx_location_area` VALUES (1547, '165', '梁园区', '476000');
INSERT INTO `wfx_location_area` VALUES (1548, '165', '睢阳区', '476100');
INSERT INTO `wfx_location_area` VALUES (1549, '165', '民权县', '476800');
INSERT INTO `wfx_location_area` VALUES (1550, '165', '睢县', '476900');
INSERT INTO `wfx_location_area` VALUES (1551, '165', '宁陵县', '476700');
INSERT INTO `wfx_location_area` VALUES (1552, '165', '柘城县', '476200');
INSERT INTO `wfx_location_area` VALUES (1553, '165', '虞城县', '476300');
INSERT INTO `wfx_location_area` VALUES (1554, '165', '夏邑县', '476400');
INSERT INTO `wfx_location_area` VALUES (1555, '165', '永城市', '476600');
INSERT INTO `wfx_location_area` VALUES (1556, '166', '浉河区', '464000');
INSERT INTO `wfx_location_area` VALUES (1557, '166', '平桥区', '464100');
INSERT INTO `wfx_location_area` VALUES (1558, '166', '罗山县', '464200');
INSERT INTO `wfx_location_area` VALUES (1559, '166', '光山县', '465450');
INSERT INTO `wfx_location_area` VALUES (1560, '166', '新县', '465550');
INSERT INTO `wfx_location_area` VALUES (1561, '166', '商城县', '465350');
INSERT INTO `wfx_location_area` VALUES (1562, '166', '固始县', '465250');
INSERT INTO `wfx_location_area` VALUES (1563, '166', '潢川县', '465150');
INSERT INTO `wfx_location_area` VALUES (1564, '166', '淮滨县', '464400');
INSERT INTO `wfx_location_area` VALUES (1565, '166', '息县', '464300');
INSERT INTO `wfx_location_area` VALUES (1566, '167', '川汇区', '466000');
INSERT INTO `wfx_location_area` VALUES (1567, '167', '扶沟县', '461300');
INSERT INTO `wfx_location_area` VALUES (1568, '167', '西华县', '466600');
INSERT INTO `wfx_location_area` VALUES (1569, '167', '商水县', '466100');
INSERT INTO `wfx_location_area` VALUES (1570, '167', '沈丘县', '466300');
INSERT INTO `wfx_location_area` VALUES (1571, '167', '郸城县', '477150');
INSERT INTO `wfx_location_area` VALUES (1572, '167', '淮阳县', '466700');
INSERT INTO `wfx_location_area` VALUES (1573, '167', '太康县', '461400');
INSERT INTO `wfx_location_area` VALUES (1574, '167', '鹿邑县', '477200');
INSERT INTO `wfx_location_area` VALUES (1575, '167', '项城市', '466200');
INSERT INTO `wfx_location_area` VALUES (1576, '168', '驿城区', '463000');
INSERT INTO `wfx_location_area` VALUES (1577, '168', '西平县', '463900');
INSERT INTO `wfx_location_area` VALUES (1578, '168', '上蔡县', '463800');
INSERT INTO `wfx_location_area` VALUES (1579, '168', '平舆县', '463400');
INSERT INTO `wfx_location_area` VALUES (1580, '168', '正阳县', '463600');
INSERT INTO `wfx_location_area` VALUES (1581, '168', '确山县', '463200');
INSERT INTO `wfx_location_area` VALUES (1582, '168', '泌阳县', '463700');
INSERT INTO `wfx_location_area` VALUES (1583, '168', '汝南县', '463300');
INSERT INTO `wfx_location_area` VALUES (1584, '168', '遂平县', '463100');
INSERT INTO `wfx_location_area` VALUES (1585, '168', '新蔡县', '463500');
INSERT INTO `wfx_location_area` VALUES (1586, '169', '济源市', '454650');
INSERT INTO `wfx_location_area` VALUES (1587, '170', '江岸区', '430014');
INSERT INTO `wfx_location_area` VALUES (1588, '170', '江汉区', '430021');
INSERT INTO `wfx_location_area` VALUES (1589, '170', '硚口区', '430033');
INSERT INTO `wfx_location_area` VALUES (1590, '170', '汉阳区', '430050');
INSERT INTO `wfx_location_area` VALUES (1591, '170', '武昌区', '430061');
INSERT INTO `wfx_location_area` VALUES (1592, '170', '青山区', '430080');
INSERT INTO `wfx_location_area` VALUES (1593, '170', '洪山区', '430070');
INSERT INTO `wfx_location_area` VALUES (1594, '170', '东西湖区', '430040');
INSERT INTO `wfx_location_area` VALUES (1595, '170', '汉南区', '430090');
INSERT INTO `wfx_location_area` VALUES (1596, '170', '蔡甸区', '430100');
INSERT INTO `wfx_location_area` VALUES (1597, '170', '江夏区', '430200');
INSERT INTO `wfx_location_area` VALUES (1598, '170', '黄陂区', '432200');
INSERT INTO `wfx_location_area` VALUES (1599, '170', '新洲区', '431400');
INSERT INTO `wfx_location_area` VALUES (1600, '171', '黄石港区', '435000');
INSERT INTO `wfx_location_area` VALUES (1601, '171', '西塞山区', '435001');
INSERT INTO `wfx_location_area` VALUES (1602, '171', '下陆区', '435005');
INSERT INTO `wfx_location_area` VALUES (1603, '171', '铁山区', '435006');
INSERT INTO `wfx_location_area` VALUES (1604, '171', '阳新县', '435200');
INSERT INTO `wfx_location_area` VALUES (1605, '171', '大冶市', '435100');
INSERT INTO `wfx_location_area` VALUES (1606, '172', '茅箭区', '442012');
INSERT INTO `wfx_location_area` VALUES (1607, '172', '张湾区', '442001');
INSERT INTO `wfx_location_area` VALUES (1608, '172', '郧县', '442500');
INSERT INTO `wfx_location_area` VALUES (1609, '172', '郧西县', '442600');
INSERT INTO `wfx_location_area` VALUES (1610, '172', '竹山县', '442200');
INSERT INTO `wfx_location_area` VALUES (1611, '172', '竹溪县', '442300');
INSERT INTO `wfx_location_area` VALUES (1612, '172', '房县', '442100');
INSERT INTO `wfx_location_area` VALUES (1613, '172', '丹江口市', '442700');
INSERT INTO `wfx_location_area` VALUES (1614, '173', '西陵区', '443000');
INSERT INTO `wfx_location_area` VALUES (1615, '173', '伍家岗区', '443001');
INSERT INTO `wfx_location_area` VALUES (1616, '173', '点军区', '443006');
INSERT INTO `wfx_location_area` VALUES (1617, '173', '虢亭区', '443007');
INSERT INTO `wfx_location_area` VALUES (1618, '173', '夷陵区', '443100');
INSERT INTO `wfx_location_area` VALUES (1619, '173', '远安县', '444200');
INSERT INTO `wfx_location_area` VALUES (1620, '173', '兴山县', '443711');
INSERT INTO `wfx_location_area` VALUES (1621, '173', '秭归县', '443600');
INSERT INTO `wfx_location_area` VALUES (1622, '173', '长阳土家族自治县', '443500');
INSERT INTO `wfx_location_area` VALUES (1623, '173', '五峰土家族自治县', '443400');
INSERT INTO `wfx_location_area` VALUES (1624, '173', '宜都市', '443300');
INSERT INTO `wfx_location_area` VALUES (1625, '173', '当阳市', '444100');
INSERT INTO `wfx_location_area` VALUES (1626, '173', '枝江市', '443200');
INSERT INTO `wfx_location_area` VALUES (1627, '173', '经济技术开发区', '443003');
INSERT INTO `wfx_location_area` VALUES (1628, '174', '襄城区', '441021');
INSERT INTO `wfx_location_area` VALUES (1629, '174', '樊城区', '441001');
INSERT INTO `wfx_location_area` VALUES (1630, '174', '襄阳区', '441100');
INSERT INTO `wfx_location_area` VALUES (1631, '174', '南漳县', '441500');
INSERT INTO `wfx_location_area` VALUES (1632, '174', '谷城县', '441700');
INSERT INTO `wfx_location_area` VALUES (1633, '174', '保康县', '441600');
INSERT INTO `wfx_location_area` VALUES (1634, '174', '老河口市', '441800');
INSERT INTO `wfx_location_area` VALUES (1635, '174', '枣阳市', '441200');
INSERT INTO `wfx_location_area` VALUES (1636, '174', '宜城市', '441400');
INSERT INTO `wfx_location_area` VALUES (1637, '175', '梁子湖区', '436064');
INSERT INTO `wfx_location_area` VALUES (1638, '175', '华容区', '436030');
INSERT INTO `wfx_location_area` VALUES (1639, '175', '鄂城区', '436000');
INSERT INTO `wfx_location_area` VALUES (1640, '176', '东宝区', '448004');
INSERT INTO `wfx_location_area` VALUES (1641, '176', '掇刀区', '448124');
INSERT INTO `wfx_location_area` VALUES (1642, '176', '京山县', '431800');
INSERT INTO `wfx_location_area` VALUES (1643, '176', '沙洋县', '448200');
INSERT INTO `wfx_location_area` VALUES (1644, '176', '钟祥市', '431900');
INSERT INTO `wfx_location_area` VALUES (1645, '177', '孝南区', '432100');
INSERT INTO `wfx_location_area` VALUES (1646, '177', '孝昌县', '432900');
INSERT INTO `wfx_location_area` VALUES (1647, '177', '大悟县', '432800');
INSERT INTO `wfx_location_area` VALUES (1648, '177', '云梦县', '432500');
INSERT INTO `wfx_location_area` VALUES (1649, '177', '应城市', '432400');
INSERT INTO `wfx_location_area` VALUES (1650, '177', '安陆市', '432600');
INSERT INTO `wfx_location_area` VALUES (1651, '177', '汉川市', '432300');
INSERT INTO `wfx_location_area` VALUES (1652, '178', '沙市区', '434000');
INSERT INTO `wfx_location_area` VALUES (1653, '178', '荆州区', '434020');
INSERT INTO `wfx_location_area` VALUES (1654, '178', '公安县', '434300');
INSERT INTO `wfx_location_area` VALUES (1655, '178', '监利县', '433300');
INSERT INTO `wfx_location_area` VALUES (1656, '178', '江陵县', '434101');
INSERT INTO `wfx_location_area` VALUES (1657, '178', '石首市', '434400');
INSERT INTO `wfx_location_area` VALUES (1658, '178', '洪湖市', '433200');
INSERT INTO `wfx_location_area` VALUES (1659, '178', '松滋市', '434200');
INSERT INTO `wfx_location_area` VALUES (1660, '179', '黄州区', '438000');
INSERT INTO `wfx_location_area` VALUES (1661, '179', '团风县', '438000');
INSERT INTO `wfx_location_area` VALUES (1662, '179', '红安县', '438401');
INSERT INTO `wfx_location_area` VALUES (1663, '179', '罗田县', '438600');
INSERT INTO `wfx_location_area` VALUES (1664, '179', '英山县', '438700');
INSERT INTO `wfx_location_area` VALUES (1665, '179', '浠水县', '438200');
INSERT INTO `wfx_location_area` VALUES (1666, '179', '蕲春县', '435300');
INSERT INTO `wfx_location_area` VALUES (1667, '179', '黄梅县', '435500');
INSERT INTO `wfx_location_area` VALUES (1668, '179', '麻城市', '438300');
INSERT INTO `wfx_location_area` VALUES (1669, '179', '武穴市', '435400');
INSERT INTO `wfx_location_area` VALUES (1670, '180', '咸安区', '437000');
INSERT INTO `wfx_location_area` VALUES (1671, '180', '嘉鱼县', '437200');
INSERT INTO `wfx_location_area` VALUES (1672, '180', '通城县', '437400');
INSERT INTO `wfx_location_area` VALUES (1673, '180', '崇阳县', '437500');
INSERT INTO `wfx_location_area` VALUES (1674, '180', '通山县', '437600');
INSERT INTO `wfx_location_area` VALUES (1675, '180', '赤壁市', '437300');
INSERT INTO `wfx_location_area` VALUES (1676, '181', '曾都区', '441300');
INSERT INTO `wfx_location_area` VALUES (1677, '181', '广水市', '432700');
INSERT INTO `wfx_location_area` VALUES (1678, '182', '恩施市', '445000');
INSERT INTO `wfx_location_area` VALUES (1679, '182', '利川市', '445400');
INSERT INTO `wfx_location_area` VALUES (1680, '182', '建始县', '445300');
INSERT INTO `wfx_location_area` VALUES (1681, '182', '巴东县', '444300');
INSERT INTO `wfx_location_area` VALUES (1682, '182', '宣恩县', '445500');
INSERT INTO `wfx_location_area` VALUES (1683, '182', '咸丰县', '445600');
INSERT INTO `wfx_location_area` VALUES (1684, '182', '来凤县', '445700');
INSERT INTO `wfx_location_area` VALUES (1685, '182', '鹤峰县', '445800');
INSERT INTO `wfx_location_area` VALUES (1686, '183', '仙桃市', '433000');
INSERT INTO `wfx_location_area` VALUES (1687, '183', '潜江市', '433100');
INSERT INTO `wfx_location_area` VALUES (1688, '183', '天门市', '431700');
INSERT INTO `wfx_location_area` VALUES (1689, '183', '神农架林区', '442400');
INSERT INTO `wfx_location_area` VALUES (1690, '184', '芙蓉区', '410011');
INSERT INTO `wfx_location_area` VALUES (1691, '184', '天心区', '410011');
INSERT INTO `wfx_location_area` VALUES (1692, '184', '岳麓区', '410006');
INSERT INTO `wfx_location_area` VALUES (1693, '184', '开福区', '410008');
INSERT INTO `wfx_location_area` VALUES (1694, '184', '雨花区', '410011');
INSERT INTO `wfx_location_area` VALUES (1695, '184', '长沙县', '410100');
INSERT INTO `wfx_location_area` VALUES (1696, '184', '望城县', '410200');
INSERT INTO `wfx_location_area` VALUES (1697, '184', '宁乡县', '410600');
INSERT INTO `wfx_location_area` VALUES (1698, '184', '浏阳市', '410300');
INSERT INTO `wfx_location_area` VALUES (1699, '185', '荷塘区', '412000');
INSERT INTO `wfx_location_area` VALUES (1700, '185', '芦淞区', '412000');
INSERT INTO `wfx_location_area` VALUES (1701, '185', '石峰区', '412005');
INSERT INTO `wfx_location_area` VALUES (1702, '185', '天元区', '412007');
INSERT INTO `wfx_location_area` VALUES (1703, '185', '株洲县', '412100');
INSERT INTO `wfx_location_area` VALUES (1704, '185', '攸县', '412300');
INSERT INTO `wfx_location_area` VALUES (1705, '185', '茶陵县', '412400');
INSERT INTO `wfx_location_area` VALUES (1706, '185', '炎陵县', '412500');
INSERT INTO `wfx_location_area` VALUES (1707, '185', '醴陵市', '412200');
INSERT INTO `wfx_location_area` VALUES (1708, '186', '雨湖区', '411100');
INSERT INTO `wfx_location_area` VALUES (1709, '186', '岳塘区', '411101');
INSERT INTO `wfx_location_area` VALUES (1710, '186', '湘潭县', '411228');
INSERT INTO `wfx_location_area` VALUES (1711, '186', '湘乡市', '411400');
INSERT INTO `wfx_location_area` VALUES (1712, '186', '韶山市', '411300');
INSERT INTO `wfx_location_area` VALUES (1713, '187', '珠晖区', '421002');
INSERT INTO `wfx_location_area` VALUES (1714, '187', '雁峰区', '421001');
INSERT INTO `wfx_location_area` VALUES (1715, '187', '石鼓区', '421001');
INSERT INTO `wfx_location_area` VALUES (1716, '187', '蒸湘区', '421001');
INSERT INTO `wfx_location_area` VALUES (1717, '187', '南岳区', '421900');
INSERT INTO `wfx_location_area` VALUES (1718, '187', '衡阳县', '421200');
INSERT INTO `wfx_location_area` VALUES (1719, '187', '衡南县', '421131');
INSERT INTO `wfx_location_area` VALUES (1720, '187', '衡山县', '421300');
INSERT INTO `wfx_location_area` VALUES (1721, '187', '衡东县', '421400');
INSERT INTO `wfx_location_area` VALUES (1722, '187', '祁东县', '421600');
INSERT INTO `wfx_location_area` VALUES (1723, '187', '耒阳市', '421800');
INSERT INTO `wfx_location_area` VALUES (1724, '187', '常宁市', '421500');
INSERT INTO `wfx_location_area` VALUES (1725, '188', '双清区', '422001');
INSERT INTO `wfx_location_area` VALUES (1726, '188', '大祥区', '422000');
INSERT INTO `wfx_location_area` VALUES (1727, '188', '北塔区', '422007');
INSERT INTO `wfx_location_area` VALUES (1728, '188', '邵东县', '422800');
INSERT INTO `wfx_location_area` VALUES (1729, '188', '新邵县', '422900');
INSERT INTO `wfx_location_area` VALUES (1730, '188', '邵阳县', '422100');
INSERT INTO `wfx_location_area` VALUES (1731, '188', '隆回县', '422200');
INSERT INTO `wfx_location_area` VALUES (1732, '188', '洞口县', '422300');
INSERT INTO `wfx_location_area` VALUES (1733, '188', '绥宁县', '422600');
INSERT INTO `wfx_location_area` VALUES (1734, '188', '新宁县', '422700');
INSERT INTO `wfx_location_area` VALUES (1735, '188', '城步苗族自治县', '422500');
INSERT INTO `wfx_location_area` VALUES (1736, '188', '武冈市', '422400');
INSERT INTO `wfx_location_area` VALUES (1737, '189', '岳阳楼区', '414000');
INSERT INTO `wfx_location_area` VALUES (1738, '189', '云溪区', '414009');
INSERT INTO `wfx_location_area` VALUES (1739, '189', '君山区', '414005');
INSERT INTO `wfx_location_area` VALUES (1740, '189', '岳阳县', '414100');
INSERT INTO `wfx_location_area` VALUES (1741, '189', '华容县', '414200');
INSERT INTO `wfx_location_area` VALUES (1742, '189', '湘阴县', '410500');
INSERT INTO `wfx_location_area` VALUES (1743, '189', '平江县', '414500');
INSERT INTO `wfx_location_area` VALUES (1744, '189', '汨罗市', '414400');
INSERT INTO `wfx_location_area` VALUES (1745, '189', '临湘市', '414300');
INSERT INTO `wfx_location_area` VALUES (1746, '190', '武陵区', '415000');
INSERT INTO `wfx_location_area` VALUES (1747, '190', '鼎城区', '415101');
INSERT INTO `wfx_location_area` VALUES (1748, '190', '安乡县', '415600');
INSERT INTO `wfx_location_area` VALUES (1749, '190', '汉寿县', '415900');
INSERT INTO `wfx_location_area` VALUES (1750, '190', '澧县', '415500');
INSERT INTO `wfx_location_area` VALUES (1751, '190', '临澧县', '415200');
INSERT INTO `wfx_location_area` VALUES (1752, '190', '桃源县', '415700');
INSERT INTO `wfx_location_area` VALUES (1753, '190', '石门县', '415300');
INSERT INTO `wfx_location_area` VALUES (1754, '190', '津市市', '415400');
INSERT INTO `wfx_location_area` VALUES (1755, '191', '永定区', '427000');
INSERT INTO `wfx_location_area` VALUES (1756, '191', '武陵源区', '427400');
INSERT INTO `wfx_location_area` VALUES (1757, '191', '慈利县', '427200');
INSERT INTO `wfx_location_area` VALUES (1758, '191', '桑植县', '427100');
INSERT INTO `wfx_location_area` VALUES (1759, '192', '资阳区', '413001');
INSERT INTO `wfx_location_area` VALUES (1760, '192', '赫山区', '413002');
INSERT INTO `wfx_location_area` VALUES (1761, '192', '南县', '413200');
INSERT INTO `wfx_location_area` VALUES (1762, '192', '桃江县', '413400');
INSERT INTO `wfx_location_area` VALUES (1763, '192', '安化县', '413500');
INSERT INTO `wfx_location_area` VALUES (1764, '192', '沅江市', '413100');
INSERT INTO `wfx_location_area` VALUES (1765, '193', '北湖区', '423000');
INSERT INTO `wfx_location_area` VALUES (1766, '193', '苏仙区', '423000');
INSERT INTO `wfx_location_area` VALUES (1767, '193', '桂阳县', '424400');
INSERT INTO `wfx_location_area` VALUES (1768, '193', '宜章县', '424200');
INSERT INTO `wfx_location_area` VALUES (1769, '193', '永兴县', '423300');
INSERT INTO `wfx_location_area` VALUES (1770, '193', '嘉禾县', '424500');
INSERT INTO `wfx_location_area` VALUES (1771, '193', '临武县', '424300');
INSERT INTO `wfx_location_area` VALUES (1772, '193', '汝城县', '424100');
INSERT INTO `wfx_location_area` VALUES (1773, '193', '桂东县', '423500');
INSERT INTO `wfx_location_area` VALUES (1774, '193', '安仁县', '423600');
INSERT INTO `wfx_location_area` VALUES (1775, '193', '资兴市', '423400');
INSERT INTO `wfx_location_area` VALUES (1776, '194', '冷水滩区', '425100');
INSERT INTO `wfx_location_area` VALUES (1777, '194', '祁阳县', '426100');
INSERT INTO `wfx_location_area` VALUES (1778, '194', '东安县', '425900');
INSERT INTO `wfx_location_area` VALUES (1779, '194', '双牌县', '425200');
INSERT INTO `wfx_location_area` VALUES (1780, '194', '道县', '425300');
INSERT INTO `wfx_location_area` VALUES (1781, '194', '江永县', '425400');
INSERT INTO `wfx_location_area` VALUES (1782, '194', '宁远县', '425600');
INSERT INTO `wfx_location_area` VALUES (1783, '194', '蓝山县', '425800');
INSERT INTO `wfx_location_area` VALUES (1784, '194', '新田县', '425700');
INSERT INTO `wfx_location_area` VALUES (1785, '194', '江华瑶族自治县', '425500');
INSERT INTO `wfx_location_area` VALUES (1786, '194', '零陵区', '425002');
INSERT INTO `wfx_location_area` VALUES (1787, '195', '鹤城区', '418000');
INSERT INTO `wfx_location_area` VALUES (1788, '195', '中方县', '418005');
INSERT INTO `wfx_location_area` VALUES (1789, '195', '沅陵县', '419600');
INSERT INTO `wfx_location_area` VALUES (1790, '195', '辰溪县', '419500');
INSERT INTO `wfx_location_area` VALUES (1791, '195', '溆浦县', '419300');
INSERT INTO `wfx_location_area` VALUES (1792, '195', '会同县', '418300');
INSERT INTO `wfx_location_area` VALUES (1793, '195', '麻阳苗族自治县', '419400');
INSERT INTO `wfx_location_area` VALUES (1794, '195', '新晃侗族自治县', '419200');
INSERT INTO `wfx_location_area` VALUES (1795, '195', '芷江侗族自治县', '419100');
INSERT INTO `wfx_location_area` VALUES (1796, '195', '靖州苗族侗族自治县', '418400');
INSERT INTO `wfx_location_area` VALUES (1797, '195', '通道侗族自治县', '418500');
INSERT INTO `wfx_location_area` VALUES (1798, '195', '洪江市', '418116');
INSERT INTO `wfx_location_area` VALUES (1799, '196', '娄星区', '417000');
INSERT INTO `wfx_location_area` VALUES (1800, '196', '双峰县', '417700');
INSERT INTO `wfx_location_area` VALUES (1801, '196', '新化县', '417600');
INSERT INTO `wfx_location_area` VALUES (1802, '196', '冷水江市', '417500');
INSERT INTO `wfx_location_area` VALUES (1803, '196', '涟源市', '417100');
INSERT INTO `wfx_location_area` VALUES (1804, '197', '吉首市', '416000');
INSERT INTO `wfx_location_area` VALUES (1805, '197', '泸溪县', '416100');
INSERT INTO `wfx_location_area` VALUES (1806, '197', '凤凰县', '416200');
INSERT INTO `wfx_location_area` VALUES (1807, '197', '花垣县', '416400');
INSERT INTO `wfx_location_area` VALUES (1808, '197', '保靖县', '416500');
INSERT INTO `wfx_location_area` VALUES (1809, '197', '古丈县', '416300');
INSERT INTO `wfx_location_area` VALUES (1810, '197', '永顺县', '416700');
INSERT INTO `wfx_location_area` VALUES (1811, '197', '龙山县', '416800');
INSERT INTO `wfx_location_area` VALUES (1812, '198', '荔湾区', '510145');
INSERT INTO `wfx_location_area` VALUES (1813, '198', '越秀区', '510030');
INSERT INTO `wfx_location_area` VALUES (1814, '198', '海珠区', '510220');
INSERT INTO `wfx_location_area` VALUES (1815, '198', '天河区', '510630');
INSERT INTO `wfx_location_area` VALUES (1816, '198', '白云区', '510080');
INSERT INTO `wfx_location_area` VALUES (1817, '198', '黄埔区', '510700');
INSERT INTO `wfx_location_area` VALUES (1818, '198', '番禺区', '511400');
INSERT INTO `wfx_location_area` VALUES (1819, '198', '花都区', '510800');
INSERT INTO `wfx_location_area` VALUES (1820, '198', '增城市', '511300');
INSERT INTO `wfx_location_area` VALUES (1821, '198', '从化市', '510900');
INSERT INTO `wfx_location_area` VALUES (1822, '198', '南沙区', '511400');
INSERT INTO `wfx_location_area` VALUES (1823, '198', '萝岗区', '510100');
INSERT INTO `wfx_location_area` VALUES (1824, '199', '武江区', '512026');
INSERT INTO `wfx_location_area` VALUES (1825, '199', '浈江区', '512023');
INSERT INTO `wfx_location_area` VALUES (1826, '199', '曲江区', '512100');
INSERT INTO `wfx_location_area` VALUES (1827, '199', '始兴县', '512500');
INSERT INTO `wfx_location_area` VALUES (1828, '199', '仁化县', '512300');
INSERT INTO `wfx_location_area` VALUES (1829, '199', '翁源县', '512600');
INSERT INTO `wfx_location_area` VALUES (1830, '199', '乳源瑶族自治县', '512700');
INSERT INTO `wfx_location_area` VALUES (1831, '199', '新丰县', '511100');
INSERT INTO `wfx_location_area` VALUES (1832, '199', '乐昌市', '512200');
INSERT INTO `wfx_location_area` VALUES (1833, '199', '南雄市', '512400');
INSERT INTO `wfx_location_area` VALUES (1834, '200', '罗湖区', '518001');
INSERT INTO `wfx_location_area` VALUES (1835, '200', '福田区', '518033');
INSERT INTO `wfx_location_area` VALUES (1836, '200', '南山区', '518052');
INSERT INTO `wfx_location_area` VALUES (1837, '200', '宝安区', '518101');
INSERT INTO `wfx_location_area` VALUES (1838, '200', '龙岗区', '518116');
INSERT INTO `wfx_location_area` VALUES (1839, '200', '盐田区', '518083');
INSERT INTO `wfx_location_area` VALUES (1840, '200', '光明新区', '518107');
INSERT INTO `wfx_location_area` VALUES (1841, '200', '坪山新区', '518118');
INSERT INTO `wfx_location_area` VALUES (1842, '201', '香洲区', '519000');
INSERT INTO `wfx_location_area` VALUES (1843, '201', '斗门区', '519100');
INSERT INTO `wfx_location_area` VALUES (1844, '201', '金湾区', '519090');
INSERT INTO `wfx_location_area` VALUES (1845, '202', '龙湖区', '515041');
INSERT INTO `wfx_location_area` VALUES (1846, '202', '金平区', '515041');
INSERT INTO `wfx_location_area` VALUES (1847, '202', '濠江区', '515071');
INSERT INTO `wfx_location_area` VALUES (1848, '202', '潮阳区', '515100');
INSERT INTO `wfx_location_area` VALUES (1849, '202', '潮南区', '515144');
INSERT INTO `wfx_location_area` VALUES (1850, '202', '澄海区', '515800');
INSERT INTO `wfx_location_area` VALUES (1851, '202', '南澳县', '515900');
INSERT INTO `wfx_location_area` VALUES (1852, '203', '禅城区', '528000');
INSERT INTO `wfx_location_area` VALUES (1853, '203', '南海区', '528200');
INSERT INTO `wfx_location_area` VALUES (1854, '203', '顺德区', '528300');
INSERT INTO `wfx_location_area` VALUES (1855, '203', '三水区', '528100');
INSERT INTO `wfx_location_area` VALUES (1856, '203', '高明区', '528500');
INSERT INTO `wfx_location_area` VALUES (1857, '204', '蓬江区', '529051');
INSERT INTO `wfx_location_area` VALUES (1858, '204', '江海区', '529000');
INSERT INTO `wfx_location_area` VALUES (1859, '204', '新会区', '529100');
INSERT INTO `wfx_location_area` VALUES (1860, '204', '台山市', '529211');
INSERT INTO `wfx_location_area` VALUES (1861, '204', '开平市', '529312');
INSERT INTO `wfx_location_area` VALUES (1862, '204', '鹤山市', '529711');
INSERT INTO `wfx_location_area` VALUES (1863, '204', '恩平市', '529411');
INSERT INTO `wfx_location_area` VALUES (1864, '205', '赤坎区', '524033');
INSERT INTO `wfx_location_area` VALUES (1865, '205', '霞山区', '524002');
INSERT INTO `wfx_location_area` VALUES (1866, '205', '坡头区', '524057');
INSERT INTO `wfx_location_area` VALUES (1867, '205', '麻章区', '524003');
INSERT INTO `wfx_location_area` VALUES (1868, '205', '遂溪县', '524300');
INSERT INTO `wfx_location_area` VALUES (1869, '205', '徐闻县', '524100');
INSERT INTO `wfx_location_area` VALUES (1870, '205', '廉江市', '524400');
INSERT INTO `wfx_location_area` VALUES (1871, '205', '雷州市', '524200');
INSERT INTO `wfx_location_area` VALUES (1872, '205', '吴川市', '524500');
INSERT INTO `wfx_location_area` VALUES (1873, '205', '开发区', '524022');
INSERT INTO `wfx_location_area` VALUES (1874, '206', '茂南区', '525011');
INSERT INTO `wfx_location_area` VALUES (1875, '206', '茂港区', '525027');
INSERT INTO `wfx_location_area` VALUES (1876, '206', '电白县', '525400');
INSERT INTO `wfx_location_area` VALUES (1877, '206', '高州市', '525200');
INSERT INTO `wfx_location_area` VALUES (1878, '206', '化州市', '525100');
INSERT INTO `wfx_location_area` VALUES (1879, '206', '信宜市', '525300');
INSERT INTO `wfx_location_area` VALUES (1880, '207', '端州区', '526040');
INSERT INTO `wfx_location_area` VALUES (1881, '207', '鼎湖区', '526070');
INSERT INTO `wfx_location_area` VALUES (1882, '207', '广宁县', '526300');
INSERT INTO `wfx_location_area` VALUES (1883, '207', '怀集县', '526400');
INSERT INTO `wfx_location_area` VALUES (1884, '207', '封开县', '526500');
INSERT INTO `wfx_location_area` VALUES (1885, '207', '德庆县', '526600');
INSERT INTO `wfx_location_area` VALUES (1886, '207', '高要市', '526100');
INSERT INTO `wfx_location_area` VALUES (1887, '207', '四会市', '526200');
INSERT INTO `wfx_location_area` VALUES (1888, '207', '高新技术产业开发区', '526238');
INSERT INTO `wfx_location_area` VALUES (1889, '208', '惠城区', '516001');
INSERT INTO `wfx_location_area` VALUES (1890, '208', '惠阳区', '516200');
INSERT INTO `wfx_location_area` VALUES (1891, '208', '博罗县', '516100');
INSERT INTO `wfx_location_area` VALUES (1892, '208', '惠东县', '516300');
INSERT INTO `wfx_location_area` VALUES (1893, '208', '龙门县', '516800');
INSERT INTO `wfx_location_area` VALUES (1894, '208', '大亚湾区', '516080');
INSERT INTO `wfx_location_area` VALUES (1895, '208', '仲恺高新区', '516080');
INSERT INTO `wfx_location_area` VALUES (1896, '209', '梅江区', '514000');
INSERT INTO `wfx_location_area` VALUES (1897, '209', '梅县', '514733');
INSERT INTO `wfx_location_area` VALUES (1898, '209', '大埔县', '514200');
INSERT INTO `wfx_location_area` VALUES (1899, '209', '丰顺县', '514300');
INSERT INTO `wfx_location_area` VALUES (1900, '209', '五华县', '514400');
INSERT INTO `wfx_location_area` VALUES (1901, '209', '平远县', '514600');
INSERT INTO `wfx_location_area` VALUES (1902, '209', '蕉岭县', '514100');
INSERT INTO `wfx_location_area` VALUES (1903, '209', '兴宁市', '514500');
INSERT INTO `wfx_location_area` VALUES (1904, '210', '城区', '516601');
INSERT INTO `wfx_location_area` VALUES (1905, '210', '陆丰市', '516500');
INSERT INTO `wfx_location_area` VALUES (1906, '210', '海丰县', '516400');
INSERT INTO `wfx_location_area` VALUES (1907, '210', '陆河县', '516700');
INSERT INTO `wfx_location_area` VALUES (1908, '211', '源城区', '517000');
INSERT INTO `wfx_location_area` VALUES (1909, '211', '紫金县', '517400');
INSERT INTO `wfx_location_area` VALUES (1910, '211', '龙川县', '517300');
INSERT INTO `wfx_location_area` VALUES (1911, '211', '连平县', '517100');
INSERT INTO `wfx_location_area` VALUES (1912, '211', '和平县', '517200');
INSERT INTO `wfx_location_area` VALUES (1913, '211', '东源县', '517500');
INSERT INTO `wfx_location_area` VALUES (1914, '212', '江城区', '529525');
INSERT INTO `wfx_location_area` VALUES (1915, '212', '阳西县', '529800');
INSERT INTO `wfx_location_area` VALUES (1916, '212', '阳东县', '529931');
INSERT INTO `wfx_location_area` VALUES (1917, '212', '阳春市', '529611');
INSERT INTO `wfx_location_area` VALUES (1918, '213', '清城区', '511500');
INSERT INTO `wfx_location_area` VALUES (1919, '213', '佛冈县', '511600');
INSERT INTO `wfx_location_area` VALUES (1920, '213', '阳山县', '513100');
INSERT INTO `wfx_location_area` VALUES (1921, '213', '连山壮族瑶族自治县', '513200');
INSERT INTO `wfx_location_area` VALUES (1922, '213', '连南瑶族自治县', '513300');
INSERT INTO `wfx_location_area` VALUES (1923, '213', '清新县', '511800');
INSERT INTO `wfx_location_area` VALUES (1924, '213', '英德市', '513000');
INSERT INTO `wfx_location_area` VALUES (1925, '213', '连州市', '513401');
INSERT INTO `wfx_location_area` VALUES (1926, '214', '南城区', '523000');
INSERT INTO `wfx_location_area` VALUES (1927, '214', '石龙镇', '523021');
INSERT INTO `wfx_location_area` VALUES (1928, '214', '长安镇', '523068');
INSERT INTO `wfx_location_area` VALUES (1929, '214', '虎门镇', '523061');
INSERT INTO `wfx_location_area` VALUES (1930, '214', '横沥镇', '523032');
INSERT INTO `wfx_location_area` VALUES (1931, '214', '寮步镇', '523058');
INSERT INTO `wfx_location_area` VALUES (1932, '214', '黄江镇', '523054');
INSERT INTO `wfx_location_area` VALUES (1933, '214', '清溪镇', '523046');
INSERT INTO `wfx_location_area` VALUES (1934, '214', '莞城区', '523000');
INSERT INTO `wfx_location_area` VALUES (1935, '214', '万江区', '523050');
INSERT INTO `wfx_location_area` VALUES (1936, '214', '东城区', '523000');
INSERT INTO `wfx_location_area` VALUES (1937, '214', '石碣镇', '523024');
INSERT INTO `wfx_location_area` VALUES (1938, '214', '茶山镇', '523029');
INSERT INTO `wfx_location_area` VALUES (1939, '214', '石排镇', '523025');
INSERT INTO `wfx_location_area` VALUES (1940, '214', '企石镇', '523027');
INSERT INTO `wfx_location_area` VALUES (1941, '214', '桥头镇', '523038');
INSERT INTO `wfx_location_area` VALUES (1942, '214', '谢岗镇', '523044');
INSERT INTO `wfx_location_area` VALUES (1943, '214', '东坑镇', '523034');
INSERT INTO `wfx_location_area` VALUES (1944, '214', '常平镇', '523036');
INSERT INTO `wfx_location_area` VALUES (1945, '214', '大朗镇', '523056');
INSERT INTO `wfx_location_area` VALUES (1946, '214', '塘厦镇', '523710');
INSERT INTO `wfx_location_area` VALUES (1947, '214', '凤岗镇', '523048');
INSERT INTO `wfx_location_area` VALUES (1948, '214', '厚街镇', '523071');
INSERT INTO `wfx_location_area` VALUES (1949, '214', '沙田镇', '523073');
INSERT INTO `wfx_location_area` VALUES (1950, '214', '道滘镇', '523170');
INSERT INTO `wfx_location_area` VALUES (1951, '214', '洪梅镇', '523083');
INSERT INTO `wfx_location_area` VALUES (1952, '214', '麻涌镇', '523078');
INSERT INTO `wfx_location_area` VALUES (1953, '214', '中堂镇', '523075');
INSERT INTO `wfx_location_area` VALUES (1954, '214', '高埗镇', '523270');
INSERT INTO `wfx_location_area` VALUES (1955, '214', '樟木头镇', '523041');
INSERT INTO `wfx_location_area` VALUES (1956, '214', '大岭山镇', '523074');
INSERT INTO `wfx_location_area` VALUES (1957, '214', '望牛墩镇', '523077');
INSERT INTO `wfx_location_area` VALUES (1958, '215', '中山市', '528403');
INSERT INTO `wfx_location_area` VALUES (1959, '216', '湘桥区', '521000');
INSERT INTO `wfx_location_area` VALUES (1960, '216', '潮安县', '515638');
INSERT INTO `wfx_location_area` VALUES (1961, '216', '饶平县', '515700');
INSERT INTO `wfx_location_area` VALUES (1962, '217', '榕城区', '522095');
INSERT INTO `wfx_location_area` VALUES (1963, '217', '揭东县', '515554');
INSERT INTO `wfx_location_area` VALUES (1964, '217', '揭西县', '515400');
INSERT INTO `wfx_location_area` VALUES (1965, '217', '惠来县', '515200');
INSERT INTO `wfx_location_area` VALUES (1966, '217', '普宁市', '515300');
INSERT INTO `wfx_location_area` VALUES (1967, '217', '东山区', '522031');
INSERT INTO `wfx_location_area` VALUES (1968, '217', '普侨区', '515339');
INSERT INTO `wfx_location_area` VALUES (1969, '217', '大南山侨区', '515237');
INSERT INTO `wfx_location_area` VALUES (1970, '218', '云城区', '527300');
INSERT INTO `wfx_location_area` VALUES (1971, '218', '新兴县', '527400');
INSERT INTO `wfx_location_area` VALUES (1972, '218', '郁南县', '527100');
INSERT INTO `wfx_location_area` VALUES (1973, '218', '云安县', '527500');
INSERT INTO `wfx_location_area` VALUES (1974, '218', '罗定市', '527200');
INSERT INTO `wfx_location_area` VALUES (1975, '219', '兴宁区', '530012');
INSERT INTO `wfx_location_area` VALUES (1976, '219', '青秀区', '530022');
INSERT INTO `wfx_location_area` VALUES (1977, '219', '江南区', '530031');
INSERT INTO `wfx_location_area` VALUES (1978, '219', '西乡塘区', '530001');
INSERT INTO `wfx_location_area` VALUES (1979, '219', '良庆区', '530200');
INSERT INTO `wfx_location_area` VALUES (1980, '219', '邕宁区', '530200');
INSERT INTO `wfx_location_area` VALUES (1981, '219', '武鸣县', '530100');
INSERT INTO `wfx_location_area` VALUES (1982, '219', '隆安县', '532700');
INSERT INTO `wfx_location_area` VALUES (1983, '219', '马山县', '530600');
INSERT INTO `wfx_location_area` VALUES (1984, '219', '上林县', '530500');
INSERT INTO `wfx_location_area` VALUES (1985, '219', '宾阳县', '530400');
INSERT INTO `wfx_location_area` VALUES (1986, '219', '横县', '530300');
INSERT INTO `wfx_location_area` VALUES (1987, '220', '城中区', '545001');
INSERT INTO `wfx_location_area` VALUES (1988, '220', '鱼峰区', '545005');
INSERT INTO `wfx_location_area` VALUES (1989, '220', '柳南区', '545005');
INSERT INTO `wfx_location_area` VALUES (1990, '220', '柳北区', '545001');
INSERT INTO `wfx_location_area` VALUES (1991, '220', '柳江县', '545100');
INSERT INTO `wfx_location_area` VALUES (1992, '220', '柳城县', '545200');
INSERT INTO `wfx_location_area` VALUES (1993, '220', '鹿寨县', '545600');
INSERT INTO `wfx_location_area` VALUES (1994, '220', '融安县', '545400');
INSERT INTO `wfx_location_area` VALUES (1995, '220', '融水苗族自治县', '545300');
INSERT INTO `wfx_location_area` VALUES (1996, '220', '三江侗族自治县', '545500');
INSERT INTO `wfx_location_area` VALUES (1997, '221', '秀峰区', '541001');
INSERT INTO `wfx_location_area` VALUES (1998, '221', '叠彩区', '541001');
INSERT INTO `wfx_location_area` VALUES (1999, '221', '象山区', '541002');
INSERT INTO `wfx_location_area` VALUES (2000, '221', '七星区', '541004');
INSERT INTO `wfx_location_area` VALUES (2001, '221', '雁山区', '541006');
INSERT INTO `wfx_location_area` VALUES (2002, '221', '阳朔县', '541900');
INSERT INTO `wfx_location_area` VALUES (2003, '221', '临桂县', '541100');
INSERT INTO `wfx_location_area` VALUES (2004, '221', '灵川县', '541200');
INSERT INTO `wfx_location_area` VALUES (2005, '221', '全州县', '541500');
INSERT INTO `wfx_location_area` VALUES (2006, '221', '兴安县', '541300');
INSERT INTO `wfx_location_area` VALUES (2007, '221', '永福县', '541800');
INSERT INTO `wfx_location_area` VALUES (2008, '221', '灌阳县', '541600');
INSERT INTO `wfx_location_area` VALUES (2009, '221', '龙胜各族自治县', '541700');
INSERT INTO `wfx_location_area` VALUES (2010, '221', '资源县', '541400');
INSERT INTO `wfx_location_area` VALUES (2011, '221', '平乐县', '542400');
INSERT INTO `wfx_location_area` VALUES (2012, '221', '荔浦县', '546600');
INSERT INTO `wfx_location_area` VALUES (2013, '221', '恭城瑶族自治县', '542500');
INSERT INTO `wfx_location_area` VALUES (2014, '222', '万秀区', '543000');
INSERT INTO `wfx_location_area` VALUES (2015, '222', '蝶山区', '543002');
INSERT INTO `wfx_location_area` VALUES (2016, '222', '长洲区', '543002');
INSERT INTO `wfx_location_area` VALUES (2017, '222', '苍梧县', '543100');
INSERT INTO `wfx_location_area` VALUES (2018, '222', '藤县', '543300');
INSERT INTO `wfx_location_area` VALUES (2019, '222', '蒙山县', '546700');
INSERT INTO `wfx_location_area` VALUES (2020, '222', '岑溪市', '543200');
INSERT INTO `wfx_location_area` VALUES (2021, '223', '海城区', '536000');
INSERT INTO `wfx_location_area` VALUES (2022, '223', '银海区', '536000');
INSERT INTO `wfx_location_area` VALUES (2023, '223', '铁山港区', '536017');
INSERT INTO `wfx_location_area` VALUES (2024, '223', '合浦县', '536100');
INSERT INTO `wfx_location_area` VALUES (2025, '224', '港口区', '538001');
INSERT INTO `wfx_location_area` VALUES (2026, '224', '防城区', '538021');
INSERT INTO `wfx_location_area` VALUES (2027, '224', '上思县', '535500');
INSERT INTO `wfx_location_area` VALUES (2028, '224', '东兴市', '538100');
INSERT INTO `wfx_location_area` VALUES (2029, '225', '钦南区', '535000');
INSERT INTO `wfx_location_area` VALUES (2030, '225', '钦北区', '535000');
INSERT INTO `wfx_location_area` VALUES (2031, '225', '灵山县', '535400');
INSERT INTO `wfx_location_area` VALUES (2032, '225', '浦北县', '535300');
INSERT INTO `wfx_location_area` VALUES (2033, '225', '钦州港经济开发区', '535008');
INSERT INTO `wfx_location_area` VALUES (2034, '226', '港北区', '537100');
INSERT INTO `wfx_location_area` VALUES (2035, '226', '港南区', '537132');
INSERT INTO `wfx_location_area` VALUES (2036, '226', '覃塘区', '537121');
INSERT INTO `wfx_location_area` VALUES (2037, '226', '平南县', '537300');
INSERT INTO `wfx_location_area` VALUES (2038, '226', '桂平市', '537200');
INSERT INTO `wfx_location_area` VALUES (2039, '227', '玉州区', '537000');
INSERT INTO `wfx_location_area` VALUES (2040, '227', '容县', '537500');
INSERT INTO `wfx_location_area` VALUES (2041, '227', '陆川县', '537700');
INSERT INTO `wfx_location_area` VALUES (2042, '227', '博白县', '537600');
INSERT INTO `wfx_location_area` VALUES (2043, '227', '兴业县', '537800');
INSERT INTO `wfx_location_area` VALUES (2044, '227', '北流市', '537400');
INSERT INTO `wfx_location_area` VALUES (2045, '228', '右江区', '533000');
INSERT INTO `wfx_location_area` VALUES (2046, '228', '田阳县', '533600');
INSERT INTO `wfx_location_area` VALUES (2047, '228', '田东县', '531500');
INSERT INTO `wfx_location_area` VALUES (2048, '228', '平果县', '531400');
INSERT INTO `wfx_location_area` VALUES (2049, '228', '德保县', '533700');
INSERT INTO `wfx_location_area` VALUES (2050, '228', '靖西县', '533800');
INSERT INTO `wfx_location_area` VALUES (2051, '228', '那坡县', '533900');
INSERT INTO `wfx_location_area` VALUES (2052, '228', '凌云县', '533100');
INSERT INTO `wfx_location_area` VALUES (2053, '228', '乐业县', '533200');
INSERT INTO `wfx_location_area` VALUES (2054, '228', '田林县', '533300');
INSERT INTO `wfx_location_area` VALUES (2055, '228', '西林县', '533500');
INSERT INTO `wfx_location_area` VALUES (2056, '228', '隆林各族自治县', '533400');
INSERT INTO `wfx_location_area` VALUES (2057, '229', '八步区', '542800');
INSERT INTO `wfx_location_area` VALUES (2058, '229', '昭平县', '546800');
INSERT INTO `wfx_location_area` VALUES (2059, '229', '钟山县', '542600');
INSERT INTO `wfx_location_area` VALUES (2060, '229', '富川瑶族自治县', '542700');
INSERT INTO `wfx_location_area` VALUES (2061, '230', '金城江区', '547000');
INSERT INTO `wfx_location_area` VALUES (2062, '230', '南丹县', '547200');
INSERT INTO `wfx_location_area` VALUES (2063, '230', '天峨县', '547300');
INSERT INTO `wfx_location_area` VALUES (2064, '230', '凤山县', '547600');
INSERT INTO `wfx_location_area` VALUES (2065, '230', '东兰县', '547400');
INSERT INTO `wfx_location_area` VALUES (2066, '230', '罗城仫佬族自治县', '546400');
INSERT INTO `wfx_location_area` VALUES (2067, '230', '环江毛南族自治县', '547100');
INSERT INTO `wfx_location_area` VALUES (2068, '230', '巴马瑶族自治县', '547500');
INSERT INTO `wfx_location_area` VALUES (2069, '230', '都安瑶族自治县', '530700');
INSERT INTO `wfx_location_area` VALUES (2070, '230', '大化瑶族自治县', '530800');
INSERT INTO `wfx_location_area` VALUES (2071, '230', '宜州市', '546300');
INSERT INTO `wfx_location_area` VALUES (2072, '231', '兴宾区', '546100');
INSERT INTO `wfx_location_area` VALUES (2073, '231', '忻城县', '546200');
INSERT INTO `wfx_location_area` VALUES (2074, '231', '象州县', '545800');
INSERT INTO `wfx_location_area` VALUES (2075, '231', '武宣县', '545900');
INSERT INTO `wfx_location_area` VALUES (2076, '231', '金秀瑶族自治县', '545700');
INSERT INTO `wfx_location_area` VALUES (2077, '231', '合山市', '546500');
INSERT INTO `wfx_location_area` VALUES (2078, '232', '江洲区', '532200');
INSERT INTO `wfx_location_area` VALUES (2079, '232', '扶绥县', '532100');
INSERT INTO `wfx_location_area` VALUES (2080, '232', '宁明县', '532500');
INSERT INTO `wfx_location_area` VALUES (2081, '232', '龙州县', '532400');
INSERT INTO `wfx_location_area` VALUES (2082, '232', '大新县', '532300');
INSERT INTO `wfx_location_area` VALUES (2083, '232', '天等县', '532800');
INSERT INTO `wfx_location_area` VALUES (2084, '232', '凭祥市', '532600');
INSERT INTO `wfx_location_area` VALUES (2085, '233', '秀英区', '570311');
INSERT INTO `wfx_location_area` VALUES (2086, '233', '龙华区', '570105');
INSERT INTO `wfx_location_area` VALUES (2087, '233', '琼山区', '571100');
INSERT INTO `wfx_location_area` VALUES (2088, '233', '美兰区', '570203');
INSERT INTO `wfx_location_area` VALUES (2089, '234', '河西区', '572000');
INSERT INTO `wfx_location_area` VALUES (2090, '234', '河东区', '572000');
INSERT INTO `wfx_location_area` VALUES (2091, '234', '田独镇', '572011');
INSERT INTO `wfx_location_area` VALUES (2092, '234', '凤凰镇', '572023');
INSERT INTO `wfx_location_area` VALUES (2093, '234', '三亚市', '572000');
INSERT INTO `wfx_location_area` VALUES (2094, '234', '崖城镇', '572025');
INSERT INTO `wfx_location_area` VALUES (2095, '234', '天涯镇', '572029');
INSERT INTO `wfx_location_area` VALUES (2096, '234', '育才乡', '572032');
INSERT INTO `wfx_location_area` VALUES (2097, '234', '海棠湾镇', '572014');
INSERT INTO `wfx_location_area` VALUES (2098, '235', '五指山市', '572200');
INSERT INTO `wfx_location_area` VALUES (2099, '235', '琼海市', '571400');
INSERT INTO `wfx_location_area` VALUES (2100, '235', '儋州市', '571700');
INSERT INTO `wfx_location_area` VALUES (2101, '235', '文昌市', '571300');
INSERT INTO `wfx_location_area` VALUES (2102, '235', '万宁市', '571500');
INSERT INTO `wfx_location_area` VALUES (2103, '235', '东方市', '572600');
INSERT INTO `wfx_location_area` VALUES (2104, '235', '定安县', '571200');
INSERT INTO `wfx_location_area` VALUES (2105, '235', '屯昌县', '571600');
INSERT INTO `wfx_location_area` VALUES (2106, '235', '澄迈县', '571900');
INSERT INTO `wfx_location_area` VALUES (2107, '235', '临高县', '571800');
INSERT INTO `wfx_location_area` VALUES (2108, '235', '白沙黎族自治县', '572800');
INSERT INTO `wfx_location_area` VALUES (2109, '235', '昌江黎族自治县', '572700');
INSERT INTO `wfx_location_area` VALUES (2110, '235', '乐东黎族自治县', '572500');
INSERT INTO `wfx_location_area` VALUES (2111, '235', '陵水黎族自治县', '572400');
INSERT INTO `wfx_location_area` VALUES (2112, '235', '保亭黎族苗族自治县', '572300');
INSERT INTO `wfx_location_area` VALUES (2113, '235', '琼中黎族苗族自治县', '572900');
INSERT INTO `wfx_location_area` VALUES (2114, '235', '西、南、中沙群岛办事处', '573100');
INSERT INTO `wfx_location_area` VALUES (2115, '236', '万州区', '404100');
INSERT INTO `wfx_location_area` VALUES (2116, '236', '涪陵区', '408000');
INSERT INTO `wfx_location_area` VALUES (2117, '236', '渝中区', '400010');
INSERT INTO `wfx_location_area` VALUES (2118, '236', '大渡口区', '400080');
INSERT INTO `wfx_location_area` VALUES (2119, '236', '江北区', '400020');
INSERT INTO `wfx_location_area` VALUES (2120, '236', '沙坪坝区', '400030');
INSERT INTO `wfx_location_area` VALUES (2121, '236', '九龙坡区', '400050');
INSERT INTO `wfx_location_area` VALUES (2122, '236', '南岸区', '400064');
INSERT INTO `wfx_location_area` VALUES (2123, '236', '北碚区', '400700');
INSERT INTO `wfx_location_area` VALUES (2124, '236', '万盛区', '400800');
INSERT INTO `wfx_location_area` VALUES (2125, '236', '双桥区', '400900');
INSERT INTO `wfx_location_area` VALUES (2126, '236', '渝北区', '401120');
INSERT INTO `wfx_location_area` VALUES (2127, '236', '巴南区', '401320');
INSERT INTO `wfx_location_area` VALUES (2128, '236', '黔江区', '409700');
INSERT INTO `wfx_location_area` VALUES (2129, '236', '长寿区', '401220');
INSERT INTO `wfx_location_area` VALUES (2130, '236', '綦江县', '401420');
INSERT INTO `wfx_location_area` VALUES (2131, '236', '潼南县', '402660');
INSERT INTO `wfx_location_area` VALUES (2132, '236', '铜梁县', '402560');
INSERT INTO `wfx_location_area` VALUES (2133, '236', '大足县', '402360');
INSERT INTO `wfx_location_area` VALUES (2134, '236', '荣昌县', '402460');
INSERT INTO `wfx_location_area` VALUES (2135, '236', '璧山县', '402760');
INSERT INTO `wfx_location_area` VALUES (2136, '236', '梁平县', '405200');
INSERT INTO `wfx_location_area` VALUES (2137, '236', '城口县', '405900');
INSERT INTO `wfx_location_area` VALUES (2138, '236', '丰都县', '408200');
INSERT INTO `wfx_location_area` VALUES (2139, '236', '垫江县', '408300');
INSERT INTO `wfx_location_area` VALUES (2140, '236', '武隆县', '408500');
INSERT INTO `wfx_location_area` VALUES (2141, '236', '忠县', '404300');
INSERT INTO `wfx_location_area` VALUES (2142, '236', '开县', '405400');
INSERT INTO `wfx_location_area` VALUES (2143, '236', '云阳县', '404500');
INSERT INTO `wfx_location_area` VALUES (2144, '236', '奉节县', '404600');
INSERT INTO `wfx_location_area` VALUES (2145, '236', '巫山县', '404700');
INSERT INTO `wfx_location_area` VALUES (2146, '236', '巫溪县', '405800');
INSERT INTO `wfx_location_area` VALUES (2147, '236', '石柱土家族自治县', '409100');
INSERT INTO `wfx_location_area` VALUES (2148, '236', '秀山土家族苗族自治县', '409900');
INSERT INTO `wfx_location_area` VALUES (2149, '236', '酉阳土家族苗族自治县', '409800');
INSERT INTO `wfx_location_area` VALUES (2150, '236', '彭水苗族土家族自治县', '409600');
INSERT INTO `wfx_location_area` VALUES (2151, '236', '高新区', '400039');
INSERT INTO `wfx_location_area` VALUES (2152, '236', '江津区', '402260');
INSERT INTO `wfx_location_area` VALUES (2153, '236', '合川区', '401520');
INSERT INTO `wfx_location_area` VALUES (2154, '236', '永川区', '402160');
INSERT INTO `wfx_location_area` VALUES (2155, '236', '南川区', '408400');
INSERT INTO `wfx_location_area` VALUES (2156, '237', '锦江区', '610021');
INSERT INTO `wfx_location_area` VALUES (2157, '237', '青羊区', '610031');
INSERT INTO `wfx_location_area` VALUES (2158, '237', '金牛区', '610036');
INSERT INTO `wfx_location_area` VALUES (2159, '237', '武侯区', '610041');
INSERT INTO `wfx_location_area` VALUES (2160, '237', '成华区', '610066');
INSERT INTO `wfx_location_area` VALUES (2161, '237', '龙泉驿区', '610100');
INSERT INTO `wfx_location_area` VALUES (2162, '237', '青白江区', '610300');
INSERT INTO `wfx_location_area` VALUES (2163, '237', '新都区', '610500');
INSERT INTO `wfx_location_area` VALUES (2164, '237', '温江区', '611130');
INSERT INTO `wfx_location_area` VALUES (2165, '237', '金堂县', '610400');
INSERT INTO `wfx_location_area` VALUES (2166, '237', '双流县', '610200');
INSERT INTO `wfx_location_area` VALUES (2167, '237', '郫县', '611700');
INSERT INTO `wfx_location_area` VALUES (2168, '237', '大邑县', '611300');
INSERT INTO `wfx_location_area` VALUES (2169, '237', '蒲江县', '611630');
INSERT INTO `wfx_location_area` VALUES (2170, '237', '新津县', '611430');
INSERT INTO `wfx_location_area` VALUES (2171, '237', '都江堰市', '611830');
INSERT INTO `wfx_location_area` VALUES (2172, '237', '彭州市', '611930');
INSERT INTO `wfx_location_area` VALUES (2173, '237', '邛崃市', '611530');
INSERT INTO `wfx_location_area` VALUES (2174, '237', '崇州市', '611230');
INSERT INTO `wfx_location_area` VALUES (2175, '237', '高新区', '610041');
INSERT INTO `wfx_location_area` VALUES (2176, '237', '高新西区', '611731');
INSERT INTO `wfx_location_area` VALUES (2177, '238', '自流井区', '643000');
INSERT INTO `wfx_location_area` VALUES (2178, '238', '贡井区', '643020');
INSERT INTO `wfx_location_area` VALUES (2179, '238', '大安区', '643010');
INSERT INTO `wfx_location_area` VALUES (2180, '238', '沿滩区', '643030');
INSERT INTO `wfx_location_area` VALUES (2181, '238', '荣县', '643100');
INSERT INTO `wfx_location_area` VALUES (2182, '238', '富顺县', '643200');
INSERT INTO `wfx_location_area` VALUES (2183, '239', '东区', '617067');
INSERT INTO `wfx_location_area` VALUES (2184, '239', '西区', '617068');
INSERT INTO `wfx_location_area` VALUES (2185, '239', '仁和区', '617061');
INSERT INTO `wfx_location_area` VALUES (2186, '239', '米易县', '617200');
INSERT INTO `wfx_location_area` VALUES (2187, '239', '盐边县', '617100');
INSERT INTO `wfx_location_area` VALUES (2188, '240', '江阳区', '646000');
INSERT INTO `wfx_location_area` VALUES (2189, '240', '纳溪区', '646300');
INSERT INTO `wfx_location_area` VALUES (2190, '240', '龙马潭区', '646000');
INSERT INTO `wfx_location_area` VALUES (2191, '240', '泸县', '646106');
INSERT INTO `wfx_location_area` VALUES (2192, '240', '合江县', '646200');
INSERT INTO `wfx_location_area` VALUES (2193, '240', '叙永县', '646400');
INSERT INTO `wfx_location_area` VALUES (2194, '240', '古蔺县', '646500');
INSERT INTO `wfx_location_area` VALUES (2195, '241', '旌阳区', '618000');
INSERT INTO `wfx_location_area` VALUES (2196, '241', '中江县', '618100');
INSERT INTO `wfx_location_area` VALUES (2197, '241', '罗江县', '618500');
INSERT INTO `wfx_location_area` VALUES (2198, '241', '广汉市', '618300');
INSERT INTO `wfx_location_area` VALUES (2199, '241', '什邡市', '618400');
INSERT INTO `wfx_location_area` VALUES (2200, '241', '绵竹市', '618200');
INSERT INTO `wfx_location_area` VALUES (2201, '242', '涪城区', '621000');
INSERT INTO `wfx_location_area` VALUES (2202, '242', '游仙区', '621022');
INSERT INTO `wfx_location_area` VALUES (2203, '242', '三台县', '621100');
INSERT INTO `wfx_location_area` VALUES (2204, '242', '盐亭县', '621600');
INSERT INTO `wfx_location_area` VALUES (2205, '242', '安县', '622650');
INSERT INTO `wfx_location_area` VALUES (2206, '242', '梓潼县', '622150');
INSERT INTO `wfx_location_area` VALUES (2207, '242', '北川羌族自治县', '622750');
INSERT INTO `wfx_location_area` VALUES (2208, '242', '平武县', '622550');
INSERT INTO `wfx_location_area` VALUES (2209, '242', '江油市', '621700');
INSERT INTO `wfx_location_area` VALUES (2210, '242', '农科区', '621023');
INSERT INTO `wfx_location_area` VALUES (2211, '242', '经济技术开发区', '621000');
INSERT INTO `wfx_location_area` VALUES (2212, '242', '高新区', '621000');
INSERT INTO `wfx_location_area` VALUES (2213, '242', '仙海区', '621007');
INSERT INTO `wfx_location_area` VALUES (2214, '243', '利州区', '628017');
INSERT INTO `wfx_location_area` VALUES (2215, '243', '元坝区', '628017');
INSERT INTO `wfx_location_area` VALUES (2216, '243', '朝天区', '628017');
INSERT INTO `wfx_location_area` VALUES (2217, '243', '旺苍县', '628200');
INSERT INTO `wfx_location_area` VALUES (2218, '243', '青川县', '628100');
INSERT INTO `wfx_location_area` VALUES (2219, '243', '剑阁县', '628300');
INSERT INTO `wfx_location_area` VALUES (2220, '243', '苍溪县', '628400');
INSERT INTO `wfx_location_area` VALUES (2221, '244', '船山区', '629000');
INSERT INTO `wfx_location_area` VALUES (2222, '244', '安居区', '629000');
INSERT INTO `wfx_location_area` VALUES (2223, '244', '蓬溪县', '629100');
INSERT INTO `wfx_location_area` VALUES (2224, '244', '射洪县', '629200');
INSERT INTO `wfx_location_area` VALUES (2225, '244', '大英县', '629300');
INSERT INTO `wfx_location_area` VALUES (2226, '245', '市中区', '641000');
INSERT INTO `wfx_location_area` VALUES (2227, '245', '东兴区', '641100');
INSERT INTO `wfx_location_area` VALUES (2228, '245', '威远县', '642450');
INSERT INTO `wfx_location_area` VALUES (2229, '245', '资中县', '641200');
INSERT INTO `wfx_location_area` VALUES (2230, '245', '隆昌县', '642150');
INSERT INTO `wfx_location_area` VALUES (2231, '246', '市中区', '614000');
INSERT INTO `wfx_location_area` VALUES (2232, '246', '沙湾区', '614900');
INSERT INTO `wfx_location_area` VALUES (2233, '246', '五通桥区', '614800');
INSERT INTO `wfx_location_area` VALUES (2234, '246', '金口河区', '614700');
INSERT INTO `wfx_location_area` VALUES (2235, '246', '犍为县', '614400');
INSERT INTO `wfx_location_area` VALUES (2236, '246', '井研县', '613100');
INSERT INTO `wfx_location_area` VALUES (2237, '246', '夹江县', '614100');
INSERT INTO `wfx_location_area` VALUES (2238, '246', '沐川县', '614500');
INSERT INTO `wfx_location_area` VALUES (2239, '246', '峨边彝族自治县', '614300');
INSERT INTO `wfx_location_area` VALUES (2240, '246', '马边彝族自治县', '614600');
INSERT INTO `wfx_location_area` VALUES (2241, '246', '峨眉山市', '614200');
INSERT INTO `wfx_location_area` VALUES (2242, '247', '顺庆区', '637000');
INSERT INTO `wfx_location_area` VALUES (2243, '247', '高坪区', '637100');
INSERT INTO `wfx_location_area` VALUES (2244, '247', '嘉陵区', '637100');
INSERT INTO `wfx_location_area` VALUES (2245, '247', '南部县', '637300');
INSERT INTO `wfx_location_area` VALUES (2246, '247', '营山县', '637700');
INSERT INTO `wfx_location_area` VALUES (2247, '247', '蓬安县', '637800');
INSERT INTO `wfx_location_area` VALUES (2248, '247', '仪陇县', '637600');
INSERT INTO `wfx_location_area` VALUES (2249, '247', '西充县', '637200');
INSERT INTO `wfx_location_area` VALUES (2250, '247', '阆中市', '637400');
INSERT INTO `wfx_location_area` VALUES (2251, '248', '东坡区', '620010');
INSERT INTO `wfx_location_area` VALUES (2252, '248', '仁寿县', '620500');
INSERT INTO `wfx_location_area` VALUES (2253, '248', '彭山县', '620860');
INSERT INTO `wfx_location_area` VALUES (2254, '248', '洪雅县', '620360');
INSERT INTO `wfx_location_area` VALUES (2255, '248', '丹棱县', '620200');
INSERT INTO `wfx_location_area` VALUES (2256, '248', '青神县', '620460');
INSERT INTO `wfx_location_area` VALUES (2257, '249', '翠屏区', '644000');
INSERT INTO `wfx_location_area` VALUES (2258, '249', '宜宾县', '644600');
INSERT INTO `wfx_location_area` VALUES (2259, '249', '南溪县', '644100');
INSERT INTO `wfx_location_area` VALUES (2260, '249', '江安县', '644200');
INSERT INTO `wfx_location_area` VALUES (2261, '249', '长宁县', '644300');
INSERT INTO `wfx_location_area` VALUES (2262, '249', '高县', '645150');
INSERT INTO `wfx_location_area` VALUES (2263, '249', '珙县', '644500');
INSERT INTO `wfx_location_area` VALUES (2264, '249', '筠连县', '645250');
INSERT INTO `wfx_location_area` VALUES (2265, '249', '兴文县', '644400');
INSERT INTO `wfx_location_area` VALUES (2266, '249', '屏山县', '645350');
INSERT INTO `wfx_location_area` VALUES (2267, '250', '广安区', '638000');
INSERT INTO `wfx_location_area` VALUES (2268, '250', '岳池县', '638300');
INSERT INTO `wfx_location_area` VALUES (2269, '250', '武胜县', '638400');
INSERT INTO `wfx_location_area` VALUES (2270, '250', '邻水县', '638500');
INSERT INTO `wfx_location_area` VALUES (2271, '250', '华蓥市', '638600');
INSERT INTO `wfx_location_area` VALUES (2272, '251', '通川区', '635000');
INSERT INTO `wfx_location_area` VALUES (2273, '251', '达县', '635000');
INSERT INTO `wfx_location_area` VALUES (2274, '251', '宣汉县', '636150');
INSERT INTO `wfx_location_area` VALUES (2275, '251', '开江县', '636250');
INSERT INTO `wfx_location_area` VALUES (2276, '251', '大竹县', '635100');
INSERT INTO `wfx_location_area` VALUES (2277, '251', '渠县', '635200');
INSERT INTO `wfx_location_area` VALUES (2278, '251', '万源市', '636350');
INSERT INTO `wfx_location_area` VALUES (2279, '252', '雨城区', '625000');
INSERT INTO `wfx_location_area` VALUES (2280, '252', '名山县', '625100');
INSERT INTO `wfx_location_area` VALUES (2281, '252', '荥经县', '625200');
INSERT INTO `wfx_location_area` VALUES (2282, '252', '汉源县', '625300');
INSERT INTO `wfx_location_area` VALUES (2283, '252', '石棉县', '625400');
INSERT INTO `wfx_location_area` VALUES (2284, '252', '天全县', '625500');
INSERT INTO `wfx_location_area` VALUES (2285, '252', '芦山县', '625600');
INSERT INTO `wfx_location_area` VALUES (2286, '252', '宝兴县', '625700');
INSERT INTO `wfx_location_area` VALUES (2287, '253', '巴州区', '636001');
INSERT INTO `wfx_location_area` VALUES (2288, '253', '通江县', '636700');
INSERT INTO `wfx_location_area` VALUES (2289, '253', '南江县', '636600');
INSERT INTO `wfx_location_area` VALUES (2290, '253', '平昌县', '636400');
INSERT INTO `wfx_location_area` VALUES (2291, '254', '雁江区', '641300');
INSERT INTO `wfx_location_area` VALUES (2292, '254', '安岳县', '642350');
INSERT INTO `wfx_location_area` VALUES (2293, '254', '乐至县', '641500');
INSERT INTO `wfx_location_area` VALUES (2294, '254', '简阳市', '641400');
INSERT INTO `wfx_location_area` VALUES (2295, '255', '汶川县', '623000');
INSERT INTO `wfx_location_area` VALUES (2296, '255', '理县', '623100');
INSERT INTO `wfx_location_area` VALUES (2297, '255', '茂县', '623200');
INSERT INTO `wfx_location_area` VALUES (2298, '255', '松潘县', '623300');
INSERT INTO `wfx_location_area` VALUES (2299, '255', '九寨沟县', '623400');
INSERT INTO `wfx_location_area` VALUES (2300, '255', '金川县', '624100');
INSERT INTO `wfx_location_area` VALUES (2301, '255', '小金县', '624200');
INSERT INTO `wfx_location_area` VALUES (2302, '255', '黑水县', '623500');
INSERT INTO `wfx_location_area` VALUES (2303, '255', '马尔康县', '624000');
INSERT INTO `wfx_location_area` VALUES (2304, '255', '壤塘县', '624300');
INSERT INTO `wfx_location_area` VALUES (2305, '255', '阿坝县', '624600');
INSERT INTO `wfx_location_area` VALUES (2306, '255', '若尔盖县', '624500');
INSERT INTO `wfx_location_area` VALUES (2307, '255', '红原县', '624400');
INSERT INTO `wfx_location_area` VALUES (2308, '256', '康定县', '626000');
INSERT INTO `wfx_location_area` VALUES (2309, '256', '泸定县', '626100');
INSERT INTO `wfx_location_area` VALUES (2310, '256', '丹巴县', '626300');
INSERT INTO `wfx_location_area` VALUES (2311, '256', '九龙县', '626200');
INSERT INTO `wfx_location_area` VALUES (2312, '256', '雅江县', '627450');
INSERT INTO `wfx_location_area` VALUES (2313, '256', '道孚县', '626400');
INSERT INTO `wfx_location_area` VALUES (2314, '256', '炉霍县', '626500');
INSERT INTO `wfx_location_area` VALUES (2315, '256', '甘孜县', '626700');
INSERT INTO `wfx_location_area` VALUES (2316, '256', '新龙县', '626800');
INSERT INTO `wfx_location_area` VALUES (2317, '256', '德格县', '627250');
INSERT INTO `wfx_location_area` VALUES (2318, '256', '白玉县', '627150');
INSERT INTO `wfx_location_area` VALUES (2319, '256', '石渠县', '627350');
INSERT INTO `wfx_location_area` VALUES (2320, '256', '色达县', '626600');
INSERT INTO `wfx_location_area` VALUES (2321, '256', '理塘县', '627550');
INSERT INTO `wfx_location_area` VALUES (2322, '256', '巴塘县', '627650');
INSERT INTO `wfx_location_area` VALUES (2323, '256', '乡城县', '627850');
INSERT INTO `wfx_location_area` VALUES (2324, '256', '稻城县', '627750');
INSERT INTO `wfx_location_area` VALUES (2325, '256', '得荣县', '627950');
INSERT INTO `wfx_location_area` VALUES (2326, '257', '西昌市', '615000');
INSERT INTO `wfx_location_area` VALUES (2327, '257', '木里藏族自治县', '615800');
INSERT INTO `wfx_location_area` VALUES (2328, '257', '盐源县', '615700');
INSERT INTO `wfx_location_area` VALUES (2329, '257', '德昌县', '615500');
INSERT INTO `wfx_location_area` VALUES (2330, '257', '会理县', '615100');
INSERT INTO `wfx_location_area` VALUES (2331, '257', '会东县', '615200');
INSERT INTO `wfx_location_area` VALUES (2332, '257', '宁南县', '615400');
INSERT INTO `wfx_location_area` VALUES (2333, '257', '普格县', '615300');
INSERT INTO `wfx_location_area` VALUES (2334, '257', '布拖县', '615350');
INSERT INTO `wfx_location_area` VALUES (2335, '257', '金阳县', '616250');
INSERT INTO `wfx_location_area` VALUES (2336, '257', '昭觉县', '616150');
INSERT INTO `wfx_location_area` VALUES (2337, '257', '喜德县', '616750');
INSERT INTO `wfx_location_area` VALUES (2338, '257', '冕宁县', '615600');
INSERT INTO `wfx_location_area` VALUES (2339, '257', '越西县', '616650');
INSERT INTO `wfx_location_area` VALUES (2340, '257', '甘洛县', '616850');
INSERT INTO `wfx_location_area` VALUES (2341, '257', '美姑县', '616450');
INSERT INTO `wfx_location_area` VALUES (2342, '257', '雷波县', '616550');
INSERT INTO `wfx_location_area` VALUES (2343, '258', '南明区', '550001');
INSERT INTO `wfx_location_area` VALUES (2344, '258', '云岩区', '550001');
INSERT INTO `wfx_location_area` VALUES (2345, '258', '花溪区', '550025');
INSERT INTO `wfx_location_area` VALUES (2346, '258', '乌当区', '550018');
INSERT INTO `wfx_location_area` VALUES (2347, '258', '白云区', '550014');
INSERT INTO `wfx_location_area` VALUES (2348, '258', '小河区', '550009');
INSERT INTO `wfx_location_area` VALUES (2349, '258', '开阳县', '550300');
INSERT INTO `wfx_location_area` VALUES (2350, '258', '息烽县', '551100');
INSERT INTO `wfx_location_area` VALUES (2351, '258', '修文县', '550200');
INSERT INTO `wfx_location_area` VALUES (2352, '258', '清镇市', '551400');
INSERT INTO `wfx_location_area` VALUES (2353, '258', '金阳新区', '550081');
INSERT INTO `wfx_location_area` VALUES (2354, '259', '钟山区', '553000');
INSERT INTO `wfx_location_area` VALUES (2355, '259', '六枝特区', '553400');
INSERT INTO `wfx_location_area` VALUES (2356, '259', '水城县', '553000');
INSERT INTO `wfx_location_area` VALUES (2357, '259', '盘县', '561601');
INSERT INTO `wfx_location_area` VALUES (2358, '260', '红花岗区', '563000');
INSERT INTO `wfx_location_area` VALUES (2359, '260', '汇川区', '563000');
INSERT INTO `wfx_location_area` VALUES (2360, '260', '遵义县', '563100');
INSERT INTO `wfx_location_area` VALUES (2361, '260', '桐梓县', '563200');
INSERT INTO `wfx_location_area` VALUES (2362, '260', '绥阳县', '563300');
INSERT INTO `wfx_location_area` VALUES (2363, '260', '正安县', '563400');
INSERT INTO `wfx_location_area` VALUES (2364, '260', '道真仡佬族苗族自治县', '563500');
INSERT INTO `wfx_location_area` VALUES (2365, '260', '务川仡佬族苗族自治县', '564300');
INSERT INTO `wfx_location_area` VALUES (2366, '260', '凤冈县', '564200');
INSERT INTO `wfx_location_area` VALUES (2367, '260', '湄潭县', '564100');
INSERT INTO `wfx_location_area` VALUES (2368, '260', '余庆县', '564400');
INSERT INTO `wfx_location_area` VALUES (2369, '260', '习水县', '564600');
INSERT INTO `wfx_location_area` VALUES (2370, '260', '赤水市', '564700');
INSERT INTO `wfx_location_area` VALUES (2371, '260', '仁怀市', '564500');
INSERT INTO `wfx_location_area` VALUES (2372, '261', '西秀区', '561000');
INSERT INTO `wfx_location_area` VALUES (2373, '261', '平坝县', '561100');
INSERT INTO `wfx_location_area` VALUES (2374, '261', '普定县', '562100');
INSERT INTO `wfx_location_area` VALUES (2375, '261', '镇宁布依族苗族自治县', '561200');
INSERT INTO `wfx_location_area` VALUES (2376, '261', '关岭布依族苗族自治县', '561300');
INSERT INTO `wfx_location_area` VALUES (2377, '261', '紫云苗族布依族自治县', '550800');
INSERT INTO `wfx_location_area` VALUES (2378, '262', '铜仁市', '554300');
INSERT INTO `wfx_location_area` VALUES (2379, '262', '江口县', '554400');
INSERT INTO `wfx_location_area` VALUES (2380, '262', '玉屏侗族自治县', '554004');
INSERT INTO `wfx_location_area` VALUES (2381, '262', '石阡县', '555100');
INSERT INTO `wfx_location_area` VALUES (2382, '262', '思南县', '565100');
INSERT INTO `wfx_location_area` VALUES (2383, '262', '印江土家族苗族自治县', '555200');
INSERT INTO `wfx_location_area` VALUES (2384, '262', '德江县', '565200');
INSERT INTO `wfx_location_area` VALUES (2385, '262', '沿河土家族自治县', '565300');
INSERT INTO `wfx_location_area` VALUES (2386, '262', '松桃苗族自治县', '554100');
INSERT INTO `wfx_location_area` VALUES (2387, '262', '万山特区', '554200');
INSERT INTO `wfx_location_area` VALUES (2388, '263', '兴义市', '562400');
INSERT INTO `wfx_location_area` VALUES (2389, '263', '兴仁县', '562300');
INSERT INTO `wfx_location_area` VALUES (2390, '263', '普安县', '561500');
INSERT INTO `wfx_location_area` VALUES (2391, '263', '晴隆县', '561400');
INSERT INTO `wfx_location_area` VALUES (2392, '263', '贞丰县', '562200');
INSERT INTO `wfx_location_area` VALUES (2393, '263', '望谟县', '552300');
INSERT INTO `wfx_location_area` VALUES (2394, '263', '册亨县', '552200');
INSERT INTO `wfx_location_area` VALUES (2395, '263', '安龙县', '552400');
INSERT INTO `wfx_location_area` VALUES (2396, '264', '毕节市', '551700');
INSERT INTO `wfx_location_area` VALUES (2397, '264', '大方县', '551600');
INSERT INTO `wfx_location_area` VALUES (2398, '264', '黔西县', '551500');
INSERT INTO `wfx_location_area` VALUES (2399, '264', '金沙县', '551800');
INSERT INTO `wfx_location_area` VALUES (2400, '264', '织金县', '552100');
INSERT INTO `wfx_location_area` VALUES (2401, '264', '纳雍县', '553300');
INSERT INTO `wfx_location_area` VALUES (2402, '264', '威宁彝族回族苗族自治县', '553100');
INSERT INTO `wfx_location_area` VALUES (2403, '264', '赫章县', '553200');
INSERT INTO `wfx_location_area` VALUES (2404, '265', '凯里市', '556000');
INSERT INTO `wfx_location_area` VALUES (2405, '265', '黄平县', '556100');
INSERT INTO `wfx_location_area` VALUES (2406, '265', '施秉县', '556200');
INSERT INTO `wfx_location_area` VALUES (2407, '265', '三穗县', '556500');
INSERT INTO `wfx_location_area` VALUES (2408, '265', '镇远县', '557700');
INSERT INTO `wfx_location_area` VALUES (2409, '265', '岑巩县', '557800');
INSERT INTO `wfx_location_area` VALUES (2410, '265', '天柱县', '556600');
INSERT INTO `wfx_location_area` VALUES (2411, '265', '锦屏县', '556700');
INSERT INTO `wfx_location_area` VALUES (2412, '265', '剑河县', '556400');
INSERT INTO `wfx_location_area` VALUES (2413, '265', '台江县', '556300');
INSERT INTO `wfx_location_area` VALUES (2414, '265', '黎平县', '557300');
INSERT INTO `wfx_location_area` VALUES (2415, '265', '榕江县', '557200');
INSERT INTO `wfx_location_area` VALUES (2416, '265', '从江县', '557400');
INSERT INTO `wfx_location_area` VALUES (2417, '265', '雷山县', '557100');
INSERT INTO `wfx_location_area` VALUES (2418, '265', '麻江县', '557600');
INSERT INTO `wfx_location_area` VALUES (2419, '265', '丹寨县', '557500');
INSERT INTO `wfx_location_area` VALUES (2420, '266', '都匀市', '558000');
INSERT INTO `wfx_location_area` VALUES (2421, '266', '福泉市', '550500');
INSERT INTO `wfx_location_area` VALUES (2422, '266', '荔波县', '558400');
INSERT INTO `wfx_location_area` VALUES (2423, '266', '贵定县', '551300');
INSERT INTO `wfx_location_area` VALUES (2424, '266', '瓮安县', '550400');
INSERT INTO `wfx_location_area` VALUES (2425, '266', '独山县', '558200');
INSERT INTO `wfx_location_area` VALUES (2426, '266', '平塘县', '558300');
INSERT INTO `wfx_location_area` VALUES (2427, '266', '罗甸县', '550100');
INSERT INTO `wfx_location_area` VALUES (2428, '266', '长顺县', '550700');
INSERT INTO `wfx_location_area` VALUES (2429, '266', '龙里县', '551200');
INSERT INTO `wfx_location_area` VALUES (2430, '266', '惠水县', '550600');
INSERT INTO `wfx_location_area` VALUES (2431, '266', '三都水族自治县', '558100');
INSERT INTO `wfx_location_area` VALUES (2432, '267', '五华区', '650032');
INSERT INTO `wfx_location_area` VALUES (2433, '267', '盘龙区', '650051');
INSERT INTO `wfx_location_area` VALUES (2434, '267', '官渡区', '650220');
INSERT INTO `wfx_location_area` VALUES (2435, '267', '西山区', '650100');
INSERT INTO `wfx_location_area` VALUES (2436, '267', '东川区', '654100');
INSERT INTO `wfx_location_area` VALUES (2437, '267', '呈贡县', '650500');
INSERT INTO `wfx_location_area` VALUES (2438, '267', '晋宁县', '650600');
INSERT INTO `wfx_location_area` VALUES (2439, '267', '富民县', '650400');
INSERT INTO `wfx_location_area` VALUES (2440, '267', '宜良县', '652100');
INSERT INTO `wfx_location_area` VALUES (2441, '267', '石林彝族自治县', '652200');
INSERT INTO `wfx_location_area` VALUES (2442, '267', '嵩明县', '651700');
INSERT INTO `wfx_location_area` VALUES (2443, '267', '禄劝彝族苗族自治县', '651500');
INSERT INTO `wfx_location_area` VALUES (2444, '267', '寻甸回族彝族自治县', '655200');
INSERT INTO `wfx_location_area` VALUES (2445, '267', '安宁市', '650300');
INSERT INTO `wfx_location_area` VALUES (2446, '268', '麒麟区', '655000');
INSERT INTO `wfx_location_area` VALUES (2447, '268', '马龙县', '655100');
INSERT INTO `wfx_location_area` VALUES (2448, '268', '陆良县', '655600');
INSERT INTO `wfx_location_area` VALUES (2449, '268', '师宗县', '655700');
INSERT INTO `wfx_location_area` VALUES (2450, '268', '罗平县', '655800');
INSERT INTO `wfx_location_area` VALUES (2451, '268', '富源县', '655500');
INSERT INTO `wfx_location_area` VALUES (2452, '268', '会泽县', '654200');
INSERT INTO `wfx_location_area` VALUES (2453, '268', '沾益县', '655331');
INSERT INTO `wfx_location_area` VALUES (2454, '268', '宣威市', '655400');
INSERT INTO `wfx_location_area` VALUES (2455, '269', '红塔区', '653100');
INSERT INTO `wfx_location_area` VALUES (2456, '269', '江川县', '652600');
INSERT INTO `wfx_location_area` VALUES (2457, '269', '澄江县', '652500');
INSERT INTO `wfx_location_area` VALUES (2458, '269', '通海县', '652700');
INSERT INTO `wfx_location_area` VALUES (2459, '269', '华宁县', '652800');
INSERT INTO `wfx_location_area` VALUES (2460, '269', '易门县', '651100');
INSERT INTO `wfx_location_area` VALUES (2461, '269', '峨山彝族自治县', '653200');
INSERT INTO `wfx_location_area` VALUES (2462, '269', '新平彝族傣族自治县', '653400');
INSERT INTO `wfx_location_area` VALUES (2463, '269', '元江哈尼族彝族傣族自治县', '653300');
INSERT INTO `wfx_location_area` VALUES (2464, '270', '隆阳区', '678000');
INSERT INTO `wfx_location_area` VALUES (2465, '270', '施甸县', '678200');
INSERT INTO `wfx_location_area` VALUES (2466, '270', '腾冲县', '679100');
INSERT INTO `wfx_location_area` VALUES (2467, '270', '龙陵县', '678300');
INSERT INTO `wfx_location_area` VALUES (2468, '270', '昌宁县', '678100');
INSERT INTO `wfx_location_area` VALUES (2469, '271', '昭阳区', '657000');
INSERT INTO `wfx_location_area` VALUES (2470, '271', '鲁甸县', '657100');
INSERT INTO `wfx_location_area` VALUES (2471, '271', '巧家县', '654600');
INSERT INTO `wfx_location_area` VALUES (2472, '271', '盐津县', '657500');
INSERT INTO `wfx_location_area` VALUES (2473, '271', '大关县', '657400');
INSERT INTO `wfx_location_area` VALUES (2474, '271', '永善县', '657300');
INSERT INTO `wfx_location_area` VALUES (2475, '271', '绥江县', '657700');
INSERT INTO `wfx_location_area` VALUES (2476, '271', '镇雄县', '657200');
INSERT INTO `wfx_location_area` VALUES (2477, '271', '彝良县', '657600');
INSERT INTO `wfx_location_area` VALUES (2478, '271', '威信县', '657900');
INSERT INTO `wfx_location_area` VALUES (2479, '271', '水富县', '657800');
INSERT INTO `wfx_location_area` VALUES (2480, '272', '古城区', '674100');
INSERT INTO `wfx_location_area` VALUES (2481, '272', '玉龙纳西族自治县', '674100');
INSERT INTO `wfx_location_area` VALUES (2482, '272', '永胜县', '674200');
INSERT INTO `wfx_location_area` VALUES (2483, '272', '华坪县', '674800');
INSERT INTO `wfx_location_area` VALUES (2484, '272', '宁蒗彝族自治县', '674300');
INSERT INTO `wfx_location_area` VALUES (2485, '273', '思茅区', '665000');
INSERT INTO `wfx_location_area` VALUES (2486, '273', '宁洱哈尼族彝族自治县', '665100');
INSERT INTO `wfx_location_area` VALUES (2487, '273', '墨江哈尼族自治县', '654800');
INSERT INTO `wfx_location_area` VALUES (2488, '273', '景东彝族自治县', '676200');
INSERT INTO `wfx_location_area` VALUES (2489, '273', '景谷傣族彝族自治县', '666400');
INSERT INTO `wfx_location_area` VALUES (2490, '273', '镇沅彝族哈尼族拉祜族自治县', '666500');
INSERT INTO `wfx_location_area` VALUES (2491, '273', '江城哈尼族彝族自治县', '665900');
INSERT INTO `wfx_location_area` VALUES (2492, '273', '孟连傣族拉祜族佤族自治县', '665800');
INSERT INTO `wfx_location_area` VALUES (2493, '273', '澜沧拉祜族自治县', '665600');
INSERT INTO `wfx_location_area` VALUES (2494, '273', '西盟佤族自治县', '665700');
INSERT INTO `wfx_location_area` VALUES (2495, '274', '临翔区', '677000');
INSERT INTO `wfx_location_area` VALUES (2496, '274', '凤庆县', '675900');
INSERT INTO `wfx_location_area` VALUES (2497, '274', '云县', '675800');
INSERT INTO `wfx_location_area` VALUES (2498, '274', '永德县', '677600');
INSERT INTO `wfx_location_area` VALUES (2499, '274', '镇康县', '677704');
INSERT INTO `wfx_location_area` VALUES (2500, '274', '双江拉祜族佤族布朗族傣族自治县', '677300');
INSERT INTO `wfx_location_area` VALUES (2501, '274', '耿马傣族佤族自治县', '677500');
INSERT INTO `wfx_location_area` VALUES (2502, '274', '沧源佤族自治县', '677400');
INSERT INTO `wfx_location_area` VALUES (2503, '275', '楚雄市', '675000');
INSERT INTO `wfx_location_area` VALUES (2504, '275', '双柏县', '675100');
INSERT INTO `wfx_location_area` VALUES (2505, '275', '牟定县', '675500');
INSERT INTO `wfx_location_area` VALUES (2506, '275', '南华县', '675200');
INSERT INTO `wfx_location_area` VALUES (2507, '275', '姚安县', '675300');
INSERT INTO `wfx_location_area` VALUES (2508, '275', '大姚县', '675400');
INSERT INTO `wfx_location_area` VALUES (2509, '275', '永仁县', '651400');
INSERT INTO `wfx_location_area` VALUES (2510, '275', '元谋县', '651300');
INSERT INTO `wfx_location_area` VALUES (2511, '275', '武定县', '651600');
INSERT INTO `wfx_location_area` VALUES (2512, '275', '禄丰县', '651200');
INSERT INTO `wfx_location_area` VALUES (2513, '276', '个旧市', '661000');
INSERT INTO `wfx_location_area` VALUES (2514, '276', '开远市', '661600');
INSERT INTO `wfx_location_area` VALUES (2515, '276', '蒙自县', '661100');
INSERT INTO `wfx_location_area` VALUES (2516, '276', '屏边苗族自治县', '661200');
INSERT INTO `wfx_location_area` VALUES (2517, '276', '建水县', '654300');
INSERT INTO `wfx_location_area` VALUES (2518, '276', '石屏县', '662200');
INSERT INTO `wfx_location_area` VALUES (2519, '276', '弥勒县', '652300');
INSERT INTO `wfx_location_area` VALUES (2520, '276', '泸西县', '652400');
INSERT INTO `wfx_location_area` VALUES (2521, '276', '元阳县', '662400');
INSERT INTO `wfx_location_area` VALUES (2522, '276', '红河县', '654400');
INSERT INTO `wfx_location_area` VALUES (2523, '276', '金平苗族瑶族傣族自治县', '661500');
INSERT INTO `wfx_location_area` VALUES (2524, '276', '绿春县', '662500');
INSERT INTO `wfx_location_area` VALUES (2525, '276', '河口瑶族自治县', '661300');
INSERT INTO `wfx_location_area` VALUES (2526, '277', '文山县', '663000');
INSERT INTO `wfx_location_area` VALUES (2527, '277', '砚山县', '663100');
INSERT INTO `wfx_location_area` VALUES (2528, '277', '西畴县', '663500');
INSERT INTO `wfx_location_area` VALUES (2529, '277', '麻栗坡县', '663600');
INSERT INTO `wfx_location_area` VALUES (2530, '277', '马关县', '663700');
INSERT INTO `wfx_location_area` VALUES (2531, '277', '丘北县', '663200');
INSERT INTO `wfx_location_area` VALUES (2532, '277', '广南县', '663300');
INSERT INTO `wfx_location_area` VALUES (2533, '277', '富宁县', '663400');
INSERT INTO `wfx_location_area` VALUES (2534, '278', '景洪市', '666100');
INSERT INTO `wfx_location_area` VALUES (2535, '278', '勐海县', '666200');
INSERT INTO `wfx_location_area` VALUES (2536, '278', '勐腊县', '666300');
INSERT INTO `wfx_location_area` VALUES (2537, '279', '大理市', '671000');
INSERT INTO `wfx_location_area` VALUES (2538, '279', '漾濞彝族自治县', '672500');
INSERT INTO `wfx_location_area` VALUES (2539, '279', '祥云县', '672100');
INSERT INTO `wfx_location_area` VALUES (2540, '279', '宾川县', '671600');
INSERT INTO `wfx_location_area` VALUES (2541, '279', '弥渡县', '675600');
INSERT INTO `wfx_location_area` VALUES (2542, '279', '南涧彝族自治县', '675700');
INSERT INTO `wfx_location_area` VALUES (2543, '279', '巍山彝族回族自治县', '672400');
INSERT INTO `wfx_location_area` VALUES (2544, '279', '永平县', '672600');
INSERT INTO `wfx_location_area` VALUES (2545, '279', '云龙县', '672700');
INSERT INTO `wfx_location_area` VALUES (2546, '279', '洱源县', '671200');
INSERT INTO `wfx_location_area` VALUES (2547, '279', '剑川县', '671300');
INSERT INTO `wfx_location_area` VALUES (2548, '279', '鹤庆县', '671500');
INSERT INTO `wfx_location_area` VALUES (2549, '280', '瑞丽市', '678600');
INSERT INTO `wfx_location_area` VALUES (2550, '280', '潞西市', '678400');
INSERT INTO `wfx_location_area` VALUES (2551, '280', '梁河县', '679200');
INSERT INTO `wfx_location_area` VALUES (2552, '280', '盈江县', '679300');
INSERT INTO `wfx_location_area` VALUES (2553, '280', '陇川县', '678700');
INSERT INTO `wfx_location_area` VALUES (2554, '281', '泸水县', '673100');
INSERT INTO `wfx_location_area` VALUES (2555, '281', '福贡县', '673400');
INSERT INTO `wfx_location_area` VALUES (2556, '281', '贡山独龙族怒族自治县', '673500');
INSERT INTO `wfx_location_area` VALUES (2557, '281', '兰坪白族普米族自治县', '671400');
INSERT INTO `wfx_location_area` VALUES (2558, '282', '香格里拉县', '674400');
INSERT INTO `wfx_location_area` VALUES (2559, '282', '德钦县', '674500');
INSERT INTO `wfx_location_area` VALUES (2560, '282', '维西傈僳族自治县', '674600');
INSERT INTO `wfx_location_area` VALUES (2561, '283', '城关区', '850000');
INSERT INTO `wfx_location_area` VALUES (2562, '283', '林周县', '852000');
INSERT INTO `wfx_location_area` VALUES (2563, '283', '当雄县', '851500');
INSERT INTO `wfx_location_area` VALUES (2564, '283', '尼木县', '851300');
INSERT INTO `wfx_location_area` VALUES (2565, '283', '曲水县', '850600');
INSERT INTO `wfx_location_area` VALUES (2566, '283', '堆龙德庆县', '851400');
INSERT INTO `wfx_location_area` VALUES (2567, '283', '达孜县', '850100');
INSERT INTO `wfx_location_area` VALUES (2568, '283', '墨竹工卡县', '850200');
INSERT INTO `wfx_location_area` VALUES (2569, '284', '昌都县', '854000');
INSERT INTO `wfx_location_area` VALUES (2570, '284', '江达县', '854100');
INSERT INTO `wfx_location_area` VALUES (2571, '284', '贡觉县', '854200');
INSERT INTO `wfx_location_area` VALUES (2572, '284', '类乌齐县', '855600');
INSERT INTO `wfx_location_area` VALUES (2573, '284', '丁青县', '855700');
INSERT INTO `wfx_location_area` VALUES (2574, '284', '察雅县', '854300');
INSERT INTO `wfx_location_area` VALUES (2575, '284', '八宿县', '854600');
INSERT INTO `wfx_location_area` VALUES (2576, '284', '左贡县', '854400');
INSERT INTO `wfx_location_area` VALUES (2577, '284', '芒康县', '854500');
INSERT INTO `wfx_location_area` VALUES (2578, '284', '洛隆县', '855400');
INSERT INTO `wfx_location_area` VALUES (2579, '284', '边坝县', '855500');
INSERT INTO `wfx_location_area` VALUES (2580, '285', '乃东县', '856100');
INSERT INTO `wfx_location_area` VALUES (2581, '285', '扎囊县', '850800');
INSERT INTO `wfx_location_area` VALUES (2582, '285', '贡嘎县', '850700');
INSERT INTO `wfx_location_area` VALUES (2583, '285', '桑日县', '856200');
INSERT INTO `wfx_location_area` VALUES (2584, '285', '琼结县', '856800');
INSERT INTO `wfx_location_area` VALUES (2585, '285', '曲松县', '856300');
INSERT INTO `wfx_location_area` VALUES (2586, '285', '措美县', '856900');
INSERT INTO `wfx_location_area` VALUES (2587, '285', '洛扎县', '851200');
INSERT INTO `wfx_location_area` VALUES (2588, '285', '加查县', '856400');
INSERT INTO `wfx_location_area` VALUES (2589, '285', '隆子县', '856600');
INSERT INTO `wfx_location_area` VALUES (2590, '285', '错那县', '856700');
INSERT INTO `wfx_location_area` VALUES (2591, '285', '浪卡子县', '851000');
INSERT INTO `wfx_location_area` VALUES (2592, '286', '日喀则市', '857000');
INSERT INTO `wfx_location_area` VALUES (2593, '286', '南木林县', '857100');
INSERT INTO `wfx_location_area` VALUES (2594, '286', '江孜县', '857400');
INSERT INTO `wfx_location_area` VALUES (2595, '286', '定日县', '858200');
INSERT INTO `wfx_location_area` VALUES (2596, '286', '萨迦县', '857800');
INSERT INTO `wfx_location_area` VALUES (2597, '286', '拉孜县', '858100');
INSERT INTO `wfx_location_area` VALUES (2598, '286', '昂仁县', '858500');
INSERT INTO `wfx_location_area` VALUES (2599, '286', '谢通门县', '858900');
INSERT INTO `wfx_location_area` VALUES (2600, '286', '白朗县', '857300');
INSERT INTO `wfx_location_area` VALUES (2601, '286', '仁布县', '857200');
INSERT INTO `wfx_location_area` VALUES (2602, '286', '康马县', '857500');
INSERT INTO `wfx_location_area` VALUES (2603, '286', '定结县', '857900');
INSERT INTO `wfx_location_area` VALUES (2604, '286', '仲巴县', '858800');
INSERT INTO `wfx_location_area` VALUES (2605, '286', '亚东县', '857600');
INSERT INTO `wfx_location_area` VALUES (2606, '286', '吉隆县', '858700');
INSERT INTO `wfx_location_area` VALUES (2607, '286', '聂拉木县', '858300');
INSERT INTO `wfx_location_area` VALUES (2608, '286', '萨嘎县', '857800');
INSERT INTO `wfx_location_area` VALUES (2609, '286', '岗巴县', '857700');
INSERT INTO `wfx_location_area` VALUES (2610, '287', '那曲县', '852000');
INSERT INTO `wfx_location_area` VALUES (2611, '287', '嘉黎县', '852400');
INSERT INTO `wfx_location_area` VALUES (2612, '287', '比如县', '852300');
INSERT INTO `wfx_location_area` VALUES (2613, '287', '聂荣县', '853500');
INSERT INTO `wfx_location_area` VALUES (2614, '287', '安多县', '852600');
INSERT INTO `wfx_location_area` VALUES (2615, '287', '申扎县', '853100');
INSERT INTO `wfx_location_area` VALUES (2616, '287', '索县', '852200');
INSERT INTO `wfx_location_area` VALUES (2617, '287', '班戈县', '852500');
INSERT INTO `wfx_location_area` VALUES (2618, '287', '巴青县', '852100');
INSERT INTO `wfx_location_area` VALUES (2619, '287', '尼玛县', '853200');
INSERT INTO `wfx_location_area` VALUES (2620, '288', '普兰县', '859500');
INSERT INTO `wfx_location_area` VALUES (2621, '288', '札达县', '859600');
INSERT INTO `wfx_location_area` VALUES (2622, '288', '噶尔县', '859400');
INSERT INTO `wfx_location_area` VALUES (2623, '288', '日土县', '859700');
INSERT INTO `wfx_location_area` VALUES (2624, '288', '革吉县', '859100');
INSERT INTO `wfx_location_area` VALUES (2625, '288', '改则县', '859200');
INSERT INTO `wfx_location_area` VALUES (2626, '288', '措勤县', '859300');
INSERT INTO `wfx_location_area` VALUES (2627, '289', '林芝县', '850400');
INSERT INTO `wfx_location_area` VALUES (2628, '289', '工布江达县', '850300');
INSERT INTO `wfx_location_area` VALUES (2629, '289', '米林县', '860500');
INSERT INTO `wfx_location_area` VALUES (2630, '289', '墨脱县', '855300');
INSERT INTO `wfx_location_area` VALUES (2631, '289', '波密县', '855200');
INSERT INTO `wfx_location_area` VALUES (2632, '289', '察隅县', '855100');
INSERT INTO `wfx_location_area` VALUES (2633, '289', '朗县', '856500');
INSERT INTO `wfx_location_area` VALUES (2634, '290', '新城区', '710004');
INSERT INTO `wfx_location_area` VALUES (2635, '290', '碑林区', '710001');
INSERT INTO `wfx_location_area` VALUES (2636, '290', '莲湖区', '710003');
INSERT INTO `wfx_location_area` VALUES (2637, '290', '灞桥区', '710038');
INSERT INTO `wfx_location_area` VALUES (2638, '290', '未央区', '710014');
INSERT INTO `wfx_location_area` VALUES (2639, '290', '雁塔区', '710061');
INSERT INTO `wfx_location_area` VALUES (2640, '290', '阎良区', '710087');
INSERT INTO `wfx_location_area` VALUES (2641, '290', '临潼区', '710600');
INSERT INTO `wfx_location_area` VALUES (2642, '290', '长安区', '710100');
INSERT INTO `wfx_location_area` VALUES (2643, '290', '蓝田县', '710500');
INSERT INTO `wfx_location_area` VALUES (2644, '290', '周至县', '710400');
INSERT INTO `wfx_location_area` VALUES (2645, '290', '户县', '710300');
INSERT INTO `wfx_location_area` VALUES (2646, '290', '高陵县', '710200');
INSERT INTO `wfx_location_area` VALUES (2647, '290', '高新区', '710075');
INSERT INTO `wfx_location_area` VALUES (2648, '291', '王益区', '727000');
INSERT INTO `wfx_location_area` VALUES (2649, '291', '印台区', '727007');
INSERT INTO `wfx_location_area` VALUES (2650, '291', '耀州区', '727100');
INSERT INTO `wfx_location_area` VALUES (2651, '291', '宜君县', '727200');
INSERT INTO `wfx_location_area` VALUES (2652, '291', '新区', '727100');
INSERT INTO `wfx_location_area` VALUES (2653, '292', '渭滨区', '721000');
INSERT INTO `wfx_location_area` VALUES (2654, '292', '金台区', '721000');
INSERT INTO `wfx_location_area` VALUES (2655, '292', '陈仓区', '721300');
INSERT INTO `wfx_location_area` VALUES (2656, '292', '凤翔县', '721400');
INSERT INTO `wfx_location_area` VALUES (2657, '292', '岐山县', '722400');
INSERT INTO `wfx_location_area` VALUES (2658, '292', '扶风县', '722200');
INSERT INTO `wfx_location_area` VALUES (2659, '292', '眉县', '722300');
INSERT INTO `wfx_location_area` VALUES (2660, '292', '陇县', '721200');
INSERT INTO `wfx_location_area` VALUES (2661, '292', '千阳县', '721100');
INSERT INTO `wfx_location_area` VALUES (2662, '292', '麟游县', '721500');
INSERT INTO `wfx_location_area` VALUES (2663, '292', '凤县', '721700');
INSERT INTO `wfx_location_area` VALUES (2664, '292', '太白县', '721600');
INSERT INTO `wfx_location_area` VALUES (2665, '293', '秦都区', '712000');
INSERT INTO `wfx_location_area` VALUES (2666, '293', '渭城区', '712000');
INSERT INTO `wfx_location_area` VALUES (2667, '293', '杨陵区', '712100');
INSERT INTO `wfx_location_area` VALUES (2668, '293', '三原县', '713800');
INSERT INTO `wfx_location_area` VALUES (2669, '293', '泾阳县', '713700');
INSERT INTO `wfx_location_area` VALUES (2670, '293', '兴平市', '713100');
INSERT INTO `wfx_location_area` VALUES (2671, '293', '乾县', '713300');
INSERT INTO `wfx_location_area` VALUES (2672, '293', '礼泉县', '713200');
INSERT INTO `wfx_location_area` VALUES (2673, '293', '永寿县', '713400');
INSERT INTO `wfx_location_area` VALUES (2674, '293', '彬县', '713500');
INSERT INTO `wfx_location_area` VALUES (2675, '293', '长武县', '713600');
INSERT INTO `wfx_location_area` VALUES (2676, '293', '旬邑县', '711300');
INSERT INTO `wfx_location_area` VALUES (2677, '293', '淳化县', '711200');
INSERT INTO `wfx_location_area` VALUES (2678, '293', '武功县', '712200');
INSERT INTO `wfx_location_area` VALUES (2679, '294', '临渭区', '714000');
INSERT INTO `wfx_location_area` VALUES (2680, '294', '华县', '714100');
INSERT INTO `wfx_location_area` VALUES (2681, '294', '潼关县', '714300');
INSERT INTO `wfx_location_area` VALUES (2682, '294', '大荔县', '715100');
INSERT INTO `wfx_location_area` VALUES (2683, '294', '合阳县', '715300');
INSERT INTO `wfx_location_area` VALUES (2684, '294', '澄城县', '715200');
INSERT INTO `wfx_location_area` VALUES (2685, '294', '蒲城县', '715500');
INSERT INTO `wfx_location_area` VALUES (2686, '294', '白水县', '715600');
INSERT INTO `wfx_location_area` VALUES (2687, '294', '富平县', '711700');
INSERT INTO `wfx_location_area` VALUES (2688, '294', '韩城市', '715400');
INSERT INTO `wfx_location_area` VALUES (2689, '294', '华阴市', '714200');
INSERT INTO `wfx_location_area` VALUES (2690, '295', '宝塔区', '716000');
INSERT INTO `wfx_location_area` VALUES (2691, '295', '延长县', '717100');
INSERT INTO `wfx_location_area` VALUES (2692, '295', '延川县', '717200');
INSERT INTO `wfx_location_area` VALUES (2693, '295', '子长县', '717300');
INSERT INTO `wfx_location_area` VALUES (2694, '295', '安塞县', '717400');
INSERT INTO `wfx_location_area` VALUES (2695, '295', '志丹县', '717500');
INSERT INTO `wfx_location_area` VALUES (2696, '295', '吴旗县', '717600');
INSERT INTO `wfx_location_area` VALUES (2697, '295', '甘泉县', '716100');
INSERT INTO `wfx_location_area` VALUES (2698, '295', '富县', '727500');
INSERT INTO `wfx_location_area` VALUES (2699, '295', '洛川县', '727400');
INSERT INTO `wfx_location_area` VALUES (2700, '295', '宜川县', '716200');
INSERT INTO `wfx_location_area` VALUES (2701, '295', '黄龙县', '715700');
INSERT INTO `wfx_location_area` VALUES (2702, '295', '黄陵县', '727300');
INSERT INTO `wfx_location_area` VALUES (2703, '296', '汉台区', '723000');
INSERT INTO `wfx_location_area` VALUES (2704, '296', '南郑县', '723100');
INSERT INTO `wfx_location_area` VALUES (2705, '296', '城固县', '723200');
INSERT INTO `wfx_location_area` VALUES (2706, '296', '洋县', '723300');
INSERT INTO `wfx_location_area` VALUES (2707, '296', '西乡县', '723500');
INSERT INTO `wfx_location_area` VALUES (2708, '296', '勉县', '724200');
INSERT INTO `wfx_location_area` VALUES (2709, '296', '宁强县', '724400');
INSERT INTO `wfx_location_area` VALUES (2710, '296', '略阳县', '724300');
INSERT INTO `wfx_location_area` VALUES (2711, '296', '镇巴县', '723600');
INSERT INTO `wfx_location_area` VALUES (2712, '296', '留坝县', '724100');
INSERT INTO `wfx_location_area` VALUES (2713, '296', '佛坪县', '723400');
INSERT INTO `wfx_location_area` VALUES (2714, '296', '经济开发区', '723000');
INSERT INTO `wfx_location_area` VALUES (2715, '297', '榆阳区', '719000');
INSERT INTO `wfx_location_area` VALUES (2716, '297', '神木县', '719300');
INSERT INTO `wfx_location_area` VALUES (2717, '297', '府谷县', '719400');
INSERT INTO `wfx_location_area` VALUES (2718, '297', '横山县', '719100');
INSERT INTO `wfx_location_area` VALUES (2719, '297', '靖边县', '718500');
INSERT INTO `wfx_location_area` VALUES (2720, '297', '定边县', '718600');
INSERT INTO `wfx_location_area` VALUES (2721, '297', '绥德县', '718000');
INSERT INTO `wfx_location_area` VALUES (2722, '297', '米脂县', '718100');
INSERT INTO `wfx_location_area` VALUES (2723, '297', '佳县', '719200');
INSERT INTO `wfx_location_area` VALUES (2724, '297', '吴堡县', '718200');
INSERT INTO `wfx_location_area` VALUES (2725, '297', '清涧县', '718300');
INSERT INTO `wfx_location_area` VALUES (2726, '297', '子洲县', '718400');
INSERT INTO `wfx_location_area` VALUES (2727, '298', '汉滨区', '725000');
INSERT INTO `wfx_location_area` VALUES (2728, '298', '汉阴县', '725100');
INSERT INTO `wfx_location_area` VALUES (2729, '298', '石泉县', '725200');
INSERT INTO `wfx_location_area` VALUES (2730, '298', '宁陕县', '711600');
INSERT INTO `wfx_location_area` VALUES (2731, '298', '紫阳县', '725300');
INSERT INTO `wfx_location_area` VALUES (2732, '298', '岚皋县', '725400');
INSERT INTO `wfx_location_area` VALUES (2733, '298', '平利县', '725500');
INSERT INTO `wfx_location_area` VALUES (2734, '298', '镇坪县', '725600');
INSERT INTO `wfx_location_area` VALUES (2735, '298', '旬阳县', '725700');
INSERT INTO `wfx_location_area` VALUES (2736, '298', '白河县', '725800');
INSERT INTO `wfx_location_area` VALUES (2737, '299', '商州区', '726000');
INSERT INTO `wfx_location_area` VALUES (2738, '299', '洛南县', '726100');
INSERT INTO `wfx_location_area` VALUES (2739, '299', '丹凤县', '726200');
INSERT INTO `wfx_location_area` VALUES (2740, '299', '商南县', '726300');
INSERT INTO `wfx_location_area` VALUES (2741, '299', '山阳县', '726400');
INSERT INTO `wfx_location_area` VALUES (2742, '299', '镇安县', '711500');
INSERT INTO `wfx_location_area` VALUES (2743, '299', '柞水县', '711400');
INSERT INTO `wfx_location_area` VALUES (2744, '300', '城关区', '730030');
INSERT INTO `wfx_location_area` VALUES (2745, '300', '七里河区', '730050');
INSERT INTO `wfx_location_area` VALUES (2746, '300', '西固区', '730060');
INSERT INTO `wfx_location_area` VALUES (2747, '300', '安宁区', '730070');
INSERT INTO `wfx_location_area` VALUES (2748, '300', '红古区', '730080');
INSERT INTO `wfx_location_area` VALUES (2749, '300', '永登县', '730300');
INSERT INTO `wfx_location_area` VALUES (2750, '300', '皋兰县', '730200');
INSERT INTO `wfx_location_area` VALUES (2751, '300', '榆中县', '730100');
INSERT INTO `wfx_location_area` VALUES (2752, '301', '嘉峪关市', '735100');
INSERT INTO `wfx_location_area` VALUES (2753, '302', '金川区', '737103');
INSERT INTO `wfx_location_area` VALUES (2754, '302', '永昌县', '737200');
INSERT INTO `wfx_location_area` VALUES (2755, '303', '白银区', '730900');
INSERT INTO `wfx_location_area` VALUES (2756, '303', '平川区', '730913');
INSERT INTO `wfx_location_area` VALUES (2757, '303', '靖远县', '730600');
INSERT INTO `wfx_location_area` VALUES (2758, '303', '会宁县', '730700');
INSERT INTO `wfx_location_area` VALUES (2759, '303', '景泰县', '730400');
INSERT INTO `wfx_location_area` VALUES (2760, '304', '秦州区', '741000');
INSERT INTO `wfx_location_area` VALUES (2761, '304', '麦积区', '741020');
INSERT INTO `wfx_location_area` VALUES (2762, '304', '清水县', '741400');
INSERT INTO `wfx_location_area` VALUES (2763, '304', '秦安县', '741600');
INSERT INTO `wfx_location_area` VALUES (2764, '304', '甘谷县', '741200');
INSERT INTO `wfx_location_area` VALUES (2765, '304', '武山县', '741300');
INSERT INTO `wfx_location_area` VALUES (2766, '304', '张家川回族自治县', '741500');
INSERT INTO `wfx_location_area` VALUES (2767, '305', '凉州区', '733000');
INSERT INTO `wfx_location_area` VALUES (2768, '305', '民勤县', '733300');
INSERT INTO `wfx_location_area` VALUES (2769, '305', '古浪县', '733100');
INSERT INTO `wfx_location_area` VALUES (2770, '305', '天祝藏族自治县', '733200');
INSERT INTO `wfx_location_area` VALUES (2771, '306', '甘州区', '734000');
INSERT INTO `wfx_location_area` VALUES (2772, '306', '肃南裕固族自治县', '734400');
INSERT INTO `wfx_location_area` VALUES (2773, '306', '民乐县', '734500');
INSERT INTO `wfx_location_area` VALUES (2774, '306', '临泽县', '734200');
INSERT INTO `wfx_location_area` VALUES (2775, '306', '高台县', '734300');
INSERT INTO `wfx_location_area` VALUES (2776, '306', '山丹县', '734100');
INSERT INTO `wfx_location_area` VALUES (2777, '307', '崆峒区', '744000');
INSERT INTO `wfx_location_area` VALUES (2778, '307', '泾川县', '744300');
INSERT INTO `wfx_location_area` VALUES (2779, '307', '灵台县', '744400');
INSERT INTO `wfx_location_area` VALUES (2780, '307', '崇信县', '744200');
INSERT INTO `wfx_location_area` VALUES (2781, '307', '华亭县', '744100');
INSERT INTO `wfx_location_area` VALUES (2782, '307', '庄浪县', '744600');
INSERT INTO `wfx_location_area` VALUES (2783, '307', '静宁县', '743400');
INSERT INTO `wfx_location_area` VALUES (2784, '308', '肃州区', '735000');
INSERT INTO `wfx_location_area` VALUES (2785, '308', '金塔县', '735300');
INSERT INTO `wfx_location_area` VALUES (2786, '308', '安西县', '736100');
INSERT INTO `wfx_location_area` VALUES (2787, '308', '肃北蒙古族自治县', '736300');
INSERT INTO `wfx_location_area` VALUES (2788, '308', '阿克塞哈萨克族自治县', '736400');
INSERT INTO `wfx_location_area` VALUES (2789, '308', '玉门市', '735200');
INSERT INTO `wfx_location_area` VALUES (2790, '308', '敦煌市', '736200');
INSERT INTO `wfx_location_area` VALUES (2791, '309', '西峰区', '745000');
INSERT INTO `wfx_location_area` VALUES (2792, '309', '庆城县', '745100');
INSERT INTO `wfx_location_area` VALUES (2793, '309', '环县', '745700');
INSERT INTO `wfx_location_area` VALUES (2794, '309', '华池县', '745600');
INSERT INTO `wfx_location_area` VALUES (2795, '309', '合水县', '745400');
INSERT INTO `wfx_location_area` VALUES (2796, '309', '正宁县', '745300');
INSERT INTO `wfx_location_area` VALUES (2797, '309', '宁县', '745200');
INSERT INTO `wfx_location_area` VALUES (2798, '309', '镇原县', '744500');
INSERT INTO `wfx_location_area` VALUES (2799, '310', '安定区', '744300');
INSERT INTO `wfx_location_area` VALUES (2800, '310', '通渭县', '743300');
INSERT INTO `wfx_location_area` VALUES (2801, '310', '陇西县', '748100');
INSERT INTO `wfx_location_area` VALUES (2802, '310', '渭源县', '748200');
INSERT INTO `wfx_location_area` VALUES (2803, '310', '临洮县', '730500');
INSERT INTO `wfx_location_area` VALUES (2804, '310', '漳县', '748300');
INSERT INTO `wfx_location_area` VALUES (2805, '310', '岷县', '748400');
INSERT INTO `wfx_location_area` VALUES (2806, '311', '武都区', '746000');
INSERT INTO `wfx_location_area` VALUES (2807, '311', '成县', '742500');
INSERT INTO `wfx_location_area` VALUES (2808, '311', '文县', '746400');
INSERT INTO `wfx_location_area` VALUES (2809, '311', '宕昌县', '748500');
INSERT INTO `wfx_location_area` VALUES (2810, '311', '康县', '746500');
INSERT INTO `wfx_location_area` VALUES (2811, '311', '西和县', '742100');
INSERT INTO `wfx_location_area` VALUES (2812, '311', '礼县', '742200');
INSERT INTO `wfx_location_area` VALUES (2813, '311', '徽县', '742300');
INSERT INTO `wfx_location_area` VALUES (2814, '311', '两当县', '742400');
INSERT INTO `wfx_location_area` VALUES (2815, '312', '临夏市', '731100');
INSERT INTO `wfx_location_area` VALUES (2816, '312', '临夏县', '731800');
INSERT INTO `wfx_location_area` VALUES (2817, '312', '康乐县', '731500');
INSERT INTO `wfx_location_area` VALUES (2818, '312', '永靖县', '731600');
INSERT INTO `wfx_location_area` VALUES (2819, '312', '广河县', '731300');
INSERT INTO `wfx_location_area` VALUES (2820, '312', '和政县', '731200');
INSERT INTO `wfx_location_area` VALUES (2821, '312', '东乡族自治县', '731400');
INSERT INTO `wfx_location_area` VALUES (2822, '312', '积石山保安族东乡族撒拉族自治县', '731700');
INSERT INTO `wfx_location_area` VALUES (2823, '313', '合作市', '747000');
INSERT INTO `wfx_location_area` VALUES (2824, '313', '临潭县', '747500');
INSERT INTO `wfx_location_area` VALUES (2825, '313', '卓尼县', '747600');
INSERT INTO `wfx_location_area` VALUES (2826, '313', '舟曲县', '746300');
INSERT INTO `wfx_location_area` VALUES (2827, '313', '迭部县', '747400');
INSERT INTO `wfx_location_area` VALUES (2828, '313', '玛曲县', '747300');
INSERT INTO `wfx_location_area` VALUES (2829, '313', '碌曲县', '747200');
INSERT INTO `wfx_location_area` VALUES (2830, '313', '夏河县', '747100');
INSERT INTO `wfx_location_area` VALUES (2831, '314', '城东区', '810000');
INSERT INTO `wfx_location_area` VALUES (2832, '314', '城中区', '810000');
INSERT INTO `wfx_location_area` VALUES (2833, '314', '城西区', '810000');
INSERT INTO `wfx_location_area` VALUES (2834, '314', '城北区', '810000');
INSERT INTO `wfx_location_area` VALUES (2835, '314', '大通回族土族自治县', '810100');
INSERT INTO `wfx_location_area` VALUES (2836, '314', '湟中县', '811600');
INSERT INTO `wfx_location_area` VALUES (2837, '314', '湟源县', '812100');
INSERT INTO `wfx_location_area` VALUES (2838, '315', '平安县', '810600');
INSERT INTO `wfx_location_area` VALUES (2839, '315', '民和回族土族自治县', '810800');
INSERT INTO `wfx_location_area` VALUES (2840, '315', '乐都县', '810700');
INSERT INTO `wfx_location_area` VALUES (2841, '315', '互助土族自治县', '810500');
INSERT INTO `wfx_location_area` VALUES (2842, '315', '化隆回族自治县', '810900');
INSERT INTO `wfx_location_area` VALUES (2843, '315', '循化撒拉族自治县', '811100');
INSERT INTO `wfx_location_area` VALUES (2844, '316', '门源回族自治县', '810300');
INSERT INTO `wfx_location_area` VALUES (2845, '316', '祁连县', '810400');
INSERT INTO `wfx_location_area` VALUES (2846, '316', '海晏县', '812200');
INSERT INTO `wfx_location_area` VALUES (2847, '316', '刚察县', '812300');
INSERT INTO `wfx_location_area` VALUES (2848, '317', '同仁县', '811300');
INSERT INTO `wfx_location_area` VALUES (2849, '317', '尖扎县', '811200');
INSERT INTO `wfx_location_area` VALUES (2850, '317', '泽库县', '811400');
INSERT INTO `wfx_location_area` VALUES (2851, '317', '河南蒙古族自治县', '811500');
INSERT INTO `wfx_location_area` VALUES (2852, '318', '共和县', '813000');
INSERT INTO `wfx_location_area` VALUES (2853, '318', '同德县', '813200');
INSERT INTO `wfx_location_area` VALUES (2854, '318', '贵德县', '811700');
INSERT INTO `wfx_location_area` VALUES (2855, '318', '兴海县', '813300');
INSERT INTO `wfx_location_area` VALUES (2856, '318', '贵南县', '813100');
INSERT INTO `wfx_location_area` VALUES (2857, '319', '玛沁县', '814000');
INSERT INTO `wfx_location_area` VALUES (2858, '319', '班玛县', '814300');
INSERT INTO `wfx_location_area` VALUES (2859, '319', '甘德县', '814100');
INSERT INTO `wfx_location_area` VALUES (2860, '319', '达日县', '814200');
INSERT INTO `wfx_location_area` VALUES (2861, '319', '久治县', '624700');
INSERT INTO `wfx_location_area` VALUES (2862, '319', '玛多县', '813500');
INSERT INTO `wfx_location_area` VALUES (2863, '320', '玉树县', '815000');
INSERT INTO `wfx_location_area` VALUES (2864, '320', '杂多县', '815300');
INSERT INTO `wfx_location_area` VALUES (2865, '320', '称多县', '815100');
INSERT INTO `wfx_location_area` VALUES (2866, '320', '治多县', '815400');
INSERT INTO `wfx_location_area` VALUES (2867, '320', '囊谦县', '815200');
INSERT INTO `wfx_location_area` VALUES (2868, '320', '曲麻莱县', '815500');
INSERT INTO `wfx_location_area` VALUES (2869, '321', '格尔木市', '816000');
INSERT INTO `wfx_location_area` VALUES (2870, '321', '德令哈市', '817000');
INSERT INTO `wfx_location_area` VALUES (2871, '321', '乌兰县', '817100');
INSERT INTO `wfx_location_area` VALUES (2872, '321', '都兰县', '816100');
INSERT INTO `wfx_location_area` VALUES (2873, '321', '天峻县', '817200');
INSERT INTO `wfx_location_area` VALUES (2874, '321', '大柴旦行委', '817300');
INSERT INTO `wfx_location_area` VALUES (2875, '322', '兴庆区', '750001');
INSERT INTO `wfx_location_area` VALUES (2876, '322', '西夏区', '750021');
INSERT INTO `wfx_location_area` VALUES (2877, '322', '金凤区', '750011');
INSERT INTO `wfx_location_area` VALUES (2878, '322', '永宁县', '750100');
INSERT INTO `wfx_location_area` VALUES (2879, '322', '贺兰县', '750200');
INSERT INTO `wfx_location_area` VALUES (2880, '322', '灵武市', '750004');
INSERT INTO `wfx_location_area` VALUES (2881, '323', '大武口区', '753000');
INSERT INTO `wfx_location_area` VALUES (2882, '323', '惠农区', '753600');
INSERT INTO `wfx_location_area` VALUES (2883, '323', '平罗县', '753400');
INSERT INTO `wfx_location_area` VALUES (2884, '324', '利通区', '751100');
INSERT INTO `wfx_location_area` VALUES (2885, '324', '盐池县', '751500');
INSERT INTO `wfx_location_area` VALUES (2886, '324', '同心县', '751300');
INSERT INTO `wfx_location_area` VALUES (2887, '324', '青铜峡市', '751600');
INSERT INTO `wfx_location_area` VALUES (2888, '325', '原州区', '756000');
INSERT INTO `wfx_location_area` VALUES (2889, '325', '西吉县', '756200');
INSERT INTO `wfx_location_area` VALUES (2890, '325', '隆德县', '756300');
INSERT INTO `wfx_location_area` VALUES (2891, '325', '泾源县', '756400');
INSERT INTO `wfx_location_area` VALUES (2892, '325', '彭阳县', '756500');
INSERT INTO `wfx_location_area` VALUES (2893, '326', '沙坡头区', '755000');
INSERT INTO `wfx_location_area` VALUES (2894, '326', '中宁县', '755100');
INSERT INTO `wfx_location_area` VALUES (2895, '326', '海原县', '755200');
INSERT INTO `wfx_location_area` VALUES (2896, '327', '天山区', '830000');
INSERT INTO `wfx_location_area` VALUES (2897, '327', '沙依巴克区', '830002');
INSERT INTO `wfx_location_area` VALUES (2898, '327', '新市区', '830011');
INSERT INTO `wfx_location_area` VALUES (2899, '327', '水磨沟区', '830017');
INSERT INTO `wfx_location_area` VALUES (2900, '327', '头屯河区', '830022');
INSERT INTO `wfx_location_area` VALUES (2901, '327', '达坂城区', '830039');
INSERT INTO `wfx_location_area` VALUES (2902, '327', '米东区', '830019');
INSERT INTO `wfx_location_area` VALUES (2903, '327', '乌鲁木齐县', '830063');
INSERT INTO `wfx_location_area` VALUES (2904, '328', '独山子区', '834021');
INSERT INTO `wfx_location_area` VALUES (2905, '328', '克拉玛依区', '834000');
INSERT INTO `wfx_location_area` VALUES (2906, '328', '白碱滩区', '834008');
INSERT INTO `wfx_location_area` VALUES (2907, '328', '乌尔禾区', '834012');
INSERT INTO `wfx_location_area` VALUES (2908, '329', '吐鲁番市', '838000');
INSERT INTO `wfx_location_area` VALUES (2909, '329', '鄯善县', '838200');
INSERT INTO `wfx_location_area` VALUES (2910, '329', '托克逊县', '838100');
INSERT INTO `wfx_location_area` VALUES (2911, '330', '哈密市', '839000');
INSERT INTO `wfx_location_area` VALUES (2912, '330', '巴里坤哈萨克自治县', '839200');
INSERT INTO `wfx_location_area` VALUES (2913, '330', '伊吾县', '839300');
INSERT INTO `wfx_location_area` VALUES (2914, '331', '昌吉市', '831100');
INSERT INTO `wfx_location_area` VALUES (2915, '331', '阜康市', '831500');
INSERT INTO `wfx_location_area` VALUES (2916, '331', '米泉市', '831400');
INSERT INTO `wfx_location_area` VALUES (2917, '331', '呼图壁县', '831200');
INSERT INTO `wfx_location_area` VALUES (2918, '331', '玛纳斯县', '832200');
INSERT INTO `wfx_location_area` VALUES (2919, '331', '奇台县', '831800');
INSERT INTO `wfx_location_area` VALUES (2920, '331', '吉木萨尔县', '831700');
INSERT INTO `wfx_location_area` VALUES (2921, '331', '木垒哈萨克自治县', '831900');
INSERT INTO `wfx_location_area` VALUES (2922, '332', '博乐市', '833400');
INSERT INTO `wfx_location_area` VALUES (2923, '332', '精河县', '833300');
INSERT INTO `wfx_location_area` VALUES (2924, '332', '温泉县', '833500');
INSERT INTO `wfx_location_area` VALUES (2925, '333', '库尔勒市', '841000');
INSERT INTO `wfx_location_area` VALUES (2926, '333', '轮台县', '841600');
INSERT INTO `wfx_location_area` VALUES (2927, '333', '尉犁县', '841500');
INSERT INTO `wfx_location_area` VALUES (2928, '333', '若羌县', '841800');
INSERT INTO `wfx_location_area` VALUES (2929, '333', '且末县', '841900');
INSERT INTO `wfx_location_area` VALUES (2930, '333', '焉耆回族自治县', '841100');
INSERT INTO `wfx_location_area` VALUES (2931, '333', '和静县', '841300');
INSERT INTO `wfx_location_area` VALUES (2932, '333', '和硕县', '841200');
INSERT INTO `wfx_location_area` VALUES (2933, '333', '博湖县', '841400');
INSERT INTO `wfx_location_area` VALUES (2934, '334', '阿克苏市', '843000');
INSERT INTO `wfx_location_area` VALUES (2935, '334', '温宿县', '843100');
INSERT INTO `wfx_location_area` VALUES (2936, '334', '库车县', '842000');
INSERT INTO `wfx_location_area` VALUES (2937, '334', '沙雅县', '842200');
INSERT INTO `wfx_location_area` VALUES (2938, '334', '新和县', '842100');
INSERT INTO `wfx_location_area` VALUES (2939, '334', '拜城县', '842300');
INSERT INTO `wfx_location_area` VALUES (2940, '334', '乌什县', '843400');
INSERT INTO `wfx_location_area` VALUES (2941, '334', '阿瓦提县', '843200');
INSERT INTO `wfx_location_area` VALUES (2942, '334', '柯坪县', '843600');
INSERT INTO `wfx_location_area` VALUES (2943, '335', '阿图什市', '845350');
INSERT INTO `wfx_location_area` VALUES (2944, '335', '阿克陶县', '845550');
INSERT INTO `wfx_location_area` VALUES (2945, '335', '阿合奇县', '843500');
INSERT INTO `wfx_location_area` VALUES (2946, '335', '乌恰县', '845450');
INSERT INTO `wfx_location_area` VALUES (2947, '336', '喀什市', '844000');
INSERT INTO `wfx_location_area` VALUES (2948, '336', '疏附县', '844100');
INSERT INTO `wfx_location_area` VALUES (2949, '336', '疏勒县', '844200');
INSERT INTO `wfx_location_area` VALUES (2950, '336', '英吉沙县', '844500');
INSERT INTO `wfx_location_area` VALUES (2951, '336', '泽普县', '844800');
INSERT INTO `wfx_location_area` VALUES (2952, '336', '莎车县', '844700');
INSERT INTO `wfx_location_area` VALUES (2953, '336', '叶城县', '844900');
INSERT INTO `wfx_location_area` VALUES (2954, '336', '麦盖提县', '844600');
INSERT INTO `wfx_location_area` VALUES (2955, '336', '岳普湖县', '844400');
INSERT INTO `wfx_location_area` VALUES (2956, '336', '伽师县', '844300');
INSERT INTO `wfx_location_area` VALUES (2957, '336', '巴楚县', '843800');
INSERT INTO `wfx_location_area` VALUES (2958, '336', '塔什库尔干塔吉克自治县', '845250');
INSERT INTO `wfx_location_area` VALUES (2959, '337', '和田市', '848000');
INSERT INTO `wfx_location_area` VALUES (2960, '337', '和田县', '848000');
INSERT INTO `wfx_location_area` VALUES (2961, '337', '墨玉县', '848100');
INSERT INTO `wfx_location_area` VALUES (2962, '337', '皮山县', '845150');
INSERT INTO `wfx_location_area` VALUES (2963, '337', '洛浦县', '848200');
INSERT INTO `wfx_location_area` VALUES (2964, '337', '策勒县', '848300');
INSERT INTO `wfx_location_area` VALUES (2965, '337', '于田县', '848400');
INSERT INTO `wfx_location_area` VALUES (2966, '337', '民丰县', '848500');
INSERT INTO `wfx_location_area` VALUES (2967, '338', '伊宁市', '835000');
INSERT INTO `wfx_location_area` VALUES (2968, '338', '奎屯市', '833200');
INSERT INTO `wfx_location_area` VALUES (2969, '338', '伊宁县', '835100');
INSERT INTO `wfx_location_area` VALUES (2970, '338', '察布查尔锡伯自治县', '835300');
INSERT INTO `wfx_location_area` VALUES (2971, '338', '霍城县', '835200');
INSERT INTO `wfx_location_area` VALUES (2972, '338', '巩留县', '835400');
INSERT INTO `wfx_location_area` VALUES (2973, '338', '新源县', '835800');
INSERT INTO `wfx_location_area` VALUES (2974, '338', '昭苏县', '835600');
INSERT INTO `wfx_location_area` VALUES (2975, '338', '特克斯县', '835500');
INSERT INTO `wfx_location_area` VALUES (2976, '338', '尼勒克县', '835700');
INSERT INTO `wfx_location_area` VALUES (2977, '339', '塔城市', '834700');
INSERT INTO `wfx_location_area` VALUES (2978, '339', '乌苏市', '833300');
INSERT INTO `wfx_location_area` VALUES (2979, '339', '额敏县', '834600');
INSERT INTO `wfx_location_area` VALUES (2980, '339', '沙湾县', '832100');
INSERT INTO `wfx_location_area` VALUES (2981, '339', '托里县', '834500');
INSERT INTO `wfx_location_area` VALUES (2982, '339', '裕民县', '834800');
INSERT INTO `wfx_location_area` VALUES (2983, '339', '和布克赛尔蒙古自治县', '834400');
INSERT INTO `wfx_location_area` VALUES (2984, '340', '阿勒泰市', '836500');
INSERT INTO `wfx_location_area` VALUES (2985, '340', '布尔津县', '836600');
INSERT INTO `wfx_location_area` VALUES (2986, '340', '富蕴县', '836100');
INSERT INTO `wfx_location_area` VALUES (2987, '340', '福海县', '836400');
INSERT INTO `wfx_location_area` VALUES (2988, '340', '哈巴河县', '836700');
INSERT INTO `wfx_location_area` VALUES (2989, '340', '青河县', '836200');
INSERT INTO `wfx_location_area` VALUES (2990, '340', '吉木乃县', '836800');
INSERT INTO `wfx_location_area` VALUES (2991, '341', '石河子市', '832000');
INSERT INTO `wfx_location_area` VALUES (2992, '341', '阿拉尔市', '843300');
INSERT INTO `wfx_location_area` VALUES (2993, '341', '图木舒克市', '843806');
INSERT INTO `wfx_location_area` VALUES (2994, '341', '五家渠市', '831300');
INSERT INTO `wfx_location_area` VALUES (2995, '342', '香港', '860600');
INSERT INTO `wfx_location_area` VALUES (2996, '343', '澳门', '860700');
INSERT INTO `wfx_location_area` VALUES (2997, '344', '台湾', '860800');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_location_city`
-- 

CREATE TABLE `wfx_location_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(6) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=345 ;

-- 
-- 导出表中的数据 `wfx_location_city`
-- 

INSERT INTO `wfx_location_city` VALUES (1, '1', '北京市');
INSERT INTO `wfx_location_city` VALUES (2, '2', '天津市');
INSERT INTO `wfx_location_city` VALUES (3, '3', '石家庄市');
INSERT INTO `wfx_location_city` VALUES (4, '3', '唐山市');
INSERT INTO `wfx_location_city` VALUES (5, '3', '秦皇岛市');
INSERT INTO `wfx_location_city` VALUES (6, '3', '邯郸市');
INSERT INTO `wfx_location_city` VALUES (7, '3', '邢台市');
INSERT INTO `wfx_location_city` VALUES (8, '3', '保定市');
INSERT INTO `wfx_location_city` VALUES (9, '3', '张家口市');
INSERT INTO `wfx_location_city` VALUES (10, '3', '承德市');
INSERT INTO `wfx_location_city` VALUES (11, '3', '沧州市');
INSERT INTO `wfx_location_city` VALUES (12, '3', '廊坊市');
INSERT INTO `wfx_location_city` VALUES (13, '3', '衡水市');
INSERT INTO `wfx_location_city` VALUES (14, '4', '太原市');
INSERT INTO `wfx_location_city` VALUES (15, '4', '大同市');
INSERT INTO `wfx_location_city` VALUES (16, '4', '阳泉市');
INSERT INTO `wfx_location_city` VALUES (17, '4', '长治市');
INSERT INTO `wfx_location_city` VALUES (18, '4', '晋城市');
INSERT INTO `wfx_location_city` VALUES (19, '4', '朔州市');
INSERT INTO `wfx_location_city` VALUES (20, '4', '晋中市');
INSERT INTO `wfx_location_city` VALUES (21, '4', '运城市');
INSERT INTO `wfx_location_city` VALUES (22, '4', '忻州市');
INSERT INTO `wfx_location_city` VALUES (23, '4', '临汾市');
INSERT INTO `wfx_location_city` VALUES (24, '4', '吕梁市');
INSERT INTO `wfx_location_city` VALUES (25, '5', '呼和浩特市');
INSERT INTO `wfx_location_city` VALUES (26, '5', '包头市');
INSERT INTO `wfx_location_city` VALUES (27, '5', '乌海市');
INSERT INTO `wfx_location_city` VALUES (28, '5', '赤峰市');
INSERT INTO `wfx_location_city` VALUES (29, '5', '通辽市');
INSERT INTO `wfx_location_city` VALUES (30, '5', '鄂尔多斯市');
INSERT INTO `wfx_location_city` VALUES (31, '5', '呼伦贝尔市');
INSERT INTO `wfx_location_city` VALUES (32, '5', '巴彦淖尔市');
INSERT INTO `wfx_location_city` VALUES (33, '5', '乌兰察布市');
INSERT INTO `wfx_location_city` VALUES (34, '5', '兴安盟');
INSERT INTO `wfx_location_city` VALUES (35, '5', '锡林郭勒盟');
INSERT INTO `wfx_location_city` VALUES (36, '5', '阿拉善盟');
INSERT INTO `wfx_location_city` VALUES (37, '6', '沈阳市');
INSERT INTO `wfx_location_city` VALUES (38, '6', '大连市');
INSERT INTO `wfx_location_city` VALUES (39, '6', '鞍山市');
INSERT INTO `wfx_location_city` VALUES (40, '6', '抚顺市');
INSERT INTO `wfx_location_city` VALUES (41, '6', '本溪市');
INSERT INTO `wfx_location_city` VALUES (42, '6', '丹东市');
INSERT INTO `wfx_location_city` VALUES (43, '6', '锦州市');
INSERT INTO `wfx_location_city` VALUES (44, '6', '营口市');
INSERT INTO `wfx_location_city` VALUES (45, '6', '阜新市');
INSERT INTO `wfx_location_city` VALUES (46, '6', '辽阳市');
INSERT INTO `wfx_location_city` VALUES (47, '6', '盘锦市');
INSERT INTO `wfx_location_city` VALUES (48, '6', '铁岭市');
INSERT INTO `wfx_location_city` VALUES (49, '6', '朝阳市');
INSERT INTO `wfx_location_city` VALUES (50, '6', '葫芦岛市');
INSERT INTO `wfx_location_city` VALUES (51, '7', '长春市');
INSERT INTO `wfx_location_city` VALUES (52, '7', '吉林市');
INSERT INTO `wfx_location_city` VALUES (53, '7', '四平市');
INSERT INTO `wfx_location_city` VALUES (54, '7', '辽源市');
INSERT INTO `wfx_location_city` VALUES (55, '7', '通化市');
INSERT INTO `wfx_location_city` VALUES (56, '7', '白山市');
INSERT INTO `wfx_location_city` VALUES (57, '7', '松原市');
INSERT INTO `wfx_location_city` VALUES (58, '7', '白城市');
INSERT INTO `wfx_location_city` VALUES (59, '7', '延边朝鲜族自治州');
INSERT INTO `wfx_location_city` VALUES (60, '8', '哈尔滨市');
INSERT INTO `wfx_location_city` VALUES (61, '8', '齐齐哈尔市');
INSERT INTO `wfx_location_city` VALUES (62, '8', '鸡西市');
INSERT INTO `wfx_location_city` VALUES (63, '8', '鹤岗市');
INSERT INTO `wfx_location_city` VALUES (64, '8', '双鸭山市');
INSERT INTO `wfx_location_city` VALUES (65, '8', '大庆市');
INSERT INTO `wfx_location_city` VALUES (66, '8', '伊春市');
INSERT INTO `wfx_location_city` VALUES (67, '8', '佳木斯市');
INSERT INTO `wfx_location_city` VALUES (68, '8', '七台河市');
INSERT INTO `wfx_location_city` VALUES (69, '8', '牡丹江市');
INSERT INTO `wfx_location_city` VALUES (70, '8', '黑河市');
INSERT INTO `wfx_location_city` VALUES (71, '8', '绥化市');
INSERT INTO `wfx_location_city` VALUES (72, '8', '大兴安岭地区');
INSERT INTO `wfx_location_city` VALUES (73, '9', '上海市');
INSERT INTO `wfx_location_city` VALUES (74, '10', '南京市');
INSERT INTO `wfx_location_city` VALUES (75, '10', '无锡市');
INSERT INTO `wfx_location_city` VALUES (76, '10', '徐州市');
INSERT INTO `wfx_location_city` VALUES (77, '10', '常州市');
INSERT INTO `wfx_location_city` VALUES (78, '10', '苏州市');
INSERT INTO `wfx_location_city` VALUES (79, '10', '南通市');
INSERT INTO `wfx_location_city` VALUES (80, '10', '连云港市');
INSERT INTO `wfx_location_city` VALUES (81, '10', '淮安市');
INSERT INTO `wfx_location_city` VALUES (82, '10', '盐城市');
INSERT INTO `wfx_location_city` VALUES (83, '10', '扬州市');
INSERT INTO `wfx_location_city` VALUES (84, '10', '镇江市');
INSERT INTO `wfx_location_city` VALUES (85, '10', '泰州市');
INSERT INTO `wfx_location_city` VALUES (86, '10', '宿迁市');
INSERT INTO `wfx_location_city` VALUES (87, '11', '杭州市');
INSERT INTO `wfx_location_city` VALUES (88, '11', '宁波市');
INSERT INTO `wfx_location_city` VALUES (89, '11', '温州市');
INSERT INTO `wfx_location_city` VALUES (90, '11', '嘉兴市');
INSERT INTO `wfx_location_city` VALUES (91, '11', '湖州市');
INSERT INTO `wfx_location_city` VALUES (92, '11', '绍兴市');
INSERT INTO `wfx_location_city` VALUES (93, '11', '金华市');
INSERT INTO `wfx_location_city` VALUES (94, '11', '衢州市');
INSERT INTO `wfx_location_city` VALUES (95, '11', '舟山市');
INSERT INTO `wfx_location_city` VALUES (96, '11', '台州市');
INSERT INTO `wfx_location_city` VALUES (97, '11', '丽水市');
INSERT INTO `wfx_location_city` VALUES (98, '12', '合肥市');
INSERT INTO `wfx_location_city` VALUES (99, '12', '芜湖市');
INSERT INTO `wfx_location_city` VALUES (100, '12', '蚌埠市');
INSERT INTO `wfx_location_city` VALUES (101, '12', '淮南市');
INSERT INTO `wfx_location_city` VALUES (102, '12', '马鞍山市');
INSERT INTO `wfx_location_city` VALUES (103, '12', '淮北市');
INSERT INTO `wfx_location_city` VALUES (104, '12', '铜陵市');
INSERT INTO `wfx_location_city` VALUES (105, '12', '安庆市');
INSERT INTO `wfx_location_city` VALUES (106, '12', '黄山市');
INSERT INTO `wfx_location_city` VALUES (107, '12', '滁州市');
INSERT INTO `wfx_location_city` VALUES (108, '12', '阜阳市');
INSERT INTO `wfx_location_city` VALUES (109, '12', '宿州市');
INSERT INTO `wfx_location_city` VALUES (110, '12', '巢湖市');
INSERT INTO `wfx_location_city` VALUES (111, '12', '六安市');
INSERT INTO `wfx_location_city` VALUES (112, '12', '亳州市');
INSERT INTO `wfx_location_city` VALUES (113, '12', '池州市');
INSERT INTO `wfx_location_city` VALUES (114, '12', '宣城市');
INSERT INTO `wfx_location_city` VALUES (115, '13', '福州市');
INSERT INTO `wfx_location_city` VALUES (116, '13', '厦门市');
INSERT INTO `wfx_location_city` VALUES (117, '13', '莆田市');
INSERT INTO `wfx_location_city` VALUES (118, '13', '三明市');
INSERT INTO `wfx_location_city` VALUES (119, '13', '泉州市');
INSERT INTO `wfx_location_city` VALUES (120, '13', '漳州市');
INSERT INTO `wfx_location_city` VALUES (121, '13', '南平市');
INSERT INTO `wfx_location_city` VALUES (122, '13', '龙岩市');
INSERT INTO `wfx_location_city` VALUES (123, '13', '宁德市');
INSERT INTO `wfx_location_city` VALUES (124, '14', '南昌市');
INSERT INTO `wfx_location_city` VALUES (125, '14', '景德镇市');
INSERT INTO `wfx_location_city` VALUES (126, '14', '萍乡市');
INSERT INTO `wfx_location_city` VALUES (127, '14', '九江市');
INSERT INTO `wfx_location_city` VALUES (128, '14', '新余市');
INSERT INTO `wfx_location_city` VALUES (129, '14', '鹰潭市');
INSERT INTO `wfx_location_city` VALUES (130, '14', '赣州市');
INSERT INTO `wfx_location_city` VALUES (131, '14', '吉安市');
INSERT INTO `wfx_location_city` VALUES (132, '14', '宜春市');
INSERT INTO `wfx_location_city` VALUES (133, '14', '抚州市');
INSERT INTO `wfx_location_city` VALUES (134, '14', '上饶市');
INSERT INTO `wfx_location_city` VALUES (135, '15', '济南市');
INSERT INTO `wfx_location_city` VALUES (136, '15', '青岛市');
INSERT INTO `wfx_location_city` VALUES (137, '15', '淄博市');
INSERT INTO `wfx_location_city` VALUES (138, '15', '枣庄市');
INSERT INTO `wfx_location_city` VALUES (139, '15', '东营市');
INSERT INTO `wfx_location_city` VALUES (140, '15', '烟台市');
INSERT INTO `wfx_location_city` VALUES (141, '15', '潍坊市');
INSERT INTO `wfx_location_city` VALUES (142, '15', '济宁市');
INSERT INTO `wfx_location_city` VALUES (143, '15', '泰安市');
INSERT INTO `wfx_location_city` VALUES (144, '15', '威海市');
INSERT INTO `wfx_location_city` VALUES (145, '15', '日照市');
INSERT INTO `wfx_location_city` VALUES (146, '15', '莱芜市');
INSERT INTO `wfx_location_city` VALUES (147, '15', '临沂市');
INSERT INTO `wfx_location_city` VALUES (148, '15', '德州市');
INSERT INTO `wfx_location_city` VALUES (149, '15', '聊城市');
INSERT INTO `wfx_location_city` VALUES (150, '15', '滨州市');
INSERT INTO `wfx_location_city` VALUES (151, '15', '菏泽市');
INSERT INTO `wfx_location_city` VALUES (152, '16', '郑州市');
INSERT INTO `wfx_location_city` VALUES (153, '16', '开封市');
INSERT INTO `wfx_location_city` VALUES (154, '16', '洛阳市');
INSERT INTO `wfx_location_city` VALUES (155, '16', '平顶山市');
INSERT INTO `wfx_location_city` VALUES (156, '16', '安阳市');
INSERT INTO `wfx_location_city` VALUES (157, '16', '鹤壁市');
INSERT INTO `wfx_location_city` VALUES (158, '16', '新乡市');
INSERT INTO `wfx_location_city` VALUES (159, '16', '焦作市');
INSERT INTO `wfx_location_city` VALUES (160, '16', '濮阳市');
INSERT INTO `wfx_location_city` VALUES (161, '16', '许昌市');
INSERT INTO `wfx_location_city` VALUES (162, '16', '漯河市');
INSERT INTO `wfx_location_city` VALUES (163, '16', '三门峡市');
INSERT INTO `wfx_location_city` VALUES (164, '16', '南阳市');
INSERT INTO `wfx_location_city` VALUES (165, '16', '商丘市');
INSERT INTO `wfx_location_city` VALUES (166, '16', '信阳市');
INSERT INTO `wfx_location_city` VALUES (167, '16', '周口市');
INSERT INTO `wfx_location_city` VALUES (168, '16', '驻马店市');
INSERT INTO `wfx_location_city` VALUES (169, '16', '济源市');
INSERT INTO `wfx_location_city` VALUES (170, '17', '武汉市');
INSERT INTO `wfx_location_city` VALUES (171, '17', '黄石市');
INSERT INTO `wfx_location_city` VALUES (172, '17', '十堰市');
INSERT INTO `wfx_location_city` VALUES (173, '17', '宜昌市');
INSERT INTO `wfx_location_city` VALUES (174, '17', '襄樊市');
INSERT INTO `wfx_location_city` VALUES (175, '17', '鄂州市');
INSERT INTO `wfx_location_city` VALUES (176, '17', '荆门市');
INSERT INTO `wfx_location_city` VALUES (177, '17', '孝感市');
INSERT INTO `wfx_location_city` VALUES (178, '17', '荆州市');
INSERT INTO `wfx_location_city` VALUES (179, '17', '黄冈市');
INSERT INTO `wfx_location_city` VALUES (180, '17', '咸宁市');
INSERT INTO `wfx_location_city` VALUES (181, '17', '随州市');
INSERT INTO `wfx_location_city` VALUES (182, '17', '恩施土家族苗族自治州');
INSERT INTO `wfx_location_city` VALUES (183, '17', '省直辖县级行政单位');
INSERT INTO `wfx_location_city` VALUES (184, '18', '长沙市');
INSERT INTO `wfx_location_city` VALUES (185, '18', '株洲市');
INSERT INTO `wfx_location_city` VALUES (186, '18', '湘潭市');
INSERT INTO `wfx_location_city` VALUES (187, '18', '衡阳市');
INSERT INTO `wfx_location_city` VALUES (188, '18', '邵阳市');
INSERT INTO `wfx_location_city` VALUES (189, '18', '岳阳市');
INSERT INTO `wfx_location_city` VALUES (190, '18', '常德市');
INSERT INTO `wfx_location_city` VALUES (191, '18', '张家界市');
INSERT INTO `wfx_location_city` VALUES (192, '18', '益阳市');
INSERT INTO `wfx_location_city` VALUES (193, '18', '郴州市');
INSERT INTO `wfx_location_city` VALUES (194, '18', '永州市');
INSERT INTO `wfx_location_city` VALUES (195, '18', '怀化市');
INSERT INTO `wfx_location_city` VALUES (196, '18', '娄底市');
INSERT INTO `wfx_location_city` VALUES (197, '18', '湘西土家族苗族自治州');
INSERT INTO `wfx_location_city` VALUES (198, '19', '广州市');
INSERT INTO `wfx_location_city` VALUES (199, '19', '韶关市');
INSERT INTO `wfx_location_city` VALUES (200, '19', '深圳市');
INSERT INTO `wfx_location_city` VALUES (201, '19', '珠海市');
INSERT INTO `wfx_location_city` VALUES (202, '19', '汕头市');
INSERT INTO `wfx_location_city` VALUES (203, '19', '佛山市');
INSERT INTO `wfx_location_city` VALUES (204, '19', '江门市');
INSERT INTO `wfx_location_city` VALUES (205, '19', '湛江市');
INSERT INTO `wfx_location_city` VALUES (206, '19', '茂名市');
INSERT INTO `wfx_location_city` VALUES (207, '19', '肇庆市');
INSERT INTO `wfx_location_city` VALUES (208, '19', '惠州市');
INSERT INTO `wfx_location_city` VALUES (209, '19', '梅州市');
INSERT INTO `wfx_location_city` VALUES (210, '19', '汕尾市');
INSERT INTO `wfx_location_city` VALUES (211, '19', '河源市');
INSERT INTO `wfx_location_city` VALUES (212, '19', '阳江市');
INSERT INTO `wfx_location_city` VALUES (213, '19', '清远市');
INSERT INTO `wfx_location_city` VALUES (214, '19', '东莞市');
INSERT INTO `wfx_location_city` VALUES (215, '19', '中山市');
INSERT INTO `wfx_location_city` VALUES (216, '19', '潮州市');
INSERT INTO `wfx_location_city` VALUES (217, '19', '揭阳市');
INSERT INTO `wfx_location_city` VALUES (218, '19', '云浮市');
INSERT INTO `wfx_location_city` VALUES (219, '20', '南宁市');
INSERT INTO `wfx_location_city` VALUES (220, '20', '柳州市');
INSERT INTO `wfx_location_city` VALUES (221, '20', '桂林市');
INSERT INTO `wfx_location_city` VALUES (222, '20', '梧州市');
INSERT INTO `wfx_location_city` VALUES (223, '20', '北海市');
INSERT INTO `wfx_location_city` VALUES (224, '20', '防城港市');
INSERT INTO `wfx_location_city` VALUES (225, '20', '钦州市');
INSERT INTO `wfx_location_city` VALUES (226, '20', '贵港市');
INSERT INTO `wfx_location_city` VALUES (227, '20', '玉林市');
INSERT INTO `wfx_location_city` VALUES (228, '20', '百色市');
INSERT INTO `wfx_location_city` VALUES (229, '20', '贺州市');
INSERT INTO `wfx_location_city` VALUES (230, '20', '河池市');
INSERT INTO `wfx_location_city` VALUES (231, '20', '来宾市');
INSERT INTO `wfx_location_city` VALUES (232, '20', '崇左市');
INSERT INTO `wfx_location_city` VALUES (233, '21', '海口市');
INSERT INTO `wfx_location_city` VALUES (234, '21', '三亚市');
INSERT INTO `wfx_location_city` VALUES (235, '21', '省直辖县级行政单位');
INSERT INTO `wfx_location_city` VALUES (236, '22', '重庆市');
INSERT INTO `wfx_location_city` VALUES (237, '23', '成都市');
INSERT INTO `wfx_location_city` VALUES (238, '23', '自贡市');
INSERT INTO `wfx_location_city` VALUES (239, '23', '攀枝花市');
INSERT INTO `wfx_location_city` VALUES (240, '23', '泸州市');
INSERT INTO `wfx_location_city` VALUES (241, '23', '德阳市');
INSERT INTO `wfx_location_city` VALUES (242, '23', '绵阳市');
INSERT INTO `wfx_location_city` VALUES (243, '23', '广元市');
INSERT INTO `wfx_location_city` VALUES (244, '23', '遂宁市');
INSERT INTO `wfx_location_city` VALUES (245, '23', '内江市');
INSERT INTO `wfx_location_city` VALUES (246, '23', '乐山市');
INSERT INTO `wfx_location_city` VALUES (247, '23', '南充市');
INSERT INTO `wfx_location_city` VALUES (248, '23', '眉山市');
INSERT INTO `wfx_location_city` VALUES (249, '23', '宜宾市');
INSERT INTO `wfx_location_city` VALUES (250, '23', '广安市');
INSERT INTO `wfx_location_city` VALUES (251, '23', '达州市');
INSERT INTO `wfx_location_city` VALUES (252, '23', '雅安市');
INSERT INTO `wfx_location_city` VALUES (253, '23', '巴中市');
INSERT INTO `wfx_location_city` VALUES (254, '23', '资阳市');
INSERT INTO `wfx_location_city` VALUES (255, '23', '阿坝藏族羌族自治州');
INSERT INTO `wfx_location_city` VALUES (256, '23', '甘孜藏族自治州');
INSERT INTO `wfx_location_city` VALUES (257, '23', '凉山彝族自治州');
INSERT INTO `wfx_location_city` VALUES (258, '24', '贵阳市');
INSERT INTO `wfx_location_city` VALUES (259, '24', '六盘水市');
INSERT INTO `wfx_location_city` VALUES (260, '24', '遵义市');
INSERT INTO `wfx_location_city` VALUES (261, '24', '安顺市');
INSERT INTO `wfx_location_city` VALUES (262, '24', '铜仁地区');
INSERT INTO `wfx_location_city` VALUES (263, '24', '黔西南布依族苗族自治州');
INSERT INTO `wfx_location_city` VALUES (264, '24', '毕节地区');
INSERT INTO `wfx_location_city` VALUES (265, '24', '黔东南苗族侗族自治州');
INSERT INTO `wfx_location_city` VALUES (266, '24', '黔南布依族苗族自治州');
INSERT INTO `wfx_location_city` VALUES (267, '25', '昆明市');
INSERT INTO `wfx_location_city` VALUES (268, '25', '曲靖市');
INSERT INTO `wfx_location_city` VALUES (269, '25', '玉溪市');
INSERT INTO `wfx_location_city` VALUES (270, '25', '保山市');
INSERT INTO `wfx_location_city` VALUES (271, '25', '昭通市');
INSERT INTO `wfx_location_city` VALUES (272, '25', '丽江市');
INSERT INTO `wfx_location_city` VALUES (273, '25', '普洱市');
INSERT INTO `wfx_location_city` VALUES (274, '25', '临沧市');
INSERT INTO `wfx_location_city` VALUES (275, '25', '楚雄彝族自治州');
INSERT INTO `wfx_location_city` VALUES (276, '25', '红河哈尼族彝族自治州');
INSERT INTO `wfx_location_city` VALUES (277, '25', '文山壮族苗族自治州');
INSERT INTO `wfx_location_city` VALUES (278, '25', '西双版纳傣族自治州');
INSERT INTO `wfx_location_city` VALUES (279, '25', '大理白族自治州');
INSERT INTO `wfx_location_city` VALUES (280, '25', '德宏傣族景颇族自治州');
INSERT INTO `wfx_location_city` VALUES (281, '25', '怒江傈僳族自治州');
INSERT INTO `wfx_location_city` VALUES (282, '25', '迪庆藏族自治州');
INSERT INTO `wfx_location_city` VALUES (283, '26', '拉萨市');
INSERT INTO `wfx_location_city` VALUES (284, '26', '昌都地区');
INSERT INTO `wfx_location_city` VALUES (285, '26', '山南地区');
INSERT INTO `wfx_location_city` VALUES (286, '26', '日喀则地区');
INSERT INTO `wfx_location_city` VALUES (287, '26', '那曲地区');
INSERT INTO `wfx_location_city` VALUES (288, '26', '阿里地区');
INSERT INTO `wfx_location_city` VALUES (289, '26', '林芝地区');
INSERT INTO `wfx_location_city` VALUES (290, '27', '西安市');
INSERT INTO `wfx_location_city` VALUES (291, '27', '铜川市');
INSERT INTO `wfx_location_city` VALUES (292, '27', '宝鸡市');
INSERT INTO `wfx_location_city` VALUES (293, '27', '咸阳市');
INSERT INTO `wfx_location_city` VALUES (294, '27', '渭南市');
INSERT INTO `wfx_location_city` VALUES (295, '27', '延安市');
INSERT INTO `wfx_location_city` VALUES (296, '27', '汉中市');
INSERT INTO `wfx_location_city` VALUES (297, '27', '榆林市');
INSERT INTO `wfx_location_city` VALUES (298, '27', '安康市');
INSERT INTO `wfx_location_city` VALUES (299, '27', '商洛市');
INSERT INTO `wfx_location_city` VALUES (300, '28', '兰州市');
INSERT INTO `wfx_location_city` VALUES (301, '28', '嘉峪关市');
INSERT INTO `wfx_location_city` VALUES (302, '28', '金昌市');
INSERT INTO `wfx_location_city` VALUES (303, '28', '白银市');
INSERT INTO `wfx_location_city` VALUES (304, '28', '天水市');
INSERT INTO `wfx_location_city` VALUES (305, '28', '武威市');
INSERT INTO `wfx_location_city` VALUES (306, '28', '张掖市');
INSERT INTO `wfx_location_city` VALUES (307, '28', '平凉市');
INSERT INTO `wfx_location_city` VALUES (308, '28', '酒泉市');
INSERT INTO `wfx_location_city` VALUES (309, '28', '庆阳市');
INSERT INTO `wfx_location_city` VALUES (310, '28', '定西市');
INSERT INTO `wfx_location_city` VALUES (311, '28', '陇南市');
INSERT INTO `wfx_location_city` VALUES (312, '28', '临夏回族自治州');
INSERT INTO `wfx_location_city` VALUES (313, '28', '甘南藏族自治州');
INSERT INTO `wfx_location_city` VALUES (314, '29', '西宁市');
INSERT INTO `wfx_location_city` VALUES (315, '29', '海东地区');
INSERT INTO `wfx_location_city` VALUES (316, '29', '海北藏族自治州');
INSERT INTO `wfx_location_city` VALUES (317, '29', '黄南藏族自治州');
INSERT INTO `wfx_location_city` VALUES (318, '29', '海南藏族自治州');
INSERT INTO `wfx_location_city` VALUES (319, '29', '果洛藏族自治州');
INSERT INTO `wfx_location_city` VALUES (320, '29', '玉树藏族自治州');
INSERT INTO `wfx_location_city` VALUES (321, '29', '海西蒙古族藏族自治州');
INSERT INTO `wfx_location_city` VALUES (322, '30', '银川市');
INSERT INTO `wfx_location_city` VALUES (323, '30', '石嘴山市');
INSERT INTO `wfx_location_city` VALUES (324, '30', '吴忠市');
INSERT INTO `wfx_location_city` VALUES (325, '30', '固原市');
INSERT INTO `wfx_location_city` VALUES (326, '30', '中卫市');
INSERT INTO `wfx_location_city` VALUES (327, '31', '乌鲁木齐市');
INSERT INTO `wfx_location_city` VALUES (328, '31', '克拉玛依市');
INSERT INTO `wfx_location_city` VALUES (329, '31', '吐鲁番地区');
INSERT INTO `wfx_location_city` VALUES (330, '31', '哈密地区');
INSERT INTO `wfx_location_city` VALUES (331, '31', '昌吉回族自治州');
INSERT INTO `wfx_location_city` VALUES (332, '31', '博尔塔拉蒙古自治州');
INSERT INTO `wfx_location_city` VALUES (333, '31', '巴音郭楞蒙古自治州');
INSERT INTO `wfx_location_city` VALUES (334, '31', '阿克苏地区');
INSERT INTO `wfx_location_city` VALUES (335, '31', '克孜勒苏柯尔克孜自治州');
INSERT INTO `wfx_location_city` VALUES (336, '31', '喀什地区');
INSERT INTO `wfx_location_city` VALUES (337, '31', '和田地区');
INSERT INTO `wfx_location_city` VALUES (338, '31', '伊犁哈萨克自治州');
INSERT INTO `wfx_location_city` VALUES (339, '31', '塔城地区');
INSERT INTO `wfx_location_city` VALUES (340, '31', '阿勒泰地区');
INSERT INTO `wfx_location_city` VALUES (341, '31', '省直辖县级行政单位');
INSERT INTO `wfx_location_city` VALUES (342, '32', '香港');
INSERT INTO `wfx_location_city` VALUES (343, '33', '澳门');
INSERT INTO `wfx_location_city` VALUES (344, '34', '台湾');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_location_province`
-- 

CREATE TABLE `wfx_location_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- 
-- 导出表中的数据 `wfx_location_province`
-- 

INSERT INTO `wfx_location_province` VALUES (1, '北京');
INSERT INTO `wfx_location_province` VALUES (2, '天津');
INSERT INTO `wfx_location_province` VALUES (3, '河北');
INSERT INTO `wfx_location_province` VALUES (4, '山西');
INSERT INTO `wfx_location_province` VALUES (5, '内蒙古');
INSERT INTO `wfx_location_province` VALUES (6, '辽宁');
INSERT INTO `wfx_location_province` VALUES (7, '吉林');
INSERT INTO `wfx_location_province` VALUES (8, '黑龙江');
INSERT INTO `wfx_location_province` VALUES (9, '上海');
INSERT INTO `wfx_location_province` VALUES (10, '江苏');
INSERT INTO `wfx_location_province` VALUES (11, '浙江');
INSERT INTO `wfx_location_province` VALUES (12, '安徽');
INSERT INTO `wfx_location_province` VALUES (13, '福建');
INSERT INTO `wfx_location_province` VALUES (14, '江西');
INSERT INTO `wfx_location_province` VALUES (15, '山东');
INSERT INTO `wfx_location_province` VALUES (16, '河南');
INSERT INTO `wfx_location_province` VALUES (17, '湖北');
INSERT INTO `wfx_location_province` VALUES (18, '湖南');
INSERT INTO `wfx_location_province` VALUES (19, '广东');
INSERT INTO `wfx_location_province` VALUES (20, '广西');
INSERT INTO `wfx_location_province` VALUES (21, '海南');
INSERT INTO `wfx_location_province` VALUES (22, '重庆');
INSERT INTO `wfx_location_province` VALUES (23, '四川');
INSERT INTO `wfx_location_province` VALUES (24, '贵州');
INSERT INTO `wfx_location_province` VALUES (25, '云南');
INSERT INTO `wfx_location_province` VALUES (26, '西藏');
INSERT INTO `wfx_location_province` VALUES (27, '陕西');
INSERT INTO `wfx_location_province` VALUES (28, '甘肃');
INSERT INTO `wfx_location_province` VALUES (29, '青海');
INSERT INTO `wfx_location_province` VALUES (30, '宁夏');
INSERT INTO `wfx_location_province` VALUES (31, '新疆');
INSERT INTO `wfx_location_province` VALUES (32, '香港');
INSERT INTO `wfx_location_province` VALUES (33, '澳门');
INSERT INTO `wfx_location_province` VALUES (34, '台湾');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_mail_config`
-- 

CREATE TABLE `wfx_mail_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `smtp` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_mail_config`
-- 

INSERT INTO `wfx_mail_config` VALUES (1, 'smtp.qq.com', '111666', '222666');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_mail_receiver`
-- 

CREATE TABLE `wfx_mail_receiver` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `receiver` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `wfx_mail_receiver`
-- 

INSERT INTO `wfx_mail_receiver` VALUES (4, '2536887754@qq.com', '2015-09-09 23:26:42');
INSERT INTO `wfx_mail_receiver` VALUES (5, '1604583867@qq.com', '2015-09-14 09:56:25');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_md`
-- 

CREATE TABLE `wfx_md` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `content` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `wfx_md`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_md_group`
-- 

CREATE TABLE `wfx_md_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT '无',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_md_group`
-- 

INSERT INTO `wfx_md_group` VALUES (1, '广东省', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_pay_rule`
-- 

CREATE TABLE `wfx_pay_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `money` int(11) NOT NULL,
  `handsel` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `wfx_pay_rule`
-- 

INSERT INTO `wfx_pay_rule` VALUES (4, 120, 12, '2016-06-07 17:33:11');
INSERT INTO `wfx_pay_rule` VALUES (5, 100, 18, '2015-09-09 23:34:07');
INSERT INTO `wfx_pay_rule` VALUES (6, 100, 11, '2016-06-08 14:51:10');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_score`
-- 

CREATE TABLE `wfx_score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `score` float NOT NULL,
  `pic` text NOT NULL,
  `status` int(11) NOT NULL,
  `recommend` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- 导出表中的数据 `wfx_score`
-- 

INSERT INTO `wfx_score` VALUES (11, '1', 1, '167', 1, 1, 1, '2015-09-14 14:12:47');
INSERT INTO `wfx_score` VALUES (15, '111', 111, '165', 0, 1, 1111, '2015-09-15 10:04:08');
INSERT INTO `wfx_score` VALUES (16, '1', 1, '169', 1, 1, 1, '2016-06-07 17:34:34');
INSERT INTO `wfx_score` VALUES (17, '111', 11, '172', 1, 1, 11, '2016-06-08 14:52:16');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_score_order`
-- 

CREATE TABLE `wfx_score_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `orderid` text NOT NULL,
  `score_id` int(11) NOT NULL,
  `totalscore` float NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- 导出表中的数据 `wfx_score_order`
-- 

INSERT INTO `wfx_score_order` VALUES (7, 2, 66, '1509140237585', 11, 1, -1, '2015-09-14 14:38:12');
INSERT INTO `wfx_score_order` VALUES (8, 162, 66, '1509140257003', 11, 1, 2, '2016-06-08 14:51:47');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_set`
-- 

CREATE TABLE `wfx_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wxname` varchar(255) DEFAULT NULL,
  `wxurl` varchar(255) DEFAULT NULL,
  `wxsummary` varchar(255) DEFAULT NULL,
  `wxswitch` int(11) DEFAULT '0',
  `wxdebug` int(11) NOT NULL,
  `wxpicture` varchar(255) DEFAULT NULL,
  `wxsuburl` varchar(255) DEFAULT NULL,
  `wxappid` varchar(255) DEFAULT NULL,
  `wxappsecret` varchar(255) DEFAULT NULL,
  `wxtoken` varchar(255) DEFAULT NULL,
  `wxmchid` varchar(255) DEFAULT NULL,
  `wxmchkey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_set`
-- 

INSERT INTO `wfx_set` VALUES (1, 'WeMall', 'http://wfx.youtellme.cc/wfx', '恭喜你加入WeMall，欢迎体验WeMall商业版，WeMall分销版和WeMall开源版。WeMall商业版更新，速度提升30%，致力于打造世界上最快，体验最好的微商城。客服热线：15378708792 ', 0, 0, '167,', 'http://mp.weixin.qq.com/s?__biz=MzAxMDUzOTkzOA==&amp;mid=209759798&amp;idx=1&amp;sn=39c1381f064685aa591bce16faac11f3#rd', 'wx92b4e324f3bb120e', 'ea5fdc9c912855eabf763b9f14421ac5', 'wemall', '1317754501', 'aiyaohaixiaomayilianmeng20150303');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_ads`
-- 

CREATE TABLE `wfx_shop_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- 
-- 导出表中的数据 `wfx_shop_ads`
-- 

INSERT INTO `wfx_shop_ads` VALUES (24, 20, 'tu99916', '6', '165', '#6', '6');
INSERT INTO `wfx_shop_ads` VALUES (26, 20, '123', '', '165', '#', '');
INSERT INTO `wfx_shop_ads` VALUES (28, 20, '111', '11', '159', '11#', '11');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_basket`
-- 

CREATE TABLE `wfx_shop_basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) DEFAULT NULL,
  `vipid` int(11) DEFAULT NULL,
  `goodsid` int(11) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- 
-- 导出表中的数据 `wfx_shop_basket`
-- 

INSERT INTO `wfx_shop_basket` VALUES (15, 0, 6, 17, '', 1, 20);
INSERT INTO `wfx_shop_basket` VALUES (16, 0, 6, 15, '15-825', 1, 20);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_cate`
-- 

CREATE TABLE `wfx_shop_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `pid` int(11) DEFAULT '0',
  `path` varchar(255) DEFAULT '0',
  `lv` int(11) DEFAULT '1',
  `name` varchar(255) DEFAULT NULL,
  `icon` int(11) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `soncate` text,
  `sorts` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- 
-- 导出表中的数据 `wfx_shop_cate`
-- 

INSERT INTO `wfx_shop_cate` VALUES (24, 20, 0, '0', 1, '菜单3', 166, '', NULL, 0);
INSERT INTO `wfx_shop_cate` VALUES (25, 20, 0, '0', 1, '菜单4', 166, '', NULL, 0);
INSERT INTO `wfx_shop_cate` VALUES (26, 20, 0, '0', 1, '菜单5', 166, '', NULL, 0);
INSERT INTO `wfx_shop_cate` VALUES (27, 20, 0, '0', 1, '菜单6', 167, '', NULL, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_goods`
-- 

CREATE TABLE `wfx_shop_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `spu` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `lid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `indexpic` varchar(255) DEFAULT NULL,
  `listpic` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `oprice` float DEFAULT '0',
  `unit` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT '0',
  `sorts` int(11) DEFAULT '0',
  `clicks` int(11) DEFAULT '0',
  `sells` int(11) DEFAULT '0',
  `dissells` int(11) DEFAULT '0',
  `cashback` int(11) NOT NULL DEFAULT '0',
  `backratio` float NOT NULL,
  `fx1rate` int(11) DEFAULT '0' COMMENT '一级佣金',
  `fx2rate` int(11) DEFAULT '0' COMMENT '二级佣金',
  `fx3rate` int(11) DEFAULT '0' COMMENT '三级佣金',
  `issku` tinyint(1) DEFAULT '0',
  `ismy` tinyint(1) DEFAULT NULL,
  `issells` tinyint(1) DEFAULT '0',
  `skuinfo` longtext,
  `content` longtext,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- 导出表中的数据 `wfx_shop_goods`
-- 

INSERT INTO `wfx_shop_goods` VALUES (15, 20, NULL, 0, '1,', '沁颜玉皙面膜', '157', '157', '157', '156,', '改变肤质，适合任何皮肤', 158, 189, '盒', 2321396, 0, 80, 7, 41421, 1, 0.2, 25, 12, 10, 1, 1, 1, 'a:1:{i:0;a:4:{s:6:"attrid";s:1:"8";s:9:"attrlabel";s:12:"商品类型";s:5:"items";a:2:{i:825;s:6:"单盒";i:826;s:10:"套餐拍2";}s:7:"checked";s:8:"825,826,";}}', '&lt;p&gt;&lt;img src=&quot;/wfx/Public/Admin/ueditor/php/upload//img/20160608/1465368113135920.jpg&quot; title=&quot;Multiuser.jpg&quot;/&gt;&lt;/p&gt;', 1);
INSERT INTO `wfx_shop_goods` VALUES (17, 20, NULL, 20, '', '沁颜光感面膜', '160', '160', '160', '159,', '测试专用', 0.01, 0.01, 'kg', 2321300, 0, 57, 21, 3221333, 0, 0, 25, 12, 10, 0, 1, 1, NULL, '&lt;p&gt;&lt;img width=&quot;100%&quot; src=&quot;/Public/Cms/ueditor/php/upload//img/20150620/1434731886104627.jpg&quot; style=&quot;float:none;&quot; title=&quot;20150619184505.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img width=&quot;100%&quot; src=&quot;/Public/Cms/ueditor/php/upload//img/20150620/1434731890844584.jpg&quot; style=&quot;float:none;&quot; title=&quot;ÇßÑÕÃæÄ¤º£±¨2.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img width=&quot;100%&quot; src=&quot;/Public/Cms/ueditor/php/upload//img/20150620/1434731890122313.jpg&quot; style=&quot;float:none;&quot; title=&quot;ͼ2.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img width=&quot;100%&quot; src=&quot;/Public/Cms/ueditor/php/upload//img/20150620/1434731891113057.jpg&quot; style=&quot;float:none;&quot; title=&quot;ͼ3.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img width=&quot;100%&quot; src=&quot;/Public/Cms/ueditor/php/upload//img/20150620/1434731892124232.jpg&quot; style=&quot;float:none;&quot; title=&quot;ͼ4.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img width=&quot;100%&quot; src=&quot;/Public/Cms/ueditor/php/upload//img/20150620/1434731892939383.jpg&quot; style=&quot;float:none;&quot; title=&quot;ͼ6.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;img width=&quot;100%&quot; src=&quot;/Public/Cms/ueditor/php/upload//img/20150620/1434731893127460.jpg&quot; style=&quot;float:none;&quot; title=&quot;ͼ7.jpg&quot;/&gt;&lt;/p&gt;', 1);
INSERT INTO `wfx_shop_goods` VALUES (20, 20, NULL, 0, '1,', 'aaa', '160', '160', '160', '160', '1', 100, 200, '盒', 200, 1, 5, 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 'a:2:{i:0;a:4:{s:6:"attrid";s:1:"8";s:9:"attrlabel";s:12:"商品类型";s:5:"items";a:2:{i:825;s:6:"单盒";i:826;s:10:"套餐拍2";}s:7:"checked";s:8:"825,826,";}i:1;a:4:{s:6:"attrid";s:2:"11";s:9:"attrlabel";s:6:"效果";s:5:"items";a:1:{i:1143;s:15:"美白，保湿";}s:7:"checked";s:5:"1143,";}}', '&lt;p&gt;1&lt;/p&gt;', 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_goods_sku`
-- 

CREATE TABLE `wfx_shop_goods_sku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsid` int(11) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `skuattr` varchar(255) DEFAULT NULL,
  `price` float DEFAULT '0',
  `num` int(11) DEFAULT '0',
  `hdprice` float DEFAULT '0',
  `hdnum` int(11) DEFAULT '0',
  `sells` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- 
-- 导出表中的数据 `wfx_shop_goods_sku`
-- 

INSERT INTO `wfx_shop_goods_sku` VALUES (1, 8, '8-512', '50g', 99, 2928, 0, 0, 0, 0);
INSERT INTO `wfx_shop_goods_sku` VALUES (2, 8, '8-15', '5kg', 0, 2911, 0, 0, 17, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (3, 10, '10-26', '1个，2个，4个，6个', 98, 23214, 0, 0, 0, 0);
INSERT INTO `wfx_shop_goods_sku` VALUES (4, 15, '15-15', '5kg', 99, 232141, 0, 0, 0, 0);
INSERT INTO `wfx_shop_goods_sku` VALUES (5, 16, '16-314', '1000g', 88, 2424204, 0, 0, 10, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (6, 15, '15-11', '1kg', 99, 232141, 0, 0, 0, 0);
INSERT INTO `wfx_shop_goods_sku` VALUES (7, 15, '15-12', '2kg', 99, 232141, 0, 0, 0, 0);
INSERT INTO `wfx_shop_goods_sku` VALUES (8, 15, '15-13', '3kg', 99, 232141, 0, 0, 0, 0);
INSERT INTO `wfx_shop_goods_sku` VALUES (9, 15, '15-14', '4kg', 99, 232141, 0, 0, 0, 0);
INSERT INTO `wfx_shop_goods_sku` VALUES (10, 8, '8-11', '1kg', 99, 2928, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (11, 8, '8-12', '2kg', 99, 2928, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (12, 8, '8-13', '3kg', 99, 2927, 0, 0, 1, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (13, 8, '8-14', '4kg', 99, 2927, 0, 0, 1, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (14, 10, '10-210', '6个', 98, 23214, 0, 0, 0, 0);
INSERT INTO `wfx_shop_goods_sku` VALUES (15, 10, '10-825', '单盒', 138, 23198, 0, 0, 0, 0);
INSERT INTO `wfx_shop_goods_sku` VALUES (16, 10, '10-826', '套餐拍2', 138, 23198, 0, 0, 0, 0);
INSERT INTO `wfx_shop_goods_sku` VALUES (17, 10, '10-825-927', '单盒,保湿款', 138, 46396, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (18, 10, '10-825-928', '单盒,美白款', 138, 46392, 0, 0, 4, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (19, 10, '10-826-927', '套餐拍2,保湿款', 138, 46395, 0, 0, 1, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (20, 10, '10-826-928', '套餐拍2,美白款', 138, 46396, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (21, 19, '19-825-927', '单盒,保湿款', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (22, 19, '19-825-928', '单盒,美白款', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (23, 19, '19-825-938', '单盒,1', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (24, 19, '19-825-939', '单盒,2', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (25, 19, '19-825-940', '单盒,2', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (26, 19, '19-825-941', '单盒,白色，黑色，蓝色', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (27, 19, '19-826-927', '套餐拍2,保湿款', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (28, 19, '19-826-928', '套餐拍2,美白款', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (29, 19, '19-826-938', '套餐拍2,1', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (30, 19, '19-826-939', '套餐拍2,2', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (31, 19, '19-826-940', '套餐拍2,2', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (32, 19, '19-826-941', '套餐拍2,白色，黑色，蓝色', 10, 10, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (33, 15, '15-825', '单盒', 158, 1160698, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (34, 15, '15-826', '套餐拍2', 158, 1160698, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (35, 20, '20-825-1143', '单盒,美白，保湿', 100, 100, 0, 0, 0, 1);
INSERT INTO `wfx_shop_goods_sku` VALUES (36, 20, '20-826-1143', '套餐拍2,美白，保湿', 100, 100, 0, 0, 0, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_group`
-- 

CREATE TABLE `wfx_shop_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `goods` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `wfx_shop_group`
-- 

INSERT INTO `wfx_shop_group` VALUES (1, 20, '重磅推荐1', '15', '为您精挑细选', '169', NULL, NULL, 1);
INSERT INTO `wfx_shop_group` VALUES (3, 20, '精挑细选', '精挑细选', '精挑细选111', '162', NULL, NULL, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_label`
-- 

CREATE TABLE `wfx_shop_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `wfx_shop_label`
-- 

INSERT INTO `wfx_shop_label` VALUES (1, 20, '新品推荐', '新品推荐');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_order`
-- 

CREATE TABLE `wfx_shop_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `sid` int(11) DEFAULT '0',
  `oid` varchar(255) DEFAULT NULL,
  `djqid` int(11) DEFAULT '0',
  `totalprice` float DEFAULT NULL,
  `totalnum` int(11) DEFAULT NULL,
  `payprice` float DEFAULT NULL,
  `paytype` varchar(255) DEFAULT NULL,
  `paytime` int(11) DEFAULT NULL,
  `aliaccount` varchar(255) DEFAULT NULL,
  `yf` int(11) DEFAULT '0',
  `ispay` tinyint(1) DEFAULT NULL,
  `vipid` int(11) DEFAULT NULL,
  `vipopenid` varchar(255) DEFAULT NULL,
  `vipname` varchar(255) DEFAULT NULL,
  `vipmobile` varchar(255) DEFAULT NULL,
  `vipaddress` varchar(255) DEFAULT NULL,
  `vipxqname` varchar(255) DEFAULT NULL,
  `vipxqid` int(11) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `kfmsg` varchar(255) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `ntime` int(11) DEFAULT NULL,
  `dtime` int(11) DEFAULT NULL,
  `etime` int(11) DEFAULT NULL,
  `changetime` int(11) DEFAULT NULL,
  `changemsg` varchar(255) DEFAULT NULL,
  `changeadmin` varchar(255) DEFAULT NULL,
  `closetime` int(11) DEFAULT NULL,
  `closemsg` varchar(255) DEFAULT NULL,
  `closeadmin` varchar(255) DEFAULT NULL,
  `tuihuoprice` float DEFAULT NULL,
  `tuihuosqtime` int(11) DEFAULT '0' COMMENT '退货申请时间',
  `tuihuotime` int(11) DEFAULT NULL,
  `tuihuokd` varchar(255) DEFAULT NULL,
  `tuihuokdnum` varchar(255) DEFAULT NULL,
  `tuihuomsg` varchar(255) DEFAULT NULL,
  `tuihuoadmin` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `fahuokd` varchar(255) DEFAULT NULL,
  `fahuokdnum` varchar(255) DEFAULT NULL,
  `items` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- 导出表中的数据 `wfx_shop_order`
-- 

INSERT INTO `wfx_shop_order` VALUES (1, 20, 0, '20160509111759-1', 0, 296, 2, 296, 'money', 1462763879, NULL, 0, 1, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', '18538753627', '河南省郑州市金水区', NULL, NULL, '', NULL, 1462763878, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'a:2:{i:0;a:12:{s:2:"id";s:1:"2";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"1";s:7:"goodsid";s:2:"15";s:3:"sku";s:0:"";s:3:"num";s:1:"1";s:5:"skuid";i:0;s:4:"name";s:18:"沁颜玉皙面膜";s:7:"skuattr";N;s:5:"price";s:3:"158";s:5:"total";i:158;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/558443d223c96.png";}i:1;a:12:{s:2:"id";s:1:"3";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"1";s:7:"goodsid";s:2:"10";s:3:"sku";s:10:"10-825-928";s:3:"num";s:1:"1";s:5:"skuid";s:2:"18";s:4:"name";s:18:"沁颜光感面膜";s:7:"skuattr";s:16:"单盒,美白款";s:5:"price";s:3:"138";s:5:"total";i:138;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/55843d31e9f3c.jpg";}}');
INSERT INTO `wfx_shop_order` VALUES (2, 20, 0, '20160510163608-2', 0, 138, 1, 138, 'money', 1462869368, NULL, 0, 1, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', '18538753627', '河南省郑州市金水区', NULL, NULL, '', NULL, 1462869368, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 'a:1:{i:0;a:12:{s:2:"id";s:1:"1";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"1";s:7:"goodsid";s:2:"10";s:3:"sku";s:10:"10-825-928";s:3:"num";s:1:"1";s:5:"skuid";s:2:"18";s:4:"name";s:18:"沁颜光感面膜";s:7:"skuattr";s:16:"单盒,美白款";s:5:"price";s:3:"138";s:5:"total";i:138;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/55843d31e9f3c.jpg";}}');
INSERT INTO `wfx_shop_order` VALUES (3, 20, 0, '20160510164113-3', 0, 158, 1, 158, 'money', 1462869673, NULL, 0, 1, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', '18538753627', '河南省郑州市金水区', NULL, NULL, '', NULL, 1462869673, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'a:1:{i:0;a:12:{s:2:"id";s:1:"2";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"1";s:7:"goodsid";s:2:"15";s:3:"sku";s:0:"";s:3:"num";s:1:"1";s:5:"skuid";i:0;s:4:"name";s:18:"沁颜玉皙面膜";s:7:"skuattr";N;s:5:"price";s:3:"158";s:5:"total";i:158;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/558443d223c96.png";}}');
INSERT INTO `wfx_shop_order` VALUES (4, 20, 0, '20160510164316-4', 0, 138, 1, 138, 'money', 1462869797, NULL, 0, 1, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', '18538753627', '河南省郑州市金水区', NULL, NULL, '', NULL, 1462869796, NULL, NULL, NULL, 1463130306, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 3, '222', '11111', 'a:1:{i:0;a:12:{s:2:"id";s:1:"3";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"1";s:7:"goodsid";s:2:"10";s:3:"sku";s:10:"10-826-927";s:3:"num";s:1:"1";s:5:"skuid";s:2:"19";s:4:"name";s:18:"沁颜光感面膜";s:7:"skuattr";s:20:"套餐拍2,保湿款";s:5:"price";s:3:"138";s:5:"total";i:138;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/55843d31e9f3c.jpg";}}');
INSERT INTO `wfx_shop_order` VALUES (5, 20, 0, '20160516003026-5', 0, 276, 2, 276, 'money', 1463477163, NULL, 0, 1, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', '18538753627', '河南省郑州市金水区', NULL, NULL, '', NULL, 1463477163, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'a:1:{i:0;a:12:{s:2:"id";s:1:"1";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"1";s:7:"goodsid";s:2:"10";s:3:"sku";s:10:"10-825-928";s:3:"num";s:1:"2";s:5:"skuid";s:2:"18";s:4:"name";s:18:"沁颜光感面膜";s:7:"skuattr";s:16:"单盒,美白款";s:5:"price";s:3:"138";s:5:"total";i:276;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/55843d31e9f3c.jpg";}}');
INSERT INTO `wfx_shop_order` VALUES (6, 20, 0, '20160527153729-6', 0, 0.01, 1, 0.01, 'money', 1464334650, NULL, 0, 1, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', '18538753627', '河南省郑州市金水区', NULL, NULL, '', NULL, 1464334649, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'a:1:{i:0;a:12:{s:2:"id";s:1:"1";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"1";s:7:"goodsid";s:2:"17";s:3:"sku";s:0:"";s:3:"num";s:1:"1";s:5:"skuid";i:0;s:4:"name";s:18:"沁颜光感面膜";s:7:"skuattr";N;s:5:"price";s:4:"0.01";s:5:"total";d:0.01000000000000000020816681711721685132943093776702880859375;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/558445021b2f3.jpg";}}');
INSERT INTO `wfx_shop_order` VALUES (7, 20, 0, '20160606112132-7', 0, 0.02, 2, 0.02, 'money', 1465183292, NULL, 0, 1, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', '18538753627', '河南省郑州市金水区', NULL, NULL, '', NULL, 1465183292, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'a:1:{i:0;a:12:{s:2:"id";s:1:"2";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"1";s:7:"goodsid";s:2:"17";s:3:"sku";s:0:"";s:3:"num";s:1:"2";s:5:"skuid";i:0;s:4:"name";s:18:"沁颜光感面膜";s:7:"skuattr";N;s:5:"price";s:4:"0.01";s:5:"total";d:0.02;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/558445021b2f3.jpg";}}');
INSERT INTO `wfx_shop_order` VALUES (8, 20, 0, '20160607153309-8', 0, 0.01, 1, 0.01, 'wxpay', 1465285814, NULL, 0, 1, 3, 'ooey5s5nbkO0w4V7pkH7CmlS5CuQ', '崔', '18538753627', '哈哈市', NULL, NULL, '', NULL, 1465284789, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'a:1:{i:0;a:12:{s:2:"id";s:1:"5";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"3";s:7:"goodsid";s:2:"17";s:3:"sku";s:0:"";s:3:"num";s:1:"1";s:5:"skuid";i:0;s:4:"name";s:18:"沁颜光感面膜";s:7:"skuattr";N;s:5:"price";s:4:"0.01";s:5:"total";d:0.01;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/558445021b2f3.jpg";}}');
INSERT INTO `wfx_shop_order` VALUES (9, 20, 0, '20160607155130-9', 0, 0.01, 1, 0.01, 'alipayApp', 1465285939, NULL, 0, 1, 3, 'ooey5s5nbkO0w4V7pkH7CmlS5CuQ', '崔', '18538753627', '哈哈市', NULL, NULL, '', NULL, 1465285890, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, 'a:1:{i:0;a:12:{s:2:"id";s:1:"6";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"3";s:7:"goodsid";s:2:"17";s:3:"sku";s:0:"";s:3:"num";s:1:"1";s:5:"skuid";i:0;s:4:"name";s:18:"沁颜光感面膜";s:7:"skuattr";N;s:5:"price";s:4:"0.01";s:5:"total";d:0.01;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/558445021b2f3.jpg";}}');
INSERT INTO `wfx_shop_order` VALUES (10, 20, 0, '20160607161155-10', 0, 9363, 3, 9363, 'wxpay', NULL, NULL, 0, 0, 5, 'ooey5szh3KMTKs-jgJ5wxJ0gCj-4', '小崔', '15178108946', '中方园', NULL, NULL, '111', NULL, 1465287115, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'a:1:{i:0;a:12:{s:2:"id";s:1:"8";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"5";s:7:"goodsid";s:2:"18";s:3:"sku";s:0:"";s:3:"num";s:1:"3";s:5:"skuid";i:0;s:4:"name";s:6:"321321";s:7:"skuattr";N;s:5:"price";s:4:"3121";s:5:"total";i:9363;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/558445021b2f3.jpg";}}');
INSERT INTO `wfx_shop_order` VALUES (11, 20, 0, '20160608122620-11', 0, 474, 3, 0.01, 'alipayApp', 1465360087, NULL, 0, 1, 5, 'ooey5szh3KMTKs-jgJ5wxJ0gCj-4', '小崔', '15178108946', '中方园', NULL, NULL, '', NULL, 1465359742, NULL, NULL, 1465360205, 1465360154, '44444', '小崔', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 5, '123', '123', 'a:1:{i:0;a:12:{s:2:"id";s:2:"14";s:3:"sid";s:1:"0";s:5:"vipid";s:1:"5";s:7:"goodsid";s:2:"15";s:3:"sku";s:6:"15-825";s:3:"num";s:1:"3";s:5:"skuid";s:2:"33";s:4:"name";s:18:"沁颜玉皙面膜";s:7:"skuattr";s:6:"单盒";s:5:"price";s:3:"158";s:5:"total";i:474;s:3:"pic";s:44:"/wfx/Upload/img/2015-06-20/558443d223c96.png";}}');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_order_log`
-- 

CREATE TABLE `wfx_shop_order_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT '0' COMMENT '-1-异常状态,0-消取订单,1-新增订单,2-支付成功,3-发货订单,4-申请退货,5-交易完成,6-交易关闭',
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- 
-- 导出表中的数据 `wfx_shop_order_log`
-- 

INSERT INTO `wfx_shop_order_log` VALUES (1, 1, '余额-付款成功', 0, 1462763879);
INSERT INTO `wfx_shop_order_log` VALUES (2, 2, '余额-付款成功', 0, 1462869368);
INSERT INTO `wfx_shop_order_log` VALUES (3, 3, '余额-付款成功', 0, 1462869674);
INSERT INTO `wfx_shop_order_log` VALUES (4, 4, '余额-付款成功', 0, 1462869797);
INSERT INTO `wfx_shop_order_log` VALUES (5, 4, '订单已发货', 0, 1463130273);
INSERT INTO `wfx_shop_order_log` VALUES (6, 5, '余额-付款成功', 0, 1463329826);
INSERT INTO `wfx_shop_order_log` VALUES (7, 6, '余额-付款成功', 0, 1464334650);
INSERT INTO `wfx_shop_order_log` VALUES (8, 2, '订单已发货', 0, 1464334739);
INSERT INTO `wfx_shop_order_log` VALUES (9, 7, '余额-付款成功', 0, 1465183292);
INSERT INTO `wfx_shop_order_log` VALUES (10, 8, '微信付款成功', 0, 1465285814);
INSERT INTO `wfx_shop_order_log` VALUES (11, 9, '支付宝付款成功', 0, 1465285939);
INSERT INTO `wfx_shop_order_log` VALUES (12, NULL, '订单价格改为300-成功', 0, 1465359949);
INSERT INTO `wfx_shop_order_log` VALUES (13, NULL, '订单价格改为0.01-成功', 0, 1465359980);
INSERT INTO `wfx_shop_order_log` VALUES (14, 11, '订单已发货', 0, 1465360159);
INSERT INTO `wfx_shop_order_log` VALUES (15, 11, '确认收货,交易完成。', 0, 1465360205);
INSERT INTO `wfx_shop_order_log` VALUES (16, 9, '订单已发货', 0, 1465364727);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_order_syslog`
-- 

CREATE TABLE `wfx_shop_order_syslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `oid` int(11) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT '0' COMMENT '-1-取消订单,0-记事状态,1-新增订单,2-支付成功,3-发货订单,4-申请退货,5-交易完成,6-交易关闭',
  `paytype` varchar(255) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- 
-- 导出表中的数据 `wfx_shop_order_syslog`
-- 

INSERT INTO `wfx_shop_order_syslog` VALUES (1, 0, 1, '订单创建成功', 1, NULL, 1462763879);
INSERT INTO `wfx_shop_order_syslog` VALUES (2, 0, 1, '余额-付款成功', 2, NULL, 1462763879);
INSERT INTO `wfx_shop_order_syslog` VALUES (3, 0, 2, '订单创建成功', 1, NULL, 1462869368);
INSERT INTO `wfx_shop_order_syslog` VALUES (4, 0, 2, '余额-付款成功', 2, NULL, 1462869368);
INSERT INTO `wfx_shop_order_syslog` VALUES (5, 0, 3, '订单创建成功', 1, NULL, 1462869673);
INSERT INTO `wfx_shop_order_syslog` VALUES (6, 0, 3, '余额-付款成功', 2, NULL, 1462869674);
INSERT INTO `wfx_shop_order_syslog` VALUES (7, 0, 4, '订单创建成功', 1, NULL, 1462869796);
INSERT INTO `wfx_shop_order_syslog` VALUES (8, 0, 4, '余额-付款成功', 2, NULL, 1462869797);
INSERT INTO `wfx_shop_order_syslog` VALUES (9, 0, 4, '订单已发货', 3, NULL, 1463130273);
INSERT INTO `wfx_shop_order_syslog` VALUES (10, 0, 5, '订单创建成功', 1, NULL, 1463329826);
INSERT INTO `wfx_shop_order_syslog` VALUES (11, 0, 5, '余额-付款成功', 2, NULL, 1463329826);
INSERT INTO `wfx_shop_order_syslog` VALUES (12, 0, 6, '订单创建成功', 1, NULL, 1464334649);
INSERT INTO `wfx_shop_order_syslog` VALUES (13, 0, 6, '余额-付款成功', 2, NULL, 1464334650);
INSERT INTO `wfx_shop_order_syslog` VALUES (14, 0, 2, '订单已发货', 3, NULL, 1464334739);
INSERT INTO `wfx_shop_order_syslog` VALUES (15, 0, 7, '订单创建成功', 1, NULL, 1465183292);
INSERT INTO `wfx_shop_order_syslog` VALUES (16, 0, 7, '余额-付款成功', 2, NULL, 1465183292);
INSERT INTO `wfx_shop_order_syslog` VALUES (17, 0, 8, '订单创建成功', 1, NULL, 1465284789);
INSERT INTO `wfx_shop_order_syslog` VALUES (18, 0, 8, '微信付款成功', 2, 'wxpay', 1465285814);
INSERT INTO `wfx_shop_order_syslog` VALUES (19, 0, 9, '订单创建成功', 1, NULL, 1465285890);
INSERT INTO `wfx_shop_order_syslog` VALUES (20, 0, 9, '支付宝付款成功', 2, NULL, 1465285939);
INSERT INTO `wfx_shop_order_syslog` VALUES (21, 0, 10, '订单创建成功', 1, NULL, 1465287115);
INSERT INTO `wfx_shop_order_syslog` VALUES (22, 0, 10, '订单取消', 0, NULL, 1465287191);
INSERT INTO `wfx_shop_order_syslog` VALUES (23, 0, 11, '订单创建成功', 1, NULL, 1465359742);
INSERT INTO `wfx_shop_order_syslog` VALUES (24, 0, 11, '订单已发货', 3, NULL, 1465360159);
INSERT INTO `wfx_shop_order_syslog` VALUES (25, 0, 11, '交易完成-会员点击', 5, 'alipayApp', 1465360205);
INSERT INTO `wfx_shop_order_syslog` VALUES (26, 0, 9, '订单已发货', 3, NULL, 1465364727);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_set`
-- 

CREATE TABLE `wfx_shop_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '店铺管理员',
  `money` float NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `indexalbum` varchar(255) DEFAULT NULL,
  `indexgroup` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `isyf` tinyint(1) DEFAULT '0',
  `yf` int(11) DEFAULT '0',
  `yftop` int(11) DEFAULT '0' COMMENT '多少包邮',
  `isth` tinyint(1) DEFAULT '0',
  `thtime` int(11) DEFAULT '7' COMMENT '退货时间',
  `fxname` varchar(255) NOT NULL DEFAULT '合伙人' COMMENT '分销商的名字',
  `yjname` varchar(255) NOT NULL DEFAULT '佣金' COMMENT '佣金的别名',
  `tdname` varchar(255) NOT NULL DEFAULT '团队' COMMENT '团队的别名',
  `fx1name` varchar(255) NOT NULL DEFAULT '一级会员' COMMENT '一级会员',
  `fx2name` varchar(255) NOT NULL DEFAULT '二级会员' COMMENT '二级会员',
  `fx3name` varchar(255) NOT NULL DEFAULT '三级会员' COMMENT '三级会员',
  `fx1rate` int(11) DEFAULT '0',
  `fx2rate` int(11) DEFAULT '0',
  `fx3rate` int(11) DEFAULT '0',
  `content` longtext,
  `status` int(11) NOT NULL COMMENT '-1：关闭，0:未审核，1:休息，2:正常',
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- 
-- 导出表中的数据 `wfx_shop_set`
-- 

INSERT INTO `wfx_shop_set` VALUES (1, 0, 0, 'wemallshop', '2', '移动互联网商务平台', '郑州市金水区农业路23号', '', '', '18538753627', '', '20,21,22,23,24,25,26,27,28', 'http://localhost/', 1, 12, 0, 1, 12, '分销商', '佣金', '团队', '一级', '二级', '三级', 0, 0, 0, '&lt;p&gt;关于我们。&lt;/p&gt;', 1, 2147483647);
INSERT INTO `wfx_shop_set` VALUES (20, 2, 780, 'W店', '167', '移动互联网商务平台', '郑州市怡丰新都汇', '34.79173', '113.656155', '18538753627', '', '24,25,26,27,', 'http://localhost', 1, 5, 60, 1, 3, '分销商', '佣金', '团队', '一级', '二级', '三级', 0, 0, 0, '&lt;p&gt;移动互联网商务平台&lt;/p&gt;', 2, 2147483647);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_skuattr`
-- 

CREATE TABLE `wfx_shop_skuattr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `items` text,
  `itemspath` text,
  `newitem` varchar(255) DEFAULT NULL,
  `cctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- 导出表中的数据 `wfx_shop_skuattr`
-- 

INSERT INTO `wfx_shop_skuattr` VALUES (8, 20, '商品类型', '单盒,套餐拍2,', '825,826,', '', 1434594121);
INSERT INTO `wfx_shop_skuattr` VALUES (11, 20, '效果', '美白，保湿,', '1143,', NULL, 1465367856);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_skuattr_item`
-- 

CREATE TABLE `wfx_shop_skuattr_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

-- 
-- 导出表中的数据 `wfx_shop_skuattr_item`
-- 

INSERT INTO `wfx_shop_skuattr_item` VALUES (1, 1, '11', '1kg');
INSERT INTO `wfx_shop_skuattr_item` VALUES (2, 1, '12', '2kg');
INSERT INTO `wfx_shop_skuattr_item` VALUES (3, 1, '13', '3kg');
INSERT INTO `wfx_shop_skuattr_item` VALUES (4, 1, '14', '4kg');
INSERT INTO `wfx_shop_skuattr_item` VALUES (5, 1, '15', '5kg');
INSERT INTO `wfx_shop_skuattr_item` VALUES (6, 2, '26', '1个，2个，4个，6个');
INSERT INTO `wfx_shop_skuattr_item` VALUES (7, 2, '27', '1个');
INSERT INTO `wfx_shop_skuattr_item` VALUES (8, 2, '28', '2个');
INSERT INTO `wfx_shop_skuattr_item` VALUES (9, 2, '29', '4个');
INSERT INTO `wfx_shop_skuattr_item` VALUES (10, 2, '210', '6个');
INSERT INTO `wfx_shop_skuattr_item` VALUES (11, 3, '311', '100g');
INSERT INTO `wfx_shop_skuattr_item` VALUES (12, 3, '312', '200g');
INSERT INTO `wfx_shop_skuattr_item` VALUES (13, 3, '313', '500g');
INSERT INTO `wfx_shop_skuattr_item` VALUES (14, 3, '314', '1000g');
INSERT INTO `wfx_shop_skuattr_item` VALUES (15, 4, '415', '1');
INSERT INTO `wfx_shop_skuattr_item` VALUES (16, 4, '416', '2');
INSERT INTO `wfx_shop_skuattr_item` VALUES (17, 4, '417', '3');
INSERT INTO `wfx_shop_skuattr_item` VALUES (18, 4, '418', '4');
INSERT INTO `wfx_shop_skuattr_item` VALUES (19, 4, '419', '5');
INSERT INTO `wfx_shop_skuattr_item` VALUES (20, 5, '520', '盒');
INSERT INTO `wfx_shop_skuattr_item` VALUES (21, 5, '521', '套餐');
INSERT INTO `wfx_shop_skuattr_item` VALUES (22, 6, '622', '保湿款，美白款');
INSERT INTO `wfx_shop_skuattr_item` VALUES (23, 7, '723', '保湿款');
INSERT INTO `wfx_shop_skuattr_item` VALUES (24, 7, '724', '美白款');
INSERT INTO `wfx_shop_skuattr_item` VALUES (25, 8, '825', '单盒');
INSERT INTO `wfx_shop_skuattr_item` VALUES (26, 8, '826', '套餐拍2');
INSERT INTO `wfx_shop_skuattr_item` VALUES (27, 9, '927', '保湿款');
INSERT INTO `wfx_shop_skuattr_item` VALUES (28, 9, '928', '美白款');
INSERT INTO `wfx_shop_skuattr_item` VALUES (29, 10, '1029', '2');
INSERT INTO `wfx_shop_skuattr_item` VALUES (30, 10, '1030', '3');
INSERT INTO `wfx_shop_skuattr_item` VALUES (31, 10, '1031', '4');
INSERT INTO `wfx_shop_skuattr_item` VALUES (32, 10, '1032', '白色');
INSERT INTO `wfx_shop_skuattr_item` VALUES (33, 10, '1033', '红色');
INSERT INTO `wfx_shop_skuattr_item` VALUES (34, 10, '1034', '黑色');
INSERT INTO `wfx_shop_skuattr_item` VALUES (35, 10, '1035', '白色');
INSERT INTO `wfx_shop_skuattr_item` VALUES (36, 10, '1036', '红色');
INSERT INTO `wfx_shop_skuattr_item` VALUES (37, 10, '1037', '黑色');
INSERT INTO `wfx_shop_skuattr_item` VALUES (38, 9, '938', '1');
INSERT INTO `wfx_shop_skuattr_item` VALUES (39, 9, '939', '2');
INSERT INTO `wfx_shop_skuattr_item` VALUES (40, 9, '940', '2');
INSERT INTO `wfx_shop_skuattr_item` VALUES (41, 9, '941', '白色，黑色，蓝色');
INSERT INTO `wfx_shop_skuattr_item` VALUES (42, 10, '1042', '美白，保湿');
INSERT INTO `wfx_shop_skuattr_item` VALUES (43, 11, '1143', '美白，保湿');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_shop_syslog_sells`
-- 

CREATE TABLE `wfx_shop_syslog_sells` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) DEFAULT NULL,
  `vipid` int(11) DEFAULT NULL,
  `vipopenid` varchar(255) DEFAULT NULL,
  `vipname` varchar(255) DEFAULT NULL,
  `goodsid` int(11) DEFAULT NULL,
  `goodsname` varchar(255) DEFAULT NULL,
  `skuid` int(11) DEFAULT NULL,
  `skuattr` varchar(255) DEFAULT NULL,
  `price` float DEFAULT '0',
  `num` int(11) DEFAULT '0',
  `total` float DEFAULT '0',
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- 导出表中的数据 `wfx_shop_syslog_sells`
-- 

INSERT INTO `wfx_shop_syslog_sells` VALUES (1, 1, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', 15, '沁颜玉皙面膜', 0, '0', 158, 1, 158, 1462763879);
INSERT INTO `wfx_shop_syslog_sells` VALUES (2, 1, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', 10, '沁颜光感面膜', 18, '单盒,美白款', 138, 1, 138, 1462763879);
INSERT INTO `wfx_shop_syslog_sells` VALUES (3, 2, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', 10, '沁颜光感面膜', 18, '单盒,美白款', 138, 1, 138, 1462869368);
INSERT INTO `wfx_shop_syslog_sells` VALUES (4, 3, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', 15, '沁颜玉皙面膜', 0, '0', 158, 1, 158, 1462869674);
INSERT INTO `wfx_shop_syslog_sells` VALUES (5, 4, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', 10, '沁颜光感面膜', 19, '套餐拍2,保湿款', 138, 1, 138, 1462869797);
INSERT INTO `wfx_shop_syslog_sells` VALUES (6, 5, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', 10, '沁颜光感面膜', 18, '单盒,美白款', 138, 2, 276, 1463329826);
INSERT INTO `wfx_shop_syslog_sells` VALUES (7, 6, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', 17, '沁颜光感面膜', 0, '0', 0.01, 1, 0.01, 1464334650);
INSERT INTO `wfx_shop_syslog_sells` VALUES (8, 7, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', '浩哥', 17, '沁颜光感面膜', 0, '0', 0.01, 2, 0.02, 1465183292);
INSERT INTO `wfx_shop_syslog_sells` VALUES (9, 8, 3, 'ooey5s5nbkO0w4V7pkH7CmlS5CuQ', '崔', 17, '沁颜光感面膜', 0, '0', 0.01, 1, 0.01, 1465285814);
INSERT INTO `wfx_shop_syslog_sells` VALUES (10, 9, 3, 'ooey5s5nbkO0w4V7pkH7CmlS5CuQ', '崔', 17, '沁颜光感面膜', 0, '0', 0.01, 1, 0.01, 1465285939);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_sign_config`
-- 

CREATE TABLE `wfx_sign_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `first_sign` float NOT NULL,
  `continue_sign` float NOT NULL,
  `max_sign` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_sign_config`
-- 

INSERT INTO `wfx_sign_config` VALUES (1, '签到系统', 61, 21, 301);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_sign_record`
-- 

CREATE TABLE `wfx_sign_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `score` float NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `wfx_sign_record`
-- 

INSERT INTO `wfx_sign_record` VALUES (1, 162, 6, '2015-09-14 16:04:11');
INSERT INTO `wfx_sign_record` VALUES (2, 162, 8, '2015-09-15 09:24:42');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_sms`
-- 

CREATE TABLE `wfx_sms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_sms`
-- 

INSERT INTO `wfx_sms` VALUES (1, 'xtjc2015 ', '123456');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_tx`
-- 

CREATE TABLE `wfx_tx` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `txid` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `account` text NOT NULL,
  `name` text NOT NULL,
  `money` float NOT NULL,
  `fee` float NOT NULL COMMENT '手续费',
  `tx` float NOT NULL COMMENT '最终提现',
  `status` int(11) NOT NULL COMMENT '0：申请提现1：通过-1拒绝取消',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- 导出表中的数据 `wfx_tx`
-- 

INSERT INTO `wfx_tx` VALUES (1, '1604071202517', 789, 20, '1604583867@qq.com', '清月曦', 120, 1.32, 118.68, -1, '2016-05-25 15:15:53');
INSERT INTO `wfx_tx` VALUES (2, '1604071203044', 789, 20, '1604583867@qq.com', '清月曦', 150, 1.65, 148.35, -1, '2016-05-25 15:17:53');
INSERT INTO `wfx_tx` VALUES (3, '1605250553129', 2, 20, '1604583867@qq.com', '清月曦', 200, 4, 196, -1, '2016-05-27 15:30:00');
INSERT INTO `wfx_tx` VALUES (4, '1605250557149', 2, 20, '1604583867@qq.com', '清月曦', 1, 0.02, 0.98, 1, '2016-06-07 17:20:43');
INSERT INTO `wfx_tx` VALUES (5, '1605250612201', 2, 20, '1604583867@qq.com', '清月曦', 100, 2, 98, -1, '2016-06-07 16:52:04');
INSERT INTO `wfx_tx` VALUES (6, '1606070452178', 2, 20, '1604583867@qq.com', '清月曦', 100, 2, 98, 1, '2016-06-07 17:20:41');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_upload_img`
-- 

CREATE TABLE `wfx_upload_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `ext` varchar(8) DEFAULT NULL,
  `type` char(10) DEFAULT NULL,
  `savename` varchar(255) DEFAULT NULL,
  `savepath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=176 ;

-- 
-- 导出表中的数据 `wfx_upload_img`
-- 

INSERT INTO `wfx_upload_img` VALUES (1, '产品图片.jpg', 'jpg', 'img', '549a4eb1c8054.jpg', 'img/2014-12-24/');
INSERT INTO `wfx_upload_img` VALUES (2, '首页产品列表图.jpg', 'jpg', 'img', '549a4eb1c8746.jpg', 'img/2014-12-24/');
INSERT INTO `wfx_upload_img` VALUES (3, '首页大图片.jpg', 'jpg', 'img', '549a4eb1c8f7a.jpg', 'img/2014-12-24/');
INSERT INTO `wfx_upload_img` VALUES (4, '首页大图片2.jpg', 'jpg', 'img', '549a4eb1c991d.jpg', 'img/2014-12-24/');
INSERT INTO `wfx_upload_img` VALUES (5, '首页大图片3.jpg', 'jpg', 'img', '549a4eb1ca143.jpg', 'img/2014-12-24/');
INSERT INTO `wfx_upload_img` VALUES (6, 'logoquan14131357571.PNG', 'PNG', 'img', '549b795e91372.PNG', 'img/2014-12-25/');
INSERT INTO `wfx_upload_img` VALUES (7, 'logo2.jpg', 'jpg', 'img', '549b93db71f1e.jpg', 'img/2014-12-25/');
INSERT INTO `wfx_upload_img` VALUES (8, '面膜.png', 'png', 'img', '549b94519fff4.png', 'img/2014-12-25/');
INSERT INTO `wfx_upload_img` VALUES (9, '面膜伴侣.png', 'png', 'img', '549b9451a0520.png', 'img/2014-12-25/');
INSERT INTO `wfx_upload_img` VALUES (10, '面霜.png', 'png', 'img', '549b9451a089a.png', 'img/2014-12-25/');
INSERT INTO `wfx_upload_img` VALUES (11, '眼霜.png', 'png', 'img', '549b9451a0c34.png', 'img/2014-12-25/');
INSERT INTO `wfx_upload_img` VALUES (12, '图片1.jpg', 'jpg', 'img', '549bc92c8d125.jpg', 'img/2014-12-25/');
INSERT INTO `wfx_upload_img` VALUES (13, '未标题-3.jpg', 'jpg', 'img', '549cdc18f3279.jpg', 'img/2014-12-26/');
INSERT INTO `wfx_upload_img` VALUES (14, '未标题-2.jpg', 'jpg', 'img', '549d018a42410.jpg', 'img/2014-12-26/');
INSERT INTO `wfx_upload_img` VALUES (15, 'curr_logo.png', 'png', 'img', '54a8f87a78cc7.png', 'img/2015-01-04/');
INSERT INTO `wfx_upload_img` VALUES (16, 'pay.jpg', 'jpg', 'img', '54af92f4b068d.jpg', 'img/2015-01-09/');
INSERT INTO `wfx_upload_img` VALUES (17, 'pay.jpg', 'jpg', 'img', '54af92f5a6e23.jpg', 'img/2015-01-09/');
INSERT INTO `wfx_upload_img` VALUES (18, 'pay.jpg', 'jpg', 'img', '54af92f62512a.jpg', 'img/2015-01-09/');
INSERT INTO `wfx_upload_img` VALUES (19, '会员系统1.jpg', 'jpg', 'img', '54af9453767f2.jpg', 'img/2015-01-09/');
INSERT INTO `wfx_upload_img` VALUES (20, '机能水.png', 'png', 'img', '54aff19f870f0.png', 'img/2015-01-09/');
INSERT INTO `wfx_upload_img` VALUES (21, '洁面系列.png', 'png', 'img', '54aff1b954734.png', 'img/2015-01-09/');
INSERT INTO `wfx_upload_img` VALUES (22, '精华.png', 'png', 'img', '54aff1d2d0787.png', 'img/2015-01-09/');
INSERT INTO `wfx_upload_img` VALUES (23, '乳液.png', 'png', 'img', '54aff1f03f71e.png', 'img/2015-01-09/');
INSERT INTO `wfx_upload_img` VALUES (24, '套合.png', 'png', 'img', '54aff201230ad.png', 'img/2015-01-09/');
INSERT INTO `wfx_upload_img` VALUES (25, '营养霜.png', 'png', 'img', '54aff224caae1.png', 'img/2015-01-09/');
INSERT INTO `wfx_upload_img` VALUES (26, 'test_jpg.jpg', 'jpg', 'img', '54b08b93164c3.jpg', 'img/2015-01-10/');
INSERT INTO `wfx_upload_img` VALUES (27, '广告图a.jpg', 'jpg', 'img', '54b9c2b2e86f5.jpg', 'img/2015-01-17/');
INSERT INTO `wfx_upload_img` VALUES (28, '广告图a.jpg', 'jpg', 'img', '54b9c2b472107.jpg', 'img/2015-01-17/');
INSERT INTO `wfx_upload_img` VALUES (29, '广告图b.jpg', 'jpg', 'img', '54b9c2f06a356.jpg', 'img/2015-01-17/');
INSERT INTO `wfx_upload_img` VALUES (30, '广告图3.jpg', 'jpg', 'img', '54b9c335e8a89.jpg', 'img/2015-01-17/');
INSERT INTO `wfx_upload_img` VALUES (31, '广告图3.jpg', 'jpg', 'img', '54b9c33d6c7b0.jpg', 'img/2015-01-17/');
INSERT INTO `wfx_upload_img` VALUES (32, '广告图c.jpg', 'jpg', 'img', '54b9c7d2cadf7.jpg', 'img/2015-01-17/');
INSERT INTO `wfx_upload_img` VALUES (33, '产品图.jpg', 'jpg', 'img', '54b9c9e9b8247.jpg', 'img/2015-01-17/');
INSERT INTO `wfx_upload_img` VALUES (34, '重磅推荐mini.jpg', 'jpg', 'img', '54b9cf01b019c.jpg', 'img/2015-01-17/');
INSERT INTO `wfx_upload_img` VALUES (35, '跳转到购买的页面 拷贝.jpg', 'jpg', 'img', '54b9d28dc0331.jpg', 'img/2015-01-17/');
INSERT INTO `wfx_upload_img` VALUES (36, 'duck.jpg', 'jpg', 'img', '54bcd899cdebb.jpg', 'img/2015-01-19/');
INSERT INTO `wfx_upload_img` VALUES (37, 't.php', 'php', 'img', '54bddfa01ce5d.php', 'img/2015-01-20/');
INSERT INTO `wfx_upload_img` VALUES (38, 't.php', 'php', 'img', '54be05c9cce41.php', 'img/2015-01-20/');
INSERT INTO `wfx_upload_img` VALUES (39, 't.php', 'php', 'img', '54be077e93a24.php', 'img/2015-01-20/');
INSERT INTO `wfx_upload_img` VALUES (40, '营养霜.png', 'png', 'img', '54c12da37fab4.png', 'img/2015-01-23/');
INSERT INTO `wfx_upload_img` VALUES (41, '面霜.png', 'png', 'img', '54c1b3f2b791a.png', 'img/2015-01-23/');
INSERT INTO `wfx_upload_img` VALUES (42, '套合.png', 'png', 'img', '54c1b41aeb4f3.png', 'img/2015-01-23/');
INSERT INTO `wfx_upload_img` VALUES (43, '机能水.png', 'png', 'img', '54c1b441879dc.png', 'img/2015-01-23/');
INSERT INTO `wfx_upload_img` VALUES (44, '机能水.png', 'png', 'img', '54c1b58138831.png', 'img/2015-01-23/');
INSERT INTO `wfx_upload_img` VALUES (45, '未标题-1(7).jpg', 'jpg', 'img', '54c1e9314d7b5.jpg', 'img/2015-01-23/');
INSERT INTO `wfx_upload_img` VALUES (46, '机能水.png', 'png', 'img', '54c1efb3abc5a.png', 'img/2015-01-23/');
INSERT INTO `wfx_upload_img` VALUES (47, '未标题-1(11).jpg', 'jpg', 'img', '54c21b90a3331.jpg', 'img/2015-01-23/');
INSERT INTO `wfx_upload_img` VALUES (48, '图改2.jpg', 'jpg', 'img', '54c338276169a.jpg', 'img/2015-01-24/');
INSERT INTO `wfx_upload_img` VALUES (49, '重磅推荐.jpg', 'jpg', 'img', '54c35750c2877.jpg', 'img/2015-01-24/');
INSERT INTO `wfx_upload_img` VALUES (50, '滚2.jpg', 'jpg', 'img', '54c35c72f3e3a.jpg', 'img/2015-01-24/');
INSERT INTO `wfx_upload_img` VALUES (51, '滚动1.jpg', 'jpg', 'img', '54c35c8ddb94c.jpg', 'img/2015-01-24/');
INSERT INTO `wfx_upload_img` VALUES (52, '重磅推荐2.jpg', 'jpg', 'img', '54c367530c61f.jpg', 'img/2015-01-24/');
INSERT INTO `wfx_upload_img` VALUES (53, '重.jpg', 'jpg', 'img', '54c379d19f4fb.jpg', 'img/2015-01-24/');
INSERT INTO `wfx_upload_img` VALUES (54, 'pay.jpg', 'jpg', 'img', '54c3bea544255.jpg', 'img/2015-01-24/');
INSERT INTO `wfx_upload_img` VALUES (55, '416876.jpg', 'jpg', 'img', '54d60eec09fc2.jpg', 'img/2015-02-07/');
INSERT INTO `wfx_upload_img` VALUES (56, '621+98+95.jpg', 'jpg', 'img', '54d610cf26b86.jpg', 'img/2015-02-07/');
INSERT INTO `wfx_upload_img` VALUES (57, '未标题-1(17).jpg', 'jpg', 'img', '54d9b7a197584.jpg', 'img/2015-02-10/');
INSERT INTO `wfx_upload_img` VALUES (58, '推荐.jpg', 'jpg', 'img', '54dc69e8b65a5.jpg', 'img/2015-02-12/');
INSERT INTO `wfx_upload_img` VALUES (59, '轮播1.jpg', 'jpg', 'img', '54dc6b02048fa.jpg', 'img/2015-02-12/');
INSERT INTO `wfx_upload_img` VALUES (60, '轮播1-小像素.jpg', 'jpg', 'img', '54dc73e469861.jpg', 'img/2015-02-12/');
INSERT INTO `wfx_upload_img` VALUES (61, '推荐.jpg', 'jpg', 'img', '54dc7f130d7d0.jpg', 'img/2015-02-12/');
INSERT INTO `wfx_upload_img` VALUES (62, '推荐(1).jpg', 'jpg', 'img', '54dc7fe56d974.jpg', 'img/2015-02-12/');
INSERT INTO `wfx_upload_img` VALUES (63, '产品(2).jpg', 'jpg', 'img', '54dc800385fd4.jpg', 'img/2015-02-12/');
INSERT INTO `wfx_upload_img` VALUES (64, 'IMG_3823.jpg', 'jpg', 'img', '54dc83977964d.jpg', 'img/2015-02-12/');
INSERT INTO `wfx_upload_img` VALUES (65, '产品.jpg', 'jpg', 'img', '54dc8e9cd2bb5.jpg', 'img/2015-02-12/');
INSERT INTO `wfx_upload_img` VALUES (66, '轮播-小像素.jpg', 'jpg', 'img', '54dd7ef152d13.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (67, '轮播2-小像素.jpg', 'jpg', 'img', '54dd7f07d74ee.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (68, '轮播-小像素-1.jpg', 'jpg', 'img', '54ddacc2034a0.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (69, '自己情人节.jpg', 'jpg', 'img', '54ddad0a0eb39.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (70, '花漾水盒(1)(1).jpg', 'jpg', 'img', '54ddb6d64c6e4.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (71, '大图.jpg', 'jpg', 'img', '54ddb9a95eeb7.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (72, '产品(3).jpg', 'jpg', 'img', '54ddb9c151f6a.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (73, '轮播图3.jpg', 'jpg', 'img', '54ddbf54a2d5e.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (74, '产品2.jpg', 'jpg', 'img', '54ddc1d610306.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (75, '轮播-2(1).jpg', 'jpg', 'img', '54ddcbb05d283.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (76, '产品图2.jpg', 'jpg', 'img', '54ddd2332baea.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (77, '小.jpg', 'jpg', 'img', '54ddd27332323.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (78, '详情产品(1).jpg', 'jpg', 'img', '54ddd2bfdf9c9.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (79, '喷雾2(1).jpg', 'jpg', 'img', '54ddd2eaa0e87.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (80, '推荐2.jpg', 'jpg', 'img', '54ddd3e1cc7d9.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (81, '喷雾.jpg', 'jpg', 'img', '54ddd498d0778.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (82, '轮播2.jpg', 'jpg', 'img', '54dde5002b1b5.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (83, '轮播2(1).jpg', 'jpg', 'img', '54dde6670985c.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (84, '轮播2(2).jpg', 'jpg', 'img', '54dde8485a69a.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (85, '轮播-2(2).jpg', 'jpg', 'img', '54ddea731add6.jpg', 'img/2015-02-13/');
INSERT INTO `wfx_upload_img` VALUES (86, 'icon.jpg', 'jpg', 'img', '55680506ed5a8.jpg', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (87, '顶部图3.jpg', 'jpg', 'img', '556838f8e0cbf.jpg', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (88, '顶部图3.png', 'png', 'img', '5568392e911b7.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (89, '顶部图.jpg', 'jpg', 'img', '556839812e920.jpg', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (90, '顶部图4.png', 'png', 'img', '55683c5540a58.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (91, '水果分类.png', 'png', 'img', '55683ee47f841.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (92, 'rBEbSVNwiooIAAAAAAIDy8FnqvgAAAQhgK2DGcAAgPj678.jpg', 'jpg', 'img', '556844685e786.jpg', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (93, 'B3E8C672-BB81-483E-8E2D-4091A219498B.png', 'png', 'img', '5568452dac99b.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (94, '80285D2A-912D-44FC-BAB8-1E2A14FA596B.png', 'png', 'img', '556846399c09e.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (95, 'ED3D46C0-2D52-43E0-A0F9-127580A33CC4.png', 'png', 'img', '55684653579d8.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (96, 'F7B1A7B8-79C6-4B98-B227-8CCFA3AFC9ED.png', 'png', 'img', '556846660f4fb.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (97, '蔬菜分类.png', 'png', 'img', '5568499b03771.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (98, '0BEE9C1A-43D0-4D20-8E29-7EF67DEC59DC.png', 'png', 'img', '556856a104271.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (99, '芒果1.png', 'png', 'img', '556856c626d54.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (100, '芒果.png', 'png', 'img', '5568587abfa64.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (101, '西柚3.jpg', 'jpg', 'img', '55685971e81d1.jpg', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (102, '西柚4.png', 'png', 'img', '5568597d311d1.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (103, '西柚2.png', 'png', 'img', '556859a339198.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (104, '西柚.jpg', 'jpg', 'img', '556859ae6acbb.jpg', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (105, '环山.png', 'png', 'img', '55685c32d7cf1.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (106, '环山2.jpg', 'jpg', 'img', '55685c3e3f53e.jpg', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (107, '环山4.png', 'png', 'img', '55685c588faee.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (108, '环山3.png', 'png', 'img', '55685c675a6a8.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (109, '环山5.png', 'png', 'img', '55685cbb16894.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (110, '芦荟.jpg', 'jpg', 'img', '55685e51ef7dd.jpg', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (111, '芦荟4.png', 'png', 'img', '55685e600e88d.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (112, '芦荟3.jpg', 'jpg', 'img', '55685e8566907.jpg', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (113, '芒果.png', 'png', 'img', '55686032d13cb.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (114, '西柚6.png', 'png', 'img', '556860e245962.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (115, '芦荟6.png', 'png', 'img', '55686240bafee.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (116, '芦荟6.png', 'png', 'img', '5568637bbdf2e.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (117, '环山6.png', 'png', 'img', '556863f167504.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (118, '蔬菜分类图.png', 'png', 'img', '556866f25b6c8.png', 'img/2015-05-29/');
INSERT INTO `wfx_upload_img` VALUES (119, 'F7B1A7B8-79C6-4B98-B227-8CCFA3AFC9ED.jpg', 'jpg', 'img', '5569235183653.jpg', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (120, 'ED3D46C0-2D52-43E0-A0F9-127580A33CC4.jpg', 'jpg', 'img', '556923b978ed0.jpg', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (121, 'ED3D46C0-2D52-43E0-A0F9-127580A33CC4.jpg', 'jpg', 'img', '556923bb2ca5d.jpg', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (122, '80285D2A-912D-44FC-BAB8-1E2A14FA596B.jpg', 'jpg', 'img', '55692410c2393.jpg', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (123, '芒果.jpg', 'jpg', 'img', '5569243e40f06.jpg', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (124, '西柚4.jpg', 'jpg', 'img', '556925c29ff84.jpg', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (125, '西柚3.jpg', 'jpg', 'img', '556925e45b919.jpg', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (126, '西柚.jpg', 'jpg', 'img', '556925f11ad17.jpg', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (127, '环山.jpg', 'jpg', 'img', '55692670a524d.jpg', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (128, '环山6.png', 'png', 'img', '55692686d6e89.png', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (129, '环山5.jpg', 'jpg', 'img', '5569269d23d03.jpg', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (130, '环山2.jpg', 'jpg', 'img', '556926cb6518d.jpg', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (131, '环山4.png', 'png', 'img', '556926dd46bf3.png', 'img/2015-05-30/');
INSERT INTO `wfx_upload_img` VALUES (132, 'banner_pinlei.jpg', 'jpg', 'img', '5572934c6fb04.jpg', 'img/2015-06-06/');
INSERT INTO `wfx_upload_img` VALUES (133, 'wzqte.php', 'php', 'img', '557e59c23f95f.php', 'img/2015-06-15/');
INSERT INTO `wfx_upload_img` VALUES (134, '3.jpg', 'jpg', 'img', '5581090a8bdd9.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (135, '9.jpg', 'jpg', 'img', '5581180f9b7ed.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (136, 'n_11647378174468.jpg', 'jpg', 'img', '5581274900a85.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (137, '沁颜面膜海报.jpg', 'jpg', 'img', '55814938c500c.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (138, '玉皙5 (1) (1)  (1) (1).jpg', 'jpg', 'img', '55814a94e29ce.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (139, '玉皙5 (1) (1)  (1) (1).jpg', 'jpg', 'img', '55814a994ddfc.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (140, '玉皙5 (1) (1)  (1) (1).jpg', 'jpg', 'img', '55814a9bcbc75.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (141, '0000.jpg', 'jpg', 'img', '55814f1999589.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (142, '图1.jpg', 'jpg', 'img', '55817d23e673c.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (143, '图2 (1).jpg', 'jpg', 'img', '5581818391099.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (144, '背景 (1).jpg', 'jpg', 'img', '558184a7e87d2.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (145, '图3 (1).jpg', 'jpg', 'img', '55818517a4b27.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (146, '图3.jpg', 'jpg', 'img', '5581858fbc8a2.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (147, '图4 (1).jpg', 'jpg', 'img', '558186b46b55c.jpg', 'img/2015-06-17/');
INSERT INTO `wfx_upload_img` VALUES (148, 'biaozhi1 (1).png', 'png', 'img', '558280879017c.png', 'img/2015-06-18/');
INSERT INTO `wfx_upload_img` VALUES (149, '53002b1c0e48c.png', 'png', 'img', '55828fa9b5c1f.png', 'img/2015-06-18/');
INSERT INTO `wfx_upload_img` VALUES (150, 'ÇßÑÕÃæÄ¤º£±¨1.jpg', 'jpg', 'img', '5583f0d4a75e9.jpg', 'img/2015-06-19/');
INSERT INTO `wfx_upload_img` VALUES (151, '9.jpg', 'jpg', 'img', '5583f1ec8b79c.jpg', 'img/2015-06-19/');
INSERT INTO `wfx_upload_img` VALUES (152, '¹â¸Ð551.jpg', 'jpg', 'img', '5583f2b1766f0.jpg', 'img/2015-06-19/');
INSERT INTO `wfx_upload_img` VALUES (153, '64EBB3F3-637E-4599-A7D9-0EC2AA2C606D.png', 'png', 'img', '55843bedc1158.png', 'img/2015-06-19/');
INSERT INTO `wfx_upload_img` VALUES (154, '6.pic.jpg', 'jpg', 'img', '55843d31e9f3c.jpg', 'img/2015-06-20/');
INSERT INTO `wfx_upload_img` VALUES (155, '2.pic.jpg', 'jpg', 'img', '55843dde0a7f9.jpg', 'img/2015-06-20/');
INSERT INTO `wfx_upload_img` VALUES (156, '9.pic.jpg', 'jpg', 'img', '55843e2229a79.jpg', 'img/2015-06-20/');
INSERT INTO `wfx_upload_img` VALUES (157, 'C1FCE587-DEFD-441F-9FF9-0A1779772CFB.png', 'png', 'img', '558443d223c96.png', 'img/2015-06-20/');
INSERT INTO `wfx_upload_img` VALUES (158, 'ÇßÑÕÃæÄ¤º£±¨2.jpg', 'jpg', 'img', '5584443487e43.jpg', 'img/2015-06-20/');
INSERT INTO `wfx_upload_img` VALUES (159, 'ÇßÑÕÃæÄ¤º£±¨2.jpg', 'jpg', 'img', '55844434d4303.jpg', 'img/2015-06-20/');
INSERT INTO `wfx_upload_img` VALUES (160, 'ÇßÑÕÃæÄ¤º£±¨1.jpg', 'jpg', 'img', '558445021b2f3.jpg', 'img/2015-06-20/');
INSERT INTO `wfx_upload_img` VALUES (161, '66518339-1D6F-4716-A39E-F566ED22D774.png', 'png', 'img', '5585affee26ac.png', 'img/2015-06-21/');
INSERT INTO `wfx_upload_img` VALUES (162, 'W020140628426155378205.jpg', 'jpg', 'img', '5585b102261cc.jpg', 'img/2015-06-21/');
INSERT INTO `wfx_upload_img` VALUES (163, '319193_5_0_0_560_w_0.jpg', 'jpg', 'img', '5585b1c87be53.jpg', 'img/2015-06-21/');
INSERT INTO `wfx_upload_img` VALUES (164, '7.jpg', 'jpg', 'img', '5585b8b94bb3c.jpg', 'img/2015-06-21/');
INSERT INTO `wfx_upload_img` VALUES (165, '10.jpg', 'jpg', 'img', '5585bbc99016f.jpg', 'img/2015-06-21/');
INSERT INTO `wfx_upload_img` VALUES (166, '水果分类.png', 'png', 'img', '558cb56143fed.png', 'img/2015-06-26/');
INSERT INTO `wfx_upload_img` VALUES (167, '538d80973f66e.jpg', 'jpg', 'img', '55f6254111994.jpg', 'img/2015-09-14/');
INSERT INTO `wfx_upload_img` VALUES (168, '01.jpg', 'jpg', 'img', '57567f12dc63d.jpg', 'img/2016-06-07/');
INSERT INTO `wfx_upload_img` VALUES (169, '4.jpg', 'jpg', 'img', '57567f5185ecd.jpg', 'img/2016-06-07/');
INSERT INTO `wfx_upload_img` VALUES (170, 'kaifazhe.jpg', 'jpg', 'img', '57569b1ade28c.jpg', 'img/2016-06-07/');
INSERT INTO `wfx_upload_img` VALUES (171, 'Multiuser.jpg', 'jpg', 'img', '57569b1ae4a91.jpg', 'img/2016-06-07/');
INSERT INTO `wfx_upload_img` VALUES (172, '1.jpg', 'jpg', 'img', '575795d418c81.jpg', 'img/2016-06-08/');
INSERT INTO `wfx_upload_img` VALUES (173, '4.jpg', 'jpg', 'img', '575796205b49d.jpg', 'img/2016-06-08/');
INSERT INTO `wfx_upload_img` VALUES (174, '25.jpg', 'jpg', 'img', '5757bb09ea650.jpg', 'img/2016-06-08/');
INSERT INTO `wfx_upload_img` VALUES (175, 'Bus_4.png', 'png', 'img', '5757bb37477f5.png', 'img/2016-06-08/');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_user`
-- 

CREATE TABLE `wfx_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `nickname` varchar(255) DEFAULT '管理员',
  `oath` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT '0',
  `mobile` varchar(255) DEFAULT '0',
  `email` text NOT NULL,
  `money` float DEFAULT '0',
  `ctime` int(11) DEFAULT '0',
  `etime` int(11) DEFAULT '0',
  `cctime` int(11) DEFAULT '0',
  `lastip` varchar(255) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `type` int(11) NOT NULL COMMENT '1超管0商家',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- 导出表中的数据 `wfx_user`
-- 

INSERT INTO `wfx_user` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '超级管理员', 'sys,wx,vip,shop,order,log,withdraw,card,emp,tree,addon,score,artical,', '2094157689', '13285135888', '1604583868@qq.com', 88888, 0, 0, 0, '0', 1, 1);
INSERT INTO `wfx_user` VALUES (2, '1', 'c4ca4238a0b923820dcc509a6f75849b', '管理员', 'sys,wx,vip,shop,order,log,withdraw,card,emp,tree,addon,score,artical,', '0', '18538753627', '1604583867@qq.com', 0, 0, 0, 0, '0', 1, 0);
INSERT INTO `wfx_user` VALUES (4, '2', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'sys,', '0', '0', '', 0, 0, 0, 0, '0', 1, 0);
INSERT INTO `wfx_user` VALUES (9, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'b', 'sys,wx,vip,shop,order,log,withdraw,card,emp,tree,normal,addon,artical,', '0', '0', '', 0, 1465357055, 0, 0, '0', 1, 0);
INSERT INTO `wfx_user` VALUES (10, 'asd', 'b6d767d2f8ed5d21a44b0e5886680cb9', '管理员小王', 'sys,vip,', '0', '0', '', 0, 1465370627, 0, 0, '0', 1, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_user_oath`
-- 

CREATE TABLE `wfx_user_oath` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `option` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- 
-- 导出表中的数据 `wfx_user_oath`
-- 

INSERT INTO `wfx_user_oath` VALUES (1, 'sys', '系统设置权限', '管理员控制器', 1);
INSERT INTO `wfx_user_oath` VALUES (2, 'wx', '微信权限', '微信控制器', 1);
INSERT INTO `wfx_user_oath` VALUES (3, 'vip', '会员权限（管理员）', '会员控制器', 1);
INSERT INTO `wfx_user_oath` VALUES (4, 'shop', '商城权限', '商城控制器', 1);
INSERT INTO `wfx_user_oath` VALUES (5, 'order', '订单权限', '管理订单', 1);
INSERT INTO `wfx_user_oath` VALUES (6, 'log', '日志权限', '日志控制器', 1);
INSERT INTO `wfx_user_oath` VALUES (7, 'withdraw', '财务权限', '管理、出纳', 1);
INSERT INTO `wfx_user_oath` VALUES (8, 'card', '卡券权限', '管理代金券及充值卡', 1);
INSERT INTO `wfx_user_oath` VALUES (9, 'emp', '员工管理', '管理员工信息', 1);
INSERT INTO `wfx_user_oath` VALUES (10, 'employee', '员工模块', '员工控制器', 0);
INSERT INTO `wfx_user_oath` VALUES (11, 'tree', '层级树', '层级统计', 1);
INSERT INTO `wfx_user_oath` VALUES (12, 'normal', '会员权限（普通）', '管理会员，多数是查看权限', 1);
INSERT INTO `wfx_user_oath` VALUES (13, 'addon', '插件权限', '插件管理', 1);
INSERT INTO `wfx_user_oath` VALUES (14, 'score', '积分权限', '积分管理', 1);
INSERT INTO `wfx_user_oath` VALUES (15, 'artical', '文章权限', '文章管理', 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vip`
-- 

CREATE TABLE `wfx_vip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `plv` int(11) DEFAULT NULL,
  `path` longtext,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT '0.00',
  `score` int(11) DEFAULT '0',
  `exp` int(11) DEFAULT '0',
  `cur_exp` int(11) DEFAULT NULL,
  `levelid` int(11) DEFAULT NULL,
  `openid` varchar(255) DEFAULT '0',
  `nickname` varchar(30) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `language` varchar(10) DEFAULT NULL,
  `headimgurl` varchar(255) DEFAULT NULL,
  `subscribe` tinyint(1) DEFAULT NULL,
  `subscribe_time` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `ctime` int(11) DEFAULT '0',
  `cctime` int(11) DEFAULT NULL,
  `sign` int(11) DEFAULT '0',
  `signtime` int(11) DEFAULT NULL,
  `isfx` tinyint(1) DEFAULT '0',
  `isfxgd` tinyint(1) DEFAULT '0',
  `total_buy` float DEFAULT '0',
  `total_yj` float DEFAULT '0',
  `total_xxyj` float DEFAULT '0',
  `total_xxlink` int(11) DEFAULT '0',
  `total_xxsub` int(11) DEFAULT '0',
  `total_xxunsub` int(11) DEFAULT '0',
  `total_xxbuy` int(11) DEFAULT '0',
  `txname` varchar(255) DEFAULT NULL,
  `txmobile` varchar(255) DEFAULT NULL,
  `txyh` varchar(255) DEFAULT NULL,
  `txfh` varchar(255) DEFAULT NULL,
  `txszd` varchar(255) DEFAULT NULL,
  `txcard` varchar(255) DEFAULT NULL,
  `employee` int(11) DEFAULT '0',
  `ticket` text,
  `continue_sign` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=8 ;

-- 
-- 导出表中的数据 `wfx_vip`
-- 

INSERT INTO `wfx_vip` VALUES (1, 0, 1, '0', '10086', NULL, '10086', '10086@10086.com', 7324.19, 21, 32, 32, 1, 'owv5gsyXxBMYOjeM56e5vK33it0Y', 'AI.何青.wemall', '2', 'Shenzhen', 'Guangdong', 'CN', NULL, 'http://wx.qlogo.cn/mmopen/KMt8YcxoTr7iaBlsovicVoDriciaLBcQtic7D4IyETkKusiasVicTJq5s2PianSUeg9HuVjGXQQQ9Pz07vyrdE7lMQ1EGw/0', 1, NULL, NULL, 1, 1435306487, 1435308228, 0, 1465211135, 1, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1);
INSERT INTO `wfx_vip` VALUES (4, 0, 1, '0', NULL, NULL, NULL, NULL, 12.00, 112, 32, 20, 1, 'ooey5s5rHnSHZkOthHOnstm0aWc8', 'AI.何青.wemall', '1', '', 'Louth', '', NULL, 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLC0dSicngAbWZuQ2D4YS2f4PjVVvlKgPcgRkdBWjoypSvibqs1B31zy4YcV6UicCUSj5vTj5P2DVmZQA/0', NULL, NULL, NULL, 1, 1465285486, 1465285486, 0, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0);
INSERT INTO `wfx_vip` VALUES (6, 4, 2, '0-4', NULL, NULL, NULL, NULL, 0.00, 100, 20, 20, 1, 'ooey5s5nbkO0w4V7pkH7CmlS5CuQ', '清月曦', '1', 'Zhengzhou', 'Henan', 'CN', NULL, 'http://wx.qlogo.cn/mmopen/wWaBEsndl8AiaEXJZmHnkWXquvkwK9j0qWYF1us4q3ibfjAHiclzuTgiciaqGUKvCPnFKbI0F6jqUckDIt3SQDVpRv9DQRCnHahvX/0', NULL, NULL, NULL, 1, 1465365922, 1465365922, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0);
INSERT INTO `wfx_vip` VALUES (7, 0, 1, '0', NULL, NULL, NULL, NULL, 0.00, 100, 20, 20, 1, 'ooey5szh3KMTKs-jgJ5wxJ0gCj-4', 'Angel~暖暖', '2', '', '', 'CN', NULL, 'http://wx.qlogo.cn/mmopen/KetjXWSVppv3KicEHKAy5LBdfL8wdqUAe6PV3ibAm2IlOhv1dZdvP75vyCibFtkwNK7Qmjc1sXFiaQ8Tv7apgDHEGDFTsYFOCia3f/0', NULL, NULL, NULL, 1, 1465366841, 1465366841, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vip_address`
-- 

CREATE TABLE `wfx_vip_address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vipid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `xqid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

-- 
-- 导出表中的数据 `wfx_vip_address`
-- 

INSERT INTO `wfx_vip_address` VALUES (66, 162, '何', '1112', '2222', 1);
INSERT INTO `wfx_vip_address` VALUES (67, 162, '1', '15378701381', '111', 1);
INSERT INTO `wfx_vip_address` VALUES (68, 1, '浩哥', '18538753627', '河南省郑州市金水区', 1);
INSERT INTO `wfx_vip_address` VALUES (69, 1, '1525', '15238027761', '啊啊啊', 1);
INSERT INTO `wfx_vip_address` VALUES (70, 3, '崔', '18538753627', '哈哈市', 1);
INSERT INTO `wfx_vip_address` VALUES (71, 5, '小崔', '15178108946', '中方园', 1);
INSERT INTO `wfx_vip_address` VALUES (72, 6, '崔', '18538753627', '哈哈', 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vip_card`
-- 

CREATE TABLE `wfx_vip_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) DEFAULT NULL COMMENT '1充值卡；2代金券',
  `vipid` int(11) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `cardno` varchar(255) DEFAULT NULL,
  `cardpwd` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '状态  0：生成，1：已建卡，2：已使用',
  `stime` int(11) DEFAULT NULL,
  `etime` int(11) DEFAULT NULL,
  `usemoney` int(11) DEFAULT NULL,
  `ctime` int(11) DEFAULT '0',
  `usetime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=121 ;

-- 
-- 导出表中的数据 `wfx_vip_card`
-- 

INSERT INTO `wfx_vip_card` VALUES (4, 2, NULL, 2, '4131119513', '7RMJBGLIF2', 0, 1442851200, 1443542400, 20, 1443327082, 0);
INSERT INTO `wfx_vip_card` VALUES (3, 2, NULL, 2, '3935801942', 'PGIAV8YKY9', 0, 1442851200, 1443542400, 20, 1443327082, 0);
INSERT INTO `wfx_vip_card` VALUES (5, 2, 1, 2, '4596556283', 'JLSXPZ1NK6', 1, 1442851200, 1443542400, 20, 1443327082, 0);
INSERT INTO `wfx_vip_card` VALUES (6, 2, 162, 2, '7231542864', 'XEBW3WGQ6A', 1, 1442851200, 1443542400, 20, 1443327082, 0);
INSERT INTO `wfx_vip_card` VALUES (7, 2, 162, 2, '7133870513', 'R7U4BCKL79', 1, 1442851200, 1443542400, 20, 1443327082, 0);
INSERT INTO `wfx_vip_card` VALUES (8, 2, 162, 2, '7518194333', 'NFS0QLSQ6Y', 1, 1442851200, 1443542400, 20, 1443327082, 0);
INSERT INTO `wfx_vip_card` VALUES (9, 2, NULL, 5, '0932024956', 'FNJNCJUYL5', 0, 1462204800, 1463155200, 100, 1462453244, 0);
INSERT INTO `wfx_vip_card` VALUES (10, 2, NULL, 5, '2648766597', 'PU9N6G4RWC', 0, 1462204800, 1463155200, 100, 1462453244, 0);
INSERT INTO `wfx_vip_card` VALUES (11, 2, NULL, 5, '8574868120', 'BG135P2RQD', 0, 1462204800, 1463155200, 100, 1462453244, 0);
INSERT INTO `wfx_vip_card` VALUES (12, 2, NULL, 5, '2948367996', 'HBUM1P5ZB2', 0, 1462204800, 1463155200, 100, 1462453244, 0);
INSERT INTO `wfx_vip_card` VALUES (13, 2, NULL, 5, '2213596811', 'XR5919B3CT', 0, 1462204800, 1463155200, 100, 1462453244, 0);
INSERT INTO `wfx_vip_card` VALUES (14, 2, NULL, 5, '5619691227', 'UNYMVP251F', 0, 1462204800, 1463155200, 100, 1462453244, 0);
INSERT INTO `wfx_vip_card` VALUES (15, 2, NULL, 5, '9727994918', 'ZBOURWCR59', 0, 1462204800, 1463155200, 100, 1462453244, 0);
INSERT INTO `wfx_vip_card` VALUES (16, 2, NULL, 5, '9548434337', 'KLBGF7MZV5', 0, 1462204800, 1463155200, 100, 1462453244, 0);
INSERT INTO `wfx_vip_card` VALUES (17, 2, 1, 5, '6774631288', '9VCL2FWGXG', 1, 1462204800, 1463155200, 100, 1462453244, 0);
INSERT INTO `wfx_vip_card` VALUES (18, 2, 1, 5, '3413554913', 'CXQUFYL9J0', 1, 1462204800, 1463155200, 100, 1462453244, 0);
INSERT INTO `wfx_vip_card` VALUES (19, 2, NULL, 10, '3287488024', 'IE9359B8RP', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (20, 2, NULL, 10, '1243486550', '03MTT3OP4Y', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (21, 2, NULL, 10, '8078868963', 'M2U2F9Y2RG', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (22, 2, NULL, 10, '8292750199', '45AW16LX48', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (23, 2, NULL, 10, '0275985660', '4UJ43BN5HM', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (24, 2, NULL, 10, '7028697965', '8X1YH0T1OI', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (25, 2, NULL, 10, '8270161443', '4JOCCCC2CZ', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (26, 2, NULL, 10, '3030658232', 'RGRJJV5ODM', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (27, 2, NULL, 10, '7961062142', '42LH5A2YJF', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (28, 2, NULL, 10, '9734950801', 'G1C27DRFH8', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (29, 2, NULL, 10, '4077267020', 'GH0RWZDWUD', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (30, 2, NULL, 10, '7788579091', '9MG0DPM4QW', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (31, 2, NULL, 10, '8685142208', 'M3WHWG9SI7', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (32, 2, NULL, 10, '6228932327', '7DN2YTI82L', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (33, 2, NULL, 10, '8114376328', 'J7CT1A7ALF', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (34, 2, NULL, 10, '7221096284', 'WZU1E6T0I3', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (35, 2, NULL, 10, '5476056959', 'DKIMPKJCUF', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (36, 2, NULL, 10, '5180999472', 'LKZC60VUYF', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (37, 2, NULL, 10, '5747180496', 'TR3NU1MUIC', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (38, 2, NULL, 10, '7534622289', 'OMZ5D40FJZ', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (39, 2, NULL, 10, '7815173535', 'VDE7V1G3AA', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (40, 2, NULL, 10, '7434243055', '0MO76VZIEB', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (41, 2, NULL, 10, '8719677857', '5MEH3PYEQJ', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (42, 2, NULL, 10, '7161157878', '6UVBSJ2IEN', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (43, 2, NULL, 10, '9970255869', 'ENF0SKKIFB', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (44, 2, NULL, 10, '1067019830', 'JMC9PJR7EF', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (45, 2, NULL, 10, '9250003234', 'MPT9EWFCST', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (46, 2, NULL, 10, '1782734226', 'OF67H79THL', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (47, 2, NULL, 10, '0575581696', 'IDQDLHO2QX', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (48, 2, NULL, 10, '4883802854', 'DVB3FVYMKV', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (49, 2, NULL, 10, '0564696081', 'ZIASU3T4WD', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (50, 2, NULL, 10, '3763589212', '4H3SZPSORL', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (51, 2, NULL, 10, '5155713290', 'MK0BXK5WTC', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (52, 2, NULL, 10, '9327991436', '184LSUQ63P', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (53, 2, NULL, 10, '9176239095', 'G65QW2Q1H4', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (54, 2, NULL, 10, '4972238726', 'EF343BH2EH', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (55, 2, NULL, 10, '2301779241', 'C6D4GNGBDO', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (56, 2, NULL, 10, '6255035216', 'RQ9UV1KT92', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (57, 2, NULL, 10, '7068881092', 'QVSAEVNY5T', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (58, 2, NULL, 10, '3393951210', 'A4EZXAV4DS', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (59, 2, NULL, 10, '1516522991', 'QKQQXNB1VG', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (60, 2, NULL, 10, '8609360851', 'OXXSKG0SEX', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (61, 2, NULL, 10, '6590054030', 'IGXJG88G5R', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (62, 2, NULL, 10, '2219741592', 'FT4CW5XC78', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (63, 2, NULL, 10, '1117437456', '535A1XP6FN', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (64, 2, NULL, 10, '1299358067', '918FTORK3A', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (65, 2, NULL, 10, '9687754145', 'TW5QWIAQJW', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (66, 2, NULL, 10, '2232396824', '5EEZ64KMA1', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (67, 2, NULL, 10, '9548900943', 'W0TA878U2G', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (68, 2, NULL, 10, '0631320650', 'PRT3KT4MTL', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (69, 2, NULL, 10, '6102101159', 'LWVW1942WO', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (70, 2, NULL, 10, '7093828753', 'AGUDO1DT6Z', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (71, 2, NULL, 10, '4230800686', 'DX0A9VH4K1', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (72, 2, NULL, 10, '2398435584', 'HMYTPTWRIR', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (73, 2, NULL, 10, '1318314597', 'LIEJBSVVBR', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (74, 2, NULL, 10, '0287722375', '564A2GEK1E', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (75, 2, NULL, 10, '0031337997', 'OBAI22QCGH', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (76, 2, NULL, 10, '5014095223', 'LKOYR0BHYA', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (77, 2, NULL, 10, '9009387789', '9PBD4D9QLH', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (78, 2, NULL, 10, '7642399316', 'NFZOEBI63D', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (79, 2, NULL, 10, '8759840883', 'CWAU4LT2ZZ', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (80, 2, NULL, 10, '4081491789', '312NYY2YTW', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (81, 2, NULL, 10, '0620113790', 'PMEKRWJXMF', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (82, 2, NULL, 10, '6194551326', '8KKHLRLYHI', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (83, 2, NULL, 10, '7658905178', 'MNBI3U376D', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (84, 2, NULL, 10, '5838073446', 'WFJHCGIUN8', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (85, 2, NULL, 10, '4734910709', '5Y3JU688LN', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (86, 2, NULL, 10, '5958150314', 'NVEZCD4E57', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (87, 2, NULL, 10, '0759918911', 'MYC5SIRTWX', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (88, 2, NULL, 10, '9920631540', 'QT1CQ1IJ0M', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (89, 2, NULL, 10, '4004957403', 'CAMLCBXHUD', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (90, 2, NULL, 10, '2069107334', 'Y1TZIRI87L', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (91, 2, NULL, 10, '3936336952', 'D3K03O3U0G', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (92, 2, NULL, 10, '0495110310', 'XQA9DMN2L8', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (93, 2, NULL, 10, '0473157914', 'GH5E28L5LR', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (94, 2, NULL, 10, '8999902385', 'K59CIFX8F3', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (95, 2, NULL, 10, '4302482865', 'KVUIRTK05E', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (96, 2, NULL, 10, '2102224825', 'YX6Y8NSHGG', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (97, 2, NULL, 10, '8473729997', 'EK7FUFO9AV', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (98, 2, NULL, 10, '5624328840', 'CIT4WIEUID', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (99, 2, NULL, 10, '3333594994', 'SRF19T94PO', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (100, 2, NULL, 10, '9464326489', 'UHK8S35803', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (101, 2, NULL, 10, '4235021915', 'OBBBROMG5G', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (102, 2, NULL, 10, '1434382289', 'CKHO6HYBH4', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (103, 2, NULL, 10, '5686630958', 'GXLTCZQL8L', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (104, 2, NULL, 10, '2064446159', '9DS50FI1F2', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (105, 2, NULL, 10, '6349856386', 'WFZIWF0LKJ', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (106, 2, NULL, 10, '2237118380', 'GUNWTIGJUB', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (107, 2, NULL, 10, '9216487110', 'PMM2CQ6841', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (108, 2, NULL, 10, '0033686811', '5BNBY34Q99', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (109, 2, NULL, 10, '5438243131', '5OGH13DOXI', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (110, 2, NULL, 10, '5529597447', 'O7H02PFDTS', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (111, 2, NULL, 10, '2494662708', '9XPJW9IOPX', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (112, 2, NULL, 10, '2854538743', 'IZ2FEO3NF6', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (114, 2, NULL, 10, '4531646487', 'NF564ICT4X', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (115, 2, NULL, 10, '6146961164', '2C9EJWW5ER', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (116, 2, NULL, 10, '6464347405', 'DZZSMXFT22', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (117, 2, NULL, 10, '9589716307', '4XHQFV75C8', 0, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (118, 2, 1, 10, '4161608856', 'WTISS8XDLX', 1, 1465488000, 1465488000, 100, 1465290849, 0);
INSERT INTO `wfx_vip_card` VALUES (119, 2, 6, 10, '9844754604', 'XK4FF65A9M', 1, 1465365922, 1465970722, 100, 1465365922, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vip_level`
-- 

CREATE TABLE `wfx_vip_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `exp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `wfx_vip_level`
-- 

INSERT INTO `wfx_vip_level` VALUES (1, '普通会员', 0);
INSERT INTO `wfx_vip_level` VALUES (2, '银牌会员', 100);
INSERT INTO `wfx_vip_level` VALUES (3, '金牌会员', 200);
INSERT INTO `wfx_vip_level` VALUES (4, '钻石会员', 500);
INSERT INTO `wfx_vip_level` VALUES (5, '皇冠会员', 1000);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vip_log`
-- 

CREATE TABLE `wfx_vip_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `vipid` int(11) DEFAULT '0',
  `opid` varchar(255) DEFAULT NULL COMMENT '对应的操作对象id（如type=5 浏览消息log，此opid为vip_message的id）',
  `openid` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `event` varchar(255) DEFAULT '',
  `money` int(11) DEFAULT '0',
  `score` int(11) DEFAULT '0',
  `exp` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `type` tinyint(1) DEFAULT '0' COMMENT '日志类型 1获取注册验证码，2会员签到，3会员登陆，4会员注册，5消息读取（每条消息只记录一次），6充值卡充值，7在线充值（status0请求1成功），8购买商品',
  `ctime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- 
-- 导出表中的数据 `wfx_vip_log`
-- 

INSERT INTO `wfx_vip_log` VALUES (1, '0.0.0.0', 1, NULL, NULL, NULL, NULL, NULL, '会员签到-连续0天', 0, 1, 2, 0, 2, 1462440908);
INSERT INTO `wfx_vip_log` VALUES (2, '0.0.0.0', 1, '2016050549101989', NULL, NULL, NULL, NULL, '会员在线充值', 122, 0, 0, 1, 7, 1462452273);
INSERT INTO `wfx_vip_log` VALUES (3, '0.0.0.0', 1, '8', NULL, NULL, NULL, NULL, '会员浏览消息', 0, 0, 0, 0, 5, 1464658452);
INSERT INTO `wfx_vip_log` VALUES (4, '0.0.0.0', 1, '6', NULL, NULL, NULL, NULL, '会员浏览消息', 0, 0, 0, 0, 5, 1464776702);
INSERT INTO `wfx_vip_log` VALUES (5, '123.151.64.143', 2, NULL, 'opi_TwBuMICPr23ysfemtteWhRgY', '清月曦', NULL, NULL, '会员注册', 0, 100, 20, 0, 4, 1465021746);
INSERT INTO `wfx_vip_log` VALUES (6, '123.151.64.143', 1, '5', NULL, NULL, NULL, NULL, '会员浏览消息', 0, 0, 0, 0, 5, 1465211090);
INSERT INTO `wfx_vip_log` VALUES (7, '123.151.139.156', 1, NULL, NULL, NULL, NULL, NULL, '会员签到-连续0天', 0, 1, 2, 0, 2, 1465211135);
INSERT INTO `wfx_vip_log` VALUES (8, '123.151.139.156', 1, '4', NULL, NULL, NULL, NULL, '会员浏览消息', 0, 0, 0, 0, 5, 1465211147);
INSERT INTO `wfx_vip_log` VALUES (9, '123.151.64.143', 3, NULL, 'ooey5s5nbkO0w4V7pkH7CmlS5CuQ', '清月曦', NULL, NULL, '会员注册', 0, 100, 20, 0, 4, 1465284430);
INSERT INTO `wfx_vip_log` VALUES (10, '123.151.139.145', 4, NULL, 'ooey5s5rHnSHZkOthHOnstm0aWc8', 'AI.何青.wemall', NULL, NULL, '会员注册', 0, 100, 20, 0, 4, 1465285486);
INSERT INTO `wfx_vip_log` VALUES (11, '123.151.42.48', 5, NULL, 'ooey5szh3KMTKs-jgJ5wxJ0gCj-4', 'Angel~暖暖', NULL, NULL, '会员注册', 0, 100, 20, 0, 4, 1465285809);
INSERT INTO `wfx_vip_log` VALUES (12, '123.151.64.143', 6, NULL, 'ooey5s5nbkO0w4V7pkH7CmlS5CuQ', '清月曦', NULL, NULL, '会员注册', 0, 100, 20, 0, 4, 1465365922);
INSERT INTO `wfx_vip_log` VALUES (13, '125.39.57.37', 7, NULL, 'ooey5szh3KMTKs-jgJ5wxJ0gCj-4', 'Angel~暖暖', NULL, NULL, '会员注册', 0, 100, 20, 0, 4, 1465366841);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vip_log_sub`
-- 

CREATE TABLE `wfx_vip_log_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ppid` int(11) DEFAULT NULL,
  `from` int(11) DEFAULT NULL,
  `fromname` varchar(255) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `toname` varchar(255) DEFAULT NULL,
  `issub` tinyint(1) DEFAULT '1' COMMENT '1为关注,2为取消关注',
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `wfx_vip_log_sub`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vip_message`
-- 

CREATE TABLE `wfx_vip_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pids` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `content` longtext,
  `ctime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- 
-- 导出表中的数据 `wfx_vip_message`
-- 

INSERT INTO `wfx_vip_message` VALUES (2, '1', '您的100佣金提现申请已成功提交！会在三个工作日内审核完毕并发放！', '提现订单编号：2<br><br>提现申请数量：100<br><br>提现申请时间：2016-05-10 19:56<br><br>提现申请将在三个工作日内审核完成，如有问题，请联系客服！', 1462881381);
INSERT INTO `wfx_vip_message` VALUES (3, '1', '亲爱的用户，提现已完成！100佣金已成功发放到您的提现帐户里面了！', '提现订单编号：2<br><br>提现申请佣金：100<br><br>提现完成时间：2016-05-10 19:57<br><br>您的提现申请已完成，如有异常请联系客服！', 1462881435);
INSERT INTO `wfx_vip_message` VALUES (4, '1', '您的100佣金提现申请已成功提交！会在三个工作日内审核完毕并发放！', '提现订单编号：3<br><br>提现申请数量：100<br><br>提现申请时间：2016-05-11 10:29<br><br>提现申请将在三个工作日内审核完成，如有问题，请联系客服！', 1462933751);
INSERT INTO `wfx_vip_message` VALUES (5, '1', '您的100佣金提现申请已成功提交！会在三个工作日内审核完毕并发放！', '提现订单编号：4<br><br>提现申请数量：100<br><br>提现申请时间：2016-05-11 10:31<br><br>提现申请将在三个工作日内审核完成，如有问题，请联系客服！', 1462933862);
INSERT INTO `wfx_vip_message` VALUES (6, '1', '您的100佣金提现申请已成功提交！会在三个工作日内审核完毕并发放！', '提现订单编号：5<br><br>提现申请数量：100<br><br>提现申请时间：2016-05-11 10:35<br><br>提现申请将在三个工作日内审核完成，如有问题，请联系客服！', 1462934108);
INSERT INTO `wfx_vip_message` VALUES (7, '1', '提现申请未通过审核！100佣金已成功退回您的帐户余额！', '提现订单编号：5<br><br>提现申请佣金：100<br><br>提现退回时间：2016-05-11 10:36<br><br>您的提现申请未通过审核，如有疑问请联系客服！', 1462934187);
INSERT INTO `wfx_vip_message` VALUES (8, '1', '提现申请未通过审核！100佣金已成功退回您的帐户余额！', '提现订单编号：4<br><br>提现申请佣金：100<br><br>提现退回时间：2016-05-11 10:53<br><br>您的提现申请未通过审核，如有疑问请联系客服！', 1462935182);
INSERT INTO `wfx_vip_message` VALUES (9, '3', '您成功升级为wemall的分销商！', '欢迎成为wemall的分销商，开启一个新的旅程！', 1465285814);
INSERT INTO `wfx_vip_message` VALUES (10, '1,', '1', '1', 1465291135);
INSERT INTO `wfx_vip_message` VALUES (12, '4', '你获得一份推荐奖励！', '推荐新用户奖励：<br>新用户：清月曦<br>奖励内容：<br>12个积分<br>12点经验<br>12元余额<br>此奖励已自动打入您的帐户！感谢您的支持！', 1465368447);
INSERT INTO `wfx_vip_message` VALUES (13, '7,', '1', '1', 1465368494);
INSERT INTO `wfx_vip_message` VALUES (14, '1', '提现申请未通过审核！100佣金已成功退回您的帐户余额！', '提现订单编号：3<br><br>提现申请佣金：100<br><br>提现退回时间：2016-06-08 14:48<br><br>您的提现申请未通过审核，如有疑问请联系客服！', 1465368521);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vip_monthexp`
-- 

CREATE TABLE `wfx_vip_monthexp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vipid` int(11) DEFAULT '0',
  `exp` int(11) DEFAULT '0',
  `month` varchar(255) DEFAULT '',
  `ctime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=142 ;

-- 
-- 导出表中的数据 `wfx_vip_monthexp`
-- 

INSERT INTO `wfx_vip_monthexp` VALUES (128, 162, 20, '2015-5', 1435306489);
INSERT INTO `wfx_vip_monthexp` VALUES (129, 165, 20, '2015-5', 1435317122);
INSERT INTO `wfx_vip_monthexp` VALUES (130, 162, 0, '2015-7', 1440518985);
INSERT INTO `wfx_vip_monthexp` VALUES (131, 162, 4, '2015-8', 1441415250);
INSERT INTO `wfx_vip_monthexp` VALUES (132, 162, 4, '2015-9', 1444358913);
INSERT INTO `wfx_vip_monthexp` VALUES (133, 1, 28, '2015-10', 1446601940);
INSERT INTO `wfx_vip_monthexp` VALUES (134, 1, 0, '2016-4', 1462440893);
INSERT INTO `wfx_vip_monthexp` VALUES (135, 1, 2, '2016-5', 1464658444);
INSERT INTO `wfx_vip_monthexp` VALUES (136, 2, 20, '2016-5', 1465021764);
INSERT INTO `wfx_vip_monthexp` VALUES (137, 3, 20, '2016-5', 1465284439);
INSERT INTO `wfx_vip_monthexp` VALUES (138, 4, 20, '2016-5', 1465285497);
INSERT INTO `wfx_vip_monthexp` VALUES (139, 5, 20, '2016-5', 1465285945);
INSERT INTO `wfx_vip_monthexp` VALUES (140, 6, 20, '2016-5', 1465365929);
INSERT INTO `wfx_vip_monthexp` VALUES (141, 7, 20, '2016-5', 1465366850);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vip_set`
-- 

CREATE TABLE `wfx_vip_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isverify` tinyint(1) DEFAULT '0',
  `ver_interval` int(11) DEFAULT '1',
  `ver_times` int(11) DEFAULT '10',
  `isgift` tinyint(1) DEFAULT '0',
  `gift_detail` varchar(255) DEFAULT NULL,
  `reg_score` int(11) DEFAULT '0',
  `reg_exp` int(11) DEFAULT '0',
  `sign_score` varchar(255) DEFAULT '0',
  `sign_exp` varchar(255) DEFAULT '0',
  `level_period` int(11) DEFAULT '0',
  `level_rule` varchar(255) DEFAULT NULL,
  `cz_score` int(11) DEFAULT NULL,
  `cz_exp` int(11) DEFAULT NULL,
  `xf_score` int(11) NOT NULL,
  `xf_exp` int(11) NOT NULL,
  `cz_rule` varchar(255) NOT NULL DEFAULT '',
  `tj_score` int(11) DEFAULT NULL,
  `tj_exp` int(11) DEFAULT NULL,
  `tj_money` float DEFAULT NULL,
  `tx_money` float DEFAULT '0' COMMENT '提现金额至少多少钱',
  `tx_fee` float NOT NULL COMMENT '提现手续费%',
  `isqiandao` tinyint(1) DEFAULT NULL,
  `ispaihang` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_vip_set`
-- 

INSERT INTO `wfx_vip_set` VALUES (1, 0, 2, 3, 1, '2,10,7,100', 100, 20, '1,2,2,2,5', '2', 0, '', 1, 2, 0, 0, '100:10,200:30,500:60,1000:100', 12, 12, 12, 10, 2, 1, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vip_tx`
-- 

CREATE TABLE `wfx_vip_tx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vipid` int(11) DEFAULT NULL,
  `txprice` float DEFAULT NULL,
  `txname` varchar(255) DEFAULT NULL,
  `txmobile` varchar(255) DEFAULT NULL,
  `txyh` varchar(255) DEFAULT NULL,
  `txfh` varchar(255) DEFAULT NULL,
  `txszd` varchar(255) DEFAULT NULL,
  `txcard` varchar(255) DEFAULT NULL,
  `txsqtime` int(11) DEFAULT NULL,
  `txtime` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `wfx_vip_tx`
-- 

INSERT INTO `wfx_vip_tx` VALUES (1, 162, 10, '1', '1', '1', '1', '1', '1', 1440559500, NULL, 1);
INSERT INTO `wfx_vip_tx` VALUES (2, 1, 100, '崔', '18538753627', '中国建行', '支行', '郑州', '1008611', 1462881381, 1462881435, 2);
INSERT INTO `wfx_vip_tx` VALUES (3, 1, 100, '崔', '10086', '建行', '支行', '郑州', '123456', 1462933751, NULL, 0);
INSERT INTO `wfx_vip_tx` VALUES (4, 1, 100, '崔', '111', '222', '3', '4', '5', 1462933862, NULL, 0);
INSERT INTO `wfx_vip_tx` VALUES (5, 1, 100, '2', '3', '4', '5', '67', '2', 1462934108, NULL, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vip_wxtx`
-- 

CREATE TABLE `wfx_vip_wxtx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billno` varchar(255) DEFAULT NULL,
  `vip_id` int(11) DEFAULT NULL,
  `txprice` float DEFAULT NULL,
  `txname` varchar(255) DEFAULT NULL,
  `txmobile` varchar(255) DEFAULT NULL,
  `txcard` varchar(255) DEFAULT NULL,
  `txtime` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- 
-- 导出表中的数据 `wfx_vip_wxtx`
-- 

INSERT INTO `wfx_vip_wxtx` VALUES (1, '2147483147', 11, 1, '清月曦', '18538753627', 'biyuehun', 1440559500, 1);
INSERT INTO `wfx_vip_wxtx` VALUES (2, '2147483647', 11, 1, '何小二', '18538753627', 'list', 1440559500, 2);
INSERT INTO `wfx_vip_wxtx` VALUES (3, '2147423647', 11, 1, '李四', '18538753627', 'asda', 1440559500, 2);
INSERT INTO `wfx_vip_wxtx` VALUES (4, '1232245678', 11, 1, '小明', '18538753627', '哈哈哈', 1440559500, 2);
INSERT INTO `wfx_vip_wxtx` VALUES (7, '2147483647', 11, 10, '崔', '10086', '清月曦', 1463734397, 2);
INSERT INTO `wfx_vip_wxtx` VALUES (8, '201605200852272197', 11, 5, '浩哥', '18538753627', '清月曦', 1463734598, 2);
INSERT INTO `wfx_vip_wxtx` VALUES (9, '201605204347969515', 2, 1, '何青', '15378708792', 'AI.何青.wemall', 1463737209, 2);
INSERT INTO `wfx_vip_wxtx` VALUES (10, '201605244923546255', 1, 200, '测试', '13000000000', 'AI.何青.wemall', 1464068357, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (11, '201605257154531250', 1, 200, '蒋燕建', '13058695457', 'AI.何青.wemall', 1464163022, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (12, '201605258545135163', 1, 200, '阿爹', '13799923721', 'AI.何青.wemall', 1464163139, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (13, '201605259472507569', 1, 200, '阿爹', '13799923721', 'AI.何青.wemall', 1464163485, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (14, '201605253816667350', 1, 200, '黄贵司', '13097918564', 'AI.何青.wemall', 1464164053, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (15, '201605258404373848', 1, 200, '黄贵司', '13097918564', 'AI.何青.wemall', 1464164073, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (16, '201605259846917859', 1, 200, '黄贵司', '13097918564', 'AI.何青.wemall', 1464164203, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (17, '201605254726033275', 1, 200, '黄贵司', '13097918564', 'AI.何青.wemall', 1464164217, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (18, '201605256482654135', 1, 200, '蒋燕建', '13799923721', 'AI.何青.wemall', 1464164225, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (19, '201605255766780377', 1, 200, '黄贵司', '13097918564', 'AI.何青.wemall', 1464164232, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (20, '201605256776179695', 1, 200, '蒋燕建', '13058695457', 'AI.何青.wemall', 1464164243, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (21, '201605252900715016', 1, 200, '蒋燕建', '13058695457', 'AI.何青.wemall', 1464164259, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (22, '201605253182963199', 1, 200, '蒋燕建', '13058695457', 'AI.何青.wemall', 1464164353, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (23, '201605254447437633', 1, 200, '蒋燕建', '13058695457', 'AI.何青.wemall', 1464164371, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (24, '201605268986760359', 1, 200, '倪鹏', '13085523002', 'AI.何青.wemall', 1464268037, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (25, '201605266615966973', 1, 1, '熙和', '13085523002', 'AI.何青.wemall', 1464268077, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (26, '201605279467782414', 1, 200, '东风公园', '13698569865', 'AI.何青.wemall', 1464340321, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (27, '201605279042135048', 1, 200, '东风公园', '13698569865', 'AI.何青.wemall', 1464340322, 0);
INSERT INTO `wfx_vip_wxtx` VALUES (28, '201605272515061159', 1, 200, '东风公园', '13698569865', 'AI.何青.wemall', 1464340324, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vote_config`
-- 

CREATE TABLE `wfx_vote_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `activity_time` text NOT NULL,
  `about` text NOT NULL,
  `vote_num` int(11) NOT NULL,
  `visiter_num` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_vote_config`
-- 

INSERT INTO `wfx_vote_config` VALUES (1, '投票测试2', '5月28日-6月1日', '<p>投票简介11</p>', 7, 41, '2015-09-15 09:45:24');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_vote_record`
-- 

CREATE TABLE `wfx_vote_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- 导出表中的数据 `wfx_vote_record`
-- 

INSERT INTO `wfx_vote_record` VALUES (1, 2, '2015-08-28 18:16:13');
INSERT INTO `wfx_vote_record` VALUES (2, 2, '2015-08-28 18:16:16');
INSERT INTO `wfx_vote_record` VALUES (3, 2, '2015-08-28 18:17:39');
INSERT INTO `wfx_vote_record` VALUES (4, 2, '2015-08-28 18:18:07');
INSERT INTO `wfx_vote_record` VALUES (5, 2, '2015-08-28 18:20:10');
INSERT INTO `wfx_vote_record` VALUES (6, 2, '2015-08-28 18:26:16');
INSERT INTO `wfx_vote_record` VALUES (7, 162, '2015-09-14 15:33:57');
INSERT INTO `wfx_vote_record` VALUES (8, 162, '2015-09-15 09:44:10');
INSERT INTO `wfx_vote_record` VALUES (9, 162, '2015-09-15 09:44:39');
INSERT INTO `wfx_vote_record` VALUES (10, 162, '2015-09-15 09:44:51');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_wheel_config`
-- 

CREATE TABLE `wfx_wheel_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `activity_time` text NOT NULL,
  `activity_explain` text NOT NULL,
  `everyday` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `level1_prob` float NOT NULL,
  `level2_prob` float NOT NULL,
  `level3_prob` float NOT NULL,
  `level4_prob` float NOT NULL,
  `level5_prob` float NOT NULL,
  `level6_prob` float NOT NULL,
  `level7_prob` float NOT NULL,
  `level1_store` int(11) NOT NULL,
  `level2_store` int(11) NOT NULL,
  `level3_store` int(11) NOT NULL,
  `level4_store` int(11) NOT NULL,
  `level5_store` int(11) NOT NULL,
  `level6_store` int(11) NOT NULL,
  `level7_store` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_wheel_config`
-- 

INSERT INTO `wfx_wheel_config` VALUES (1, '幸运大转盘', '5月28日-6月10日', '<p>111111222232哈哈哈哈哈哈哈哈哈啊 吧哈哈啊哈哈哈哈哈哈哈呢哈哈哈哈55</p>', 0, 1, 2, 0, 0, 0, 0, 15, 75, 0, 0, 0, 0, 0, 500, 75, '2016-06-08 11:44:47');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_wheel_record`
-- 

CREATE TABLE `wfx_wheel_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `wfx_wheel_record`
-- 

INSERT INTO `wfx_wheel_record` VALUES (1, 162, 0, '2015-09-15 09:49:23');
INSERT INTO `wfx_wheel_record` VALUES (2, 162, 0, '2016-06-08 11:37:22');
INSERT INTO `wfx_wheel_record` VALUES (3, 3, 0, '2016-06-08 12:19:08');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_wx_customer`
-- 

CREATE TABLE `wfx_wx_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL DEFAULT '客服接口',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `wfx_wx_customer`
-- 

INSERT INTO `wfx_wx_customer` VALUES (1, '提现申请', 'tx1', '提现申请');
INSERT INTO `wfx_wx_customer` VALUES (2, '提现成功', 'tx2', '提现成功');
INSERT INTO `wfx_wx_customer` VALUES (3, '提现失败', 'tx3', '提现失败');
INSERT INTO `wfx_wx_customer` VALUES (4, '关系链（上级）', 'up', '推送给上级');
INSERT INTO `wfx_wx_customer` VALUES (5, '员工（产生下属）', 'emp', '推送给员工');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_wx_keyword`
-- 

CREATE TABLE `wfx_wx_keyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1' COMMENT '1:纯文本,2:单图文,3:多图文',
  `ctime` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- 导出表中的数据 `wfx_wx_keyword`
-- 

INSERT INTO `wfx_wx_keyword` VALUES (2, '测试回复666', '666', '', '测试成功666', '666', 1, NULL);
INSERT INTO `wfx_wx_keyword` VALUES (7, '234', '', '165', '阿斯顿', 'http://www.baidu.com', 2, NULL);

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_wx_keyword_img`
-- 

CREATE TABLE `wfx_wx_keyword_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `sorts` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `wfx_wx_keyword_img`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_wx_template`
-- 

CREATE TABLE `wfx_wx_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `templateidshort` varchar(255) NOT NULL,
  `templateid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `wfx_wx_template`
-- 

INSERT INTO `wfx_wx_template` VALUES (1, '成为会员通知', '恭喜您成为会员', 'OPENTM203264949', 'qhep7MYSxUVVyr6c6nSsvTz5_AkHq3PN5c9zM-3JxWE');
INSERT INTO `wfx_wx_template` VALUES (2, '订单付款成功通知', '您的订单已支付成功', 'OPENTM200444326', 'Ci4U5x2EDZAvRYroi84b9j5yKZAM2tk67iw-ePUoGtw');
INSERT INTO `wfx_wx_template` VALUES (3, '订单发货通知', '您的订单已发货', 'OPENTM201541214', '6W9opUrldhl_4yAThA0H977ML9ZO2G7fj_uJnvURTa8');

-- --------------------------------------------------------

-- 
-- 表的结构 `wfx_wxprint`
-- 

CREATE TABLE `wfx_wxprint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `api_key` varchar(100) DEFAULT NULL COMMENT 'apikey',
  `m_key` varchar(100) DEFAULT NULL COMMENT '秘钥',
  `partner` varchar(100) DEFAULT NULL COMMENT '用户id',
  `machine_code` varchar(100) DEFAULT NULL COMMENT '机器码',
  `switch` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `wfx_wxprint`
-- 

INSERT INTO `wfx_wxprint` VALUES (1, '2', '2', '2', '2', 0, '2016-06-08 11:45:25');
