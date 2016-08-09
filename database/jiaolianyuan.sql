/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50622
Source Host           : localhost:3306
Source Database       : jiaolianyuan

Target Server Type    : MYSQL
Target Server Version : 50622
File Encoding         : 65001

Date: 2016-08-08 11:11:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `adminName` varchar(20) NOT NULL COMMENT '管理员姓名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `access` varchar(20) NOT NULL COMMENT '管理员权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for `cate`
-- ----------------------------
DROP TABLE IF EXISTS `cate`;
CREATE TABLE `cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `cNo` varchar(20) NOT NULL COMMENT '分类编号',
  `cname` varchar(30) NOT NULL COMMENT '分类名字',
  PRIMARY KEY (`id`),
  KEY `cNo` (`cNo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cate
-- ----------------------------
INSERT INTO `cate` VALUES ('1', '001', 'PHP工程师');
INSERT INTO `cate` VALUES ('2', '002', 'Android工程师');
INSERT INTO `cate` VALUES ('3', '003', '前端工程师');
INSERT INTO `cate` VALUES ('4', '004', 'HTML5工程师');
INSERT INTO `cate` VALUES ('5', '005', '嵌入式工程师');

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id自增',
  `classNo` varchar(20) NOT NULL COMMENT '班级编号',
  `className` varchar(20) NOT NULL COMMENT '班级名',
  `classPrice` decimal(10,0) NOT NULL COMMENT '班级价格',
  `startTime` date NOT NULL COMMENT '开班时间',
  `avePeriod` varchar(50) NOT NULL COMMENT '班级平均周期',
  `classIntro` varchar(255) NOT NULL COMMENT '班级简介',
  `classCate` varchar(20) NOT NULL COMMENT '班级分类',
  `classPic` varchar(250) NOT NULL COMMENT '班级简介图',
  PRIMARY KEY (`id`),
  KEY `classNo` (`classNo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='班级表';

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('1', '0001', 'PHP', '469', '2016-08-13', '', 'hello,php', '1', 'web首页素材/热门课程/2.jpg');
INSERT INTO `class` VALUES ('2', '0002', 'thinkphp', '1000', '2016-08-12', '', '', '1', 'web首页素材/热门课程/3.jpg');
INSERT INTO `class` VALUES ('3', '0003', 'mysql', '699', '2016-08-11', '', '', '1', 'web首页素材/热门课程/4.jpg');
INSERT INTO `class` VALUES ('4', '0004', 'Java', '569', '2016-08-10', '', '', '2', 'web首页素材/热门课程/2.jpg');
INSERT INTO `class` VALUES ('5', '0005', 'Android', '899', '2016-08-09', '', '', '2', 'web首页素材/热门课程/5.jpg');
INSERT INTO `class` VALUES ('6', '0006', 'jsp', '233', '2016-08-09', '', '', '2', 'web首页素材/热门课程/5.jpg');
INSERT INTO `class` VALUES ('7', '0007', 'PHP1', '555', '2016-08-10', '', '', '1', 'web首页素材/php工程师/1.jpg');
INSERT INTO `class` VALUES ('8', '0008', 'PHP2', '555', '2016-08-09', '', '', '1', 'web首页素材/php工程师/2.jpg');
INSERT INTO `class` VALUES ('9', '0009', 'PHP3', '999', '2016-08-10', '', '', '1', 'web首页素材/php工程师/3.jpg');
INSERT INTO `class` VALUES ('10', '0010', 'PHP4', '7999', '2016-08-16', '', '', '1', 'web首页素材/php工程师/4.jpg');
INSERT INTO `class` VALUES ('11', '0011', 'PHP5', '5999', '2016-08-07', '', '', '1', 'web首页素材/php工程师/5.jpg');
INSERT INTO `class` VALUES ('12', '0012', 'PHP6', '7888', '2016-08-16', '', '', '1', 'web首页素材/php工程师/6.jpg');
INSERT INTO `class` VALUES ('13', '0013', 'PHP7', '8888', '2016-08-10', '', '', '1', 'web首页素材/php工程师/7.jpg');
INSERT INTO `class` VALUES ('14', '0014', 'PHP8', '6999', '2016-08-11', '', '', '1', 'web首页素材/php工程师/8.jpg');

-- ----------------------------
-- Table structure for `class_project`
-- ----------------------------
DROP TABLE IF EXISTS `class_project`;
CREATE TABLE `class_project` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `classId` int(10) NOT NULL COMMENT '班级ID',
  `projectId` int(10) NOT NULL COMMENT '项目ID',
  PRIMARY KEY (`id`),
  KEY `classId` (`classId`),
  KEY `projectId` (`projectId`),
  CONSTRAINT `class_project_ibfk_1` FOREIGN KEY (`classId`) REFERENCES `class` (`id`),
  CONSTRAINT `class_project_ibfk_2` FOREIGN KEY (`projectId`) REFERENCES `project` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='班级项目关联表';

-- ----------------------------
-- Records of class_project
-- ----------------------------

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(50) NOT NULL COMMENT '项目名称',
  `requireTime` varchar(20) NOT NULL COMMENT '项目需要的时间',
  `sense` text NOT NULL COMMENT '项目意义',
  `request` varchar(200) NOT NULL COMMENT '项目要求',
  `dataUrl` varchar(255) NOT NULL COMMENT '项目所需要的资料',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目表';

-- ----------------------------
-- Records of project
-- ----------------------------

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增学员id',
  `stuName` varchar(25) NOT NULL COMMENT '学员名字',
  `sex` varchar(5) NOT NULL COMMENT '学生性别',
  `school` varchar(50) NOT NULL COMMENT '学校名称',
  `phone` varchar(11) NOT NULL COMMENT '学生电话号码',
  `password` varchar(100) NOT NULL COMMENT '账号密码',
  `regtime` date NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', 'xiaopeng', '男', '油校', '13922035737', '3a300c48b47b714d9821dc473304aa84', '2016-08-05');
INSERT INTO `student` VALUES ('2', '', '', '', '12345678910', 'c4ca4238a0b923820dcc509a6f75849b', '2016-08-05');
INSERT INTO `student` VALUES ('3', '', '', '', '12345678911', 'c4ca4238a0b923820dcc509a6f75849b', '2016-08-05');
INSERT INTO `student` VALUES ('4', '', '', '', '12345678912', '0cc175b9c0f1b6a831c399e269772661', '2016-08-05');
INSERT INTO `student` VALUES ('5', '', '', '', '665737', '3a300c48b47b714d9821dc473304aa84', '2016-08-06');
INSERT INTO `student` VALUES ('6', '', '', '', '12345678913', 'c4ca4238a0b923820dcc509a6f75849b', '2016-08-06');
INSERT INTO `student` VALUES ('7', '', '', '', '12345678914', 'c4ca4238a0b923820dcc509a6f75849b', '2016-08-07');
INSERT INTO `student` VALUES ('8', '', '', '', '12345678915', 'c4ca4238a0b923820dcc509a6f75849b', '2016-08-07');
INSERT INTO `student` VALUES ('9', '', '', '', '12345678912', 'c4ca4238a0b923820dcc509a6f75849b', '2016-08-07');

-- ----------------------------
-- Table structure for `stu_class`
-- ----------------------------
DROP TABLE IF EXISTS `stu_class`;
CREATE TABLE `stu_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `stuId` int(11) NOT NULL COMMENT '学生ID',
  `classId` int(11) NOT NULL COMMENT '班级ID',
  `graduateStatus` enum('已毕业','未毕业') NOT NULL COMMENT '是否毕业',
  PRIMARY KEY (`id`),
  KEY `stuId` (`stuId`),
  KEY `classId` (`classId`),
  CONSTRAINT `stu_class_ibfk_1` FOREIGN KEY (`stuId`) REFERENCES `student` (`id`),
  CONSTRAINT `stu_class_ibfk_2` FOREIGN KEY (`classId`) REFERENCES `class` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生-班级关联表';

-- ----------------------------
-- Records of stu_class
-- ----------------------------

-- ----------------------------
-- Table structure for `stu_project`
-- ----------------------------
DROP TABLE IF EXISTS `stu_project`;
CREATE TABLE `stu_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `stuId` int(11) NOT NULL COMMENT '学生ID',
  `projectId` int(11) NOT NULL COMMENT '项目ID',
  `classId` int(11) NOT NULL COMMENT '班级ID',
  `status` enum('已写成','未完成') NOT NULL COMMENT '项目是否完成',
  `startTime` date NOT NULL COMMENT '项目开始时间',
  `declineTime` date NOT NULL COMMENT '项目剩余时间',
  PRIMARY KEY (`id`),
  KEY `stuId` (`stuId`),
  KEY `projectId` (`projectId`),
  KEY `classId` (`classId`),
  CONSTRAINT `stu_project_ibfk_1` FOREIGN KEY (`stuId`) REFERENCES `student` (`id`),
  CONSTRAINT `stu_project_ibfk_2` FOREIGN KEY (`projectId`) REFERENCES `project` (`id`),
  CONSTRAINT `stu_project_ibfk_3` FOREIGN KEY (`classId`) REFERENCES `class` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生-项目关联表';

-- ----------------------------
-- Records of stu_project
-- ----------------------------

-- ----------------------------
-- Table structure for `teacher`
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT '教练自增id',
  `tname` varchar(50) NOT NULL COMMENT '教练名字',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `sex` varchar(5) NOT NULL COMMENT '教练性别',
  `regtime` date NOT NULL COMMENT '教练注册时间',
  `address` varchar(50) NOT NULL COMMENT '教练地址',
  `phone` varchar(11) NOT NULL COMMENT '教练电话',
  `classNo` varchar(20) NOT NULL COMMENT '班级编号',
  `auditStatus` enum('待审核','审核不通过','审核通过') NOT NULL COMMENT '教练注册审核状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='教练信息表';

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', 'dada', '3a300c48b47b714d9821dc473304aa84', '男', '2016-08-05', '广东茂名', '13922035737', '0001', '审核通过');
INSERT INTO `teacher` VALUES ('2', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-05', '', '01234567891', '', '待审核');
INSERT INTO `teacher` VALUES ('3', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567892', '', '待审核');
INSERT INTO `teacher` VALUES ('4', '', '3a300c48b47b714d9821dc473304aa84', '', '2016-08-06', '', '01234567893', '', '待审核');
INSERT INTO `teacher` VALUES ('5', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567894', '', '待审核');
INSERT INTO `teacher` VALUES ('6', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567895', '', '待审核');
INSERT INTO `teacher` VALUES ('7', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567896', '', '待审核');
INSERT INTO `teacher` VALUES ('8', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567897', '', '待审核');
INSERT INTO `teacher` VALUES ('9', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-06', '', '01234567898', '', '待审核');
INSERT INTO `teacher` VALUES ('10', '', 'c4ca4238a0b923820dcc509a6f75849b', '', '2016-08-07', '', '01234567899', '', '待审核');
INSERT INTO `teacher` VALUES ('11', '', 'c81e728d9d4c2f636f067f89cc14862c', '', '2016-08-07', '', '1234567890', '', '待审核');

-- ----------------------------
-- Table structure for `work`
-- ----------------------------
DROP TABLE IF EXISTS `work`;
CREATE TABLE `work` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `sid` int(20) NOT NULL COMMENT '学生id',
  `workNo` int(5) NOT NULL COMMENT '作业号',
  `workUrl` varchar(255) NOT NULL COMMENT '作业的url',
  `status` enum('已提交，待审核','审核通过','审核不通过','') NOT NULL COMMENT '提交审核状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='作业表';

-- ----------------------------
-- Records of work
-- ----------------------------
