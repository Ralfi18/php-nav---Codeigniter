-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 17 септ 2018 в 22:10
-- Версия на сървъра: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.31-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nav`
--

-- --------------------------------------------------------

--
-- Структура на таблица `nav`
--

CREATE TABLE `nav` (
  `ID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `path` varchar(255) NOT NULL,
  `isParent` tinyint(1) NOT NULL DEFAULT '0',
  `parentID` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `nav`
--

INSERT INTO `nav` (`ID`, `name`, `path`, `isParent`, `parentID`, `level`) VALUES
(1, 'home', '/', 0, NULL, NULL),
(2, 'products', 'products', 1, NULL, NULL),
(3, 'product 1', '/products/product-1', 1, 2, 1),
(4, 'product 2', '/products/product-2', 1, 3, 2),
(5, 'about', '/about', 1, NULL, NULL),
(6, 'tralala', '', 0, 5, 1),
(7, 'products 3', '/products/product-3', 1, 4, 3),
(8, 'test', 'test', 0, 5, 1),
(9, 'product 4', 'product-4', 0, 7, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
