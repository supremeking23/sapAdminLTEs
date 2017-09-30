-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2017 at 02:44 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbladmins`
--

INSERT INTO `tbladmins` (`admin_id`, `admin_department_id`, `last_name`, `first_name`, `middle_name`, `address`, `image`, `contact`, `date_birth`, `email`, `password`, `gender`, `isActive`, `date_added`) VALUES
(1, 1, 'Funcion', 'Ivan Christian Jay', 'Echanes', '520-B 16th ISU Village ', '11200881_1216700208355786_8839516984461419799_n.jpg', '09479888749', '1995-11-23', 'adminivan@gmail.com', 'adminivan', 'Male', 1, '2015-11-23'),
(7, 1, 'Gustin', 'Jia Lenne', 'Alberts', 'New Manila', 'Hillary_Goldwynn_tn.jpg', '09831238768', '1995-09-12', 'jialennealberts@gmail.com', 'jialennealberts', 'Female', 1, '2015-11-23'),
(8, 12, 'Allen', 'Bartholomew Henry', 'West', 'New Found Glory Taguig City', '20.jpeg', '09831238768', '1990-06-12', 'barryallen@gmail.com', 'barry', 'Male', 1, '0000-00-00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblannouncements`
--

INSERT INTO `tblannouncements` (`announcement_id`, `department_id`, `user_id`, `content`, `post_date`) VALUES
(1, 1, 1, 'next week is octobervest', '2017-09-28 11:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblcollegeprograms`
--

CREATE TABLE IF NOT EXISTS `tblcollegeprograms` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `program_name` text NOT NULL,
  `program_code` varchar(45) NOT NULL,
  `program_description` text NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tblcollegeprograms`
--

INSERT INTO `tblcollegeprograms` (`program_id`, `department_id`, `program_name`, `program_code`, `program_description`) VALUES
(7, 12, 'Bachelor of Science in Computer Science Major in Application Development', 'BSCS AppDev', '<p>Bachelor of Science in Computer Science Major in Application Development is a 4 years course offered by the College of Computer Science<br></p>');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbldepartmentheads`
--

INSERT INTO `tbldepartmentheads` (`id`, `first_name`, `middle_name`, `last_name`, `address`, `date_birth`, `image`, `email`, `contact`, `department_id`, `gender`, `dean_since`) VALUES
(11, 'Lords', 'Howard', 'Stark', '520-B 16th ISU Village Barangay 31 South Side', '2017-09-21', '9.jpeg', 'lhs@gmail.com', '09831238768', 12, 'Male', '2017-09-28');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`department_id`, `department_code`, `department_name`, `department_logo`, `department_banner`, `department_color`, `mission`, `vision`) VALUES
(1, 'SCHOOL-ADMIN', 'SCHOOL-ADMIN', '', '', '#0073b7', '', ''),
(12, 'CCS', 'College of Computer Sciences', 'engineer.png', 'engineer banner.png', '#004080', '<p>Guided by its vision of commitment, the College shall provide a competitive, relevant, and functional information technology education curriculum responsive to the needs of the industrial and business organizations of the locality.<br></p>', '<p>The College of Computer Science envisions an Information Technology Education Institution committed to the development and adequate utilization and applications of information technology.<br></p>');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `log_user_level` varchar(45) NOT NULL,
  `log_header` text NOT NULL,
  `log_message` text NOT NULL,
  `log_time` time NOT NULL,
  `log_date` date NOT NULL,
  `foreign_id` int(11) NOT NULL,
  `table_name` text NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=253 ;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`log_id`, `log_user_id`, `log_user_level`, `log_header`, `log_message`, `log_time`, `log_date`, `foreign_id`, `table_name`) VALUES
(248, 1, 'admin', 'Success Login', 'Success Login at Thursday 28th of September 2017 ', '01:27:32', '2017-09-28', 0, ''),
(249, 1, '', 'Add Department', 'Add Department at Thursday 28th of September 2017 ', '01:39:53', '2017-09-28', 0, ''),
(250, 1, '', 'Add College Program', 'Add College Program at Thursday 28th of September 2017 ', '02:25:30', '2017-09-28', 0, ''),
(251, 1, 'admin', 'Success Login', 'Success Login at Thursday 28th of September 2017 ', '11:27:20', '2017-09-28', 0, ''),
(252, 1, '', 'Add Announcement', 'Add Announcement at Thursday 28th of September 2017 ', '11:28:56', '2017-09-28', 0, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblprofessor`
--

INSERT INTO `tblprofessor` (`tbl_prof_id`, `prof_id`, `last_name`, `first_name`, `middle_name`, `email`, `password`, `image`, `gender`, `department`, `date_birth`, `contact`, `address`, `isActive`, `date_added`) VALUES
(1, 'A0957966', 'Stark', 'Tony', 'Harris', 'tonystark@gmail.com', 'tony', '1391536_982696148422861_652186630375323824_n.jpg', 'Male', 12, '1981-06-23', '09479888749', 'New Found Glory Taguig City', 1, '2017-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `tblprofessorsubject`
--

CREATE TABLE IF NOT EXISTS `tblprofessorsubject` (
  `profsubject_id` int(11) NOT NULL AUTO_INCREMENT,
  `prof_id` varchar(45) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `yearlevel` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  PRIMARY KEY (`profsubject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblprofessorsubject`
--

INSERT INTO `tblprofessorsubject` (`profsubject_id`, `prof_id`, `subject_id`, `section_id`, `yearlevel`, `department_id`, `program_id`) VALUES
(2, '1', 1, 1, 1, 12, 7),
(3, '1', 0, 1, 1, 12, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblsection`
--

INSERT INTO `tblsection` (`tbl_section_id`, `section_name`, `program_id`, `department_id`, `yearlevel`) VALUES
(1, 'ACSAD', 7, 12, 1),
(2, 'BCSAD', 7, 12, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tblstudentinfo`
--

INSERT INTO `tblstudentinfo` (`tbl_student_id`, `student_id`, `last_name`, `first_name`, `middle_name`, `address`, `contact`, `image`, `date_birth`, `email`, `password`, `gender`, `program_major`, `department`, `guardian_name`, `isActive`, `section`, `yearlevel`) VALUES
(34, 'A0861506', 'Funcion', 'Irene Joy', 'Echanes', 'Makati City', '0909343431', '', '1995-10-22', 'irenejoyfuncion@gmail.com', '', 'Female', 7, 12, 'Ireneo G. Funcion', 1, 0, 0),
(36, 'A0077973', 'Forteza', 'Barbara', 'Dionisio', 'Makati City', '0909343431', 'jheck deonela.jpg', '1995-10-22', 'barbaraforteza@gmail.com', '', 'Female', 7, 12, 'Joshua Dionisio', 1, 2, 1),
(37, 'A0229608', 'Echanez', 'Jims Raymond', 'Lorenzo', 'Las Pinas City', '0909343432', '', '1995-10-23', 'jayjaymeep@gmai.com', '', 'Male', 7, 12, 'Henry Echanez', 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`subject_id`, `cfn`, `subject_name`, `subject_code`, `department_id`, `isActive`) VALUES
(1, 'A0928496', 'PROGRAM LOGIC FORMULATION', 'PROLOG', 12, 1),
(2, 'A0903815', 'WEB DEVELOPMENT BASICS', 'WEBDEV', 12, 1),
(3, 'A0411590', 'DATABASE FUNDAMENTAL', 'DATAFUN', 12, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblyearlevel`
--

INSERT INTO `tblyearlevel` (`tbl_yearlevel_id`, `yearlevel`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
