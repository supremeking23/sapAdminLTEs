-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2017 at 04:58 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `fc_events_table`
--

INSERT INTO `fc_events_table` (`id`, `start`, `end`, `title`) VALUES
(2, '2017-08-31 00:00:00', '2017-08-31 22:00:00', '3rd checking'),
(3, '2017-08-30 00:00:00', '2017-09-01 00:00:00', 'preparation'),
(4, '2017-08-31 11:00:00', '2017-08-31 14:00:00', 'pista sa nayon'),
(5, '2017-09-01 00:00:00', '2017-09-02 00:00:00', 'edil fitr'),
(12, '2017-08-16 00:00:00', '2017-08-17 00:00:00', 'dsds'),
(13, '2017-08-11 00:00:00', '2017-08-12 00:00:00', 'ayaw'),
(15, '2017-08-10 00:00:00', '2017-08-11 00:00:00', 'dsdsdads'),
(16, '2017-08-09 00:00:00', '2017-08-10 00:00:00', 'sdsds');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbladmins`
--

INSERT INTO `tbladmins` (`admin_id`, `admin_department_id`, `last_name`, `first_name`, `middle_name`, `address`, `image`, `contact`, `date_birth`, `email`, `password`, `gender`, `isActive`, `date_added`) VALUES
(1, 1, 'Funcion', 'Ivan Christian Jay', 'Echanes', '520-B 16th ISU Village Barangay 31 South Side', '11200881_1216700208355786_8839516984461419799_n(1).jpg', '09479888749', '1995-11-23', 'adminivan@gmail.com', 'adminivan', 'Male', 1, '2015-11-23'),
(2, 3, 'Allen', 'Bartholomew Henry', 'East', 'Central City', 'Aristotle_Color.jpg', '434', '1995-11-23', 'barryallen@gmail.com', 'barry', 'Male', 1, '2015-11-23'),
(3, 2, 'West', 'Irish', 'West', 'Central City', 'apple david.jpg', '09687231212', '1993-06-22', 'iriswestallen@gmail.com', 'iris', 'Female', 1, '2015-11-23'),
(4, 7, 'Queen', 'Oliver', 'Robert', 'Starling City', '15267837_1235855576472004_2196598368222274648_n.jpg', '09831238768', '1980-11-10', 'oliverqueen@gmail.com', 'arrow', 'Male', 1, '2015-11-23'),
(5, 3, 'David', 'Apple', 'Mansanas', 'Central City', 'bee.jpg', '09831238768', '1990-06-19', 'appledavid@gmail.com', 'apple', 'Female', 1, '0000-00-00');

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
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblcollegeprograms`
--

INSERT INTO `tblcollegeprograms` (`program_id`, `department_id`, `program_name`, `program_code`) VALUES
(1, 2, 'ARTS AND HUMANITIES', 'ARTHUMANS'),
(2, 5, 'ASSASINATION', 'ASSASINATE');

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
-- Table structure for table `tbldepartments`
--

CREATE TABLE IF NOT EXISTS `tbldepartments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_code` varchar(45) NOT NULL,
  `department_name` varchar(45) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`department_id`, `department_code`, `department_name`) VALUES
(1, 'SCHOOL-ADMIN', 'University Of Makati Admin'),
(2, 'COAHS', 'COLLEGE OF ALLIED HEALTH STUDIES'),
(3, 'CAS', 'COLLEGE OF ARTS AND SCIENCES'),
(4, 'COA', 'COLLEGE OF AERONAUTICS'),
(5, 'COS', 'COLLEGE OF SNIPERS '),
(6, 'COE', 'COLLEGE OF EDUCATION'),
(7, 'COM', 'COLLEGE OF MAGES');

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
  `log_time` datetime NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`log_id`, `log_user_id`, `log_header`, `log_message`, `log_time`, `event_id`) VALUES
(1, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 0', '2017-08-27 02:04:39', 0),
(2, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 0', '2017-08-27 02:04:39', 0),
(3, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 0', '2017-08-27 02:04:39', 0),
(4, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 02:07:03', 0),
(5, 1, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 02:09:06', 0),
(6, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 02:17:46', 0),
(7, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 11:14:32', 0),
(8, 1, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 15:53:42', 0),
(9, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 15:53:50', 0),
(10, 1, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 15:54:38', 0),
(11, 2, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 15:54:44', 0),
(12, 2, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 17:10:05', 0),
(13, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 17:10:11', 0),
(14, 1, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 18:28:53', 0),
(15, 2, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 18:28:57', 0),
(16, 2, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 18:30:05', 0),
(17, 2, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 18:30:12', 0),
(18, 2, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 19:04:18', 0),
(19, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 19:04:23', 0),
(20, 1, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 20:25:00', 0),
(21, 2, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 20:25:07', 0),
(22, 2, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 21:00:13', 0),
(23, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 21:00:17', 0),
(24, 1, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 21:01:30', 0),
(25, 2, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 21:01:37', 0),
(26, 2, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 21:12:08', 0),
(27, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 21:12:42', 0),
(28, 1, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 21:13:02', 0),
(29, 3, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 21:13:05', 0),
(30, 3, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 21:31:44', 0),
(31, 1, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 21:31:49', 0),
(32, 1, 'Success Logout', 'Success Logout at Sunday 27th of August 2017 ', '2017-08-27 21:34:48', 0),
(33, 3, 'Success Login', 'Success Login at Sunday 27th of August 2017 ', '2017-08-27 21:34:55', 0),
(34, 1, 'Success Login', 'Success Login at Monday 28th of August 2017 ', '2017-08-28 09:01:56', 0),
(35, 1, 'Success Login', 'Success Login at Monday 28th of August 2017 ', '2017-08-28 20:36:59', 0),
(36, 1, 'Success Logout', 'Success Logout at Monday 28th of August 2017 ', '2017-08-28 21:18:16', 0),
(37, 1, 'Success Login', 'Success Login at Monday 28th of August 2017 ', '2017-08-28 21:18:28', 0),
(38, 1, 'Success Login', 'Success Login at Tuesday 29th of August 2017 ', '2017-08-29 23:19:14', 0),
(39, 1, 'Success Login', 'Success Login at Wednesday 30th of August 201', '2017-08-30 16:09:30', 0),
(40, 1, 'Add Event', 'Add event about edil fitr at Wednesday 30th o', '2017-08-30 16:09:59', 0),
(41, 1, 'Success Logout', 'Success Logout at Wednesday 30th of August 2017 ', '2017-08-30 16:13:56', 0),
(42, 1, 'Success Login', 'Success Login at Wednesday 30th of August 2017 ', '2017-08-30 16:14:03', 0),
(43, 1, 'Add Event', 'Add event about basketball sched at Wednesday 30th of August 2017 ', '2017-08-30 16:14:57', 0),
(44, 1, 'Delete Event', 'Delete event about  at Wednesday 30th of August 2017 ', '2017-08-30 16:20:19', 0),
(45, 1, 'Add Event', 'Add event about wala at Wednesday 30th of August 2017 ', '2017-08-30 16:26:33', 0),
(46, 1, 'Delete Event', 'Delete event about  at Wednesday 30th of August 2017 ', '2017-08-30 16:29:21', 0),
(47, 1, 'Add Event', 'Add event about testing ulot at Wednesday 30th of August 2017 ', '2017-08-30 16:34:37', 0),
(48, 1, 'Add Event', 'Add event about dsds at Wednesday 30th of August 2017 ', '2017-08-30 16:37:41', 0),
(49, 1, 'Delete Event', 'Delete event about 48 at Wednesday 30th of August 2017 ', '2017-08-30 16:37:42', 0),
(50, 1, 'Add Event', 'Add event about dsds at Wednesday 30th of August 2017 ', '2017-08-30 16:38:52', 0),
(51, 1, 'Delete Event', 'Delete event about  at Wednesday 30th of August 2017 ', '2017-08-30 16:43:56', 0),
(52, 1, 'Delete Event', 'Delete event about  at Wednesday 30th of August 2017 ', '2017-08-30 16:43:58', 0),
(53, 1, 'Delete Event', 'Delete event about  at Wednesday 30th of August 2017 ', '2017-08-30 16:44:08', 0),
(54, 1, 'Delete Event', 'Delete event about  at Wednesday 30th of August 2017 ', '2017-08-30 16:44:34', 0),
(55, 1, 'Add Event', 'Add event about sdsds at Wednesday 30th of August 2017 ', '2017-08-30 16:56:06', 0);

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
  `date_birth` datetime NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblstudentinfo`
--

INSERT INTO `tblstudentinfo` (`tbl_student_id`, `student_id`, `last_name`, `first_name`, `middle_name`, `address`, `contact`, `image`, `date_birth`, `email`, `password`, `gender`, `program_major`, `department`, `guardian_name`, `isActive`, `section`, `yearlevel`) VALUES
(1, 'K1122115', 'Snow', 'John', 'Hernandez', 'New Found Glory Taguig City', '09831238768', '', '1994-07-13 00:00:00', 'johnv@gmail.com', 'john', 'Male', 0, 3, '', 1, 0, 0),
(2, 'K1122112', 'Hernandez', 'Jhoana Marie', 'Elionor', 'New Manila', '09831238768', '', '2017-08-22 00:00:00', 'jmfernandez@gmail.com', 'jmfernandez', 'Female', 0, 3, '', 1, 0, 0);

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
