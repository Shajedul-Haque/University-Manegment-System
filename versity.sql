-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 07:09 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `versity`
--

-- --------------------------------------------------------

--
-- Table structure for table `alocate_class`
--

CREATE TABLE `alocate_class` (
  `id` int(11) NOT NULL,
  `department_id` int(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecredit` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `coursecode`, `coursename`, `coursecredit`, `description`, `semester_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'ACT-111', 'ACOUNTING', 2, 'accounting subject', 2, 7, '2017-05-07 04:43:28', '0000-00-00 00:00:00'),
(4, 'CSE-301', 'COMPILER DESIGN', 3, 'design', 8, 1, '2017-05-07 05:06:21', '0000-00-00 00:00:00'),
(5, 'CSE-302', 'SOFTWARE ENGINEERING', 3, 'software develop', 6, 1, '2017-05-07 05:19:35', '0000-00-00 00:00:00'),
(12, 'CSE-303', 'DATA BASE DESIGN', 2, 'database management', 5, 1, '2017-05-08 06:43:33', '0000-00-00 00:00:00'),
(14, 'CSE-304', 'OOP CONCEPT', 2, 'OOP', 4, 1, '2017-05-08 07:04:29', '0000-00-00 00:00:00'),
(15, 'CSE-311', 'C PROGRAMING', 2, 'programing', 2, 1, '2017-05-08 07:05:29', '0000-00-00 00:00:00'),
(16, 'EEE-501', 'CIRCUIT ONE', 2, 'circuit design', 4, 5, '2017-05-09 11:34:27', '0000-00-00 00:00:00'),
(17, 'ETE-601', 'DATA COMUNICATION', 3, 'networking development', 3, 6, '2017-05-09 11:36:53', '0000-00-00 00:00:00'),
(18, 'EEE-503', 'CIRCUIT TWO', 3, 'Circuit Design', 4, 5, '2017-05-09 07:48:46', '0000-00-00 00:00:00'),
(19, 'SWE-401', 'DOT NET PROGRAMING', 3, 'programing', 4, 2, '2017-05-10 05:19:42', '0000-00-00 00:00:00'),
(20, 'ENG-101', 'ENGLISH ONE', 3, 'english', 1, 3, '2017-05-10 09:56:29', '0000-00-00 00:00:00'),
(21, 'LAW-201', 'LAW', 3, 'Law method', 2, 4, '2017-05-10 09:59:26', '0000-00-00 00:00:00'),
(22, 'EEE-345', 'DEVICE', 3, 'any', 4, 5, '2017-05-11 01:11:07', '0000-00-00 00:00:00'),
(23, 'ENG-456', 'ENGLISH TWO', 3, 'any', 5, 3, '2017-05-11 01:16:40', '0000-00-00 00:00:00'),
(24, 'SWE-402', 'MARKUP LANGUAGE', 3, 'html', 3, 2, '2017-05-12 04:18:57', '0000-00-00 00:00:00'),
(25, 'MATH-2015', 'ALGEBRA', 3, 'Algebra', 4, 8, '2017-05-14 06:24:56', '0000-00-00 00:00:00'),
(27, 'MATH-2014', 'GEOMETRY', 5, 'Geometry', 4, 8, '2017-05-14 06:29:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_assign`
--

CREATE TABLE `course_assign` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_credit` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_assign`
--

INSERT INTO `course_assign` (`id`, `department_id`, `teacher_id`, `course_code`, `course_credit`, `course_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'CSE-301', 3, 'COMPILER DESIGN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 5, 3, 'EEE-503', 3, 'CIRCUIT TWO', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 1, 'CSE-302', 3, 'SOFTWARE ENGINEERING', '2017-05-10 03:31:01', '0000-00-00 00:00:00'),
(8, 7, 4, 'ACT-111', 2, 'ACOUNTING', '2017-05-10 04:03:37', '0000-00-00 00:00:00'),
(11, 2, 6, 'SWE-401', 3, 'DOT NET PROGRAMING', '2017-05-10 05:21:41', '0000-00-00 00:00:00'),
(12, 6, 7, 'ETE-601', 3, 'DATA COMUNICATION', '2017-05-10 09:48:53', '0000-00-00 00:00:00'),
(13, 3, 8, 'ENG-101', 3, 'ENGLISH ONE', '2017-05-10 09:57:18', '0000-00-00 00:00:00'),
(14, 4, 9, 'LAW-201', 3, 'LAW', '2017-05-10 10:01:19', '0000-00-00 00:00:00'),
(15, 3, 8, 'ENG-456', 3, 'ENGLISH TWO', '2017-05-11 01:16:53', '0000-00-00 00:00:00'),
(17, 2, 12, 'SWE-402', 3, 'MARKUP LANGUAGE', '2017-05-12 04:19:59', '0000-00-00 00:00:00'),
(18, 8, 13, 'MATH-2015', 3, 'ALGEBRA', '2017-05-14 06:25:58', '0000-00-00 00:00:00'),
(19, 8, 14, 'MATH-2014', 5, 'GEOMETRY', '2017-05-14 06:29:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `code`, `department`, `created_at`, `updated_at`) VALUES
(1, '333', 'CSE', '2017-05-07 10:22:28', '0000-00-00 00:00:00'),
(2, '444', 'SWE', '2017-05-07 10:28:24', '0000-00-00 00:00:00'),
(3, '111', 'ENG', '2017-05-07 10:35:38', '0000-00-00 00:00:00'),
(4, '222', 'LAW', '2017-05-07 10:37:00', '0000-00-00 00:00:00'),
(5, '555', 'EEE', '2017-05-07 10:38:18', '0000-00-00 00:00:00'),
(6, '666', 'ETE', '2017-05-07 11:49:19', '0000-00-00 00:00:00'),
(7, '777', 'BBA', '2017-05-07 01:35:03', '0000-00-00 00:00:00'),
(8, '212', 'MATH', '2017-05-14 06:24:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'Associate Professor', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Advisor', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Assistant Professor', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Senior Lecturer', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Program Coordinator', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Lecturer', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_course`
--

CREATE TABLE `enroll_course` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `enroll_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll_course`
--

INSERT INTO `enroll_course` (`id`, `student_id`, `stu_name`, `stu_email`, `department_id`, `course_code`, `enroll_date`) VALUES
(2, 9, 'SHARDUL MAHMUD', 'shardul@gmail.com', 1, 'CSE-302', '2017-05-11'),
(3, 4, 'SHUVO MUKHERJEE', 'shuvo@gmail.com', 1, 'CSE-301', '2017-05-12'),
(9, 9, 'SHARDUL MAHMUD', 'shardul@gmail.com', 1, 'CSE-301', '2017-05-12'),
(12, 4, 'SHUVO MUKHERJEE', 'shuvo@gmail.com', 1, 'CSE-302', '2017-05-12'),
(13, 15, 'A', 'A@gmail.com', 8, 'MATH-2015', '2017-05-14'),
(14, 16, 'B', 'B@gmail.com', 8, 'MATH-2014', '2017-05-14'),
(15, 15, 'A', 'A@gmail.com', 8, 'MATH-2014', '2017-05-14'),
(16, 16, 'B', 'B@gmail.com', 8, 'MATH-2015', '2017-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `save_result`
--

CREATE TABLE `save_result` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `save_result`
--

INSERT INTO `save_result` (`id`, `student_id`, `stu_name`, `stu_email`, `department_id`, `course_code`, `grade`) VALUES
(1, 4, 'SHUVO MUKHERJEE', 'shuvo@gmail.com', 1, 'CSE-301', 'A+'),
(6, 9, 'SHARDUL MAHMUD', 'shardul@gmail.com', 1, 'CSE-302', 'A'),
(7, 4, 'SHUVO MUKHERJEE', 'shuvo@gmail.com', 1, 'CSE-302', 'B+'),
(8, 15, 'A', 'A@gmail.com', 8, 'MATH-2015', 'A+'),
(9, 15, 'A', 'A@gmail.com', 8, 'MATH-2014', 'A+'),
(10, 16, 'B', 'B@gmail.com', 8, 'MATH-2014', 'A'),
(11, 16, 'B', 'B@gmail.com', 8, 'MATH-2015', 'A-');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `created_at`, `updated_at`) VALUES
(1, '1st Semester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2nd Semester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '3rd Semester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '4th Semester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '5th Semester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '6th Semester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '7th Semester', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '8th Semester', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cell_no` int(20) NOT NULL,
  `date` varchar(255) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `register_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_name`, `email`, `cell_no`, `date`, `student_address`, `department_id`, `register_id`, `created_at`, `updated_at`) VALUES
(4, 'SHUVO MUKHERJEE', 'shuvo@gmail.com', 1624389711, '2017-05-10', 'Rajbari', 1, 'CSE-2017-001', '2017-05-11 01:25:08', 0),
(9, 'SHARDUL MAHMUD', 'shardul@gmail.com', 123124325, '2017-05-10', 'Dhaka', 1, 'CSE-2017-002', '2017-05-11 01:40:58', 0),
(10, 'ZAMIUL ISLAM', 'zamiul@islam.com', 128324324, '2017-05-10', 'Rajshai', 2, 'SWE-2017-001', '2017-05-11 01:43:26', 0),
(11, 'DIPU HOSAIN', 'dipu@gmail.com', 13213146, '2017-05-11', 'Naranganj', 7, 'BBA-2017-001', '2017-05-11 02:56:08', 0),
(12, 'OVI HASAN', 'ovi@yahoo.com', 132425356, '2017-05-11', 'Barisal', 4, 'LAW-2017-001', '2017-05-11 02:57:39', 0),
(13, 'NILOY SAHA', 'niloy@gmail.com', 1234263747, '2017-05-11', 'Dhaka, baridhara', 3, 'ENG-2017-001', '2017-05-11 03:01:39', 0),
(14, 'BADHON MIYA', 'badhon@yahoo.com', 1236432432, '2017-05-11', 'Satmoshjid road', 5, 'EEE-2017-001', '2017-05-11 03:05:09', 0),
(15, 'A', 'A@gmail.com', 555559985, '2017-05-14', 'A', 8, 'MATH-2017-001', '2017-05-14 06:31:05', 0),
(16, 'B', 'B@gmail.com', 258552555, '2017-05-14', 'B', 8, 'MATH-2017-002', '2017-05-14 06:31:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `teachername` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` int(15) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `teachercredit` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teachername`, `address`, `email`, `contact_no`, `designation_id`, `department_id`, `teachercredit`, `created_at`, `updated_at`) VALUES
(1, 'SHUVO MUKHERJEE', 'Dhanmondi', 'shuvo@gmail.com', 1624389711, 1, 1, 20, '2017-05-09 07:35:22', '0000-00-00 00:00:00'),
(2, 'ZAMIUL ISLAM', 'Mhamodpur', 'zamiul@islam.com', 1828006154, 3, 5, 20, '2017-05-09 07:41:50', '0000-00-00 00:00:00'),
(3, 'SHARDUL MAHAMUL', 'satmosjid road', 'shardul@gmail.com', 1779283335, 4, 5, 20, '2017-05-09 08:14:07', '0000-00-00 00:00:00'),
(4, 'RATAN DAS', 'dhaka', 'ratan@gmail.com', 1829446723, 6, 7, 20, '2017-05-09 08:17:34', '0000-00-00 00:00:00'),
(5, 'OVI HASAN', 'Naranganj', 'ovi@yahoo.com', 1923458711, 2, 4, 18, '2017-05-09 08:19:18', '0000-00-00 00:00:00'),
(6, 'DIPU HOSAIN', 'dhaka', 'dipu@gmail.com', 1922344811, 6, 2, 5, '2017-05-10 04:52:13', '0000-00-00 00:00:00'),
(7, 'KASEM MAHAMUD', 'Dhaka', 'kasem@gmail.com', 1923457841, 5, 6, 18, '2017-05-10 09:44:58', '0000-00-00 00:00:00'),
(8, 'FAHMIDA', 'dhaka', 'nai@gmail.com', 1223739723, 2, 3, 12, '2017-05-10 09:52:28', '0000-00-00 00:00:00'),
(9, 'MAKHON', 'Dhaka', 'Makhon@gmail.com', 2147483647, 3, 4, 12, '2017-05-10 10:00:45', '0000-00-00 00:00:00'),
(10, 'RANA HASAN', 'Dhaka', 's@gmail.com', 32456789, 3, 5, 10, '2017-05-11 01:13:36', '0000-00-00 00:00:00'),
(11, 'ABIR ISLAM', 'puran dhaka', 'abir@gmail.com', 182345667, 6, 1, 18, '2017-05-12 01:58:51', '0000-00-00 00:00:00'),
(12, 'FAISAL NISAT', 'Barisal', 'faisal@gmail.com', 122325163, 3, 2, 2, '2017-05-12 02:53:59', '0000-00-00 00:00:00'),
(13, 'RAHAT', 'Banani', 'Shajedulhaque000@gmail.com', 1858863665, 1, 8, 20, '2017-05-14 06:25:28', '0000-00-00 00:00:00'),
(14, 'EZAN', 'Banani', 'Ruslinaakther000@gmail.com', 1552313574, 3, 8, 15, '2017-05-14 06:26:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `Mobile`, `created_at`, `updated_at`) VALUES
(1, 'Shuvo Mukherjee', 'shuvo', 'pakkna@gmail.com', '54b72f1850ef19b35ab85de6ad0d83f5', 1624389711, '2017-05-06 07:33:48', '2017-05-06 11:02:15'),
(25, 'Zamiul Islam', 'zamiul', 'zamiul@islam.com', 'b0d3b9c43109f696f5ddb38323f2fb33', 1624389711, '2017-05-06 11:16:05', '0000-00-00 00:00:00'),
(26, 'Mukherjee', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1624389711, '2017-05-07 11:44:43', '2017-05-11 02:07:53'),
(27, 'Shajedul', 'Cloud', 'Shajedulhaque000@gmail.com', '3bf5bd792147b4657084de242f3bef3c', 1858863665, '2017-05-14 06:03:48', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alocate_class`
--
ALTER TABLE `alocate_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`coursename`),
  ADD UNIQUE KEY `code` (`coursecode`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `coursecode` (`coursecode`);

--
-- Indexes for table `course_assign`
--
ALTER TABLE `course_assign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `course_credit` (`course_credit`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `course_name` (`course_name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `name` (`department`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designation` (`designation`);

--
-- Indexes for table `enroll_course`
--
ALTER TABLE `enroll_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `course_code_2` (`course_code`),
  ADD KEY `course_code_3` (`course_code`);

--
-- Indexes for table `save_result`
--
ALTER TABLE `save_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `course_code_2` (`course_code`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semester` (`semester`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cell_no` (`cell_no`),
  ADD UNIQUE KEY `register_id` (`register_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact_no` (`contact_no`),
  ADD KEY `designation_id` (`designation_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alocate_class`
--
ALTER TABLE `alocate_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `course_assign`
--
ALTER TABLE `course_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `enroll_course`
--
ALTER TABLE `enroll_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `save_result`
--
ALTER TABLE `save_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alocate_class`
--
ALTER TABLE `alocate_class`
  ADD CONSTRAINT `alocate_class_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `course_assign`
--
ALTER TABLE `course_assign`
  ADD CONSTRAINT `course_assign_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`coursecode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `course_assign_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `course_assign_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `enroll_course`
--
ALTER TABLE `enroll_course`
  ADD CONSTRAINT `enroll_course_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_course_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_course_ibfk_3` FOREIGN KEY (`course_code`) REFERENCES `course` (`coursecode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `save_result`
--
ALTER TABLE `save_result`
  ADD CONSTRAINT `save_result_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `save_result_ibfk_2` FOREIGN KEY (`course_code`) REFERENCES `course` (`coursecode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
