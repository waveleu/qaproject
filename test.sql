-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-06 17:30:31
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `go_admin_nav`
--

CREATE TABLE IF NOT EXISTS `go_admin_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单表',
  `pid` int(11) unsigned DEFAULT '0' COMMENT '所属菜单',
  `name` varchar(20) DEFAULT '' COMMENT '菜单名称',
  `mca` varchar(255) DEFAULT '' COMMENT '模块、控制器、方法',
  `ico` varchar(20) DEFAULT '' COMMENT 'font-awesome图标',
  `order_number` int(11) unsigned DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=143 ;

--
-- 转存表中的数据 `go_admin_nav`
--

INSERT INTO `go_admin_nav` (`id`, `pid`, `name`, `mca`, `ico`, `order_number`) VALUES
(1, 0, 'Administrator', 'Admin/administrator', 'am-icon-home', 1),
(25, 2, 'Platform', 'Admin/Platform/index', 'am-icon-th-list', NULL),
(12, 1, 'Customer list', 'Admin/Customer/index', 'am-icon-male', NULL),
(141, 14, 'Group List', 'Admin/Rule/group', 'am-icon-group', 2),
(142, 14, ' User List', 'Admin/Rule/admin_user_list', 'am-icon-user', 3),
(11, 4, 'Test Case ', 'Admin/testcase/index', 'am-icon-tasks', NULL),
(2, 1, 'Board Management', 'Admin/Osversion', 'am-icon-bold', 6),
(21, 2, 'OS_Version', 'Admin/Osversion/index', 'am-icon-th-list', NULL),
(22, 2, 'Board Type', 'Admin/Board/index', 'am-icon-th-list', 2),
(24, 2, 'BSP', 'Admin/bsp/index', 'am-icon-th-list', NULL),
(3, 1, 'Project Management', 'Admin/Project', 'am-icon-product-hunt', NULL),
(32, 3, 'Project List', 'Admin/Project/index', 'am-icon-list-ol', NULL),
(31, 3, 'Branch List', 'Admin/Branch/index', 'am-icon-list-ol', NULL),
(4, 0, 'Case Management', 'Admin/testcase', 'am-icon-clone', NULL),
(13, 4, 'Task Suit', 'Admin/Task/shot_index', 'am-icon-tasks', NULL),
(8, 0, 'Tasks', 'Admin/task_Project', 'am-icon-building', NULL),
(46, 8, 'TestRun', 'Admin/Testrun/index', 'am-icon-navicon', NULL),
(43, 8, 'My Task', 'Admin/Task/mytask', 'am-icon-navicon', NULL),
(14, 1, 'User Management', 'Admin/task_Project', 'am-icon-user', NULL),
(23, 2, 'Board List', 'Admin/Boardlist/index', 'am-icon-th-list', NULL),
(44, 8, 'All Task', 'Admin/Task/alltask', 'am-icon-th-list', NULL),
(33, 3, 'Version List', 'Admin/Version/index', 'am-icon-list-ol', NULL),
(52, 5, 'Result Type', 'Admin/FromAndResult/result_index', 'am-icon-list-ol', NULL),
(53, 5, 'Case Origin', 'Admin/FromAndResult/from_index', 'am-icon-list-ol', NULL),
(42, 8, 'Task Management', 'Admin/Task/index', 'am-icon-th-list', NULL),
(51, 5, 'Report Format', 'Admin/Class/format_index', 'am-icon-list-ol', NULL),
(5, 1, 'Format', 'Admin/testcase/index', 'am-icon-bold', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `go_auth_group`
--

CREATE TABLE IF NOT EXISTS `go_auth_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text NOT NULL COMMENT '规则id',
  PRIMARY KEY (`id`,`title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `go_auth_group`
--

INSERT INTO `go_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, 'Admin', 1, '1,2,21,24,211,212,213,221,222,216,217,218,219,3,34,31,32,33,322,311,312,313,321,323,341,342,343,333,331,332,35,351,352,353,324,4,411,41,412,413,42,421,423,422,431,432,433,434,6,631,62,63,624,625,611,612,621,622,623,11,8,87,811,812,813,82,821,822,823,84,844,841,842,843,86,9,851,852,853,36,361,362,363,88,881,861,882,381'),
(2, 'Leader', 1, '1,2,21,24,211,212,213,221,222,216,217,218,219,3,34,31,32,33,322,311,312,313,321,323,341,342,343,333,331,332,35,351,352,353,324,4,411,41,412,413,42,421,423,422,431,432,433,434,6,631,62,63,624,625,611,612,621,622,623,11,8,87,811,812,813,82,821,822,823,84,844,841,842,843,86,9,851,852,853,36,361,362,363,88,881,861,882,381'),
(20, 'User', 1, '1,2,21,24,211,212,213,221,222,216,217,218,219,8,87,811,812,813,82,821,822,823,84,844,841,842,843,86,88,881,861,882');

-- --------------------------------------------------------

--
-- 表的结构 `go_auth_group_access`
--

CREATE TABLE IF NOT EXISTS `go_auth_group_access` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `group_id` int(11) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

--
-- 转存表中的数据 `go_auth_group_access`
--

INSERT INTO `go_auth_group_access` (`uid`, `group_id`) VALUES
(88, 1),
(139, 2),
(140, 20),
(141, 20),
(142, 20);

-- --------------------------------------------------------

--
-- 表的结构 `go_auth_rule`
--

CREATE TABLE IF NOT EXISTS `go_auth_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='规则表' AUTO_INCREMENT=883 ;

--
-- 转存表中的数据 `go_auth_rule`
--

INSERT INTO `go_auth_rule` (`id`, `pid`, `name`, `title`, `status`, `type`, `condition`) VALUES
(3, 0, 'Admin/Osversion', '平台管理', 1, 1, ''),
(34, 3, 'Admin/Bsp/index', 'BSP列表', 1, 1, ''),
(6, 0, 'Admin/rule/index', 'Administrator', 1, 1, ''),
(87, 8, 'Admin/task_Project', 'Task_pro', 1, 1, ''),
(21, 2, 'Admin/testcase/index', 'Case管理', 1, 1, ''),
(24, 2, 'Admin/Class/add', '分级管理', 1, 1, ''),
(31, 3, 'Admin/Osversion/index', 'OS_Version列表', 1, 1, ''),
(32, 3, 'Admin/Platform/index', '平台列表', 1, 1, ''),
(33, 3, 'Admin/Board/index', 'Board列表', 1, 1, ''),
(631, 6, 'Admin/Rule/add_user', '添加用户', 1, 1, ''),
(62, 6, 'Admin/Rule/group', '用户组管理', 1, 1, ''),
(63, 6, 'Admin/Rule/admin_user_list', '管理员列表', 1, 1, ''),
(1, 0, 'Admin/index/index', '首页', 1, 1, ''),
(624, 6, 'Admin/Rule/add_group', '添加权限组', 1, 1, ''),
(625, 6, 'Admin/Rule/edit_group', '欢迎界面', 1, 1, ''),
(611, 6, 'Admin/Rule/edit_user', '编辑用户', 1, 1, ''),
(612, 6, 'Admin/Rule/delete_user', '删除用户', 1, 1, ''),
(322, 3, 'Admin/Platform/edit', 'Platform编辑', 1, 1, ''),
(2, 0, 'Admin/testcase', 'Case管理', 1, 1, ''),
(211, 2, 'Admin/testcase/del', '树形删除case', 1, 1, ''),
(212, 2, 'Admin/testcase/edit', '树形编辑case', 1, 1, ''),
(213, 2, 'Admin/testcase/add', '树形添加case', 1, 1, ''),
(221, 2, 'Admin/Class/edit', '添加子folder', 1, 1, ''),
(222, 2, 'Admin/Class/del', '重命名子folder', 1, 1, ''),
(216, 2, 'Admin/testcase/tree', '任务分配', 1, 1, ''),
(621, 6, 'Admin/Rule/delete_group', '删除权限组', 1, 1, ''),
(622, 6, 'Admin/Rule/group_re_assign', '重分配权限组成员', 1, 1, ''),
(623, 6, 'Admin/Rule/add_user_to_group', '为权限组添加新成员', 1, 1, ''),
(411, 4, 'Admin/Project/add', 'project add', 1, 1, ''),
(311, 3, 'Admin/Osversion/edit', 'OS_Version编辑功能', 1, 1, ''),
(312, 3, 'Admin/Osversion/add', 'OS_Version添加功能', 1, 1, ''),
(313, 3, 'Admin/Osversion/del', 'OS_Version删除功能', 1, 1, ''),
(321, 3, 'Admin/Platform/add', 'Platform添加', 1, 1, ''),
(323, 3, 'Admin/Platform/del', 'Platf删除', 1, 1, ''),
(341, 3, 'Admin/Bsp/add', 'BSP添加', 1, 1, ''),
(342, 3, 'Admin/Bsp/edit', 'BSP编辑', 1, 1, ''),
(343, 3, 'Admin/Bsp/del', 'BSP删除', 1, 1, ''),
(333, 3, 'Admin/Board/add', 'Board增', 1, 1, ''),
(331, 3, 'Admin/Board/edit', 'Board编辑', 1, 1, ''),
(332, 3, 'Admin/Board/del', 'Board删除', 1, 1, ''),
(35, 3, 'Admin/Customer/index', 'Customer list', 1, 1, ''),
(351, 3, 'Admin/Customer/add', 'Customer add', 1, 1, ''),
(352, 3, 'Admin/Customer/edit', 'Customer edit', 1, 1, ''),
(353, 3, 'Admin/Customer/del', 'Customer del', 1, 1, ''),
(324, 3, 'Admin/Platform/check_version', '', 1, 1, ''),
(4, 0, 'Admin/Project', '项目首页', 1, 1, ''),
(41, 4, 'Admin/Project/index', 'Project 索引', 1, 1, ''),
(412, 4, 'Admin/Project/edit', 'project edit', 1, 1, ''),
(413, 4, 'Admin/Project/del', 'project del', 1, 1, ''),
(42, 4, 'Admin/Branch/index', '', 1, 1, ''),
(421, 4, 'Admin/Branch/add', '', 1, 1, ''),
(423, 4, 'Admin/Branch/edit', '', 1, 1, ''),
(422, 4, 'Admin/Branch/del', '', 1, 1, ''),
(217, 2, 'Admin/testcase/save', '保存case', 1, 1, ''),
(218, 2, 'Admin/Class/drop_edit', '', 1, 1, ''),
(219, 2, 'Admin/testcase/assign_work', '', 1, 1, ''),
(8, 0, 'Admin/Task/index', 'Task', 1, 1, ''),
(811, 8, 'Admin/Task/add', 'task_add', 1, 1, ''),
(812, 8, 'Admin/Task/del', 'task_del', 1, 1, ''),
(813, 8, 'Admin/Task/edit', 'task_edit', 1, 1, ''),
(82, 8, 'Admin/Task/shot_index', 'suit_index', 1, 1, ''),
(821, 8, 'Admin/Task/shot_add', 'suit_add', 1, 1, ''),
(822, 8, 'Admin/Task/shot_edit', 'suit_edit', 1, 1, ''),
(823, 8, 'Admin/Task/shot_del', 'suit_del', 1, 1, ''),
(84, 8, 'Admin/Task/case_index', 'case_index', 1, 1, ''),
(11, 6, 'Admin/administrator', 'side-administrator', 1, 1, ''),
(844, 8, 'Admin/Task/case_reassign', '', 1, 1, ''),
(841, 8, 'Admin/Task/case_add', 'case_add', 1, 1, ''),
(842, 8, 'Admin/Task/case_del', 'case_del', 1, 1, ''),
(843, 8, 'Admin/Task/case_edit', 'case_edit', 1, 1, ''),
(9, 0, 'Admin/Testrun/index', 'Test Run', 1, 1, ''),
(851, 9, 'Admin/Testrun/add', '', 1, 1, ''),
(852, 9, 'Admin/Testrun/del', '', 1, 1, ''),
(853, 9, 'Admin/Testrun/edit', '', 1, 1, ''),
(86, 8, 'Admin/Task/mytask', 'mytask', 1, 1, ''),
(431, 4, 'Admin/ExpAndImp/ExpTestcase', '导出Case', 1, 1, ''),
(432, 4, 'Admin/ExpAndImp/exportExcel', '导入表格', 1, 1, ''),
(433, 4, 'Admin/ExpAndImp/upload', '上传', 1, 1, ''),
(434, 4, 'Admin/ExpAndImp/table_import', 'table_import', 1, 1, ''),
(36, 3, 'Admin/Boardlist/index', '', 1, 1, ''),
(361, 3, 'Admin/Boardlist/add', '', 1, 1, ''),
(362, 3, 'Admin/Boardlist/edit', '', 1, 1, ''),
(363, 3, 'Admin/Boardlist/del', '', 1, 1, ''),
(88, 8, 'Admin/Userinfo/index', '', 1, 1, ''),
(881, 8, 'Admin/Userinfo/edit', '', 1, 1, ''),
(861, 8, 'Admin/Task/alltask', '', 1, 1, ''),
(882, 8, 'Admin/Userinfo/save', '', 1, 1, ''),
(381, 3, 'Admin/Class/format_index', '', 1, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `go_board`
--

CREATE TABLE IF NOT EXISTS `go_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Customer` varchar(255) DEFAULT NULL,
  `2D_Core` varchar(255) DEFAULT NULL,
  `3D_Core` varchar(255) DEFAULT NULL,
  `2D_VG_Core` varchar(255) DEFAULT NULL,
  `Bitfile` varchar(255) NOT NULL,
  `CModel_Location-P4` varchar(255) NOT NULL,
  `CModel_Location-Build` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`Name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `go_board`
--

INSERT INTO `go_board` (`id`, `Name`, `Type`, `Customer`, `2D_Core`, `3D_Core`, `2D_VG_Core`, `Bitfile`, `CModel_Location-P4`, `CModel_Location-Build`) VALUES
(1, 'b1', 'FPGA', 'FreeScale', 'null', 'null', 'null', 'null', 'null', 'null'),
(4, 'b2', 'Chip', 'FreeScale', 'null', 'null', 'null', 'null', 'null', 'null'),
(5, 'b3', 'Chip', 'undefined', '44', '55', '66', 'null', 'null', 'null'),
(7, 'b4', 'Chip', 'undefined', '11', 'qq', 'zz', 'null', 'null', 'null'),
(15, 'b5', 'CModel', 'FreeScale', 'null', '111', 'null', 'null', '111', '111');

-- --------------------------------------------------------

--
-- 表的结构 `go_board_list`
--

CREATE TABLE IF NOT EXISTS `go_board_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(255) DEFAULT NULL,
  `board_id` int(11) DEFAULT NULL,
  `BSP` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `Alias` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `go_board_list`
--

INSERT INTO `go_board_list` (`id`, `host`, `board_id`, `BSP`, `owner`, `Alias`) VALUES
(2, 'host1', 1, 'bsp3', 'user2', '111'),
(3, 'host2', 3, 'bsp2', 'user3', '123'),
(4, 'host3', 1, 'bsp4', 'user3', '222'),
(6, 'host4', 1, NULL, 'user1', '33');

-- --------------------------------------------------------

--
-- 表的结构 `go_branch`
--

CREATE TABLE IF NOT EXISTS `go_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`Name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `go_branch`
--

INSERT INTO `go_branch` (`id`, `Name`) VALUES
(1, '2.1x'),
(2, '2.x'),
(3, '3.2x'),
(4, '4.10');

-- --------------------------------------------------------

--
-- 表的结构 `go_bsp`
--

CREATE TABLE IF NOT EXISTS `go_bsp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Customer` varchar(255) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`Name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `go_bsp`
--

INSERT INTO `go_bsp` (`id`, `Name`, `Customer`, `Comments`, `Date`) VALUES
(1, 'bsp1', 'Marvell', '2222', '2016-06-28 16:46:13'),
(2, 'bsp2', 'Marvell', 'dddd', '2016-03-17 00:00:00'),
(4, 'bsp3', 'FreeScale', 'dddd', '0000-00-00 00:00:00'),
(5, 'bsp4', 'Marvell', 'ddd', '2016-12-31 23:59:00');

-- --------------------------------------------------------

--
-- 表的结构 `go_case`
--

CREATE TABLE IF NOT EXISTS `go_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `go_case`
--

INSERT INTO `go_case` (`id`, `group`, `item`) VALUES
(1, 37, 1),
(2, 37, 2),
(3, 44, 3),
(4, 44, 4),
(5, 91, 5),
(6, 37, 6);

-- --------------------------------------------------------

--
-- 表的结构 `go_class`
--

CREATE TABLE IF NOT EXISTS `go_class` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pid` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `format` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1012 ;

--
-- 转存表中的数据 `go_class`
--

INSERT INTO `go_class` (`id`, `pid`, `level`, `name`, `format`) VALUES
(1, '0', 1, 'p1', 'score,choose1,choose2'),
(2, '0', 1, 'p2', 'score'),
(11, '1', 2, 's1', 'df'),
(12, '1', 2, 's2', 'df'),
(13, '1', 2, 's3', 'asd'),
(21, '2', 2, 's1', 'adfd'),
(22, '2', 2, 's2', NULL),
(23, '2', 2, 's3', NULL),
(1011, '22', NULL, '44', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='系统配置表' AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `go_config`
--

INSERT INTO `go_config` (`id`, `field`, `title`, `mark`, `field_type`, `config_type`, `value`, `is_system`, `is_required`, `sort`, `status`, `add_time`, `update_time`) VALUES
(1, 'site_name', '网站名称', '', 'string', 'site', '微部落', 1, 1, 1, 1, '2014-11-21 00:00:00', '2014-12-27 23:54:44'),
(4, 'site_title', '网站标题', '', 'string', 'site', '手机网站', 0, 1, 2, 0, '0000-00-00 00:00:00', '2014-12-27 12:50:17'),
(5, 'site_keywords', '站点关键字', '多个关键字请用逗号隔开', 'string', 'site', '芯原,测试', 1, 1, 9, 1, '0000-00-00 00:00:00', '2016-06-06 21:28:02'),
(6, 'site_descript', '站点描述', '站点描述', 'text', 'site', '哈哈哈哈', 1, 1, 11, 1, '0000-00-00 00:00:00', '2014-12-27 23:54:45'),
(7, 'site_copyright', '版权信息', '', 'text', 'site', 'Copyright ©2014-2016 芯原版权所有', 1, 1, 13, 1, '0000-00-00 00:00:00', '2016-06-06 21:27:17'),
(9, 'email_title', '邮箱显示名', '', 'string', 'email', 'VeriSilicon官方', 0, 1, 1, 0, '0000-00-00 00:00:00', '2016-06-06 21:27:32'),
(10, 'email_host', '服务器地址', '', 'string', 'email', 'smtp.163.com', 1, 1, 1, 1, '0000-00-00 00:00:00', '2014-12-20 02:51:33'),
(11, 'email_user', '邮箱账号', '', 'string', 'email', 'gouguolei', 1, 1, 1, 1, '0000-00-00 00:00:00', '2014-12-20 02:51:33'),
(12, 'email_password', '邮箱密码', '', 'string', 'email', 'gouguolei1990717', 1, 1, 1, 1, '0000-00-00 00:00:00', '2014-12-20 02:50:27'),
(13, 'email_name', '邮箱地址', '', 'string', 'email', 'gouguolei@163.com', 1, 1, 1, 1, '0000-00-00 00:00:00', '2014-12-20 02:51:33'),
(14, 'site_email', '系统邮箱', '', 'email', 'site', '245629560@qq.com', 0, 1, 7, 0, '0000-00-00 00:00:00', '2014-12-27 12:52:54'),
(20, 'site_beian', '备案信息', '', 'string', 'site', '京 ICP 证 070598 号', 0, 0, 15, 0, '2014-12-02 16:52:37', '2014-12-27 12:32:56'),
(21, 'site_style', '网站风格', '', 'string', 'site', 'default', 0, 1, 5, 1, '0000-00-00 00:00:00', '2014-12-27 13:43:20'),
(22, 'site_logo', '网站logo', '', 'pic', 'site', '/goods/Uploads/2014-12-29/54a02abc7b454.png', 1, 0, 99, 1, '2014-12-02 13:01:19', '2014-12-28 00:07:24');

-- --------------------------------------------------------

--
-- 表的结构 `go_customer`
--

CREATE TABLE IF NOT EXISTS `go_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `PM_Contactor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`Name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `go_customer`
--

INSERT INTO `go_customer` (`id`, `Name`, `Description`, `PM_Contactor`) VALUES
(1, 'FreeScale', 'ddd', 'hehda'),
(2, 'Marvell', 'client2', 'dfdfsa'),
(5, 'Nvida', 'ddfa', 'df');

-- --------------------------------------------------------

--
-- 表的结构 `go_from`
--

CREATE TABLE IF NOT EXISTS `go_from` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `go_from`
--

INSERT INTO `go_from` (`id`, `name`) VALUES
(1, 'Marvel'),
(2, 'Internal'),
(3, 'Benchmark'),
(4, 'Customer Issue'),
(5, 'Customer Case');

-- --------------------------------------------------------

--
-- 表的结构 `go_item`
--

CREATE TABLE IF NOT EXISTS `go_item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `go_item`
--

INSERT INTO `go_item` (`id`, `name`, `unit`) VALUES
(1, 'hhhhhhhh', 'ms'),
(2, 'ggggggg', 'ns'),
(3, 'gsdfgdfg', 'df'),
(4, 'dfgdsfgdg', 'gd'),
(5, 'rtr', 'f'),
(6, 'sfdsdfsd', 'fsdf');

-- --------------------------------------------------------

--
-- 表的结构 `go_os`
--

CREATE TABLE IF NOT EXISTS `go_os` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `OS` varchar(255) NOT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`OS`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `go_os`
--

INSERT INTO `go_os` (`id`, `OS`, `Comments`) VALUES
(1, 'LoliPop', '安卓系列版本'),
(2, 'KitKat', '安卓系列版本'),
(3, 'Ubuntu', 'Linux系统'),
(4, 'WinCE', 'Windows操作系统'),
(11, 'Linux', NULL),
(16, '44', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `go_os_version`
--

CREATE TABLE IF NOT EXISTS `go_os_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `OS` varchar(255) DEFAULT NULL,
  `Version` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `go_os_version`
--

INSERT INTO `go_os_version` (`id`, `OS`, `Version`) VALUES
(1, 'Ubuntu', '10.11'),
(2, 'WinCE', '1.20'),
(3, 'LoliPop', '5.11'),
(4, 'KitKat', '4.22'),
(6, 'Ubuntu', '9.32'),
(8, 'KitKat', '6.08'),
(9, 'KitKat', '6.10'),
(10, 'LoliPop', '4.32'),
(11, 'WinCE', '7.20'),
(18, 'KitKat', '1.60'),
(22, 'Linux', '1.11'),
(23, 'LoliPop', '5.33'),
(27, 'LoliPop', '6.22'),
(29, 'LoliPop', '7.01'),
(30, 'Linux', '2.0'),
(31, 'LoliPop', 'aa'),
(39, '44', '4545');

-- --------------------------------------------------------

--
-- 表的结构 `go_platform`
--

CREATE TABLE IF NOT EXISTS `go_platform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Board` varchar(255) DEFAULT NULL,
  `OS` varchar(255) DEFAULT NULL,
  `BSP` varchar(255) DEFAULT NULL,
  `Version` varchar(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `x86/x64` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `go_platform`
--

INSERT INTO `go_platform` (`id`, `Board`, `OS`, `BSP`, `Version`, `name`, `x86/x64`) VALUES
(1, 'Chip,b4', 'KitKat', 'bsp3', '1.60', 'p1', 'x64'),
(2, 'Chip,b2', 'WinCE', 'bsp4', '7.20', 'p2', 'x86'),
(3, 'Chip,b2', 'LoliPop', 'bsp2', '5.11', 'p3', 'x86'),
(5, 'Chip,b2', 'KitKat', 'bsp2', '6.08', 'p4', 'x86'),
(12, 'FPGA,b1', 'Ubuntu', 'bsp2', NULL, 'p5', 'x64');

-- --------------------------------------------------------

--
-- 表的结构 `go_project`
--

CREATE TABLE IF NOT EXISTS `go_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `Version` varchar(255) DEFAULT NULL,
  `Branch` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Build_Location` varchar(255) DEFAULT NULL,
  `First_Build_No` int(11) DEFAULT NULL,
  `Release_Build_No` int(11) DEFAULT NULL,
  `start_time` date DEFAULT NULL COMMENT 'yyyy-mm-dd',
  `end_time` date DEFAULT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `go_project`
--

INSERT INTO `go_project` (`id`, `name`, `Version`, `Branch`, `Status`, `Build_Location`, `First_Build_No`, `Release_Build_No`, `start_time`, `end_time`) VALUES
(1, 'pro1', '3.35', '2.x', 'Ongoing', '12', 35, 55666, '2016-07-15', '2016-07-10'),
(2, 'pro4', '3.35', '4.10', 'Finished', 'fghfgh', 35, 55666, '2016-07-22', '2016-07-24'),
(3, 'pro3', '3.35', '3.2x', 'Finished', 'fff', 35, 55666, '2016-07-22', '2016-07-24'),
(4, 'pro2', '3.35', '4.10', 'Finished', 'asa', 0, 0, '2016-07-22', '2016-07-24');

-- --------------------------------------------------------

--
-- 表的结构 `go_result_type`
--

CREATE TABLE IF NOT EXISTS `go_result_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `go_result_type`
--

INSERT INTO `go_result_type` (`id`, `name`) VALUES
(1, 'fail'),
(2, 'pass'),
(3, 'N/A'),
(4, 'Not Run'),
(8, 'timeout');

-- --------------------------------------------------------

--
-- 表的结构 `go_scm`
--

CREATE TABLE IF NOT EXISTS `go_scm` (
  `Branch` varchar(255) NOT NULL,
  `Build No.` int(255) NOT NULL,
  `Build Type` varchar(255) NOT NULL,
  `Compile(Pass/Fail)` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `go_task`
--

CREATE TABLE IF NOT EXISTS `go_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `board` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `suit` varchar(255) DEFAULT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `OS` varchar(255) NOT NULL,
  `Version` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `go_task`
--

INSERT INTO `go_task` (`id`, `name`, `board`, `owner`, `pid`, `suit`, `start_time`, `end_time`, `OS`, `Version`, `driver`, `Type`) VALUES
(7, 'shuai', 'b1', 'user3', 3, 't5', '2016-07-01', '2016-07-31', '', '', '', ''),
(8, 'linkdd', 'b2', 'user3', 4, 't5', '2016-07-01', '2016-07-31', '', '', '', ''),
(9, 'ggg', 'b3', 'user3', 1, 't3', '2016-07-03', '2016-07-23', '', '', '', ''),
(10, 'dd', 'b4', 'user1', 1, 't5', '2016-07-09', '2016-07-29', '', '', '', ''),
(11, 'task3', 'b3', 'user3', 3, 't5', '2016-07-06', '2016-07-31', '', '', '', ''),
(12, 'dfdf', 'b1', 'user1', 3, 't2', '2016-07-10', '2016-07-26', '', '', '', ''),
(13, 'taskpro1', '3', 'user1', 4, 't3', '2016-07-06', '2016-07-28', '', '', '', ''),
(14, 'task4', '2', 'user3', 3, 't7', '2016-07-07', '2016-07-31', '', '', '', ''),
(23, 'link2', '1', 'user3', 4, 't3', '2016-07-08', '2016-07-31', '', '', '', ''),
(24, 'link3', '2', 'user1', 4, 't5', '2016-07-02', '2016-07-31', '', '', '', ''),
(25, 'link4', '3', 'user1', 1, 't11', '2016-07-10', '2016-07-24', '', '', '', ''),
(26, 'link5', '2', 'user2', 4, 't2', '2016-07-10', '2016-07-24', '', '', '', ''),
(27, 'link6', '1', 'user2', 4, 't7', '2016-07-03', '2016-07-30', '', '', '', ''),
(33, '5551', 'b3', 'user2', 3, '', '2016-07-15', '2016-07-10', 'LoliPop', '', '222212', 'manual'),
(32, '55', '5', '', 1, '', '2016-07-15', '2016-07-10', '', '', '', ''),
(37, '6666', '', '', 4, '', '0000-00-00', '0000-00-00', '', '', '', ''),
(40, '55555111', 'b2', 'user1', 5, 't5', '2016-11-09', '2016-11-18', 'LoliPop', '', '54644', 'manual'),
(41, '1111111', '4', 'user2', 1, 't5', '0000-00-00', '0000-00-00', 'Ubuntu', '10.11', '1111111', 'manual');

-- --------------------------------------------------------

--
-- 表的结构 `go_task_case`
--

CREATE TABLE IF NOT EXISTS `go_task_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `BugID` int(11) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `driver` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Waiting',
  `item` varchar(255) NOT NULL DEFAULT 'default',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=235 ;

--
-- 转存表中的数据 `go_task_case`
--

INSERT INTO `go_task_case` (`id`, `cid`, `tid`, `BugID`, `result`, `driver`, `comments`, `start_time`, `end_time`, `Status`, `item`) VALUES
(18, 24, 8, NULL, NULL, NULL, NULL, '2016-07-01', '2016-07-31', 'Waiting', 'default'),
(19, 15, 8, 11, 'fail', NULL, 'dfdf', '2016-07-01', '2016-07-31', 'Waiting', 'default'),
(20, 33, 8, NULL, NULL, NULL, NULL, '2016-07-01', '2016-07-31', 'Waiting', 'default'),
(21, 36, 8, NULL, NULL, NULL, NULL, '2016-07-01', '2016-07-31', 'Waiting', 'default'),
(22, 27, 9, 0, 'fail', NULL, '', '2016-07-03', '2016-07-23', 'Waiting', 'default'),
(23, 4, 9, 0, 'pass', NULL, '', '2016-07-03', '2016-07-23', 'Waiting', 'default'),
(24, 5, 9, 0, 'pass', NULL, '', '2016-07-03', '2016-07-23', 'Waiting', 'default'),
(25, 7, 9, 0, 'pass', NULL, '', '2016-07-03', '2016-07-23', 'Waiting', 'default'),
(26, 8, 9, 0, 'fail', NULL, '', '2016-07-03', '2016-07-23', 'Waiting', 'default'),
(27, 24, 8, NULL, NULL, NULL, NULL, '2016-07-09', '2016-07-29', 'Waiting', 'default'),
(28, 15, 8, 0, 'fail', NULL, '', '2016-07-09', '2016-07-29', 'Waiting', 'default'),
(29, 33, 8, NULL, NULL, NULL, NULL, '2016-07-09', '2016-07-29', 'Waiting', 'default'),
(30, 36, 8, NULL, NULL, NULL, NULL, '2016-07-09', '2016-07-29', 'Waiting', 'default'),
(31, 14, 7, 0, 'N/A', NULL, '', '0000-00-00', '0000-00-00', 'Waiting', 'default'),
(33, 19, 7, 0, 'N/A', NULL, '', '0000-00-00', '0000-00-00', 'Waiting', 'default'),
(35, 13, 7, 0, 'pass', NULL, '', '2016-07-14', '0000-00-00', 'Waiting', 'default'),
(36, 20, 7, NULL, NULL, NULL, NULL, '2016-07-14', NULL, 'Waiting', 'default'),
(37, 2, 9, 0, 'fail', NULL, '', '2016-07-14', '0000-00-00', 'Waiting', 'default'),
(38, 9, 9, 0, 'N/A', NULL, '', '2016-07-14', '0000-00-00', 'Waiting', 'default'),
(39, 28, 9, 0, 'fail', NULL, '', '2016-07-14', '0000-00-00', 'Waiting', 'default'),
(41, 15, 11, 0, 'pass', NULL, '', '2016-07-06', '2016-07-31', 'Waiting', 'default'),
(44, 2, 12, NULL, NULL, NULL, NULL, '2016-07-10', '2016-07-26', 'Waiting', 'default'),
(45, 27, 13, 0, 'N/A', NULL, '', '2016-07-06', '2016-07-28', 'Waiting', 'default'),
(46, 4, 13, 0, 'pass', NULL, '', '2016-07-06', '2016-07-28', 'Waiting', 'default'),
(47, 5, 13, 0, 'pass', NULL, '', '2016-07-06', '2016-07-28', 'Waiting', 'default'),
(48, 7, 13, 0, 'N/A', NULL, '', '2016-07-06', '2016-07-28', 'Waiting', 'default'),
(49, 8, 13, 0, 'pass', NULL, '', '2016-07-06', '2016-07-28', 'Waiting', 'default'),
(50, 21, 14, 0, 'N/A', NULL, '', '2016-07-07', '2016-07-31', 'Waiting', 'default'),
(66, 21, 18, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(67, 25, 18, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(68, 23, 18, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(69, 26, 18, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(74, 21, 20, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(75, 25, 20, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(76, 23, 20, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(77, 26, 20, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(78, 2, 10, NULL, NULL, NULL, NULL, '2016-07-15', NULL, 'Waiting', 'default'),
(79, 9, 10, NULL, NULL, NULL, NULL, '2016-07-15', NULL, 'Waiting', 'default'),
(80, 28, 10, NULL, NULL, NULL, NULL, '2016-07-15', NULL, 'Waiting', 'default'),
(81, 5, 10, NULL, NULL, NULL, NULL, '2016-07-15', NULL, 'Waiting', 'default'),
(82, 8, 10, NULL, NULL, NULL, NULL, '2016-07-15', NULL, 'Waiting', 'default'),
(83, 27, 10, NULL, NULL, NULL, NULL, '2016-07-15', NULL, 'Waiting', 'default'),
(88, 27, 23, 0, '', NULL, '', '2016-07-08', '2016-07-31', 'Waiting', 'default'),
(89, 4, 23, 0, '', NULL, 'dfdf', '2016-07-08', '2016-07-31', 'Waiting', 'default'),
(90, 5, 23, 2323, '', NULL, 'dfdd', '2016-07-08', '2016-07-31', 'Waiting', 'default'),
(91, 7, 23, 1111, '', NULL, 'fff', '2016-07-08', '2016-07-31', 'Waiting', 'default'),
(92, 8, 23, 0, '', NULL, 'uu', '2016-07-08', '2016-07-31', 'Waiting', 'default'),
(93, 24, 24, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(94, 15, 24, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(95, 33, 24, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(96, 36, 24, NULL, NULL, NULL, NULL, '2016-07-02', '2016-07-31', 'Waiting', 'default'),
(97, 27, 25, NULL, NULL, NULL, NULL, '2016-07-10', '2016-07-24', 'Waiting', 'default'),
(98, 4, 25, NULL, NULL, NULL, NULL, '2016-07-10', '2016-07-24', 'Waiting', 'default'),
(99, 5, 25, NULL, NULL, NULL, NULL, '2016-07-10', '2016-07-24', 'Waiting', 'default'),
(100, 7, 25, NULL, NULL, NULL, NULL, '2016-07-10', '2016-07-24', 'Waiting', 'default'),
(101, 8, 25, NULL, NULL, NULL, NULL, '2016-07-10', '2016-07-24', 'Waiting', 'default'),
(227, 8, 40, NULL, NULL, NULL, NULL, '2016-11-09', '2016-11-18', 'Waiting', 'default'),
(103, 21, 27, 11, '', NULL, '', '2016-07-03', '2016-07-30', 'Waiting', 'default'),
(124, 14, 11, 0, 'fail', NULL, '22', '2016-07-20', '2016-07-07', 'Waiting', 'default'),
(125, 19, 11, 0, 'pass', NULL, '', '2016-07-06', '2016-07-31', 'Waiting', 'default'),
(128, 11, 23, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(129, 16, 23, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(130, 21, 23, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(133, 11, 9, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(134, 16, 9, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(135, 21, 9, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(136, 12, 9, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(137, 17, 9, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(138, 13, 11, 2222, 'N/A', NULL, '22', '2016-07-20', '2016-07-07', 'Waiting', 'default'),
(139, 20, 11, 2222, 'pass', NULL, '22', '2016-07-20', '2016-07-07', 'Waiting', 'default'),
(140, 30, 27, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(141, 40, 27, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(142, 30, 14, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(143, 40, 14, NULL, NULL, NULL, NULL, '2016-07-20', NULL, 'Waiting', 'default'),
(158, 2, 7, 0, '', NULL, '', '2016-07-22', '2016-07-08', 'Waiting', 'default'),
(159, 9, 7, 0, '', NULL, '', '2016-07-08', '2016-07-29', 'Waiting', 'default'),
(160, 28, 7, 0, '', NULL, '', '2016-07-22', '2016-07-23', 'Waiting', 'default'),
(161, 5, 7, NULL, NULL, NULL, NULL, '2016-07-22', NULL, 'Waiting', 'default'),
(162, 8, 7, NULL, NULL, NULL, NULL, '2016-07-22', NULL, 'Waiting', 'default'),
(163, 27, 7, NULL, NULL, NULL, NULL, '2016-07-22', NULL, 'Waiting', 'default'),
(164, 12, 7, NULL, NULL, NULL, NULL, '2016-07-22', NULL, 'Waiting', 'default'),
(165, 17, 7, NULL, NULL, NULL, NULL, '2016-07-22', NULL, 'Waiting', 'default'),
(166, 11, 7, 0, '', NULL, '', '2016-07-02', '0000-00-00', 'Waiting', 'default'),
(167, 16, 7, NULL, NULL, NULL, NULL, '2016-07-22', NULL, 'Waiting', 'default'),
(168, 21, 7, NULL, NULL, NULL, NULL, '2016-07-22', NULL, 'Waiting', 'default'),
(169, 15, 7, NULL, NULL, NULL, NULL, '2016-07-22', NULL, 'Waiting', 'default'),
(199, 0, 33, NULL, NULL, NULL, NULL, '2016-07-15', '2016-07-10', 'Waiting', 'default'),
(198, 0, 32, NULL, NULL, NULL, NULL, '2016-07-15', '2016-07-10', 'Waiting', 'default'),
(226, 5, 40, NULL, NULL, NULL, NULL, '2016-11-09', '2016-11-18', 'Waiting', 'default'),
(225, 28, 40, NULL, NULL, NULL, NULL, '2016-11-09', '2016-11-18', 'Waiting', 'default'),
(224, 27, 40, NULL, NULL, NULL, NULL, '2016-11-09', '2016-11-18', 'Waiting', 'default'),
(216, 0, 37, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 'Waiting', 'default'),
(223, 2, 40, 333, 'pass', '333', '333', '2016-11-09', '2016-11-18', '444', 'default'),
(228, 9, 40, NULL, NULL, NULL, NULL, '2016-11-09', '2016-11-18', 'Waiting', 'default'),
(229, 2, 41, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 'Waiting', 'default'),
(230, 27, 41, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 'Waiting', 'default'),
(231, 28, 41, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 'Waiting', 'default'),
(232, 5, 41, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 'Waiting', 'default'),
(233, 8, 41, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 'Waiting', 'default'),
(234, 9, 41, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 'Waiting', 'default');

-- --------------------------------------------------------

--
-- 表的结构 `go_task_shot`
--

CREATE TABLE IF NOT EXISTS `go_task_shot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cids` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `go_task_shot`
--

INSERT INTO `go_task_shot` (`id`, `cids`, `name`) VALUES
(1, NULL, 'user_defined'),
(2, '12,17,2,28,9', 't2'),
(3, '21,27,4,5,7,8', 't3'),
(9, '2,27,28,5,8,9', 't5'),
(15, '21,25,23,26', 't7');

-- --------------------------------------------------------

--
-- 表的结构 `go_testcase`
--

CREATE TABLE IF NOT EXISTS `go_testcase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CaseName` varchar(255) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `Priority` varchar(255) DEFAULT NULL,
  `Automated` varchar(255) DEFAULT NULL,
  `ScripLocation` varchar(255) DEFAULT NULL,
  `Enviroment` varchar(255) DEFAULT NULL,
  `TestSteps` varchar(255) DEFAULT NULL,
  `ExpectedResults` varchar(255) DEFAULT NULL,
  `From` varchar(255) DEFAULT NULL,
  `Customer` varchar(255) DEFAULT NULL,
  `BugID` int(11) DEFAULT NULL,
  `Project` varchar(255) DEFAULT NULL,
  `OS` varchar(255) DEFAULT NULL,
  `Board` varchar(255) DEFAULT NULL,
  `Comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`CaseName`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `go_testcase`
--

INSERT INTO `go_testcase` (`id`, `CaseName`, `pid`, `Priority`, `Automated`, `ScripLocation`, `Enviroment`, `TestSteps`, `ExpectedResults`, `From`, `Customer`, `BugID`, `Project`, `OS`, `Board`, `Comments`) VALUES
(2, 'es11', 11, 'P0', 'No', 'filedir1', 'en1', '123', 'good', 'Customer Case', 'Marvell', 1, 'pro3,pro4', 'LoliPop,KitKat,Ubuntu', 'b3,b4', 'hahah'),
(4, 'es20 x64', 13, '2', 'no', 'filedir1', 'en2', '', 'perfect', '', '', 1, NULL, 'Linux', 'FSL IMX6DQ R2', ''),
(5, 'es20 cts', 12, '2', 'no', 'filedir1', 'en2', '', 'perfect', '', '', 3, NULL, 'Linux', 'FSL IMX6DQ R2', ''),
(7, 'poenci 1.2', 13, '2', 'no', 'filedir1', 'en2', '', 'perfect', '', '', 2, NULL, 'LolliPop 5.1', 'FSL IMX6DQ R2', ''),
(8, 'haluts', 12, '2', 'no', 'filedir1', 'en2', '', 'perfect', '', '', 2, NULL, 'LolliPop 5.1', 'FSL IMX6DQ R2', ''),
(9, 'cetk', 11, '2', 'no', 'filedir1', 'en1', '', 'perfect', '', '', 2, NULL, 'LoliPop', 'b3', ''),
(11, 'mtmp', 21, '2', 'no', 'filedir1', 'en3', '', 'perfect', '', '', 2, NULL, 'KitKat', 'FSL IMX6DQ R2', ''),
(12, 'egl', 22, '2', 'yes', 'filedir1', 'en3', '', 'perfect', '', '', 3, NULL, 'KitKat', 'FSL IMX6DQ R2', ''),
(13, 'egl1', 23, '2', 'yes', 'filedir1', 'en3', '', 'good', '', '', 4, NULL, 'KitKat', 'FSL IMX6DQ R2', ''),
(16, 'egl4', 21, '4', 'yes', 'dfdf', 'df', '', '', '', '', 0, NULL, '', '', ''),
(17, 'egl2', 22, '2', 'yes', 'filedir1', 'en3', '', 'bad', '', '', 4, NULL, 'KitKat', 'FSL IMX6DQ R2', 'dfda'),
(20, 'egl2', 23, '2', 'yes', 'filedir1', 'en3', '', 'bad', '', '', 4, NULL, 'KitKat', 'FSL IMX6DQ R2', 'dfda'),
(21, 'egl2', 21, '2', 'yes', 'filedir1', 'en3', '', 'bad', '', '', 4, NULL, 'KitKat', 'FSL IMX6DQ R2', 'dfda'),
(27, 'egl2', 12, '2', 'yes', 'filedir1', 'en3', '', 'bad', '', '', 4, NULL, 'KitKat', 'FSL IMX6DQ R2', 'dfda'),
(28, 'egl2', 11, '2', 'yes', 'filedir1', 'en3', '', 'bad', '', '', 4, NULL, 'KitKat', 'FSL IMX6DQ R2', 'dfda');

-- --------------------------------------------------------

--
-- 表的结构 `go_test_run`
--

CREATE TABLE IF NOT EXISTS `go_test_run` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `go_test_run`
--

INSERT INTO `go_test_run` (`id`, `name`, `pid`, `start_time`, `end_time`) VALUES
(1, 'run1', 1, '2016-07-03', '2016-07-30'),
(2, '44', 1, '2016-07-15', '2016-07-10'),
(5, 'run5', 3, NULL, NULL),
(4, 'run4', 3, NULL, NULL),
(3, 'run3', 2, '2016-07-02', '2016-07-31'),
(6, '456', 1, '2016-07-15', '2016-07-10'),
(7, '44', 1, '2016-07-15', '2016-07-10');

-- --------------------------------------------------------

--
-- 表的结构 `go_users`
--

CREATE TABLE IF NOT EXISTS `go_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；mb_password加密',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '用户头像，相对于upload/avatar目录',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `email_code` varchar(60) DEFAULT NULL COMMENT '激活码',
  `phone` int(11) unsigned DEFAULT NULL COMMENT '手机号',
  `status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `register_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` varchar(16) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `last_login_time` int(10) unsigned NOT NULL COMMENT '最后登录时间',
  PRIMARY KEY (`id`,`username`),
  KEY `user_login_key` (`username`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=143 ;

--
-- 转存表中的数据 `go_users`
--

INSERT INTO `go_users` (`id`, `username`, `password`, `avatar`, `email`, `email_code`, `phone`, `status`, `register_time`, `last_login_ip`, `last_login_time`) VALUES
(88, 'admin', '123456', 'Manager', 'Mary.Ma@verisilicon.com', '', 0, 1, 1449199996, '', 0),
(139, 'admin2', '123456', 'Leader', '', NULL, NULL, 1, 0, '', 0),
(140, 'user1', '123456', 'User', 'Shuai.wang@verisilicon.com', NULL, NULL, 1, 0, '', 0),
(141, 'user2', '123456', 'User', '', NULL, NULL, 1, 0, '', 0),
(142, 'user3', '123456', '', 'wad@132.com', NULL, NULL, 1, 0, '', 0),
(111, 'waveleu', '7925846', 'Bo Liu', '1162812479@qq.com', '', 0, 2, 0, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `go_version`
--

CREATE TABLE IF NOT EXISTS `go_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `BuildNo` varchar(11) DEFAULT NULL,
  `BuildType` varchar(255) DEFAULT NULL,
  `Compile` varchar(255) DEFAULT NULL,
  `time` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `go_version`
--

INSERT INTO `go_version` (`id`, `name`, `BuildNo`, `BuildType`, `Compile`, `time`) VALUES
(1, '6.20', '1', '2', '3', '2016-08-14'),
(2, '5.20', '333', '222', '111', '2016-08-04'),
(3, '3.35', '2', '3', '4', '2016-08-12'),
(4, '4.20', NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
