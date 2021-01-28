-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 06:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_php`
--
CREATE DATABASE IF NOT EXISTS `tp_php` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tp_php`;

-- --------------------------------------------------------

--
-- Table structure for table `tp_crud_user`
--

DROP TABLE IF EXISTS `tp_crud_user`;
CREATE TABLE `tp_crud_user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `firstname` varbinary(250) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `job` enum('dev','integrateur','reseau') DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=4096 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tp_crud_user`
--

INSERT INTO `tp_crud_user` (`id`, `name`, `firstname`, `birthDate`, `tel`, `email`, `country`, `comment`, `job`, `url`) VALUES
(12, 'Test', 0x546573746572, '2021-01-20', 2147483647, 'test@test.test', 'paris', 'commentaire test commentaire test commentaire test commentaire test commentaire test', 'integrateur', 'www.test.com'),
(13, 'Untel', 0x4a65616e, '2020-12-30', 1212454545, 'jean@untel.net', 'londres', 'sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd', 'reseau', 'www.jean.org'),
(14, 'Autrenom', 0x41757472657072656e, '2020-12-27', 78789, 'autre@nom.cc', 'paris', 'yyyy aaaaaaaaaaa uuuuuuuuuu yyyy aaaaaaaaaaa uuuuuuuuuu yyyy aaaaaaaaaaa uuuuuuuuuu yyyy aaaaaaaaaaa uuuuuuuuuu', 'dev', 'www.www.www');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_crud_user`
--
ALTER TABLE `tp_crud_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tp_crud_user`
--
ALTER TABLE `tp_crud_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
