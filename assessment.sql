-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 04:41 AM
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
  `admin_password` varchar(50) NOT NULL
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
(127, 79, 'TPS', '', '', ''),
(128, 80, 'IS', '', '', ''),
(129, 81, 'DSS', '', '', ''),
(130, 82, 'EIS', '', '', ''),
(131, 83, 'SSS', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `group_post_id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date_posted` datetime NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `group_post_id`, `comment`, `date_posted`, `member_id`) VALUES
(4, 3, 'test', '2017-08-30 12:45:34', 19),
(5, 3, 'test reply', '2017-08-30 12:51:34', 19),
(6, 4, 'Please download and read', '2017-08-30 12:54:58', 19),
(7, 4, 'copy miss', '2017-08-30 13:20:16', 19),
(8, 4, 'ok miss', '2017-08-30 13:20:33', 2),
(9, 3, 'student test reply', '2017-08-30 13:28:17', 19),
(10, 3, 'student test reply', '2017-08-30 13:28:39', 2);

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
(20, 3, 2, 'approved');

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
(38, 2, 3, 1, 5, 'quiz', 0, 18);

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
(2, 11, 'BSIS 1-B', 'Active', 7, '1st', '2017-2018'),
(3, 19, 'BSIS 1-B', 'Active', 5, '', '');

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

--
-- Dumping data for table `group_post`
--

INSERT INTO `group_post` (`group_post_id`, `post_id`, `group_id`, `due_date`) VALUES
(1, 1, 1, '1970-01-01 16:20:00'),
(2, 2, 1, '1970-01-01 16:20:00'),
(3, 4, 3, '1970-01-01 14:50:00'),
(4, 5, 3, '1970-01-01 12:55:00'),
(5, 6, 3, '1970-01-01 13:30:00'),
(6, 7, 3, '1970-01-01 13:35:00'),
(7, 8, 3, '1970-01-01 13:40:00');

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
(5, 12, 1, 'inactive', '2017-08-09', '09:10:00'),
(6, 13, 1, 'active', '1970-01-01', '01:00:00'),
(7, 14, 3, 'inactive', '2017-08-19', '13:00:00'),
(8, 15, 3, 'inactive', '2017-12-04', '09:05:00'),
(9, 16, 3, 'inactive', '2017-12-04', '09:05:00'),
(10, 17, 3, 'active', '2017-04-12', '09:05:00'),
(11, 18, 3, 'active', '2017-01-09', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `history_logs`
--

CREATE TABLE `history_logs` (
  `log_id` int(11) NOT NULL,
  `log` varchar(100) NOT NULL,
  `log_date` datetime NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_logs`
--

INSERT INTO `history_logs` (`log_id`, `log`, `log_date`, `member_id`) VALUES
(1, 'successfully logged in!', '2017-08-19 09:15:00', 1),
(2, 'successfully logged in!', '2017-08-19 10:18:00', 1),
(3, 'successfully logged in!', '2017-08-19 10:19:00', 10),
(4, 'successfully registered!', '2017-08-21 06:48:00', 16),
(5, 'successfully registered!', '2017-08-21 07:04:00', 19),
(6, 'successfully logged in!', '2017-08-21 07:04:00', 19),
(7, 'successfully logged in!', '2017-08-21 07:08:00', 2),
(8, 'successfully logged in!', '2017-08-21 07:19:00', 2),
(9, 'successfully logged in!', '2017-08-21 08:21:00', 2),
(10, 'successfully logged in!', '2017-08-21 08:49:00', 19),
(11, 'successfully logged in!', '2017-08-21 08:58:00', 2),
(12, 'successfully logged in!', '2017-08-21 09:15:00', 19),
(13, 'successfully logged in!', '2017-08-28 16:27:00', 19),
(14, 'successfully logged in!', '2017-08-29 17:15:00', 19),
(15, 'successfully logged in!', '2017-08-30 06:01:00', 19),
(16, 'successfully logged in!', '2017-08-30 07:01:00', 2),
(17, 'successfully logged in!', '2017-08-30 07:05:00', 19),
(18, 'successfully logged in!', '2017-08-30 07:21:00', 19),
(19, 'successfully logged in!', '2017-08-30 09:19:00', 2),
(20, 'successfully logged in!', '2017-08-31 21:47:00', 2),
(21, 'successfully logged in!', '2017-08-31 21:49:00', 19),
(22, 'successfully logged in!', '2017-09-01 03:30:00', 19),
(24, 'successfully logged in!', '2017-09-01 03:49:00', 19),
(25, 'successfully logged in!', '2017-09-01 09:49:00', 19),
(26, 'successfully logged in!', '2017-09-01 09:50:00', 19),
(27, 'successfully logged in!', '2017-09-01 03:50:00', 19),
(28, 'has logged out!', '2017-09-01 09:50:00', 19),
(29, 'successfully logged in!', '2017-09-01 03:50:00', 2),
(30, 'has logged out!', '2017-09-01 09:51:00', 2),
(31, 'has logged out!', '2017-09-01 04:05:00', 0),
(32, 'successfully logged in!', '2017-09-01 04:08:00', 19);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `id_no` varchar(11) NOT NULL,
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

INSERT INTO `member` (`member_id`, `id_no`, `member_last`, `member_first`, `member_mi`, `cys`, `email`, `password`, `date_registered`, `member_pic`, `member_type`, `reg_status`, `reset_status`) VALUES
(1, 'HTM10141989', 'Magbanua', 'Lee Pipez', 'T', '', 'emoblazz@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-02-14', 'img3-large.jpg', 'Faculty', 1, 0),
(2, 'KGC10241994', 'Cueva', 'Kaye', '', 'BSIS 4-A', 'cueva@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-02-11', '169430-1.png', 'Student', 0, 0),
(10, '0', 'g', 'g', '', 'BSIS 1-A', 'e@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2017-06-24', 'screenshot-1.png', 'Student', 1, 0),
(11, 'JAP10141989', 'Pun-an', 'Joanna', '', '', 'joanna@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-06-26', 'default.gif', 'Faculty', 1, 0),
(12, '0', 'ken', 'ken', '', 'BSIS 1-B', 'ken@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-06-26', 'default.gif', 'student', 1, 0),
(13, 'KAA08251992', 'Aboy', 'Kenneth', '', 'BSIS 1-A', 'kaye@y.c', '', '0000-00-00', '', 'Student', 0, 0),
(15, '0', 'Sim', 'Lavern', '', 'BSIS 4A', '', '', '0000-00-00', '', 'Student', 0, 0),
(19, 'RJM11021990', 'Morante', 'Ruby', '', '', 'ruby@gmail.com', '202cb962ac59075b964b07152d234b70', '2017-08-21', 'default.gif', 'Faculty', 1, 0),
(20, 'jhjh', 'jhjh', 'jhjh', '', 'BSIS 1-A', 'emoblazz@gmail.com', '', '0000-00-00', 'default.gif', 'student', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notes_id` int(11) NOT NULL,
  `notes` varchar(10000) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notes_id`, `notes`, `member_id`) VALUES
(6, 'dsds', 2),
(7, 'dsds', 2),
(8, 'sss', 2);

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

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`notif_id`, `notif`, `link`, `group_id`, `status`) VALUES
(14, 'Kaye Cueva requests to join the group', 'view_group.php?gid=3', 3, 'faculty'),
(15, 'Kaye Cueva requests to join the group', 'view_group.php?gid=3', 3, 'faculty'),
(16, 'Kaye Cueva requests to join the group', 'view_group.php?gid=3', 3, 'faculty'),
(17, 'Kaye Cueva requests to join the group', 'view_group.php?gid=3', 3, 'faculty'),
(18, 'Kaye Cueva requests to join the group', 'view_group.php?gid=3', 3, 'faculty'),
(19, 'Notes on', 'view_group.php?gid=3', 3, 'student'),
(20, 'Request to join group approved', 'view_group.php?gid=3', 3, 'student'),
(21, 'jjjj on', 'view_group.php?gid=3', 3, 'student'),
(22, 'Assign on Array', 'view_group.php?gid=3', 3, 'student'),
(23, 'dddd on BSIS 1-B', 'view_group.php?gid=3', 3, 'student');

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

--
-- Dumping data for table `notif_stat`
--

INSERT INTO `notif_stat` (`notif_stat_id`, `notif_id`, `member_id`, `read_status`) VALUES
(17, 15, 0, 0),
(19, 17, 0, 0),
(20, 18, 19, 1),
(21, 19, 2, 1),
(22, 20, 2, 0),
(23, 21, 2, 0),
(24, 22, 2, 0),
(25, 23, 2, 0);

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

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_date`, `post_content`, `post_file`, `member_id`, `post_title`, `points`, `post_type`) VALUES
(1, '2017-08-19 16:18:20', 'lklk', 'Book1.csv', 1, 'klkl', 0, 'post'),
(2, '2017-08-19 16:18:33', 'ffff', 'Blood Donor History Questionnaire.pdf', 1, 'dddffff', 0, 'post'),
(3, '0000-00-00 00:00:00', '', '', 2, '', 0, 'post'),
(4, '2017-08-21 14:49:39', 'kljl', '', 19, 'sdsd', 0, 'post'),
(5, '2017-08-30 12:54:31', 'Chapter 1 Notes', 'Book1.csv', 19, 'Notes', 0, 'post'),
(6, '2017-08-30 13:32:46', 'kkk', '', 19, 'jjjj', 0, 'post'),
(7, '2017-08-30 13:34:52', 'khjh', '', 19, 'Assign', 0, 'post'),
(8, '2017-08-30 13:38:19', 'dd', '', 19, 'dddd', 0, 'post');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `question_type` varchar(50) NOT NULL,
  `points` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `quiz_id`, `question`, `question_type`, `points`) VALUES
(59, 17, 'Gwapa ko', 'True or False', 1),
(60, 17, 'kkhj', 'Multiple Choice', 1),
(61, 17, 'TPS', 'Identification', 1),
(73, 18, 'Types of IS', 'Enumeration', 1),
(74, 18, 'Types of IS', 'Enumeration', 1),
(75, 18, 'Types of IS', 'Enumeration', 1),
(76, 18, 'Types of IS', 'Enumeration', 1),
(77, 18, 'Types of IS', 'Enumeration', 1),
(79, 18, 'Types of IS', 'Enumeration', 1),
(80, 18, 'Types of IS', 'Enumeration', 1),
(81, 18, 'Types of IS', 'Enumeration', 1),
(82, 18, 'Types of IS', 'Enumeration', 1),
(83, 18, 'Types of IS', 'Enumeration', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(100) NOT NULL,
  `quiz_instruction` varchar(1000) NOT NULL,
  `member_id` int(11) NOT NULL,
  `quiz_duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_instruction`, `member_id`, `quiz_duration`) VALUES
(12, 'Quiz 1', 'Sample', 1, '1'),
(13, 'fdddd', 'dfd', 1, '1'),
(14, 'Quiz 1', 'mjkjk', 19, '1'),
(15, 'kjkj', 'kjk', 19, '1'),
(16, 'kjkj', 'kjk', 19, '1'),
(17, 'kjkj', 'kjk', 19, '10'),
(18, 'atchi', 'atchi', 19, '5');

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
(7, 'IS0001', 'Sample'),
(1021, 'IS 111', 'Fundamentals'),
(1022, 'IS 112', 'HCI');

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
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

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
-- Indexes for table `history_logs`
--
ALTER TABLE `history_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notes_id`);

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
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cys`
--
ALTER TABLE `cys`
  MODIFY `cys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `enrol`
--
ALTER TABLE `enrol`
  MODIFY `enrol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `group_post`
--
ALTER TABLE `group_post`
  MODIFY `group_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `group_quiz`
--
ALTER TABLE `group_quiz`
  MODIFY `group_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `history_logs`
--
ALTER TABLE `history_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `notif_stat`
--
ALTER TABLE `notif_stat`
  MODIFY `notif_stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `question_order`
--
ALTER TABLE `question_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `quiz_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;
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
