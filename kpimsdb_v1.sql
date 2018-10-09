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
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_beh_competency` */

/*Table structure for table `kpi_employee_beh_competency` */

DROP TABLE IF EXISTS `kpi_employee_beh_competency`;

CREATE TABLE `kpi_employee_beh_competency` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ANR_ID` int(5) DEFAULT NULL,
  `beh_competency_id` int(5) DEFAULT NULL,
  `employee_rating` int(10) DEFAULT NULL,
  `manager_rating` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_employee_beh_competency` */

/*Table structure for table `kpi_employee_skill` */

DROP TABLE IF EXISTS `kpi_employee_skill`;

CREATE TABLE `kpi_employee_skill` (
  `employee_id` int(5) NOT NULL AUTO_INCREMENT,
  `skill_id` int(5) DEFAULT NULL,
  `user_created` int(5) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_employee_skill` */

/*Table structure for table `kpi_goal_employee` */

DROP TABLE IF EXISTS `kpi_goal_employee`;

CREATE TABLE `kpi_goal_employee` (
  `ANR_ID` int(5) NOT NULL AUTO_INCREMENT,
  `goal_objective_id` int(5) DEFAULT NULL,
  `employee_id` int(5) DEFAULT NULL,
  `date_created` varchar(50) DEFAULT NULL,
  `mid_year_comment_employee` varchar(100) DEFAULT NULL,
  `mid_year_comment_manager` varchar(100) NOT NULL,
  `annual_comment_employee` varchar(100) DEFAULT NULL,
  `annual_comment_manager` varchar(100) DEFAULT NULL,
  `manager_rating` int(3) DEFAULT NULL,
  PRIMARY KEY (`ANR_ID`)
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
  `Measurement` varchar(20) DEFAULT NULL,
  `action_item_steps` varchar(50) DEFAULT NULL,
  `measures_of_success` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_goal_objective` */

/*Table structure for table `kpi_goal_ratio` */

DROP TABLE IF EXISTS `kpi_goal_ratio`;

CREATE TABLE `kpi_goal_ratio` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `goal_ratio` varchar(20) DEFAULT NULL,
  `precentage` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_goal_ratio` */

/*Table structure for table `kpi_overall_rating` */

DROP TABLE IF EXISTS `kpi_overall_rating`;

CREATE TABLE `kpi_overall_rating` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `ANR_ID` int(5) DEFAULT NULL,
  `performance_rating` varchar(20) DEFAULT NULL,
  `behavioural_rating` varchar(20) DEFAULT NULL,
  `employee_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_overall_rating` */

/*Table structure for table `kpi_performance_appraisal` */

DROP TABLE IF EXISTS `kpi_performance_appraisal`;

CREATE TABLE `kpi_performance_appraisal` (
  `ANR_ID` int(5) NOT NULL AUTO_INCREMENT,
  `year_month` varchar(20) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_code` varchar(20) DEFAULT NULL,
  `objective_setting_comment` varchar(50) DEFAULT NULL,
  `mid_year_review_comment` varchar(50) DEFAULT NULL,
  `annual_review_comment` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ANR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_performance_appraisal` */

/*Table structure for table `kpi_skill` */

DROP TABLE IF EXISTS `kpi_skill`;

CREATE TABLE `kpi_skill` (
  `skill_id` int(5) NOT NULL AUTO_INCREMENT,
  `skill_category_id` int(5) DEFAULT NULL,
  `skill_description` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill` */

/*Table structure for table `kpi_skill_category` */

DROP TABLE IF EXISTS `kpi_skill_category`;

CREATE TABLE `kpi_skill_category` (
  `skill_category_id` int(5) NOT NULL AUTO_INCREMENT,
  `skill_category_description` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`skill_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill_category` */

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_skill_matrix` */

/*Table structure for table `kpi_user` */

DROP TABLE IF EXISTS `kpi_user`;

CREATE TABLE `kpi_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `pword` text,
  `user_role` varchar(20) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT NULL,
  `user_created` int(5) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated` int(5) DEFAULT '0',
  `date_updated` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_user` */

/*Table structure for table `kpi_user_role` */

DROP TABLE IF EXISTS `kpi_user_role`;

CREATE TABLE `kpi_user_role` (
  `user_role` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`user_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_user_role` */

/*Table structure for table `kpi_week_plan` */

DROP TABLE IF EXISTS `kpi_week_plan`;

CREATE TABLE `kpi_week_plan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `plan_date` varchar(20) DEFAULT NULL,
  `task` varchar(100) DEFAULT NULL,
  `estimated_duration` varchar(50) DEFAULT NULL,
  `actual` varchar(100) DEFAULT NULL,
  `actual_duration` varchar(50) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT NULL,
  `user_created` int(5) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `review_user` int(5) DEFAULT '0',
  `review_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`plan_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kpi_week_plan` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
