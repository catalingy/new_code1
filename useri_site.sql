-- phpMyAdmin SQL Dump
-- version 4.3.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2015 at 10:54 PM
-- Server version: 5.5.27-log
-- PHP Version: 5.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `useri_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_category`
--

CREATE TABLE IF NOT EXISTS `age_category` (
  `id` int(11) NOT NULL,
  `category` varchar(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `age_category`
--

INSERT INTO `age_category` (`id`, `category`) VALUES
(1, '-'),
(21, '32-35'),
(24, '35-36'),
(25, '36-37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `type` varchar(1) NOT NULL,
  `description` varchar(200) NOT NULL,
  `age_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `phone_number`, `email`, `type`, `description`, `age_id`) VALUES
(22, 'alexandru', '7e60b30fdc66d44807493ac7a777ff26', '+0755555555', 'catarex00@gmail.com', 'u', 'ahz', 1),
(25, 'catalin', 'f992437e5f60fe0043a4384cd7ba72be', '+40755800468', 'catalingy@yahoo.com', 'a', 'a', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age_category`
--
ALTER TABLE `age_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`), ADD KEY `ID` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age_category`
--
ALTER TABLE `age_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
