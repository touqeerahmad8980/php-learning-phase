-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2019 at 09:50 AM
-- Server version: 5.7.24
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_reminder`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks_reminder`
--

DROP TABLE IF EXISTS `tasks_reminder`;
CREATE TABLE IF NOT EXISTS `tasks_reminder` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userID` int(40) NOT NULL,
  `task_name` varchar(30) DEFAULT NULL,
  `task_description` varchar(30) DEFAULT NULL,
  `due_date` varchar(30) DEFAULT NULL,
  `add_favourite` tinyint(1) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks_reminder`
--

INSERT INTO `tasks_reminder` (`id`, `userID`, `task_name`, `task_description`, `due_date`, `add_favourite`, `create_date`) VALUES
(99, 45, 'dfdfdf', 'dfdfdf', '2019-05-11', 0, '2019-05-11 09:47:55'),
(100, 44, 'test 1', 'wdsdsd', '2019-05-11', 0, '2019-05-11 09:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(20) NOT NULL AUTO_INCREMENT,
  `userName` varchar(40) NOT NULL,
  `emailAddress` varchar(40) NOT NULL,
  `userPassword` text NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `emailAddress`, `userPassword`) VALUES
(44, 'Test 1', 'test@mail.com', '$2y$10$DT36jAq7H0imAes83dQcXOoiFxVcxgvrNIjCCEowO1TzAe4LqMVWW'),
(45, 'Touqeer Ahmad', 'touqeerahmad@mail.com', '$2y$10$EFYp3zGr8.nvu7Ba9MYHpejlqMb71MM2mcPnYqGhRSbC112QuWLqu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
