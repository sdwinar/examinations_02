-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 03:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examinations`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doc_id` int(10) NOT NULL,
  `doc_name` varchar(50) NOT NULL,
  `doc_phone` varchar(50) NOT NULL,
  `doc_specialty` varchar(50) NOT NULL,
  `doc_email` varchar(50) NOT NULL,
  `doc_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `doc_name`, `doc_phone`, `doc_specialty`, `doc_email`, `doc_pass`) VALUES
(6, 'الدرديري حسن', '0909151617', 'اطفال', 'dr@sd.com', '1234'),
(7, 'خالد علي عباس', '0909151658', 'باطنية', 'kh@sd.com', '1234'),
(8, 'محمد نجيب', '0154851545', 'مخ واعصاب', 'mo@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `examintions`
--

CREATE TABLE `examintions` (
  `ex_id` int(10) NOT NULL,
  `ex_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examintions`
--

INSERT INTO `examintions` (`ex_id`, `ex_name`) VALUES
(6, 'تايفويد'),
(8, 'الرنين المغنطيسي'),
(9, 'الاشعة'),
(10, 'تخلف عقلي');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pat_id` int(10) NOT NULL,
  `pat_name` varchar(50) NOT NULL,
  `pat_phone` varchar(50) NOT NULL,
  `pat_exm` varchar(50) NOT NULL,
  `doc_email` varchar(50) NOT NULL,
  `doc_message` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pate_regesterd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pat_id`, `pat_name`, `pat_phone`, `pat_exm`, `doc_email`, `doc_message`, `reg_date`, `pate_regesterd`) VALUES
(4, 'محمد الامين', '021475545', 'تايفويد', 'الدرديري حسن', '', '2022-10-23 12:23:43', 'omer hassan'),
(5, 'علي الطيب', '01548454151', 'الرنين المغنطيسي', 'الدرديري حسن', 'استخرجت النتيجة عليك التوجه للمستشفى', '2022-10-23 12:24:07', 'omer hassan'),
(6, 'عباس سليمان', '012478547', 'الاشعة', 'خالد علي عباس', '', '2022-10-23 12:31:40', 'omer hassan'),
(7, 'هاشم هندي', '12154125523ق', 'تخلف عقلي', 'الدرديري حسن', 'من الصعب علاج الحالة للاسف', '2022-10-24 17:44:01', 'omer hassan'),
(9, 'الهام الصديق', '09624158458', 'تايفويد', 'محمد نجيب', 'عليك شراء الادوية 1/ شراب دواء للقحة 2/ امكزيم مرة في اليوم', '2022-10-26 12:26:41', 'هبة الطيب');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_adress` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_adress`, `user_phone`, `user_email`, `user_password`, `user_type`) VALUES
(1, 'ali ahmed aloor', 'الكلالة', '0912145214', 'ali@sd.com', '0000', 1),
(2, 'omer hassan', 'ام درمان', '0215475147', 'omer@sd.com', '1234', 2),
(8, 'الدرديري حسن', 'اطفال', '0909151617', 'dr@sd.com', '1234', 3),
(9, 'خالد علي عباس', 'باطنية', '0909151658', 'kh@sd.com', '1234', 3),
(10, 'محمد نجيب', 'مخ واعصاب', '0154851545', 'mo@gmail.com', '1234', 3),
(11, 'هبة الطيب', 'المعمورة', '0915245845', 'he@gmail.com', 'haboosh', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `examintions`
--
ALTER TABLE `examintions`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `examintions`
--
ALTER TABLE `examintions`
  MODIFY `ex_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
