/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.7.9 : Database - iteh1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`iteh1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `iteh1`;

/*Table structure for table `game` */

DROP TABLE IF EXISTS `game`;

CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ptsHome` int(11) NOT NULL,
  `ptsGuest` int(11) NOT NULL,
  `homeId` int(11) NOT NULL,
  `guestId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `homeFk` (`homeId`),
  KEY `guestFk` (`guestId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `game` */

insert  into `game`(`id`,`ptsHome`,`ptsGuest`,`homeId`,`guestId`) values (13,222,111,11,10),(12,95,101,11,10),(11,90,89,11,10);

/*Table structure for table `player` */

DROP TABLE IF EXISTS `player`;

CREATE TABLE `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dob` timestamp NOT NULL COMMENT 'date of birth',
  `country` varchar(100) NOT NULL,
  `position` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `teamId` int(11) NOT NULL,
  PRIMARY KEY (`id`,`teamId`),
  KEY `teamPK` (`teamId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `player` */

insert  into `player`(`id`,`dob`,`country`,`position`,`name`,`height`,`teamId`) values (5,'2012-01-01 00:00:00','12','pf','golden','111',10),(4,'2011-01-01 00:00:00','123','pg','cle','123',11),(6,'1994-01-01 00:00:00','123','pg','cle2','3',11);

/*Table structure for table `stats` */

DROP TABLE IF EXISTS `stats`;

CREATE TABLE `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `playerId` int(11) NOT NULL,
  `gameId` int(11) NOT NULL,
  `onePtPct` double NOT NULL,
  `twoPtPct` double NOT NULL,
  `threePtPct` double NOT NULL,
  `minPlayed` int(11) NOT NULL,
  `offReb` int(11) NOT NULL,
  `defReb` int(11) NOT NULL,
  PRIMARY KEY (`id`,`playerId`,`gameId`),
  KEY `playerFk` (`playerId`),
  KEY `gameFk` (`gameId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `stats` */

insert  into `stats`(`id`,`playerId`,`gameId`,`onePtPct`,`twoPtPct`,`threePtPct`,`minPlayed`,`offReb`,`defReb`) values (1,5,11,50,60,60,22,10,10),(2,5,11,12,12,121,12,12,12),(3,5,11,20,20,20,48,12,12),(4,4,11,9,9,9,9,9,9),(5,6,11,8,8,8,8,8,8),(6,5,13,1,1,1,1,1,1);

/*Table structure for table `team` */

DROP TABLE IF EXISTS `team`;

CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `arena` varchar(100) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `team` */

insert  into `team`(`id`,`name`,`arena`) values (13,'Heat','miami'),(11,'CLE','kkasd'),(10,'GSW','golden state');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`pass`) values (8,'pera','ja '),(7,'pera','123'),(6,'pera','pr'),(5,'fd','fd'),(9,'fdfuh','ds'),(10,'marko','133'),(11,'per','13'),(12,'proba','123'),(13,'aa','1'),(14,'marko proba','123'),(15,'proba','12'),(16,'proba','12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
