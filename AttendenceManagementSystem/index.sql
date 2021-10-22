-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 01:29 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `index`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_student`
--

CREATE TABLE `daily_student` (
  `day` varchar(10) NOT NULL DEFAULT current_timestamp(),
  `id` int(10) NOT NULL,
  `std_first_name` varchar(20) NOT NULL,
  `std_last_name` varchar(50) NOT NULL,
  `std_sem` int(5) NOT NULL,
  `std_course` varchar(20) NOT NULL,
  `hour1` varchar(10) NOT NULL DEFAULT 'present',
  `hour2` varchar(10) NOT NULL DEFAULT 'present',
  `hour3` varchar(10) NOT NULL DEFAULT 'present',
  `hour4` varchar(10) NOT NULL DEFAULT 'present',
  `hour5` varchar(10) NOT NULL DEFAULT 'present',
  `attendance` varchar(10) NOT NULL DEFAULT 'present',
  `score` float NOT NULL DEFAULT 1,
  `TP` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_student`
--

INSERT INTO `daily_student` (`day`, `id`, `std_first_name`, `std_last_name`, `std_sem`, `std_course`, `hour1`, `hour2`, `hour3`, `hour4`, `hour5`, `attendance`, `score`, `TP`) VALUES
('2019-11-23', 1001, 'student1', 'student1', 1, 'B.com (computer)', 'present', 'present', 'present', 'present', 'present', 'present', 1, 142),
('2019-11-23', 1002, 'student2', 'abcd', 1, 'B.com (computer)', 'present', 'present', 'present', 'present', 'present', 'present', 1, 143),
('2019-11-23', 1003, 'student3', 'abcd', 1, 'B.com (computer)', 'present', 'present', 'present', 'present', 'present', 'present', 1, 144),
('2019-11-23', 1004, 'student4', 'ytieorhew', 1, 'B.com (computer)', 'present', 'present', 'present', 'present', 'present', 'present', 1, 145),
('2019-11-23', 1005, 'student5', 'adfada', 1, 'B.com (computer)', 'present', 'present', 'present', 'present', 'present', 'present', 1, 146),
('2019-11-23', 1006, 'student6', 'adfhjashdf', 1, 'B.com (computer)', 'present', 'present', 'present', 'present', 'present', 'present', 1, 147),
('2019-11-24', 1001, 'student1', 'student1', 1, 'B.com (computer)', 'absent', 'absent', 'absent', 'absent', 'absent', 'absent', 0, 148),
('2019-11-24', 1002, 'student2', 'abcd', 1, 'B.com (computer)', 'present', 'present', 'present', 'present', 'present', 'present', 1, 149),
('2019-11-24', 1003, 'student3', 'abcd', 1, 'B.com (computer)', 'present', 'present', 'present', 'present', 'present', 'present', 1, 150),
('2019-11-24', 1004, 'student4', 'ytieorhew', 1, 'B.com (computer)', 'present', 'present', 'present', 'present', 'present', 'present', 1, 151),
('2019-11-24', 1005, 'student5', 'adfada', 1, 'B.com (computer)', 'present', 'present', 'present', 'present', 'present', 'present', 1, 152),
('2019-11-24', 1006, 'student6', 'adfhjashdf', 1, 'B.com (computer)', 'absent', 'absent', 'absent', 'absent', 'absent', 'absent', 0, 153);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(10) NOT NULL,
  `dep_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`) VALUES
(1, 'B.com (computer)'),
(2, 'B.com (tax)'),
(3, 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL,
  `staff_first_name` varchar(30) NOT NULL,
  `staff_last_name` varchar(30) NOT NULL,
  `staff_gender` varchar(10) NOT NULL,
  `staff_dob` date NOT NULL,
  `staff_type` varchar(20) NOT NULL,
  `staff_house_no` int(10) NOT NULL,
  `staff_house_name` varchar(50) NOT NULL,
  `staff_street` varchar(30) NOT NULL,
  `staff_district` varchar(20) NOT NULL,
  `staff_ph_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_first_name`, `staff_last_name`, `staff_gender`, `staff_dob`, `staff_type`, `staff_house_no`, `staff_house_name`, `staff_street`, `staff_district`, `staff_ph_no`) VALUES
(111, 'staff1', 'abd', 'on', '2019-11-23', 'Teaching', 333, 'dfasdf', 'adimali', 'Idukki', '+91843753457'),
(112, 'staff2', 'abcd', 'on', '2019-11-23', 'Teaching', 333, 'afasdfsadf', 'adimali', 'Idukki', '+91843753457'),
(113, 'staff3', '  hdsfhakjs', 'on', '2019-11-23', 'Non-Teaching', 36, 'dfasdf', 'adimali', 'Idukki', '+916473867843'),
(114, 'staff3', 'dfasdf', 'on', '2019-11-23', 'Teaching', 677, 'hjkdhsaf', 'adimali', 'Idukki', '+916473867843'),
(115, 'staff4', 'dsfadsfasd', 'on', '2019-11-23', 'Non-Teaching', 454, 'dfasdf', 'adimali', 'Idukki', '+91843753457');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `tp` int(255) NOT NULL,
  `day` date NOT NULL DEFAULT current_timestamp(),
  `staff_id` int(10) NOT NULL,
  `staff_first_name` varchar(30) NOT NULL,
  `staff_last_name` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `staff_attendance` varchar(20) NOT NULL DEFAULT 'present',
  `points` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_attendance`
--

INSERT INTO `staff_attendance` (`tp`, `day`, `staff_id`, `staff_first_name`, `staff_last_name`, `type`, `staff_attendance`, `points`) VALUES
(428, '2019-11-23', 111, 'staff1', 'abd', 'Teaching', 'present', 1),
(429, '2019-11-23', 112, 'staff2', 'abcd', 'Teaching', 'present', 1),
(430, '2019-11-23', 113, 'staff3', '  hdsfhakjs', 'Non-Teaching', 'present', 1),
(431, '2019-11-23', 114, 'staff3', 'dfasdf', 'Teaching', 'present', 1),
(432, '2019-11-23', 115, 'staff4', 'dsfadsfasd', 'Non-Teaching', 'present', 1),
(433, '2019-11-24', 111, 'staff1', 'abd', 'Teaching', 'present', 1),
(434, '2019-11-24', 112, 'staff2', 'abcd', 'Teaching', 'present', 1),
(435, '2019-11-24', 113, 'staff3', '  hdsfhakjs', 'Non-Teaching', 'present', 1),
(436, '2019-11-24', 114, 'staff3', 'dfasdf', 'Teaching', 'present', 1),
(437, '2019-11-24', 115, 'staff4', 'dsfadsfasd', 'Non-Teaching', 'present', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(10) NOT NULL,
  `std_first_name` varchar(20) NOT NULL,
  `std_last_name` varchar(20) NOT NULL,
  `std_gender` varchar(10) NOT NULL,
  `std_dob` date NOT NULL,
  `std_course` varchar(30) NOT NULL,
  `std_sem` int(10) NOT NULL,
  `join_year` varchar(10) NOT NULL,
  `std_house_no` varchar(10) NOT NULL,
  `std_house_name` varchar(50) NOT NULL,
  `std_street` varchar(50) NOT NULL,
  `std_ph` varchar(20) NOT NULL,
  `std_parent` varchar(30) NOT NULL,
  `std_district` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_first_name`, `std_last_name`, `std_gender`, `std_dob`, `std_course`, `std_sem`, `join_year`, `std_house_no`, `std_house_name`, `std_street`, `std_ph`, `std_parent`, `std_district`) VALUES
(1000, '', '', '', '0000-00-00', '', 0, '', '', '', '', '', '', ''),
(1001, 'student1', 'student1', 'male', '1999-11-15', 'B.com (computer)', 1, '', '123', 'none', 'adimaly', '+91123434534', 'parent', 'Idukki'),
(1002, 'student2', 'abcd', 'male', '2019-11-23', 'B.com (computer)', 1, '', '45455', 'jkl', 'adimali', '+919037473645', 'abcd', 'Idukki'),
(1003, 'student3', 'abcd', 'female', '2019-11-23', 'B.com (computer)', 1, '', '3764', 'jkl', 'adimali', '+914637647844', 'abcd', 'Idukki'),
(1004, 'student4', 'ytieorhew', 'female', '2019-11-23', 'B.com (computer)', 1, '', '463764', 'jkdjfdsklf', 'admali', '+915784368346', 'hjhfdskf', 'Idukki'),
(1005, 'student5', 'adfada', 'female', '2019-11-23', 'B.com (computer)', 1, '', '76', 'dsfhjhadsfjk', 'adimali', '+916665553448', 'jfhajsdhfhas', 'Idukki'),
(1006, 'student6', 'adfhjashdf', 'male', '2019-11-23', 'B.com (computer)', 1, '', '7456', 'jdfhadshf', 'jdshafjdsla', '+914637647893', 'fhsadjkhf', 'Trivandrum');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`) VALUES
('Admin', 'adad', 'adad'),
('Staff', 'staff', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `working_days`
--

CREATE TABLE `working_days` (
  `working_day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_days`
--

INSERT INTO `working_days` (`working_day`) VALUES
('2019-11-23'),
('2019-11-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_student`
--
ALTER TABLE `daily_student`
  ADD PRIMARY KEY (`TP`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD PRIMARY KEY (`tp`),
  ADD UNIQUE KEY `tp` (`tp`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `working_days`
--
ALTER TABLE `working_days`
  ADD PRIMARY KEY (`working_day`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_student`
--
ALTER TABLE `daily_student`
  MODIFY `TP` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  MODIFY `tp` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=438;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
