-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 09:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_sales_training_workshops_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `Attendee_ID` int(11) NOT NULL,
  `Workshop_ID` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendee`
--

INSERT INTO `attendee` (`Attendee_ID`, `Workshop_ID`, `Name`) VALUES
(1, 1, 'Sindayigaya jefferson'),
(2, 1, 'ntaganda william');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `Instructor_ID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`Instructor_ID`, `Name`, `Email`) VALUES
(1, 'Ndayishimiye elias', 'elie@gmail.com'),
(2, 'eng.anderson kayitare', 'andes@gmail.com'),
(3, 'Rulisa Diogene', 'rulid@gmail.com'),
(4, 'Sindayigaya jefferson', 'jeff@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `Material_ID` int(11) NOT NULL,
  `Resource_ID` int(11) DEFAULT NULL,
  `Format` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`Material_ID`, `Resource_ID`, `Format`) VALUES
(1, 1, 'DVII');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `Quiz_ID` int(11) NOT NULL,
  `Resource_ID` int(11) DEFAULT NULL,
  `Title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`Quiz_ID`, `Resource_ID`, `Title`) VALUES
(2, 1, 'MTCII');

-- --------------------------------------------------------

--
-- Table structure for table `resources_usage`
--

CREATE TABLE `resources_usage` (
  `Usage_ID` int(11) NOT NULL,
  `Workshop_ID` int(11) DEFAULT NULL,
  `Resource_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources_usage`
--

INSERT INTO `resources_usage` (`Usage_ID`, `Workshop_ID`, `Resource_ID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `Sale_ID` int(11) NOT NULL,
  `Workshop_ID` int(11) DEFAULT NULL,
  `Attendee_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Sale_ID`, `Workshop_ID`, `Attendee_ID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_training_resources`
--

CREATE TABLE `sales_training_resources` (
  `Resource_ID` int(11) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_training_resources`
--

INSERT INTO `sales_training_resources` (`Resource_ID`, `Title`, `Description`) VALUES
(1, 'students trainee from saint aloys', 'there were able to levy their coding capacity'),
(2, 'farmer in palm garden', 'a paid internship in wellspring farm ');

-- --------------------------------------------------------

--
-- Table structure for table `session_attendance`
--

CREATE TABLE `session_attendance` (
  `Attendance_ID` int(11) NOT NULL,
  `Workshop_ID` int(11) DEFAULT NULL,
  `Attendee_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_attendance`
--

INSERT INTO `session_attendance` (`Attendance_ID`, `Workshop_ID`, `Attendee_ID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `training_feedback`
--

CREATE TABLE `training_feedback` (
  `Feedback_ID` int(11) NOT NULL,
  `Workshop_ID` int(11) DEFAULT NULL,
  `Attendee_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training_feedback`
--

INSERT INTO `training_feedback` (`Feedback_ID`, `Workshop_ID`, `Attendee_ID`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`) VALUES
(4, 'MUHAWENIMANA', 'charles', '222016060', 'charle0m24@gmail.com', '0789700054', '$2y$10$6N2tsI3s3QBOoHPNSocWde23zRNJaFg13E2yX6k31ZdykuU7OxK0S');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `Workshop_ID` int(11) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Instructor_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`Workshop_ID`, `Title`, `Instructor_ID`) VALUES
(1, 'V10', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`Attendee_ID`),
  ADD KEY `Workshop_ID` (`Workshop_ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`Instructor_ID`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`Material_ID`),
  ADD KEY `Resource_ID` (`Resource_ID`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`Quiz_ID`),
  ADD KEY `Resource_ID` (`Resource_ID`);

--
-- Indexes for table `resources_usage`
--
ALTER TABLE `resources_usage`
  ADD PRIMARY KEY (`Usage_ID`),
  ADD KEY `Workshop_ID` (`Workshop_ID`),
  ADD KEY `Resource_ID` (`Resource_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Sale_ID`),
  ADD KEY `Workshop_ID` (`Workshop_ID`),
  ADD KEY `Attendee_ID` (`Attendee_ID`);

--
-- Indexes for table `sales_training_resources`
--
ALTER TABLE `sales_training_resources`
  ADD PRIMARY KEY (`Resource_ID`);

--
-- Indexes for table `session_attendance`
--
ALTER TABLE `session_attendance`
  ADD PRIMARY KEY (`Attendance_ID`),
  ADD KEY `Workshop_ID` (`Workshop_ID`),
  ADD KEY `Attendee_ID` (`Attendee_ID`);

--
-- Indexes for table `training_feedback`
--
ALTER TABLE `training_feedback`
  ADD PRIMARY KEY (`Feedback_ID`),
  ADD KEY `Workshop_ID` (`Workshop_ID`),
  ADD KEY `Attendee_ID` (`Attendee_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`Workshop_ID`),
  ADD KEY `Instructor_ID` (`Instructor_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendee`
--
ALTER TABLE `attendee`
  MODIFY `Attendee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `Instructor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `Material_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `Quiz_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resources_usage`
--
ALTER TABLE `resources_usage`
  MODIFY `Usage_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sale_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_training_resources`
--
ALTER TABLE `sales_training_resources`
  MODIFY `Resource_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session_attendance`
--
ALTER TABLE `session_attendance`
  MODIFY `Attendance_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `Workshop_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendee`
--
ALTER TABLE `attendee`
  ADD CONSTRAINT `attendee_ibfk_1` FOREIGN KEY (`Workshop_ID`) REFERENCES `workshop` (`Workshop_ID`);

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`Resource_ID`) REFERENCES `sales_training_resources` (`Resource_ID`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`Resource_ID`) REFERENCES `sales_training_resources` (`Resource_ID`);

--
-- Constraints for table `resources_usage`
--
ALTER TABLE `resources_usage`
  ADD CONSTRAINT `resources_usage_ibfk_1` FOREIGN KEY (`Workshop_ID`) REFERENCES `workshop` (`Workshop_ID`),
  ADD CONSTRAINT `resources_usage_ibfk_2` FOREIGN KEY (`Resource_ID`) REFERENCES `sales_training_resources` (`Resource_ID`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`Workshop_ID`) REFERENCES `workshop` (`Workshop_ID`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`Attendee_ID`) REFERENCES `attendee` (`Attendee_ID`);

--
-- Constraints for table `session_attendance`
--
ALTER TABLE `session_attendance`
  ADD CONSTRAINT `session_attendance_ibfk_1` FOREIGN KEY (`Workshop_ID`) REFERENCES `workshop` (`Workshop_ID`),
  ADD CONSTRAINT `session_attendance_ibfk_2` FOREIGN KEY (`Attendee_ID`) REFERENCES `attendee` (`Attendee_ID`);

--
-- Constraints for table `training_feedback`
--
ALTER TABLE `training_feedback`
  ADD CONSTRAINT `training_feedback_ibfk_1` FOREIGN KEY (`Workshop_ID`) REFERENCES `workshop` (`Workshop_ID`),
  ADD CONSTRAINT `training_feedback_ibfk_2` FOREIGN KEY (`Attendee_ID`) REFERENCES `attendee` (`Attendee_ID`);

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`Instructor_ID`) REFERENCES `instructor` (`Instructor_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
