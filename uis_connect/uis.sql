-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2015 at 01:14 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uis`
--
CREATE DATABASE IF NOT EXISTS `uis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uis`;

-- --------------------------------------------------------

--
-- Table structure for table `3module`
--

CREATE TABLE IF NOT EXISTS `3module` (
  `module_id` int(255) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(30) NOT NULL,
  `module_info` varchar(155) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `3module`
--

INSERT INTO `3module` (`module_id`, `module_name`, `module_info`) VALUES
(1, 'introduction to business', 'all about business'),
(2, 'introduction to accounting', 'all about accounting'),
(3, 'introduction on engineering', 'all about engineering');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `image` varchar(25) NOT NULL,
  `date_updated` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `image`, `date_updated`, `time`, `venue`, `description`) VALUES
(1, 'Online User Application System [Updated]', 'ann_1', '2015-02-26', '', '', 'The ITB User Online Application System’s (OAS) opening date is still pending subject to the opening of HECAS 2015’s first round of online applications for the academic year 2015/2016.');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `marks_id` int(3) NOT NULL AUTO_INCREMENT,
  `student_id` int(3) NOT NULL,
  `module_id` int(3) NOT NULL,
  `mark` int(3) NOT NULL,
  PRIMARY KEY (`marks_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`marks_id`, `student_id`, `module_id`, `mark`) VALUES
(1, 1, 1, 40),
(2, 1, 2, 50),
(3, 1, 3, 60),
(4, 1, 4, 65),
(5, 1, 5, 77);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `module_id` int(3) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(50) NOT NULL,
  `course` varchar(70) NOT NULL,
  `semester` int(1) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `course`, `semester`) VALUES
(1, 'Melayu Islam Beraja', 'Bachelor of Science in Internet Computing', 1),
(2, 'Communication Skills', 'Bachelor of Science in Internet Computing', 1),
(3, 'Computational Mathematics', 'Bachelor of Science in Internet Computing', 1),
(4, 'Fundamentals of Information Systems', 'Bachelor of Science in Internet Computing', 1),
(5, 'Programming I', 'Bachelor of Science in Internet Computing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text,
  `image` varchar(50) NOT NULL,
  `date_create` date NOT NULL,
  `date_updated` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `date_create`, `date_updated`) VALUES
(1, 'Visit to ITB by the Vice-Chancellor of UNISEL', 'Institut Teknologi Brunei today hosted a courtesy visit by a 4-member delegation from Universiti Selangor Malaysia (UNISEL). The delegation comprises of Vice-Chancellor, Professor Dr Hj Anuar bin Ahmad, En Muhammad bin Sulaiman (Registrar), Puan Yuslina binti Yusoff (Director of Marketing & Admission) and En Mohd Nothman Mohamad Nor (Programme Leader of Bachelor of Islamic Studies). The VC and delegates were formally welcomed by Associate Professor Dr Hajah Zohrah binti Haji Sulaiman, Vice-Chancellor of ITB.<br><br>\r\n\r\nIn the meeting, the guests were given an overview of the University’s background, significant milestones, academic programmes and research. The delegation also toured the ITB Gallery.<br><br>\r\n\r\nThe Universiti Selangor Malaysia is a university wholly owned and managed by the Selangor state government independently without funding from the Malaysian federal government. It was established in 1999 and now operates from two campuses in Selangor, Malaysia. <br><br>', 'img_1', '2015-02-11', '2015-02-11'),
(2, 'National Flag Raised in ITB', 'A flag-hoisting ceremony to commemorate the start of the country’s 31th National Day celebration was organised today at the ITB campus. The Guest of Honour at the event was Associate Professor Dr Hajah Zohrah binti Haji Sulaiman, the Vice Chancellor of ITB. Also in attendance were the university’s Principal Officers, lecturers, staff and students.<br><br>\r\n\r\nThe ceremony commenced with the recitation of Surah Al-Fatihah led by Ustaz Pengiran Hj Kamarudzaman bin Pg Haji Md Yassin. The ceremony then proceeded with the handing over of the national flag by the Guest of Honour to supervising personnel of the ITB Army Cadet, Staff Sergeant 645 Dk Noralam Pg Tuah. The flag was then hoisted ceremoniously by members of the ITB Army Cadet, accompanied by the singing of the national anthem by all present.<br><br>\r\n\r\nThe attendees also sang the patriotic songs ‘Merdeka Negaraku Brunei Darussalam’ in unison.<br><br>', 'img_2', '2015-02-09', '2015-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(4) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(40) NOT NULL,
  `student_course` varchar(50) NOT NULL,
  `student_year` int(4) NOT NULL,
  `student_module` int(3) NOT NULL,
  `module_confirm` int(3) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_course`, `student_year`, `student_module`, `module_confirm`) VALUES
(1, 'Gilbert Wong Liang See', 'Bachelor of Science in Internet Computing', 2011, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL,
  `user_pass` varchar(15) NOT NULL,
  `user_level` varchar(8) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pass`, `user_level`) VALUES
(1, 'user', '1234', 'super');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
