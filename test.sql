-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 12:36 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `email` text NOT NULL,
  `type` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `email`, `type`, `password`) VALUES
(1, 'Rahim', 'rahim@gmail.com', 'admin', '1234'),
(2, 'Ruhi', 'ruhi@gmail.com', 'super_admin', '1234'),
(4, 'Tashfiq Rahman', 'tashfiqrhmn123@gmail.com', 'user', '1234'),
(7, 'Sumon Hossain', 'suman@gmail.com', 'subadmin_CSE', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `additional_educational_info`
--

CREATE TABLE `additional_educational_info` (
  `additional_educational_id` int(11) NOT NULL,
  `ssc_roll` int(11) NOT NULL,
  `ssc_pass_year` int(11) NOT NULL,
  `ssc_institution` varchar(250) NOT NULL,
  `ssc_gpa` decimal(3,2) NOT NULL,
  `hsc_roll` int(11) NOT NULL,
  `hsc_pass_year` int(11) NOT NULL,
  `hsc_institution` varchar(250) NOT NULL,
  `hsc_gpa` decimal(3,2) NOT NULL,
  `bsc_roll` int(11) NOT NULL,
  `bsc_pass_year` int(11) NOT NULL,
  `bsc_institution` varchar(250) NOT NULL,
  `bsc_cgpa` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additional_educational_info`
--

INSERT INTO `additional_educational_info` (`additional_educational_id`, `ssc_roll`, `ssc_pass_year`, `ssc_institution`, `ssc_gpa`, `hsc_roll`, `hsc_pass_year`, `hsc_institution`, `hsc_gpa`, `bsc_roll`, `bsc_pass_year`, `bsc_institution`, `bsc_cgpa`) VALUES
(4, 107781, 2011, 'St Joseph Higher Secondary', '5.00', 104460, 2013, 'Rajuk Uttara model college', '5.00', 152187, 2018, 'MIST', '3.02');

-- --------------------------------------------------------

--
-- Table structure for table `basic_educational_info`
--

CREATE TABLE `basic_educational_info` (
  `basic_educational_id` int(11) NOT NULL,
  `last_edu_institution` varchar(200) NOT NULL,
  `last_aca_session` varchar(100) NOT NULL,
  `passing_year` int(11) NOT NULL,
  `und_dept_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basic_educational_info`
--

INSERT INTO `basic_educational_info` (`basic_educational_id`, `last_edu_institution`, `last_aca_session`, `passing_year`, `und_dept_name`) VALUES
(4, 'Military Institute of Science & Technology', '2018-2019', 2018, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `contact_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `present_address` varchar(150) NOT NULL,
  `district` varchar(100) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`contact_id`, `email`, `mobile`, `present_address`, `district`, `zipcode`) VALUES
(4, 'tashfiqrhmn123@gmail.com', '01746177776', 'House#46,Road#08,Sector#03,Utttara,Dhaka', 'Dhaka', 1230);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(1, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int(11) NOT NULL,
  `sscgrade` varchar(200) NOT NULL,
  `hscgrade` varchar(200) NOT NULL,
  `bscgrade` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `sscgrade`, `hscgrade`, `bscgrade`) VALUES
(4, 'Flowchart.PNG', 'blockdiagram.png', 'block3.png');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `ID` int(11) NOT NULL,
  `pagename` varchar(100) NOT NULL,
  `pagetitle` varchar(100) NOT NULL,
  `pagedetails` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`ID`, `pagename`, `pagetitle`, `pagedetails`) VALUES
(1, 'Home', 'WELCOME TO MIST', 'Military Institute of Science and Technology (MIST) started its journey since 19 April 1998. It is the pioneer Technical Institute of Bangladesh Armed Forces, It was the visionary leadership of the Honorable Prime Minister of Peopleâ€™s Republic of Bangladesh Sheikh Hasina to establish this Institute.\r\nMIST is located on the northwest part of Dhaka City at Mirpur Cantonment. Mirpur Cantonment is well known to be the â€˜Education Villageâ€™ of Bangladesh Armed Forces and a hub of knowledge for military / civil students and professionals.'),
(2, 'About', 'MIST at a Glance.', 'First Academic Program was launched on 31 January 1999 with the maiden batch of Civil Engineering (CE). Computer Science & Engineering (CSE) Program was started from academic session 2000-2001 followed by Electrical, Electronic & Communication Engineering (EECE) and Mechanical Engineering (ME) Programs from 2002-2003. Aeronautical Engineering (AE) and Naval Architecture and Marine Engineering (NAME) program were started from 2008-2009 and 2012-2013 respectively.');

-- --------------------------------------------------------

--
-- Table structure for table `payment_info`
--

CREATE TABLE `payment_info` (
  `payment_id` int(11) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `payment_currency` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_info`
--

INSERT INTO `payment_info` (`payment_id`, `payment_amount`, `payment_currency`, `payment_status`) VALUES
(4, 10, 'USD', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) NOT NULL,
  `studentname` varchar(200) NOT NULL,
  `fathername` varchar(200) NOT NULL,
  `mothername` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `blood` varchar(20) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `nationalid` varchar(50) NOT NULL,
  `programtype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `studentname`, `fathername`, `mothername`, `birthdate`, `blood`, `nationality`, `nationalid`, `programtype`) VALUES
(4, 'Tashfiq Rahman', 'Habibur Rahman', 'Tahamina Ismail', '1994-06-09', 'A+', 'Banglaseshi', '520 500 6801', 'M.Sc.Engg');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `additional_educational_info`
--
ALTER TABLE `additional_educational_info`
  ADD PRIMARY KEY (`additional_educational_id`);

--
-- Indexes for table `basic_educational_info`
--
ALTER TABLE `basic_educational_info`
  ADD PRIMARY KEY (`basic_educational_id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `payment_info`
--
ALTER TABLE `payment_info`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
