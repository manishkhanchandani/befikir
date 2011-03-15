/*
SQLyog Community Edition- MySQL GUI v6.15
MySQL - 5.0.85 : Database - befikir
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `hom_organon` */

CREATE TABLE `hom_organon` (
  `organon_id` int(11) NOT NULL auto_increment,
  `site_id` int(11) default NULL,
  `edition` enum('5th Edition','6th Edition','7th Edition') default NULL,
  `aphorism_no` int(11) default NULL,
  `content` text,
  PRIMARY KEY  (`organon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `hom_organon` */

/*Table structure for table `users` */

CREATE TABLE `users` (
  `uid` int(11) NOT NULL auto_increment,
  `username` varchar(150) default NULL,
  `email` varchar(150) default NULL,
  `password` varchar(60) default NULL,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `lastlogin` datetime default NULL,
  `status` int(1) NOT NULL default '1' COMMENT '1 active, 0 deleted, -1 banned',
  `name` varchar(60) default NULL,
  `profile_pic` varchar(255) default NULL,
  `dob` date default NULL,
  `gender` enum('male','female') default NULL,
  `timezone` float default NULL,
  `location` varchar(100) default NULL,
  `site_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `users` */

insert  into `users`(`uid`,`username`,`email`,`password`,`created`,`updated`,`lastlogin`,`status`,`name`,`profile_pic`,`dob`,`gender`,`timezone`,`location`,`site_id`) values (1,NULL,'naveenkhanchandani@gmail.com',NULL,'2011-03-13 06:08:20','2011-03-13 06:08:20','2011-03-13 06:08:20',1,'Manish Khanchandani','https://graph.facebook.com/748940976/picture?type=large','1974-06-05','male',-8,'Orlando, Florida',1);
insert  into `users`(`uid`,`username`,`email`,`password`,`created`,`updated`,`lastlogin`,`status`,`name`,`profile_pic`,`dob`,`gender`,`timezone`,`location`,`site_id`) values (2,NULL,'renu09@live.com',NULL,'2011-03-13 06:14:49','2011-03-13 06:14:49','2011-03-13 06:14:49',1,'Renu Khanchandani','https://graph.facebook.com/100001997163726/picture?type=large','1950-02-18','female',-8.5,'Orlando, Florida',1);

/*Table structure for table `users_connect` */

CREATE TABLE `users_connect` (
  `connect_id` int(11) NOT NULL auto_increment,
  `uid` int(11) default NULL,
  `connect_type_id` int(11) default NULL,
  `access_token` text,
  `extras` text,
  `connection_name` varchar(255) default NULL,
  `site_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`connect_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `users_connect` */

insert  into `users_connect`(`connect_id`,`uid`,`connect_type_id`,`access_token`,`extras`,`connection_name`,`site_id`) values (1,1,1,'access_token=466812640509|5c67590774c5d0edacd16c61-748940976|owfEnI_g9D6XuefPXdsADoLRqtc','a:24:{s:2:\"id\";s:9:\"748940976\";s:4:\"name\";s:19:\"Manish Khanchandani\";s:10:\"first_name\";s:6:\"Manish\";s:9:\"last_name\";s:12:\"Khanchandani\";s:4:\"link\";s:48:\"http://www.facebook.com/profile.php?id=748940976\";s:8:\"birthday\";s:10:\"06/05/1974\";s:8:\"hometown\";a:2:{s:2:\"id\";s:15:\"108288992526695\";s:4:\"name\";s:16:\"Orlando, Florida\";}s:8:\"location\";a:2:{s:2:\"id\";s:15:\"108288992526695\";s:4:\"name\";s:16:\"Orlando, Florida\";}s:3:\"bio\";s:256:\"ZCE (Zend Certification)\r\nhttp://www.zend.com/en/store/education/certification/authenticate.php/ClientCandidateID/ZEND012368/RegistrationID/233042023\r\n\r\nBrainbench PHP Master Certifications:\r\nhttp://manishkhanchandani.info/brainbench/php5.pdf\r\n\r\nBrainbench\";s:9:\"education\";a:2:{i:0;a:4:{s:6:\"school\";a:2:{s:2:\"id\";s:15:\"109550319094167\";s:4:\"name\";s:20:\"Allagappa University\";}s:4:\"year\";a:2:{s:2:\"id\";s:15:\"138383069535219\";s:4:\"name\";s:4:\"2005\";}s:13:\"concentration\";a:1:{i:0;a:2:{s:2:\"id\";s:15:\"149395185119476\";s:4:\"name\";s:22:\"Information Technology\";}}s:4:\"type\";s:7:\"College\";}i:1;a:3:{s:6:\"school\";a:2:{s:2:\"id\";s:15:\"106123029419435\";s:4:\"name\";s:19:\"New Era High School\";}s:4:\"year\";a:2:{s:2:\"id\";s:15:\"131367623569918\";s:4:\"name\";s:4:\"1990\";}s:4:\"type\";s:11:\"High School\";}}s:6:\"gender\";s:4:\"male\";s:13:\"interested_in\";a:2:{i:0;s:6:\"female\";i:1;s:4:\"male\";}s:11:\"meeting_for\";a:1:{i:0;s:10:\"Networking\";}s:8:\"religion\";s:4:\"Hmmm\";s:9:\"political\";s:4:\"Hmmm\";s:5:\"email\";s:28:\"naveenkhanchandani@gmail.com\";s:7:\"website\";s:19:\"http://mkgalaxy.com\";s:8:\"timezone\";i:-8;s:6:\"locale\";s:5:\"en_US\";s:9:\"languages\";a:3:{i:0;a:2:{s:2:\"id\";s:15:\"112567898755905\";s:4:\"name\";s:6:\"Sindhi\";}i:1;a:2:{s:2:\"id\";s:15:\"106059522759137\";s:4:\"name\";s:7:\"English\";}i:2;a:2:{s:2:\"id\";s:15:\"112969428713061\";s:4:\"name\";s:5:\"Hindi\";}}s:8:\"verified\";b:1;s:12:\"updated_time\";s:24:\"2011-02-23T05:25:12+0000\";s:4:\"code\";s:62:\"5c67590774c5d0edacd16c61-748940976|4oYfq-WtZgnMn3sQCdJu_UzVcnY\";s:5:\"token\";s:88:\"access_token=466812640509|5c67590774c5d0edacd16c61-748940976|owfEnI_g9D6XuefPXdsADoLRqtc\";}','748940976',1);
insert  into `users_connect`(`connect_id`,`uid`,`connect_type_id`,`access_token`,`extras`,`connection_name`,`site_id`) values (2,2,1,'access_token=466812640509|2.1b9Ej8Pj0_YYjoOjsn2MtQ__.3600.1299981600-100001997163726|iGes4EE0TcQRzlaAKdGDWiwlJqc&expires=4512','a:17:{s:2:\"id\";s:15:\"100001997163726\";s:4:\"name\";s:17:\"Renu Khanchandani\";s:10:\"first_name\";s:4:\"Renu\";s:9:\"last_name\";s:12:\"Khanchandani\";s:4:\"link\";s:54:\"http://www.facebook.com/profile.php?id=100001997163726\";s:8:\"birthday\";s:10:\"02/18/1950\";s:8:\"hometown\";a:2:{s:2:\"id\";s:15:\"114759761873412\";s:4:\"name\";s:19:\"Mumbai, Maharashtra\";}s:8:\"location\";a:2:{s:2:\"id\";s:15:\"108288992526695\";s:4:\"name\";s:16:\"Orlando, Florida\";}s:4:\"work\";a:2:{i:0;a:2:{s:8:\"employer\";a:2:{s:2:\"id\";s:15:\"131742896857270\";s:4:\"name\";s:19:\"R K Talreja College\";}s:8:\"position\";a:2:{s:2:\"id\";s:15:\"108646729159110\";s:4:\"name\";s:8:\"Lecturer\";}}i:1;a:4:{s:8:\"employer\";a:2:{s:2:\"id\";s:15:\"131742896857270\";s:4:\"name\";s:19:\"R K Talreja College\";}s:8:\"location\";a:2:{s:2:\"id\";s:15:\"105547482811806\";s:4:\"name\";s:10:\"Ulhasnagar\";}s:8:\"position\";a:2:{s:2:\"id\";s:15:\"108646729159110\";s:4:\"name\";s:8:\"Lecturer\";}s:11:\"description\";s:10:\"Now in USA\";}}s:9:\"education\";a:1:{i:0;a:3:{s:6:\"school\";a:2:{s:2:\"id\";s:15:\"111950378821457\";s:4:\"name\";s:20:\"University of Mumbai\";}s:4:\"year\";a:2:{s:2:\"id\";s:15:\"137359399634412\";s:4:\"name\";s:4:\"2002\";}s:4:\"type\";s:7:\"College\";}}s:6:\"gender\";s:6:\"female\";s:5:\"email\";s:15:\"renu09@live.com\";s:8:\"timezone\";d:-8.5;s:6:\"locale\";s:5:\"en_US\";s:12:\"updated_time\";s:24:\"2011-01-27T05:11:31+0000\";s:4:\"code\";s:86:\"2.1b9Ej8Pj0_YYjoOjsn2MtQ__.3600.1299981600-100001997163726|voz6lDAxVA6uymZ8H0NpHoL-l_Q\";s:5:\"token\";s:125:\"access_token=466812640509|2.1b9Ej8Pj0_YYjoOjsn2MtQ__.3600.1299981600-100001997163726|iGes4EE0TcQRzlaAKdGDWiwlJqc&expires=4512\";}','100001997163726',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
