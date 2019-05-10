-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2019 at 11:40 AM
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
  `task_name` varchar(30) DEFAULT NULL,
  `task_description` varchar(30) DEFAULT NULL,
  `due_date` varchar(30) DEFAULT NULL,
  `add_favourite` tinyint(1) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks_reminder`
--

INSERT INTO `tasks_reminder` (`id`, `task_name`, `task_description`, `due_date`, `add_favourite`, `create_date`) VALUES
(95, 'task 11', 'new task.', '2019-05-10', 0, '2019-05-10 11:26:27'),
(96, 'new', 'expire task.', '2020-12-01', 1, '2019-05-10 11:29:13'),
(93, 'Task 1', 'This is my first task.', '2019-07-02', 0, '2019-05-08 06:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(20) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(40) NOT NULL,
  `emailAddress` varchar(40) NOT NULL,
  `userPassword` text NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `UserName`, `emailAddress`, `userPassword`) VALUES
(41, 'ddd', '2323@gh.fgh', '$2y$10$SR34KEhZvgaF6lmjmX4qMO.t.40rNAqP//t9vrfRz0Ckq1okZqMae'),
(40, 'sdfdf', 'fdf@fg.gfg', '$2y$10$D1rUBAKlKYs4ZeMtmCnwHux5EClflh8vxGtebFvaPZuJ853Uf6A2K'),
(39, 'dfsfdfd', 'dfdf@ghf.gh', '$2y$10$VGKT1NO2XKnjEu5u98LCkeBB9R7j6/t6Cnou8INEDzFsRxViLAFi6'),
(38, 'dsdsd', 'sdfsdf@gf.fg', '$2y$10$ps8mGyVQ3PiZG83ogdWRYumMEcweqbYA8NW.t3lGk1nRPigpy/vl.'),
(37, 'fdfdf', 'dfdf@fg.gjh', '$2y$10$IppRMrKByqLcZMw8q92Pqe5DS1wo161RGythcoUZ/jYoUlqWZseUO'),
(36, 'dsds', 'dsds@fg.ghj', '$2y$10$ecpx9p3SWy2c4tSy6QpzXOrGDumxrVX4Do.L/DvLOG588eZKPM6ge'),
(35, 'dsd', 'dsds@fgfg.ghg', '$2y$10$nqknS4PK9nIk1GC02zAQPOhSFoU9n3NrwdBgc5j2ljeRW4QSi66Je'),
(34, 'sdsd', 'dsd@fgg.hj', '$2y$10$8ZNEEOkD0rQqEK/2ey/1P.12cLekeVD8Rn1k9yE8FV2q/PBkuwtB6'),
(33, 'dsdsd', 'dsds@dfdf.fgh', '$2y$10$1N9kozYOuV2pKQGO2.3z7.x9bJSAjdJPfoRMcQMs6xkfEp4VTjm5i'),
(32, 'dsdsd', 'dsdsd@df.hj', '$2y$10$6IIbVWbNJ3zrpcmqGlLrZOPfnIRJuPS8U89.mFc6DWlMpRKnaBiGq'),
(31, 'gfgfg', 'gfgf@dfgfg.hjh', '$2y$10$90j/8rD8KeBCpqkErj0mgO1uIgVxEsuecmvpEKfbJsA/8U/Tq4.k2'),
(30, 'gfgfg', 'gfgf@dfgfg.hjh', '$2y$10$2c11GaCX95YE5Y6yZqBJ9eJ44Wqixn.XmgUFLW2JI1eYSv.mpjmDK'),
(29, 'gfgfg', 'gfgf@dfgfg.hjh', '$2y$10$vZkaTzCGnHmOukCYIIQCMONbpsrCLDEvqCPFCvJVF8aIb6RCYphAO'),
(28, 'gfgfg', 'gfgf@dfgfg.hjh', '$2y$10$leSgqi.RiSp.mDrn.GAZAOyHnwDK9waarcG7YjEquvVkGu0oqSZNa'),
(27, 'dsd', 'sds@df.hj', '$2y$10$hUZFADkI5FOVw9dbNAF/r.1lwjNS7fTmNn4FMT2ecxtIttheeG72K'),
(26, 'dsd', 'dsds@df.hj', '$2y$10$rFNtO/hw2XCO8I.exhTOgOWD2gZ.5kodxsXDgcjEZItb/EV9F7bFC'),
(25, 'dsd', 'dsds@df.hj', '$2y$10$X.RsZ..PDOdFnww521BYO.NY/LcCkZgK4VNLA2FxGiHqbY04pKIqK'),
(42, 'fdfdf', 'fdf@df.fgh', '$2y$10$BeXqfD6th3/842PnJ1SqU.g/jR6Vda3QuOyXLhpwhJBqv9Xr4x5T2'),
(43, 'dfdf', 'dffd@fgg.fg', '$2y$10$2t.gI.r/qieXde83nq.Qxuz5mloKStZO.3TfejHE4lB2vPlE801aC'),
(44, 'Test 1', 'test@mail.com', '$2y$10$DT36jAq7H0imAes83dQcXOoiFxVcxgvrNIjCCEowO1TzAe4LqMVWW'),
(45, 'Touqeer Ahmad', 'touqeerahmad@mail.com', '$2y$10$EFYp3zGr8.nvu7Ba9MYHpejlqMb71MM2mcPnYqGhRSbC112QuWLqu');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
