-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 03:14 AM
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
  `firstName` varbinary(250) DEFAULT NULL,
  `lastName` varchar(250) DEFAULT NULL,
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

INSERT INTO `tp_crud_user` (`id`, `firstName`, `lastName`, `birthDate`, `tel`, `email`, `country`, `comment`, `job`, `url`) VALUES
(13, 0x4a65616e, 'Untel', '1981-11-30', 1212454545, 'jean@untel.net', 'France', 'sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd sqdsqd', 'integrateur', 'www.jean.org'),
(14, 0x56696e63656e74, 'Adultman', '1945-02-27', 2147483647, 'vincent@businessfactory.com', 'USA', 'yyyy aaaaaaaaaaa uuuuuuuuuu yyyy aaaaaaaaaaa uuuuuuuuuu yyyy aaaaaaaaaaa uuuuuuuuuu yyyy aaaaaaaaaaa uuuuuuuuuu', 'integrateur', 'businessfactory.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
