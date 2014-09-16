-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2014 at 01:44 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE IF NOT EXISTS `contact_details` (
  `contact_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userID` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `countrycode` smallint(6) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  PRIMARY KEY (`contact_id`),
  UNIQUE KEY `userid` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`contact_id`, `userID`, `email`, `countrycode`, `mobile`, `telephone`) VALUES
(1, 1, 'admin@mail.com', 0, 2147483647, 786877876),
(2, 2, 'masoom.kamina@gmail.com', 0, 9897165774, 585473),
(3, 58, 'masoom.kamina@gmail.com', 0, 2147483647, 2147483647),
(4, 60, 'masoom.kamina@gmail.com', 0, 2147483647, 9879877),
(5, 61, 'arikrulz@gmail.com', 0, 98789787, 878898),
(6, 62, 'masoom.kamina@gmail.com', 0, 98798789, 878998),
(7, 63, 'pradeep.think.always@gmail.com', 0, 897897, 79878),
(8, 64, 'pradeep.think.always@gmail.com', 0, 98787988, 878789),
(9, 65, 'pradeep.think.always@gmail.com', 0, 2147483647, 87897988),
(10, 66, 'pradeep.think.always@gmail.com', 0, 98787, 7987897),
(11, 67, 'masoom.kamina@gmail.com', 0, 988798787, 98787),
(12, 68, 'masoom.kamina@gmail.com', 0, 2147483647, 6768878),
(13, 69, 'user@mail.com', 0, 989879878, 8768889),
(14, 70, 'user@mail.com', 0, 989879878, 8768889),
(15, 71, 'user@mail.com', 0, 989879878, 8768889),
(16, 72, 'pradeep.think.always@gmail.com', 0, 989879878, 8768889),
(17, 73, 'user@mail.com', 0, 989879878, 8768889),
(19, 835, 'user@mail.com', 0, 989879878, 8768889),
(20, 75, 'admin2@mail.com', 0, 989879878, 8768889),
(22, 76, 'user@mail.com', 0, 989879878, 8768889),
(23, 77, 'user@mail.com', 0, 989879878, 8768889),
(24, 78, 'user@mail.com', 0, 989879878, 8768889),
(25, 79, 'user@mail.com', 0, 989879878, 8768889),
(26, 80, 'user@mail.com', 0, 989879878, 8768889),
(27, 81, 'admin2@mail.com', 0, 989879878, 8768889),
(28, 82, 'masterpiece@in.com', 0, 989879878, 8768889),
(29, 83, 'admin2@mail.com', 0, 989879878, 8768889),
(30, 87, 'admin2@mail.com', 0, 989879878, 8768889),
(31, 93, 'masterpiece@in.com', 0, 989879878, 8768889),
(32, 94, 'a@b.com', 0, 2147483647, 86786876),
(35, 25439, 'user@user.com', 91, 9897165774, 987897898);

-- --------------------------------------------------------

--
-- Table structure for table `image_file_details`
--

CREATE TABLE IF NOT EXISTS `image_file_details` (
  `imageID` bigint(20) NOT NULL AUTO_INCREMENT,
  `userID` bigint(20) NOT NULL,
  `photoFile` varchar(200) NOT NULL,
  `signFile` varchar(200) NOT NULL,
  PRIMARY KEY (`imageID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `image_file_details`
--

INSERT INTO `image_file_details` (`imageID`, `userID`, `photoFile`, `signFile`) VALUES
(1, 68, '../public/images/User_uploads/user37photo', 'b'),
(2, 2, '../public/images/User_uploads/adminphoto.jpg', '../public/images/User_uploads/adminsign.jpg'),
(3, 68, '../public/images/User_uploads/user37photo', '../public/images/User_uploads/user37sign'),
(4, 68, '../public/images/User_uploads/user37photo', '../public/images/User_uploads/user37sign'),
(5, 68, '../public/images/User_uploads/user37photo', '../public/images/User_uploads/user37sign'),
(6, 69, '../public/images/User_uploads/user38photo', '../public/images/User_uploads/user37sign'),
(7, 69, '../public/images/User_uploads/user38photo', '../public/images/User_uploads/user38sign'),
(8, 70, '../public/images/User_uploads/user39photo', '../public/images/User_uploads/user38sign'),
(9, 71, '../public/images/User_uploads/user40photo', '../public/images/User_uploads/user39sign'),
(10, 72, '../public/images/User_uploads/user41photo', '../public/images/User_uploads/user41sign'),
(11, 2, '../public/images/User_uploads/user46photo', '../public/images/User_uploads/user46sign'),
(12, 78, '../public/images/User_uploads/user60photo.jpg', '../public/images/User_uploads/user60sign.jpg'),
(13, 79, '../public/images/User_uploads/user61photo.jpg', '../public/images/User_uploads/user61sign.jpg'),
(14, 79, '../public/images/User_uploads/user61photo.jpg', '../public/images/User_uploads/user61sign.jpg'),
(15, 81, '../public/images/User_uploads/user63photo.jpg', '../public/images/User_uploads/user63sign.jpg'),
(16, 82, '../public/images/User_uploads/user64photo.jpg', '../public/images/User_uploads/user64sign.jpg'),
(17, 86, '../public/images/User_uploads/user989888877photo.j', '../public/images/User_uploads/user989888877sign.jp'),
(18, 87, '../public/images/User_uploads/user897photo.jpg', '../public/images/User_uploads/user897sign.jpg'),
(20, 93, '../public/images/User_uploads/pradeepchaudharyphoto.jpg', '../public/images/User_uploads/pradeepchaudharysign.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `personaldetails`
--

CREATE TABLE IF NOT EXISTS `personaldetails` (
  `userID` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `fathersName` varchar(50) NOT NULL,
  `mothersName` varchar(50) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `maritalStatus` varchar(20) NOT NULL,
  `handicapped` tinyint(1) NOT NULL,
  `community` varchar(20) NOT NULL,
  `minority` tinyint(1) NOT NULL,
  `feeremission` tinyint(1) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userid` (`userID`),
  KEY `userid_2` (`userID`),
  KEY `userid_3` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for personal data only.';

--
-- Dumping data for table `personaldetails`
--

INSERT INTO `personaldetails` (`userID`, `firstName`, `lastName`, `dob`, `age`, `fathersName`, `mothersName`, `religion`, `sex`, `nationality`, `maritalStatus`, `handicapped`, `community`, `minority`, `feeremission`) VALUES
(2, 'admin', 'admin', '0000-00-00', 18, 'admin', 'admin', 'admin', 'male', 'indian', 'married', 0, 'gen', 0, 0),
(25439, 'user', 'user', '1987-07-19', 26, 'user', 'user', '', '', '', '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `secure_login`
--

CREATE TABLE IF NOT EXISTS `secure_login` (
  `userID` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`userID`),
  KEY `personId` (`userID`),
  KEY `personId_2` (`userID`),
  KEY `personId_3` (`userID`),
  KEY `personId_4` (`userID`),
  KEY `personId_5` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `secure_login`
--

INSERT INTO `secure_login` (`userID`, `username`, `password`) VALUES
(1, 'pradeep', 'pradeep'),
(2, 'admin', 'admin'),
(30, 'admin', 'admin'),
(31, 'user1', '1234'),
(70, 'user39', 'user'),
(71, 'user40', 'user'),
(72, 'user41', 'user'),
(73, 'user46', 'user'),
(74, 'user47', 'user'),
(75, 'user48', 'user'),
(76, 'user49', 'user'),
(77, 'user50', 'user'),
(78, 'user60', 'user'),
(79, 'user61', 'user'),
(80, 'user62', 'user'),
(81, 'user63', 'user'),
(82, 'user64', 'user'),
(83, 'user65', 'user'),
(84, 'user77', 'user'),
(85, 'user78789', 'user'),
(86, 'user989888877', 'user'),
(87, 'user897', 'user'),
(88, 'user8978', 'user'),
(89, 'user89798798', 'user'),
(90, 'user998777', 'user'),
(91, 'pradeep19', 'pradeep'),
(92, 'user98787897', 'user'),
(93, 'pradeepchaudhary', 'pradeep'),
(94, 'user98765', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_places`
--

CREATE TABLE IF NOT EXISTS `tbl_places` (
  `place_id` int(10) NOT NULL AUTO_INCREMENT,
  `place` varchar(160) NOT NULL,
  `description` varchar(200) NOT NULL,
  `lat` float(15,11) NOT NULL,
  `lng` float(15,11) NOT NULL,
  `userid` bigint(20) NOT NULL,
  PRIMARY KEY (`place_id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `tbl_places`
--

INSERT INTO `tbl_places` (`place_id`, `place`, `description`, `lat`, `lng`, `userid`) VALUES
(38, '', '', 28.66362953186, 77.19783782959, 0),
(39, 'My home', '', 28.64125823975, 77.18049621582, 0),
(40, 'Salwan Public School', 'School', 28.64196586609, 77.18409729004, 0),
(41, 'My Location', '', 28.64164161682, 77.18124389648, 0),
(43, 'Rajendra Nagar Metro Station', 'Closest metro station to my place', 28.64251708984, 77.17814636230, 0),
(44, 'My home', 'This is my home', 28.57241630554, 77.16075134277, 0),
(45, 'My Home', '', 28.38894081116, 79.42965698242, 0),
(46, '', '', 28.38894081116, 79.42965698242, 0),
(47, 'my location', '', 28.38894081116, 79.42965698242, 0),
(48, 'Old Rajendra Nagar Market', 'Old Rajendra Nagar Market', 28.64167022705, 77.18018341064, 0),
(49, 'Old Rajendra Nagar Market', 'Old Rajendra Nagar Market', 28.64167022705, 77.18018341064, 0),
(50, 'Old Rajendra Nagar Market', 'Old Rajendra Nagar Market', 28.64168930054, 77.18018341064, 0),
(51, 'Karol Bagh Telephone Exchange', 'Karol Bagh Telephone Exchange', 28.64311027527, 77.18203735352, 0),
(52, 'hello', 'hello', 28.64195251465, 77.18026733398, 0),
(53, 'HBS', 'HBS', 28.64276123047, 77.17897033691, 32498),
(54, 'BLK', 'Hospital', 28.64340209961, 77.18009948730, 31043),
(55, 'Cartel Palace', 'CP', 28.64510726929, 77.18276977539, 20586),
(56, 'IFFCO', 'IFFCO', 28.64519119263, 77.17736053467, 14683),
(57, 'HLH', 'Hotel', 28.64375114441, 77.18247985840, 68),
(58, 'Rajendra Bhawan', 'RB', 28.64331817627, 77.17746734619, 68),
(59, 'user38', '38', 28.64164161682, 77.18124389648, 69),
(60, 'user46', '46', 28.64164161682, 77.18124389648, 73),
(61, 'user60', 'user60', 28.64164161682, 77.18124389648, 78),
(62, 'user61', 'user61', 28.64322280884, 77.18242645264, 79),
(63, 'user64', 'USER64', 28.64291191101, 77.18363952637, 82),
(64, 'my home', '', 28.34709548950, 79.43661499023, 86),
(65, 'Current address', 'New Delhi', 28.64164161682, 77.18124389648, 93);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails_test`
--

CREATE TABLE IF NOT EXISTS `userdetails_test` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userID` bigint(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userdetails_test_userID_idx` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25444 ;

--
-- Dumping data for table `userdetails_test`
--

INSERT INTO `userdetails_test` (`id`, `userID`, `firstname`, `lastname`, `birthdate`, `age`) VALUES
(1, 1, 'Pradeep', 'Chaudhary', '1987-07-19', 26),
(2, 2, 'Admin', 'User', '1987-08-06', 26),
(13231, 13231, 'Pradeep', 'Chaudhary', '1987-07-19', 26),
(25399, 25399, 'Pradeep', 'Chaudhary', '0000-00-00', 26),
(25400, 3909, 'Pradeep', 'Chaudhary', '0000-00-00', 26),
(25401, 23499, 'Pradeep', 'Chaudhary', '0000-00-00', 26),
(25402, 8104, 'Pradeep', 'Chaudhary', '0000-00-00', 26),
(25403, 23233, 'Pradeep', 'Chaudhary', '0000-00-00', 26),
(25404, 8806, 'Pradeep', 'Chaudhary', '0000-00-00', 26),
(25405, 27047, 'Pradeep', 'Chaudhary', '0000-00-00', 26),
(25406, 3668, 'Pradeep', 'Chaudhary', '0000-00-00', 26),
(25407, 58, 'Pradeep', 'Chaudhary', '1987-07-19', 26),
(25408, 60, 'Pradeep', 'Chaudhary', '1987-07-19', 26),
(25419, 70, 'user', 'user', '1988-09-09', 18),
(25420, 71, 'user40', 'user', '1988-09-09', 18),
(25421, 72, 'user41', 'user', '1988-09-09', 17),
(25422, 73, 'user46', 'user', '1988-09-09', 18),
(25423, 2, 'admin2', 'user', '1988-09-19', 2),
(25424, 835, 'usercheck', 'user', '1988-09-09', 17),
(25425, 75, 'user48', 'user', '1988-09-09', 18),
(25426, 75, 'usercheck', 'user', '1988-09-19', 44),
(25427, 76, 'usercheck2', 'user', '1988-09-19', 2),
(25428, 77, 'user50', 'user', '1988-09-19', 18),
(25429, 78, 'user60', 'user', '1988-09-09', 18),
(25430, 79, 'user61', 'user', '1988-09-19', 17),
(25431, 80, 'user62', 'user', '1988-09-19', 18),
(25432, 81, 'user63', 'user', '1988-09-19', 18),
(25433, 82, 'user64', 'user', '1988-09-09', 26),
(25434, 83, 'user65', 'user', '1988-09-09', 18),
(25435, 87, 'user897', 'user', '1988-09-09', 18),
(25436, 93, 'Pradeep', 'Chaudhary', '1988-09-19', 26),
(25437, 94, 'user98765', 'user', '1987-12-18', 26),
(25438, 94, 'user98765', 'user', '1987-01-01', 26),
(25439, 94, 'user98765', 'user', '1987-01-01', 26),
(25440, 94, 'user98765', 'user', '2014-01-29', 22),
(25441, 94, 'user98765', 'user', '2014-01-29', 22),
(25442, 2, 'Admin', 'Modified User', '1987-08-06', 26),
(25443, 2, 'Admin', 'Modified User', '1987-08-06', 26);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE IF NOT EXISTS `user_address` (
  `placeID` bigint(20) NOT NULL AUTO_INCREMENT,
  `userID` bigint(20) NOT NULL,
  `caddl1` varchar(50) NOT NULL,
  `caddl2` varchar(50) NOT NULL,
  `ccity` varchar(30) NOT NULL,
  `cstate` varchar(30) NOT NULL,
  `cpincode` int(11) NOT NULL,
  `ccountry` varchar(30) NOT NULL,
  `paddl1` varchar(50) NOT NULL,
  `paddl2` varchar(50) NOT NULL,
  `pcity` varchar(30) NOT NULL,
  `pstate` varchar(30) NOT NULL,
  `ppincode` int(11) NOT NULL,
  `pcountry` varchar(30) NOT NULL,
  `lat` float NOT NULL,
  `long` float NOT NULL,
  PRIMARY KEY (`placeID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE IF NOT EXISTS `user_education` (
  `userID` bigint(20) NOT NULL,
  `EduID` bigint(20) NOT NULL,
  `classDegree` varchar(50) NOT NULL,
  `boardUniv` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `percentage` float(3,3) NOT NULL,
  `subjects` varchar(500) NOT NULL,
  UNIQUE KEY `userid` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
