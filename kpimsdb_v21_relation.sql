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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_beh_competency` */

insert  into `kpi_beh_competency`(`id`,`competency`,`description`) values (1,'Integrity','Challenges any system\r\nthat encourages\r\ndishonesty or rewards\r\nunethical behavior\r\n(Credibility) (Fairness)'),(2,'Result Oriented','Approaches the work in\r\nan orderly manner\r\n(We reach for\r\ngreatness)\r\n(We play to win)'),(3,'Customer Focused','Strives to exceed\r\ncustomer expectations\r\n(Define our success\r\nthrough our customers)'),(4,'Developing self & others','Takes advantages of development opportunities only when they are presented to him/her\r\n(We invest in our people)\r\n'),(5,'Working together','Willingly participates in a team setting opportunities only when they are presented to him/her\r\n(We work together / Team work) (Respect)\r\n'),(6,'Innovation','Open to change and saccepts new ways of doing things\r\n(Focus on continues improvement) \r\n'),(7,'Flexibility','Responds effectively to changing circumstances (Pride)');

/*Table structure for table `kpi_employee_beh_competency` */

DROP TABLE IF EXISTS `kpi_employee_beh_competency`;

CREATE TABLE `kpi_employee_beh_competency` (
  `PAFID` int(5) NOT NULL,
  `beh_competency_id` int(5) NOT NULL,
  `employee_rating` varchar(10) DEFAULT NULL,
  `manager_rating` int(10) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `review_user_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`PAFID`,`beh_competency_id`),
  KEY `FK_kpi_employee_beh_competency_competen` (`beh_competency_id`),
  CONSTRAINT `FK_kpi_employee_beh_competency_paf` FOREIGN KEY (`PAFID`) REFERENCES `kpi_performance_appraisal` (`PAFID`),
  CONSTRAINT `FK_kpi_employee_beh_competency_competen` FOREIGN KEY (`beh_competency_id`) REFERENCES `kpi_beh_competency` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_employee_beh_competency` */

/*Table structure for table `kpi_goal_employee` */

DROP TABLE IF EXISTS `kpi_goal_employee`;

CREATE TABLE `kpi_goal_employee` (
  `PAFID` int(5) NOT NULL,
  `goal_objective_id` int(5) NOT NULL,
  `employee_id` int(5) NOT NULL,
  `date_created` varchar(50) DEFAULT NULL,
  `mid_year_comment_employee` varchar(100) DEFAULT NULL,
  `mid_year_comment_manager` varchar(100) DEFAULT NULL,
  `annual_comment_employee` varchar(100) DEFAULT NULL,
  `annual_comment_manager` varchar(100) DEFAULT NULL,
  `manager_rating` int(3) DEFAULT NULL,
  PRIMARY KEY (`PAFID`,`goal_objective_id`,`employee_id`),
  KEY `FK_kpi_goal_employee_objective` (`goal_objective_id`),
  KEY `FK_kpi_goal_employee_user` (`employee_id`),
  CONSTRAINT `FK_kpi_goal_employee_paf` FOREIGN KEY (`PAFID`) REFERENCES `kpi_performance_appraisal` (`PAFID`),
  CONSTRAINT `FK_kpi_goal_employee_objective` FOREIGN KEY (`goal_objective_id`) REFERENCES `kpi_goal_objective` (`id`),
  CONSTRAINT `FK_kpi_goal_employee_user` FOREIGN KEY (`employee_id`) REFERENCES `kpi_user` (`id`)
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
  PRIMARY KEY (`id`),
  KEY `FK_kpi_goal_objective_ratio` (`goal_ratio_id`),
  CONSTRAINT `FK_kpi_goal_objective_ratio` FOREIGN KEY (`goal_ratio_id`) REFERENCES `kpi_goal_ratio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_goal_objective` */

insert  into `kpi_goal_objective`(`id`,`user_role`,`goal_ratio_id`,`objective`,`point`,`unit`,`measurement`) values (1,'JENGINEER',1,NULL,25,'%',NULL),(2,'JENGINEER',2,NULL,30,'%',NULL),(3,'JENGINEER',3,NULL,40,'%',NULL),(4,'JENGINEER',4,NULL,5,'%',NULL),(5,'SMANAGER',1,NULL,15,'%',NULL),(6,'SMANAGER',2,NULL,30,'%',NULL),(7,'SMANAGER',3,NULL,40,'%',NULL),(8,'SMANAGER',4,NULL,15,'%',NULL),(9,'TEAMLEAD',1,NULL,15,'%',NULL),(10,'TEAMLEAD',2,NULL,30,'%',NULL),(11,'TEAMLEAD',3,NULL,40,'%',NULL),(12,'TEAMLEAD',4,NULL,15,'%',NULL),(13,'ENGINEER',1,NULL,25,'%',NULL),(14,'ENGINEER',2,NULL,30,'%',NULL),(15,'ENGINEER',3,NULL,40,'%',NULL),(16,'ENGINEER',4,NULL,5,'%',NULL);

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
  PRIMARY KEY (`id`),
  KEY `FK_kpi_overall_rating_overall` (`PAFID`),
  CONSTRAINT `FK_kpi_overall_rating_overall` FOREIGN KEY (`PAFID`) REFERENCES `kpi_performance_appraisal` (`PAFID`)
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
  `review_user_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`PAFID`),
  KEY `FK_kpi_performance_appraisal_user` (`user_id`),
  CONSTRAINT `FK_kpi_performance_appraisal_user` FOREIGN KEY (`user_id`) REFERENCES `kpi_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_performance_appraisal` */

/*Table structure for table `kpi_skill` */

DROP TABLE IF EXISTS `kpi_skill`;

CREATE TABLE `kpi_skill` (
  `skill_id` int(5) NOT NULL AUTO_INCREMENT,
  `skill_category_id` int(5) DEFAULT NULL,
  `skill_description` varchar(20) DEFAULT NULL,
  `note_html` varchar(250) DEFAULT NULL,
  `note_css` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`skill_id`),
  KEY `FK_kpi_skill` (`skill_category_id`),
  CONSTRAINT `FK_kpi_skill` FOREIGN KEY (`skill_category_id`) REFERENCES `kpi_skill_category` (`skill_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill` */

insert  into `kpi_skill`(`skill_id`,`skill_category_id`,`skill_description`,`note_html`,`note_css`) values (1,1,'Networking','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(2,1,'Windows Server','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(3,1,'AD AAD','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(4,1,'Exchange','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(5,1,'Office 365','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(6,1,'Azure Bakup DPM','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(7,1,'zure VM Hyper-V','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(8,2,'EMS',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(9,2,'MDOP',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(10,2,'DLP AIP',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(11,2,'Win10 Ent',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(12,2,'Cloud App Security',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(13,2,'Intune',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(14,3,'OMS',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(15,3,'SCCM',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(16,3,'SCOM',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(17,4,'Azure Site Recovery ',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(18,4,'Vnet/VPN/NSG/WAF',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(19,4,'Automation',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(20,4,'Azure EA Portal',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(21,5,'Sophos Security',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(22,5,'Sophos Firewall',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(23,5,'CheckPoint Firewall',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(24,6,'Azure Data Services',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(25,6,'SharePoint Administr',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(26,7,'VPC',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(27,7,'EC2',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(28,7,'EBS/S3',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL);

/*Table structure for table `kpi_skill_category` */

DROP TABLE IF EXISTS `kpi_skill_category`;

CREATE TABLE `kpi_skill_category` (
  `skill_category_id` int(5) NOT NULL AUTO_INCREMENT,
  `skill_category_description` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`skill_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill_category` */

insert  into `kpi_skill_category`(`skill_category_id`,`skill_category_description`) values (1,'Core Skills'),(2,'Microsoft 365'),(3,'System Center'),(4,'Azure Solutions'),(5,'Security'),(6,'Data SharePoint'),(7,'AWS Cloud');

/*Table structure for table `kpi_skill_copy` */

DROP TABLE IF EXISTS `kpi_skill_copy`;

CREATE TABLE `kpi_skill_copy` (
  `skill_id` int(5) NOT NULL DEFAULT '0',
  `skill_category_id` int(5) DEFAULT NULL,
  `skill_description` varchar(20) DEFAULT NULL,
  `note_html` varchar(250) DEFAULT NULL,
  `note_css` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill_copy` */

insert  into `kpi_skill_copy`(`skill_id`,`skill_category_id`,`skill_description`,`note_html`,`note_css`) values (1,1,'Networking','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(2,1,'Windows Server','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(3,1,'AD AAD','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(4,1,'Exchange','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(5,1,'Office 365','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(6,1,'Azure Bakup DPM','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(7,1,'zure VM Hyper-V','required=\"\"  pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\" ','class=\"mando-field\"'),(8,2,'EMS',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(9,2,'MDOP',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(10,2,'DLP AIP',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(11,2,'Win10 Ent',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(12,2,'Cloud App Security',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(13,2,'Intune',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(14,3,'OMS',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(15,3,'SCCM',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(16,3,'SCOM',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(17,4,'Azure Site Recovery ',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(18,4,'Vnet/VPN/NSG/WAF',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(19,4,'Automation',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(20,4,'Azure EA Portal',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(21,5,'Sophos Security',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(22,5,'Sophos Firewall',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(23,5,'CheckPoint Firewall',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(24,6,'Azure Data Services',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(25,6,'SharePoint Administr',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(26,7,'VPC',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(27,7,'EC2',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL),(28,7,'EBS/S3',' pattern=\"^(100)|(200)|(300)|(400)|(500)$\" title=\"values should be 100,200,300,400 or 500\"',NULL);

/*Table structure for table `kpi_skill_level` */

DROP TABLE IF EXISTS `kpi_skill_level`;

CREATE TABLE `kpi_skill_level` (
  `expert_level` int(5) NOT NULL AUTO_INCREMENT,
  `lable` varchar(20) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`expert_level`)
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill_level` */

insert  into `kpi_skill_level`(`expert_level`,`lable`,`description`) values (100,'L1-Frontline','Should have the knowledge to provide a simple solution, may escalate to colleagues & senior team'),(200,'L2-Frontline','Should have the knowledge to provide a solution, may escalate to colleagues & senior team'),(300,'Basic','Should have the knowledge to provide a complete solution, may escalation to colleagues & senior team'),(400,'Experienced','Should have the knowledge to provide a sophisticated complete solution without escalation to colleagues & senior team'),(500,'Advanced\r\n','The ideal expertise level, which recognizes as the best person in the area');

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
  KEY `FK_kpi_skill_matrix_level` (`score`),
  KEY `FK_kpi_skill_matrix_user` (`employee_id`),
  CONSTRAINT `FK_kpi_skill_matrix_user` FOREIGN KEY (`employee_id`) REFERENCES `kpi_user` (`id`),
  CONSTRAINT `FK_kpi_skill_matrix` FOREIGN KEY (`skill_id`) REFERENCES `kpi_skill` (`skill_id`),
  CONSTRAINT `FK_kpi_skill_matrix_level` FOREIGN KEY (`score`) REFERENCES `kpi_skill_level` (`expert_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill_matrix` */

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
  `job_title` varchar(250) DEFAULT NULL,
  `date_of_appointment` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kpi_user_role` (`user_role`),
  CONSTRAINT `FK_kpi_user_role` FOREIGN KEY (`user_role`) REFERENCES `kpi_user_role` (`user_role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `kpi_user` */

insert  into `kpi_user`(`id`,`first_name`,`last_name`,`empno`,`nic`,`pword`,`user_role`,`status_code`,`user_created`,`date_created`,`user_updated`,`date_updated`,`job_title`,`date_of_appointment`) values (1,'Admin','Fernando','1343','863512542V','3fb581dd5ff53aed5c5773123a42c0c5b830631c','PM','ACTIVE',1,'2018-10-27 07:35:42',0,NULL,NULL,NULL),(2,'Kumara','Fernando','13434','863512552V','3fb581dd5ff53aed5c5773123a42c0c5b830631c','ENGINEER','ACTIVE',1,'2018-10-27 08:08:58',0,NULL,NULL,NULL),(3,'Samatha','Perera','1122','863512552V','3fb581dd5ff53aed5c5773123a42c0c5b830631c','JENGINEER','ACTIVE',1,'2018-10-27 08:08:58',0,NULL,'Graduate Trainee','04-04-2005'),(4,'Gyan','Perice','1123','863512552V','3fb581dd5ff53aed5c5773123a42c0c5b830631c','SMANAGER','ACTIVE',1,'2018-10-27 08:08:58',0,NULL,NULL,NULL),(5,'Priyanta','Vidana','1266','863512552V','3fb581dd5ff53aed5c5773123a42c0c5b830631c','HIT','ACTIVE',1,'2018-10-27 08:08:58',0,NULL,NULL,NULL),(6,'kumara g','welcgg','115522','863512524v','3fb581dd5ff53aed5c5773123a42c0c5b830631c','ENGINEER','ACTIVE',1,'2018-11-13 16:40:08',0,NULL,NULL,NULL),(7,'kumara g','welcgg','115533','863512556v','3fb581dd5ff53aed5c5773123a42c0c5b830631c','TEAMLEAD','ACTIVE',1,'2018-11-13 16:40:08',0,NULL,NULL,NULL);

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
  `skill_id` int(5) DEFAULT NULL COMMENT 'requesting skill por the person',
  PRIMARY KEY (`id`),
  KEY `FK_kpi_week_plan_user` (`user_created`),
  KEY `FK_kpi_week_plan_user_plan` (`assign_to`),
  CONSTRAINT `FK_kpi_week_plan_user_plan` FOREIGN KEY (`assign_to`) REFERENCES `kpi_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_week_plan` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_week_plan_actual` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
