-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 05:53 PM
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
(3, 'Paschim Bardhaman', 'Durgapur'),
(4, 'Paschim Bardhaman', 'Asansol'),
(5, 'Purba Bardhaman', 'Bardhaman'),
(6, 'Bankura', 'Bankura'),
(7, 'Bankura', 'Gangajalghati'),
(8, 'Purulia', 'Purulia'),
(9, 'Malda', 'Malda'),
(10, 'Howrah', 'Howrah'),
(11, 'Kolkata', 'Kolkata'),
(12, 'Bankura', 'Bishnupur');

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
(3, 'Kolkata', 10, 'RTO office(Kolkata)', 'Cash Department'),
(4, 'Kolkata', 10, 'RTO office(Kolkata)', '2 wheeler'),
(5, 'Kolkata', 10, 'RTO office(Kolkata)', '4 wheeler'),
(6, 'Kolkata', 7, 'Survey of India(Kolkata)', 'Cash Department'),
(7, 'Kolkata', 7, 'Survey of India(Kolkata)', 'Main Office'),
(8, 'Kolkata', 9, 'Marriage registration office(Kolkata)', 'Registration office'),
(9, 'Kolkata', 9, 'Marriage registration office(Kolkata)', 'Cash Department'),
(10, 'Kolkata', 7, 'PWD office(Kolkata)', 'Main Office'),
(11, 'Durgapur', 4, 'RTO office(Durgapur)', '2 Wheeler'),
(12, 'Durgapur', 4, 'RTO office(Durgapur)', 'Cash Department'),
(13, 'Durgapur', 5, 'Marriage registration office(Durgapur)', 'Registration office'),
(14, 'Durgapur', 5, 'Marriage registration office(Durgapur)', 'Cash Department'),
(15, 'Asansol', 6, 'Water Department Office(Asansol)', 'Cash Department'),
(16, 'Kolkata', 6, 'Water Department Office(Kolkata)', 'Head Department'),
(17, 'Asansol', 3, 'RTO office(Asansol)', '2 wheeler'),
(18, 'Asansol', 3, 'RTO office(Asansol)', 'Cash Department'),
(19, 'Bardhaman', 11, 'Water Department Office(Bardhaman)', 'Cash Department');

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
(3, 'West Bengal', 'Paschim Bardhaman'),
(4, 'West Bengal', 'Purba Bardhaman'),
(5, 'West Bengal', 'Bankura'),
(6, 'West Bengal', 'Kolkata'),
(7, 'West Bengal', 'Howrah'),
(8, 'West Bengal', 'Hooghly'),
(9, 'West Bengal', 'Malda'),
(10, 'West Bengal', 'Purulia');

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
(3, 'Paschim Bardhaman', 'Asansol', 'RTO office(Asansol)', 'The Regional Transport Office is the organization of the Indian government responsible for registration of vehicles and the issue of drivers\' licences. In addition to this, the RTO officer checks for motor insurance and grants certificate of fitness to transport vehicles.', ''),
(4, 'Paschim Bardhaman', 'Durgapur', 'RTO office(Durgapur)', 'The Regional Transport Office is the organization of the Indian government responsible for registration of vehicles and the issue of drivers\' licences. In addition to this, the RTO officer checks for motor insurance and grants certificate of fitness to transport vehicles.', ''),
(5, 'Paschim Bardhaman', 'Durgapur', 'Marriage registration office(Durgapur)', 'A marriage certificate (sometimes: marriage lines) is an official statement that two people are married. In most jurisdictions, a marriage certificate is issued by a government official only after the civil registration of the marriage.', ''),
(6, 'Paschim Bardhaman', 'Asansol', 'Water Department Office(Asansol)', 'Water supply is the provision of water by public utilities, commercial organisations, community endeavors or by individuals, usually via a system of pumps and pipes. Irrigation is covered separately. ', ''),
(7, 'Kolkata', 'Kolkata', 'PWD office(Kolkata)', 'he Full form of PWD is Public Works Department. PWD is a government department in India which is responsible for construction and maintenance of public infrastructure like public government building, roads, bridges, public transport, drinking water systems and much more.', ''),
(8, 'Kolkata', 'Kolkata', 'Survey of India(Kolkata)', 'The Survey of India is India\'s central engineering agency in charge of mapping and surveying. Set up in 1767 to help consolidate the territories of the British East India Company, it is one of the oldest Engineering Departments of the Government of India.', ''),
(9, 'Kolkata', 'Kolkata', 'Marriage registration office(Kolkata)', 'A marriage certificate (sometimes: marriage lines) is an official statement that two people are married. In most jurisdictions, a marriage certificate is issued by a government official only after the civil registration of the marriage.', ''),
(10, 'Kolkata', 'Kolkata', 'RTO office(Kolkata)', 'The Regional Transport Office is the organization of the Indian government responsible for registration of vehicles and the issue of drivers\' licences. In addition to this, the RTO officer checks for motor insurance and grants certificate of fitness to transport vehicles.', ''),
(11, 'Purba Bardhaman', 'Bardhaman', 'Water Department Office(Bardhaman)', 'Water supply is the provision of water by public utilities, commercial organisations, community endeavors or by individuals, usually via a system of pumps and pipes. Irrigation is covered separately. ', '');

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
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_feedback`
--

INSERT INTO `other_feedback` (`id`, `email`, `res_id`, `timestamp`, `dept_id`, `subject`, `description`, `image`) VALUES
(30, 'sakatadhuryabirds@gmail.com', 1, '2019-10-30 13:18:11', 14, 'Good Service', 'Very quick response of staffs', '_.'),
(31, 'sakatadhuryabirds@gmail.com', 1, '2019-10-30 13:29:16', 10, '', '', 'sakatadhuryabirds@gmail.com.'),
(32, 'sakatadhuryabirds@gmail.com', 1, '2019-10-30 13:30:01', 13, '', '', 'sakatadhuryabirds@gmail.com.'),
(33, 'sakatadhuryabirds@gmail.com', 1, '2019-10-30 13:31:30', 11, 'Very nice', 'Awesome experiebce', 'sakatadhuryabirds@gmail.com.jpg'),
(34, 'sakatadhuryabirds@gmail.com', 1, '2019-10-30 14:52:06', 12, '', '', 'sakatadhuryabirds@gmail.com.');

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
(68, 14, 1, 1, '1'),
(69, 14, 2, 6, '1'),
(70, 14, 3, 6, '1'),
(71, 14, 4, 1, '1'),
(72, 14, 5, 6, '1'),
(73, 10, 1, 1, '1'),
(74, 10, 2, 6, '1'),
(75, 10, 3, 6, '1'),
(76, 10, 4, 1, '1'),
(77, 10, 5, 6, '1'),
(78, 13, 1, 1, '1'),
(79, 13, 2, 5, '1'),
(80, 13, 3, 6, '1'),
(81, 13, 4, 1, '1'),
(82, 13, 5, 6, '1'),
(83, 11, 1, 1, '1'),
(84, 11, 2, 5, '1'),
(85, 11, 3, 6, '1'),
(86, 11, 4, 2, '1'),
(87, 11, 5, 6, '1'),
(88, 12, 1, 1, '1'),
(89, 12, 2, 6, '1'),
(90, 12, 3, 6, '1'),
(91, 12, 4, 2, '1'),
(92, 12, 5, 6, '1');

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
(3, 'West Bengal');

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
(9, 'SAIKAT', 'ADHURYA', 'sakatadhuryabirds@gmail.com', '9093222034', 'M/6, Bidhan Park, sec-1, Fuljhore, Fuljhore', 'SAIKAT_9987132456789876.jpg', '9987132456789876', '1998-07-06', '202cb962ac59075b964b07152d234b70');

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
(154, 'sakatadhuryabirds@gmail.com', 1, 14, 1, 1),
(155, 'sakatadhuryabirds@gmail.com', 1, 14, 2, 6),
(156, 'sakatadhuryabirds@gmail.com', 1, 14, 3, 6),
(157, 'sakatadhuryabirds@gmail.com', 1, 14, 4, 1),
(158, 'sakatadhuryabirds@gmail.com', 1, 14, 5, 6),
(159, 'sakatadhuryabirds@gmail.com', 1, 10, 1, 1),
(160, 'sakatadhuryabirds@gmail.com', 1, 10, 2, 6),
(161, 'sakatadhuryabirds@gmail.com', 1, 10, 3, 6),
(162, 'sakatadhuryabirds@gmail.com', 1, 10, 4, 1),
(163, 'sakatadhuryabirds@gmail.com', 1, 10, 5, 6),
(164, 'sakatadhuryabirds@gmail.com', 1, 13, 1, 1),
(165, 'sakatadhuryabirds@gmail.com', 1, 13, 2, 5),
(166, 'sakatadhuryabirds@gmail.com', 1, 13, 3, 6),
(167, 'sakatadhuryabirds@gmail.com', 1, 13, 4, 1),
(168, 'sakatadhuryabirds@gmail.com', 1, 13, 5, 6),
(169, 'sakatadhuryabirds@gmail.com', 1, 11, 1, 1),
(170, 'sakatadhuryabirds@gmail.com', 1, 11, 2, 5),
(171, 'sakatadhuryabirds@gmail.com', 1, 11, 3, 6),
(172, 'sakatadhuryabirds@gmail.com', 1, 11, 4, 2),
(173, 'sakatadhuryabirds@gmail.com', 1, 11, 5, 6),
(174, 'sakatadhuryabirds@gmail.com', 1, 12, 1, 1),
(175, 'sakatadhuryabirds@gmail.com', 1, 12, 2, 6),
(176, 'sakatadhuryabirds@gmail.com', 1, 12, 3, 6),
(177, 'sakatadhuryabirds@gmail.com', 1, 12, 4, 2),
(178, 'sakatadhuryabirds@gmail.com', 1, 12, 5, 6);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city_name` (`city_name`),
  ADD KEY `district_name` (`district_name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `office_id` (`office_id`),
  ADD KEY `city_name` (`city_name`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `district_name` (`district_name`),
  ADD KEY `state_name` (`state_name`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city_name` (`city_name`,`office_name`),
  ADD KEY `district_name` (`district_name`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `state_name` (`state_name`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `other_feedback`
--
ALTER TABLE `other_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_response`
--
ALTER TABLE `user_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`district_name`) REFERENCES `district` (`district_name`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `office` (`id`),
  ADD CONSTRAINT `department_ibfk_2` FOREIGN KEY (`city_name`) REFERENCES `office` (`city_name`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`state_name`) REFERENCES `state` (`state_name`);

--
-- Constraints for table `office`
--
ALTER TABLE `office`
  ADD CONSTRAINT `office_ibfk_1` FOREIGN KEY (`city_name`) REFERENCES `city` (`city_name`),
  ADD CONSTRAINT `office_ibfk_2` FOREIGN KEY (`city_name`) REFERENCES `city` (`city_name`),
  ADD CONSTRAINT `office_ibfk_3` FOREIGN KEY (`district_name`) REFERENCES `district` (`district_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
