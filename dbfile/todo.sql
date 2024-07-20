-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2024 at 01:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `donelist`
--

DROP TABLE IF EXISTS `donelist`;
CREATE TABLE IF NOT EXISTS `donelist` (
  `completion_id` int(11) NOT NULL AUTO_INCREMENT,
  `completion_date` date DEFAULT NULL,
  `list_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`completion_id`),
  KEY `list_id` (`list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donelist`
--

INSERT INTO `donelist` (`completion_id`, `completion_date`, `list_id`) VALUES
(3, '2024-05-29', 3),
(4, '2024-05-29', 3),
(5, '2024-05-29', 3),
(6, '2024-05-29', 3);

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

DROP TABLE IF EXISTS `todolist`;
CREATE TABLE IF NOT EXISTS `todolist` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `list_name` varchar(30) DEFAULT NULL,
  `list_description` varchar(400) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `added_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `priority` varchar(30) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`list_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`list_id`, `list_name`, `list_description`, `due_date`, `added_date`, `user_id`, `priority`, `done`) VALUES
(1, 'fName', 'the second time typed', '2024-05-31', '2024-05-15', 8, '', 1),
(2, 'sName', 'the third time', '2024-05-28', '2024-05-28', 8, '', 1),
(3, 'tName', 'this is the fourth name', '2024-05-29', '2024-05-29', 8, '', 1),
(4, 'fourthone', 'this is the fo', '2024-05-31', '2024-05-29', 8, '', 1),
(5, 'UNIQUE', 'ADSFS', '2024-05-09', '2024-05-29', 8, 'low', 1),
(7, 'first name', 'this is someone', '2024-05-22', '2024-05-29', 8, 'low', 1),
(8, 'Another name', 'first NAme', '2024-05-30', '2024-05-29', 8, 'low', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE IF NOT EXISTS `userinfo` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_password` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`user_id`, `first_name`, `last_name`, `user_email`, `user_password`) VALUES
(8, 'abcd', 'efgh', 'ijkl@gmail.com', '$2y$10$Gj4GdJuZku6kwkwlHOuukOlvOAgFeUtBecCA/dNFXKh6mdXCuljXi');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donelist`
--
ALTER TABLE `donelist`
  ADD CONSTRAINT `donelist_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `todolist` (`list_id`);

--
-- Constraints for table `todolist`
--
ALTER TABLE `todolist`
  ADD CONSTRAINT `todolist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
