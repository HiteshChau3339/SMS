-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 11:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms-2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `role` varchar(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `admin_img` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `gender`, `role`, `email`, `password`, `phone`, `address`, `admin_img`) VALUES
(2, 'Khushal', 'Rajani', 'male', 'Admin', 'k@gmail.com', '1', '98545788981', 'Jamnagar', 'stu_img/khushal.png');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(34, 'MBA'),
(36, 'BCA'),
(38, 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_category` varchar(200) NOT NULL,
  `event_date` date NOT NULL,
  `reg_startdate` date NOT NULL,
  `reg_enddate` date NOT NULL,
  `event_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_category`, `event_date`, `reg_startdate`, `reg_enddate`, `event_desc`) VALUES
(11, 'Football', 'sport', '2023-09-30', '2023-09-15', '2023-09-17', 'ssfsfssfsfsf'),
(12, 'Volleyball', 'sport', '2023-09-30', '2023-09-18', '2023-09-20', 'adadadadasd'),
(13, 'kabbaddi', 'sport', '2023-09-30', '2023-09-21', '2023-09-24', 'adqddqdadasacaca'),
(14, 'Criket', 'sport', '2023-09-22', '2023-09-14', '2023-09-15', 'daddadadadada'),
(15, 'hockey', 'sport', '2023-09-30', '2023-09-21', '2023-09-22', 'adadadaadadasd'),
(16, 'Khokho', 'sport', '2023-09-26', '2023-09-14', '2023-09-25', 'rfbff,f,f');

-- --------------------------------------------------------

--
-- Table structure for table `event_register`
--

CREATE TABLE `event_register` (
  `RegEvent_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_register`
--

INSERT INTO `event_register` (`RegEvent_id`, `event_id`, `stud_id`) VALUES
(33, 11, 37),
(34, 12, 37),
(37, 13, 38),
(38, 13, 37);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `leave_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `leave_type` varchar(200) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_description` varchar(500) NOT NULL,
  `leave_status` int(11) NOT NULL,
  `ApprovalRemarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`leave_id`, `stud_id`, `leave_type`, `leave_from`, `leave_to`, `leave_description`, `leave_status`, `ApprovalRemarks`) VALUES
(10, 37, 'Personal', '2023-09-06', '2023-09-14', 'I am very seek', 2, ''),
(11, 37, 'Personal', '2023-09-23', '2023-09-14', 'asdadadad', 3, ''),
(12, 37, 'Madical', '2023-09-14', '2023-09-21', 'Because I am very sick', 1, ''),
(14, 37, 'Madical', '2023-09-24', '2023-09-16', 'sf,;lss;lf,al;fslfs;fsfs;l,v;lsfv,svs ', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `stud_id`, `date`, `subject`, `message`) VALUES
(12, 37, '2023-09-20', 'To discusses our studies', 'To meet the principal'),
(13, 38, '2023-09-30', 'To Meet The Project Guide', 'To discusses our project');

-- --------------------------------------------------------

--
-- Table structure for table `stud_register`
--

CREATE TABLE `stud_register` (
  `stud_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `repassword` varchar(50) NOT NULL,
  `stud_img` varchar(5000) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `role` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_register`
--

INSERT INTO `stud_register` (`stud_id`, `firstname`, `lastname`, `email`, `password`, `repassword`, `stud_img`, `gender`, `phone`, `address`, `course_id`, `role`) VALUES
(37, 'Hitesh', 'Chau', 'h@gmail.com', '1', '1', 'stu_img/myImg.jpg', 'male', '9854578898', 'Jamnagar', 34, 'Student'),
(38, 'Savan', 'Patel', 's@gmail.com', '1', '1', 'stu_img/savan.png', 'male', '6985457881', 'Surat', 34, 'Student'),
(39, 'Imran', 'Modi', 'i@gmail.com', '1', '1', 'stu_img/imran.png', 'male', '9854598651', 'Surat', 36, 'Student'),
(40, 'Khushal', 'Patel', 'p@gmail.com', '1', '1', 'stu_img/customer.png', 'male', '4556512232', 'Lalpur', 36, 'Student'),
(41, 'Om', 'Patel', 'om@gmail.com', '1', '1', 'stu_img/icons8-customer-48.png', 'male', '9854578856', 'Khambhaliya', 38, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_register`
--
ALTER TABLE `event_register`
  ADD PRIMARY KEY (`RegEvent_id`),
  ADD KEY `event_register_ibfk_1` (`event_id`),
  ADD KEY `event_register_ibfk_2` (`stud_id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `leave_ibfk_1` (`stud_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `notice_ibfk_1` (`stud_id`);

--
-- Indexes for table `stud_register`
--
ALTER TABLE `stud_register`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `stud_register_ibfk_2` (`role`),
  ADD KEY `stud_register_ibfk_1` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `event_register`
--
ALTER TABLE `event_register`
  MODIFY `RegEvent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stud_register`
--
ALTER TABLE `stud_register`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_register`
--
ALTER TABLE `event_register`
  ADD CONSTRAINT `event_register_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `event_register_ibfk_2` FOREIGN KEY (`stud_id`) REFERENCES `stud_register` (`stud_id`);

--
-- Constraints for table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `leave_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `stud_register` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notice`
--
ALTER TABLE `notice`
  ADD CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `stud_register` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stud_register`
--
ALTER TABLE `stud_register`
  ADD CONSTRAINT `stud_register_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
