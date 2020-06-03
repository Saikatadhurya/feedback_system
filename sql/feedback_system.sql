-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 06:46 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `ans` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `ans`) VALUES
(1, 'Yes'),
(2, 'No'),
(3, 'Very Bad'),
(4, 'Bad'),
(5, 'Good'),
(6, 'Very Good'),
(7, 'Excellent');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `district_name` varchar(20) NOT NULL,
  `city_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `district_name`, `city_name`) VALUES
(1, 'Paschim Bardhaman', 'Durgapur'),
(2, 'Purba Bardhaman', 'Bardhaman');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `city_name` varchar(20) NOT NULL,
  `office_id` int(11) NOT NULL,
  `office_name` varchar(40) NOT NULL,
  `department_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `city_name`, `office_id`, `office_name`, `department_name`) VALUES
(1, 'Durgapur', 1, 'RTO office', 'Cash Department'),
(2, 'Durgapur', 1, 'RTO office', '2 wheeler');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `state_name` varchar(20) NOT NULL,
  `district_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `state_name`, `district_name`) VALUES
(1, 'West Bengal', 'Paschim Bardhaman'),
(2, 'West Bengal', 'Purba Bardhaman');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `id` int(11) NOT NULL,
  `district_name` varchar(20) NOT NULL,
  `city_name` varchar(20) NOT NULL,
  `office_name` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`id`, `district_name`, `city_name`, `office_name`, `description`, `image`) VALUES
(1, 'Paschim Bardhaman', 'Durgapur', 'RTO office', 'The Regional Transport Office is the organization of the Indian government responsible for registration of vehicles and the issue of drivers\' licences. In addition to this, the RTO officer checks for motor insurance and grants certificate of fitness to transport vehicles.', ''),
(2, 'Purba Bardhaman', 'Bardhaman', 'Water Office', 'The water industry provides drinking water and wastewater services (including sewage ... 1 Overview; 2 Organizational structure ... local government operating the system through a municipal department, municipal company, or inter-municipa', '');

-- --------------------------------------------------------

--
-- Table structure for table `other_feedback`
--

CREATE TABLE `other_feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `res_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dept_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_feedback`
--

INSERT INTO `other_feedback` (`id`, `email`, `res_id`, `timestamp`, `dept_id`, `subject`, `description`) VALUES
(12, 'sakatadhuryabirds@gmail.com', 1, '2019-10-30 04:45:29', 2, 'Nice', 'Awesome exp'),
(13, 'sakatadhuryabirds@gmail.com', 2, '2019-10-30 04:45:33', 2, 'Bad', 'Bad exp'),
(21, 'sakatadhuryabirds@gmail.com', 3, '2019-10-30 05:23:15', 2, 'Moderate', 'just a text'),
(26, 'sakatadhuryabirds@gmail.com', 1, '2019-10-30 05:40:48', 1, 'Moderate', 'Wow'),
(27, 'sakatadhuryabirds@gmail.com', 2, '2019-10-30 05:41:54', 1, 'Very Poor experience', 'Not soo good one'),
(28, 'sakatadhuryabirds@gmail.com', 4, '2019-10-30 05:43:52', 2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`) VALUES
(1, 'Is the office is clean?'),
(2, 'How is the behavior of office staffs?'),
(3, 'How is the response time?'),
(4, 'Department is technologically advanced?'),
(5, 'Overall rating?');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `ans_id` int(11) NOT NULL,
  `counter` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `dept_id`, `ques_id`, `ans_id`, `counter`) VALUES
(32, 2, 1, 1, '8'),
(33, 2, 2, 6, '3'),
(34, 2, 3, 6, '6'),
(35, 2, 4, 2, '3'),
(36, 2, 5, 6, '2'),
(37, 2, 1, 2, '3'),
(38, 2, 2, 5, '4'),
(39, 2, 3, 5, '3'),
(40, 2, 4, 1, '8'),
(41, 2, 5, 5, '3'),
(42, 2, 5, 4, '2'),
(43, 2, 2, 4, '4'),
(44, 2, 5, 3, '4'),
(56, 1, 1, 1, '1'),
(57, 1, 2, 5, '1'),
(58, 1, 3, 6, '1'),
(59, 1, 4, 2, '1'),
(60, 1, 5, 7, '1'),
(61, 1, 1, 2, '1'),
(62, 1, 2, 4, '1'),
(63, 1, 3, 4, '1'),
(64, 1, 4, 1, '1'),
(65, 1, 5, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `state_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state_name`) VALUES
(1, 'West Bengal'),
(2, 'Bihar');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_last_name` varchar(40) NOT NULL,
  `email` varchar(80) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `address` varchar(200) NOT NULL,
  `aadhar_image` text NOT NULL,
  `aadhar_no` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `first_name`, `middle_last_name`, `email`, `mobile`, `address`, `aadhar_image`, `aadhar_no`, `dob`, `password`) VALUES
(1, 'SAIKAT', 'ADHURYA', 'sakatadhuryabirds@gmail.com', '9093222034', 'M/6, Bidhan Park, sec-1, Fuljhore, Fuljhore', 'SAIKATADHURYA', '987654', '1998-07-06', '202cb962ac59075b964b07152d234b70'),
(2, 'Sagar', 'ADHURYA', 'sagaradhurya@gmail.com', '8918856924', 'M/6, Bidhan Park, sec-1, Fuljhore', 'SagarADHURYA', '12345678909876', '2019-10-30', 'c44a471bd78cc6c2fea32b9fe028d30a');

-- --------------------------------------------------------

--
-- Table structure for table `user_response`
--

CREATE TABLE `user_response` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `res_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_response`
--

INSERT INTO `user_response` (`id`, `email`, `res_id`, `dept_id`, `ques_id`, `ans_id`) VALUES
(69, 'sakatadhuryabirds@gmail.com', 1, 2, 1, 1),
(70, 'sakatadhuryabirds@gmail.com', 1, 2, 2, 6),
(71, 'sakatadhuryabirds@gmail.com', 1, 2, 3, 6),
(72, 'sakatadhuryabirds@gmail.com', 1, 2, 4, 2),
(73, 'sakatadhuryabirds@gmail.com', 1, 2, 5, 6),
(74, 'sakatadhuryabirds@gmail.com', 2, 2, 1, 2),
(75, 'sakatadhuryabirds@gmail.com', 2, 2, 2, 5),
(76, 'sakatadhuryabirds@gmail.com', 2, 2, 3, 5),
(77, 'sakatadhuryabirds@gmail.com', 2, 2, 4, 1),
(78, 'sakatadhuryabirds@gmail.com', 2, 2, 5, 5),
(114, 'sakatadhuryabirds@gmail.com', 3, 2, 1, 1),
(115, 'sakatadhuryabirds@gmail.com', 3, 2, 2, 5),
(116, 'sakatadhuryabirds@gmail.com', 3, 2, 3, 6),
(117, 'sakatadhuryabirds@gmail.com', 3, 2, 4, 2),
(118, 'sakatadhuryabirds@gmail.com', 3, 2, 5, 3),
(134, 'sakatadhuryabirds@gmail.com', 1, 1, 1, 1),
(135, 'sakatadhuryabirds@gmail.com', 1, 1, 2, 5),
(136, 'sakatadhuryabirds@gmail.com', 1, 1, 3, 6),
(137, 'sakatadhuryabirds@gmail.com', 1, 1, 4, 2),
(138, 'sakatadhuryabirds@gmail.com', 1, 1, 5, 7),
(139, 'sakatadhuryabirds@gmail.com', 2, 1, 1, 2),
(140, 'sakatadhuryabirds@gmail.com', 2, 1, 2, 4),
(141, 'sakatadhuryabirds@gmail.com', 2, 1, 3, 4),
(142, 'sakatadhuryabirds@gmail.com', 2, 1, 4, 1),
(143, 'sakatadhuryabirds@gmail.com', 2, 1, 5, 3),
(144, 'sakatadhuryabirds@gmail.com', 4, 2, 1, 1),
(145, 'sakatadhuryabirds@gmail.com', 4, 2, 2, 5),
(146, 'sakatadhuryabirds@gmail.com', 4, 2, 3, 6),
(147, 'sakatadhuryabirds@gmail.com', 4, 2, 4, 2),
(148, 'sakatadhuryabirds@gmail.com', 4, 2, 5, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_feedback`
--
ALTER TABLE `other_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `aadhar_no` (`aadhar_no`);

--
-- Indexes for table `user_response`
--
ALTER TABLE `user_response`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `other_feedback`
--
ALTER TABLE `other_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_response`
--
ALTER TABLE `user_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
