-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `enquiry`;
CREATE TABLE `enquiry` (
  `enquiryId` int(11) NOT NULL AUTO_INCREMENT,
  `customerName` varchar(20) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `emailId` varchar(30) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productType` varchar(50) NOT NULL,
  `productSubType` varchar(50) NOT NULL,
  `productImage` varchar(50) DEFAULT NULL,
  `purity` int(11) NOT NULL,
  `weight` float NOT NULL,
  `productDescription` text NOT NULL,
  PRIMARY KEY (`enquiryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `loginId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `securityQuestion` varchar(40) DEFAULT NULL,
  `securityAnswer` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`loginId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `login` (`loginId`, `username`, `password`, `securityQuestion`, `securityAnswer`) VALUES
(1,	'abc',	'900150983cd24fb0d6963f7d28e17f72',	NULL,	NULL),
(2,	'a',	'0cc175b9c0f1b6a831c399e269772661',	NULL,	NULL),
(3,	'qwqiwi',	'2b7e16fccca0cc40514c3fc9f0298713',	NULL,	NULL),
(4,	'rasik',	'0763cafce4c2720bb54025b17021de03',	NULL,	NULL),
(5,	'shashank',	'ce5dbaa2911e2e8d51af63794517bfe8',	NULL,	NULL);

DROP TABLE IF EXISTS `masterdata`;
CREATE TABLE `masterdata` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(50) NOT NULL,
  `productMaterial` varchar(20) NOT NULL,
  `customerType` varchar(20) NOT NULL,
  `productType` varchar(50) NOT NULL,
  `productSubType` varchar(50) NOT NULL,
  `purity` int(11) NOT NULL,
  `weight` float NOT NULL,
  `rate` float NOT NULL,
  `makingCharges` float NOT NULL,
  `tax` float NOT NULL,
  `discount` float NOT NULL,
  `finalAmount` float NOT NULL,
  `mainImageUrl` text,
  `otherImage1` text,
  `otherImage2` text,
  `otherImage3` text,
  `otherImage4` text,
  `occasion` varchar(50) NOT NULL,
  `remark1` text,
  `remark2` text,
  `remark3` text,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `masterdata` (`productId`, `productName`, `productMaterial`, `customerType`, `productType`, `productSubType`, `purity`, `weight`, `rate`, `makingCharges`, `tax`, `discount`, `finalAmount`, `mainImageUrl`, `otherImage1`, `otherImage2`, `otherImage3`, `otherImage4`, `occasion`, `remark1`, `remark2`, `remark3`) VALUES
(31,	'Choker 2',	'Gold',	'Women',	'Choker',	'Choker',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/c2.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(32,	'Choker 3',	'Gold',	'Women',	'Choker',	'Choker',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/c3.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(33,	'Classic Mangalsutra 1',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm1.jpg',	NULL,	NULL,	NULL,	NULL,	'',	'new',	'marriage',	'trend'),
(34,	'Classic Mangalsutra 2',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm2.jpg',	NULL,	NULL,	NULL,	NULL,	'',	'new',	'marriage',	'trend'),
(35,	'Classic Mangalsutra 3',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm3.jpg',	NULL,	NULL,	NULL,	NULL,	'',	'new',	'marriage',	'trend'),
(36,	'Classic Mangalsutra 4',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm4.jpg',	'',	'',	'',	'',	'',	'new',	'marriage',	'trend'),
(37,	'Classic Mangalsutra 5',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm5.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(38,	'Classic Mangalsutra 6',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm6.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(39,	'Classic Mangalsutra 7',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm7.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(40,	'Classic Mangalsutra 8',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm8.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(41,	'Classic Mangalsutra 9',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm9.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(42,	'Classic Mangalsutra 10',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm10.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(43,	'Classic Mangalsutra 11',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm11.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(44,	'Classic Mangalsutra 12',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm12.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(45,	'Classic Mangalsutra 13',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm13.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(46,	'Classic Mangalsutra 14',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm14.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(47,	'Classic Mangalsutra 15',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm15.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(48,	'Classic Mangalsutra 16',	'Gold',	'Women',	'Mangalsutra',	'Classic',	24,	10.1,	30000,	20000,	0,	0,	50000,	'images/cm16.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(51,	'Classic Set 1',	'Gold',	'Women',	'Neckless',	'Classic',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/cs1.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(52,	'Classic Set 2',	'Gold',	'Women',	'Neckless',	'Classic',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/cs2.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(53,	'Classic Set 3',	'Gold',	'Women',	'Neckless',	'Classic',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/cs3.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(54,	'Classic Set 4',	'Gold',	'Women',	'Neckless',	'Classic',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/cs4.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(55,	'Fancy Zumka 1',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz1.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(56,	'Fancy Zumka 2',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz2.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(57,	'Fancy Zumka 3',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz3.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(58,	'Fancy Zumka 4',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz4.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(59,	'Fancy Zumka 5',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz5.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(60,	'Fancy Zumka 6',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz6.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(61,	'Fancy Zumka 7',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz7.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(62,	'Fancy Zumka 8',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz8.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(63,	'Fancy Zumka 9',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz9.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(64,	'Fancy Zumka 10',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz10.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(65,	'Fancy Zumka 11',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz11.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(66,	'Fancy Zumka 12',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz12.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(67,	'Fancy Zumka 13',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz13.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(68,	'Fancy Zumka 14',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz14.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(69,	'Fancy Zumka 15',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz15.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(70,	'Fancy Zumka 16',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz16.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(71,	'Fancy Zumka 17',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz17.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(72,	'Fancy Zumka 18',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz18.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(73,	'Fancy Zumka 19',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz19.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(74,	'Fancy Zumka 20',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz20.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(75,	'Fancy Zumka 21',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz21.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(76,	'Fancy Zumka 22',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz22.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(77,	'Fancy Zumka 23',	'Gold',	'Women',	'Earring',	'Fancy',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fz23.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(78,	'Nath 1',	'Gold',	'Women',	'Nath',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/n1.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(79,	'Nath 2',	'Gold',	'Women',	'Nath',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/n2.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(80,	'Nath 3',	'Gold',	'Women',	'Nath',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/n3.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(81,	'Nath 4',	'Gold',	'Women',	'Nath',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/n4.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(82,	'Nath 5',	'Gold',	'Women',	'Nath',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/n5.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(83,	'Nath 6',	'Gold',	'Women',	'Nath',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/n6.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(84,	'Pendent 1',	'Gold',	'Women',	'Pendent',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fp1.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(85,	'Pendent 2',	'Gold',	'Women',	'Pendent',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fp2.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(86,	'Pendent 3',	'Gold',	'Women',	'Pendent',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fp3.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(87,	'Pendent 4',	'Gold',	'Women',	'Pendent',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fp4.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(88,	'Pendent 5',	'Gold',	'Women',	'Pendent',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fp5.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(89,	'Pendent 6',	'Gold',	'Women',	'Pendent',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fp6.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(90,	'Pendent 7',	'Gold',	'Women',	'Pendent',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fp7.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(91,	'Pendent 8',	'Gold',	'Women',	'Pendent',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fp8.jpg',	'',	'',	'',	'',	'',	'',	'',	''),
(92,	'Pendent 9',	'Gold',	'Women',	'Pendent',	'none',	24,	10.1,	30000,	10,	0,	0,	3333000,	'images/fp9.jpg',	'',	'',	'',	'',	'',	'',	'',	'');

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `newsId` int(11) NOT NULL AUTO_INCREMENT,
  `newsTitle` varchar(30) NOT NULL,
  `newsImage` varchar(50) NOT NULL,
  `newsText` text NOT NULL,
  `newsStart` date NOT NULL,
  `newsEnd` date NOT NULL,
  PRIMARY KEY (`newsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `query`;
CREATE TABLE `query` (
  `queryId` int(11) NOT NULL AUTO_INCREMENT,
  `customerName` varchar(20) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `emailId` varchar(30) NOT NULL,
  `queryText` text NOT NULL,
  `attachment` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`queryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `query` (`queryId`, `customerName`, `contactNumber`, `emailId`, `queryText`, `attachment`) VALUES
(1,	'shashank',	'1234567890',	'shashank@gmail.com',	'ddjf dfd ',	NULL),
(2,	'abc',	'1234567890',	'abc@gmail.com',	'test query',	'images/xml descriptor.png'),
(5,	'shashank',	'1234567890',	'shashank@gmail.com',	'I am shashank gaikwad',	''),
(8,	'test',	'1234567890',	'test@gmail.com',	'test',	'images/power123.png'),
(9,	'test',	'1234567890',	'test@gmail.com',	'test',	'images/power123.png'),
(10,	'test 2',	'1234567890',	'test2@gmail.com',	'test 2',	'');

DROP TABLE IF EXISTS `rate`;
CREATE TABLE `rate` (
  `date` date NOT NULL,
  `gold` int(11) NOT NULL,
  `gold1` int(11) NOT NULL,
  `gold2` int(11) NOT NULL,
  `silver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `rate` (`date`, `gold`, `gold1`, `gold2`, `silver`) VALUES
('2016-06-10',	22000,	22000,	22000,	22000),
('2016-06-10',	22000,	22000,	22000,	22000),
('2016-06-10',	22000,	22000,	22000,	22000),
('2016-06-10',	22000,	22000,	22000,	22000),
('2016-06-10',	22000,	22000,	22000,	22000),
('2016-06-10',	22000,	22000,	22000,	22000),
('2016-06-10',	22000,	22000,	22000,	22000),
('2016-06-10',	22000,	22000,	22000,	22000),
('2016-06-11',	22000,	22000,	22000,	22000),
('2016-06-19',	22000,	22000,	22000,	22000),
('2016-06-19',	22000,	22000,	22000,	22000),
('2016-06-24',	22000,	22000,	22000,	22000),
('2016-06-24',	22000,	22000,	22000,	22000),
('2016-06-24',	22000,	22000,	22000,	22000),
('2016-06-26',	22000,	22000,	22000,	22000),
('2016-06-30',	22000,	22000,	22000,	22000),
('2016-07-02',	10000,	10000,	10000,	10000),
('2016-07-09',	50000,	50000,	50000,	50000),
('2016-07-10',	70000,	70000,	70000,	70000),
('2016-07-20',	20000,	20000,	20000,	20000),
('2016-07-21',	30000,	30000,	30000,	30000);

DROP TABLE IF EXISTS `websiteinfo`;
CREATE TABLE `websiteinfo` (
  `websiteName` varchar(30) NOT NULL,
  `mobileNumber1` varchar(15) NOT NULL,
  `mobileNumber2` varchar(15) NOT NULL,
  `emailId` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `logoUrl` varchar(40) NOT NULL,
  `aboutUsText` text NOT NULL,
  `homePageText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `websiteinfo` (`websiteName`, `mobileNumber1`, `mobileNumber2`, `emailId`, `address`, `logoUrl`, `aboutUsText`, `homePageText`) VALUES
('www.rasikjewellers.com',	'1234567890',	'0987654321',	'rasikjewellers@gmail.com',	'pune',	'logo',	'shashank gaikwad',	'This is home page text for rasik jewellers');

-- 2016-10-09 18:55:11