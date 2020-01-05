-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2020 at 04:37 PM
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
-- Database: `clinical_database`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `altered_mentation` int(2) NOT NULL,
  `date_of_entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`vital_info_no`),
  KEY `foreign_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
