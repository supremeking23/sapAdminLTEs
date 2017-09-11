-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2017 at 01:25 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sappdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fc_events_table`
--

CREATE TABLE IF NOT EXISTS `fc_events_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `title` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `fc_events_table`
--

INSERT INTO `fc_events_table` (`id`, `start`, `end`, `title`) VALUES
(2, '2017-08-31 00:00:00', '2017-08-31 22:00:00', '3rd checking'),
(3, '2017-08-30 00:00:00', '2017-09-01 00:00:00', 'preparation'),
(4, '2017-08-31 11:00:00', '2017-08-31 14:00:00', 'pista sa nayon'),
(5, '2017-09-01 00:00:00', '2017-09-02 00:00:00', 'edil fitr'),
(12, '2017-08-17 00:00:00', '2017-08-18 00:00:00', 'dsds'),
(13, '2017-08-04 00:00:00', '2017-08-05 00:00:00', 'ayaw'),
(15, '2017-08-11 00:00:00', '2017-08-12 00:00:00', 'dsdsdads'),
(16, '2017-08-09 00:00:00', '2017-08-10 00:00:00', 'sdsds'),
(17, '2017-08-24 00:00:00', '2017-08-25 00:00:00', 'na trade si airforce ellis :('),
(18, '2017-08-13 00:00:00', '2017-08-14 00:00:00', 'dsds'),
(19, '2017-08-14 00:00:00', '2017-08-15 00:00:00', 'dsds'),
(20, '2017-08-01 00:00:00', '2017-08-05 00:00:00', 'dsadas hahahahha');

-- --------------------------------------------------------

--
-- Table structure for table `tbladminmessage`
--

CREATE TABLE IF NOT EXISTS `tbladminmessage` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_sender_email` varchar(45) NOT NULL,
  `message_content` text NOT NULL,
  `date_send` datetime NOT NULL,
  `message_subject` varchar(45) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmins`
--

CREATE TABLE IF NOT EXISTS `tbladmins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_department_id` int(11) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `image` text NOT NULL,
  `contact` varchar(45) NOT NULL,
  `date_birth` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `isActive` int(11) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbladmins`
--

INSERT INTO `tbladmins` (`admin_id`, `admin_department_id`, `last_name`, `first_name`, `middle_name`, `address`, `image`, `contact`, `date_birth`, `email`, `password`, `gender`, `isActive`, `date_added`) VALUES
(1, 1, 'Funcion', 'Ivan Christian Jay', 'Echanes', '520-B 16th ISU Village Barangay 31 South Side', '11200881_1216700208355786_8839516984461419799_n.jpg', '09479888749', '1995-11-23', 'adminivan@gmail.com', 'adminivan', 'Male', 1, '2015-11-23'),
(2, 3, 'Allen', 'Bartholomew Henry', 'East', 'Central City', 'Aristotle_Color.jpg', '434', '1995-11-23', 'barryallen@gmail.com', 'barry', 'Male', 1, '2015-11-23'),
(3, 2, 'West', 'Irish', 'West', 'Central City', 'apple david.jpg', '09687231212', '1993-06-22', 'iriswestallen@gmail.com', 'iris', 'Female', 1, '2015-11-23'),
(4, 7, 'Queen', 'Oliver', 'Robert', 'Starling City', '15267837_1235855576472004_2196598368222274648_n.jpg', '09831238768', '1980-11-10', 'oliverqueen@gmail.com', 'arrow', 'Male', 1, '2015-11-23'),
(5, 3, 'David', 'Apple', 'Mansanas', 'Central City', 'bee.jpg', '09831238768', '1990-06-19', 'appledavid@gmail.com', 'apple', 'Female', 1, '0000-00-00'),
(6, 2, 'Stark', 'Sansa', 'Ten', 'Central City', 'Breakfast-Sandwich-2.jpg', '09831238768', '1996-01-15', 'sansastark@gmail.com', 'sansa', 'Female', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcalendarofactivities`
--

CREATE TABLE IF NOT EXISTS `tblcalendarofactivities` (
  `calendar_activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `share_activity` int(11) NOT NULL,
  PRIMARY KEY (`calendar_activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblcollegeprograms`
--

CREATE TABLE IF NOT EXISTS `tblcollegeprograms` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `program_name` varchar(45) NOT NULL,
  `program_code` varchar(45) NOT NULL,
  `program_description` text NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblcollegeprograms`
--

INSERT INTO `tblcollegeprograms` (`program_id`, `department_id`, `program_name`, `program_code`, `program_description`) VALUES
(1, 2, 'ARTS AND HUMANITIES', 'ARTHUMANS', ''),
(2, 5, 'ASSASINATION', 'ASSASINATE', ''),
(3, 11, 'Marine Transportaion', 'MarTrans', 'Marine Transportation is a 4 year college program offered by the college of marines'),
(4, 3, 'SCIENCE AND ARTE', 'SCIE1', 'science and arte is a 3 year course program offered by the COLLEGE OF ARTS AND SCIENCE'),
(5, 2, 'ARTS AND ALIENS', 'AAA', 'sample program');

-- --------------------------------------------------------

--
-- Table structure for table `tblcounsellingsummary`
--

CREATE TABLE IF NOT EXISTS `tblcounsellingsummary` (
  `council_summary_id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` varchar(45) NOT NULL,
  `student_id` varchar(45) NOT NULL,
  `ratings` int(11) NOT NULL,
  `rating_massage` text NOT NULL,
  `date_rate` datetime NOT NULL,
  PRIMARY KEY (`council_summary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartmentheads`
--

CREATE TABLE IF NOT EXISTS `tbldepartmentheads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `date_birth` date NOT NULL,
  `image` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `dean_since` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbldepartmentheads`
--

INSERT INTO `tbldepartmentheads` (`id`, `first_name`, `middle_name`, `last_name`, `address`, `date_birth`, `image`, `email`, `contact`, `department_id`, `gender`, `dean_since`) VALUES
(1, 'Patricks', 'Ellis', 'Brocks', 'New Found Glory Taguig City', '1988-06-14', 'Godspeed.jpg', 'patriciaellis@gmai.com', '09831238768', 2, 'male', '2017-09-01'),
(2, 'Patricia', 'Ellis', 'Webber', 'New Found Glory Taguig City', '1988-06-14', 'MIL.PNG', 'patriciaellis@gmai.com', '09831238768', 3, 'female', '2017-09-01'),
(3, 'Den Den', 'Cortez', 'Lazaro', 'New Found Glory Taguig City', '1990-06-14', '', 'dendenlazaro@gmai.com', '09831238768', 4, 'female', '2017-09-01'),
(4, 'Kiefer', 'Lazaro', 'Ravena', 'New Found Glory Taguig City', '1990-06-14', '', 'kravena', '', 5, '', '0000-00-00'),
(5, '', '', '', '', '0000-00-00', '', '', '', 6, '', '0000-00-00'),
(6, '', '', '', '', '0000-00-00', '', '', '', 7, '', '0000-00-00'),
(7, '', '', '', '', '0000-00-00', '', '', '', 8, '', '0000-00-00'),
(8, '', '', '', '', '0000-00-00', '', '', '', 9, '', '0000-00-00'),
(9, '', '', '', '', '0000-00-00', '', '', '', 10, '', '0000-00-00'),
(10, '', '', '', '', '0000-00-00', '', '', '', 11, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE IF NOT EXISTS `tbldepartments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_code` varchar(45) NOT NULL,
  `department_name` varchar(45) NOT NULL,
  `department_logo` text NOT NULL,
  `department_banner` text NOT NULL,
  `department_color` text NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`department_id`, `department_code`, `department_name`, `department_logo`, `department_banner`, `department_color`, `mission`, `vision`) VALUES
(1, 'SCHOOL-ADMIN', 'University Of Makati Admin', '', '', '#0073b7', '', ''),
(2, 'COAHS', 'COLLEGE OF ALLIED HEALTH STUDIES', 'Logo.png', 'ccs banner.jpg', '#00a65a', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
(3, 'CAS', 'COLLEGE OF ARTS AND SCIENCES', 'Logo.png', 'ccs banner.jpg', '#ff8000', '', ''),
(4, 'COA', 'COLLEGE OF AERONAUTICS', 'Logo.png', 'ccs banner.jpg', '#ffff00', '', ''),
(5, 'COS', 'COLLEGE OF SNIPERS ', 'Logo.png', 'ccs banner.jpg', '#ff80ff', '', ''),
(6, 'COE', 'COLLEGE OF EDUCATION', 'Logo.png', 'ccs banner.jpg', '#ff8080', '', ''),
(7, 'COM', 'COLLEGE OF MAGES', 'Logo.png', 'ccs banner.jpg', '#ff0000', '', ''),
(10, 'CFE', 'College OF FAR EASTERN', 'feu_logo_black.jpg', 'feu banner.jpg', '#008080', '', ''),
(11, 'COMarines', 'COLLEGE OF MARINES', 'BBQ-Party-Pack_2-1024x683.jpg', 'Hot-Pot-Vienna-and-Kale.png', '#004080', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblevents`
--

CREATE TABLE IF NOT EXISTS `tblevents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `title` text,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `tblevents`
--

INSERT INTO `tblevents` (`id`, `start`, `end`, `title`, `start_time`, `end_time`, `department_id`, `type`, `admin_id`) VALUES
(38, '2017-09-07', NULL, '3rd checking wewe', '19:00:00', NULL, 1, 'Single day event', 1),
(42, '2017-09-11', '2017-09-16', '44th hunger games', '07:00:00', '23:00:00', 2, 'Multiple Day Event', 1),
(45, '2017-09-29', NULL, 'cyber game day', '01:01:00', NULL, 1, 'Single day event', 1),
(46, '2017-09-29', NULL, 'reverse event', '00:01:00', NULL, 1, 'Single day event', 1),
(48, '2017-09-18', '2017-09-23', 'sembreak ', '00:00:00', '00:00:00', 1, 'Multiple Day Event', 1),
(49, '2017-10-02', '2017-10-05', 'meron pala ahaha', '00:23:00', '02:03:00', 1, 'Multiple Day Event', 1),
(50, '2017-09-07', '2017-09-09', 'tour', '03:59:00', '01:02:00', 1, 'Multiple Day Event', 1),
(51, '2017-09-11', NULL, 'walang ulam', '00:03:00', NULL, 1, 'Single day event', 1),
(52, '2017-10-13', NULL, '53rd marine exercise ', '13:00:00', NULL, 11, 'Single day event', 1),
(53, '2017-09-25', NULL, 'debriefing ', '12:56:00', NULL, 11, 'Single day event', 1),
(54, '2017-09-26', NULL, 'cas day', '00:12:00', NULL, 3, 'Single day event', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblguidance`
--

CREATE TABLE IF NOT EXISTS `tblguidance` (
  `tbl_id_guidance` int(11) NOT NULL AUTO_INCREMENT,
  `guidance_id` varchar(45) NOT NULL,
  `mentor_id` varchar(45) NOT NULL,
  `student_id` varchar(45) NOT NULL,
  `request_message` text NOT NULL,
  `date_requested` datetime NOT NULL,
  `date_approved` datetime NOT NULL,
  `date_finished` datetime NOT NULL,
  PRIMARY KEY (`tbl_id_guidance`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblguidancecouncilor`
--

CREATE TABLE IF NOT EXISTS `tblguidancecouncilor` (
  `tbl_gc_id` int(11) NOT NULL AUTO_INCREMENT,
  `gc_id` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `image` text NOT NULL,
  `address` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `birth_date` datetime NOT NULL,
  `isActive` int(11) NOT NULL,
  PRIMARY KEY (`tbl_gc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblguidancerating`
--

CREATE TABLE IF NOT EXISTS `tblguidancerating` (
  `gcr_id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` varchar(45) NOT NULL,
  `student_id` varchar(45) NOT NULL,
  `ratings` int(11) NOT NULL,
  `rating_message` text NOT NULL,
  `date_rate` datetime NOT NULL,
  PRIMARY KEY (`gcr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE IF NOT EXISTS `tbllogs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_user_id` int(11) NOT NULL,
  `log_header` text NOT NULL,
  `log_message` text NOT NULL,
  `log_time` time NOT NULL,
  `log_date` date NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`log_id`, `log_user_id`, `log_header`, `log_message`, `log_time`, `log_date`) VALUES
(57, 1, 'Success Logout', 'Success Logout at Thursday 31st of August 2017 ', '20:34:12', '2017-08-31'),
(58, 1, 'Success Login', 'Success Login at Thursday 31st of August 2017 ', '20:34:19', '2017-08-31'),
(59, 1, 'Add Event', 'Add event about na trade si airforce ellis :( at Thursday 31st of August 2017 ', '20:59:03', '2017-08-31'),
(60, 1, 'Add Event', 'Add event about dsds at Thursday 31st of August 2017 ', '21:07:32', '2017-08-12'),
(61, 1, 'Success Logout', 'Success Logout at Thursday 31st of August 2017 ', '21:43:14', '2017-08-31'),
(62, 1, 'Success Login', 'Success Login at Thursday 31st of August 2017 ', '21:43:24', '2017-08-31'),
(63, 1, 'Success Logout', 'Success Logout at Thursday 31st of August 2017 ', '21:50:09', '2017-08-31'),
(64, 2, 'Success Login', 'Success Login at Thursday 31st of August 2017 ', '21:50:13', '2017-08-31'),
(65, 2, 'Success Logout', 'Success Logout at Thursday 31st of August 2017 ', '21:50:28', '2017-08-31'),
(66, 1, 'Success Login', 'Success Login at Thursday 31st of August 2017 ', '21:50:34', '2017-08-31'),
(67, 1, 'Success Login', 'Success Login at Friday 1st of September 2017 ', '08:07:35', '2017-09-01'),
(68, 1, 'Success Logout', 'Success Logout at Friday 1st of September 2017 ', '08:08:00', '2017-09-01'),
(69, 1, 'Success Login', 'Success Login at Friday 1st of September 2017 ', '20:57:02', '2017-09-01'),
(70, 1, 'Success Login', 'Success Login at Saturday 2nd of September 2017 ', '08:28:20', '2017-09-02'),
(71, 1, 'Success Logout', 'Success Logout at Saturday 2nd of September 2017 ', '13:12:32', '2017-09-02'),
(72, 1, 'Success Login', 'Success Login at Saturday 2nd of September 2017 ', '13:12:39', '2017-09-02'),
(73, 1, 'Success Login', 'Success Login at Saturday 2nd of September 2017 ', '18:42:47', '2017-09-02'),
(74, 1, 'Success Login', 'Success Login at Sunday 3rd of September 2017 ', '11:27:00', '2017-09-03'),
(75, 0, 'Add Event', 'Add Event at Sunday 3rd of September 2017 ', '14:48:34', '2017-09-03'),
(76, 1, 'Success Login', 'Success Login at Sunday 3rd of September 2017 ', '16:32:01', '2017-09-03'),
(77, 1, 'Add Event', 'Add Event at Sunday 3rd of September 2017 ', '16:56:43', '2017-09-03'),
(78, 1, 'Add Event', 'Add Event at Sunday 3rd of September 2017 ', '16:59:40', '2017-09-03'),
(79, 1, 'Add Event', 'Add Event at Sunday 3rd of September 2017 ', '17:19:29', '2017-09-03'),
(80, 1, 'Success Login', 'Success Login at Sunday 3rd of September 2017 ', '23:44:39', '2017-09-03'),
(81, 1, 'Add Event', 'Add Event at Monday 4th of September 2017 ', '00:09:50', '2017-09-04'),
(82, 1, 'Add Event', 'Add Event at Monday 4th of September 2017 ', '00:10:52', '2017-09-04'),
(83, 1, 'Success Logout', 'Success Logout at Monday 4th of September 2017 ', '00:12:24', '2017-09-04'),
(84, 2, 'Success Login', 'Success Login at Monday 4th of September 2017 ', '00:12:30', '2017-09-04'),
(85, 2, 'Add Event', 'Add Event at Monday 4th of September 2017 ', '00:18:18', '2017-09-04'),
(86, 1, 'Success Login', 'Success Login at Wednesday 6th of September 2017 ', '09:29:49', '2017-09-06'),
(87, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '10:54:10', '2017-09-06'),
(88, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '11:02:46', '2017-09-06'),
(89, 0, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:31:55', '2017-09-06'),
(90, 0, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:32:06', '2017-09-06'),
(91, 0, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:32:21', '2017-09-06'),
(92, 0, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:35:59', '2017-09-06'),
(93, 0, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:44:53', '2017-09-06'),
(94, 1, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:45:54', '2017-09-06'),
(95, 1, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:45:56', '2017-09-06'),
(96, 1, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:52:10', '2017-09-06'),
(97, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '11:54:05', '2017-09-06'),
(98, 1, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:56:15', '2017-09-06'),
(99, 1, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:56:39', '2017-09-06'),
(100, 1, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:56:44', '2017-09-06'),
(101, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '11:58:11', '2017-09-06'),
(102, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '11:58:42', '2017-09-06'),
(103, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '11:59:08', '2017-09-06'),
(104, 1, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:59:28', '2017-09-06'),
(105, 1, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:59:58', '2017-09-06'),
(106, 1, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '16:41:15', '2017-09-06'),
(107, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '16:44:25', '2017-09-06'),
(108, 1, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '16:56:28', '2017-09-06'),
(109, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:41:09', '2017-09-06'),
(110, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:49:43', '2017-09-06'),
(111, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:50:38', '2017-09-06'),
(112, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:51:45', '2017-09-06'),
(113, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:54:24', '2017-09-06'),
(114, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:56:42', '2017-09-06'),
(115, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '19:21:27', '2017-09-06'),
(116, 1, 'Update Event', 'Update Event at Wednesday 6th of September 2017 ', '19:44:15', '2017-09-06'),
(117, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '19:47:41', '2017-09-06'),
(118, 1, 'Update Event', 'Update Event at Wednesday 6th of September 2017 ', '19:49:06', '2017-09-06'),
(119, 1, 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '20:53:20', '2017-09-06'),
(120, 1, 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '20:53:56', '2017-09-06'),
(121, 1, 'Update Event', 'Update Event at Wednesday 6th of September 2017 ', '20:54:08', '2017-09-06'),
(122, 1, 'Success Login', 'Success Login at Thursday 7th of September 2017 ', '09:46:54', '2017-09-07'),
(123, 1, 'Add Event', 'Add Event at Thursday 7th of September 2017 ', '09:47:40', '2017-09-07'),
(124, 1, 'Success Logout', 'Success Logout at Thursday 7th of September 2017 ', '09:48:10', '2017-09-07'),
(125, 2, 'Success Login', 'Success Login at Thursday 7th of September 2017 ', '09:48:14', '2017-09-07'),
(126, 1, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '09:22:56', '2017-09-09'),
(127, 1, 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '11:39:05', '2017-09-09'),
(128, 2, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '11:39:09', '2017-09-09'),
(129, 2, 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '11:49:48', '2017-09-09'),
(130, 1, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '11:49:54', '2017-09-09'),
(131, 1, 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '11:49:58', '2017-09-09'),
(132, 1, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '12:40:59', '2017-09-09'),
(133, 1, 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '12:41:59', '2017-09-09'),
(134, 2, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '12:42:02', '2017-09-09'),
(135, 2, 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '12:46:53', '2017-09-09'),
(136, 1, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '12:47:17', '2017-09-09'),
(137, 1, 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '12:53:03', '2017-09-09'),
(138, 2, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '12:53:07', '2017-09-09'),
(139, 2, 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '12:53:21', '2017-09-09'),
(140, 1, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '12:53:37', '2017-09-09'),
(141, 1, 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '13:14:23', '2017-09-09'),
(142, 2, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '13:14:26', '2017-09-09'),
(143, 2, 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '13:18:11', '2017-09-09'),
(144, 1, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '13:18:19', '2017-09-09'),
(145, 1, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '14:16:07', '2017-09-09'),
(146, 1, 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '14:55:09', '2017-09-09'),
(147, 2, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '14:55:13', '2017-09-09'),
(148, 2, 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '14:55:19', '2017-09-09'),
(149, 1, 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '14:55:25', '2017-09-09'),
(150, 1, 'Add Department', 'Add Department at Saturday 9th of September 2017 ', '22:10:48', '2017-09-09'),
(151, 1, 'Add College Program', 'Add College Program at 9th of September 2017', '22:22:51', '2017-09-09'),
(152, 1, 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '10:42:23', '2017-09-10'),
(153, 1, 'Add Event', 'Add Event at Sunday 10th of September 2017 ', '10:56:08', '2017-09-10'),
(154, 1, 'Add Event', 'Add Event at Sunday 10th of September 2017 ', '11:41:32', '2017-09-10'),
(155, 1, 'Success Logout', 'Success Logout at Sunday 10th of September 2017 ', '12:55:30', '2017-09-10'),
(156, 2, 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '12:55:35', '2017-09-10'),
(157, 2, 'Add Event', 'Add Event at Sunday 10th of September 2017 ', '12:56:01', '2017-09-10'),
(158, 2, 'Update Event', 'Update Event at Sunday 10th of September 2017 ', '12:58:49', '2017-09-10'),
(159, 2, 'Update Event', 'Update Event at Sunday 10th of September 2017 ', '13:00:35', '2017-09-10'),
(160, 2, 'Update Event', 'Update Event at Sunday 10th of September 2017 ', '13:02:58', '2017-09-10'),
(161, 2, 'Success Logout', 'Success Logout at Sunday 10th of September 2017 ', '14:34:44', '2017-09-10'),
(162, 1, 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '14:34:49', '2017-09-10'),
(163, 1, 'Add College Program', 'Add College Program at Sunday 10th of September 2017 ', '14:37:22', '2017-09-10'),
(164, 1, 'Success Logout', 'Success Logout at Sunday 10th of September 2017 ', '14:57:32', '2017-09-10'),
(165, 1, 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '14:57:37', '2017-09-10'),
(166, 1, 'Success Logout', 'Success Logout at Sunday 10th of September 2017 ', '14:59:40', '2017-09-10'),
(167, 2, 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '14:59:45', '2017-09-10'),
(168, 1, 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '16:45:14', '2017-09-10'),
(169, 1, 'Add College Program', 'Add College Program at Sunday 10th of September 2017 ', '16:46:25', '2017-09-10'),
(170, 1, 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '22:10:19', '2017-09-10'),
(171, 1, 'Success Login', 'Success Login at Monday 11th of September 2017 ', '09:50:01', '2017-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `tblprofessor`
--

CREATE TABLE IF NOT EXISTS `tblprofessor` (
  `tbl_prof_id` int(11) NOT NULL AUTO_INCREMENT,
  `prof_id` text NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `image` text NOT NULL,
  `gender` varchar(45) NOT NULL,
  `department` int(11) NOT NULL,
  `date_birth` datetime NOT NULL,
  `contact` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `isActive` int(11) NOT NULL,
  PRIMARY KEY (`tbl_prof_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblprofessor`
--

INSERT INTO `tblprofessor` (`tbl_prof_id`, `prof_id`, `last_name`, `first_name`, `middle_name`, `email`, `password`, `image`, `gender`, `department`, `date_birth`, `contact`, `address`, `isActive`) VALUES
(1, 'K1190086', 'Nobela', 'Rhea Marie', 'Nobela', 'rheamarie@gmail.com', 'rhea', 'princess ruu.jpg', 'Female', 3, '1995-10-26 00:00:00', '09831238768', 'New Manila', 1),
(2, 'K1190089', 'Cruz', 'John Paulo', 'Vergara', 'johnpaulo@gmail.com', 'paulo', 'steph.jpg', 'Male', 3, '1995-08-04 00:00:00', '09831238769', 'New West Rembo Makati City', 1),
(3, 'A1190022', 'Cayetano', 'Fille', 'Cainglet', 'filecayetano@gmail.com', 'file', '20770504_1404624196239519_6823299636339108336_n.jpg', 'Female', 5, '1989-06-21 00:00:00', '09479888749', 'New Found Glory Taguig City', 1),
(4, 'A0821961', 'Villar', 'Nikki', 'Cendania', 'nikkV@gmail.com', 'nikki', 'princess ruu.jpg', 'Female', 4, '2002-06-12 00:00:00', '09479888749', 'Central Makati', 1),
(5, 'A0821963', 'Almojera', 'Domique Gabrielle', 'Simeon', 'nikkialmojera@gmail.com', 'nikki', '20729499_1404515979583674_7794408368071106185_n.jpg', 'Female', 2, '1995-10-24 00:00:00', '09479888749', 'Housing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblprofessorsubject`
--

CREATE TABLE IF NOT EXISTS `tblprofessorsubject` (
  `profsubject_id` int(11) NOT NULL,
  `prof_id` varchar(45) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `baseline_grade` decimal(10,2) NOT NULL,
  PRIMARY KEY (`profsubject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblprofrating`
--

CREATE TABLE IF NOT EXISTS `tblprofrating` (
  `profrating_id` int(11) NOT NULL AUTO_INCREMENT,
  `prof_id` varchar(45) NOT NULL,
  `student_id` varchar(45) NOT NULL,
  `ratings` int(11) NOT NULL,
  `rating_message` text NOT NULL,
  `date_rate` datetime NOT NULL,
  PRIMARY KEY (`profrating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblsection`
--

CREATE TABLE IF NOT EXISTS `tblsection` (
  `tbl_section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(45) NOT NULL,
  `program_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`tbl_section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentinfo`
--

CREATE TABLE IF NOT EXISTS `tblstudentinfo` (
  `tbl_student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `image` text NOT NULL,
  `date_birth` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `program_major` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `guardian_name` varchar(45) NOT NULL,
  `isActive` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `yearlevel` int(11) NOT NULL,
  PRIMARY KEY (`tbl_student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblstudentinfo`
--

INSERT INTO `tblstudentinfo` (`tbl_student_id`, `student_id`, `last_name`, `first_name`, `middle_name`, `address`, `contact`, `image`, `date_birth`, `email`, `password`, `gender`, `program_major`, `department`, `guardian_name`, `isActive`, `section`, `yearlevel`) VALUES
(1, 'K1122115', 'Snow', 'John', 'Hernandez', 'New Found Glory Taguig City', '09831238768', '', '1994-07-13', 'johnv@gmail.com', 'john', 'Male', 0, 3, '', 1, 0, 0),
(2, 'K1122112', 'Hernandez', 'Jhoana Marie', 'Elionor', 'New Manila', '09831238768', '', '2017-08-22', 'jmfernandez@gmail.com', 'jmfernandez', 'Female', 0, 3, '', 1, 0, 0),
(3, 'K1122114', 'domingo', 'christine', 'batacan', 'New Found Glory Taguig City', '09479888749', '', '1995-09-19', 'tinedomingo@gmail.com', 'tine', 'Female', 0, 3, '', 1, 0, 0),
(4, 'A0986733', 'Tan', 'Leo', 'Man', '520-B 16th ISU Village Barangay 31 South Side', '09831238768', '', '2001-05-22', 'leomantan@gmail.com', 'leo', 'Male', 0, 6, '', 1, 0, 0),
(5, 'A0918143', 'Queen', 'Isabella', 'Nena', 'New Manila', '09479888749', '', '1998-01-06', 'lala@gmail.com', 'lala', 'Female', 0, 6, '', 1, 0, 0),
(6, 'A0029642', 'Fonacier', 'Larra', 'Lim', 'New Found Glory Taguig City', '09831238768', '20170207_103535.jpg', '1999-06-23', '', '', 'Female', 0, 2, 'Larry Fonacier', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentsubjects`
--

CREATE TABLE IF NOT EXISTS `tblstudentsubjects` (
  `student_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(45) NOT NULL,
  `prof_id` varchar(45) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `midterm_assignment` decimal(10,2) NOT NULL,
  `midterm_quiz` decimal(10,2) NOT NULL,
  `midterm_class_standing` decimal(10,2) NOT NULL,
  `midterm_laboratory` decimal(10,2) NOT NULL,
  `midterm_project` decimal(10,2) NOT NULL,
  `midterm_exam` decimal(10,2) NOT NULL,
  `midterm_grade` decimal(10,2) DEFAULT NULL,
  `final_assignment` decimal(10,2) NOT NULL,
  `final_class_standing` decimal(10,2) NOT NULL,
  `final_laboratory` decimal(10,2) NOT NULL,
  `final_project` decimal(10,2) NOT NULL,
  `final_exam` decimal(10,2) NOT NULL,
  `final_grade` decimal(10,2) NOT NULL,
  `semestral_grade` decimal(10,2) NOT NULL,
  PRIMARY KEY (`student_subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentswhowantstobeinstructor`
--

CREATE TABLE IF NOT EXISTS `tblstudentswhowantstobeinstructor` (
  `student_id_instructor` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(45) NOT NULL,
  `student_bio` text NOT NULL,
  `prefered_subject` int(11) NOT NULL,
  PRIMARY KEY (`student_id_instructor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE IF NOT EXISTS `tblsubjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `cfn` varchar(45) NOT NULL,
  `subject_name` varchar(45) NOT NULL,
  `subject_code` varchar(45) NOT NULL,
  `unit` varchar(45) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbltutor`
--

CREATE TABLE IF NOT EXISTS `tbltutor` (
  `tutor_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(45) NOT NULL,
  `instructor_id` varchar(45) NOT NULL,
  `date_requested` datetime NOT NULL,
  `date_approved` datetime NOT NULL,
  `date_finished` datetime NOT NULL,
  `request_message` text NOT NULL,
  `subject` int(11) NOT NULL,
  PRIMARY KEY (`tutor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbltutorials`
--

CREATE TABLE IF NOT EXISTS `tbltutorials` (
  `tutorial_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `tutorial_site_name` varchar(45) NOT NULL,
  `tutorial_site_link` text NOT NULL,
  `tutorial_video_sample` text NOT NULL,
  `tutorial_video_name` varchar(45) NOT NULL,
  PRIMARY KEY (`tutorial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbltutorialsummary`
--

CREATE TABLE IF NOT EXISTS `tbltutorialsummary` (
  `tutor_summary_id` int(11) NOT NULL AUTO_INCREMENT,
  `instructor_id` varchar(45) NOT NULL,
  `student_id` varchar(45) NOT NULL,
  `ratings` int(11) NOT NULL,
  `rating_message` text NOT NULL,
  `date_rate` datetime NOT NULL,
  PRIMARY KEY (`tutor_summary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblyearlevel`
--

CREATE TABLE IF NOT EXISTS `tblyearlevel` (
  `tbl_yearlevel_id` int(11) NOT NULL AUTO_INCREMENT,
  `yearlevel` varchar(45) NOT NULL,
  PRIMARY KEY (`tbl_yearlevel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
