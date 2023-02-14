-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 04:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `userFirstName` varchar(25) NOT NULL,
  `userLastName` varchar(255) NOT NULL,
  `userEmailAddress` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userCity` varchar(255) DEFAULT NULL,
  `userState` varchar(255) DEFAULT NULL,
  `userZip` int(10) DEFAULT NULL,
  `userType` int(10) NOT NULL COMMENT '0 => Employee/1 => Dealer',
  `isFirstLogin` int(11) NOT NULL DEFAULT 1,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `userFirstName`, `userLastName`, `userEmailAddress`, `userPassword`, `userCity`, `userState`, `userZip`, `userType`, `isFirstLogin`, `timeStamp`) VALUES
(1, 'ram', 'jondhale', 'ramjondhale@gmail.com', 'Ram@#1234', 'nashik', 'maharashtra', 423102, 0, 1, '2023-02-13 16:17:23'),
(2, 'rushi', 'jondhale', 'rushi@gmail.com', 'Rushi@#1234', 'Pune', 'Maharashtra', 406090, 1, 1, '2023-02-13 18:08:12'),
(3, 'rushi', 'jondhale', 'rushi1@gmail.com', 'Rushi@#1234', 'nashik', 'Maharashtra', 423102, 1, 1, '2023-02-13 18:15:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
