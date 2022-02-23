-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 27, 2020 at 05:37 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

DROP TABLE IF EXISTS `donation`;
CREATE TABLE IF NOT EXISTS `donation` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `donner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `donation_patient_name` varchar(100) NOT NULL,
  `donation_date` varchar(30) NOT NULL,
  PRIMARY KEY (`donation_id`),
  KEY `donation_donner_fk` (`donner_id`),
  KEY `donation_user_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donner`
--

DROP TABLE IF EXISTS `donner`;
CREATE TABLE IF NOT EXISTS `donner` (
  `donner_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `donner_id_num` varchar(30) NOT NULL,
  `donner_name` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `registration_date` varchar(30) NOT NULL,
  `donner_present_address` varchar(200) NOT NULL,
  `donner_parmanent_address` varchar(200) NOT NULL,
  PRIMARY KEY (`donner_id`),
  UNIQUE KEY `donner_id_num` (`donner_id_num`),
  KEY `donner_user_fk` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donner`
--

INSERT INTO `donner` (`donner_id`, `user_id`, `donner_id_num`, `donner_name`, `mobile_number`, `email_address`, `blood_group`, `department_name`, `registration_date`, `donner_present_address`, `donner_parmanent_address`) VALUES
(1, 1, '2015', 'df', '01621000361', 'df@gmail.com', 'B+', 'mis', '11:26 AM. 25-Feb-20', 'g', 'g'),
(2, 1, '2016', 'test', '016', 'srmilton@gmail.com', 'A-', 'mis', '12:36 PM. 25-Feb-20', 'h', 'h'),
(3, 1, '2017', 'Milton Hossain', '01621000362', 'srmilton@gmail.com', 'B+', 'Mis', '12:47 PM. 25-Feb-20', 'f', 'f'),
(4, 1, '2018', 'Milton Hossain', '01621000363', 'sr@gmail.com', 'A+', 'MIS', '12-12-12', 'Test', 'test'),
(6, 1, '2019', 'Milton Hossain', '01621000364', 'sr@gmail.com', 'A+', 'MIS', '12-12-12', 'Test', 'test'),
(8, 1, '2020', 'Milton ', '01621000364', 'sr@gmail.com', 'A+', 'MIS', '02:54 PM. 25-Feb-20', 'Test', 'test'),
(9, 1, '2021', 'Milton Hossain', '01621000364', 'sr@gmail.com', 'A+', 'MIS', '12-12-12', 'Test', 'test'),
(10, 1, '20132', 'Abir', '01621521', 'abir@gmail.com', 'A+', 'MIS', '09:59 PM. 27-Feb-20', 'test', 'test\r\n'),
(11, 1, '2016125', 'Abir', 'test', 'test@gmail.com', 'B+', 'test', '10:00 PM. 27-Feb-20', 'test', 'test'),
(12, 1, '12', 'test', '01212', 'test1@gmail.com', 'B-', 'Mis', '10:00 PM. 27-Feb-20', 'test', 'test'),
(13, 1, '210', 'tewst', 'te', 'test@gmail.com', 'B+', 'test', '10:02 PM. 27-Feb-20', 'test', 'test'),
(14, 1, '201521', 'Khan', '01721', 'khan@gmail.com', 'AB+', 'test', '11:36 PM. 27-Feb-20', 't', 't');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_num` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_mobile` varchar(15) NOT NULL,
  `user_department` varchar(50) NOT NULL,
  `user_designation` varchar(50) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL,
  `user_reg_date` varchar(30) NOT NULL,
  `user_image` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_mobile` (`user_mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_id_num`, `user_name`, `user_email`, `user_mobile`, `user_department`, `user_designation`, `user_password`, `user_type`, `user_status`, `user_reg_date`, `user_image`) VALUES
(1, 239, 'Milton Khan', 'srmiltonkhan@gmail.com', '01621000361', 'Information Technology', 'IT Engineer', '$2y$10$0Yo2F.EetL3yhB8l6MNvcOH8AYNS0SuXLOoAQr1qXJa3uPASWV0NC', 'master', 'Active', '10-Feb-2019', 'milton.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_donner_fk` FOREIGN KEY (`donner_id`) REFERENCES `donner` (`donner_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donation_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `donner`
--
ALTER TABLE `donner`
  ADD CONSTRAINT `donner_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
