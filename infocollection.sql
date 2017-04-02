/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.14 : Database - infocollection
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`infocollection` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `infocollection`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `adminname` varchar(25) NOT NULL COMMENT '管理员帐号',
  `password` varchar(50) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id`,`adminname`,`password`) values (1,'root','10470c3b4b1fed12c3baac014be15fac67c6e815'),(2,'管理员1','10470c3b4b1fed12c3baac014be15fac67c6e815'),(7,'管理员2','10470c3b4b1fed12c3baac014be15fac67c6e815'),(6,'管理员3','10470c3b4b1fed12c3baac014be15fac67c6e815'),(9,'管理员5','10470c3b4b1fed12c3baac014be15fac67c6e815');

/*Table structure for table `form1` */

DROP TABLE IF EXISTS `form1`;

CREATE TABLE `form1` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(25) NOT NULL COMMENT '单位',
  `secretary_name` varchar(20) NOT NULL COMMENT '书记姓名',
  `num1` smallint(6) NOT NULL COMMENT '团支部数',
  `num2` smallint(6) NOT NULL COMMENT '团员总数',
  `num3` smallint(6) NOT NULL COMMENT '年度推优入党人数',
  `text1` text NOT NULL COMMENT '获奖情况',
  `text2` text NOT NULL COMMENT '主要成就（2000字）',
  `text3` text NOT NULL COMMENT '学院党委意见',
  `attachment` varchar(50) DEFAULT NULL COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `form1` */

/*Table structure for table `form2` */

DROP TABLE IF EXISTS `form2`;

CREATE TABLE `form2` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `organization_name` varchar(25) NOT NULL COMMENT '组织名称',
  `build_date` varchar(25) NOT NULL COMMENT '成立时间',
  `num` smallint(5) unsigned NOT NULL COMMENT '注册志愿者人数',
  `text1` text NOT NULL COMMENT '主要服务内容（500）',
  `text2` text NOT NULL COMMENT '获奖情况',
  `text3` text NOT NULL COMMENT '主要事迹（1500）',
  `text4` text NOT NULL COMMENT '学院团委意见',
  `attachment` varchar(50) DEFAULT NULL COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `form2` */

/*Table structure for table `form3` */

DROP TABLE IF EXISTS `form3`;

CREATE TABLE `form3` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(25) NOT NULL COMMENT '项目名称',
  `project_type` varchar(25) NOT NULL COMMENT '项目类型',
  `unit` varchar(25) NOT NULL COMMENT '申报单位',
  `contacts` varchar(25) NOT NULL COMMENT '联系人',
  `contact_tel` varchar(25) NOT NULL COMMENT '联系电话',
  `text1` text NOT NULL COMMENT '项目简介（1500）',
  `text2` text NOT NULL COMMENT '团委意见',
  `attachment` varchar(50) DEFAULT NULL COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `form3` */

/*Table structure for table `school` */

DROP TABLE IF EXISTS `school`;

CREATE TABLE `school` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `schoolname` varchar(25) NOT NULL COMMENT '学院用户名',
  `password` varchar(50) NOT NULL COMMENT '学院密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

/*Data for the table `school` */

insert  into `school`(`id`,`schoolname`,`password`) values (1,'信息工程学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(2,'理学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(3,'生命科学学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(4,'机电学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(5,'食品学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(6,'水利水电学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(7,'艺体学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(8,'动物科技学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(27,'动物医学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(28,'园艺学院','10470c3b4b1fed12c3baac014be15fac67c6e815');

/*Table structure for table `table_data` */

DROP TABLE IF EXISTS `table_data`;

CREATE TABLE `table_data` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `data` text NOT NULL COMMENT '表格内容',
  `table_id` smallint(5) unsigned DEFAULT NULL COMMENT '对应的表格模版的id（空的话就是表格）',
  `task_id` smallint(5) unsigned NOT NULL COMMENT '对应的任务id',
  `school_id` smallint(5) unsigned NOT NULL COMMENT '上交的学院的id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_data` */

/*Table structure for table `task` */

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '任务id',
  `taskname` varchar(25) NOT NULL COMMENT '任务题目',
  `tasktext` text COMMENT '任务描述',
  `date` date NOT NULL COMMENT '任务发布日期',
  `start_date` date NOT NULL COMMENT '任务起始日期',
  `end_date` date NOT NULL COMMENT '任务截止日期',
  `form_moudle` tinyint(3) unsigned DEFAULT NULL COMMENT '表单编号（为空则是表格）',
  `table_moudle` text COMMENT '表格格式（为空则是使用表单）',
  `attachment` varchar(50) DEFAULT NULL COMMENT '附件模版路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `task` */

insert  into `task`(`id`,`taskname`,`tasktext`,`date`,`start_date`,`end_date`,`form_moudle`,`table_moudle`,`attachment`) values (1,'任务1','这个任务1，要求提交一个自定义表格','2017-03-31','2017-03-31','2017-04-30',NULL,'校区<&>学院<&>班级<&>平均成绩<&>补考、重修人次<&>同年级同专业补考、重修平均人次<&>违规违纪情况<&>支部所获荣誉<&>备注',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
