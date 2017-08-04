-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2017 at 04:38 PM
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
-- Table structure for table `tblcourse`
--

CREATE TABLE IF NOT EXISTS `tblcourse` (
  `course_id` varchar(20) NOT NULL,
  `college` varchar(10) NOT NULL,
  `program` varchar(140) NOT NULL,
  `major` varchar(100) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblgrades`
--

CREATE TABLE IF NOT EXISTS `tblgrades` (
  `grade_id` int(10) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `prof_id` varchar(20) NOT NULL,
  `assignment` float NOT NULL,
  `quizzes` float NOT NULL,
  `laboratory` float NOT NULL,
  `class_stand` float NOT NULL,
  `project` float NOT NULL,
  `midterm_exam` float NOT NULL,
  `midterm_grade` varchar(10) NOT NULL,
  `final_assign` float NOT NULL,
  `final_quiz` float NOT NULL,
  `final_lab` float NOT NULL,
  `final_cs` float NOT NULL,
  `final_proj` float NOT NULL,
  `final_exam` float NOT NULL,
  `final_grade` varchar(10) NOT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblguidancecounselor`
--

CREATE TABLE IF NOT EXISTS `tblguidancecounselor` (
  `gc_id` varchar(20) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `contact_no` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `is_prof` tinyint(1) NOT NULL,
  `is_extgc` tinyint(1) NOT NULL,
  PRIMARY KEY (`gc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblprofessor`
--

CREATE TABLE IF NOT EXISTS `tblprofessor` (
  `prof_id` varchar(20) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `department` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `contact_no` text NOT NULL,
  `is_tutor` tinyint(1) NOT NULL,
  `is_counselor` tinyint(1) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `course_name` varchar(140) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  PRIMARY KEY (`prof_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprofessor`
--

INSERT INTO `tblprofessor` (`prof_id`, `last_name`, `first_name`, `middle_name`, `department`, `email`, `password`, `contact_no`, `is_tutor`, `is_counselor`, `course_id`, `course_name`, `subject_id`, `subject_name`) VALUES
('A4512345', 'Salvador', 'Jessibel', 'S', 'Science', 'jessilicious@gmail.com', 'jessibel', '09082363508', 0, 0, '1', 'Biology', '1', 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentinfo`
--

CREATE TABLE IF NOT EXISTS `tblstudentinfo` (
  `student_id` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `college` varchar(10) NOT NULL,
  `program` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  `year_level` varchar(10) NOT NULL,
  `section` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(1000) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentinfo`
--

INSERT INTO `tblstudentinfo` (`student_id`, `last_name`, `first_name`, `middle_name`, `college`, `program`, `major`, `year_level`, `section`, `email`, `contact`, `password`, `image`) VALUES
('k1122095', 'Funcion', 'Ivan Christian Jay', 'Echanes', 'CCS', 'Bachelor of Computer Science', 'Application Developement', '4th year', 'ACSAD', 'icjfuncion@gmail.com', '09479888749', 'ivan', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentstatus`
--

CREATE TABLE IF NOT EXISTS `tblstudentstatus` (
  `id` int(10) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `subject_id` varchar(30) NOT NULL,
  `prof_id` varchar(20) NOT NULL,
  `subject` varchar(70) NOT NULL,
  `is_tutor` tinyint(1) NOT NULL,
  `final_grade` int(10) NOT NULL,
  `links` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudenttutor`
--

CREATE TABLE IF NOT EXISTS `tblstudenttutor` (
  `ref_num` varchar(20) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `prof_id` varchar(20) NOT NULL,
  `gc_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `message` varchar(140) NOT NULL,
  `to_tutor` tinyint(1) NOT NULL,
  `to_counselor` tinyint(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`ref_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE IF NOT EXISTS `tblsubjects` (
  `subject_id` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `college` varchar(10) NOT NULL,
  `program` varchar(140) NOT NULL,
  `major` varchar(100) NOT NULL,
  `year_level` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `unit` int(10) NOT NULL,
  `prof_id` varchar(20) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
