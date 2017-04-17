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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id`,`adminname`,`password`) values (1,'root','10470c3b4b1fed12c3baac014be15fac67c6e815'),(2,'管理员1','10470c3b4b1fed12c3baac014be15fac67c6e815'),(7,'管理员2','10470c3b4b1fed12c3baac014be15fac67c6e815'),(6,'管理员3','10470c3b4b1fed12c3baac014be15fac67c6e815'),(9,'管理员5','10470c3b4b1fed12c3baac014be15fac67c6e815'),(10,'管理员6','10470c3b4b1fed12c3baac014be15fac67c6e815');

/*Table structure for table `form1` */

DROP TABLE IF EXISTS `form1`;

CREATE TABLE `form1` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` mediumint(8) unsigned NOT NULL COMMENT '对应哪个任务',
  `school_id` smallint(5) unsigned NOT NULL COMMENT '学院id',
  `organization_name` varchar(25) NOT NULL COMMENT '组织名称',
  `build_date` varchar(25) NOT NULL COMMENT '成立时间',
  `num` smallint(5) unsigned NOT NULL COMMENT '注册志愿者人数',
  `text1` text NOT NULL COMMENT '主要服务内容（500）',
  `text2` text NOT NULL COMMENT '获奖情况',
  `text3` text NOT NULL COMMENT '主要事迹（1500）',
  `text4` text NOT NULL COMMENT '学院团委意见',
  `attachment_dir` varchar(200) DEFAULT NULL COMMENT '附件路径',
  `attachment_name` varchar(50) DEFAULT NULL COMMENT '附件名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `form1` */

insert  into `form1`(`id`,`task_id`,`school_id`,`organization_name`,`build_date`,`num`,`text1`,`text2`,`text3`,`text4`,`attachment_dir`,`attachment_name`) values (2,26,1,'wingstudio工作室','2004',45,'作者：nyzlbtbjf\n链接：https://www.zhihu.com/question/26682043/answer/156404511\n来源：知乎\n著作权归作者所有，转载请联系作者获得授权。\n\n最近很多朋友都在问，如何学习嵌入式，作为嵌入式的老鸟，我想我可以做一些唠叨，嵌入式的入门门槛稍微高一点，但是再高的城墙也是小砖头筑起来的，所以没有必要因为门槛高就觉得很困难，一步一个脚印，贵在坚持就可以了。 学习嵌入式，该学习什么基本的知识呢？ 首先C语言，这个是毋庸置疑的，不管是做嵌入式软件还是硬件开发的人员，对C语言的掌握这个是必需的，特别是对于以后致力于嵌入式软件开发的人，现在绝大部分都是用C语言，你说不掌握它可以吗？至于如何学习C语言，我想这些基础的知识每个人都有自己的方法，关键要去学习，看书也好，网上找些视频看也好。很多人会问，C语言要学到怎么样，我觉得这没有标准的答案。我想至少你在明白了一些基础的概念后，就该写代码了，动手才是最重要的，当你动手了，遇到问题了，再反过来学习，反过来查查课本，那时的收获就不是你死看书能得到的。 其次，应该对操作系统有所了解，这对你对硬件和软件的理解，绝对有很大的帮助。应该把系统的管理理解一下，比如进程、线程，系统如何来分配资源的，系统如何来管理硬件的，当然，不是看书就能把这些理解透，如果不是一时能理解，没关系，多看看，结合以后的项目经验，会有更好的理解的。','作者：nyzlbtbjf\n链接：https://www.zhihu.com/question/26682043/answer/156404511\n来源：知乎\n著作权归作者所有，转载请联系作者获得授权。\n\n最近很多朋友都在问，如何学习嵌入式，作为嵌入式的老鸟，我想我可以做一些唠叨，嵌入式的入门门槛稍微高一点，但是再高的城墙也是小砖头筑起来的，所以没有必要因为门槛高就觉得很困难，一步一个脚印，贵在坚持就可以了。 学习嵌入式，该学习什么基本的知识呢？ 首先C语言，这个是毋庸置疑的，不管是做嵌入式软件还是硬件开发的人员，对C语言的掌握这个是必需的，特别是对于以后致力于嵌入式软件开发的人，现在绝大部分都是用C语言，你说不掌握它可以吗？至于如何学习C语言，我想这些基础的知识每个人都有自己的方法，关键要去学习，看书也好，网上找些视频看也好。很多人会问，C语言要学到怎么样，我觉得这没有标准的答案。我想至少你在明白了一些基础的概念后，就该写代码了，动手才是最重要的，当你动手了，遇到问题了，再反过来学习，反过来查查课本，那时的收获就不是你死看书能得到的。 其次，应该对操作系统有所了解，这对你对硬件和软件的理解，绝对有很大的帮助。应该把系统的管理理解一下，比如进程、线程，系统如何来分配资源的，系统如何来管理硬件的，当然，不是看书就能把这些理解透，如果不是一时能理解，没关系，多看看，结合以后的项目经验，会有更好的理解的。','略作者：nyzlbtbjf\n链接：https://www.zhihu.com/question/26682043/answer/156404511\n来源：知乎\n著作权归作者所有，转载请联系作者获得授权。\n\n最近很多朋友都在问，如何学习嵌入式，作为嵌入式的老鸟，我想我可以做一些唠叨，嵌入式的入门门槛稍微高一点，但是再高的城墙也是小砖头筑起来的，所以没有必要因为门槛高就觉得很困难，一步一个脚印，贵在坚持就可以了。 学习嵌入式，该学习什么基本的知识呢？ 首先C语言，这个是毋庸置疑的，不管是做嵌入式软件还是硬件开发的人员，对C语言的掌握这个是必需的，特别是对于以后致力于嵌入式软件开发的人，现在绝大部分都是用C语言，你说不掌握它可以吗？至于如何学习C语言，我想这些基础的知识每个人都有自己的方法，关键要去学习，看书也好，网上找些视频看也好。很多人会问，C语言要学到怎么样，我觉得这没有标准的答案。我想至少你在明白了一些基础的概念后，就该写代码了，动手才是最重要的，当你动手了，遇到问题了，再反过来学习，反过来查查课本，那时的收获就不是你死看书能得到的。 其次，应该对操作系统有所了解，这对你对硬件和软件的理解，绝对有很大的帮助。应该把系统的管理理解一下，比如进程、线程，系统如何来分配资源的，系统如何来管理硬件的，当然，不是看书就能把这些理解透，如果不是一时能理解，没关系，多看看，结合以后的项目经验，会有更好的理解的。','作者：nyzlbtbjf\n链接：https://www.zhihu.com/question/26682043/answer/156404511\n来源：知乎\n著作权归作者所有，转载请联系作者获得授权。\n\n最近很多朋友都在问，如何学习嵌入式，作为嵌入式的老鸟，我想我可以做一些唠叨，嵌入式的入门门槛稍微高一点，但是再高的城墙也是小砖头筑起来的，所以没有必要因为门槛高就觉得很困难，一步一个脚印，贵在坚持就可以了。 学习嵌入式，该学习什么基本的知识呢？ 首先C语言，这个是毋庸置疑的，不管是做嵌入式软件还是硬件开发的人员，对C语言的掌握这个是必需的，特别是对于以后致力于嵌入式软件开发的人，现在绝大部分都是用C语言，你说不掌握它可以吗？至于如何学习C语言，我想这些基础的知识每个人都有自己的方法，关键要去学习，看书也好，网上找些视频看也好。很多人会问，C语言要学到怎么样，我觉得这没有标准的答案。我想至少你在明白了一些基础的概念后，就该写代码了，动手才是最重要的，当你动手了，遇到问题了，再反过来学习，反过来查查课本，那时的收获就不是你死看书能得到的。 其次，应该对操作系统有所了解，这对你对硬件和软件的理解，绝对有很大的帮助。应该把系统的管理理解一下，比如进程、线程，系统如何来分配资源的，系统如何来管理硬件的，当然，不是看书就能把这些理解透，如果不是一时能理解，没关系，多看看，结合以后的项目经验，会有更好的理解的。','schools/20170407\\ce133955f1a7d694263c3edd08e0e2a3.doc','1.2优秀志愿者队伍申报材料.doc'),(4,26,2,'理学院','理学院',23,'理学院',' 阿萨德','阿萨德',' 阿萨德','schools/20170407\\8d5c006f7693ec8c735ed421f48cda08.docx','2.2优秀志愿者项目活动申报材料.docx');

/*Table structure for table `form2` */

DROP TABLE IF EXISTS `form2`;

CREATE TABLE `form2` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` mediumint(8) unsigned NOT NULL COMMENT '哪个学院提交的任务',
  `task_id` mediumint(8) unsigned NOT NULL COMMENT '对应的哪个任务',
  `project_name` varchar(25) NOT NULL COMMENT '项目名称',
  `project_type` varchar(25) NOT NULL COMMENT '项目类型',
  `unit` varchar(25) NOT NULL COMMENT '申报单位',
  `contacts` varchar(25) NOT NULL COMMENT '联系人',
  `contact_tel` varchar(25) NOT NULL COMMENT '联系电话',
  `text1` text NOT NULL COMMENT '项目简介（1500）',
  `text2` text NOT NULL COMMENT '团委意见',
  `attachment_dir` varchar(200) DEFAULT NULL COMMENT '附件路径',
  `attachment_name` varchar(50) DEFAULT NULL COMMENT '附件名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `form2` */

insert  into `form2`(`id`,`school_id`,`task_id`,`project_name`,`project_type`,`unit`,`contacts`,`contact_tel`,`text1`,`text2`,`attachment_dir`,`attachment_name`) values (1,1,31,'信息工程学院 表单2','信息工程学院 表单2','信息工程学院 表单2','信息工程学院 表单2','1234124134','信息工程学院 表单2','信息工程学院 表单2','schools/20170407\\34f45291f048ccbd54c5b6b81a415504.docx','2.2优秀志愿者项目活动申报材料.docx'),(2,2,31,'理学院 表单二','理学院 表单二','理学院 表单二','理学院 表单二','123','理学院 表单二理学院 表单二','理学院 表单二','schools/20170407\\9493053d7bbff3dcf4b8a183533628fa.docx','2.2优秀志愿者项目活动申报材料.docx'),(3,1,31,'123','123','123','123','123','123','123',NULL,NULL);

/*Table structure for table `form3` */

DROP TABLE IF EXISTS `form3`;

CREATE TABLE `form3` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `school_id` mediumint(8) unsigned NOT NULL COMMENT '哪个学院提交的路径',
  `task_id` mediumint(9) NOT NULL COMMENT '对应哪个任务',
  `unit` varchar(25) NOT NULL COMMENT '单位',
  `secretary_name` varchar(20) NOT NULL COMMENT '书记姓名',
  `num1` smallint(6) NOT NULL COMMENT '团支部数',
  `num2` smallint(6) NOT NULL COMMENT '团员总数',
  `num3` smallint(6) NOT NULL COMMENT '年度推优入党人数',
  `text1` text NOT NULL COMMENT '获奖情况',
  `text2` text NOT NULL COMMENT '主要成就（2000字）',
  `text3` text NOT NULL COMMENT '学院党委意见',
  `attachment_dir` varchar(200) DEFAULT NULL COMMENT '附件路径',
  `attachment_name` varchar(50) DEFAULT NULL COMMENT '附件名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `form3` */

insert  into `form3`(`id`,`school_id`,`task_id`,`unit`,`secretary_name`,`num1`,`num2`,`num3`,`text1`,`text2`,`text3`,`attachment_dir`,`attachment_name`) values (1,1,33,'信息工程学院 表单三','123',123,123,123,'信息工程学院 表单三','信息工程学院 表单三','信息工程学院 表单三','schools/20170407\\e25bae755ed34053b4b8ffa0151dc177.doc','组织部--优秀分团委申报材料.doc'),(2,2,33,'理学院 表单三','理学院 表单三',123,123,123,'理学院 表单三理学院 表单三理学院 表单三','理学院 表单三','理学院 表单三','schools/20170407\\c61901f6422f4706fd36f2915adf2f4e.doc','组织部--优秀分团委申报材料.doc'),(3,1,33,'啊啊啊','啊啊啊',333,333,333,'啊啊啊','啊啊啊','啊啊啊',NULL,NULL);

/*Table structure for table `school` */

DROP TABLE IF EXISTS `school`;

CREATE TABLE `school` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `schoolname` varchar(25) NOT NULL COMMENT '学院用户名',
  `password` varchar(50) NOT NULL COMMENT '学院密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

/*Data for the table `school` */

insert  into `school`(`id`,`schoolname`,`password`) values (1,'信息工程学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(2,'理学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(3,'生命科学学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(4,'机电学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(5,'食品学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(6,'水利水电学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(7,'艺体学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(8,'动物科技学院','10470c3b4b1fed12c3baac014be15fac67c6e815'),(27,'动物医学院','10470c3b4b1fed12c3baac014be15fac67c6e815');

/*Table structure for table `table_data` */

DROP TABLE IF EXISTS `table_data`;

CREATE TABLE `table_data` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `table_data` text NOT NULL COMMENT '表格内容',
  `task_id` smallint(5) unsigned NOT NULL COMMENT '对应的任务id',
  `school_id` smallint(5) unsigned NOT NULL COMMENT '上交的学院的id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_data` */

insert  into `table_data`(`id`,`table_data`,`task_id`,`school_id`) values (4,'1<&>2<&>3<&>4<&>5<&>6<&>7<&>8<&>9<&>',1,1),(3,'1<&>2<&>3<&>4<&>5<&>6<&>7<&>8<&>9<&>',1,1),(6,'1<&>2<&>3<&>4<&>5<&>6<&>7<&>8<&>9<&>',1,1),(7,'任务1<&>任务1<&>任务1<&>任务1<&>任务1<&>任务1<&>任务1<&>任务1<&>任务1<&>',1,2),(8,'任务1<&>任务1<&>任务1<&>任务1<&>任务1<&>任务1<&>任务1<&>任务1<&>任务1<&>',1,2),(9,'1<&>2<&>3<&>4<&>5<&>',39,1),(22,'321<&>123<&>123<&>123123<&>123123<&>',39,1),(19,'1<&>2<&>3<&>',2,1),(20,'1<&>2<&>3<&>',2,1),(21,'1<&>2<&>3<&>',2,1);

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
  `attachment_dir` varchar(200) DEFAULT NULL COMMENT '附件模版路径',
  `attachment_name` varchar(50) DEFAULT NULL COMMENT '附件文件名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

/*Data for the table `task` */

insert  into `task`(`id`,`taskname`,`tasktext`,`date`,`start_date`,`end_date`,`form_moudle`,`table_moudle`,`attachment_dir`,`attachment_name`) values (1,'任务1','这个任务1，要求提交一个自定义表格','2017-03-31','2017-03-31','2017-04-30',NULL,'姓名<&>学院<&>班级<&>平均成绩<&>补考、重修人次<&>同年级同专业补考、重修平均人次<&>违规违纪情况<&>支部所获荣誉<&>备注<&>',NULL,NULL),(2,'任务2','任务2','2017-04-03','2017-04-04','2017-04-30',NULL,'姓名<&>学号<&>专业<&>',NULL,NULL),(31,'任务5','任务5 使用表单二  有附件','2017-04-04','2017-04-04','2017-04-30',2,NULL,'admin/20170404\\689de6fb1c389bb2f5cc127f1fef8aab.doc','1.2优秀志愿者队伍申报材料.doc'),(26,'任务3','任务3 使用表单一 没有附件','2017-04-03','2017-04-04','2017-04-19',1,NULL,NULL,NULL),(27,'任务4','任务4 使用表单1 附件是组织部--优秀分团委申报材料','2017-04-03','2017-04-02','2017-04-30',1,NULL,'admin/20170403\\d64933249445882ce83d7f2a87f02cc2.doc','组织部--优秀分团委申报材料.doc'),(33,'任务6','任务6 ，使用表单3， 附件是各学院课表.rar','2017-04-04','2017-04-04','2017-04-23',3,NULL,'admin/20170406\\be64653b12e5d3a0a77550189a75e5c0.rar','各学院课表.rar'),(39,'表格任务','表格任务_有五项','2017-04-10','2017-04-02','2017-04-30',NULL,'第一项<&>第二项<&>第三项<&>第四项<&>第五项<&>',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
