-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 07 月 09 日 03:38
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `blog_data`
--
CREATE DATABASE IF NOT EXISTS `edmac` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `edmac`;

-- --------------------------------------------------------

--
-- 表的结构 `go_admin`
--

CREATE TABLE IF NOT EXISTS `go_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL COMMENT '登录名',
  `admin_password` varchar(255) NOT NULL COMMENT '登录密码',
  `role_group_id` int(10) NOT NULL COMMENT '权限组id',
  `add_time` datetime NOT NULL COMMENT '注册时间',
  `last_login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '上次登录时间',
  `last_login_ip` varchar(255) NOT NULL COMMENT '上次登录IP',
  `last_login_area` varchar(255) NOT NULL COMMENT '上次登录地点',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态，1：正常 0：回收站，默认1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `go_admin`
--

INSERT INTO `go_admin` (`id`, `admin_name`, `admin_password`, `role_group_id`, `add_time`, `last_login_time`, `last_login_ip`, `last_login_area`, `status`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', -1, '2014-11-20 00:00:00', '2014-11-19 16:00:00', '0.0.0.0', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `go_brand`
--

CREATE TABLE IF NOT EXISTS `go_brand` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '品牌名',
  `sort` tinyint(3) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态,1：正常，0：回收站，默认1',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='品牌表' AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `go_brand`
--

INSERT INTO `go_brand` (`id`, `title`, `sort`, `status`, `add_time`) VALUES
(1, '测试仪', 1, 0, '2014-12-25 23:29:17'),
(2, '品牌一', 1, 1, '2014-12-25 23:40:44'),
(3, '品牌二', 2, 1, '2014-12-26 01:07:26'),
(4, '品牌三', 3, 1, '2014-12-26 10:05:12'),
(10, '凯撒', 2, 1, '0000-00-00 00:00:00'),
(11, '英格索兰', 3, 1, '0000-00-00 00:00:00'),
(12, '寿力', 5, 1, '0000-00-00 00:00:00'),
(13, '康普艾', 9, 1, '0000-00-00 00:00:00'),
(14, '复盛', 12, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `go_category`
--

CREATE TABLE IF NOT EXISTS `go_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '类别名称',
  `sort` tinyint(3) NOT NULL COMMENT '排序,数字越大越靠后',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态,1：正常，0：回收站，默认1',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='类别表' AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `go_category`
--

INSERT INTO `go_category` (`id`, `title`, `sort`, `status`, `add_time`) VALUES
(4, '类别一', 1, 1, '0000-00-00 00:00:00'),
(9, '类别二', 3, 1, '2014-12-25 23:13:26'),
(10, '1111', 11, 0, '2014-12-25 23:40:05'),
(11, '类别三', 4, 1, '0000-00-00 00:00:00'),
(12, '类别五', 5, 1, '0000-00-00 00:00:00'),
(13, '耗件（三滤油）', 2, 1, '2015-01-06 14:23:51'),
(14, '耗件（三滤+油）', 2, 1, '2015-01-06 23:22:21'),
(15, '耗件', 2, 1, '2015-01-09 12:42:44');

-- --------------------------------------------------------

--
-- 表的结构 `go_config`
--

CREATE TABLE IF NOT EXISTS `go_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL COMMENT '属性字段',
  `title` varchar(255) NOT NULL COMMENT '字段标题',
  `mark` varchar(255) NOT NULL COMMENT '备注信息，主要用于placeholder显示',
  `field_type` varchar(255) NOT NULL DEFAULT 'string' COMMENT '字段类型,sting:字符串  phone:手机号 email:邮箱 url:链接地址 bool:布尔 text:文本 editor:编辑器 pic:图片 file:文件，默认string',
  `config_type` varchar(255) NOT NULL DEFAULT 'site' COMMENT '配置类型',
  `value` varchar(255) NOT NULL COMMENT '字段值',
  `is_system` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是系统字段，0：否 1：是 ，系统字段无法删除',
  `is_required` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否必填，1：必填 0：非必填，默认0',
  `sort` int(10) NOT NULL DEFAULT '1' COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态,1：正常，0：回收站，默认1',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='系统配置表' AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `go_config`
--

INSERT INTO `go_config` (`id`, `field`, `title`, `mark`, `field_type`, `config_type`, `value`, `is_system`, `is_required`, `sort`, `status`, `add_time`, `update_time`) VALUES
(1, 'site_name', '网站名称', '', 'string', 'site', '微部落', 1, 1, 1, 1, '2014-11-21 00:00:00', '2014-12-28 15:54:44'),
(4, 'site_title', '网站标题', '', 'string', 'site', '手机网站', 0, 1, 2, 0, '0000-00-00 00:00:00', '2014-12-28 04:50:17'),
(5, 'site_keywords', '站点关键字', '多个关键字请用逗号隔开', 'string', 'site', 'gocms,勾国磊', 1, 1, 9, 1, '0000-00-00 00:00:00', '2014-12-28 15:54:44'),
(6, 'site_descript', '站点描述', '站点描述', 'text', 'site', '哈哈哈哈', 1, 1, 11, 1, '0000-00-00 00:00:00', '2014-12-28 15:54:45'),
(7, 'site_copyright', '版权信息', '', 'text', 'site', 'Copyright ©2014-2016 GoCMS版权所有', 1, 1, 13, 1, '0000-00-00 00:00:00', '2014-12-28 15:54:45'),
(9, 'email_title', '邮箱显示名', '', 'string', 'email', 'GoCMS官方', 0, 1, 1, 0, '0000-00-00 00:00:00', '2014-12-28 04:49:35'),
(10, 'email_host', '服务器地址', '', 'string', 'email', 'smtp.163.com', 1, 1, 1, 1, '0000-00-00 00:00:00', '2014-12-20 18:51:33'),
(11, 'email_user', '邮箱账号', '', 'string', 'email', 'gouguolei', 1, 1, 1, 1, '0000-00-00 00:00:00', '2014-12-20 18:51:33'),
(12, 'email_password', '邮箱密码', '', 'string', 'email', 'gouguolei1990717', 1, 1, 1, 1, '0000-00-00 00:00:00', '2014-12-20 18:50:27'),
(13, 'email_name', '邮箱地址', '', 'string', 'email', 'gouguolei@163.com', 1, 1, 1, 1, '0000-00-00 00:00:00', '2014-12-20 18:51:33'),
(14, 'site_email', '系统邮箱', '', 'email', 'site', '245629560@qq.com', 0, 1, 7, 0, '0000-00-00 00:00:00', '2014-12-28 04:52:54'),
(20, 'site_beian', '备案信息', '', 'string', 'site', '京 ICP 证 070598 号', 0, 0, 15, 0, '2014-12-02 16:52:37', '2014-12-28 04:32:56'),
(21, 'site_style', '网站风格', '', 'string', 'site', 'default', 0, 1, 5, 1, '0000-00-00 00:00:00', '2014-12-28 05:43:20'),
(22, 'site_logo', '网站logo', '', 'pic', 'site', '/goods/Uploads/2014-12-29/54a02abc7b454.png', 1, 0, 99, 1, '2014-12-02 13:01:19', '2014-12-28 16:07:24');

-- --------------------------------------------------------

--
-- 表的结构 `go_goods`
--

CREATE TABLE IF NOT EXISTS `go_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL COMMENT '商品名称',
  `PNO` varchar(250) NOT NULL COMMENT '零件号',
  `old_PNO` varchar(250) NOT NULL COMMENT '原厂参考零件号',
  `brand_id` int(10) NOT NULL COMMENT '品牌',
  `price` decimal(10,2) NOT NULL COMMENT '含税价格',
  `type_ids` mediumtext NOT NULL COMMENT '适用机型',
  `category_id` int(10) NOT NULL COMMENT '类别',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态,1：正常，0：回收站，默认1',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `PNO` (`PNO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `go_goods`
--

INSERT INTO `go_goods` (`id`, `title`, `PNO`, `old_PNO`, `brand_id`, `price`, `type_ids`, `category_id`, `status`, `add_time`) VALUES
(7, '凯撒1111 油气分离芯（替代件）', '3003363010', '123456', 10, '123.00', ',47,76,', 4, 1, '2015-01-06 23:07:07'),
(8, '英格索兰 全合成酯类润滑油 超冷 Coolant 46 （5加仑）替代件', '3003100320', '250022669', 12, '3755.70', ',78,,79,', 14, 1, '2015-01-06 23:22:21'),
(10, 'ceshi1', '1234', '54595442', 10, '3000.00', ',48,', 9, 1, '2015-01-06 23:55:03');

-- --------------------------------------------------------

--
-- 表的结构 `go_type`
--

CREATE TABLE IF NOT EXISTS `go_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '机型名称',
  `sort` tinyint(3) NOT NULL COMMENT '排序',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态,1：正常，0：回收站，默认1',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='适应机型表' AUTO_INCREMENT=82 ;

--
-- 转存表中的数据 `go_type`
--

INSERT INTO `go_type` (`id`, `title`, `sort`, `status`, `add_time`) VALUES
(47, 'DSD142', 2, 1, '2014-12-28 00:00:00'),
(48, 'M55', 3, 1, '2014-12-28 00:00:00'),
(49, 'M75', 3, 1, '2014-12-28 00:00:00'),
(50, 'EP100', 3, 1, '2014-12-28 00:00:00'),
(51, 'M55-75', 3, 1, '2014-12-28 00:00:00'),
(52, 'EPE100', 3, 1, '2014-12-28 00:00:00'),
(53, 'EP125S', 4, 1, '2014-12-28 00:00:00'),
(54, 'EP150S', 4, 1, '2014-12-28 00:00:00'),
(55, 'EP175S', 4, 1, '2014-12-28 00:00:00'),
(56, 'EP200S', 4, 1, '2014-12-28 00:00:00'),
(57, 'UP-5', 5, 1, '2014-12-28 00:00:00'),
(58, 'UP-15', 5, 1, '2014-12-28 00:00:00'),
(59, 'UP-22', 5, 1, '2014-12-28 00:00:00'),
(60, 'M45', 6, 1, '2014-12-28 00:00:00'),
(61, 'M300', 7, 1, '2014-12-28 00:00:00'),
(62, 'M350', 7, 1, '2014-12-28 00:00:00'),
(63, 'M300/350-2S', 7, 1, '2014-12-28 00:00:00'),
(64, 'LS12-50', 8, 1, '2014-12-28 00:00:00'),
(65, 'LS16-60', 8, 1, '2014-12-28 00:00:00'),
(66, '75LF', 8, 1, '2014-12-28 00:00:00'),
(67, 'WS3700', 8, 1, '2014-12-28 00:00:00'),
(68, 'L55G', 9, 1, '2014-12-28 00:00:00'),
(69, 'L75G', 9, 1, '2014-12-28 00:00:00'),
(70, 'WS3000', 10, 1, '2014-12-28 00:00:00'),
(71, 'L132C', 11, 1, '2014-12-28 00:00:00'),
(72, 'SAV350', 12, 1, '2014-12-28 00:00:00'),
(73, 'SAV300', 12, 1, '2014-12-28 00:00:00'),
(74, '机型二', 12, 1, '2014-12-28 00:00:00'),
(75, '机型一', 12, 1, '2014-12-28 00:00:00'),
(76, 'DMS123', 2, 1, '2014-12-31 10:13:54'),
(77, 'M90110', 2, 1, '2015-01-06 14:23:29'),
(78, '中国化LS25S-250&300&350HP', 2, 1, '2015-01-06 23:22:21'),
(79, '中国化LS20S-175&200HP', 2, 1, '2015-01-06 23:22:21'),
(80, 'M90-110', 2, 1, '2015-01-09 13:16:20'),
(81, '', 2, 1, '2015-01-09 13:16:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
