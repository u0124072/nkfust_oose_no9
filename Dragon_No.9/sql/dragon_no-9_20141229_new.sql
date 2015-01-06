-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `adminer`;
CREATE TABLE `adminer` (
  `ID` varchar(20) NOT NULL COMMENT 'ID',
  `name` varchar(20) NOT NULL COMMENT 'name',
  `password` varchar(20) NOT NULL COMMENT 'PW',
  `rank` enum('adminer','clerk') NOT NULL COMMENT '身分'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='adminer';

INSERT INTO `adminer` (`ID`, `name`, `password`, `rank`) VALUES
('adminer',	'Zyl',	'',	'adminer'),
('clerk',	'Alan',	'',	'clerk');

DROP TABLE IF EXISTS `borrowdetail`;
CREATE TABLE `borrowdetail` (
  `borrowNo` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '預借紀錄編號',
  `studentID` char(8) NOT NULL COMMENT '學生ID',
  `deskNo` int(2) unsigned zerofill NOT NULL COMMENT '書桌編號',
  `timeNo` varchar(4) NOT NULL COMMENT '時間編號',
  `date` date NOT NULL COMMENT '日期',
  `datea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '預借時間',
  `check` enum('ok','not') NOT NULL DEFAULT 'not' COMMENT '確認',
  PRIMARY KEY (`deskNo`,`timeNo`,`date`),
  UNIQUE KEY `borrowNo` (`borrowNo`),
  KEY `deskNo` (`deskNo`),
  KEY `timeNo` (`timeNo`),
  KEY `studentID` (`studentID`),
  CONSTRAINT `borrowdetail_ibfk_5` FOREIGN KEY (`timeNo`) REFERENCES `time` (`timeID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `borrowdetail_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `student` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `borrowdetail_ibfk_4` FOREIGN KEY (`deskNo`) REFERENCES `desk` (`deskID`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='預借紀錄';

INSERT INTO `borrowdetail` (`borrowNo`, `studentID`, `deskNo`, `timeNo`, `date`, `datea`, `check`) VALUES
(0038,	'u0124024',	01,	'A',	'2014-12-29',	'2014-12-28 09:25:46',	'not'),
(0015,	'u0124002',	01,	'C',	'2014-12-22',	'2014-12-22 00:58:24',	'not'),
(0067,	'u0124024',	01,	'C',	'2014-12-29',	'2014-12-28 22:03:15',	'not'),
(0010,	'u0124040',	02,	'B',	'2014-12-22',	'2014-12-22 00:55:13',	'not'),
(0011,	'u0124040',	02,	'C',	'2014-12-23',	'2014-12-22 00:55:33',	'not'),
(0077,	'u0124072',	02,	'C',	'2014-12-29',	'2014-12-28 23:00:12',	'not'),
(0066,	'u0124040',	02,	'C',	'2014-12-30',	'2014-12-28 21:11:45',	'not'),
(0019,	'u0124002',	03,	'A',	'2014-12-24',	'2014-12-22 00:59:09',	'not'),
(0069,	'u0124040',	03,	'A',	'2014-12-29',	'2014-12-28 22:03:45',	'not'),
(0016,	'u0124002',	03,	'B',	'2014-12-23',	'2014-12-22 00:58:31',	'not'),
(0065,	'u0124040',	03,	'B',	'2014-12-31',	'2014-12-28 21:09:44',	'not'),
(0008,	'u0124024',	03,	'C',	'2014-12-24',	'2014-12-22 00:46:33',	'not'),
(0064,	'u0124040',	03,	'C',	'2014-12-31',	'2014-12-28 21:09:22',	'not'),
(0032,	'u0124024',	04,	'A',	'2014-12-24',	'2014-12-23 06:24:14',	'not'),
(0018,	'u0124002',	04,	'B',	'2014-12-22',	'2014-12-22 00:58:51',	'not'),
(0030,	'u0124040',	05,	'A',	'2014-12-25',	'2014-12-23 05:41:58',	'not'),
(0068,	'u0124040',	05,	'C',	'2014-12-29',	'2014-12-28 22:03:34',	'not'),
(0021,	'u0124002',	06,	'C',	'2014-12-23',	'2014-12-22 00:59:26',	'not'),
(0014,	'u0124040',	06,	'C',	'2014-12-24',	'2014-12-22 00:56:35',	'not'),
(0036,	'u0124024',	06,	'C',	'2014-12-25',	'2014-12-23 06:42:12',	'not'),
(0017,	'u0124002',	08,	'A',	'2014-12-22',	'2014-12-22 00:58:42',	'not'),
(0027,	'u0124024',	08,	'B',	'2014-12-22',	'2014-12-22 05:00:57',	'not'),
(0026,	'u0124024',	09,	'C',	'2014-12-22',	'2014-12-22 04:52:30',	'not'),
(0022,	'u0124072',	10,	'A',	'2014-12-22',	'2014-12-22 00:59:52',	'not'),
(0012,	'u0124040',	10,	'B',	'2014-12-24',	'2014-12-22 00:55:46',	'not'),
(0020,	'u0124002',	10,	'C',	'2014-12-24',	'2014-12-22 00:59:19',	'not'),
(0071,	'u0124024',	11,	'A',	'2014-12-31',	'2014-12-28 22:25:35',	'not'),
(0025,	'u0124072',	12,	'B',	'2014-12-23',	'2014-12-22 01:00:14',	'not'),
(0037,	'u0124024',	12,	'B',	'2014-12-30',	'2014-12-28 08:08:21',	'not'),
(0033,	'u0124024',	16,	'B',	'2014-12-25',	'2014-12-23 06:25:38',	'not'),
(0013,	'u0124040',	17,	'B',	'2014-12-22',	'2014-12-22 00:56:13',	'not'),
(0034,	'u0124024',	17,	'B',	'2014-12-24',	'2014-12-23 06:29:19',	'not'),
(0035,	'u0124024',	17,	'C',	'2014-12-23',	'2014-12-23 06:29:52',	'not'),
(0070,	'u0124040',	19,	'A',	'2014-12-31',	'2014-12-28 22:25:02',	'not'),
(0007,	'u0124024',	20,	'A',	'2014-12-22',	'2014-12-22 00:46:02',	'not');

DROP TABLE IF EXISTS `desk`;
CREATE TABLE `desk` (
  `deskID` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '書桌編號',
  `deskType` varchar(10) NOT NULL COMMENT '書桌規格',
  `deskDist` varchar(4) NOT NULL COMMENT '書桌區域',
  PRIMARY KEY (`deskID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='書桌';

INSERT INTO `desk` (`deskID`, `deskType`, `deskDist`) VALUES
(01,	'QQ',	'A'),
(02,	'QQ',	'A'),
(03,	'QQ',	'A'),
(04,	'AA',	'A'),
(05,	'QQ',	'A'),
(06,	'QQ',	'A'),
(07,	'QQ',	'A'),
(08,	'QQ',	'A'),
(09,	'QQ',	'A'),
(10,	'QQ',	'A'),
(11,	'QQ',	'B'),
(12,	'QQ',	'B'),
(13,	'QQ',	'B'),
(14,	'QQ',	'B'),
(15,	'QQ',	'B'),
(16,	'AA',	'B'),
(17,	'QQ',	'B'),
(18,	'QQ',	'B'),
(19,	'QQ',	'B'),
(20,	'AA',	'B');

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `ID` char(8) NOT NULL COMMENT '學號',
  `name` varchar(10) NOT NULL COMMENT '姓名',
  `password` varchar(12) NOT NULL COMMENT '密碼',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='學生';

INSERT INTO `student` (`ID`, `name`, `password`) VALUES
('u0124002',	'馬萱如',	'123456'),
('u0124024',	'呂忠祐',	'123456'),
('u0124040',	'劉竹信',	'123456'),
('u0124072',	'翁紫軒',	'123456');

DROP TABLE IF EXISTS `time`;
CREATE TABLE `time` (
  `timeID` varchar(4) NOT NULL COMMENT '時段編號',
  `time` varchar(12) NOT NULL COMMENT '時段',
  `time_start` time NOT NULL COMMENT '開始時間',
  `time_end` time NOT NULL COMMENT '結束時間',
  PRIMARY KEY (`timeID`),
  KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='時段';

INSERT INTO `time` (`timeID`, `time`, `time_start`, `time_end`) VALUES
('A',	'9:00~12:00',	'09:00:00',	'12:00:00'),
('B',	'12:00~15:00',	'12:00:00',	'15:00:00'),
('C',	'15:00~18:00',	'15:00:00',	'18:00:00');

-- 2014-12-29 05:48:37
