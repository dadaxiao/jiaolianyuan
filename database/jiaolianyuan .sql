-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-08-09 13:35:37
-- 服务器版本： 5.7.10-log
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jiaolianyuan`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` tinyint(5) NOT NULL COMMENT '自增ID',
  `adminName` varchar(20) NOT NULL COMMENT '管理员姓名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `access` varchar(20) NOT NULL COMMENT '管理员权限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- --------------------------------------------------------

--
-- 表的结构 `cate`
--

CREATE TABLE `cate` (
  `id` int(11) NOT NULL COMMENT '自增id',
  `cNo` varchar(20) NOT NULL COMMENT '分类编号',
  `cname` varchar(30) NOT NULL COMMENT '分类名字'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cate`
--

INSERT INTO `cate` (`id`, `cNo`, `cname`) VALUES
(1, '001', 'PHP工程师'),
(2, '002', 'Android工程师'),
(3, '003', '前端工程师'),
(4, '004', 'HTML5工程师'),
(5, '005', '嵌入式工程师');

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL COMMENT 'id自增',
  `classNo` varchar(20) NOT NULL COMMENT '班级编号',
  `className` varchar(20) NOT NULL COMMENT '班级名',
  `classPrice` decimal(10,0) NOT NULL COMMENT '班级价格',
  `startTime` date NOT NULL COMMENT '开班时间',
  `avePeriod` varchar(50) NOT NULL COMMENT '班级平均周期',
  `classIntro` text NOT NULL COMMENT '班级简介',
  `classCate` varchar(20) NOT NULL COMMENT '班级分类',
  `classPic` varchar(250) DEFAULT NULL COMMENT '班级简介图',
  `detailPic` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='班级表';

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`id`, `classNo`, `className`, `classPrice`, `startTime`, `avePeriod`, `classIntro`, `classCate`, `classPic`, `detailPic`) VALUES
(1, '0001', 'PHP基础班（无基础)', '469', '2016-08-13', '30', 'hello,php.轻松学习PHP基础知识，了解PHP中的变量、变量的类型、常量等概念，认识PHP中的运算符，掌握PHP中顺序结构、条件结构、循环结构三种语言结构语句', '1', 'web首页素材/热门课程/2.jpg', 'buy-page-img/course-pic.png'),
(2, '0002', 'thinkphp', '1000', '2016-08-12', '', 'ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发布，从诞生以来一直秉承简洁实用的设计原则，在保持出色的性能和至简的代码的同时，尤其注重开发体验和易用性，并且拥有众多的原创功能和特性，为WEB应用开发提供了强有力的支持。', '1', 'web首页素材/热门课程/3.jpg', 'buy-page-img/course-pic.png'),
(3, '0003', 'mysql', '699', '2016-08-11', '', '', '1', 'web首页素材/热门课程/4.jpg', 'buy-page-img/course-pic.png'),
(4, '0004', 'Java', '569', '2016-08-10', '', '', '2', 'web首页素材/热门课程/2.jpg', 'buy-page-img/course-pic.png'),
(5, '0005', 'Android', '899', '2016-08-09', '', '', '2', 'web首页素材/热门课程/5.jpg', 'buy-page-img/course-pic.png'),
(6, '0006', 'jsp', '233', '2016-08-09', '', '', '2', 'web首页素材/热门课程/5.jpg', ''),
(7, '0007', 'PHP1', '555', '2016-08-10', '', '', '1', 'web首页素材/php工程师/1.jpg', ''),
(8, '0008', 'PHP2', '555', '2016-08-09', '', '', '1', 'web首页素材/php工程师/2.jpg', ''),
(9, '0009', 'PHP3', '999', '2016-08-10', '', '', '1', 'web首页素材/php工程师/3.jpg', ''),
(10, '0010', 'PHP4', '7999', '2016-08-16', '', '', '1', 'web首页素材/php工程师/4.jpg', ''),
(11, '0011', 'PHP5', '5999', '2016-08-07', '', '', '1', 'web首页素材/php工程师/5.jpg', ''),
(12, '0012', 'PHP6', '7888', '2016-08-16', '', '', '1', 'web首页素材/php工程师/6.jpg', ''),
(13, '0013', 'PHP7', '8888', '2016-08-10', '', '', '1', 'web首页素材/php工程师/7.jpg', ''),
(14, '0014', 'PHP8', '6999', '2016-08-11', '', '', '1', 'web首页素材/php工程师/8.jpg', '');

-- --------------------------------------------------------

--
-- 表的结构 `class_project`
--

CREATE TABLE `class_project` (
  `id` int(10) NOT NULL COMMENT '自增ID',
  `classId` int(10) NOT NULL COMMENT '班级ID',
  `projectId` int(10) NOT NULL COMMENT '项目ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='班级项目关联表';

--
-- 转存表中的数据 `class_project`
--

INSERT INTO `class_project` (`id`, `classId`, `projectId`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(5, 2, 1),
(6, 2, 2),
(9, 1, 6),
(10, 1, 7),
(11, 1, 8),
(12, 1, 9),
(13, 1, 10);

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL COMMENT '自增ID',
  `name` varchar(50) NOT NULL COMMENT '项目名称',
  `requireTime` varchar(20) NOT NULL COMMENT '项目需要的时间',
  `sense` text NOT NULL COMMENT '项目意义',
  `request` varchar(200) NOT NULL COMMENT '项目要求',
  `dataUrl` varchar(255) NOT NULL COMMENT '项目所需要的资料'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目表';

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`id`, `name`, `requireTime`, `sense`, `request`, `dataUrl`) VALUES
(1, 'small', '', '', '', ''),
(2, 'medium', '', '', '', ''),
(3, 'big', '', '', '', ''),
(6, 'PHP的数据类型和常数使用', '2', '加深对PHP的数据类型和常数的认识', '无', 'www.**.com'),
(7, 'PHP实现简单的计算器', '3', '加深对PHP的数据类型和常数的认识', '无', 'ww.***.com'),
(8, 'PHP中预定义的超全局数组', '5', '加深对数组的认识', '无', 'www.*****.com'),
(9, '抽象类抽象方法的应用', '4', '加深对类的认识', '', ''),
(10, '面向对象实例（图形计算器）', '5', '巩固学习', '无', 'www.******.com'),
(11, '仅仅用于测试', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL COMMENT '自增学员id',
  `stuNo` varchar(20) NOT NULL,
  `stuName` varchar(25) NOT NULL COMMENT '学员名字',
  `sex` varchar(5) NOT NULL COMMENT '学生性别',
  `school` varchar(50) NOT NULL COMMENT '学校名称',
  `phone` varchar(11) NOT NULL COMMENT '学生电话号码',
  `password` varchar(100) NOT NULL COMMENT '账号密码',
  `face` varchar(250) NOT NULL COMMENT '头像地址',
  `regtime` date NOT NULL COMMENT '注册时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `stuNo`, `stuName`, `sex`, `school`, `phone`, `password`, `face`, `regtime`) VALUES
(1, '1001', 'xiaopeng', '男', '油校', '13922035737', '3a300c48b47b714d9821dc473304aa84', 'face/lufy.jpg', '2016-08-05'),
(2, '1002', 'hello', '', '', '12345678910', 'c4ca4238a0b923820dcc509a6f75849b', 'face/147065771411.jpg', '2016-08-05'),
(3, '1003', 'Bosh', '', '', '12345678911', 'c4ca4238a0b923820dcc509a6f75849b', 'face/1470657972339.jpg', '2016-08-05'),
(4, '1004', 'Nash', '', '', '12345678912', '0cc175b9c0f1b6a831c399e269772661', 'face/4.jpg', '2016-08-05'),
(5, '1005', 'lalala', '', '', '665737', '3a300c48b47b714d9821dc473304aa84', 'face/3.jpg', '2016-08-06'),
(6, '1006', 'Kobe', '', '', '12345678913', 'c4ca4238a0b923820dcc509a6f75849b', 'face/2.jpg', '2016-08-06'),
(7, '1007', 'paul', '', '', '12345678914', 'c4ca4238a0b923820dcc509a6f75849b', 'face/1.jpg', '2016-08-07'),
(8, '1008', 'Wade', '', '', '12345678915', 'c4ca4238a0b923820dcc509a6f75849b', 'face/8f5098784bb55a48df5401fc.jpg', '2016-08-07'),
(9, '1009', 'James', '', '', '12345678912', 'c4ca4238a0b923820dcc509a6f75849b', 'face/11d7af51f3deb48fb227c7bff61f3a292df57836.jpg', '2016-08-07'),
(10, '1010', 'KG', '', '', '11111111111', 'c4ca4238a0b923820dcc509a6f75849b', 'face/73f082025aafa40f228f7284ab64034f78f01919.jpg', '0000-00-00'),
(11, '1011', 'Durant', '', '', '22222222222', 'c4ca4238a0b923820dcc509a6f75849b', 'face/d833c895d143ad4b3d3e736782025aafa40f0600.jpg', '0000-00-00'),
(12, '1012', 'Rose', '', '', '33333333333', 'c4ca4238a0b923820dcc509a6f75849b', 'face/u=547426112,2520659528&fm=21&gp=0.jpg', '0000-00-00'),
(13, '1013', 'Broser', '', '', '44444444444', 'c4ca4238a0b923820dcc509a6f75849b', 'face/u=1858951410,1241440710&fm=21&gp=0.jpg', '0000-00-00'),
(14, '1014', 'Love', '', '', '55555555555', 'c4ca4238a0b923820dcc509a6f75849b', 'face/u=2805831374,30170951&fm=21&gp=0.jpg', '0000-00-00'),
(15, '1015', 'Lin', '', '', '66666666666', 'c4ca4238a0b923820dcc509a6f75849b', 'face/u=2805831374,30170951&fm=21&gp=0.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- 表的结构 `stu_class`
--

CREATE TABLE `stu_class` (
  `id` int(11) NOT NULL COMMENT '自增ID',
  `stuId` int(11) NOT NULL COMMENT '学生ID',
  `classId` int(11) NOT NULL COMMENT '班级ID',
  `teacherId` int(11) NOT NULL,
  `graduateStatus` enum('已毕业','未毕业') NOT NULL COMMENT '是否毕业'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生-班级关联表';

--
-- 转存表中的数据 `stu_class`
--

INSERT INTO `stu_class` (`id`, `stuId`, `classId`, `teacherId`, `graduateStatus`) VALUES
(1, 1, 1, 1, '已毕业'),
(2, 1, 2, 2, '未毕业'),
(7, 2, 1, 1, '已毕业'),
(8, 3, 1, 1, '已毕业'),
(9, 4, 1, 1, '已毕业'),
(10, 5, 1, 1, '已毕业'),
(27, 8, 1, 1, '已毕业'),
(28, 9, 1, 1, '已毕业'),
(29, 10, 1, 1, '已毕业'),
(30, 11, 1, 2, '已毕业'),
(31, 12, 1, 1, '已毕业'),
(32, 13, 1, 1, '已毕业'),
(33, 14, 1, 1, '已毕业'),
(34, 15, 2, 1, '已毕业');

-- --------------------------------------------------------

--
-- 表的结构 `stu_project`
--

CREATE TABLE `stu_project` (
  `id` int(11) NOT NULL COMMENT '自增ID',
  `stuId` int(11) NOT NULL COMMENT '学生ID',
  `projectId` int(11) NOT NULL COMMENT '项目ID',
  `classId` int(11) NOT NULL COMMENT '班级ID',
  `status` enum('已写成','未完成') NOT NULL COMMENT '项目是否完成',
  `startTime` date NOT NULL COMMENT '项目开始时间',
  `declineTime` int(6) NOT NULL COMMENT '项目剩余时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生-项目关联表';

--
-- 转存表中的数据 `stu_project`
--

INSERT INTO `stu_project` (`id`, `stuId`, `projectId`, `classId`, `status`, `startTime`, `declineTime`) VALUES
(1, 1, 1, 1, '已写成', '0000-00-00', 0),
(2, 1, 2, 1, '已写成', '0000-00-00', 0),
(3, 1, 3, 1, '已写成', '0000-00-00', 0),
(4, 1, 1, 2, '未完成', '0000-00-00', 30);

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL COMMENT '教练自增id',
  `tno` varchar(20) NOT NULL,
  `tname` varchar(50) NOT NULL COMMENT '教练名字',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `sex` varchar(5) NOT NULL COMMENT '教练性别',
  `regtime` date NOT NULL COMMENT '教练注册时间',
  `address` varchar(50) NOT NULL COMMENT '教练地址',
  `phone` varchar(11) NOT NULL COMMENT '教练电话',
  `face` varchar(250) NOT NULL COMMENT '头像地址',
  `auditStatus` enum('待审核','审核不通过','审核通过') NOT NULL COMMENT '教练注册审核状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='教练信息表';

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`id`, `tno`, `tname`, `password`, `sex`, `regtime`, `address`, `phone`, `face`, `auditStatus`) VALUES
(1, '0001', 'dada', '3a300c48b47b714d9821dc473304aa84', '男', '2016-08-05', '广东茂名', '13922035737', 'face/lufy.jpg', '审核通过'),
(2, '0002', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-05', '', '01234567891', '', '待审核'),
(3, '0003', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567892', '', '待审核'),
(4, '0004', '', '3a300c48b47b714d9821dc473304aa84', '', '2016-08-06', '', '01234567893', '', '待审核'),
(5, '0005', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567894', '', '待审核'),
(6, '0006', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567895', '', '待审核'),
(7, '0007', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567896', '', '待审核'),
(8, '0008', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567897', '', '待审核'),
(9, '0009', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567898', '', '待审核'),
(10, '0010', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-07', '', '01234567899', '', '待审核'),
(11, '0011', '', 'c81e728d9d4c2f636f067f89cc14862c', '', '2016-08-07', '', '1234567890', '', '待审核');

-- --------------------------------------------------------

--
-- 表的结构 `teacher_class`
--

CREATE TABLE `teacher_class` (
  `id` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `classId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL COMMENT '自增id',
  `sid` int(20) NOT NULL COMMENT '学生id',
  `workNo` int(5) NOT NULL COMMENT '作业号',
  `workUrl` varchar(255) NOT NULL COMMENT '作业的url',
  `status` enum('已提交，待审核','审核通过','审核不通过','') NOT NULL COMMENT '提交审核状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='作业表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cNo` (`cNo`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classNo` (`classNo`);

--
-- Indexes for table `class_project`
--
ALTER TABLE `class_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classId` (`classId`),
  ADD KEY `projectId` (`projectId`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_class`
--
ALTER TABLE `stu_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stuId` (`stuId`),
  ADD KEY `classId` (`classId`),
  ADD KEY `teacherId` (`teacherId`);

--
-- Indexes for table `stu_project`
--
ALTER TABLE `stu_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stuId` (`stuId`),
  ADD KEY `projectId` (`projectId`),
  ADD KEY `classId` (`classId`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT COMMENT '自增ID';
--
-- 使用表AUTO_INCREMENT `cate`
--
ALTER TABLE `cate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id', AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id自增', AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `class_project`
--
ALTER TABLE `class_project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID', AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID', AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增学员id', AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `stu_class`
--
ALTER TABLE `stu_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID', AUTO_INCREMENT=35;
--
-- 使用表AUTO_INCREMENT `stu_project`
--
ALTER TABLE `stu_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID', AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT '教练自增id', AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id';
--
-- 限制导出的表
--

--
-- 限制表 `class_project`
--
ALTER TABLE `class_project`
  ADD CONSTRAINT `class_project_ibfk_1` FOREIGN KEY (`classId`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `class_project_ibfk_2` FOREIGN KEY (`projectId`) REFERENCES `project` (`id`);

--
-- 限制表 `stu_class`
--
ALTER TABLE `stu_class`
  ADD CONSTRAINT `stu_class_ibfk_1` FOREIGN KEY (`stuId`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `stu_class_ibfk_2` FOREIGN KEY (`classId`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `stu_class_ibfk_3` FOREIGN KEY (`teacherId`) REFERENCES `teacher` (`id`);

--
-- 限制表 `stu_project`
--
ALTER TABLE `stu_project`
  ADD CONSTRAINT `stu_project_ibfk_1` FOREIGN KEY (`stuId`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `stu_project_ibfk_2` FOREIGN KEY (`projectId`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `stu_project_ibfk_3` FOREIGN KEY (`classId`) REFERENCES `class` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
