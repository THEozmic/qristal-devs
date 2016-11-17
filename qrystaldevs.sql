-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2016 at 03:38 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrystaldevs`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `time_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `time_sent`) VALUES
(1, 2, 'Hello', '2016-11-16 12:47:58'),
(2, 1, 'Hi', '2016-11-16 12:48:06'),
(3, 2, 'Im cool', '2016-11-16 12:48:13'),
(4, 2, 'how far', '2016-11-16 13:53:36'),
(5, 1, 'Hello', '2016-11-16 13:54:20'),
(6, 1, 'b', '2016-11-16 13:54:32'),
(7, 1, 'b', '2016-11-16 13:54:33'),
(8, 1, 'b', '2016-11-16 13:54:33'),
(9, 2, 'hey', '2016-11-16 14:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `op` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `id`, `password`, `op`) VALUES
('ozmic', 1, '5f4dcc3b5aa765d61d8327deb882cf99', 'waydaai'),
('iprince', 2, '5f4dcc3b5aa765d61d8327deb882cf99', 'waydaai');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_of_action` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `time_of_action`, `action`) VALUES
(1, 1, '2016-11-16 12:45:15', 'logout'),
(2, 1, '2016-11-16 12:46:22', 'login'),
(3, 7, '2016-11-16 12:46:29', 'message'),
(4, 7, '2016-11-16 12:47:04', 'logout'),
(5, 2, '2016-11-16 12:47:47', 'login'),
(6, 2, '2016-11-16 12:47:58', 'message'),
(7, 1, '2016-11-16 12:48:06', 'message'),
(8, 2, '2016-11-16 12:48:14', 'message'),
(9, 2, '2016-11-16 13:53:36', 'message'),
(10, 1, '2016-11-16 13:54:20', 'message'),
(11, 1, '2016-11-16 13:54:33', 'message'),
(12, 1, '2016-11-16 13:54:33', 'message'),
(13, 1, '2016-11-16 13:54:34', 'message'),
(14, 2, '2016-11-16 14:16:31', 'message');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
