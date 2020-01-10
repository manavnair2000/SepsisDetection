-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2020 at 04:19 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_bank`
--
CREATE DATABASE IF NOT EXISTS `book_bank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `book_bank`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `bookNo` int(10) NOT NULL AUTO_INCREMENT,
  `bookName` varchar(100) NOT NULL,
  `vendorID` int(10) NOT NULL,
  `BookISBN` int(15) NOT NULL,
  `bookPrice` int(5) NOT NULL,
  `bookFile` varchar(20) NOT NULL,
  PRIMARY KEY (`bookNo`),
  KEY `vendorID` (`vendorID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookNo`, `bookName`, `vendorID`, `BookISBN`, `bookPrice`, `bookFile`) VALUES
(1, 'How to be a Bwase', 1, 341984929, 29, 'img1.jpg'),
(2, 'How to write a book..', 2, 326786327, 45, 'img2.jpg'),
(3, '7-day self publish...', 1, 67328631, 65, 'img3.jpg'),
(4, 'Keepers of the kalachakara', 2, 647846732, 78, 'r1.jpg'),
(5, 'Fisher Queen\'s Dynasty', 2, 321345212, 56, 'r2.jpg'),
(6, 'Zero Sum', 1, 4565427, 99, 'r3.jpg'),
(7, 'PS from Paris', 2, 3345335, 88, 'r4.jpg'),
(8, 'Trust me not', 1, 5666356, 88, 'r5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `book_order`
--

DROP TABLE IF EXISTS `book_order`;
CREATE TABLE IF NOT EXISTS `book_order` (
  `orderNo` int(10) NOT NULL AUTO_INCREMENT,
  `orderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orderName` varchar(100) NOT NULL,
  `bookNo` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`orderNo`),
  KEY `userID` (`userID`),
  KEY `book_order_ibfk_1` (`bookNo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_order`
--

INSERT INTO `book_order` (`orderNo`, `orderDate`, `orderName`, `bookNo`, `userID`) VALUES
(1, '2019-10-06 14:28:14', 'How to write a book..', 2, 1),
(2, '2019-10-06 16:08:47', 'Keepers of the kalachakara', 4, 1),
(3, '2019-10-06 16:30:26', 'PS from Paris', 7, 1),
(4, '2019-10-08 22:43:04', '7-day self publish...', 3, 1),
(5, '2019-10-08 22:47:27', 'How to write a book..', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userName` varchar(30) NOT NULL,
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userName`, `userID`, `password`) VALUES
('manav', 1, 'manav');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `vendorID` int(10) NOT NULL AUTO_INCREMENT,
  `vendorName` varchar(20) NOT NULL,
  `vendorAddress` varchar(100) NOT NULL,
  PRIMARY KEY (`vendorID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `vendorName`, `vendorAddress`) VALUES
(1, 'Manav', 'Flat E,Uniqcare Aswathi Apts'),
(2, 'Krishnakanth', 'Plot 23/45,Jain Apts');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`vendorID`) REFERENCES `vendor` (`vendorID`);

--
-- Constraints for table `book_order`
--
ALTER TABLE `book_order`
  ADD CONSTRAINT `book_order_ibfk_1` FOREIGN KEY (`bookNo`) REFERENCES `book` (`bookNo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `book_order_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- Database: `clinical_database`
--
CREATE DATABASE IF NOT EXISTS `clinical_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clinical_database`;

-- --------------------------------------------------------

--
-- Table structure for table `patient_reg_info`
--

DROP TABLE IF EXISTS `patient_reg_info`;
CREATE TABLE IF NOT EXISTS `patient_reg_info` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(40) NOT NULL,
  `patient_weight` int(11) NOT NULL,
  `patient_height` int(11) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_reg_info`
--

INSERT INTO `patient_reg_info` (`patient_id`, `patient_name`, `patient_weight`, `patient_height`) VALUES
(1, 'Manav', 92, 193),
(3, 'Samhita', 84, 183),
(4, 'jacob', 92, 183);

-- --------------------------------------------------------

--
-- Table structure for table `patient_symptoms`
--

DROP TABLE IF EXISTS `patient_symptoms`;
CREATE TABLE IF NOT EXISTS `patient_symptoms` (
  `patient_id` int(11) NOT NULL,
  `patient_symptoms` varchar(300) NOT NULL,
  KEY `foreign_pid` (`patient_id`),
  KEY `foreign_symp` (`patient_symptoms`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_symptoms`
--

INSERT INTO `patient_symptoms` (`patient_id`, `patient_symptoms`) VALUES
(1, 'Confusion'),
(1, 'Diarrhea'),
(1, 'Dizziness'),
(1, 'Fast Heart Rate'),
(3, 'Confusion'),
(3, 'Diarrhea'),
(3, 'Dizziness'),
(3, 'Fast Heart Rate'),
(3, 'Confusion'),
(3, 'Diarrhea'),
(3, 'Dizziness'),
(3, 'Fast Heart Rate'),
(3, 'Confusion'),
(3, 'Diarrhea'),
(3, 'Dizziness'),
(3, 'Fast Heart Rate'),
(3, 'High Fever');

-- --------------------------------------------------------

--
-- Table structure for table `patient_vital`
--

DROP TABLE IF EXISTS `patient_vital`;
CREATE TABLE IF NOT EXISTS `patient_vital` (
  `vital_info_no` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `sirs_score` int(1) NOT NULL,
  `temperature` int(2) NOT NULL,
  `heart_rate` int(11) NOT NULL,
  `wbc` int(11) NOT NULL,
  `respiratory_rate` int(2) NOT NULL,
  `qSOFA` int(1) NOT NULL,
  `systolic_bp` int(11) NOT NULL,
  `Bilirubin_direct` int(3) NOT NULL,
  `Platelets` int(3) NOT NULL,
  `Magnesium` int(3) NOT NULL,
  `BUN` int(3) NOT NULL,
  `Calcium` int(3) NOT NULL,
  `altered_mentation` int(2) NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`vital_info_no`),
  KEY `foreign_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_vital`
--

INSERT INTO `patient_vital` (`vital_info_no`, `patient_id`, `sirs_score`, `temperature`, `heart_rate`, `wbc`, `respiratory_rate`, `qSOFA`, `systolic_bp`, `Bilirubin_direct`, `Platelets`, `Magnesium`, `BUN`, `Calcium`, `altered_mentation`, `date_of_entry`) VALUES
(1, 1, 3, 98, 37, 11, 24, 2, 33, 0, 0, 0, 0, 0, 15, '2020-01-08 11:53:09'),
(2, 3, 3, 98, 39, 11, 24, 3, 33, 22, 32, 21, 21, 21, 11, '2020-01-09 10:30:05'),
(3, 4, 0, 98, 41, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2020-01-09 10:38:42'),
(4, 3, 3, 98, 36, 11, 32, 2, 120, 22, 32, 21, 21, 21, 14, '2020-01-09 11:02:44'),
(5, 3, 0, 98, 120, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2020-01-09 15:09:43'),
(6, 3, 3, 98, 41, 29, 87, 2, 33, 22, 32, 21, 21, 21, 54, '2020-01-10 09:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `sepsis_symptoms`
--

DROP TABLE IF EXISTS `sepsis_symptoms`;
CREATE TABLE IF NOT EXISTS `sepsis_symptoms` (
  `patient_symptoms` varchar(20) NOT NULL,
  PRIMARY KEY (`patient_symptoms`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sepsis_symptoms`
--

INSERT INTO `sepsis_symptoms` (`patient_symptoms`) VALUES
('Confusion'),
('Diarrhea'),
('Dizziness'),
('Fast heart rate'),
('High Fever'),
('Less consciousness'),
('Muscle Pain'),
('Rapid breathing'),
('Skin discolouration'),
('Unusual sweating');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient_symptoms`
--
ALTER TABLE `patient_symptoms`
  ADD CONSTRAINT `foreign_pid` FOREIGN KEY (`patient_id`) REFERENCES `patient_reg_info` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_symp` FOREIGN KEY (`patient_symptoms`) REFERENCES `sepsis_symptoms` (`patient_symptoms`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_vital`
--
ALTER TABLE `patient_vital`
  ADD CONSTRAINT `foreign_id` FOREIGN KEY (`patient_id`) REFERENCES `patient_reg_info` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
