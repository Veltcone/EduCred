-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 10:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scs`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `registration_id` varchar(50) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `is_present` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`registration_id`, `subject_id`, `attendance_date`, `is_present`) VALUES
('20IT102003', 1, '2023-09-20', 1),
('20IT102004', 1, '2023-09-20', 0),
('20IT102002', 2, '2023-09-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `name`, `department_id`) VALUES
(1, 'BCA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `registration_id` varchar(50) NOT NULL,
  `credits` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`registration_id`, `credits`, `course_id`, `semester_id`) VALUES
('20IT102001', 745, 1, 1),
('20IT102002', 1220, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`) VALUES
(1, 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `extrapoints`
--

CREATE TABLE `extrapoints` (
  `extrapoints_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extrapoints`
--

INSERT INTO `extrapoints` (`extrapoints_id`, `name`) VALUES
(1, 'Extra Co-curricular Activites'),
(2, 'Flipped Classroom Discussion');

-- --------------------------------------------------------

--
-- Table structure for table `extrascore`
--

CREATE TABLE `extrascore` (
  `registration_id` varchar(50) DEFAULT NULL,
  `extrapoints_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extrascore`
--

INSERT INTO `extrascore` (`registration_id`, `extrapoints_id`, `course_id`, `semester_id`, `score`) VALUES
('20IT102001', 1, 1, 1, 5),
('20IT102002', 1, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `day` varchar(50) DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`subject_id`, `teacher_id`, `day`, `time`) VALUES
(1, 1, 'Monday', '11:00:00'),
(2, 2, 'Monday', '11:00:00'),
(3, 3, 'Monday', '12:00:00'),
(1, 1, 'Tuesday', '10:00:00'),
(2, 2, 'Tuesday', '11:00:00'),
(3, 3, 'Tuesday', '12:00:00'),
(1, 1, 'Wednesday', '10:00:00'),
(2, 2, 'Wednesday', '11:00:00'),
(3, 3, 'Wednesday', '12:00:00'),
(4, 4, 'Monday', '10:00:00'),
(5, 5, 'Monday', '11:00:00'),
(6, 6, 'Monday', '12:00:00'),
(4, 4, 'Tuesday', '10:00:00'),
(5, 5, 'Tuesday', '11:00:00'),
(6, 6, 'Tuesday', '12:00:00'),
(4, 4, 'Wednesday', '10:00:00'),
(5, 5, 'Wednesday', '11:00:00'),
(6, 6, 'Wednesday', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `registration_id` varchar(50) DEFAULT NULL,
  `testexam_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`registration_id`, `testexam_id`, `course_id`, `semester_id`, `subject_id`, `score`) VALUES
('20IT102005', 1, 1, 3, 8, 5),
('20IT102006', 1, 1, 3, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `name`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Third'),
(4, 'Fourth'),
(5, 'Fifth'),
(6, 'Sixth');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `registration_id` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`registration_id`, `name`, `email_id`, `password`, `department_id`, `course_id`, `semester_id`) VALUES
('20IT102001', 'Prashant', 'Prashant@gmail.com', '****', 1, 1, 1),
('20IT102002', 'Aniketh', 'Aniketh@gmail.com', '****', 1, 1, 1),
('20IT102003', 'Deepen', 'Deepen@gmail.com', '****', 1, 1, 2),
('20IT102004', 'David', 'David@gmail.com', '****', 1, 1, 2),
('20IT102005', 'Yaso', 'Yaso@gmail.com', '****', 1, 1, 3),
('20IT102006', 'Taslim', 'Taslim@gmail.com', '****', 1, 1, 3),
('20IT102007', 'MD', 'md@gmail.com', '****', 1, 1, 4),
('20IT102008', 'Sahil', 'Sahil@gmail.com', '****', 1, 1, 4),
('20IT102009', 'Mingma', 'Mingma@gmail.com', '****', 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `course_id`, `semester_id`) VALUES
(1, 'Programming in C', 1, 1),
(2, 'Digital Logic Fundamentals', 1, 1),
(3, 'English-I', 1, 1),
(4, 'Programming in C++', 1, 2),
(5, 'Data Structures', 1, 2),
(6, 'Operating System', 1, 2),
(7, 'Financial Accounting', 1, 3),
(8, 'Java Programming', 1, 3),
(9, 'Database Management System', 1, 3),
(10, 'Computer Networks', 1, 4),
(11, 'Programming in C#', 1, 4),
(12, 'Quantative Aptitude', 1, 4),
(13, 'Android Application', 1, 5),
(14, 'Mobile Computing', 1, 5),
(15, 'PHP & SQL', 1, 5),
(16, 'Cloud Computing', 1, 6),
(17, 'Digital Image Processing', 1, 6),
(18, 'Computer Architecture & Organization', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `department_id`) VALUES
(1, 'Shivaram ', 1),
(2, 'Abhimanyu ', 1),
(3, 'Nhawang ', 1),
(4, 'Abishek ', 1),
(5, 'Ojeswani ', 1),
(6, 'Sabna ', 1),
(7, 'Hema ', 1),
(8, 'Sumendra ', 1),
(9, 'Om Prakash ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testexam`
--

CREATE TABLE `testexam` (
  `testexam_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testexam`
--

INSERT INTO `testexam` (`testexam_id`, `name`) VALUES
(1, 'Surprise Test'),
(2, 'Cycle Test'),
(3, 'Modal Test'),
(4, 'Semester Exam'),
(5, 'Extra Co-curricular activities'),
(6, 'Flipped Classroom Discussion');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email_id`, `password`, `user_type`, `semester_id`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'teacher', NULL),
(2, 'prashant', 'prashant@gmail.com', 'prashant', 'student', 1),
(3, 'aniketh', 'aniketh@gmail.com', 'aniketh', 'student', 1),
(9, 'deepen', 'deepen@gmail.com', 'deepen', 'student', 2),
(10, 'david', 'david@gmail.com', 'david', 'student', 2),
(11, 'yaso', 'yaso@gmail.com', 'yaso', 'student', 3),
(12, 'taslim', 'taslim@gmail.com', 'taslim', 'student', 3),
(13, 'md', 'md@gmail.com', 'md', 'student', 4),
(14, 'sahil', 'sahil@gmail.com', 'sahil', 'student', 4),
(15, 'mingma', 'mingma@gmail.com', 'mingma', 'student', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `registration_id` (`registration_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `extrapoints`
--
ALTER TABLE `extrapoints`
  ADD PRIMARY KEY (`extrapoints_id`);

--
-- Indexes for table `extrascore`
--
ALTER TABLE `extrascore`
  ADD KEY `registration_id` (`registration_id`),
  ADD KEY `extrapoints_id` (`extrapoints_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD KEY `registration_id` (`registration_id`),
  ADD KEY `testexam_id` (`testexam_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `testexam`
--
ALTER TABLE `testexam`
  ADD PRIMARY KEY (`testexam_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `extrapoints`
--
ALTER TABLE `extrapoints`
  MODIFY `extrapoints_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testexam`
--
ALTER TABLE `testexam`
  MODIFY `testexam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `student` (`registration_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `credits`
--
ALTER TABLE `credits`
  ADD CONSTRAINT `credits_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `student` (`registration_id`),
  ADD CONSTRAINT `credits_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `credits_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`);

--
-- Constraints for table `extrascore`
--
ALTER TABLE `extrascore`
  ADD CONSTRAINT `extrascore_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `student` (`registration_id`),
  ADD CONSTRAINT `extrascore_ibfk_2` FOREIGN KEY (`extrapoints_id`) REFERENCES `extrapoints` (`extrapoints_id`),
  ADD CONSTRAINT `extrascore_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `extrascore_ibfk_4` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `student` (`registration_id`),
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`testexam_id`) REFERENCES `testexam` (`testexam_id`),
  ADD CONSTRAINT `score_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `score_ibfk_4` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`),
  ADD CONSTRAINT `score_ibfk_5` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
