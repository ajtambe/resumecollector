-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2023 at 11:31 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resume_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicationtypemaster`
--

DROP TABLE IF EXISTS `applicationtypemaster`;
CREATE TABLE IF NOT EXISTS `applicationtypemaster` (
  `application_id` int NOT NULL AUTO_INCREMENT,
  `app_type` text COLLATE utf8mb4_general_ci NOT NULL,
  `app_description` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicationtypemaster`
--

INSERT INTO `applicationtypemaster` (`application_id`, `app_type`, `app_description`) VALUES
(1, 'Apply For Job', 'This job Complete Degree & Master.\r\n'),
(10, 'type', '$app_description'),
(5, 'intership', 'MCA Application');

-- --------------------------------------------------------

--
-- Table structure for table `educationstatusmaster`
--

DROP TABLE IF EXISTS `educationstatusmaster`;
CREATE TABLE IF NOT EXISTS `educationstatusmaster` (
  `education_id` int NOT NULL AUTO_INCREMENT,
  `education_status` text COLLATE utf8mb4_general_ci NOT NULL,
  `education_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`education_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educationstatusmaster`
--

INSERT INTO `educationstatusmaster` (`education_id`, `education_status`, `education_desc`) VALUES
(1, 'Ajay', 'ajay'),
(2, 'comp', 'ajay');

-- --------------------------------------------------------

--
-- Table structure for table `employeemaster`
--

DROP TABLE IF EXISTS `employeemaster`;
CREATE TABLE IF NOT EXISTS `employeemaster` (
  `employee_id` int NOT NULL AUTO_INCREMENT,
  `employee_name` text COLLATE utf8mb4_general_ci,
  `employee_email` text COLLATE utf8mb4_general_ci,
  `employee_mobile` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeemaster`
--

INSERT INTO `employeemaster` (`employee_id`, `employee_name`, `employee_email`, `employee_mobile`) VALUES
(1, 'ajay', 'Sujit@gmail.com', '703851813911'),
(3, 'Sujit Shinde', 'Sujit@gmail.com', '703851813911'),
(4, 'Ruturaj ', 'ruturaj@gmail.com', '7038518139');

-- --------------------------------------------------------

--
-- Table structure for table `loginmaster`
--

DROP TABLE IF EXISTS `loginmaster`;
CREATE TABLE IF NOT EXISTS `loginmaster` (
  `login_id` int NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginmaster`
--

INSERT INTO `loginmaster` (`login_id`, `username`, `password`) VALUES
(2, 'Tron Softech', 'Admin@12345'),
(3, 'Tron Softech', 'Admin@12345'),
(4, 'Tron Softech', 'Admin@12345'),
(5, 'Tron Softech', 'Admin@12345'),
(6, 'Tron Softech', 'Admin@12345'),
(7, 'Tron Softech', 'Admin@12345'),
(8, 'Tron Softech', 'Ajay'),
(9, 'ajay', 'Ajay'),
(10, 'Tron Softech', 'Ajay@1999');

-- --------------------------------------------------------

--
-- Table structure for table `resumemaster`
--

DROP TABLE IF EXISTS `resumemaster`;
CREATE TABLE IF NOT EXISTS `resumemaster` (
  `resume_id` int NOT NULL AUTO_INCREMENT,
  `app_type_id` int DEFAULT NULL,
  `education_status_id` int DEFAULT NULL,
  `course_name` text COLLATE utf8mb4_general_ci,
  `stream` text COLLATE utf8mb4_general_ci,
  `college_name` text COLLATE utf8mb4_general_ci,
  `passing_year` text COLLATE utf8mb4_general_ci,
  `fullname` text COLLATE utf8mb4_general_ci,
  `email` text COLLATE utf8mb4_general_ci,
  `mobile` text COLLATE utf8mb4_general_ci,
  `birth_date` text COLLATE utf8mb4_general_ci,
  `gender` text COLLATE utf8mb4_general_ci,
  `address` text COLLATE utf8mb4_general_ci,
  `resume` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `profile_photo` text COLLATE utf8mb4_general_ci,
  `primary_ref` int DEFAULT NULL,
  `secondary_ref` text COLLATE utf8mb4_general_ci,
  `createdon` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`resume_id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resumemaster`
--

INSERT INTO `resumemaster` (`resume_id`, `app_type_id`, `education_status_id`, `course_name`, `stream`, `college_name`, `passing_year`, `fullname`, `email`, `mobile`, `birth_date`, `gender`, `address`, `resume`, `profile_photo`, `primary_ref`, `secondary_ref`, `createdon`) VALUES
(68, 1, 1, 'mcs', 'computer Science', 'tc college baramati', '2022', 'ravi bankar', 'ss@gmail.com', ' 70308327455', '2023-02-18', 'Male', 'Phaltan 415523', 'New doc 14-Dec-2020 12.08 pm.pdf', NULL, 1, 'ruturaj', '23-02-09'),
(69, 1, 1, 'mcs', 'computer Science', 'tc college baramati', '2022', 'ravi bankar', 'ss@gmail.com', ' 70308327455', '2023-02-18', 'Male', 'Phaltan 415523', 'New doc 14-Dec-2020 12.08 pm.pdf', NULL, 1, 'ruturaj', '23-02-09'),
(70, 5, 1, 'mcs', 'computer Science', 'tc college baramati', '2022', 'ajay tambe', 'ajaytambe1999@gmail.com', '7083277216', '2023-02-06', 'Male', 'Phaltan 415523', 'New doc 14-Dec-2020 12.08 pm.pdf', NULL, 3, 'ruturaj', '23-02-09'),
(71, 5, 1, 'mcs', 'computer Science', 'tc college baramati', '2022', 'ajay tambe', 'ajaytambe1999@gmail.com', '7083277216', '2023-02-06', 'Male', 'Phaltan 415523', 'New doc 14-Dec-2020 12.08 pm.pdf', NULL, 3, 'ruturaj', '23-02-09'),
(72, 1, 1, 'mcs', 'computer Science', 'tc college baramati', '2022', 'Sujit shinde', 'sujit@gmail.com', ' 70308327455', '2023-02-13', 'Male', 'Phaltan 415523', 'Tambe ajay 23.pdf', NULL, 3, 'ruturaj', '23-02-09'),
(73, 1, 1, 'mcs', 'computer Science', 'tc college baramati', '2022', 'Sujit shinde', 'sujit@gmail.com', ' 70308327455', '2023-02-13', 'Male', 'Phaltan 415523', 'Tambe ajay 23.pdf', NULL, 3, 'ruturaj', '23-02-09'),
(74, 1, 2, 'mcs', 'computer Science', 'tc college baramati', '2022', 'ajay tambe', 'ajaytambe1999@gmail.com', '7038518139', '2023-02-15', 'Male', 'Phaltan 415523', 'Tambe ajay 23.pdf', '1.jpg', 3, 'ruturaj', '23-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `settingmaster`
--

DROP TABLE IF EXISTS `settingmaster`;
CREATE TABLE IF NOT EXISTS `settingmaster` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `company_name` text COLLATE utf8mb4_general_ci,
  `company_logo` text COLLATE utf8mb4_general_ci,
  `tag_line` text COLLATE utf8mb4_general_ci,
  `address` text COLLATE utf8mb4_general_ci,
  `super_admin_password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settingmaster`
--

INSERT INTO `settingmaster` (`admin_id`, `company_name`, `company_logo`, `tag_line`, `address`, `super_admin_password`) VALUES
(1, 'Tron Softech', 'thumb_7564sLogo - Copy.jpg', 'Design, Develop, Deploy.', 'Hadapsar Pune', 'Ajay@1999');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
