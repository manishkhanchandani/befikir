/*
SQLyog Community Edition- MySQL GUI v6.15
MySQL - 5.0.85 : Database - befikir
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `users` */

insert  into `users`(`uid`,`username`,`email`,`password`,`created`,`updated`,`lastlogin`,`status`,`name`,`profile_pic`,`dob`,`gender`,`timezone`,`location`,`site_id`) values (1,'Nanda Badrani 100001621737825','nanda.badrani@gmail.com',NULL,'2011-03-12 11:36:23','2011-03-12 11:36:56','2011-03-12 11:36:56',1,'Nanda Badrani','https://graph.facebook.com/100001621737825/picture?type=large','1986-06-10','female',-8,'Ulhasnagar',0);
insert  into `users`(`uid`,`username`,`email`,`password`,`created`,`updated`,`lastlogin`,`status`,`name`,`profile_pic`,`dob`,`gender`,`timezone`,`location`,`site_id`) values (2,'Manish Khanchandani 748940976','naveenkhanchandani@gmail.com',NULL,'2011-03-12 11:44:15','2011-03-12 12:43:01','2011-03-12 12:43:01',1,'Manish Khanchandani','https://graph.facebook.com/748940976/picture?type=large','1974-06-05','male',-8,'Orlando, Florida',0);
insert  into `users`(`uid`,`username`,`email`,`password`,`created`,`updated`,`lastlogin`,`status`,`name`,`profile_pic`,`dob`,`gender`,`timezone`,`location`,`site_id`) values (3,'Nikhil Khanchandani 100000705379758','nikhilkhanchandani@gmail.com',NULL,'2011-03-12 11:57:27','2011-03-12 12:04:53','2011-03-12 12:04:53',1,'Nikhil Khanchandani','https://graph.facebook.com/100000705379758/picture?type=large','1974-04-07','male',-8,NULL,0);
insert  into `users`(`uid`,`username`,`email`,`password`,`created`,`updated`,`lastlogin`,`status`,`name`,`profile_pic`,`dob`,`gender`,`timezone`,`location`,`site_id`) values (4,'Uma Shankar 100001627528251','ulhasnag@ulhasnagarfun.in',NULL,'2011-03-12 12:31:03','2011-03-12 12:40:52','2011-03-12 12:40:52',1,'Uma Shankar','https://graph.facebook.com/100001627528251/picture?type=large','1974-01-01','male',-8,'Ulhasnagar',0);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `users_connect` */

insert  into `users_connect`(`connect_id`,`uid`,`connect_type_id`,`access_token`,`extras`,`connection_name`,`site_id`) values (1,1,1,'access_token=466812640509|1390c24036e05fa8fb58c0fc-100001621737825|W3DNF634U38U3Rth8vpKbWylElQ','a:19:{s:2:\"id\";s:15:\"100001621737825\";s:4:\"name\";s:13:\"Nanda Badrani\";s:10:\"first_name\";s:5:\"Nanda\";s:9:\"last_name\";s:7:\"Badrani\";s:4:\"link\";s:54:\"http://www.facebook.com/profile.php?id=100001621737825\";s:8:\"birthday\";s:10:\"06/10/1986\";s:8:\"hometown\";a:2:{s:2:\"id\";s:15:\"105547482811806\";s:4:\"name\";s:10:\"Ulhasnagar\";}s:8:\"location\";a:2:{s:2:\"id\";s:15:\"105547482811806\";s:4:\"name\";s:10:\"Ulhasnagar\";}s:4:\"work\";a:1:{i:0;a:1:{s:8:\"employer\";a:2:{s:2:\"id\";s:15:\"109889685697979\";s:4:\"name\";s:4:\"Self\";}}}s:9:\"education\";a:2:{i:0;a:2:{s:6:\"school\";a:2:{s:2:\"id\";s:15:\"111784955507174\";s:4:\"name\";s:19:\"R.K.Talreja College\";}s:4:\"type\";s:7:\"College\";}i:1;a:2:{s:6:\"school\";a:2:{s:2:\"id\";s:15:\"106123029419435\";s:4:\"name\";s:19:\"New Era High School\";}s:4:\"type\";s:11:\"High School\";}}s:6:\"gender\";s:6:\"female\";s:13:\"interested_in\";a:1:{i:0;s:4:\"male\";}s:5:\"email\";s:23:\"nanda.badrani@gmail.com\";s:8:\"timezone\";i:-8;s:6:\"locale\";s:5:\"en_US\";s:8:\"verified\";b:1;s:12:\"updated_time\";s:24:\"2011-01-06T01:13:25+0000\";s:4:\"code\";s:68:\"1390c24036e05fa8fb58c0fc-100001621737825|0EbYvB1gUAAIWYoBahY9Lkxs1P0\";s:5:\"token\";s:94:\"access_token=466812640509|1390c24036e05fa8fb58c0fc-100001621737825|W3DNF634U38U3Rth8vpKbWylElQ\";}','100001621737825',0);
insert  into `users_connect`(`connect_id`,`uid`,`connect_type_id`,`access_token`,`extras`,`connection_name`,`site_id`) values (2,2,1,'access_token=466812640509|5c67590774c5d0edacd16c61-748940976|owfEnI_g9D6XuefPXdsADoLRqtc','a:24:{s:2:\"id\";s:9:\"748940976\";s:4:\"name\";s:19:\"Manish Khanchandani\";s:10:\"first_name\";s:6:\"Manish\";s:9:\"last_name\";s:12:\"Khanchandani\";s:4:\"link\";s:48:\"http://www.facebook.com/profile.php?id=748940976\";s:8:\"birthday\";s:10:\"06/05/1974\";s:8:\"hometown\";a:2:{s:2:\"id\";s:15:\"108288992526695\";s:4:\"name\";s:16:\"Orlando, Florida\";}s:8:\"location\";a:2:{s:2:\"id\";s:15:\"108288992526695\";s:4:\"name\";s:16:\"Orlando, Florida\";}s:3:\"bio\";s:256:\"ZCE (Zend Certification)\r\nhttp://www.zend.com/en/store/education/certification/authenticate.php/ClientCandidateID/ZEND012368/RegistrationID/233042023\r\n\r\nBrainbench PHP Master Certifications:\r\nhttp://manishkhanchandani.info/brainbench/php5.pdf\r\n\r\nBrainbench\";s:9:\"education\";a:2:{i:0;a:4:{s:6:\"school\";a:2:{s:2:\"id\";s:15:\"109550319094167\";s:4:\"name\";s:20:\"Allagappa University\";}s:4:\"year\";a:2:{s:2:\"id\";s:15:\"138383069535219\";s:4:\"name\";s:4:\"2005\";}s:13:\"concentration\";a:1:{i:0;a:2:{s:2:\"id\";s:15:\"149395185119476\";s:4:\"name\";s:22:\"Information Technology\";}}s:4:\"type\";s:7:\"College\";}i:1;a:3:{s:6:\"school\";a:2:{s:2:\"id\";s:15:\"106123029419435\";s:4:\"name\";s:19:\"New Era High School\";}s:4:\"year\";a:2:{s:2:\"id\";s:15:\"131367623569918\";s:4:\"name\";s:4:\"1990\";}s:4:\"type\";s:11:\"High School\";}}s:6:\"gender\";s:4:\"male\";s:13:\"interested_in\";a:2:{i:0;s:6:\"female\";i:1;s:4:\"male\";}s:11:\"meeting_for\";a:1:{i:0;s:10:\"Networking\";}s:8:\"religion\";s:4:\"Hmmm\";s:9:\"political\";s:4:\"Hmmm\";s:5:\"email\";s:28:\"naveenkhanchandani@gmail.com\";s:7:\"website\";s:19:\"http://mkgalaxy.com\";s:8:\"timezone\";i:-8;s:6:\"locale\";s:5:\"en_US\";s:9:\"languages\";a:3:{i:0;a:2:{s:2:\"id\";s:15:\"112567898755905\";s:4:\"name\";s:6:\"Sindhi\";}i:1;a:2:{s:2:\"id\";s:15:\"106059522759137\";s:4:\"name\";s:7:\"English\";}i:2;a:2:{s:2:\"id\";s:15:\"112969428713061\";s:4:\"name\";s:5:\"Hindi\";}}s:8:\"verified\";b:1;s:12:\"updated_time\";s:24:\"2011-02-23T05:25:12+0000\";s:4:\"code\";s:62:\"5c67590774c5d0edacd16c61-748940976|4oYfq-WtZgnMn3sQCdJu_UzVcnY\";s:5:\"token\";s:88:\"access_token=466812640509|5c67590774c5d0edacd16c61-748940976|owfEnI_g9D6XuefPXdsADoLRqtc\";}','748940976',0);
insert  into `users_connect`(`connect_id`,`uid`,`connect_type_id`,`access_token`,`extras`,`connection_name`,`site_id`) values (3,3,1,'access_token=466812640509|009463857ae16887ff06ac00-100000705379758|xY2Z8j_1zYOlLH9oKR1PmUelYWs','a:14:{s:2:\"id\";s:15:\"100000705379758\";s:4:\"name\";s:19:\"Nikhil Khanchandani\";s:10:\"first_name\";s:6:\"Nikhil\";s:9:\"last_name\";s:12:\"Khanchandani\";s:4:\"link\";s:54:\"http://www.facebook.com/profile.php?id=100000705379758\";s:8:\"birthday\";s:10:\"04/07/1974\";s:6:\"gender\";s:4:\"male\";s:5:\"email\";s:28:\"nikhilkhanchandani@gmail.com\";s:8:\"timezone\";i:-8;s:6:\"locale\";s:5:\"en_US\";s:8:\"verified\";b:1;s:12:\"updated_time\";s:24:\"2010-11-14T07:04:33+0000\";s:4:\"code\";s:68:\"009463857ae16887ff06ac00-100000705379758|9GyJ6dhaZdGrATCqnIzUIUp1iaU\";s:5:\"token\";s:94:\"access_token=466812640509|009463857ae16887ff06ac00-100000705379758|xY2Z8j_1zYOlLH9oKR1PmUelYWs\";}','100000705379758',0);
insert  into `users_connect`(`connect_id`,`uid`,`connect_type_id`,`access_token`,`extras`,`connection_name`,`site_id`) values (4,4,1,'access_token=466812640509|de5254c7676e755382fc966c-100001627528251|iblLBaNbeeOi_ey99pbFm-v-KO0','a:17:{s:2:\"id\";s:15:\"100001627528251\";s:4:\"name\";s:11:\"Uma Shankar\";s:10:\"first_name\";s:3:\"Uma\";s:9:\"last_name\";s:7:\"Shankar\";s:4:\"link\";s:54:\"http://www.facebook.com/profile.php?id=100001627528251\";s:8:\"birthday\";s:10:\"01/01/1974\";s:8:\"hometown\";a:2:{s:2:\"id\";s:15:\"105547482811806\";s:4:\"name\";s:10:\"Ulhasnagar\";}s:8:\"location\";a:2:{s:2:\"id\";s:15:\"105547482811806\";s:4:\"name\";s:10:\"Ulhasnagar\";}s:6:\"gender\";s:4:\"male\";s:13:\"interested_in\";a:2:{i:0;s:6:\"female\";i:1;s:4:\"male\";}s:5:\"email\";s:25:\"ulhasnag@ulhasnagarfun.in\";s:8:\"timezone\";i:-8;s:6:\"locale\";s:5:\"en_US\";s:8:\"verified\";b:1;s:12:\"updated_time\";s:24:\"2011-01-06T01:09:06+0000\";s:4:\"code\";s:68:\"de5254c7676e755382fc966c-100001627528251|XKZxs7Q0XaWlAX3FphBllhCB9_0\";s:5:\"token\";s:94:\"access_token=466812640509|de5254c7676e755382fc966c-100001627528251|iblLBaNbeeOi_ey99pbFm-v-KO0\";}','100001627528251',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
