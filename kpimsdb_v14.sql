/*
SQLyog Ultimate v8.55 
MySQL - 5.5.54 : Database - kpimsdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kpimsdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kpimsdb`;

/*Table structure for table `kpi_beh_competency` */

DROP TABLE IF EXISTS `kpi_beh_competency`;

CREATE TABLE `kpi_beh_competency` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `competency` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_beh_competency` */

insert  into `kpi_beh_competency`(`id`,`competency`,`description`) values (1,'Integrity','Challenges any system\r\nthat encourages\r\ndishonesty or rewards\r\nunethical behavior\r\n(Credibility) (Fairness)'),(2,'Result Oriented','Approaches the work in\r\nan orderly manner\r\n(We reach for\r\ngreatness)\r\n(We play to win)'),(3,'Customer Focused','Strives to exceed\r\ncustomer expectations\r\n(Define our success\r\nthrough our customers)');

/*Table structure for table `kpi_employee_beh_competency` */

DROP TABLE IF EXISTS `kpi_employee_beh_competency`;

CREATE TABLE `kpi_employee_beh_competency` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `PAFID` int(5) DEFAULT NULL,
  `beh_competency_id` int(5) DEFAULT NULL,
  `employee_rating` int(10) DEFAULT NULL,
  `manager_rating` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_employee_beh_competency` */

/*Table structure for table `kpi_goal_employee` */

DROP TABLE IF EXISTS `kpi_goal_employee`;

CREATE TABLE `kpi_goal_employee` (
  `PAFID` int(5) NOT NULL AUTO_INCREMENT,
  `goal_objective_id` int(5) DEFAULT NULL,
  `employee_id` int(5) DEFAULT NULL,
  `date_created` varchar(50) DEFAULT NULL,
  `mid_year_comment_employee` varchar(100) DEFAULT NULL,
  `mid_year_comment_manager` varchar(100) NOT NULL,
  `annual_comment_employee` varchar(100) DEFAULT NULL,
  `annual_comment_manager` varchar(100) DEFAULT NULL,
  `manager_rating` int(3) DEFAULT NULL,
  PRIMARY KEY (`PAFID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_goal_employee` */

/*Table structure for table `kpi_goal_objective` */

DROP TABLE IF EXISTS `kpi_goal_objective`;

CREATE TABLE `kpi_goal_objective` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(20) DEFAULT NULL,
  `goal_ratio_id` int(5) DEFAULT NULL,
  `objective` varchar(50) DEFAULT NULL,
  `point` int(5) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `measurement` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_goal_objective` */

insert  into `kpi_goal_objective`(`id`,`user_role`,`goal_ratio_id`,`objective`,`point`,`unit`,`measurement`) values (1,'JENGINEER',1,NULL,25,'%',NULL),(2,'JENGINEER',2,NULL,30,'%',NULL),(3,'JENGINEER',3,NULL,40,'%',NULL),(4,'JENGINEER',4,NULL,5,'%',NULL);

/*Table structure for table `kpi_goal_ratio` */

DROP TABLE IF EXISTS `kpi_goal_ratio`;

CREATE TABLE `kpi_goal_ratio` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `goal_ratio` varchar(20) DEFAULT NULL,
  `precentage` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_goal_ratio` */

insert  into `kpi_goal_ratio`(`id`,`goal_ratio`,`precentage`) values (1,'Technical Competency',NULL),(2,'Customer Engagement',NULL),(3,'Project Management',NULL),(4,'Revenue Generation',NULL);

/*Table structure for table `kpi_overall_rating` */

DROP TABLE IF EXISTS `kpi_overall_rating`;

CREATE TABLE `kpi_overall_rating` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `PAFID` int(5) DEFAULT NULL,
  `performance_rating` varchar(20) DEFAULT NULL,
  `behavioural_rating` varchar(20) DEFAULT NULL,
  `employee_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_overall_rating` */

/*Table structure for table `kpi_performance_appraisal` */

DROP TABLE IF EXISTS `kpi_performance_appraisal`;

CREATE TABLE `kpi_performance_appraisal` (
  `PAFID` int(5) NOT NULL AUTO_INCREMENT,
  `month_year` varchar(20) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_code` varchar(20) DEFAULT NULL,
  `objective_setting_comment` varchar(50) DEFAULT NULL,
  `mid_year_review_comment` varchar(50) DEFAULT NULL,
  `annual_review_comment` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PAFID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_performance_appraisal` */

insert  into `kpi_performance_appraisal`(`PAFID`,`month_year`,`user_id`,`date_created`,`status_code`,`objective_setting_comment`,`mid_year_review_comment`,`annual_review_comment`) values (1,NULL,3,'2018-11-12 22:56:52','ACTIVE',NULL,NULL,NULL),(2,'2018-11',3,'2018-11-12 22:57:33','ACTIVE',NULL,NULL,NULL),(3,'2018-11',3,'2018-11-12 22:57:58','ACTIVE',NULL,NULL,NULL),(4,'2018-11',3,'2018-11-12 22:58:34','ACTIVE',NULL,NULL,NULL);

/*Table structure for table `kpi_skill` */

DROP TABLE IF EXISTS `kpi_skill`;

CREATE TABLE `kpi_skill` (
  `skill_id` int(5) NOT NULL AUTO_INCREMENT,
  `skill_category_id` int(5) DEFAULT NULL,
  `skill_description` varchar(20) DEFAULT NULL,
  `note_html` varchar(100) DEFAULT NULL,
  `note_css` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`skill_id`),
  KEY `FK_kpi_skill` (`skill_category_id`),
  CONSTRAINT `FK_kpi_skill` FOREIGN KEY (`skill_category_id`) REFERENCES `kpi_skill_category` (`skill_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill` */

insert  into `kpi_skill`(`skill_id`,`skill_category_id`,`skill_description`,`note_html`,`note_css`) values (1,1,'Networking','required=\"\" ','class=\"mando-field\"'),(2,1,'Windows Server','required=\"\" ','class=\"mando-field\"'),(3,1,'AD AAD','required=\"\" ','class=\"mando-field\"'),(4,1,'Exchange','required=\"\" ','class=\"mando-field\"'),(5,1,'Office 365','required=\"\" ','class=\"mando-field\"'),(6,1,'Azure Bakup DPM','required=\"\" ','class=\"mando-field\"'),(7,1,'zure VM Hyper-V','required=\"\" ','class=\"mando-field\"'),(8,2,'EMS',NULL,NULL),(9,2,'MDOP',NULL,NULL),(10,2,'DLP AIP',NULL,NULL),(11,2,'Win10 Ent',NULL,NULL),(12,2,'Cloud App Security',NULL,NULL),(13,2,'Intune',NULL,NULL);

/*Table structure for table `kpi_skill_category` */

DROP TABLE IF EXISTS `kpi_skill_category`;

CREATE TABLE `kpi_skill_category` (
  `skill_category_id` int(5) NOT NULL AUTO_INCREMENT,
  `skill_category_description` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`skill_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill_category` */

insert  into `kpi_skill_category`(`skill_category_id`,`skill_category_description`) values (1,'Core Skills'),(2,'Microsoft 365');

/*Table structure for table `kpi_skill_level` */

DROP TABLE IF EXISTS `kpi_skill_level`;

CREATE TABLE `kpi_skill_level` (
  `expert_level` int(5) NOT NULL AUTO_INCREMENT,
  `lable` varchar(20) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`expert_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill_level` */

/*Table structure for table `kpi_skill_matrix` */

DROP TABLE IF EXISTS `kpi_skill_matrix`;

CREATE TABLE `kpi_skill_matrix` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `month_year` varchar(20) DEFAULT NULL,
  `skill_id` int(5) DEFAULT NULL,
  `score` int(5) DEFAULT NULL,
  `employee_id` int(5) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_code` varchar(20) DEFAULT 'ACTIVE' COMMENT 'ACTIVE|REVIEW',
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`month_year`,`skill_id`,`employee_id`),
  KEY `FK_kpi_skill_matrix` (`skill_id`),
  CONSTRAINT `FK_kpi_skill_matrix` FOREIGN KEY (`skill_id`) REFERENCES `kpi_skill` (`skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill_matrix` */

insert  into `kpi_skill_matrix`(`id`,`month_year`,`skill_id`,`score`,`employee_id`,`date_created`,`status_code`) values (4,'2018-11',4,40,3,'2018-11-12 16:33:55','ACTIVE'),(5,'2018-11',5,50,3,'2018-11-12 16:33:55','ACTIVE'),(6,'2018-11',6,60,3,'2018-11-12 16:33:55','ACTIVE'),(7,'2018-11',7,70,3,'2018-11-12 16:33:55','ACTIVE'),(8,'2018-12',1,1,3,'2018-11-12 16:35:54','ACTIVE'),(9,'2018-12',2,2,3,'2018-11-12 16:35:54','ACTIVE'),(10,'2018-12',3,2,3,'2018-11-12 16:35:54','ACTIVE'),(11,'2018-12',4,3,3,'2018-11-12 16:35:54','ACTIVE'),(12,'2018-12',5,5,3,'2018-11-12 16:35:54','ACTIVE'),(13,'2018-12',6,6,3,'2018-11-12 16:35:54','ACTIVE'),(14,'2018-12',7,4,3,'2018-11-12 16:35:54','ACTIVE'),(15,'2018-12',8,5,3,'2018-11-12 16:35:54','ACTIVE');

/*Table structure for table `kpi_user` */

DROP TABLE IF EXISTS `kpi_user`;

CREATE TABLE `kpi_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `empno` varchar(50) DEFAULT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `pword` text,
  `user_role` varchar(20) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT NULL,
  `user_created` int(5) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated` int(5) DEFAULT '0',
  `date_updated` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_user` */

insert  into `kpi_user`(`id`,`first_name`,`last_name`,`empno`,`nic`,`pword`,`user_role`,`status_code`,`user_created`,`date_created`,`user_updated`,`date_updated`) values (1,'Admin','Fernando','1343','863512542V','1343','PM','ACTIVE',1,'2018-10-27 07:35:42',0,NULL),(2,'Kumara','Fernando','13434','863512552V','13434','ENGINEER','ACTIVE',1,'2018-10-27 08:08:58',0,NULL),(3,'Samatha','Perera','1122','863512552V','1122','JENGINEER','ACTIVE',1,'2018-10-27 08:08:58',0,NULL),(4,'Gyan','Perice','1123','863512552V','1123','SMANAGER','ACTIVE',1,'2018-10-27 08:08:58',0,NULL),(5,'Priyanta','Vidana','1266','863512552V','1266','HIT','ACTIVE',1,'2018-10-27 08:08:58',0,NULL);

/*Table structure for table `kpi_user_role` */

DROP TABLE IF EXISTS `kpi_user_role`;

CREATE TABLE `kpi_user_role` (
  `user_role` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `access_level` int(5) DEFAULT NULL,
  PRIMARY KEY (`user_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_user_role` */

insert  into `kpi_user_role`(`user_role`,`description`,`access_level`) values ('ENGINEER','Engineer',2),('HIT','Head Of IT',6),('JENGINEER','junior Engineer',1),('PM','Project Manager',5),('SMANAGER','Senior Manager',4),('TEAMLEAD','Team Lead Senior Engineer',3);

/*Table structure for table `kpi_week_plan` */

DROP TABLE IF EXISTS `kpi_week_plan`;

CREATE TABLE `kpi_week_plan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `plan_date` varchar(20) DEFAULT NULL,
  `task` varchar(100) DEFAULT NULL,
  `estimated_duration` varchar(50) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT NULL,
  `assign_to` int(5) DEFAULT '0',
  `user_created` int(5) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `review_user` int(5) DEFAULT '0',
  `review_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kpi_week_plan_user` (`user_created`),
  CONSTRAINT `FK_kpi_week_plan_user` FOREIGN KEY (`user_created`) REFERENCES `kpi_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_week_plan` */

insert  into `kpi_week_plan`(`id`,`plan_date`,`task`,`estimated_duration`,`remark`,`status_code`,`assign_to`,`user_created`,`date_created`,`review_user`,`review_date`) values (1,'2018-10-27','sample task','5','sample remark','ACTIVE',0,1,'2018-10-27 12:26:37',0,NULL),(5,'2018-10-27','sample task','23:21 16:54','sample remark ','DEACTIVE',0,3,'2018-10-27 12:33:52',0,NULL),(6,'2018-10-27','sample task','23:21 16:54','sample remark ','ACTIVE',0,3,'2018-10-27 12:38:35',0,NULL),(7,'2018-10-25','ssss','04:54 TO 04:54','sadasd','ACTIVE',3,4,'2018-10-31 21:30:44',0,NULL),(8,'2018-11-08','sample','12:01 TO 15:04','sample remark','REVIEW',3,4,'2018-11-07 14:44:24',1,'2018-11-08 11:19:31am'),(9,'2018-11-18','sample','23:04 TO 04:04','Remark sample','ACTIVE',3,3,'2018-11-12 12:10:48',0,NULL);

/*Table structure for table `kpi_week_plan_actual` */

DROP TABLE IF EXISTS `kpi_week_plan_actual`;

CREATE TABLE `kpi_week_plan_actual` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `plan_id` int(5) DEFAULT NULL,
  `actual` varchar(100) DEFAULT NULL,
  `actual_duration` varchar(50) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `user_created` int(5) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `review_user` int(5) DEFAULT '0',
  `review_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `NewIndex1` (`plan_id`),
  CONSTRAINT `FK_kpi_week_plan_actual` FOREIGN KEY (`plan_id`) REFERENCES `kpi_week_plan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_week_plan_actual` */

insert  into `kpi_week_plan_actual`(`id`,`plan_id`,`actual`,`actual_duration`,`remark`,`status_code`,`category`,`user_created`,`date_created`,`review_user`,`review_date`) values (1,8,'asdasdsad','04:45 TO 04:54','4545454sdsd','REVIEW','PAYBAL',3,'2018-11-07 15:18:39',1,'2018-11-08 11:19:31am');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
