-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2017 at 06:53 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbladmins`
--

INSERT INTO `tbladmins` (`admin_id`, `admin_department_id`, `last_name`, `first_name`, `middle_name`, `address`, `image`, `contact`, `date_birth`, `email`, `password`, `gender`, `isActive`, `date_added`) VALUES
(1, 1, 'Funcion', 'Ivan Christian Jay', 'Echanes', '520-B 16th ISU Village ', '11200881_1216700208355786_8839516984461419799_n.jpg', '09479888749', '1995-11-23', 'adminivan@gmail.com', 'adminivan', 'Male', 1, '2015-11-23'),
(2, 3, 'Allen', 'Bartholomew Henry', 'East', 'Central City', 'Riley_Rewington_tn.jpg', '434', '1995-11-23', 'barryallen@gmail.com', 'barry', 'Male', 1, '2015-11-23'),
(3, 2, 'West', 'Irish', 'West', 'Central City', 'apple david.jpg', '09687231212', '1993-06-22', 'iriswestallen@gmail.com', 'iris', 'Female', 1, '2015-11-23'),
(4, 7, 'Queen', 'Oliver', 'Robert', 'Starling City', '15267837_1235855576472004_2196598368222274648_n.jpg', '09831238768', '1980-11-10', 'oliverqueen@gmail.com', 'arrow', 'Male', 1, '2015-11-23'),
(5, 3, 'David', 'Apple', 'Mansanas', 'Central City', 'bee.jpg', '09831238768', '1990-06-19', 'appledavid@gmail.com', 'apple', 'Female', 1, '2015-11-23'),
(6, 2, 'Stark', 'Sansa', 'Ten', 'Central City', 'Breakfast-Sandwich-2.jpg', '09831238768', '1996-01-15', 'sansastark@gmail.com', 'sansa', 'Female', 1, '2015-11-23'),
(7, 1, 'Gustin', 'Jia Lenne', 'Alberts', 'New Manila', 'Hillary_Goldwynn_tn.jpg', '09831238768', '1995-09-12', 'jialennealberts@gmail.com', 'jialennealberts', 'Female', 1, '2015-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `tblannouncements`
--

CREATE TABLE IF NOT EXISTS `tblannouncements` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tblannouncements`
--

INSERT INTO `tblannouncements` (`announcement_id`, `department_id`, `user_id`, `content`, `post_date`) VALUES
(1, 1, 1, 'binati ko si jialengaleng kanina', '2017-09-12 23:37:10'),
(2, 1, 1, 'dadasdads', '2017-09-14 09:49:38'),
(3, 1, 1, 'october fest na next month', '2017-09-14 09:50:13'),
(4, 1, 1, 'ccs infotect will be on sep 27 next week wednesday', '2017-09-14 09:51:00'),
(5, 3, 2, 'hahahhah tuuut  ""cong""', '2017-09-14 10:06:14'),
(6, 2, 3, 'ang ingay nyo oi', '2017-09-14 10:10:13'),
(7, 3, 2, 'oi wag ka maki alam dito ah', '2017-09-14 10:18:40'),
(8, 1, 1, 'oi ano petsa na??', '2017-09-17 15:33:21');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblcollegeprograms`
--

INSERT INTO `tblcollegeprograms` (`program_id`, `department_id`, `program_name`, `program_code`, `program_description`) VALUES
(1, 2, 'ARTS AND HUMANITIES', 'ARTHUMANS', ''),
(2, 5, 'ASSASINATION', 'ASSASINATE', ''),
(3, 11, 'Marine Transportaion', 'MarTrans', 'Marine Transportation is a 4 year college program offered by the college of marines'),
(4, 3, 'SCIENCE AND ARTE', 'SCIE1', 'science and arte is a 3 year course program offered by the COLLEGE OF ARTS AND SCIENCE'),
(5, 2, 'ARTS AND ALIENS', 'AAA', 'sample program'),
(6, 7, 'Magic Cards', 'MC47', 'hahahahahahahahaha');

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
(1, 'SCHOOL-ADMIN', 'SCHOOL-ADMIN', '', '', '#0073b7', '', ''),
(2, 'COAHS', 'COLLEGE OF ALLIED HEALTH STUDIES', 'hsu logo.jpg', 'Aristotle_Color.jpg', '#00a65a', '<blockquote><p></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p></p></blockquote>', '<blockquote><p>\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n</p></blockquote>'),
(3, 'CAS', 'COLLEGE OF ARTS AND SCIENCES', 'Logo.png', 'ccs banner.jpg', '#ff8000', 'Once a table is created in the database, there are many occasions where one may wish to change the structure of the table. Typical cases include the following:  \r\n- Add a column  - Drop a column  - Change a column name  - Change the data type for a column  \r\nPlease note that the above is not an exhaustive list. There are other instances where ALTER TABLE is used to change the table structure, such as changing the primary key specification or adding a unique constraint to a column.  \r\nThe \r\n', 'Once a table is created in the database, there are many occasions where one may wish to change the structure of the table. Typical cases include the following:  \r\n- Add a column  - Drop a column  - Change a column name  - Change the data type for a column  \r\nPlease note that the above is not an exhaustive list. There are other instances where ALTER TABLE is used to change the table structure, such as changing the primary key specification or adding a unique constraint to a column.  \r\nThe '),
(4, 'COA', 'COLLEGE OF AERONAUTICS', 'Logo.png', 'ccs banner.jpg', '#ffff00', '', ''),
(5, 'COS', 'COLLEGE OF SNIPERS ', 'Logo.png', 'ccs banner.jpg', '#ff80ff', '', ''),
(6, 'COE', 'COLLEGE OF EDUCATION', 'Logo.png', 'ccs banner.jpg', '#ff8080', '', ''),
(7, 'COM', 'COLLEGE OF MAGES', 'Logo.png', 'quicksketch_workshop.jpg', '#ff0000', '', ''),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

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
(54, '2017-09-26', NULL, 'cas day', '00:12:00', NULL, 3, 'Single day event', 2),
(55, '2017-09-12', NULL, 'birthday ni jialeng aleng', '12:15:00', NULL, 1, 'Single day event', 1),
(56, '2017-09-27', NULL, 'info tect 2017', '14:15:00', NULL, 1, 'Single day event', 1);

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
  `birth_date` date NOT NULL,
  `isActive` int(11) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`tbl_gc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblguidancecouncilor`
--

INSERT INTO `tblguidancecouncilor` (`tbl_gc_id`, `gc_id`, `last_name`, `first_name`, `middle_name`, `email`, `password`, `image`, `address`, `contact`, `gender`, `birth_date`, `isActive`, `date_added`) VALUES
(1, '', 'Dela Cruz', 'Bea Marie', 'Simeons', 'beamaries@gmail.com', 'bea', 'LaVonne_LaRue_tn.jpg', '520-B 16th ISU Village Barangay 31 South Side', '09687231212', 'Female', '1986-06-24', 1, '2017-09-20'),
(2, 'GC0789594', 'Villaver', 'Eric John', 'Saquilayan', 'erricjohnvillaver@gmail.com', 'erricjohn', 'Hassum_Harrod_tn.jpg', 'Makati City', '09479888749', 'Male', '1990-06-20', 1, '2017-09-20');

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
  `log_user_level` varchar(45) NOT NULL,
  `log_header` text NOT NULL,
  `log_message` text NOT NULL,
  `log_time` time NOT NULL,
  `log_date` date NOT NULL,
  `foreign_id` int(11) NOT NULL,
  `table_name` text NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=242 ;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`log_id`, `log_user_id`, `log_user_level`, `log_header`, `log_message`, `log_time`, `log_date`, `foreign_id`, `table_name`) VALUES
(57, 1, 'admin', 'Success Logout', 'Success Logout at Thursday 31st of August 2017 ', '20:34:12', '2017-08-31', 0, ''),
(58, 1, 'admin', 'Success Login', 'Success Login at Thursday 31st of August 2017 ', '20:34:19', '2017-08-31', 0, ''),
(59, 1, 'admin', 'Add Event', 'Add event about na trade si airforce ellis :( at Thursday 31st of August 2017 ', '20:59:03', '2017-08-31', 0, ''),
(60, 1, 'admin', 'Add Event', 'Add event about dsds at Thursday 31st of August 2017 ', '21:07:32', '2017-08-12', 0, ''),
(61, 1, 'admin', 'Success Logout', 'Success Logout at Thursday 31st of August 2017 ', '21:43:14', '2017-08-31', 0, ''),
(62, 1, 'admin', 'Success Login', 'Success Login at Thursday 31st of August 2017 ', '21:43:24', '2017-08-31', 0, ''),
(63, 1, 'admin', 'Success Logout', 'Success Logout at Thursday 31st of August 2017 ', '21:50:09', '2017-08-31', 0, ''),
(64, 2, 'admin', 'Success Login', 'Success Login at Thursday 31st of August 2017 ', '21:50:13', '2017-08-31', 0, ''),
(65, 2, 'admin', 'Success Logout', 'Success Logout at Thursday 31st of August 2017 ', '21:50:28', '2017-08-31', 0, ''),
(66, 1, 'admin', 'Success Login', 'Success Login at Thursday 31st of August 2017 ', '21:50:34', '2017-08-31', 0, ''),
(67, 1, 'admin', 'Success Login', 'Success Login at Friday 1st of September 2017 ', '08:07:35', '2017-09-01', 0, ''),
(68, 1, 'admin', 'Success Logout', 'Success Logout at Friday 1st of September 2017 ', '08:08:00', '2017-09-01', 0, ''),
(69, 1, 'admin', 'Success Login', 'Success Login at Friday 1st of September 2017 ', '20:57:02', '2017-09-01', 0, ''),
(70, 1, 'admin', 'Success Login', 'Success Login at Saturday 2nd of September 2017 ', '08:28:20', '2017-09-02', 0, ''),
(71, 1, 'admin', 'Success Logout', 'Success Logout at Saturday 2nd of September 2017 ', '13:12:32', '2017-09-02', 0, ''),
(72, 1, 'admin', 'Success Login', 'Success Login at Saturday 2nd of September 2017 ', '13:12:39', '2017-09-02', 0, ''),
(73, 1, 'admin', 'Success Login', 'Success Login at Saturday 2nd of September 2017 ', '18:42:47', '2017-09-02', 0, ''),
(74, 1, 'admin', 'Success Login', 'Success Login at Sunday 3rd of September 2017 ', '11:27:00', '2017-09-03', 0, ''),
(75, 0, 'admin', 'Add Event', 'Add Event at Sunday 3rd of September 2017 ', '14:48:34', '2017-09-03', 0, ''),
(76, 1, 'admin', 'Success Login', 'Success Login at Sunday 3rd of September 2017 ', '16:32:01', '2017-09-03', 0, ''),
(77, 1, 'admin', 'Add Event', 'Add Event at Sunday 3rd of September 2017 ', '16:56:43', '2017-09-03', 0, ''),
(78, 1, 'admin', 'Add Event', 'Add Event at Sunday 3rd of September 2017 ', '16:59:40', '2017-09-03', 0, ''),
(79, 1, 'admin', 'Add Event', 'Add Event at Sunday 3rd of September 2017 ', '17:19:29', '2017-09-03', 0, ''),
(80, 1, 'admin', 'Success Login', 'Success Login at Sunday 3rd of September 2017 ', '23:44:39', '2017-09-03', 0, ''),
(81, 1, 'admin', 'Add Event', 'Add Event at Monday 4th of September 2017 ', '00:09:50', '2017-09-04', 0, ''),
(82, 1, 'admin', 'Add Event', 'Add Event at Monday 4th of September 2017 ', '00:10:52', '2017-09-04', 0, ''),
(83, 1, 'admin', 'Success Logout', 'Success Logout at Monday 4th of September 2017 ', '00:12:24', '2017-09-04', 0, ''),
(84, 2, 'admin', 'Success Login', 'Success Login at Monday 4th of September 2017 ', '00:12:30', '2017-09-04', 0, ''),
(85, 2, 'admin', 'Add Event', 'Add Event at Monday 4th of September 2017 ', '00:18:18', '2017-09-04', 0, ''),
(86, 1, 'admin', 'Success Login', 'Success Login at Wednesday 6th of September 2017 ', '09:29:49', '2017-09-06', 0, ''),
(87, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '10:54:10', '2017-09-06', 0, ''),
(88, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '11:02:46', '2017-09-06', 0, ''),
(89, 0, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:31:55', '2017-09-06', 0, ''),
(90, 0, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:32:06', '2017-09-06', 0, ''),
(91, 0, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:32:21', '2017-09-06', 0, ''),
(92, 0, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:35:59', '2017-09-06', 0, ''),
(93, 0, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:44:53', '2017-09-06', 0, ''),
(94, 1, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:45:54', '2017-09-06', 0, ''),
(95, 1, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:45:56', '2017-09-06', 0, ''),
(96, 1, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:52:10', '2017-09-06', 0, ''),
(97, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '11:54:05', '2017-09-06', 0, ''),
(98, 1, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:56:15', '2017-09-06', 0, ''),
(99, 1, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:56:39', '2017-09-06', 0, ''),
(100, 1, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:56:44', '2017-09-06', 0, ''),
(101, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '11:58:11', '2017-09-06', 0, ''),
(102, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '11:58:42', '2017-09-06', 0, ''),
(103, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '11:59:08', '2017-09-06', 0, ''),
(104, 1, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:59:28', '2017-09-06', 0, ''),
(105, 1, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '11:59:58', '2017-09-06', 0, ''),
(106, 1, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '16:41:15', '2017-09-06', 0, ''),
(107, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '16:44:25', '2017-09-06', 0, ''),
(108, 1, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '16:56:28', '2017-09-06', 0, ''),
(109, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:41:09', '2017-09-06', 0, ''),
(110, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:49:43', '2017-09-06', 0, ''),
(111, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:50:38', '2017-09-06', 0, ''),
(112, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:51:45', '2017-09-06', 0, ''),
(113, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:54:24', '2017-09-06', 0, ''),
(114, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '18:56:42', '2017-09-06', 0, ''),
(115, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '19:21:27', '2017-09-06', 0, ''),
(116, 1, 'admin', 'Update Event', 'Update Event at Wednesday 6th of September 2017 ', '19:44:15', '2017-09-06', 0, ''),
(117, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '19:47:41', '2017-09-06', 0, ''),
(118, 1, 'admin', 'Update Event', 'Update Event at Wednesday 6th of September 2017 ', '19:49:06', '2017-09-06', 0, ''),
(119, 1, 'admin', 'Add Event', 'Add Event at Wednesday 6th of September 2017 ', '20:53:20', '2017-09-06', 0, ''),
(120, 1, 'admin', 'Delete Event', 'Delete Event at Wednesday 6th of September 2017 ', '20:53:56', '2017-09-06', 0, ''),
(121, 1, 'admin', 'Update Event', 'Update Event at Wednesday 6th of September 2017 ', '20:54:08', '2017-09-06', 0, ''),
(122, 1, 'admin', 'Success Login', 'Success Login at Thursday 7th of September 2017 ', '09:46:54', '2017-09-07', 0, ''),
(123, 1, 'admin', 'Add Event', 'Add Event at Thursday 7th of September 2017 ', '09:47:40', '2017-09-07', 0, ''),
(124, 1, 'admin', 'Success Logout', 'Success Logout at Thursday 7th of September 2017 ', '09:48:10', '2017-09-07', 0, ''),
(125, 2, 'admin', 'Success Login', 'Success Login at Thursday 7th of September 2017 ', '09:48:14', '2017-09-07', 0, ''),
(126, 1, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '09:22:56', '2017-09-09', 0, ''),
(127, 1, 'admin', 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '11:39:05', '2017-09-09', 0, ''),
(128, 2, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '11:39:09', '2017-09-09', 0, ''),
(129, 2, 'admin', 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '11:49:48', '2017-09-09', 0, ''),
(130, 1, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '11:49:54', '2017-09-09', 0, ''),
(131, 1, 'admin', 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '11:49:58', '2017-09-09', 0, ''),
(132, 1, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '12:40:59', '2017-09-09', 0, ''),
(133, 1, 'admin', 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '12:41:59', '2017-09-09', 0, ''),
(134, 2, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '12:42:02', '2017-09-09', 0, ''),
(135, 2, 'admin', 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '12:46:53', '2017-09-09', 0, ''),
(136, 1, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '12:47:17', '2017-09-09', 0, ''),
(137, 1, 'admin', 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '12:53:03', '2017-09-09', 0, ''),
(138, 2, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '12:53:07', '2017-09-09', 0, ''),
(139, 2, 'admin', 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '12:53:21', '2017-09-09', 0, ''),
(140, 1, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '12:53:37', '2017-09-09', 0, ''),
(141, 1, 'admin', 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '13:14:23', '2017-09-09', 0, ''),
(142, 2, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '13:14:26', '2017-09-09', 0, ''),
(143, 2, 'admin', 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '13:18:11', '2017-09-09', 0, ''),
(144, 1, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '13:18:19', '2017-09-09', 0, ''),
(145, 1, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '14:16:07', '2017-09-09', 0, ''),
(146, 1, 'admin', 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '14:55:09', '2017-09-09', 0, ''),
(147, 2, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '14:55:13', '2017-09-09', 0, ''),
(148, 2, 'admin', 'Success Logout', 'Success Logout at Saturday 9th of September 2017 ', '14:55:19', '2017-09-09', 0, ''),
(149, 1, 'admin', 'Success Login', 'Success Login at Saturday 9th of September 2017 ', '14:55:25', '2017-09-09', 0, ''),
(150, 1, 'admin', 'Add Department', 'Add Department at Saturday 9th of September 2017 ', '22:10:48', '2017-09-09', 0, ''),
(151, 1, 'admin', 'Add College Program', 'Add College Program at 9th of September 2017', '22:22:51', '2017-09-09', 0, ''),
(152, 1, 'admin', 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '10:42:23', '2017-09-10', 0, ''),
(153, 1, 'admin', 'Add Event', 'Add Event at Sunday 10th of September 2017 ', '10:56:08', '2017-09-10', 0, ''),
(154, 1, 'admin', 'Add Event', 'Add Event at Sunday 10th of September 2017 ', '11:41:32', '2017-09-10', 0, ''),
(155, 1, 'admin', 'Success Logout', 'Success Logout at Sunday 10th of September 2017 ', '12:55:30', '2017-09-10', 0, ''),
(156, 2, 'admin', 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '12:55:35', '2017-09-10', 0, ''),
(157, 2, 'admin', 'Add Event', 'Add Event at Sunday 10th of September 2017 ', '12:56:01', '2017-09-10', 0, ''),
(158, 2, 'admin', 'Update Event', 'Update Event at Sunday 10th of September 2017 ', '12:58:49', '2017-09-10', 0, ''),
(159, 2, 'admin', 'Update Event', 'Update Event at Sunday 10th of September 2017 ', '13:00:35', '2017-09-10', 0, ''),
(160, 2, 'admin', 'Update Event', 'Update Event at Sunday 10th of September 2017 ', '13:02:58', '2017-09-10', 0, ''),
(161, 2, 'admin', 'Success Logout', 'Success Logout at Sunday 10th of September 2017 ', '14:34:44', '2017-09-10', 0, ''),
(162, 1, 'admin', 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '14:34:49', '2017-09-10', 0, ''),
(163, 1, 'admin', 'Add College Program', 'Add College Program at Sunday 10th of September 2017 ', '14:37:22', '2017-09-10', 0, ''),
(164, 1, 'admin', 'Success Logout', 'Success Logout at Sunday 10th of September 2017 ', '14:57:32', '2017-09-10', 0, ''),
(165, 1, 'admin', 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '14:57:37', '2017-09-10', 0, ''),
(166, 1, 'admin', 'Success Logout', 'Success Logout at Sunday 10th of September 2017 ', '14:59:40', '2017-09-10', 0, ''),
(167, 2, 'admin', 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '14:59:45', '2017-09-10', 0, ''),
(168, 1, 'admin', 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '16:45:14', '2017-09-10', 0, ''),
(169, 1, 'admin', 'Add College Program', 'Add College Program at Sunday 10th of September 2017 ', '16:46:25', '2017-09-10', 0, ''),
(170, 1, 'admin', 'Success Login', 'Success Login at Sunday 10th of September 2017 ', '22:10:19', '2017-09-10', 0, ''),
(171, 1, 'admin', 'Success Login', 'Success Login at Monday 11th of September 2017 ', '09:50:01', '2017-09-11', 0, ''),
(172, 1, 'admin', 'Success Login', 'Success Login at Tuesday 12th of September 2017 ', '00:24:50', '2017-09-12', 0, ''),
(173, 1, 'admin', 'Success Login', 'Success Login at Tuesday 12th of September 2017 ', '10:29:19', '2017-09-12', 0, ''),
(174, 1, 'admin', 'Success Login', 'Success Login at Tuesday 12th of September 2017 ', '22:42:36', '2017-09-12', 0, ''),
(175, 1, 'admin', 'Success Login', 'Success Login at Tuesday 12th of September 2017 ', '23:02:01', '2017-09-12', 0, ''),
(176, 1, 'admin', 'Add Announcement', 'Add Announcement at Tuesday 12th of September 2017 ', '23:37:10', '2017-09-12', 0, ''),
(177, 1, 'admin', 'Add Event', 'Add Event at Tuesday 12th of September 2017 ', '23:42:48', '2017-09-12', 0, ''),
(178, 1, 'admin', 'Add Announcement', 'Add Announcement at Tuesday 12th of September 2017 ', '23:57:19', '2017-09-12', 0, ''),
(179, 1, 'admin', 'Success Login', 'Success Login at Wednesday 13th of September 2017 ', '00:05:42', '2017-09-13', 0, ''),
(180, 1, 'admin', 'Success Logout', 'Success Logout at Wednesday 13th of September 2017 ', '00:16:03', '2017-09-13', 0, ''),
(181, 2, 'admin', 'Success Login', 'Success Login at Wednesday 13th of September 2017 ', '00:16:09', '2017-09-13', 0, ''),
(182, 2, 'admin', 'Success Logout', 'Success Logout at Wednesday 13th of September 2017 ', '00:18:44', '2017-09-13', 0, ''),
(183, 1, 'admin', 'Success Login', 'Success Login at Wednesday 13th of September 2017 ', '00:18:49', '2017-09-13', 0, ''),
(184, 1, 'admin', 'Delete Announcement', 'Delete Announcement at Wednesday 13th of September 2017 ', '01:09:12', '2017-09-13', 0, ''),
(185, 1, 'admin', 'Success Login', 'Success Login at Thursday 14th of September 2017 ', '09:46:48', '2017-09-14', 0, ''),
(186, 1, 'admin', 'Add Announcement', 'Add Announcement at Thursday 14th of September 2017 ', '09:50:13', '2017-09-14', 0, ''),
(187, 1, 'admin', 'Add Announcement', 'Add Announcement at Thursday 14th of September 2017 ', '09:51:00', '2017-09-14', 0, ''),
(188, 1, 'admin', 'Add Event', 'Add Event at Thursday 14th of September 2017 ', '09:51:30', '2017-09-14', 0, ''),
(189, 1, 'admin', 'Success Logout', 'Success Logout at Thursday 14th of September 2017 ', '10:03:45', '2017-09-14', 0, ''),
(190, 2, 'admin', 'Success Login', 'Success Login at Thursday 14th of September 2017 ', '10:03:49', '2017-09-14', 0, ''),
(191, 2, 'admin', 'Add Announcement', 'Add Announcement at Thursday 14th of September 2017 ', '10:06:14', '2017-09-14', 0, ''),
(192, 2, 'admin', 'Success Logout', 'Success Logout at Thursday 14th of September 2017 ', '10:09:22', '2017-09-14', 0, ''),
(193, 3, 'admin', 'Success Login', 'Success Login at Thursday 14th of September 2017 ', '10:09:39', '2017-09-14', 0, ''),
(194, 3, 'admin', 'Add Announcement', 'Add Announcement at Thursday 14th of September 2017 ', '10:10:13', '2017-09-14', 0, ''),
(195, 3, 'admin', 'Success Logout', 'Success Logout at Thursday 14th of September 2017 ', '10:11:27', '2017-09-14', 0, ''),
(196, 1, 'admin', 'Success Login', 'Success Login at Thursday 14th of September 2017 ', '10:11:34', '2017-09-14', 0, ''),
(197, 1, 'admin', 'Success Logout', 'Success Logout at Thursday 14th of September 2017 ', '10:18:12', '2017-09-14', 0, ''),
(198, 2, 'admin', 'Success Login', 'Success Login at Thursday 14th of September 2017 ', '10:18:17', '2017-09-14', 0, ''),
(199, 2, 'admin', 'Add Announcement', 'Add Announcement at Thursday 14th of September 2017 ', '10:18:40', '2017-09-14', 0, ''),
(200, 2, 'admin', 'Success Logout', 'Success Logout at Thursday 14th of September 2017 ', '10:32:45', '2017-09-14', 0, ''),
(201, 1, 'admin', 'Success Login', 'Success Login at Thursday 14th of September 2017 ', '10:32:49', '2017-09-14', 0, ''),
(202, 1, 'admin', 'Success Logout', 'Success Logout at Thursday 14th of September 2017 ', '10:34:01', '2017-09-14', 0, ''),
(203, 2, 'admin', 'Success Login', 'Success Login at Thursday 14th of September 2017 ', '10:34:09', '2017-09-14', 0, ''),
(204, 2, 'admin', 'Success Logout', 'Success Logout at Thursday 14th of September 2017 ', '10:43:20', '2017-09-14', 0, ''),
(205, 3, 'admin', 'Success Login', 'Success Login at Thursday 14th of September 2017 ', '10:43:25', '2017-09-14', 0, ''),
(206, 1, 'admin', 'Success Login', 'Success Login at Saturday 16th of September 2017 ', '20:11:06', '2017-09-16', 0, ''),
(207, 1, 'admin', 'Success Logout', 'Success Logout at Sunday 17th of September 2017 ', '01:36:21', '2017-09-17', 0, ''),
(208, 1, 'admin', 'Success Login', 'Success Login at Sunday 17th of September 2017 ', '01:36:28', '2017-09-17', 0, ''),
(209, 1, 'admin', 'Success Logout', 'Success Logout at Sunday 17th of September 2017 ', '01:41:23', '2017-09-17', 0, ''),
(210, 1, 'admin', 'Success Login', 'Success Login at Sunday 17th of September 2017 ', '01:41:28', '2017-09-17', 0, ''),
(211, 1, 'admin', 'Success Logout', 'Success Logout at Sunday 17th of September 2017 ', '02:06:43', '2017-09-17', 0, ''),
(212, 1, 'admin', 'Success Login', 'Success Login at Sunday 17th of September 2017 ', '02:10:11', '2017-09-17', 0, ''),
(213, 1, 'admin', 'Success Login', 'Success Login at Sunday 17th of September 2017 ', '12:00:58', '2017-09-17', 0, ''),
(214, 1, 'admin', 'Add Announcement', 'Add Announcement at Sunday 17th of September 2017 ', '15:33:21', '2017-09-17', 0, ''),
(215, 1, 'admin', 'Success Login', 'Success Login at Tuesday 19th of September 2017 ', '13:34:13', '2017-09-19', 0, ''),
(216, 1, 'admin', 'Success Login', 'Success Login at Tuesday 19th of September 2017 ', '23:12:50', '2017-09-19', 0, ''),
(217, 1, '', 'Success Login', 'Success Login at Wednesday 20th of September 2017 ', '15:38:58', '2017-09-20', 0, ''),
(218, 1, '', 'Success Logout', 'Success Logout at Wednesday 20th of September 2017 ', '17:21:05', '2017-09-20', 0, ''),
(219, 2, '', 'Success Login', 'Success Login at Wednesday 20th of September 2017 ', '17:21:11', '2017-09-20', 0, ''),
(220, 2, '', 'Success Logout', 'Success Logout at Wednesday 20th of September 2017 ', '17:28:10', '2017-09-20', 0, ''),
(221, 1, '', 'Success Login', 'Success Login at Wednesday 20th of September 2017 ', '17:28:15', '2017-09-20', 0, ''),
(222, 2, '', 'Success Login', 'Success Login at Wednesday 20th of September 2017 ', '17:29:16', '2017-09-20', 0, ''),
(223, 2, '', 'Success Logout', 'Success Logout at Wednesday 20th of September 2017 ', '18:07:21', '2017-09-20', 0, ''),
(224, 1, '', 'Success Login', 'Success Login at Wednesday 20th of September 2017 ', '18:07:34', '2017-09-20', 0, ''),
(225, 1, '', 'Success Login', 'Success Login at Wednesday 20th of September 2017 ', '21:35:25', '2017-09-20', 0, ''),
(226, 1, '', 'Success Logout', 'Success Logout at Wednesday 20th of September 2017 ', '22:10:54', '2017-09-20', 0, ''),
(227, 1, '', 'Success Login', 'Success Login at Wednesday 20th of September 2017 ', '22:10:58', '2017-09-20', 0, ''),
(228, 1, 'admin', 'Success Logout', 'Success Logout at Wednesday 20th of September 2017 ', '22:13:56', '2017-09-20', 0, ''),
(229, 1, 'admin', 'Success Login', 'Success Login at Wednesday 20th of September 2017 ', '22:14:02', '2017-09-20', 0, ''),
(230, 1, 'admin', 'Success Login', 'Success Login at Thursday 21st of September 2017 ', '12:25:08', '2017-09-21', 0, ''),
(231, 1, 'admin', 'Success Logout', 'Success Logout at Friday 22nd of September 2017 ', '00:36:07', '2017-09-22', 0, ''),
(232, 2, 'admin', 'Success Login', 'Success Login at Friday 22nd of September 2017 ', '00:36:11', '2017-09-22', 0, ''),
(233, 1, 'admin', 'Success Login', 'Success Login at Saturday 23rd of September 2017 ', '10:40:56', '2017-09-23', 0, ''),
(234, 1, 'admin', 'Success Logout', 'Success Logout at Saturday 23rd of September 2017 ', '11:01:32', '2017-09-23', 0, ''),
(235, 2, 'admin', 'Success Login', 'Success Login at Saturday 23rd of September 2017 ', '11:01:39', '2017-09-23', 0, ''),
(236, 2, 'admin', 'Success Logout', 'Success Logout at Saturday 23rd of September 2017 ', '11:04:25', '2017-09-23', 0, ''),
(237, 1, 'admin', 'Success Login', 'Success Login at Saturday 23rd of September 2017 ', '11:04:39', '2017-09-23', 0, ''),
(238, 1, 'admin', 'Success Logout', 'Success Logout at Saturday 23rd of September 2017 ', '15:25:23', '2017-09-23', 0, ''),
(239, 6, 'admin', 'Success Login', 'Success Login at Saturday 23rd of September 2017 ', '15:25:25', '2017-09-23', 0, ''),
(240, 6, 'admin', 'Success Logout', 'Success Logout at Saturday 23rd of September 2017 ', '15:27:54', '2017-09-23', 0, ''),
(241, 1, 'admin', 'Success Login', 'Success Login at Saturday 23rd of September 2017 ', '15:28:01', '2017-09-23', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblprevileges`
--

CREATE TABLE IF NOT EXISTS `tblprevileges` (
  `tbl_previleges_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_master_id` int(11) NOT NULL,
  `previlege_title` text NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`tbl_previleges_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblprevileges`
--

INSERT INTO `tblprevileges` (`tbl_previleges_id`, `admin_master_id`, `previlege_title`, `state`) VALUES
(1, 1, 'Open Online Encoding of Remarks', 1);

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
  `date_birth` date NOT NULL,
  `contact` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `isActive` int(11) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`tbl_prof_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblprofessor`
--

INSERT INTO `tblprofessor` (`tbl_prof_id`, `prof_id`, `last_name`, `first_name`, `middle_name`, `email`, `password`, `image`, `gender`, `department`, `date_birth`, `contact`, `address`, `isActive`, `date_added`) VALUES
(1, 'K1190086', 'Nobela', 'Rhea Marie', 'Nobela', 'rheamarie@gmail.com', 'rhea', 'princess ruu.jpg', 'Female', 3, '1995-10-26', '09831238768', 'New Manila', 1, '2015-11-23'),
(2, 'K1190089', 'Cruz', 'John Paulo', 'Vergara', 'johnpaulo@gmail.com', 'paulo', 'steph.jpg', 'Male', 3, '1995-08-04', '09831238769', 'New West Rembo Makati City', 1, '2015-11-23'),
(3, 'A1190022', 'Cayetano', 'Fille', 'Cainglet', 'filecayetano@gmail.com', 'file', '20770504_1404624196239519_6823299636339108336_n.jpg', 'Female', 5, '1989-06-21', '09479888749', 'New Found Glory Taguig City', 1, '2015-11-23'),
(4, 'A0821961', 'Villar', 'Nikki', 'Cendania', 'nikkV@gmail.com', 'nikki', 'princess ruu.jpg', 'Female', 4, '2002-06-12', '09479888749', 'Central Makati', 1, '2015-11-23'),
(5, 'A0821963', 'Almojeras', 'Domique Gabrielle ', 'Simeon', 'nikkialmojera@gmail.com', 'nikki', 'Constance_Smith_tn.jpg', 'Female', 2, '1995-09-11', '09479888749', 'Housing', 1, '2015-11-23'),
(6, 'A0218189', 'Pamintuan', 'Mariel', 'Pader', 'marielpamintuan@gmail.com', 'mariel', 'flash.jpg', 'Female', 11, '1997-05-12', '09831238768', 'New Manila', 1, '0000-00-00'),
(7, 'A0753186', 'Camo', 'Denver', 'Mo', 'denvercamo@gmail.com', 'denver', 'Final Infographic.jpeg', 'Male', 11, '2000-06-07', '09831238768', 'New Found Glory Taguig City', 1, '0000-00-00'),
(8, 'A0138530', 'Danvers', 'Kara', 'Zor-el', 'karadanvers@gmail.com', 'kara', 'Hillary_Goldwynn_tn.jpg', 'Female', 11, '1988-10-25', '09831238761', 'New Found Glory Taguig City', 1, '2017-09-20'),
(9, 'A0821636', 'Makita', 'Joan', 'Na', 'joanamakita@gmail.com', 'joana', 'Jennifer_Jerome_tn.jpg', 'Female', 3, '1999-02-16', '09831238761', 'New Found Glory Taguig City', 1, '2017-09-20'),
(10, 'A0961100', 'Villa', 'Maria Theresa', 'De Villa', 'theresavilla@gmail.com', 'maria', 'LaVonne_LaRue_tn.jpg', 'Female', 10, '1977-02-15', '09831238768', 'Makati City', 1, '2017-09-20');

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
  `yearlevel` int(11) NOT NULL,
  PRIMARY KEY (`tbl_section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tblsection`
--

INSERT INTO `tblsection` (`tbl_section_id`, `section_name`, `program_id`, `department_id`, `yearlevel`) VALUES
(1, 'CCC1', 1, 2, 1),
(2, 'CCC2', 1, 2, 4),
(3, 'AAH2', 2, 2, 3),
(4, 'BITSM', 7, 6, 2),
(5, 'BCSAD', 11, 3, 1),
(6, 'CCSAD', 2, 1, 1),
(7, 'AITSM', 11, 3, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tblstudentinfo`
--

INSERT INTO `tblstudentinfo` (`tbl_student_id`, `student_id`, `last_name`, `first_name`, `middle_name`, `address`, `contact`, `image`, `date_birth`, `email`, `password`, `gender`, `program_major`, `department`, `guardian_name`, `isActive`, `section`, `yearlevel`) VALUES
(1, 'K1122115', 'Snow', 'John', 'Hernandez', 'New Found Glory Taguig City', '09831238768', '', '1994-07-13', 'johnv@gmail.com', 'john', 'Male', 4, 3, '', 1, 3, 4),
(2, 'K1122112', 'Hernandez', 'Jhoana Marie', 'Elionor', 'New Manila', '09831238768', '', '2017-08-22', 'jmfernandez@gmail.com', 'jmfernandez', 'Female', 4, 3, '', 1, 0, 0),
(3, 'K1122114', 'domingo', 'christine', 'batacan', 'New Found Glory Taguig City', '09479888749', '', '1995-09-19', 'tinedomingo@gmail.com', 'tine', 'Female', 4, 3, '', 1, 0, 0),
(4, 'A0986733', 'Tan', 'Leo', 'Man', '520-B 16th ISU Village Barangay 31 South Side', '09831238768', '', '2001-05-22', 'leomantan@gmail.com', 'leo', 'Male', 0, 6, '', 0, 0, 0),
(5, 'A0918143', 'Queen', 'Isabella', 'Nena', 'New Manila', '09479888749', '', '1998-01-06', 'lala@gmail.com', 'lala', 'Female', 0, 6, '', 1, 0, 0),
(6, 'A0029642', 'Fonacier', 'Larra', 'Lim', 'New Found Glory Taguig City', '09831238768', 'Constance_Smith_tn.jpg', '1999-06-23', 'larrafonacier@gmail.com', '', 'Female', 1, 2, 'Larry Fonacier', 1, 1, 1),
(7, 'A0328900', 'barry allen', 'barr@gmail.com', '', '', '', '', '2017-09-11', '', '', 'Female', 0, 5, '', 0, 0, 0),
(8, 'A0664638', 'diana prince', 'barr@gmail.com', '', '', '', '', '2017-09-11', '', '', 'Female', 0, 5, '', 0, 0, 0),
(9, 'A0478644', 'oliver queen', 'arrowbarr@gmail.com', '', '', '', '', '2017-09-11', '', '', 'Female', 0, 5, '', 0, 0, 0),
(10, 'A0520563', 'joh diggle', 'spartanbarr@gmail.com', '', '', '', '', '2017-09-11', '', '', 'Female', 0, 5, '', 0, 0, 0),
(11, 'A0289949', 'bruce wayne', 'batmanbarr@gmail.com', '', '', '', '', '2017-09-11', '', '', 'Female', 0, 5, '', 0, 0, 0),
(12, 'A0695844', 'clark kent', 'supermanbarr@gmail.com', '', '', '', '', '2017-09-11', '', '', 'Female', 0, 5, '', 0, 0, 0),
(13, 'A0525171', 'kara zor-el', 'barr@gmail.com', '', '', '', '', '2017-09-11', '', '', 'Female', 0, 5, '', 0, 0, 0),
(14, 'A0146273', '', '', '', '', '', '', '2017-09-11', '', '', 'Female', 0, 5, '', 0, 0, 0),
(15, 'A0630187', 'ivan', '', '', '', '', '', '2017-09-11', '', '', 'Female', 0, 5, '', 0, 0, 0),
(16, 'A0654253', '', 'icjfuncion', '', '', '', '', '2017-09-11', '', '', 'Female', 0, 5, '', 0, 0, 0),
(17, 'A0491094', 'Funcion', 'Christine Mae', 'Brayant', 'Los Angeles Pampanga', '090823122', '', '2017-09-11', '', '', 'Female', 0, 11, '', 0, 0, 0),
(18, 'A0912384', 'Funcion', 'Christine Mae', 'Brayant', 'Los Angeles Pampanga', '090823122', '', '2017-09-11', '', '', 'Female', 4, 3, '', 0, 0, 0),
(19, 'A0821523', 'Funcion', 'Christine Mae', 'Brayant', 'Los Angeles Pampanga', '090823122', '', '2017-09-11', 'christinemaefuncion@gmail.com', '', 'female', 1, 2, '', 1, 0, 0),
(20, 'A0623032', 'Funcion', 'Christine Mae', 'Brayant', 'Los Angeles Pampanga', '090823122', '', '2017-09-11', '', '', 'Female', 4, 3, '', 1, 0, 0),
(21, 'A0279364', 'Funcion', 'King Arthur', 'Dallas', 'Los Angeles Pampanga', '090823123', '', '2017-09-11', '', '', 'Female', 4, 3, '', 1, 0, 0),
(22, 'A0246289', 'Funcion', 'Christine Mae', 'Brayant', 'Los Angeles Pampanga', '090823122', '', '2017-09-11', '', '', 'Female', 0, 11, '', 1, 0, 0),
(23, 'A0045209', 'Funcion', 'King Arthur', 'Dallas', 'Los Angeles Pampanga', '090823123', '', '2017-09-11', '', '', 'Female', 4, 11, '', 1, 0, 0),
(24, 'A0943949', 'Echanez', 'Carlito Vicentio', 'Lorenzo', 'Las Pinas City', '09831238761', 'Barot_Bellingham_tn.jpg', '1993-06-17', 'carlitovicencio@gmail.com', '', 'Male', 0, 7, 'Henry Echanez', 1, 0, 0),
(27, 'A0534885', 'Mercado', 'Jennylyn', 'Lumera', 'New Manila', '0900331432', '', '1988-11-01', 'jen', 'jen', '', 3, 11, 'Marray', 1, 0, 0),
(28, 'A0973368', '', '', '', '', '', '', '2017-09-23', '', '', '', 3, 11, '', 1, 0, 0),
(29, 'A0205625', 'Last Name', 'First Name', 'Middle Name', 'Address', 'Contact', '', '2017-09-23', 'Email', 'Password', '', 5, 2, 'Guardian Name', 1, 0, 0),
(30, 'A0178646', 'Mercado', 'Jennylyn', 'Lumera', 'New Manila', '0900331432', '', '1988-11-01', 'jen', 'jen', '', 5, 2, 'Marray', 1, 0, 0),
(31, 'A0818278', '', '', '', '', '', '', '2017-09-23', '', '', '', 5, 2, '', 1, 0, 0),
(32, 'A0540797', 'Mercado', 'Jennylyn Mae', 'Lumera', 'New Manila', '0900331432', '', '1988-11-01', 'jenmercado@rocketmail.com', 'jen', 'Female', 1, 2, 'Marray', 1, 0, 0),
(33, 'A0163196', 'Mercado', 'Solomon', 'Celiz', 'New Manila', '0944232311', '', '1987-09-23', 'mc3words@gmail.com', 'sol', 'Male', 1, 2, 'bill gates', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentsubjects`
--

CREATE TABLE IF NOT EXISTS `tblstudentsubjects` (
  `student_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(45) NOT NULL,
  `prof_id` varchar(45) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `midterm_grade` decimal(10,2) NOT NULL,
  `final_grade` decimal(10,2) NOT NULL,
  `midterm_evaluation` text NOT NULL,
  `final_evaluation` text NOT NULL,
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
  `department_id` int(11) NOT NULL,
  `isActive` int(11) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`subject_id`, `cfn`, `subject_name`, `subject_code`, `department_id`, `isActive`) VALUES
(1, 'A0589990', 'RIZAL', 'LIFE AND WORKS OF RIZAL', 0, 1),
(2, 'A0355942', 'SOFTENG', 'SOFTWARE ENGINEERING', 0, 1),
(3, 'A0869590', 'DBCERT', 'CERTIFICATION TRACT (DATABASE)', 0, 1),
(4, 'A0058902', 'ADEPT', 'ADVANCED ENGLISH PRE- EMPLOYMENT TRAINING', 0, 1),
(5, 'A0865808', 'FIL 102', 'PAGBASA AT PAGSULAT TUNGO SA PANANALIKSIK', 0, 1),
(6, 'A0184065', 'PROLOG', 'PROGRAM LOGIC FORMULATIONS', 5, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblyearlevel`
--

INSERT INTO `tblyearlevel` (`tbl_yearlevel_id`, `yearlevel`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
