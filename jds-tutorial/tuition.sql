-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2017 at 02:45 PM
-- Server version: 5.1.69
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tuition`
--
CREATE DATABASE IF NOT EXISTS `tuition` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `tuition`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `email`, `password`, `photo`) VALUES
(1, 'AV', 'admin', '1234', '2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `branch_mst`
--

DROP TABLE IF EXISTS `branch_mst`;
CREATE TABLE IF NOT EXISTS `branch_mst` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_area` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone_no1` varchar(13) NOT NULL,
  `phone_no2` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `branch_mst`
--

INSERT INTO `branch_mst` (`branch_id`, `branch_area`, `address`, `phone_no1`, `phone_no2`, `email`) VALUES
(3, 'Mumbai', 'Fort, Mumbai', '022-12345678', '022-16547899', 'mumbai@mediamaggi.com'),
(4, 'Thane', 'Charai, Thane', '022-12345678', '022-16547899', 'thane@mediamaggi.com');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_mst`
--

DROP TABLE IF EXISTS `faculty_mst`;
CREATE TABLE IF NOT EXISTS `faculty_mst` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(250) NOT NULL,
  `experience` varchar(250) NOT NULL,
  `degree` varchar(250) NOT NULL,
  `achievment` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `active` bit(1) NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `faculty_mst`
--

INSERT INTO `faculty_mst` (`faculty_id`, `faculty_name`, `experience`, `degree`, `achievment`, `description`, `email`, `password`, `photo`, `contact_no`, `gender`, `active`) VALUES
(9, 'Mr. ABC2', '52', 'MCA2', 'test2', ' Test2', 'test@gmail.com', '123456', 'Mr__ABC2_1503414549.jpeg', '98712347892', 'Male', b'1'),
(16, 'Ranajit Basu', '10', 'MA', 'Gold Medal', ' Hello there,', 'ranajit@gmail.com', 'abc123', 'Ranajit_Basu_1504233585.jpeg', '9874563210', 'Male', b'1'),
(17, 'nirav', '14', 'MCA', 'NA', ' Nice sir, Testing faculty login', 'nirav.ahm@gmail.com', '123456', 'nirav_1504945219.jpeg', '7710097733', 'Male', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_std_sub`
--

DROP TABLE IF EXISTS `faculty_std_sub`;
CREATE TABLE IF NOT EXISTS `faculty_std_sub` (
  `faculty_std_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `standard_id` int(11) NOT NULL,
  `subjects` varchar(250) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`faculty_std_sub_id`),
  KEY `faculty_std_sub_std` (`standard_id`),
  KEY `faculty_std_sub_fk` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=35 ;

--
-- Dumping data for table `faculty_std_sub`
--

INSERT INTO `faculty_std_sub` (`faculty_std_sub_id`, `faculty_id`, `standard_id`, `subjects`) VALUES
(25, 16, 1, 'English,Maths,Science'),
(26, 16, 2, 'Maths,English,History'),
(27, 16, 8, 'Civics2'),
(29, 9, 1, 'English,Maths,Science'),
(30, 9, 2, 'Maths,English,History'),
(31, 9, 3, 'Science,Maths'),
(32, 9, 6, 'History'),
(33, 17, 1, 'English,Maths,Science');

-- --------------------------------------------------------

--
-- Table structure for table `result_mst`
--

DROP TABLE IF EXISTS `result_mst`;
CREATE TABLE IF NOT EXISTS `result_mst` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `roll_no` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `standard_id` int(11) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `marks` varchar(250) NOT NULL,
  PRIMARY KEY (`result_id`),
  KEY `sub_id` (`subject`),
  KEY `stud_id` (`roll_no`),
  KEY `result_test` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=185 ;

--
-- Dumping data for table `result_mst`
--

INSERT INTO `result_mst` (`result_id`, `roll_no`, `test_id`, `standard_id`, `subject`, `marks`) VALUES
(32, 123, 1, 1, 'Hindi', '60/100'),
(35, 123, 1, 1, 'History', '90/100'),
(38, 123, 1, 1, 'Maths', '80/100'),
(41, 123, 1, 1, 'Science', '70/100'),
(47, 123, 2, 1, 'English', '80/100'),
(50, 123, 2, 1, 'Maths', '75/100'),
(59, 123, 2, 1, 'Geography', '90/100'),
(62, 123, 2, 1, 'Science', '90/100'),
(85, 123, 26, 1, 'English', '90/100'),
(96, 1, 27, 4, 'Hindi', '80/100'),
(97, 2, 27, 4, 'Hindi', '90/100'),
(98, 3, 27, 4, 'Hindi', '67/100'),
(99, 4, 27, 4, 'Hindi', '67/100'),
(100, 5, 27, 4, 'Hindi', '69/100'),
(101, 6, 27, 4, 'Hindi', '55/100'),
(102, 7, 27, 4, 'Hindi', '22/100'),
(103, 8, 27, 4, 'Hindi', '00/100'),
(104, 9, 27, 4, 'Hindi', '01/100'),
(105, 10, 27, 4, 'Hindi', '23/100'),
(116, 1, 29, 3, 'Maths', '11'),
(117, 2, 29, 3, 'Maths', '12'),
(118, 3, 29, 3, 'Maths', '13'),
(119, 4, 29, 3, 'Maths', '14'),
(120, 11, 30, 2, 'English', '30/100'),
(121, 12, 30, 2, 'English', '40/100'),
(122, 111, 30, 2, 'English', '50/100'),
(123, 1111, 30, 2, 'English', '60/100'),
(124, 11111, 30, 2, 'English', '70/100'),
(125, 11, 31, 2, 'English', '30/100'),
(126, 12, 31, 2, 'English', '40/100'),
(127, 111, 31, 2, 'English', '50/100'),
(128, 1111, 31, 2, 'English', '60/100'),
(129, 11111, 31, 2, 'English', '70/100'),
(132, 123, 28, 3, 'Maths', '65/100'),
(133, 11, 32, 3, 'Maths', '30/100'),
(134, 12, 32, 3, 'Maths', '40/100'),
(135, 111, 32, 3, 'Maths', '50/100'),
(136, 1111, 32, 3, 'Maths', '60/100'),
(137, 11111, 32, 3, 'Maths', '70/100'),
(138, 11, 33, 2, 'English', '30/100'),
(139, 12, 33, 2, 'English', '40/100'),
(140, 111, 33, 2, 'English', '50/100'),
(141, 1111, 33, 2, 'English', '60/100'),
(142, 11111, 33, 2, 'English', '70/100'),
(143, 11, 34, 2, 'English', '30/100'),
(144, 12, 34, 2, 'English', '40/100'),
(145, 111, 34, 2, 'English', '50/100'),
(146, 1111, 34, 2, 'English', '60/100'),
(147, 11111, 34, 2, 'English', '70/100'),
(149, 159, 1, 1, 'Hindi', '50/100'),
(150, 159, 1, 1, 'History', '100/100'),
(151, 159, 1, 1, 'Maths', '70/100'),
(152, 159, 1, 1, 'Science', '90/100'),
(153, 159, 2, 1, 'English', '50/100'),
(154, 159, 2, 1, 'Maths', '65/100'),
(155, 159, 2, 1, 'Geography', '80/100'),
(156, 159, 2, 1, 'Science', '70/100'),
(157, 159, 26, 1, 'English', '70/100'),
(161, 123, 35, 1, 'English', '55 / 100'),
(162, 55, 35, 1, 'English', '100 / 100'),
(163, 159, 35, 1, 'English', '99/100'),
(164, 0, 36, 4, 'Hindi', '42937'),
(165, 0, 36, 4, 'Hindi', '42635'),
(166, 0, 36, 4, 'Hindi', '42637'),
(167, 0, 36, 4, 'Hindi', '42637'),
(168, 0, 36, 4, 'Hindi', '42638'),
(169, 0, 36, 4, 'Hindi', '42638'),
(170, 0, 36, 4, 'Hindi', '42639'),
(171, 0, 36, 4, 'Hindi', '42639'),
(172, 0, 36, 4, 'Hindi', '42639'),
(173, 525, 1, 1, 'English', '70/100'),
(174, 1234, 1, 1, 'English', '90/100'),
(175, 123, 1, 1, 'English', '70/100'),
(176, 55, 37, 1, 'English', '50/100'),
(177, 123, 37, 1, 'English', '99/100'),
(178, 159, 37, 1, 'English', '75/100'),
(179, 55, 38, 1, 'English', '75/100'),
(180, 123, 38, 1, 'English', '98/100'),
(181, 159, 38, 1, 'English', '65/100'),
(182, 55, 39, 1, 'Maths', '75/100'),
(183, 123, 39, 1, 'Maths', '98/100'),
(184, 159, 39, 1, 'Maths', '65/100');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_mst`
--

DROP TABLE IF EXISTS `schedule_mst`;
CREATE TABLE IF NOT EXISTS `schedule_mst` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_id` varchar(100) NOT NULL,
  `standard` varchar(100) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `day` int(11) NOT NULL,
  PRIMARY KEY (`schedule_id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=243 ;

--
-- Dumping data for table `schedule_mst`
--

INSERT INTO `schedule_mst` (`schedule_id`, `sub_id`, `standard`, `start_time`, `end_time`, `day`) VALUES
(1, 'English', '2', '10', '2', 1),
(2, 'hindi ', '2', '7', '8', 1),
(3, 'hindi ', '2', '7', '8', 1),
(4, 'hindi ', '2', '10', '2', 1),
(5, 'hindi ', '2', '7', '8', 1),
(6, 'hindi ', '2', '7', '8', 1),
(7, 'hindi ', '2', '', '', 1),
(8, 'hindi ', '2', '', '', 1),
(9, 'hindi ', '2', '', '', 1),
(10, 'hindi ', '2', '', '', 1),
(11, 'hindi ', '2', '', '', 1),
(12, 'hindi ', '2', '', '', 1),
(13, 'hindi ', '2', '', '', 1),
(14, 'hindi ', '2', '', '', 1),
(15, 'hindi ', '2', '', '', 1),
(16, 'hindi ', '2', '', '', 1),
(17, 'hindi ', '2', '', '', 1),
(18, 'hindi ', '2', '', '', 1),
(19, 'hindi ', '2', '', '', 1),
(20, 'hindi ', '2', '', '', 1),
(21, 'hindi ', '2', '', '', 1),
(22, 'hindi ', '2', '', '', 1),
(23, 'hindi ', '2', '', '', 1),
(24, 'hindi ', '2', '', '', 1),
(25, 'hindi ', '2', '', '', 1),
(26, 'hindi ', '2', '', '', 1),
(27, 'hindi ', '2', '', '', 1),
(28, 'hindi ', '2', '', '', 1),
(29, 'hindi ', '2', '', '', 1),
(30, 'hindi ', '2', '', '', 1),
(31, 'hindi ', '2', '', '', 1),
(32, 'hindi ', '2', '', '', 1),
(33, 'hindi ', '2', '', '', 1),
(34, 'hindi ', '2', '', '', 1),
(35, 'hindi ', '2', '', '', 1),
(36, 'hindi ', '2', '', '', 1),
(37, 'hindi ', '2', '', '', 1),
(38, 'hindi ', '2', '', '', 1),
(39, 'hindi ', '2', '', '', 1),
(40, 'hindi ', '2', '', '', 1),
(41, 'hindi ', '2', '', '', 1),
(42, 'hindi ', '2', '', '', 1),
(43, 'hindi ', '2', '', '', 1),
(44, 'hindi ', '2', '', '', 1),
(45, 'hindi ', '2', '', '', 1),
(46, 'hindi ', '2', '', '', 1),
(47, 'hindi ', '2', '', '', 1),
(48, 'hindi ', '2', '', '', 1),
(195, ' hindi 777 ', '4', '7', '8', 1),
(196, ' hindi 777 ', '4', '7', '8', 1),
(197, ' hindi 777 ', '4', '7', '8', 1),
(198, ' hindi 777 ', '4', '7', '8', 1),
(199, ' hindi 777 ', '4', '7', '8', 1),
(200, ' hindi 777 ', '4', '7', '8', 1),
(201, 'Gujarti ', '4', '8', '9', 1),
(202, 'Gujarti ', '4', '8', '9', 1),
(203, 'Gujarti ', '4', '8', '9', 1),
(204, 'Gujarti ', '4', '8', '9', 1),
(205, 'Gujarti ', '4', '8', '9', 1),
(206, ' hindi 777 ', '4', '8', '9', 1),
(207, ' hindi 777 ', '4', '', '', 1),
(208, ' hindi 777 ', '4', '', '', 1),
(209, ' hindi 777 ', '4', '', '', 1),
(210, ' hindi 777 ', '4', '', '', 1),
(211, ' hindi 777 ', '4', '', '', 1),
(212, ' hindi 777 ', '4', '', '', 1),
(213, ' hindi 777 ', '4', '', '', 1),
(214, ' hindi 777 ', '4', '', '', 1),
(215, ' hindi 777 ', '4', '', '', 1),
(216, ' hindi 777 ', '4', '', '', 1),
(217, ' hindi 777 ', '4', '', '', 1),
(218, ' hindi 777 ', '4', '', '', 1),
(219, ' hindi 777 ', '4', '', '', 1),
(220, ' hindi 777 ', '4', '', '', 1),
(221, ' hindi 777 ', '4', '', '', 1),
(222, ' hindi 777 ', '4', '', '', 1),
(223, ' hindi 777 ', '4', '', '', 1),
(224, ' hindi 777 ', '4', '', '', 1),
(225, ' hindi 777 ', '4', '', '', 1),
(226, ' hindi 777 ', '4', '', '', 1),
(227, ' hindi 777 ', '4', '', '', 1),
(228, ' hindi 777 ', '4', '', '', 1),
(229, ' hindi 777 ', '4', '', '', 1),
(230, ' hindi 777 ', '4', '', '', 1),
(231, ' hindi 777 ', '4', '', '', 1),
(232, ' hindi 777 ', '4', '', '', 1),
(233, ' hindi 777 ', '4', '', '', 1),
(234, ' hindi 777 ', '4', '', '', 1),
(235, ' hindi 777 ', '4', '', '', 1),
(236, ' hindi 777 ', '4', '', '', 1),
(237, ' hindi 777 ', '4', '', '', 1),
(238, ' hindi 777 ', '4', '', '', 1),
(239, ' hindi 777 ', '4', '', '', 1),
(240, ' hindi 777 ', '4', '', '', 1),
(241, ' hindi 777 ', '4', '', '', 1),
(242, ' hindi 777 ', '4', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `standard_mst`
--

DROP TABLE IF EXISTS `standard_mst`;
CREATE TABLE IF NOT EXISTS `standard_mst` (
  `standard_id` int(11) NOT NULL AUTO_INCREMENT,
  `standard` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`standard_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `standard_mst`
--

INSERT INTO `standard_mst` (`standard_id`, `standard`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th'),
(5, '5th'),
(6, '6th'),
(7, '7th'),
(8, '8th'),
(9, '9th'),
(10, '10th'),
(11, '11th'),
(12, '12th'),
(17, '12th science ');

-- --------------------------------------------------------

--
-- Table structure for table `student_mst`
--

DROP TABLE IF EXISTS `student_mst`;
CREATE TABLE IF NOT EXISTS `student_mst` (
  `stud_id` int(11) NOT NULL AUTO_INCREMENT,
  `roll_no` int(11) NOT NULL,
  `stud_name` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `standard_id` int(11) DEFAULT NULL,
  `subject` varchar(250) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `contact_no` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  PRIMARY KEY (`stud_id`),
  UNIQUE KEY `unique_roll_std` (`roll_no`,`standard_id`),
  KEY `sub_id` (`subject`),
  KEY `branch_id` (`branch_id`),
  KEY `standard_id` (`standard_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `student_mst`
--

INSERT INTO `student_mst` (`stud_id`, `roll_no`, `stud_name`, `school_name`, `branch_id`, `standard_id`, `subject`, `email_id`, `password`, `photo`, `contact_no`, `gender`) VALUES
(1, 123, 'Student 1', 'School', 3, 1, 'Geometry', 'test@gmail.com', 'abc123', 'Student_1_.jpeg', '1234567890', 'Male'),
(15, 1234, 'Darshan', 'St. George School', 3, 3, 'Science', 'mumbai@mediamaggi.com', 'abc123', 'Darshan_.jpeg', '9867123412', 'Male'),
(17, 525, 'nirav', 'swastik', 3, 10, 'English,Maths', 'mumbai@mediamaggi.com', '123456', NULL, '7710097733', 'Male'),
(29, 159, 'Tester', 'St. George School', 3, 1, 'Maths,English,History', 'darshan@gmail.com', 'abc123', NULL, '9867123412', 'Male'),
(31, 55, 'nirav_stu', 'swastik', 3, 1, 'English,Maths,Science,History,Geography,Hindi', 'nirav.ahm1@gmail.com', '123456', NULL, '7710097733', 'Male'),
(44, 1987, 'Tester', 'St. George School', 3, 1, 'English', 'test2@gmail.com', 'abc123', NULL, '9867123412', 'Male'),
(45, 100, 'rajesh', 'mount litra', 3, 4, 'Hindi', 'sbj.jalla@gmail.com', '123', 'rajesh_1504105468.jpeg', '8989822288', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `subject_mst`
--

DROP TABLE IF EXISTS `subject_mst`;
CREATE TABLE IF NOT EXISTS `subject_mst` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(100) NOT NULL,
  `standard_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `standard_id` (`standard_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `subject_mst`
--

INSERT INTO `subject_mst` (`sub_id`, `sub_name`, `standard_id`) VALUES
(19, 'English', 1),
(20, 'Maths', 2),
(21, 'Science', 3),
(22, 'Hindi', 4),
(24, 'Gujarati', 5),
(25, 'History', 6),
(26, 'Geography', 7),
(27, 'Civics2', 8),
(28, 'Algebra', 9),
(29, 'Geometry', 10),
(30, 'Commerce', 11),
(31, 'Arts', 12),
(32, 'Maths', 1),
(34, 'English', 2),
(37, 'Science', 1),
(40, 'Maths', 3),
(49, 'History', 2),
(50, 'History', 1),
(51, 'Geography', 1),
(52, 'Hindi', 1),
(53, 'physics', 12),
(54, 'Science', 2),
(55, 'Hindi', 2),
(56, 'physics', 17),
(57, 'CHEMISTRY', 17);

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_mst`
--

DROP TABLE IF EXISTS `syllabus_mst`;
CREATE TABLE IF NOT EXISTS `syllabus_mst` (
  `syllabus_id` int(11) NOT NULL AUTO_INCREMENT,
  `standard_id` int(11) NOT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `syllabus` varchar(100) NOT NULL,
  PRIMARY KEY (`syllabus_id`),
  KEY `standard_id` (`standard_id`),
  KEY `sub_id` (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `syllabus_mst`
--

INSERT INTO `syllabus_mst` (`syllabus_id`, `standard_id`, `sub_id`, `syllabus`) VALUES
(9, 2, 34, '2nd_English.pdf'),
(10, 1, 32, '1st_Maths_1.pdf'),
(11, 3, 21, '3rd_Science1.pdf'),
(12, 2, 20, '2nd_Maths.pdf'),
(15, 5, 24, '5th_Gujarati.pdf'),
(18, 17, 57, '12th_science__CHEMISTRY.pdf'),
(19, 17, 56, '12th_science__physics.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `test_mst`
--

DROP TABLE IF EXISTS `test_mst`;
CREATE TABLE IF NOT EXISTS `test_mst` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=40 ;

--
-- Dumping data for table `test_mst`
--

INSERT INTO `test_mst` (`test_id`, `test_name`) VALUES
(1, 'Test 1'),
(2, 'Test 2'),
(3, 'Test 3'),
(25, 'Test 4'),
(26, 'Test 4'),
(27, 'test 10'),
(28, 'Test maths'),
(29, '_maths'),
(30, 'open'),
(31, 'Test 1'),
(32, 'Test 1'),
(33, 'test'),
(34, 'test 4'),
(35, 'nirav_test1'),
(36, 'demo1'),
(37, 'test2'),
(38, 'test3'),
(39, 'Maths1');

-- --------------------------------------------------------

--
-- Table structure for table `topper_mst`
--

DROP TABLE IF EXISTS `topper_mst`;
CREATE TABLE IF NOT EXISTS `topper_mst` (
  `topper_id` int(11) NOT NULL AUTO_INCREMENT,
  `year_id` int(11) NOT NULL,
  `standard_id` int(11) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `student_name` varchar(250) NOT NULL,
  `result` varchar(250) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`topper_id`),
  KEY `year_id` (`year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `topper_mst`
--

INSERT INTO `topper_mst` (`topper_id`, `year_id`, `standard_id`, `subject`, `student_name`, `result`, `photo`) VALUES
(18, 18, 12, 'PCM', 'Darshan', '198/200', 'tpper1503128649.jpeg'),
(19, 18, 12, 'PCM', 'Sagar', '199/200', 'tpper1503130924.jpeg'),
(20, 17, 10, 'Maths', 'John Mathew', '97/100', NULL),
(24, 18, 10, 'Maths', 'Azhar', '88', 'tpper1503467656.jpeg'),
(25, 17, 9, 'English', 'Kapadia', '98', 'tpper1503467732.jpeg'),
(26, 17, 8, 'History', 'Az', '99', 'tpper1503467767.jpeg'),
(29, 18, 9, '', 'nirav', '99%', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topper_year_mst`
--

DROP TABLE IF EXISTS `topper_year_mst`;
CREATE TABLE IF NOT EXISTS `topper_year_mst` (
  `year_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(100) NOT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `topper_year_mst`
--

INSERT INTO `topper_year_mst` (`year_id`, `year`) VALUES
(16, '2014-15'),
(17, '2015-16'),
(18, '2016-17');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty_std_sub`
--
ALTER TABLE `faculty_std_sub`
  ADD CONSTRAINT `faculty_std_sub_fk` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_mst` (`faculty_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `faculty_std_sub_std` FOREIGN KEY (`standard_id`) REFERENCES `standard_mst` (`standard_id`);

--
-- Constraints for table `result_mst`
--
ALTER TABLE `result_mst`
  ADD CONSTRAINT `result_test` FOREIGN KEY (`test_id`) REFERENCES `test_mst` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_mst`
--
ALTER TABLE `student_mst`
  ADD CONSTRAINT `student_branch` FOREIGN KEY (`branch_id`) REFERENCES `branch_mst` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_mst_ibfk_1` FOREIGN KEY (`standard_id`) REFERENCES `standard_mst` (`standard_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `subject_mst`
--
ALTER TABLE `subject_mst`
  ADD CONSTRAINT `subject_mst_ibfk_1` FOREIGN KEY (`standard_id`) REFERENCES `standard_mst` (`standard_id`) ON DELETE CASCADE;

--
-- Constraints for table `syllabus_mst`
--
ALTER TABLE `syllabus_mst`
  ADD CONSTRAINT `syllabus_standard` FOREIGN KEY (`standard_id`) REFERENCES `standard_mst` (`standard_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `syllabus_subject` FOREIGN KEY (`sub_id`) REFERENCES `subject_mst` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topper_mst`
--
ALTER TABLE `topper_mst`
  ADD CONSTRAINT `topper_mst_ibfk_1` FOREIGN KEY (`year_id`) REFERENCES `topper_year_mst` (`year_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
