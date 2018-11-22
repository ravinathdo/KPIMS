<?xml version="1.0" encoding="UTF-8"?>
<schemadesigner version="6.5">
<source>
<database charset="latin1" collation="latin1_swedish_ci">kpimsdb</database>
</source>
<canvas zoom="100">
<tables>
<table name="kpi_skill" view="colnames">
<left>144</left>
<top>113</top>
<width>142</width>
<height>163</height>
<sql_create_table>CREATE TABLE `kpi_skill` (
  `skill_id` int(5) NOT NULL AUTO_INCREMENT,
  `skill_category_id` int(5) DEFAULT NULL,
  `skill_description` varchar(20) DEFAULT NULL,
  `note_html` varchar(250) DEFAULT NULL,
  `note_css` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`skill_id`),
  KEY `FK_kpi_skill` (`skill_category_id`),
  CONSTRAINT `FK_kpi_skill` FOREIGN KEY (`skill_category_id`) REFERENCES `kpi_skill_category` (`skill_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_skill_category" view="colnames">
<left>327</left>
<top>57</top>
<width>194</width>
<height>112</height>
<sql_create_table>CREATE TABLE `kpi_skill_category` (
  `skill_category_id` int(5) NOT NULL AUTO_INCREMENT,
  `skill_category_description` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`skill_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_skill_level" view="colnames">
<left>144</left>
<top>295</top>
<width>117</width>
<height>129</height>
<sql_create_table>CREATE TABLE `kpi_skill_level` (
  `expert_level` int(5) NOT NULL AUTO_INCREMENT,
  `lable` varchar(20) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`expert_level`)
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_skill_matrix" view="colnames">
<left>334</left>
<top>222</top>
<width>121</width>
<height>197</height>
<sql_create_table>CREATE TABLE `kpi_skill_matrix` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_user" view="colnames">
<left>551</left>
<top>73</top>
<width>167</width>
<height>311</height>
<sql_create_table>CREATE TABLE `kpi_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_user_role" view="colnames">
<left>860</left>
<top>101</top>
<width>118</width>
<height>129</height>
<sql_create_table>CREATE TABLE `kpi_user_role` (
  `user_role` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `access_level` int(5) DEFAULT NULL,
  PRIMARY KEY (`user_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_performance_appraisal" view="colnames">
<left>824</left>
<top>285</top>
<width>205</width>
<height>231</height>
<sql_create_table>CREATE TABLE `kpi_performance_appraisal` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_overall_rating" view="colnames">
<left>1098</left>
<top>355</top>
<width>159</width>
<height>163</height>
<sql_create_table>CREATE TABLE `kpi_overall_rating` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `PAFID` int(5) DEFAULT NULL,
  `performance_rating` varchar(20) DEFAULT NULL,
  `behavioural_rating` varchar(20) DEFAULT NULL,
  `employee_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kpi_overall_rating_overall` (`PAFID`),
  CONSTRAINT `FK_kpi_overall_rating_overall` FOREIGN KEY (`PAFID`) REFERENCES `kpi_performance_appraisal` (`PAFID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_goal_ratio" view="colnames">
<left>417</left>
<top>480</top>
<width>148</width>
<height>129</height>
<sql_create_table>CREATE TABLE `kpi_goal_ratio` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `goal_ratio` varchar(20) DEFAULT NULL,
  `precentage` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_goal_objective" view="colnames">
<left>591</left>
<top>404</top>
<width>125</width>
<height>197</height>
<sql_create_table>CREATE TABLE `kpi_goal_objective` (
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_goal_employee" view="colnames">
<left>829</left>
<top>567</top>
<width>223</width>
<height>231</height>
<sql_create_table>CREATE TABLE `kpi_goal_employee` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_beh_competency" view="colnames">
<left>384</left>
<top>644</top>
<width>115</width>
<height>129</height>
<sql_create_table>CREATE TABLE `kpi_beh_competency` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `competency` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_employee_beh_competency" view="colnames">
<left>560</left>
<top>643</top>
<width>160</width>
<height>180</height>
<sql_create_table>CREATE TABLE `kpi_employee_beh_competency` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_week_plan" view="colnames">
<left>1101</left>
<top>570</top>
<width>156</width>
<height>282</height>
<sql_create_table>CREATE TABLE `kpi_week_plan` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1</sql_create_table>
</table>
<table name="kpi_week_plan_actual" view="colnames">
<left>917</left>
<top>822</top>
<width>134</width>
<height>265</height>
<sql_create_table>CREATE TABLE `kpi_week_plan_actual` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1</sql_create_table>
</table>
</tables>
</canvas>
</schemadesigner>