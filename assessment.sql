-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2017 at 04:11 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_last` varchar(15) NOT NULL,
  `admin_first` varchar(15) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_last`, `admin_first`, `admin_email`, `admin_password`) VALUES
(1, 'Lee', 'Magbanua', 'emoblazz@gmail.com', '123'),
(2, 'Salinas', 'Honeylee', 'e@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `choices` varchar(1000) NOT NULL,
  `letter` varchar(2) NOT NULL,
  `cola` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `answer`, `choices`, `letter`, `cola`) VALUES
(66, 33, 'a', 'a', 'A', 'a'),
(67, 34, 'b', 'b', 'B', 'b'),
(68, 35, 'c', 'c', 'C', 'c'),
(69, 36, 'd', 'd', 'D', 'd'),
(70, 37, 'e', 'e', 'E', 'e'),
(71, 38, 'A', '', '', ''),
(72, 39, 'B', '', '', ''),
(73, 40, 'C', '', '', ''),
(74, 41, 'D', '', '', ''),
(75, 42, 'E', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cys`
--

CREATE TABLE `cys` (
  `cys_id` int(11) NOT NULL,
  `cys` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cys`
--

INSERT INTO `cys` (`cys_id`, `cys`) VALUES
(1, 'BSIS 1-A'),
(2, 'BSIS 1-B');

-- --------------------------------------------------------

--
-- Table structure for table `enrol`
--

CREATE TABLE `enrol` (
  `enrol_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrol`
--

INSERT INTO `enrol` (`enrol_id`, `group_id`, `member_id`, `status`) VALUES
(1, 1, 2, 'approved'),
(2, 1, 10, 'approved'),
(3, 2, 12, 'approved'),
(4, 1, 12, 'pending'),
(6, 2, 2, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `score` int(3) NOT NULL,
  `total` int(5) NOT NULL,
  `type` varchar(30) NOT NULL,
  `post_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `member_id`, `group_id`, `score`, `total`, `type`, `post_id`, `quiz_id`) VALUES
(2, 2, 1, 5, 5, 'quiz', 0, 12),
(3, 10, 1, 0, 40, 'quiz', 0, 12),
(4, 10, 1, 0, 40, 'quiz', 0, 12),
(5, 10, 1, 0, 40, 'quiz', 0, 12),
(6, 10, 1, 0, 40, 'quiz', 0, 12),
(7, 10, 1, 0, 40, 'quiz', 0, 12),
(8, 10, 1, 0, 40, 'quiz', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `cys` varchar(20) NOT NULL,
  `group_stat` varchar(15) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `sy` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `member_id`, `cys`, `group_stat`, `subject_id`, `sem`, `sy`) VALUES
(1, 1, 'BSIS 1-A', 'Active', 1, '1st', '2017-2018'),
(2, 11, 'BSIS 1-B', 'Active', 7, '1st', '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `group_post`
--

CREATE TABLE `group_post` (
  `group_post_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `due_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_quiz`
--

CREATE TABLE `group_quiz` (
  `group_quiz_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `group_quiz_stat` varchar(11) NOT NULL,
  `quiz_date` date NOT NULL,
  `quiz_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_quiz`
--

INSERT INTO `group_quiz` (`group_quiz_id`, `quiz_id`, `group_id`, `group_quiz_stat`, `quiz_date`, `quiz_time`) VALUES
(2, 8, 1, 'inactive', '2017-06-27', '17:20:00'),
(3, 9, 2, 'active', '0000-00-00', '00:00:00'),
(4, 10, 1, 'inactive', '2017-07-24', '09:45:00'),
(5, 12, 1, 'active', '1970-01-01', '09:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_last` varchar(30) NOT NULL,
  `member_first` varchar(30) NOT NULL,
  `member_mi` varchar(30) NOT NULL,
  `cys` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_registered` date NOT NULL,
  `member_pic` varchar(500) NOT NULL,
  `member_type` varchar(10) NOT NULL,
  `reg_status` int(11) NOT NULL,
  `reset_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_last`, `member_first`, `member_mi`, `cys`, `email`, `password`, `date_registered`, `member_pic`, `member_type`, `reg_status`, `reset_status`) VALUES
(1, 'Magbanua', 'Lee Pipez', 'T', '', 'emoblazz@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-02-14', 'img3-large.jpg', 'Faculty', 1, 0),
(2, 'Cueva', 'Kaye', '', 'BSIS 4-A', 'cueva@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2017-02-11', '169430-1.png', 'Student', 1, 0),
(10, 'g', 'g', '', 'BSIS 1-A', 'e@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2017-06-24', 'screenshot-1.png', 'Student', 1, 0),
(11, 'Pun-an', 'Joanna', '', '', 'joanna@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-06-26', 'default.gif', 'Faculty', 1, 0),
(12, 'ken', 'ken', '', 'BSIS 1-B', 'ken@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-06-26', 'default.gif', 'student', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `notif_id` int(11) NOT NULL,
  `notif` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif_stat`
--

CREATE TABLE `notif_stat` (
  `notif_stat_id` int(11) NOT NULL,
  `notif_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `read_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_content` varchar(100) NOT NULL,
  `post_file` varchar(100) NOT NULL,
  `member_id` int(11) NOT NULL,
  `post_title` varchar(500) NOT NULL,
  `points` int(11) NOT NULL,
  `post_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `question_type` varchar(50) NOT NULL,
  `points` int(3) NOT NULL,
  `instruction` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `quiz_id`, `question`, `question_type`, `points`, `instruction`) VALUES
(33, 12, 'Match A w B', 'Matching Type', 1, 'Match A w B'),
(34, 12, 'Match A w B', 'Matching Type', 1, 'Match A w B'),
(35, 12, 'Match A w B', 'Matching Type', 1, 'Match A w B'),
(36, 12, 'Match A w B', 'Matching Type', 1, 'Match A w B'),
(37, 12, 'Match A w B', 'Matching Type', 1, 'Match A w B'),
(38, 12, 'Enumerate', 'Enumeration', 1, 'Enumerate'),
(39, 12, 'Enumerate', 'Enumeration', 1, 'Enumerate'),
(40, 12, 'Enumerate', 'Enumeration', 1, 'Enumerate'),
(41, 12, 'Enumerate', 'Enumeration', 1, 'Enumerate'),
(42, 12, 'Enumerate', 'Enumeration', 1, 'Enumerate');

-- --------------------------------------------------------

--
-- Table structure for table `question_order`
--

CREATE TABLE `question_order` (
  `order_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `q_order` varchar(2) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `answer_status` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `q_score` int(3) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_order`
--

INSERT INTO `question_order` (`order_id`, `member_id`, `question_id`, `q_order`, `answer`, `answer_status`, `quiz_id`, `q_score`, `group_id`) VALUES
(25, 2, 12, '1', 'A', 0, 12, 3, 1),
(26, 2, 11, '2', 'manieja', 1, 12, 2, 1),
(27, 2, 11, '2', 'manieja', 0, 12, 2, 1),
(28, 2, 12, '1', 'A', 1, 12, 3, 1),
(29, 10, 36, '1', '', 0, 12, 0, 0),
(30, 10, 40, '2', '', 0, 12, 0, 0),
(31, 10, 33, '3', '', 0, 12, 0, 0),
(32, 10, 37, '4', '', 0, 12, 0, 0),
(33, 10, 41, '5', '', 0, 12, 0, 0),
(34, 10, 34, '6', '', 0, 12, 0, 0),
(35, 10, 38, '7', '', 0, 12, 0, 0),
(36, 10, 42, '8', '', 0, 12, 0, 0),
(37, 10, 35, '9', '', 0, 12, 0, 0),
(38, 10, 39, '10', '', 0, 12, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(100) NOT NULL,
  `quiz_instruction` varchar(1000) NOT NULL,
  `member_id` int(11) NOT NULL,
  `quiz_duration` varchar(10) NOT NULL,
  `quiz_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_instruction`, `member_id`, `quiz_duration`, `quiz_total`) VALUES
(12, 'Quiz 1', 'Sample', 1, '1', 40);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `quiz_result_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `quiz_taken` date NOT NULL,
  `grade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(30) NOT NULL,
  `subject_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`) VALUES
(1, 'IS111', 'Fundamentals of IS'),
(3, 'IS221', 'DFOS'),
(4, 'IS225', 'IS Programming'),
(5, 'Rizal', 'Life and Works of Rizal'),
(7, 'IS0001', 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `submission_id` int(10) NOT NULL,
  `group_post_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date_submitted` datetime NOT NULL,
  `content` varchar(500) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `post_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `month` varchar(15) NOT NULL,
  `wordpress` int(11) NOT NULL,
  `codeigniter` int(11) NOT NULL,
  `highcharts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `month`, `wordpress`, `codeigniter`, `highcharts`) VALUES
(1, 'jan', 1, 2, 4),
(2, 'feb', 5, 6, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `cys`
--
ALTER TABLE `cys`
  ADD PRIMARY KEY (`cys_id`);

--
-- Indexes for table `enrol`
--
ALTER TABLE `enrol`
  ADD PRIMARY KEY (`enrol_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_post`
--
ALTER TABLE `group_post`
  ADD PRIMARY KEY (`group_post_id`);

--
-- Indexes for table `group_quiz`
--
ALTER TABLE `group_quiz`
  ADD PRIMARY KEY (`group_quiz_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `notif_stat`
--
ALTER TABLE `notif_stat`
  ADD PRIMARY KEY (`notif_stat_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `question_order`
--
ALTER TABLE `question_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`quiz_result_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `cys`
--
ALTER TABLE `cys`
  MODIFY `cys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `enrol`
--
ALTER TABLE `enrol`
  MODIFY `enrol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `group_post`
--
ALTER TABLE `group_post`
  MODIFY `group_post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group_quiz`
--
ALTER TABLE `group_quiz`
  MODIFY `group_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notif_stat`
--
ALTER TABLE `notif_stat`
  MODIFY `notif_stat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `question_order`
--
ALTER TABLE `question_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `quiz_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `submission_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
