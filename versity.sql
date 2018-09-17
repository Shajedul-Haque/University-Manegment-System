-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 10:04 PM
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
(26, 'Cloud', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1627822963, '2017-05-07 11:44:43', '2018-08-13 10:02:44'),
(30, 'Shajedul Haque', 'Rahat', 'cloud63584@gmail.com', '0fa05dcc5f3e6b5762e8fd19c0516300', 1858863665, '2018-08-13 09:16:14', '0000-00-00 00:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
