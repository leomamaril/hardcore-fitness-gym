-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2025 at 04:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hardcore`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` bigint(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `contact`, `email`, `date`, `time`, `status`) VALUES
(9, 'Leonardo', 9470622416, 'lamamaril11@gmail.com', '2025-03-13', '22:17', 'Approved'),
(10, 'Leonardo', 9470622416, 'lamamaril11@gmail.com', '2025-03-13', '23:25', 'Declined'),
(11, 'Leonardo', 9470622416, 'lamamaril11@gmail.com', '2025-03-13', '22:31', 'Approved'),
(12, 'Leonardo', 9470622416, 'lamamaril11@gmail.com', '2025-03-15', '22:31', 'Declined'),
(13, 'Leonardo', 9470622416, 'lamamaril11@gmail.com', '2025-03-13', '23:05', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mess` varchar(255) NOT NULL,
  `create_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `activity`, `date`) VALUES
(134, 'admin Rica has logged in', 'Mar-13-2025 02:52:24 PM'),
(135, 'User Leonardo has logged in', 'Mar-13-2025 02:54:01 PM'),
(136, 'admin Rica has logged in', 'Mar-13-2025 03:15:07 PM'),
(137, 'User Leonardo has logged in', 'Mar-13-2025 03:15:21 PM'),
(138, 'admin Rica has logged in', 'Mar-13-2025 03:15:49 PM'),
(139, 'User Leonardo has logged in', 'Mar-13-2025 03:25:07 PM'),
(140, 'admin Rica has logged in', 'Mar-13-2025 03:25:42 PM'),
(141, 'User Leonardo has logged in', 'Mar-13-2025 03:27:14 PM'),
(142, 'admin Rica has logged in', 'Mar-13-2025 03:27:56 PM'),
(143, 'User Leonardo has logged in', 'Mar-13-2025 03:55:02 PM'),
(144, 'admin Rica has logged in', 'Mar-13-2025 04:04:01 PM'),
(145, 'User Leonardo has logged in', 'Mar-13-2025 04:04:26 PM'),
(146, 'User Leonardo has logged in', 'Mar-13-2025 04:48:45 PM');

-- --------------------------------------------------------

--
-- Table structure for table `mop`
--

CREATE TABLE `mop` (
  `id` int(255) NOT NULL,
  `mop` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mop`
--

INSERT INTO `mop` (`id`, `mop`) VALUES
(1, ''),
(2, 'Walk-In'),
(3, 'Gcash'),
(4, 'Paypal'),
(10, 'E-Wallet');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `mess` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(255) NOT NULL,
  `payment` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment`) VALUES
(1, ''),
(2, '100'),
(3, '600');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(255) NOT NULL,
  `plan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `plan`) VALUES
(1, ''),
(2, 'Regular'),
(3, 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(255) NOT NULL,
  `stats` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `stats`) VALUES
(1, ''),
(2, 'Pending'),
(3, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time_slot` varchar(10) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `trainer_name` varchar(100) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `day`, `time_slot`, `activity`, `trainer_name`, `start_time`, `end_time`) VALUES
(2, 'Monday', '07:00', 'Trainer', ' Kevin', '16:22', '17:22'),
(4, 'Wednesday', '11:00', '', '', '', ''),
(6, 'Wednesday', '14:00', '', '', '', ''),
(8, 'Tuesday', '07:00', 'Trainer', ' Kevin', '22:12', '23:12'),
(10, 'Monday', '11:00', '', '', '', ''),
(12, 'Monday', '14:00', '', '', '', ''),
(14, 'Monday', '17:00', '', '', '', ''),
(16, 'Monday', '20:00', '', '', '', ''),
(18, 'Tuesday', '11:00', '', '', '', ''),
(22, 'Tuesday', '17:00', '', '', '', ''),
(24, 'Tuesday', '14:00', '', '', '', ''),
(26, 'Tuesday', '20:00', '', '', '', ''),
(28, 'Wednesday', '17:00', '', '', '', ''),
(30, 'Wednesday', '07:00', '', '', '', ''),
(32, 'Wednesday', '20:00', '', '', '', ''),
(33, 'Thursday', '07:00', '', '', '', ''),
(34, 'Thursday', '11:00', '', '', '', ''),
(35, 'Thursday', '14:00', '', '', '', ''),
(36, 'Thursday', '17:00', '', '', '', ''),
(37, 'Thursday', '20:00', '', '', '', ''),
(38, 'Thursday', '07:00', '', '', '', ''),
(39, 'Thursday', '11:00', '', '', '', ''),
(40, 'Thursday', '14:00', '', '', '', ''),
(41, 'Thursday', '17:00', '', '', '', ''),
(42, 'Thursday', '20:00', '', '', '', ''),
(43, 'Friday', '07:00', '', '', '', ''),
(44, 'Friday', '11:00', '', '', '', ''),
(45, 'Friday', '14:00', '', '', '', ''),
(46, 'Friday', '17:00', '', '', '', ''),
(47, 'Friday', '20:00', '', '', '', ''),
(48, 'Saturday', '07:00', '', '', '', ''),
(49, 'Saturday', '11:00', '', '', '', ''),
(50, 'Saturday', '14:00', '', '', '', ''),
(51, 'Saturday', '17:00', '', '', '', ''),
(52, 'Saturday', '20:00', '', '', '', ''),
(53, 'Sunday', '07:00', '', '', '', ''),
(54, 'Sunday', '11:00', '', '', '', ''),
(55, 'Sunday', '14:00', '', '', '', ''),
(56, 'Sunday', '17:00', '', '', '', ''),
(57, 'Sunday', '20:00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `age` int(2) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `plan_type` enum('Regular','Monthly') NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `status` enum('Inactive','Active','','') NOT NULL,
  `mop` varchar(255) NOT NULL,
  `amount` int(5) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `age`, `contact`, `email`, `pass`, `type`, `plan_type`, `start_date`, `end_date`, `status`, `mop`, `amount`, `datetime`) VALUES
(12, 'Rica', 'Mae', 22, '09999999999', 'ricamae@gmail.com', '$2y$10$YdbJ.fSWJPjlCDmfVNlVyevw.GiOxhjSIsuveVO0rgMyQmy5gB8Y6', 'admin', 'Regular', '', '', 'Active', '', 0, ''),
(13, 'Allan', 'Carpiz', 22, '09999999999', 'allancarpiz@gmail.com', '$2y$10$tjsTSTaHffgAaV47oNaoH.enp.cMEH3gnxyGU.gQnWjdVmaQ8sLb.', 'admin', 'Regular', '', '', 'Active', '', 0, ''),
(14, 'Allen', 'Garcia', 22, '09999999999', 'allengarcia@gmail.com', '$2y$10$pxhjLL7swET6xhOcsw9R9.Gf60xqMg98PL1eBMZ3Z3tI5nLGZh6IW', 'admin', 'Regular', '', '', 'Active', '', 0, ''),
(15, 'Deayan', 'Mamanta', 22, '09999999999', 'deayanm@gmail.com', '$2y$10$0BIzLnv7qpLClyCLxBvbrOZA2bpEYG0wgS6Cw7MUqvxCCJQUZaYYa', 'admin', 'Regular', '', '', 'Active', '', 0, ''),
(24, 'Leonardo', 'Antonio', 23, '09470622416', 'users@gmail.com', '$2y$10$r1tIjf2MbFu95r9xOtEGe.mYPjegov/N/DJt4ac1FRO2qj2Frnn66', '', 'Regular', '', '', 'Inactive', '', 0, ''),
(25, 'Leonardo', 'Antonio', 23, '09470622416', 'lamamaril11@gmail.com', '$2y$10$AtbjhzKc1mqOegM2FVTwluNGvA9bAM2dX1jlBzP4GjHbdQhsBIasO', '', 'Regular', '', '', 'Inactive', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(5) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `name`, `age`, `contact`, `date`, `time`) VALUES
(14, 'Leonardo', 23, 9470622416, 'Mar-09-2025', '04:36:27 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mop`
--
ALTER TABLE `mop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `mop`
--
ALTER TABLE `mop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
